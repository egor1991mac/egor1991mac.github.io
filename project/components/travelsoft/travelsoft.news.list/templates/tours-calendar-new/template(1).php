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
?>

<? if (!empty($arResult["ITEMS"])): ?>
<table class="table table-striped cart-list">
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
            <?foreach ($arResult["ITEMS"] as $month => $items):?>
                <?$cnt = 1;?>
				<tr><td colspan="5"><div class="h4"><?= $arMonth[$month]['N'] ?> </div></td></tr>
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
								<tr<?if($bg_i % 2 === 0):?> class="bg_gray"<?endif?>>
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
            <? if (!empty($arItem["DISPLAY_PROPERTIES"]["RECOMMEND"]["VALUE"])): ?>
			 	<small class="red">Рекомендуем</small>
            <?elseif(!empty($arItem["DISPLAY_PROPERTIES"]["POPULAR"]["VALUE"])):?>
            	<small>Популярное</small>
            <?endif?>
            <?if(!empty($arItem["PROPERTIES"]["TOUR_TYPE"]["VALUE"])):?>
				<?$i=$i+30;?>
            	<small class="red">Горящий тур</small>
            <?endif?>
            <?if(!empty($arItem["PROPERTIES"]["NEW"]["VALUE"])):?>
				<?$i=$i+30;?>
            	<small class="green">Новинка</small>
            <?endif?>
            <?if(!empty($arItem["PROPERTIES"]["FREE"]["VALUE"])):?>
				<?$i=$i+30;?>
            	<small class="yellow">Без визы</small>
            <?endif?>
            <?if(!empty($arItem["PROPERTIES"]["WITHOUT_NIGHT_TRANSFERS"]["VALUE"])):?>
				<?$i=$i+30;?>
            	<small class="yellow">Без ночных переездов</small>
            <?endif?>
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
<? endif ?>

