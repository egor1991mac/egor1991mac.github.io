/* 
 * Component: main.register
 * Template: tsoperator
 * @author dimabresky
 * @copyright 2018, travelsoft
 */

BX.ready(function () {

    let agencyPopup = null;

    function scrollto(node, offset_y) {

        let box = node.getBoundingClientRect();

        window.scrollTo({top: box.top + offset_y, left: 0, behavior: 'smooth'});
    }

    function clearForm(form) {

        form.querySelectorAll('input').forEach((input) => {
            input.value = "";
        });

        form.querySelectorAll('select').forEach((select) => {
            select.value = select.children[0].value;
            select.dispatchEvent(new Event('change'));
        });

    }

    document.querySelectorAll("input[name='is_agent']").forEach((node) => {
        node.onclick = () => {

            if (node.value === 'Y') {
                document.getElementById('agent-fields-box').classList.remove('hidden');
            } else {
                document.getElementById('agent-fields-box').classList.add('hidden');
            }
        };
    });

    document.getElementById('regform').onsubmit = (e) => {

        let email = document.querySelector("[name='REGISTER[EMAIL]']");
        let phone = document.querySelector("[name='REGISTER[PERSONAL_PHONE]']");
        let phone_reg = new RegExp(phone.dataset.phoneReg);
        let agency = document.querySelector('input[name="UF_AGENCY"]');
        let scroll_to_node = null;
        let alerts = [];
        let is_agent_node = document.querySelector("input[name='is_agent'][value='Y']");

        if (!/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email.value)) {
            alerts.push(email.dataset.alertText);
            scroll_to_node = email;
        }

        if (!phone_reg.test(phone.value)) {
            alerts.push(phone.dataset.alertText);
            if (!scroll_to_node) {
                scroll_to_node = phone;
            }
        }

        if (is_agent_node.checked && !parseInt(agency.value)) {
            alerts.push('Агентство неопределено. Необходимо ввести УНП и указать название агентства, если его не существует в базе данных.');
            if (!scroll_to_node) {
                scroll_to_node = agency;
            }
        }

        if (alerts.length) {
            alert(alerts.join("\n"));
            scrollto(scroll_to_node, 100);
            e.preventDefault();
        }
        document.querySelector("[name='REGISTER[LOGIN]']").value = email.value;
    };

    document.querySelector('input[name=AGENCY_UNP]').onfocusout = (e) => {
        let input = e.target;
        if (input.value) {
            BX.ajax.post(input.dataset.ajaxUrl, {
                sessid: BX.bitrix_sessid(),
                unp: input.value
            }, (resp) => {
                resp = JSON.parse(resp);
                if (resp.error) {
                    alert(resp.message);
                    input.value = '';
                    input.focus();
                } else {

                    if (resp.is_new) {
                        let agancy_name_block = document.getElementById('agency-name-block');
                        agancy_name_block.classList.remove('hidden');
                        agancy_name_block.querySelector('input[name=AGENCY_NAME]').focus();
                    } else {
                        let agancy_name_block = document.getElementById('agency-name-block');
                        document.querySelector('input[name=UF_AGENCY]').value = resp.id;
                        agancy_name_block.classList.add('hidden');
                        document.querySelector('.agency-name').innerText = `Ваше агентство: ${resp.name}`;
                    }

                }
            });
        } else {
            e.target.focus();
        }

    };

    document.querySelector('input[name=AGENCY_NAME]').onfocusout = (e) => {
        let input = e.target;
        if (input.value) {
            BX.ajax.post(input.dataset.ajaxUrl, {
                sessid: BX.bitrix_sessid(),
                agency_name: input.value,
                unp: document.querySelector('input[name=AGENCY_UNP]').value,
                action: 'add-new-agency'
            }, (resp) => {
                resp = JSON.parse(resp);
                if (resp.error) {
                    alert(resp.message);
                    input.focus();
                } else {

                    document.querySelector('input[name=UF_AGENCY]').value = resp.id;

                }
            });
        }
    };

});