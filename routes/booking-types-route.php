<?php
if ($page == "booking-types") {
    include_once('view/pages/booking-types/booking-types-manage.php');
} elseif ($page == "booking-types-create") {
    include_once('view/pages/booking-types/booking-types-create.php');
} elseif ($page == "booking-types-edit") {
    include_once('view/pages/booking-types/booking-types-edit.php');
} elseif ($page == "booking-types-details") {
    include_once('view/pages/booking-types/booking-types-details.php');
}
?>