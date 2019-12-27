<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
$oAsset = Bitrix\Main\Page\Asset::getInstance();
CJSCore::Init();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name='wmail-verification' content='656eaecd837269469b893f311b6f9c36'/>
        <meta name="description"
              content="Belarus Travel Agency. More than 10 years of experience. Professional tour guides. Full support. More on the site!"/>
        <link rel="canonical" href="https://belarusprimetour.com/"/>
        <meta property="og:locale" content="en_US"/>
        <meta property="og:locale:alternate" content="ru_RU"/>
        <meta property="og:locale:alternate" content="es_ES"/>
        <meta property="og:locale:alternate" content="ja_JP"/>
        <meta property="og:locale:alternate" content="zh_CN"/>
        <meta property="og:locale:alternate" content="fr_FR"/>
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="Belarus Travel Agency in Minsk | Belarus tourism service"/>
        <meta property="og:description"
              content="Belarus Travel Agency. More than 10 years of experience. Professional tour guides. Full support. More on the site!"/>
        <meta property="og:url" content="https://belarusprimetour.com/"/>
        <meta property="og:site_name" content="PrimeTour"/>
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:description"
              content="Belarus Travel Agency. More than 10 years of experience. Professional tour guides. Full support. More on the site!"/>
        <meta name="twitter:title" content="Belarus Travel Agency in Minsk | Belarus tourism service"/>
        <meta name="google-site-verification" content="Y1ddYK6sOHOGUj4f66b4KC17GlTkY4VqFlHKbQghGhQ"/>
        <meta name="yandex-verification" content="0ef482f99873855e"/>
        <script type='application/ld+json' class='yoast-schema-graph yoast-schema-graph--main'>{
                "@context": "https://schema.org",
                "@graph": [
                    {
                        "@type": "Organization",
                        "@id": "https://belarusprimetour.com/#organization",
                        "name": "",
                        "url": "https://belarusprimetour.com/",
                        "sameAs": []
                    },
                    {
                        "@type": "WebSite",
                        "@id": "https://belarusprimetour.com/#website",
                        "url": "https://belarusprimetour.com/",
                        "name": "PrimeTour",
                        "publisher": {
                            "@id": "https://belarusprimetour.com/#organization"
                        },
                        "potentialAction": {
                            "@type": "SearchAction",
                            "target": "https://belarusprimetour.com/?s={search_term_string}",
                            "query-input": "required name=search_term_string"
                        }
                    },
                    {
                        "@type": "WebPage",
                        "@id": "https://belarusprimetour.com/#webpage",
                        "url": "https://belarusprimetour.com/",
                        "inLanguage": "en-US",
                        "name": "Belarus Travel Agency in Minsk | Belarus tourism service",
                        "isPartOf": {
                            "@id": "https://belarusprimetour.com/#website"
                        },
                        "about": {
                            "@id": "https://belarusprimetour.com/#organization"
                        },
                        "datePublished": "2018-09-01T21:30:57+00:00",
                        "dateModified": "2019-09-15T19:23:41+00:00",
                        "description": "Belarus Travel Agency. More than 10 years of experience. Professional tour guides. Full support. More on the site!"
                    }
                ]
            }</script>
        <? /*<link rel='stylesheet' id='contact-form-7-css'  href='https://belarusprimetour.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.0.5' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-reset-css'  href='https://belarusprimetour.com/wp-content/themes/primetour/assets/css/vendor/bootstrap-reboot.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-grid-css'  href='https://belarusprimetour.com/wp-content/themes/primetour/assets/css/vendor/bootstrap-grid.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='fontawesome-css'  href='https://belarusprimetour.com/wp-content/themes/primetour/assets/css/vendor/fontawesome-all.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='animate-css'  href='https://belarusprimetour.com/wp-content/themes/primetour/assets/css/vendor/animate.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-carousel-css'  href='https://belarusprimetour.com/wp-content/themes/primetour/assets/css/vendor/owl.carousel.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-carousel-theme-css'  href='https://belarusprimetour.com/wp-content/themes/primetour/assets/css/vendor/owl.theme.default.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='datepicker-css'  href='https://belarusprimetour.com/wp-content/themes/primetour/assets/css/vendor/datepicker.css' type='text/css' media='all' />
    <link rel='stylesheet' id='primetour-style-css'  href='https://belarusprimetour.com/wp-content/themes/primetour/style.css?ver=0.0.5' type='text/css' media='all' />
    <link rel='https://api.w.org/' href='https://belarusprimetour.com/wp-json/' />
    <link rel='shortlink' href='https://belarusprimetour.com/' />
    <link rel="alternate" type="application/json+oembed" href="https://belarusprimetour.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fbelarusprimetour.com%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://belarusprimetour.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fbelarusprimetour.com%2F&#038;format=xml" />
    <link rel="alternate" href="https://belarusprimetour.com/" hreflang="en" />
    <link rel="alternate" href="https://belarusprimetour.com/ru/" hreflang="ru" />
    <link rel="alternate" href="https://belarusprimetour.com/es/" hreflang="es" />
    <link rel="alternate" href="https://belarusprimetour.com/ja/" hreflang="ja" />
    <link rel="alternate" href="https://belarusprimetour.com/zh/" hreflang="zh" />
    <link rel="alternate" href="https://belarusprimetour.com/fr/" hreflang="fr" />
    <link rel="stylesheet" href=" /css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">*/ ?>

        <title><?= $APPLICATION->ShowTitle() ?></title>
        <? $APPLICATION->ShowHead() ?>



        <!-- CSS   -->
<!--        --><?// $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/animate.css") ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/animate.min.css") ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/contact-form-7.css"); ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/datepicker.css"); ?>
<!--        --><?// $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/primetour-style.css"); ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap-reboot.min.css"); ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap.min.css"); ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/vendor/fontawesome-all.min.css"); ?>
        <? /* $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/font-awesome.css"); ?>
	<? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/font-awesome.min.css"); ?>
	<? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/vendor/font-awesome.min.css"); */ ?>
        <? /* $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/vendor/animate.min.css"); ?>
<? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/vendor/bootstrap-grid.min.css"); */ ?>
        <? // $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/vendor/bootstrap-reboot.min.css"); ?>
        <? // $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/vendor/datepicker.css"); ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/vendor/owl.carousel.min.css"); ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/vendor/owl.theme.default.min.css"); ?>
        <? //$oAsset->addCss(SITE_TEMPLATE_PATH . "/css/vendor/fontawesome-all.min.css"); ?>

        <? //$oAsset->addCss(SITE_TEMPLATE_PATH . "/css/vendor/font-awesome-all.min.css"); ?>
        <? //$oAsset->addCss(SITE_TEMPLATE_PATH . "/css/fontawesome-alll.min.css"); ?>
<!--        --><?// $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/styless.css"); ?>
<!--        --><?// $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/sstyless.css"); ?>
        <? /* $oAsset->addCss(SITE_TEMPLATE_PATH . "/bootstrap/css/bootstrap.min.css") ?>
     <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/bootstrap/css/bootstrap.datepicker.css") */ ?>

        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/main.css") ?>

        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/component.css") ?>


        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/assets/css/vendor/style.css"); ?>

<!--        --><?// $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/fonts/style.css"); ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap/css/bootstrap.min.css"); ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap/css/bootstrap-theme.min.css"); ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/css/style.css"); ?>
        <!-- CSS Font Icons -->
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/icons/ionicons/css/ionicons.css"); ?>
        <? $oAsset->addCss(SITE_TEMPLATE_PATH . "/icons/font-awesome/css/font-awesome.min.css"); ?>
        <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/jquery-3.3.1.min.js"); ?>
        <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/bootstrap.min.js"); ?>
        <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/analytics.js"); ?>
        <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/tag.js"); ?>
        <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/datepicker.min.js"); ?>
        <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/owl.carousel.min.js"); ?>
        <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/wp-embed.min.js"); ?>

        <? $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/main.js"); ?>
<!--        --><?// $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/comment-reply.min.js"); ?>
<!--        --><?// $oAsset->addJs(SITE_TEMPLATE_PATH . "/js/scripts.js"); ?>



<body class="<? if(defined("MAIN_PAGE") && MAIN_PAGE === true):?>home <? endif; ?> page-template-default page page-id-25 wp-custom-logo">
<header class="nav-section js-sticky">
    <div class="header-additional-nav">
        <div class="container">

            <div class="info">
                <a class="phone" href="tel:+375 17 302 34 02">
                    +375 17 302 34 02 </a>
                <a class="email d-none d-md-block" href="mailto:incoming@belarusprimetour.com">
                    incoming@belarusprimetour.com </a>
            </div>

            <div class="social ml-auto mr-3 d-none d-md-block">
                <a target="_blank" href="https://www.facebook.com/FeelBelaruswithPrimeTour/"><i
                            class="fab fa-facebook"></i></a>

                <a target="_blank" href="https://www.instagram.com/belarusprimetour/"><i
                            class="fab fa-instagram"></i></a>

                <a target="_blank" href="https://www.pinterest.com/PrimeTourBelarus/"><i
                            class="fab fa-pinterest"></i></a>

                <a target="_blank" href="https://www.youtube.com/channel/UCidKwL4F5uEBMIKSoETUlBQ"><i
                            class="fab fa-youtube"></i></a>

                <a target="_blank" href="https://www.linkedin.com/company/18755735"><i class="fab fa-linkedin"></i></a>
            </div>
            <a href="/tspersonal/" class="link"> Войти </a>
        </div>
    </div>
    <div class="header-nav">

        <div class="container">
            <a href="http://prime.travelsoft.by" class="custom-logo-link" rel="home" itemprop="url">
                <img src="https://belarusprimetour.com/wp-content/uploads/2018/10/primetour-logo-transparent-dark.png"
                     class="custom-logo" alt="PrimeTour" itemprop="logo">
            </a>

            <nav class="primary">

                    <? /*<li id="menu-item-28" class="menu-item menu-item-type-post_type_archive menu-item-object-tours menu-item-has-children menu-item-28"><a href="https://belarusprimetour.com/tours">Tours</a>
<ul class="sub-menu">
	<li id="menu-item-59" class="menu-item menu-item-type-taxonomy menu-item-object-tour-type menu-item-59"><a href="https://belarusprimetour.com/tour-type/one-day-excursions">One Day Excursions</a></li>
	<li id="menu-item-60" class="menu-item menu-item-type-taxonomy menu-item-object-tour-type menu-item-60"><a href="https://belarusprimetour.com/tour-type/weekend-tours">Weekend Tours</a></li>
	<li id="menu-item-58" class="menu-item menu-item-type-taxonomy menu-item-object-tour-type menu-item-58"><a href="https://belarusprimetour.com/tour-type/multi-day-tours">Multi-Day Tours</a></li>
	<li id="menu-item-57" class="menu-item menu-item-type-taxonomy menu-item-object-tour-type menu-item-57"><a href="https://belarusprimetour.com/tour-type/combined-tours">Combined Tours</a></li>
	<li id="menu-item-2412" class="menu-item menu-item-type-taxonomy menu-item-object-tour-type menu-item-2412"><a href="https://belarusprimetour.com/tour-type/fixed-tours">Fixed Tours</a></li>
	<li id="menu-item-3489" class="menu-item menu-item-type-taxonomy menu-item-object-tour-type menu-item-3489"><a href="https://belarusprimetour.com/tour-type/insentive-ideas">Incentive Ideas</a></li>
</ul>
</li>*/ ?>

                        <? $APPLICATION->IncludeComponent("bitrix:menu", "main_menu", Array(
                            "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                            "DELAY" => "N",    // Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "2",    // Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                            "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                            "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                            "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                            "COMPONENT_TEMPLATE" => "horizontal_multilevel",
                            "MENU_THEME" => "site"
                        ),
                            false
                        ); ?>

                    <? /*li id="menu-item-191" class="menu-item menu-item-type-post_type_archive menu-item-object-hotels menu-item-191"><a href="https://belarusprimetour.com/hotels">Hotels</a></li>
<li id="menu-item-191" class="menu-item menu-item-type-post_type_archive menu-item-object-hotels menu-item-191"><a href="https://belarusprimetour.com/hotels">About us</a></li>
<li id="menu-item-191" class="menu-item menu-item-type-post_type_archive menu-item-object-hotels menu-item-191"><a href="https://belarusprimetour.com/hotels">Rules</a></li>
<li id="menu-item-191" class="menu-item menu-item-type-post_type_archive menu-item-object-hotels menu-item-191"><a href="https://belarusprimetour.com/hotels">Confidence</a></li>

<li id="menu-item-421" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-421"><a href="https://belarusprimetour.com/contacts">Contacts</a></li> */ ?>

            </nav>
            <ul class="language-menu">
                <li class="lang-item lang-item-39 lang-item-en lang-item-first current-lang no-translation"><a
                            lang="en-US" hreflang="en-US" href="https://belarusprimetour.com/"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHzSURBVHjaYkxOP8IAB//+Mfz7w8Dwi4HhP5CcJb/n/7evb16/APL/gRFQDiAAw3JuAgAIBEDQ/iswEERjGzBQLEru97ll0g0+3HvqMn1SpqlqGsZMsZsIe0SICA5gt5a/AGIEarCPtFh+6N/ffwxA9OvP/7//QYwff/6fZahmePeB4dNHhi+fGb59Y4zyvHHmCEAAAW3YDzQYaJJ93a+vX79aVf58//69fvEPlpIfnz59+vDhw7t37968efP3b/SXL59OnjwIEEAsDP+YgY53b2b89++/awvLn98MDi2cVxl+/vl6mituCtBghi9f/v/48e/XL86krj9XzwEEEENy8g6gu22rfn78+NGs5Ofr16+ZC58+fvyYwX8rxOxXr169fPny+fPn1//93bJlBUAAsQADZMEBxj9/GBxb2P/9+S/R8u3vzxuyaX8ZHv3j8/YGms3w8ycQARmi2eE37t4ACCDGR4/uSkrKAS35B3TT////wADOgLOBIaXIyjBlwxKAAGKRXjCB0SOEaeu+/y9fMnz4AHQxCP348R/o+l+//sMZQBNLEvif3AcIIMZbty7Ly6t9ZmXl+fXj/38GoHH/UcGfP79//BBiYHjy9+8/oUkNAAHEwt1V/vI/KBY/QSISFqM/GBg+MzB8A6PfYC5EFiDAABqgW776MP0rAAAAAElFTkSuQmCC"
                                title="English" alt="English"><span style="margin-left:0.3em;"></span></a></li>
                <li class="lang-item lang-item-45 lang-item-ru no-translation"><a lang="ru-RU" hreflang="ru-RU"
                                                                                  href="https://belarusprimetour.com/ru/"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAE2SURBVHjaYvz69T8DAvz79w9CQVj/0MCffwwAAcQClObiAin6/x+okxHMgPCAbOb//5n+I4EXL74ABBALxGSwagTjPzbAyMgItAQggBg9Pf9nZPx//x7kjL9////9C2QAyf9//qCQQCQkxFhY+BEggFi2b/+nq8v46BEDSPQ3w+8//3//BqFfv9BJeXmQEwACCOSkP38YgHy4Bog0RN0vIOMXVOTPH6Cv/gEEEEgDxFKgHEgDXCmGDUAE1AAQQCybGZg1f/d8//XsH0jTn3+///z79RtE/v4NZfz68xfI/vOX+4/0ZoZFAAHE4gYMvD+3/v2+h91wCANo9Z+/jH9VxBkYAAKIBRg9TL//MEhKAuWAogxgZzGC2CCfgUggAoYdGAEVAwQQ41egu5AQAyoXTQoIAAIMAD+JZR7YOGEWAAAAAElFTkSuQmCC"
                                title="Русский" alt="Русский"><span style="margin-left:0.3em;"></span></a></li>
                <li class="lang-item lang-item-49 lang-item-es no-translation"><a lang="es-ES" hreflang="es-ES"
                                                                                  href="https://belarusprimetour.com/es/"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAFnSURBVHjaYvzPgAD/UNlYEUAAmuTYAAAQhAEYqF/zFbe50RZ1cMmS9TLi0pJLRjZohAMTGFUN9HdnHgEE1sDw//+Tp0ClINW/f0NIKPoFJH/9//ULyGaUlQXaABBALAx/Gf4zAt31F4i+ffj3/cN/XrFfzOx//v///f//LzACM/79ZmD8/e8TA0AAMYHdDVT958vXP38nMDB0s3x94/Tj5y+YahhiAKLfQKUAAcQEdtJfoDHMF2L+vPzDmFXLelf551tGFOOhev4A/QgQQExgHwAd8IdFT/Wz6j+GhlpmXSOW/2z///8Eq/sJ18Dw/zdQA0AAMQExxJjjdy9x2/76EfLz4MXdP/i+wsyGkkA3Aw3984cBIIAYfzIwMKel/bt3jwEaLNAwgZIQxp/fDH/+MqqovL14ESCAWICeZvr9h0FSEhSgwBgAygFDEMT+wwAhgQgc4kAEVAwQQIxfUSMSTxxDAECAAQAJWke8v4u1tAAAAABJRU5ErkJggg=="
                                title="Español" alt="Español"><span style="margin-left:0.3em;"></span></a></li>
                <li class="lang-item lang-item-53 lang-item-ja no-translation"><a lang="ja" hreflang="ja"
                                                                                  href="https://belarusprimetour.com/ja/"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAE2SURBVHjaYvz69SsDEvj37x+ERGbAwZ9//wACiAUoysXFBST///8P0QOm//+HU0jgxYsXAAHEAlP0H8HYt+//4SP/f//6b2b238sLrpqRkRFoCUAAsaCrXrv2/8KF///8+f/r9//Dh/8/ffI/OQWiAeJCgABigrseJPT27f/Vq////v3/1y8oWrzk/+PHcEv+/PkDEEBMEM/B3fj/40eo0t9g8suX/w8f/odZAVQMEEAsQAzj/2cQFf3PxARWCrYEaBXQLCkpqB/+/wcqBgggJrjxQPX/hYX/+/v///kLqhpIBgf/l5ODhxiQBAggFriToDoTEv5zcf3ftQuk2s7uf0wM3MdAAPQDQAAxvn37lo+PDy4KZUDcycj4/z9CBojv3r0LEEAgG969eweLSBDEBSCWAAQYACaTbJ/kuok9AAAAAElFTkSuQmCC"
                                title="日本語" alt="日本語"><span style="margin-left:0.3em;"></span></a></li>
                <li class="lang-item lang-item-527 lang-item-zh no-translation"><a lang="zh-CN" hreflang="zh-CN"
                                                                                   href="https://belarusprimetour.com/zh/"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAFqSURBVHjaYrzOwPAPjJgYQEDAleHVbhADIvgHLPgHiQ0QQCxAlkR9NW8sw+cV/1gV/7Gb/hV4+vfzhj8Mv/78//Pn/+/f/8AkhH1t0yaAAAJp4I37zyz2lDfu79uqv/++/WYz+cuq/vvLxt8gdb+A5K9/v34B2SyyskBLAAII5JAva/7/+/z367a/f3/8ZuT9+//Pr78vQUrB6n4CSSj6/RuoASCAWEDO/fD3ddEfhv9/OE3/sKj8/n7k9/fDQNUIs/+DVf8HawAIIJCT/v38C3Hr95N/GDh/f94AVvT7N8RUBpjxQAVADQABBNLw/y/Ifwy/f/399ufTOpDBEPf8g5sN0QBEDAwAAQTWABEChgOSA9BVA00E2wAQQCANQBbEif/AzoCqgLkbbBYwWP/+//sXqBYggFhAkfL7D7OkJFCOCSj65zfUeFjwg8z++/ffX5AGoGKAAGI8jhSRyIw/SJH9D4aAYQoQYAA6rnMw1jU2vQAAAABJRU5ErkJggg=="
                                title="中文 (中国)" alt="中文 (中国)"><span style="margin-left:0.3em;"></span></a></li>
                <li class="lang-item lang-item-599 lang-item-fr no-translation"><a lang="fr-FR" hreflang="fr-FR"
                                                                                   href="https://belarusprimetour.com/fr/"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGzSURBVHjaYiyeepkBBv79+Zfnx/f379+fP38CyT9//jAyMiq5GP77wvDnJ8MfoAIGBoAAYgGqC7STApL///3/9++/pCTv////Qdz/QO4/IMna0vf/z+9/v379//37bUUTQACBNDD8Z/j87fffvyAVX79+/Q8GQDbQeKA9fM+e/Pv18/+vnwzCIkBLAAKQOAY5AIAwCEv4/4PddNUm3ji0QJyxW3rgzE0iLfqDGr2oYuu0l54AYvnz5x9Q6d+/QPQfyAQqAin9B3EOyG1A1UDj//36zfjr1y8GBoAAFI9BDgAwCMIw+P8Ho3GDO6XQ0l4MN8b2kUwYaLszqgKM/KHcDXwBxAJUD3TJ779A8h9Q5D8SAHoARP36+Rfo41+/mcA2AAQQy49ff0Cu//MPpAeI/0FdA1QNYYNVA/3wmwEYVgwMAAHE8uPHH5BqoD1//gJJLADoJKDS378Z//wFhhJAALF8A3rizz8uTmYg788fJkj4QOKREQyYxSWBhjEC/fcXZANAALF8+/anbcHlHz9+ffvx58uPX9KckkCn/gby/wLd8uvHjx96k+cD1UGiGQgAAgwA7q17ZpsMdUQAAAAASUVORK5CYII="
                                title="Français" alt="Français"><span style="margin-left:0.3em;"></span></a></li>
            </ul>
            <button class="nav-toggle"></button>

        </div>
    </div>
</header>


<? /*<script>
        document.querySelector('.falshHeader').style.height = `${document.querySelector('#header').clientHeight}px`
    </script>*/ ?>

<!-- start Main Wrapper -->


<? /* <?if((defined("HOME_PAGE") && HOME_PAGE === false) || !defined("HOME_PAGE")):?>
    <div class="page-title" style="background-image:url('<?if (!empty($APPLICATION->GetDirProperty("URL_IMG_HEADER"))):?><?= $APPLICATION->GetDirProperty("URL_IMG_HEADER") ?><?else:?><?= SITE_TEMPLATE_PATH ?>/images/hero-header/breadcrumb.jpg<?endif;?>');">



                        <div class="col-md-12 left">
							<h1 class="hero-title"><?= $APPLICATION->ShowTitle(false)?></h1>
    <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", Array(
                                "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                                "SITE_ID" => "s2",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                                "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
                            ),
                                false
                            );?>
                        </div>



            </div>


        <?endif;?>*/ ?>