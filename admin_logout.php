<?php
session_start();
// zniszczenie sesji
header('location: admin/index.php');
session_destroy();
?>