<?php
session_start();
if(isset($_POST['login']) && isset($_POST['MotPass']))
{
    $log=$_POST['login'];
    $cle=$_POST['MotPass'];
    $con=new PDO("mysql:host=localhost;port='3306';dbname=SectionInformatique","root","");
    $req1="select * from Admin where login=? and motPasse=?";
    $req11=$con->prepare($req1);
    $req11->execute(array($log,$cle));
    if($req11->fetch()!=null){
        $_SESSION['login']=$log;
        $_SESSION['conAd']=true;
        header("Location:accueilAdmin.php");
    }
    else
    {
        session_destroy();
        header("Location:authentAdmi.php");
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
<title>Administrateur</title>

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
                        <input class="form-control ms-lg-4" id='inp1' type="text" name="login" placeholder="login"><br>
                    </div>
                    <div class="input-group mt-4">
                        <span class="bi-lock "></span>
                        <input class="form-control ms-lg-4" id='inp2' type="password" name="MotPass"
                            placeholder="Mot de Passe"><br>
                    </div>
                    <input type="submit" class="mt-5 ms-4 bg-primary form-control text-light" value="Connexion"><br><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
