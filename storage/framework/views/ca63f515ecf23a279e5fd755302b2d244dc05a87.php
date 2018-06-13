 <?php echo $__env->make('masterview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row jumbotron text-align-left font-ubuntu ">

<div class=" row  padded-md">
 <span class="pull-left  "><h5>Disbursement History</h5> </span>


</div><hr style="margin-top:1px;margin-bottom:2px;">

<span id='ref_verify_message_id' style="display:none;"></span>
<span id='ref_verify_message_item_id' style="display:none;"></span>

 <span class="info font-open" id="all_transactions_msg" style="display:none;" align="left"></span>
 <span class="success font-open" id="all_transactions_msg2" style="display:none;" align="left" ></span>
<span id="loading_preview_message" class="success"  align="center" style="display:none;"><img src="<?php echo e(asset('images/loading.gif')); ?>" style="max-height:45px; max-width:45px;margin-left:10%;"><small></small></span> 
  
<span id="saving" class="success" style="display:none;"><img src="<?php echo e(asset('images/loading2.gif')); ?>" style=" max-height:100px; max-width:100px;position:fixed;left:50%;top:40%; z-index:999;"/></span>
<span id='ref_bl' style='display:none'></span>
<br><br>
<h6 style="color:#363636" ><u></u></h6>
 <table class="table" style="background-color:#fff; color:#363636;" >
           <tr class="font-open font-small"  >            
             <th> Date</th>            
             <th>Description</th>                        
             <th>Total Amount</th>
             <th>Status</th>                     
            </tr>   
      <tbody id="recent_table" class="font-open font-small">
        
      </tbody>          
    </table>




</div><!-- close jumbotron -->







</div>


  

 <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

 <!-- CUSTOM JS HERE -->
<script >


//on body load, start to load select data for other panels already hidden in the background
$( document ).ready(function() {       
     //load_bal(); 
     get_recent_transfers();   
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


/*function load_bal(){
 
    

     var pdata = { 
            action:'get_existing',          
            _token : '<?php echo csrf_token() ?>',
        }

       $.ajax({
               type:'POST',
                url:'<?php  echo url("/get_bal"); ?>', 
               
               data:pdata,
               success:function(data){

                  
                 
                  if(data.success==1){                                      
                     console.log(data.bal);
                     var bal=(data.bal/100).toFixed(2);

                     $( "#sva" ).append('(Bal: Kz '+bal.replace('.',',')+')');
                     $( "#cra" ).append('(Bal: Kz '+bal.replace('.',',')+')');
                     $( "#fda" ).append('(Bal: Kz '+bal.replace('.',',')+')');                                          
                     $("#ref_bl").html(bal);
                  }
                
               },
                error: function(){
                 
                }

            });     
  

}/*close fxn load */




function get_recent_transfers(){

 
  var url='<?php  echo url("/recent_disbursements"); ?>';   
  
    
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
                     
                      if(msg[i].disbursementstatus==1){
                       var status='<span class="success">Success</span>';
                     } else if(msg[i].disbursementstatus==0){
                       var status='<span class="info">Pending</span>';
                     }
                      else if(msg[i].disbursementstatus==2){
                       var status='<span class="info">Failed</span>';
                     }
                      else if(msg[i].disbursementstatus==3){
                       var status='<span class="info">Cancelled</span>';
                     }

                     
                       c_content = c_content +'<tr> <td>'+msg[i].created_on+
                       '</td> <td>'+msg[i].description+                       
                        '</td> <td>'+to_cash(msg[i].totaldisbursed)+ 
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