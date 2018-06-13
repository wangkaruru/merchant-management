@include('topbar')
<div class="row topbar" style="margin:0px!important; padding:10px;border-bottom:1px solid #9c9e9e;">
   <span align="center" class="pull-left m-4" style="font-size:25px;color:#008000;padding-left:20px;"> <b>Merchant Integration: eg DSTV</b> </span>

   <button class="btn btn-success pull-right m-4" data-toggle="modal" data-target="#create_modal"> <i class="fas fa-user-plus"></i>  Create New Merchant Customer</button>
   <button class="btn btn-primary pull-right" onclick="reload_data();">  <i class="fas fa-sync-alt" ></i>   Refresh Accounts</button>
</div>
  
<div id="loader" class="success" style="display:none;" align="center">
<img src="{{asset('images/loader2.gif')}}" style="height:25px;width:25px;" align="center"/></div>

<br>
<div class="container">  
  
  
<div class="row" style="color:#4ca64c!important;font-size:18px;">
    <u><b>Packages</b></u> <br> 
    <div class="col-md-2">1.<b> GOLD</b>(1000)</div>
    <div class="col-md-2">2.<b> SILVER</b>(3000)</div>
    <div class="col-md-2">3.<b> PLATINUM</b>(5000)</div>
</div>
<br> 
    

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ACCOUNT NUMBER</th>
        <th>SERVICE TYPE</th>
        <th>BALANCE</th>
      </tr>
    </thead>
    <tbody id="contents">
     
    </tbody>
  </table>
</div>



<div class="modal fade" id="create_modal" tabindex="-1" 
role="dialog" aria-labelledby="create_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title" id="exampleModalLabel">Create Merchant Customer</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
         <span class="info font-open" id="create_cst_msg" style="display:none;" align="right"></span>
          <span class="success font-open" id="create_cst_msg2" style="display:none;" align="right " ></span>
         <span id="loader_cst" class="success" style="display:none;"><img src="{{asset('images/loader.gif')}}" style="max-height:25px; max-width:25px;margin-left:10%;"></span>

          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Account Number</label>
              <input type="email" class="form-control" id="acc_no" aria-describedby="" placeholder="Enter account no">
              <small id="emailHelp" class="form-text text-muted">Customer will use this as reference when paying bills</small>
            </div>

            <div class="form-group">

              <label for="service type">Service Type</label>
              <select class="form-control form-control-sm" id="s_type_select">
                <option value="Gold">Gold</option>
                <option value="Silver">Silver</option>
                <option value="Platinum">Platinum</option>
              </select>
            </div>            
            
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="create_cst()" class="btn btn-primary">Create Customer </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>




@include('footer')

<script>

$( document ).ready(function() { 
    reload_data();// get data for existing modes
    
});




function  reload_data(){
  
  $("#loader").show();
  $("#contents").html('');

  var pdata = {
            _token : '<?php echo csrf_token() ?>',
        }

        $.ajax({
               type:'POST',
                url:'<?php  echo url("/load_data"); ?>',               
               data:pdata,
               success:function(data){  

                  console.log(data.all);
                  var d=data.all;

                  $("#loader").hide();

                    var c_content="";
                       $.each(d, function( key, value ) {

                          c_content = c_content +'<tr> <td>'+value.account_number+
                            '</td> <td>'+value.service_type+
                            '</td> <td>'+value.balance+
                            '</td></tr>';
                      }); 
                 
                     $("#contents").html(c_content);  
                 
               },
                error: function(data){                                    
                   $("#loader").hide();                  
                }

            }); 

   
}


function  create_cst(){
  
  $("#loader_cst").show();
  $("#create_cst_msg").hide();
  $("#create_cst_msg2").hide();

  var pdata = {    
            acc_no:$("#acc_no").val(),    
            s_type:$("#s_type_select").val(),
            _token : '<?php echo csrf_token() ?>',
        }

        $.ajax({
               type:'POST',
                url:'<?php  echo url("/create_merchant_customer"); ?>',               
               data:pdata,
               success:function(data){

                 $("#loader_cst").hide();
                  console.log(data);

                  if(data.success){
                    reload_data();
                    $("#create_cst_msg2").html(data.msg);
                    $("#create_cst_msg2").show();
                  }else{
                     $("#create_cst_msg").html(data.msg);
                     $("#create_cst_msg").show();
                  }
                 
               },
                error: function(data){  

                    $("#loader_cst").hide(); 
                    $("#create_cst_msg").html('An error occurred!');
                    $("#create_cst_msg").show();               
                }

            }); 

   
}


</script>
