<?php echo $__env->make('masterview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
<br>
<div class="row jumbotron" style='//background-image: url("<?php echo e(asset("images/bweza2.jpg")); ?>");'>

       <div class="row  font-open font-md " style='padding:10px;color:#d01752; margin-top:50px;' >
            <h5 align="center"> <big> <span>404</span><br> Oops! Seems like we just missed a step. <br> <br> We are sorry that you are experiencing this.</big></h5><br> <br> 
           <a href="#" onclick="goback()" style=''> <h4  align="center" style='color:green;border:1px solid green;border-radius:10px;background-image: url("<?php echo e(asset("images/bweza2.jpg")); ?>");'> Click here to Go Back</h4> </a>
       </div>    
   
</div>
    <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <script type="text/javascript">
 function goback(){
   window.history.back(); 
 }
   </script>
