<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>
<!DOCTYPE html>
<html>
<header>
    <meta charset="UTF-8">
    <meta name="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">
    <title>Document</title>
</header>

<body>
    <h3>Login</h3>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="u_password" placeholder="Password">
        <button type="submit">Login</button>
    </form>

    <h3>Signup</h3>
    <form action="includes/signup.inc.php" method="post">
        <?php
        signup_inputs();
        ?>
        <button type="submit">Signup</button>
    </form>
    <?php
    check_signup_errors();
    ?>
</body>

</html>