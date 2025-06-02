<?php
    if(!isset($_GET["category"]) && !isset($_GET["title"])){
        header("Location: ../../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <?php
                if(isset($_GET["category"]) && !isset($_GET["title"])){
                    echo "<title>".$_GET["category"]."</title>";
                }
                else if(!isset($_GET["category"]) && isset($_GET["title"])){
                    echo "<title>".$_GET["title"]."</title>";
                }
                else{
                    echo "<title>".$_GET["category"] ." - ". $_GET["title"]."</title>";
                }
            ?>
        <link rel="stylesheet" href="../css/navbar.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <link rel="stylesheet" href="../css/mobile_pages.css" />
        <link rel="stylesheet" href="../css/storepage.css" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <script src="../js/storepage.js" defer></script>
        <script src="../js/mobile.js" defer></script>       
    </head>
    <body>
        <form name="item_values">
            <?php
                if(isset($_GET["category"]) && !isset($_GET["title"])){
                    echo "<input type=\"hidden\" name=\"category\" value=\"".$_GET["category"]."\">";
                }
                else if(!isset($_GET["category"]) && isset($_GET["title"])){
                    echo "<input type=\"hidden\" name=\"title\" value=\"".$_GET["title"]."\">";
                }
                else{
                    echo "<input type=\"hidden\" name=\"category\" value=\"".$_GET["category"]."\">";
                    echo "<input type=\"hidden\" name=\"title\" value=\"".$_GET["title"]."\">";
                }
            ?>
        </form>
        <nav id="nav_1">
            <div id="nav_1_left">
                <a href="../../index.php"><img src="../images/eBay_logo.png" class="ebay-logo"></a>
				<?php
					session_start();
					if (isset($_SESSION["name"])) {
						echo "<span>Ciao " . $_SESSION["name"] . "! (<a href=\"../php/logout.php\" class=\"login\">Esci</a>)</span>";
					} else {
						echo "<span>Ciao! (<a href=\"../php/login.php\" class=\"login\">Accedi</a> o <a href=\"../php/signup.php\" class=\"login\">Registrati</a>)</span>";
					}
				?>
                <a href="../php/help.php">
                    Aiuto e contatti
                </a>
            </div>
            <div id="nav_1_right">
                <?php
                if (isset($_SESSION["name"])) {
                    echo "<a href=\"../php/saved_items.php\" id=\"my-eBay\"> Articoli salvati </a>";
                }
                ?>
                <a href="cart.php"><img src="../images/shopping-cart-icon.png" id="shopping-cart-icon"/></a>
            </div>
        </nav>
        <nav id="nav_1_mobile">
            <a href="../../index.php"><img src="../images/eBay_logo.png" class="ebay-logo"/></a>
            <div id="nav_1_mobile_right">
                <a href="cart.php"><img src="../images/shopping-cart-icon.png" /></a>
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
        <article id="main">
            <!-- <section id="categories">
                <h3>Categorie di prodotti</h3>
                <div>PC</div>
                <div>Telefonia mobile</div>
                <div>Tablet</div>
                <div>Tastiere</div>
                <div>Mouse</div>
                <div>Cuffie</div>
            </section> -->
            <section id="item-list">
            </section>
        </article>
        <footer id="footer">
            <div id="footer-container">
                <div class="block-container">
                    <span>Compra</span><br>
                    Come fare acquisti<br>
                    Acquisti per categoria<br>
                    eBay Imperdibili<br>
                    App eBay<br>
                    I brand in vendita su eBay<br>
                    Marche auto<br>
                    Aste di beneficenza<br>
                    Negozi Hub<br>
                    eBay Extra<br>
                </div>
                <div class="block-container">
                    <span>Vendi su eBay</span><br>
                    Spazio venditori<br>
                    Tariffe venditori<br>
                    Negozi<br>
                    Centro spedizioni<br>
                    Protezione venditori<br>
                    Vendite internazionali<br>
                    Novità per i venditori professionali<br>
                    Strumenti di vendita<br>
                </div>
                <div class="block-container">
                    <span>A proposito di eBay</span><br>
                    Informazioni Note legali<br>
                    Mediazione<br>
                    Ufficio stampa<br>
                    Pubblicità su eBay<br>
                    Affiliazione<br>
                    Lavora in eBay<br>
                    VeRO: Proprietà Intellettuale<br>
                </div>
                <div class="block-container">
                    <p>
                        <span>Aiuto e contatti</span><br>
                        Spazio sicurezza<br>
                        Garanzia cliente eBay<br>
                    </p>
                    <p>
                        <span>Community</span><br>
                        Facebook<br>
                        YouTube<br>
                        Instagram<br>
                        Domande e risposte tra utenti<br>
                        Forum<br>
                        Gruppi<br>
                        Bacheca Annunci<br>
                    </p>
                </div>
            </div>
            <div id="footer-mobile">
                <a href="">Aziende del gruppo eBay</a>
                <a href="">Bacheca Annunci</a>
                <a href="">Community</a>
                <a href="">Spazio Sicurezza</a>
                <a href="">Come vendere</a>
                <a href="">Spazio venditori</a>
                <a href="">Regole eBay</a>
                <a href="">Affiliazione</a>
                <a href="assets/php/help.php">Aiuto e contatti</a>
                <a href="">Mappa del sito</a>
            </div>
            <div id="copyright">
                Copyright 2025 Matteo Piras. Tutti i diritti riservati.
            </div>
        </footer>
    </body>
</html>