<?php
session_start();
if(!$_SESSION['connectProf'])
header("Location:index.html");
if(isset($_GET['modi']) && isset($_GET['clas']))
{
    $id=$_GET['modi'];
    $cla=$_GET['clas'];
    $connexion = new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique", "root", "");
    $req1="select * from Etudiant where identification=?";
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
        <input  type=\"hidden\" name=\"cla\" value=\"$cla\">
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
             $re = substr(strrchr($res['profile'], '/'), 1);
        echo"</select><br>
        <span class=\"text-danger\">*</span><label for=\"mail\">Email Personnel :</label>
        <input class=\"form-control inp\" type=\"email\" value=\"$res[mail]\" name=\"mail\" placeholder=\"E-mail Personnel\" id=\"email\"><span class=\"text-danger spp\"></span><br>
        <span class=\"text-danger\">*</span><label for=\"naiss\">Date de Naissance :</label>
        <input class=\"form-control inp\" type=\"date\" name=\"naiss\" value=\"$res[dateNais]\" id=\"date\"><span class=\"text-danger spp\"></span><br>
        <span class=\"text-danger\">*</span><label for=\"lieu\">Lien de Naissance</label>
        <input class=\"form-control inp\" type=\"text\" value=\"$res[lieu]\" name=\"lieu\" id=\"lieu\"><span class=\"text-danger spp\"></span><br>
        <span class=\"text-danger\">*</span><label for=\"classe\">Niveau</label>
        <input type=\"text\" class=\"form-control inp\" value=\"$res[classe]\" name=\"classe\" id=\"classe\"><span class=\"text-danger spp\"></span><br>
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
    <script langage=\"javascript\" src=\"../Script/valide.js\"></script>
    <script>
    var form = document.getElementById('form');
    form.addEventListener('submit', function(e) {
        var conf=confirm(\"Voulez-vous appliquer ces modification\");
        if(conf==false)
          e.preventDefault();
    },false);
    </script>
    </body></html>";
}
else
   echo"aucun Etudiant trouve pour cette identification";
}
    if(isset($_POST['modifier']))
    {
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
        $cl=$_POST['cla'];
        include('fonction.php');
        if(isset($nom) && isset($classe) && isset($prenom) && isset($sexe) && isset($login) && isset($cle) && isset($_FILES['fichier'])&& isset($nais))
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
                    $req3="update Etudiant set nom=?, prenom=?, dateNais=?, sexe=?, mail=? ,profile=? ,lieu=? ,login=? ,motPasse=? ,classe=? where identification=?";
                    $resul=$connexion->prepare($req3);
                    $resul->execute(array($nom,$prenom,$nais,$sexe,$mail,$phot,$lieu,$login,$cle,$classe, $ident));
                    header("Location:gestionEtudiant.php?idClas=$cl");
                 }
              }
              else
                    echo "deplacement echoue";
           }
           else
              echo "Extension incorect";
     }
    }
    if(isset($_GET['supprimer']) && isset($_GET['clas']))
    {
        $iden=$_GET['supprimer']; 
        $cal= $_GET['clas'];
        $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
        $reqa="select * from Etudiant where identification=?";
        $reqb=$connexion->prepare($reqa);
        $reqb->execute(array($iden));
        if($res=$reqb->fetch())
        {
            $req4="delete from Etudiant where identification=?";
            $req44=$connexion->prepare($req4);
            $req44->execute(array($iden));
              header("Location:gestionEtudiant.php?idClas=$cal");
       }
      else
        echo"errer";
  }


?>
