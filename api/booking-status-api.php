<?php

function getBookingStatuss() {
    echo json_encode(BookingStatus::readAll());
}

function getBookingStatusById($_id) {
    echo json_encode(BookingStatus::readById($_id));
}

function createBookingStatus($data) {
    global $db;
    $obj = new BookingStatus($data['status_id'] ?? '', $data['status_name'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateBookingStatus($_id, $data) {
    global $db;
    $obj = new BookingStatus($data['status_id'] ?? '', $data['status_name'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteBookingStatus($_id) {
    echo json_encode(['result' => BookingStatus::delete($_id)]);
}

?>