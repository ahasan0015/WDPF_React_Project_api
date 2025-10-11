<?php

function getSeatClassess() {
    echo json_encode(SeatClasses::readAll());
}

function getSeatClassesById($_id) {
    echo json_encode(SeatClasses::readById($_id));
}

function createSeatClasses($data) {
    global $db;
    $obj = new SeatClasses($data['seat_class_id'] ?? '', $data['class_name'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateSeatClasses($_id, $data) {
    global $db;
    $obj = new SeatClasses($data['seat_class_id'] ?? '', $data['class_name'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteSeatClasses($_id) {
    echo json_encode(['result' => SeatClasses::delete($_id)]);
}

?>