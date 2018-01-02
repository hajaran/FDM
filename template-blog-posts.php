<?php
/**
Template Name: Toutes les publications
**/

get_header(); ?>


<header class="entry-header">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<h3>Tous les articles</h3>
</header><!-- .entry-header -->


<div id="primary" class="content-area">
	<main id="main" class="site-main">

    <!-- This is a filter  -->   
    <div class="filter-container">
      <?php echo do_shortcode( '[searchandfilter search_placeholder="Recherche" submit_label="Filtrer" fields="search,category"]' ); ?>
    </div>
    <!-- End filter  -->   
    <!-- Pagination -->
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
      'posts_per_page' => 10,
      'paged' => $paged
    );
    $custom_query = new WP_Query( $args );
    ?>
    <!-- Pagination end -->
    <!-- The loop -->
    <?php
    while($custom_query->have_posts()) :
      $custom_query->the_post();
      ?>
      <?php get_template_part( 'template-parts/custom-loop', get_post_type() ); ?>

      <!-- end blog posts -->
    <?php endwhile; ?>
    <?php if (function_exists("pagination")) {
      pagination($custom_query->max_num_pages);
    } ?> 
    <!-- Loop end -->

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
