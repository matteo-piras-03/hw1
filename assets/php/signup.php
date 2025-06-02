<?php
    session_start();
    if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
        $conn = mysqli_connect("localhost","root","","hw1") or die("Connection failed: " . mysqli_connect_error());
        $name = mysqli_real_escape_string($conn,$_POST["name"]);
        $surname = mysqli_real_escape_string($conn,$_POST["surname"]);
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $password = mysqli_real_escape_string($conn,$_POST["password"]);
        $confirm_password = mysqli_real_escape_string($conn,$_POST["confirm_password"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: signup.php");
            exit();
        }

        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{10,}$/"; 
        if (!preg_match($password_regex, $password) || $password != $confirm_password) {
            header("Location: signup.php");
            exit();
        }

        $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php");
            exit();
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')";
        mysqli_query($conn, $query);
        mysqli_free_result($result);
        mysqli_close($conn);
        header("Location: login.php");
        exit();

    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrati su eBay</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/signup.css">
        <script src="../js/signup.js" defer></script>
    </head>
    <body>
        <header id="header">
            <a href="../../index.php"><img src="../images/eBay_logo.png" class="ebay-logo"></a>
            <span>
                Hai già un account? <a href="login.php">Accedi</a>
            </span>
        </header>
        <article id="main">
            <div id="signup-box">
                <h1>Registrati su eBay</h1>
                <form name="signup" method="POST" id="form">
                    <div id="name">
                        <input type="text" name="name" placeholder="Nome">
                        <input type="text" name="surname" placeholder="Cognome">
                    </div>
                    <div class="error hidden" id="error_name">Compilare questi campi.</div>
                    <input type="text" name="email" placeholder="Email">
                    <div class="error hidden" id="error_email">Indirizzo email non valido.</div>
                    <div class="error hidden" id="error_email_used">Indirizzo email già usato.</div>
                    <input type="password" name="password" placeholder="Password">
                    <ul id="error_password" class="hidden">
                        La password deve contenere:
                        <li data-type="password_length" class="unmet">Almeno 10 caratteri.</li>
                        <li data-type="password_number" class="unmet">Almeno un numero.</li>
                        <li data-type="password_uppercase" class="unmet">Almeno una lettera maiuscola.</li>
                        <li data-type="password_special" class="unmet">Almeno un carattere speciale.</li>
                    </ul>
                    <input type="password" name="confirm_password" placeholder="Conferma password">
                    <div class="error hidden" id="error_confirm_password">Le password non corrispondono.</div>
                    <input type="submit" name="submit" value="Registrati">
                </form>
            </div>
            <div id="copyright">
                Copyright 2025 Matteo Piras. Tutti i diritti riservati.
            </div>  
        </article>
            
    </body>
</html>