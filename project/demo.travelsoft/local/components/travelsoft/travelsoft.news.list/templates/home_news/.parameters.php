<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
);

$arTemplateParameters = array(
    "TEXT_TITLE" => Array(
        "NAME" => GetMessage("T_IBLOCK_TEXT_TITLE"),
        "TYPE" => "STRING",
    ),
    "TEXT_DESCRIPTION" => Array(
        "NAME" => GetMessage("T_IBLOCK_TEXT_DESCRIPTION"),
        "TYPE" => "STRING",
    ),
    "DESCRIPTION_LINK" => Array(
        "NAME" => GetMessage("T_IBLOCK_DESCRIPTION_LINK"),
        "TYPE" => "STRING",
    ),
);
?>
