<?php

$conn = mysqli_connect('localhost', 'root', '', 'dashboard');
$stat = "insert into task(name, password, type) VALUES ('admin' ,'admin123','admin')";
$quary = mysqli_query($conn, $stat);
?>