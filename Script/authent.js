var log=document.getElementById('inp1');
var pas=document.getElementById('inp2');
var form=document.getElementById('form');
form.addEventListener('submit',function(e){
    if(log.value=="" || pas.value=="")
    {
       e.preventDefault(); 
       alert("pas de champ vide");
    }     
},false)