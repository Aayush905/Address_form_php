<!DOCTYPE html>
<html lang="en">
<head>  
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
  #success-message{
    background-color: #DEF1D8;
    color: green;
    font-weight: bold;
    padding: 10px;
    margin: 10px;
    display: none;
    position: absolute;
    border-radius: 5px;
    right: 15px;
    top: 15px;
  }
  #error-message{
    background-color: #EFDCDD;
    color: red;
    padding: 10px;
    font-weight: bold;
    margin: 10px;
    display: none;
    position: absolute;
    border-radius: 5px;
    right: 15px;
    top: 15px;
  }
</style>  
</head>
<body>
<div id="error-message"></div>
<div id="success-message"></div>
<div class="container">
  <h2>Billing Address</h2>
  <?php
  $x=null;
  ?>
  <form id="addForm">
    <div class="form-group">
      <label for="usr">Name:</label><br>
      <input type="text" class="form-control" id="ban">
    </div>
    <div class="form-group">
      <label for="usr">Address:</label><br>
      <input type="text" class="form-control" id="baa">
    </div>
    <div class="form-group">
    <label >State:</label>
      <select class="form-control" id="state">
      <?php
         $servername = "localhost";
         $username = "root";
         $password = "root";
         $db="prac"; 
  
      // Create connection
         $conn = new mysqli($servername, $username, $password,$db);
      // Check connection
         if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "SELECT * FROM states";
      $result = $conn->query($sql);
      while($c=mysqli_fetch_array($result)){
        ?>
      <option data-st="<?php echo $c['name'];?>" value="<?php echo $c['id'];?>"><?php echo $c['name']?>
      <?php } ?>
      </select> 
      </div>
      <div class="form-group">
      <label>City:</label>
      <select class="form-control" id="bac">
      </select>
     </div>
    <div class="form-group">
      <label >Zipcode:</label><br>
      <input type="number" class="form-control" id="baz">
    </div>
    <div>
    <label class="radio-inline" style="font-family: 'Montserrat', sans-serif; font-size: 15px;font-weight: bold;">
      <input type="radio" id="bar" value="Residential Address" name="optradio" checked>Residential Address
    </label>
    <label class="radio-inline" style="font-family: 'Montserrat', sans-serif;font-size: 15px;font-weight: bold;">
      <input type="radio" id="bao" value="Office Address" name="optradio">Office Address
    </label>
    </div>
  </form>
</div>
<div class="container">
  <h2>Shipping Address</h2>
  <div class="form-group">
  <label class="checkbox-inline" style="font-family: 'Montserrat', sans-serif; font-size: 15px;font-weight: 525;"><input type="checkbox" id="same"  value="">(Same as Billing Address)</label>
  </div>
  <form id="Forms">
    <div class="form-group">
      <label for="usr">Name:</label><br>
      <input type="text" class="form-control" id="san">
    </div>
    <div class="form-group">
      <label for="usr">Address:</label><br>
      <input type="text" class="form-control" id="saa">
    </div>
    <div class="form-group">
    <label >State:</label>      
    <select class="form-control" id="sas">
      <?php
      // Create connection
         $conn = new mysqli($servername, $username, $password,$db);
      // Check connection
         if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM states";
      $result = $conn->query($sql);
      while($a=mysqli_fetch_array($result)){
        ?>
      <option  data-st="<?php echo $a['name'];?>" value="<?php echo $a['id'];?>"><?php echo $a['name']?>
      <?php } ?> 
      </select>
      </div>
      <div class="form-group">
      <label>City:</label>
      <select class="form-control" id="sac">
      </select>
     </div>
    <div class="form-group">
      <label >Zipcode:</label><br>
      <input type="number" class="form-control" id="saz">
    </div>
    <div>
    <label class="radio-inline" style="font-family: 'Montserrat', sans-serif; font-size: 15px;font-weight: bold;">
      <input type="radio" value="Residential Address" name="optradio2" id="sara" checked>Residential Address
    </label>
    <label class="radio-inline" style="font-family: 'Montserrat', sans-serif;font-size: 15px;font-weight: bold;">
      <input type="radio" value="Office Address" name="optradio2" id="saoa" >Office Address
    </label>
    <br>
    <br>
    <button type="button" class="btn btn-primary" id="mybutton">Submit</button>
    <button type="button" class="btn btn-info" id="myrecords">Show Records</button>
    </div>
  </form>
</div>
  <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
  <script>
    var a=null;
    var c=null;
    $(document).ready(function(){

     $('#myrecords').click(function(){
      window.location.href = 'records.php';
     }) 

     $('#mybutton').click(function(){
         var bn=$('#ban').val();
         var ba=$('#baa').val();
         var bz=$('#baz').val();
         var sn=$('#san').val();
         var sa=$('#saa').val();
         var sz=$('#saz').val();
         var selectedOption = $('#state').find('option:selected');
         var bs = selectedOption.data('st');
         var selectedOption1 = $('#sas').find('option:selected');
         var ss = selectedOption1.data('st');
         var selectedOption2 = $('#bac').find('option:selected');
         var bc = selectedOption2.data('ct');
         var selectedOption3 = $('#sac').find('option:selected');
         var sc = selectedOption3.data('ct');
         var bt=$('input[name="optradio"]:checked').val();
         var st=$('input[name="optradio2"]:checked').val();

         if(bn=="" || ba=="" || bz=="" || sn=="" || sa=="" || sz==""){
          $('#error-message').html("All Fields are Required").slideDown();
          $('#success-message').slideUp();
         }else{
          $.ajax({
          url:"ajax-insert.php",  
          type:"POST",
          data:{bnd:bn,bad:ba,bzd:bz,snd:sn,sad:sa,szd:sz,bsd:bs,ssd:ss,bcd:bc,scd:sc,btd:bt,std:st},
          success:function(response){
            if(response==1){
              $('#addForm').trigger("reset");
              $('#Forms').trigger("reset");
              $('#success-message').html("Form is Successfully Submitted").slideDown();
              $('#error-message').slideUp();
              c=$('#sas').val();
              $.ajax({
               url: "ajax-shipping.php",
               type:"POST",
               data:{state:c},
               success : function(response){
               $('#sac').html(response);
              }
            })
            a=$('#state').val();
             $.ajax({
             url: "ajax-load.php",
             type:"POST",
             data:{state:a},
             success : function(response){
              $('#bac').html(response);
             }
            })
            }else{
              $('#error-message').html("Can't save Record").slideDown();
              $('#success-message').slideUp();
            }
          }
         })
         }
         
     });


      a=$('#state').val();
         $.ajax({
            url: "ajax-load.php",
            type:"POST",
            data:{state:a},
            success : function(response){
              $('#bac').html(response);
            }
         })
         c=$('#sas').val();
         $.ajax({
            url: "ajax-shipping.php",
            type:"POST",
            data:{state:c},
            success : function(response){
              $('#sac').html(response);
            }
         })   
      $('#state').click(function(){
         a=$('#state').val();
         $.ajax({
            url: "ajax-load.php",
            type:"POST",
            data:{state:a},
            success : function(response){
              $('#bac').html(response);
            }
         })
      });

      $('#state').change(function(){
         a=$('#state').val();
         $.ajax({
            url: "ajax-load.php",
            type:"POST",
            data:{state:a},
            success : function(response){
              $('#bac').html(response);
            }
         })
      });


      $('#sas').click(function(){
         c=$('#sas').val();
         $.ajax({
            url: "ajax-shipping.php",
            type:"POST",
            data:{state:c},
            success : function(response){
              $('#sac').html(response);
            }
         })
      });



      $('#sas').change(function(){
         c=$('#sas').val();
         $.ajax({
            url: "ajax-shipping.php",
            type:"POST",
            data:{state:c},
            success : function(response){
              $('#sac').html(response);
            }
         })
      });


      $('#same').click(function(){
         if($('#same').prop("checked")){
           var name= $('#ban').val();
           $('#san').val(name);

           var add= $('#baa').val();
           $('#saa').val(add);
           var zip=$('#baz').val();
           $('#saz').val(zip);
           var statev=$('#state').val();
           $('#sas').val(statev);

           var cit=$('#bac').val();

           c=$('#sas').val();
           $.ajax({
            url: "ajax-same.php",
            type:"POST",
            data:{state:c,city:cit},
            success : function(response){
              $('#sac').html(response);
            }
         })   

          //  var city=$('#bac').val();
          //  $('#sac').val(city);


           if($('input[name="optradio"]:checked').val()=="Residential Address"){
            $('#sara').prop('checked', true);
           }else{
            $('#saoa').prop('checked', true);
           }
         }else{
          $('#san').val("");  
          $('#saa').val("");
          $('#saz').val("");
          $('#sas').val(1);


          c=$('#sas').val();
            $.ajax({
            url: "ajax-shipping.php",
            type:"POST",
            data:{state:c},
            success : function(response){
              $('#sac').html(response);
            }
         })   


          $('#sara').prop('checked', true);
         }
      });
      $('#ban').click(function(){
        if($('#same').prop("checked")){
          $('#ban').on('input', function() {
                // Get the value of the first text box
                var textValue = $(this).val();
                
                // Set the value of the second text box to match the first one
                $('#san').val(textValue);
      });
      }
      });


      $('#baa').click(function(){
        if($('#same').prop("checked")){
          $('#ban').on('input', function() {
                // Get the value of the first text box
                var textValue = $(this).val();
                
                // Set the value of the second text box to match the first one
                $('#saa').val(textValue);
      });
      }
      });


      $('#baa').click(function(){
        if($('#same').prop("checked")){
          $('#baa').on('input', function() {
                // Get the value of the first text box
                var textValue = $(this).val();
                
                // Set the value of the second text box to match the first one
                $('#saa').val(textValue);
      });
      }
      });

      $('#baz').click(function(){
        if($('#same').prop("checked")){
          $('#baz').on('input', function() {
                // Get the value of the first text box
                var textValue = $(this).val();
                
                // Set the value of the second text box to match the first one
                $('#saz').val(textValue);

                
      });
      }
      });


      $('#state').click(function(){
        if($('#same').prop("checked")){
                // Get the value of the first text box
                var Value = $('#state').val();
                
                // Set the value of the second text box to match the first one
                $('#sas').val(Value);

               c=$('#sas').val();
               $.ajax({
               url: "ajax-shipping.php",
               type:"POST",
               data:{state:c},
               success : function(response){
               $('#sac').html(response);
             }
         })   
      }
      });

      $('#bac').click(function(){
        if($('#same').prop("checked")){
          
          var cit=$('#bac').val();

           c=$('#sas').val();
           $.ajax({
            url: "ajax-same.php",
            type:"POST",
            data:{state:c,city:cit},
            success : function(response){
              $('#sac').html(response);
            }
         })   
        }
      });


      $('#bac').change(function(){
        if($('#same').prop("checked")){
          
          var cit=$('#bac').val();

           c=$('#sas').val();
           $.ajax({
            url: "ajax-same.php",
            type:"POST",
            data:{state:c,city:cit},
            success : function(response){
              $('#sac').html(response);
            }
         })   
        }
      });


      $('input[name="optradio"]').click(function(){
        if($('#same').prop("checked")){
          if($('input[name="optradio"]:checked').val()=="Residential Address"){
            $('#sara').prop('checked', true);
           }else{
            $('#saoa').prop('checked', true);
           }
        }
      });


      
    });
  </script>
</body>
</html>
