<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db="prac";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$bi=$_POST['bid'];
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


$sql = "UPDATE info set Bname='{$bn}',Baddress='{$ba}',Bstate='{$bs}',Bcity='{$bc}',Bzipcode={$bz},Baddresstype='{$bt}',Sname='{$sn}',Saddress='{$sa}',Sstate='{$ss}',Scity='{$sc}',Szipcode={$sz},Saddresstype='{$st}' where id=$bi";

if($conn->query($sql) === TRUE) {
     echo 1;
   } else {
    echo 0;
   }

  

?>         

