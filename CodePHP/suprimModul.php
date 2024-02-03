
<?php
            if(isset($_GET['lib']) && isset($_GET['clas']))
            {
                  $re=$_GET['lib'];
                  $idClasse=$_GET['clas'];
                  $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
                  if($connexion)
                  {
                        $supI="delete from Module  where libelle=?";
                        $supIm=$connexion->prepare($supI);
                        $supIm->execute(array($re));
                        echo "<h1>Suppression Reussit!!!</h1><br>";
                        echo"<a href=\"ProfResp.php?libe=$idClasse\">Retourne a Ressource</a>";
                        header("Location:ProfResp.php?libe=$idClasse");
                 }
            }
            echo"</html>";
?>
   