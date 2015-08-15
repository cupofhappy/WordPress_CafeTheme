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
    <main id="main" class="site-main" role="main">
        <?php
        echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>";
        ?>

        
	<?php
        $pagename = basename(get_permalink());
        $pagetitle = 'category_name=' . $pagename;
        query_posts($pagetitle);
        
        
        while ( have_posts() ) : the_post();?>



	    <?php get_template_part( 'template-parts/content', 'page' ); ?>


	<?php endwhile; // End of the loop. ?>

        <?php if ($pagename == 'menu')


            echo "<script language=javascript>
        console.log('1');
        $('article').addClass('triplecolumns');
console.log('2');
var articleCount = $('#main article').length;
console.log(articleCount);

var articleArrayId = $('#main article').toArray();
console.log(articleArrayId[0].id);

var articleArray = [];

for (var i = 0; i < articleArrayId.length; i++){
articleArray.push(articleArrayId[i].id);
console.log(articleArray);
}

for (var j = 0; j < articleArrayId.length; j++){
var postCount = $('.' + articleArray[j] + ' div p').length;

for (var k = 0; k < postCount; k++){
var menuItem = '';

if (k % 2 === 0){
menuItem = $('.' + articleArray[j] + 'div p:nth-child(' + k+1 + ')');
console.log(menuItem);
}

}

}

var menuItemCount = $('.entry-content p').length;
console.log(menuItemCount);
</script>";
        ?>

        

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
