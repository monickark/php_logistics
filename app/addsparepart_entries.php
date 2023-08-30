<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>
<?php
$data = new Basefunc;  
if(isset($_POST['submit'])){
   
         if($_REQUEST['action'] == "Add"){
  for($i=0; $i< count($_POST["name"]); $i++)  
      {
    $insert_sparepart = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "bill_no"         =>     mysqli_real_escape_string($data->con, $_POST['billnum']),  
      "supplier_name"   =>     mysqli_real_escape_string($data->con, $_POST['supplier']), 
      "invoice_no"     =>     mysqli_real_escape_string($data->con, $_POST['invoice']), 
      "dop"            =>     mysqli_real_escape_string($data->con, $_POST['date']), 
     "product_type"            =>     mysqli_real_escape_string($data->con, $_POST['product_type'][$i]), 
     "product_name"            =>     mysqli_real_escape_string($data->con, $_POST['name'][$i]), 
     "qty"            =>     mysqli_real_escape_string($data->con, $_POST['qty'][$i]), 
     "unit_price"            =>     mysqli_real_escape_string($data->con, $_POST['unit_price'][$i]), 
     "total_price"            =>     mysqli_real_escape_string($data->con, $_POST['total_price'][$i]), 
     "spare_total" => mysqli_real_escape_string($data->con, $_POST['gtotal'])  
      );  
      
      echo  $insid = $data->insert('sparepart_entires', $insert_sparepart);
      
 }
   if($insid){
    echo '<script> alert("Spare Part Addeed Successfully");window.location.assign("addsparepart_entries.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{
$update_sparepart = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "bill_no"         =>     mysqli_real_escape_string($data->con, $_POST['billnum']),  
      "supplier_name"   =>     mysqli_real_escape_string($data->con, $_POST['supplier']), 
      "invoice_no"     =>     mysqli_real_escape_string($data->con, $_POST['invoice']), 
      "dop"            =>     mysqli_real_escape_string($data->con, $_POST['date']), 
     "product_type"            =>     mysqli_real_escape_string($data->con, $_POST['product_type']), 
     "product_name"            =>     mysqli_real_escape_string($data->con, $_POST['name']), 
     "qty"            =>     mysqli_real_escape_string($data->con, $_POST['qty']), 
    "unit_price"            =>     mysqli_real_escape_string($data->con, $_POST['unit_price']), 
    "total_price"            =>     mysqli_real_escape_string($data->con, $_POST['total_price']) 
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );
       $insid = $data->update('sparepart_entires', $update_sparepart, $update_id);
      if($insid){
    echo '<script> alert("Company Altered Successfully");window.location.assign("viewcompany.php");</script>';
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
    $insid = $data->select_where('companies', $update_id);
 }
?> 
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Spare Part Master</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" >
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Spare Part Entries</h6>
                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          billnum: "required",
          supplier_name: "required",
          gtotal: "required",                                    
            },
        messages: {
          billnum: "Please enter your Bill Number",
          supplier_name: "Please enter a Total Amount", 
          gtotal: "Please enter Amount paid",                       
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
                                            
                                                
                                                    <label class="col-md-4 form-control-label"> Bill  Number:<p style="color: red;">*</p></label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input class="form-control" data-val="true" placeholder="Enter Company Name" id="billnum" maxlength="100" name="billnum" type="text" value="<?php echo $insid[0]['name']; ?>" >
                                                    <span class="field-validation-valid font-red" data-valmsg-for="companyname" data-valmsg-replace="true"></span>
                                              
                                     
                                            </div>
                                        </div>
                                        <?php
                                        $supplier="SELECT * FROM supplier WHERE status=1";
                                        $supp_conn=mysqli_query($conn,$supplier);
                                      
                                     ?>
                              <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">Supplier Name:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                <select   name="supplier_name" id="supplier_name" class="form-control" >
                                                                <option value="">Select</option>
                                                                <?php
                                                                            while($get_supp=mysqli_fetch_array($supp_conn)){
                                          $supplier_name=$get_supp['name']   
                                      
                                         ?>
  
                                     <option value="<?php echo $get_supp['name'];?>" <?php if($get_supp['name']==$insid[0]['supplier_name']) echo 'selected="selected"'; ?> ><?php echo $get_supp['name'];?></option>
<?php
}
?>
</select>
                              </div>
                           
                              </div>
                                         
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Invoice No:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" placeholder="Enter Invoice No" id="invoice" maxlength="100" name="invoice" type="text" value="<?php echo $insid[0]['contactName']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="contactperson" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                        
                                        
                                       
                                         <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Date of Purchase:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" name="date" id="datepicker002" type="text" value="<?php if($insid[0]['perValDte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['policyValDte']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
 <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="product_type[]" placeholder="Product Type" class="form-control name_list" /></td>  
                                         <td><input type="text" name="name[]"   id="name0" placeholder="Product Name" class="form-control name_list" /></td> 
                                         <td><input type="text" name="qty[]" id="qty0" placeholder="QTY" class="form-control name_list" /></td> 
                                          <td><input type="text" name="unit_price[]" id="unit_price0" placeholder="Unit Price" class="form-control name_list" onkeyup="item_price_calculation(0);" /></td>
                                           <td><input type="text" name="total_price[]" id="total_price0" placeholder="Total Price" class="form-control name_list" value="<?php echo $answer; ?>" /></td>
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
                               <!--  <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   -->
                          </div>
  <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Grand Total:<p style="color: red;">*</p></label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" placeholder="Enter Grand total" id="gtotal" maxlength="100" name="gtotal" type="text" value="<?php echo $insid[0]['spare_total']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="contactperson" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                        </div>
                                  
<div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>
                                  
                                        
                             </div>
                                    </div> 
           <div class="col-xl-6">
                                    </div>
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php 
      //include('../include/adminfooter.php'); ?> 
<!--     <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>
    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>
    <script src="../js/amanda.js"></script> -->
     <script>
     function getdistrict(val) {
  $.ajax({
  type: "POST",
  type: "POST",
  url: "get_district.php",
  data:'state_id='+val,
  success: function(data){ 
    $("#district-list").html(data);
  }
  });
}
$(document).ready(function(){   
      var i=1;  
      $('#add').click(function(){  
       
           var sathi =i;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="product_type[]" placeholder="produt Type" class="form-control name_list" /></td><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="qty[]" id="qty'+i+'" placeholder="QTY" class="form-control name_list" /></td><td><input type="text" name="unit_price[]" id="unit_price'+i+'" placeholder="Unit Price" class="form-control name_list" onkeyup="item_price_calculation('+i+');" /></td><td><input type="text" id="total_price'+i+'" name="total_price" placeholder="Total" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');      i++;  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 
        }); 
 
 function item_price_calculation(id)
{
  
 /*alert(id);
*/ var gtotal=0;
/*  var qty=parseFloat($(#qty).val());
  var unit_price=parseFloat($(#unit_price).val());
*/
  var qty =$("#qty"+id).val();  
var unit_price = parseFloat($("#unit_price"+id).val());
   
  var total_price = parseFloat(qty * unit_price);
 
  $("#total_price"+id).val(total_price);
   var gt =$("#total_price"+id).val();  
   
   gtotal=+gt;
    
  
grand_total(gtotal,gt)
}
function grand_total(g,gtotal,gt)
{
 
  /*$("#gtotal").val(g); */
 
   var g=0;
   if(g!=0){
      gtotals = parseFloat(val) + parseFloat(g);
   }
  alert(gtotals);
$("#gtotal").val(g); 
  /*var ids = $('#id').val().split(',');*/
/* 
  var gtotal = 0;
  
    if($("#gtotal"+val+"").val()!=0)
    {
      
      gtotal = parseFloat(gtotal) + parseFloat($("#gt"+val+"").val());
    }
  $("#gt").val(g);*/
}
</script>