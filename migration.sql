update tt_content set CType='ms_lebenswurzel_feature' where CType='lebenswurzel_base_feature';
update tt_content set CType='ms_lebenswurzel_person' where CType='lebenswurzel_base_person';
update tt_content set pi_flexform=REPLACE(pi_flexform, 'EXT:lebenswurzel_base', 'EXT:ms_lebenswurzel');
