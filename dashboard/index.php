<?php require_once("./includers/route.php"); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bincom</title>
    <?php require("includers/cssFiles.php");  ?>
    
  
  </head>

  <body>
   

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
            
     
         <!-- Side Bar -->
         <?php include_once("includers/sidebar.php"); ?>


      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
             
        
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
                  <?php echo $msg; ?>
                    
                    <?php include($page); ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <?php include_once("includers/footer.php"); ?>
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    
    <div class="chat-windows"></div>
    
    <?php include_once("includers/jsFiles.php"); ?>

    <!-- <script src="../public/js/jquery.min.js"></script> -->
<script>
  
  // <!-- ============================================================== -->
  // <!-- will write jquery -->
  // <!-- ============================================================== -->
  $("document").ready(function(){

    $('#stateId').change(function(){

              var state_id = $(this).val() ;
              $.post("includers/route.php?get-lga",{state_id:state_id},function(res){
                    // alert(res);

                    if(res){
                      var lgaObject=JSON.parse(res);
                      $.each( lgaObject, function (key, value) {
                        $('#lgaId').append(`<option mytag="${value.lga_name}" value="${value.lga_id}">${ value.lga_name }</option>`);
                      
                      });
                    }
                  
              });

    });

    $('#lgaId').change(function() {
          var lga_id = $(this).val() ;
          var optionName = $('option:selected', this).attr('mytag');
           $('#pollName').html( optionName + ' Polling Unit');

          $.post("includers/route.php?get-lga-pollingunit",{lga_id:lga_id},function(res){
                    // alert(res);
                    if(res){
                      var pollingObject=JSON.parse(res);
                      // console.log(lgaObject[0]) ;
                      $.each( pollingObject, function (key, value) {

                        const newRowContent = `
                         <tr>

                              <td>${key+1}</td> 
                              <td>${value.polling_unit_number}</td>
                              <td>${value.polling_unit_name}</td>
                              <td>${value.polling_unit_description}</td>
                              <td>${value.entered_by_user}</td>
                              <td>${value.date_entered}</td>
                              <td>
                                <a href="#" class="btn btn-info btn-sm btn-block mt-2"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="#" onclick="" class="btn btn-danger btn-sm btn-block mt-2"><i class="fa fa-trash"></i> Delete</a>
                              </td>
                         </tr>

                         ` ;
                        $("#example1 tbody").append(newRowContent);
                      
                      });
                    }
                  
              });

    });


    $('#stateIdQ2').change(function(){

          var state_id = $(this).val() ;
          $.post("includers/route.php?get-lga",{state_id:state_id},function(res){
                // alert(res);
                if(res){
                  var lgaObject=JSON.parse(res);
                  $.each( lgaObject, function (key, value) {
                    $('#lgaIdQ2').append(`<option mytag="${value.lga_name}" value="${value.lga_id}">${ value.lga_name }</option>`);
                  
                  });
                }
              
          });

    });


    $('#lgaIdQ2').change(function() {
        var lga_id = $(this).val() ;
        
        $.post("includers/route.php?sum-lga-pollingunit",{lga_id:lga_id},function(res){ 
          // alert(res);
          if(res){
                      var pollingObject=JSON.parse(res);
                      // console.log(lgaObject[0]) ;
                      $.each( pollingObject, function (key, value) {

                        const newRowContent = `
                         <tr>

                              <td>${key+1}</td> 
                              <td>${value.polling_unit_name}</td>
                              <td>${value.sumtotal}</td>
                              <td>${value.entered_by_user}</td>
                              <td>${value.date_entered}</td>
                              <td>
                                <a href="#" class="btn btn-info btn-sm btn-block mt-2"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="#" onclick="" class="btn btn-danger btn-sm btn-block mt-2"><i class="fa fa-trash"></i> Delete</a>
                              </td>
                         </tr>

                         ` ;
                        $("#example1 tbody").append(newRowContent);
                      
                      });
                    }

        });


    }) ;










  });

 
</script>


  </body>

</html>
