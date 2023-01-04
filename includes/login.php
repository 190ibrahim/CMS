<?php include "db.php";
session_start();


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM users WHERE username = ?";
    $select_user_query = $connection->prepare( $query);
    $select_user_query->execute([$username]);
    $log_in_user = $select_user_query->fetchAll();


    foreach($log_in_user as $row){
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname  = $row['user_lastname'];
        $db_user_email = $row['user_email'];
        $db_user_role = $row['user_role'];
    }
    if ($username === $db_username && password_verify($password,$db_user_password)) {
        $_SESSION['username'] = $db_username;
        $_SESSION['user_firstname'] = $db_user_firstname;
        $_SESSION['user_lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        header("Location: ../admin/index.php");
    } else {
        header("Location: ../index.php"); 
    }
}