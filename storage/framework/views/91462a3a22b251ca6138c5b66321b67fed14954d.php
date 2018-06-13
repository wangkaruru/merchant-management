  <?php echo $__env->make('topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="nav-side-menu">
    
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out" style="margin-top:10px;">
         <li >
                <a href="<?php echo e(URL::to('/partner')); ?>"><i class=" fa fa-area-chart "></i><?php echo e(@$configs_text['menu1']['menuText']); ?><span class="arrow"></span></a>
        </li>
            <li data-toggle="collapse" data-target="#accounts" class="collapsed ">
                <a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i><?php echo e(@$configs_text['menu2']['menuText']); ?><span class="arrow"></span></a>
            </li>           
            <ul class="sub-menu collapse" id="accounts">            
                <li><a href="<?php echo e(URL::to('/account')); ?>"><?php echo e(@$configs_text['menu8']['menuText']); ?></a></li>
                <!-- <li><a href="<?php echo e(URL::to('/statement')); ?>"><?php echo e(@$configs_text['menu9']['menuText']); ?></a></li> -->
            </ul>
            <?php if(session('is_customer')==1): ?>
             <li data-toggle="collapse" data-target="#cst" class="collapsed ">
                <a href="#"><i class="fa fa-user"></i><?php echo e(@$configs_text['menu3']['menuText']); ?><span class="arrow"></span></a>
            </li>           
            <ul class="sub-menu collapse" id="cst">            
                <li><a href="<?php echo e(URL::to('/customeraccount')); ?>"><?php echo e(@$configs_text['menu4']['menuText']); ?></a></li>
            </ul>
            <?php endif; ?> 

             <?php if(session('is_agent')==1): ?>
             <li data-toggle="collapse" data-target="#agt" class="collapsed ">
                <a href="#"><i class="fa fa-bolt"></i><?php echo e(@$configs_text['menu5']['menuText']); ?><span class="arrow"></span></a>
            </li>
                <ul class="sub-menu collapse" id="agt">            
                <li><a href="<?php echo e(URL::to('/agentaccount')); ?>"><?php echo e(@$configs_text['menu10']['menuText']); ?></a></li>
                </ul>
            <?php endif; ?>    

             <?php if(session('is_biller')==1): ?>
            <li data-toggle="collapse" data-target="#bl" class="collapsed ">
                <a href="#"><i class="fa fa-usd"></i><?php echo e(@$configs_text['menu7']['menuText']); ?><span class="arrow"></span></a>
            </li> 
             <ul class="sub-menu collapse" id="bl">
               <li><a href="<?php echo e(URL::to('/billeraccount')); ?>"><?php echo e(@$configs_text['menu6']['menuText']); ?></a></li>

              <?php if(session('has_b2c')==1): ?>          
                 <li><a href="<?php echo e(URL::to('/CreateDisbursement')); ?>">Create Disbursement</a></li>                           
                <li><a href="<?php echo e(URL::to('/DisbursementHistory')); ?>">Disbursement History</a></li> 
                <?php endif; ?>           
             </ul>          
               <?php endif; ?>        
               
            </ul>           
        </ul>
    </div>
</div>


<div class="container" id="main">


    <div class="row">
        <div class="col-md-12">
        
        <div class="col-md-12 col-lg-15 main-content">

        <!-- <h1>pesatel dynamic content here </h1> -->

           
       
   