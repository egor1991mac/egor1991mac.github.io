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
/* * CModule::IncludeModule("travelsoft.currency"); */
/* * travelsoft\currency\Converter::getInstance()->initDefault(); */
?>





<? if (!empty($arResult["ITEMS"])): ?>
    <? if (!empty($arParams["TEXT_TITLE"])): ?>
        <div class="section-tittle row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2 class="text-left"><?= $arParams["TEXT_TITLE"] ?></h2>

                <? if (!empty($arParams["DESCRIPTION_LINK"])): ?>
                    <a class="link"
                       href="<?= $arParams["DESCRIPTION_LINK"] ?>"><?= $arParams["TEXT_DESCRIPTION"] ?></a><? endif ?>
            </div>
        </div>
    <? endif ?>
    <div class="row">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $img = NO_PHOTO_PATH_400_270;
            ?>
            <? if (!empty($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"])): ?>
                <?
                $arImg = CFile::ResizeImageGet(
                    $arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"][0], array("width" => 432, "height" => 200), BX_RESIZE_IMAGE_EXACT, true
                );
                $img = $arImg["src"];
                ?>
            <? endif ?>


            <div class="col-12 col-md-6 col-lg-3 mb-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="card card-border h-100 with-animation">
                    <picture class="card-img-top">
                        <source loading="lazy" media="(min-width: 650px)" srcset="<?= $img ?>">
                        <source loading="lazy" media="(min-width: 350px)" srcset="<?= $img ?>">
                        <img loading="lazy" src="<?= $img ?>" alt="<?= $arItem["NAME"] ?>">
                    </picture>


                    <ul class="card-options">
                        <? if (!empty($arItem["PROPERTIES"]["GOTRIPS"]["VALUE"])): ?>

                            <li class="card-options--item custom-tour"><span class="icon icon-creativity"></span>Авторский
                                тур
                            </li>
                        <? endif; ?>
                        <? if (!empty($arItem["PROPERTIES"]["NEW"]["VALUE"])): ?>
                            <li class="card-options--item new"><span class="icon icon-new-label"></span>Новинка</li>
                        <? endif; ?>
                        <? if (!empty($arItem["PROPERTIES"]["TOUR_TYPE"]["VALUE"])): ?>
                            <li class="card-options--item best-price"><span class="icon icon-fire"></span>Горящий тур
                            </li>
                        <? endif; ?>
                        <? if (!empty($arItem["PROPERTIES"]["FREE"]["VALUE"])): ?>
                            <li class="card-options--item doc"><span class="icon icon-profile"></span>Без визы</li>
                        <? endif; ?>
                    </ul>
                    <div class="card-body pb-0">
                        <h5 class="card-title"><?= $arItem["NAME"] ?></h5>
                        <!--                            <a class="theme-search-results-item-mask-link" href="-->
                        <? //=  ?><!--"></a>-->
                        <div class="d-flex justify-content-between ">
                            <ul class="card-rating mb-0">
                                <? for ($i = 1; $i <= 5; $i++) { ?>
                                    <li>
                                        <span class="icon <? if ($arParams['REVIEWS_STATISTICS'][$arItem['ID']]['middle'] > $i): ?>icon-star-full <? else: ?> icon-star-empty<? endif; ?>"></span>
                                    </li>
                                <? } ?>
                            </ul>
                            <strong class="card-rewies">Отзывов: <?= intval($arParams['REVIEWS_STATISTICS'][$arItem['ID']]['total_count']) ?></strong>
                        </div>
                        <div class="hr my-2"></div>
                        <ul class="list-tour-options">
                            <? if (!empty($arItem["PROPERTIES"]["ROUTE"]["VALUE"])): ?>
                                <li class="list-tour-options-item">
                                    <span class="icon-place-localizer mr-2"></span><?= strip_tags($arItem["PROPERTIES"]["ROUTE"]["VALUE"]) ?>
                                </li>
                            <? elseif (!empty($arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE"])): ?>
                                <li class="list-tour-options-item"><span class="icon-place-localizer mr-2"></span>
                                    <? if (count($arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE"]) > 1) {
                                        echo strip_tags(implode(', ', $arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["DISPLAY_VALUE"]));
                                    } else {
                                        echo strip_tags($arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["DISPLAY_VALUE"]);
                                    } ?></li>
                            <? endif ?>


                            <? if (!empty($arItem["DISPLAY_PROPERTIES"]["DEPARTURE_TEXT"]["DISPLAY_VALUE"])): ?>
                                <li class="list-tour-options-item">
                                    <span class="icon-calendar mr-2"></span><?= $arItem["DISPLAY_PROPERTIES"]["DEPARTURE_TEXT"]["DISPLAY_VALUE"] ?>
                                </li>
                            <? elseif (!empty($arItem["DISPLAY_PROPERTIES"]["DEPARTURE"]["DISPLAY_VALUE"])): ?>
                                <li>
                                    <?
                                    /* dm($arResult ); */
                                    $i = 0;
                                    $date = '';
                                    $firstdate = '';
                                    if (is_array($arItem["DISPLAY_PROPERTIES"]["DEPARTURE"]["VALUE"])) {
                                        foreach ($arItem["DISPLAY_PROPERTIES"]["DEPARTURE"]["VALUE"] as $k => $v) {
                                            $d = mktime(0, 0, 0, substr($v, 3, 2), substr($v, 0, 2), substr($v, 6, 4)); // 12.05.1990
                                            if ($d >= mktime(0, 0, 0, date('m'), date('d'), date('Y'))) {
                                                $i++;
                                                $d_arr[$i] = date("d.m", $d);
                                            }
                                            if ($firstdate == '')
                                                $firstdate = date("Y-m-d", $d);
                                            if ($i == 4) {
                                                break;
                                            };
                                        }
                                        ksort($d_arr);
                                        $date .= implode(', ', $d_arr);
                                    } else {
                                        $v = $arItem["DISPLAY_PROPERTIES"]["DEPARTURE"]["VALUE"];
                                        $d = mktime(0, 0, 0, substr($v, 3, 2), substr($v, 0, 2), substr($v, 6, 4)); // 12.05.1990
                                        if ($d > mktime(0, 0, 0, date('m'), date('d'), date('Y')))
                                            $date = date("d.m", $d);
                                        $firstdate = date("Y.m.d", $d);
                                    }
                                    ?>
                                    <b><?php
                                        if (!empty($date)) {
                                            echo "$date";
                                            if ($i == 4) {
                                                echo ' <small><a href="' . $arItem["DETAIL_PAGE_URL"] . '">все даты</a></small>';
                                            };
                                        } else
                                            echo "нет активных дат";
                                        ?></b>
                                </li>
                            <? endif; ?>


                            <? if (!empty($arItem["PROPERTIES"]["DAYS"]["VALUE"])): ?>
                                <li class="list-tour-options-item">
                                <span class="icon-clock mr-2"></span>
                                    <?= $arItem["PROPERTIES"]["DAYS"]["VALUE"] ?> дн., (<?= $arItem["PROPERTIES"]["NIGHT_TRANSFERS"]["VALUE"] ?>)
                                </li><? endif; ?>

                        </ul>
                    </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center justify-content-between ">
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn btn-secondary">
                                    <span class="icon icon-book mr-2" style="font-weight: bolder"></span> Подробнее
                                </a>
                                <div class="card-price">
                                    <span><?= $arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"] ?> <?= $arItem["DISPLAY_PROPERTIES"]["CURRENCY"]["VALUE"] ?></span><br>
                                    <small>
                                    <? if (!empty($arItem["DISPLAY_PROPERTIES"]["PRICE_SERVICE"]["VALUE"])): ?> + <?= $arItem["DISPLAY_PROPERTIES"]["PRICE_SERVICE"]["VALUE"] ?> руб<? endif ?></small>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
<? endif ?>





