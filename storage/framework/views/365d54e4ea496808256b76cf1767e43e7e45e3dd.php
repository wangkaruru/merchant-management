 <?php echo $__env->make('masterview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row jumbotron text-align-left font-ubuntu ">

<div class=" row  padded-md">
 <span class="pull-left  "><big><?php echo e(@$configs_text['dashboard1']['menuText']); ?></big> </span>

<!-- 
<a href="#"> <Button onclick="open_create_mode()"  class="btn btn-success  padded-md  pull-right font-open font-md" >Create Price Mode</Button></a>
<a href="#"> <Button onclick="open_view_mode()"  class="btn btn-success  padded-md  pull-right font-open font-md" >View Existing Price Modes</Button></a>
 -->
</div><hr style="margin-top:0px;">
<span id="saving" class="success" style="display:none;"><img src="<?php echo e(asset('images/loading2.gif')); ?>" style=" max-height:100px; max-width:100px;position:fixed;left:50%;top:40%; z-index:999;"/></span>

<div  id="create_mode_view" style="display:block;"> 

<div class="col-md-1"></div>


 <div style="border:2px solid #e72764;margin:5px;border-radius:5px;"  class="col-md-4">
 <h6 align="center" style="color:#363636;"><b><?php echo e(@$configs_text['dashboard2']['menuText']); ?></b></h6>
 <hr style="margin:2px;"><br>
 <span id="loading_modes" class="success"  align="center" style="display:none;"><img src="<?php echo e(asset('images/loading.gif')); ?>" style="max-height:25px; max-width:25px;margin-left:10%;"><small></small></span> 
  <h5 align="center" class="font-open " id="bal_ref" > </h5><br> 
</div>

<div style="border:2px solid #e72764;margin:5px;border-radius:5px;"  class="col-md-4">
 <h6 align="center" style="color:#363636"><b><?php echo e(@$configs_text['dashboard3']['menuText']); ?></b></h6>
 <hr style="margin:2px;">
 
  <h6 align="center" class="font-open"><span style="color:#363636;"><?php echo e(@$configs_text['dashboard4']['menuText']); ?>:</span> <?php echo e(session('ref_name')); ?></h6>
  <h6 align="center" class="font-open"><span style="color:#363636;"><?php echo e(@$configs_text['dashboard5']['menuText']); ?>:</span><?php echo e(session('ref_msisdn')); ?></h6>
  <h6 align="center" class="font-open"><span style="color:#363636;"><?php echo e(@$configs_text['dashboard6']['menuText']); ?></span><?php echo e(session('user_id')); ?></h6>

</div>


<br><br><br><br><br>
</div><!-- end of create  -->
<br/> 


<br/><br/>
</div>


 <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

 <!-- CUSTOM JS HERE -->
<script >


//on body load, start to load bg data
$( document ).ready(function() { 
    load_bal();   
    
});

function load_bal(){
 
    $('#loading_modes').show();   

     var pdata = { 
            action:'get_existing',          
            _token : '<?php echo csrf_token() ?>',
        }

       $.ajax({
               type:'POST',
                url:'<?php  echo url("/get_bal"); ?>', 
               
               data:pdata,
               success:function(data){

                  $('#loading_modes').hide();
                 
                  if(data.success==1){                                      
                     //console.log(data.bal);
                     var bal=(data.bal);
                     $("#bal_ref").html('Kz '+ to_cash(bal));                      
                    
                  }else{
                     $("#create_mode_msg").html('No data found!');
                     $("#create_mode_msg").show();
                  }
                  //$("#msg").html(data.status1);
                
               },
                error: function(){
                  $('#loading_modes').hide();                 
                  $("#create_mode_msg").html('No data found!');
                  $("#create_mode_msg").show();
                }

            });     
  

}/*close fxn load */








/*-----end of all script fxns here------*/
</script>