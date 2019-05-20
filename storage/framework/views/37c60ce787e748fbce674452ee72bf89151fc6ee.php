<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token"  content="XYZ123">

  <title>TLX</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>
  <link href="css/style.css" rel="stylesheet">

  <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

  <link href="<?php echo e(asset('/css/app.css')); ?>" rel="stylesheet">
  <?php echo $__env->yieldContent('css'); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="js/over_color.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css">
  <!--desabilitar submit-->
  <script language="javascript" type="text/javascript" src="js/disableSubmits.js"></script>
  <!--desabilitar-->


  <link rel="stylesheet" href="js/lig/dist/css/lightbox.min.css">


</head>

<nav class="navbar navbar-default navbar-static-top" >

  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- Branding Image -->
               <!-- <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    Laravel
                  </a>-->
                  <form>
                    <div class="logo">
                      <a href="<?php echo e(url('/')); ?>"><img src="images/icon/logo.png"  class="logo"></a>
                      <div class="search" >
                        <div class="inner-addon right-addon">
                          <i class="glyphicon glyphicon-search" ></i>
                          <input type="text" id="search" type="text" class="form-control input-lg" placeholder="¿Qué estás buscando?" value="<?php echo e(old('search')); ?>" />
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
                <div class="men">
                  <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      <!--<li><a href="<?php echo e(url('/home')); ?>">Home</a></li>-->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                      <!-- Authentication Links -->
                      <?php if(Auth::guest()): ?>
                      <li><a href="<?php echo e(url('/login')); ?>"><span  class="glyphicon glyphicon-log-in" style="color: white;"></span>&nbsp;&nbsp;Categorías</a></li>
                      <li><a href="<?php echo e(url('/login')); ?>"><span  class="glyphicon glyphicon-user" style="color: white;"></span>&nbsp;&nbsp;Ingresar</a></li>
                      <li><a href="<?php echo e(url('/register')); ?>"><span  class="glyphicon glyphicon-edit" style="color: white;"></span>&nbsp;&nbsp;Registrarse</a></li>
                      <li><a href="<?php echo e(url('/register')); ?>"><span  class="glyphicon glyphicon-question-sign" style="color: white;"></span>&nbsp;&nbsp;Ayuda</a></li>

                      <button type="button"class="buttonReddon" onclick="window.location='<?php echo e(url('/login')); ?>'"><img src="images/icon/camara.png" width="40">&nbsp;&nbsp;&nbsp;<b>Vender</b></button>

                      <?php else: ?>
                      <li><a href="<?php echo e(url('/')); ?>" ><span  class="glyphicon glyphicon-log-in" style="color: white;"></span>&nbsp;&nbsp;Categorías </a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span  class="glyphicon glyphicon-user" style="color: white;"></span>&nbsp;&nbsp;
                          <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu" >
                         <li><a href="<?php echo e(url('/publicaciones_usuario')); ?>" ><i class="fa fa-btn fa-sign-out" style="color: #04B486;"></i><b  style="color: #04B486;">Mis publicaciones</b></a></li>
                         <hr>

                         <li><a href="<?php echo e(url('/logout')); ?>" ><i class="fa fa-btn fa-sign-out" style="color: #04B486;"></i><b  style="color: #04B486;">Salir</b></a></li>
                       </ul>
                     </li>
                     <li><a href="<?php echo e(url('/ayuda')); ?>" ><span  class="glyphicon glyphicon-question-sign" style="color: white;"></span>&nbsp;&nbsp;Ayuda</a></li>



                     <button type="button"class="buttonReddon" onclick="window.location='<?php echo e(url('../publicar')); ?>'"><img src="images/icon/camara.png" width="40">&nbsp;&nbsp;&nbsp;<b>Vender</b></button>
                     <?php endif; ?>
                   </ul>
                 </div>
               </div>
             </div>
             
           </nav>


           <?php echo $__env->yieldContent('content'); ?>


           <!-- JavaScripts -->
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
           <script src="js/lig/dist/js/lightbox-plus-jquery.min.js"></script>
           <?php echo $__env->yieldContent('scripts'); ?>
           <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
         </body>
         </html>
