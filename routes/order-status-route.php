<?php
if ($page == "order-status") {
    include_once('view/pages/order-status/order-status-manage.php');
} elseif ($page == "order-status-create") {
    include_once('view/pages/order-status/order-status-create.php');
} elseif ($page == "order-status-edit") {
    include_once('view/pages/order-status/order-status-edit.php');
} elseif ($page == "order-status-details") {
    include_once('view/pages/order-status/order-status-details.php');
}
?>