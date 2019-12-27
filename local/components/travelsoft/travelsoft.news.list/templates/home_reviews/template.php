<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
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
<? if (!empty($arResult["ITEMS"])): ?>
    <? if ($arParams["TEXT_TITLE"]): ?>
        <div class="section-tittle row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2 class="text-left"><?= $arParams["TEXT_TITLE"] ?></h2>
                <? if (!empty($arParams["DESCRIPTION_LINK"])): ?>
                    <a class="link"
                       href="<?= $arParams["DESCRIPTION_LINK"] ?>"><?= $arParams["TEXT_DESCRIPTION"] ?></a>
                <? endif ?>
            </div>

        </div>

    <? endif ?>
    <div class="main_rewies--container">

        <div class="owl-carousel owl-theme js-rewies_slider">
            <? $j = 1; ?>
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <?
            $arImg = CFile::ResizeImageGet($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"][0], array("width" => 400, "height" => 400), BX_RESIZE_IMAGE_EXACT, true);
            $img = $arImg["src"];
            ?>
            <div class="card  rewies mb-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <picture class="card-img">
                    <source class="owl-lazy" media="(min-width: 650px)" data-srcset="<?= $img ?>" srcset="<?= $img ?>">
                    <source class="owl-lazy" media="(min-width: 350px)" data-srcset="<?= $img ?>" srcset="<?= $img ?>">
                    <img class="owl-lazy" data-src="<?= $img ?>" alt="slide1" src="<?= $img ?>" style="opacity: 1;">
                </picture>
                <div class="card-body card-border card-shadow">
                    <div class="card-date"><span class="icon icon-calendar pr-1"></span>21.02.2019</div>
                    <h5 class="card-title"><?= $arItem["NAME"] ?></h5>
                    <p class="card-text"><?= substr2($arItem["DETAIL_TEXT"], 130) ?></p>
                    <a class="banner-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"></a>
                </div>



        </div>


        <? endforeach; ?>
    </div>
    </div>


<? endif ?>
