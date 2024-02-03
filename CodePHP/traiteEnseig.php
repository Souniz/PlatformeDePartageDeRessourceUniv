<?php
      $immat=$_POST['ident'];
      $nom=$_POST['nom'];
      $prenom=$_POST['prenom'];
      $sexe=$_POST['sex'];
      $mail=$_POST['mail'];
      $nais=$_POST['naiss'];
      $statu=$_POST['statu'];
      $login=$_POST['login'];
      $cle=$_POST['MotPass'];
      $tel=$_POST['tel'];
      $fich=$_FILES['photo'];
      include('fonction.php');
      if(isset($nom) && isset($immat)&& isset($statu) && isset($prenom) && isset($sexe) && isset($login) && isset($cle) && isset($_FILES['photo'])&& isset($nais))
      {
         $nam=$_FILES['photo']['name'];
         if(validExtention(($nam)))
         {
            $phot=deplace($_FILES['photo']['tmp_name'],'profile',$login.'_'.$nam);
            if($phot!=null)
            { 
               $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
               if($connexion)
               { 
                  $req1=("insert into Professeur(immatriculation,nom,prenom,sexe,DateNais,mail,statu,Telephone,login,motPasse,pprofile) values(:immat,:nom,:prenom,:sexe,:dateNais,:mail,:statu,:tel,:login,:motPasse,:pprofile)");
                  $resul=$connexion->prepare($req1);
                  $resul->execute(array('immat'=>$immat,'nom'=>$nom,'prenom'=>$prenom,'dateNais'=>$nais,'sexe'=>$sexe,'mail'=>$mail,'statu'=>$statu,'tel'=>$tel,'login'=>$login,'motPasse'=>$cle,'pprofile'=>$phot));
                  header("Location:reussit.html");
               }
            }
            else
                  echo "deplacement echoue";
         }
         else
            echo "Extension incorect";
   }
?>