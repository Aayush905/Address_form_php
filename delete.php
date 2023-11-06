<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db="prac";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $id=$_POST['idNo'];
  $sql = "DELETE FROM info WHERE id='{$id}'";  
  $result = $conn->query($sql);
  if($conn->query($sql) === TRUE) {
    echo 1;
  } else {
   echo 0;
  }
?>                          