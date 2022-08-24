<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="google-site-verification" content="W-ontUEdYt2dUEvQKhaaINcJKDc_HE392akfFTaSUUQ" />
    <title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>

    <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


    <!-- JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/3e56e0b7a1.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <!--Load the Google Charts AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
   
   <?php wp_head(); ?>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- options: bg-light navbar-light justify-content-center -->
    <!-- <div class="collapse navbar-collapse"> -->
   <div class="container-xl"> 
      <!-- Brand -->
      <a href="/" class="navbar-brand d-flex align-items-center">
          <i class="fas fa-chalkboard-teacher">&nbsp;&nbsp;</i>
          <span class="title-h1">Rothwell Center for Teaching & Learning Excellence</span>
      </a>



    <!-- Navbar links -->
    <?php 
      // Using the default WordPress menu     
      wp_nav_menu( array( 
      'theme_location' => 'header-menu', 
      'container'      => 'nav',
      'menu_class'     => 'navigation-main'
      //'container_class' => 'custom-menu-class' 
      ) ); 
   
    ?>

      <form class="form-inline my-2 my-md-0" role="search" method="get" id="searchform" action="/">
        <label class="hidden" for="s">Search</label>
        <input class="form-control" type="text" placeholder="Search" aria-label="Search" value="" name="s" id="s" />
      </form>

  </div>
</nav>