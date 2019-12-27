<?php

global $APPLICATION;
CModule::IncludeModule('iblock');

$FILTER = ['IBLOCK_ID' => $this->arParams['IBLOCK_ID']];
if (isset($GLOBALS[$this->arParams['FILTER_NAME']]) && is_array($GLOBALS[$this->arParams['FILTER_NAME']]) && !empty($GLOBALS[$this->arParams['FILTER_NAME']])) {
	$FILTER = array_merge($FILTER, $GLOBALS[$this->arParams['FILTER_NAME']]);
}
$db_list = CIBlockElement::GetList([$arParams['SORT_BY1'] => $arParams['SORT_ORDER1'], $arParams['SORT_BY2'] => $arParams['SORT_ORDER2']], 
$FILTER, false, ['nPageSize' => $this->arParams['NEWS_COUNT'], 'iNumPage' => $_REQUEST['PAGEN_2'] || 1], ['ID']);
while ($arElement = $db_list->Fetch()) {

	ob_start();
	
	$APPLICATION->IncludeComponent(
		"travelsoft:favorites.add",
		"",
		Array(
			"OBJECT_ID" => $arElement['ID'],
			"OBJECT_TYPE" => "IBLOCK_ELEMENT",
			"STORE_ID" => $this->arParams["IBLOCK_ID"]
		)
	);
	$GLOBALS['FAV_HTMLS'][$arElement['ID']] = ob_get_clean();
	$this->arParams['FAVORITES_CACHE_IDS'][] = $arElement['ID'];

}

$this->arParams['FAVORITES_CACHE_ID'] = md5("___travelsoft__".serialize($GLOBALS["FAV_HTMLS"]));
