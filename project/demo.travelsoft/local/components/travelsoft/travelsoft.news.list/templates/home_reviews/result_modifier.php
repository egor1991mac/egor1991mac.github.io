<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

foreach ($arResult['ITEMS'] as &$arItem) {

    if ($arItem['PROPERTIES']['USER_ID']['VALUE'] > 0) {

        $user = $GLOBALS['USER']->GetByID($arItem['PROPERTIES']['USER_ID']['VALUE'])->Fetch();
        if ($user['NAME']) {
            $arItem['NAME'] = "{$user['NAME']} {$user['LAST_NAME']}";
        } else {
            $arItem['NAME'] = "{$user['EMAIL']}";
        }
    }
}