<?php

function getPaymentStatuss() {
    echo json_encode(PaymentStatus::readAll());
}

function getPaymentStatusById($_id) {
    echo json_encode(PaymentStatus::readById($_id));
}

function createPaymentStatus($data) {
    global $db;
    $obj = new PaymentStatus($data['payment_status_id'] ?? '', $data['status_name'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updatePaymentStatus($_id, $data) {
    global $db;
    $obj = new PaymentStatus($data['payment_status_id'] ?? '', $data['status_name'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deletePaymentStatus($_id) {
    echo json_encode(['result' => PaymentStatus::delete($_id)]);
}

?>