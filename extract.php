<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db="prac";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$limit_per_page=10;
$page="";
if(isset($_POST["page_no"])){
  $page=$_POST["page_no"];
}else{
  $page=1;
}

$offset=($page-1)*$limit_per_page;

  $sql = "SELECT * FROM info LIMIT {$offset},{$limit_per_page}";  
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){
    $output='<div id="mainDiv">
    <div class="input-group">
      <input type="text" class="form-control" id="mainInput" placeholder="Search">
      <div class="input-group-btn">
        <button class="btn btn-default" id="mainButton">
          <i class="glyphicon glyphicon-search"></i>
        </button>
      </div>
    </div>';
    $output.='<div class="table-responsive">';
    $output.='<table class="table">';
    $output.='<thead>
    <tr>
      <th>#</th>
      <th>Bname</th>
      <th>Baddress</th>
      <th>Bstate</th>
      <th>Bcity</th>
      <th>Bzipcode</th>
      <th>Baddresstype</th>
      <th>Sname</th>
      <th>Saddress</th>
      <th>Sstate</th>
      <th>Scity</th>
      <th>Szipcode</th>
      <th>Saddresstype</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>'; 
    while($c=mysqli_fetch_array($result)){
      $output.="<tr>
      <td>{$c['id']}</td>
      <td>{$c['Bname']}</td>
      <td>{$c['Baddress']}</td>
      <td>{$c['Bstate']}</td>
      <td>{$c['Bcity']}</td>
      <td>{$c['Bzipcode']}</td>
      <td>{$c['Baddresstype']}</td>
      <td>{$c['Sname']}</td>
      <td>{$c['Saddress']}</td>
      <td>{$c['Sstate']}</td>
      <td>{$c['Scity']}</td>
      <td>{$c['Szipcode']}</td>
      <td>{$c['Saddresstype']}</td>
      <td><button type='button' class='btn btn-primary edit' data-id={$c['id']}>Edit</button></td>
    </tr>";
    }
    $output.="</tbody>
    </table>
    </div></div>";
    $temp="SELECT * FROM info";
    $result2 = $conn->query($temp);
    $total_record=mysqli_num_rows($result2);
    $total_pages=ceil($total_record/$limit_per_page);
    $output.='<div class="text-center"><ul class="pagination" id="pages">';
    for($i=1;$i<=$total_pages;$i++){
      $output.="<li><a class='active' id='{$i}' href='#'>{$i}</a></li>";
    }
    $output.="</ul></div>";
    echo $output;
  }else{
    echo "<h2>No Record Found.</h2>";
  }
?>                          