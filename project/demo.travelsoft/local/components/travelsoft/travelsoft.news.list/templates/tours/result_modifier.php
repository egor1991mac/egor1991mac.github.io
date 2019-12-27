<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arResult["ICONS"] = array();
$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>SERVICES_ID_IBLOCK), false, false, Array("ID", "NAME", "PROPERTY_PICTURES"));
while($ob = $res->GetNext()){
    $arResult["ICONS"][$ob["ID"]] = array("NAME" => $ob["NAME"], "SRC" => CFile::GetPath($ob["PROPERTY_PICTURES_VALUE"]));
}

if(!empty($arResult["ITEMS"])){

    $arResult["CITIES"] = getCities();

    foreach($arResult["ITEMS"] as $k=>$arItem){

        if (!empty($arItem["DISPLAY_PROPERTIES"]["HOTEL"]["VALUE"])){

            $res = CIBlockElement::GetProperty($arItem["DISPLAY_PROPERTIES"]["HOTEL"]["LINK_IBLOCK_ID"], $arItem["DISPLAY_PROPERTIES"]["HOTEL"]["VALUE"], "sort", "asc", array("CODE" => "SERVICES"));
            while ($ob = $res->GetNext())
            {
                $arResult["ITEMS"][$k]["DISPLAY_PROPERTIES"]["HOTEL"]["VALUES"][$ob['VALUE']] = $arResult["ICONS"][$ob['VALUE']];
            }

            $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arItem["DISPLAY_PROPERTIES"]["HOTEL"]["LINK_IBLOCK_ID"], "ID"=>$arItem["DISPLAY_PROPERTIES"]["HOTEL"]["VALUE"]), false, false, Array("PROPERTY_PREVIEW_TEXT", "PROPERTY_DESC"));
            while($ar_fields = $res->GetNext())
            {
                $arResult["ITEMS"][$k]["DISPLAY_PROPERTIES"]["HOTEL"]["INFO"] = $ar_fields;
            }

        }

    }

}