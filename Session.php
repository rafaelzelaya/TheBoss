<?php
  function AbrirSession(){
    session_start();
    if(isset($_SESSION["session"]) and $_SESSION["session"] == true){
      return true;
    }
    else{
      return false;
    }
  }
  function RegresarInicio(){
    return "<script type='text/javascript'>location.href='Login.php'</script>";
  }
  function CerrarSession(){
    session_start();
    if(isset($_SESSION["session"])){
      session_destroy();
      return "session en false y destruida";
    }
    else{
      return "session ya estaba destruida...";
    }
  }
?>
