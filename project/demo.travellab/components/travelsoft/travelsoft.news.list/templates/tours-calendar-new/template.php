<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
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
\Bitrix\Main\Loader::includeModule("travelsoft.currency");
$bg_i=0;
?>
<?
$arMonth = [
    '01' => [
        'N' => 'Январь',
        'G' => 'Января',
    ],
    '02' => [
        'N' => 'Февраль',
        'G' => 'Февраля',
    ],
    '03' => [
        'N' => 'Март',
        'G' => 'Марта',
    ],
    '04' => [
        'N' => 'Апрель',
        'G' => 'Апреля',
    ],
    '05' => [
        'N' => 'Май',
        'G' => 'Мая',
    ],
    '06' => [
        'N' => 'Июнь',
        'G' => 'Июня',
    ],
    '07' => [
        'N' => 'Июль',
        'G' => 'Июля',
    ],
    '08' => [
        'N' => 'Август',
        'G' => 'Августа',
    ],
    '09' => [
        'N' => 'Сентябрь',
        'G' => 'Сентября',
    ],
    '10' => [
        'N' => 'Октябрь',
        'G' => 'Октября',
    ],
    '11' => [
        'N' => 'Ноябрь',
        'G' => 'Ноября',
    ],
    '12' => [
        'N' => 'Декабрь',
        'G' => 'Декабря',
    ],
];
$mons_n=0;
?>

<? if (!empty($arResult["ITEMS"])): ?>
                    <div class="card card-border" id="calendarbTurov" >
                        <div class="card-header py-4">
                            <div class="d-flex d-md-none w-100 justify-content-center align-items-center">
                                <label for="" class="mb-0 mr-2"> Месяц:</label>
                                <select name="month" id="" >
                                    <option value="0">Все ...</option>
								<?foreach ($arResult["ITEMS"] as $month => $items):?>
									<option value="<?$mons_n++;?>"><?= $arMonth[$month]['N'] ?></option>
								<? endforeach; ?>

                                </select>
                            </div>
                        <div class=" justify-content-center mx-auto d-none d-md-flex">
                            <button class="btn btn-outline-secondary outline-gray mr-3 mb-3 fb-11" data-btnMonth="1">Январь</button>
                            <button class="btn btn-outline-secondary outline-gray mr-3 mb-3 fb-11" data-btnMonth="2">Февраль</button>
                            <button class="btn btn-outline-secondary outline-gray mr-3 mb-3 fb-11" data-btnMonth="3">Март</button>
                            <button class="btn btn-outline-secondary outline-gray  mb-3 fb-11" data-btnMonth="4">Апрель</button>
                        </div>
                            <div class=" justify-content-center mx-auto d-none d-md-flex">
                            <button class="btn btn-outline-secondary outline-gray mr-3   fb-11" data-btnMonth="5">Май</button>
                            <button class="btn btn-outline-secondary outline-gray mr-3   fb-11" data-btnMonth="6">Июнь</button>
                            <button class="btn btn-outline-secondary outline-gray mr-3   fb-11" data-btnMonth="7">Июль</button>
                            <button class="btn btn-outline-secondary outline-gray mr-3   fb-11" data-btnMonth="8">Август</button>
                            <button class="btn btn-outline-secondary outline-gray mr-3   fb-11" data-btnMonth="9">Сентябрь</button>
                            <button class="btn btn-outline-secondary outline-gray mr-3  fb-11" data-btnMonth="10" >Октябрь</button>
                            <button class="btn btn-outline-secondary outline-gray mr-3  fb-11" data-btnMonth="11">Ноябрь</button>
                            <button class="btn btn-outline-secondary outline-gray mr-3  fb-11" data-btnMonth="12">Декабрь</button>
                            <button class="btn btn-outline-secondary outline-gray mr-3 fb-11" data-btnMonth="0">Все...</button>
                            </div>
                        </div>
<div class="card-body p-0 overflow-auto">
                            <table class="table table-striped overflow-auto" style="    min-width: 768px;">
                                <thead>
                                <tr>

                                    <th>
                                        Выезд
                                    </th>
                                    <th>
                                        Дни
                                    </th>
                                    <th>
                                        Маршрут
                                    </th>
                                    <th>
                                        Наличие мест
                                    </th>
                                    <th>
                                        Стоимость
                                    </th>
                                </tr>
                                </thead>
								<tbody>
				<?$mons_n=0;?>
            <?foreach ($arResult["ITEMS"] as $month => $items):?>
                <?$cnt = 1;?>
				<?$mons_n++;?>
				<? foreach ($items as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    $img = '';
                    $date = [];
                    ?>
                    <? if (!empty($arItem["CURDATE"])): ?>
                            <?
                            $dateFrom = strtotime($arItem["CURDATE"]);
                            $dateTo = (strtotime($arItem["CURDATE"]) + $arItem["PROPERTIES"]["duration"]["VALUE"] * 86400);

                            $monthFrom = date('m', $dateFrom);
                            if($month == $monthFrom) {
								//$date = date('d.m', $dateFrom) . ' - ' . date('d.m', $dateTo);
								$date = date('d.m.Y', $dateFrom);
                            }

                            //$date = date('d.m.Y', $dateFrom) . ' - ' . date('d.m.Y', $dateTo);

                            /*$monthFrom = date('m', $dateFrom);
                            $monthTo = date('m', $dateTo);
                            if(date('Y', $dateFrom) != date('Y', $dateTo)) {
                                $date = date('d.m.Y', $dateFrom) . ' - ' . date('d.m.Y', $dateTo);
                            } elseif($monthFrom != $monthTo) {
                                $date = date('d', $dateFrom) . '.' . $monthFrom . ' - ' . date('d', $dateTo) . '.' . $monthTo;
                            } elseif ($dateFrom != $dateTo) {
                                $date = date('d', $dateFrom) . ' - ' . date('d', $dateTo) . '.' . $monthTo;
                            } else {
                                $date = date('d', $dateFrom) . '.' . $monthTo;
                            }*/
                            ?>

                    <? endif ?>
					<? if (!empty($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"])): ?>
					<?
					   $arImg = CFile::ResizeImageGet($arItem["DISPLAY_PROPERTIES"]["PICTURES"]["VALUE"][0], array("width" =>60, "height" => 60), BX_RESIZE_IMAGE_EXACT, true);
					   $img = $arImg["src"];
					   ?>
					<?endif?>
					<?$bg_i++;?>
								<tr data-month="<?=$mons_n;?>">
									<td>
										<strong><?=$date?></strong>
									</td>
									<td>
										<?= num2word($arItem["DISPLAY_PROPERTIES"]["DAYS"]["VALUE"], array("день", "дня", "дней")) ?>
									</td>
									<td>
										<span class="item_cart" id="<?= $this->GetEditAreaId($arItem['ID']); ?>"><a href="/tours/<?=$arItem["CODE"]?>/"><?=$arItem["NAME"]?></a>
                            <? if (!empty($arItem["PROPERTIES"]["ROUTE"]["VALUE"])): ?>
											<small><?= strip_tags($arItem["PROPERTIES"]["ROUTE"]["VALUE"]) ?></small><br>
                            <? elseif (!empty($arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE"])): ?>
                                    <small><? if (count($arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE"]) > 1) {
                                        echo strip_tags(implode(', ', $arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["DISPLAY_VALUE"]));
                                    } else {
                                        echo strip_tags($arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["DISPLAY_VALUE"]);
					   } ?></small><br>
                            <? endif ?>



                      <ul class="card-options card-options-hor-static justify-content-center card-options-sm">
                                <? if (!empty($arItem["DISPLAY_PROPERTIES"]["RECOMMEND"]["VALUE"])): ?>
                                    <li class="card-options--item new"><span class="icon icon-new-label"></span>Рекомендуем</li>
                                <?elseif(!empty($arItem["DISPLAY_PROPERTIES"]["POPULAR"]["VALUE"])):?>
                                    <li class="card-options--item new"><span class="icon icon-new-label"></span>Популярное</li>
                                <?endif?>
                                <?if(!empty($arItem["PROPERTIES"]["TOUR_TYPE"]["VALUE"])):?>
                                    <?$i=$i+30;?>
                                    <li class="card-options--item new"><span class="icon icon-new-label"></span>Горящий тур</li>
                                <?endif?>
                                <?if(!empty($arItem["PROPERTIES"]["NEW"]["VALUE"])):?>
                                    <?$i=$i+30;?>
                                    <li class="card-options--item new"><span class="icon icon-new-label"></span>Новинка</li>
                                <?endif?>
                                <?if(!empty($arItem["PROPERTIES"]["FREE"]["VALUE"])):?>
                                    <?$i=$i+30;?>
                                    <li class="card-options--item new"><span class="icon icon-new-label"></span>Без визы</li>
                                <?endif?>
                                <?if(!empty($arItem["PROPERTIES"]["WITHOUT_NIGHT_TRANSFERS"]["VALUE"])):?>
                                    <?$i=$i+30;?>
                                    <li class="card-options--item new"><span class="icon icon-new-label"></span>Без ночных переездов</li>
                                <?endif?>
                      </ul>
										</span>
									</td>
									<td>
										под запрос
									</td>
									<td>
										<strong><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?> <?if(!empty($arItem["PROPERTIES"]["CURRENCY"]["VALUE"])):?><?=$arItem["PROPERTIES"]["CURRENCY"]["VALUE"]?><?else:?>EUR<?endif?><?if (!empty($arItem["PROPERTIES"]["turusluga"]["VALUE"])):?><br><?=$arItem["PROPERTIES"]["turusluga"]["VALUE"]?> руб<?endif?></strong>
									</td>
								</tr>
				<? endforeach; ?>
			<? endforeach; ?>
							</tbody>
						</table>
				</div>
<? endif ?>

