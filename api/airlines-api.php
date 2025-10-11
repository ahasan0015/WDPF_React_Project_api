<?php

function getAirliness() {
    echo json_encode(Airlines::readAll());
}

function getAirlinesById($_id) {
    echo json_encode(Airlines::readById($_id));
}

function createAirlines($data) {
    global $db;
    $obj = new Airlines($data['airline_id'] ?? '', $data['airline_name'] ?? '', $data['country'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateAirlines($_id, $data) {
    global $db;
    $obj = new Airlines($data['airline_id'] ?? '', $data['airline_name'] ?? '', $data['country'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteAirlines($_id) {
    echo json_encode(['result' => Airlines::delete($_id)]);
}

?>