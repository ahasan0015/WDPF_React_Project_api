<?php

if ($endpoint == 'booking-status' && $request == 'GET') {
    getBookingStatuss();
} elseif ($endpoint == 'booking-statu' && $request == 'GET') {
    getBookingStatusById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-booking-statu' && $request == 'GET') {
    getDetailsBookingStatus($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-booking-statu' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createBookingStatus($data);
} elseif ($endpoint == 'edit-booking-statu' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateBookingStatus($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-booking-statu' && $request == 'DELETE') {
    deleteBookingStatus($_GET['id'] ?? 0);
}

?>