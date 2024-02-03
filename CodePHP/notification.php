<?php
 session_start();
 if(!$_SESSION['connectedEtu'])
  header("Location:index.html");
 $classe=$_SESSION['class'];
 $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
 $req1="select* from Notification where classe='$classe'";
 $req11=$connexion->query($req1);
 echo"<h1>Notification</h1>";
 while($res=$req11->fetch())
 {
    if($res['type']=='R')
    {
        echo"La ressource $res[1] a ete ajoute le $res[3]<br>";
    }
    else
    {
        echo"Le module $res[1] a ete ajoute le $res[3]<br>";
    }
 }

?>