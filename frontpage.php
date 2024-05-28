<?php
/*
Template Name: Frontpage
*/

$frontpage_id = get_option( 'page_on_front' );

$banner = get_field('header')['image_header'];
$title1 = get_field('header')['titre_header_1'];
$title2 = get_field('header')['titre_header_2'];

$titre_5050 = get_field('bloc_5050')['titre'];
$texte_5050 = get_field('bloc_5050')['texte'];
$image_5050 = get_field('bloc_5050')['image'];

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

    <?php if ($titre_5050 || $texte_5050 || $image_5050){ ?>
        <div class="flex flex-col gap-4 w-fit mb-10">
            <h2 class="text-3xl font-bold text-lco_gray-500"><?php echo $titre_5050; ?></h2>
            <div class="flex flex-row items-center justify-center gap-2">
                <div class="h-3 w-14 bg-lco_blue-500 rounded-full"></div>
                <div class="h-3 w-3 bg-lco_gray-500 rounded-full"></div>
                <div class="h-3 w-20 bg-lco_yellow-500 rounded-full"></div>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row gap-4 lg:gap-8">
            <div class="flex flex-col gap-4 lg:w-1/2">
                <?php echo $texte_5050; ?>
            </div>
            <div class="lg:w-1/2">
                <img src="<?php echo $image_5050['url']; ?>" alt="<?php echo $image_5050['alt']; ?>" class="w-full h-auto rounded-md">
            </div>
        </div>
    <?php } ?>
    
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