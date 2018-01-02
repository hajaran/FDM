<?php
/**
Template Name: Témoignages
**/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">


    <div class="entry-content">

      <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      </header><!-- .entry-header -->
      <div class="temoignages">
        <!-- This is a filter  -->   
        <div class="filter-container">
          <?php echo do_shortcode( '[searchandfilter search_placeholder="Recherche" submit_label="Filtrer" fields="search,category"]' ); ?>
        </div>
        <!-- End filter  -->
        <h4>Exprimez-vous</h4>
        <div class="card-sml temoignage-item">
          <h3>Martin témoigne</h3>
          <p>Perferendis dolores id commodi sed dolor. Autem est voluptatum quod tenetur est. A nesciunt voluptas ut facilis eaque.</p>
          <span class="category-sml">Catégorie</span>
          <a href="#" class="plus-sign"><span></span><span></span></a>
        </div>
        <div class="card-sml temoignage-item">
          <h3>Martin témoigne</h3>
          <p>Perferendis dolores id commodi sed dolor. Autem est voluptatum quod tenetur est. A nesciunt voluptas ut facilis eaque.</p>
          <span class="category-sml">Catégorie</span>
          <a href="#" class="plus-sign"><span></span><span></span></a>
        </div>
        <div class="card-sml temoignage-item">
          <h3>Martin témoigne</h3>
          <p>Perferendis dolores id commodi sed dolor. Autem est voluptatum quod tenetur est. A nesciunt voluptas ut facilis eaque.</p>
          <span class="category-sml">Catégorie</span>
          <a href="#" class="plus-sign"><span></span><span></span></a>
        </div>
        <div class="card-sml temoignage-item">
          <h3>Martin témoigne</h3>
          <p>Perferendis dolores id commodi sed dolor. Autem est voluptatum quod tenetur est. A nesciunt voluptas ut facilis eaque.</p>
          <span class="category-sml">Catégorie</span>
          <a href="#" class="plus-sign"><span></span><span></span></a>
        </div>

        <div class="keywords">
          <div class="instructions"><h5>Filtrer par mot clé</h5></div>
          <div class="keyword-list">
            <a href="" class="word">Mot Clé</a>
            <a href="" class="word">Mot Clé</a>
            <a href="" class="word">Mot Clé</a>
            <a href="" class="word">Mot Clé</a>
            <a href="" class="word">Mot Clé</a>
            <a href="" class="word">Mot Clé</a>
          </div>
        </div>

      </div>


      

      <?php
      the_content( sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lfdm' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      ) );

      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lfdm' ),
        'after'  => '</div>',
      ) );
      ?>
    </div><!-- .entry-content -->
    

    <style>
    .simplesocialbuttons {
      display: none;
    }
  </style>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
