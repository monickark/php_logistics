<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>

<link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
<?php
$data = new Basefunc;  
if(isset($_POST['submit'])){


         if($_REQUEST['action'] == "Add"){

  


$insert_company = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "vnum"            =>     mysqli_real_escape_string($data->con, $_POST['vechno']),  
      "tyre_code"     =>     mysqli_real_escape_string($data->con, $_POST['tyrecode']), 
      "date_fxing"          =>     mysqli_real_escape_string($data->con, $_POST['dof']), 
      "km_fxing"           =>     mysqli_real_escape_string($data->con, $_POST['kmfix']), 
      "tyre_type"           =>     mysqli_real_escape_string($data->con, $_POST['tyretype'])

      
      );  
       $insid = $data->insert('tyre_maintan', $insert_company);
      
 

   if($insid){

    echo '<script> alert("Tyre Maintenance Added Successfully");window.location.assign("addtyre_maintance.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_company = array(
   "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "vnum"            =>     mysqli_real_escape_string($data->con, $_POST['vechno']),  
      "tyre_code"     =>     mysqli_real_escape_string($data->con, $_POST['tyrecode']), 
      "date_fxing"          =>     mysqli_real_escape_string($data->con, $_POST['dof']), 
      "km_fxing"           =>     mysqli_real_escape_string($data->con, $_POST['kmfix']), 
      "tyre_type"           =>     mysqli_real_escape_string($data->con, $_POST['tyretype'])
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('tyre_maintan', $update_company, $update_id);
      if($insid){

    echo '<script> alert("Tyre Maintenance Altered Successfully");window.location.assign("addtyre_maintance.php");</script>';
   } 
   else{
    echo '<script> alert("Error in Updating");</script>';
   }

}

  
}

 if($_REQUEST['flag'] == "Edit"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->select_where('tyre_maintan', $update_id);
 }

 if($_REQUEST['flag'] == "Delete"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->delete_where('tyre_maintan', $update_id);
echo '<script> alert("Tyre Maintenance Deleted Successfully");window.location.assign("addtyre_maintance.php");</script>';
 }


?> 

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Tyre Maintenance Master</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" >
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-9">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Tyre Maintenance</h6>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          vechno: "required",
          tyrecode: "required",                                          
            },
        messages: {
          vechno: "Please enter your Vehicle Number",
          tyrecode: "Please enter Tyre code",                                 
},
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

           if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          } 
        }, 
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-8" ).addClass( "has-error" ).removeClass( "has-success" );         },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-8" ).addClass( "has-success" ).removeClass( "has-error" );
           
        }
        
      } );  

  

});


$(window).on('load', function()  {
fetch_data();
});
</script>
                                          <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">vehicle Number:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select onChange="getdriver(this.value);"  name="vechno" id="vechno" class="form-control emp_val" >





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT distinct vechno FROM load_det ");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['vechno'];?>" <?php if($row['vechno']==$insid[0]['vnum']) echo 'selected="selected"'; ?> ><?php echo $row['vechno'];?></option>
<?php
}
?>
</select>
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>
                                                                
                                                            </div>
                                                        </div>
                                        <div class="row mg-t-10">
                                            
                                                
                                                    <label class="col-md-4 form-control-label">Tyre Code:<p style="color: red;">*</p></label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Tyre Code" id="tyrecode" maxlength="100" name="tyrecode" type="text" value="<?php echo $insid[0]['tyre_code']; ?>" >
                                                    <span class="field-validation-valid font-red" data-valmsg-for="tyrecode" data-valmsg-replace="true"></span>
                                             
                                     
                                            </div>
                                        </div>


                                        <div class="row mg-t-10">
                                            
                                                   <label class="col-md-4 form-control-label">Date of Fixing:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" name="dof" id="datepicker002" type="text" value="<?php if($insid[0]['perValDte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['date_fxing']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>
                                        </div>
                              <div class="row mg-t-10">

                              <label class="col-md-4 form-control-label">Km of Fixing:</label>
                              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                              <input class="form-control" data-val="true" placeholder="Enter Km" id="kmfix" maxlength="15" name="kmfix" type="text" value="<?php echo $insid[0]['km_fxing']; ?>">
                              <span class="field-validation-valid font-red" data-valmsg-for="address1" data-valmsg-replace="true"></span>



                              </div>
                              </div>
                                         
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Tyre Type:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" placeholder="Enter Tyre Type" id="tyretype" maxlength="100" name="tyretype" type="text" value="<?php echo $insid[0]['tyre_type']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="tyretype" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                     
                                       
                                   
                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" id="cancel">Cancel</button>
              </div>
                                                             
                                        
                             </div>
                             <div></br></div>
                             <div class="col-xl-12">
                
               
               <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl No</th>
                  <th class="wd-15p"> vehicle No</th>
                  <th class="wd-15p">Tyre Code </th>
                  <th class="wd-10p">Date Fixing</th>
                  <th class="wd-20p">Km Fixing </th> 
                   <th class="wd-20p">Tyre Type </th>
                   <th class="wd-20p">Action</th>                   
            
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                $sessid=$_SESSION['MintId'];
               $pinqry = mysqli_query($conn,"select * from  tyre_maintan where intAdminId ='$sessid'"); 
               
                while ($res = mysqli_fetch_array($pinqry)){ 
                 $bill_no = $res['bill_no'];
                 $total=$res['total'];
              
                 $id=$res['id'];  
                 $paying_amount=$res['paying_amount'];
                 $amount_paid=$res['amount_paid'];
                 $balance=$res['balance'];
                 $amount_collector=$res['amount_collector'];
                 $mop=$res['mop'];
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $res['vnum']; ?></td>
                  <td><?php echo $res['tyre_code']; ?></td>
                  <td><?php echo $res['date_fxing']; ?></td>
                  <td><?php echo $res['km_fxing']; ?></td>
                  <td><?php echo $res['tyre_type']; ?></td>
                  

                  <td>
                   <a class="iconp" href="addtyre_maintance.php?id=<?php echo $id;?>&flag=Edit"><i class="icon ion-edit tx-16"></i></a>
<a  class="idelete iconp" href="addtyre_maintance.php?id=<?php echo $id;?>&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>

                </tr>
                <?php $i++;} ?>
                 
              </tbody>
            </table>
          </div>
                       


                                    </div>

                                    </div> 







                                  </div>

        
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      </div>
      <?php 
  // include('../include/adminfooter.php'); ?> 

<!--    <script src="../lib/jquery/jquery.js"></script>
 -->    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
<!--     <script src="../lib/highlightjs/highlight.pack.js"></script>
 -->    <script src="../lib/datatables/jquery.dataTables.js"></script>
<!--     <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
 -->    <script src="../lib/select2/js/select2.min.js"></script>
<!-- 
    <script src="../js/amanda.js"></script>  -->
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
<script>
$('.emp_val').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/
  if(is_name){input.removeClass("invalid").addClass("valid");}
  else{input.removeClass("valid").addClass("invalid");}
});

</script>
 <style>
  input.invalid,select.invalid, textarea.invalid{
  border: 0.1px solid #d20505;
}
input.valid, textarea.valid{
  border-radius: 0 ;
}
</style>
    <script>
        $('#kmfix').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#kmfix').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#kmfix').val(this.value);
}

/*if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}*/


});

</script>
     <script>
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "addtyre_maintance.php";
/*  
document.location ("viewtransporter.php");*/
return false;
/*alert("whatt??");*/
}
else
{
    e.preventDefault();
}
});


</script>