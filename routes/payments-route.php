<?php
if ($page == "payments") {
    include_once('view/pages/payments/payments-manage.php');
} elseif ($page == "payments-create") {
    include_once('view/pages/payments/payments-create.php');
} elseif ($page == "payments-edit") {
    include_once('view/pages/payments/payments-edit.php');
} elseif ($page == "payments-details") {
    include_once('view/pages/payments/payments-details.php');
}
?>