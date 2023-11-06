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
$temp="";
$tid=null;
$order_by=$_POST["order_by"];
$caller=$_POST["caller"];
$offset=($page-1)*$limit_per_page;
$input=$_POST['input'];
$sql="";
  if(is_numeric($input)){
    if($caller==1){
        $sql = "SELECT * FROM info where Sstate Like '%{$input}%' OR Sname Like '%{$input}%' OR Scity Like '%{$input}%' OR Bstate Like '%{$input}%' OR Bname Like '%{$input}%' OR Bcity Like '%{$input}%' OR Baddress Like '%{$input}%' OR Saddress Like '%{$input}%' OR Bzipcode=CAST({$input} AS SIGNED) OR Szipcode=CAST({$input} AS SIGNED) OR Saddresstype Like '%{$input}%' OR Baddresstype Like '%{$input}%' ORDER BY {$order_by} LIMIT {$offset},{$limit_per_page}";  
        $tid="u";    
    }else{
        $sql = "SELECT * FROM info where Sstate Like '%{$input}%' OR Sname Like '%{$input}%' OR Scity Like '%{$input}%' OR Bstate Like '%{$input}%' OR Bname Like '%{$input}%' OR Bcity Like '%{$input}%' OR Baddress Like '%{$input}%' OR Saddress Like '%{$input}%' OR Bzipcode=CAST({$input} AS SIGNED) OR Szipcode=CAST({$input} AS SIGNED) OR Saddresstype Like '%{$input}%' OR Baddresstype Like '%{$input}%' ORDER BY {$order_by} DESC LIMIT {$offset},{$limit_per_page}";
        $tid="l";
    }
    
  }else{
    if($caller==1){
      $sql = "SELECT * FROM info where Sstate Like '%{$input}%' OR Sname Like '%{$input}%' OR Scity Like '%{$input}%' OR Bstate Like '%{$input}%' OR Bname Like '%{$input}%' OR Bcity Like '%{$input}%' OR Baddress Like '%{$input}%' OR Saddress Like '%{$input}%'OR Saddresstype Like '%{$input}%' OR Baddresstype Like '%{$input}%' ORDER BY {$order_by} LIMIT {$offset},{$limit_per_page}"; 
      $tid="u";
    }else{
      $sql = "SELECT * FROM info where Sstate Like '%{$input}%' OR Sname Like '%{$input}%' OR Scity Like '%{$input}%' OR Bstate Like '%{$input}%' OR Bname Like '%{$input}%' OR Bcity Like '%{$input}%' OR Baddress Like '%{$input}%' OR Saddress Like '%{$input}%'OR Saddresstype Like '%{$input}%' OR Baddresstype Like '%{$input}%' ORDER BY {$order_by} DESC LIMIT {$offset},{$limit_per_page}"; 
      $tid="l";   
    }
    
  }
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){
    $output='<div id="mainDiv" >
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
      <th id="sbn">Bname</th>
      <th>Baddress</th>
      <th id="sbs">Bstate</th>
      <th id="sbc">Bcity</th>
      <th>Bzipcode</th>
      <th>Baddresstype</th>
      <th id="ssn">Sname</th>
      <th>Saddress</th>
      <th id="sss">Sstate</th>
      <th id="ssc">Scity</th>
      <th>Szipcode</th>
      <th>Saddresstype</th>
      <th>Edit</th>
      <th>Delete</th>
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
      <td><button type='button' class='btn btn-danger delete2' data-id={$c['id']}>Delete</button></td>
    </tr>";
    }
    $output.="</tbody>
    </table>
    </div></div>";
    if(is_numeric($input)){
      $temp = "SELECT * FROM info where Sstate Like '%{$input}%' OR Sname Like '%{$input}%' OR Scity Like '%{$input}%' OR Bstate Like '%{$input}%' OR Bname Like '%{$input}%' OR Bcity Like '%{$input}%' OR Baddress Like '%{$input}%' OR Saddress Like '%{$input}%' OR Bzipcode=CAST({$input} AS SIGNED) OR Szipcode=CAST({$input} AS SIGNED) OR Saddresstype Like '%{$input}%' OR Baddresstype Like '%{$input}%' ORDER BY {$order_by}";
    }else{
    $temp = "SELECT * FROM info where Sstate Like '%{$input}%' OR Sname Like '%{$input}%' OR Scity Like '%{$input}%' OR Bstate Like '%{$input}%' OR Bname Like '%{$input}%' OR Bcity Like '%{$input}%' OR Baddress Like '%{$input}%' OR Saddress Like '%{$input}%'OR Saddresstype Like '%{$input}%' OR Baddresstype Like '%{$input}%' ORDER BY {$order_by} DESC";  
    }
    $result2 = $conn->query($temp);
    $total_record=mysqli_num_rows($result2);
    $total_pages=ceil($total_record/$limit_per_page);
    $output.="<div class='text-center'><ul class='pagination' id={$tid}>";
    if($total_pages==1){
    
    }else{
      if($page==2){
        $tpage=$page-1;
        $output.="<li><a id='{$tpage}' href='#'> < </a></li>"; 
      }
      if($page>2){ 
        $output.="<li><a id='1' href='#'> << </a></li>"; 
        $tpage=$page-1;
        $output.="<li><a id='{$tpage}' href='#'> < </a></li>"; 
      } 
    if($total_pages>4){
      $start=1;
      $end=4;
      $start=$page-1;
      if($start==0){
        $start=1;
        $end=$start+3;
      }else{
        $start=$page-1;
        $end=$start+3;
        if($end>$total_pages){
          $end=$total_pages;
          $start=$end-3;
        }
      }
    }else{
      $start=1;
      $end=$total_pages;
    }
   
    for ($i=$start; $i<=$end; $i++) { 
      $output.= "<li><a class='active' href='#' id='{$i}'>{$i}</a></li>";
    }
    // Show next and last-page links. 
   if($page<$total_pages){ 
    $f=$page+1;
    $output.="<li><a href='#' id='{$f}'> > </a></li>"; 
    $output.="<li><a href='#' id={$total_pages}> >> </a></li>"; 
   }    
  }
    $output.="</ul></div>";
    echo $output;
  }else if($page>=2){
     echo $page-1;
  }else{
    $output='<div class="input-group" >
    <input type="text" class="form-control" id="mainInput" placeholder="Search">
    <div class="input-group-btn">
      <button class="btn btn-default" id="mainButton">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>';
    echo $output;
  }
  
?>                          