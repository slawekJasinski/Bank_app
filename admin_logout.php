<?php
session_start();
// zniszczenie sesji
header('location: admin');
session_destroy();
?>