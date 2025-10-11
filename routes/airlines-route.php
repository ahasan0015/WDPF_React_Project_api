<?php
if ($page == "airlines") {
    include_once('view/pages/airlines/airlines-manage.php');
} elseif ($page == "airlines-create") {
    include_once('view/pages/airlines/airlines-create.php');
} elseif ($page == "airlines-edit") {
    include_once('view/pages/airlines/airlines-edit.php');
} elseif ($page == "airlines-details") {
    include_once('view/pages/airlines/airlines-details.php');
}
?>