<?php
session_start();

$response = array("session_active" => false);

if (isset($_SESSION["name"])) {
    $response["session_active"] = true;
}

echo json_encode($response);
?>
