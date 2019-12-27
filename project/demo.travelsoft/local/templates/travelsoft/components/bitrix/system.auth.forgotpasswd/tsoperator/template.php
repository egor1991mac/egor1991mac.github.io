<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
$APPLICATION->SetTitle(GetMessage('password_recovery'));
$APPLICATION->SetPageProperty('title', GetMessage('password_recovery'));


ShowMessage($arParams["~AUTH_RESULT"]);


?>
<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<p>
	<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>

    <div class="form-group bx-authform-formgroup-container">
        <div class="bx-authform-label-container"><?=GetMessage("AUTH_LOGIN")?></div>
        <div class="bx-authform-input-container">
            <input class="form-control" type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" />
        </div>
    </div>
    <?=GetMessage("AUTH_OR")?>
    <div class="form-group bx-authform-formgroup-container" style="margin-top: 10px">
        <div class="bx-authform-label-container"><?=GetMessage("AUTH_EMAIL")?></div>
        <div class="bx-authform-input-container">
            <input class="form-control" type="text" name="USER_EMAIL" maxlength="255" />
        </div>
    </div>
    <?if($arResult["USE_CAPTCHA"]):?>

        <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
        <div class="form-group bx-authform-formgroup-container dbg_captha">
            <div class="bx-authform-label-container">
                <?echo GetMessage("system_auth_captcha")?>
            </div>
            <div class="bx-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /></div>
            <div class="bx-authform-input-container">
                <input class="form-control" type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
            </div>
        </div>

    <?endif?>

    <div class="bx-authform-formgroup-container">
        <input type="submit" class="btn btn-primary" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
    </div>

<p>
<!--<a href="<?/*=$arResult["AUTH_AUTH_URL"]*/?>"><b><?/*=GetMessage("AUTH_AUTH")*/?></b></a>-->
</p>
</form>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
