<?php
    session_start();
    if (isset($_SESSION[""])) {
        header("Location: ../../index.php");
        exit();
    }
    if(isset($_POST["email"]) && isset($_POST["password"])) {
        $conn = mysqli_connect("localhost","root","","hw1") or die("Connection failed: " . mysqli_connect_error());
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $password = mysqli_real_escape_string($conn,$_POST["password"]);

        $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            header("Location: login.php");
            exit();
        }
        $row = mysqli_fetch_assoc($result);
        if (!password_verify($password, $row["password"])) {
            header("Location: login.php");
            exit();
        }
        $_SESSION["id"] = $row["id"];
        $_SESSION["name"] = $row["name"];
        mysqli_free_result($result);
        mysqli_close($conn);
        header("Location: ../../index.php");
        exit();
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accedi su eBay</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/signup.css">
        <script src="../js/login.js" defer></script>
    </head>
    <body>
        <header id="header">
            <a href="../../index.php"><img src="../images/eBay_logo.png" class="ebay-logo"></a>
            <span>
                Prima volta su eBay? <a href="signup.php">Registrati</a>
            </span>
        </header>
        <article id="main">
            <div id="signup-box">
                <h1>Accedi al tuo account</h1>
                <form name="login" method="POST" id="form">
                    <input type="text" name="email" placeholder="Email">
                    <div class="error hidden" id="error_email">Indirizzo email non valido.</div>
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" name="submit" value="Accedi">
                </form>
            </div>
            <div id="copyright">
                Copyright 2025 Matteo Piras. Tutti i diritti riservati.
            </div>  
        </article>
            
    </body>
</html>