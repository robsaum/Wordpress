<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up until id="main-core".
 *
 * @package ThinkUpThemes
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<?php thinkup_hook_header(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php if (is_singular( 'tribe_events' )): ?>
	<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<?php endif; ?>	

<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>" />

<?php wp_head(); ?>
<script src="https://kit.fontawesome.com/3e56e0b7a1.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?><?php thinkup_bodystyle(); ?>>
<?php /* Body hook */ thinkup_hook_bodyhtml(); ?>
<?php /* Notification Bar */ thinkup_input_notification(); ?>
<?php /* Header Image */ thinkup_input_headerimage(); ?>
<div id="body-core" class="hfeed site">

	<header>

	<div id="site-header">

		<?php if ( get_header_image() ) : ?>
			<div class="custom-header"><img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt=""></div>
		<?php endif; // End header image check. ?>

		<div id="pre-header">
		<div class="wrap-safari">
	    	<div id="pre-header-core" class="main-navigation">
  
			<?php if ( has_nav_menu( 'pre_header_menu' ) ) : ?>
			<?php wp_nav_menu( array( 'container_class' => 'header-links', 'container_id' => 'pre-header-links-inner', 'theme_location' => 'pre_header_menu' ) ); ?>
			<?php endif; ?>

			<?php /* Header Search */ thinkup_input_headersearch(); ?>

			<?php /* Social Media Icons */ thinkup_input_socialmedia(); ?>

		</div>
		</div>
		</div>
		<!-- #pre-header -->

		<div id="header">
		<div id="header-core">

			<div id="logo">
			<?php /* Custom Logo */ echo thinkup_custom_logo(); ?>
			</div>

			<div id="header-links" class="main-navigation">
				<div id="header-links-inner" class="header-links">

				<?php $walker = new thinkup_menudescription;
				wp_nav_menu(array( 'container' => false, 'theme_location'  => 'header_menu', 'walker' => new thinkup_menudescription() ) ); ?>

				</div>
			</div>
			<!-- #header-links .main-navigation -->

			<?php /* Add responsive header menu */ thinkup_input_responsivehtml1(); ?>

		</div>

			<?php /* Add responsive header menu */ thinkup_input_responsivehtml2(); ?>

		</div>
		<!-- #header -->
		</div>
		<?php /* Custom Slider */ thinkup_input_sliderhome(); ?>

		<?php /*  Contact Page - Map */ thinkup_contact_map(); ?>
	</header>
	<!-- header -->

	<?php /* Custom Intro */ thinkup_custom_intro(); ?>

	<?php /*  Call To Action - Intro */ thinkup_input_ctaintro(); ?>
	<?php /*  Pre-Designed HomePage Content */ thinkup_input_homepagesection(); ?>
	<?php /* Custom Slider */ thinkup_input_sliderpage(); ?>

	<div id="content">
	<div id="content-core">

		<div id="main">
		<?php /* Custom Breadcrumbs */ thinkup_input_breadcrumbswitch(); ?>

		<div id="main-core">