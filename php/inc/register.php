<?php
session_start();
require '../db/db_connection.php';
require_once 'functions.php';
$data = validate($_POST);

$fname = $data["firstname"];
$lname = $data["lastname"];
$email = $data["email"];
$phone = $data["phone"];
$password = $data["password"];
$confirmpassword = $data["passwordConfirm"];

$sql = "SELECT * FROM accounts WHERE accounts_email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['registerError'] = 'Gebruikersnaam of E-Mail zijn al in gebruik';
    header("Location: ../../registratie.php");
    exit;
} else {
    if ($password == $confirmpassword) {
        $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        $query = "INSERT INTO accounts (accounts_email, accounts_password, accounts_phone, accounts_fname, accounts_lname) VALUES('$email','$hash','$phone','$fname','$lname')";
        mysqli_query($conn, $query);
        $_SESSION['loggedIn'] = true;
        $_SESSION['displayname'] = $fname;
        $_SESSION['accountId'] = $data['accounts_id'];
        $_SESSION['employee'] = "0";
        header("Location: ../../index.php");
        exit;
    } else {
        $_SESSION['registerError'] = 'Wachtwoorden komen niet evereen';
        header("Location: ../../registratie.php");
        exit;
    }
}
