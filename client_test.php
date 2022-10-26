<?php
session_start();
session_id();
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signature";
$conn = new mysqli($servername, $username, $password, $dbname);
// Vérifie si la personne s'est bien authentifié via le login si ce n'est pas le cas, la personne est redirigé
if (isset($_COOKIE['nom_0']) && isset($_COOKIE['prenom_0']) && isset($_COOKIE['mail_0']) && isset($_COOKIE['mail_0']) && isset($_COOKIE['ld_0']) && isset($_COOKIE['fonction_0']))
{
    // // Stockage des informations de l'entreprise en tant que cookies
    // $rech= $requete= "SELECT * FROM entreprise WHERE id='".$_COOKIE['idd']."'";
    // $resu = $conn->query($requete);
    // // Déclaration des cookies d'entreprise
    // if ($result->num_rows > 0) {
    // echo "ta grand mère la pute je vais te soulever";
    $_COOKIE['logo'] = "jjjjjjjjjjjjjj";
}
else
{
    header("Location: login.php");
}
// Vérification de la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    // Recherche du nom de l'entreprise de l'employé
    $requete= $requete= "SELECT * FROM entreprise WHERE id='".$_COOKIE['idd']."'";
    $result = $conn->query($requete);
    // Déclaration des cookies d'entreprise
    if ($result->num_rows > 0) {
    $ligne = $result->fetch_array(MYSQLI_ASSOC);
    $entr = $ligne["nom"];
    $adre = setcookie("adre", $ligne["adresse"], time()+3600);
    $adre = $_SESSION['adre']=$ligne['adresse'];
    $cp = setcookie("cp", $ligne["cp"], time()+3600);
    $vill = setcookie("vill", $ligne["ville"], time()+3600);
    $site = setcookie("site", $ligne["site"], time()+3600);
    $tel = setcookie("tel", $ligne["tel"], time()+3600);
    $logo = setcookie("logo", $ligne["logo"], time()+3600);
    $signature = setcookie("signature", $ligne["signature"], time()+3600);
    $rs = setcookie("rs", "", time()+3600);
    echo $_COOKIE['logo'];
    $_SESSION["logonom"] = $_COOKIE['logo'];
    for ($z=0; $z < $_COOKIE['nb_client']; $z++) { 
      $_SESSION['nom_'.$z]=$_COOKIE['nom_'.$z];
    }
}
else
{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style_O.css" media="screen and (min-width: 1200px)">
    <link rel="stylesheet" href="styles/background_2_O.css" media="screen and (min-width: 1200px)">
    <title>Signature Generator</title>
    <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
    <script src="js/jquery-cookie-master/src/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/app.js"></script>
</head>
<body>
    <?php
    // echo $_COOKIE['nb_client'];
     
     
        echo "<fieldset class='field_client'>
                <div class='gauche'>
                    <img src='img/logo.png' alt='' style='width: 100%;'>
                    <h1 style='margin-top: 10px; margin-bottom: 0px !important;'>Signature Generator</h1>
                </div>";
                if ($_COOKIE['nb_client'] == 1)
                {
                  echo "<div class='droite'>
                  <h1>Vos informations personnelles</h1>
                  <form action='".$_SERVER['PHP_SELF']."' method='post' class='formclient_0 formclient'>
                          <div class='".$_COOKIE['nom_0']." formclientt'>
                              <div class='form form_0' id='0'>
                                  <div class='col5 client'>
                                      <p>Nom :</p> <br>
                                      <p>Prénom :</p> <br>
                                      <p>Fonction :</p> <br>
                                      <p>Ligne directe :</p> <br>
                                      <p>Mail :</p> <br>
                                  </div>
                                  <div class='col6 client'>
                                      <input type='text' name='nom_0' id='' value='";
                                      if (!empty($_POST['nom_0']))
                                      {
                                          $_COOKIE['nom_0'] = $_POST['nom_0'];
                                          echo $_COOKIE['nom_0'];
                                      }
                                      else
                                      {
                                          echo $_COOKIE['nom_0'];
                                      }
                                      echo "'><br>
                                      <input type='text' name='prenom_0' id='' value='";
                                      if (!empty($_POST['prenom_0']))
                                      {
                                          $_COOKIE['prenom_0'] = $_POST['prenom_0'];
                                          echo $_COOKIE['prenom_0'];
                                      }
                                      else
                                      {
                                          echo $_COOKIE['prenom_0'];
                                      }
                                      echo "'><br>
                                      <input type='text' name='fonction_0' id='' value='";
                                      if (!empty($_POST['fonction_0']))
                                      {
                                          $_COOKIE['fonction_0'] = $_POST['fonction_0'];
                                          echo $_COOKIE['fonction_0'];
                                      }
                                      else
                                      {
                                          echo $_COOKIE['fonction_0'];
                                      }
                                      echo "'><br>
                                      <input type='text' name='ld_0' id='' value='";
                                      if (!empty($_POST['ld_0']))
                                      {
                                          $_COOKIE['ld_0'] = $_POST['ld_0'];
                                          echo $_COOKIE['ld_0'];
                                      }
                                      else
                                      {
                                          echo $_COOKIE['ld_0'];
                                      }
                                      echo "'><br>
                                      <input type='text' name='mail_0' id='' value='";
                                      if (!empty($_POST['mail_0']))
                                      {
                                          $_COOKIE['mail_0'] = $_POST['mail_0'];
                                          echo $_COOKIE['mail_0'];
                                      }
                                      else
                                      {
                                          echo $_COOKIE['mail_0'];
                                      }
                                      echo "'> <br>
                                  </div>
                                  <div class='croix ".$_COOKIE['nom_0']."'>
                                    <img src='img/croix.png' alt='Icone supression - Signature Generator' loading='lazy' data-form-id='0'>
                                </div>
                              </div>
                          </div>
                          <input type='submit' name='confirm_0' value='Enregistrer' class='button enregsitre_0 enregistrer'>
                          <input type='submit' name='apercu_0' value='Aperçu' class='button apercu_0 apercu_submit' style='margin-left: 95px;'>
                          <a href='signatures/Signature_".$_COOKIE['nom_0']."_".$_COOKIE['prenom_0'].".html' download value='Télécharger' class='button telecharger button telech' name='telecharger_0' style='border-top: 1px solid #FFF; margin-left: 15px;'>Télécharger</a>
                      </form>
                <div class='reponse_client reponse_client_0'></div>
              </div>";
                }
                else
                {
                  echo "<div class='droite'>
                    <h1>Les employés de votre entreprise</h1>";
                    for ($z=0; $z < $_COOKIE['nb_client']; $z++) { 
                        echo "<form action='".$_SERVER['PHP_SELF']."' method='post' class='formclient_".$z." formclient'>
                                <div class='".$_COOKIE['nom_'.$z]." formclientt'>
                                <h2 style='margin-top: 25px; margin-bottom: 25px; padding-left: 15px;'>Employé n° ".($z+1)."</h2>
                                    <div class='form form_".$z."' id='".$z."'>
                                        <div class='col5 client'>
                                            <p>Nom :</p> <br>
                                            <p>Prénom :</p> <br>
                                            <p>Fonction :</p> <br>
                                            <p>Ligne directe :</p> <br>
                                            <p>Mail :</p> <br>
                                        </div>
                                        <div class='col6 client'>
                                            <input type='text' name='nom_".$z."' id='' value='";
                                            if (!empty($_POST['nom'.$z]))
                                            {
                                                $_COOKIE['nom_'.$z] = $_POST['nom_'.$z];
                                                echo $_COOKIE['nom_'.$z];
                                            }
                                            else
                                            {
                                                echo $_COOKIE['nom_'.$z];
                                            }
                                            echo "'><br>
                                            <input type='text' name='prenom_".$z."' id='' value='";
                                            if (!empty($_POST['prenom'.$z]))
                                            {
                                                $_COOKIE['prenom_'.$z] = $_POST['prenom'.$z];
                                                echo $_COOKIE['prenom_'.$z];
                                            }
                                            else
                                            {
                                                echo $_COOKIE['prenom_'.$z];
                                            }
                                            echo "'><br>
                                            <input type='text' name='fonction_".$z."' id='' value='";
                                            if (!empty($_POST['fonction'.$z]))
                                            {
                                                $_COOKIE['fonction_'.$z] = $_POST['fonction'.$z];
                                                echo $_COOKIE['fonction_'.$z];
                                            }
                                            else
                                            {
                                                echo $_COOKIE['fonction_'.$z];
                                            }
                                            echo "'><br>
                                            <input type='text' name='ld_".$z."' id='' value='";
                                            if (!empty($_POST['ld'.$z]))
                                            {
                                                $_COOKIE['ld_'.$z] = $_POST['ld'.$z];
                                                echo $_COOKIE['ld_'.$z];
                                            }
                                            else
                                            {
                                                echo $_COOKIE['ld_'.$z];
                                            }
                                            echo "'><br>
                                            <input type='text' name='mail_".$z."' id='' value='";
                                            if (!empty($_POST['mail'.$z]))
                                            {
                                                $_COOKIE['mail_'.$z] = $_POST['mail'.$z];
                                                echo $_COOKIE['mail_'.$z];
                                            }
                                            else
                                            {
                                                echo $_COOKIE['mail_'.$z];
                                            }
                                            echo "'> <br>
                                        </div>
                                        <div class='croix ".$_COOKIE['nom_'.$z]."'>
                                            <img src='img/croix.png' alt='Icone supression - Signature Generator' loading='lazy' data-form-id='".$z."'>
                                        </div>
                                    </div>
                                </div>
                                <input type='submit' name='confirm_".$z."' value='Enregistrer' class='button enregistrer_".$z." enregistrer'>
                                <input type='submit' name='apercu_".$z."' value='Aperçu' class='button apercu_".$z." apercu_submit' style='margin-left: 95px;'>
                                <a href='signatures/Signature_".$_COOKIE['nom_'.$z]."_".$_COOKIE['prenom_'.$z].".html' download value='Télécharger' class='button telecharger button telech' name='telecharger_".$z."' style='border-top: 1px solid #FFF; margin-left: 15px;'>Télécharger</a>
                                <!-- <hr class='hrclient' style='background: black; width: 350px; margin-left: 0px;'> -->
                            </form>
                        <div class='reponse_client reponse_client_".$z."'></div>";
                    }
                echo "</div>";
                }
                // Si la personne a déclaré son entreprise mais pas ses employés, on fait une redirection
                if ($_COOKIE['nb_client'] == 0)
                {
                    echo "<p style='color: #000000;'>Il semble que vous ayez déclaré votre entreprise mais pas vos employés</p><br><a href='creation_emplo_test.php' class='button' style='color: #000000;'>Déclarer les employés</a>";
                }
                else
                {
                    echo "<p style='color: #000000;'>Michou</p>";
                }
                echo "<div class='droitedeux'>
                    <div class='coldeux' style='display: flex; flex-direction: column; width: 70%;'>
                        <div class='apercu' style='height: 375px; padding: 15px;'></div>
                        <div class='pub'></div>
                    </div>
                    <form action='".$_SERVER['PHP_SELF']."' method='post'>
                        <input name='deconnexion' class='button' type='submit' value='Deconnexion' style='margin-top: 10px; margin-left: 85px;'>
                    </form>
                </div>
            </fieldset>";
    ?>
    <!-- <fieldset>
        <div class="gauche">
            <img src="img/logo.png" alt="" style="width: 100%;">
            <h1 style="margin-top: 10px; margin-bottom: 0px !important;">Signature Generator</h1>
        </div>
        <div class="droite">
            <h1>Vos informations personnelles ?</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="<?php $entr ?>">
                        <div class="form" id="$i">
                            <div class="col5 client">
                                <p>Nom :</p> <br>
                                <p>Prénom :</p> <br>
                                <p>Fonction :</p> <br>
                                <p>Ligne directe :</p> <br>
                                <p>Mail :</p> <br>
                            </div>
                            <div class="col6">
                                <input type="text" name="nom_0" id="" value="<?php if (!empty($_POST['nom'])) { $_COOKIE['nom'] = $_POST['nom']; echo $_COOKIE['nom']; } else { echo $_COOKIE['nom']; } ?>"><br>
                                <input type="text" name="prenom_0" id="" value="<?php if (!empty($_POST['prenom'])) { $_COOKIE['prenom'] = $_POST['prenom']; echo $_COOKIE['prenom']; } else { echo $_COOKIE['prenom']; } ?>"><br>
                                <input type="text" name="fonction_0" id="" value="<?php if (!empty($_POST['fonction'])) { $_COOKIE['fonction'] = $_POST['fonction']; echo $_COOKIE['fonction']; } else { echo $_COOKIE['nom']; } ?>"><br>
                                <input type="text" name="ld_0" id="" value="<?php if (!empty($_POST['ld'])) { $_COOKIE['ld'] = $_POST['ld']; echo $_COOKIE['ld']; } else { echo $_COOKIE['ld']; } ?>"><br>
                                <input type="text" name="mail_0" id="" value="<?php if (!empty($_POST['mail'])) { $_COOKIE['mail'] = $_POST['mail']; echo $_COOKIE['mail']; } else { echo $_COOKIE['mail']; } ?>"> <br>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="confirm" value="Enregistrer" class="button">
                    <input type="submit" value="Aperçu" class="button" style="margin-left: 95px;">
                    <input type="submit" value="Télécharger" class="button" name="telecharger_0">
                </form>
        </div>
    </fieldset> -->
    <!-- <?php
    // if (isset($_POST['deconnexion']))
    // {
    //     session_destroy();
    //     header("Location: login.php");
    // }
    // $i = $_COOKIE['id'];
    // if ($_POST['confirm_'.$i]) 
    // {
    //     $servername = "localhost";
    //     $username = "root";
    //     $password = "";
    //     $dbname = "signature";
    //     $conn = new mysqli($servername, $username, $password, $dbname);
    //     $requete= "UPDATE employes SET nom='".$_POST['nom_'.$i]."', prenom='".$_POST['prenom_'.$i]."', mail='".$_POST['mail_'.$i]."', ld='".$_POST['ld_'.$i]."', fonction='".$_POST['fonction_'.$i]."' WHERE id='".$_COOKIE['bddid']."' AND nom='".$_COOKIE['nom_'.$$i]."', prenom='".$_COOKIE['prenom_'.$i]."', mail='".$_COOKIE['mail_'.$i]."', ld='".$_COOKIE['ld_'.$i]."', fonction='".$_COOKIE['fonction_'.$i]."'";
    //     $result = $conn->query($requete);
    //     echo $requete;
    // }
    ?> -->
</body>
</html>