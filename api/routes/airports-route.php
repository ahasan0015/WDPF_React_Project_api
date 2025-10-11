<?php

if ($endpoint == 'airports' && $request == 'GET') {
    getAirportss();
} elseif ($endpoint == 'airport' && $request == 'GET') {
    getAirportsById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-airport' && $request == 'GET') {
    getDetailsAirports($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-airport' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createAirports($data);
} elseif ($endpoint == 'edit-airport' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateAirports($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-airport' && $request == 'DELETE') {
    deleteAirports($_GET['id'] ?? 0);
}

?>