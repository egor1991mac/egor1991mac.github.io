<?php

define('PUBLIC_AJAX_MODE', true);
define('STOP_STATISTICS', true);
define('NO_AGENT_CHECK', true);

$documentRoot = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
require_once($documentRoot . '/bitrix/modules/main/include/prolog_before.php');

$request = \Bitrix\Main\Context::getCurrent()->getRequest();

if (!check_bitrix_sessid() || !$request->isAjaxRequest() || !$request->isPost()) {
    $protocol = filter_input(INPUT_SERVER, 'SERVER_PROTOCOL');
    header($protocol . " 404 Not Found");
    exit;
}

header('Content-Type: application/json; charset=' . SITE_CHARSET);

Bitrix\Main\Loader::includeModule("travelsoft.travelbooking");

$errors = [];
$UNP = trim($request->getPost('unp'));
if (!strlen($UNP)) {
    $message = GetMessage('ADD_AGENCY_WRONG_UNP');
}

if (!empty($message)) {
    \travelsoft\booking\Utils::sendJsonResponse(json_encode([
        'error' => true,
        'message' => $message
    ]));
}

if ($request->getPost('action') === 'add-new-agency') {

    $agency_name = trim($request->getPost('agency_name'));
    if (!strlen($agency_name)) {
        \travelsoft\booking\Utils::sendJsonResponse(json_encode([
            'error' => true,
            'message' => GetMessage('ADD_AGENCY_WRONG_NAME')
        ]));
    }

    $agency = current(\travelsoft\booking\stores\Agency::get([
                'filter' => ['UF_UNP' => $UNP],
                'select' => ['ID', 'UF_LEGAL_NAME']
    ]));

    if (!empty($agency)) {
        \travelsoft\booking\Utils::sendJsonResponse(json_encode([
            'error' => true,
            'message' => GetMessage('ADD_AGENCY_EXISTS')
        ]));
    } else {
        \travelsoft\booking\Utils::sendJsonResponse(json_encode([
            'error' => false,
            'id' => travelsoft\booking\stores\Agency::add([
                'UF_UNP' => $UNP,
                'UF_LEGAL_NAME' => $agency_name
            ])
        ]));
    }
} else {

    $agency = current(\travelsoft\booking\stores\Agency::get([
                'filter' => ['UF_UNP' => $UNP],
                'select' => ['ID', 'UF_LEGAL_NAME']
    ]));

    if (empty($agency)) {
        \travelsoft\booking\Utils::sendJsonResponse(json_encode([
            'error' => false,
            'is_new' => true
        ]));
    } else {
        \travelsoft\booking\Utils::sendJsonResponse(json_encode([
            'error' => false,
            'id' => $agency['ID'],
            'name' => $agency['UF_LEGAL_NAME'] 
        ]));
    }
}