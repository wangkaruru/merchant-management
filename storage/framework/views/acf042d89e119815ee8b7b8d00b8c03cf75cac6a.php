<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Bweza</title>
    <link rel="shortcut icon"  href="<?php echo e(asset('images/favicon.png')); ?>">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />      
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:700|Open+Sans:300|Roboto:300|Muli:200" rel="stylesheet">
	<link href="<?php echo e(asset('css/logincss.css')); ?>" rel="stylesheet" type="text/css" >
	<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" >
	<link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" >
	<link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet" type="text/css" >
</head>

<body>

<div class="container-fluid">
 <div class="wrapper"> 	
	<div class="row login-nav" >
		<a href="#" style="color:#e72764!important;font-size:20px; padding-left:100px; padding-right:20px;"
	     >Angola</a>
	   


		<a href="#"  onclick="show_first_time()" style="color:#6a6a6a!important; font-size:20px; padding-left:30px; border-left:1px solid #d9d9d9;">Apply</a>
		<a href="#" style="color:#6a6a6a!important; font-size:20px; padding-left:50px; padding-right:60%;"> </a>
		<a href="#"  class="logo" style="padding:0px;margin:0px;"><img src="<?php echo e(asset('images/bweza.png')); ?>" 
		style="max-width:110px;max-height:50px;" ><span style="font-size:20px;"></span> </a>
	</div>
		<div class="login-body col-md-12" align="center">
		<div style="color:#800080;background-color:#fafafa; font-size:20px!important;left:20px;" ><b>  
				<?php if(isset($status1)): ?>
				<?php echo e($status1); ?>	
			<?php endif; ?>
			<?php if(session('status1')): ?>
			   <?php echo e(session('status1')); ?>	
			<?php else: ?>
				<?php echo e(session('status2')); ?>

				<?php echo e($errors->first('username')); ?>

    			<?php echo e($errors->first('password')); ?>

    		<?php endif; ?>
    		</b>

    		<span id="msg" style="display:none;"> here</span>
			</div>
		<span id="logform" style="display:block;">
			<h2 style="font-size:45px;color:#fff;padding-top:50px;font-weight:700px;">
			    Partner sign in
			</h2>
			
			
			<div class="offset-md-3 col-md-6" align="center">
			<?php echo Form::open(['url' => 'login']); ?>

				<table style="margin-top:50px;">
					<tr style="background-color:#fff;" >
						<td style="color:#6a6a6a;padding:10px!important;"> Username:</td>
						<td><input type="text" name="username" id="username" required=""></td>
					</tr>
				</table>

				<table style="margin-top:10px;margin-bottom:10px;">
					<tr style="background-color:#fff;" >
						<td style="color:#6a6a6a;padding:10px!important;"> Password:</td>
						<td><input type="password" name="password" id="password" required=""></td>
					</tr>
				</table>

				<button id="btngetcode" onclick="get_code();" style="border:0px;background-color:#e72764;width:405px;max-width:405px;height:55px;color:#fff;" class="btn-block">Get Code</button>
			    <span id="loader" class="success" style="display:none;" align="center"><img src="<?php echo e(asset('images/loading.gif')); ?>" style="max-height:25px; max-width:25px;margin-left:0%;"></span>

				<span style="display:none;" id="input_code">
				<table style="margin-top:10px;margin-bottom:10px;" >
					<tr style="background-color:#fff;" >
						<td style="color:#6a6a6a;padding:10px!important;" > Enter Code:</td>
						<td><input type="password" name="code" id="code" required=""></td>
					</tr>
				</table>
				</span>

				<button id="btn_login" class="submit" style=" display:none; border:0px;background-color:#e72764;width:405px;max-width:405px;height:55px;color:#fff;" class="btn-block">Log In</button>
				
				<div style="padding-top:20px;">
				<span style="padding-right:30px;"><a href="#"  onclick="open_forgot_pass()" style="color:white!important;">Forgot Username/Password?</a></span>
<!-- 				<span style="left:10px;"><a href="#" style="color:white!important;"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Security Tips</a></span>	
 -->			</div>
				<?php echo Form::close(); ?>

			</div>			
		</span>

		<span id="apply" style="display:none">
			<h2 style="font-size:45px;color:#fff;padding-top:50px;font-weight:700px;">
			   Activate account
			</h2>		
			
			<div class="offset-md-3 col-md-6" align="center">
			<?php echo Form::open(['url' => 'first_time']); ?>

				<table style="margin-top:50px;margin-bottom:50px;">
					<tr style="background-color:#fff;" >
						<td style="color:#6a6a6a;padding:10px!important;"> Phone Number:</td>
						<td><input type="text" name="msisdn" required=""></td>
					</tr>
				</table>				
				<button  class="submit" style="border:0px;background-color:#e72764;width:450px;max-width:480px;height:55px;color:#fff;" class="btn-block">Request Code</button>
				<div style="padding-top:20px;">
				<span style="padding-right:30px;"><a href="#" onclick="show_login()"
				 style="color:#fff!important;border:1px solid white;padding:2px;"><b> Back to Normal Login</b></a></span>
<!-- 				<span style="left:10px;"><a href="#" style="color:white!important;"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Security Tips</a></span>	
 -->				</div>
				<?php echo Form::close(); ?>

			</div>
			

		</span>

		<span id="forgot_pass_form" style="display:none;">
			<h2 style="font-size:45px;color:#fff;padding-top:50px;font-weight:700px;">
			  Reset Password
			</h2>	
				<div class="offset-md-3 col-md-6" align="center">
			<?php echo Form::open(['url' => 'reset_my_password']); ?>

				<table style="margin-top:50px;margin-bottom:50px;">
					<tr style="background-color:#fff;" >
						<td style="color:#6a6a6a;padding:10px!important;"> Phone Number:</td>
						<td><input type="text" name="msisdn" required=""></td>
					</tr>
				</table>				
				<button  class="submit" style="border:0px;background-color:#e72764;width:450px;max-width:480px;height:55px;color:#fff;" class="btn-block">Reset Password</button>
				<div style="padding-top:20px;">
				<span style="padding-right:30px;"><a href="#" onclick="show_login()"
				 style="color:#fff!important;border:1px solid white;padding:2px;"><b> Back to Normal Login</b></a></span>
				</div>
				<?php echo Form::close(); ?>

			</div>	
		</span>		
  
		</div>
       <div class="login-footer col-md-12" align="center">			
			<div class=" col-md-12" align="right">
				 <h4 style="padding-top:10px;" ><span class="pull-left">Copyright &copy Bweza MMP <?php echo date('Y') ?>. All rights reserved</span>
				 Powered by  pesatel v1.0
				  </h4>
			</div> 
		</div>
   </div>

</div>
	
	<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/tether.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>

 <script>
function show_first_time () {
		  $("#logform").hide();
		  $("#forgot_pass_form").hide();
		  $("#apply").show();

	 }


function show_login () {
		  $("#logform").show();
		  $("#apply").hide();
		  $("#forgot_pass_form").hide();
	}

function open_forgot_pass(){
 	$("#logform").hide();
 	$("#forgot_pass_form").show();
 }

 function get_code(){
 	$("#loader").show();
 	$("#btngetcode").hide();
 	$("#msg").hide();
 	 var pdata = {           
            username: $('#username').val(),            
            password: $('#password').val(),
            _token : '<?php echo csrf_token() ?>',
        }

        $.ajax({
               type:'POST',
                url:'<?php  echo url("/get_code"); ?>',               
               data:pdata,
               success:function(data){   
               	  console.log(data);
               	  $("#loader").hide();
                  if(data.success==1){
					 $("#input_code").show();
					 $("#btn_login").show();
					 $("#btngetcode").html('60');
					 $("#btngetcode").attr("disabled", "disabled");
					 //run a counter
					 initiate_loop();
					 $("#btngetcode").show();					 
					 $("#btn_login").show();
					 $("#input_code").show();
					 
                  }else{ 
                  	$("#btngetcode").show();
                    $("#msg").html(data.msg);
                    $("#msg").show();
                  }
                 
               },
                error: function(data){ 
                   $("#btngetcode").show();                
                   $("#loader").hide();
                   $("#msg").html('Failed');
                   $("#msg").show();
                }

            }); 


 }


 function  initiate_loop(){
  
  for(var i=0; i<1; i++){
     setInterval(do_loop,1000);
  }
 
}



 function do_loop(){
   var l= parseInt($("#btngetcode").html());
   var n=l-1;
    if(n>2){
    $("#btngetcode").html(n + ' seconds');
   }else if(n<=2){
    $("#btngetcode").html(' Expired!');
    window.location.replace("<?php  echo url('/login');?>");
      
   }
   
 }



  </script>

</body>
    

</html>
