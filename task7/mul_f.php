<?php
var_dump($_GET);
var_dump($_POST);
var_dump($_FILES);
// var_dump($_SERVER);
$errors = [];
$types_images = ['jpeg', 'jpg', 'png'];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_FILES['f_images'])) {
        if ($_FILES['f_images']['error'][0] != 4) {
            $file = $_FILES['f_images'];
            $name = $file['name'];
            $type = $file['type'];
            $tmp_name = $file['tmp_name'];
            $error = $file['error'];
            $size = $file['size'];
            $count = count($size);
            $doc = $_SERVER["DOCUMENT_ROOT"] . '/trianing/php-group-52-tasks/task7/image/';
            for ($i = 0; $i < $count; $i++) {
                $explode = explode('.', $name[$i]);
                $en = end($explode);
                $str = strtolower($en);
                if ($size[$i] < 2097152) {
                    if (in_array($str, $types_images)) {
                        move_uploaded_file($tmp_name[$i], $doc . 'profile/' . uniqid() . $name[$i]);
                    } else {
                        $errors['type_image'] = 'Plz upload file image png jpg jpeg';
                    }
                } else {
                    $errors["f_size$i"] = "plz chech  file size max 2 miga not $size[$i] on file name $name[$i]";
                }
            }
        }else {
            $errors['type_image'] = 'file empty';
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
    <form method="POST" enctype="multipart/form-data">
        <input type="file" multiple name="f_images[]">
        <button>submit</button>
    </form>
</body>

</html>