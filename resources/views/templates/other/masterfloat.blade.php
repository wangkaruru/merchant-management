 @include('masterview')
<div class="row jumbotron text-align-left font-ubuntu ">

<div class=" row  padded-md">
 <span class="pull-left  "><h5>Master Float</h5> </span>
<a href="#"> <Button onclick="open_history_view()"  class="btn btn-success  padded-md  pull-right font-open font-md" > Float Purchase History</Button></a>
<a href="#"> <Button onclick="open_inject_view()"  class="btn btn-success  padded-md  pull-right font-open font-md" >Inject Float</Button></a>
<a href="#"> <Button onclick="open_eject_view()"  class="btn btn-success  padded-md  pull-right font-open font-md" >Eject Float</Button></a>



</div>
<hr style="margin-top:2px;">


<!-- Start Inject page-->
<div  id="inject_view" style="display:block;">
    <div>
      <h6 class="font-open success"><u>Inject Master Float</u> </h6>
    </div>
    <br/>




      <div class="row padded-md font-md font-ubuntu " style=""> 

          <div class="col-md-4 padded">   
           <b> Amount</b>
		        <br/>	  
               <input type="text" name="c_minimum_value"  id="c_minimum_value" class="" autofocus=""  required=""  >               
          </div>
         <div class="col-md-4 padded">   
           <b>Financial Institutions</b>
            <br/>   
              <select>
              <option>--select--</option>
                <option> Family Bank  Kenya</option>
              </select>               
          </div>
        
		  <br/>
		  <br/>
	
 
</div>
<br/><br/>

		<div class="row col-md-6" align="center">
      <button  class="btn btn-success  padded-md  font-ubuntu font-md2" data-toggle="modal" data-target="#inject_modal"  >Inject Master Float</button>	
    </div>
		 
<br><br><br>


<!--Inject Modal -->


  <div class="modal fade" id="inject_modal" role="dialog">
    <div class="modal-dialog modal-md">    
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title success" align="center">Inject<span id="loading-bus" class="success" style="display:none;"><img src="{{asset('images/loading.gif')}}" style="max-height:25px; max-width:25px;margin-left:10%;"><small>Loading...</small></span>  </h5>
        </div>
		<hr/>
        <div class="modal-body">
       <div class="row padded-md font-md font-ubuntu" align="center" style="">
	       <br/><br/>
	       <h5 >  Are you sure you want to Inject ksh.1000.00  From Family Bank? </h5>
	       <br/><hr>
      </div>
       <div class="row">
                  <div class="row col-md-6" align="center">
                    <br> 
                    <button  onclick="save_business_details();" class="btn btn-success padded-md font-ubuntu"> Yes</button>
                 </div>
				 <div class="row col-md-6" align="center">
                    <br> 
                    <button type="button"  class="btn btn-success padded-md font-ubuntu" data-dismiss="modal">No</button>
                 </div>
				</div>

                 </div>
              </div> 
</div>
</div>

        
        
</div>


<!-- Start Eject page-->
<div  id="eject_view" style="display:none;">
<div>
    <h6 class="font-open success"><u>Eject Master Float</u> </h6>

 </div>
<br/>




      <div class="row padded-md font-md font-ubuntu " style=""> 

          <div class="col-md-4 padded">   
           <b> Amount</b>
            <br/>   
               <input type="text" name="c_minimum_value"  id="c_minimum_value" class="" autofocus=""  required=""  >               
          </div>
         <div class="col-md-4 padded">   
           <b>Financial Institutions</b>
            <br/>   
              <select>
              <option>--select--</option>
                <option> Family Bank  Kenya</option>
              </select>               
          </div>
        
      <br/>
      <br/>
  
 
</div>
<br/><br/>

    <div class="row col-md-6" align="center">
      <button  class="btn btn-success  padded-md  font-ubuntu font-md2" data-toggle="modal" data-target="#eject_modal"  >Eject Master Float </button>  
    </div>
     
<br><br><br>




        
        
</div>








<!--Eject Modal -->


  <div class="modal fade" id="eject_modal" role="dialog">
    <div class="modal-dialog modal-md">    
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title success" align="center">Eject<span id="loading-bus" class="success" style="display:none;"><img src="{{asset('images/loading.gif')}}" style="max-height:25px; max-width:25px;margin-left:10%;"><small>Loading...</small></span>  </h5>
        </div>
		<hr/>
        <div class="modal-body">
       <div class="row padded-md font-md font-ubuntu" align="center" style="">
	<br/><br/>
	   <h5 >
	   Are you sure you want to Eject Khs. to Family Bank?
	   </h5>
	  <br/><hr>

                   </div>
                <div class="row">
                  <div class="row col-md-6" align="center">
                    <br> 
                    <button  onclick="save_business_details();" class="btn btn-success padded-md font-ubuntu"> Yes</button>
                 </div>
        				 <div class="row col-md-6" align="center">
                            <br> 
                            <button type="button"  class="btn btn-success padded-md font-ubuntu" data-dismiss="modal">No</button>
                </div>
				      </div>

        </div>
              </div> 
    </div>
</div>

<div id="history_view"  style="display:none;">
 <div class=" row  font-open padded-md" >
     <h6 class="font-open success pull-left"><u>Master Float Purchase History</u></h6>
     <Button onclick="open_created()"  class="btn btn-primary  padded-md  pull-right font-open font-md" >Created</Button>
     <Button onclick="open_rejected()"  class="btn btn-primary  padded-md  pull-right font-open font-md" >Rejected</Button>
      <Button onclick="open_verified()"  class="btn btn-primary  padded-md  pull-right font-open font-md" >Verified</Button>
       <Button onclick="open_pending()"  class="btn btn-primary  padded-md  pull-right font-open font-md" >Pending</Button>


       <div id="created">
         
       </div>
       <div id="rejected">
         
       </div>
       <div id="verified">
         
       </div>
       <div id="pending">
         
       </div>
 </div>




</div>

</div>    
        





<!-- end of eject Modal -->

<!--end of eject-->



 @include('footer')

 <!-- CUSTOM JS HERE -->
<script >
//on body load, start to load select data for other panels already hidden in the background
$( document ).ready(function() {       
     get_bg_data
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




//display inject view 
function open_inject_view(){
  $('#inject_view').show();
  $('#eject_view').hide();
  $('#history_view').hide();
}

//display eject view
function open_eject_view(){ 
  $('#inject_view').hide();
  $('#eject_view').show();
  $('#history_view').hide();
}

//display history view
function open_history_view(){ 
  $('#inject_view').hide();
  $('#eject_view').hide();
  $('#history_view').show();
}

//display agent tariffs 
function open_agent_tariff(){ 
 $('#existing_customer_tariff').hide();
 $('#existing_agent_tariff').show();
 $('#existing_biller_tariff').hide();
}

//display customer tariffs 
function open_customer_tariff(){ 
 $('#existing_customer_tariff').show();
 $('#existing_agent_tariff').hide();
 $('#existing_biller_tariff').hide();
}







//update ref tarrif type and show the button to go next
function show_btn_choose_next(t_type){  
  $('#btn-next-choose').show();
  $('#ref_tariff_type').html(t_type);
}

//show basic detail input form 
function see_tariff_form(){
   $('#choose_type_view').hide();
   $('#create_view').show();

}
//gather select data for the form in the background.
function get_bg_data(){
   var pdata={      
       _token : '<?php echo csrf_token() ?>',
    }
    
     $.ajax({
               type:'POST',
               url:'<?php  echo url("/get_create_tariff_selects"); ?>',               
               data:pdata,
               success:function(data){                 
                  
                  if(data.success==1){ 

                    //console.log(data.price_modes);

                  //Load select input for usertype
                   var user_type_select ="";
                    var user_types= JSON.parse(data.user_types);
                    for (var i = 0; i < user_types.length; i++) {
                      user_type_select= user_type_select + '<option value="'+user_types[i].user_type_id+'">'+user_types[i].user_type_name+'</option>';
                    };

                    $("#user_types_selects").html(user_type_select);
                   

                  //load t types select data
                   var t_type ="";
                    var types= JSON.parse(data.transaction_types);
                    for (var i = 0; i < types.length; i++) {
                      t_type= t_type + '<option value="'+types[i].transaction_type_id+'">'+types[i].friendly_name+'</option>';
                    }; 
                    $("#t_types_selects").html(t_type);


                    //load access_channel select data
                    var a_channels ="";
                    var channels= JSON.parse(data.access_channels);

                    for (var i = 0; i < channels.length; i++) {
                      a_channels= a_channels + '<option value="'+channels[i].access_channel_id+'">'+channels[i].access_channel_name +'</option>';
                    }; 
                    $("#a_channels_selects").html(a_channels);    


                    //load price mode selects
                    var price_modes ="";
                    var p_modes= JSON.parse(data.price_modes);

                    for (var i = 0; i < p_modes.length; i++) {
                      price_modes= price_modes + '<option value="'+p_modes[i].price_mode_id+'">'+p_modes[i].price_mode_name +'</option>';
                    }; 
                    $("#p_mode_selects").html(price_modes);


                     //load transaction fee sources selects
                    var fee_sources ="";
                    var f_sources= JSON.parse(data.fee_sources);

                    for (var i = 0; i < f_sources.length; i++) {
                      fee_sources= fee_sources + '<option value="'+f_sources[i].transaction_fee_source_id+'">'+f_sources[i].charged_party_name +'</option>';
                    }; 
                    $("#f_sources_selects").html(fee_sources);



                  }else{                    
                       
                  }                
               },
                error: function(data){
                  $("#overall_msg").html('Sorry, Error occured when fetching necessary data!');
                      $("#overall_msg").show();
                       hide_panels();
                },

            }); 
}//close function

function load_existing_tariffs(){
 
    $('#loading_customer_tariff').show();
    $('#loading_agent_tariff').show();
    $('#loading_biller_tariff').show();

     var pdata = {           
            _token : '<?php echo csrf_token() ?>',
        }

       $.ajax({
               type:'POST',
                url:'<?php  echo url("/get_existing_tariffs"); ?>', 
               
               data:pdata,
               success:function(data){

                  $('#loading_customer_tariff').hide();
                  $('#loading_agent_tariff').hide();
                  $('#loading_biller_tariff').hide();

                  if(data.success==1){                                      
                     
                     var c_tariffs=JSON.parse(data.customer_tariffs);
                     var a_tariffs=JSON.parse(data.agent_tariffs);
                     var b_tariffs=JSON.parse(data.biller_tariffs);
                      var t_types=JSON.parse(data.others.transaction_types);
                     //console.log(a_tariffs.length);

                     // load customer tariff table 
                     var c_content="";
                     var i;
                     for(i=0; i<c_tariffs.length; i++){  

                       //var j=JSON.stringify(c_tariffs[i]);
                       c_content = c_content + '<tr> <td> '+t_types[c_tariffs[i].transaction_type_id].friendly_name+
                       //c_content = c_content + '<tr> <td> '+c_tariffs[i].transaction_type_id+
                       ' </td> <td> '+c_tariffs[i].minimum_value+
                       '</td> <td>'+c_tariffs[i].maximum_value+
                       ' </td><td>'+(c_tariffs[i].fixed_channel_cost)/100+
                       ' </td><td>'+c_tariffs[i].percentage_channel_cost+
                       ' </td><td> <button  class="btn btn-success  padded-md   font-open font-small" data-toggle="modal" data-target="#edit_tariff_modal" > Edit</button>'+
                       ' </td><td> <button  class="btn btn-success  padded-md   font-open font-small" data-toggle="modal" data-target="#view_tariff_modal" >View</button>'+
                       ' </td>  </tr> ';                     
                     }
                     $("#customer_tariff_table").html(c_content);

                     //load agent tariff table 
                     var a_content="";
                     var i;
                     for(i=0; i<a_tariffs.length; i++){  

                       //var j=JSON.stringify(a_tariffs[i]);
                       a_content = a_content + '<tr> <td> '+t_types[a_tariffs[i].transaction_type_id].friendly_name+
                       //c_content = c_content + '<tr> <td> '+c_tariffs[i].transaction_type_id+
                       ' </td> <td> '+a_tariffs[i].minimum_value+
                       '</td> <td>'+a_tariffs[i].maximum_value+
                       ' </td><td>'+(a_tariffs[i].fixed_channel_cost)/100+
                       ' </td><td>'+a_tariffs[i].percentage_channel_cost+
                       ' </td><td> <button  class="btn btn-success  padded-md   font-open font-small" data-toggle="modal" data-target="#edit_tariff_modal" > Edit</button>'+
                       ' </td><td> <button  class="btn btn-success  padded-md   font-open font-small" data-toggle="modal" data-target="#view_tariff_modal" >View</button>'+
                       ' </td>  </tr> ';                     
                     }
                     $("#agent_tariff_table").html(a_content);


                     //load biller tariff table
                     
                     var b_content="";
                     var i;
                     for(i=0; i<b_tariffs.length; i++){  

                       //var j=JSON.stringify(b_tariffs[i]);
                       b_content = b_content + '<tr> <td> '+t_types[b_tariffs[i].transaction_type_id].friendly_name+
                       //c_content = c_content + '<tr> <td> '+c_tariffs[i].transaction_type_id+
                       ' </td> <td> '+b_tariffs[i].minimum_value+
                       '</td> <td>'+b_tariffs[i].maximum_value+
                       ' </td><td>'+b_tariffs[i].corporate_channel_cost+
                       ' </td><td>'+b_tariffs[i].merchant_channel_cost+
                       ' </td><td> <button  class="btn btn-success  padded-md   font-open font-small" data-toggle="modal" data-target="#edit_tariff_modal" > Edit</button>'+
                       ' </td><td> <button  class="btn btn-success  padded-md   font-open font-small" data-toggle="modal" data-target="#view_tariff_modal" >View</button>'+
                       ' </td>  </tr> ';                     
                     }
                     $("#biller_tariff_table").html(b_content);

                      
                    
                  }else{
                    
                     $("#transactions_msg").html('No transactions to show');
                  }
                  //$("#msg").html(data.status1);
                
               },
                error: function(){
                   $('#loading_customer_tariff').hide();
                     $('#loading_agent_tariff').hide();
                     $('#loading_biller_tariff').hide();
                                  
                  $("#transactions_msg").html('No transactions to show');
                }

            });

      
  

}/*close fxn load tariffs*/

// update tariff data.
function save_edited_tariff(){

}

function open_edit_modal(){
//set values to the inputs
alert("recieved");
/*var d=JSON.parse(details);
console.log(d.maximum_value);

$('#modal_maximum_value').val(d.maximum_value);
$('#edit_tariff_modal').modal('show');*/


}


/*
function save_tariff(){

   $("#create_tariff_msg2").hide();
   $("#create_tariff_msg").hide();

  var validated=validate_form('#create_tariff input');
  if(validated==true){
    //form details now ok.
    $('#saving').show();
    var pdata = {
           
            maximum_value: $('#c_maximum_value').val(),
            minimum_value: $('#c_minimum_value').val(),
            fixed_channel_cost: $('#c_fixed_channel_cost').val(),
            percentage_channel_cost: $('#c_channel_cost').val(), 
            price_mode_id: $('#p_mode_selects').val(), 
            access_channel_id: $('#a_channels_selects').val(), 
            transaction_type_id: $('#t_types_selects').val(), 
            transaction_fee_source_id: $('#f_sources_selects').val(), 
            customer_type_id: $('#user_types_selects').val(),          
            tariff_type: $('#ref_tariff_type').html(), 
                        
            _token : '<?php echo csrf_token() ?>',
        }

        $.ajax({
               type:'POST',
                url:'<?php  echo url("/do_create_tariff"); ?>', 
              
               data:pdata,
               success:function(data){                 

                  if(data.success==1){
                      $('#saving').hide(); 
                      open_next_view('#basic_view', '#adt_view' ); 
                        
                        //set the data static to all forms/panels for the current instance
                        $("#ref_customer_id").html(data.customer_id);
                        $("#ref_msisdn").html(data.msisdn);
                         $('#saving').hide();
                      $("#create_tariff_msg2").html("Tarrif added successfully!");
                      $("#create_tariff_msg2").show();

                  }else{                     
                      $('#saving').hide();
                      $("#create_tariff_msg2").html("Tarrif added successfully!");
                      $("#create_tariff_msg2").show();
                  }
                  //$("#msg").html(data.status1);
                
               },
                error: function(data){
                  $('#saving').hide();
                      $("#create_tariff_msg2").html("Tarrif added successfully!");
                      $("#create_tariff_msg2").show();
                }

            });       
    
  }else{
    $("#create_tariff_msg").html('All fields  are required!');
    $('#create_tariff_msg').show();
  }

}/*close fxn save tariff*/






































</script>