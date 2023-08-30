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

      /*   $coName      = $_POST['companyname'];
         $adminId     = $_SESSION['MintId'];
         $contact     = $_POST['contactperson']; 
         $mobile      = $_POST['mobileno']; 
         $phno        = $_POST['phoneno'];
         $email       = $_POST['email'];
         $serTax      = $_POST['servicetax']; 
         $gst         = $_POST['gst']; 
         $cst         = $_POST['cst'];
         $pan         = $_POST['pan'];
         $state       = $_POST['stateid']; 
         $city        = $_POST['cityid']; 
         $area        = $_POST['areaid']; 
         $address     = $_POST['address1']; 
         $pincode     = $_POST['postcode']; 
         $date        = date("Y-m-d");
         $datetime    = date("Y-m-d H:i:s");

*/

         if($_REQUEST['action'] == "Add"){

  


$insert_reter = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "retreading_id"            =>     mysqli_real_escape_string($data->con, $_POST['retid']),  
      "vnum"     =>     mysqli_real_escape_string($data->con, $_POST['vechno']), 
      "tyre_code"          =>     mysqli_real_escape_string($data->con, $_POST['tyre_code']), 
      "route_from"           =>     mysqli_real_escape_string($data->con, $_POST['routefrom']), 
      "route_to"           =>     mysqli_real_escape_string($data->con, $_POST['routeto']), 
      "travels_name"    =>     mysqli_real_escape_string($data->con, $_POST['travels']), 
      "km_retreading"           =>     mysqli_real_escape_string($data->con, $_POST['km']), 
      "date_from"           =>     mysqli_real_escape_string($data->con, $_POST['dfrom']), 
      "date_to"           =>     mysqli_real_escape_string($data->con, $_POST['dto']), 
      "com_retreading"           =>     mysqli_real_escape_string($data->con, $_POST['com_rtd']), 
      "price"            =>     mysqli_real_escape_string($data->con, $_POST['rt_price'])
      
      
      );  
       $insid = $data->insert('tyre_retreading', $insert_reter);
      
 

   if($insid){

    echo '<script> alert("Retreading Added Successfully");window.location.assign("addtyre_retreading.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_reter = array(
     "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "retreading_id"            =>     mysqli_real_escape_string($data->con, $_POST['retid']),  
      "vnum"     =>     mysqli_real_escape_string($data->con, $_POST['vechno']), 
      "tyre_code"          =>     mysqli_real_escape_string($data->con, $_POST['tyre_code']), 
      "route_from"           =>     mysqli_real_escape_string($data->con, $_POST['routefrom']), 
      "route_to"           =>     mysqli_real_escape_string($data->con, $_POST['routeto']), 
      "travels_name"    =>     mysqli_real_escape_string($data->con, $_POST['travels']), 
      "km_retreading"           =>     mysqli_real_escape_string($data->con, $_POST['km']), 
      "date_from"           =>     mysqli_real_escape_string($data->con, $_POST['dfrom']), 
      "date_to"           =>     mysqli_real_escape_string($data->con, $_POST['dto']), 
      "com_retreading"           =>     mysqli_real_escape_string($data->con, $_POST['com_rtd']), 
      "price"            =>     mysqli_real_escape_string($data->con, $_POST['rt_price'])
      
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('tyre_retreading', $update_reter, $update_id);
      if($insid){

    echo '<script> alert("Retreading Altered Successfully");window.location.assign("addtyre_retreading.php");</script>';
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

    $insid = $data->select_where('tyre_retreading', $update_id);
 }

  if($_REQUEST['flag'] == "Delete"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->delete_where('tyre_retreading', $update_id);
echo '<script> alert("Tyre Retreading Deleted Successfully");window.location.assign("addtyre_retreading.php");</script>';
 }

?> 

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Tyre Retreading </h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" >
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-9">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Tyre Retreading</h6>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          vechno: "required",
          rt_price: "required",                                          
            },
        messages: {
          vechno: "Please enter your Vehicle Number",
          rt_price: "Please enter Price",                                 
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
                                            
                                                
                                                    <label class="col-md-4 form-control-label">Retreading Id:</label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input class="form-control" data-val="true" placeholder="Enter Retreading Id" id="retid" maxlength="100" name="retid" type="text" value="<?php echo $insid[0]['retreading_id']; ?>" >
                                                    <span class="field-validation-valid font-red" data-valmsg-for="retid" data-valmsg-replace="true"></span>
                                             
                                     
                                            </div>
                                        </div>


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
                                            
                                                
                                                    <label class="col-md-4 form-control-label">Tyre Code:</label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input class="form-control" data-val="true" placeholder="Enter Tyre Code" id="tyre_code" maxlength="100" name="tyre_code" type="text" value="<?php echo $insid[0]['tyre_code']; ?>" >
                                                    <span class="field-validation-valid font-red" data-valmsg-for="tyre_code" data-valmsg-replace="true"></span>
                                             
                                     
                                            </div>
                                        </div>

                                         <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Route From:</label>
                                                    <div class="col-sm-4 mg-t-10 mg-sm-t-5">
                                                        <input class="form-control" data-val="true" placeholder="Enter Route From" id="routefrom" maxlength="100" name="routefrom" type="text" value="<?php echo $insid[0]['route_from']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="routefrom" data-valmsg-replace="true"></span>
                                                   
                                            </div>

                                                <div class="col-sm-4 mg-t-10 mg-sm-t-5">
                                                        <input class="form-control" data-val="true" placeholder="Enter Route To" id="routeto" maxlength="100" name="routeto" type="text" value="<?php echo $insid[0]['route_to']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="routeto" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>

                                         <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Travels Name:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" placeholder="Enter Travels Name" id="travels" maxlength="100" name="travels" type="text" value="<?php echo $insid[0]['travels_name']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="travels" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>



                                           <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Km of Retreading :</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" placeholder="Enter Retreading" id="km" maxlength="100" name="km" type="text" value="<?php echo $insid[0]['km_retreading']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="contactperson" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>


                                        <div class="row mg-t-10">
                                            
                                                   <label class="col-md-4 form-control-label">Date From:</label>
                                                        <div class="col-sm-4 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" name="dfrom" id="datepicker002" type="text" value="<?php if($insid[0]['perValDte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['date_from']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>


                                                         <div class="col-sm-4 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" name="dto" id="datepicker002" type="text" value="<?php if($insid[0]['perValDte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['date_to']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>
                                        </div>
                             
                                         
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Company Retreading:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" placeholder="Enter Retreading" id="com_rtd" maxlength="100" name="com_rtd" type="text" value="<?php echo $insid[0]['com_retreading']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="contactperson" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                     

                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">price:<p style="color: red;">*</p></label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control emp_val" data-val="true" placeholder="Enter price" id="rt_price" maxlength="10" name="rt_price" type="text" value="<?php echo $insid[0]['price']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="rt_price" data-valmsg-replace="true"></span>
                                                   
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
                  <th class="wd-15p">vehicle No</th>
                  <th class="wd-15p"> Route From </th>
                  <th class="wd-10p">Route To</th>
                  <th class="wd-10p">Travels </th>
                   <th class="wd-20p">Price </th>
                   <th class="wd-20p">Action</th>                   
            
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                $sessid=$_SESSION['MintId'];
               $pinqry = mysqli_query($conn,"select * from  tyre_retreading where intAdminId ='$sessid'"); 
               
                while ($res = mysqli_fetch_array($pinqry)){ 
                 $retreading_id = $res['retreading_id'];
                 $vnum=$res['vnum'];
              
                 $id=$res['id'];  
                 $tyre_code=$res['tyre_code'];
                 $route_from=$res['route_from'];
                 $route_to=$res['route_to'];
                 $travels_name=$res['travels_name'];
                 $price=$res['price'];
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $res['vnum']; ?></td>
                  <td><?php echo $res['route_from']; ?></td>
                  <td><?php echo $res['route_to']; ?></td>
                  <td><?php echo $res['travels_name']; ?></td>
                
                  <td><?php echo $res['price']; ?></td>
                  

                  <td>
                   <a class="iconp" href="addtyre_retreading.php?id=<?php echo $id;?>&flag=Edit"><i class="icon ion-edit tx-16"></i></a>
<a  class="idelete iconp" href="addtyre_retreading.php?id=<?php echo $id;?>&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>
<!-- <a class="iconp" href="addtyre_retreading.php?id=<?php echo $id;?>&flag=View"><i class="icon ion-search tx-16"></i></a> -->
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

<!--       <script src="../lib/jquery/jquery.js"></script>
 -->    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
<!--     <script src="../lib/highlightjs/highlight.pack.js"></script>
 -->    <script src="../lib/datatables/jquery.dataTables.js"></script>
<!--     <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
 -->    <script src="../lib/select2/js/select2.min.js"></script> 

<!--      <script src="../js/amanda.js"></script> 
 -->         <script>
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "addtyre_retreading.php";
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
$('#rt_price').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#rt_price').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#rt_price').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>

    