<?php

function getPassengerss() {
    echo json_encode(Passengers::readAll());
}

function getPassengersById($_id) {
    echo json_encode(Passengers::readById($_id));
}

function createPassengers($data) {
    global $db;
    $obj = new Passengers($data['passenger_id'] ?? '', $data['booking_id'] ?? '', $data['name'] ?? '', $data['age'] ?? '', $data['passport_number'] ?? '', $data['nationality'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updatePassengers($_id, $data) {
    global $db;
    $obj = new Passengers($data['passenger_id'] ?? '', $data['booking_id'] ?? '', $data['name'] ?? '', $data['age'] ?? '', $data['passport_number'] ?? '', $data['nationality'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deletePassengers($_id) {
    echo json_encode(['result' => Passengers::delete($_id)]);
}

?>