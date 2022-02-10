<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Loan AUBRY ; Mathieu CHEVALIER ; Axel DUVERDIER ; Thomas FLEURY ; Tom LEBRUN ; Lucas LEPERLIER">
    <meta name="description" content="Page de contact pour Kace">
    <link rel="stylesheet" type="text/css" href="style/contact.css" />
    <link rel="stylesheet" type="text/css" href="style/headerFooter.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/" href="images/icon.png" />
    <title>Contact</title>
</head>
<body>
    <header id="top">
        <nav class="menu">
            <ul>
                <li><a href="tarifs.html">Réservation</a></li>
                <li><a href="planning.html">Planning</a></li>
                <li id="menu-img"> <a id="menu-img" href="index.php"><img id="menu-img" src="images/Logo_Kace_Dark.png"></a> </li>
                <li><a href="artistes.html">Artistes</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="parallax"></div>
    <div>
        <div id="background">
            <div id="formulaire-global">
                <h3> KACE Festival </h3>
                <div>
                    <h1> Besoin d'un reseignement ? </h1>
                    <h1> Ou d'une info ? Contactez-nous.</h1>
                </div>
                <br>
                <p> Nous sommes à votre disposition pour répondre à toutes vos questions.</p>
                <p>Nous essayons de traiter toutes les demandes dans les meilleurs delais. </p>
                <div id="formulaire">
                    <form action="contact.php" id="form_contact" method="post">
                        <div class="form-case"> 
                            <input type="text" id="name" name="name" value="" size="60" placeholder=" Nom">
                        </div>
                        <div class="form-case">
                            <input type="email" id="email" name="email" value="" size="60" placeholder=" Email">
                        </div> <br>
                        <div class="form-case">
                            <textarea name="msg" id="msg" placeholder=" Message"></textarea>
                        </div> <br>
                        <div class="form-case">
                            <input type="submit" name="Envoyer" value="Envoyer" id="Envoyer">
                        </div>
                    </form>
                    <div> 
                        <?php
                        echo "<p style=\"color:#FF0000\";>";
                        if(!empty($_POST)){
                            $error = false;
                            if(empty($_POST['name'])){
                                $error = true;
                                echo "Un nom doit être renseigner <br>";
                            }
                            if(empty($_POST['msg'])){
                                $error = true;
                                echo "Un message doit être renseigner <br>";
                            }
                            if( (empty($_POST['email'])) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
                                $error = true;
                                echo "Veillez renseigner un email valide <br>";
                            }
                            echo "</p>";
                            if($error == false) {
                                if (isset( $_POST['Envoyer'])) {
                                    $tabl = array($_POST['name'],
                                        $_POST['email'],
                                        $_POST['msg']);
                                    $myfile = fopen("contacts.csv", "a") or die("Prbl d'ouverture du fichier !"); 
                                    fputcsv($myfile, $tabl, ";");
                                    fclose($myfile);
                                    echo "<p style=\"color:#008000\";> Le message est bien parti. </p>";
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax"></div>

    <footer>
        <p>&copy KACE Festival Tous droits réservés</p>
        <a href="#"><img src="images/logo_kace_dark_square.png" alt="Logo Kace"></a>
    </footer>

</body>
</html>