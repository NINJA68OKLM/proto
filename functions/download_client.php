<?php
session_start();
session_id();
$i = $_COOKIE['id'];
ob_start();
require_once('../objects/signature'.$_COOKIE['signature'].'c.php');
$signature = ob_get_clean();
$test= "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signature ".$_COOKIE['nom_'.$i]."_".$_COOKIE['prenom_'.$i]."</title>
</head>
<body>
    ".$signature.
    "
</body>
</html>"; 
$filename = 'Signature_'.$_COOKIE['nom_'.$i].'_'.$_COOKIE['prenom_'.$i].'.html';
$fp = fopen($filename, 'w+');
fwrite($fp, $test);
// Déplacement du fichier
$newlocation = "../signatures/".$filename;
// echo $test;
rename($filename, $newlocation);
?>