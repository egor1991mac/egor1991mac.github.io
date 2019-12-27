<?


if ($_GET['PAGEN_1'] > 0) {
$PAGE = $_GET['PAGEN_1'];
}
elseif ($_GET['PAGEN_2'] > 0) {
$PAGE = $_GET['PAGEN_2'];
} elseif ( $_GET['PAGEN_3'] > 0) {
$PAGE = $_GET['PAGEN_3'];

}

if ($PAGE) {
$GLOBALS['SET_TITLE'] = $APPLICATION->GetTitle() . " cтраница - " . $PAGE;
}