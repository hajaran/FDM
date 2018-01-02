<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LFDM
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="menu-overlay"></div>
<aside id="secondary" class="widget-area">
	<div class="gray-space"></div>
	<div class="container">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
	<div class="social">
		<ul class="menu simple lfdm-social">
			<?php if( get_field('facebook','option') ): ?>
				<li><a target="_blank" href="<?php echo the_field('facebook','option'); ?>"><i class="fa fa-facebook"></i>
					<span class="denomination"><br>Facebook</span></a>
				</li>
			<?php endif; ?>
			<?php if( get_field('twitter','option') ): ?>
				<li><a target="_blank" href="<?php echo the_field('twitter','option'); ?>"><i class="fa fa-twitter"></i>
					<span class="denomination"><br>Twitter</span></a>
				</li>
			<?php endif; ?>
			<?php if( get_field('linkedin','option') ): ?>
				<li><a target="_blank" href="<?php echo the_field('linkedin','option'); ?>"><i class="fa fa-linkedin"></i>
					<span class="denomination"><br>Linkedin</span></a>
				</li>
			<?php endif; ?>
			<?php if( get_field('instagram','option') ): ?>
				<li><a target="_blank" href="<?php echo the_field('instagram','option'); ?>"><i class="fa fa-instagram"></i>
				<span class="denomination"><br>Instagram</span>
				</a>
				</li>
			<?php endif; ?>
			<?php if( get_field('contact','option') ): ?>	
				<li><a target="_blank" href="<?php echo the_field('contact','option'); ?>"><i class="fa fa-envelope"></i>
				<span class="denomination"><br>Contact</span>
				</a>
				</li>
			<?php endif; ?>	
			<?php if( get_field('don','option') ): ?>
				<li><a target="_blank" href="<?php echo the_field('don','option'); ?>"><i class="fa fa-eur"></i>
				<span class="denomination"><br>Don</span>
				</a>
				</li>
			<?php endif; ?>
			<?php if( get_field('adherer','option') ): ?>
				<li><a target="_blank" href="<?php echo the_field('adherer','option'); ?>"><i class="fa fa-user" aria-hidden="true"></i><br><span>Adhérer</span>
				</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
		<div class="copyright-info">
			<h4>La France de Marianne</h4>
			<span>Copyright© La France de Marianne | Crédits | Mentions Légales | Réalisation Be Creative</span>
		</div>
	</div>
</aside><!-- #secondary -->
