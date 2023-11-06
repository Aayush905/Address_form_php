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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      // var newParam1="any";
      // var newParam2="asc";
      // var newURL = window.location.pathname + '?field=' + newParam1 + '&direction=' + newParam2;
      // window.history.pushState({ path: newURL }, '', newURL);
     $(document).ready(function(){
      var turnebs=0;
      var delpage=1;
      var ab="";
      var semp1=null;
      var semp2=null;
      var semp3=null;
      var load=<?php
      if(isset($_GET["load"])){
        echo json_encode($_GET["load"]);
      }else{
        echo 0;
      }?>;
      
      var temp=<?php echo json_encode($_GET["direction"])?>;
      var temp2=<?php echo json_encode($_GET["order_by"])?>;
      if(load==0){
        if(temp=="default" && temp2=="any"){
        loadTable();
      }else if(temp=="asc" && temp2=="Bstate" ){
       loadTable5();
      }else if(temp=="desc" && temp2=="Bstate"){
        loadTable6();
      }else if(temp=="asc" && temp2=="Bname"){
        loadTable3();
      }else if(temp=="desc" && temp2=="Bname"){
        loadTable4();
      }else if(temp=="asc" && temp2=="Bcity"){
        loadTable7();
      }else if(temp=="desc" && temp2=="Bcity"){
        loadTable8();
      }else if(temp=="asc" && temp2=="Sname"){
        loadTable9();
      }else if(temp=="desc" && temp2=="Sname"){
        loadTable10();
      }else if(temp=="asc" && temp2=="Sstate"){
        loadTable11();
      }else if(temp=="desc" && temp2=="Sstate"){
        loadTable12();
      }else if(temp=="asc" && temp2=="Scity"){
        loadTable13();
      }else if(temp=="desc" && temp2=="Scity"){
        loadTable14();
      }
      }else if(load!=0){
        if(temp=="default" && temp2=="any"){
          ab=load;
          loadTable2();
        }else if(temp=="asc" && temp2=="Bstate"){
           ab=load;
           searchTable();
        }else if(temp=="desc" && temp2=="Bstate"){
          ab=load;
          searchTable2();
        }else if(temp=="asc" && temp2=="Bcity"){
           ab=load;
           searchTable3();
        }else if(temp=="desc" && temp2=="Bcity"){
          ab=load;
          searchTable4();
        }else if(temp=="asc" && temp2=="Bname"){
           ab=load;
           searchTable5();
        }else if(temp=="desc" && temp2=="Bname"){
          ab=load;
          searchTable6();
        }else if(temp=="asc" && temp2=="Sname"){
           ab=load;
           searchTable7();
        }else if(temp=="desc" && temp2=="Sname"){
          ab=load;
          searchTable8();
        }else if(temp=="asc" && temp2=="Sstate"){
           ab=load;
           searchTable9();
        }else if(temp=="desc" && temp2=="Sstate"){
          ab=load;
          searchTable10();
        }else if(temp=="asc" && temp2=="Scity"){
           ab=load;
           searchTable11();
        }else if(temp=="desc" && temp2=="Scity"){
          ab=load;
          searchTable12();
        }
      }

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
      // loadTable();  

//----SBS-------SBS------SBS---------SBS------SBS-------SBS-----------SBS--------------
    var turnsbs=0;
    $(document).on("click","#sbs",function(e){
      if(turnsbs==0){
        turnsbs=1;
        semp1="asc";
        semp2="Bstate";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnsbs,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable();
      }else{
        turnsbs=0;
        semp1="desc";
        semp2="Bstate";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable2(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnsbs,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable2();
      }

    });



    function searchTable(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:1,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }

        $(document).on("click","#u a",function(e){
           e.preventDefault();
           var page_id=$(this).attr("id");
           delpage=page_id;
           searchTable(page_id);
      });

        function searchTable2(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:0,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }

       
        $(document).on("click","#l a",function(e){
           e.preventDefault();
           var page_id=$(this).attr("id");
           delpage=page_id;
           searchTable2(page_id);
      });



//--SBC------SBC-------SBC-------SBC-------SBC------SBC-------SBC---SBC------------------------

    var turnsbc=0;
    $(document).on("click","#sbc",function(e){
      if(turnsbc==0){
        turnsbc=1;
        semp1="asc";
        semp2="Bcity";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable3(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnsbc,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable3();
      }else{
        turnsbc=0;
        semp1="desc";
        semp2="Bcity";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable4(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnsbc,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable4();
      }

    });



    function searchTable3(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:1,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }

        function searchTable4(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:0,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }      

       
//---SBN----SBN-----SBN-----SBN-----SBN------SBN-----SBN---SBN-----SBN----------

    var turnsbn=0;
    $(document).on("click","#sbn",function(e){
      if(turnsbn==0){
        turnsbn=1;
        semp1="asc";
        semp2="Bname";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable5(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnsbn,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable5();
      }else{
        turnsbn=0;
        semp1="desc";
        semp2="Bname";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable6(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnsbn,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable6();
      }

    });



    function searchTable5(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:1,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }

        function searchTable6(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:0,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }  

//--SSN----SSN------SSN------SSN-------SSN-------SSN--------SSN---------SSN------

    var turnssn=0;
    $(document).on("click","#ssn",function(e){
      if(turnssn==0){
        turnssn=1;
        semp1="asc";
        semp2="Sname";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable7(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnssn,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable7();
      }else{
        turnssn=0;
        semp1="desc";
        semp2="Sname";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable8(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnssn,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable8();
      }

    });

    function searchTable7(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:1,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }

        function searchTable8(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:0,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }  


//-SSS---SSS---SSS----SSS---SSS---SSS---SSS---SSS---SSS---SSS---SSS--SSS-------


    var turnsss=0;
    $(document).on("click","#sss",function(e){
      if(turnsss==0){
        turnsss=1;
        semp1="asc";
        semp2="Sstate";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable9(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnsss,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable9();
      }else{
        turnsss=0;
        semp1="desc";
        semp2="Sstate";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable10(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnsss,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable10();
      }

    });



    function searchTable9(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:1,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }

        function searchTable10(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:0,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }  


//-SSC---SSC---SSC----SSC----SSC----SSC----SSC----SSC-----SSC----SSC---SSC---SSC-\


    var turnssc=0;
    $(document).on("click","#ssc",function(e){
      if(turnssc==0){
        turnssc=1;
        semp1="asc";
        semp2="Scity";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable11(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnssc,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable11();
      }else{
        turnssc=0;
        semp1="desc";
        semp2="Scity";
        temp2=semp2;
        semp3=ab;
        var newURL = window.location.pathname + '?order_by=' + semp2 + '&direction=' + semp1 + '&load=' + semp3;
        window.history.pushState({ path: newURL }, '', newURL);
        function searchTable12(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:turnssc,order_by:semp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }
        searchTable12();
      }

    });



    function searchTable11(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:1,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }

        function searchTable12(page){
          $.ajax({
            url:"sanydefault.php",
            type:"POST",
            data:{input:ab,page_no:page,caller:0,order_by:temp2},
            success:function(response){
              $('#tab').html(response);
              $("#mainInput").val(ab);
            }
          })
        }  

//-----------------------------------------------------------------------------
      
      $(document).on("click","#pages a",function(e){
        
           e.preventDefault();
           var page_id=$(this).attr("id");
           delpage=page_id;
           loadTable(page_id);
      });
      $(document).on("click","#mainButton",function(){
        temp="default";
        temp2="any";
        var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
        window.history.pushState({ path: newURL }, '', newURL);
         ab=$("#mainInput").val();
         if(ab==""){
          var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
          window.history.pushState({ path: newURL }, '', newURL);
         $.ajax({
            url:"extract.php",
            type:"POST",
            success:function(response){
                delpage=1;
                $('#tab').html(response);
            }
        })
         }else{
          var temp3=ab;
          var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp + '&load=' + temp3;
          window.history.pushState({ path: newURL }, '', newURL);
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
           delpage=page_id;
           loadTable2(page_id);
      });
      
      var turnebn=0;
      $(document).on("click","#ebn",function(e){
           if(turnebn==0){
            temp="asc";
            temp2="Bname";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turnebn=1;
            function loadTable3(page){
              $.ajax({
              url:"bnameasc.php",
              type:"POST",
              data:{caller:"ebnA",page_no:page},
              success:function(response){
                $('#tab').html(response);
              } 
            })
            }
            loadTable3();
           }else{
            temp="desc";
            temp2="Bname";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turnebn=0;
            function loadTable4(page){
              $.ajax({
              url:"bnameasc.php",
              type:"POST",
              data:{caller:"ebnB",page_no:page},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }
            loadTable4();
           }
      });

          function loadTable3(page){
              $.ajax({
              url:"bnameasc.php",
              type:"POST",
              data:{caller:"ebnA",page_no:page},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }

      $(document).on("click","#ebnA a",function(e){
           e.preventDefault();
           var page_id=$(this).attr("id");
           delpage=page_id;
           loadTable3(page_id);
      });

      function loadTable4(page){
              $.ajax({
              url:"bnameasc.php",
              type:"POST",
              data:{caller:"ebnB",page_no:page},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }

      $(document).on("click","#ebnB a",function(e){
           e.preventDefault();
           var page_id=$(this).attr("id");
           delpage=page_id;
           loadTable4(page_id);
      });

      //--------------------------------------------------------------
      $(document).on("click","#ebs",function(e){
           if(turnebs==0){
            temp="asc";
            temp2="Bstate";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turnebs=1;
            // localStorage.setItem('order','asc');
            function loadTable5(page){
              $.ajax({
              url:"bstateasc.php",
              type:"POST",
              data:{caller:"ebsA",page_no:page},
              success:function(response){
                $('#tab').html(response);
              } 
            })
            }
            loadTable5();
           }else if(turnebs==1){
            temp="desc";
            temp2="Bstate";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turnebs=0;
            function loadTable6(page){
              $.ajax({
              url:"bstateasc.php",
              type:"POST",
              data:{caller:"ebsB",page_no:page},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }
            loadTable6();
           }
      });

          function loadTable5(page){
              $.ajax({
              url:"bstateasc.php",
              type:"POST",
              data:{caller:"ebsA",page_no:page},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }

      $(document).on("click","#ebsA a",function(e){
           e.preventDefault();
           var page_id=$(this).attr("id");
           delpage=page_id;
           loadTable5(page_id);
      });

      function loadTable6(page){
              $.ajax({
              url:"bstateasc.php",
              type:"POST",
              data:{caller:"ebsB",page_no:page},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }

      $(document).on("click","#ebsB a",function(e){
           e.preventDefault();
           var page_id=$(this).attr("id");
           delpage=page_id;
           loadTable6(page_id);
      });

  //-----------------------------------------------------------------
      var turnebc=0;
      $(document).on("click","#ebc",function(e){
           if(turnebc==0){
            temp="asc";
            temp2="Bcity";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turnebc=1;
            // localStorage.setItem('order','asc');
            function loadTable7(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:turnebc,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              } 
            })
            }
            loadTable7();
           }else if(turnebc==1){
            temp="desc";
            temp2="Bcity";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turnebc=0;
            // localStorage.setItem('order','desc');
            function loadTable8(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:turnebc,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }
            loadTable8();
           }
      });


      function loadTable7(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:1,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              } 
            })
            }

      $(document).on("click","#up a",function(e){
           e.preventDefault();
           var page_id=$(this).attr("id");
           delpage=page_id;
           loadTable7(page_id);
      });

      function loadTable8(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:0,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }

      $(document).on("click","#down a",function(e){
           e.preventDefault();
           var page_id=$(this).attr("id");
           delpage=page_id;
           loadTable8(page_id);
      });

      

//-ESN-----ESN-------ESN-------ESN-------ESN----ESN-----ESN----ESN---ESN------

      var turnesn=0;
      $(document).on("click","#esn",function(e){
           if(turnesn==0){
            temp="asc";
            temp2="Sname";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turnesn=1;
            // localStorage.setItem('order','asc');
            function loadTable9(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:turnesn,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              } 
            })
            }
            loadTable9();
           }else if(turnesn==1){
            temp="desc";
            temp2="Sname";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turnesn=0;
            function loadTable10(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:turnesn,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }
            loadTable10();
           }
      });


      function loadTable9(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:1,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              } 
            })
            }

      function loadTable10(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:0,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }

//--ESS---ESS---ESS---ESS---ESS---ESS----ESS---ESS---ESS---ESS---ESS---ESS----

      var turness=0;
      $(document).on("click","#ess",function(e){
           if(turness==0){
            temp="asc";
            temp2="Sstate";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turness=1;
            function loadTable11(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:turness,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              } 
            })
            }
            loadTable11();
           }else if(turness==1){
            temp="desc";
            temp2="Sstate";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turness=0;
            function loadTable12(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:turness,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }
            loadTable12();
           }
      });


      function loadTable11(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:1,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              } 
            })
            }

      function loadTable12(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:0,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }


//ESC-----ESC----ESC-----ESC----ESC-----ESC----ESC----ESC----ESC---ESC--ESC---

      var turnesc=0;
      $(document).on("click","#esc",function(e){
           if(turnesc==0){
            temp="asc";
            temp2="Scity";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turnesc=1;
            function loadTable13(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:turnesc,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              } 
            })
            }
            loadTable13();
           }else if(turnesc==1){
            temp="desc";
            temp2="Scity";
            var newURL = window.location.pathname + '?order_by=' + temp2 + '&direction=' + temp;
            window.history.pushState({ path: newURL }, '', newURL);
            turnesc=0;
            function loadTable14(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:turnesc,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }
            loadTable14();
           }
      });


      function loadTable13(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:1,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              } 
            })
            }

      function loadTable14(page){
              $.ajax({
              url:"banydefault.php",
              type:"POST",
              data:{caller:0,page_no:page,order_by:temp2},
              success:function(response){
                $('#tab').html(response);
              }
            })
            }

//-----------------------------------------------------------------------------

      $(document).on("click",".delete2",function(){
        var identity=$(this).data("id");
        ab=$("#mainInput").val();
        $.ajax({
          url:"delete.php",
          type:"POST",
          data:{idNo:identity},
          success:function(response){
            function loadTable2(page){
              $.ajax({
              url:"ajax-search.php",
              type:"POST",
              data:{input:ab,page_no:delpage},
              success:function(response){
               if(response==delpage-1){
                  delpage=delpage-1;
                  loadTable2();
               }else{
                 $('#tab').html(response);
                 $("#mainInput").val(ab);
               } 
             }
           })
         }
            loadTable2(); 
          }

       }) 
    })
      

      $(document).on("click",".delete",function(){
        var identity=$(this).data("id");
        ab=$("#mainInput").val();
        $.ajax({
          url:"delete.php",
          type:"POST",
          data:{idNo:identity},
          success:function(response){
            function loadTable(page){
               $.ajax({
               url:"extract.php",
               type:"POST",
               data:{page_no:delpage},
               success:function(response){
                if(response==delpage-1){
                   delpage=delpage-1;
                   loadTable();
                }else{
                  $('#tab').html(response);
                  $("#mainInput").val(ab);
                }
              }
          })
         }
            loadTable();
            }
        })

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