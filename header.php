<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Biob
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Lobster|Raleway" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="">

	<header id="masthead" class="site-header" role="banner">
        <section class="hero is-primary is-large has-shadow">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Hero title
                    </h1>
                    <h2 class="subtitle">
                        Hero subtitle
                    </h2>
                    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'biob' ); ?></a>

                </div>
            </div>
            <div class="hero-foot">
                <nav id="site-navigation" class="nav " role="navigation">
                    <div class="nav-left container">
                        <?php wp_nav_menu(array('items_wrap' => '%3$s', 'walker' => new Bootstrap_Nav_Walker(), 'container' => false, 'menu_class' => '', 'theme_location' => 'primary_navigation')); ?>
                    </div>
                </nav>
            </div>
        </section>


	</header>

	<div id="content" class="container">
