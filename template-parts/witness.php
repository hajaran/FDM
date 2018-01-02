<?php
/**
 * Template part for displaying custom loop
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LFDM
 */

?>


			<div class="post-item">
				<a class="post-thumb" href="<?php the_permalink() ?>" style="background-color: rgba(29, 53, 87, 1);background-image: url(<?php the_post_thumbnail_url(); ?>)">
				</a>

				<div class="post-info">

					<h2 class="post-title">
						<a href="<?php the_permalink() ?>">
							<?php the_title_attribute(); ?>
						</a>
					</h2>
					<span class="cat-links"> <?php wp_list_categories(array('title_li' => false, 'style' => false)); ?></span> <br>
					<span class="small" >Publié par <b><?php the_author(); ?></b>  —  <?php the_time(); ?></span>
					<div class="post-excerpt">
						<p> <?php echo excerpt(20) ?> </p>
						<span class="total-comments small">
							<i class="fa fa-comment" aria-hidden="true"></i><?php comments_number( ' 0 commentaire', ' 1 commentaire', ' % commentaires' ); ?>.
						</span>
						</>
					</div>
				</div>
			</div>