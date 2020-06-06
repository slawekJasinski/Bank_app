<?php
session_start();
// zniszczenie sesji
session_destroy();
header('location: index.php');
?>