<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

/*$cp = $this->__component;

if (is_object($cp))
{
    $cp->arResult['ROUTE_INFO'] = $arResult['ROUTE_INFO'];
    $cp->arResult['MAP_SCALE'] = $zoom;

    $arResult['MAP_SCALE'] = $cp->arResult['MAP_SCALE'];
    $cp->SetResultCacheKeys(array('ROUTE_INFO', 'MAP_SCALE'));

}*/