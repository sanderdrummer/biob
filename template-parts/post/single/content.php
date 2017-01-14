<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Biob
 */
echo get_breadcrumb();
?>

<article id="post-<?php the_ID(); ?>" class="section is-wide">
    <div class="post-container">
        <div class="box post-title-container has-shadow">
            <?php if ( has_post_thumbnail() ):?>
                <figure class="image">
                    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                </figure>
            <?php endif; ?>
            <h1 class="title is-3"><?php the_title(); ?></h1>
            <p class="subtitle is-6">@<?php the_author(); ?></p>
            <p class="subtitle is-6"><?php the_date( 'd-m-Y', '', '' ); ?></p>
        </div>
        <div class="box post-text-container">
            <div>
                <?php the_content( sprintf(
                /* translators: %s: Name of current post. */
                    wp_kses( __( 'Den kompletten Beitrag %s lesen <span class="meta-nav"></span>', 'biob' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );?>
            </div>
        </div>


    </div>
</article><!-- #post-## -->
