<?php
if(isset($_POST['modi']))
{
    $id=$_POST['modi'];
    $connexion = new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique", "root", "");
    $req1="select * from Professeur where immatriculation=?";
    $req11=$connexion->prepare($req1);
    $req11->execute(array($id));
    if($res=$req11->fetch())
    {
        echo"<!DOCTYPE html> 
        <head>
            <meta charset=\"UTF-8\">
            <link rel=\"stylesheet\" href=\"../bootstrap/css/bootstrap.css\">
            <link rel=\"stylesheet\" href=\"../bootstrap-icons/bootstrap-icons.css\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <title>Document</title>
        </head>
        <body>
        <form class=\"form mt-3 card-header\" style=\"width: 55%; margin-left:20%\" action=\"\" method=\"POST\" id=\"form\" enctype=\"multipart/form-data\">
        <input  type=\"hidden\" name=\"ident\" value=\"$res[0]\">
        <span class=\"text-danger \">*</span><label for=\"nom\">Nom :</label>
        <input class=\"form-control inp\" type=\"text\" name=\"nom\" placeholder=\"Nom de Famille\" id=\"nom\" value=\"$res[nom]\"><span class=\"text-danger spp\"></span><br>
        <span class=\"text-danger\">*</span><label for=\"prenom\">Prenoms :</label>
        <input class=\"form-control inp\" type=\"text\" name=\"prenom\" value=\"$res[2]\"placeholder=\"Prenoms\" id=\"prenom\"><span class=\"text-danger spp\"></span><br>
        <span class=\"text-danger\">*</span><label for=\"sex\">Sexe</label>
        <select class=\"form-select\" name=\"sex\">";
            if($res['sexe']=='m')
            {
                echo"<option value=\"m\" selected>M</option>
                   <option value=\"f\">F</option>";
                
            }  
            else
            {
                echo"<option value=\"m\">M</option>
                   <option value=\"f\" selected>F</option>";
                
            }
             $re = substr(strrchr($res['pprofile'], '/'), 1);
        echo"</select><br>
        <span class=\"text-danger\">*</span><label for=\"mail\">Email Personnel :</label>
        <input class=\"form-control inp\" type=\"email\" value=\"$res[mail]\" name=\"mail\" placeholder=\"E-mail Personnel\" id=\"email\"><span class=\"text-danger spp\"></span><br>
        <span class=\"text-danger\">*</span><label for=\"mail\">Numero Teleph :</label>
        <input class=\"form-control inp\" type=\"text\" value=\"$res[Telephone]\" name=\"tel\" placeholder=\"Numero Telephpne\" id=\"telephone\"><span class=\"text-danger spp\"></span><br>
        <span class=\"text-danger\">*</span><label for=\"naiss\">Date de Naissance :</label>
        <input class=\"form-control inp\" type=\"date\" name=\"naiss\" value=\"$res[DateNais]\" id=\"date\"><span class=\"text-danger spp\"></span><br>
        <span class=\"text-danger\">*</span><label for=\"classe\">Statu</label>
        <input type=\"text\" class=\"form-control inp\" value=\"$res[statu]\" name=\"statu\" id=\"statu\"><span class=\"text-danger spp\"></span><br>
        <div class=\"input-group\">
            <span class=\"text-danger\">*</span><span class=\"bi-person fw-bold\"></span>
            <input class=\"form-control ms-lg-4 inp\" value=\"$res[login]\" id='login' type=\"text\" name=\"login\" placeholder=\"login\"><span class=\"text-danger spp\"></span><br>
        </div>
        <div class=\"input-group mt-4\">
            <span class=\"text-danger\">*</span><span class=\"bi-lock \"></span>
            <input class=\"form-control ms-lg-4 inp\" id='pas1' type=\"password\" value=\"$res[motPasse]\" name=\"MotPass\" placeholder=\"Mot de Passe\"><span class=\"text-danger spp\"></span><br>
            <span class=\"text-danger\">*</span><input class=\"form-control ms-lg-4 inp\" id='pas2' type=\"password\" name=\"ConfMotPass\" placeholder=\"Confirmer Mot de Passe\"><span class=\"text-danger spp\"></span><br>
        </div>
        <span class=\"text-danger\">*</span><label for=\"fichier\">Photo Profile</label>
        <input class=\"form-control inp\" type=\"file\" id=\"prof\" name=\"fichier\" value=\"$re\" accept=\"image/*\"><span class=\"text-danger spp\"></span><br>
        <input class=\"btn bg-danger text-light\" type=\"submit\" name=\"modifier\" value=\"Modifier\" id=\"env\">
    </form>
    </div>
    </body></html>";
}
else
   echo"aucun Enseignant trouve pour cette identification";
}
    if(isset($_POST['modifier']))
    {
        $ident=$_POST['ident'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $sexe=$_POST['sex'];
        $mail=$_POST['mail'];
        $nais=$_POST['naiss'];
        $login=$_POST['login'];
        $cle=$_POST['MotPass'];
        $statu=$_POST['statu'];
        $tel=$_POST['tel'];
        $fich=$_FILES['fichier'];
        include('fonction.php');
        if(isset($nom) && isset($statu) && isset($prenom) && isset($sexe) && isset($login) && isset($cle) && isset($_FILES['fichier'])&& isset($nais))
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
                    $req3="update Professeur set nom=?, prenom=?, DateNais=?, sexe=?, mail=? ,pprofile=? ,Telephone=? ,login=? ,motPasse=? ,statu=? where immatriculation=?";
                    $resul=$connexion->prepare($req3);
                    $resul->execute(array($nom,$prenom,$nais,$sexe,$mail,$phot,$tel,$login,$cle,$statu, $ident));
                    header("Location:reussit.html");
                 }
              }
              else
                    echo "deplacement echoue";
           }
           else
              echo "Extension incorect";
     }
    }
    if(isset($_POST['supprimer']))
    {
        $ident=$_POST['supp'];  
        $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
        $reqa="select * from Professeur where immatriculation=?";
        $reqb=$connexion->prepare($reqa);
        $reqb->execute(array($ident));
        if($res=$reqb->fetch())
        {
            $req4="delete from Professeur where immatriculation=?";
            $req44=$connexion->prepare($req4);
            $req44->execute(array($ident));
              header("Location:reussit.html");
       }
      else
      echo"aucun Enseignat trouve pour cette identification";
  }


?>
