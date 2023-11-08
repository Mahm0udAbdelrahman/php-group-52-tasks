<?php
session_start();
$errors = [];
$flag=0;
$username = null;
$username_error = null; 
$password = null;
$password_error = null;
$emaill = null;
$emaill_error = null;
$file = null;
$file_error = null;
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
            if ($size < 1234566) {
                $explode = explode('.', $name);
                $en = end($explode);
                $strlen = strtolower($en);
                if (in_array($strlen, $types)) {
                    move_uploaded_file($tmp_name, 'image/profile' . $name);
                    $flag++;
                } else {
                    $file_error = 'Plz upload file image png jpg jpeg';
                }
            } else {
                $file_error = "plz chech  file size max 2 miga ";
            }
        } else {
            $file_error = 'file empty';
        }
    }
    if (!empty($un)) {
        if (preg_match('@^[A-Z][a-z]@', $un)) {
            $flag++;
        } else {
            $username_error = 'Plz enter start name A-Z';
        }
    } else {
        $username_error = "Username field is empty";
        }

    if (!empty($emai)) {
        
        $username = $_POST['UserName'];
        $emailDomain = 'mahmoud.com';
        
        $email = $username . '@' . $emailDomain;
        
        
        $pattern = '/^\w+@\w+\.\w+$/';
        if (preg_match($pattern, $email)) {
            $flag++;
    
        } else {
            $emaill_error = 'Plz enter end email @mahmoud.com';
        }
        
    } else {
        $emaill_error = 'Plz enter email';
    }

    if (!empty($pass)) {
        if (strlen($pass) > 5 && strlen($pass) < 20) {
            if (preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $pass)) {
                $flag++;
            } else {

                $password_error = 'Plz enter correct password';
            }
        } else {
            $password_error = 'Plz enter password min 5 max10';
        }
    } else {
        $password_error = 'Plz enter password';
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
               
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">

        <h1>Register</h1>


        <input type="text" name="UserName" id=""  value="<?php echo $username; ?>">userName
        <?php if (!empty($username_error)) : ?>
        <p class="error username-error  alert alert-danger">
         <?php echo $username_error; ?>
      </p>
      <?php endif;?>

        <br>
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
        
        <input type="file" name="image" id="" value="<?php echo $file; ?>">
        <?php if (!empty($file_error)) : ?>
        <p class="error file-error  alert alert-danger">
      <?php echo $file_error; ?>
        </p>
        <?php endif;?>

        <button>
            Login
        </button>
    </form>
</body>

</html>