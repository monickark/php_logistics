<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>



    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Search Master</h5>

      

          

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 form-layout form-layout-4 mg-t-20">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-12">

           

            <div class="portlet-body">

                                          <h6 class="card-body-title" style="">Party Calculation</h6>


                                                        <div class="row mg-t-10 mg-b-20" >
                                                            
                                                                <label class="col-md-4 form-control-label">Party ID </label>
                                                                <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                                                                  

<select onChange="fetch_data()"  name="cusCity" id="cusCity" class="form-control" >





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM customer ");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Customerr ID  Dropdown -->
<option value="<?php echo $row['comm_id'];?>" ><?php echo $row['comm_id'];?> &nbsp - &nbsp <?php echo $row['name'];?></option>
<?php
}
?>
</select>



                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>
                                                        </div>



                                                          <!-- <div class="" style="padding-left:200px" id="hhdriverli">
                                                        </div>-->








<script>
function fetch_data(){

var id=$("#cusCity").val();
/*alert(name);*/
var act="Fetch";

  /*display Purpouse Only*/

$.ajax({


     url:"fetch_party_det.php",
     method:"POST",
     dataType: "html",
     data:{action:act, num:id},
     success:function(data)
     {
  /*    alert(data);*/
      $("#responsecontainer").html(data); 
      
       }
    });


}


</script>

<script>
function view(val)
{
var id=$("#cusCity").val();
var act="Calc";
$.ajax({


     url:"fetch_party_det.php",
     method:"POST",
     dataType: "html",
     data:{action:act, num:id,value:val},
     success:function(data)
     {
     /* alert(data);*/
      $("#responsecontainer").html(data); 
      
       }
    });
balance();
}

</script>
<script>

function balance()
{
 var value= $("#total_balance").val(); 
 /*alert(value);*/
$("#total_balance_val").val(value); 

}


</script>





<div class="row mg-t-10">
              <label class="col-md-4 form-control-label"> Pay Type  </label>
              <div class="col-sm-4 mg-t-5 mg-sm-t-0">

           <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="billtype" name="billtype" style="padding:0px 6px !important;">
            <option  value="Cash">Cash</option>
            <option  value="Cheque">Cheque</option>

            <option value="DD">DD</option>
            <option value="NEFT">NEFT</option>
            <option value="RTGS">RTGS</option>
            
          </select>
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>


           
            </div> 



<div class="row mg-t-20">

   <label class="col-md-4 form-control-label">Remarks  </label>
              <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                <input class="form-control valid" data-val="true" placeholder="Enter Name" id="remarks" maxlength="100" name="remarks" type="text" value=""  >
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>
     </div> 

<div class="row mg-t-20">

   <label class="col-md-4 form-control-label">Amount  </label>
              <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                <input class="form-control valid" data-val="true" placeholder="Enter Name" id="amount" maxlength="100" name="amount" type="text" placeholder="Enter Amount" onkeyup="view(this.value)" required>
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>




               <button type="button" id="add_amount" class="btn btn-info pd-x-20" >Submit</button>
     </div> 


<script>

$(document).on('click','#add_amount', function(){

var id=$("#cusCity").val();
var pay_type=$("#billtype").val();
var remark=$("#remarks").val();
var value=$("#amount").val();
var act="Insert";
var pay=pay_type+'-'+remark;
alert(pay);

$.ajax({


     url:"fetch_party_det.php",
     method:"POST",
     dataType: "html",
     data:{action:act, num:id,value:value,pay_type:pay},
     success:function(data)
     {
    /*  alert(data);*/

$.notify(data, "success");

     /* $("#responsecontainer").html(data); */
       fetch_data();



       }

      
    });



});
</script>

 <div class="row mg-t-10" id="responsecontainer" style="text-align:  center;background:  #2d3a50;color:  #fff;padding: 5px 15px 5px;float:  left;width:  100%;/* line-height: 16px; */margin: 20px 0px 0px;">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">


 <div class="col-xl">
  
</div>
      </div>





                   </div>



                                  </div>




                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php 
      include('../include/adminfooter.php'); ?> 
    <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script>