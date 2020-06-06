<?php
session_start();
$_SESSION['error_trigger']=0;
require_once('connect.php');
require_once('functions.php');
if(isset($_POST['cvv'])) {
 if(is_cvv_correct($_POST['cvv'], $_SESSION['cvv'])){
     echo "Poszło i nie wróci więcej";
     make_a_transfer();
    }else{
     echo "Taki łatwy kod, a i tak zle wpisałeś";
    }
}else{
    echo "cos z submitem";
}
?>