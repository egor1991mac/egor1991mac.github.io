<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<!--    <div class="map-contact-wrapper">-->
<!---->
<!--    </div>-->
<!--    <div class="theme-page-section theme-page-section-xxl">-->
<!--        <div class="container">-->
<!--            <div class="row gap-40">-->
<!--                <div class="col-12 col-lg-8 order-1 order-lg-0">-->
<!--					--><?//\Bitrix\Main\Loader::includeModule('iblock')?>
<!--					 --><?//$APPLICATION->IncludeComponent(
//	"travelsoft:travelsoft.feedback",
//	"contacts",
//	array(
//		"AJAX_MODE" => "Y",
//		"AJAX_OPTION_HISTORY" => "N",
//		"AJAX_OPTION_JUMP" => "N",
//		"AJAX_OPTION_SHADOW" => "N",
//		"AJAX_OPTION_STYLE" => "N",
//		"EMAIL_TO" => "trips@gotrips.by",
//		"EVENT_MESSAGE_ID" => array(
//		),
//		"IBLOCK_ID" => "24",
//		"IBLOCK_TYPE" => "request",
//		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
//		"PROPERTY_CODES" => array(
//		),
//		"PROPERTY_CODES_REQUIRED" => array(
//		),
//		"REQUIRED_FIELDS" => array(
//			0 => "NAME",
//			1 => "EMAIL",
//			2 => "MESSAGE",
//		),
//		"TEXT_DESCRIPTION" => "Просто напиши и отдыхай! Оставьте заявку на подбор тура специалистами!",
//		"TEXT_TITLE" => "напишите нам",
//		"USE_CAPTCHA" => "N",
//		"COMPONENT_TEMPLATE" => "contacts"
//	),
//	false
//);?>
<!--                </div>-->
<!--                <div class="col-12 col-lg-4 order-0 order-lg-1">-->
<!---->
<!--                    <div class="theme-page-section-header _ta-l">-->
<!--                        <h5 class="theme-page-section-title">Контакты</h5>-->
<!--                    </div>-->
<!---->
<!---->
<!---->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <main class="section-py-10 h-50vh container-fluid" style="background: url(<?= SITE_TEMPLATE_PATH ?>/img/slider-104.jpg); background-size: cover ">

        <div class="container card card-border ">

            <div class="row card-body flex-row">


                <div class="col-12 col-md-5">
                    <h1>Контакты</h1>
                    <div class="hr"></div>
                    <?$APPLICATION->IncludeFile("/include/contact_page.php", Array(), Array(
                        "MODE"      => "html",
                        "NAME"      => "О компании (текст)",
                    ));?>
                </div>
                <div class="col-12 col-md-7 overflow-hidden">
                    <iframe src="https://yandex.by/map-widget/v1/-/CGhWmVIh" width="100%" height="500px" frameborder="0"
                            allowfullscreen="true"></iframe>
                </div>
            </div>
        </div>



    </main>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>