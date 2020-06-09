<?php
session_start();
require_once('functions.php');
$account = $_POST['number'];
$credit_card = $_POST['credit-card'];
$amount = $_POST['amount'];
$receiver_name = $_POST['receiver_name'];
$date = $_POST['date'];
$title = $_POST['title'];
$sender=$_POST['sender'];
$_SESSION['error-trigger'] = 0;
/*if($amount==0||$receiver_name==0||$date==0||$title==0) {
$_SESSION['error-trigger'] = 1;
?>
    <script>
    history.back();
    </script>
    <?php
}
*/
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
Konto odbiorcy:<b><?php echo $credit_card ?><br> Bank:<?php require_once('functions.php'); echo bank_name($credit_card) ?></b><br>
Kwota:<?php echo $amount ?> zł<br>
<form action="przelewy.php" method="post">
    Podaj kod autoryzacyjny: <input type="text" name="cvv" id="cvv" minlength="4" maxlength="4" required/>
    <br/>
    Twój kod autoryzacyjny to:
    <?php
    $_SESSION['cvv'] = rand(1000, 9999);
    echo $_SESSION['cvv'];
    $formula = "date('Y-m-d H-i-s', $account, $sender, $credit_card, $receiver_name, $title, $amount";
    ?>
    <br>
<button type="submit" name="submit" value="submit">Wykonaj przelew</button>
</form>
<?php
make_transfer($formula);
?>
