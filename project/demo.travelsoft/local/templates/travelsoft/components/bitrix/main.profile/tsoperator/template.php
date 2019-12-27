<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
CJSCore::Init(['date']);
?>

<div class="bx-auth-profile">

    <? ShowError($arResult["strProfileError"]); ?>
    <?
    if ($_SESSION['TS:OPERATOR_JUST_REGISTRATED']) {
        ?><div class="alert alert-success">Спасибо! Вы были успешно авторизованы. На этой странице Вы можете заполнить свой профиль.</div><?
        unset($_SESSION['TS:OPERATOR_JUST_REGISTRATED']);
    }
    if ($arResult['DATA_SAVED'] == 'Y') {
        ?><div class="alert alert-success"><?= ShowNote(GetMessage('PROFILE_DATA_SAVED'));?></div><?
    }
    ?>
    <script type="text/javascript">
        <!--
        var opened_sections = [<?
    $arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"] . "_user_profile_open"];
    $arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
    if (strlen($arResult["opened"]) > 0) {
        echo "'" . implode("', '", explode(",", $arResult["opened"])) . "'";
    } else {
        $arResult["opened"] = "reg";
        echo "'reg'";
    }
    ?>];
        //-->

        var cookie_prefix = '<?= $arResult["COOKIE_PREFIX"] ?>';
    </script>
    <form method="post" id="profile-form" name="form1" class="p-3" style="border: 1px solid #e1e1e1" action="<?= $arResult["FORM_TARGET"] ?>" enctype="multipart/form-data">
        <?= $arResult["BX_SESSION_CHECK"] ?>
        <input type="hidden" name="lang" value="<?= LANG ?>" />
        <input type="hidden" name="ID" value=<?= $arResult["ID"] ?> />


        <div class="profile-block-shown" id="user_div_reg">
            <table class="profile-table data-table ">

                <tbody>
                    <?
                    if ($arResult["ID"] > 0) {
                        ?>
                        <?
                        if (strlen($arResult["arUser"]["TIMESTAMP_X"]) > 0) {
                            ?>
                            <tr>
                                <td><?= GetMessage('LAST_UPDATE') ?></td>
                                <td><?= $arResult["arUser"]["TIMESTAMP_X"] ?></td>
                            </tr>
                            <?
                        }
                        ?>
                        <?
                        if (strlen($arResult["arUser"]["LAST_LOGIN"]) > 0) {
                            ?>
                            <tr>
                                <td><?= GetMessage('LAST_LOGIN') ?></td>
                                <td><?= $arResult["arUser"]["LAST_LOGIN"] ?></td>
                            </tr>
                            <?
                        }
                        ?>
                        <?
                    }
                    ?>
                    <tr>
                        <td><?= GetMessage('NAME') ?></td>
                        <td><input class="form-control" type="text" name="NAME" maxlength="50" value="<?= $arResult["arUser"]["NAME"] ?>" /></td>
                    </tr>
                    <tr>
                        <td><?= GetMessage('LAST_NAME') ?></td>
                        <td><input class="form-control" type="text" name="LAST_NAME" maxlength="50" value="<?= $arResult["arUser"]["LAST_NAME"] ?>" /></td>
                    </tr>
                    <tr>
                        <td><?= GetMessage('SECOND_NAME') ?></td>
                        <td><input class="form-control" type="text" name="SECOND_NAME" maxlength="50" value="<?= $arResult["arUser"]["SECOND_NAME"] ?>" /></td>
                    </tr>
                    <tr>
                        <td><?= GetMessage('EMAIL') ?><? if ($arResult["EMAIL_REQUIRED"]): ?><span class="starrequired">*</span><? endif ?></td>
                        <td>
                            <input type="hidden" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"] ?>" />
                            <input data-alert-text="<?= GetMessage("TRAVELBOOKING_EMPTY_EMAIL") ?>" class="form-control" type="email" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"] ?>" /></td>
                    </tr>
                    <? if ($arResult["arUser"]["EXTERNAL_AUTH_ID"] == ''): ?>
                        <tr>
                            <td>
                                <div class="d-flex flex-column" style="line-height: 1.3">
                                <?= GetMessage('NEW_PASSWORD_REQ') ?>
                                <small style="color: gray; font-size: 12px"><?= GetMessage('NEW_PASSWORD')?></small>
                                </div>
                            </td>
                            <td><input class="form-control" type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input" />
                                <? if ($arResult["SECURE_AUTH"]): ?>
                                    <span class="bx-auth-secure" id="bx_auth_secure" title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
                                        <div class="bx-auth-secure-icon"></div>
                                    </span>
                                    <noscript>
                                    <span class="bx-auth-secure" title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
                                        <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                                    </span>
                                    </noscript>
                                    <script type="text/javascript">
                                        document.getElementById('bx_auth_secure').style.display = 'inline-block';
                                    </script>
                                </td>
                            </tr>
                        <? endif ?>
                        <tr>
                            <td><?= GetMessage('NEW_PASSWORD_CONFIRM') ?></td>
                            <td><input class="form-control" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" /></td>
                        </tr>
                    <? endif ?>
                </tbody>
            </table>
        </div>
        <?
        \Bitrix\Main\Loader::includeModule('travelsoft.travelbooking');

        $agency = [];
        $user = travelsoft\booking\stores\Users::getById($USER->GetID(), ['ID', 'UF_AGENCY', 'UF_MAIN']);
        if (travelsoft\booking\adapters\User::haveAgentGroup()) {
            $agency_id = $user['UF_AGENCY'];
            if ($agency_id > 0) {
                $agency = travelsoft\booking\stores\Agency::getById($agency_id);
            }
        }

        if (!empty($agency)):
            $readonly = $user['UF_MAIN'] > 0 ? 0 : 1;
            ?>
            <script>window.agency_save_ajax_url = "<?= $templateFolder?>/ajax.php";</script>
<!--            <div class="profile-link profile-user-div-link"><a title="--><?//= GetMessage("USER_SHOW_HIDE") ?><!--" href="javascript:void(0)" onclick="SectionClick('agency')">Данные агентства</a></div>-->
            <div id="user_div_agency" class="profile-block-<?= strpos($arResult["opened"], "agency") === false ? "hidden" : "shown" ?>">
                <table class="data-table profile-table">
                    <thead>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                    <input type="hidden" id="agency-id" value="<?= $agency['ID'] ?>">
                    <tr>
                        <td>Краткое название</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="short-name"  maxlength="255" value="<?= $agency['UF_SHORT_NAME'] ?>" /></td>
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="legal-name"  maxlength="255" value="<?= $agency['UF_LEGAL_NAME'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Юр. адрес</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="legal-address"  maxlength="255" value="<?= $agency['UF_LEGAL_ADDRESS'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Договор</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="contract" maxlength="255" value="<?= $agency['UF_CONTRACT_NUMBER'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Дата начала действия договора</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<?else:?>onclick="BX.calendar({node: this, field: this, bTime: false});"<? endif ?> id="contract-date-from" maxlength="255" value="<?= $agency['UF_CONTRACT_DF'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Дата окончания действия договора</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<?else:?>onclick="BX.calendar({node: this, field: this, bTime: false});"<? endif ?> id="contract-date-to" maxlength="255" value="<?= $agency['UF_CONTRACT_DT'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Фактический адрес</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="actual-address"  maxlength="255" value="<?= $agency['UF_ACTUAL_ADDRESS'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>УНП</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="unp" maxlength="255" value="<?= $agency['UF_UNP'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>ОКПО</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="okpo" maxlength="255" value="<?= $agency['UF_OKPO'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Расчетный счет</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="checking-account" maxlength="255" value="<?= $agency['UF_CHECKING_ACCOUNT'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Валюта расчетного счета</td>
                        <td>
                            <select class="form-control" <? if ($readonly): ?>disabled<? endif ?> id="account-currency">
                                <? foreach (travelsoft\booking\adapters\CurrencyConverter::getAcceptableISO() as $currency): ?>
                                    <option <? if ($currency['ISO'] == $agency['UF_ACCOUNT_CURRENCY']): ?>selected<? endif ?> value="<?= $currency['ISO'] ?>"><?= $currency['ISO'] ?></option>
                                <? endforeach; ?>
                            </select>
                    </tr>

                    <tr>
                        <td>Наименование банка</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="bank-name"  maxlength="255" value="<?= $agency['UF_BANK_NAME'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Код банка</td>
                        <td><input autocomplete="" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="bik" maxlength="255" value="<?= $agency['UF_BIK'] ?>" /></td>
                    </tr>

                    <tr>
                        <td>Адрес банка</td>
                        <td><input autocomplete="off" class="form-control" type="text" <? if ($readonly): ?>disabled<? endif ?> id="bank-address"  maxlength="255" value="<?= $agency['UF_BANK_ADDRESS'] ?>" /></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        <? endif ?>
<!--        <div class="profile-link profile-user-div-link"><a title="--><?//= GetMessage("USER_SHOW_HIDE") ?><!--" href="javascript:void(0)" onclick="SectionClick('personal')">--><?//= GetMessage("USER_PERSONAL_INFO") ?><!--</a></div>-->
        <div id="user_div_personal" class="profile-block-shown">
            <table class="data-table profile-table">
                <thead>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= GetMessage('USER_PHONE') ?></td>
                        <td><input class="form-control" type="phone" name="PERSONAL_PHONE" maxlength="255" value="<?= $arResult["arUser"]["PERSONAL_PHONE"] ?>" /></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <? // ******************** /User properties *************************************************** ?>


        <div class="d-flex justify-content-end mt-20"><button class="btn btn-primary" type="submit" name="save" value="<?= (($arResult["ID"] > 0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD")) ?>"><?= (($arResult["ID"] > 0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD")) ?></button>&nbsp;&nbsp;<input class="btn btn-primary" type="reset" value="<?= GetMessage('MAIN_RESET'); ?>"></div>
    </form>

</div>
