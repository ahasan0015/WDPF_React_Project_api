<?php

if ($endpoint == 'payment-status' && $request == 'GET') {
    getPaymentStatuss();
} elseif ($endpoint == 'payment-statu' && $request == 'GET') {
    getPaymentStatusById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-payment-statu' && $request == 'GET') {
    getDetailsPaymentStatus($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-payment-statu' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createPaymentStatus($data);
} elseif ($endpoint == 'edit-payment-statu' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updatePaymentStatus($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-payment-statu' && $request == 'DELETE') {
    deletePaymentStatus($_GET['id'] ?? 0);
}

?>