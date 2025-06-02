<?php
    session_start();
    if(!isset($_SESSION["name"])){
        exit();
    }
    $conn = mysqli_connect("localhost","root","","hw1") or die("Connection failed: " . mysqli_connect_error());
    $user_id = mysqli_escape_string($conn,$_SESSION["id"]);
    //Verifica esistenza dell'utente
    $query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
    $result = mysqli_query($conn,$query) or die("Query error". mysqli_error($conn));
    if(mysqli_num_rows($result) == 0){
        echo json_encode(-1);
        exit();
    }
    $query = "SELECT item.id, item.item_id, title, FORMAT(price,2) AS price, FORMAT(shipping,2) AS shipping, src FROM item JOIN saved_item ON item.id = saved_item.item_id WHERE saved_item.user_id = '$user_id'";
    $result = mysqli_query($conn, $query) or die("Query error". mysqli_error($conn));
    $items = array();
    while($row = mysqli_fetch_assoc($result)){
        $items[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    echo json_encode($items);
    exit();
?>