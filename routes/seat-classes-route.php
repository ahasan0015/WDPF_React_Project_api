<?php
if ($page == "seat-classes") {
    include_once('view/pages/seat-classes/seat-classes-manage.php');
} elseif ($page == "seat-classes-create") {
    include_once('view/pages/seat-classes/seat-classes-create.php');
} elseif ($page == "seat-classes-edit") {
    include_once('view/pages/seat-classes/seat-classes-edit.php');
} elseif ($page == "seat-classes-details") {
    include_once('view/pages/seat-classes/seat-classes-details.php');
}
?>