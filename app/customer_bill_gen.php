<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>





    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Bill Generation</h5>

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 mg-t-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-12">

           

            <div class="portlet-body">

<?php

   $dat = new Basefunc;
if(isset($_POST['submit'])){
/*echo '<script>alert("enter");</script>';*/
$bal=0;
$count=count($_POST['bill_id']);
/* */

/*$date_rep = str_replace('/', '-', $_POST['payment_date']);

        $newDate = date("Y-m-d", strtotime($date_rep));*/



$newDate=date('Y-m-d');


$val="";
$pinqry = mysqli_query($conn,"SELECT billing_id FROM customer_bill_det ORDER BY id DESC LIMIT 1 "); 

                $res = mysqli_fetch_assoc($pinqry);

                if($res['billing_id']=="")
                {
$val="Bill"."1";


                }
else
{


$str = $res['billing_id'];
/*$value= preg_replace('/[a-z](?=\\d)/i', '$0 ', $str);*/

/*preg_match_all('!\d+!', $str, $value);*/

$value=preg_replace('/[^0-9]/', '', $str);


/*echo '<script>alert("'.$value.'");</script>';*/

$nxt=$value+1;
  $val="Bill"."$nxt";

/*  echo '<script>alert("'.$val.'");</script>';*/
}




if($count!=0)
{

for($i=0;$i<$count;$i++)
{


$id =  $_POST['bill_id'][$i];
/*
echo '<script>alert("'.$id.'");</script>';

die;*/


/*echo '<script>alert("'.$id.'");</script>';*/
/*
$total_bill=0;
$adv=0;
$total_balance=0;
$result_calc=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '".$id."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{

$total_bill = $total_bill+$frt['amount']; 
$adv=$adv+$frt['advance_cash_amount']+$frt['advance_cheque_amount']; 


}*/
/*echo '<script>alert("'.$total_bill.'");</script>';
echo '<script>alert("'.$adv.'");</script>';*/



/*$total_pay=0;
$pay_verify=mysqli_query($conn,"SELECT * FROM customer_payment WHERE invoice_no = '".$id."'  " );
while($pay = mysqli_fetch_assoc($pay_verify))
{

$total_pay +=$pay['amount']; 


}





$total_adv=$total_pay+$adv;
$total_balance=$total_bill-$total_adv;*/
/*
echo '<script>alert("'.$total_pay.'");</script>';
echo '<script>alert("'.$total_balance.'");</script>';*/

/*echo '<script>alert("'.$i.'");</script>';*/
/*
echo '<script>alert("'.$_POST['pay_amount'].'");</script>';*/
/*
$balance=0;
if($i==0)
{
$bal=$_POST['pay_amount'];
$balance=$bal;
}
else
{
$balance=$bal;

}
/*echo '<script>alert("'.$bal.'");</script>';*/
/*
$bal=$balance-$total_balance;




if($bal<0)

  {
$amount=$balance;

}
else
{
$amount=$total_balance;

}


if($_POST['billtype']=="Cash")
{

$acc_no="NULL";

}
else
{
$acc_no=$_POST['bank_name'];

}*/

/*echo '<script>alert("'.$amount.'");</script>';echo '<script>alert("'.$bal.'");</script>';*/









$insert_hire = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "trip_invoice"    =>     mysqli_real_escape_string($dat->con, $id),
      "cust_id"         =>     mysqli_real_escape_string($dat->con, $_POST['trans_name']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['total_val']),  
      "advance"         =>     mysqli_real_escape_string($dat->con, $_POST['total_advance']),
      "balance"         =>     mysqli_real_escape_string($dat->con, $_POST['total_val']-$_POST['total_advance']),
      "billing_id"      =>     mysqli_real_escape_string($dat->con, $val),
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $newDate)
     
      );  


       $insid = $dat->insert('customer_bill_det', $insert_hire);

$total_val=$_POST['total_val']-$_POST['total_advance'];

$total_value+=$total_val;


  $find_it=mysqli_query($conn,"SELECT * FROM customer_payment WHERE invoice_no = '$newDate' " );
while($find=mysqli_fetch_array($find_it))

{
 $uid = array(
 "id"          =>     mysqli_real_escape_string($dat->con, $find['id'])

);
$party = array(

"invoice_no"   =>    mysqli_real_escape_string($dat->con, $val)
);

 $insids = $dat->update('customer_payment',$party,$uid);




}

}

  

$vouc_type="Bill Amount for ".$val;


$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='4' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);


$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($dat->con, '4'),
      "number"         =>     mysqli_real_escape_string($dat->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($dat->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($dat->con, $total_value),
      "cr_total"      =>     mysqli_real_escape_string($dat->con, $total_value),
      "narration"    =>     mysqli_real_escape_string($dat->con, $vouc_type)
     
      );  


       $insstat = $dat->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST["trans_name"]. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);




$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $total_value),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'C')
      );  


       $insst1 = $dat->insert('entryitems', $insert_p1);

$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='Bills Payable'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

/*   echo '<script> alert("'.$dparty_id['id'].'");</script>';*/

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $dparty_id['id']),
      "amount"        =>     mysqli_real_escape_string($dat->con, $total_value),  
      "dc"           =>     mysqli_real_escape_string($dat->con, 'D')
      );  


       $insst2 = $dat->insert('entryitems', $insert_p2);
















}
 if($insid){

        echo '<script> alert("Bill Generated");window.open("Customer_total_bill.php?billid='.$val.'");</script>';
      } 
      else{
        echo '<script> alert("Error in Entry");</script>';
      }

}
?>




<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="row row-sm mg-t-20">
<div class="col-xl-8">
  <form>    
    <div id="bill_cont" name="bill_cont" >
          </div>

  <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Party:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="transporter_name" maxlength="50" name="trans_name" type="text" value="" readonly >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>

          
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Total Amount:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="total_val" maxlength="50" name="total_val" type="text" value="" readonly >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>

      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Total Advance:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="total_advance" maxlength="50" name="total_advance" type="text" value="" readonly >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Bill Amount:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="bill_amt" maxlength="50" name="bill_amt" type="text" value="" readonly >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>



     


       
<div class="modal-footer">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" name="submit" id="poceed" value="Proceed" class="btn btn-primary">  
</div>
</form> 
</div>
<div class="col-xl-4">

<div style="border:1px solid black;">


<div id="advances_box">
</div>


</div>







</div>
</div>
</div> 
</div>
     
</div>
</div>





<script>

function amtcheck(val)
{ 

/*  alert(val);*/
var amt = $('#total_val').val();

/*alert(amt);*/

if(val>amt)
{
$(':input[type="submit"]').prop('disabled', true);

}
else
{


   $(':input[type="submit"]').prop('disabled', false);
}



}

</script>





 <script >
function banks(val)
{


if(val!="Cash")
{
$('#bank_id').show();
$('#bank_name').show();


var trans=$('#transporter_name').val();
var act="Fetch_bank_cust";


$.ajax({
     url:"fetch_hire_det.php",
     method:"POST",
     dataType: "html",
     data: {action:act, num:trans},
     success:function(data)
     {
      /*alert(data);*/
      $("#bank_name").html(data);
      
       }
    });



}
else
{

$('#bank_id').hide();
$('#bank_name').hide();

}









}
</script>










<script>

  $(document).on('click', '#insert', function(){


var bills = $('#bill_nos').val(); 
/*
     alert(bills);*/
   var bill_val = $('#total_val').val();
   var dat = $('#idTourDateDetails').val();
   var transp = $('#transporter_name').val();
   var amount = $('#pay_amount').val();
   var pay_type= $('#billtype').val();
   var remark= $('#remark').val();
   var pay = pay_type+'-'+remark;

   
   var act="Insert";
/*
$.ajax({
     url:"fetch_hire_det.php",
     method:"POST",
     data:{amt:amount, date:dat, action:act, transport:transp,pay_type:pay },
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#demoModal').modal('hide');
       }
    });*/

  });
</script>




                                          <h6 class="card-body-title" style="">Bill Generation</h6>


                                                        <div class="row mg-t-10" >
                                                            
                                                                <label class="col-md-4 form-control-label">Customer:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                  

<select onChange="fetch_data()"  name="cusCity" id="cusCity" class="form-control" >





<option value="">Select </option>
<!-- <option value="all">All</option> -->
<?php 

$cust=mysqli_query($conn,"SELECT * FROM customer");

while($cus=mysqli_fetch_array($cust))
{

$query =mysqli_query($conn,"SELECT * FROM pod WHERE company = '".$cus['name']."'");
 $i=0;
while($row=mysqli_fetch_array($query))
{ 


$check =mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE trip_invoice = '".$row['tripid']."'");

if(mysqli_num_rows($check)==0)
{
$i++;
if($i==1)
{
  ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['company'];?>" ><?php echo $row['company'];?></option>

<?php
}
}
}
}
?>
</select>

                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>
                                                        </div>



                                                           <!--<div class="" style="padding-left:200px" id="hhdriverli">
                                                        </div>-->








<script>
function fetch_data(){

var name=$("#cusCity").val();

var act="pay_Fetch";
if(name=="all")
{

$('#adding').attr('disabled', true);
}else
{

  $('#adding').attr('disabled', false);
}
/*alert(from);

alert(to);
*/


$.ajax({
     url:"fetch_party_det.php",
     method:"POST",
     dataType: "html",
     data: {action:act, num:name},
     success:function(data)
     {
      /*alert(data);*/
      $("#responsecontainer").html(data); 
      
       }
    });


}


</script>



 <div class="col-sm-12  mg-t-10" id="responsecontainer" style="text-align:  center;background:  #2d3a50;color:  #fff;padding: 5px 15px 5px;float:  left;width:  100%;/* line-height: 16px; */margin: 20px 0px 0px;">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">



<script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
<!--         <script>

  $(document).on('click', '#idTourDateDetails', function(){

$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});



  });


        </script> -->

        <script>
$(function() {
    $( "#idTourDateDetails" ).datepicker();
});
</script>

 <div class="col-xl">
  
</div>
      </div>





                   </div>
<p>&nbsp</p>
<div align="right">

     <button type="button" name="add" id="adding" class="btn btn-info" onclick="fetchcust()">Generate Bill >></button>
    </div>



<script>

function fetchcust()
{
var cust=$("#cusCity").val();
/*alert(cust);*/

$.ajax({
     url:"fetch_party_det.php",
     method:"POST",
     dataType: "html",
     data: {customer:cust},
     success:function(data)
     {




/*      alert(data);*/
      /*alert(data);*/
      $("#advances_box").html(data); 
      
       }
    });
}


</script>

<script>
  
function calculs(val)
{
/*
  alert(val);*/
/*alert(val.checked);*/
var stat=val.checked;


var pre=$("#total_advance").val();
var parsed=parseInt(pre);



/*alert(val.value);*/
var value=val.value;


var total=0;
$.ajax({



      type: "POST",
       
      url: "fetch_party_det.php",
        data:{ voucher: value,state:stat },
 
      success: function(data){

/*      alert(data);
    */
var Data = $.parseJSON(data);

/*alert(Data.values);*/

var curr=parseInt(Data.values);

if(stat == true)
{

total=parsed+curr;
}
else
{
total=parsed-curr;

}


      $("#total_advance").val(total); 
      totale();
     }
    });





}


</script>



<script>
function totale()
{
var tot = $('#total_val').val();
var adv = $('#total_advance').val();

var total=parseInt(tot);
var advance=parseInt(adv);

var final=total-advance;
/*alert(final);*/
 $('#bill_amt').val(final);



}

</script>




<script>
   $(function(){
      $('#adding').click(function(){
        var val = [];
        var value=[];
        var adv=[];
        var x=[];
        $('#demoModal').modal('show');

        $(':checkbox:checked:not("#checkAll")').each(function(i){


          val = $(this).val();




/*inst=val[i];*/

value[i]= $('#bill'+val).val();
  
adv[i]= $('#adv'+val).val();

/*alert(value);

alert(adv);*/

 x[i]="<input type='hidden' id='bill_id' name='bill_id[]' value='"+val+"'>";


        });


        var c=value.length;
        /*alert(adv);*/
var total=0;
var advance=0;
for(var y=0;y<c;y++)
{
total=total+parseInt(value[y]);


if(adv[y]=="")
{

  advance=advance+0;
}
else
{
advance=advance+parseInt(adv[y]);
}
}
var trans=$('#cusCity').val();

/*alert(advance);*/


var bal=parseInt(total)-parseInt(advance);
$('#transporter_name').val(trans);
$('#total_val').val(total);
$('#total_advance').val(advance);




$('#bill_amt').val(bal);
$('#bank_id').hide();
$('#bank_name').hide();


/*alert(x);*/
$('#bill_cont').html(x);


var total_emp=$('#bill_amt').val();
if(total_emp<=0)
{
  $('#poceed').attr('disabled', true);
}
else
{
  $('#poceed').attr('disabled', false);
}

      });
    });

</script>



<script>
 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });

</script>





<!-- <script>
function testing(val)
{
/*  alert(val);*/

var value=val;



  return value;
}


</script> -->




                                  </div>


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php 
      include('../include/adminfooter.php'); ?> 
    <!-- <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script> --> 


<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>





    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Bill Generation</h5>

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 mg-t-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-12">

           

            <div class="portlet-body">

<?php

   $dat = new Basefunc;
if(isset($_POST['submit'])){
/*echo '<script>alert("enter");</script>';*/
$bal=0;
$count=count($_POST['bill_id']);
/* */

/*$date_rep = str_replace('/', '-', $_POST['payment_date']);

        $newDate = date("Y-m-d", strtotime($date_rep));*/



$newDate=date('Y-m-d');


$val="";
$pinqry = mysqli_query($conn,"SELECT billing_id FROM customer_bill_det ORDER BY id DESC LIMIT 1 "); 

                $res = mysqli_fetch_assoc($pinqry);

                if($res['billing_id']=="")
                {
$val="Bill"."1";


                }
else
{


$str = $res['billing_id'];
/*$value= preg_replace('/[a-z](?=\\d)/i', '$0 ', $str);*/

/*preg_match_all('!\d+!', $str, $value);*/

$value=preg_replace('/[^0-9]/', '', $str);


/*echo '<script>alert("'.$value.'");</script>';*/

$nxt=$value+1;
  $val="Bill"."$nxt";

/*  echo '<script>alert("'.$val.'");</script>';*/
}




if($count!=0)
{

for($i=0;$i<$count;$i++)
{


$id =  $_POST['bill_id'][$i];
/*
echo '<script>alert("'.$id.'");</script>';

die;*/


/*echo '<script>alert("'.$id.'");</script>';*/
/*
$total_bill=0;
$adv=0;
$total_balance=0;
$result_calc=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '".$id."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{

$total_bill = $total_bill+$frt['amount']; 
$adv=$adv+$frt['advance_cash_amount']+$frt['advance_cheque_amount']; 


}*/
/*echo '<script>alert("'.$total_bill.'");</script>';
echo '<script>alert("'.$adv.'");</script>';*/



/*$total_pay=0;
$pay_verify=mysqli_query($conn,"SELECT * FROM customer_payment WHERE invoice_no = '".$id."'  " );
while($pay = mysqli_fetch_assoc($pay_verify))
{

$total_pay +=$pay['amount']; 


}





$total_adv=$total_pay+$adv;
$total_balance=$total_bill-$total_adv;*/
/*
echo '<script>alert("'.$total_pay.'");</script>';
echo '<script>alert("'.$total_balance.'");</script>';*/

/*echo '<script>alert("'.$i.'");</script>';*/
/*
echo '<script>alert("'.$_POST['pay_amount'].'");</script>';*/
/*
$balance=0;
if($i==0)
{
$bal=$_POST['pay_amount'];
$balance=$bal;
}
else
{
$balance=$bal;

}
/*echo '<script>alert("'.$bal.'");</script>';*/
/*
$bal=$balance-$total_balance;




if($bal<0)

  {
$amount=$balance;

}
else
{
$amount=$total_balance;

}


if($_POST['billtype']=="Cash")
{

$acc_no="NULL";

}
else
{
$acc_no=$_POST['bank_name'];

}*/

/*echo '<script>alert("'.$amount.'");</script>';echo '<script>alert("'.$bal.'");</script>';*/









$insert_hire = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "trip_invoice"    =>     mysqli_real_escape_string($dat->con, $id),
      "cust_id"         =>     mysqli_real_escape_string($dat->con, $_POST['trans_name']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['total_val']),  
      "advance"         =>     mysqli_real_escape_string($dat->con, $_POST['total_advance']),
      "balance"         =>     mysqli_real_escape_string($dat->con, $_POST['total_val']-$_POST['total_advance']),
      "billing_id"      =>     mysqli_real_escape_string($dat->con, $val),
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $newDate)
     
      );  


       $insid = $dat->insert('customer_bill_det', $insert_hire);

$total_val=$_POST['total_val']-$_POST['total_advance'];

$total_value+=$total_val;


  $find_it=mysqli_query($conn,"SELECT * FROM customer_payment WHERE invoice_no = '$newDate' " );
while($find=mysqli_fetch_array($find_it))

{
 $uid = array(
 "id"          =>     mysqli_real_escape_string($dat->con, $find['id'])

);
$party = array(

"invoice_no"   =>    mysqli_real_escape_string($dat->con, $val)
);

 $insids = $dat->update('customer_payment',$party,$uid);




}

}

  

$vouc_type="Bill Amount for ".$val;


$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='4' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);


$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($dat->con, '4'),
      "number"         =>     mysqli_real_escape_string($dat->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($dat->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($dat->con, $total_value),
      "cr_total"      =>     mysqli_real_escape_string($dat->con, $total_value),
      "narration"    =>     mysqli_real_escape_string($dat->con, $vouc_type)
     
      );  


       $insstat = $dat->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST["trans_name"]. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);




$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $total_value),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'C')
      );  


       $insst1 = $dat->insert('entryitems', $insert_p1);

$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='Bills Payable'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

/*   echo '<script> alert("'.$dparty_id['id'].'");</script>';*/

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $dparty_id['id']),
      "amount"        =>     mysqli_real_escape_string($dat->con, $total_value),  
      "dc"           =>     mysqli_real_escape_string($dat->con, 'D')
      );  


       $insst2 = $dat->insert('entryitems', $insert_p2);
















}
 if($insid){

        echo '<script> alert("Bill Generated");window.open("Customer_total_bill.php?billid='.$val.'");</script>';
      } 
      else{
        echo '<script> alert("Error in Entry");</script>';
      }

}
?>




<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="row row-sm mg-t-20">
<div class="col-xl-8">
  <form>    
    <div id="bill_cont" name="bill_cont" >
          </div>

  <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Party:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="transporter_name" maxlength="50" name="trans_name" type="text" value="" readonly >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>

          
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Total Amount:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="total_val" maxlength="50" name="total_val" type="text" value="" readonly >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>

      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Total Advance:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="total_advance" maxlength="50" name="total_advance" type="text" value="" readonly >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Bill Amount:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="bill_amt" maxlength="50" name="bill_amt" type="text" value="" readonly >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>



     


       
<div class="modal-footer">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" name="submit" id="poceed" value="Proceed" class="btn btn-primary">  
</div>
</form> 
</div>
<div class="col-xl-4">

<div style="border:1px solid black;">


<div id="advances_box">
</div>


</div>







</div>
</div>
</div> 
</div>
     
</div>
</div>





<script>

function amtcheck(val)
{ 

/*  alert(val);*/
var amt = $('#total_val').val();

/*alert(amt);*/

if(val>amt)
{
$(':input[type="submit"]').prop('disabled', true);

}
else
{


   $(':input[type="submit"]').prop('disabled', false);
}



}

</script>





 <script >
function banks(val)
{


if(val!="Cash")
{
$('#bank_id').show();
$('#bank_name').show();


var trans=$('#transporter_name').val();
var act="Fetch_bank_cust";


$.ajax({
     url:"fetch_hire_det.php",
     method:"POST",
     dataType: "html",
     data: {action:act, num:trans},
     success:function(data)
     {
      /*alert(data);*/
      $("#bank_name").html(data);
      
       }
    });



}
else
{

$('#bank_id').hide();
$('#bank_name').hide();

}









}
</script>










<script>

  $(document).on('click', '#insert', function(){


var bills = $('#bill_nos').val(); 
/*
     alert(bills);*/
   var bill_val = $('#total_val').val();
   var dat = $('#idTourDateDetails').val();
   var transp = $('#transporter_name').val();
   var amount = $('#pay_amount').val();
   var pay_type= $('#billtype').val();
   var remark= $('#remark').val();
   var pay = pay_type+'-'+remark;

   
   var act="Insert";
/*
$.ajax({
     url:"fetch_hire_det.php",
     method:"POST",
     data:{amt:amount, date:dat, action:act, transport:transp,pay_type:pay },
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#demoModal').modal('hide');
       }
    });*/

  });
</script>




                                          <h6 class="card-body-title" style="">Bill Generation</h6>


                                                        <div class="row mg-t-10" >
                                                            
                                                                <label class="col-md-4 form-control-label">Customer:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                  

<select onChange="fetch_data()"  name="cusCity" id="cusCity" class="form-control" >





<option value="">Select </option>
<!-- <option value="all">All</option> -->
<?php 

$cust=mysqli_query($conn,"SELECT * FROM customer");

while($cus=mysqli_fetch_array($cust))
{

$query =mysqli_query($conn,"SELECT * FROM pod WHERE company = '".$cus['name']."'");
 $i=0;
while($row=mysqli_fetch_array($query))
{ 


$check =mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE trip_invoice = '".$row['tripid']."'");

if(mysqli_num_rows($check)==0)
{
$i++;
if($i==1)
{
  ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['company'];?>" ><?php echo $row['company'];?></option>

<?php
}
}
}
}
?>
</select>

                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>
                                                        </div>



                                                           <!--<div class="" style="padding-left:200px" id="hhdriverli">
                                                        </div>-->








<script>
function fetch_data(){

var name=$("#cusCity").val();

var act="pay_Fetch";
if(name=="all")
{

$('#adding').attr('disabled', true);
}else
{

  $('#adding').attr('disabled', false);
}
/*alert(from);

alert(to);
*/


$.ajax({
     url:"fetch_party_det.php",
     method:"POST",
     dataType: "html",
     data: {action:act, num:name},
     success:function(data)
     {
      /*alert(data);*/
      $("#responsecontainer").html(data); 
      
       }
    });


}


</script>



 <div class="col-sm-12  mg-t-10" id="responsecontainer" style="text-align:  center;background:  #2d3a50;color:  #fff;padding: 5px 15px 5px;float:  left;width:  100%;/* line-height: 16px; */margin: 20px 0px 0px;">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">



<script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
<!--         <script>

  $(document).on('click', '#idTourDateDetails', function(){

$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});



  });


        </script> -->

        <script>
$(function() {
    $( "#idTourDateDetails" ).datepicker();
});
</script>

 <div class="col-xl">
  
</div>
      </div>





                   </div>
<p>&nbsp</p>
<div align="right">

     <button type="button" name="add" id="adding" class="btn btn-info" onclick="fetchcust()">Generate Bill >></button>
    </div>



<script>

function fetchcust()
{
var cust=$("#cusCity").val();
/*alert(cust);*/

$.ajax({
     url:"fetch_party_det.php",
     method:"POST",
     dataType: "html",
     data: {customer:cust},
     success:function(data)
     {




/*      alert(data);*/
      /*alert(data);*/
      $("#advances_box").html(data); 
      
       }
    });
}


</script>

<script>
  
function calculs(val)
{
/*
  alert(val);*/
/*alert(val.checked);*/
var stat=val.checked;


var pre=$("#total_advance").val();
var parsed=parseInt(pre);



/*alert(val.value);*/
var value=val.value;


var total=0;
$.ajax({



      type: "POST",
       
      url: "fetch_party_det.php",
        data:{ voucher: value,state:stat },
 
      success: function(data){

/*      alert(data);
    */
var Data = $.parseJSON(data);

/*alert(Data.values);*/

var curr=parseInt(Data.values);

if(stat == true)
{

total=parsed+curr;
}
else
{
total=parsed-curr;

}


      $("#total_advance").val(total); 
      totale();
     }
    });





}


</script>



<script>
function totale()
{
var tot = $('#total_val').val();
var adv = $('#total_advance').val();

var total=parseInt(tot);
var advance=parseInt(adv);

var final=total-advance;
/*alert(final);*/
 $('#bill_amt').val(final);



}

</script>




<script>
   $(function(){
      $('#adding').click(function(){
        var val = [];
        var value=[];
        var adv=[];
        var x=[];
        $('#demoModal').modal('show');

        $(':checkbox:checked:not("#checkAll")').each(function(i){


          val = $(this).val();




/*inst=val[i];*/

value[i]= $('#bill'+val).val();
  
adv[i]= $('#adv'+val).val();

/*alert(value);

alert(adv);*/

 x[i]="<input type='hidden' id='bill_id' name='bill_id[]' value='"+val+"'>";


        });


        var c=value.length;
        /*alert(adv);*/
var total=0;
var advance=0;
for(var y=0;y<c;y++)
{
total=total+parseInt(value[y]);


if(adv[y]=="")
{

  advance=advance+0;
}
else
{
advance=advance+parseInt(adv[y]);
}
}
var trans=$('#cusCity').val();

/*alert(advance);*/


var bal=parseInt(total)-parseInt(advance);
$('#transporter_name').val(trans);
$('#total_val').val(total);
$('#total_advance').val(advance);




$('#bill_amt').val(bal);
$('#bank_id').hide();
$('#bank_name').hide();


/*alert(x);*/
$('#bill_cont').html(x);


var total_emp=$('#bill_amt').val();
if(total_emp<=0)
{
  $('#poceed').attr('disabled', true);
}
else
{
  $('#poceed').attr('disabled', false);
}

      });
    });

</script>



<script>
 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });

</script>





<!-- <script>
function testing(val)
{
/*  alert(val);*/

var value=val;



  return value;
}


</script> -->




                                  </div>


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php 
      include('../include/adminfooter.php'); ?> 
    <!-- <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script> --> 


