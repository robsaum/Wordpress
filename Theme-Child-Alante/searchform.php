<?php
/**
 * The template for displaying search forms.
 *
 * @package ThinkUpThemes
 */
?>

	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="search"><span class="hidden">search</span></label><input type="text" class="search" name="s" id="search" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search', 'alante' ) . ' &hellip;'; ?>" aria-label="Search Terms" />
		<input type="submit" class="searchsubmit" name="submit" value="<?php esc_attr_e( 'Search', 'alante' ); ?>" />
	</form>

<br>
