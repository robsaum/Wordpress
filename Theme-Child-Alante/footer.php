<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id="main-core".
 *
 * @package ThinkUpThemes
 *
 * 2019-11-15, Added custom-header-widget and container-fluid plus closing html tag
 */
?>

	<?php if ( is_active_sidebar( 'custom-header-widget' ) ) : ?>

	<div class="container-fluid">
		<div class="row-fluid">
		<?php if ( is_front_page() ) { dynamic_sidebar( 'custom-header-widget' ); } ?>
		</div>
	</div>
	<?php endif; ?>

		</div><!-- #main-core -->
		</div><!-- #main -->

		<?php /* Sidebar */ thinkup_sidebar_html(); ?>
	</div>
</div><!-- #content -->



	<?php /* Call To Action - Outro */ thinkup_input_ctaoutro(); ?>

	<footer>
		<?php /* Custom Footer Layout */ thinkup_input_footerlayout();
		echo	'<!-- #footer -->';  ?>
		
		<div id="sub-footer">
		<div id="sub-footer-core">	
		
			<div class="copyright">
			<?php /* === Add custom footer === */ thinkup_input_copyright(); ?>
			</div>
			<!-- .copyright -->

			<?php if ( has_nav_menu( 'sub_footer_menu' ) ) : ?>
			<?php wp_nav_menu( array( 'depth' => 1, 'container_class' => 'sub-footer-links', 'container_id' => 'footer-menu', 'theme_location' => 'sub_footer_menu' ) ); ?>
			<?php endif; ?>
			<!-- #footer-menu -->

		</div>
		</div>
	</footer><!-- footer -->

</div><!-- #body-core -->

<?php wp_footer(); ?>
<script>
	document.getElementsByClassName('tribe-events-gcal')[0].setAttribute('target', '_blank');
	document.getElementsByClassName('tribe-events-gcal')[0].setAttribute('rel', 'nofollow');
	document.getElementsByClassName('tribe-events-gcal')[0].innerHTML='+ Google Calendar';
	
	document.getElementsByClassName('tribe-events-ical')[0].setAttribute('target', '_blank');
	document.getElementsByClassName('tribe-events-ical')[0].setAttribute('rel', 'nofollow');
	document.getElementsByClassName('tribe-events-ical')[0].innerHTML='+ iCal Export';

	document.getElementsByClassName('hover-zoom')[0].innerHTML='Zoom Photo';
</script>

<?php if (is_singular( 'tribe_events' )): ?>
<script>
	document.getElementsByClassName('tribe-events-before-html')[0].style.display = 'none';
</script>
<?php endif; ?>	


</body>
</html>