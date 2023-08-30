<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); 
require('../include/basefunctions.php');
?> 
<?php
$dat = new Basefunc;  
if(isset($_POST['submit']))
{

$date_rep = str_replace('/', '-', $_POST['voucher_date']);

       $newDate = date("Y-m-d", strtotime($date_rep));
$amount=$_POST['amount'];
$paid=$_POST['comp_bank_det'];
$to=$_POST['ledger_id'];
$narration=$_POST['voucher_type'];
/*echo '<script>alert("'.$amount.'");</script>';
echo '<script>alert("'.$paid.'");</script>';
echo '<script>alert("'.$to.'");</script>';
echo '<script>alert("'.$narration.'");</script>';*/

  $findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='1' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);
$insert_hire = array(  
     "entrytype_id"    =>     mysqli_real_escape_string($dat->con, '1'),
     "number"          =>     mysqli_real_escape_string($dat->con, $nos['number']+1),
     "date"            =>     mysqli_real_escape_string($dat->con, $newDate),  
     "dr_total"        =>     mysqli_real_escape_string($dat->con, $amount),
     "cr_total"        =>     mysqli_real_escape_string($dat->con, $amount),
     "narration"       =>     mysqli_real_escape_string($dat->con, $narration)
        );  
 $insstat = $dat->insert('entries', $insert_hire);
/*$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='".$paid."';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);*/
$insert_p1= array(  
     "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
     "ledger_id"     =>     mysqli_real_escape_string($dat->con, $paid),
     "amount"        =>     mysqli_real_escape_string($dat->con, $amount),  
     "dc"            =>     mysqli_real_escape_string($dat->con, 'D')
     );  
      $insst1 = $dat->insert('entryitems', $insert_p1);
  /*$driver =mysqli_query($conn,"SELECT* FROM drivers WHERE id ='".$_POST['loaddriver']."';" );
$dri=mysqli_fetch_assoc($driver);*/
/*$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='".$to."'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);*/
$insert_p2= array(  
     "entry_id"        =>     mysqli_real_escape_string($dat->con, $insstat),
     "ledger_id"       =>     mysqli_real_escape_string($dat->con, $to),
     "amount"          =>     mysqli_real_escape_string($dat->con, $amount),  
     "dc"              =>     mysqli_real_escape_string($dat->con, 'C')
     );  
      $insst2 = $dat->insert('entryitems', $insert_p2);

             







}

?> 
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Voucher Creation</h5>              
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
                     <div class="portlet-body">
                                          <h6 class="card-body-title">Receipt Voucher</h6>

                                          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
//alert("hi");
$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          amount: "required",
           ledger_id: "required",
            comp_bank_det: "required"
    
     
          
          },
        messages: {
          amount: "Please enter your amount",
          ledger_id: "Please select the paid details",
           comp_bank_det: "Please select the paid to details"
         
     
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
          $( element ).parents( ".col-sm-8" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-8" ).addClass( "has-success" ).removeClass( "has-error" );
        }
        
      } );  

  

});


$(window).on('load', function()  {
fetch_data();
});
</script>
                       <!--                        <div class="row mg-t-10">
                                                  <label class="col-md-4 form-control-label">Voucher Number :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                         <?php
 $pinqry = mysqli_query($conn,"SELECT id FROM recipt_voucher ORDER BY id DESC LIMIT 1 "); 
                $res = mysqli_fetch_assoc($pinqry);
                if($res['id']==0)
                {
$val=1;
                }
else
{
  $val=$res['id']+1;
}
?>
<input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter " id="voucher_id" maxlength="200" name="voucher_id" type="text" value="<?php
if($_REQUEST['flag'] == "Edit"){
  echo $insid[0]['id'];
}
else
{
  echo $val;
} ?>" readonly>
<span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                              </div>
                                            </div> --> 
                                        <div class="row mg-t-20">
              <label class="col-md-4 form-control-label"> Date :<p style="color: red;">*</p></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input class="form-control datepicker" placeholder="Cash Date" name="voucher_date" id="datepicker" type="text" value="<?php if($_REQUEST['flag'] == "Edit"){
$date_rep = str_replace('-', '/', $insid[0]['ent_date']);
       $newDate = date("d/m/Y", strtotime($date_rep));
  echo $newDate;
}
else
{
  echo date('d/m/Y');

}
  ?>" data-date-format="dd/mm/yyyy" >
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>
            </div>   
                                               <div class="row mg-t-10">
                                                  <label class="col-md-4 form-control-label">Amount :<p style="color: red;">*</p></label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
         <input class="form-control emp_val" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Bank Name" id="amount" maxlength="10" name="amount" type="text" value="<?php echo $insid[0]['amount']; ?>" <?php if($_REQUEST['flag'] == "Edit"){
                                          echo "disabled";
                                                              } ?> required>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div> 
                                             <div class="row mg-t-10" id="paid_bank_div">
       <label class="col-md-4 form-control-label">Paid From: <p style="color: red;">*</p></label>
       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<!--         <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Bank Name" id="frt_adv_cqe_bnk" maxlength="200" name="frt_adv_cqe_bnk" type="text" value=""> -->
<select   name="ledger_id" id="ledger_id" class="form-control emp_val" onchange="bankfetch(this.value)" <?php if($_REQUEST['flag'] == "Edit"){
                  echo "disabled";
                     } ?> >
                 <option value="">select </option>
                 <?php $query1 =mysqli_query($conn,"SELECT * FROM ledgers WHERE type <> 1 ");
                 while($row1=mysqli_fetch_array($query1))
                  { ?>
                    <option value="<?php echo $row1['id'];?>" ><?php echo $row1['name'];?></option>
                    <?php
                  }
                  ?>
                </select>

        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
      </div>
    </div>      <div class="row mg-t-10">
                <label class="col-md-4 form-control-label">Paid To :<p style="color: red;">*</p></label>
               <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                
<select   name="comp_bank_det" id="comp_bank_det" class="form-control emp_val" onclick="bankdet(this.value)" <?php if($_REQUEST['flag'] == "Edit"){    echo "disabled";
                                                              } ?> >
                 <option value="">select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM ledgers WHERE type = 1 ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['id'];?>" ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>


                                 </div>
                                            </div>
                            <div class="row mg-t-10">                                                
        <label class="col-md-4 form-control-label">Payment Type :<p style="color: red;">*</p></label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <select class="form-control emp_val" name="voucher_type" id="voucher_type" <?php if($_REQUEST['flag'] == "Edit"){
                                                                echo "disabled";
                                                              } ?> >
                                                          
         <?php
          $voucher = mysqli_query($conn,"SELECT * FROM voucher_type "); 
 while ($vouch = mysqli_fetch_array($voucher)){
         ?>                                                  
 <option value="<?php echo $vouch['name']?>" <?php if($vouch['name']==$insid[0]['type']) echo 'selected="selected"'; ?>><?php echo $vouch['name']?></option>
               <?php
}
                                                             ?>
                                                                     </select>
                <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
    <span style="padding-right:20px;"><button type="button" class="ion-plus-circled tx-16 lh-0 op-6" data-toggle="modal" data-target="#modaldemo1" ></button></span><span style=" font-size: 20px;  ">Add Sub-group Type</span>
                                               </div>
                                            </div>
                  <div id="modaldemo1" class="modal fade">
              <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                  <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Sub-Group Type</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body pd-25">
                   <div class="row mg-t-10">
                    <label class="col-md-2 form-control-label">Type </label>
                    <div class="col-sm-10 mg-t-5 mg-sm-b-10">
                      <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Type Name" id="ass_gc" maxlength="100" name="assgc" value="" type="text"  >
                      <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                    </div>
                  </div>    
                <div class="modal-footer">
                  <button type="button" id="addgc" class="btn btn-info pd-x-20" data-dismiss="modal" >Done</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
              </div></div>
<script>
  $(document).on('click','#addgc', function(){
/*alert("enter");*/
  var assgc = $('#ass_gc').val();
/*   alert(assgc);*/
  var action = "Voucher";
$.ajax({
     url:"gcno_actions.php",
     method:"POST",
     data:{gcno:assgc,act:action},
     success:function(data)
     {
alert(data);
/*      alert(data);*/
      /*$("#gcdiv").html(data);*/
           }  
    });
 location.reload();
  });
</script>
            </div><!-- modal-dialog -->
         </div>
 <div class="row mg-t-10">
                   <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                       
<?php
$quer=mysqli_query($conn,"select * from pay_type"); 
while($pay = mysqli_fetch_array($quer))
{
  ?>
                       <?php
          }?>
             <script >
function bankdiv(val){
/*  alert(val);*/
if(val=="Cash"||val=="cash")
{
 $("#bank_div").hide();
 $("#cque_div").hide();
 $.ajax({    
        type: "POST",
        url: "transporter_pay_fetch.php",
        data:{cust_id:val},            
        dataType: "html",          
        success: function(response){     
                     
            $("#acc_det").html(response); 
            /*alert(response);*/
        }
        });
}
else
{
 $("#bank_div").show();
 $("#cque_div").show();
  $("#paid_bank_div").show();
}
}
            </script>
            <script>
function bankfetch(val)
{
  var tpe="ledger";
  var rec="Recipt";
 $.ajax({    
        type: "POST",
        url: "get_district.php",
        data:{cust_id:val},            
        dataType: "html",          
        success: function(response){     
                     
            $("#frt_adv_cqe_bnk").html(response); 
            //alert(response);

        }
        });
/*  alert(val);*/

 $.ajax({    
        type: "POST",
        url: "transporter_pay_fetch.php",
        data:{cust_id:val,type:tpe,vouch_type:rec},   
        dataType: "html",          
        success: function(response){     
                     
            $("#led_det").html(response); 
            //alert(response);

        }
        });
}
</script>
<script>
$(function(){
$("#bank_div").hide();
 $("#cque_div").hide();
/*  $("#paid_bank_div").hide();*/
var value="Cash";
  bankdiv(value);
 });
  </script>
          </select>
            
          </div>
      </div>
    
<script>
function bankdet(val)
{
/*alert(val);*/

 $.ajax({    
        type: "POST",
        url: "transporter_pay_fetch.php",
        data:{cust_id:val},            
        dataType: "html",          
        success: function(response){     
                     
            $("#acc_det").html(response); 
            //alert(response);
        }
        });

/*$("#acc_det").html(val);*/
}

</script>                                           </div>
                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Add Voucher</button>
         <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button type="reset" value="Reset" class="btn btn-secondary" id="cancel">Cancel</button>
              </div>   </div>
            <div class="col-xl-6">
                          <div class="portlet-body" style=" display: block; border:5px solid #FB9337; height: auto; " id="acc_det">
    
            </div>
            <div class="portlet-body" style=" display: block; border:5px solid #FB9337; height: auto; " id="led_det">
            </div>
          </div>
        </div>
 </div>
      </div><!-- am-pagebody -->
    </form> 
       <?php include('../include/adminfooter.php'); ?> 
    <!-- <script>
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
</script> -->
   <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
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
$('#amount').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#amount').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#amount').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


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
  window.location.href = "customer_pay.php";
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
