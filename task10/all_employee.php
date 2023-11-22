<?php
$connect = mysqli_connect('localhost','root','','task_eleven',3306);
$stat = 'SELECT * FROM employees';
$excute = mysqli_query($connect , $stat);

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
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First_Name</th>
      <th scope="col">Last_Name</th>
      <th scope="col">Email</th>
      <th scope="col">Salary</th>
      <th scope="col">Gender</th>
    </tr>
  </thead>
  <tbody>
   <?php while($row=mysqli_fetch_assoc($excute)) : ?> 
    <tr>
      <th scope="row"><?=$row['employee_id']?></th>
      <td><?=$row['first_name']?></td>
      <td><?=$row['last_name']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['salary']?></td>
      <td><?=$row['gender']?></td>
</tr>
<?php endwhile ?>
  </tbody>
</table>
</body>
</html>