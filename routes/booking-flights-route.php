<?php
if ($page == "booking-flights") {
    include_once('view/pages/booking-flights/booking-flights-manage.php');
} elseif ($page == "booking-flights-create") {
    include_once('view/pages/booking-flights/booking-flights-create.php');
} elseif ($page == "booking-flights-edit") {
    include_once('view/pages/booking-flights/booking-flights-edit.php');
} elseif ($page == "booking-flights-details") {
    include_once('view/pages/booking-flights/booking-flights-details.php');
}
?>