<?php

declare(strict_types=1);

function signup_inputs()
{

    if (
        isset($_SESSION["signup_data"]["username"]) &&
        !isset($_SESSION["errors_singup"]["username_exist"])
    ) {
        echo '<input type="text" name="username" placeholder="Username"  autocomplete="off"
        value="' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '<input type="text" name="username" placeholder="Username" autocomplete="off">';
    }

    echo '<input type="password" name="u_password" placeholder="Password" autocomplete="off">';

    if (
        isset($_SESSION["signup_data"]["email"]) &&
        !isset($_SESSION["errors_singup"]["invalid_email"]) &&
        !isset($_SESSION["errors_singup"]["email_exist"])
    ) {
        echo '<input type="text" name="email" placeholder="E-Mail" autocomplete="off"
        value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input type="text" name="email" placeholder="E-Mail" autocomplete="off">';
    }
}

function check_signup_errors()
{
    if (isset($_SESSION['errors_singup'])) {
        $errors = $_SESSION['errors_singup'];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p class="error">' . $error . '</p>';
        }


        unset($_SESSION['errors_singup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        if (isset($_SESSION['errors_singup'])) {
            unset($_SESSION['errors_singup']);
        }
        if (isset($_SESSION['errors_singup'])) {
            unset($_SESSION['signup_data']);
        }
        echo "<br>";
        echo '<p class="result">Signup success!</p>';
    }
}
