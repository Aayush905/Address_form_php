<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db="prac";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  
$bn=$_POST['bnd'];
$ba=$_POST['bad'];
$bz=$_POST['bzd'];
$sn=$_POST['snd'];
$sa=$_POST['sad'];
$sz=$_POST['szd'];
$bs=$_POST['bsd'];
$ss=$_POST['ssd'];
$bc=$_POST['bcd'];
$sc=$_POST['scd'];
$bt=$_POST['btd'];
$st=$_POST['std'];  


$sql = "INSERT INTO info (Baddress,Baddresstype,Bcity,Bname,Bstate,Bzipcode,Saddress,Saddresstype,Scity,Sname,Sstate,Szipcode) VALUES ('{$ba}', '{$bt}', '{$bc}','{$bn}','{$bs}',$bz,'{$sa}','{$st}','{$sc}','{$sn}','{$ss}',$sz)";

if($conn->query($sql) === TRUE) {
     echo 1;
   } else {
    echo 0;
   }

  

?>         