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
?>
<?if(!empty($arResult["ITEMS"])):?>
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?if($arItem["DISPLAY_PROPERTIES"]["TYPE"]["VALUE_ENUM_ID"] == $k):?>
                <?$str = 200;?>
<?//dm($arItem["DISPLAY_PROPERTIES"]);?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                            <?if(!empty($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"])):?>
                                    <?if(count($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"]) > 1):?>
                                        <?$img["small"] = CFile::ResizeImageGet(
                                            $arItem["DISPLAY_PROPERTIES"]["PICTURES"]["FILE_VALUE"][0]["ID"],
                                            array("width" => 690, "height" => 460),
                                            BX_RESIZE_IMAGE_EXACT,
                                            true
                                        );
                                        $pict = $img["small"]["src"];?>
                                    <?else:?>
                                        <?$img["small"] = CFile::ResizeImageGet(
                                            $arItem["DISPLAY_PROPERTIES"]["PICTURES"]["FILE_VALUE"]["ID"],
                                            array("width" => 690, "height" => 460),
                                            BX_RESIZE_IMAGE_EXACT,
                                            true
                                        );
                                        $pict = $img["small"]["src"];?>
                                    <?endif?>
                            <?else:?>
                                <?$pict = NO_PHOTO_PATH_690_460;?>
                            <?endif?>
					<article class="blog wow fadeIn" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="row no-gutters">
							<div class="col-lg-7">
								<figure>
									<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$pict?>" alt="<?=$arItem["NAME"]?>">
										<div class="preview"><span>Подробнее</span></div>
									</a>
								</figure>
							</div>
							<div class="col-lg-5">
								<div class="post_info">
									<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?><small><?= $arItem["DISPLAY_ACTIVE_FROM"]?></small><?endif?> 
									<h3><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h3>
									<p><?if(!empty($arItem["DISPLAY_PROPERTIES"]["PREVIEW_TEXT"]["VALUE"]["TEXT"])):?>
                            <?= textLength($arItem["DISPLAY_PROPERTIES"]["PREVIEW_TEXT"]["DISPLAY_VALUE"],$str);?>
                        <?elseif(!empty($arItem["DETAIL_TEXT"])):?>
                            <?= textLength($arItem["DETAIL_TEXT"],$str);?>
                        <?elseif(!empty($arItem["DISPLAY_PROPERTIES"]["DESC"]["VALUE"]["TEXT"])):?>
                            <?= textLength($arItem["DISPLAY_PROPERTIES"]["DESC"]["DISPLAY_VALUE"],$str);?>
                        <?endif?></p>
									<ul>
										<li>
											<?if(!empty($arItem["FIELDS"]["SHOW_COUNTER"])):?><i class="icon_comment_alt"></i> <?= $arItem["FIELDS"]["SHOW_COUNTER"]?><?endif?>
										</li>
                    <?if(!empty($arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE"])):?>
                        <li><i class="icon-map110"></i>
                            <?=strip_tags($arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["DISPLAY_VALUE"])?>
                            <?if(!empty($arItem["DISPLAY_PROPERTIES"]["TOWN"]["VALUE"])):?>
                                <?=", ".strip_tags($arItem["DISPLAY_PROPERTIES"]["TOWN"]["DISPLAY_VALUE"])?>
                            <?endif?>
                        </li>
                    <?endif?>
										<li><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a></li>
									</ul>
								</div>
							</div>
						</div>
					</article>

            <?endif?>
        <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
<?endif?>

