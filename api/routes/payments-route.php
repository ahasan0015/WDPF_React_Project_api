<?php

if ($endpoint == 'payments' && $request == 'GET') {
    getPaymentss();
} elseif ($endpoint == 'payment' && $request == 'GET') {
    getPaymentsById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-payment' && $request == 'GET') {
    getDetailsPayments($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-payment' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createPayments($data);
} elseif ($endpoint == 'edit-payment' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updatePayments($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-payment' && $request == 'DELETE') {
    deletePayments($_GET['id'] ?? 0);
}

?>