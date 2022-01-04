<?php

namespace MaikSchneider\MsLebenswurzel\Hooks;

class PersonPreviewRenderer implements \TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface
{

    /**
     * Preprocesses the preview rendering of a content element of type "bw_bwg_led_feature"
     *
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
     * @param bool $drawItem Whether to draw the item using the default functionality
     * @param string $headerContent Header content
     * @param string $itemContent Item content
     * @param array $row Record row of tt_content
     * @return void
     */
    public function preProcess(
        \TYPO3\CMS\Backend\View\PageLayoutView &$parentObject,
        &$drawItem,
        &$headerContent,
        &$itemContent,
        array &$row
    ) {
        if ($row['CType'] === 'ms_lebenswurzel_feature') {
            // $itemContent .= '<h3>feature</h3>';
            if ($row['assets']) {
                $itemContent .= $parentObject->thumbCode($row, 'tt_content', 'assets') . '';
            }
            $drawItem = false;
        }
    }
}
