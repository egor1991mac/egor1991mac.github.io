<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
/* $this->addExternalCss(SITE_TEMPLATE_PATH . "/css/select2/select2.min.css");
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/select2/select2.min.js", true);
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/travelsoft.jquery.js");
$this->addExternalCss(SITE_TEMPLATE_PATH . "/css/ion.rangeSlider.min.css");
$this->addExternalCss(SITE_TEMPLATE_PATH . "/css/flaticon.css");
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/raphael-2.1.4.min.js");
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/justgage.min.js");
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/score.js");
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/ion.rangeSlider.min.js");
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/switchery.min.js");
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/theia-sticky-sidebar.min.js"); */
?>
<?
ob_start();
    $APPLICATION->IncludeComponent(
    "bitrix:catalog.smart.filter",
    ".default_2",
    array(
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "DISPLAY_ELEMENT_COUNT" => "N",
        "FILTER_NAME" => $arParams["FILTER_NAME"],
        "FILTER_VIEW_MODE" => "vertical",
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "PAGER_PARAMS_NAME" => "arrPager",
        "POPUP_POSITION" => "left",
        "SAVE_IN_SESSION" => "N",
        "SECTION_CODE" => "",
        "SECTION_CODE_PATH" => "",
        "SECTION_DESCRIPTION" => "-",
        "SECTION_ID" => "",
        "SECTION_TITLE" => "-",
        "SEF_MODE" => "N",
        "SEF_RULE" => "",
        "SMART_FILTER_PATH" => "",
        "TEMPLATE_THEME" => "blue",
        "XML_EXPORT" => "N",
        "COMPONENT_TEMPLATE" => "tours",
        "SEF_FOLDER" => $arResult["FOLDER"],
    ),
    $component
);
$strComponentSmart = ob_get_contents();
ob_end_clean();;
?>
<div class="theme-page-section-gray section-py-10">
<div class="container">
   <div class="row">

	   <aside class="col-lg-3">
         <? if ($arParams["USE_FILTER"] == "Y"): ?>
             <div class="navbar-collapse drawer navbar-expand-lg" id="navbarTogglerDemo02">
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="icon icon-close-button"></span>
                 </button>
                 <div class="card card-border w-100 ">
                     <div class="card-body px-3">
                         <?= $strComponentSmart ?>
                     </div>
                 </div>
             </div>
         <? endif ?>


      </aside>
      <div class="col-lg-9" id="list_sidebar">
          <h1 class="h3 mb-0 text-center text-lg-left">
              <?= $APPLICATION->ShowTitle(false) ?>
          </h1>
          <div class="d-flex justify-content-between align-items-center mb-2 flex-column flex-lg-row">
              <?$APPLICATION->IncludeComponent(
                  "bitrix:breadcrumb",
                  "template",
                  array(
                      "PATH" => "",
                      "SITE_ID" => "s3",
                      "START_FROM" => "0",
                      "COMPONENT_TEMPLATE" => "breadcrumb",
                      "COMPOSITE_FRAME_MODE" => "A",
                      "COMPOSITE_FRAME_TYPE" => "AUTO"
                  ),
                  false
              );?>



              <div class="sort-filter mb-3">

                  <div class="form-group d-flex align-items-center mr-3 ml-lg-auto mb-0">
                      <label for="">по цене:</label>
                      <button class="btn btn-sm outline-gray p-0 ml-1"><span class="icon-sort-amount-asc"></span></button>
                  </div>
                  <div class="form-group d-flex align-items-center mb-0">
                      <label for="">по дате:</label>
                      <button class="btn btn-sm outline-gray p-0 ml-1"><span class="icon-sort-amount-asc"></span></button>
                  </div>

                  <button class=" btn outline-gray navbar-toggler p-0 ml-auto mx-0 d-lg-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="icon  icon-equalizer"></span>
                  </button>
              </div>
          </div>


		<?$APPLICATION->IncludeComponent(
			"travelsoft:travelsoft.news.list",
			"tours",
			Array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"NEWS_COUNT" => $arParams["NEWS_COUNT"],
				"SORT_BY1" => $arParams["SORT_BY1"],
				"SORT_ORDER1" => $arParams["SORT_ORDER1"],
				"SORT_BY2" => $arParams["SORT_BY2"],
				"SORT_ORDER2" => $arParams["SORT_ORDER2"],
				"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
				"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
				"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
				"MESSAGE_404" => $arParams["MESSAGE_404"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404" => $arParams["SHOW_404"],
				"FILE_404" => $arParams["FILE_404"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_FILTER" => $arParams["CACHE_FILTER"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
				"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
				"PAGER_TITLE" => $arParams["PAGER_TITLE"],
				"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
				"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
				"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
				"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
				"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
				"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
				"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
				"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
				"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
				"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
				"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
				"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
				"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
				"CHECK_DATES" => $arParams["CHECK_DATES"],
			),
			$component
		);?>
      </div>
   </div>
   <!-- /row -->
</div>
</div>
<!-- /container -->
            <?$APPLICATION->IncludeFile("/include/help_block_footer.php", Array(), Array(
               "MODE"      => "html",
               "NAME"      => "Помощь блок над подвалом",
               ));?>

