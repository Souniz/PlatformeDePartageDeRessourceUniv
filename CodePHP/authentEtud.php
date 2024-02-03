<?php
session_start();

if(isset($_POST['login']) && isset($_POST['MotPass']))
{
    $log=$_POST['login'];
     $cle=$_POST['MotPass'];
    $con=new PDO("mysql:host=localhost;port='3306';dbname=SectionInformatique","root","");
    $req1="select identification,nom,prenom,classe,profile from Etudiant where login=? and MotPasse=?";
    $req11=$con->prepare($req1);
    $req11->execute(array($log,$cle));
    $nom=$req11->fetch();
    if($nom!=null){
        $_SESSION['id']=$nom[0];
        $_SESSION['nom']=$nom[1];
        $_SESSION['pren']=$nom[2];
        $_SESSION['class']=$nom[3];
        $_SESSION['photo']=$nom[4];
        $_SESSION['connectedEtu']=true;
        header("Location:accueilEtudiant.php");
    }
    else
    {
        session_destroy();
        header("Location:authentEtud.php");
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

    <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../CSS/accueil.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    <script langage="javascript" src="../Script/authent.js" />
    </script>
</head>
<title>Etudiant</title>

<body>
    <div class="row">
    <div class="col-10">
    <div class="container cont mt-5 w-50">
        <div class="row ms-lg-5 w-100">
           
                <div class="card w-100">
                    <div class="card-header">
                        <h2 class="bg-primary text-uppercase text-light">Authentification</h2>
                    </div>
                </div>
            </div>
        <div class="row ms-lg-5 mt-5 w-100">
            <div class="col">
                <form id='form' class="form card p-5" method="POST" action="">
                    <div class="input-group mt-4 ms-4">
                        <span class="bi-person fw-bold"></span>
                        <input class="form-control ms-lg-4" id='inp1' type="text" name="login" placeholder="login"><br>
                    </div>
                    <div class="input-group mt-4 ms-4">
                        <span class="bi-key"></span>
                        <input class="form-control ms-lg-4" id='inp2' type="password" name="MotPass"
                            placeholder="Mot de Passe"><br>
                    </div>
                    <input type="submit" class="mt-5 ms-4 bg-primary form-control text-light" value="Connexion"><br><br>
                    <a  class="link-success text-body mt-4" href="traiteMotP.php">mot de passe oublie ?</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col mt-5">
    <button class="w-75 bg-primary text-light bi-pencil"><a class="text-decoration-none text-light" href="ajouterEtudiant.php">Je m'inscrirs</a></button>
</div>
</div>
</body>
</html>
