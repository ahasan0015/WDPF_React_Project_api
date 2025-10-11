<?php

if ($endpoint == 'flight-types' && $request == 'GET') {
    getFlightTypess();
} elseif ($endpoint == 'flight-type' && $request == 'GET') {
    getFlightTypesById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-flight-type' && $request == 'GET') {
    getDetailsFlightTypes($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-flight-type' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createFlightTypes($data);
} elseif ($endpoint == 'edit-flight-type' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateFlightTypes($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-flight-type' && $request == 'DELETE') {
    deleteFlightTypes($_GET['id'] ?? 0);
}

?>