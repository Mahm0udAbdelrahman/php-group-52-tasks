<?php
session_start();
$flag = 0;
$errors = [];
$errorss = [];
require_once('data.php');
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $passw = $_POST['password'];

        if (!empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $flag++;
            } else {
                $errors['email_format'] = 'Invalid email format.';
            }
        } else {
            $errors['email_empty'] = 'Email cannot be empty.';
        }


        if (!empty($pass)) {
            if (strlen($pass) > 5 && strlen($pass) < 20) {
                if (preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $passw)) {
                    echo 'trrsd';
                } else {

                    $errorss['pass'] = 'Plz enter correct password';
                }
            } else {
                $errorss['pass_size'] = 'Plz enter password min 5 max10';
            }
        } else {
            $errorss['pass_empty'] = 'Plz enter password';
        }
        foreach ($usres as $user) {
            if ($user['email'] == $email && $user['pas'] == $passw) {
                $_SESSION['Welcome_email'] = $email;
                $_SESSION['Welcome_image'] = $user['image'];
                $_SESSION['Welcome_name'] = $user['name'];
                header('location:Index.php');
            }
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    
    <form method="post" enctype="multipart/form-data">

        <h1>Login</h1>
        <input type="email" name="email" id="" >Email
        <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
        <br>
        <input type="password" name="password" id="" >Password
        <?php if (!empty($errorss)) : ?>
        <?php foreach ($errorss as $errorr) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorr ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

        <br>
        <button>Login</button>
        <a class="btn btn-outline-success" type="submit" href='register.php'>Register</a>






    </form>
</body>

</html>