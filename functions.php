<?php
function is__account_number_correct($account_number)
{
    if (empty($account_number) && strlen($account_number) != 26) {
        $_SESSION['error-trigger'] = 1;
        $_SESSION['error'] = "Błędny nr konta!";
        return false;
    } else {
        return true;
    }
}
function is_cvv_correct($cvv_from_user, $cvv_from_system ){
    if($cvv_from_system==$cvv_from_user){
        return true;
    }else{
        return false;
    }
}
function dostepne_srodki($nr){
return 800;
}
function make_transfer(){

}
function make_future_transfer(){

}
?>