`<?php include('../include/dbConnect.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); ?>
<?php include('../include/leftmenu.php');  
require('../include/basefunctions.php');
?>


<?php
$data = new Basefunc;  
if(isset($_POST['submit'])){
$uid = array(
      "tripid"              =>     mysqli_real_escape_string($data->con, $_POST['refno'])
   );

/*echo '<script> alert("'.$_POST['refno'].'");</script>';*/
if($_POST['triptype']=="Load")
{
 $upd_load = array(
        
         /*  *****For GC  ==>>  "ass_gc_no"        =>     mysqli_real_escape_string($data->con, $_POST['assgc']),  */
       "from_place"       =>     mysqli_real_escape_string($data->con, $_POST['loadfrom']), 
        "to_place"         =>     mysqli_real_escape_string($data->con, $_POST['loadto']), 
        "driver"           =>     mysqli_real_escape_string($data->con, $_POST['loaddriver']),
        "party_name"       =>     mysqli_real_escape_string($data->con, $_POST['loadparty']), 
        "party_gc"         =>     mysqli_real_escape_string($data->con, $_POST['loadgcno']), 
        "ref_no"           =>     mysqli_real_escape_string($data->con, $_POST['loadrefno']),
        "cont_no"          =>     mysqli_real_escape_string($data->con, $_POST['loadcontno']),  
        "contsize"         =>     mysqli_real_escape_string($data->con, $_POST['loadcontsize']), 
        "cont_wt"          =>     mysqli_real_escape_string($data->con, $_POST['loadcontwt']),
        "load_type"        =>     mysqli_real_escape_string($data->con, $_POST['contloadtype']), 
        "sealno"           =>     mysqli_real_escape_string($data->con, $_POST['sealno']), 
        "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['loadrem']) 
      ); 
 $upd_loadid = $data->update('load_det',$upd_load,$uid);
 $ins_frt = array(
        
        "amount"                  =>     mysqli_real_escape_string($data->con, $_POST['frt_amt']),    
        "loading_charge"          =>     mysqli_real_escape_string($data->con, $_POST['frt_ldg_chrg']),
        "unloading_charge"        =>     mysqli_real_escape_string($data->con, $_POST['frt_unldg_chrg']),    
        "weight_bill_charge"      =>     mysqli_real_escape_string($data->con, $_POST['frt_weigh_crg']), 
        "others_amount"           =>     mysqli_real_escape_string($data->con, $_POST['frt_other_crg']), 
        "others_description"      =>     mysqli_real_escape_string($data->con, $_POST['frt_other_desc']), 
        "halt_days"               =>     mysqli_real_escape_string($data->con, $_POST['frt_hlt_days']),
        "halt_rate"               =>     mysqli_real_escape_string($data->con, $_POST['frt_hlt_rate']),  
        "halt_amount"             =>     mysqli_real_escape_string($data->con, $_POST['frt_hlt_amt']), 
        "total_freight"           =>     mysqli_real_escape_string($data->con, $_POST['frt_total']), 
        "advance_cash_amount"     =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cash']), 
        "adv_cash_date"           =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cash_dte']), 
        "advance_cheque_amount"   =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cqe']), 
        "adv_cque_date"           =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cqe_dte']),    
        "bank"                    =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cqe_bnk']),  
        "cheque_no"               =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cqe_num']), 
        "balance"                 =>     mysqli_real_escape_string($data->con, $_POST['frt_bal'])
      ); 
 $upd_frtid = $data->update('frieghtdetails',$ins_frt,$uid);
$ins_hire = array(
        "hire_amount"            =>     mysqli_real_escape_string($data->con, $_POST['hire_amt']),    
        "commision"              =>     mysqli_real_escape_string($data->con, $_POST['hire_comm']), 
        "loading_charge"         =>     mysqli_real_escape_string($data->con, $_POST['hire_ldng_crgs']), 
        "unloading_charge"       =>     mysqli_real_escape_string($data->con, $_POST['hire_unldng_crgs']), 
        "weight_bill_charge"     =>     mysqli_real_escape_string($data->con, $_POST['hire_weigh_crgs']),
        "other_description"      =>     mysqli_real_escape_string($data->con, $_POST['hire_other_des']),  
        "other_amount"           =>     mysqli_real_escape_string($data->con, $_POST['hire_other_amt']), 
        "halt_days"              =>     mysqli_real_escape_string($data->con, $_POST['hire_halt_days']), 
        "halt_rate"              =>     mysqli_real_escape_string($data->con, $_POST['hire_halt_rate']), 
        "halt_amount"            =>     mysqli_real_escape_string($data->con, $_POST['hire_halt_amt']), 
        "total_hire"             =>     mysqli_real_escape_string($data->con, $_POST['hire_frt_total']), 
        "chn_advance"            =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),    
        "bank"                   =>     mysqli_real_escape_string($data->con, $_POST['hire_chn_bank']), 
        "cheque_no"              =>     mysqli_real_escape_string($data->con, $_POST['hire_chn_cque']), 
        "mkm_adv"                =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),
        "mkm_bank"               =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_bank']),  
        "mkm_cque_no"            =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_cque']), 
        "total_cash_advance"     =>     mysqli_real_escape_string($data->con, $_POST['hire_total_adv']), 
        "total_diesel_advance"   =>     mysqli_real_escape_string($data->con, $_POST['hire_diesel_adv']), 
        "total_diesel_quantity"  =>     mysqli_real_escape_string($data->con, $_POST['hire_diesel_qty']),
        "hire_balance"           =>     mysqli_real_escape_string($data->con, $_POST['hire_balance'])
      ); 
      $inshire = $data->update('load_hire', $ins_hire);
 if($upd_frtid&&$upd_loadid){

        echo '<script> alert("Load Updated");window.location.assign("viewgc.php");</script>';
      } 
      else{
        echo '<script> alert("Error Trip Module");</script>';
      }




}
else {
 $ins_return = array(
        "driver"           =>     mysqli_real_escape_string($data->con, $_POST['return_driverid']), 
        "driver_change"    =>     mysqli_real_escape_string($data->con, $_POST['return_driver_cnge']), 
        "return_adv"       =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),  
        "party_name"       =>     mysqli_real_escape_string($data->con, $_POST['ret_party_name']), 
        "party_gc"         =>     mysqli_real_escape_string($data->con, $_POST['ret_gc']), 
        "ref_no"           =>     mysqli_real_escape_string($data->con, $_POST['ret_ref']),
        "cont_no"          =>     mysqli_real_escape_string($data->con, $_POST['ret_cont_no']),  
        "cont_size"        =>     mysqli_real_escape_string($data->con, $_POST['ret_cont_size']), 
        "cont_wt"          =>     mysqli_real_escape_string($data->con, $_POST['ret_cont_wt']),
        "load_type"        =>     mysqli_real_escape_string($data->con, $_POST['ret_cont_load']), 
        "sealno"           =>     mysqli_real_escape_string($data->con, $_POST['ret_seal_no']), 
        "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['ret_rem']) 
      ); 
 $upd_retid = $data->update('load_return',$ins_return,$uid);
 
 if($upd_retid){

        echo '<script> alert("Return Trip Updated");window.location.assign("viewgc.php");</script>';
      } 
      else{
        echo '<script> alert("Error Trip Module");</script>';
      }



    //add
  }

}


?>






<style>
* {
  box-sizing: border-box;
}

.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}


.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>

<style>


.autocomplete2 {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}


.autocomplete2-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete2 items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete2-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete2-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete2-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>















<div class="am-mainpanel">
  <div class="am-pagetitle">
    <h5 class="am-title">Edit GC Entry</h5>


    <!-- search-bar -->
  </div>
  <!-- am-pagetitle -->
  <form name="gcform" id="gcform" class="search-bar"  method="POST" action="">
    <div class="am-pagebody" >
     <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
        <div class="col-xl-6">

          <div class="portlet-body">
            <h6 class="card-body-title"> Referece Number</h6>
           
          <div class="row mg-t-10">
          <!--  <label class="col-md-4 form-control-label"> Reference Number :</label> -->
<?php

$type=$_REQUEST['stat'];
 $id =$_REQUEST['id'];
 $trip=$_REQUEST['trip'];
/*echo '<script>alert("'. $id.'");</script>';
echo '<script>alert("'. $trip.'");</script>';

echo '<script>alert("'. $type.'");</script>';*/

?>
           <div class="col-sm-4 mg-t-5 mg-sm-t-0">




<input type="text" class="form-control" name="tripno" id="tripno" value="<?php echo $trip; ?>" readonly>



             <!-- <select onChange="getstate(this.value);" name="tripno" id="tripno" class="form-control" >

              <option value="">Select </option>
              <?php $query =mysqli_query($conn,"SELECT l.tripid as ldtrip FROM `load_det`as l,load_return as r WHERE l.tripid=r.tripid");
              while($row=mysqli_fetch_array($query))
                { ?>
                  <option value="<?php echo $row['ldtrip'];?>"><?php echo $row['ldtrip'];?></option>
                  <?php
                }
                ?>
              </select> -->
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>   Trip:  
               <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            
            <input type="text" class="form-control" name="triptype" id="triptype" value="<?php echo $type; ?>" readonly>  
            </div> 
          </div>
       </div>
     </div>
  </div>
</div>
</div>




<script>
  $(window).load( function(){

var val = $('#tripno').val();
var type = $('#triptype').val();

/*alert(val);*/

$.ajax({
      type: "POST",
      url: "tripfetch.php",
      data:'trip_id='+val,
       dataType: "json",
      success: function(data){


        if(type=="Load")
        {
        $("#hidden_div").show();
        $("#hidden_div2").hide();
  $("#dieseldiv_load").show();
}else
{
   $("#hidden_div").hide();
   $("#hidden_div2").show();
   $("#dieseldiv_load").show();


}
        
$("#ID_UNIQUE").val(data.trip);     
$("#datepicker").val(data.date);
$("#load_from").val(data.fromp);
$("#vech_num").val(data.vechno);
$("#load_to").val(data.top);
$("#load_company").val(data.company);
$("#load_trans").val(data.transporter);
$("#load_driver").val(data.drivername);
$('#load_party').val(data.party);
$("#load_gc").val(data.gcno);
$("#load_ref").val(data.refno);
$("#load_cont_no").val(data.contno);
$('#load_cont_size').val(data.contsize);
$("#load_cont_wt").val(data.contwt);
$("#load_type").val(data.loadtype);
$('#sealno').val(data.sealno); /*Should write show hide for seal div */
$("#remarks").val(data.remarks);

$("#lfreightamt").val(data.frt_amt);
$("#lldngcgs").val(data.frt_load);
$("#luldngcgs").val(data.frt_unload);
$("#lwbillcgs").val(data.weigh_bill);
$("#lotramt").val(data.others_amt);
$("#lodes").val(data.others_desc);
$('#lhltdays').val(data.hlt_days);
$("#lhltamt").val(data.hlt_amt);
$("#ttlfreight").val(data.frt_total);
$("#advcsh").val(data.adv_cash);
/*alert(data.adv_cash);*/
$('#datepicker009').val(data.adv_csh_date);
$("#advcqe").val(data.adv_cqe_amt);
$("#datepicker007").val(data.adv_cqe_date);
$('#bankname').val(data.bank);
$("#cheqno").val(data.cque_no);
$('#frtbal').val(data.frt_bal);

 $('#hire_adv').val(data.chn_adv);
 $('#hire_mkm_amt').val(data.mkm_adv);


$('#fuel_qty_tot').val(data.chn_bank);
$("#hire_mkm_bank").val(data.mkm_bank);

$('#fuel_qty_tot').val(data.tot_qty);
$("#fuel_amt_tot").val(data.tot_amt);
$('#fuel_amt_driver').val(data.driver_cash);

$("#hire_diesel_adv").val(data.dieseladv);
$('#hire_diesel_qty').val(data.dieselqty);


$("#rtnfrom").val(data.ret_from);
$("#rtnto").val(data.ret_to);
$("#rtndriver").val(data.ret_driver);
$("#rtndriverh").val(data.ret_driver_id);
$("#return_driver_cnge").val(data.ret_otr_driver);
$("#return_adv").val(data.ret_adv);



if(data.ret_party=="")
{



$('#ret_party_name').prop('disabled', true);
$("#ret_gc").prop('disabled', true);
$("#ret_ref").prop('disabled', true);
$("#ret_cont_no").prop('disabled', true);
$('#ret_cont_size').prop('disabled', true);
$("#ret_cont_wt").prop('disabled', true);
$("#ret_cont_load").prop('disabled', true);
$('#ret_seal_no').prop('disabled', true);
$("#ret_rem").prop('disabled', true);
}
else
{
$('#ret_party_name').val(data.ret_party);
$("#ret_gc").val(data.ret_gc);
$("#ret_ref").val(data.ret_ref);
$("#ret_cont_no").val(data.ret_cont_no);
$('#ret_cont_size').val(data.ret_cont_size);
$("#ret_cont_wt").val(data.ret_cont_wt);
$("#ret_cont_load").val(data.ret_cont_load);
$('#ret_seal_no').val(data.ret_seal_no);
$("#ret_rem").val(data.ret_rem);
}

$('#vno').val(data.vechno);

$("#okm").val(data.initkms);







if(data.asslog_no==null)
{

$("#gc_div").hide();




}
else{


/*alert(data.consignor_name);
alert(data.consignee_name);
alert(data.no_of_articles);*/


$("#ass_logno").val(data.asslog_no);
$('#consig_nme').val(data.consignor_name);
$("#consigee_name").val(data.consignee_name);
$("#no_articles").val(data.no_of_articles);
$("#load_value").val(data.goods_value);
$('#load_desc').val(data.goods_desc);



}
/*alert(data.drivername);*/





/*hirebal();*/
totadvval();
 fintot();
 fetch_data();
 calc();

/*alert(data.fromp);
alert(data.top);
alert(data.driver);*/
        }
      });




 


  });
 
</script>



 




<div id="hidden_div" style="display: block;">

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
                <input type="text" class="form-control" placeholder="Ref. No." name="refno" id="ID_UNIQUE" readonly>
                <span class="input-group-btn">
           
                </span>
              </div>
          </div>

            </div>
            <!-- </div> -->



                 <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Vehicle No :</label>
            <div class="col-sm-4 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Reference Number" id="vech_num" maxlength="200" name="loadrefno" type="text" value="" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
   
          <label class="col-md-2 form-control-label">Date:</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker" type="text"  readonly>
            </div>
        </div>
          
          </div>

        
    


            <div class="row mg-t-10">
              <label class="col-md-2 form-control-label"> From :</label>
              <div class="col-sm-4 mg-t-5 mg-sm-t-0">
<div class="autocomplete" >

<input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter GC Number" id="load_from" maxlength="100" name="loadfrom" value="" type="text"   >
              <!--  <select   name="loadfrom" id="load_from" class="form-control" readonly >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM locations");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['area'];?>" <?php if($row['area']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['area'];?></option>
                    <?php
                  }
                  ?>
                </select> -->
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>


<!--     <input id="load_from" type="text" name="myCountry" placeholder="Country"> -->
  </div>

              </div>

<?php
$location=  array();
$query =mysqli_query($conn,"SELECT * FROM district");
                 while($row=mysqli_fetch_array($query))
{

  $location[]=$row['DistrictName'];
}
/*print_r($location);*/
?>


<!-- <script type="text/javascript">
// use php implode function to build string for JavaScript array literal

// ["apple", "orange", "mango", "banana", "strawberry"]
</script> -->


<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}

/*An array containing all the country names in the world:*/


var countries = <?php echo '["' . implode('", "', $location) . '"]' ?>;

/*initiate the autocomplete function on the "load_from" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("load_from"), countries);



</script>

























              <label class="col-md-2 form-control-label"> To :</label>
              <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                <div class="autocomplete2" >
<input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter GC Number" id="load_to" maxlength="100" name="loadto" value="" type="text"   >


               <!-- <select   name="loadto" id="load_to" class="form-control" readonly >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM distri ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['area'];?>" <?php if($row['area']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['area'];?></option>
                    <?php
                  }
                  ?>
                </select> -->
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>
              </div>
            </div>    



<script>
function autocomplete2(inp, arr) {
  /*the autocomplete2 function takes two arguments,
  the text field element and an array of possible autocomplete2d values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocomplete2d values*/
      closeAllLists2();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete2-list");
      a.setAttribute("class", "autocomplete2-items");
      /*append the DIV element as a child of the autocomplete2 container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete2 text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocomplete2d values,
              (or any other open lists of autocomplete2d values:*/
              closeAllLists2();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete2-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive2(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive2(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive2(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive2(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete2-active":*/
    x[currentFocus].classList.add("autocomplete2-active");
  }
  function removeActive2(x) {
    /*a function to remove the "active" class from all autocomplete2 items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete2-active");
    }
  }
  function closeAllLists2(elmnt) {
    /*close all autocomplete2 lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete2-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists2(e.target);
      });
}

/*An array containing all the country names in the world:*/


var countries = <?php echo '["' . implode('", "', $location) . '"]' ?>;

/*initiate the autocomplete2 function on the "load_from" element, and pass along the countries array as possible autocomplete2 values:*/
autocomplete2(document.getElementById("load_to"), countries);


</script>





            <div class="row mg-t-10">
              <label class="col-md-2 form-control-label"> Company :</label>
              <div class="col-sm-4 mg-t-5 mg-sm-t-0">
               <select   name="loadcomp" id="load_company" class="form-control" readonly >
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
               <select   name="loadtrans" id="load_trans" class="form-control" readonly >
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
                <select name="loaddriver" id="load_driver" class="form-control"  >
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
              <div class="col-md-4" id="gc_div">
                <span style="padding-right:20px;"><button type="button" class="ion-ios-information-outline tx-16 lh-0 op-6" data-toggle="modal" data-target="#modaldemo1" ></button></span><span style=" font-size: 20px;  ">View GC</span>

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
                      <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter GC Number" id="ass_logno" maxlength="100" name="assgc" value="" type="text" readonly>
                      <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                    </div>
                  </div>  


                  <div class="row mg-t-10">
                    <label class="col-md-2 form-control-label">Consigner Name :</label>
                    <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                  

<input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter GC Number" id="consig_nme" maxlength="100" name="gcconsignor" value="" type="text" readonly  >


                      <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

                    </div>
                  </div>






                  <div class="row mg-t-10">
                   <label class="col-md-2 form-control-label">Consignee Name :</label>
                   <div class="col-sm-10 mg-t-5 mg-sm-t-0">
            

<input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter GC Number" id="consigee_name" maxlength="100" name="gcconsignee" value="" type="text" readonly  >





         
                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>
                </div>





                <div class="row mg-t-10">
                 <label class="col-md-2 form-control-label"> Articles  :</label>
                 <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                  <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="No. of Articles" id="no_articles" maxlength="50" name="gcarticles" type="text" value="" readonly>
                  <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                </div>

                <label class="col-md-2 form-control-label"> Value  :</label>
                <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                  <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Goods Value." id="load_value" maxlength="50" name="gcvalue" type="text" value="" readonly>
                  <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                </div> </div>

                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Description :</label>
                  <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="load_desc" maxlength="50" name="gcdesc" type="text" value="" readonly>
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


   <!--        <div class="row mg-t-10">
           <label class="col-md-2 form-control-label">Party Name:</label>
           <div class="col-sm-10 mg-t-5 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Party Name" id="load_party" maxlength="200" name="loadparty" type="text" value="" >
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
        </div> -->

          <div class="row mg-t-10">
           <label class="col-md-2 form-control-label">Party Name</label>
           <div class="col-sm-10 mg-t-5 mg-sm-b-10">

             <select   name="loadparty" id="load_party" class="form-control" onchange="bankfetch(this.value)" >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM customer ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
         <!--    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Party Name" id="insurancename" maxlength="200" name="loadparty" type="text" value=""> -->
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
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter GC Number" id="load_gc" maxlength="50" name="loadgcno" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

            </div>
          </div> 

          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Reference No :</label>
            <div class="col-sm-4 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Reference Number" id="load_ref" maxlength="200" name="loadrefno" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Container No :</label>
            <div class="col-sm-4 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Number" id="load_cont_no" maxlength="50" name="loadcontno" type="text" value="" onkeypress="return onlyAlphabets(event,this);">

              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div>



          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Container Size :</label>
            <div class="col-sm-4 mg-t-5 mg-sm-t-0">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="load_cont_size" name="loadcontsize">
              <option value="">---Select Container Size---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?> selected="selected" value="20">20</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="40">40</option>

            </select>
          </div>



          <label class="col-md-2 form-control-label">Container Weight :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Weight" id="load_cont_wt" maxlength="50" name="loadcontwt" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

          </div> 
        </div>

        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Load Type :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
           <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="load_type" name="contloadtype">
            <option value="">---Select Goods---</option>
            <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Import">Import</option>
            <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Export">Export</option>
           
          </select>
        </div>


        <label class="col-md-2 form-control-label" id="seallabel">Seal No :</label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0" id="sealdiv">
          <input id="sealno" class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Seal Number."  maxlength="200" name="sealno" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>

        </div>



      </div>



      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Remarks :</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Remarks Here" id="remarks" maxlength="200" name="loadrem" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>

        </div>
      </div>


    </div>
  </div>
</div>
</div>
</div>

</div> 

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
            <input class="amt_cal form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Freight Amount" id="lfreightamt" maxlength="200" name="frt_amt" type="text" value="" onkeyup= "fintot()">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>

          <label class="col-md-2 form-control-label">Loading Charges :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Loading Charges" id="lldngcgs" maxlength="50" name="frt_ldg_chrg" type="text" value="" onkeyup= "fintot()">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>



        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Un-Loading Charges :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Un Loading Charges" id="luldngcgs" maxlength="200" name="frt_unldg_chrg" type="text" value="" onkeyup= "fintot()" >
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>

          <label class="col-md-2 form-control-label">Weigh Bill Charges :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Weigh Bill Charges" id="lwbillcgs" maxlength="50" name="frt_weigh_crg" type="text" value="" onkeyup= "fintot()" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>


        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Other Amount :</label>
          <div class="col-lg-4 mg-t-20 mg-lg-t-0">

<div class="input-group">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Other Amount" id="lotramt" maxlength="50" name="frt_other_crg" type="text" value="" onkeyup= "fintot()"><span class="input-group-btn"> 
              <!-- <button id="viewothers" class="btn bd bg-white tx-gray-600" type="button" readonly><i class="fa fa-eye"></i></button> -->
            </span> </div> 
</div>

<style type="text/css">
  
#viewothers:hover{
  cursor: pointer;
}

</style>
<script>
$(document).on('click', '#viewothers', function(){
  

 var fid  = $('#ID_UNIQUE').val();
 var des  = "View"; 
$.ajax({
     url:"otherexp_fetch.php",
     method:"POST",
     data:{id:fid,desc:des},
     dataType: "html",   //expect html to be returned                
        success: function(response){ 
        $('#responsecontainerdiv').modal('show');                   
            $("#responsecontainer").html(response); 
   
      otherFetch();
       }
    });




});
</script>




<div id="responsecontainerdiv" class="modal fade block col-md-12">
                                                  
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-25">
                  <div class="modal-header pd-y-20 pd-x-30">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Other Expense</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
<div id="responsecontainer">
</div>


<script>
function deletecrgs(value)
{
  alert(value);
  $.ajax({
        type:"POST",
        url: "otherdel.php",
        data:'val='+value,
        success: function(data){ 
       otherFetch();
        }
      });

}


</script>




</div></div>
                   </div>

            <label class="col-md-2 form-control-label">Other Description:</label>
        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                 <div class="input-group">
                <input type="text" class="form-control" id="lodes" placeholder="Others Description" >
                <span class="input-group-btn">
                 <!--  <button id="addotrdes" class="btn bd bg-white tx-gray-600 " type="button"><i class="fa fa-plus"></i></button> -->
                </span>
              </div>
              </div>
          </div>
<style type="text/css">
  
#addotrdes:hover{
  cursor: pointer;
}

</style>

<script>
$(document).on('click', '#addotrdes', function(){
$('#demoModal').modal('show');

});
</script>




     <div id="demoModal" class="modal fade block col-md-12">
              <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                  <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Other Expense</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>


                  <div class="modal-body pd-25">
                   <div class="row mg-t-10">
                    <label class="col-md-2 form-control-label">Date:</label>
                    <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                   <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="otr_date" type="text"  >
                      <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                    </div>
                  </div>  </div>

                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Amount :</label>
                  <div class="col-sm-10 mg-t-5 mg-sm-t-0"> 
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="otr_amt" maxlength="50" name="gcdesc" type="text" value="" >
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div> 
  
                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Description :</label>
                  <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="otr_desc" maxlength="50" name="gcdesc" type="text" value="" >
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div> 

               <div class="modal-footer">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="add_other" class="btn btn-primary">Save changes</button>
</div>
              </div></div>






            </div><!-- modal-dialog -->





          </div>
<script>
$(document).on('click', '#add_other', function(){

  var dat = $('#otr_date').val();
  var amt = $('#otr_amt').val();
  var des = $('#otr_desc').val();
  var fid  = $('#ID_UNIQUE').val();
  var vech  = $('#vech_num').val();
  var dri  = $('#load_driver').val();
$.ajax({
     url:"otherexp_ins.php",
     method:"POST",
     data:{date:dat, id:fid, vechno:vech, driver:dri, amount:amt, desc:des},
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#demoModal').modal('hide');
      otherFetch();
       }
    });
});

</script>

<script>
function otherFetch()
{

  var fid  = $('#ID_UNIQUE').val();
  $.ajax({
     url:"otherexp_fetch.php",
     method:"POST",
     data:{id:fid},
     dataType: "json",
     success:function(data)
     {

      $("#lotramt").val(data.amount);
      $("#lodes").val(data.description);     
       }
    });


}
</script>


<?php
 /*$pinqry = mysqli_query($conn,"SELECT * FROM halt_entry WHERE tripid =   "); 

                $res = mysqli_fetch_assoc($pinqry);*/

?>




          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Halt Days :</label>
                <div class="col-lg-4 mg-t-20 mg-lg-t-0">

<div class="input-group">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays" maxlength="200" name="frt_hlt_days" type="text" value="" readonly>
              <span class="input-group-btn">
               <!--  <button id="haltdaysview" class="btn bd bg-white tx-gray-600 " type="button"><i class="fa fa-eye"></i></button> -->

              </span>
            </div></div>    

          </div>

<style type="text/css">
  
#haltdaysview:hover{
  cursor: pointer;
}

</style>

<script>
$(document).on('click', '#haltdaysview', function(){
  

 var fid  = $('#ID_UNIQUE').val();
 var type  = "View"; 
$.ajax({
     url:"tripfetch.php",
     method:"POST",
     data:{id:fid,type:type},
     dataType: "html",   //expect html to be returned                
        success: function(response){ 
        $('#responsecontainerdiv_halt').modal('show');                   
            $("#responsecontainer_halt").html(response); 
  
       }
    });




});
</script>


<div id="responsecontainerdiv_halt" class="modal fade block col-md-12">
                                                  
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-25">
                  <div class="modal-header pd-y-20 pd-x-30">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Halt Details</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
<div id="responsecontainer_halt">
</div>

</div></div>
                   </div>
          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Halt Amount :</label>
            <div class="col-sm-10 mg-t-5 mg-sm-t-0">
              <input class="amt_cal form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="lhltamt" maxlength="100" name="fhltamt" value="" type="text" readonly >
              <input class="amt_cal form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="lhltamth" maxlength="100" name="frt_hlt_amt" value="" type="hidden"  >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>


          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Total Frieght :</label>
            <div class="col-sm-10 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="ttlfreight" maxlength="100" name="fttlfreighth" value="" type="text" readonly >
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="ttlfreighth" maxlength="100" name="frt_total" value="" type="hidden" >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>










  </div>
</div>

<div class="col-xl-6">


 <div class="portlet-body">
  <div class="row mg-t-10">

    <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>
    <div class="portlet-body">


       <div class="row mg-t-10">

        <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>

      
      


          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Adv. Amount :</label>
            <div class="col-sm-4 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="advcsh" maxlength="200" name="frt_adv_cash" type="text" value="" onkeyup="totval()">
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
            <div class="col-sm-6 mg-t-5 mg-sm-t-0">
             <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="frt_adv_cash_dte" id="datepicker009" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

          </div>
        </div>

<!-- 
        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Adv. Cheq Amount. :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="advcqe" maxlength="200" name="frt_adv_cqe" type="text" value="" onkeyup="totval()">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
          <div class="col-sm-6 mg-t-5 mg-sm-t-0">
           <div class="input-group">
            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
            <input class="form-control fc-datepicker" placeholder="Cheque Date" name="frt_adv_cqe_dte" id="datepicker007" type="text" value="<?php echo date('d/m/Y');?>" >
          </div>
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

        </div>
      </div> -->

<div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Payment Type :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
   <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="advcqe"  name="frt_adv_cqe" ">
    <?php
$load_query= mysqli_query($conn,"SELECT * from pay_type ;");
 while ($res = mysqli_fetch_assoc($load_query))
 { 
    ?>

    <option value="<?php echo $res['pay_type'];?>"><?php echo $res['pay_type'];?></option>
<?php
}
?>
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </select>

        </div>
      </div>








      <div class="row mg-t-10">
       <label class="col-md-2 form-control-label">Paid To:</label>
       <div class="col-sm-10 mg-t-5 mg-sm-t-0">


        <!-- <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Bank Name" id="bankname" maxlength="200" name="frt_adv_cqe_bnk" type="text" value=""> -->




   <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="bankname"  name="frt_adv_cqe_bnk" ">
    <?php
$load_query= mysqli_query($conn,"SELECT * from ledgers where  type = 1 ;");
 while ($res = mysqli_fetch_assoc($load_query))
 { 
    ?>

    <option value="<?php echo $res['id'];?>"><?php echo $res['name'];?></option>
<?php
}
?>
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </select>


        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
      </div>
    </div>



    <div class="row mg-t-10">

      <label class="col-md-2 form-control-label">Cheque Number :</label>
      <div class="col-sm-10 mg-t-5 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Cheque Number" id="cheqno" maxlength="100" name="frt_adv_cqe_num" type="text" value=""  >
        <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
      </div>
    </div>


    <div class="row mg-t-10">

      <label class="col-md-2 form-control-label">Freight Balance :</label>
      <div class="col-sm-10 mg-t-5 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Freight Balance" id="frtbal" maxlength="100" name="frtbal" value="" type="text" readonly >
        <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Freight Balance" id="frtbalh" maxlength="100" name="frt_bal" value="" type="hidden" >
        <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
      </div>
    </div>


     


 <!-- <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Total Frieght :</label>
            <div class="col-sm-10 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="ttlfreight" maxlength="100" name="fttlfreighth" value="" type="text" readonly >
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="ttlfreighth" maxlength="100" name="frt_total" value="" type="hidden" >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div> -->
  




    </div>
  </div>
</div>
</div>

</div> </div>





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
          <label class="col-md-2 form-control-label">Hire Amount :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Hire Amount" id="hire_amt" maxlength="200" name="hire_amt" type="text" value="" onkeyup="hiretot()">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>



          <label class="col-md-2 form-control-label">Commission:</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Commission" id="hire_comm" maxlength="50" name="hire_comm" type="text" value="500" onkeyup="hiretot()">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>


        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Loading Charges :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Loading Charges" id="hire_ldng_crgs" maxlength="50" name="hire_ldng_crgs" type="text" value="" onkeyup="hiretot()">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>

          <label class="col-md-2 form-control-label">Un-Loading Charges :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Un-Loading Charges" id="hire_unldng_crgs" maxlength="200" name="hire_unldng_crgs" type="text" value="" onkeyup="hiretot()" readonly>
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>  
        </div>

        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Weigh Bill Charges :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Weigh Bill Charges" id="hire_weigh_crgs" maxlength="50" name="hire_weigh_crgs" type="text" value="" onkeyup="hiretot()" readonly>
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div></div>
          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Other Amount :</label>
            <div class="col-sm-4 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Other Amount" id="hire_other_amt" maxlength="50" name="hire_other_amt" type="text" value="" onkeyup="hiretot()" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Other Description:</label>
            <div class="col-sm-4 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Description" id="hire_other_des" maxlength="200" name="hire_other_des" type="text" value="" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
          </div>


          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Halt Days :</label>
            <div class="col-sm-4 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="hire_halt_days" maxlength="200" name="hire_halt_days" type="text" value="" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

       
          </div>


          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Halt Amount :</label>
            <div class="col-sm-10 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_halt_value" maxlength="100" name="hire_halt_value" value="" type="text" readonly >
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_halt_amt" maxlength="100" name="hire_halt_amt" value="" type="hidden" >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>





          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Total Frieght :</label>
            <div class="col-sm-10 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="hire_total" maxlength="100" name="hire_total" value="" type="text" readonly >
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="hire_frt_total" maxlength="100" name="hire_frt_total" value="" type="hidden">
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
                    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="hire_adv" maxlength="200" name="hire_adv" type="text" value="" onkeyup="totadvval()">
                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>




                  <label class="col-md-2 form-control-label">Pay Type :</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                   <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="hire_chn_pay_mode" name="hire_chn_pay_mode">
    <?php
$load_query= mysqli_query($conn,"SELECT * from pay_type ;");
 while ($res = mysqli_fetch_assoc($load_query))
 { 
    ?>

    <option value="<?php echo $res['pay_type'];?>"><?php echo $res['pay_type'];?></option>
<?php
}
?>
                    </script>
                  </select>
                </div>

              </div>

              <div id="Bankdiv">
                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Paid From:</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-t-0">
              <!--       <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="hire_chn_bank" maxlength="200" name="hire_chn_bank" type="text" value=""> -->

  <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="hire_chn_bank"  name="hire_chn_bank" ">
    <?php
$load_query= mysqli_query($conn,"SELECT * from ledgers where  type = 1 ;");
 while ($res = mysqli_fetch_assoc($load_query))
 { 
    ?>

    <option value="<?php echo $res['id'];?>"><?php echo $res['name'];?></option>
<?php
}
?>


                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>






                  <label class="col-md-2 form-control-label">Cheque No:</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="hire_chn_cque" maxlength="50" name="hire_chn_cque" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div></div>


                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">MKM Advance :</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="hire_mkm_amt" maxlength="200" name="hire_mkm_amt" type="text" value="" onkeyup="totadvval()">
                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>
                  <label class="col-md-2 form-control-label">Pay Type :</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                   <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="hire_mkm_pay_mode" name="hire_mkm_pay_mode">
                       <?php
$load_query= mysqli_query($conn,"SELECT * from pay_type ;");
 while ($res = mysqli_fetch_assoc($load_query))
 { 
    ?>

    <option value="<?php echo $res['pay_type'];?>"><?php echo $res['pay_type'];?></option>
<?php
}
?>
                  </select>
                </div>

              </div>

              <div id="mkmbankdiv">
                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Paid From:</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-t-0">
<!--                     <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="hire_mkm_bank" maxlength="200" name="hire_mkm_bank" type="text" value=""> -->

  <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="hire_mkm_bank"  name="hire_mkm_bank" ">
    <?php
$load_query= mysqli_query($conn,"SELECT * from ledgers where  type = 1 ;");
 while ($res = mysqli_fetch_assoc($load_query))
 { 
    ?>

    <option value="<?php echo $res['id'];?>"><?php echo $res['name'];?></option>
<?php
}
?>


                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>

                  <label class="col-md-2 form-control-label">Cheque No:</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="hire_mkm_cque" maxlength="50" name="hire_mkm_cque" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div></div>








                <div class="row mg-t-10">

                  <label class="col-md-2 form-control-label">Total Advance :</label>
                  <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_tot_adv" maxlength="100" name="hire_tot_adv" value="" type="text" readonly >
                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_total_adv" maxlength="100" name="hire_total_adv" value="" type="hidden" >
                    <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                  </div>
                </div>


                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Diesel Adv.:</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="hire_diesel_adv" maxlength="50" name="hire_diesel_adv" type="text" value="" onkeyup="hirebal()">

                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>

                  <label class="col-md-2 form-control-label">Diesel Qty.:</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="hire_diesel_qty" maxlength="50" name="hire_diesel_qty" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div>





                <div class="row mg-t-10">

                  <label class="col-md-2 form-control-label">Hire Balance :</label>
                  <div class="col-sm-10 mg-t-5 mg-sm-t-0">
                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_tot_bal" maxlength="100" name="hire_tot_bal" value="" type="text" readonly >

                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_balance" maxlength="100" name="hire_balance"  type="hidden"  >
                    <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                  </div>
                </div>



              </div>
            </div>
          </div>
        </div>

      </div> 
    </div> 
</div>








<div id="hidden_div2" style="display: block;">

<div class="am-pagebody">
   <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
     <div class="row row-sm mg-t-20">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Return</h6>
           </div></div>



           <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">From :</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="rtnfrom" maxlength="50" name="rtnfrom" type="text" value="" readonly>
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="rtn_fromh" maxlength="50" name="rtn_from" type="hidden" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 



          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">To :</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="rtnto" maxlength="50" name="rtnto" type="text" value="" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 





          <div class="row mg-t-10">

            <label class="col-md-4 form-control-label">Driver :</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="rtndriver" maxlength="100" name="return_driver" type="text" value="" readonly>

              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="rtndriverid" maxlength="100" name="return_driverid" type="hidden" value="" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>


             <!--  <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Changed Driver Name" id="return_driver_cnge" maxlength="100" name="return_driver_cnge" type="text" >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span> -->

            </div>
          </div>
          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">Advance :</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="return_adv" maxlength="50" name="return_adv" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
            </div>
          </div>
        </div>
      </div>



      <div class="col-xl-6">
       <div class="row mg-t-10">

        <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>
        <div class="row mg-t-10">

          <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>

          <div class="portlet-body" id="hidden_div6">
            <div class="row mg-t-10">
             <label class="col-md-2 form-control-label">Party Name:</label>
             <div class="col-sm-10 mg-t-5 mg-sm-t-0">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Party Name" id="ret_party_name" maxlength="200" name="ret_party_name" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
          </div>
          <div class="row mg-t-10">
           <label class="col-md-2 form-control-label">GC No :</label>
           <div class="col-sm-10 mg-t-5 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter GC Number" id="ret_gc" maxlength="50" name="ret_gc" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

          </div>
        </div> 
        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Reference No :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0"> 
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Reference Number" id="ret_ref" maxlength="200" name="ret_ref" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>

          <label class="col-md-2 form-control-label">Container No :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Number" id="ret_cont_no" maxlength="50" name="ret_cont_no" type="text" value="" onkeypress="return onlyAlpha(event, this);" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>

        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Container Size :</label>
          <div class="col-sm-4 mg-t-5 mg-sm-t-0">
           <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="ret_cont_size" name="ret_cont_size">
            <option value="">---Select Container Size---</option>
            <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?> selected="selected" value="20">20</option>
            <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="40">40</option>

          </select>
        </div>



        <label class="col-md-2 form-control-label">Container Weight :</label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Weight" id="ret_cont_wt" maxlength="50" name="ret_cont_wt" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

        </div> 
      </div>

      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Load Type :</label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
         <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="ret_cont_load" name="ret_cont_load">
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
        <input id="ret_seal_no" class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Seal Number."  maxlength="200" name="ret_seal_no" type="text" value="">
        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>

      </div>



    </div>



    <div class="row mg-t-10">
      <label class="col-md-2 form-control-label">Remarks :</label>
      <div class="col-sm-10 mg-t-5 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Remarks Here" id="ret_rem" maxlength="200" name="ret_rem" type="text" value="">
        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
      </div>
    </div>


  </div>
</div>


</div> 
</div>
</div>  













  </div>



<div id="dieseldiv_load">



      <div class="am-pagebody" >

 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

       <div class="row row-sm mg-t-20">

          <div class="col-xl-8 col-md-8">

           

            <div class="portlet-body">

       <div class="row mg-t-10">

        <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>


   <!--    <div align="right">
     <button type="button" name="add" id="add_die_load" class="btn btn-info">Add New Entry</button>
    </div> -->
       <div class="row mg-t-10"> 
             <h6 class="card-body-title">Diesel Entries</h6>
           </div>
           


 <div class="row mg-t-10" id="responsecontainer_load">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">


 <div class="col-xl">
  
</div>
      </div>
   </div>

      






                 </div></div>




  </div>


   <div class="modal fade" id="load_editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="row row-sm mg-t-20">

          

<input   name="upd_id" id="load_upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Date:</label>
          <div class="col-sm-10 mg-t-5 mg-sm-t-0 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Cash Date" name="datepicker002" id="datepicker002" type="text"  >
            </div>
        </div>
      </div>
      
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Driver:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="load_upd_driver" maxlength="50" name="upd_driver" type="text"  readonly>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Vendor:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="load_upd_vendor" maxlength="50" name="upd_vendor" type="text" >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Place:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="load_upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Quantity:</label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="load_upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecalRet2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-2 form-control-label">Price Per Litre:</label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="load_upd_ppl" maxlength="50" name="load_upd_ppl" type="text" value="" readonly>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Amount:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="load_upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecalRet2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-2 form-control-label">Pay Type:</label>                                                    
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="load_upd_billtype" name="upd_billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="load_update" class="btn btn-primary">Save changes</button>
</div>
</div></div></div>
</div> </div></div>





 
 <script >
function editfuel(variable)
{


$.ajax({
      type: "POST",
      url: "fuelfetch.php",
      data:'fuel_id='+variable,
       dataType: "json",
      success: function(data){
$("#load_upd_id").val(data.id);     
$("#datepicker002").val(data.date);
$("#load_upd_driver").val(data.driver);
$("#load_upd_vendor").val(data.vendor);
$("#load_upd_place").val(data.place);
$("#load_upd_qty").val(data.qty);
$("#load_upd_amt").val(data.amount);
$("#load_upd_ppl").val(data.ppl);
$("#load_upd_billtype").val(data.paytype);
$('#load_editModel').modal('show');
        }
      });
}
</script>




 <script >
$(function () {
$("#add_die_load").click(function(){
$('#load_die_add').modal('show');
});
});
</script>

<script>

  $(document).on('click', '#load_update', function(){
   var dat = $('#datepicker002').val();
   var fid = $('#load_upd_id').val();
   var dri = $('#load_upd_driver').val();
   var ven = $('#load_upd_vendor').val();
   var pla = $('#load_upd_place').val();
   var qt = $('#load_upd_qty').val();
   var pp = $('#load_upd_ppl').val();
   var at = $('#load_upd_amt').val();
   var bill = $('#load_upd_billtype').val();
   var vech="";

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, id:fid, vechno:vech, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#load_editModel').modal('hide');
       }
    });

  });
</script>



<!-- 
<script>
  document.addEventListener("DOMContentLoaded", function() {
fetch_data();

});
</script> -->
<!-- <script>

/*  Table View*/
  $('#mVechno').change(function(){
 fetch_data();
  });
</script> -->


<script>
function deletefuel(del_val)
{


$.ajax({
        type: "POST",
        url: "fueldel.php",
        data:'val='+del_val,
        success: function(data){ 
       fetch_data();
        }
      });


}
</script>



<script>

  $(document).on('click', '#load_die_insert', function(){



   var dat = $('#datepicker').val();
   var vno = $('#mVechno').val();
   var tid = $('#trip_id').val();
   var dri = $('#load_die_driver').val();
   var ven = $('#load_die_vendor').val();
   var pla = $('#load_die_place').val();
   var qt = $('#load_die_qty').val();
   var pp = $('#load_die_ppl').val();
   var at = $('#load_die_amt').val();
   var bill = $('#load_die_billtype').val();

 if(vno != '')
 {

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, vechno:vno, tripid:tid, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      alert(data);
      fetch_data();
     }
    });

 }
 else
 {

alert("Please Select Vehicle Number")

 }

  });
</script>


      </div><!-- am-pagebody -->
     



<script>
  function diecalRet()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('load_die_qty').value;
      var die2 = document.getElementById('load_die_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('load_die_ppl').value = 0;
      document.getElementById('load_die_pplh').value = 0;

    }
    else
    {
      document.getElementById('load_die_ppl').value=total;
      document.getElementById('load_die_pplh').value=total;
    }
  }}
</script>
<script>
  function diecalRet2()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('load_upd_qty').value;
      var die2 = document.getElementById('load_upd_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('load_upd_ppl').value = 0;

    }
    else
    {
      document.getElementById('load_upd_ppl').value=total;

    }
  }}
</script>




<script>


  function fetch_data()
  {

    var vech_no =document.getElementById('vech_num').value;
    
     var trip =document.getElementById('tripno').value;

    $.ajax({    //create an ajax request
        type: "POST",
        url: "fuelfetch.php",
        data:{vechno:vech_no,tripid:trip},            
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
           
            $("#responsecontainer_load").html(response);
           
            //alert(response);
        }

    });
  }
</script>
<script>
  function calc()
  {
 var vech_no =document.getElementById('vech_num').value;
    
 var tri =document.getElementById('tripno').value;
/*var satus = document.getElementById('triptype').value;*/
/*alert(satus);*/
/*alert(vech_no);
alert(tri);*/
  $.ajax({
      type: "POST",
      dataType: "json",
      url: "fuelfetch.php",
      data:{ vech:vech_no, trip:tri },
      
      success: function(data){

       
           $("#fuel_qty_tot").val(data.qty);
           $("#fuel_amt_tot").val(data.cost);
           $("#flts").val(data.qty);


           
  }


});
  }




</script>




</div>







<div class="form-layout-footer mg-t-30" id="submitdiv">
 
                         <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Save Changes</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" onclick="closeit()">Cancel</button>
              </div>
</div>


<script>
function closeit()
{

  window.close();
}

</script>













</form> 
<?php include('../include/adminfooter.php'); ?>


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
      var val = document.getElementById('lhltdays').value;
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

     document.getElementById('hire_amt').value=va1;
     document.getElementById('hire_ldng_crgs').value=va2;
     document.getElementById('hire_unldng_crgs').value=va3;
     document.getElementById('hire_weigh_crgs').value=va4;
     document.getElementById('hire_other_amt').value=va5;
     document.getElementById('hire_halt_value').value=va6;
     document.getElementById('hire_halt_days').value=val;
     
     var com=document.getElementById('hire_comm').value;
     document.getElementById('hire_total').value=total-parseFloat(com);


     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('ttlfreight').value = 0;
      document.getElementById('ttlfreighth').value=0;
      document.getElementById('hire_tot_bal').value=0-parseFloat(com);
       document.getElementById('hire_balance').value=0-parseFloat(com);
      totval();
    }
    else
    {
      document.getElementById('ttlfreight').value=total;
      document.getElementById('ttlfreighth').value=total;
       document.getElementById('hire_tot_bal').value=total-parseFloat(com);
       document.getElementById('hire_balance').value=total-parseFloat(com);
      totval();
    }
  }}
</script>

<script>
  function totval()
  {
    if((event.keyCode||event.which) != 9)
    {

      var valu1 = document.getElementById('advcsh').value;
      /*var valu2 = document.getElementById('advcqe').value;*/
      var valu3 = document.getElementById('ttlfreight').value;
      if (valu1 == "")
       valu1 = 0;
/*     if (valu2 == "")
       valu2 = 0;*/
     if (valu3 == "")
       valu3 = 0;
     var total =  parseFloat(valu3)-parseFloat(valu1)/*-parseFloat(valu2)*/;

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



<script>

  function hiretot()
  {
    if((event.keyCode||event.which) != 9)
    {

      var value1 = document.getElementById('hire_amt').value;
    
      var value2 = document.getElementById('hire_comm').value;
      var value3 = document.getElementById('hire_ldng_crgs').value;
      var value4 = document.getElementById('hire_unldng_crgs').value;
      var value5 = document.getElementById('hire_weigh_crgs').value;
      var value6 = document.getElementById('hire_other_amt').value;
      var value7 = document.getElementById('hire_halt_value').value;

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


     var total =  parseFloat(value1)+parseFloat(value3)+parseFloat(value4)+parseFloat(value5)+parseFloat(value6)+parseFloat(value7)-parseFloat(value2);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hire_frt_total').value = 0;
      document.getElementById('hire_total').value=0;
      /*totval();*/
      hirebal();
    }
    else
    {
      document.getElementById('hire_frt_total').value = total;
      document.getElementById('hire_total').value = total;
      /*totval();*/
      hirebal();
    }
  }}
</script>

<script>
  function totadvval()
  {

    if((event.keyCode||event.which) != 9)
    {

      var valu1 = document.getElementById('hire_adv').value;
      var valu2 = document.getElementById('hire_mkm_amt').value;
      if(valu1 == "")
       valu1 = 0;
     if (valu2 == "")
       valu2 = 0;
     var total = parseFloat(valu1)+parseFloat(valu2);

     var res = isNaN(total);
     if(res == true)
     {
       document.getElementById('hire_tot_adv').value = 0;
       document.getElementById('hire_total_adv').value = 0;
       hirebal();
     }
     else
     {
       document.getElementById('hire_tot_adv').value=total;
       document.getElementById('hire_total_adv').value=total;
       hirebal();
     }
   }}
 </script>




 <script>
  function hirebal()
  {
    if((event.keyCode||event.which) != 9)
    {
/*alert("Enter");*/
      var valu1 = document.getElementById('hire_diesel_adv').value;
      var valu2 = document.getElementById('hire_tot_adv').value;
      var valu3 = document.getElementById('hire_total').value;

/*alert(valu1);
alert(valu2);
alert(valu3);*/

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
       document.getElementById('hire_tot_bal').value = 0;
       document.getElementById('hire_balance').value = 0;

     }
     else
     {
       document.getElementById('hire_tot_bal').value=total;
       document.getElementById('hire_balance').value=total;

     }
   }}
 </script>
