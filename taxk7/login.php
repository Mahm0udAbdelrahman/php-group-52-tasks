<?php
session_start();
$flag = 0;
$errors = [];
$password = null;
$password_error = null;
$emaill = null;
$emaill_error = null;
require_once('data.php');
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $passw = $_POST['password'];

        if (!empty($email)) {

            echo 'oookkk';
        } else {
            $emaill_error = 'Plz enter email';
        }

        if (!empty($pass)) {
            if (strlen($pass) > 5 && strlen($pass) < 20) {
                if (preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $passw)) {
                    echo 'trrsd';
                } else {

                    $password_error = 'Plz enter correct password';
                }
            } else {
                $password_error = 'Plz enter password min 5 max10';
            }
        } else {
            $password_error= 'Plz enter password';
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
    <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">

        <h1>Login</h1>
        <input type="email" name="email" id="" value="<?php echo $emaill; ?>">Email
        <?php if (!empty($emaill_error)) : ?>
        <p class="error password-error alert alert-danger">
      <?php echo $emaill_error; ?>
        </p>
        <?php endif;?>
        <br>
        <input type="password" name="password" id="" value="<?php echo $password; ?>">Password
        <?php if (!empty($password_error)) : ?>
        <p class="error password-error  alert alert-danger">
      <?php echo $password_error; ?>
        </p>
        <?php endif;?>
        
        <br>
        <button>Login</button>
        <a class="btn btn-outline-success" type="submit"  href='register.php'>Register</a>

        

        


    </form>
</body>

</html>