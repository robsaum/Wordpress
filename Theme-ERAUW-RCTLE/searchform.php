<?php
/**
 * The template for displaying search forms.
 *
 */
?>

	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" id="searchform">
		<label class="screen-reader-text" for="s"><span class="hidden"><?php echo _x( 'Search for:', 'label' ) ?></span></label>
		<input type="search" value="" name="s" id="s" class="search" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search', 'rctle' ) . ' &hellip;'; ?>" aria-label="Search" />
		<input type="submit" class="searchsubmit" name="submit" value="<?php esc_attr_e( 'Search', 'rctle' ); ?>" />
	</form>
<br>