<?php
    if(!isset($_GET["id"])){
        echo "";
        exit();
    }
    $conn = mysqli_connect("localhost","root","","hw1") or die("Connection failed: " . mysqli_connect_error());
    $id = mysqli_escape_string($conn, $_GET["id"]);
    $query = "SELECT id, item_id, title, FORMAT(price,2) AS price, FORMAT(shipping,2) AS shipping, src FROM item WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query) or die("Query error". mysqli_error($conn));
    $item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
    echo json_encode($item);
    exit();
?>