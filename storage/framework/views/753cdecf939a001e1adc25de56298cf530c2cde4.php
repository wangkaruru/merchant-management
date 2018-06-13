 <?php echo $__env->make('masterview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row jumbotron text-align-left font-ubuntu ">

<div class=" row  padded-md">
 <span class="pull-left  "><h5><?php echo e(@$configs_text['biller1']['menuText']); ?></h5> </span>


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
<span id="loader" class="success"  align="center" style="display:none;"><img src="<?php echo e(asset('images/loading.gif')); ?>" style="max-height:25px; max-width:25px;margin-left:10%;"><small></small></span>

 <table class="table table-bordered table-striped" style="background-color:#fff; color:#363636;" >
           <tr class="font-open font-small"  >            
             <th><?php echo e(@$configs_text['biller2']['menuText']); ?></th>
             <th><?php echo e(@$configs_text['biller4']['menuText']); ?></th>
           </tr>   
      <tbody id="recent_table" class="font-open font-small">
       
           <tr class="font-open font-small"  >            
             <td><?php echo e(@$configs_text['biller3']['menuText']); ?></td>
             <td id="available_balance"></td>
           </tr>
      </tbody>          
    </table>



<!-- recent transactions -->
<br>
<span class="pull-left  "><h6 class="font-open success"> <u>Recent Biller Account Transactions</u></h6> </span>
 <table class="table table-striped table-bordered" style="margin-top:20px;">
                                  <thead style="border:1px solid #e7eaed;">
                                    <tr class="font-ubuntu small">
                                       <th> <b><?php echo e(@$csm_text['csm49']['menuText']); ?></b> </th>
                                       <th> Details</th>
                                       <th><?php echo e(@$csm_text['csm51']['menuText']); ?></th>
                                       <th><?php echo e(@$csm_text['csm52']['menuText']); ?></th>
                                       <!-- <th>Charge</th> -->
                                       <th><?php echo e(@$csm_text['csm53']['menuText']); ?></th>
                                       <th><?php echo e(@$csm_text['csm54']['menuText']); ?></th>
                                       <th><?php echo e(@$csm_text['csm55']['menuText']); ?></th>                                      
                                    </tr>     

                                  </thead>                                        
                                 <tbody id="transactions_table" class="font-small">
                                    <tr> <td colspan="6"><h6 class="info font-open" id="transactions_msg" align="center"></h6></td></tr> 
                                 </tbody>                     
                                 
                                 
                               </table>
<!-- end cst txn -->

</div><!-- close create message view -->




</div><!-- close jumbotron -->

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


function get_details(){
 
    $('#loader').show();

     var pdata = { 
            action:'get_existing',          
            _token : '<?php echo csrf_token() ?>',
        };
       $.ajax({
               type:'POST',
               url:'<?php  echo url("/get_biller_acc_details"); ?>',
               data:pdata,
               success:function(data){
                 
                  if(data.success==1){ 
                  $('#loader').hide();                                     
                     //console.log(data);
                     var bl=JSON.parse(data.bal);
                     $( "#available_balance" ).html(to_cash(bl.available_balance));
                     
                      var decoded=data.transactions;
                     var t_content=""; 
                     var i;
                     var  bl=[];
                     var cid="<?php echo e(@session('ref_cid')); ?>";
                     
                     for(i=0; i<decoded.length; i++){

                      if(decoded[i].transaction_status_id==1){
                        var state='<h6 class="success">yes</h6>';
                      }
                       else{
                        var state='<h6 class="info">no</h6>';                      
                     }

                     if(cid==decoded[i].payee_id){
                        bl[i]=decoded[i].payee_balance_after_transaction/100;
                     }else{
                        bl[i]=decoded[i].payer_balance_after_transaction/100;
                     } 

                      t_content = t_content + '<tr> <td> '+decoded[i].transaction_date+
                       ' </td> <td> '+decoded[i].text+
                       '</td> <td>'+decoded[i].short_description+
                       ' </td><td>'+to_cash((decoded[i].transaction_amount)/100)+
                       //'</td> <td>'+to_cash(decoded[i].transaction_fee/100)+
                       '</td><td>'+decoded[i].transaction_reference+
                       '</td> <td>'+ to_cash(bl[i]) +                       
                       '</td> <td>'+state+
                       ' </td>  </tr> ';
                    }
                      $("#transactions_table").html(t_content);


                     
                  }else{
                    $('#loader').hide();  
                  }
                
               },
                error: function(){
                 $('#loader').hide();  
                }

            });     
  

}/*close fxn load */

/*-----end of all  fxns here------*/
</script>