<?php
if ($page == "payment-methods") {
    include_once('view/pages/payment-methods/payment-methods-manage.php');
} elseif ($page == "payment-methods-create") {
    include_once('view/pages/payment-methods/payment-methods-create.php');
} elseif ($page == "payment-methods-edit") {
    include_once('view/pages/payment-methods/payment-methods-edit.php');
} elseif ($page == "payment-methods-details") {
    include_once('view/pages/payment-methods/payment-methods-details.php');
}
?>