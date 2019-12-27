<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!empty($arResult["ITEMS"])) {

    $arResult["CITIES"] = getCities();

    foreach($arResult["ITEMS"] as $k=>$arItem){

        if (!empty($arItem["DISPLAY_PROPERTIES"]["HOTEL"]["VALUE"])){

            $res = CIBlockElement::GetProperty($arItem["DISPLAY_PROPERTIES"]["HOTEL"]["LINK_IBLOCK_ID"], $arItem["DISPLAY_PROPERTIES"]["HOTEL"]["VALUE"], "sort", "asc", array("CODE" => "SERVICES"));
            while ($ob = $res->GetNext())
            {
                $arResult["ITEMS"][$k]["DISPLAY_PROPERTIES"]["HOTEL"]["VALUES"][$ob['VALUE']] = $arResult["ICONS"][$ob['VALUE']];
            }

        }
        if(!empty($arItem["DISPLAY_PROPERTIES"]["DATE"]["VALUE"])){
            if(is_array($arItem["DISPLAY_PROPERTIES"]["DATE"]["DISPLAY_VALUE"])){
                foreach($arItem["DISPLAY_PROPERTIES"]["DATE"]["DISPLAY_VALUE"] as $t=>$item){
                    if($t == "0"){
                        $date = $item;
                    }
                    else if(date($date) > date($item)){
                        $date = $item;
                    }
                }
            }
            else{
                $date = $arItem["DISPLAY_PROPERTIES"]["DATE"]["DISPLAY_VALUE"];
            }
            if(!empty($date)){
                $arResult["ITEMS"][$k]["DISPLAY_PROPERTIES"]["DATE_FORMATTED"] = CIBlockFormatProperties::DateFormat("d.m.Y", MakeTimeStamp($date, CSite::GetDateFormat()));
            }
        }

    }

}