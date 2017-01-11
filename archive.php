<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Biob
 */

get_header(); ?>

	<section id="primary" class="section">
		<main id="main" class="site-main" role="main">

        <?php
		if ( have_posts() ) : ?>

            <div>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/list/content', get_post_format() );

			endwhile;
            ?>
            </div>
            <?php
            get_template_part( 'template-parts/navigation/postsNavigation', get_post_format());


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
