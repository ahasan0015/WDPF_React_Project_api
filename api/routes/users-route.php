<?php

if ($endpoint == 'users' && $request == 'GET') {
    getUserss();
} elseif ($endpoint == 'user' && $request == 'GET') {
    getUsersById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-user' && $request == 'GET') {
    getDetailsUsers($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-user' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createUsers($data);
} elseif ($endpoint == 'edit-user' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateUsers($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-user' && $request == 'DELETE') {
    deleteUsers($_GET['id'] ?? 0);
}

?>