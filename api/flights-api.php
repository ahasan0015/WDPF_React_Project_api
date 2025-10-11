<?php

function getFlightss() {
    echo json_encode(Flights::readAll());
}

function getFlightsById($_id) {
    echo json_encode(Flights::readById($_id));
}

function createFlights($data) {
    global $db;
    $obj = new Flights($data['flight_id'] ?? '', $data['airline_id'] ?? '', $data['departure_airport_id'] ?? '', $data['arrival_airport_id'] ?? '', $data['departure_time'] ?? '', $data['arrival_time'] ?? '', $data['flight_type_id'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateFlights($_id, $data) {
    global $db;
    $obj = new Flights($data['flight_id'] ?? '', $data['airline_id'] ?? '', $data['departure_airport_id'] ?? '', $data['arrival_airport_id'] ?? '', $data['departure_time'] ?? '', $data['arrival_time'] ?? '', $data['flight_type_id'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteFlights($_id) {
    echo json_encode(['result' => Flights::delete($_id)]);
}

?>