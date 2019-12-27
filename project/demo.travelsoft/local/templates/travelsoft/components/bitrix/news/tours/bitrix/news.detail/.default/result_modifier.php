<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if(!empty($arResult["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE"])) {
    $res = CIBlockElement::GetProperty($arResult["DISPLAY_PROPERTIES"]["COUNTRY"]["LINK_IBLOCK_ID"], $arResult["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE"], "sort", "asc", array("CODE" => "MT_KEY"));
    if ($ob = $res->GetNext())
    {
        $arResult["DISPLAY_PROPERTIES"]["COUNTRY"]["MT_KEY"] = $ob['VALUE'];
    }
}

if(!empty($arResult["DISPLAY_PROPERTIES"]["TOWN"]["VALUE"])) {
    $res = CIBlockElement::GetProperty($arResult["DISPLAY_PROPERTIES"]["TOWN"]["LINK_IBLOCK_ID"], $arResult["DISPLAY_PROPERTIES"]["TOWN"]["VALUE"], "sort", "asc", array("CODE" => "MT_KEY"));
    if ($ob = $res->GetNext())
    {
        $arResult["DISPLAY_PROPERTIES"]["TOWN"]["MT_KEY"] = $ob['VALUE'];
    }
}

if(!empty($arResult["DISPLAY_PROPERTIES"]["DEPARTURE"]["VALUE"])) {
    $res = CIBlockElement::GetProperty($arResult["DISPLAY_PROPERTIES"]["DEPARTURE"]["LINK_IBLOCK_ID"], $arResult["DISPLAY_PROPERTIES"]["DEPARTURE"]["VALUE"], "sort", "asc", array("CODE" => "MT_KEY"));
    if ($ob = $res->GetNext())
    {
        $arResult["DISPLAY_PROPERTIES"]["DEPARTURE"]["MT_KEY"] = $ob['VALUE'];
    }
}

if(!empty($arResult["DISPLAY_PROPERTIES"]["HOTEL"]["VALUE"])) {
    $res = CIBlockElement::GetProperty($arResult["DISPLAY_PROPERTIES"]["HOTEL"]["LINK_IBLOCK_ID"], $arResult["DISPLAY_PROPERTIES"]["HOTEL"]["VALUE"], "sort", "asc", array("CODE" => "MT_KEY"));
    if ($ob = $res->GetNext())
    {
        $arResult["DISPLAY_PROPERTIES"]["HOTEL"]["MT_KEY"] = $ob['VALUE'];
    }
}

global $APPLICATION;

$arResult["GALLERY_BIG"] = array();
$arResult["GALLERY_SMALL"] = array();
$arResult["HOTEL"] = array();
if(!empty($arResult["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"])){
    foreach($arResult["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"] as $k=>$img){
        $big = CFile::ResizeImageGet(
            $img,
            array("width" => 800, "height" => 400),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        $small = CFile::ResizeImageGet(
            $img,
            array("width" => 60, "height" => 60),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        $arResult["GALLERY_BIG"][$k] = $big["src"];
        $arResult["GALLERY_SMALL"][$k] = $small["src"];
    }
}
if(!empty($arResult["DISPLAY_PROPERTIES"]["HOTEL"]["VALUE"])) {

    $iblock_hotels = $arResult["DISPLAY_PROPERTIES"]["HOTEL"]["LINK_IBLOCK_ID"];

    $res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>$iblock_hotels, "ID"=>$arResult["DISPLAY_PROPERTIES"]["HOTEL"]["VALUE"]), false, false, Array("IBLOCK_ID","ID","NAME"));
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();



    }

}

if(!empty($arResult["DISPLAY_PROPERTIES"]["EXCURSIONS"]["VALUE"])) {

    $res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>EXCURSIONS_ID_IBLOCK, "ID"=>$arResult["DISPLAY_PROPERTIES"]["EXCURSIONS"]["VALUE"]), false, false, Array("IBLOCK_ID","ID","NAME","PROPERTY_DESC","PROPERTY_DURATION"));
    while($ob = $res->GetNext())
    {
        $arResult["DISPLAY_PROPERTIES"]["EXCURSIONS"]["ITEMS"][$ob["ID"]] = $ob;
    }

}

if($arResult["IBLOCK_ID"] == COUNTRY_IBLOCK_ID)
{

    $LATLNG = explode(",", $arResult["PROPERTIES"]["MAP"]["VALUE"]);
    $arResult['MAP_SCALE'] = $arResult["PROPERTIES"]["MAP_SCALE"]["VALUE"];
    $arResult['ROUTE_INFO'][] = array(
        "lat" => $LATLNG[0],
        "lng" => $LATLNG[1],
        "title" => $arResult['NAME'],
        "infoWindow" => "<div style='color:red'><b>" . $arResult['NAME'] . "</b></div>"
    );


}
else {
    $TOWN_CODE = "TOWN";
    $MAP_CODE = "PROPERTY_MAP_VALUE";
    $EXURSIONS_CODE = "EXURSIONS";

    $arCities = array();
    $db_cities = CIBlockElement::GetList(Array("SORT" => "ASC"), Array("IBLOCK_ID" => $arResult['PROPERTIES'][$TOWN_CODE]["LINK_IBLOCK_ID"], "ACTIVE" => "Y"), false, false, Array("ID", "NAME", "PROPERTY_MAP"));
    while ($ar_fields = $db_cities->GetNext()) {
        $arCities[$ar_fields["ID"]] = $ar_fields;
    }

    $cnt = 0;
    $cnt = count($arResult['PROPERTIES'][$TOWN_CODE]["VALUE"]);
    foreach ($arResult['PROPERTIES'][$TOWN_CODE]["VALUE"] as $maps) {

        if ($arCities[$maps][$MAP_CODE] != "") {
            $LATLNG = explode(",", $arCities[$maps][$MAP_CODE]);
            $arResult['ROUTE_INFO'][] = array(
                "lat" => $LATLNG[0],
                "lng" => $LATLNG[1],
                "title" => $arCities[$maps]['NAME'],
                "infoWindow" => "<div style='color:red'><b>" . $arCities[$maps]['NAME'] . "</b></div>"
            );
        }

    }
}

$zoom = isset($arResult['MAP_SCALE']) && !empty($arResult['MAP_SCALE']) ? $arResult['MAP_SCALE'] : 5;

$cp = $this->__component;

if (is_object($cp))
{
    $cp->arResult['ROUTE_INFO'] = $arResult['ROUTE_INFO'];
    $cp->arResult['MAP_SCALE'] = $zoom;

    $arResult['MAP_SCALE'] = $cp->arResult['MAP_SCALE'];
    $cp->SetResultCacheKeys(array('ROUTE_INFO', 'MAP_SCALE'));

}