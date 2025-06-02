<?php
    if(!isset($_GET["category"]) && !isset($_GET["title"])){
        echo "";
        exit();
    }
    $conn = mysqli_connect("localhost","root","","hw1") or die("Connection failed: " . mysqli_connect_error());
    $query = "SELECT id, item_id, title, FORMAT(price,2) AS price, FORMAT(shipping,2) AS shipping, src FROM item ";
    if(isset($_GET["category"]) && !isset($_GET["title"])){
        $category = mysqli_escape_string($conn, $_GET["category"]);
        $query = $query . "WHERE category = '$category'";
    }
    else if(!isset($_GET["category"]) && isset($_GET["title"])){
        $title = mysqli_real_escape_string($conn, $_GET["title"]);
        $title = "%".$title."%";
        $query = $query . "WHERE title LIKE '$title'";
    }
    else{
        $category = mysqli_escape_string($conn, $_GET["category"]);
        $title = mysqli_real_escape_string($conn, $_GET["title"]);
        $title = "%".$title."%";
        $query = $query . "WHERE category='$category' AND title LIKE '$title'";
    }
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