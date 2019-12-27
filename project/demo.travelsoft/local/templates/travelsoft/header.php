<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$oAsset = Bitrix\Main\Page\Asset::getInstance();
CJSCore::Init();
 ?><!DOCTYPE HTML>
<html lang="en">
<head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


		<title><?= $APPLICATION->ShowTitle()?></title>
		<? $APPLICATION->ShowHead() ?>
    <script type="text/javascript" async>!function (t) {
            "use strict";
            t.loadCSS || (t.loadCSS = function () {
            });
            var e = loadCSS.relpreload = {};
            if (e.support = function () {
                var e;
                try {
                    e = t.document.createElement("link").relList.supports("preload")
                } catch (t) {
                    e = !1
                }
                return function () {
                    return e
                }
            }(), e.bindMediaToggle = function (t) {
                function e() {
                    t.media = a
                }

                var a = t.media || "all";
                t.addEventListener ? t.addEventListener("load", e) : t.attachEvent && t.attachEvent("onload", e), setTimeout(function () {
                    t.rel = "stylesheet", t.media = "only x"
                }), setTimeout(e, 3e3)
            }, e.poly = function () {
                if (!e.support()) for (var a = t.document.getElementsByTagName("link"), n = 0; n < a.length; n++) {
                    var o = a[n];
                    "preload" !== o.rel || "style" !== o.getAttribute("as") || o.getAttribute("data-loadcss") || (o.setAttribute("data-loadcss", !0), e.bindMediaToggle(o))
                }
            }, !e.support()) {
                e.poly();
                var a = t.setInterval(e.poly, 500);
                t.addEventListener ? t.addEventListener("load", function () {
                    e.poly(), t.clearInterval(a)
                }) : t.attachEvent && t.attachEvent("onload", function () {
                    e.poly(), t.clearInterval(a)
                })
            }
            "undefined" != typeof exports ? exports.loadCSS = loadCSS : t.loadCSS = loadCSS
        }("undefined" != typeof global ? global : this);</script>

    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/bootstrap.min.css" rel="preload" as="style"
          onload="this.onload=null;this.rel='stylesheet';"/>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/fonts.min.css" rel="preload" as="style"
          onload="this.onload=null;this.rel='stylesheet';"/>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/owl.carousel.css" rel="preload" as="style"
          onload="this.onload=null;this.rel='stylesheet';"/>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/owl.theme.default.css" rel="preload" as="style"
          onload="this.onload=null;this.rel='stylesheet';"/>
    <link href="<?= SITE_TEMPLATE_PATH ?>/css/index.css" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet';">
    <noscript>

        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/fonts.min.css"/>
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/owl.carousel.css"/>
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/owl.theme.default.css"/>
        <link href="<?= SITE_TEMPLATE_PATH ?>/css/index.css" rel="stylesheet">
    </noscript>


    <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/index.js" async></script>
</head>
<body>
<header class="sticky-top">


    <div class="container-fluid  navbar--container">
        <div class="row">
            <div class="container">
                <nav class="navbar navbar-expand-lg d-flex">


                        <? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/logo.php"
                        )); ?>
                    <button class="navbar-toggler px-0 ml-auto" type="button" data-toggle="collapse"
                            data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="icon icon-menu-button"></span>
                    </button>
                    <div class="d-lg-none">
                        <div class="dropdown">
                            <button class="navbar-toggler ml-3 d-block d-lg-none px-0" data-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="icon icon-user"></span></button>
                            <button class="btn btn-outline-secondary ml-3 d-none d-lg-block" data-toggle="dropdown"
                                    href="#" role="button" aria-haspopup="true" aria-expanded="false">Войти
                            </button>
                            <div class="dropdown-menu dropdown-menu-right pl-0">
                                <a class="dropdown-item mx-0" href="#one">Авторизация</a>
                                <a class="dropdown-item mx-0" href="#two">Регистрация</a>
                                <a class="dropdown-item mx-0" href="#two">Востановление пароля</a>
                            </div>
                        </div>

                    </div>
                    <div class="collapse navbar-collapse drawer" id="navbarTogglerDemo01">

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon icon-close-button"></span>
                        </button>

                        <ul class="contact--list navbar-destcop d-none d-lg-flex ml-auto mr-4">
                            <li class="contact--list-item"><span class="icon icon-place-localizer "></span> г. Минск,
                                ул. Веры Хоружей,<br> д. 1А ТЦ Силуэт, 2ой этаж, балконы, офис А7
                            </li>
                            <li class="contact--list-item"><span class="icon icon-clock "></span> Пн - Сб: 10:00 - 19:00
                            </li>

                            <li class="contact--list-item">
                                <span class="icon icon-phone"></span>
                                <span>
                                        +375 (29) 369-45-89 <br>
                                        +375 (29) 777-97-23
                                    </span>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-secondary my-auto ml-3 d-none d-lg-block"
                                data-toggle="modal" data-target="#exampleModal">
                            <span class="icon icon-phone mr-2"></span>
                            Перезвонить мне
                        </button>
                        <!-- <select name="lang" id="#" class="d-none d-lg-block">
                          <option>Русский</options>
                          <option>Английский</option>
                          <option>Китайский</option>
                        </select> -->
                        <div class="card w-100 d-lg-none">
                            <div class="card-body">
                                <?$APPLICATION->IncludeComponent("bitrix:menu", "top-menu-mobile", Array(
                                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                    "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                                    "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                    "MAX_LEVEL" => "2",	// Уровень вложенности меню
                                    "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                                    "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                    "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                    "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                                    "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                                    "COMPONENT_TEMPLATE" => "horizontal_multilevel",
                                    "MENU_THEME" => "site"
                                ),
                                    false
                                );?>
                                <form class="form-inline custom-search ml-md-auto d-lg-none">
                                    <input class="form-control" placeholder="Поиск по сайту" aria-label="Search">
                                    <button class="btn btn-outline-primary p-0" type="submit">
                                        <span class="icon icon-magnifying-glass"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </nav>
                <nav class="navbar navbar-expand-lg navbar-desctop js-collapse_scroll">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "top-menu-desctop", Array(
                        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                        "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                        "DELAY" => "N",	// Откладывать выполнение шаблона меню
                        "MAX_LEVEL" => "2",	// Уровень вложенности меню
                        "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                        "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                        "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                        "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        "COMPONENT_TEMPLATE" => "horizontal_multilevel",
                        "MENU_THEME" => "site"
                    ),
                        false
                    );?>
                    <form class="form-inline custom-search ml-md-auto d-none d-lg-flex">
                        <input class="form-control" placeholder="Поиск по сайту" aria-label="Search">
                        <button class="btn btn-outline-primary p-0" type="submit">
                            <span class="icon icon-magnifying-glass"></span>
                        </button>
                    </form>
                    <div class="d-none d-lg-block">
                        <div class="dropdown">
                            <button class="navbar-toggler ml-3 d-block d-lg-none px-0" data-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="icon icon-user"></span></button>
                            <button class="btn btn-outline-secondary ml-3 d-none d-lg-block" data-toggle="dropdown"
                                    href="#" role="button" aria-haspopup="true" aria-expanded="false">Войти
                            </button>
                            <div class="dropdown-menu dropdown-menu-right pl-0">
                                <a class="dropdown-item mx-0" href="#one">Авторизация</a>
                                <a class="dropdown-item mx-0" href="#two">Регистрация</a>
                                <a class="dropdown-item mx-0" href="#two">Востановление пароля</a>
                            </div>
                        </div>

                    </div>
                </nav>


            </div>
        </div>
    </div>

</header>









<div style="position: relative">
<? if ($APPLICATION->GetCurPage(false) == '/'): ?>
<? $APPLICATION->IncludeComponent(
    "travelsoft:travelsoft.news.list",
    "home_slider",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AFP_ID" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "N",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "N",
        "DISPLAY_PICTURE" => "N",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILE_404" => "",
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "42",
        "IBLOCK_TYPE" => "action",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "N",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "1",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "SUBTITLE",
            1 => "LINK",
            2 => "TEXT",
            3 => "",
            4 => "PICTURES",
            5 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "N",
        "SHOW_404" => "Y",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "slider"
    ),
    false
); ?>


<div class="container">
    <div class="row h-80vh justify-content-center align-items-center mx-0 section-pt-10">

        <? $APPLICATION->IncludeComponent(
            "travelsoft:travelsoft.news.list",
            "home_slider_text",
            array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AFP_ID" => "",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "N",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "N",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "N",
                "DISPLAY_PICTURE" => "N",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "FILE_404" => "",
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "42",
                "IBLOCK_TYPE" => "action",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "1",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array(
                    0 => "SUBTITLE",
                    1 => "LINK",
                    2 => "TEXT",
                    3 => "",
                    4 => "PICTURES",
                    5 => "",
                ),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "Y",
                "SET_TITLE" => "N",
                "SHOW_404" => "Y",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N",
                "COMPONENT_TEMPLATE" => "slider"
            ),
            false
        ); ?>


        <div id="main-search_form-with-tabs-v2">

            <div class="hor-scrolling">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                           aria-controls="pills-home" aria-selected="true"> <span class="icon icon-front-bus mr-1"></span> Автобусные туры</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                           aria-controls="pills-profile" aria-selected="false"><span class="icon icon-airplane mr-1"></span> Авиа туры</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                           aria-controls="pills-contact" aria-selected="false"><span class="icon icon-cruise mr-1" style="font-weight: bolder"></span>Круизы</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row h-100 align-items-end pb-5 mx-0">
                        <div class="col-12 px-0">
                            <div class="card" style="background: transparent">
                                <?
                                $APPLICATION->IncludeComponent('travelsoft:booking.search_form', 'excursiontours', [])
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
    <?endif?>
</div>

<? if ($APPLICATION->GetCurPage(false) !== '/'): ?>
<div <?if(!empty($APPLICATION->GetDirProperty("CSS_CLASS_BG"))):?>class="<?=$APPLICATION->GetDirProperty("CSS_CLASS_BG")?>"<?endif;?>>
    <?if ($APPLICATION->GetDirProperty("SHOW_TITLE_BLOCK") == "Y"):?>
        <?if(!empty($APPLICATION->GetDirProperty("URL_BG_TITLE_BLOCK"))):?>
            <div class="theme-hero-area theme-hero-area-half">
                <div class="theme-hero-area-bg-wrap">
                    <div class="theme-hero-area-bg" style="background-image:url(<?=$APPLICATION->GetDirProperty("URL_BG_TITLE_BLOCK")?>);"></div>
                    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
                    <div class="theme-hero-area-inner-shadow"></div>
                </div>
                <div class="theme-hero-area-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 theme-page-header-abs">
                                <div class="theme-page-header theme-page-header-lg">
                                    <h1 class="theme-page-header-title"><?= $APPLICATION->ShowTitle(false)?></h1>
                                    <p class="theme-page-header-subtitle"><?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", Array(
                                            "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                                            "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                                            "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
                                        ),
                                            false
                                        );?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?else:?>
            <div class="theme-hero-area">
                <div class="theme-hero-area-bg-wrap">
                    <div class="theme-hero-area-bg-pattern theme-hero-area-bg-pattern-ultra-light" style="background-image:url(<?= SITE_TEMPLATE_PATH ?>/img/4.png);"></div>
                    <div class="theme-hero-area-grad-mask"></div>
                </div>
                <div class="theme-hero-area-body">
                    <div class="container">
                        <div class="row _pv-60">
                            <div class="col-md-9 ">
                                <div class="_mob-h">
                                    <div class="theme-hero-text theme-hero-text-white">
                                        <div class="theme-hero-text-header">
                                            <h1 class="theme-hero-text-title _mb-20 theme-hero-text-title-sm"><?= $APPLICATION->ShowTitle(false) ?></h1>
                                        </div>
                                    </div>
                                    <?$APPLICATION->IncludeComponent(
										"bitrix:breadcrumb",
										"template",
										array(
											"PATH" => "",
											"SITE_ID" => "s1",
											"START_FROM" => "0",
											"COMPONENT_TEMPLATE" => "template",
											"COMPOSITE_FRAME_MODE" => "A",
											"COMPOSITE_FRAME_TYPE" => "AUTO"
										),
										false
									);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?endif?>
		<div class="theme-page-section-xl">
    <?endif;?>


    <div class="<?if ($APPLICATION->GetDirProperty("SHOW_FULL_WIDTH") == "Y"):?><?else:?>container<?endif?>">
        <?if ($APPLICATION->GetDirProperty("SHOW_RIGHT_SIDEBAR") == "Y"):?>
        <div class="row">
            <aside class="col-lg-3">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "left_menu",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "COMPONENT_TEMPLATE" => "left.menu",
                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO"
                    ),
                    false
                ); ?>
            </aside>
            <div class="col-lg-9">
                <?endif?>
<?endif?>