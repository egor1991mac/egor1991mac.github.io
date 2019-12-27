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
<?if(!empty($arResult["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"])):?>
	<?if(count($arResult["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"]) > 1):?>
	<?$img["small"] = CFile::ResizeImageGet(
	   $arResult["DISPLAY_PROPERTIES"]["PICTURES"]["FILE_VALUE"][0]["ID"],
	   array("width" => 1050, "height" => 500),
	   BX_RESIZE_IMAGE_EXACT,
	   true
	   );
	   $pict = $img["small"]["src"];?>
	<?else:?>
	<?$img["small"] = CFile::ResizeImageGet(
	   $arResult["DISPLAY_PROPERTIES"]["PICTURES"]["FILE_VALUE"]["ID"],
	   array("width" => 1050, "height" => 500),
	   BX_RESIZE_IMAGE_EXACT,
	   true
	   );
	   $pict = $img["small"]["src"];?>
	<?endif?>
<?endif;?>
<div class="background-img-container section-pt-10">
    <?if(!empty($APPLICATION->GetDirProperty("URL_BG_TITLE_BLOCK"))):?>
        <picture>
            <img loading="lazy" src="<?=$pict?>" class="background-img-fixed" style="z-index: -1;" alt="">
        </picture>

    <?else:?>
        <picture>
            <img loading="lazy" src="<?= $pict ?>" class="background-img-fixed" style="z-index: -1;" alt="">
        </picture>
    <?endif;?>
    <div class="row section-py-10">
        <div class="container">
            <h1 class="h1 mb-0 text-center  text-white">
                <?= $APPLICATION->ShowTitle(false) ?>
            </h1>
            <h1 class="theme-page-header-title"></h1>

            <div class="mx-auto d-flex w-50 align-items-center justify-content-center mb-2 flex-column flex-lg-row">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "template2",
                    array(
                        "VAR" => "hell world",
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0",
                        "COMPONENT_TEMPLATE" => "template",
                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO",

                    ),
                    false
                );?>

            </div>

        </div>
    </div>
    <div class="row bg-white section-py-5">
        <div class="container">
            <div class="row ">

                <div class="col-md-8  mx-auto">
                    <?if(!empty($arResult["DETAIL_TEXT"])):?>
                        <?= strip_tags($arResult["DETAIL_TEXT"], '<p><a><b><br><ul><li>');?>
                    <?elseif(!empty($arResult["PREVIEW_TEXT"])):?>
                        <?=strip_tags($arResult["PREVIEW_TEXT"], '<p><a><b><br><ul><li>')?>
                    <?elseif(!empty($arResult["DISPLAY_PROPERTIES"]["DESC"]["VALUE"])):?>
                        <?=strip_tags($arResult["DISPLAY_PROPERTIES"]["DESC"]["DISPLAY_VALUE"], '<p><a></b><br><ul><li>')?>
                    <?endif?>
                    <?if(!empty($arResult["DISPLAY_PROPERTIES"]["VIDEO"]["VALUE"])):?>
                        <h5>Видео</h5>
                        <iframe width="100%" height="318" src="https://www.youtube.com/embed/<?=$arResult["DISPLAY_PROPERTIES"]["VIDEO"]["VALUE"]?>" frameborder="0" allowfullscreen></iframe>
                    <?endif?>
                </div>
            </div>

        </div>
    </div>
</div>

