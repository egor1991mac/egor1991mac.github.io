<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Путевка");
?>
<? $APPLICATION->IncludeComponent(
    "travelsoft:booking.supage",
    "tsoperator",
    array(
        "IS_TEST" => "N",
        "COMPONENT_TEMPLATE" => "tsoperator"
    ),
    false
); ?>

    <div class="row" style="margin-top: 1rem">
        <div class="col-12 col-lg-9">
            <? $APPLICATION->IncludeComponent(
                "travelsoft:booking.vouchers.detail.desc-info",
                "tsoperator",
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "DOCS_FOR_AGENTS" => array(
                        0 => "2",
                        1 => "4",
                        2 => "8",
                        3 => "9",
                    ),
                    "DOCS_FOR_CLIENTS" => array(
                        0 => "2",
                        1 => "4",
                        2 => "5",
                    ),
                    "VOUCHER_ID" => $_REQUEST["voucher_id"],
                    "PAYMENTS" => array(
                        0 => "belassist",
                    ),
                    "STATUSES_FOR_PAYMENT" => array(
                        0 => "8",
                    )
                ),
                false
            ); ?>

                <? $APPLICATION->IncludeComponent(
                    "travelsoft:booking.tourists_form_add",
                    "tsoperator",
                    array(
                        "ADDITING_ALLOWED_DAYS" => "1",
                        "ORDER_LIST_PAGE" => "/tspersonal/vouchers/",
                        "REQUIRED_FIELDS" => array(
                            0 => "UF_LAST_NAME",
                            1 => "UF_NAME",
                        ),
                        "SHOW_FIELDS" => array(
                            0 => "UF_LAST_NAME",
                            1 => "UF_NAME",
                            2 => "UF_SECOND_NAME",
                            3 => "UF_BIRTHDATE",
                            4 => "UF_EMAIL",
                            5 => "UF_PHONE",
                            6 => "UF_LAT_NAME",
                            7 => "UF_LAT_LAST_NAME",
                            8 => "UF_MALE",
                            9 => "UF_PASS_NUMBER",
                            10 => "UF_PASS_DATE_ISSUE",
                        ),
                        "VOUCHER_ID" => $_REQUEST["voucher_id"],
                        "COMPONENT_TEMPLATE" => "tsoperator"
                    ),
                    false
                ); ?>
                <? $APPLICATION->IncludeComponent(
                    "travelsoft:booking.messager",
                    "",
                    Array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "VOUCHER_ID" => $_REQUEST["voucher_id"]
                    )
                ); ?>

        </div>

        <div class="col-xs-12 col-md-3 ts-order-lg-1">
            <? $APPLICATION->IncludeComponent(
	"travelsoft:booking.vouchers.detail.tech-info", 
	"tsoperator", 
	array(
		"COMPONENT_TEMPLATE" => "tsoperator",
		"DOCS_FOR_AGENTS" => array(
			0 => "1",
		),
		"DOCS_FOR_CLIENTS" => array(
		),
		"VOUCHER_ID" => $_REQUEST["voucher_id"],
		"PAYMENTS" => array(
			0 => "belassist",
		),
		"STATUSES_FOR_PAYMENT" => array(
			0 => "7",
		),
		"SHOW_TOURSERVICE_PAYMENT_BTN" => "Y",
		"SHOW_TOURPRODUCT_PAYMENT_BTN" => "N"
	),
	false
); ?>
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>