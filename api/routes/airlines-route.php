<?php

if ($endpoint == 'airlines' && $request == 'GET') {
    getAirliness();
} elseif ($endpoint == 'airline' && $request == 'GET') {
    getAirlinesById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-airline' && $request == 'GET') {
    getDetailsAirlines($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-airline' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createAirlines($data);
} elseif ($endpoint == 'edit-airline' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateAirlines($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-airline' && $request == 'DELETE') {
    deleteAirlines($_GET['id'] ?? 0);
}

?>