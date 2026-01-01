<?php

declare(strict_types=1);

function is_input_empty(string $username, string $u_password, string $email): bool
{
    if (empty($username) || empty($u_password) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email): bool
{
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_exist(object $pdo, string $username)
{
    if (!empty($username) && get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_exist(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $username, string $u_password, string $email){
    set_user($pdo, $username, $u_password, $email);
}