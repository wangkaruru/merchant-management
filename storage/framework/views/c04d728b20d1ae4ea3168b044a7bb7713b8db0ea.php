 <?php echo $__env->make('masterview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row jumbotron text-align-left font-ubuntu ">

<div class=" row  padded-md">
 <span class="pull-left  "><h5><?php echo e(@$configs_text['account1']['menuText']); ?></h5> </span>


</div><hr style="margin-top:1px;margin-bottom:2px;">

<span id='ref_verify_message_id' style="display:none;"></span>
<span id='ref_verify_message_item_id' style="display:none;"></span>

 <span class="info font-open" id="all_transactions_msg" style="display:none;" align="left"></span>
 <span class="success font-open" id="all_transactions_msg2" style="display:none;" align="left" ></span>
<span id="loading_preview_message" class="success"  align="center" style="display:none;"><img src="<?php echo e(asset('images/loading.gif')); ?>" style="max-height:45px; max-width:45px;margin-left:10%;"><small></small></span> 
  
<span id="saving" class="success" style="display:none;"><img src="<?php echo e(asset('images/loading2.gif')); ?>" style=" max-height:100px; max-width:100px;position:fixed;left:50%;top:40%; z-index:999;"/></span>
<span id='ref_bl' style='display:none'></span>


<div  id="all_transactions_view" style="display:block;"> 
<br>
<h6 style="color:#363636" ><u><?php echo e(@$configs_text['account2']['menuText']); ?></u></h6><span id="loader" class="success"  align="center" style="display:none;"><img src="<?php echo e(asset('images/loading.gif')); ?>" style="max-height:25px; max-width:25px;margin-left:10%;"><small></small></span>

 <table class="table table-bordered table-striped" style="background-color:#fff; color:#363636;" >
           <tr class="font-open font-small"  >            
             <th><?php echo e(@$configs_text['account3']['menuText']); ?></th>
             <th><?php echo e(@$configs_text['account4']['menuText']); ?></th>
           </tr>   
      <tbody id="recent_table" class="font-open font-small">
         <tr class="font-open font-small"  >            
             <td><?php echo e(@$configs_text['account5']['menuText']); ?></td>
             <td id="f_name"></td>
           </tr>
           <tr class="font-open font-small"  >            
             <td><?php echo e(@$configs_text['account6']['menuText']); ?></td>
             <td }id="m_name"></td>
           </tr>
          <tr class="font-open font-small"  >            
             <td><?php echo e(@$configs_text['account7']['menuText']); ?></td>
             <td id="l_name"></td>
           </tr>
            <tr class="font-open font-small"  >            
             <td><?php echo e(@$configs_text['account8']['menuText']); ?></td>
             <td id="msisdn"></td>
           </tr>
            <tr class="font-open font-small"  >            
             <td><?php echo e(@$configs_text['account9']['menuText']); ?></td>
             <td id="id_number"></td>
           </tr>
          <tr class="font-open font-small"  >            
             <td><?php echo e(@$configs_text['account10']['menuText']); ?></td>
             <td id="email"></td>
           </tr>
           <tr class="font-open font-small"  >            
             <td><?php echo e(@$configs_text['account12']['menuText']); ?></td>
             <td id="language"></td>
           </tr>
           <tr class="font-open font-small"  >            
             <td><?php echo e(@$configs_text['account13']['menuText']); ?></td>
             <td id="blacklisted"></td>
           </tr>
           <tr class="font-open font-small"  >            
             <td><?php echo e(@$configs_text['account14']['menuText']); ?>:</td>
             <td id="pin_set"></td>
           </tr>
           
      </tbody>          
    </table>
</div><!-- close create message view -->




</div><!-- close jumbotron -->

  <div class="modal fade" id="bank" role="dialog">
    <div class="modal-dialog modal-md">    
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title" align="center">Alert</h5>
        </div>
        <hr/>
        <div class="modal-body">
        <div align="center">
         <br/>
        </div>   
       
        
         <h6 align="center" class="info"> <?php echo e(@$configs_text['account15']['menuText']); ?>Sorry! No other bank integrated at the moment! </h6>
         <br/><hr>
      </div>
       <div class="row">
           <div class="row col-md-6" align="center">            
             
           </div>
          <div class="row col-md-6" align="center">
             
               <button type="button"  class="btn btn-success padded-md font-ubuntu" data-dismiss="modal"><?php echo e(@$configs_text['account16']['menuText']); ?>OK, Got it!</button>
          </div>
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
     //load_bal(); 
     get_details();   
});


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

function check_ref_trans(){

  var ref= $('#target_account').val();

  if(ref!=='1'){   
     $('#bank').modal('show');
     $('#trans_btn').hide();
  }else if (ref=='1'){     
      $('#trans_btn').show();
      $('#bank').modal('hide');
  }
}



//display create message view 
function open_all_transactions(){ 
  $('#all_transactions_view').show();  
  $('#financials_view').hide();
 
}



// add message itm view 
function open_financials_transactions(){ 
  $('#all_transactions_view').hide();  
  $('#financials_view').show();
}

function get_details(){
 
    $('#loader').show();

     var pdata = { 
            action:'get_existing',          
            _token : '<?php echo csrf_token() ?>',
        };
       $.ajax({
               type:'POST',
               url:'<?php  echo url("/get_acc_details"); ?>',
               data:pdata,
               success:function(data){
                 
                  if(data.success==1){ 
                  $('#loader').hide();                                     
                     //console.log(data);
                     var details=JSON.parse(data.details);
                     var lang=JSON.parse(data.lang);
                     if(details.is_blacklisted==true){
                      var b="<span class='info'> Yes</span>" ;
                     }else{
                       var b="<span class='success'> NO</span>" ;
                     }

                      if(details.account_pin_set==true){
                      var ps="<span class='success'> Yes</span>" ;
                     }else{
                       var ps="<span class='info'> NO</span>" ;
                     }

                     $( "#f_name" ).html(details.first_name);
                     $( "#m_name" ).html(details.middle_name);
                     $( "#l_name" ).html(details.last_name);
                     $( "#msisdn" ).html(details.msisdn);
                     $( "#id_number" ).html(details.id_number);
                     $( "#email" ).html(details.email_address);
                     $( "#language" ).html(lang[details.language_id-1].language_name);
                     $( "#blacklisted" ).html(b);
                     $( "#pin_set" ).html(ps);
                     
                  }else{
                    $('#loader').hide();  
                  }
                
               },
                error: function(){
                 $('#loader').hide();  
                }

            });     
  

}/*close fxn load */

function filter_all_transactions(){

   $("#all_transactions_msg").hide();
   $("#all_transactions_msg2").hide();
 var validated=validate_form('#trs input');
  if(validated==true){
    var am=parseInt($('#amount').val()); 
    var bl=parseInt($('#ref_bl').html());  
  if(am < bl){
  var url='<?php  echo url("/transfer"); ?>';     
  
    $('#loading_preview_message').show();
    var pdata = {           
            amount: $('#amount').val(),
            receiver: $('#to_acc').val(),            
            transfer_from: $('#transfer_from').val(),
            target_bank: $('#target_account').val(),
            currency: $('#currency').val(),
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
                    get_recent_transfers();
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
      $("#all_transactions_msg").html("Your Balance is less than the amount you want to transfer!");
      $("#all_transactions_msg").show();
 }       
    }else{
      $("#all_transactions_msg").html("all fields are required!");
      $("#all_transactions_msg").show();
 } 
 

}/*close fxn message*/





function get_recent_transfers(){

 
  var url='<?php  echo url("/recent_transfers"); ?>';   
  
    
    var pdata = {
            _token : '<?php echo csrf_token() ?>',
        }

        $.ajax({
               type:'POST',
               url:url,               
               data:pdata,
               success:function(data){  
                //console.log(data.msisdns);               
                console.log(data.logs); 
                var all=(data.logs);
                  if(all.length){
                    
                    var msg=all;                    
                    var c_content='';
                    var counter=0;

                    for(i=0; i<msg.length; i++){  
                     
                      if(msg[i].successfull==1){
                       var status='<span class="success">Success</span>';
                     } else if(msg[i].successfull==0){
                       var status='<span class="info">Failed</span>';
                     }

                      if(msg[i].ref_bank==1){
                       var bank='Banco Sol';
                     } else if(msg[i].ref_bank==0){
                       var bank='Other Bank';
                     }
                       c_content = c_content +'<tr> <td>'+msg[i].date_added+
                       '</td> <td>'+msg[i].trans_ref+
                       '</td> <td>'+msg[i].amount+' ('+msg[i].currency+')'+
                       '</td> <td>'+msg[i].from_acc_type +
                       '</td> <td>'+msg[i].to_acc+ 
                       '</td> <td>'+bank+
                       '</td> <td>'+status+                                                
                       '</td></tr>';
                     }

                     $("#recent_table").html(c_content);  

                   

                  }else{                     
                   
                  }
                
                
               },
                error: function(data){
                }

            });       
    
 

}/*close fxn */





/*-----end of all  fxns here------*/
</script>