<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">    
    <meta name="author" content="Loan AUBRY ; Mathieu CHEVALIER ; Axel DUVERDIER ; Thomas FLEURY ; Tom LEBRUN ; Lucas LEPERLIER">
    <meta name="description" content="Acheter vos billets pour accéder au KACE Festival">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/reservation.css">
    <link rel="stylesheet" type="text/css" href="style/headerFooter.css" />
    <link rel="icon" type="images/" href="images/icon.png" />

    <title>KACE | Réservations</title>
</head>
<body>

<?php
    if (!empty($_POST)) {
        $error = false;
        if (empty($_POST["prenom"])) {
            $error = true;
        }
        if (empty($_POST["nom"])) {
            $error = true;
        }
        if (empty($_POST["email"]) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = true;
        }
        if(empty($_POST["tarif"]) or $_POST["tarif"] < 1 || $_POST["tarif"]>4){
            $error = true;
        }
        if (!$error) {
            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $email = $_POST["email"];
            $tarif=$_POST["tarif"];
            $url = "http://kacefestival".str_replace("/reservation.php", "",$_SERVER["PHP_SELF"])."/ticket_creation.php?prenom=$prenom&nom=$nom&tarif=$tarif&email=$email";
            $enregistrement = array($prenom, $nom, $email, $tarif);
            $fichier = fopen('enregistrements.csv', 'a');
            fputcsv($fichier, $enregistrement, ";");
            header("Location: $url");

        }
    }

    function reprendre_valeur($id)
    {
        if(!empty($_POST)){
        if (!empty($_POST[$id])) {
            echo $_POST[$id];
        }
    }
    echo "";
    }
    ?>

    <header>
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


    <section>
    <div id="reservation">
        <form action="reservation.php" method="post" autocomplete="off">
            <div>
                <h1>RESERVATION</h1>
                <div id="barreorange"></div>
                <p>Réservez votre entrée pour le plus grand festival mondial en remplissant le formulaire suivant. Pensez à imprimer votre ticket, aucun duplicata ne sera réalisé.</p>
            </div>
            <div>
                <h2>Réservez votre entrée</h2>
                <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php reprendre_valeur("nom"); ?>">

                <input type="text" name="prenom" id="prenom" placeholder="Prenom" value="<?php reprendre_valeur("prenom"); ?>">

                <input type="email" name="email" id="email" placeholder="Email" value="<?php reprendre_valeur("email"); ?>">

                <div id="tarif-selection">
                    <ul>
                    <li>
                    <label for="tarif_1">Standard</label>
                    <input type="radio" name="tarif" id="tarif_1" value="1" <?php if(!empty($_GET["type"])&&$_GET["type"]==1) echo "checked"?>>
                    </li>
                    <li>
                    <label for="tarif_2">VIP</label>
                    <input type="radio" name="tarif" id="tarif_2" value="2" <?php if(!empty($_GET["type"])&&$_GET["type"]==2) echo "checked"?>>
                    </li>
                    <li>
                    <label for="tarif_3">Kace +</label>
                    <input type="radio" name="tarif" id="tarif_3" value="3" <?php if(!empty($_GET["type"])&&$_GET["type"]==3) echo "checked"?>>
                    </li>
                    <li>
                    <label for="tarif_4">K Gold</label>
                    <input type="radio" name="tarif" id="tarif_4" value="4" <?php if(!empty($_GET["type"])&&$_GET["type"]==4) echo "checked"?>>
                    </li>
                    </ul>
                </div>

                <button type="submit">Réserver !</button>
                <?php if(isset($error) && $error){echo "<p class=\"alerte\">Erreur dans le formulaire</p>";} ?>
            </div>
        </form>
    </div>
    
    </section>


    <div class="parallax"></div>

    <footer>
        <p>&copy KACE Festival Tous droits réservés</p>
        <a href="#"><img src="images/logo_kace_dark_square.png" alt="Logo Kace"></a>
    </footer>


</body>

</html>