<?php
  function validExtention($fic)
  {
    $extension=array('jpg','png','jpeg');
    $ok=substr(strrchr($fic,'.'),1);
    $ok=strtolower($ok);
    if(in_array($ok,$extension))
       return true;
    else
       return false;
    
  } 
  function deplace($orig,$dest,$fich)
  {
    $dat=date("dmY_His",time());
    $fic=$dat."_".$fich;
    $des=$dest."/".$fic;
    if(move_uploaded_file($orig,$des))
     return $des;
    else
     return null;
  }
  function valideRessource($fich)
  {
    $exten=array('odt','pdf','docx');
    $okk=substr(strrchr($fich,'.'),1);
    $okk=strtolower($okk);
    if(in_array($okk,$exten))
        return true;
    else
        return false;
  }
  function deplace2($orig,$dest,$fich)
  {
    $des=$dest."/".$fich;
    if(move_uploaded_file($orig,$des))
     return $des;
    else
     return null;
  }
?>