<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arParams
 * @var array $arResult
 * @var string $strErrorMessage
 * @param CBitrixComponent $component
 * @param CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 */?>

<?//dm(array($arResult["IBLOCK_ID"], INFOTOUR_ID_IBLOCK), false, false, true);?>

<?if($arResult["IBLOCK_ID"] == INFOTOUR_ID_IBLOCK):?>

    <?if($arResult["PROPERTIES"]["REGISTER"]["VALUE"] == "Y"):?>

        <div class="mfeedback post">
            <h3>Регистрация завершена.</h3>
        </div>

    <?else:?>

    <?$APPLICATION->IncludeComponent(
        "travelsoft:travelsoft.main.feedback",
        "reg_presentation",
        array(
            "EMAIL_TO" => "yana@sft.by, j.sharlova@travelsoft.by",
            "EVENT_MESSAGE_ID" => array(
                0 => "33",
            ),
            "OK_TEXT" => "Спасибо, ваше сообщение принято.",
            "REQUIRED_FIELDS" => array(
                0 => "NAME",
                1 => "LEGAL_NAME",
                2 => "EMAIL",
                3 => "PHONE",
                4 => "TYPE",
                5 => "NAME_ELEMENT"
            ),
            "TITLE_TEXT" => 'Регистрация на "'.$arResult["NAME"].'"',
            "USE_CAPTCHA" => "Y",
            "COMPONENT_TEMPLATE" => "reg_presentation",
            "FIELDS_TYPE" => $arResult["PROPERTIES"]["TYPE"]["VALUE"],
            "FIELDS_NAME_ELEMENT" => $arResult["NAME"],
            "FIELDS_ID_ELEMENT" => $arResult["ID"],
        ),
        false
    );?>

    <?endif;?>

<?endif?>
<?
$GLOBALS["PICTURES_TITLE"] = '';
if(!empty($arResult["PROPERTIES"]["PICTURES_TITLE"]["VALUE"])){
    $pict = CFile::ResizeImageGet(
        $arResult["PROPERTIES"]["PICTURES_TITLE"]["VALUE"],
        array("width" => 1600, "height" => 450),
        BX_RESIZE_IMAGE_EXACT,
        true
    );
    $GLOBALS["PICTURES_TITLE"] = $pict["src"];
}
?>