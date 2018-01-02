<?php
/**
 * Template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form class="search-form" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"></label>
		<input type="text" class="field" name="s" id="s" placeholder="Recherche" />
		<label class="search-icon" for="searchsubmit"><i class="fa fa-search" aria-hidden="true"></i>
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="" /> </label>
	</form>