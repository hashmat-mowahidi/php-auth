<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $u_password = $_POST["u_password"];


    try {
        require_once '../config/db.php';
        require_once 'login_model.inc.php';
        require_once 'login_view.inc.php';
        require_once 'login_controller.inc.php';
        require_once 'config_session.inc.php';

        // Error handlers
        $errors = [];
        if (is_input_empty($username, $u_password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        $result = get_user($pdo, $username);

        if (
            !is_input_empty($username, $u_password) &&
            is_username_wrong($result)
        ) {
            $errors['login_incorrect'] = "Incorrect username!";
        }

        if (
            !is_input_empty($username, $u_password) &&
            !is_username_wrong($result) &&
            is_password_wrong($u_password, $result["u_password"])
        ) {
            $errors["login_incorrect_password"] = "Incorrect password";
        }

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            die();
        }

        $sessionId = session_create_id() . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["username"] = htmlspecialchars($result["username"]);

        header("Location: ../index.php?login=success");

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Failed Query: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
