 <?php echo $__env->make('masterview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row jumbotron text-align-left font-ubuntu ">

<div class=" row  padded-md">
 <span class="pull-left  "><big>Disbursements</big>: <span class="font-open">Create New Disbursement</span> </span>

<!-- 
<a href="#"> <Button onclick="open_create_disbursement()"  class="btn btn-success  padded-md  pull-right font-open font-md" >Create Price disbursement</Button></a>
<a href="#"> <Button onclick="open_view_disbursement()"  class="btn btn-success  padded-md  pull-right font-open font-md" >View Existing Price disbursements</Button></a>
 -->
</div><hr style="margin-top:0px;">
<span id="saving" class="success" style="display:none;"><img src="<?php echo e(asset('images/loading2.gif')); ?>" style=" max-height:100px; max-width:100px;position:fixed;left:50%;top:40%; z-index:999;"/></span>
<span id="ref_approve_batch" style="display: none;"></span>
<div  id="create_disbursement_view" style="display:block;"> 
<span id="counter" style="display:none;">1</span>
<div class="row padded-md font-md font-ubuntu "  >
    

    <span id="saving" class="success" style="display:none;"><img src="<?php echo e(asset('images/loading2.gif')); ?>" style=" width:100px; height=25px; max-height:300px; max-width:300px;position:fixed;left:50%;top:20%; z-index:999;"/></span>
    <a href="<?php echo e(asset('assets/sample/sample_upload1.xlsx')); ?>" download="" target="_blank" class="pull-right success"  > Sample excel file</a>
        <br>
            <h6 class="info font-open" id="create_disbursement_msg" style="display:none;" align="center"></h6>
            <h6 class="success font-open" id="create_disbursement_msg2" style="display:none;" align="center"></h6>
            <?php echo Form::open(['name'=>'create_disbursement', 'id'=>'create_disbursement', 'enctype'=>'multipart/form-data']); ?>

  
        
         <div class="row padded-md">
           



                  <div class="col-md-3 padded">   
                     <b>Payment Purpose:</b><br>
                       <select class="font-open" name='c_bill_types' id='c_bill_types' required="" autofocus="">
                           <?php foreach($bill_types as $b): ?>
                         <option value="<?php echo e($b->PayableBillTypeId); ?>"> <?php echo e($b->BillType); ?></option>
                           <?php endforeach; ?>
                       </select>  
                 </div>

                  <div class="col-md-3 padded">   
                  <b>Description:</b><br>
                   <input type="text" name="c_description"  id="c_description" class="" autofocus=""  required="" placeholder="eg monthly salary">
                 </div>
                  <div class="col-md-3 padded">   
                     <b> Upload Excel File:</b><br>
                      <input type="file" name="disbursementfile" id='disbursementfile' accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel">
                 </div>

          </div><!-- close row -->
           <br>
      <?php echo Form::close(); ?>

        <div class="row col-md-11" align="center">
          <br/>      
          <button  class="btn btn-success  padded-md  font-ubuntu font-md2" onclick="do_create_disbursement()" >Create Disbursement</button>     
        </div>
 
</div>
</div><!-- end of create  -->
<br/> 


<br/><br/>
</div>


  <div class="modal fade" id="approve_modal" role="dialog">
    <div class="modal-dialog modal-md">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title success font-ubuntu" align="center"> Confirm Disbursement </h5>

        </div> <hr  style="margin: 0px;">
         <br>
          
        <div class="modal-body padded-md font-ubuntu font-md" align="center">           

           <div id="sending"  style="font-size:18px; display:none;">  
            
            <span>Sending: </span>  <button  class="btn error  padded-md  font-ubuntu font-md" align="left" onclick="cancel_disbursement()" >Cancel</button>
              <br>              
              <div id="myProgress" style="width:100%;background-color:grey;">
                <span id="myBar"  style="width:2%; height:30px;float:left;background-color: green;">
                    <span id="timer" class="font-open md"  style="color:#ffffff;float:center;">2% </span>
                </span>
              </div>
              <br>
          </div>

            <h6 class=" font-md" style="font-size:15px;" id="msg3"> Everything looks good.Proceed to approve</h6><br>
             <br>
              <hr  style="margin:0px;margin-bottom:10px;">
                <button  class="btn btn-success  padded-md  font-ubuntu font-md" align="left" onclick="initiate_disbursement()" >Approve </button>
          <br><br>           
        </div>
   
        </div>
        </div>
      </div><?php /*end of modal*/ ?>

    </div>
  

 <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

 <!-- CUSTOM JS HERE -->
<script >


//on body load, start to load bg data
$( document ).ready(function() {    
    
});

//ensure all inputs are entered.
function validate_form(form_name){
  var r= Array.from(document.querySelectorAll(form_name)).every(
      function(el){return el.value;}
  );
 return r;

}//close validate fxn 

//reset forms 
function reset_forms(){
  $('#create_disbursement')[0].reset(); 
}


//create disbursement
function  do_create_disbursement(){

   $("#create_disbursement_msg2").hide();
   $("#create_disbursement_msg").hide();
   $("#myBar").width('2%');
   //$("#timer").width('2%');
   $("#timer").html('2');

   $("#counter").html(1);
   $('#sending').hide();
   $('#msg3').show();

  var validated=validate_form('#create_disbursement input');
  if(validated==true){
    //form details now ok.
    var  phone='<?php echo session("ref_msisdn"); ?>';
    var  bill_id=$('#c_bill_types').val();
   var   tt=$('#c_description').val();


      $('#saving').show();
      $("#create_disbursement_msg").html("Uploading and Validating....Please wait");
      $("#create_disbursement_msg").show();
        $.ajax({
               type:'POST',
               url:'<?php  echo url("/CreateDisbursement"); ?>',  
               data: new FormData($('#create_disbursement')[0]),
               contentType:false,
                cache: false,
                processData:false,
               headers: {  'X-CSRF-Token': $('input[name="_token"]').val() },

               success:function(data){
                  console.log(data); 
                   $('#saving').hide();
                  if(data.success){                     
                     //show modal to approve
                      $('#ref_approve_batch').html(data.record_id);
                      $('#approve_modal').modal('show');

                  }else{ 

                      $('#saving').hide();
                      $("#create_disbursement_msg").html("Failed! "+data.msg);
                      $("#create_disbursement_msg").show();
                  }                  
                
               },
                error: function(data){
                  
                      $('#saving').hide();
                      $("#create_disbursement_msg").html("error occured!!");
                      $("#create_disbursement_msg").show();
                }

            });       
    
  }else{
    $("#create_disbursement_msg").html('All fields  are required!');
    $('#create_disbursement_msg').show();
  }
}

  function approve_disbursement() {

    var counter= $("#counter").html();
    if(counter==1){
       $("#counter").html(0);
    }

    $("#create_disbursement_msg").hide();
      
      var pdata = {
          batch_id: $('#ref_approve_batch').html(),
          _token : '<?php echo csrf_token() ?>',
      };
      $.ajax({
          type:'POST',
          url:'<?php  echo url("/approve_disbursement"); ?>',
          data:pdata,
          success:function(data){

             $('#saving').hide();
              if(data.success==1){

                  $('#approve_modal').modal('hide');                
                  $("#create_disbursement_msg2").html(data.msg);
                  $("#create_disbursement_msg2").show();

              }else{
                  $('#approve_modal').modal('hide');                  
                  $("#create_disbursement_msg").html(data.msg);
                  $("#create_disbursement_msg").show();
              }
         window.location.replace("<?php  echo url('/CreateDisbursement');?>");

          },
          error: function(data){
              $('#approve_modal').modal('hide');
              $('#saving').hide();
              $("#create_disbursement_msg").html('error occurred');
              $("#create_disbursement_msg").show();

            window.location.replace("<?php  echo url('/CreateDisbursement');?>");
          }

      });
  }


function  initiate_disbursement(){

  $('#sending').show();
  $('#msg3').hide();
  for(var i=0; i<=2; i++){
     setInterval(do_loop, Math.floor(Math.random() * 999) + 700);
  }
 
}



 function do_loop(){

   var l= parseInt($("#timer").html());
   var n=l+Math.floor(Math.random() * 6) + 4;
    if(n<100){
    $("#timer").html(n +'%');
    $("#myBar").width(n +'%');
    
   }else if(n>92){

    $("#timer").html(' ');
     $('#sending').hide();
     $('#approve_modal').modal('hide');
      $('#saving').show();
      approve_disbursement();

   }
   
 }



  function cancel_disbursement(){
    $("#timer").html('cancelled ');
    $('#approve_modal').modal('hide');
    $("#create_disbursement_msg").html('Cancelled!');
    $("#create_disbursement_msg").show();

       var pdata = {
          batch_id: $('#ref_approve_batch').html(),
          _token : '<?php echo csrf_token() ?>',
      };
      $.ajax({
          type:'POST',
          url:'<?php  echo url("/cancel_disbursement"); ?>',
          data:pdata,
          success:function(data){
                window.location.replace("<?php  echo url('/CreateDisbursement');?>");

          },
          error: function(data){
                 window.location.replace("<?php  echo url('/CreateDisbursement');?>");

          }

      });

    
  }//close fxn 




</script>