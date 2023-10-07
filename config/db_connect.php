<?php 

// connect to database
$conn = mysqli_connect('localhost', 'php', '12345', 'pizza_shop');

// check connection
if(!$conn){
 echo 'Connection error:' . mysqli_connect_error();
}
?>