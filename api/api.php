<?php
// header("Access-Control-Allow-Origin:http://localhost:5174");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// echo "Api is working . you do it roxy";

require_once('../config/db.php');
include_once('../helper/img-upload-helper.php');

//include class
foreach (glob("../models/*.class.php") as $filename) {
    include_once($filename);
}

//include api
foreach (glob("*-api.php") as $filename) {
    include_once($filename);
}

$request = $_SERVER['REQUEST_METHOD'];
$endpoint = $_GET['endpoint'] ?? null;
//endpoint cheack
if (!$endpoint) {
    echo json_encode(["error" => "No endpoint specified"]);
    exit;
}

if ($endpoint == 'roles' && $request == 'GET') {
    getRoles();
} elseif ($endpoint == 'create-roles' && $request == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    echo json_encode(gettype($data));
    createRoles($data);
} else if ($endpoint == 'edit-role' && $request == 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    echo json_encode($data);
    // updateRoles($data);
} else if ($endpoint == 'delete-role' && $request == 'DELETE') {
    // echo json_encode($_GET['id']);
    deleteRoles($_GET['id']);
}else if ($endpoint == 'users' && $request == 'GET') {
    // echo json_encode($_GET['id']);
    getUsers();
}else if($endpoint == 'create-user' && $request == 'POST') {
        // echo json_encode($_POST);
        // echo json_encode($_FILES);
        createUsers($_POST, $_FILES);
    }
    else if($endpoint == 'delete-user' && $request == 'DELETE') {
        // echo json_encode($_GET['id']);
        deleteUsers($_GET['id']);
    } else {
    foreach (glob("routes/*-route.php") as $filename) {
        include_once($filename);
    }
    echo "This url '$endpoint' not found!";
}
