<?php
session_start();
require_once '../db/db_connection.php';
require_once 'functions.php';

$data = validate($_POST);

define("email", $data['email']);
define("password", password_verify($data['password'], PASSWORD_DEFAULT));

$_SESSION['email'] = email;

$sql = "SELECT * FROM accounts WHERE accounts_email = '" . email . "'";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    while ($loginData = mysqli_fetch_assoc($result)) {
        if (password_verify($data['password'], $loginData['accounts_password'])) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['displayname'] = $loginData['accounts_fname'];
            $_SESSION['accountId'] = $loginData['accounts_id'];
            $_SESSION['employee'] = $loginData['accounts_employee'];
            header("Location: ../../index.php");
            exit;
        } else {
            $_SESSION['loginError'] = "Email and/or password is incorrect.";
            header("Location: ../../index.php");
            exit;
        }
    }
} else {
    $_SESSION['loginError'] = "Email and/or password is incorrect.";
    header("Location: ../../index.php");
}
