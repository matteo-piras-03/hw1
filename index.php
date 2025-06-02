<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>hw1</title>
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/navbar.css" />
        <link rel="stylesheet" href="assets/css/index.css" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <script src="assets/js/mobile.js" defer></script>
        <script src="assets/js/index.js" defer></script>
    </head>
    <body>
        <nav id="nav_1">
            <div id="nav_1_left">
				<?php
					if (isset($_SESSION["name"])) {
						echo "<span>Ciao " . $_SESSION["name"] . "! (<a href=\"assets/php/logout.php\" class=\"login\">Esci</a>)</span>";
					} else {
						echo "<span>Ciao! (<a href=\"assets/php/login.php\" class=\"login\">Accedi</a> o <a href=\"assets/php/signup.php\" class=\"login\">Registrati</a>)</span>";
					}
				?>
                <a href="assets/php/help.php">
                    Aiuto e contatti
                </a>
            </div>
            <div id="nav_1_right">
                <button class="relative" id="currency-exchange">
                    Tasso di cambio <img src="assets/images/chevron-down.png" class="chevron-down"/>
                    <div class="category-menu hidden">
                        <span><a id="eur">EUR €</a></span>
                        <span><a id="usd">USD $</a></span>
                        <span><a id="gbp">GBP £</a></span>
                        <span><a id="chf">CHF Fr.</a></span>
                        <span><a id="try">TRY ₺</a></span>
                        <span><a id="rub">RUB ₽</a></span>
                    </div>
                </button>
                <?php
                if (isset($_SESSION["name"])) {
                    echo "<a href=\"assets/php/saved_items.php\" id=\"my-eBay\"> Articoli salvati </a>";
                }
                ?>
                <a href="assets/php/cart.php"><img src="assets/images/shopping-cart-icon.png" id="shopping-cart-icon"/></a>
            </div>
        </nav>
        <nav id="nav_1_mobile">
            <img src="assets/images/eBay_logo.png" class="ebay-logo"/>
            <div id="nav_1_mobile_right">
                <a href="assets/php/cart.php"><img src="assets/images/shopping-cart-icon.png" /></a>
                <div id="mobile_menu" class="relative">
                    <img src="assets/images/hamburger-icon.png" />
                    <div class="category-menu hidden">
                        <?php
                            if (isset($_SESSION["name"])) {
                                echo "<span>Ciao " . $_SESSION["name"] . "! (<a href=\"assets/php/logout.php\" class=\"login\">Esci</a>)</span>";
                                echo "<span><a href=\"assets/php/saved_items.php\">Articoli salvati</a></span>";
                            }
                            else{
                                echo "<span><a href=\"assets/php/login.php\">Accedi</a></span>";
                                echo "<span><a href=\"assets/php/signup.php\">Registrati</a></span>";
                            }
                        ?>              
                        <span><a href="assets/php/help.php">Aiuto e contatti</a></span>
                    </div>
                </div>
            </div>
        </nav>
        <div class="gray-line"></div>
        <header id="header">
            <a href="index.php"><img src="assets/images/eBay_logo.png" class="ebay-logo"></a>
            <form>
                <div id="search_bar">
                    <input type="text" name="query" placeholder="Cerca su eBay" id="search_box" required>
                    <input type="image" src="assets/images/search-icon.png" id="search-img"/>
                </div>
                <input type="submit" value="Cerca" id="search_button">
            </form>
        </header>
        <div class="gray-line"></div>
        <nav id="nav_2">
            <a href="assets/php/store_page.php?category=electronics">
                Elettronica
            </a>
            <a href="assets/php/store_page.php?category=household_appliances">
                Elettrodomestici
            </a>
            <a href="assets/php/store_page.php?category=home_garden">
                Casa e Giardino
            </a>
            <a href="assets/php/store_page.php?category=collectibles">
                Collezionismo
            </a>
            <a href="assets/php/store_page.php?category=fashion">
                Moda
            </a>
            <a href="assets/php/store_page.php?category=sport">
                Sport
            </a>
            <a href="assets/php/store_page.php?category=motors">
                Motori
            </a>
            <a href="assets/php/store_page.php?category=refurbished">
                Ricondizionato
            </a>
        </nav>
        <article id="main">
            <section id="search_results" class="hidden">
                <h1>Risultati della ricerca</h1>
                <div id="search_results_container">
                </div>
            </section>
            <section id="section-1" class="content-1">
                <div id="overlay-1">
                    <div class="upper">
                        <div class="text">
                            <h1>Restituisci con facilità</h1>
                            <p>Se l'ordine non ti soddisfa, puoi restituirlo senza problemi.<br></p>
                            <button class="button-1 text-button">Scopri di più</button>
                        </div>
                        <img src="" class="hidden"/>
                    </div>
                    <div id="nav-small">
                        <div class="spacer"></div>
                        <div id="nav-small-left">
                            <div class="dot" data-index="0" data-active="1" data-content="1"></div>
                            <div class="dot" data-index="1" data-active="0" data-content="1"></div>
                            <div class="dot" data-index="2" data-active="0" data-content="1"></div>
                        </div>
                        <div id="nav-small-right">
                            <button data-position="left">
                                <img src="assets/images/chevron-left.png" class="chevron-left"/>
                            </button>
                            <button data-position="right">
                                <img src="assets/images/chevron-right.png" class="chevron-right"/>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <h1>I brand più ricercati su eBay</h1>
            <section id="section-2">
                <a href="assets/php/store_page.php?title=apple">
                    <div class="circle">
                        <img src="assets/images/apple_logo.png" />
                    </div>
                    <span>
                        Apple
                    </span>
                </a>
                <a href="assets/php/store_page.php?title=dyson">
                    <div class="circle">
                        <img src="assets/images/dyson_logo.png" />
                    </div>
                    <span>
                        Dyson
                    </span>
                </a>
                <a href="assets/php/store_page.php?title=samsung">
                    <div class="circle">
                        <img src="assets/images/samsung_logo.png" />
                    </div>
                    <span>
                        Samsung
                    </span>
                </a>
                <a href="assets/php/store_page.php?title=nintendo">
                    <div class="circle">
                        <img src="assets/images/nintendo_logo.png" />
                    </div>
                    <span>
                        Nintendo
                    </span>
                </a>
                <a href="assets/php/store_page.php?title=pokemon">
                    <div class="circle">
                        <img src="assets/images/pokemon_logo.png" />
                    </div>
                    <span>
                        Pokémon
                    </span>
                </a>
                <a href="assets/php/store_page.php?title=playstation">
                    <div class="circle">
                        <img src="assets/images/playstation_logo.png" />
                    </div>
                    <span>
                        PlayStation
                    </span>
                </a>
                <a href="assets/php/store_page.php?title=lego">
                    <div class="circle">
                        <img src="assets/images/LEGO_logo.png" />
                    </div>
                    <span>
                        Lego
                    </span>
                </a>
            </section>
            <section id="section-3">
                <div>
                    <h1>Servizio clienti eBay</h1>
                    <p>Dalla spedizione ai resi, se hai dubbi, siamo qui per aiutarti.</p>
                </div>
                <a href="assets/php/help.php" class="button">Scopri di più</a>
            </section>
            <section id="section-4">
                <div class="item-list">
                    <div class="item first">
                        <div class="text">
                            <h1>Fino al 25% di sconto su Zipper!</h1>
                            Una selezione per il giardino e il fai da te<br>
                            <a href="assets/php/store_page.php?title=zipper" class="button">Compra</a>
                        </div>
                    </div>
                    <div class="hidden">
                        <div class="relative">
                            <img src="https://i.ebayimg.com/images/g/drwAAOSwxNllQ1bH/s-l500.jpg" />
                            <div class="save-button"data-fullstate="true"></div>
                            <div class="buy-button"data-fullstate="true"></div>
                        </div>
                        <p>
                            CARRIOLA ELETTRICA A BATTERIA 24V 500W ZIPPER ZI-EWB500<br>
                            <span class="price">379.00 €</span>  <span class="old-price">430.80 €</span>
                        </p>
                    </div>
                </div>
            </section>
            <section id="section-5">
                <div class="item-list">
                    <div class="item first">
                        <div class="text">
                            <h1>Elettrodomestici ricondizionati</h1>
                            Approfitta del coupon 10%<br>
                            <a href="assets/php/store_page.php?category=refurbished" class="button">Compra</a>
                        </div>
                    </div>
                </div>
            </section>
            <h1>Il marketplace delle passioni</h1>
            <section id="section-6">
                <a href="assets/php/store_page.php?category=electronics">
                    <img src="https://ir.ebaystatic.com/cr/v/c01/1_PopDest_Homepage_Refresh_Elettronica.jpg"/>
                    <span>
                        Elettronica
                    </span>
                </a>
                <a href="assets/php/store_page.php?category=household_appliances">
                    <img src="https://i.ebayimg.com/images/g/XVIAAOSwTo9j8zCN/s-l500.jpg"/>
                    </div>
                    <span>
                        Elettrodomestici
                    </span>
                </a>
                <a href="assets/php/store_page.php?category=home_garden">
                    <img src="https://i.ebayimg.com/images/g/5f4AAOSwXrhj8zCO/s-l500.jpg"/>
                    </div>
                    <span>
                        Casa e giardino
                    </span>
                </a>
                <a href="assets/php/store_page.php?category=motors">
                    <img src="https://i.ebayimg.com/images/g/86oAAOSwx-xj8zCO/s-l500.jpg"/>
                    </div>
                    <span>
                        Motori
                    </span>
                </a>
                <a href="assets/php/store_page.php?category=collectibles">
                    <img src="https://i.ebayimg.com/images/g/6HwAAOSwsSxj8zCO/s-l500.jpg"/>
                    </div>
                    <span>
                        Collezionismo e passioni
                    </span>
                </a>
                <a href="assets/php/store_page.php?category=fashion">
                    <img src="https://ir.ebaystatic.com/cr/v/c01/PopDest_Homepage_Refresh_ModaBellezza.jpg"/>
                    </div>
                    <span>
                        Moda e bellezza
                    </span>
                </a>
                <a href="assets/php/store_page.php?category=refurbished">
                    <img src="https://i.ebayimg.com/images/g/H6QAAOSwnntj80O-/s-l500.jpg"/>
                    </div>
                    <span>
                        Ricondizionato
                    </span>
                </a>
            </section>
            <section id="section-7">
                <div class="text">
                    <h1>Esplora gli aritcoli di moda</h1>
                    Trova i prodotti in offerta e risparmia fino a 100€<br>
                    <a href="assets/php/store_page.php?category=fashion" class="button">Inizia ora</a>
                </div>
                <img src="assets/images/clothing.jpg" />
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