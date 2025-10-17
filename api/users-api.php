<?php

function getUsers() {
    echo json_encode(Users::readAll());
}

function getUsersById($_id) {
    echo json_encode(Users::readById($_id));
}

function createUsers($data) {
    global $db;
    $obj = new Users(null, $data['role_id'] ?? '', $data['name'] ?? '', $data['email'] ?? '', $data['password'] ?? '', $data['phone'] ?? '', $data['created_at'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateUsers($_id, $data) {
    global $db;
    $obj = new Users($_id, $data['role_id'] ?? '', $data['name'] ?? '', $data['email'] ?? '', $data['password'] ?? '', $data['phone'] ?? '', $data['created_at'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteUsers($_id) {
    echo json_encode(['result' => Users::delete($_id)]);
}

?>