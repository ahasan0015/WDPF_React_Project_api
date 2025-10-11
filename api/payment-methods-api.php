<?php

function getPaymentMethodss() {
    echo json_encode(PaymentMethods::readAll());
}

function getPaymentMethodsById($_id) {
    echo json_encode(PaymentMethods::readById($_id));
}

function createPaymentMethods($data) {
    global $db;
    $obj = new PaymentMethods($data['payment_method_id'] ?? '', $data['method_name'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updatePaymentMethods($_id, $data) {
    global $db;
    $obj = new PaymentMethods($data['payment_method_id'] ?? '', $data['method_name'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deletePaymentMethods($_id) {
    echo json_encode(['result' => PaymentMethods::delete($_id)]);
}

?>