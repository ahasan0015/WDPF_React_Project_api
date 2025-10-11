<?php

function getFlightTypess() {
    echo json_encode(FlightTypes::readAll());
}

function getFlightTypesById($_id) {
    echo json_encode(FlightTypes::readById($_id));
}

function createFlightTypes($data) {
    global $db;
    $obj = new FlightTypes($data['flight_type_id'] ?? '', $data['type_name'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateFlightTypes($_id, $data) {
    global $db;
    $obj = new FlightTypes($data['flight_type_id'] ?? '', $data['type_name'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteFlightTypes($_id) {
    echo json_encode(['result' => FlightTypes::delete($_id)]);
}

?>