<?php

if ($endpoint == 'passengers' && $request == 'GET') {
    getPassengerss();
} elseif ($endpoint == 'passenger' && $request == 'GET') {
    getPassengersById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-passenger' && $request == 'GET') {
    getDetailsPassengers($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-passenger' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createPassengers($data);
} elseif ($endpoint == 'edit-passenger' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updatePassengers($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-passenger' && $request == 'DELETE') {
    deletePassengers($_GET['id'] ?? 0);
}

?>