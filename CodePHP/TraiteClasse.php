<?php
        session_start();
        $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
        if($connexion)
        {
            if(isset($_POST['creer']))
            {
                if(isset($_POST['libelle']) && isset($_POST['resp']))
                {
                   $req1="insert into Classe(libelle,profResp) values(:lib,:resp)";
                   $req11=$connexion->prepare($req1);
                   if($res0=$req11->execute(array('lib'=>$_POST['libelle'],'resp'=>$_POST['resp'])));
                   {
                      header("Location:reussit.html");
                   }
                }
            }
            if(isset($_POST['modifier']))   
            {
                    if(isset($_POST['libelle']) && isset($_POST['resp']))
                    {
                      
                            $req2="update Classe set profResp=? where libelle=?";
                            $req22=$connexion->prepare($req2);
                            if($res2=$req22->execute(array($_POST['resp'],$_POST['libelle'])));
                            {
                                echo"<script>alert(\"Reussi\")</script>";
                                header("Location:reussit.html");
                            }
                       }
                    }
                }   
            
            if(isset($_POST['Supprimer']))
            {
                $lib=$_POST['libelle'];
                $req2="delete from Classe where libelle=?";
                $req22=$connexion->prepare($req2);
                if($req22->execute(array($lib)));
                {
                    header("Location:reussit.html");
                }
            }
          
            

        
        
?>
