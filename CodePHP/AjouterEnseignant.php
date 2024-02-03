<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="card-header text-center bg-primary text-light mt-1">Ajouter Enseignent</h1>
        <form class="form mt-3 card-header" style="width: 55%; margin-left:20%" action="traiteEnseig.php" method="POST" id="form" enctype="multipart/form-data">
            <span class="text-danger">*</span><label for="ident">Immatriculation :</label>
            <input class="form-control inp" type="text" name="ident" placeholder="Idntification" id="ident"><span class="text-danger spp"></span><br>
            <span class="text-danger ">*</span><label for="nom">Nom :</label>
            <input class="form-control inp" type="text" name="nom" placeholder="Nom de Famille" id="nom"><span class="text-danger spp"></span><br>
            <span class="text-danger">*</span><label for="prenom">Prenoms :</label>
            <input class="form-control inp" type="text" name="prenom" placeholder="Prenoms" id="prenom"><span class="text-danger spp"></span><br>
            <span class="text-danger">*</span><label for="sex">Sexe</label>
            <select class="form-select" name="sex" id="">
                <option value="m">M</option>
                <option value="f">F</option>
            </select><br>
            <span class="text-danger">*</span><label for="mail">Email Personnel :</label>
            <input class="form-control inp" type="email" name="mail" placeholder="E-mail Personnel" id="email"><span class="text-danger spp"></span><br>
            <span class="text-danger">*</span><label for="naiss">Date de Naissance :</label>
            <input class="form-control inp" type="date" name="naiss" id="date"><span class="text-danger spp"></span><br>
            <span class="text-danger">*</span><label for="tel">Telephone:</label>
            <input class="form-control inp" type="tel" name="tel" id="tel"><span class="text-danger spp"></span><br>
            <span class="text-danger">*</span><label for="statu">Statu</label>
            <select class="form-select " name="statu" id="statu">
                <option value="Dr">Professeur</option>
                <option value="Pr">Docteur</option>
            </select><br>
            <div class="input-group">
                <span class="text-danger">*</span><span class="bi-person fw-bold"></span>
                <input class="form-control ms-lg-4 inp" id='login' type="text" name="login" placeholder="login"><span class="text-danger spp"></span><br>
            </div>
            <div class="input-group mt-4">
                <span class="text-danger">*</span><span class="bi-lock "></span>
                <input class="form-control ms-lg-4 inp" id='pas1' type="password" name="MotPass" placeholder="Mot de Passe"><span class="text-danger spp"></span><br>
                <span class="text-danger">*</span><input class="form-control ms-lg-4 inp" id='pas2' type="password" name="ConfMotPass" placeholder="Confirmer Mot de Passe"><span class="text-danger spp"></span><br>
            </div>
            <span class="text-danger">*</span><label for="fichier">Photo Profile</label>
            <input class="form-control inp" type="file" id="prof" name="photo" accept="image/*"><span class="text-danger spp"></span><br>
            <input class="btn bg-primary text-light" type="submit" name="valider" value="Valider" id="env">
            <input class="btn bg-primary text-light" type="reset" name="annuler" value="Annuler" id="sup">
        </form>
    </div>
    <script>
        var numb = document.getElementById('ident');
        var nom = document.getElementById('nom');
        var prenom = document.getElementById('prenom');
        var email = document.getElementById('email');
        var tel = document.getElementById('tel');
        var login = document.getElementById('login');
        var pas1 = document.getElementById('pas1');
        var pas2 = document.getElementById('pas2');
        var profil = document.getElementById('prof');
        var form = document.getElementById('form');
        var nspan = document.querySelectorAll('.spp');
        var inp = document.querySelectorAll('.inp');
        var reg1 = /[^a-z]/ig;
        var reg2 = /[^a-z0-9]/ig;
        var reg3=/[^0-9]/g;
        form.addEventListener('submit', function(e) {
            for (let i = 0; i < inp.length; i++) {
                if (inp[i].value == "") {
                    nspan[i].innerText = "pas vide";
                    e.preventDefault();
                }
            }
            if (reg2.test(numb.value)) {
                alert("seulemet des lettres et chiffres pour le numero");
                e.preventDefault();
            }
            if (reg2.test(login.value)) {
                alert("seulemet des lettres et chiffres pour le login");
                e.preventDefault();
            }
            if (reg3.test(tel.value)) {
                alert("seulemet des chiffres pour le numero telephone");
                e.preventDefault();
            }

            if (reg1.test(nom.value) || reg1.test(prenom.value)) {
                alert("seulement les lettres sont autorise dans nom et prenom");
                e.preventDefault();
            }
            if (pas1.value!=pas2.value) {
                alert("Mots de Passe incoherents");
                e.preventDefault();
            }

        }, false);
    </script>
</body>
</html>