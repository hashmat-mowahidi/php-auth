<?php

declare(strict_types=1);

function get_user(object $pdo, string $username)
{
    $qeury = "select * from users where username = :username;";
    $stmt = $pdo->prepare($qeury);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
