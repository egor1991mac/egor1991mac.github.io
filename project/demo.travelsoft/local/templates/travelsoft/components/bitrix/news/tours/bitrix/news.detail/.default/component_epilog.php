<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arParams
 * @var array $arResult
 * @var string $strErrorMessage
 * @param CBitrixComponent $component
 * @param CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 */?>

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
