<?php
require '../connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM användare WHERE email = :email");
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['PASSWORD'])) {
        session_start();
        $_SESSION['user_id'] = $user['användarID'];
        $_SESSION['user_mail'] = $user['email']; 
        echo "Login True.";
        exit();
    } else {
        echo "Login failed. Please check your username and password for errors.";
    }
}

?>
