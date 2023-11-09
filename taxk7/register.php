<?php
session_start();
$errors = [];
$flag=0;
$types = ['jpeg', 'jpg', 'png'];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_FILES['image']) && isset($_POST['UserName']) && isset($_POST['email']) && isset($_POST['password'])) {
        if ($_FILES['image']['error'] != 4) {
            $img = $_FILES['image'];
            $name = $img['name'];
            $type = $img['type'];
            $tmp_name = $img['tmp_name'];
            $error = $img['error'];
            $size = $img['size'];
            $un = $_POST['UserName'];
            $emai = $_POST['email'];
            $pass = $_POST['password'];
            if ($size < 2097152) {
                $explode = explode('.', $name);
                $en = end($explode);
                $strlen = strtolower($en);
                if (in_array($strlen, $types)) {
                    move_uploaded_file($tmp_name, 'image/profile' . $name);
                    $flag++;
                } else {
                    $errors['types_file']= 'Plz upload file image png jpg jpeg';
                }
            } else {
                $errors['size_file']= "plz chech  file size max 2 miga ";
            }
        } else {
            $errors['empty_file']= 'file empty';
        }
    }
    if (!empty($un)) {
        if (preg_match('@^[A-Z][a-z]@', $un)) {
            $flag++;
        } else {
            $errors['name_start'] = 'Plz enter start name A-Z';
        }
    } else {
        $errors['name_empty']= "Username field is empty";
        }

        if (!empty($emai)) {
            if (filter_var($emai, FILTER_VALIDATE_EMAIL)) {
                $flag++;
            } else {
                $errors['email_format'] = 'Invalid email format.';
            }
        } else {
            $errors['email_empty'] = 'Email cannot be empty.';
        }

    if (!empty($pass)) {
        if (strlen($pass) > 5 && strlen($pass) < 20) {
            if (preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $pass)) {
                $flag++;
            } else {

                $errors['pass'] ='Plz enter correct password';
            }
        } else {
            $errors['pass_size'] = 'Plz enter password min 5 max10';
        }
    } else {
        $errors['pass_empty']= 'Plz enter password';
    }
    if($flag==4){
        header('location:login.php');
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
                <?=$error?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">

        <h1>Register</h1>


        <input type="text" name="UserName" id=""  >userName
        <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?=$error?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

        <br>
        <input type="email" name="email" id="" >Email
        <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?=$error?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
        <br>
    
        <input type="password" name="password" id="" >Password
        <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?=$error?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
        <br>
        
        <input type="file" name="image" id="" >
        <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?=$error?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

        <button>
            Login
        </button>
    </form>
</body>

</html>