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
    <div class="box">
        <div class="columns">
            <?php if ( has_post_thumbnail() ):?>
            <figure class="image level-left column is-4">
                <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
            </figure>
            <?php endif; ?>

            <div class="level-right column is-8">
                <div>
                    <?php the_title( sprintf( '<a href="%s" rel="bookmark"><p class="title is-4">', esc_url( get_permalink() ) ), '</p></a>' ); ?>
                    <p class="subtitle is-6"><?php the_date( 'd-m-Y', '', '' ); ?></p>

                    <?php the_content( sprintf(
                    /* translators: %s: Name of current post. */
                        wp_kses( __( 'Den kompletten Beitrag %s lesen <span class="meta-nav"></span>', 'biob' ), array( 'span' => array( 'class' => array() ) ) ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    ) );?>
                </div>
            </div>
        </div>

    </div>
</article><!-- #post-## -->
