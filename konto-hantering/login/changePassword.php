<?php
require 'connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM användare WHERE email = :email");
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($oldPassword, $user['PASSWORD'])) {
            $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            $updateQuery = $pdo->prepare("UPDATE användare SET PASSWORD = :newPassword WHERE email = :email");
            $updateQuery->bindParam(':newPassword', $hashedNewPassword, PDO::PARAM_STR);
            $updateQuery->bindParam(':email', $email, PDO::PARAM_STR);

            if ($updateQuery->execute()) {
                echo "Password change successful! Redirecting to login page...";
                header("Location: logIn.html");
                exit();
            } else {
                echo "Error! Password update failed.";
            }
        } else {
            echo "Incorrect old password.";
        }
    } else {
        echo "User not found.";
    }
}
?>