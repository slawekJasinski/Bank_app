<?php
    session_start();
    // zniszczenie sesji
    header('location: ./');
    session_destroy();
?>