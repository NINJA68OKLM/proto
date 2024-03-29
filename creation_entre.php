<?php
session_start();
session_id();
// Importation de PHPMailer
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require 'path/to/PHPMailer-master/src/Exception.php';
// require 'path/to/PHPMailer-master/src/PHPMailer.php';
// require 'path/to/PHPMailer-master/src/SMTP.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style_O.css" media="screen and (min-width: 1200px)">
    <!-- <link rel="stylesheet" href="styles/background_1.css">
    <link rel="stylesheet" href="styles/background_1_O.css" media="screen and (min-width: 1200px)"> -->
    <title>Signature Generator : Création entreprise</title>
    <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
    <script src="js/jquery-cookie-master/src/jquery.cookie.js" type="text/javascript"></script>
    
    <script src="js/accept-cookie.js"></script>
    <script src="js/app.js"></script>
</head>
<body>
    <fieldset>
        <div class="gauche">
            <a href="/">
                <img src="img/logo.png" alt="" style="width: 100%;">
            </a>
            <h1 style="margin-top: 10px; margin-bottom: 0px !important;">Signature Generator</h1>
        </div>
        <div class="droite">
            <h1>Votre entreprise</h1>
            <div style="display: flex;">
                <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form_entre">
                    <div class="form">
                        <div class="col1">
                            <p>Nom d'entreprise :</p> <br>
                            <p>Adresse :</p> <br>
                            <p>Ville :</p> <br>
                            <p>Code postal :</p> <br>
                        </div>
                        <div class="col2">
                            <input type="text" name="entr" id="" value="<?php if (!empty($_POST['entr'])) { echo $_POST['entr'] ; } ?>"><br>
                            <input type="text" name="adre" id="" value="<?php if (!empty($_POST['adre'])) { echo $_POST['adre'] ; } ?>"><br>
                            <input type="text" name="vill" id="" value="<?php if (!empty($_POST['vill'])) { echo $_POST['vill'] ; } ?>" id="ville" autocomplete="on"><br>
                            <input type="text" name="cp" id="" maxlength="5" value="<?php if (!empty($_POST['cp'])) { echo $_POST['cp'] ; } ?>">
                        </div>
                    </div>
                    <div class="form">
                        <div class="col3">
                            <p>Numéro de teléphone :</p> <br>
                            <p>Adresse mail</p> <br>
                            <p>Site internet :</p> <br>
                            <p>Nombre d'employés :</p> <br>
                            <p>Signature :</p> <br>
                            <p style="margin-top: 25px;">Logo :</p> <br>
                        </div>
                        <div class="col4">
                            <input type="tel" name="tel" id="" maxlength="10" value="<?php if (!empty($_POST['tel'])) { echo $_POST['tel'] ; } ?>"><br>
                            <input type="email" name="adrmail" id="" value="<?php if (!empty($_POST['adrmail'])) { echo $_POST['adrmail'] ; } ?>"><br>
                            <input type="url" name="site" id="" value="<?php if (!empty($_POST['site'])) { echo $_POST['site'] ; } ?>"><br>
                            <input type="text" name="empl" id="" value="<?php if (!empty($_POST['empl'])) { echo $_POST['empl'] ; } ?>"><br>
                            <input type="radio" name="sign" value="haut" id="" <?php if (isset($_POST['sign']) && ($_POST['sign']=="haut")) { echo "checked='checked'"; } ?>> Haut 
                            <input type="radio" name="sign" value="bas" id="" <?php if (isset($_POST['sign']) && ($_POST['sign']=="bas")) { echo "checked='checked'"; } ?>> Bas <br>
                            <input type="radio" name="sign" value="gauche" id="" <?php if (isset($_POST['sign']) && ($_POST['sign']=="gauche")) { echo "checked='checked'"; } ?>> Gauche 
                            <input type="radio" name="sign" value="droite" id="" <?php if (isset($_POST['sign']) && ($_POST['sign']=="droite")) { echo "checked='checked'"; } ?>> Droite <br>
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000000"> <br class="br">
                            <input type="file" name="logo" id="files" value=""> <br>
                            <label for="files" id="label_file" style="display: none;"> <div class="file" style="color: black;">Parcourir...</div> <p name="filename" class="filename"> <?php
                                if (!empty($_FILES["logo"]) && is_uploaded_file($_FILES["logo"]["tmp_name"]))
                                {
                                    // Importation du logo/image
                                    $target='img/uploads/'.basename($_FILES['logo']['name']);
                                    if(move_uploaded_file($_FILES['logo']['tmp_name'],$target)) {
                                        $fp = fopen($target, "r");
                                    }
                                    $_SESSION['logonom']=$_FILES['logo']['name'];
                                    echo $_SESSION['logonom'];
                                }
                                else
                                {
                                    echo "Aucun fichier selectionné...";
                                }
                            ?></p></label>
                        </div>
                        
                    </div>
                    <input type="submit" name="ok" value="Déclarez l'entreprise" class="button entre_decla"> 
                    <input type="submit" name="next" value="Déclarez les employés" class="button entre_confirm" style="display: none;">
                    <p style="font-weight: bold; color: #000000; margin-top: 15px; margin-bottom: 15px;">*Le nom de l'entreprise et la ville doivent obligatoirement commencer par une majuscule !</p>
                    <input type="submit" name="connex" value="Connexion" class="button entre_connex" style="display: none;">
                </form>
                <div class="col5">
                    <p style="font-weight: bold; color: #000000 !important;">Signatures :</p> <br>
                    <img src="img/signa-exemple.jpg" alt="Aperçu des signatures" loading="lazy" style="max-width: 850px;">
                </div>
                
            </div>
        </div>
    </fieldset>
    <?php
    if (isset($_POST['ok']) && isset($_POST['sign']) && !empty($_POST['entr']) && !empty($_POST['adre']) && !empty($_POST['cp']) && !empty($_POST['vill']) && !empty($_POST['tel']) && filter_var($_POST['adrmail'], FILTER_VALIDATE_EMAIL) && !empty($_POST['site']))
    {
        if (!empty($_POST['empl']))
        {
            // Valeurs des champs récupérés en tant que variables de sessions
            $logo = $_FILES["logo"]["name"];
            $_SESSION['logo']=$_FILES['logo'];
            $_SESSION['logonom']=$_FILES['logo']['name'];
            $_SESSION['logo_tmp']=$_FILES['logo']['tmp_name'];
            $_SESSION['entr']=$_POST['entr'];
            $_SESSION['adre']=$_POST['adre'];
            $_SESSION['cp']=$_POST['cp'];
            $_SESSION['vill']=$_POST['vill'];
            $_SESSION['tel']=$_POST['tel'];
            $_SESSION['adrmail']=$_POST['adrmail'];
            $_SESSION['site']=$_POST['site'];
            $_SESSION['empl']=$_POST['empl'];
            $_SESSION['sign']=$_POST['sign'];
            // Enregistrement de l'entreprise dans la base de données
            // Connexion à la base de données
            $servername = "localhost";
            $username = "admin__";
            $password = "5YbsW6lVuo4wwh^a";
            $dbname = "signature";
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Vérification de la connexion
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // Vérifie si l'entreprise existe déjà exite dans la base de données
            $requete= "SELECT * FROM entreprise WHERE nom='".$_SESSION['entr']."' AND adresse='".$_SESSION['adre']."' AND cp='".$_SESSION['cp']."' AND ville='".$_SESSION['vill']."' AND adr_mail='".$_SESSION['adrmail']."' AND site='".$_SESSION['site']."'";
            $result = $conn->query($requete);
            // echo $requete."<br>";
            // echo "Nombre d'entreprises enregistrés à ce nom : ".$result->num_rows."<br>";
            if ($result->num_rows > 0) {
                echo "<p class='confirmation' style='margin: 15px;'>Cette entreprise existe déjà dans notre base de données !</p>";
            }
            else {
                // Enregistrement des identifiants dans l'entreprise
                $sql = "INSERT INTO entreprise (nom, adresse, tel, ville, cp, site, employe, signature, logo, rs, adr_mail, ide, mdp, facebook, twitter, instagram, linkedin, youtube, rs_style, pub, banniere) VALUES ('".$_SESSION['entr']."', '".$_SESSION['adre']."', ".$_SESSION['tel'].", '".$_SESSION['vill']."', ".$_SESSION['cp'].", '".$_SESSION['site']."', ".$_SESSION['empl'].", '".$_SESSION['sign']."', '".$_SESSION['logonom']."', '', '".$_SESSION['adrmail']."', '', '', '', '', '', '', '', '', '', '')";
                // echo $sql."<br>";
                // Execution des deux requêtes 
                // $conn->query($sql);
                
                if ($conn->query($sql) == TRUE) {
                    // Enregistrement d'un "employé" dans l'entreprise qui aura l'admin 1 et permettra d'afficher tous les autres dans l'espace client 
                    $sqll = "INSERT INTO employes (id, nom, prenom, fonction, ld, mail, admin, ide, mdp) VALUES ('', '".$_SESSION['entr']."', '-----', '-----', '------', '".$_SESSION["adrmail"]."', 1, '', '')";
                    $conn->query($sqll);
                    // Message pour déclarer les employés
                    echo "<p class='confirmation' style='margin: 15px;'>Votre entreprise a bien été enregistré dans notre base de données ! A présent déclarez vos employés.</p><br>";
                    // Génération des identifiants
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < 20; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $ide = strtolower($_SESSION['entr']).".signature-cactus.fr";
                    // Enregistrement des identifiants dans la base de données
                    $update = "UPDATE entreprise SET ide='".$ide."', mdp='".$randomString."' WHERE nom='".$_SESSION['entr']."'";
                    // echo $update;
                    $conn->query($update);
                    // !!! Remettre le code de "select_id.php" au cas où le cookie qui permet la récupération de l'id de l'entreprise dans la bdd ne fonctionne pas
                    // Code de functions/select-id() -> le but de ce code est de récu^érer l'id attribué à l'entreprise dans la BDD car il s'agit d'un champ AUTO_INCREMENT
                    $recherche = "SELECT id FROM entreprise WHERE nom='".$_SESSION['entr']."'";
                    $ligne = $conn->query($recherche);
                    $id = $ligne->fetch_row();
                    $_SESSION['bddid'] = $id[0];
                    $_COOKIE['bddid'] = $id[0];
    ?>
    <!-- A la base ce script JS devait servir à créer le cookie de stockage pour l'id mais à cause de bugs sur le serveur il a été passé en commentaires, à remettre en place que pour des tests ! -->
    <!-- <script>
        // Récupération de l'id de l'entreprise dans la bdd et déclaration en tant que cookie pour la réutiliser plus tard
        jQuery(function ($) {
            $.get("functions/select_id.php", function(data) {
                console.log(data)
                $.cookie("bddid", data, { expires : 1 })
                $("body").append("Le chiffre est : "+data)
            })
        })
    </script> -->
    <?php
                    // Enregistrement d'un "employé" dans l'entreprise qui aura l'admin 1 et permettra d'afficher tous les autres dans l'espace client 
                    $sqll = "INSERT INTO employes (id, nom, prenom, fonction, ld, mail, admin, ide, mdp) VALUES (".$_COOKIE['bddid'].", '".$_SESSION['entr']."', '', '', '', '".$_SESSION["adrmail"]."', 1, '', '')";
                    $conn->query($sqll);
                    // Enregistrement de ses identifiants
                    $updatee = "UPDATE employes SET ide='".$ide."', mdp='".$randomString."' WHERE nom='".$_SESSION['entr']."'";
                    $conn->query($updatee);
                    // Pour ne pas modifier le fichier php.ini, on utilise ce bout de code afin de connecter le fichier au SMTP
                    ini_set("SMTP","localhost");
                    ini_set("smtp_port","25");
                    // Envoi du mail
                    $destinataire = $_SESSION['adrmail'];
                    $expediteur   = 'generator@signature.cactus.com';
                    $reponse      = $expediteur;
                    echo "<p class='confirmation' style='margin: 15px;'>Vos identifiants vous ont étés envoyés par mail.</p>";
                    $codehtml=
                        "<font face='arial'>
                        Vos identifiants administrateur pour l'accès à Signature Generator sont disponibles.<br><br>
                        Identifiant : ".$ide."<br>
                        Mot de passe : ".$randomString."
                        </font>";
                    mail($destinataire,
                        'Email au format HTML',
                        $codehtml,
                        "From: $expediteur\r\n".
                            "Reply-To: $reponse\r\n".
                            "Content-Type: text/html; charset=\"UTF-8\"\r\n");
                } else {
                    echo "<p class='confirmation' style='margin: 15px;'>Un problème a été détecté, veuillez réessayer plus tard</p>";
                }
            }
            $conn->close();
        }
    }
    else
    {
        echo "<p style='margin: 15px;'>Remplissez le formulaire</p>";
    }
    ?>
    <p class="message"></p>
</body>
</html>