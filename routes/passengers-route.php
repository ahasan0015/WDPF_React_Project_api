<?php
if ($page == "passengers") {
    include_once('view/pages/passengers/passengers-manage.php');
} elseif ($page == "passengers-create") {
    include_once('view/pages/passengers/passengers-create.php');
} elseif ($page == "passengers-edit") {
    include_once('view/pages/passengers/passengers-edit.php');
} elseif ($page == "passengers-details") {
    include_once('view/pages/passengers/passengers-details.php');
}
?>