<?php

if ($endpoint == 'booking-flights' && $request == 'GET') {
    getBookingFlightss();
} elseif ($endpoint == 'booking-flight' && $request == 'GET') {
    getBookingFlightsById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-booking-flight' && $request == 'GET') {
    getDetailsBookingFlights($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-booking-flight' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createBookingFlights($data);
} elseif ($endpoint == 'edit-booking-flight' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updateBookingFlights($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-booking-flight' && $request == 'DELETE') {
    deleteBookingFlights($_GET['id'] ?? 0);
}

?>