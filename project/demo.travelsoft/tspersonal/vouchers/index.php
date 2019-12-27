<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Список заказов");
?>

    <?$APPLICATION->IncludeComponent(
	"travelsoft:booking.vouchers.list",
	"tsoperator",
Array()
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>