<?php

if ($endpoint == 'flights' && $request == 'GET') {
    getFlightss();
} elseif ($endpoint == 'flight' && $request == 'GET') {
    getFlightsById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-flight' && $request == 'GET') {
    getDetailsFlights($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-flight' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createFlights($data);
} elseif ($endpoint == 'edit-flight' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateFlights($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-flight' && $request == 'DELETE') {
    deleteFlights($_GET['id'] ?? 0);
}

?>