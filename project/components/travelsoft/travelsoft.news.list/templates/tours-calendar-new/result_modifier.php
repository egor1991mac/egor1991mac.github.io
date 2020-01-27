<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


$results["ITEMS"] = array();

foreach ($arResult["ITEMS"] as $key=>$arItem){
    $timestamp = time();
    $curdate = null;
    foreach ($arItem["PROPERTIES"]["DEPARTURE"]["VALUE"] as $k=>$date) {
        $date_timestamp = MakeTimestamp($date);
        if ($date_timestamp > $timestamp) {
            $curdate = $date_timestamp;
            $arItem["CURDATE"] = date("d.m.Y", $curdate);
            $results["ITEMS"][] = $arItem;
        }
    }
}

usort($results["ITEMS"], function ($a, $b) {
    if (MakeTimestamp($a["CURDATE"]) == MakeTimestamp($b["CURDATE"])) {
        return 0;
    }
    return (MakeTimestamp($a["CURDATE"]) < MakeTimestamp($b["CURDATE"])) ? -1 : 1;
});

$result = array();
foreach ($results["ITEMS"] as $arItem) {
    if(!empty($arItem["CURDATE"])) {
        $month = date('m', strtotime($arItem["CURDATE"]));
        $result[$month][] = $arItem;
    }
}



$arResult["ITEMS"] = $result;