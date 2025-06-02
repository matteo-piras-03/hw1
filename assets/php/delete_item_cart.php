<?php
    session_start();
    if(!isset($_SESSION["id"]) || !isset($_POST["item_id"])){
        echo -1;
        exit();
    }
    $conn = mysqli_connect("localhost","root","","hw1") or die("Connection failed: " . mysqli_connect_error());
    $user_id = mysqli_escape_string($conn,$_SESSION["id"]);
    $item_id = mysqli_escape_string($conn,$_POST["item_id"]);
    //Cancellazione dell'oggetto nel carrello
    $query = "DELETE FROM cart WHERE user_id = '$user_id' AND item_id = '$item_id'";
    $result = mysqli_query($conn,$query) or die("Query error". mysqli_error($conn));
    echo $result; //ritorna 1 se andato a buon fine, 0 altrimenti
    mysqli_close($conn);
    exit();
?>