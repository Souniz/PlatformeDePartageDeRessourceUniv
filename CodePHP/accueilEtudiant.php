<?php
session_start();
if(!$_SESSION['connectedEtu'])
   header("Location:index.html");
$ident=$_SESSION['id'];
$classe=$_SESSION['class'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['pren'];
$photo=$_SESSION['photo'];
$connexion = new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique", "root", "");
$req2 = "select libelle,idProf from Module where idClasse='$classe'";
$req22 = $connexion->query($req2);
$res1 = $connexion->query($req2);
echo" <!DOCTYPE html>
<html lang=\"en\">

<head>
  <meta charset=\"utf-8\">
  <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">

  <title>Eterna Bootstrap Template - Index</title>
  <meta content=\" name=\"description\">
  <meta content=\" name=\"keywords\">
  <link href=\"../animate.css/animate.min.css\" rel=\"stylesheet\">
  <link href=\"../bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
  <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css\" integrity=\"sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I\" crossorigin=\"anonymous\">
  <link href=\"../bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">
  <link href=\"../CSS/style.css\" rel=\"stylesheet\">
</head>
<body>
 <div style=\"height:90%;width:100%;\">
 <div class=\"row\">
  <header id=\"header\" class=\"d-flex align-items-center fixed-top\">
    <div class=\"container-fluid  d-flex justify-content-between \">
      <div class=\"logo d-flex justify-content-between\">
         <div class=\"row\"> 
         <div class=\"col-6\">
         <h1 class=\" \" style=\"font-family: algerian; \"><img class=\"ronded\" src=\"$photo\" alt=\"\"/>$nom $prenom </h1>
         </div>
         <div class=\"col mt-2 \">
         <input type=\"text\" class=\"form-control \" name=\"rech\" id=\"rech\" placeholder=\"recherche module\" >
         <a href=\"\" id=\"lien\" style=\"font-Weight:bolder; color:black;\"></a>
         </div>
         </div>
      </div>
      <nav id=\"navbar\" class=\"navbar\">
        <ul>
          <li><a href=\"authentEtud.html\" class=\"text-primary me-2\">Accueil</a></li>
          <li>  <div class=\"dropdown\">
                 <button type=\"button\" class=\"text-primary btn btn-light dropdown-toggle dropstart\" data-toggle=\"dropdown\"><i class=\"bi-briefcase-fill h-100\" style=\"color:rgba(22, 100, 190, 0.884);\"></i> Mes Modules</button>
                 <div class=\"dropdown-menu\" >";
                 while($drop=$res1->fetch())
                 {
                  echo"<a class=\"dropdown-item text-wrap text-dark\" href=\"RessouEtudiant.php?libe=".$drop[0]."\">".$drop[0]."</a>";
                 }
                
          echo"</div></div></li> 
          <li ><a class=\"w-100 text-primary\" href=\"messageEtudiant.php\">Message<i class=\" bi-chat-left-text-fill icon\" style=\"color:rgba(22, 100, 190, 0.884);\"></i></a></li>
          <li ><a class=\"w-100 text-primary\" href=\"notification.php\">Notification<i class=\" bi-bell w-100 icon\" style=\"color:rgba(22, 100, 190, 0.884);\"></i></a></li>
          <li><a class=\"text-primary \"href=\"deconnexion.php\">Deconnexion<i class=\"bi-power text-danger\"></i></a></li>
        </ul>
       
      </nav><!-- .navbar -->

    </div>
  </header>
  </div>
  <div id=\"hero\" class=\"row mt-5 mb-3\">
    <div class=\"hero-container \">

      <div id=\"heroCarousel\" data-bs-interval=\"5000\" class=\"carousel slide carousel-fade\" data-bs-ride=\"carousel\">

        <ol class=\"carousel-indicators\" id=\"hero-carousel-indicators\"></ol>
        <div class=\"carousel-inner\" role=\"listbox\">
          <div class=\"carousel-item active\" style=\"background-image: url(../image/resize.jpeg)\">
            <div class=\"carousel-container\">
              <div class=\"carousel-content\">
                <h2 class=\"animate__animated animate__fadeInDown mt-5\"><span style=\"color:white;\">Bienvenu à la Section Informatique</span></h2>
                <p class=\"animate__animated animate__fadeInUp \"style=\"color:white;\">Ce portail est destine aux Etudiants et aux Enseignents de la Section informatique pour la gestion des ressources <br>Merci de Choisir votre statut</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   
<div class=\"row container-fluid card\"> <h1 class=\"card-header w-25\">Mes Cours</h1>";
    while ($ress = $req22->fetch()) {
        $req1="select nom,statu from Professeur where immatriculation='$ress[1]'";
        $req11=$connexion->query($req1);
        $nom=$req11->fetch();
        echo "<div class=\"mt-3 mb-3 h-50 text-center w-100 \"  style=\"background-color:rgba(22, 100, 190, 0.884);\">
                   <h3><a href=\"RessouEtudiant.php?libe=".$ress[0]."\" class=\"text-decoration-none ms-1 mb-3\" style=\"color:white;\">".$ress[0]."</a></h3>
                   <h6 class=\"mt-3\">Enseignant :<span class=\"text-danger\">".$nom[1]." ".$nom[0]."</span></h6>
                   </div>";
    }
   echo" </div></div>
  <footer class=\"card-header text-primary w-100 bg-light\">
    <div class=\"card-header \">
      <div class=\"copyright\">
        &copy; Copyright <strong><span>SectionInformatique 2022</span></strong>. Tous droits reserés
      </div>
      <div class=\"credits\">
        Designed by Sou_Asta
      </div>

    </div>
  </footer>
  </script>
       <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\">
       </script>
       <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js\" integrity=\"sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/\" crossorigin=\"anonymous\">
       </script>
       <script>
       var rech=document.getElementById('rech');
       var lien=document.getElementById('lien');
       rech.addEventListener('keypress',recher,false);
       function recher()
                        {
                            var url=\"recherche.php?rech=\"+rech.value;
                            var obj=new XMLHttpRequest();
                            obj.open(\"GET\",url);
                            obj.send();
                            obj.onreadystatechange=function(){
                                if(obj.readyState==4 && obj.status==200)
                                {
                                      
                                    if(obj.responseText!=null)
                                    {
                                       lien.textContent=\"\";
                                       lien.setAttribute(\"href\",\"RessouEtudiant.php?libe=\"+obj.responseText);
                                       lien.textContent=obj.responseText;
                                
                                    }
                                    else
                                    {
                                       lient.setAttribute(\"href\",\"\");
                                       lien.textContent=\"\";
                                    }

                                }
                            };
                        }   
       </script>
</body> 
</html>";
?>