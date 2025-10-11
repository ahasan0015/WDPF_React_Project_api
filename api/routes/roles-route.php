<?php

if ($endpoint == 'roles' && $request == 'GET') {
    getRoless();
} elseif ($endpoint == 'role' && $request == 'GET') {
    getRolesById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-role' && $request == 'GET') {
    getDetailsRoles($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-role' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createRoles($data);
} elseif ($endpoint == 'edit-role' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateRoles($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-role' && $request == 'DELETE') {
    deleteRoles($_GET['id'] ?? 0);
}

?>