<?php

function getAirportss() {
    echo json_encode(Airports::readAll());
}

function getAirportsById($_id) {
    echo json_encode(Airports::readById($_id));
}

function createAirports($data) {
    global $db;
    $obj = new Airports($data['airport_id'] ?? '', $data['airport_name'] ?? '', $data['city'] ?? '', $data['country'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateAirports($_id, $data) {
    global $db;
    $obj = new Airports($data['airport_id'] ?? '', $data['airport_name'] ?? '', $data['city'] ?? '', $data['country'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteAirports($_id) {
    echo json_encode(['result' => Airports::delete($_id)]);
}

?>