<?php
  session_start();
    if(isset($_GET['idRes']) && isset($_GET['idMod']))
    {
      $idMod=$_GET['idMod'];
      $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
      if($connexion)
      {
            $supI="delete from Ressource  where libelle=?";
            $supIm=$connexion->prepare($supI);
            $supIm->execute(array($_GET['idRes']));
            header("Location:gestionRessource.php?libe=$idMod");
      }
    }
  include('fonction.php');
if (isset($_POST['type']) && isset($_FILES['fichier']) && isset($_POST['libMod'])) 
{
  $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
    $type = $_POST['type'];
    $libeRes = $_FILES['fichier']['name'];
    $idMod = $_POST['libMod'];
    if (valideRessource($libeRes)) {
        $res = deplace2($_FILES['fichier']['tmp_name'], 'ressource', $libeRes);
        if ($res != null) {
            $req1 = "insert into Ressource(libelle,idModul,type) values(?,?,?)";
            $req11 = $connexion->prepare($req1);
            if ($req11->execute(array($res, $idMod, $type))) {
                $re="select idClasse from module where libelle='$idMod'";
                $ree=$connexion->query($re);
                $cla=$ree->fetch();
                $res3=substr(strrchr($res,'/'),1);
                $date=date("Y-m-d H:i:s");
                $rr="insert into Notification(libRess,type,date,classe) values('$res3','R','$date','$cla[0]')";
                $connexion->query($rr);
                header("Location:gestionRessource.php?libe=$idMod");
            }
        } else
            echo "Errer deplacement";
    }
}
                 
?>
