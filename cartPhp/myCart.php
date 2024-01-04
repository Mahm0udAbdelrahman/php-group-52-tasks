<?php
session_start();
require_once "Layout/Header.php";
$total=0;

if (isset($_GET['empty'])) {
    unset($_SESSION['cart']);
}
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    foreach ($_SESSION['cart'] as $k => $port) {
        if ($id == $port['id']) {
            unset($_SESSION['cart'][$k]);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="fontawesome-free-6.5.1-web/svgs/solid">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>MY CART</h1>
            </div>
            <div class="col-lg-8">
                <td><a class='btn btn-sm btn-outline-danger empty' href="myCart.php?empty=1">Empty Cart</a></td>
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Product_Image</th>
                            <th scope="col">Product_Name </th>
                            <th scope="col">Product_Price</th>
                            <th scope="col">Quanity</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php if (isset($_SESSION["cart"])) : ?>

                            <?php foreach ($_SESSION["cart"] as $key => $value) : ?>

                                <tr>
                                    <th><img src="<?= $value['image'] ?>"></th>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['price'] ?></td>
                                    <td><?= $value['quen'] * $value['price'] ?></td>
                                    <!-- <td><input class='text-center' type'number' value='$value[Quantity]' min='1' max='10'></td> -->
                                    <td><a href="myCart.php?remove=<?= $value['id'] ?>" class='btn btn-sm btn-outline-danger'>Remove</a></td>

                                </tr>
                                <?php
                                $total = $total +  ($value['quen'] * $value['price']);
                                ?>
                                <tr>
                                    <td colspan="3" align="right">Total</td>
                                    <td align="right">$<?= $total ?></td>
                                </tr>
                                




                            <?php endforeach ?>
                        <?php endif ?>
                        

                    </tbody>
                </table>
                

            </div>
        </div>
    </div>
</body>

</html>