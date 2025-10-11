<?php
if ($page == "bookings") {
    include_once('view/pages/bookings/bookings-manage.php');
} elseif ($page == "bookings-create") {
    include_once('view/pages/bookings/bookings-create.php');
} elseif ($page == "bookings-edit") {
    include_once('view/pages/bookings/bookings-edit.php');
} elseif ($page == "bookings-details") {
    include_once('view/pages/bookings/bookings-details.php');
}
?>