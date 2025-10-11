<?php

function getRoless() {
    echo json_encode(Roles::readAll());
}

function getRolesById($_id) {
    echo json_encode(Roles::readById($_id));
}

function createRoles($data) {
    global $db;
    $obj = new Roles($data['role_id'] ?? '', $data['role_name'] ?? '');
    echo json_encode(['result' => $obj->create()]);
}

function updateRoles($_id, $data) {
    global $db;
    $obj = new Roles($data['role_id'] ?? '', $data['role_name'] ?? '');
    echo json_encode(['result' => $obj->update($_id)]);
}

function deleteRoles($_id) {
    echo json_encode(['result' => Roles::delete($_id)]);
}

?>