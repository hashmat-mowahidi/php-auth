<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $u_password = $_POST["u_password"];
    $email = $_POST["email"];

    try {
        require_once '../config/db.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_view.inc.php';
        require_once 'signup_controller.inc.php';
        require_once 'config_session.inc.php';

        // Error handlers
        $errors = [];
        if (is_input_empty($username, $u_password, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }

        if (is_username_exist($pdo, $username)) {
            $errors["username_exist"] = "Username already exist!";
        }

        if (is_email_exist($pdo, $email)) {
            $errors["email_exist"] = "Email already exist!";
        }

        if ($errors) {
            $_SESSION["errors_singup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signupData;

            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $username, $u_password, $email);
        if (isset($_SESSION['signup_data'])) {
            unset($_SESSION['signup_data']);
        }
        $_SESSION['signup_success'] = true;
        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
