<!DOCTYPE HTML>
<html>
<head>
    <title>

    </title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        function transfer(a,b,c,d,e,f,g,h){
            $.ajax({url:"transfer_execute.php", success:function(result) {
                    $("div").text(result);
                }})
        }
    </script>
</head>
<body>
    <?php
    session_start();
    require_once('functions.php');
    $sender = $_SESSION['id'];
    if(isset($_POST['number'])){
        $account = $_POST['number'];
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
        if(isset($_POST['date'])){
            $date = $_POST['date'];
        }
        if(isset($_POST['title'])){
            $title = $_POST['title'];
        }
    ?>
    <h1>Podsumowanie przelewu</h1> <br>
    Konto nadawcy:<?php if(!empty($account)){echo $account;} ?><br>
    Konto odbiorcy:<b><?php echo $credit_card ?><br>
        Bank:<?php echo bank_name($credit_card) ?></b><br>
    Kwota:<?php echo $amount ?> zł<br>
    <input type="submit" name="button1"
               value="Wykonaj przelew"/>
    </form>
    <?php
     if (isset($_POST['button1'])) {
         make_transfer($date, $account, '1',$account, $receiver_name, '1',$title, $amount);
         echo "Przelew został zrealizowany";
     }
     ?>
<?php
/*
?>
else{
    header('location:transfer_form.php');
}
*/
?>
</body>
</html>