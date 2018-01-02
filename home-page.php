<?php
/**
Template Name: Home-page
**/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
		function displayRandomPhotoArea() {
			$images = get_field('gallerie_dimage');
			$randomNumber = rand(0, (count($images) - 1));
			$randomimg = $images[$randomNumber];
			echo '<div class="site-content bg-hero" style="background-image: url(' . $randomimg['url'] .')">';
		}
		// Display a random image here
		displayRandomPhotoArea();
		?>		
		<div class="colors">
			<span class="palette">Palette de couleurs</span>
			<div class="c1"></div>
			<div class="c2"></div>
			<div class="c3"></div>
			<div class="c4"></div>
			<div class="c5"></div>
		</div>

		<!-- The post content here -->
		<div class="hero-text">
			<?php 
			$images = get_field('gallerie_dimage'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<a class="btn" href="<?php the_field('url'); ?>"><?php the_field('bouton_home'); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
		</ul>
	</div>
</div>
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();