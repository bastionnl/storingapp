<?php
session_start();
if(isset($_SESSION['user_id'])){
    header('location: index.php?msg=U bent al ingelogd');
    exit;
}
$email = $_POST['email'];
if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    header('location: register.php?msg=Geen geldig emailadres');
    exit;
}
$password = $_POST['password'];
$password_check = $_POST['password_check'];
if($password != $password_check){
    header('location: register.php?msg=De wachtwoorden komen niet overeen');
    exit;
}
require_once 'conn.php';
$query = "SELECT * FROM users WHERE username = :email";  
$statement = $conn->prepare($query);
$statement -> execute([
    ":email" => $email
]);
$user = $statement -> fetch(PDO::FETCH_ASSOC);
if($statement -> rowCount() > 0){
    header('location: register.php?msg=Emailadres is al in gebruik');
    exit;
}
if(empty($password)){
    header('location: register.php?msg=Vul een wachtwoord in');
    exit;
}
$hash = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO users (username, password) VALUES (:email,:hash)";
$statement = $conn->prepare($query);
$statement -> execute([
    ":email" => $email,
    ":hash" => $hash
]);

header('location: ../login.php?msg=U bent geregistreerd');