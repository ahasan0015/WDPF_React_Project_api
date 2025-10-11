<?php
if ($page == "booking-status") {
    include_once('view/pages/booking-status/booking-status-manage.php');
} elseif ($page == "booking-status-create") {
    include_once('view/pages/booking-status/booking-status-create.php');
} elseif ($page == "booking-status-edit") {
    include_once('view/pages/booking-status/booking-status-edit.php');
} elseif ($page == "booking-status-details") {
    include_once('view/pages/booking-status/booking-status-details.php');
}
?>