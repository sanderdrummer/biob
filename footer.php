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
    <div class="container section is-hidden-tablet">
        <h3>Schau dich ruhig noch etwas um</h3>
        <?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'footer-menu' ) ); ?>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <p>Mehr von <span class="lobster">Blame it on Bernie</span> findest du auch:</p>
                <a target="_blank" href="https://www.facebook.com/blameitonbernie/">bei Facebook</a>
                <a target="_blank" href="https://www.youtube.com/channel/UCLGMjBZq0dMDKaTZN_YLo8w">auf Youtube</a>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
