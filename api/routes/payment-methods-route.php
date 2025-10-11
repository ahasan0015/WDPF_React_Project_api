<?php

if ($endpoint == 'payment-methods' && $request == 'GET') {
    getPaymentMethodss();
} elseif ($endpoint == 'payment-method' && $request == 'GET') {
    getPaymentMethodsById($_GET['id'] ?? 0);
} elseif ($endpoint == 'details-payment-method' && $request == 'GET') {
    getDetailsPaymentMethods($_GET['id'] ?? 0);
} elseif ($endpoint == 'create-payment-method' && $request == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    createPaymentMethods($data);
} elseif ($endpoint == 'edit-payment-method' && $request == 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    updatePaymentMethods($_GET['id'] ?? 0, $data);
} elseif ($endpoint == 'delete-payment-method' && $request == 'DELETE') {
    deletePaymentMethods($_GET['id'] ?? 0);
}

?>