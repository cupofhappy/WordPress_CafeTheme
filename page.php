<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CafeTheme
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<div class="location-image" style="location-image: url(<?php echo $thumb_url ?>)"> 
		<main id="main" class="site-main" role="main">
			<a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>
			<a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a>
			<a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a>
			<?php
    $pagename = basename(get_permalink());
$pagetitle = 'category_name=' . $pagename;
query_posts($pagetitle);
    while ( have_posts() ) : the_post();?>



				<?php get_template_part( 'template-parts/content', 'page' ); ?>


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
