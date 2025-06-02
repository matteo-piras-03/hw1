<?php
    if(!isset($_POST["item_id"]) || !isset($_POST["title"]) || !isset($_POST["price"]) || !isset($_POST["shipping"]) || !isset($_POST["src"])){
        echo -1;
        exit();
    }
    $conn = mysqli_connect("localhost","root","","hw1") or die("Connection failed: " . mysqli_connect_error());
    $item_id = mysqli_escape_string($conn,$_POST["item_id"]);
    $title = mysqli_escape_string($conn,$_POST["title"]);
    $price = mysqli_escape_string($conn,$_POST["price"]);
    $shipping = mysqli_escape_string($conn,$_POST["shipping"]);
    $src = mysqli_escape_string($conn,$_POST["src"]);
    $query = "SELECT * FROM item WHERE item_id = '$item_id' LIMIT 1";
    $result = mysqli_query($conn,$query) or die("Query error". mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) == 0){
    //Inserimento dell'oggetto nella tabella item
    $query = "INSERT INTO item(item_id, title, category, price, shipping, src) VALUES ('$item_id','$title', 'searched_items', '$price', '$shipping', '$src')";
    $result = mysqli_query($conn,$query) or die("Query error". mysqli_error($conn));
    $query = "SELECT id FROM item WHERE item_id = '$item_id' LIMIT 1";
    $result = mysqli_query($conn,$query) or die("Query error". mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    }
    $id = $row["id"];
    mysqli_close($conn);
    header("Location: item_page.php?id=" . $id);
    exit();
?>