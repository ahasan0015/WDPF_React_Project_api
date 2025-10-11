<?php

function getBookingTypess() {
    echo json_encode(BookingTypes::readAll());
}

function getBookingTypesById($_id) {
    echo json_encode(BookingTypes::readById($_id));
}

function createBookingTypes($data) {
    global $db;
    $obj = new BookingTypes($data['booking_type_id'] ?? '', $data['type_name'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateBookingTypes($_id, $data) {
    global $db;
    $obj = new BookingTypes($data['booking_type_id'] ?? '', $data['type_name'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteBookingTypes($_id) {
    echo json_encode(['result' => BookingTypes::delete($_id)]);
}

?>