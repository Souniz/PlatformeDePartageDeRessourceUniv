<?php
 session_start();
 if(!$_SESSION['connectProf'])
        header("Location:index.html");
 $nom=$_SESSION['nom'];
 $im=$_SESSION['id'];
 $statu=$_SESSION['statu'];
 $photo=$_SESSION['profil'];
if (isset($_GET['libe']))
    $libClasse=$_GET['libe'];
$connexion = new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique", "root", "");
$req2 = "select libelle,idProf from Module where idClasse='$libClasse'";
$req22 = $connexion->query($req2);

$reP=$connexion->query("select * from Professeur");
$test = 0;
echo "<!DOCTYPE html>
<html>
<head> 
<link href=\"../bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css\" integrity=\"sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I\" crossorigin=\"anonymous\">
<link href=\"../bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">
<link href=\"../CSS/style.css\" rel=\"stylesheet\">
</head>
<body>
<header id=\"header\" class=\"d-flex align-items-center fixed-top\">
<div class=\"container  d-flex justify-content-between align-items-center\">
  <div class=\"logo \">
  <div class=\"logo \">
            <h1 class=\"card-header \" style=\"font-family: algerian;\">$statu $nom<img class=\"ronded\" src=\"$photo\" alt=\"\"/></h1>
          </div>
  </div>
  <nav id=\"navbar\" class=\"navbar\">
    <ul>
      <li><a href=\"accueilEnseignt.php\" class=\"ml-2 text-primary\">Accueil</a></li>
      <li ><a class=\"w-100 text-primary\" href=\"authentAdmi.php\">Deconnexion<i class=\"bi-power text-danger\"></i></a></li>
    </ul> 
  </nav>
</div>
</header>
     <div class=\"container mt-5\">
        <h1 class=\"card-header text-center text-light \" style=\"background-color:rgba(22, 100, 190, 0.884); margin-top:8%;\">$libClasse</h1>
        <button class=\" mt-2\"><a class=\"text-decoration-none\" href=\"gestionEtudiant.php?idClas=$libClasse\"><span class=\"text-primary\">Gestion Etudiant</span><i><img class=\"bi-image-alt rounded-circle\" src=\"../bootstrap-icons/icons8-graduation-cap-48.png\" alt=\"soun\"></i></a></button>
            <div class=\"row mt-3\">
              <div class=\"col-7\">
              <h3 class=\"card-header \"style=\"color:rgba(22, 100, 190, 0.884);\" >Les Modules</h3>";
while ($ress = $req22->fetch()) {
    $test = 1;
    $nom =str_replace(' ','',$ress[0]); //supprime les espaces
    echo "<div class=\"mt-3 mb-3\"  style=\"background-color:rgba(22, 100, 190, 0.884);\"><h3 class=\"text-light\">$ress[0]</h3>
               <h6>Professeur :".$ress[1]."</h6>
               <button type=\"button\" class=\"btn-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#$nom\">
               Supprimer
               </button>
          <div class=\"modal fade\" id=\"$nom\" tabindex=\"-1\" aria-labelledby=\"$nom\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
              <div class=\"modal-content\">
                <div class=\"modal-header\">
                  <h5 class=\"modal-title\" id=\"$nom\">Confirmation</h5>
                  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <div class=\"modal-body\">
                  <p>Tous les ressources du module <span class=\"text-danger\">$ress[0]</span> seront aussi supprimer<br> Voulez-vous vraiment supprimer ce module </p>
                </div>
                <div class=\"modal-footer\">
                  <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                  <button type=\"button\" class=\"btn btn-primary text-decoration-none\"><a class=\"text-decoration-none text-light\" href=\"suprimModul.php?lib=$ress[0]&clas=$libClasse\">Confirmer</a></button>
                </div>
              </div>
            </div>
          </div></div>";
     }
if ($test == 0) {
    echo " Y'pas encore ajoute de module";
}
echo " </div>
                <div class=\"col-5\">
                  <h3 class=\"card-header \"  style=\"color:rgba(22, 100, 190, 0.884);\">Ajouter Module</h3>
                  <form id='form1' class=\"form card-header mt-3\" method=\"POST\" action=\"\" enctype=\"multipart/form-data\">
                      <div class=\"input-group\">
                          <label class=\"form-label \" for=\"libelle\">Libelle</label>
                          <span class=\"text-danger\">*</span> <input class=\"form-control inp\" type=\"text\" id=\"libelle\" name=\"libelle\"><span class=\"text-danger spp\"></span><br>
                          <div class=\"input-group mt-5\"> 
                          <label class=\"form-label \" for=\"prof\">Professeur</label>
                          <span class=\"text-danger\">*</span> 
                          <select class=\"form-select inp\" type=\"text\" id=\"prof\" name=\"prof\">";
                            while($res=$reP->fetch())
                            {
                                echo"<option value=\"$res[0]\">$res[statu] $res[nom]($res[0])</option>";
                            }
                         echo" </select><span class=\"text-danger spp\"></span><br>
                         </div>
                        <input type=\"hidden\" name=\"libMod\" value=\"$libClasse\">
                       <input type=\"submit\" class=\"mt-5 ms-4 form-control text-light\" value=\"Creer\" name=\"Ajouter\" style=\"background-color:rgba(22, 100, 190, 0.884);\"><br><br>
                       </div>
                  </form><br><br>
                  <h3 class=\"card-header \"  style=\"color:rgba(22, 100, 190, 0.884); text-align:center;\">Message Classe</h3>
                  <form id='form2' class=\"form card-header mt-3\" method=\"POST\" action=\"\" enctype=\"multipart/form-data\">
                  <div class=\"input-group\">
                     <textarea  id=\"mess\" name=\"mess\" cols=\"40\" rows=\"10\" placeholder=\"Message\"></textarea><span class=\"text-danger spp\"></span><br>
                    <input type=\"hidden\" name=\"libMod\" value=\"$libClasse\">
                 <input type=\"submit\" class=\"mt-5 ms-4 form-control text-light\" value=\"Envoyer\" name=\"Envoyer\" style=\"background-color:rgba(22, 100, 190, 0.884);\"><br><br>
                   </div>
              </form>
                </div>
            </div>
        </div>
       ";
include('fonction.php');
if (isset($_POST['libelle']) && isset($_POST['prof'])) {
    
            $req1 = "insert into Module(libelle,idProf,idClasse) values(?,?,?)";
            $req11 = $connexion->prepare($req1);
            if ($req11->execute(array($_POST['libelle'],$_POST['prof'],$libClasse)))
             {
                    $mod=$_POST['libelle'];
                    $prof=$_POST['prof'];
                    $date=date("Y-m-d H:i:s");
                     $rr="insert into notification(libRess,type,date,classe) values('$mod','M','$date','$libClasse')";
                    $connexion->query($rr);
                    $req2="select * from Enseigner where idProf=' $prof' and classe='$libClasse'";
                    $req22=$connexion->query($req2);
                    if($req22->fetch()==null)
                    { 
                        $req3="insert into Enseigner(idProf,classe) values(?,?)";
                        $req33=$connexion->prepare($req3);
                        $req33->execute(array($prof,$libClasse));
                          
                    }
                }
                header("Location:ProfResp.php?libe=$libClasse");
              }
              if(isset($_POST['mess']))
              {
                  $cont=$_POST['mess'];
                  $date=date("Y-m-d H:i:s");
                  $mes="insert into Message(contenu,libelle,date) values('$cont','$libClasse','$date')";
                  $mess=$connexion->query($mes);
                  header("Location:ProfResp.php?libe=$libClasse");

              }
echo" <footer class=\"row card-header text-light footer w-100\" style=\"background-color:rgba(22, 100, 190, 0.884);position:relative; bottom:0;\">
<div class=\"container card-header \">
<div class=\"copyright\">
    &copy; Copyright <strong><span>SectionInformatique 2022</span></strong>. Tous droits reserés
</div>
<div class=\"credits\">
    Designed by Sou_Asta
</div>
</div>
 </footer>
 <script src=\"../bootstrap/js/bootstrap.bundle.js\"></script> 
   
    
</body>
</html>";

?>
