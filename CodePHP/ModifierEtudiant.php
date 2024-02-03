<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Eterna Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="../animate.css/animate.min.css" rel="stylesheet">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container card-header mt-5">
        <div class="row">
            <div class="col">
                <h3 class="card-header text-center " style="color:rgba(22, 100, 190, 0.884);">Modifier Etudinat</h3>
                <form id='form1' class="form card-header" style="margin-top: 15%;" method="POST" action="TratieModifEtud.php">
                    <div class="input-group">
                        <label class="form-label " for="libelle">Identifiant</label>
                        <span class="text-danger">*</span><input class="form-control ms-lg-4 inp1" id='libelle' type="text" name="modi" pflaceholder="Identifiant"><span class="text-danger sp1" id="sp1"></span><br>
                    </div>
                    <input type="submit" class="mt-5 ms-4 form-control text-light" style="background-color:rgba(22, 100, 190, 0.884);" value="Modifier" name="supprimer"><br><br>
                </form>
            </div>
            <div class="col">
                <h3 class="card-header text-center" style="color:rgba(22, 100, 190, 0.884);">Supprimer Etudinat</h3>
                <form id='form2' class="form card-header" style="margin-top: 15%;" method="POST" action="TratieModifEtud.php">
                    <div class="input-group">
                        <label class="form-label " for="libelle">Identifiant</label>
                        <span class="text-danger">*</span><input class="form-control ms-lg-4 inp1" id='libelle2' type="text" name="supp" pflaceholder="Identifiant"><span class="text-danger sp1" id="sp2"></span><br>
                    </div>
                    <input type="submit" class="mt-5 ms-4 form-control text-light" style="background-color:rgba(22, 100, 190, 0.884);" value="Supprimer" name="supprimer"><br><br>
                </form>
            </div>
        </div>
       
    </div>
    <script>
        var span1 = document.getElementById('sp1');
         var span2 = document.getElementById('sp2');
         var inp1 = document.getElementById('libelle');
         var inp2 = document.getElementById('libelle2');
         var form=document.getElementById('form2');
         var for1=document.getElementById('form1');
         form.addEventListener('submit',function(e){
            if (inp2.value == "")
            {
                span2.innerText = "pas vide";
                e.preventDefault();
            }
            else{
                var res=confirm("Voulez-vous vraiment Supprimer?");
                if(res!=true){
                    
                    e.preventDefault();
                }
            }
                 
         },false);
         for1.addEventListener('submit',function(e){
            if (inp1.value == "")
            {
                span1.innerText = "pas vide";
                e.preventDefault();
            }
        },false);
    </script>
</body>
</html>