<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

ShowMessage($arParams["~AUTH_RESULT"]);


$APPLICATION->IncludeComponent(
        "bitrix:main.register",
        "tsoperator",
        Array(
            "USER_PROPERTY_NAME" => "",
            "SEF_MODE" => "N",
            "SHOW_FIELDS" => Array("PERSONAL_PHONE", "NAME", "SECOND_NAME", "LAST_NAME", "EMAIL"),
            "REQUIRED_FIELDS" => Array("PERSONAL_PHONE", "EMAIL"),
            "AUTH" => "Y",
            "USE_BACKURL" => "Y",
            "SUCCESS_PAGE" => $APPLICATION->GetCurPageParam('', array('backurl')),
            "SET_TITLE" => "N",
            "USER_PROPERTY" => Array("UF_AGENCY")
        )
);
?><p><a href="<?= $arResult["AUTH_AUTH_URL"] ?>"><b><?= GetMessage("AUTH_AUTH") ?></b></a></p><? ?>