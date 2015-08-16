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
    <div id="primary" class="content-area">
    
 

    <?php
        $pagename = basename(get_permalink());
        $pagetitle = 'category_name=' . $pagename;
        query_posts($pagetitle);?>

       
        
        <?php while ( have_posts() ) : the_post();?>


        <?php get_template_part( 'template-parts/content', 'page' ); ?>



	<?php endwhile; // End of the loop. ?>


            <?php if ($pagename == 'contact'):
          the_post_thumbnail( full);?>

<?php echo "<script language=javascript>
$('article').addClass('triplecolumns');

</script>";
?>

<div>
<style>
#map {
height:400px;
width:100%;
}

</style>
<div id='map'></div>    

            <?php echo "<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js'></script>"?>
            <?php echo "<script language=javascript>
var articleArray = [];
var addressArray = 0;
articleArray = $('article').toArray();
console.log(articleArray);
for(var l = 0; l < articleArray.length; l++){
if(articleArray[l].textContent.toLowerCase().indexOf('address') >=0 ){
console.log(l);
addressArray = l
}
}
console.log(articleArray[1].children[1].children);

var fullAddressArray = [];

for(var m = 0; m < articleArray[1].children[1].children.length; m++){
var addedAddress = articleArray[1].children[1].children[m].textContent;
fullAddressArray.push(addedAddress);

}

var fullAddress = fullAddressArray.join(' ');
console.log(fullAddress);

$.ajax({
url:'https://maps.googleapis.com/maps/api/geocode/json',
      type:'GET',
dataTyle:'json',
data:{
address: fullAddress,
key:'AIzaSyBaxYYE0CKb-rODDzGDde8a4CBZyfyrwPY'
},
success: function(res){
console.log(res);
var lat = (res.results[0].geometry.location.lat);
console.log(lat);
var lng = (res.results[0].geometry.location.lng);
console.log(lng);
initialize(lat,lng);
}
})

function initialize(lat,lng) {
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions)
}
setInterval(initialize(),100);



</script>";?>

</div>

<? endif?>




        <?php if ($pagename == 'menu'):


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
            var counter = k + 1;
            var counter2 = k + 2;


            if ($('.' + articleArray[j] + ' div p:nth-child(' + counter2 + ')').find('img').length) {
            menuItem = $('.' + articleArray[j] + ' div p:nth-child(' + counter + ')').text();
            $('.' + articleArray[j] + ' div p:nth-child(' + counter2 + ')').addClass('marginKiller');
            $('.' + articleArray[j] + ' div p:nth-child(' + counter + ')').addClass('menuFloater');
            k++;

            } else {
            if($('.' + articleArray[j] + ' div p:nth-child(' + counter2 + ')').length){
            $('.' + articleArray[j] + ' div p:nth-child(' + counter + ')').addClass('menuNoPic');

            } else {
            $('.' + articleArray[j] + ' div p:nth-child(' + counter + ')').addClass('menuNoPicLast');

            }

            }

            }

            }
            var menuItemCount = $('.entry-content p').length;
            console.log(menuItemCount);
            </script>";
?>
<?php endif ?>

       


    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>