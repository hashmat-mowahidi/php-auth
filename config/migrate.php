<?php

require "db.php";

$sql = "
    create table if not exists users (
    id int(11) auto_increment primary key,
    username varchar(100) not null,
    u_password varchar(255) not null,
    email varchar(100) not null,
    created_at timestamp default current_timestamp
);
";

$pdo->exec($sql);
