<?php
session_start();
$account = $_POST['number'];
$credit_card = $_POST['credit-card'];
$amount = $_POST['amount'];
$receiver_name = $_POST['receiver_name'];
$date = $_POST['date'];
$title = $_POST['title'];
$_SESSION['error-trigger'] = 0;
if($account==0 || $credit_card==0||$amount==0||$receiver_name==0||$date==0||$title==0) {
$_SESSION['error-trigger'] = 1;
?>
    <script>
    history.back();
    </script>
    <?php
}
?>
<h1>Podsumowanie przelewu</h1> <br>
<?php
require_once('functions.php');
$dostepne_srodki=dostepne_srodki($account);
if($amount>$dostepne_srodki){
    $_SESSION['error-trigger'] = 1;
    $_SESSION['error'] = "Zbyt mało środków na koncie!";
}
?>
Konto nadawcy:<?php echo $account ?><br>
Konto odbiorcy:<?php echo $credit_card ?><br>
Kwota:<?php echo $amount ?> zł<br>
<form action="przelewy.php" method="post">
    Podaj kod autoryzacyjny: <input type="text" name="cvv" id="cvv" minlength="4" maxlength="4" required/>
    <br/>
    Twój kod autoryzacyjny to:
    <?php
    $_SESSION['cvv'] = rand(1000, 9999);
    echo $_SESSION['cvv'];
    }
?>
    <br>
<button type="submit" name="submit" value="submit">Przejdź do podsumowania</button>
