<?php
if ($page == "flight-types") {
    include_once('view/pages/flight-types/flight-types-manage.php');
} elseif ($page == "flight-types-create") {
    include_once('view/pages/flight-types/flight-types-create.php');
} elseif ($page == "flight-types-edit") {
    include_once('view/pages/flight-types/flight-types-edit.php');
} elseif ($page == "flight-types-details") {
    include_once('view/pages/flight-types/flight-types-details.php');
}
?>