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
<div class="theme-inline-slider row" data-gutter="10">
	<div class="owl-carousel" data-items="5" data-loop="true" data-nav="true">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		   $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		   $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		   ?>
		<? $images = getSrc($arItem['DISPLAY_PROPERTIES']['PREVIEW_PICTURE']['VALUE'], ['width' => 400, 'height' => 500], NO_PHOTO_PATH_1920_600, 1) ?>
                  <div class="theme-inline-slider-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                     <div class="banner _h-40vh _br-3 banner-animate banner-animate-zoom-in">
						 <div class="banner-bg" style="background-image:url(<?= $images[0] ?>);"></div>
                        <a class="banner-link" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"></a>
                        <div class="banner-caption _pt-60 banner-caption-bottom banner-caption-grad">
                           <h5 class="banner-title"><?= $arItem["NAME"]?></h5>
                           <p class="banner-subtitle"><?= $arItem["PROPERTIES"]["SUBTITLE"]["VALUE"] ?></p>
                           <a class="btn theme-search-results-sign-in-btn btn-ghost btn-white" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"><?= $arItem["PROPERTIES"]["PRICE"]["VALUE"] ?> <?= $arItem["PROPERTIES"]["CURRENCY"]["VALUE"] ?></a>
                        </div>
                     </div>
                  </div>
		<?endforeach;?>
	</div>
</div>








