<?php
session_start();
$connexion = new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique", "root", "");
$req1=$connexion->query("select immatriculation from Professeur");
$req2=$connexion->query("select immatriculation from Professeur");
echo"<!DOCTYPE html>
<html lang=\"en\">
<head>
<meta charset=\"utf-8\">
  <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">

  <title>Modification</title>
  <meta content=\" name=\"description\">
  <meta content=\" name=\"keywords\">
  <link href=\"../animate.css/animate.min.css\" rel=\"stylesheet\">
  <link href=\"../bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
  <link href=\"../bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">
</head>
<body>
<div class=\"container card-header mt-5\">
        <div class=\"row\">
            <div class=\"col\">
                <h3 class=\"card-header text-center \" style=\"color:rgba(22, 100, 190, 0.884);\">Modifier Enseignant</h3>
                <form id='form1' class=\"form card-header\" style=\"margin-top: 15%;\" method=\"POST\" action=\"TraiteModiEnsignt.php\">
                    <div class=\"input-group\">
                        <label class=\"form-label \" for=\"libelle\">Immatriculation</label>
                        <span class=\"text-danger\">*</span><select class=\"form-select ms-lg-4 inp1\" id='libelle' type=\"text\" name=\"modi\" pflaceholder=\"Identifiant\">";
                        while($res1=$req1->fetch())
                        {
                            echo"<option value=\"$res1[0]\">$res1[0]</option>";
                        }
                      echo"  </select>
                    </div>
                    <input type=\"submit\" class=\"mt-5 ms-4 form-control text-light\" style=\"background-color:rgba(22, 100, 190, 0.884);\" value=\"Modifier\" name=\"supprimer\"><br><br>
                </form>
            </div>
            <div class=\"col\">
                <h3 class=\"card-header text-center\" style=\"color:rgba(22, 100, 190, 0.884);\">Supprimer Enseignant</h3>
                <form id='form2' class=\"form card-header\" style=\"margin-top: 15%;\" method=\"POST\" action=\"TraiteModiEnsignt.php\">
                    <div class=\"input-group\">
                        <label class=\"form-label \" for=\"libelle\">Immatriculation</label>
                        <select class=\"form-select ms-lg-4 inp1\" id='libelle2' type=\"text\" name=\"supp\" pflaceholder=\"Identifiant\">";
                        while($res1=$req2->fetch())
                        {
                            echo"<option value=\"$res1[0]\">$res1[0]</option>";
                        }
                       echo" </select>
                    </div>
                    <button type=\"button\" class=\"btn btn-primary mt-5 w-100\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">
  Supprimer
</button>
<div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\" modal-title\" id=\"exampleModalLabel\">Confirmation</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
        <p>Tout les modules et les ressources qu'il gere seront aussi supprimes<br>Voulez-vous vraiment supprimer cet Enseignant?</p>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
        <button type=\"button\" class=\"btn\"><input type=\"submit\" class=\" form-control text-light btn-primary\"  value=\"Supprimer\" name=\"supprimer\"></button>
      </div>
    </div>
  </div>
</div>
                    
                </form>
            </div>
        </div>
       
    </div>
    <script src=\"../bootstrap/js/bootstrap.bundle.js\"></script>
    <script>
        var span1 = document.getElementById('sp1');
         var span2 = document.getElementById('sp2');
         var inp1 = document.getElementById('libelle');
         var inp2 = document.getElementById('libelle2');
         var form=document.getElementById('form2');
         var for1=document.getElementById('form1');
         form.addEventListener('submit',function(e){
            if (inp2.value == \")
            {
                span2.innerText = \"pas vide\";
                e.preventDefault();
            }
            else{
                var res=confirm(\"Voulez-vous vraiment Supprimer?\");
                if(res!=true){
                    
                    e.preventDefault();
                }
            }
                 
         },false);
         for1.addEventListener('submit',function(e){
            if (inp1.value == \")
            {
                span1.innerText = \"pas vide\";
                e.preventDefault();
            }
        },false);
    </script>
</body>
</html>";
