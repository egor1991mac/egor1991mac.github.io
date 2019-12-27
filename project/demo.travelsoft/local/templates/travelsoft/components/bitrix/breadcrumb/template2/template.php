<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult))
    return "";

$strReturn = '';


//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
//$css = $APPLICATION->GetCSSArray();
//if (!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css)) {
//    $strReturn .= '<link href="' . CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css") . '" type="text/css" rel="stylesheet" />' . "\n";
//}

$itemSize = count($arResult);




$strReturn .= '
<nav aria-label="breadcrumb"> <ol class="breadcrumb breadcrumb-white">
<li class="breadcrumb-item"><a href="/"><span class="icon-home3 mr-2"></span>Главная</a></li>';

for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

//    $nextRef = ($index < $itemSize - 2 && $arResult[$index + 1]["LINK"] <> "" ? ' itemref="bx_breadcrumb_' . ($index + 1) . '"' : '');
//    $child = ($index > 0 ? ' itemprop="child"' : '');
//    $arrow = ($index > 0 ? '' : '');
    if ($index != $itemSize-1) {
        $strReturn .= '
			<li class="breadcrumb-item" id="bx_breadcrumb_' . $index . '" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
             <a href="' . $arResult[$index]["LINK"] . '" title="' . $title . '" itemprop="url">' . $title . ' </a></li>';
    } else {  $strReturn .= '<li class="breadcrumb-item active" id='. $index .'> 
' .$title. '
</li>';
    }
}

$strReturn .= '</ol> </nav>';

return $strReturn;