<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db="prac";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$identity=$_POST['idNo'];
$sql = "SELECT * FROM info where id={$identity}";  
$result = $conn->query($sql);
$c=mysqli_fetch_array($result);
$jsonData = json_encode($c);
header('Content-Type: application/json');
if(mysqli_num_rows($result)>0){
    echo $jsonData;
}
?>           



