function removeElement(arr, sElement)
{
	var tmp = new Array();
	for (var i = 0; i<arr.length; i++) if (arr[i] != sElement) tmp[tmp.length] = arr[i];
	arr=null;
	arr=new Array();
	for (var i = 0; i<tmp.length; i++) arr[i] = tmp[i];
	tmp = null;
	return arr;
}

function SectionClick(id)
{
	var div = document.getElementById('user_div_'+id);
	if (div.className == "profile-block-hidden")
	{
		opened_sections[opened_sections.length]=id;
	}
	else
	{
		opened_sections = removeElement(opened_sections, id);
	}

	document.cookie = cookie_prefix + "_user_profile_open=" + opened_sections.join(",") + "; expires=Thu, 31 Dec 2020 23:59:59 GMT; path=/;";
	div.className = div.className == 'profile-block-hidden' ? 'profile-block-shown' : 'profile-block-hidden';
}

/* 
 * Component: main.profile
 * Template: tsoperator
 * @author dimabresky
 * @copyright 2018, travelsoft
 */
$(document).ready(function () {
   
   function scrollto ($el, delta) {
       delta = delta || 0;
       $("html, body").animate({scrollTop: $el.offset().top - delta}, 500);
   }
    
    $("[name^='UF_']").each(function () {
        $(this).addClass("form-control");
    });
    
    $("#profile-form").on("submit", function (e) {
        
        var $this = $(this);
        var $email = $this.find("[name='EMAIL']");
        var scrollto_el = null;
        var alerts = [];
        if (!/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test($email.val())) {
            alerts.push($email.data("alert-text"));
            scrollto_el = $email;
        }
        if (alerts.length) {
            alert(alerts.join("\n"));
            scrollto(scrollto_el, 100);
            e.preventDefault();
        }
        $this.find("[name='LOGIN']").val($email.val());
        
        
        // save agency data
        $.post(window.agency_save_ajax_url, {
            id: document.getElementById('agency-id').value,
            legal_name: document.getElementById('legal-name').value,
            short_name: document.getElementById('short-name').value,
            legal_address: document.getElementById('legal-address').value,
            contract: document.getElementById('contract').value,
            contract_date_from: document.getElementById('contract-date-from').value,
            contract_date_to: document.getElementById('contract-date-to').value,
            actual_address: document.getElementById('actual-address').value,
            unp: document.getElementById('unp').value,
            okpo: document.getElementById('okpo').value,
            account_currency: document.getElementById('account-currency').value,
            bank_name: document.getElementById('bank-name').value,
            checking_account: document.getElementById('checking-account').value,
            bik: document.getElementById('bik').value,
            bank_address: document.getElementById('bank-address').value,
        });
        
    });
});


