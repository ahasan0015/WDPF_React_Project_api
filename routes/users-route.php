<?php
if ($page == "users") {
    include_once('view/pages/users/users-manage.php');
} elseif ($page == "users-create") {
    include_once('view/pages/users/users-create.php');
} elseif ($page == "users-edit") {
    include_once('view/pages/users/users-edit.php');
} elseif ($page == "users-details") {
    include_once('view/pages/users/users-details.php');
}
?>