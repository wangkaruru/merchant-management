<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Bweza </title>
    <meta name="description" content="Money" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <link rel="shortcut icon"  href="<?php echo e(asset('images/favicon.png')); ?>">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400|Roboto:500|Dosis:700|Open+Sans:400" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('css/dash/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" >
    <link href="<?php echo e(asset('css/dash/styles.css')); ?>" rel="stylesheet" type="text/css" >
    <link href="<?php echo e(asset('css/dash/dash3.css')); ?>" rel="stylesheet" type="text/css" >
    <link href="<?php echo e(asset('css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet" type="text/css" >
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
       <script>
        // load a language
        numeral.language('pt', {
          delimiters: {
              thousands: '.',
              decimal: ','
          },
          abbreviations: {
              thousand: 'k',
              million: 'm',
              billion: 'b',
              trillion: 't'
          },
          ordinal : function (number) {
              return number === 1 ? ' ' : ' ';
          },
          currency: {
              symbol: 'Kz '
          }
      });
      numeral.language('pt');
      </script>

  </head>

  <body >
     <nav class="navbar navbar-fixed-top navbar-dark bg-primary" style='background-image: url("<?php echo e(asset("images/bweza2.jpg")); ?>");'>
    <button class="navbar-toggler hidden-sm-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        ☰
    </button>
       <!--  <a class="navbar-brand" href="#">Navbar</a> -->
 
    <div class="collapse navbar-toggleable-xs" id="collapsingNavbar">
        <img src="<?php echo e(asset('images/bweza.png')); ?>" alt="logo" class="center"   style="max-width:200px;max-height:72px;margin-left:1%;"  > 
        
        <ul class="nav navbar-nav pull-right">
            <div class="dropdown">
            <button class="btn btn-default dropdown-toggle color-blue" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             <?php echo e(session('ref_name')); ?> 
              
            </button>
            <span class="caret" ></span>
            <ul class="dropdown-menu" aria-labelledby="" align='right' style="padding:3px;marging:0px;border:1px solid #dadada;background-color:#fafafa;">
            
            <img  align='left' src="<?php echo e(asset('images/user3.png')); ?>" alt="user" class="right img-rounded"   style="max-width:50px;max-height:50px;text-align:right;"  >               
              <li align='center' style="padding:0px; marging:0px;"><a href="<?php echo e(URL::to('/profile')); ?>" style="color:#e72764;" class="font-open">Profile </a></li>
              <li align='center' style="padding:0px; marging:0px;"><a href="<?php echo e(URL::to('/logout')); ?>"   style="color:#e72764;" class="font-open">Log Out</a></li>              
            </ul>
          </div>
           
           
        </ul>
    </div>
</nav>