<?php
    session_start();
    if(!isset($_SESSION["id"]) || !isset($_POST["item_id"])){
        echo -1;
        exit();
    }
    $conn = mysqli_connect("localhost","root","","hw1") or die("Connection failed: " . mysqli_connect_error());
    $user_id = mysqli_escape_string($conn,$_SESSION["id"]);
    $item_id = mysqli_escape_string($conn,$_POST["item_id"]);
    //Verifica esistenza dell'utente
    $query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
    $result = mysqli_query($conn,$query) or die("Query error". mysqli_error($conn));
    if(mysqli_num_rows($result) == 0){
        echo -1;
        exit();
    }
    //Verifica esistenza dell'oggetto
    $query = "SELECT * FROM item WHERE id = '$item_id' LIMIT 1";
    $result = mysqli_query($conn,$query) or die("Query error". mysqli_error($conn));
    if(mysqli_num_rows($result) == 0){
        echo -1;
        exit();
    }
    //Verifica esistenza della entry nel database
    $query = "SELECT * FROM saved_item WHERE user_id = '$user_id' AND item_id = '$item_id' LIMIT 1";
    $result = mysqli_query($conn,$query) or die("Query error". mysqli_error($conn));
    if(mysqli_num_rows($result) > 0){
        echo 0; //corrispondenza "oggetto già presente negli oggetti salvati"
        exit();
    }
    //Inserimento dell'oggetto negli oggetti salvati
    $query = "INSERT INTO saved_item(user_id, item_id) VALUES ('$user_id','$item_id')";
    $result = mysqli_query($conn,$query) or die("Query error". mysqli_error($conn));
    echo $result; //ritorna 1 se andato a buon fine
    mysqli_close($conn);
    exit();
?>