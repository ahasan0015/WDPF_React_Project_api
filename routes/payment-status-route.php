<?php
if ($page == "payment-status") {
    include_once('view/pages/payment-status/payment-status-manage.php');
} elseif ($page == "payment-status-create") {
    include_once('view/pages/payment-status/payment-status-create.php');
} elseif ($page == "payment-status-edit") {
    include_once('view/pages/payment-status/payment-status-edit.php');
} elseif ($page == "payment-status-details") {
    include_once('view/pages/payment-status/payment-status-details.php');
}
?>