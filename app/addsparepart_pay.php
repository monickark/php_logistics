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
      "intAdminId"        =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "bill_no "          =>     mysqli_real_escape_string($data->con, $_POST['bill_num']),  
      "total"             =>     mysqli_real_escape_string($data->con, $_POST['total_spare']), 
      "paying_amount"     =>     mysqli_real_escape_string($data->con, $_POST['amount_pay']), 
      "amount_paid"       =>     mysqli_real_escape_string($data->con, $_POST['amount_paid']), 
      "balance"           =>     mysqli_real_escape_string($data->con, $_POST['bal_spare']), 
      "amount_collector"  =>     mysqli_real_escape_string($data->con, $_POST['amountcollec']), 
      "date"              =>     mysqli_real_escape_string($data->con, $_POST['date']), 
      "mop"               =>     mysqli_real_escape_string($data->con, $_POST['mode_of_pay'])
     
      
      );  
       $insid = $data->insert('sparepart_pay', $insert_company);
      
 

   if($insid){

    echo '<script> alert("Spare Part Addeed Successfully");window.location.assign("addsparepart_pay.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_company = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "bill_no "            =>     mysqli_real_escape_string($data->con, $_POST['bill_num']),  
      "total"     =>     mysqli_real_escape_string($data->con, $_POST['total_spare']), 
      "paying_amount"          =>     mysqli_real_escape_string($data->con, $_POST['amount_pay']), 
      "amount_paid"           =>     mysqli_real_escape_string($data->con, $_POST['amount_paid']), 
      "balance"           =>     mysqli_real_escape_string($data->con, $_POST['bal_spare']), 
      "amount_collector"    =>     mysqli_real_escape_string($data->con, $_POST['amountcollec']), 
      "date"           =>     mysqli_real_escape_string($data->con, $_POST['date']), 
      "mop"           =>     mysqli_real_escape_string($data->con, $_POST['mode_of_pay'])
     
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('sparepart_pay', $update_company, $update_id);
      if($insid){

    echo '<script> alert("Spare Part Altered Successfully");window.location.assign("addsparepart_pay.php");</script>';
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

    $insid = $data->select_where('sparepart_pay', $update_id);
 }
 if($_REQUEST['flag'] == "Delete"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->delete_where('sparepart_pay', $update_id);
echo '<script> alert("Spare Part Deleted Successfully");window.location.assign("addsparepart_pay.php");</script>';
 }

?> 

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Spare Part Payment</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" >
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          
           <div class="col-xl-9">
                  <h6 class="card-body-title">Payment</h6> 
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          bill_num: "required",
          total_spare: "required",
          amount_paid: "required",
           bal_spare: "required",
           amountcollec: "required",
           mode_of_pay: "required",                            
            },
        messages: {
          bill_num: "Please enter your Bill Number",
          total_spare: "Please enter a Total Amount", 
          amount_paid: "Please enter Amount paid",
          bal_spare: "Please enter a Balance",
           amountcollec: "Please enter a Amount Collector",
           mode_of_pay: "Please select a Mode of pay",               
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
               <div class="portlet-body">
                             
                                                    
                                                          <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Bill No:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Bill No" id="bill_num" maxlength="50" name="bill_num" type="text" value="<?php echo $insid[0]['bill_no']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>

                                                             <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Total :<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Total" id="total_spare" maxlength="15" name="total_spare" type="text" value="<?php echo $insid[0]['total']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                       
 <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Paying Amount:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Paying Amount" id="amount_pay" maxlength="15" name="amount_pay" type="text" value="<?php echo $insid[0]['paying_amount']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                        <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Amount Paid:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Amount Paid" id="amount_paid" maxlength="15" name="amount_paid" type="text" value="<?php echo $insid[0]['amount_paid']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                       
                                                       


                                                        <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Balance:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Balance" id="bal_spare" maxlength="15" name="bal_spare" type="text" value="<?php echo $insid[0]['balance']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="bal_spare" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 


                                                             <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Amount Collector:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Amount Collector" id="amountcollec" maxlength="50" name="amountcollec" type="text" value="<?php echo $insid[0]['amount_collector']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 

                                                              <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Date:<p style="color: red;">*</p></label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" name="date" id="datepicker002" type="text" value="<?php if($insid[0]['perValDte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['date']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>

                                                   <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">Mode Of  Payment:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select onChange="getdriver(this.value);"  name="mode_of_pay" id="mode_of_pay" class="form-control emp_val" >





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM pay_type");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['pay_type'];?>" <?php if($row['pay_type']==$insid[0]['state']) echo 'selected="selected"'; ?> ><?php echo $row['pay_type'];?></option>
<?php
}
?>
</select>
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>
                                                                
                                                            </div>
                                                        </div>



                                  </div>

                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" id="cancel">Cancel</button>
              </div>
<div></br></div>
                       <div class="col-xl-12">
                
               
               <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl No</th>
                  <th class="wd-15p"> Bill No</th>
                  <th class="wd-15p">Total </th>
                  <th class="wd-10p">Paying Amount</th>
                  <th class="wd-20p">Paid Amount </th> 
                   <th class="wd-20p">Balance Amount </th>
                   <th class="wd-20p">Action</th>                   
            
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                $sessid=$_SESSION['MintId'];
               $pinqry = mysqli_query($conn,"select * from  sparepart_pay where intAdminId ='$sessid'"); 
               
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
                  <td><?php echo $res['bill_no']; ?></td>
                  <td><?php echo $res['total']; ?></td>
                  <td><?php echo $res['paying_amount']; ?></td>
                  <td><?php echo $res['amount_paid']; ?></td>
                  <td><?php echo $res['balance']; ?></td>
                  

                  <td>
                   <a class="iconp" href="addsparepart_pay.php?id=<?php echo $id;?>&flag=Edit"><i class="icon ion-edit tx-16"></i></a>
<a  class="idelete iconp" href="addsparepart_pay.php?id=<?php echo $id;?>&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>
<!-- <a class="iconp" href="addsparepart_pay.php?id=<?php echo $id;?>&flag=View"><i class="icon ion-search tx-16"></i></a> -->
                </tr>
                <?php $i++;} ?>
                 
              </tbody>
            </table>
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

<!--      <script src="../lib/jquery/jquery.js"></script>
 -->    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
<!--     <script src="../lib/highlightjs/highlight.pack.js"></script>
 -->    <script src="../lib/datatables/jquery.dataTables.js"></script>
<!--     <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
 -->    <script src="../lib/select2/js/select2.min.js"></script>

<!--     <script src="../js/amanda.js"></script>  -->
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
$('#total_spare').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#total_spare').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#total_spare').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>

 <script>
$('#amount_paid').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#amount_paid').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#amount_paid').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>

 <script>
$('#bal_spare').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#bal_spare').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#bal_spare').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>

<script>
$('#amount_pay').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#amount_pay').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#amount_pay').val(this.value);
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
  window.location.href = "addsparepart_pay.php";
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