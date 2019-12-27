<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
$htmlMapID = "route-map";
$scroll[] = array();
/*	CModule::IncludeModule("travelsoft.currency");
travelsoft\currency\Converter::getInstance()->initDefault(); */
?>

<? if (!empty($arResult["PROPERTIES"]["MANAGER"]["VALUE"])): ?>
    <? $GLOBALS['manager'] = $arResult["PROPERTIES"]["MANAGER"]["VALUE"] ?>

<? endif; ?>
<? $file_big = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"][0], Array('width' => 1440, 'height' => 889), BX_RESIZE_IMAGE_EXACT, true); ?>

<div class="background-img-container">
    <picture>
        <img loading="lazy" src="<?= $file_big["src"]; ?>" class="background-img-fixed" style="z-index: -1;" alt="">
    </picture>
    <div class="container">
        <div class="row h-80vh align-items-center align-items-lg-end pb-5">
            <div class="col-12 col-md-8">
                <ul class="card-options card-options-hor-static">
                    <? if (!empty($arResult["PROPERTIES"]["GOTRIPS"]["VALUE"])): ?>
                        <li class="card-options--item custom-tour"><span class="icon icon-creativity"></span>Авторский
                            тур
                        </li>
                    <? endif; ?>
                    <? if (!empty($arResult["PROPERTIES"]["NEW"]["VALUE"])): ?>
                        <li class="card-options--item new"><span class="icon icon-new-label"></span>Новинка</li>
                    <? endif; ?>
                    <? if (!empty($arResult["PROPERTIES"]["TOUR_TYPE"]["VALUE"])): ?>
                        <li class="card-options--item best-price"><span class="icon icon-fire"></span>Горящий тур</li>
                    <? endif; ?>
                    <? if (!empty($arResult["PROPERTIES"]["FREE"]["VALUE"])): ?>
                        <li class="card-options--item doc"><span class="icon icon-profile"></span>Без визы</li>
                    <? endif; ?>

                </ul>
                <h1 class="text-white py-5"><?= $arResult["NAME"] ?></h1>

                <ul class="card-rating h3">
                    <? for ($i = 1; $i <= 5; $i++) { ?>

                        <li>
                            <span class="icon <? if ($arParams['REVIEWS_STATISTICS'][$arItem['ID']]['middle'] > $i): ?>icon-star-full <? else: ?> icon-star-empty<? endif; ?>"></span>
                        </li>
                    <? } ?>
                </ul>
            </div>

        </div>
    </div>
    <div class="row bg-light section-py-10">
        <div class="container bg-light">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-border mb-3 sticky-top card-mobile-nav-detail" style="top: 40.5px;">
                        <div class="card-body p-3">
                            <nav class="nav bg-white nav-decoration nav-hor-scroll">
                                <a class="nav-link active " href="#overview">О туре</a>
                                <a class="nav-link " href="#gallery">Галлерея</a>
                                <a class="nav-link " href="#program">Программа</a>
                                <a class="nav-link  " href="#cost">Стоимость</a>
                                <a class="nav-link  " href="#price">Цены</a>
                                <a class="nav-link  " href="#review">Отзывы</a>
                            </nav>
                        </div>
                    </div>
                    <section id="overview" class="py-5">
                        <h2 class="h2 text-center text-md-left">О туре</h2>
                        <div class="card card-border">
                            <!--                                  --><? //= dm($arResult) ?>
                            <div class="card-body">
                                <? if ($arResult["DISPLAY_PROPERTIES"]["HD_DESC"]["VALUE"] == "html"): ?>
                                    <?= $arResult["DISPLAY_PROPERTIES"]["HD_DESC"]["VALUE"]["TEXT"] ?>
                                <? else: ?>
                                    <p><?= $arResult["DISPLAY_PROPERTIES"]["HD_DESC"]["DISPLAY_VALUE"] ?></p>
                                <? endif ?>
                                <div class="hr mb-3"></div>

                                <ul class="list list-hor mb-0">
                                    <? if (!empty($arResult["DISPLAY_PROPERTIES"]["DAYS"]["VALUE"])): ?>
                                        <li class="list-item d-flex align-items-center"><span
                                                    class="icon-clock mr-2"></span>
                                            <?= $arResult["DISPLAY_PROPERTIES"]["DAYS"]["NAME"] ?>: <b
                                                    class="ml-1"> <?= num2word($arResult["DISPLAY_PROPERTIES"]["DAYS"]["VALUE"] + 1, array("день", "дня", "дней")) ?> <? if ($arResult["DISPLAY_PROPERTIES"]["DAYS"]["VALUE"] != 0): ?>/ <?= num2word($arResult["DISPLAY_PROPERTIES"]["DAYS"]["VALUE"], array("ночь", "ночи", "ночей")) ?><? endif ?></b>
                                        </li>
                                    <? endif ?>
                                    <? if (!empty($arResult["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE"])): ?>
                                        <li class="list-item d-flex align-items-center"><span
                                                    class="icon-place-localizer mr-2"></span>Направление: <b
                                                    class="ml-1">
                                                <? if (count($arResult["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE"]) > 1): ?>
                                                    <? foreach ($arResult["DISPLAY_PROPERTIES"]["COUNTRY"]["DISPLAY_VALUE"] as $k => $country): ?>
                                                        <?= $country ?><? if ($k != count($arResult["DISPLAY_PROPERTIES"]["COUNTRY"]["DISPLAY_VALUE"]) - 1): ?><? echo ", "; ?><? endif ?>
                                                    <? endforeach; ?>
                                                <? else: ?>
                                                    <?= $arResult["DISPLAY_PROPERTIES"]["COUNTRY"]["DISPLAY_VALUE"] ?>
                                                    <? if (!empty($arResult["TOWNS"])): ?>
                                                        <?= ", " ?>
                                                        <? foreach ((array)$arResult["TOWNS"] as $item): ?>
                                                            <?= $item["NAME"] ?>
                                                        <? endforeach; ?>
                                                    <? endif ?>
                                                <? endif ?>
                                            </b>
                                        </li>
                                    <? endif ?>
                                    <? if (!empty($arResult["DISPLAY_PROPERTIES"]["POINT_DEPARTURE"]["VALUE"])): ?>
                                        <li class="list-item d-flex align-items-center"><span
                                                    class="icon-place-localizer mr-2"></span>
                                            <? if ($arResult["DISPLAY_PROPERTIES"]["TRANSPORT"]["VALUE"] == '505481'): ?>Выезд:<? elseif ($arResult["DISPLAY_PROPERTIES"]["TRANSPORT"]["VALUE"] == '505480'): ?>Вылет:<? else: ?>Начало тура:<? endif ?>
                                            <b class="ml-1"><?= strip_tags($arResult["DISPLAY_PROPERTIES"]["POINT_DEPARTURE"]["DISPLAY_VALUE"]) ?></b>
                                        </li>
                                    <? endif ?>

                                    <? if (!empty($arResult["DISPLAY_PROPERTIES"]["ROUTE"]["VALUE"])): ?>
                                        <li class="list-item d-flex align-items-center"><span
                                                    class="icon-map2 mr-2"></span>Маршрут:<b class="ml-1">
                                                <?= $arResult["DISPLAY_PROPERTIES"]["ROUTE"]["VALUE"] ?>
                                            </b>
                                        </li>
                                    <? elseif (count($arResult["DISPLAY_PROPERTIES"]["TOWN"]["DISPLAY_VALUE"]) > 1): ?>
                                        <? $j = 1; ?>
                                        <li class="list-item"><span class="icon-calendar mr-2"></span>Даты тура:<b
                                                    class="ml-1">
                                                <? foreach ($arResult["DISPLAY_PROPERTIES"]["TOWN"]["DISPLAY_VALUE"] as $town): ?>
                                                    <?= strip_tags($town) ?><? if (count($arResult["DISPLAY_PROPERTIES"]["TOWN"]["DISPLAY_VALUE"]) > $j): ?><? echo ", " ?><? endif ?>
                                                    <? $j++ ?>
                                                <? endforeach; ?>
                                            </b>
                                        </li>
                                    <? endif ?>
                                    <? if (!empty($arResult["DISPLAY_PROPERTIES"]["REGION"]["VALUE"])): ?>
                                        <li>
                                            <?= strip_tags($arResult["DISPLAY_PROPERTIES"]["REGION"]["DISPLAY_VALUE"]) ?>
                                        </li>
                                    <? endif ?>

                                    <? if (!empty($arResult["DISPLAY_PROPERTIES"]["DEPARTURE"]["VALUE"])): ?>
                                        <li class="list-item d-flex align-items-center"><span
                                                    class="icon-calendar mr-2"></span><?= $arResult["DISPLAY_PROPERTIES"]["DEPARTURE"]["NAME"] ?>
                                            <b class="ml-1">
                                                : </strong>
                                                <? /*dm($arResult );*/
                                                $i = 0;
                                                $date = '';
                                                $firstdate = '';
                                                if (is_array($arResult["DISPLAY_PROPERTIES"]["DEPARTURE"]["VALUE"])) {
                                                    foreach ($arResult["DISPLAY_PROPERTIES"]["DEPARTURE"]["VALUE"] as $k => $v) {
                                                        $d = mktime(0, 0, 0, substr($v, 3, 2), substr($v, 0, 2), substr($v, 6, 4)); // 12.05.1990
                                                        if ($d >= mktime(0, 0, 0, date('m'), date('d'), date('Y'))) {
                                                            $i++;
                                                            $d_arr[$i] = date("d.m.Y", $d);
                                                        }
                                                        if ($firstdate == '') $firstdate = date("Y-m-d", $d);
                                                    }
                                                    ksort($d_arr);
                                                    $date .= implode(', ', $d_arr);
                                                } else {
                                                    $v = $arResult["DISPLAY_PROPERTIES"]["DEPARTURE"]["VALUE"];
                                                    $d = mktime(0, 0, 0, substr($v, 3, 2), substr($v, 0, 2), substr($v, 6, 4)); // 12.05.1990
                                                    if ($d > mktime(0, 0, 0, date('m'), date('d'), date('Y')))
                                                        $date = date("d.m.y", $d);
                                                    $firstdate = date("Y.m.d", $d);
                                                }
                                                ?>
                                                <?php if (!empty($date)) {
                                                    echo "$date";
                                                } else echo "нет активных дат"; ?>
                                            </b>
                                        </li>
                                    <? endif ?>
                                    <? if (!empty($arResult["DISPLAY_PROPERTIES"]["TOURTYPE"]["VALUE"])): ?>
                                        <li>
                                            <strong>Тип тура:</strong>
                                            <? if (count($arResult["DISPLAY_PROPERTIES"]["TOURTYPE"]["VALUE"]) > 1): ?>
                                                <? $j = 1; ?>
                                                <? foreach ($arResult["DISPLAY_PROPERTIES"]["TOURTYPE"]["DISPLAY_VALUE"] as $tour): ?>
                                                    <?= strip_tags($tour) ?><? if (count($arResult["DISPLAY_PROPERTIES"]["TOURTYPE"]["DISPLAY_VALUE"]) > $j): ?><? echo ", " ?><? endif ?>
                                                    <? $j++ ?>
                                                <? endforeach; ?>
                                            <? else: ?>
                                                <?= strip_tags($arResult["DISPLAY_PROPERTIES"]["TOURTYPE"]["DISPLAY_VALUE"]) ?>
                                            <? endif ?>
                                        </li>
                                    <? endif ?>
                                    <? if (!empty($arResult["DISPLAY_PROPERTIES"]["TYPE"]["VALUE"])): ?>
                                        <li>
                                            <strong><?= $arResult["DISPLAY_PROPERTIES"]["TYPE"]["NAME"] ?></strong>: <?= strip_tags($arResult["DISPLAY_PROPERTIES"]["TYPE"]["DISPLAY_VALUE"]) ?>
                                        </li>
                                    <? endif ?>
                                </ul>

                            </div>
                        </div>
                    </section>
                    <section id="gallery" class=" py-5">
                        <h2 class="h2 text-center text-md-left">Галлерея</h2>

                        <div class="card card-border">
                            <div class="card-body">
                                <div id="sync1" class="owl-carousel owl-theme js-slider_detail">
                                    <? $img_count = 0; ?>
                                    <? foreach ($arResult["PROPERTIES"]["PICTURES"]["VALUE"] as $item):
                                        $file_big = CFile::ResizeImageGet($item, Array('width' => 850, 'height' => 400), BX_RESIZE_IMAGE_EXACT, true);
                                        $file_small = CFile::ResizeImageGet($item, Array('width' => 360, 'height' => 222), BX_RESIZE_IMAGE_EXACT, true);
                                        ?>
                                        <picture>
                                            <img class="owl-lazy"
                                                 data-src="<?= $file_big["src"]; ?>"
                                                 alt="<? if (!empty($arResult['PROPERTIES']['PICTURES']['DESCRIPTION'][$img_count])): ?><?= $arResult['PROPERTIES']['PICTURES']['DESCRIPTION'][$img_count] ?><? else: ?><?= $arResult['NAME'] ?> - Изображение <?= $img_count ?><? endif; ?>"
                                                 title="Image Title"/>
                                        </picture>
                                    <? endforeach; ?>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div id="sync2" class="owl-carousel owl-theme js-slider_detail-thumbs">
                                    <? $img_count = 0; ?>
                                    <? foreach ($arResult["PROPERTIES"]["PICTURES"]["VALUE"] as $item):
                                        $file_big = CFile::ResizeImageGet($item, Array('width' => 850, 'height' => 400), BX_RESIZE_IMAGE_EXACT, true);
                                        $file_small = CFile::ResizeImageGet($item, Array('width' => 360, 'height' => 222), BX_RESIZE_IMAGE_EXACT, true);
                                        ?>
                                        <picture>
                                            <img class="img-thumbnail owl-lazy"
                                                 data-src="<?= $file_big["src"]; ?>"
                                                 alt="<? if (!empty($arResult['PROPERTIES']['PICTURES']['DESCRIPTION'][$img_count])): ?><?= $arResult['PROPERTIES']['PICTURES']['DESCRIPTION'][$img_count] ?><? else: ?><?= $arResult['NAME'] ?> - Изображение <?= $img_count ?><? endif; ?>"
                                                 title="Image Title"/>
                                        </picture>
                                    <? endforeach; ?>
                                </div>
                            </div>

                        </div>
                    </section>
                    <? if (!empty($arResult["DISPLAY_PROPERTIES"]["NDAYS"]["VALUE"])): ?>
                        <section id="program" class="py-5">
                            <h2 class="h2 text-center text-md-left"><?= $arResult["DISPLAY_PROPERTIES"]["NDAYS"]["NAME"] ?></h2>
                            <div class="accordion" id="accordionExample">
                                <? $i = 1; ?>
                                <? foreach ($arResult["DISPLAY_PROPERTIES"]["NDAYS"]["DISPLAY_VALUE"] as $k => $day): ?>
                                    <div class="card card-border card-collapse">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                День <?= $i ?>
                                            </h5>
                                            <button class="btn btn-link dropdown-toggle <? if ($i != 1): ?>collapsed<? endif; ?> "
                                                    type="button" data-toggle="collapse"
                                                    data-target="#collapseOne_<?= $i ?>"
                                                    aria-expanded="<? if ($i == 1): ?>true<? else: ?>false<? endif; ?>"
                                                    aria-controls="collapseOne_<?= $i ?>"></button>
                                        </div>
                                        <div id="collapseOne_<?= $i ?>"
                                             class="collapse <? if ($i == 1): ?> show <? endif; ?>"
                                             aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body  pt-0">
                                                <!--                                        <img src="./img/home_slider/slider-101.jpg" class="img-fluid mb-4" alt="">-->
                                                <p class="">
                                                    <?= $day ?>
                                                </p>
                                            </div>
                                        </div>
                                        <!--                                <li>-->
                                        <!--                                    <hr>-->
                                        <!--                                    <h4>-->
                                        <? //= $arResult["DISPLAY_PROPERTIES"]["NDAYS"]["DESCRIPTION"][$k] ?><!--</h4>-->
                                        <!--                                    <p>-->
                                        <!---->
                                        <!--                                    </p>-->
                                        <!--                                </li>-->
                                    </div>
                                    <? $i++ ?>
                                <? endforeach; ?>
                            </div>
                        </section>
                        <section id="cost" class="py-5">
                            <h2 class="h2 text-center text-md-left">Стоимость</h2>
                            <? if (!empty($arResult["DISPLAY_PROPERTIES"]["PRICE_INCLUDE"]["VALUE"]["TEXT"])): ?>
                                <div class="card card-border mb-3 ">
                                    <div class="card-header d-flex justify-content-between border-0 ">
                                        <h4 class="my-2 text-success"><?= $arResult["DISPLAY_PROPERTIES"]["PRICE_INCLUDE"]["NAME"] ?></h4>
                                        <button class="btn btn-link dropdown-toggle p-0 collapsed" type="button"
                                                data-toggle="collapse" data-target="#include_true" aria-expanded="false"
                                                aria-controls="collapseExample"></button>
                                    </div>
                                    <div class="collapse" id="include_true" style="">
                                        <div class="card-body pt-0">
                                            <? if ($arResult["DISPLAY_PROPERTIES"]["PRICE_INCLUDE"]["VALUE"]["TYPE"] == "HTML"): ?>
                                                <?= $arResult["DISPLAY_PROPERTIES"]["PRICE_INCLUDE"]["DISPLAY_VALUE"] ?>
                                            <? else: ?>
                                                <?= $arResult["DISPLAY_PROPERTIES"]["PRICE_INCLUDE"]["DISPLAY_VALUE"] ?>
                                            <? endif ?>
                                        </div>
                                    </div>
                                </div>

                            <? endif; ?>
                            <? if (!empty($arResult["DISPLAY_PROPERTIES"]["PRICE_NO_INCLUDE"]["VALUE"]["TEXT"])): ?>
                                <div class="card card-border mb-3">
                                    <div class="card-header d-flex justify-content-between border-0 ">
                                        <h4 class="my-2 text-danger"><?= $arResult["DISPLAY_PROPERTIES"]["PRICE_NO_INCLUDE"]["NAME"] ?></h4>
                                        <button class="btn btn-link dropdown-toggle p-0 collapsed" type="button"
                                                data-toggle="collapse" data-target="#include_false"
                                                aria-expanded="false" aria-controls="collapseExample"></button>
                                    </div>
                                    <div class="collapse" id="include_false" style="">
                                        <div class="card-body pt-0">


                                            <? if ($arResult["DISPLAY_PROPERTIES"]["PRICE_NO_INCLUDE"]["VALUE"]["TYPE"] == "HTML"): ?>
                                                <?= $arResult["DISPLAY_PROPERTIES"]["PRICE_NO_INCLUDE"]["DISPLAY_VALUE"] ?>
                                            <? else: ?>
                                                <?= $arResult["DISPLAY_PROPERTIES"]["PRICE_NO_INCLUDE"]["DISPLAY_VALUE"] ?>
                                            <? endif ?>


                                        </div>
                                    </div>
                                </div>
                            <? endif ?>

                        </section>
<!--                        <section id="price" class="py-5">-->
<!--                            <div class="change-search-wrapper">-->
<!--                                --><?// echo $GLOBALS["SEARCH_FORM_HTML"]; ?>
<!--                            </div>-->
<!--                            <div class="change-search-wrapper">-->
<!--                                --><?// echo $GLOBALS["SEARCH_OFFERS_RESULT_HTML"]; ?>
<!--                            </div>-->
<!--                        </section>-->

                    <? endif ?>

                    <!--<div class="card card-border card-collapse" id="accordionExample">-->

                    <!--        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">-->
                    <!--            <h5 class="mb-0">-->
                    <!--                <button class="btn btn-link" type="button" >-->
                    <!--                   День 1-->
                    <!--                </button>-->
                    <!--            </h5>-->
                    <!--        </div>-->

                    <!--                <div id="collapseOne" class="card-body collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">-->

                    <!--                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.-->

                    <!--                </div>-->

                    <!--                <div class="card-header collapsed" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">-->
                    <!--                    <h5 class="mb-0">-->
                    <!--                        <button class="btn btn-link collapsed" type="button" >-->
                    <!--                            День 2-->
                    <!--                        </button>-->
                    <!--                    </h5>-->
                    <!--                </div>-->

                    <!--                <div class="card-body collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample">-->
                    <!--                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.-->
                    <!--                </div>-->

                    <!--            <div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
                    <!--                <h5 class="mb-0">-->
                    <!--                    <button class="btn btn-link" type="button" >-->
                    <!--                      День 3-->
                    <!--                    </button>-->
                    <!--                </h5>-->
                    <!--            </div>-->

                    <!--            <div class="card-body collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample">-->
                    <!--                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.-->
                    <!--            </div>-->

                    <!--</div>-->


                    </section>
                </div>
                <div class="col-md-4">
                    <div class="card card-border position-sticky" style="top: 90px">
                        <div class="card-header">
                            <h5 class="mb-0">Менеджер тура</h5>
                        </div>
                        <div class="card-body">
                        <? $APPLICATION->IncludeFile("/include/detail_booking.php", Array(), Array(
                            "MODE" => "html",
                            "NAME" => "Заявка",
                        )); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-py-10 bg-white">

        <div class="container">

            <? $GLOBALS["arFilterTours"] = array(">=PROPERTY_DEPARTURE" => date("Y-m-d")); ?>
            <? $APPLICATION->IncludeComponent(
                "travelsoft:travelsoft.news.list",
                "more_tours",
                array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AFP_106" => "",
                    "AFP_107" => "",
                    "AFP_108" => "",
                    "AFP_110" => "",
                    "AFP_113" => "",
                    "AFP_114" => "",
                    "AFP_116" => "",
                    "AFP_124" => "",
                    "AFP_125" => "",
                    "AFP_137" => "",
                    "AFP_197" => "",
                    "AFP_ID" => "",
                    "AFP_MAX_111" => "",
                    "AFP_MAX_112" => "",
                    "AFP_MAX_117" => "",
                    "AFP_MAX_130" => "",
                    "AFP_MIN_111" => "",
                    "AFP_MIN_112" => "",
                    "AFP_MIN_117" => "",
                    "AFP_MIN_130" => "",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "N",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "N",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "Y",
                    "COMPONENT_TEMPLATE" => "home_slider",
                    "DESCRIPTION_LINK" => "/tours/",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array(
                        0 => "NAME",
                        1 => "PREVIEW_TEXT",
                        2 => "DETAIL_TEXT",
                        3 => "SHOW_COUNTER",
                        4 => "DATE_CREATE",
                        5 => "",
                    ),
                    "FILTER_NAME" => "arFilterTours",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "12",
                    "IBLOCK_TYPE" => "company",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "N",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "4",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Блог",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array(
                        0 => "COUNTRY",
                        1 => "POINT_DEPARTURE",
                        2 => "TOWN",
                        3 => "HOTEL",
                        4 => "ROUTE",
                        5 => "DEPARTURE",
                        6 => "DEPARTURE_TEXT",
                        7 => "DAYS",
                        8 => "PRICE",
                        9 => "PRICE_FOR",
                        10 => "CURRENCY",
                        11 => "HD_DESC",
                        12 => "SHOW_TOUR",
                        13 => "DATE",
                        14 => "TYPE",
                        15 => "DESC",
                        16 => "RECOMMEND",
                        17 => "POPULAR",
                        18 => "PICTURES",
                        19 => "",
                    ),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "SORT",
                    "SORT_BY2" => "NAME",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "ASC",
                    "TEXT_DESCRIPTION" => "Все туры",
                    "TEXT_TITLE" => "Автобусные туры"
                ),
                false
            ); ?>
        </div>
    </div>



<? $this->SetViewTarget("menu-item-detail"); ?>
<? if (!empty($scroll)): ?>
    <? foreach ($scroll as $s): ?>
        <? if (!empty($s)): ?>
            <li><a href="#<?= $s[0] ?>"><?= $s[1] ?></a></li>
        <? endif ?>
    <? endforeach ?>
<? endif ?>
<? $this->EndViewTarget(); ?>
