<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"])>0):?>
<?/*
<div class="widget">
		<ul class="cats">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<li><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></li>
		<?endforeach;?>
		</ul>
</div>
*/?>

<div class="row equal-height cols-1 cols-sm-2 cols-lg-3 gap-10 gap-md-20 gap-xl-30">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					$i++;
                    ?>
                            <? if (!empty($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"])): ?>
                                <?
                                $arImgBig = CFile::ResizeImageGet($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"][0], array("width" => 535, "height" => 268), BX_RESIZE_IMAGE_EXACT, true);
                                $imgbig = $arImgBig["src"];
                                $arImg = CFile::ResizeImageGet($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"][0], array("width" => 253, "height" => 253), BX_RESIZE_IMAGE_EXACT, true);
                                $img = $arImg["src"];
                                ?>
                            <?endif?>
				<div class="col"  id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
						<figure class="image-caption-01"> 
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
								<div class="image overlay-relative caption-relative">
									<img alt="<?=$arItem["NAME"]?>" src="<?=$img?>">
									<div class="overlay-holder opacity-2">
									</div>
									<figcaption class="caption-holder">
										<div class="caption-inner caption-middle text-center">
											<h5><?=$arItem["NAME"]?></h5>

										</div>
									</figcaption>
								</div>
							</a> 
						</figure>
					</div>
                <? endforeach; ?>
            </div>

<?endif?>
