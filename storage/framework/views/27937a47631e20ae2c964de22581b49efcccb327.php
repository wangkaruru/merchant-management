 <?php echo $__env->make('masterview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row jumbotron text-align-left font-ubuntu ">

<div class=" row  padded-md">
 <span class="pull-left  "><h5><?php echo e(@$configs_text['partnerprofile1']['menuText']); ?> </h5> </span>
<?php if(session('status1')): ?>
 <script> 
 f_set();
</script>

<?php endif; ?>

</div><hr style="margin-top:1px;margin-bottom:2px;"> <br>
<h6><?php echo e(@$configs_text['partnerprofile5']['menuText']); ?>( <span class="info"><?php echo e(@$configs_text['partnerprofile2']['menuText']); ?>: <?php echo e(session('user_id')); ?></span>)</h6>

<span id='ref_verify_message_id' style="display:none;"></span>
<span id='ref_verify_message_item_id' style="display:none;"></span>

 <span class="info font-open" id="all_transactions_msg" style="display:none;" align="left"></span>
 <span class="success font-open" id="all_transactions_msg2" style="display:none;" align="left" ></span>
<span id="loading_preview_message" class="success"  align="center" style="display:none;"><img src="<?php echo e(asset('images/loading.gif')); ?>" style="max-height:45px; max-width:45px;margin-left:10%;"><small></small></span> 
  
<span id="saving" class="success" style="display:none;"><img src="<?php echo e(asset('images/loading2.gif')); ?>" style=" max-height:100px; max-width:100px;position:fixed;left:50%;top:40%; z-index:999;"/></span>





<div  id="all_transactions_view" style="display:block;"> 

  <?php echo Form::open(['name' => 'apply','id'=>'apply']); ?>

  <div class=" row  font-open padded-md" >
     <span class="font-open  font-md success pull-left"><u></u></span>   
 </div>
 <div class="row padded-md"><br> 
 
<div class="col-md-3 padded">   
        <span class="font-md font-open"><?php echo e(@$configs_text['partnerprofile3']['menuText']); ?></span><br>
      <input type="password" name="c_pass" id="c_pass" class="font-small"  required="" placeholder='' autofocus="" 
      value="" style="margin-right:2px;">
 </div>
 <div class="col-md-3 padded">   
        <span class="font-md font-open"><?php echo e(@$configs_text['partnerprofile4']['menuText']); ?> </span><br>
       <input type="password" name="n_pass" id="n_pass"class="font-small" placeholder='' required="" autofocus
       value="">
   </div>
 </div>

 <?php echo Form::close(); ?>


    <div class="col-md-2 padded" align="left" ><br>
        <button  class="btn btn-success  padded-md  font-ubuntu font-md" align="left" onclick="change_lang()" ><?php echo e($configs_text['profile2']['menuText']); ?></button>
    </div>

  <div class="col-md-5 padded" align="center" ><br>
      <button  class="btn btn-success  padded-md  font-ubuntu font-md" align="left" onclick="filter_all_transactions()" ><?php echo e(@$configs_text['partnerprofile6']['menuText']); ?></button>
  </div>
<br>


<br/><br/>

</div><!-- close create message view -->


<div  id="f_time" style="display:none;"> 

  <?php echo Form::open(['name' => 'ft','id'=>'ft']); ?>

  <div class=" row  font-open padded-md" >
     <span class="font-open  font-md success pull-left"><u></u></span>   
 </div>
 <div class="row padded-md"><br> 
 <h5><u>First Time log in</u></h5>
<h6>Please set your password</h6>
 <div class="col-md-3 padded">   
        <span class="font-md font-open"> New Password</span><br>
       <input type="password" name="n_pass2" id="n_pass2"class="font-small" placeholder='' required="" autofocus
       value="">
   </div>
 </div>

 <?php echo Form::close(); ?>

  <div class="col-md-5 padded" align="center" ><br>
      <button  class="btn btn-success  padded-md  font-ubuntu font-md" align="left" onclick="filter_all_transactions2()" >Change Password</button>
  </div>
<br>


<br/><br/>

</div><!-- close create message view -->



</div><!-- close jumbotron -->

  <div class="modal fade" id="verify_message_modal" role="dialog">
    <div class="modal-dialog modal-md">    
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title success" align="center">Confirm Resend </h5>
        </div>
        <hr/>
        <div class="modal-body">
        <div align="center">
           <span class="info font-open" id="verify_msg" style="display:none;" align="right"></span>
          <span class="success font-open" id="verify_msg2" style="display:none;" align="right " ></span>
          <br/> <br/>
        </div>   
       
        
         <h6 align="center">  Are you sure you want to retry sending this message? </h6>
         <br/><hr>
      </div>
       <div class="row">
           <div class="row col-md-6" align="center">
             
             <button  onclick="resend_message()" class="btn btn-success padded-md font-ubuntu"> Yes</button>
           </div>
          <div class="row col-md-6" align="center">
             
               <button type="button"  class="btn btn-success padded-md font-ubuntu" data-dismiss="modal">No</button>
          </div>
      </div>

       </div>
      </div> 
</div>

 <br/>


 <div class="modal fade" id="lang_modal" role="dialog">
     <div class="modal-dialog modal-md">
         <!-- Modal content-->
         <div class="modal-content" id="">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title success" align="center"><?php echo e(@$ops_text['ops38']['menuText']); ?></h5>
             </div>
             <hr  style="margin-top:0px;">
             <div class="modal-body" align="center">
                 <div align="center">
                     <span class="info font-open" id="limits_msg" style="display:none;" align="right"></span>
                     <span class="success font-open" id="limits_msg2" style="display:none;" align="right " ></span>
                 </div>
                 <?php echo Form::open(['url' => 'changeLang']); ?>

                 <input type="hidden" name="ref" value="<?php echo e($details->id); ?>">
                 <?php echo e(@$ops_text['ops38']['menuText']); ?>: <br>


                     <select id="lang" name="lang" class="font-small">
                         <option value="1">English</option>
                         <option value="4"> Portuguese</option>
                     </select>
                     <br/> <br/>
             </div> <hr  style="margin-bottom:0px;">
             <div class="row">
                 <div class="row col-md-6" align="center">
                     <button   class="btn btn-success padded-md font-ubuntu"><?php echo e(@$ops_text['ops19']['menuText']); ?></button>
                 </div>
                 <div class="row col-md-6" align="center">
                     <button type="button"  class="btn  padded-md font-ubuntu" data-dismiss="modal"><?php echo e(@$ops_text['ops67']['menuText']); ?></button>
                 </div>
                 <?php echo Form::close(); ?>

                 <br/> <br/>
             </div>



         </div>
     </div>
 </div>








</div>


  

 <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

 <!-- CUSTOM JS HERE -->
<script >


//on body load, start to load select data for other panels already hidden in the background
$( document ).ready(function() {       
     //get_bg_data();//select data
     //preview_message_before_managing();

     //load_existing_transactions();// get data for existing transactions
    
});

function change_lang(){
    $('#lang_modal').modal('show');
}



//ensure all inputs are entered.
function validate_form(form_name){
  var r= Array.from(document.querySelectorAll(form_name)).every(
      function(el){return el.value;}
  )
 return r;

}//close validate fxn 


//reset forms to start over at choose customer type, reset reference value for a customer...
function reset_forms(){
  $('#basic')[0].reset();
 
}

function f_set(){
  $('#all_transactions_view').hide();
  $('#f_time').show();
}

function filter_all_transactions2(){

   $("#all_transactions_msg").hide();
   $("#all_transactions_msg2").hide();

 var validated=validate_form('#ft input');
  if(validated==true){

  var url='<?php  echo url("/change_pass_first"); ?>';     
  
    $('#loading_preview_message').show();
    var pdata = { 
            
            n_pass: $('#n_pass2').val(),            
            _token : '<?php echo csrf_token() ?>',
        }
         $.ajax({
               type:'POST',
                url:url,               
               data:pdata,
               success:function(data){ 

                //console.log(data.msisdns);            
               
                //var b_u =JSON.parse(data.base_unit);
                //var base_unit=b_u.base_currency_conversion_unit;
                  if(data.success==1){                  

                    //console.log(data.m_status);
                        $('#loading_preview_message').hide();
                        $("#all_transactions_msg2").html(data.msg);
                        $("#all_transactions_msg2").show();

                  }else{                     
                      $('#loading_preview_message').hide();
                      $("#all_transactions_msg").html(data.msg);
                      $("#all_transactions_msg").show();
                  }
                  //$("#msg").html(data.status1);
                
               },
                error: function(data){
                  $('#loading_preview_message').hide();
                      $("#all_transactions_msg").html('No data to show');
                      $("#all_transactions_msg").show();
                }

            });    

 }else{
      $("#all_transactions_msg").html("all fields are required!");
      $("#all_transactions_msg").show();
 }   
    
 

}/*close fxn message*/



function filter_all_transactions(){

   $("#all_transactions_msg").hide();
   $("#all_transactions_msg2").hide();

 var validated=validate_form('#apply input');
  if(validated==true){

  var url='<?php  echo url("/change_pass"); ?>';     
  
    $('#loading_preview_message').show();
    var pdata = {  

            c_pass: $('#c_pass').val(),
            n_pass: $('#n_pass').val(),            
            _token : '<?php echo csrf_token() ?>',
        }
        $.ajax({
               type:'POST',
                url:url,               
               data:pdata,
               success:function(data){ 

                //console.log(data.msisdns);            
               
                //var b_u =JSON.parse(data.base_unit);
                //var base_unit=b_u.base_currency_conversion_unit;
                  if(data.success==1){                  

                    //console.log(data.m_status);
                        $('#loading_preview_message').hide();
                        $("#all_transactions_msg2").html(data.msg);
                        $("#all_transactions_msg2").show();

                  }else{                     
                      $('#loading_preview_message').hide();
                      $("#all_transactions_msg").html(data.msg);
                      $("#all_transactions_msg").show();
                  }
                  //$("#msg").html(data.status1);
                
               },
                error: function(data){
                  $('#loading_preview_message').hide();
                      $("#all_transactions_msg").html('No data to show');
                      $("#all_transactions_msg").show();
                }

            });    

 }else{
      $("#all_transactions_msg").html("all fields are required!");
      $("#all_transactions_msg").show();
 }   
    
 

}/*close fxn message*/



/*-----end of all  fxns here------*/
</script>