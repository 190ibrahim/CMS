<?php 
    session_start();
    $_SESSION['username'] = null;
    $_SESSION['user_firstname'] = null;
    $_SESSION['user_lastname'] = null;
    $_SESSION['user_role'] = null;
    header("Location: ../index.php");