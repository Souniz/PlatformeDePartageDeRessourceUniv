<?php
session_start();
if(!$_SESSION['connectedEtu'])
  header("Location:index.html");
if($_GET['res'])
{
    $date=date("Y-m-d H:i:s");
    $ident=$_SESSION['id'];
    $resour=$_GET['res'];
    $connexion = new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique", "root", "");
    $req2 = "insert into Consulter(idEtudiant,idRessour,dateConsul) values('$ident','$resour','$date')";
    $req22 = $connexion->query($req2);
    $req22->fetch();
        header("Content-Description: File transfer");
        header("Content-Type: application/pdf");
        header("Content-Disposition: attachment;filename=$resour");
        header("Content-length:".filesize($resour));
        ob_clean();
        readfile($resour);
}
?>