<?php
$id=$_COOKIE['id'];
?>
<div style="font-family: Arial, Helvetica, sans-serif !important; min-height: 250px; min-width: 320px; max-width: 650px; min-height: 250px; display: flex; align-items: center">
    <table style="padding: 2px; border-style: none; border-color: black; border-style: none; border-collapse: inherit; direction: ltr; width: 100%" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td style="font-size:1pt; vertical-align:top; width: 95px;" valign="top">   
                    <table cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <!-- Logo ou photo de profil d'une largeur de 150 px -->
                                <td style="height:55px; vertical-align:top;" valign="top">
                                    <img src="https://<?= $_SERVER['SERVER_NAME'] ?>/img/uploads/<?= $_SESSION['logonom'] ?>" style="border:0;" height="70">
                                </td>
                            </tr>      
                        </tbody>
                    </table>
                </td>
                <td style="padding-left:5px; text-align: left; vertical-align:top; " valign="top">
                    <table style=" margin-right:0; margin-left:auto; line-height:19px; width: 100%; height: 100%; " cellpadding="0" cellspacing="0" id="table">
                        <tbody>
                            <tr style="font-size: 14px;">
                                <!-- Identité -->
                                <td style=" height:35px; vertical-align:center; text-align: left;" valign="center" align="right">
                                    <span id="nom" style="font-weight:bold; font-size: 18px; font-family: Arial, Helvetica, sans-serif !important;"><?= $_COOKIE['prenom_'.$id]." ".strtoupper($_COOKIE['nom_'.$id]) ?></span>
                                    <br>
                                    <!-- Poste -->
                                    <span style="color: rgb(100, 99, 99); font-style: italic; font-family: Arial, Helvetica, sans-serif;">
                                        <?= $_COOKIE['fonction_'.$id] ?>
                                    </span>
                                    <br>
                                    <!-- Mail -->
                                    <span style="color: rgb(100, 99, 99); font-family: Arial, Helvetica, sans-serif !important;"><a href="mailto:<?= $_COOKIE['mail_'.$id] ?>" style="color: rgb(100, 99, 99); text-decoration: none;"><?= $_COOKIE['mail_'.$id]?></a></span>
                                    <br>
                                    <!-- Numéro de téléphone -->
                                    <span style="color: rgb(100, 99, 99); font-family: Arial, Helvetica, sans-serif !important; font-weight: bold;">
                                        Tél : <a style="text-decoration: none; color: rgb(100, 99, 99);" href="tel:<?= $_COOKIE['ld_'.$id]?>"><?= $_COOKIE['ld_'.$id] ?> (ligne directe)</a>
                                    </span>
                                    <br> <br> 
                                    <span style="color: #156cad; font-family: Arial, Helvetica, sans-serif;">
                                    <?= $_SESSION['adre']?>, <? $_SESSION['cp']?> <?= $_SESSION['vill']?>
                                    </span>
                                    <br>
                                    <span style="color: #156cad; font-family: Arial, Helvetica, sans-serif;">
                                    Tél : <a href="tel: <?= $_SESSION['tel']?>" style="color: #156cad; text-decoration: none;"><?= $_SESSION['tel']?></a>
                                    </span>
                                    <br>
                                    <span style="display: flex;" class='cacher'>
                                    <!-- Site web -->
                                    <span style="font-weight: bold; font-family: Arial, Helvetica, sans-serif;">
                                    <a style="color: #156cad; text-decoration: none;" href="<?= $_SESSION['site'] |$_SESSION['site'] ?>"><?= $_SESSION['site']?></a>
                                    </span>
                                    <div class="signRS" <?php if (isset($_COOKIE['rsnbr']) && ($_COOKIE['rsnbr'] >=2)) { echo "style=\"display: flex;\"";}  ?>>
                                    <?php
                                    if (isset($_COOKIE['rsnbr']))
                                    {
                                    for ($r=0; $r < $_COOKIE['rsnbr']; $r++) { 
                                        echo "<span style='margin-left: 5px; margin-top: 3px;'>
                                            <a style='text-decoration: none;' href='".$_COOKIE['rs_href_'.$r]."' target='_blank' rel='noopener noreferrer' style=''>
                                                <div style='display: flex; width: 14px; height: 14px; justify-content: space-between;'' class='icon ".$_COOKIE['rs_'.$r]."'>
                                                    <img src='https://"+window.location.hostname+"/".$_COOKIE['rs_icon_'.$r]."' alt=''>
                                                </div>
                                            </a>
                                            </span>";
                                    }  
                                    }
                                    ?>
                                    </div>
                                </td>
                            </tr>         
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>