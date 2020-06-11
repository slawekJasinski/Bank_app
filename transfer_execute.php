<?php
session_start();
require_once('functions.php');
make_transfer($account, $sender, $credit_card, $receiver_name, $receiver_name, $title, $amount);
echo "Zrealizowany";
?>