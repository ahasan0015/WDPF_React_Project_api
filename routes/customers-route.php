<?php
if ($page == "customers") {
    include_once('view/pages/customers/customers-manage.php');
} elseif ($page == "customers-create") {
    include_once('view/pages/customers/customers-create.php');
} elseif ($page == "customers-edit") {
    include_once('view/pages/customers/customers-edit.php');
} elseif ($page == "customers-details") {
    include_once('view/pages/customers/customers-details.php');
}
?>