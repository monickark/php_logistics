<?php include('../include/dbConnect.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); ?>
<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>
<script >
                                                document.addEventListener("DOMContentLoaded", function() {
                                                  var style = this.value == 1 ? 'block' : 'none';
                                                  document.getElementById('hidden_div').style.display = style;
                                                  document.getElementById('sealdiv').style.display = style;
                                                  document.getElementById('sealdiv2').style.display = style;
                                                 document.getElementById('hirediv').style.display = style;
                                                 document.getElementById('retemp').style.display = style;
                                                    
                                                   document.getElementById('hidden_div4').style.display = style;
                                                   document.getElementById('hidden_div5').style.display = style;
                                                  
                                                   document.getElementById('hidden_div7').style.display = style;
                                                   document.getElementById('hidden_div8').style.display = style;
                                                   document.getElementById('hidden_div9').style.display = style;
                                                   document.getElementById('Bankdiv').style.display = style;
                                                   document.getElementById('workBankdiv').style.display = style;
                                                    document.getElementById('mkmbankdiv').style.display = style;
});
</script>


<?php
$data = new Basefunc;  
if(isset($_POST['submit'])){

if($_REQUEST['action'] == "Add"){

  if($_POST['loadtype']=="Load" )
  {



$insert_gcld = array(
      "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      "loaddte"          =>     mysqli_real_escape_string($data->con, $_POST['mloaddte']),    
      "ref_no"           =>     mysqli_real_escape_string($data->con, $_POST['refno']),  
      "company"          =>     mysqli_real_escape_string($data->con, $_POST['lcompany']), 
      "transporter"      =>     mysqli_real_escape_string($data->con, $_POST['ltrans']), 
      "vehicle_code"     =>     mysqli_real_escape_string($data->con, $_POST['lvechcode']),
      "vehicle_no"       =>     mysqli_real_escape_string($data->con, $_POST['lvechnameh']),  
      "driver"           =>     mysqli_real_escape_string($data->con, $_POST['ldriv']), 
      "ass_gc_no"        =>     mysqli_real_escape_string($data->con, $_POST['assgc']), 
      "consigner_name"   =>     mysqli_real_escape_string($data->con, $_POST['csernme']), 
      "consignee_name"   =>     mysqli_real_escape_string($data->con, $_POST['cseenme']), 
      "no_of_articles"   =>     mysqli_real_escape_string($data->con, $_POST['artilces']), 
      "goods_value"      =>     mysqli_real_escape_string($data->con, $_POST['lgdsvalue']),    
      "description"      =>     mysqli_real_escape_string($data->con, $_POST['ldesc']),  
      "party_name"       =>     mysqli_real_escape_string($data->con, $_POST['lparty']), 
      "gc_no"            =>     mysqli_real_escape_string($data->con, $_POST['lgcno']), 
      "reference_no"     =>     mysqli_real_escape_string($data->con, $_POST['lrefno']),
      "cotainer_no"      =>     mysqli_real_escape_string($data->con, $_POST['lcontno']),  
      "cotainer_size"    =>     mysqli_real_escape_string($data->con, $_POST['lcontsze']), 
      "load_type"        =>     mysqli_real_escape_string($data->con, $_POST['ldtype']), 
      "seal_no"          =>     mysqli_real_escape_string($data->con, $_POST['sealno']), 
      "weight"           =>     mysqli_real_escape_string($data->con, $_POST['lcontwt']), 
      "remarks  "        =>     mysqli_real_escape_string($data->con, $_POST['lrem']) 
      );  
$insid = $data->insert('gcentries', $insert_gcld);
$insert_vechstat = array(
      "VechNo"       =>     mysqli_real_escape_string($data->con, $_SESSION['lvechnameh']),
      "VechStat"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),    
      "Entryno"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),  
      "date"           =>     mysqli_real_escape_string($data->con, $_POST['mdate']) 
      );  

$insid = $data->insert('gcentries', $insert_gcld);


$update_id = array(
      "id"               =>    mysqli_real_escape_string($data->con, $insid)
    );
$insert_gc = array(
          
      "date"            =>     mysqli_real_escape_string($data->con, $_POST['mdate']),  
      "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype'])/*, 
      "drivername"      =>     mysqli_real_escape_string($data->con, $_POST['drivernme']), 
      "cdrivername"     =>     mysqli_real_escape_string($data->con, $_POST['cgedrivernme']),
      "madvance"        =>     mysqli_real_escape_string($data->con, $_POST['madv']),  
      "diesel"          =>     mysqli_real_escape_string($data->con, $_POST['mdiesel']), 
      "vechNo"          =>     mysqli_real_escape_string($data->con, $_POST['vechno']), 
      "workshop"        =>     mysqli_real_escape_string($data->con, $_POST['wshop']), 
      "mfrom"           =>     mysqli_real_escape_string($data->con, $_POST['mfrom']), 
      "mto"             =>     mysqli_real_escape_string($data->con, $_POST['mto']) */
      );  
       
      
 $update = $data->update('gcentries', $insert_gc,$update_id);

 $insert_frt = array(
      "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      "gcentry_id"        =>     mysqli_real_escape_string($data->con,$insid),
      "frtamt"           =>     mysqli_real_escape_string($data->con, $_POST['lfreightamt']),    
      "loadcrgs"         =>     mysqli_real_escape_string($data->con, $_POST['fldngcgs']),
      "unldngcrgs"       =>     mysqli_real_escape_string($data->con, $_POST['fuldngcgs']),    
      "weighcrgs"        =>     mysqli_real_escape_string($data->con, $_POST['fwbillcgs']), 
      "otheramt"         =>     mysqli_real_escape_string($data->con, $_POST['fotramt']), 
      "otrdesc"          =>     mysqli_real_escape_string($data->con, $_POST['fodesc']), 
      "hltdays"          =>     mysqli_real_escape_string($data->con, $_POST['fhltdays']),
      "hltrate"          =>     mysqli_real_escape_string($data->con, $_POST['fhltrate']),  
      "hlttotal"         =>     mysqli_real_escape_string($data->con, $_POST['fhltamth']), 
      "frttotal"         =>     mysqli_real_escape_string($data->con, $_POST['fttlfreighth']), 
      "advcash"          =>     mysqli_real_escape_string($data->con, $_POST['fadvcsh']), 
      "advcashdte"       =>     mysqli_real_escape_string($data->con, $_POST['fadvcshdte']), 
      "advcqe"           =>     mysqli_real_escape_string($data->con, $_POST['fadvcqe']), 
      "advcqedte"        =>     mysqli_real_escape_string($data->con, $_POST['fadvcqedte']),    
      "advcqebank"       =>     mysqli_real_escape_string($data->con, $_POST['fadvbankname']),  
      "advcqenum"        =>     mysqli_real_escape_string($data->con, $_POST['fadvcheqno']), 
      "frtbal"           =>     mysqli_real_escape_string($data->con, $_POST['frtbalh']), 
      "diedte"           =>     mysqli_real_escape_string($data->con, $_POST['dieseldate']),
      "dievendor"        =>     mysqli_real_escape_string($data->con, $_POST['vendor']),  
      "diepaytype"       =>     mysqli_real_escape_string($data->con, $_POST['diepay']), 
      "dieqty"           =>     mysqli_real_escape_string($data->con, $_POST['dieqty']), 
      "dieppl"           =>     mysqli_real_escape_string($data->con, $_POST['diepplh']), 
      "dieamt"           =>     mysqli_real_escape_string($data->con, $_POST['dieamt'])
      ); 
$updatefrt = $data->insert('frieghtdetails', $insert_frt);


$insert_hire = array(
      "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      "gcentry_id"        =>     mysqli_real_escape_string($data->con,$insid),
      "billdetails"           =>     mysqli_real_escape_string($data->con, $_POST['hbilldet']),    
      "billdate"         =>     mysqli_real_escape_string($data->con, $_POST['hdte']),
      "hire_amount"       =>     mysqli_real_escape_string($data->con, $_POST['hireamt']),    
      "commision"        =>     mysqli_real_escape_string($data->con, $_POST['hcomm']), 
      "loading_charge"         =>     mysqli_real_escape_string($data->con, $_POST['hldngcgs']), 
      "unloading_charge"          =>     mysqli_real_escape_string($data->con, $_POST['huldngcgs']), 
      "weight_bill_charge"          =>     mysqli_real_escape_string($data->con, $_POST['hwbillcgs']),
      "other_description"          =>     mysqli_real_escape_string($data->con, $_POST['hodes']),  
      "other_amount"         =>     mysqli_real_escape_string($data->con, $_POST['hotramt']), 
      "halt_days"         =>     mysqli_real_escape_string($data->con, $_POST['hhltdays']), 
      "halt_rate"          =>     mysqli_real_escape_string($data->con, $_POST['hhltrate']), 
      "halt_amount"       =>     mysqli_real_escape_string($data->con, $_POST['hhltamth']), 
      "total_hire"           =>     mysqli_real_escape_string($data->con, $_POST['httlfreighth']), 
      "chn_advance"        =>     mysqli_real_escape_string($data->con, $_POST['hadv']),    
      "payment_type"       =>     mysqli_real_escape_string($data->con, $_POST['hadvpayt']),  
      "bank"        =>     mysqli_real_escape_string($data->con, $_POST['hadvbnknme']), 
      "cheque_no"           =>     mysqli_real_escape_string($data->con, $_POST['hadvcqe']), 
      "mkm_adv"           =>     mysqli_real_escape_string($data->con, $_POST['mkmadv']),
      "mkm_bank"        =>     mysqli_real_escape_string($data->con, $_POST['mkmbnknme']),  
      "mkm_cque_no"       =>     mysqli_real_escape_string($data->con, $_POST['mkmcqe']), 
      "total_cash_advance"           =>     mysqli_real_escape_string($data->con, $_POST['htotadvh']), 
      "total_diesel_advance"           =>     mysqli_real_escape_string($data->con, $_POST['htdadv']), 
      "total_diesel_quantity"           =>     mysqli_real_escape_string($data->con, $_POST['htdqty']),
      "hire_balance"           =>     mysqli_real_escape_string($data->con, $_POST['hbalh'])
      ); 
$inshire = $data->insert('hiredetails', $insert_hire);




   if($insid){

    echo '<script> alert("GC Entry with Load Done Successfully");window.location.assign("gcentry.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }






  }else
  {

/*Update Part*/
$insert_gc = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "date"            =>     mysqli_real_escape_string($data->con, $_POST['mdate']),  
      "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']), 
      "drivername"      =>     mysqli_real_escape_string($data->con, $_POST['drivernme']), 
      "cdrivername"     =>     mysqli_real_escape_string($data->con, $_POST['cgedrivernme']),
      "madvance"        =>     mysqli_real_escape_string($data->con, $_POST['madv']),  
      "diesel"          =>     mysqli_real_escape_string($data->con, $_POST['mdiesel']), 
      "vechNo"          =>     mysqli_real_escape_string($data->con, $_POST['vechno']), 
      "workshop"        =>     mysqli_real_escape_string($data->con, $_POST['wshop']), 
      "mfrom"           =>     mysqli_real_escape_string($data->con, $_POST['mfrom']), 
      "mto"             =>     mysqli_real_escape_string($data->con, $_POST['mto']) 
      );  
       $insid = $data->insert('gcentries', $insert_gc);
      
 

   if($insid){

    echo '<script> alert("GC Entry Done Successfully");window.location.assign("gcentry.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }}
}


else if($_POST['loadtype']=="Return" )
  {

  }



else
{

$update_cust = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['consigneename']),  
      "custtype"        =>     mysqli_real_escape_string($data->con, $_POST['isconsignee']), 
      "billtype"        =>     mysqli_real_escape_string($data->con, $_POST['biltypaidtype']), 
      "mobNum"          =>     mysqli_real_escape_string($data->con, $_POST['mobileno']),
      "servicetax"      =>     mysqli_real_escape_string($data->con, $_POST['servicetax']),  
      "gstNo"           =>     mysqli_real_escape_string($data->con, $_POST['gst']), 
      "cstNo"           =>     mysqli_real_escape_string($data->con, $_POST['cst']), 
      "panNo"           =>     mysqli_real_escape_string($data->con, $_POST['pan']), 
      "state"           =>     mysqli_real_escape_string($data->con, $_POST['cusState']), 
      "city"            =>     mysqli_real_escape_string($data->con, $_POST['cusCity']), 
      "area"            =>     mysqli_real_escape_string($data->con, $_POST['areaid']),
      "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']), 
      "pinCode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode'])
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('customer', $update_cust, $update_id);
      if($insid){

    echo '<script> alert("Customer Altered Successfully");window.location.assign("viewconsigner.php");</script>';
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

    $insid = $data->select_where('customer', $update_id);
 }

?> 









    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">GC Entry</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="">
      <div class="am-pagebody" onload="myFunction()">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Gc Entry</h6>
                                                                                <div class="row mg-t-10">
                                       <label class="col-md-4 form-control-label">Date :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0 ">
                                                           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Entry date" name="mdate" id="myVariable" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
                                                       </div>
                                                </div>
                                                <div class="row mg-t-10">
 <label class="col-md-4 form-control-label"> Vehicle Number :</label>
                                                       
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                           <select onChange="getstate(this.value);" name="mvechstate" id="mVechno" class="form-control" >

            <option value="">Select </option>
            <?php $query =mysqli_query($conn,"SELECT * FROM vehicles");
            while($row=mysqli_fetch_array($query))
              { ?>
                <option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['state']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
                <?php
              }
              ?>
            </select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>

 <div class="col-sm-4 mg-t-5 mg-sm-t-0">
<label class="col-md-4 form-control-label ckbox">
  <input id="hirebox" type="checkbox" onclick="hirefunc()">
  <span style="font-size: 20px;">Hire</span>
</label>

</div>
</div>
<script>
  function hirefunc()
  {
if(document.getElementById("hirebox").checked == true)
{
document.getElementById("mVechno").disabled = true;
document.getElementById("mainstatus").disabled = true;






   var style = this.value == 1 ? 'block' : 'none';
   document.getElementById('hidden_div').style.display = style;
   document.getElementById('hidden_div4').style.display = style;
   document.getElementById('hidden_div5').style.display = style;
 
   document.getElementById('hidden_div7').style.display = style;
   document.getElementById('hidden_div8').style.display = style;
   document.getElementById('hidden_div9').style.display = style;
   document.getElementById('hirediv').style.display = 'block';
   document.getElementById('retemp').style.display = style;
}else
{
  var style = this.value == 1 ? 'block' : 'none';
  document.getElementById('hirediv').style.display = style;
  document.getElementById("mVechno").disabled = false;
  document.getElementById("mainstatus").disabled = false;

} 

  }
</script>             
                                                   




                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label"> Status :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0" id="type">
                                                           <select class="form-control" data-val="true" placeholder="Select Vehicle Type" id="mainstatus" name="loadtype"  style="padding:0px 6px !important;" >

</select>
                                               
                                                    </div>
                                                </div>
                                                <script >
                                               
                                                  document.getElementById('mainstatus').addEventListener('change', function () {
                                                  var style = this.value == "Load" ? 'block' : 'none';
                                                  document.getElementById('hidden_div').style.display = style;

                                                  var style2 = this.value == "Halt" ? 'block' : 'none';
                                                  document.getElementById('hidden_div7').style.display = style2;
                                                    
                                                     var style3 = this.value == "OnRoad" ? 'block' : 'none';
                                                    document.getElementById('hidden_div4').style.display = style3;

                                                    var style4 = this.value == "Return" ? 'block' : 'none';
                                                    document.getElementById('hidden_div5').style.display = style4;

                                                     var style5 = this.value == "Workshop" ? 'block' : 'none';
                                                    document.getElementById('hidden_div8').style.display = style5;


                                                     var style6 = this.value == "Accident" ? 'block' : 'none';
                                                    document.getElementById('hidden_div9').style.display = style6;

                                                     var style7 = this.value == "Returnemp" ? 'block' : 'none';
                                                    document.getElementById('retemp').style.display = style7;

                                                    var style = this.value == 1 ? 'block' : 'none';
                                                  document.getElementById('hidden_div3').style.display = style;
});
                                                </script>

                                               

                                           
                                              

                                               
                                                
                                            
                                                
                                                
                                                <!-- <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Reff No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> -->

                                                </div></div>


                                                  <div class="col-xl-6">

               <div class="portlet-body">

               <div id="printarea" style=" display: block; border:1px solid #d8dce3; height: 200px; " >
                <p id="statusid" style="text-align: center; ">Vehicle Details</p>
                <!-- <p style="font-size: 25px;"><span>Status:</span><span id="statusid"></span></p> -->
                
               </div>
               </div></div>
                                                </div></div></div>
 






<div id="retemp">

       <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Return Empty</h6>
</div></div>

<!-- 
 <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Vehicle No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                           

                             <select   name="return" id="retform" class="form-control" onChange="getdetails(this.value);" >
                                                           <option selected="selected" value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT DISTINCT vechNo FROM gcentries");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['vechNo']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
<?php
}
?>
</select>




                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> -->


                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">From :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="ldfrome" maxlength="50" name="ldfrome" type="text" value="" disabled>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div> 



                                                    <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">To :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="ldtoe" maxlength="50" name="ldtoe" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div> 
                                                    

<div class="row mg-t-10">
                                                    
                                                        <label class="col-md-4 form-control-label">Driver :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="bodytype" maxlength="100" name="drivernme" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>

                                                       
                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Changed Driver Name" id="bodytype" maxlength="100" name="cgedrivernme" type="text" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                            
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Advance :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="engineno" maxlength="50" name="madv" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Diesel :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Diesel Amount" id="chasisno" maxlength="50" name="mdiesel" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>




</div></div>


 </div></div></div>


         <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">End Trip</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>



 

     </div>






























<div id="hirediv">
 <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Hire Details</h6>
</div></div>
                               
                                  <div class="row mg-t-10">
<label class="col-md-2 form-control-label"> Transporter:</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                           <select   name="hrtrans" id="hrtrans" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM transporters");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                          </div>
                                                        </div>
                                                                                
                                             <!--   <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Bill Details :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bill No" id="hrbill" maxlength="200" name="hrbill" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="col-sm-6 mg-t-5 mg-sm-t-0">
                                                           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Bill Date" name="hrdte" id="datepicker0011" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                      
                                                        </div>
                                                    </div>

                                                 -->
                                             


                                                 <div class="row mg-t-10">
                                                        <label class="col-md-2 form-control-label"> From :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">

       <select   name="mfrom" id="from" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM locations");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['area'];?>" <?php if($row['area']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['area'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                        </div>
                            
                              
                                                        <label class="col-md-2 form-control-label"> To :</label>
                                                        <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                                                             <select   name="mto" id="to" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM locations ");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['area'];?>" <?php if($row['area']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['area'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                        </div>
                                                </div>    
                                               <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Hire Amount :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Hire Amount" id="hramt" maxlength="200" name="hramt" type="text" value="" onkeyup="hiretot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            
                                                    <label class="col-md-2 form-control-label">Commission:</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Commission" id="hrcomm" maxlength="50" name="hrcomm" type="text" value="" onkeyup="hiretot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>


                          </div></div>

                                      <div class="col-xl-6">
                   
               
               <div class="portlet-body">
                <div class="row mg-t-10">
                                                   
                                                      <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>
                                                      <div class="portlet-body">


                                                          
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       
</div></div>
                   
         
                                          <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Goods Details</h6>
                                        </div>

</div>

                                               
                        
                        
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">From :</label>
                                                         <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> 
                        
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Load Type :</label>
                                                       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> 
                        
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Direction :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                </div> 
                                            </div>
                                            
                                                
                       
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">To :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> 
                        
                       

    </div>
     </div></div>

         <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>

   </div>

 
</div>





  </div>

<div id="hidden_div4">

       <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">On Road Details</h6>
</div></div>


 <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Vehicle No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                           

                             <select   name="ltrans" id="from" class="form-control" onChange="getdetails(this.value);" >
                                                           <option selected="selected" value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT DISTINCT vechNo FROM gcentries");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['vechNo']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
<?php
}
?>
</select>




                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>


                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">From :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="ldfrom" maxlength="50" name="ldfrom" type="text" value="" disabled>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div> 



                                                    <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">To :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="ldto" maxlength="50" name="ldto" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div> 

<div class="row mg-t-10">
                                                    
                                                        <label class="col-md-4 form-control-label">Driver :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="bodytype" maxlength="100" name="drivernme" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>

                                                       
                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Changed Driver Name" id="bodytype" maxlength="100" name="cgedrivernme" type="text" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                            
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Advance :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="engineno" maxlength="50" name="madv" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Diesel :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Diesel Amount" id="chasisno" maxlength="50" name="mdiesel" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>


                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Workshop Place :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field policyno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Workshop Place" id="policyno" maxlength="50" name="wshop" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>













         <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>



 </div>
     </div></div></div>
 
</div></div>










<div id="hidden_div7">

       <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Halt Entry</h6>
</div></div>


 <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Vehicle No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                           

                             <select   name="ltrans" id="from" class="form-control" onChange="getdetails(this.value);" >
                                                           <option selected="selected" value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT DISTINCT vechNo FROM gcentries");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['vechNo']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
<?php
}
?>
</select>




                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>


                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">From :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="hltfrom" maxlength="50" name="hltfrom" type="text" value="" disabled>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div> 



                                                    <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">To :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="hltto" maxlength="50" name="hltto" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div> 
                                                      <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Halt Place :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="hltplace" maxlength="50" name="hltplace" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div> 
<div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Halt Days :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div></div>
<div class="row mg-t-10">
                                                    
                                                        <label class="col-md-4 form-control-label">Driver :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="bodytype" maxlength="100" name="drivernme" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>

                                                       
                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Changed Driver Name" id="bodytype" maxlength="100" name="cgedrivernme" type="text" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                            
                                                    </div>
                                                </div>
                                                <!-- <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Advance :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="engineno" maxlength="50" name="madv" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Diesel :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Diesel Amount" id="chasisno" maxlength="50" name="mdiesel" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>


                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Workshop Place :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field policyno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Workshop Place" id="policyno" maxlength="50" name="wshop" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> -->
         <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>



 </div>
     </div></div>
 </div>
</div></div>






<div id="hidden_div8">

       <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Workshop Entry</h6>
</div></div>

<!-- <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Vehicle Preferance:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <label class="ckbox">
  <input type="checkbox" id="retload" value="load">
  <span>With Load</span>
</label>


                                                    <label class="ckbox">
  <input type="checkbox" id="retload" value="load">
  <span>All</span>
</label>
</div>
                                                    </div> -->



 <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Vehicle No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                           

                             <select   name="ltrans" id="from" class="form-control" onChange="getdetails(this.value);" >
                                                           <option selected="selected" value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT DISTINCT vechNo FROM gcentries");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['vechNo']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
<?php
}
?>
</select>




                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>


                                               
                                                      <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Workshop Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="hltplace" maxlength="50" name="hltplace" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>



                                                      <div class="row mg-t-10">
                                       <label class="col-md-4 form-control-label">From Date :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0 ">
                                                           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Entry date" name="mdate" id="wfromdate" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
                                                       </div>
                                                </div>

                                                 <div class="row mg-t-10">
                                       <label class="col-md-4 form-control-label">To Date :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0 ">
                                                           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Entry date" name="mdate" id="wtodate" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
                                                       </div>
                                                </div>
                                                    <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Workshop Place :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div></div> 

                                                          <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Problem Faced :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div></div> 
<div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Bill Number :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div></div>






         <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Bill Amount :</label>
                                                        <div class="col-sm-2 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="wsbillamt" maxlength="200" name="wsbillamt" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>

                                                    <label class="col-md-2 form-control-label">Pay Type :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="wspayt" name="hadvpayt">
              <option value="">---Mode of Pay---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Cheque">Cheque</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Cash">Cash</option>
<script >
                                               
                                                  document.getElementById('wspayt').addEventListener('change', function () {
                                                  var style = this.value == "Cheque" ? 'block' : 'none';
                                                  document.getElementById('workBankdiv').style.display = style;
                                                  
                                                 

});
                                                </script>
            </select>
          </div>

                                                    </div>

<div id="workBankdiv">
  <div class="row mg-t-10">
                                                   <label class="col-md-4 form-control-label">Bank Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="hadvbnknme" maxlength="200" name="hadvbnknme" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            </div>
<div class="row mg-t-10">

                                                   <label class="col-md-4 form-control-label">Cheque Number :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="hadvcqe" maxlength="50" name="hadvcqe" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div></div>







                                                <!-- <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Advance :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="engineno" maxlength="50" name="madv" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Diesel :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Diesel Amount" id="chasisno" maxlength="50" name="mdiesel" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>


                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Workshop Place :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field policyno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Workshop Place" id="policyno" maxlength="50" name="wshop" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> -->
         <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>



 </div>
     </div></div>
 </div>
</div></div>















<div id="hidden_div9">

       <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Accident Entry</h6>
</div></div>

<!-- <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Vehicle Preferance:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <label class="ckbox">
  <input type="checkbox" id="retload" value="load">
  <span>With Load</span>
</label>


                                                    <label class="ckbox">
  <input type="checkbox" id="retload" value="load">
  <span>All</span>
</label>
</div>
                                                    </div> -->



 <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Vehicle No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                           

                             <select   name="ltrans" id="from" class="form-control" onChange="getdetails(this.value);" >
                                                           <option selected="selected" value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT DISTINCT vechNo FROM gcentries");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['vechNo']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
<?php
}
?>
</select>




                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>


                                               
                                                      <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Accident Place :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="hltplace" maxlength="50" name="hltplace" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>



                                                      <div class="row mg-t-10">
                                       <label class="col-md-4 form-control-label">Date :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0 ">
                                                           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Entry date" name="mdate" id="wfromdate" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
                                                       </div>
                                                </div>

                                                 
                                                    <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Driver Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div></div> 

 <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Alternate Vehicle No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                           

                             <select   name="ltrans" id="from" class="form-control" onChange="getdetails(this.value);" >
                                                           <option selected="selected" value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT DISTINCT vechNo FROM gcentries");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['vechNo']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
<?php
}
?>
</select>




                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>

<div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Alternate Vehicle Driver:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div></div>






         <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Bill Amount :</label>
                                                        <div class="col-sm-2 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="wsbillamt" maxlength="200" name="wsbillamt" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>

                                                    <label class="col-md-2 form-control-label">Pay Type :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="wspayt" name="hadvpayt">
              <option value="">---Mode of Pay---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Cheque">Cheque</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Cash">Cash</option>
<script >
                                               
                                                  document.getElementById('wspayt').addEventListener('change', function () {
                                                  var style = this.value == "Cheque" ? 'block' : 'none';
                                                  document.getElementById('workBankdiv').style.display = style;
                                                  
                                                 

});
                                                </script>
            </select>
          </div>

                                                    </div>

<div id="workBankdiv">
  <div class="row mg-t-10">
                                                   <label class="col-md-4 form-control-label">Bank Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="hadvbnknme" maxlength="200" name="hadvbnknme" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            </div>
<div class="row mg-t-10">

                                                   <label class="col-md-4 form-control-label">Cheque Number :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="hadvcqe" maxlength="50" name="hadvcqe" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div></div>







                                                <!-- <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Advance :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="engineno" maxlength="50" name="madv" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Diesel :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Diesel Amount" id="chasisno" maxlength="50" name="mdiesel" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>


                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Workshop Place :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field policyno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Workshop Place" id="policyno" maxlength="50" name="wshop" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> -->
         <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>



 </div>
     </div></div>
 </div>
</div></div>
















<div id="hidden_div5">

       <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Return</h6>
</div></div>


 <!-- <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Vehicle No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                           

                             <select   name="return" id="retform" class="form-control" onChange="getdetails(this.value);" >
                                                           <option selected="selected" value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT DISTINCT vechNo FROM gcentries");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['vechNo']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
<?php
}
?>
</select>




                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> -->


                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">From :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="rldfrom" maxlength="50" name="rldfrom" type="text" value="" disabled>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div> 



                                                    <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">To :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="rldto" maxlength="50" name="rldto" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div> 
                                                    




<div class="row mg-t-10">
                                                    
                                                        <label class="col-md-4 form-control-label">Driver :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="bodytype" maxlength="100" name="drivernme" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>

                                                       
                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Changed Driver Name" id="bodytype" maxlength="100" name="cgedrivernme" type="text" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                            
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Advance :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="engineno" maxlength="50" name="madv" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Diesel :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Diesel Amount" id="chasisno" maxlength="50" name="mdiesel" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>


                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Workshop Place :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field policyno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Workshop Place" id="policyno" maxlength="50" name="wshop" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>


</div></div>
                  





                                                                  
           <div class="col-xl-6">
                       <div class="row mg-t-10">
                                                   
                                                      <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>
                                                             <div class="row mg-t-10">
                                                   
                                                      <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>
               
               <div class="portlet-body" id="hidden_div6">
                <div class="row mg-t-10">
                                                   <label class="col-md-2 form-control-label">Party Name:</label>
                                                      <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Party Name" id="insurancename" maxlength="200" name="lparty" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                         <label class="col-md-2 form-control-label">GC No :</label>
                                                       <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter GC Number" id="permitno" maxlength="50" name="lgcno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div> 
 <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Reference No :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0"> 
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Reference Number" id="insurancename" maxlength="200" name="lrefno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            
                                                    <label class="col-md-2 form-control-label">Container No :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Number" id="retcontno" maxlength="50" name="retcontnos" type="text" value="" onkeypress="return onlyAlpha(event, this);" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>

<script>
 function onlyAlpha(e, t) {
            try {
           
var ctl = document.getElementById('retcontno');
    var startPos = ctl.selectionStart;
    var endPos = ctl.selectionEnd;
    /*alert(startPos + ", " + endPos);
*/

if(endPos<4)

{
                if (window.event) {
                    var charCode = window.event.keyCode;
                   /* alert(charCode);*/
                }
                else if (e) {
                    var charCode = e.which;
                    
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
 }             
 else if(endPos>=4 && endPos<10)
  {
   
               if (window.event) {
                    var charCode = window.event.keyCode;
                   /* alert(charCode);*/
                }
                else if (e) {
                    var charCode = e.which;
                    
                }
                else { return false; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                   return false;
 
                else
                     return true;
                  
  } 

else if(endPos>10)
{

 return false;

}

     }
            catch (err) {
                alert(err.Description);
            }}
       

    
   



</script>
<div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Container Size :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="mstatus" name="lcontsze">
              <option value="">---Select Container Size---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?> selected="selected" value="20">20</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="40">40</option>

            </select>
          </div>


           
                                                    <label class="col-md-2 form-control-label">Container Weight :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Weight" id="permitno" maxlength="50" name="lcontwt" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                </div> 
        </div>

        <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Load Type :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="gdstype" name="ldtype">
              <option value="">---Select Goods---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Import">Import</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Export">Export</option>
<script >
                                               
                                                  document.getElementById('gdstype').addEventListener('change', function () {
                                                  var style = this.value == "Export" ? 'block' : 'none';
                                                  document.getElementById('sealdiv').style.display = style;
                                                  document.getElementById('seallabel').style.display = style;
                                                 

});
                                                </script>
            </select>
          </div>

                        
                                                    <label class="col-md-2 form-control-label" id="seallabel" style="display: none">Seal No :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0" id="sealdiv">
                                                            <input id="sealdiv" class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Seal Number."  maxlength="200" name="sealno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                   
                                                </div>



        </div>
        

                                               
                                                 <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Remarks :</label>
                                                         <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Remarks Here" id="insurancename" maxlength="200" name="lrem" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>


</div></div>


 </div>

  <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>


</div>

       

</div>





 

     </div>




<!--                    Load Details Start of an GC                          -->


   <div id="hidden_div">

       <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Load Details</h6>
</div></div>
                                  
                                            
                                                    
                                                 
                                                       <div class="row mg-t-10">
                                                        <label class="col-md-2 form-control-label"> Ref No :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Ref. No." name="refno" id="ID_UNIQUE">
                <span class="input-group-btn">
                  <button class="btn bd bg-white tx-gray-600" type="button"><i class="icon ion-refresh" onclick="reload()" ></i></button>
                </span>
              </div></div>
                            
                                                        </div>
                                                    <!-- </div> -->

<script>
  function reload()
  {
    var randomNum =  Math.floor(1000 + Math.random() * 9000);
      
      var elem = document.getElementById("ID_UNIQUE").value = randomNum;
  }



</script>

                                                    <script>
      var now = new Date();
      var randomNum =  Math.floor(1000 + Math.random() * 9000);
      
      var elem = document.getElementById("ID_UNIQUE").value = randomNum;
    </script>



               <div class="row mg-t-10">
                                                        <label class="col-md-2 form-control-label"> From :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">

       <select   name="mfrom" id="from" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM locations");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['area'];?>" <?php if($row['area']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['area'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                        </div>
                            
                              
                                                        <label class="col-md-2 form-control-label"> To :</label>
                                                        <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                                                             <select   name="mto" id="to" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM locations ");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['area'];?>" <?php if($row['area']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['area'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                        </div>
                                                </div>                                   
                                              
                                                <div class="row mg-t-10">
                                                        <label class="col-md-2 form-control-label"> Company :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                           <select   name="lcompany" id="from" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM companies");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>

 
<label class="col-md-2 form-control-label"> Transporter:</label>
                                                        <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                                                           <select   name="ltrans" id="from" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM transporters");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                          </div>
                                                        
</div>

                
<div class="row mg-t-10">
                                                        <label class="col-md-2 form-control-label"> Driver  :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                             <select   name="ldriv" id="from" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM drivers ");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                            
                                                           </div>
                                                        <div class="col-md-4">
                              <span style="padding-right:20px;"><button type="button" class="ion-plus-circled tx-16 lh-0 op-6" data-toggle="modal" data-target="#modaldemo1" ></button></span><span style=" font-size: 20px;  ">Add GC</span>

                                                        </div>
                                                    </div>

<div id="modaldemo1" class="modal fade">
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header pd-y-20 pd-x-25">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Consigner & Consignee Details</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
             
                
          <div class="modal-body pd-25">
                                                     <div class="row mg-t-10">
                                                        <label class="col-md-2 form-control-label">ASS Log. GC No :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter GC Number" id="yourText" maxlength="100" name="assgc" value="" type="text"  >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        </div>
                                            </div>  


                                                <div class="row mg-t-10">
                                                        <label class="col-md-2 form-control-label">Consigner Name :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                             <select   name="csernme" id="csernme" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM customer where custtype = 'cosignor'");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                            
                                                        </div>
                                                    </div>






<div class="row mg-t-10">
                                                   <label class="col-md-2 form-control-label">Consignee Name :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <select   name="cseenme" id="cseenme" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM customer where custtype = 'consignee'");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>





                                                     <div class="row mg-t-10">
                                                       <label class="col-md-2 form-control-label"> Articles  :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="No. of Articles" id="articles" maxlength="50" name="artilces" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                   
                                                    <label class="col-md-2 form-control-label"> Value  :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Goods Value." id="value" maxlength="50" name="lgdsvalue" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                          </div> </div>
                                                
                                               <div class="row mg-t-10">
                                                        <label class="col-md-2 form-control-label">Description :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="desc" maxlength="50" name="ldesc" type="text" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div> 

          <div class="modal-footer">
            <button type="button" class="btn btn-info pd-x-20" data-dismiss="modal" >Done</button>
            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
          </div>
       </div></div>






      </div><!-- modal-dialog -->





    </div>


<div class="row mg-t-10">
                                                   <label class="col-md-2 form-control-label">Party Name:</label>
                                                      <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Party Name" id="insurancename" maxlength="200" name="lparty" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>

 </div></div>

                                      <div class="col-xl-6">
                   
               
               <div class="portlet-body">
                <div class="row mg-t-10">
                                                   
                                                      <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>
                                                      <div class="portlet-body">
   <div class="row mg-t-10">
                                                         <label class="col-md-2 form-control-label">GC No :</label>
                                                       <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter GC Number" id="permitno" maxlength="50" name="lgcno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div> 

  <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Reference No :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Reference Number" id="insurancename" maxlength="200" name="lrefno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            
                                                    <label class="col-md-2 form-control-label">Container No :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Number" id="ldcontno" maxlength="50" name="lcontno" type="text" value="" onkeypress="return onlyAlphabets(event,this);">

                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>




<script>
 function onlyAlphabets(e, t) {
            try {
           
var ctl = document.getElementById('ldcontno');
    var startPos = ctl.selectionStart;
    var endPos = ctl.selectionEnd;
    /*alert(startPos + ", " + endPos);
*/

if(endPos<4)

{
                if (window.event) {
                    var charCode = window.event.keyCode;
                   /* alert(charCode);*/
                }
                else if (e) {
                    var charCode = e.which;
                    
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
 }             
 else if(endPos>=4 && endPos<10)
  {
   
               if (window.event) {
                    var charCode = window.event.keyCode;
                   /* alert(charCode);*/
                }
                else if (e) {
                    var charCode = e.which;
                    
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                   return false;
 
                else
                     return true;
                  
  } 

else if(endPos>10)
{

 return false;

}

     }
            catch (err) {
                alert(err.Description);
            }}
       

    
   



</script>

<div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Container Size :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="mstatus" name="lcontsze">
              <option value="">---Select Container Size---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?> selected="selected" value="20">20</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="40">40</option>

            </select>
          </div>


           
                                                    <label class="col-md-2 form-control-label">Container Weight :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Weight" id="permitno" maxlength="50" name="lcontwt" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                </div> 
        </div>

        <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Load Type :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="gdstype2" name="ldtype2">
              <option value="">---Select Goods---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Import">Import</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Export">Export</option>
<script >
                                               
                                                  document.getElementById('gdstype2').addEventListener('change', function () {
                                                  var style = this.value == "Export" ? 'block' : 'none';
                                                  document.getElementById('sealdiv2').style.display = style;
                                                  document.getElementById('seallabel2').style.display = style;
                                                 

});
                                                </script>
            </select>
          </div>

                        
                                                    <label class="col-md-2 form-control-label" id="seallabel2" style="display: none">Seal No :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0" id="sealdiv2">
                                                            <input id="sealdiv2" class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Seal Number."  maxlength="200" name="sealno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                   
                                                </div>



        </div>
        

                                               
                                                 <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Remarks :</label>
                                                         <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Remarks Here" id="insurancename" maxlength="200" name="lrem" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                             
         
                                      

    </div>
     </div></div></div>
 
</div></div>




















   <div id="hidden_div2">

       <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Frieght Details</h6>
</div></div>
                                  
                                                                                
                                                <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Freight Amount :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="amt_cal form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Freight Amount" id="lfreightamt" maxlength="200" name="lfreightamt" type="text" value="" onkeyup= "fintot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            
                                                    <label class="col-md-2 form-control-label">Loading Charges :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Loading Charges" id="lldngcgs" maxlength="50" name="fldngcgs" type="text" value="" onkeyup= "fintot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>

                                                
                                              
                                               <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Un-Loading Charges :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="amt_cal form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Un Loading Charges" id="luldngcgs" maxlength="200" name="fuldngcgs" type="text" value="" onkeyup= "fintot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            
                                                    <label class="col-md-2 form-control-label">Weigh Bill Charges :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Weigh Bill Charges" id="lwbillcgs" maxlength="50" name="fwbillcgs" type="text" value="" onkeyup= "fintot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>

                
 <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Other Amount :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            
                                                       
                                                            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Other Amount" id="lotramt" maxlength="50" name="fotramt" type="text" value="" onkeyup= "fintot()"><span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span> </div>

                                                        <label class="col-md-2 form-control-label">Other Description:</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Description" id="lodes" maxlength="200" name="fodesc" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                    </div>

<div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Halt Days :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            
                                                    <label class="col-md-2 form-control-label">Rate :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Halt Rate" id="hltrate" maxlength="50" name="fhltrate" type="text" value="" 
                                                            onkeyup="fval()" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
<script>
function fval()
{
  if((event.keyCode||event.which) != 9)
{
  var total = 0;

var val1 = document.getElementById('lhltdays').value;
var val2 = document.getElementById('hltrate').value;
       if (val1 == "")
           val1 = 0;
         if (val2 == "")
           val2 = 0;
total = parseFloat(val1)*parseFloat(val2) ;
var res = isNaN(total);

if(res == true)
{
document.getElementById('lhltamt').value = 0;
document.getElementById('lhltamth').value=0;
}
else
{
  document.getElementById('lhltamt').value=total;
    document.getElementById('lhltamth').value=total;
  fintot();
}
}}
</script>


                                                <div class="row mg-t-10">
                                                    
                                                        <label class="col-md-2 form-control-label">Halt Amount :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="amt_cal form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="lhltamt" maxlength="100" name="fhltamt" value="" type="text" disabled >
                                                            <input class="amt_cal form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="lhltamth" maxlength="100" name="fhltamth" value="" type="hidden"  >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        </div>
                                            </div>

<script>
function fintot()
{
  if((event.keyCode||event.which) != 9)
{
  
var va1 = document.getElementById('lfreightamt').value;
var va2 = document.getElementById('lldngcgs').value;
var va3 = document.getElementById('luldngcgs').value;
var va4 = document.getElementById('lwbillcgs').value;
var va5 = document.getElementById('lotramt').value;
var va6 = document.getElementById('lhltamt').value;
         if (va1 == "")
           va1 = 0;
         if (va2 == "")
           va2 = 0;
         if (va3 == "")
           va3 = 0;
         if (va4 == "")
           va4 = 0;
         if (va5 == "")
           va5 = 0;
         if (va6 == "")
           va6 = 0;


var total =  parseFloat(va1)+parseFloat(va2)+parseFloat(va3)+parseFloat(va4)+parseFloat(va5)+parseFloat(va6);

document.getElementById('ldhireamt').value=va1;
document.getElementById('ldhldngcgs').value=va2;
document.getElementById('ldhuldngcgs').value=va3;
document.getElementById('ldhwbillcgs').value=va4;
document.getElementById('ldhotramt').value=va5;
var com=document.getElementById('ldhcomm').value;
document.getElementById('ldhttlfreight').value=total-com;


var res = isNaN(total);
if(res == true)
{
document.getElementById('ttlfreight').value = 0;
document.getElementById('ttlfreighth').value=0;
totval();
}
else
{
  document.getElementById('ttlfreight').value=total;
  document.getElementById('ttlfreighth').value=total;
  totval();
}
}}
</script>


<!-- 
 <script>
  
    //iterate through each textboxes and add keyup
    //handler to trigger sum event
    $(".amt_cal").each(function() {
 alert('working');
      $(this).keyup(function(){
         alert('working2');
        calculateSum();
       
      });
    }); 

  function calculateSum() {

    var sum = 0;
    //iterate through each textboxes and add the values
    $(".amt_cal").each(function() {

      //add only if the value is number
      if(!isNaN(this.value) && this.value.length!=0) {
        sum += parseFloat(this.value);
      }

    });
    alert(sum);
    //.toFixed() method will roundoff the final sum to 2 decimal places
    $("#ttlfreight").value(sum.toFixed(2));
  }
</script> -->

                                               <div class="row mg-t-10">
                                                    
                                                        <label class="col-md-2 form-control-label">Total Frieght :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="ttlfreight" maxlength="100" name="fttlfreight" value="" type="text" disabled >
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="ttlfreighth" maxlength="100" name="fttlfreighth" value="" type="hidden" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        </div>
                                            </div>


                                                <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Adv. Cash Amount :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="advcsh" maxlength="200" name="fadvcsh" type="text" value="" onkeyup="totval()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="col-sm-6 mg-t-5 mg-sm-t-0">
                                                           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Cash Date" name="fadvcshdte" id="datepicker009" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                      
                                                        </div>
                                                    </div>


  <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Adv. Cheq Amount. :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="advcqe" maxlength="200" name="fadvcqe" type="text" value="" onkeyup="totval()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="col-sm-6 mg-t-5 mg-sm-t-0">
                                                           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Cheque Date" name="fadvcqedte" id="datepicker007" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                      
                                                        </div>
                                                    </div>

 <div class="row mg-t-10">
                                                   <label class="col-md-2 form-control-label">Bank:</label>
                                                      <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Bank Name" id="bankname" maxlength="200" name="fadvbankname" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>



<div class="row mg-t-10">
                                                    
                                                        <label class="col-md-2 form-control-label">Cheque Number :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Cheque Number" id="cheqno" maxlength="100" name="fadvcheqno" type="text" value=""  >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        </div>
                                            </div>
<script>
function totval()
{
if((event.keyCode||event.which) != 9)
{
  
var valu1 = document.getElementById('advcsh').value;
var valu2 = document.getElementById('advcqe').value;
var valu3 = document.getElementById('ttlfreight').value;
 if (valu1 == "")
           valu1 = 0;
         if (valu2 == "")
           valu2 = 0;
          if (valu3 == "")
           valu3 = 0;
         var total =  parseFloat(valu3)-parseFloat(valu1)-parseFloat(valu2);

var res = isNaN(total);
if(res == true)
{
document.getElementById('frtbal').value = 0;
document.getElementById('frtbalh').value = 0;

}
else
{
  document.getElementById('frtbal').value=total;
 document.getElementById('frtbalh').value=total;
}
}}
</script>



<div class="row mg-t-10">
                                                    
                                                        <label class="col-md-2 form-control-label">Freight Balance :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Freight Balance" id="frtbal" maxlength="100" name="frtbal" value="" type="text" disabled >
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Freight Balance" id="frtbalh" maxlength="100" name="frtbalh" value="" type="hidden" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        </div>
                                            </div>









 </div></div>

                                      <div class="col-xl-6">
                   
               
               <div class="portlet-body">
                <div class="row mg-t-10">
                                                   
                                                      <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>
                                                      <div class="portlet-body">


                                                          
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Diesel Details</h6>
</div></div>




                <div class="row mg-t-10">
                                                   
                                                      <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>

                                                     <div class="row mg-t-10">
                                                      <label class="col-md-2 form-control-label">Date :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0 ">
                                                           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Entry date" name="dieseldate" id="datepicker006" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
                                                </div>
                                              </div></div>
                                               <div class="row mg-t-10">
                                                        <label class="col-md-2 form-control-label">Vendor :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Details" id="vendor" maxlength="50" name="vendor" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>



 <div class="row mg-t-10">
                                            
                                                
                                                    <label class="col-md-2 form-control-label">Pay Type:</label>                                                    
                                                    <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                        
                                                        <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="biltypaidtype" name="diepay" style="padding:0px 6px !important;">
<option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
<option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>
<option <?php if($insid[0]['billtype']=="To Pay") echo 'selected="selected"'; ?>  value="To Pay">To Pay</option>
</select>
                                                        
                                                    </div>
                                                </div>









                                                  
 <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Quantity :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="dieqty" maxlength="200" name="dieqty" type="text" value="" onkeyup="diecal()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            
                                                    <label class="col-md-2 form-control-label">Price Per Litre :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="dieppl" maxlength="50" name="dieppl" type="text" value="" disabled>
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="diepplh" maxlength="50" name="diepplh" type="hidden" value="" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                                     <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Amount :</label>
                                                         <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="dieamt" maxlength="200" name="dieamt" type="text" value="" onkeyup="diecal()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
                                                    </div>
                                                </div>
                                             
         <script>
function diecal()
{
if((event.keyCode||event.which) != 9)
{

  
var die1 = document.getElementById('dieqty').value;
var die2 = document.getElementById('dieamt').value;
 if (die1 == "")
           die1 = 0;
         if (die2 == "")
           die2 = 0;
          
         var total =  parseFloat(die2)/parseFloat(die1);

var res = isNaN(total);
if(res == true)
{
document.getElementById('dieppl').value = 0;
document.getElementById('diepplh').value = 0;
}
else
{
  document.getElementById('dieppl').value=total;
   document.getElementById('diepplh').value=total;
}
}}
</script>
                                        <!--    <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Goods Details</h6>
                                        </div>

</div>

                                               
                        
                        
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">From :</label>
                                                         <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> 
                        
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Load Type :</label>
                                                       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> 
                        
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Direction :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                </div> 
                                            </div>
                                            
                                                
                       
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">To :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> -->
                        
                       

    </div>
     </div></div></div>
 
</div></div>










       <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Hire Details</h6>
</div></div>
                               
                                  <!-- <div class="row mg-t-10">
<label class="col-md-2 form-control-label"> Transporter :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                           <select   name="ltrans" id="from" class="form-control"  >
                                                           <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM transporters");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
<?php
}
?>
</select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                          </div>
                                                        </div>
                                                                                
                                               <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Bill Details :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bill No" id="hbilldet" maxlength="200" name="hbilldet" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="col-sm-6 mg-t-5 mg-sm-t-0">
                                                           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Bill Date" name="hdte" id="datepicker0011" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                      
                                                        </div>
                                                    </div>
 -->
                                                
                                              
                                               <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Hire Amount :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Hire Amount" id="ldhireamt" maxlength="200" name="ldhireamt" type="text" value="" onkeyup="hiretot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>

                                                   
                                            
                                                    <label class="col-md-2 form-control-label">Commission:</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Commission" id="ldhcomm" maxlength="50" name="ldhcomm" type="text" value="500" onkeyup="hiretot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>

                
 <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Loading Charges :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Loading Charges" id="ldhldngcgs" maxlength="50" name="ldhldngcgs" type="text" value="" onkeyup="hiretot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>

                                                        <label class="col-md-2 form-control-label">Un-Loading Charges :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Un-Loading Charges" id="ldhuldngcgs" maxlength="200" name="ldhuldngcgs" type="text" value="" onkeyup="hiretot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>  
                                                    </div>

<div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Weigh Bill Charges :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Weigh Bill Charges" id="ldhwbillcgs" maxlength="50" name="ldhwbillcgs" type="text" value="" onkeyup="hiretot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div></div>
<div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Other Amount :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Other Amount" id="ldhotramt" maxlength="50" name="ldhotramt" type="text" value="" onkeyup="hiretot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>

                                                        <label class="col-md-2 form-control-label">Other Description:</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Description" id="ldhodes" maxlength="200" name="ldhodes" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                    </div>
                                                                                                        

<div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Halt Days :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="ldhhltdays" maxlength="200" name="ldhhltdays" type="text" value="" onkeyup="htot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            
                                                    <label class="col-md-2 form-control-label">Rate :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Halt Rate" id="ldhhltrate" maxlength="50" name="hhltrate" type="text" value="" onkeyup="htot()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
<script>
function htot()
{
  if((event.keyCode||event.which) != 9)
{
  var total = 0;

var val1 = document.getElementById('ldhhltdays').value;

var val2 = document.getElementById('ldhhltrate').value;
       if (val1 == "")
           val1 = 0;
         if (val2 == "")
           val2 = 0;
total = parseFloat(val1)*parseFloat(val2) ;
var res = isNaN(total);
if(res == true)
{
document.getElementById('ldhhltamt').value = 0;
document.getElementById('hhltamth').value=0;
}
else
{
  document.getElementById('ldhhltamt').value=total;
  document.getElementById('ldhhltamth').value=total;
  hiretot();
}
}}
</script>

                                                <div class="row mg-t-10">
                                                    
                                                        <label class="col-md-2 form-control-label">Halt Amount :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="ldhhltamt" maxlength="100" name="ldhhltamt" value="" type="text" disabled >
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="ldhhltamth" maxlength="100" name="ldhhltamth" value="" type="hidden" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        </div>
                                            </div>

<script>

function hiretot()
{
  if((event.keyCode||event.which) != 9)
{
  
var value1 = document.getElementById('ldhireamt').value;
var value2 = document.getElementById('ldhcomm').value;
var value3 = document.getElementById('ldhldngcgs').value;
var value4 = document.getElementById('ldhuldngcgs').value;
var value5 = document.getElementById('ldhwbillcgs').value;
var value6 = document.getElementById('ldhotramt').value;
var value7 = document.getElementById('ldhhltamt').value;
         if (value1 == "")
           value1 = 0;
         if (value2 == "")
           value2 = 0;
         if (value3 == "")
           value3 = 0;
         if (value4 == "")
           value4 = 0;
         if (value5 == "")
           value5 = 0;
         if (value6 == "")
           value6 = 0;
         if (value7 == "")
           value7 = 0;


var total =  parseFloat(value1)-parseFloat(value2)+parseFloat(value3)+parseFloat(value4)+parseFloat(value5)+parseFloat(value6)+parseFloat(value7);

var res = isNaN(total);
if(res == true)
{
document.getElementById('ldhttlfreight').value = 0;
document.getElementById('ldhttlfreighth').value=0;
/*totval();*/
hirebal();
}
else
{
  document.getElementById('ldhttlfreight').value=total;
  document.getElementById('ldhttlfreighth').value=total;
  /*totval();*/
  hirebal();
}
}}
</script>





                                               <div class="row mg-t-10">
                                                    
                                                        <label class="col-md-2 form-control-label">Total Frieght :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="ldhttlfreight" maxlength="100" name="ldhttlfreight" value="" type="text" disabled >
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="ldhttlfreighth" maxlength="100" name="ldhttlfreighth" value="" type="hidden">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        </div>
                                            </div>





 </div></div>

                                      <div class="col-xl-6">
                   
               
               <div class="portlet-body">
                <div class="row mg-t-10">
                                                   
                                                      <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>
                                                      <div class="portlet-body">


                                                          
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       
</div></div>




                <div class="row mg-t-10">
                                                   
                                                      <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>

 


                                                <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Chn. Advance :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="ldhadv" maxlength="200" name="ldhadv" type="text" value="" onkeyup="totadvval()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <label class="col-md-2 form-control-label">Pay Type :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="ldhadvpayt" name="ldhadvpayt">
              <option value="">---Mode of Pay---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Cheque">Cheque</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Cash">Cash</option>
<script >
                                               
                                                  document.getElementById('ldhadvpayt').addEventListener('change', function () {
                                                  var style = this.value == "Cheque" ? 'block' : 'none';
                                                  document.getElementById('Bankdiv').style.display = style;
                                                  
                                                 

});
                                                </script>
            </select>
          </div>

                                                    </div>

<div id="Bankdiv">
  <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Bank Name:</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="hadvbnknme" maxlength="200" name="hadvbnknme" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            
                                                    <label class="col-md-2 form-control-label">Cheque No:</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="hadvcqe" maxlength="50" name="hadvcqe" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div></div>


<div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">MKM Advance :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="ldmkmadv" maxlength="200" name="ldmkmadv" type="text" value="" onkeyup="totadvval()">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <label class="col-md-2 form-control-label">Pay Type :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="mkmpaytype" name="mkmpaytype">
              <option value="">---Mode of Pay---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Cheque">Cheque</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Cash">Cash</option>
<script >
                                               
                                                  document.getElementById('mkmpaytype').addEventListener('change', function () {
                                                  var style = this.value == "Cheque" ? 'block' : 'none';
                                                  document.getElementById('mkmbankdiv').style.display = style;
                                                  
                                                 

});
                                                </script>
            </select>
          </div>

                                                    </div>

<div id="mkmbankdiv">
  <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Bank Name:</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="mkmbnknme" maxlength="200" name="mkmbnknme" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                            
                                                    <label class="col-md-2 form-control-label">Cheque No:</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="mkmcqe" maxlength="50" name="mkmcqe" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div></div>

<script>
function totadvval()
{
if((event.keyCode||event.which) != 9)
{
  
var valu1 = document.getElementById('ldhadv').value;
var valu2 = document.getElementById('ldmkmadv').value;
 if(valu1 == "")
           valu1 = 0;
         if (valu2 == "")
           valu2 = 0;
         var total = parseFloat(valu1)+parseFloat(valu2);

var res = isNaN(total);
if(res == true)
{
 document.getElementById('ldhtotadv').value = 0;
 document.getElementById('ldhtotadvh').value = 0;
hirebal();
}
else
{
 document.getElementById('ldhtotadv').value=total;
 document.getElementById('ldhtotadvh').value=total;
hirebal();
}
}}
</script>









 <div class="row mg-t-10">
                                                    
                                                        <label class="col-md-2 form-control-label">Total Advance :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="ldhtotadv" maxlength="100" name="ldhtotadv" value="" type="text" disabled >
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="ldhtotadvh" maxlength="100" name="ldhtotadvh" value="" type="hidden" >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        </div>
                                            </div>


 <div class="row mg-t-10">
                                                    <label class="col-md-2 form-control-label">Diesel Adv.:</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="ldhtdadv" maxlength="50" name="ldhtdadv" type="text" value="" onkeyup="hirebal()">

                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                            
                                                    <label class="col-md-2 form-control-label">Diesel Qty.:</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="ldhtdqty" maxlength="50" name="ldhtdqty" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>


<script>
function hirebal()
{
if((event.keyCode||event.which) != 9)
{
  
var valu1 = document.getElementById('ldhtdadv').value;
var valu2 = document.getElementById('ldhtotadv').value;
var valu3 = document.getElementById('ldhttlfreight').value;
 if(valu1 == "")
           valu1 = 0;
         if (valu2 == "")
           valu2 = 0;
         if (valu3 == "")
           valu3 = 0;
         var total = parseFloat(valu3)-parseFloat(valu1)-parseFloat(valu2);

var res = isNaN(total);
if(res == true)
{
 document.getElementById('ldhbal').value = 0;
 document.getElementById('ldhbalh').value = 0;

}
else
{
 document.getElementById('ldhbal').value=total;
 document.getElementById('ldhbalh').value=total;

}
}}
</script>




<div class="row mg-t-10">
                                                    
                                                        <label class="col-md-2 form-control-label">Hire Balance :</label>
                                                        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="ldhbal" maxlength="100" name="ldhbal" value="" type="text" disabled >

                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="ldhbalh" maxlength="100" name="ldhbalh" value="" type="hidden"  >
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        </div>
                                            </div>





                                             
         
                                        <!--    <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Goods Details</h6>
                                        </div>

</div>

                                               
                        
                        
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">From :</label>
                                                         <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> 
                        
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Load Type :</label>
                                                       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> 
                        
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Direction :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                </div> 
                                            </div>
                                            
                                                
                       
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">To :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> -->
                        
                       

    </div>
     </div></div></div>
 
</div>





  </div>
 

      


                         <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>


                                    </div>

          
      
      </div><!-- am-pagebody -->
    </form>
      <?php include('../include/adminfooter.php'); ?> 


        <script src="../lib/jquery/jquery.js"></script>
    
    
    <script src="../lib/jquery-ui/jquery-ui.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>  
    
    <script>
      $(function(){

        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });

        // Select2 with tagging support
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true,
          numberOfMonths: 2
        });

        // Color picker
        $('#colorpicker').spectrum({
          color: '#17A2B8'
        });

        $('#showAlpha').spectrum({
          color: 'rgba(23,162,184,0.5)',
          showAlpha: true
        });

        $('#showPaletteOnly').spectrum({
            showPaletteOnly: true,
            showPalette:true,
            color: '#DC3545',
            palette: [
                ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
                ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
            ]
        });

      });
    </script>
     <script>
     function getvech(val) {
      $.ajax({
        type: "POST",
        type: "POST",
        url: "getvech.php",
        data:'vech_id='+val,
        success: function(data){ 
          $("#vechname").val(data);
          $("#vechnameh").val(data);
        }
      });
    }
  </script>

<script>
     function getdetails(val) {
      $.ajax({
        type: "POST",
        type: "POST",
        url: "get_details.php",
        data:'vech_id='+val,
        dataType: "json",
        success: function(data){
          $("#ldfrome").val(data.from);
          $("#ldtoe").val(data.to);
          /*$("#rldfrom").val(data.to);
          $("#rldto").val(data.from);
          $("#hltfrom").val(data.to);
          $("#hltto").val(data.from);
          $("#hltplace").val(data.from);
          */
        }
      });
    }
  </script>

  <script>
     function getstate(val) {
      $.ajax({
        type: "POST",
        type: "POST",
        url: "get_vstate.php",
        data:'vech_id='+val,
       /* dataType: "json",*/
        success: function(data){

          $("#printarea").html(data);
          getdetails(val);
     getstatus(val);
          
        /* if(data.from != null)
         {
     $("#statusid").html("Status : On "+data.stat +"<br> From : "+data.from+"<br> To : "+data.to );  
         
         }else{
               
           $("#statusid").html("Status : Free <br> Vehicle Available.");
 }   */    }
      });
    }
  </script>

<script>
 $(function() {
     $( ".datepicker" ).datepicker();
$( ".datepicker" ).datepicker('option', 'dateFormat' , 'dd/mm/yy');
});
</script>

<script>
function findTotal(){
  alert("Add");
    var arr = document.getElementsById('add');
    var alert("Add");alert("Add");alert("Add");=0;
    for(var i=0;i<arr.length;i++){
        if(parseFloat(arr[i].value))
            tot += parseFloat(arr[i].value);
    }
    alert(tot);
    document.getElementById('ttlfreight').value = tot;
}

    </script>

<script>
     function getstatus(val) {
      $.ajax({
        type: "POST",
        type: "POST",
        url: "get_status.php",
        data:'status_id='+val,
        success: function(data){ 
          $("#mainstatus").html(data);
        }
      });
    }
  </script>