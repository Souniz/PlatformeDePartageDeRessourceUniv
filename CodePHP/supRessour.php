
<?php
        if($_POST['Supprimer']!=null)
        {
           if(isset($_POST['libMod']))
           {
                $libMod=$_POST['libMod'];
                $idClasse=$_POST['idClasse'];
                echo"<!DOCTYPE html>
                <html>
                <form action=\"\" method=\"POST\" >
                <label class=\"lab1\" for=\"resp\">Vous voulez vraiment Supprimer l ressource <mark>".$nom."</mark>?</label><br>
                <label for=\"reso\">oui</label>
                <input type=\"radio\" name=\"res\" value=\"oui\" id=\"resp\">
                <label for=\"reso\">non</label>
                <input type=\"radio\" name=\"res\" value=\"non\" id=\"resp\">
                <input type=\"hidden\" name=\"idMod\" value=\"$libMod\">
                <input type=\"hidden\" name=\"idClasse\" value=\"$idClasse\" id=\"dem\">
                <input type=\"submit\" value=\"Confirmer\">
                </form>";
           }
          }
            if(isset($_POST['res']))
            {
                  $re=$_POST['res'];
                  $idClasse=$_POST['idClasse'];
                  $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
                  if($connexion)
                  {
                      
                      if($re=='oui')
                      {
                        $supI="delete from Module  where libelle=?";
                        $supIm=$connexion->prepare($supI);
                        $supIm->execute(array($_POST['idMod']));
                        echo "<h1>Suppression Reussit!!!</h1><br>";
                        echo"<a href=\"ProfResp.php?libe=$idClasse\">Retourne a Ressource</a>";
                      }
                     else
                     header("Location:ProfResp.php?libe=$idClasse");
                 }
            }
            echo"</html>";
?>
<style>
         h1
         {
             font-weight: bold;
             color:greenyellow
         }
</style>
   