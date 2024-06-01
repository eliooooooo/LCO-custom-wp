<?php
/*
Template Name: Page d'accueil
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
    <div class="banner h-[220px] bg-cover bg-center bg-no-repeat" style="background-image:url(<?php echo $banner['url']; ?>)">
        <div class="relative w-full text-center h-full">
            <h1 class="absolute flex flex-col gap-2 lg:gap-4 items-center text-center font-bold text-white drop-shadow-xl bottom-8 w-full max-w-full">
                <span class="text-2xl sm:text-2xl lg:text-4xl"><?php echo $title1; ?></span>
                <span class="text-3xl sm:text-4xl lg:text-6xl"><?php echo $title2; ?></span>
            </h1>
        </div>
    </div>
<?php } ?>

<div class="container mx-auto my-8">

    <?php if ($titre_5050 || $texte_5050){ ?>
        <?php echo generate_title($titre_5050, 'h2') ?>
        <div class="flex flex-col lg:flex-row gap-4 lg:gap-8">
            <div class="flex flex-col gap-4 lg:w-1/2">
                <?php echo $texte_5050; ?>
            </div>
            <div class="lg:w-1/2">
                <!-- Ajouter les actualités ici ! -->
            </div>
        </div>
    <?php } ?>

</div>

<?php
get_footer();