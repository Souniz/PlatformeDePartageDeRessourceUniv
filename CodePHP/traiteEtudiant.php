<?php
      $ident=$_POST['ident'];
      $nom=$_POST['nom'];
      $prenom=$_POST['prenom'];
      $sexe=$_POST['sex'];
      $mail=$_POST['mail'];
      $nais=$_POST['naiss'];
      $lieu=$_POST['lieu'];
      $login=$_POST['login'];
      $cle=$_POST['MotPass'];
      $classe=$_POST['classe'];
      $fich=$_FILES['fichier'];
      include('fonction.php');
      if(isset($nom) && isset( $ident)&& isset($classe) && isset($prenom) && isset($sexe) && isset($login) && isset($cle) && isset($_FILES['fichier'])&& isset($nais))
      {
         $nam=$_FILES['fichier']['name'];
         if(validExtention(($nam)))
         {
            $phot=deplace($_FILES['fichier']['tmp_name'],'profile',$login.'_'.$nam);
            if($phot!=null)
            { 
               $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
               if($connexion)
               { 
                  $req1="insert into Etudiant(identification,nom,prenom,dateNais,sexe,mail,profile,lieu,login,motPasse,classe) values(?,?,?,?,?,?,?,?,?,?,?)";
                  $resul=$connexion->prepare($req1);
                  $resul->execute(array($ident,$nom,$prenom,$nais,$sexe,$mail,$phot,$lieu,$login,$cle,$classe));
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