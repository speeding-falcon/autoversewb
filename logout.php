<?php
    require 'config.php';
    $_SESSION = [];
    session_unset();
    session_destroy();
    echo "<script>alert('LOGGED OUT successfully');</script>";
    header("Location: login.php");
?>