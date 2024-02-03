var numb = document.getElementById('ident');
var nom = document.getElementById('nom');
var prenom = document.getElementById('prenom');
var email = document.getElementById('email');
var lieu = document.getElementById('lieu');
var login = document.getElementById('login');
var pas1 = document.getElementById('pas1');
var pas2 = document.getElementById('pas2');
var profil = document.getElementById('prof');
var form = document.getElementById('form');
var nspan = document.querySelectorAll('.spp');
var inp = document.querySelectorAll('.inp');

var reg1 = /[^a-z]/ig;
var reg2 = /[^a-z0-9]/ig;
form.addEventListener('submit', function(e) {
    for (let i = 0; i < inp.length; i++) {
        if (inp[i].value == "")
         {
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

    if (reg1.test(nom.value) || reg1.test(prenom.value)) {
        alert("seulement les lettres sont autorise dans nom et prenom");
        e.preventDefault();
    }
    if (pas1.value!=pas2.value) {
        alert("Mots de Passe incoherents");
        e.preventDefault();
    }
}, false);