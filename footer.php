<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Biob
 */

?>

	</div><!-- #content -->
    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <p>Mehr von <span class="lobster">Blame it on Bernie</span> findest du auch:</p>
                <a target="_blank" href="https://www.facebook.com/blameitonbernie/">bei Facebook</a>
                <a target="_blank" href="https://www.youtube.com/channel/UCLGMjBZq0dMDKaTZN_YLo8w">auf Youtube</a>
            </div>
            <div class="content has-text-centered">
                <?php wp_nav_menu(array('items_wrap' => '%3$s', 'walker' => new Bootstrap_Nav_Walker(), 'container' => false, 'menu_class' => '', 'theme_location' => 'menu-2')); ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
