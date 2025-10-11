<?php

function getBookingss() {
    echo json_encode(Bookings::readAll());
}

function getBookingsById($_id) {
    echo json_encode(Bookings::readById($_id));
}

function createBookings($data) {
    global $db;
    $obj = new Bookings($data['booking_id'] ?? '', $data['user_id'] ?? '', $data['booking_type_id'] ?? '', $data['booking_date'] ?? '', $data['total_price'] ?? '', $data['status_id'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateBookings($_id, $data) {
    global $db;
    $obj = new Bookings($data['booking_id'] ?? '', $data['user_id'] ?? '', $data['booking_type_id'] ?? '', $data['booking_date'] ?? '', $data['total_price'] ?? '', $data['status_id'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteBookings($_id) {
    echo json_encode(['result' => Bookings::delete($_id)]);
}

?>