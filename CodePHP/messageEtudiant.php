<?php
 session_start();
 if(!$_SESSION['connectedEtu'])
  header("Location:index.html");
 $classe=$_SESSION['class'];
 $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
 $req1="select * from Message where libelle='$classe'";
 $req11=$connexion->query($req1);
 echo"<h1>Message</h1>";
 $test=1;
 while($res=$req11->fetch())
 {
       $test=0;
        echo"<h4>$res[3]</h4><h5>$res[1]</h5>";
 }
if($test==1)
  echo"aucun message";
?>