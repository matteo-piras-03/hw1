<?php
    session_start();
    if(!isset($_SESSION["name"])){
        header("Location: ../../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrello</title>
        <link rel="stylesheet" href="../css/navbar.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <link rel="stylesheet" href="../css/mobile_pages.css" />
        <link rel="stylesheet" href="../css/cart.css" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <script src="../js/cart.js" defer></script>
        <script src="../js/mobile.js" defer></script>
    </head>
    <body>
        <nav id="nav_1">
            <div id="nav_1_left">
                <a href="../../index.php"><img src="../images/eBay_logo.png" class="ebay-logo"></a>
				<?php
					echo "<span>Ciao " . $_SESSION["name"] . "! (<a href=\"../php/logout.php\" class=\"login\">Esci</a>)</span>";
				?>
                <a href="../php/help.php">
                    Aiuto e contatti
                </a>
            </div>
            <div id="nav_1_right">
                <button class="relative" id="currency-exchange">
                    Tasso di cambio <img src="../images/chevron-down.png" class="chevron-down"/>
                    <div class="category-menu hidden">
                        <span><a href="" id="eur">EUR €</a></span>
                        <span><a href="" id="usd">USD $</a></span>
                        <span><a href="" id="gbp">GBP £</a></span>
                        <span><a href="" id="chf">CHF Fr.</a></span>
                        <span><a href="" id="try">TRY ₺</a></span>
                        <span><a href="" id="rub">RUB ₽</a></span>
                    </div>
                </button>
                <?php
                if (isset($_SESSION["name"])) {
                    echo "<a href=\"../php/saved_items.php\" id=\"my-eBay\"> Articoli salvati </a>";
                }
                ?>
            </div>
        </nav>
        <nav id="nav_1_mobile">
            <a href="../../index.php"><img src="../images/eBay_logo.png" class="ebay-logo"/></a>
            <div id="nav_1_mobile_right">
                <div id="mobile_menu" class="relative">
                    <img src="../images/hamburger-icon.png" />
                    <div class="category-menu hidden">
                        <?php
                            if (isset($_SESSION["name"])) {
                                echo "<span>Ciao " . $_SESSION["name"] . "! (<a href=\"logout.php\" class=\"login\">Esci</a>)</span>";
                                echo "<span><a href=\"saved_items.php\">Articoli salvati</a></span>";
                            }
                            else{
                                echo "<span><a href=\"login.php\">Accedi</a></span>";
                                echo "<span><a href=\"signup.php\">Registrati</a></span>";
                            }
                        ?>              
                        <span><a href="help.php">Aiuto e contatti</a></span>
                    </div>
                </div>
            </div>
        </nav>
        <div class="gray-line"></div>
        <h1 class="h1-title">Carrello</h1>
        <article id="main">
            <section id="item-list">
                <div class="item">
                    <div class="img-container">
                        <img src="https://i.ebayimg.com/thumbs/images/g/ViwAAOSwgwJoKs3F/s-l960.webp">
                    </div>
                    <div class="desc">
                        <span class="title">Xiaomi Poco X7</span><br>
                        <span class="price">306.00 €</span><br>
                        <span class="shipping">Spedizione gratuita</span>
                        <a href="">Rimuovi dal carrello</a>
                    </div>
                </div>
                <div class="gray-line"></div>
                <div class="item">
                    <div class="img-container">
                        <img src="https://i.ebayimg.com/thumbs/images/g/ViwAAOSwgwJoKs3F/s-l960.webp">
                    </div>
                    <div class="desc">
                        <span class="title">Xiaomi Poco X7</span><br>
                        <span class="price">306.00 €</span><br>
                        <span class="shipping">Spedizione gratuita</span>
                    </div>
                </div>
            </section>
            <section id="buy-box">
                <div><h3>Totale: </h3> <span id="total">99 €</span></br></div>
                <button>Procedi al pagamento</button>
            </section>
        </article>
        <footer id="footer">
            <div id="copyright">
                Copyright 2025 Matteo Piras. Tutti i diritti riservati.
            </div>  
        </footer>
    </body>
</html>