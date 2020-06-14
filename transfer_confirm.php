<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/scroll-up.js"></script>
	
        <title>KAS Bank - potwierdzenie przelewu</title>
    </head>

    <body>
        <?php
        session_start();
        require_once('functions.php');
        $sender = $_SESSION['username'];
        if(isset($_POST['number'])){
            $account = $_POST['number'];
        }else {
            $_SESSION['error-trigger'] = 1;
            $_SESSION['error'] = "Błędne dane. Spróbuj później!";
        }
        if(isset($_POST['credit-card'])){
            $credit_card = $_POST['credit-card'];
        }
        if(isset($_POST['amount'])){
            $amount = $_POST['amount'];
        }
        if(isset($_POST['receiver_name'])){
            $receiver_name = $_POST['receiver_name'];
        }
        if(isset($_POST['receiver_address'])){
            $_receiver_address = $_POST['receiver_address'];
        }
        if(isset($_POST['date'])){
            $date = $_POST['date'];
        }
        if(isset($_POST['title'])){
            $title = $_POST['title'];
        }
        ?>

    <h1>Podsumowanie przelewu</h1> <br>
    <?php make_transfer($date, $account, $sender, $credit_card, $receiver_name, '1', $title, $amount); ?>
    <script>alert("<?php echo bank_name(substr($credit_card, 3, 6)); ?>")</script>
    Konto nadawcy:<?php if(!empty($account)){echo $account;} ?><br>
    Konto odbiorcy:<b><?php echo $credit_card ?><br>
        Bank:<?php echo bank_name($credit_card) ?></b><br>
    Kwota:<?php echo $amount ?> zł<br>

    </body>
</html>