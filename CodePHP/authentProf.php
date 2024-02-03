<?php
session_start();

if(isset($_POST['login']) && isset($_POST['MotPass']))
{
    $log=$_POST['login'];
    $cle=$_POST['MotPass'];
    $con=new PDO("mysql:host=localhost;port='3306';dbname=SectionInformatique","root","");
    $req1="select immatriculation,nom,statu,pprofile from Professeur where login=? and MotPasse=?";
    $req11=$con->prepare($req1);
    $req11->execute(array($log,$cle));
    $nom=$req11->fetch();
    if($nom!=null)
    {
        $_SESSION['id']=$nom[0];
        $_SESSION['nom']=$nom[1];
        $_SESSION['statu']=$nom[2];
        $_SESSION['profil']=$nom[3];
        $_SESSION['connectProf']=true;
        header("Location:accueilEnseignt.php");
    }
    else
    {
        session_destroy();
        header("Location:authentProf.php");
    }
       

}
?>
<!Doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../CSS/athent.css">
    <script langage="javascript" src="../Script/authent.js" />
    </script>
</head>
<title>Enseignant</title>

<body>
    <div class="container cont card mt-5 w-50">
        <div class="row ms-lg-5 w-100">
            <div class="col-8 mt-4 ">
                <div class="card">
                    <div class="card-header">
                        <h2 class="bg-primary text-uppercase text-light">Authentification</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row ms-lg-5 mt-5">
            <div class="col-8">
                <form id='form' method="POST" action="">
                    <div class="input-group">
                        <span class="bi-person fw-bold"></span>
                        <input class="form-control ms-lg-4 inp"  type="text" name="login" placeholder="login"><span class="sp text-danger"></span><br>
                    </div>
                    <div class="input-group mt-4">
                        <span class="bi-lock "></span>
                        <input class="form-control ms-lg-4 inp" type="password" name="MotPass"
                            placeholder="Mot de Passe"><span class="sp text-danger"></span><br>
                    </div>
                    <input type="submit" class="mt-5 ms-4 bg-primary form-control text-light" value="Connexion"><br><br>
                    <a  class="link-success text-body" href="traiteMotP.php">mot de passe oublie ?</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        var inp=document.querySelectorAll('.inp');
        var sp=document.querySelectorAll('.sp');
        var form=document.getElementById('form');
        form.addEventListener('submit',function(e){
                  for(var i=0;i<inp.length;i++)
                  {
                    if(inp[i].value=="")
                    {
                        e.preventDefault();
                        sp[i].innerHTML="pas de champ vide";
                       
                    }
                  }
        },false);
      
    </script>
</body>
</html>