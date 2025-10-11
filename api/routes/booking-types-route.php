<?php

if ($endpoint == 'booking-types' && $request == 'GET') {
    getBookingTypess();
} elseif ($endpoint == 'booking-type' && $request == 'GET') {
    getBookingTypesById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-booking-type' && $request == 'GET') {
    getDetailsBookingTypes($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-booking-type' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createBookingTypes($data);
} elseif ($endpoint == 'edit-booking-type' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateBookingTypes($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-booking-type' && $request == 'DELETE') {
    deleteBookingTypes($_GET['id'] ?? 0);
}

?>