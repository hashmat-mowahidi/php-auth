<?php

use Random\Engine\Secure;

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'Secure' => true,
    'httponly' => true
]);

session_start();

if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id_logged_in();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION['last_regeneration'] >= $interval) {
            regenerate_session_id_logged_in();
        }
    }
} else {
    if (!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION['last_regeneration'] >= $interval) {
            regenerate_session_id();
        }
    }
}



function regenerate_session_id()
{
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}

function regenerate_session_id_logged_in()
{
    $sessionId = session_create_id() . "_" . $_SESSION["user_id"];
    session_id($sessionId);
    $_SESSION['last_regeneration'] = time();
}
