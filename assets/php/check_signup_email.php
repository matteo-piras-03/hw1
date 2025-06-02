<?php
    if(isset($_GET["email"])){
        $conn = mysqli_connect("localhost","root","","hw1") or die("Connection failed: " . mysqli_connect_error());
        $email = mysqli_escape_string($conn, $_GET["email"]);
        $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query) or die("Query error". mysqli_error($conn));
        echo (mysqli_num_rows($result) > 0);
        mysqli_free_result($result);
        mysqli_close($conn);
        exit();
    }
    echo "error";
    exit();
?>