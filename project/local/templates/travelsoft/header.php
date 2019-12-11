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
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"/>
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"/>

		<title><?= $APPLICATION->ShowTitle()?></title>
		<? $APPLICATION->ShowHead() ?>
      <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/font-awesome.css"); ?>
      <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/lineicons.css"); ?>
      <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/weather-icons.css"); ?>


<!--      --><?// $oAsset->addCss(SITE_TEMPLATE_PATH . "/assets/bootstrap.min.css"); ?>

    <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/thema/thema.css"); ?>
    <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/assets/css/owl.carousel.css"); ?>
    <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/assets/css/owl.theme.default.css"); ?>
    <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/styles.css"); ?>


      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/jquery.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/moment.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/assets/js/bootstrap.bundle.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/assets/js/owl.carousel.js");?>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYeBBmgAkyAN_QKjAVOiP_kWZ_eQdadeI&callback=initMap&libraries=places"></script>
<!--      --><?// $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/owl-carousel.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/blur-area.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/icheck.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/gmap.js");?>
<!--      --><?// $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/magnific-popup.js");?>
<!--      --><?// $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/ion-range-slider.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/sticky-kit.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/smooth-scroll.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/fotorama.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/bs-datepicker.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/typeahead.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/quantity-selector.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/countdown.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/window-scroll-action.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/fitvid.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/youtube-bg.js");?>
      <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/custom.js");?>
</head>
<body>
<header style="position: relative;">
    <div class="container-fluid fixed-top navbar--container">
        <div class="row">
            <div class="container">
                <nav class="navbar navbar-expand-lg d-flex">
                    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/logo.php"
                    )); ?>
                    <button
                            class="navbar-toggler px-0 ml-auto"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarTogglerDemo01"
                            aria-controls="navbarTogglerDemo01"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                    >
                        <span class="icon icon-menu-button"></span>
                    </button>
                    <div class="d-lg-none">
                        <div class="dropdown">
                            <button
                                    class="navbar-toggler ml-3 d-block d-lg-none px-0"
                                    data-toggle="dropdown"
                                    href="#"
                                    role="button"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                            >
                                <span class="icon icon-user"></span>
                            </button>
                            <button
                                    class="btn btn-outline-secondary ml-3 d-none d-lg-block"
                                    data-toggle="dropdown"
                                    href="#"
                                    role="button"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                            >
                                Войти
                            </button>
                            <div class="dropdown-menu dropdown-menu-right pl-0">
                                <a class="dropdown-item mx-0" href="#one">Авторизация</a>
                                <a class="dropdown-item mx-0" href="#two">Регистрация</a>
                                <a class="dropdown-item mx-0" href="#two">Востановление пароля</a>
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <button
                                class="navbar-toggler"
                                type="button"
                                data-toggle="collapse"
                                data-target="#navbarTogglerDemo01"
                                aria-controls="navbarTogglerDemo01"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                        >
                            <span class="icon icon-close-button"></span>
                        </button>

                        <ul class="contact--list navbar-destcop d-none d-lg-flex ml-auto mr-4">
                            <li class="contact--list-item">
                                <span class="icon icon-place-localizer "></span> г. Минск, ул. Веры Хоружей,<br/>
                                д. 1А ТЦ Силуэт, 2ой этаж, балконы, офис А7
                            </li>
                            <li class="contact--list-item"><span class="icon icon-clock "></span> Пн - Сб: 10:00 - 19:00
                            </li>

                            <li class="contact--list-item">
                                <span class="icon icon-phone"></span>
                                <span>
                    +375 (29) 369-45-89 <br/>
                    +375 (29) 777-97-23
                  </span>
                            </li>
                        </ul>
                        <button
                                type="button"
                                class="btn btn-secondary my-auto ml-3 d-none d-lg-block"
                                data-toggle="modal"
                                data-target="#exampleModal"
                        >
                            <span class="icon icon-phone mr-2"></span>
                            Перезвонить мне
                        </button>
                        <div class="ml-3">
                            <select name="lang" id="#" class="d-none d-lg-block btn btn-outline-primary">
                                <option>Русский</option>
                                <option>Английский</option>
                                <option>Китайский</option>
                            </select>
                        </div>
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
                            <input class="form-control" placeholder="Поиск по сайту" aria-label="Search"/>
                            <button class="btn btn-outline-success" type="submit">
                                <span class="icon icon-magnifying-glass"></span>
                            </button>
                        </form>
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
                    <input class="form-control" placeholder="Поиск по сайту" aria-label="Search"/>
                    <button class="btn btn-outline-secondary p-0" type="submit">
                        <span class="icon icon-magnifying-glass"></span>
                    </button>
                </form>
                <div class="d-none d-lg-block">
                    <div class="dropdown">
                        <button
                                class="navbar-toggler ml-3 d-block d-lg-none px-0"
                                data-toggle="dropdown"
                                href="#"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                        >
                            <span class="icon icon-user"></span>
                        </button>
                        <button
                                class="btn btn-outline-secondary ml-3 d-none d-lg-block"
                                data-toggle="dropdown"
                                href="#"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                        >
                            Войти
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
    <div class="row h-90vh justify-content-center align-items-center mx-0 section-pt-30 mt-5 mt-lg-0">

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
        <?endif?>
</header>



	<? if ($APPLICATION->GetCurPage(false) !== '/'): ?>
   <div class="theme-page-section theme-page-section-xl theme-page-section-gray">
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
									"SITE_ID" => "s2",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
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
                    <h2 class="theme-hero-text-title _mb-20 theme-hero-text-title-sm"><?= $APPLICATION->ShowTitle(false) ?></h2>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?endif?>
	<?endif;?>


	<div class="<?if ($APPLICATION->GetDirProperty("SHOW_FULL_WIDTH") == "Y"):?>full-width<?else:?>container theme-page-section-lg<?endif?>">
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