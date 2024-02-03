<?php
session_start();
if(!$_SESSION['connectedEtu'])
  header("Location:index.html");
if($_GET['libe'])
{
    $classe=$_SESSION['class'];
    $libModul = $_GET['libe'];
    $nom=$_SESSION['nom'];
    $prenom=$_SESSION['pren'];
    $photo=$_SESSION['photo'];
    $connexion = new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique", "root", "");
    $req2 = "select libelle,type from Ressource where idModul='$libModul'";
    $req22 = $connexion->query($req2);
    $req3 = "select libelle from Module where idClasse='$classe'";
    $req33 = $connexion->query($req3);
    $test = 0;
    echo" <!DOCTYPE html>
<html lang=\"en\">

<head>
  <meta charset=\"utf-8\">
  <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">

  <title>Eterna Bootstrap Template - Index</title>
  <meta content=\" name=\"description\">
  <meta content=\" name=\"keywords\">
  <link href=\"../bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
  <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css\" integrity=\"sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I\" crossorigin=\"anonymous\">
  <link href=\"../bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">
  <link href=\"../CSS/style.css\" rel=\"stylesheet\">
</head>
<body >
 <div style=\"height:90vh;\">
 <div class=\"row\">
  <header id=\"header\" class=\"d-flex align-items-center fixed-top\">
    <div class=\"container  d-flex justify-content-between align-items-center\">
    <div class=\"logo d-flex justify-content-between\">
    <div class=\"row\"> 
    <div class=\"col-6\">
    <h1 class=\" \" style=\"font-family: algerian; \"><img class=\"ronded\" src=\"$photo\" alt=\"\"/>$nom $prenom </h1>
    </div>
    <div class=\"col mt-2 \">
    <input type=\"text\" class=\"form-control \" name=\"rech\" id=\"rech\" placeholder=\"recherche module\" >
    <a href=\"\" id=\"lien\" name=\"$libModul\" style=\"font-Weight:bolder; color:black;\"></a>
    </div>
    </div>
 </div>
      <nav id=\"navbar\" class=\"navbar\">
        <ul>
          <li class=\"ms-lg-2 ms-sm-1\"><a href=\"accueilEtudiant.php\" class=\"text-primary ms-4 ms-sm-2\">Accueil</a></li>
          <li class=\"ms-lg-2 ms-sm-1\">  <div class=\"dropdown\">
                 <button type=\"button\" class=\"text-sm btn btn-light dropdown-toggle dropstart\" data-toggle=\"dropdown\"><i class=\"bi-briefcase-fill h-100\" style=\"color:rgba(22, 100, 190, 0.884);\"></i>Mes Modules</button>
                 <div class=\"dropdown-menu\" >";
                 while($drop= $req33->fetch())
                 {
                  echo"<a class=\"dropdown-item text-wrap text-dark\" href=\"RessouEtudiant.php?libe=".$drop[0]."\">".$drop[0]."</a>";
                 }
                
          echo"</div></div></li> 
          <li class=\"ms-lg-2 me-xl-0\"><a class=\"w-100 text-primary\" href=\"messageEtudiant.php\">Message<i class=\" bi-chat-left-text-fill\" style=\"color:rgba(22, 100, 190, 0.884);\"></i></a></li>
          <li class=\"ms-lg-2 me-xl-0\"><a class=\"w-100 text-primary\" href=\"notification.php\">Notification<i class=\" bi-bell w-100 icon\" style=\"color:rgba(22, 100, 190, 0.884);\"></i></a></li>
          <li class=\"ms-lg-2 me-xl-0\"><a class=\"text-primary\" href=\"deconnexion.php\">Deconnexion<i class=\"bi-power text-danger\"></i></a></li>
        </ul>
       
      </nav><!-- .navbar -->
      </div>
  </header>
  </div>
   <div class=\"row container mt-5 \"><h1 class=\"w-50 mt-5\">Cours $libModul</h1>
   <table class=\"table\">
        <thead>
          <tr>
            <th scope=\"col\">fichier</th>
            <th scope=\"col\">Type</th>
            <th scope=\"col\">telechargement</th>
          </tr>
        </thead>
        <tbody>";
    while($res=$req22->fetch())
    {
        $test=1;
        $ress=substr(strrchr($res[0],'/'),1);
        echo"
          <tr>
            <th scope=\"row\">".$ress."</th>
            <td>".$res[1]."</td>
            <td><a href=\"telecharger.php?res=".$res[0]."\"><i class=\" bi-box-arrow-down\" style=\"color:rgba(22, 100, 190, 0.884);\"></i></a></td>
          </tr>";
    }
    if($test==0)
     echo"<tr><td>aucune ressource</td></tr>";
   echo" </tbody>
   </table></div></div>
  <footer class=\"card-header text-light w-100 \" style=\"background-color:rgba(22, 100, 190, 0.884);height:10vh;\">
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
       var mod=lien.getAttribute(\"name\");
       rech.addEventListener('keypress',recher,false);
       function recher()
                        {
                            var url=\"recherche.php\";
                            var obj=new XMLHttpRequest();
                            obj.open('POST',url);
                            var form = new FormData();
                            form.append('rechRe',rech.value);
                            form.append('mod', mod);
                            obj.send(form);
                            obj.onreadystatechange=function(){
                                if(obj.readyState==4 && obj.status==200)
                                {
                                      
                                    if(obj.responseText!=null)
                                    {
                                       lien.textContent=\"\";
                                       var chem =\"ressource/\"+obj.responseText;
                                       lien.setAttribute(\"href\",\"telecharger.php?res=\"+chem);
                                       lien.textContent=obj.responseText;
                                
                                    }
                                    else
                                    {
                                      
                                       lien.setAttribute(\"href\",\"\");
                                       
                                    }

                                }
                            };
                        }   
       </script>
</body> 
</html>";
}
?>