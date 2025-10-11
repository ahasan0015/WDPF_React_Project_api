<?php
if ($page == "flights") {
    include_once('view/pages/flights/flights-manage.php');
} elseif ($page == "flights-create") {
    include_once('view/pages/flights/flights-create.php');
} elseif ($page == "flights-edit") {
    include_once('view/pages/flights/flights-edit.php');
} elseif ($page == "flights-details") {
    include_once('view/pages/flights/flights-details.php');
}
?>