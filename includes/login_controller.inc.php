<?php

declare(strict_types=1);

function is_input_empty(string $username, string $u_password): bool
{
    if (empty($username) || empty($u_password)) {
        return true;
    } else {
        return false;
    }
}

function is_username_wrong(bool|array $result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong(string $u_password, string $hashed_password)
{
    if (!password_verify($u_password, $hashed_password)) {
        return true;
    } else {
        return false;
    }
}
