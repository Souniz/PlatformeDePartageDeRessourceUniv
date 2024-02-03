<?php
 $idRes=$_POST['idRes'];
 $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
 $req1="select idEtudiant,dateConsul from Consulter where idRessour='$idRes'";
 $req11=$connexion->query($req1);
 $test=1;
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
<body>
<div style=\" height:90vh;\">
 <div class=\"row\">
  <header id=\"header\" class=\"d-flex align-items-center fixed-top\">
    <div class=\"container  d-flex justify-content-between align-items-center\">
      <div class=\"logo \">
        <h1 class=\"card-header \" style=\"font-family: algerian;background-color:rgba(22, 100, 190, 0.884);\">Section Informatique</h1>
      </div>
      <nav id=\"navbar\" class=\"navbar\">
        <ul>
          <li><a href=\"authentEtud.html\" class=\"ml-2\">Accueil</a></li>
          <li ><a class=\"w-100 \" href=\"authentAdmi.php\"><i class=\" bi-chat-left-text-fill\" style=\"color:rgba(22, 100, 190, 0.884);\"></i></a></li>
        </ul> 
      </nav>
   </div>
   </header>
   </div>
   <div class=\"row container mt-5 \"><h4 class=\"w-100 mt-5\">Les Etudiants qui ont consulte la ressource <mark>$idRes</mark></h4>
   <table class=\"table\">
        <thead>
          <tr>
            <th scope=\"col\">Numero Carte</th>
            <th scope=\"col\">nom</th>
            <th scope=\"col\">prenom</th>
            <th scope=\"col\">DateNais</th>
            <th scope=\"col\">Date et Heure Consulte</th>
          </tr>
        </thead>
        <tbody>";
        while($res1=$req11->fetch())
        {
            $test=0;
            $req2="select nom,prenom,dateNais,lieu from Etudiant where identification='$res1[0]'";
            $req22=$connexion->query($req2);
            if($res2=$req22->fetch())
            {
                echo"<tr><td>$res1[0]</td><td>$res2[0]</td><td>$res2[1]</td><td>$res2[2]</td><td>$res1[1]</td>
                </tr>";
            }
    }
   echo"</tbody>
   </table>";
   if($test==1)
     echo"Aucun Etudiant n'a encore consulter cette ressource";
   echo"</div>
   </div>
  <footer class=\"card-header text-light w-100 \" style=\"background-color:rgba(22, 100, 190, 0.884); height:10vh;\">
    <div class=\"card-header \">
      <div class=\"copyright\">
        &copy; Copyright <strong><span>SectionInformatique 2022</span></strong>. Tous droits reserés
      </div>
      <div class=\"credits\">
        Designed by Sou_Asta
      </div>
    </div>
  </footer>    
</body> 
</html>";
?>
?>