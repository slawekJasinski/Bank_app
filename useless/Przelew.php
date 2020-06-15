<?php
session_start();
$_SESSION['error-trigger']=0;
$conn = mysqli_connect('localhost', 'wikomp_gr1','BDWsB2021','wikomp_gr11'); //połaczenie z baza
//wyciągniecie wartości z indexu
if(isset($_POST['nr_konta'])) {
    $nr_konta = $_POST['nr_konta'];
    $kwota = $_POST['kwota'];
    $cvv = $_POST['cvv'];
    $id_produktu=1;
    if(empty($nr_konta)&&strlen($nr_konta)!=26){
        $_SESSION['error-trigger']=1;
        $_SESSION['error']="Błędny nr konta!";
    }
    if(empty($kwota)||$kwota<0){
        $_SESSION['error-trigger']=1;
        $_SESSION['error']="Błąd w kwocie przelewu!";
    }
    if(is_null($cvv)||strlen($cvv)!=3){
        $_SESSION['error-trigger']=1;                                       //cvv trzeba zakodować
        array_push($errors, "Brak potwierdzenia");
    }
    $sql = "SELECT * FROM `konta` where nr_konta='nr_konta'";
    $result = mysqli_query($conn, $sql) or die("Błąd logowania" . mysqli_error($conn));
    $verify = mysqli_fetch_array($result);
    if($verify['dostepne_srodki']>=$kwota && $_SESSION['error-trigger']==0 && $id_produktu==1){
        echo("Możesz wykonąć przelew");
        $_SESSION['error-trigger']=-1;
        $_SESSION['error']="Przelew został dodany do kolejki przelewów";
        header('location: bank.php');
        //początek transakcji SQL
        //update stanu konta 1
        //update stanu konta 2
        //ewentualny log
    }
    else{

    }

    echo rand(0, 100);


}
?>