<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db="prac";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $id=$_POST['state'];
  $cid=$_POST['city'];
  $sql = "SELECT * FROM cities where state_id=$id and id=$cid";  
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){
    $output= '<select class="form-control" id="state">';
    while($c=mysqli_fetch_array($result)){
      $output.="<option value={$c['id']} data-ct={$c['city']}>{$c['city']}</option>";
    }
    $output.="</select>";
    echo $output;
  }
?>                          