<?php

namespace MaikSchneider\MsLebenswurzel\Updates;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\RepeatableInterface;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

class GridelementsMigrationUpdate implements UpgradeWizardInterface, RepeatableInterface
{
    protected const MAPPING = [
        '1' => [
            'container_identifier' => 'container-features',
            'children_map' => [
                11 => 11,
            ],
            'flexform_tca_map' => [
                'style' => 'style',
            ],
        ],
        '4' => [
            'container_identifier' => 'container-accordion',
            'children_map' => [
                11 => 11,
            ],
        ],
        '3' => [
            'container_identifier' => 'container-header',
            'children_map' => [
                11 => 11,
            ],
            'flexform_tca_map' => [
                'position' => 'style',
                'image' => 'assets',
            ],
        ],
        '2' => [
            'container_identifier' => 'container-roadmap',
            'children_map' => [
                11 => 11,
                21 => 21,
            ],
            'flexform_tca_map' => [
                'style' => 'style',
            ],
        ],
    ];

    public function getIdentifier(): string
    {
        return 'gridelements_migration';
    }

    public function getTitle(): string
    {
        return 'Gridelements to Container Migration';
    }

    public function getDescription(): string
    {
        return 'Migrate gridelements items to container';
    }

    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class
        ];
    }

    protected static function getSetStatementsFlexformMapping($flexformMapping)
    {
    }

    public function executeUpdate(): bool
    {
        $sqls = [];
        foreach (self::MAPPING as $layout => $mapping) {

            // update flexform
            $flexSql = "select uid, pi_flexform from tt_content where pi_flexform is not null and CType='gridelements_pi1' and tx_gridelements_backend_layout='" . $layout . "' and deleted=0;";
            $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tt_content');
            $flexformToMigrate = $connection->executeQuery($flexSql)->fetchAll();
            foreach ($flexformToMigrate as $row) {
                $sqlSetStatements = [];
                $flexData = \TYPO3\CMS\Core\Utility\GeneralUtility::xml2array($row['pi_flexform']);
                foreach ($mapping['flexform_tca_map'] as $flexName => $tcaName) {
                    $flexformValue = $flexData['data']['sDEF']['lDEF'][$flexName]['vDEF'] ?? '';
                    if (!$flexformValue) {
                        continue;
                    }
                    $stringEscape = MathUtility::canBeInterpretedAsInteger($flexformValue) ? '' : '"';
                    $sqlSetStatements[] = $tcaName . '=' . $stringEscape . $flexformValue . $stringEscape;
                }
                if (count($sqlSetStatements)) {
                    $sqls[] = 'update tt_content set ' . implode(', ', $sqlSetStatements) . ' where uid=' . $row['uid'];
                }
            }

            // updates for CType and colPos
            $sqls[] = "update tt_content set CType='" . $mapping['container_identifier'] . "', pi_flexform=null where CType='gridelements_pi1' and tx_gridelements_backend_layout='" . $layout . "' and deleted=0;";
            foreach ($mapping['children_map'] as $oldId => $newId) {
                $sqls[] = "update tt_content t1 inner join tt_content t2 on t1.tx_gridelements_container=t2.uid set t1.colPos=" . $newId . ", t1.tx_container_parent=t2.uid, t1.tx_gridelements_container=0, t1.tx_gridelements_columns=0 where t1.deleted=0 and t2.tx_gridelements_backend_layout='" . $layout . "' and t1.tx_gridelements_columns=" . $oldId . ";";
            }

            // remove deleted gridelements
            $sqls[] = 'delete from tt_content where CType="gridelements_pi1" and tx_gridelements_backend_layout="' . $layout . '" and deleted=1;';
        }

        foreach ($sqls as $sql) {
            $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tt_content');
            $connection->executeQuery($sql);
        }
        return true;
    }

    /**
     * Looks for tt_content elements that have a layout that should be migrated
     */
    public function updateNecessary(): bool
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $queryBuilder->resetRestrictions();
        $conditions = [];
        foreach (self::MAPPING as $layoutName => $mapping) {
            $conditions[] = $queryBuilder->expr()->eq('tx_gridelements_backend_layout',
                $queryBuilder->createNamedParameter($layoutName, \PDO::PARAM_STR));
        }
        $elements = $queryBuilder->count('uid')
            ->from('tt_content')
            ->where(
                $queryBuilder->expr()->andX(
                    $queryBuilder->expr()->eq('CType', $queryBuilder->createNamedParameter('gridelements_pi1',
                        \PDO::PARAM_STR)),
                    $queryBuilder->expr()->orX(...$conditions)
                ))
            ->execute()
            ->fetchAll();
        return (bool)$elements;
    }

}