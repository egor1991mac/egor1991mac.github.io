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


    <div class="owl-carousel owl-theme js-main_slider align-self-end" id="main_slider-v3--text">
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="main_slider-v3--item-text">
             <span class="h3">
                   <?= $arItem["NAME"]?>
             </span>
            <?if(!empty( $arItem["PROPERTIES"]["SUBTITLE"]["VALUE"])):?>
                <p><?= $arItem["PROPERTIES"]["SUBTITLE"]["VALUE"] ?></p>
            <?endif;?>
            <a href="#" class="btn btn-secondary">
                <span class="icon icon-book mr-2" style="font-weight: bolder"></span>
                Подробнее
            </a>

        </div>
        <?endforeach;?>
    </div>



<?// $images = getSrc($arItem['DISPLAY_PROPERTIES']['PICTURES']['VALUE'], ['width' => 1800, 'height' => 800], NO_PHOTO_PATH_1920_600, 1) ?>
<!--        --><?//=$this->GetEditAreaId($arItem['ID']);?>
<!--          -->
<!--                  -->
<!--					--><?//= $arItem["DISPLAY_PROPERTIES"]["TEXT"]["DISPLAY_VALUE"] ?>
<!--                </div>-->
<!--				--><?//if(!empty($arItem["PROPERTIES"]["LINK"]["VALUE"])):?><!--<a class="btn _tt-uc _mt-20 btn-white btn-ghost btn-lg" href="--><?//=$arItem["PROPERTIES"]["LINK"]["VALUE"]?><!--"></a>--><?//endif;?>
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!---->
<!--</div>-->








<!--<div class="container ">-->
<!--    <div class="row h-90vh justify-content-center align-items-center mx-0 section-pt-30">-->
<!--        <div class="owl-carousel owl-theme js-main_slider align-self-end" id="main_slider-v3--text">-->
<!--            <div class="main_slider-v3--item-text">-->
<!--              <span class="h3">-->
<!--                Рождество в Санкт-Петербурге!-->
<!--              </span>-->
<!--                <p>-->
<!--                    Канун Рождества – это долгожданное и необыкновенное время в Северной столице. Именно поэтому стоит-->
<!--                    купить тур в Санкт-Петербург и насладиться множеством праздничных событий.-->
<!--                </p>-->
<!--                <a href="#" class="btn btn-secondary">-->
<!--                    <span class="icon icon-book mr-2" style="font-weight: bolder"></span>-->
<!--                    Подробнее-->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <div class="main_slider-v3--item-text">-->
<!--              <span class="h3">-->
<!--                Рождество в Санкт-Петербурге!-->
<!--              </span>-->
<!--                <p>-->
<!--                    Канун Рождества – это долгожданное и необыкновенное время в Северной столице. Именно поэтому стоит-->
<!--                    купить тур в Санкт-Петербург и насладиться множеством праздничных событий.-->
<!--                </p>-->
<!--                <a href="#" class="btn btn-secondary">-->
<!--                    <span class="icon icon-book mr-2" style="font-weight: bolder"></span>-->
<!--                    Подробнее-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div id="main-search_form-with-tabs-v2">-->
<!--            <div class="hor-scrolling">-->
<!--                <ul class="nav nav-pills" id="pills-tab" role="tablist">-->
<!--                    <li class="nav-item">-->
<!--                        <a-->
<!--                                class="nav-link active"-->
<!--                                id="pills-home-tab"-->
<!--                                data-toggle="pill"-->
<!--                                href="#pills-home"-->
<!--                                role="tab"-->
<!--                                aria-controls="pills-home"-->
<!--                                aria-selected="true"-->
<!--                        >-->
<!--                            <span class="icon icon-front-bus mr-1"></span> Автобусные туры</a-->
<!--                        >-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a-->
<!--                                class="nav-link"-->
<!--                                id="pills-profile-tab"-->
<!--                                data-toggle="pill"-->
<!--                                href="#pills-profile"-->
<!--                                role="tab"-->
<!--                                aria-controls="pills-profile"-->
<!--                                aria-selected="false"-->
<!--                        ><span class="icon icon-airplane mr-1"></span> Авиа туры</a-->
<!--                        >-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a-->
<!--                                class="nav-link"-->
<!--                                id="pills-contact-tab"-->
<!--                                data-toggle="pill"-->
<!--                                href="#pills-contact"-->
<!--                                role="tab"-->
<!--                                aria-controls="pills-contact"-->
<!--                                aria-selected="false"-->
<!--                        ><span class="icon icon-cruise mr-1" style="font-weight: bolder"></span>Круизы</a-->
<!--                        >-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="tab-content" id="pills-tabContent">-->
<!--                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">-->
<!--                    <div class="row h-100 align-items-end pb-5 mx-0">-->
<!--                        <div class="col-12 px-0">-->
<!--                            <div class="card">-->
<!--                                <div class="card-body">-->
<!--                                    <form action="" class="d-flex flex-wrap">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for=""-->
<!--                                            ><span class="icon icon-place-localizer mr-1" style="font-weight: bolder"></span>-->
<!--                                                Направление</label-->
<!--                                            >-->
<!--                                            <input type="text" class="form-control" placeholder="leroaum text giv" />-->
<!--                                        </div>-->
<!--                                        <div class="form-group">-->
<!--                                            <label for=""-->
<!--                                            ><span class="icon icon-map2 mr-1" style="font-weight: bolder"></span> Тур</label-->
<!--                                            >-->
<!--                                            <input type="text" class="form-control" placeholder="leroaum text giv" />-->
<!--                                        </div>-->
<!--                                        <div class="form-group">-->
<!--                                            <label for=""><span class="icon icon-calendar mr-1"></span>Когда</label>-->
<!--                                            <input type="text" class="form-control" placeholder="leroaum text giv" />-->
<!--                                        </div>-->
<!--                                        <div class="form-group">-->
<!--                                            <label for=""><span class="icon icon-user mr-1"></span>Пассажиров</label>-->
<!--                                            <input type="text" class="form-control" placeholder="leroaum text giv" />-->
<!--                                        </div>-->
<!---->
<!--                                        <button class="btn btn-secondary flex-grow-1 mx-auto form-group" style="max-width: 50%">-->
<!--                                            <span class="icon icon-magnifying-glass mr-2"></span>-->
<!--                                            Найти-->
<!--                                        </button>-->
<!--                                    </form>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->



