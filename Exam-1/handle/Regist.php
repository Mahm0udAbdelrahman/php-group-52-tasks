<?php
session_start();
$all_errors = [];
$error_name = [];
$error_image = [];
$error_pass = [];
$flag = 0;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['User_name'])) {
        $name = $_POST['User_name'];
        $password = $_POST['pass'];
        // ================ User Name =============================
        if (!empty($name)) {
            if (strlen($name) > 3) {
                if (preg_match('/senior/', $name)) {
                    
                    $flag++;
                } else {
                    $error_name['preg_name'] = 'Plz enter in name senior';
                }
            } else {
                $error_name['len_name'] = 'Plz enter name more than 3';
            }
        } else {
            $error_name['empty_name'] = 'Plz enter name';
        }
        // ================ Password =============================
        if (!empty($password)) {
            if (strlen($password) > 3) {
                if (preg_match('@[A-Za-z]@', $password)) {
                    $flag++;
                } else {
                    $error_pass['preg_password'] = 'Plz enter in password senior';
                }
            } else {
                $error_pass['len_password'] = 'Plz enter password more than 3';
            }
        } else {
            $error_pass['empty_password'] = 'Plz enter password';
        }
        // ================ image =============================

        $allow_ext = ['png', 'jpg'];
        $img = $_FILES['image'];
        $name_img = uniqid() . $img['name'];
        $type_img = $img['type'];
        $tmp_img = $img['tmp_name'];
        $error_img = $img['error'];
        $size_img = $img['size'];
        
        $img_explode = explode('.', $name_img);
        $img_end_ext = end($img_explode);
        $img_ext = strtolower($img_end_ext);
        if ($error_img != 4) {
            if ($size_img < 2097152) {
                if (in_array($img_ext, $allow_ext)) {
                    if ($flag == 2) {
                        $conn = mysqli_connect('localhost', 'root', '', 'dashboard', 3306);
                        $stat = "insert into task(name, password, image) VALUES ('$name' ,'$password','$name_img')";
                        $quary = mysqli_query($conn, $stat);
                        move_uploaded_file($tmp_img, '../uploads/profile/' . $name_img);
                        header('location:../login.php');
                    }
                } else {
                    $error_image['type_img'] = 'Plz upload image type["png","jpg"]';
                }
            } else {
                $error_image['size_img'] = 'Plz upload image size  2G';
            }
        } else {
            if ($flag == 2) {
                $conn = mysqli_connect('localhost', 'root', '', 'dashboard', 3306);
                $stat = "insert into task(name, password) VALUES ('$name' ,'$password')";
                $quary = mysqli_query($conn, $stat);
                header('location:../login.php');
            
        }
        if ($flag != 2 && !empty($error_name)) {
            foreach ($error_name as $k => $val) {
                $_SESSION['error_name'][$K] = $val;
                header('location:../register.php');
            }
        }
        if ($flag != 2 && !empty($error_pass)) {
            foreach ($error_pass as $k => $val) {
                $_SESSION['error_pass'][$K] = $val;
                header('location:../register.php');
            }
        }
        if ($flag != 2 && !empty($error_image)) {
            foreach ($error_image as $k => $val) {
                $_SESSION['error_image'][$K] = $val;
                header('location:../register.php');
            }
        }
    }
}
}
