<?php
session_start();
if(!$_SESSION['connectedEtu'])
 header("Location:index.html");
$classe=$_SESSION['class'];
$connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
if(isset($_GET['rech']))
 {
    $rech=$_GET['rech'];
    $rech="%".$rech."%";
    $req2 = "select libelle from Module where libelle like '$rech' and idClasse='$classe'";
    $req22 = $connexion->query($req2);
    if($res=$req22->fetch())
    {
        echo $res[0];
    }
    else
    echo"";
 }
 if(isset($_POST['rechRe']) && isset($_POST['mod']))
 {
    $rech=$_POST['rechRe'];
    $mod=$_POST['mod'];
    $rech= "%".$rech."%";
    $req3 = "select libelle from Ressource where libelle like '$rech' and idModul='$mod'";
    $req33 = $connexion->query($req3);
    if($res3=$req33->fetch())
    {
        $res3[0]=substr(strrchr($res3[0],'/'),1);
        echo $res3[0];
    }
    else
       echo"aucun resultat trouve";
 }
 
 ?>