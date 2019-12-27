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
<div class="row row-col-gap" data-gutter="20">
<?$i=0;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		   $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		   $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		   ?>
		<?$i++;?>
		<? $images = getSrc($arItem['DISPLAY_PROPERTIES']['PREVIEW_PICTURE']['VALUE'], ['width' => 400, 'height' => 500], NO_PHOTO_PATH_1920_600, 1) ?>
		<div class="col-md-<?if($i==1):?>5<?elseif($i==2):?>7<?else:?>4<?endif?>"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="banner <?if($i==1):?>_h-40vh<?elseif($i==2):?>_h-40vh<?else:?>_h-33vh<?endif;?> _br-4 _bsh-xl _bsh-light banner-animate banner-animate-mask-in">
					  <div class="banner-bg" style="background-image:url(<?= $images[0] ?>);"></div>
                     <div class="banner-mask"></div>
                     <a class="banner-link" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"></a>
                     <div class="banner-caption _pt-60 banner-caption-bottom banner-caption-grad">
                        <h5 class="banner-title _fs"><?= $arItem["NAME"]?></h5>
                        <p class="banner-subtitle"><?= $arItem["PROPERTIES"]["SUBTITLE"]["VALUE"] ?></p>
						<a class="btn theme-search-results-sign-in-btn btn-ghost btn-white" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">от <?= $arItem["PROPERTIES"]["PRICE"]["VALUE"] ?> <?= $arItem["PROPERTIES"]["CURRENCY"]["VALUE"] ?></a>
                     </div>
                  </div>
               </div>
		<?endforeach;?>
</div>








