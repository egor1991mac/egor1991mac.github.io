<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Профиль");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	"tsoperator", 
	array(
		"CHECK_RIGHTS" => "N",
		"SEND_INFO" => "N",
		"SET_TITLE" => "Y",
		"USER_PROPERTY" => array(
			0 => "UF_LEGAL_NAME",
			1 => "UF_LEGAL_ADDRESS",
			2 => "UF_BANK_NAME",
			3 => "UF_BANK_ADDRESS",
			4 => "UF_BANK_CODE",
			5 => "UF_CHECKING_ACCOUNT",
			6 => "UF_ACCOUNT_CURRENCY",
			7 => "UF_UNP",
			8 => "UF_OKPO",
			9 => "UF_ACTUAL_ADDRESS",
			10 => "UF_PASS_NUMBER",
			11 => "UF_PASS_SERIES",
			12 => "UF_ADDRESS",
		),
		"USER_PROPERTY_NAME" => "",
		"COMPONENT_TEMPLATE" => "tsoperator"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>