<!DOCTYPE html>
<html lang="en">
<head>
<title>Records</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  <div id="tab">
    </div>
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
    <script>
     $(document).ready(function(){
      function loadTable(page){
        $.ajax({
            url:"extract.php",
            type:"POST",
            data:{page_no:page},
            success:function(response){
                $('#tab').html(response);
            }
        })
      }
      loadTable();    
      var ab="";
      $(document).on("click","#pages a",function(e){
           e.preventDefault();
           var page_id=$(this).attr("id");
           loadTable(page_id);
      });
      $(document).on("click","#mainButton",function(){
         ab=$("#mainInput").val();
         if(ab==""){
          $.ajax({
            url:"extract.php",
            type:"POST",
            success:function(response){
                $('#tab').html(response);
            }
        })
         }else{
          function loadTable2(page){
          $.ajax({
            url:"ajax-search.php",
            type:"POST",
            data:{input:ab,page_no:page},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        loadTable2();    
         }
      })  

      function loadTable2(page){
          $.ajax({
            url:"ajax-search.php",
            type:"POST",
            data:{input:ab,page_no:page},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }

        $(document).on("click","#mypage a",function(e){
           e.preventDefault();
           var page_id=$(this).attr("id");
           loadTable2(page_id);
      });
        

      var myobj=null;

      $(document).on("click",".edit",function(){
        var identity=$(this).data("id");
        
       $.ajax({
        url:"get-details.php",
        type:"POST",
        data:{idNo:identity},
        success:function(response){
          myobj=response;
          var key1 = myobj.id;
          var key2 = myobj.Szipcode;
          var key3 = myobj.Sstate;
          var key4 = myobj.Sname;
          var key5 = myobj.Scity;
          var key6 = myobj.Saddresstype;
          var key7 = myobj.Bzipcode;
          var key8 = myobj.Bstate;
          var key9 = myobj.Bname;
          var key10 = myobj.Bcity;
          var key11= myobj.Baddresstype;
          var key12= myobj.Baddress;
          var key13= myobj.Saddress;
          var encodedData = "key1=" + encodeURIComponent(key1) + "&key2=" + encodeURIComponent(key2) + "&key3=" + encodeURIComponent(key3) + "&key4=" + encodeURIComponent(key4) + "&key5=" + encodeURIComponent(key5) + "&key6=" + encodeURIComponent(key6) + "&key7=" + encodeURIComponent(key7) + "&key8=" + encodeURIComponent(key8) + "&key9=" + encodeURIComponent(key9) + "&key10=" + encodeURIComponent(key10) + "&key11=" + encodeURIComponent(key11) + "&key12=" + encodeURIComponent(key12) + "&key13=" + encodeURIComponent(key13);
          window.location.href = "ajax-edit.php?" + encodedData;
        }
       })
      })  
     })
     </script>
</body>
</html>