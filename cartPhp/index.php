<?php
session_start(); 
require_once "Layout/Header.php";
$flag=0;
$errors=[];

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
    if(isset($_POST['name_cat'])){
        $name=$_POST['name_cat'];
        $price=$_POST['price_cat'];
        if(!empty($name))
        {
            if(strlen($name) > 2){
                $flag++;
            }else{
            $errors['name_len']= "plz enter length product name from 3";

            }

        }else{
            $errors['name']= "plz enter product name";

        }
        if(!empty($price))
        {
            if(strlen($price) > 2){
                $flag++;
            }else{
            $errors['price_len']= "plz enter length product price from 3";

            }

        }else{
            $errors['price']= "plz enter product price";

        }
        $allow_ext = ['png', 'jpg' ,'jpeg'];
        $img = $_FILES['image_cat'];
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
                    $flag++;
                } else {
                    $errors['type_img'] = 'Plz upload image type["png","jpg"]';
                }
            } else {
                $errors['size_img'] = 'Plz upload image size  2G';
            }

            if ($flag == 3) {
                $conn = mysqli_connect('localhost', 'root', '', 'cartphp', 3306);
                $stat = "insert into products(name, price, image) VALUES ('$name' ,'$price','$name_img')";
                $quary = mysqli_query($conn, $stat);
                move_uploaded_file($tmp_img, 'uploads/profile/' . $name_img);
                header('location:index.php');
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
<div class="container" >
<form method="POST" enctype="multipart/form-data">
    <label for="exampleInputEmail1">Name</label>
    <input type="taxt" name="name_cat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name product">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    <label for="exampleInputPassword1">Price</label>
    <input type="text" name="price_cat" class="form-control" id="exampleInputPassword1" placeholder="Price">

    <label for="exampleInputPassword1">image</label>
    <input type="file" name="image_cat" class="form-control" id="exampleInputPassword1" placeholder="Password">
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>