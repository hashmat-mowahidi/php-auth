<?php

declare(strict_types=1);


function get_username(object $pdo, string $username)
{
    $qeury = "select username from users where username = :username;";
    $stmt = $pdo->prepare($qeury);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email)
{
    $qeury = "select email from users where email = :email";
    $stmt = $pdo->prepare($qeury);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $u_password, string $email)
{
    $qeury = "insert into users (username, u_password, email) values 
    (:username, :u_password, :email);";
    $stmt = $pdo->prepare($qeury);

    $options = [
        'cost' => 12
    ];
    $hashed_password = password_hash($u_password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":u_password", $hashed_password);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}
