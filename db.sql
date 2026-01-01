create table users (
    id int(11) not null auto_increment,
    username varchar(100) not null,
    u_password varchar(255) not null,
    email varchar(100) not null,
    created_at datetime not null default current_time
);