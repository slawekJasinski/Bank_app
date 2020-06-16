<!DOCTYPE HTML>
<html>
    <head>
        <title>

        </title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <nav>
            <a href="main_page.php">Powrót do strony głównej</a>
        </nav>
    </head>
    <body>
        <?php
        session_start();
        if(!isset($_SESSION['username'])){
            header('location:index.php');
        }
        require_once('functions.php');
        $sender = $_SESSION['username'];
        if(isset($_POST['number'])){
            $account = $_POST['number'];
            }else{
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
        <?php make_transfer($date, $account, $sender, $credit_card, $receiver_name, $_receiver_address, $title, $amount); ?>
        <script>alert("<?php echo "Przelew do: ".bank_name(substr($credit_card, 3, 6)); ?>")</script>
        Konto nadawcy: <?php echo $account ?><br>
        Konto odbiorcy: <?php echo $credit_card ?><br>
            Bank: <?php echo bank_name($credit_card) ?><br>
        Kwota: <?php echo $amount ?> zł<br>

    </body>
</html>