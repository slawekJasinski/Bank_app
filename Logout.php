<?php
session_start();
// zniszczenie sesji
header('location: index.php');
session_destroy();
?>