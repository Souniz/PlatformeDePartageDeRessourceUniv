<?php
    session_start();
    if($_SESSION['connectProf']!=true)
        header("Location:authentProf.php");
    $nom=$_SESSION['nom'];
    $im=$_SESSION['id'];
    $statu=$_SESSION['statu'];
    $photo=$_SESSION['profil'];
    $con=new PDO("mysql:host=localhost;port='3306';dbname=SectionInformatique","root","");
    $req0="select * from Classe where profResp=?"; //voir si il responsable
        $req00=$con->prepare($req0);
        $req00->execute(array($im));
        $req1="select classe from Enseigner where idProf=?";
        $req11=$con->prepare($req1);
        $req11->execute(array($im));
    echo"<!DOCTYPE html>
        <html>
        <head>
            <meta charset=\"utf-8\">
            <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">
            <link href=\"../animate.css/animate.min.css\" rel=\"stylesheet\">
            <link href=\"../bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">
            <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css\" integrity=\"sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I\" crossorigin=\"anonymous\">
            <link href=\"../CSS/style.css\" rel=\"stylesheet\">
        </head>
        <body style=\"background-image: url(../image/cours-de-formation-informatique.png);\">
        <header id=\"header\" class=\"d-flex align-items-center fixed-top\">
        <div class=\"container  d-flex justify-content-between align-items-center\">
          <div class=\"logo \">
            <h1 class=\"card-header \" style=\"font-family: algerian;\">$statu $nom<img class=\"ronded\" src=\"$photo\" alt=\"\"/></h1>
          </div>
          <nav id=\"navbar\" class=\"navbar\">
            <ul>
              <li><a class=\"text-primary\" href=\"accueilEnseignt.php\" class=\"ml-2\">Accueil</a></li>";
              if($resp=$req00->fetch())
              {
                         
                   echo" <li><button class=\"btn \"> <a class=\"text-decoration-none text-wrap text-primary\" href=\"ProfResp.php?libe=$resp[0]\">
                   Gerer Ma Classe<i class=\"bi-briefcase-fill h-100\" style=\"color:rgba(22, 100, 190, 0.884);\"></i>
               </a></button></li>";
                        
              
              }
             echo" <li><a class=\"text-primary\" href=\"deconnexion.php\">Deconnexion<i class=\"bi-power text-danger\"></i></a></li>
            </ul> 
          </nav>
       </div>
       </header>
            <div class=\"row mt-5\">
             </div>
          <h1 class=\"card-header align-items-center\">Vos Classes</h1>
        <div class=\"container mt-5 card-header \" style=\"width: 700px; background-color:rgba(22, 100, 190, 0.884);\">";
        while($class=$req11->fetch())
        {
            $req2="select libelle  from Module where idProf=? and idClasse=?";   
            $req22=$con->prepare($req2);
            $req22->execute(array($im,$class[0]));
           echo "<div class=\"card-header mt-5 w-50\" style=\"margin-left: 100px; \">
                 <div class=\"row mt-3\">
                 <div class=\"col-12\">
                 <div class=\"dropdown\">
                 <button type=\"button\" class=\" btn btn-light dropdown-toggle dropstart\" data-toggle=\"dropdown\" style=\"height:100px; width:500px;\"><h1>".$class[0]."</h1></button>
                 <div class=\"dropdown-menu\" style=\"background-color:rgba(22, 100, 190, 0.884);\">";
                while($module=$req22->fetch())
                {
                   echo" <a class=\"dropdown-item text-wrap\" href=\"gestionRessource.php?libe=$module[0]\">
                        ".$module[0]."
                    </a>";
                    
                }
                
            echo"</div></div></div></div></div>";
        }
       echo"</div>
       <footer class=\"card-header text-light w-100\" style=\"background-color:rgba(22, 100, 190, 0.884);position:absolute; bottom:0;\">
            <div class=\"container card-header \">
            <div class=\"copyright\">
                &copy; Copyright <strong><span>SectionInformatique 2022</span></strong>. Tous droits reserés
            </div>
            <div class=\"credits\">
                Designed by Sou_Asta
            </div>
            </div>
      </footer>
      <script>
      var ss=document.querySelectorAll('.ss');
      ss.addEventListener(\"mouseover\", function() {
       for(var i in ips )
       {
           
           test[i].style.color='red';
       }
      },false);
      </script>
       <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\">
       </script>
       <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js\" integrity=\"sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/\" crossorigin=\"anonymous\">
       </script>
      
    </body>
    </html>";
?>