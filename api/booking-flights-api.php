<?php

function getBookingFlightss() {
    echo json_encode(BookingFlights::readAll());
}

function getBookingFlightsById($_id) {
    echo json_encode(BookingFlights::readById($_id));
}

function createBookingFlights($data) {
    global $db;
    $obj = new BookingFlights(null, $data['booking_id'] ?? '', $data['flight_id'] ?? '', $data['seat_class_id'] ?? '', $data['price'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateBookingFlights($_id, $data) {
    global $db;
    $obj = new BookingFlights($_id, $data['booking_id'] ?? '', $data['flight_id'] ?? '', $data['seat_class_id'] ?? '', $data['price'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteBookingFlights($_id) {
    echo json_encode(['result' => BookingFlights::delete($_id)]);
}

?>