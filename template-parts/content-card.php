<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Biob
 */

?>

<article id="post-<?php the_ID(); ?>" class="section is-wide">
    <div class="card">
        <?php if ( has_post_thumbnail() ):?>
            <div class="card-image">
                <figure class="image">
                    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                </figure>
            </div>
        <?php endif; ?>

        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <?php the_title( sprintf( '<a href="%s" rel="bookmark"><p class="title is-4">', esc_url( get_permalink() ) ), '</p></a>' ); ?>
                    <p class="subtitle is-6">@johnsmith</p>
                </div>
            </div>

            <div class="content">

                <?php the_content( sprintf(
                /* translators: %s: Name of current post. */
                    wp_kses( __( 'Den kompletten Beitrag %s lesen <span class="meta-nav"></span>', 'biob' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );?>

                <small>11:09 PM - 1 Jan 2016</small>
            </div>
        </div>
        <footer class="entry-footer">
            <?php biob_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-## -->
