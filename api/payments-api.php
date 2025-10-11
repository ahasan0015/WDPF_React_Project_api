<?php

function getPaymentss() {
    echo json_encode(Payments::readAll());
}

function getPaymentsById($_id) {
    echo json_encode(Payments::readById($_id));
}

function createPayments($data) {
    global $db;
    $obj = new Payments($data['payment_id'] ?? '', $data['booking_id'] ?? '', $data['amount'] ?? '', $data['payment_date'] ?? '', $data['payment_method_id'] ?? '', $data['payment_status_id'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updatePayments($_id, $data) {
    global $db;
    $obj = new Payments($data['payment_id'] ?? '', $data['booking_id'] ?? '', $data['amount'] ?? '', $data['payment_date'] ?? '', $data['payment_method_id'] ?? '', $data['payment_status_id'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deletePayments($_id) {
    echo json_encode(['result' => Payments::delete($_id)]);
}

?>