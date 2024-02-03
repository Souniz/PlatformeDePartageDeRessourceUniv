<?php
 session_start();
 if(!$_SESSION['connectProf'])
        header("Location:index.html");
 $connexion=new PDO("mysql:host=localhost;port=3306;dbname=SectionInformatique","root","");
 if($connexion)
 {
     
         if(isset($_POST['libelle']) && isset($_POST['resp']))
         {
            $req1="update Module set idProf=? where libelle=?";
            $req11=$connexion->prepare($req1);
            if($req11->execute(array($_POST['resp'],$_POST['libelle'])));
            {
               header("Location:reussit.html");
            }
     }
 }
 
?>
<!Doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../CSS/ajoutMod.css">
    <script langage="javascript" src="../Script/authent.js" />
    </script>
    
</head>
<title>Etudiant</title>

<body>
    <div class="container w-50 mt-5">
        <div class="row">
            <div class="col">
                <h3 class="card-header text-center text-danger ">Modifier Module</h3>
                <form id='form1' class="form card-header" style="margin-top: 15%;" method="POST" action="">
                    <div class="input-group">
                        <label class="form-label " for="libelle">Nom</label>
                        <span class="text-danger">*</span><input class="form-control ms-lg-4 inp1" id='libelle' type="text" name="libelle" placeholder="libelle"><span class="text-danger sp1"></span><br>
                    </div>
                    <div class="input-group mt-3">
                    <label class="form-label" for="resp">Nouv Prof</label>
                        <span class="text-danger">*</span><input class="form-control ms-lg-4 inp1" id='resp' type="text" name="resp"
                            placeholder="Nouveau Professeur"><span class=" text-danger sp1"></span><br>
                    </div>
                    <input type="submit" class="mt-5 ms-4 bg-danger form-control text-light" value="Modifier" name="creer"><br><br>
                </form>
            </div>
        </div>
       
    </div>
    <script>
        var form1=document.getElementById('form1');
        var form2=document.getElementById('form2');
        var form3=document.getElementById('form3');
        var sp1=document.querySelectorAll('.sp1')
        var inp1=document.querySelectorAll('.inp1');
        var sp2=document.querySelectorAll('.sp2')
        var inp2=document.querySelectorAll('.inp2');
        form1.addEventListener('submit',function(e){
            for(let i=0;i<sp1.length;i++)
            {
                if(inp1[i].value==""){
                    sp1[i].textContent="pas de champ vide";
                    e.preventDefault();
                }
                 
            }
        },false);
        form2.addEventListener('submit',function(e){
            for(let i=0;i<sp2.length;i++)
            {
                if(inp2[i].value==""){
                    sp2[i].textContent="pas de champ vide";
                    e.preventDefault();
                }
                 
            }
        },false)
    </script>
</body>
</html>
