<?php
 session_start();
 if(!$_SESSION['connectProf'])
        header("Location:index.html");
 $nom=$_SESSION['nom'];
 $im=$_SESSION['id'];
 $statu=$_SESSION['statu'];
 $photo=$_SESSION['profil'];
 $idClass=$_GET['idClas'];
 $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
 $req1="select * from Etudiant where classe='$idClass'";
 $req11=$connexion->query($req1);
 echo"<!DOCTYPE html>
 <html>
 <head>
   <meta charset=\"utf-8\">
   <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">
   <title>Eterna Bootstrap</title>
   <link href=\"../bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
   <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css\" integrity=\"sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I\" crossorigin=\"anonymous\">
   <link href=\"../bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">
   <link href=\"../CSS/style.css\" rel=\"stylesheet\">
 </head>
 <body style=\"height:100vh;\">
 <div style=\"height:90vh;\">
  <div class=\"row\">
   <header id=\"header\" class=\"d-flex align-items-center fixed-top\">
     <div class=\"container  d-flex justify-content-between align-items-center\">
       <div class=\"logo \">
       <h1 class=\"card-header \" style=\"font-family: algerian;\">$statu $nom<img class=\"ronded\" src=\"$photo\" alt=\"\"/></h1>
       </div>
       <nav id=\"navbar\" class=\"navbar card-header  w-25\">
         <ul >
           <li><a href=\"accueilEnseignt.php\" class=\"ml-2 text-primary \">Accueil</a></li>
           <li ><a class=\"w-100 text-primary\" href=\"deconnexion.php\">Deconnexion <i class=\"bi-power text-danger\"></i></a></li>
         </ul> 
       </nav>
    </div>
    </header>
    </div>
    <div class=\"row container mt-5 \"><h1 class=\"w-50 mt-5\">Les Etudiants</h1>
    <table class=\"table\">
         <thead>
           <tr>
             <th scope=\"col\">Num Carte</th>
             <th scope=\"col\">nom</th>
             <th scope=\"col\">prenom</th>
             <th scope=\"col\">DateNais</th>
             <th scope=\"col\">Lieu Nais</th>
             <th scope=\"col\">Sexe</th>
             <th scope=\"col\">Mail</th>
           </tr>
         </thead>
         <tbody>";
        while($res=$req11->fetch())
        {
            echo"<tr><td>$res[0]</td><td>$res[1]</td><td>$res[2]</td><td>$res[3]</td><td>$res[7]</td><td>$res[4]</td><td>$res[5]</td><td><button class=\"mod\" ><a href=\"TratieModifEtud.php?modi=$res[0]&clas=$idClass\"><i class=\"bi-question-lg h-100\" style=\"color:rgba(22, 100, 190, 0.884);\"></i></a></button></td>
            <td><button type=\"button\" class=\"btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#$res[0]\">
            <i class=\"bi-backspace-reverse-fill h-100\"></i>
          </button>
          <div class=\"modal fade\" id=\"$res[0]\" tabindex=\"-1\" aria-labelledby=\"$res[0]\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
              <div class=\"modal-content\">
                <div class=\"modal-header\">
                  <h5 class=\"modal-title\" id=\"$res[0]\">Confirmation</h5>
                  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <div class=\"modal-body\">
                  <p>Voulez-vous vraiment supprimer l'etudiant <h4 class=\"text-danger\">$res[1] $res[2]</h4></p>
                </div>
                <div class=\"modal-footer\">
                  <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                  <button type=\"button\" class=\"btn btn-primary \"><a class=\"text-light\" href=\"TratieModifEtud.php?supprimer=$res[0]&clas=$idClass\">Confirmer</a></button>
                </div>
              </div>
            </div>
          </div></td></tr>";
        }
    echo"</tbody>
    </table></div>
    </div>
   <footer class=\"card-header text-light w-100 \" style=\"background-color:rgba(22, 100, 190, 0.884);  height:10vh;\">
     <div class=\"card-header \">
       <div class=\"copyright\">
         &copy; Copyright <strong><span>SectionInformatique 2022</span></strong>. Tous droits reserés
       </div>
       <div class=\"credits\">
         Designed by Sou_Asta
       </div>
     </div>
   </footer> 
   <script src=\"../bootstrap/js/bootstrap.bundle.js\"></script>   
   <script>
     var s=document.querySelectorAll('.sup')
     for (let i = 0; i < s.length; i++)
     {
       s[i].addEventListener('click',function(e){
        var id=s[i].getAttribute(\"name\");
        var ver=confirm(\"Voulez vous vraiment supprimer cet etudiant?\");  
        if(ver==false)
          e.preventDefault();
    },false);
  }
  var m=document.querySelectorAll('.mod')
  for (let i = 0; i < m.length; i++)
  {
    m[i].addEventListener('click',function(e){
     var id=s[i].getAttribute(\"name\");
     var ver=confirm(\"Vous allez modifier cet etudiant?\");  
     if(ver==false)
       e.preventDefault();
 },false);
}
   </script>
 </body> 
 </html>";
?>