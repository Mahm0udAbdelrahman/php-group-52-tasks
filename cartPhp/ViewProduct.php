<?php
session_start(); 
require_once "Layout/Header.php";
$conn = mysqli_connect('localhost', 'root', '', 'cartphp', 3306);
$stat = "select * from products";
$quary = mysqli_query($conn, $stat);
$rowcount=mysqli_num_rows($quary);


if(isset($_POST['Add_cart'])){
    $_SESSION['cart'][]=array(
        'id'=> rand(100,1000),
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'quen' => $_POST['quen'],
        'image' => $_POST['image']
    );
}
if(isset($_POST['Delete'])){
  $stat_del = "delete from products where id = $_POST[Delete]";
    $quaary = mysqli_query($conn, $stat_del);
    header('location:ViewProduct.php');   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="fontawesome-free-6.5.1-web/svgs/solid">
</head>
<body>
  

    
         

<div class="container  " >
  <div class="card-group  ">
    <?php if($rowcount > 0)  : ?>
        <?php while($rows= mysqli_fetch_assoc($quary)) : ?>
<form action="ViewProduct.php" method="POST">
    <div class="card mt-2 me-3" >
      <img src="uploads/profile/<?=$rows['image']?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?=$rows['name']?></h5>
        <p class="card-text"><?=$rows['price']?></p>
        <form method="post">
        <input type='number' name="quen" value='1' min='1' max='10' placeholder="Quentity" required>
        <input type="hidden" name="image" value="uploads/profile/<?=$rows['image']?>" placeholder="iamge" required>
        <input type="hidden" name="name"  value="<?=$rows['name']?>" placeholder="name" required>
        <input type="hidden" name="price" value="<?=$rows['price']?>" placeholder="price" required>
    <button type="submit" name="Add_cart" class="btn btn-primary">Add To Cart</button>
    </form>
    <a href="update.php?update=<?=$rows['id']?>" type="submit" name="Add_cart" class="btn btn-primary">Updata</a>
    <form method="post">
    <input type="hidden" name="Delete" value="<?=$rows['id']?>" >
    <button type="submit" class="btn btn-danger"  onclick="if(!confirm('Are you sure?')){return false}" id="delete"><span>Deleta</span></button>
    </form>    
  </div>
    </div>
      </form>
  <?php endwhile; ?>
<?php endif; ?>
  
</div>
</div>
</body>
</html>
