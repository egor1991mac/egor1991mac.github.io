<?php

global $APPLICATION;
CModule::IncludeModule('iblock');
Bitrix\Main\Loader::includeModule("travelsoft.reviews");

$FILTER = ['IBLOCK_ID' => $this->arParams['IBLOCK_ID']];
if (isset($GLOBALS[$this->arParams['FILTER_NAME']]) && is_array($GLOBALS[$this->arParams['FILTER_NAME']]) && !empty($GLOBALS[$this->arParams['FILTER_NAME']])) {
    $FILTER = array_merge($FILTER, $GLOBALS[$this->arParams['FILTER_NAME']]);
}
$db_list = CIBlockElement::GetList([$arParams['SORT_BY1'] => $arParams['SORT_ORDER1'], $arParams['SORT_BY2'] => $arParams['SORT_ORDER2']],
                $FILTER, false, ['nPageSize' => $this->arParams['NEWS_COUNT'], 'iNumPage' => $_REQUEST['PAGEN_2'] || 1], ['ID']);
$this->arParams['REVIEWS_STATISTICS'] = [];
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
    # ПОЛУЧАЕМ СТАТИСТИКУ ПО ОТЗЫВАМ ДЛЯ КАЖДОГО ТУРА
    $cache = new \travelsoft\reviews\Cache("reviews_tourstat_{$arElement['ID']}");
    if (empty($this->arParams['REVIEWS_STATISTICS'][$arElement['ID']] = $cache->get())) {
        $element_id = $arElement['ID'];
        $this->arParams['REVIEWS_STATISTICS'][$arElement['ID']] = $cache->caching(function () use ($element_id) {

            $statistic = new travelsoft\reviews\Statistics($element_id);

            return $statistic->get();
        });
    }
    #################################################
}

$this->arParams['FAVORITES_CACHE_ID'] = md5("___travelsoft__" . serialize($GLOBALS["FAV_HTMLS"]));
