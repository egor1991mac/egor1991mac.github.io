<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<!--<div class="d-flex align-items-center">-->
<!--    <img src="./img/reviewer-4.png" alt="" width="75px" height="75px" class="rounded-circle mr-3">-->
<!--    <div>-->
<!--        <h5>Иванов Иван <br></h5>-->
<!--        <a href="#" class="h5">+375(44) xxx-xx-xx</a>-->
<!--    </div>-->
<!--</div>-->
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
<?$img = CFile::ResizeImageGet($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"], array('width'=>90, 'height'=>90), BX_RESIZE_IMAGE_EXACT, true);?>

<div class="d-flex align-items-center" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <img loading="lazy" src="<?=$img["src"]?>" alt="" width="75px" height="75px" class="rounded-circle mr-3" alt="<?=$arItem["NAME"]?>">
                <div>
						<h5 class=""><?=$arItem["NAME"]?></h5>
						<a href="tel:<?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?>" class="h5"><?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?></a>
                </div>
				</div>
    <?endforeach;?>


