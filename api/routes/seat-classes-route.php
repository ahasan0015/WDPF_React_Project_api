<?php

if ($endpoint == 'seat-classes' && $request == 'GET') {
    getSeatClassess();
} elseif ($endpoint == 'seat-class' && $request == 'GET') {
    getSeatClassesById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-seat-class' && $request == 'GET') {
    getDetailsSeatClasses($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-seat-class' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createSeatClasses($data);
} elseif ($endpoint == 'edit-seat-class' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateSeatClasses($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-seat-class' && $request == 'DELETE') {
    deleteSeatClasses($_GET['id'] ?? 0);
}

?>