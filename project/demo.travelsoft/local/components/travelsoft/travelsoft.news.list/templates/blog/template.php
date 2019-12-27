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
$str = 50;
$i = 0;
?>

<? if (!empty($arResult["ITEMS"])): ?>
<!--    --><?// if ($arParams["TEXT_TITLE"]): ?>
<!--        <div class="section-tittle row">-->
<!---->
<!--            <div class="col-12 d-flex justify-content-between align-items-center">-->
<!--                <h2 class="text-left">--><?//= $arParams["TEXT_TITLE"] ?><!--</h2>-->
<!--                --><?// if (!empty($arParams["DESCRIPTION_LINK"])): ?><!--<a-->
<!--                    class="link"-->
<!--                    href="--><?//= $arParams["DESCRIPTION_LINK"] ?><!--">--><?//= $arParams["TEXT_DESCRIPTION"] ?><!--</a>--><?// endif ?>
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    --><?// endif ?>

        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $i++;
            ?>
            <? if (!empty($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"])): ?>
                <?
                $arImg = CFile::ResizeImageGet($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"][0], array("width" => 422, "height" => 250), BX_RESIZE_IMAGE_EXACT, true);
                $img = $arImg["src"];
                ?>
            <? endif ?>
            <div class="col-12 col-sm-6 col-md-8 mb-4">
                <div class="card card-hor card-border h-100 with-animation">


                    <div class="card-header">
                        <picture class="card-img">
                            <source loading="lazy" media="(min-width: 650px)" srcset="<?= $img ?>">
                            <source loading="lazy" media="(min-width: 350px)" srcset="<?= $img ?>">
                            <img loading="lazy" src="<?= $img ?>" alt="home-news">
                        </picture>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $arItem["NAME"] ?></h5>
                        <div class="d-flex justify-content-between pb-2">
                            <div class="card-date"><span class="icon icon-calendar pr-1"></span><?= $arItem["DATE_CREATE"] ?></div>
                            <div class="card-see"><span class="icon icon-eye pr-1"></span><?= $arItem['SHOW_COUNTER'] ?></div>
                        </div>
                        <div class="hr"></div>
                        <? if (!empty($arItem["DISPLAY_PROPERTIES"]["PREVIEW_TEXT"]["DISPLAY_VALUE"])): ?>
                            <p class="card-text pt-2">
                                <?= substr2($arItem["DISPLAY_PROPERTIES"]["PREVIEW_TEXT"]["DISPLAY_VALUE"], 150) ?>

                            </p>
                        <? else: ?>
                            <p class="card-text pt-2">
                                <?= substr2($arItem["DISPLAY_PROPERTIES"]["DESC"]["DISPLAY_VALUE"], 150) ?>
                            </p>

                        <? endif; ?>

                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn btn-secondary ml-auto"><span class="icon icon-book mr-2" style="font-weight: bolder"></span> Подробнее</a>

                    </div>

                </div>

            </div>
        <? endforeach; ?>


<? endif ?>
