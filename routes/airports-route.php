<?php
if ($page == "airports") {
    include_once('view/pages/airports/airports-manage.php');
} elseif ($page == "airports-create") {
    include_once('view/pages/airports/airports-create.php');
} elseif ($page == "airports-edit") {
    include_once('view/pages/airports/airports-edit.php');
} elseif ($page == "airports-details") {
    include_once('view/pages/airports/airports-details.php');
}
?>