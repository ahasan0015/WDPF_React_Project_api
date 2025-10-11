<?php

if ($endpoint == 'bookings' && $request == 'GET') {
    getBookingss();
} elseif ($endpoint == 'booking' && $request == 'GET') {
    getBookingsById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-booking' && $request == 'GET') {
    getDetailsBookings($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-booking' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createBookings($data);
} elseif ($endpoint == 'edit-booking' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateBookings($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-booking' && $request == 'DELETE') {
    deleteBookings($_GET['id'] ?? 0);
}

?>