<?php
/*
Template Name: Frontpage
*/

$frontpage_id = get_option( 'page_on_front' );

$banner = get_field('header')['image_header'];
$title1 = get_field('header')['titre_header_1'];
$title2 = get_field('header')['titre_header_2'];


?>

<?php get_header(); ?>

<?php if($banner){ ?>
    <div class="banner h-[250px] lg:h-[350px] bg-cover bg-center bg-no-repeat" style="background-image:url(<?php echo $banner['url']; ?>)">
        <div class="relative w-full text-center h-full">
            <h1 class="absolute flex flex-col gap-2 lg:gap-4 items-center text-center font-bold text-white drop-shadow-xl bottom-8 w-full max-w-full">
                <span class="text-2xl sm:text-2xl lg:text-4xl"><?php echo $title1; ?></span>
                <span class="text-3xl sm:text-4xl lg:text-6xl"><?php echo $title2; ?></span>
            </h1>
        </div>
    </div>
<?php } ?>

<div class="container mx-auto my-8">
    
    <?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();

			?>
    

			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php
get_footer();