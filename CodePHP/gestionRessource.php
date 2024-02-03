<?php
session_start();
date_default_timezone_set("utc");
if(!$_SESSION['connectProf'])
        header("Location:authentProf.php");
$nom=$_SESSION['nom'];
$im=$_SESSION['id'];
$statu=$_SESSION['statu'];
$photo=$_SESSION['profil'];
if (isset($_GET['libe']))
    $libModul=$_GET['libe'];
$connexion = new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique", "root", "");
$req2 = "select libelle from Ressource where idModul='$libModul'";
$req22 = $connexion->query($req2);
$test = 0;
echo "<!DOCTYPE html>
<html>
<!-- Load Bootstrap -->
<link href=\"../bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
<link href=\"../bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">
<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css\" integrity=\"sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"../bootstrap/css/bootstrap.css\">
    <link href=\"../CSS/style.css\" rel=\"stylesheet\">
</head>
<body>
  <div style=\"height:90vh\">
  <header id=\"header\" class=\"d-flex align-items-center fixed-top\">
  <div class=\"container  d-flex justify-content-between align-items-center\">
    <div class=\"logo \">
    <h1 class=\"card-header \" style=\"font-family: algerian;\">$statu $nom<img class=\"ronded\" src=\"$photo\" alt=\"\"/></h1>
    </div>
    <nav id=\"navbar\" class=\"navbar\">
      <ul>
        <li><a href=\"accueilEnseignt.php\" class=\"ml-2 text-primary\">Accueil</a></li>
        <li ><a class=\"w-100 text-primary\" href=\"deconnexion.php\">Deconnexion<i class=\"bi-power text-danger\"></i></a></li>
      </ul> 
    </nav>
 </div>
 </header>
        <div class=\"container\" style=\"margin-top:6%;\">
        <h1 class=\"card-header text-center bg-primary text-light\">$libModul</h1>
            <div class=\"row mt-2\">
              <div class=\"col-7\">
              <h3 class=\"card-header \"   style=\"color:rgba(22, 100, 190, 0.884);\" >Mes Ressource</h3>";
              $te=1;
while ($ress = $req22->fetch()) {
    $test = 1;
    $re = substr(strrchr($ress[0], '/'), 1);
    $mod=str_replace('/','',$re);
    $mod=str_replace(' ','',$mod);
    $mod=str_replace('.','',$mod);
    echo "<div class=\"mt-1 mb-1 bg-primary\" ><a href=\"$ress[0]\" class=\"text-decoration-none ms-1 card text-primary\" style=\"color:white;\"><h2>$re</h2></a>
                <form action=\"accessResourc.php\" method=\"POST\" id=\"form1\">
                <input type=\"hidden\" name=\"idRes\" value=\"$ress[0]\" id=\"dem\">
                <input class=\"text-primary mt-3\" type=\"submit\" value=\"Les Access\" name=\"Access\"  id=\"Access\" >
                </form>
                <button type=\"button\" class=\"btn-light text-primary mt-2\" data-bs-toggle=\"modal\" data-bs-target=\"#$mod\">
               Supprimer
              </button>
              <div class=\"modal fade\" id=\"$mod\" tabindex=\"-1\" aria-labelledby=\"$mod\" aria-hidden=\"true\">
                <div class=\"modal-dialog\">
                  <div class=\"modal-content\">
                    <div class=\"modal-header\">
                      <h5 class=\"modal-title\" id=\"$mod\">Confirmation</h5>
                      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                    </div>
                    <div class=\"modal-body\">
                      <p>Voulez-vous vraiment supprimer la ressource <h4 class=\"text-danger\">$re</h4></p>
                    </div>
                    <div class=\"modal-footer\">
                      <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                      <button type=\"button\" class=\"btn btn-primary \"><a class=\"text-light\" href=\"traiteSuppre.php?idRes=$ress[0]&idMod=$libModul\">Confirmer</a></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>";
}
if ($test == 0) {
    echo " Vous n'avez pas encore ajoute de ressource";
}
echo " </div>
                <div class=\"col-5\">
                  <h3 class=\"card-header \"  style=\"color:rgba(22, 100, 190, 0.884);\">Ajouter Ressource</h3>
                  <form id='form1' class=\"form card-header mt-3\" method=\"POST\" action=\"traiteSuppre.php\" enctype=\"multipart/form-data\">
                      <div class=\"input-group\">
                          <label class=\"form-label \" for=\"libelle\">Fichier</label>
                          <span class=\"text-danger\">*</span> <input class=\"form-control inp\" type=\"file\" id=\"prof\" name=\"fichier\" accept=\".docx,.pdf\"><span class=\"text-danger spp\"></span><br>
                          <div class=\"input-group mt-5\"> 
                        <span class=\"text-danger\">*</span><label for=\"type\">Type</label>
                        <select class=\"form-select \" name=\"type\" id=\"type\">
                            <option value=\"COURS\">COURS</option>
                            <option value=\"TD\">TD</option>
                        </select><br>
                        </div>
                        <input type=\"hidden\" name=\"libMod\" value=\"$libModul\">
                       <input type=\"submit\" class=\"mt-5 ms-4 form-control text-light\" value=\"Creer\" name=\"Ajouter\" style=\"background-color:rgba(22, 100, 190, 0.884);\"><br><br>
                       </div>
                  </form>
                </div>
            </div>
        </div>";
echo " </div><footer class=\"row card-header text-light footer w-100\" style=\"background-color:rgba(22, 100, 190, 0.884); height:10vh;\">
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
