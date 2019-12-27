<?php

define('PUBLIC_AJAX_MODE', true);
define('STOP_STATISTICS', true);
define('NO_AGENT_CHECK', true);

$documentRoot = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
require_once($documentRoot . '/bitrix/modules/main/include/prolog_before.php');

$request = \Bitrix\Main\Context::getCurrent()->getRequest();

if (!$request->isPost() || !$USER->IsAuthorized()) {
    $protocol = filter_input(INPUT_SERVER, 'SERVER_PROTOCOL');
    header($protocol . " 404 Not Found");
    exit;
}

Bitrix\Main\Loader::includeModule("travelsoft.travelbooking");

if (travelsoft\booking\adapters\User::haveAgentGroup()) {

    $user = travelsoft\booking\stores\Users::getById($USER->GetID(), ['ID', 'UF_AGENCY', 'UF_MAIN']);
    if (!empty($user) && $user['ID'] > 0 && $user['UF_AGENCY'] == $request->get('id') && $user['UF_MAIN'] > 0) {

        $agency = travelsoft\booking\stores\Agency::getById((int) $request->get('id'));


        if (!empty($agency)) {

            travelsoft\booking\stores\Agency::update($agency['ID'], [
                'UF_LEGAL_NAME' => $request->get('legal_name'),
                'UF_SHORT_NAME' => $request->get('short_name'),
                'UF_LEGAL_ADDRESS' => $request->get('legal_address'),
                'UF_CONTRACT_NUMBER' => $request->get('contract'),
                'UF_CONTRACT_DF' => $request->get('contract_date_from'),
                'UF_CONTRACT_DT' => $request->get('contract_date_to'),
                'UF_ACTUAL_ADDRESS' => $request->get('actual_address'),
                'UF_UNP' => $request->get('unp'),
                'UF_OKPO' => $request->get('okpo'),
                'UF_CHECKING_ACCOUNT' => $request->get('checking_account'),
                'UF_ACCOUNT_CURRENCY' => $request->get('currency'),
                'UF_BANK_NAME' => $request->get('bank_name'),
                'UF_BANK_ADDRESS' => $request->get('bank_address'),
                'UF_BIK' => $request->get('bik'),
            ]);
            
            travelsoft\booking\Utils::sendJsonResponse(json_encode([
                'error' => false
            ]));
        }
    }

    travelsoft\booking\Utils::sendJsonResponse(json_encode([
        'error' => true
    ]));
}