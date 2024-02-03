<?php
session_start();
$connexion = new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique", "root", "");
$req1=$connexion->prepare("select libelle from Classe");
$req1->execute();
$req2=$connexion->prepare("select immatriculation from Professeur");
$req2->execute();
echo"<!Doctype html>
<html>
<head>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
    <link rel=\"stylesheet\" href=\"../bootstrap/css/bootstrap.css\">
    <link rel=\"stylesheet\" href=\"../bootstrap-icons/bootstrap-icons.css\">
    <link rel=\"stylesheet\" href=\"../CSS/athent.css\">
    <script langage=\"javascript\" src=\"../Script/authent.js\" />
    </script>
</head>
<title>GestionClasse</title>

<body>
    <div class=\"container\">
        <div class=\"row\">
            <h1 class=\"card-header  text-center mb-4 text-light\" style=\"background-color:rgba(22, 100, 190, 0.884);\">Gestion Classe</h1>
            <div class=\"col\">
                <h3 class=\"card-header text-center text-light\" style=\"background-color:rgba(22, 100, 190, 0.884);\">Ajouter</h3>
                <form id='form1' class=\"form card-header\"  method=\"POST\" action=\"TraiteClasse.php\">
                    <div class=\"input-group\">
                        <label class=\"form-label\" style=\"width:100px;\" for=\"libelle\">Libelle</label>
                        <span class=\"text-danger\">*</span><input class=\"form-control ms-lg-4 inp1\" id='libelle' type=\"text\" name=\"libelle\" placeholder=\"libelle\"><span class=\"text-danger sp1\"></span><br>
                    </div>
                    <div class=\"input-group mt-3\">
                    <label class=\"form-label \" style=\"width:100px;\" for=\"resp\">Responsable</label>
                    <select class=\"form-select ms-lg-4 inp1\" id='resp' name=\"resp\" >";
                    while($row=$req2->fetch())
                    {
                         echo"<option value=\"$row[0]\">$row[0]</option>";
                    }
                   echo" </select>
                    </div>
                    <input type=\"submit\" class=\"mt-5 ms-4 form-control  text-light\" value=\"Creer\" name=\"creer\" style=\"background-color:rgba(22, 100, 190, 0.884);\"><br><br>
                </form>
            </div>
        </div>
        <div class=\"row\">
        <div class=\"col \">
            <h3 class=\"card-header text-center text-light mt-4\" style=\"background-color:rgba(22, 100, 190, 0.884);\">Modifier</h3>
                <form id='form2' class=\"form card-header\"  method=\"POST\" action=\"TraiteClasse.php\">
                    <div class=\"input-group\">
                        <label class=\"form-label\" style=\"width:100px;\" for=\"libelle\">Libelle</label>
                        <select class=\"form-select ms-lg-4 inp1\" id='libelle2' name=\"libelle\" >";
                        $req1->execute();
                        while($row=$req1->fetch())
                        {
                             echo"<option value=\"$row[0]\">$row[0]</option>";
                        }
                       echo" </select>
                    </div>
                    <div class=\"input-group mt-3\">
                    <label class=\"form-label\" style=\"width:100px;\" for=\"resp\">Nouveau Responsable</label>
                    <select class=\"form-select ms-lg-4 inp1\" id='resp' name=\"resp\" >";
                    $req2->execute();
                    while($row=$req2->fetch())
                    {
                         echo"<option value=\"$row[0]\">$row[0]</option>";
                    }
                   echo" </select>
                    </div>
                    <input type=\"submit\" class=\"mt-5 ms-4  form-control text-light\" style=\"background-color:rgba(22, 100, 190, 0.884);\" value=\"Modifier\" name=\"modifier\"><br><br>
                </form>
            </div>
        <div class=\"col\">
        <h3 class=\"card-header text-center text-light mt-4\" style=\"background-color:rgba(22, 100, 190, 0.884);\">Supprimer</h3>
        <form id='form3' class=\"form card-header mt-5\" method=\"POST\" action=\"TraiteClasse.php\">
                    <div class=\"input-group\">
                        <label class=\"form-label\" for=\"libelle\">Libelle</label>
                        <select class=\"form-select ms-lg-4 inp1\" id='libelle2' name=\"libelle\" >";
                        $req1->execute();
                        while($row=$req1->fetch())
                        {
                             echo"<option value=\"$row[0]\">$row[0]</option>";
                        }
                       echo" </select>
                    </div>
                    <input type=\"submit\" class=\"mt-5 ms-4  form-control text-light\" style=\"background-color:rgba(22, 100, 190, 0.884);\" value=\"Supprimer\" name=\"Supprimer\"><br>
        </form>
        </div>
        </div>
    </div>
    <script>
        var form1=document.getElementById('form1');
        var form2=document.getElementById('form2');
        var form3=document.getElementById('form3');
        var sp1=document.querySelectorAll('.sp1')
        var inp1=document.querySelectorAll('.inp1');
        var sp2=document.querySelectorAll('.sp2')
        var inp2=document.querySelectorAll('.inp2');
        var sp3=document.querySelector('.sp3');
        var inp3=document.getElementById('inp3');
        form1.addEventListener('submit',function(e){
            for(let i=0;i<sp1.length;i++)
            {
                if(inp1[i].value==\"\"){
                    sp1[i].textContent=\"pas de champ vide\";
                    e.preventDefault();
                }
                 
            }
        },false);
        form2.addEventListener('submit',function(e){
            for(let i=0;i<sp2.length;i++)
            {
                if(inp2[i].value==\"\")
                {
                    sp2[i].textContent=\"pas de champ vide\";
                    e.preventDefault();
                }
                 
            }
        },false);
        form3.addEventListener('submit',function(e){
                 if(inp3.value ==\"\")
                 {
                  
                    sp3.textContent=\"Ce champ ne doit pas etre vide\";
                    e.preventDefault();
                 }
                 else
                 {
                    var res=confirm(\"Voulez-vous vraiment supprimer?\");
                    if(res=true)
                      e.preventDefault();
                 }
        },false);
    </script>
</body>
</html>";
?>