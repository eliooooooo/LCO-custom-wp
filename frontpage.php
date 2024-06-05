<?php
/*
Template Name: Page d'accueil
*/

// Arguments pour WP_Query
// Get the 5 last events
$args = array(
    'post_type' => 'evenements',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC'
);
$query = new WP_Query($args);

$frontpage_id = get_option( 'page_on_front' );

$banner = get_field('header')['image_header'];
$title1 = get_field('header')['titre_header_1'];
$title2 = get_field('header')['titre_header_2'];

$titre_5050 = get_field('bloc_5050')['titre'];
$texte_5050 = get_field('bloc_5050')['texte'];
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
        <div class="flex flex-col lg:flex-row items-center gap-4 lg:gap-8">
            <div class="flex flex-col justify-center items-center gap-4 w-full lg:w-5/12">
                <?php echo generate_title($titre_5050, 'h2') ?>
                <?php echo $texte_5050; ?>
            </div>
            <div class="w-full lg:w-7/12">
                <?php if ($query->have_posts()) { ?>
                    <div class="swiper swiper-home">
                        <div class="swiper-wrapper">
                            <?php while ($query->have_posts()) {?>
                                <?php   $query->the_post();
                                        $infos_pratiques = get_field('infos_pratiques');
                                        $dates_cards = $infos_pratiques['date_cards'];
                                        $ligne1 = $dates_cards['ligne_1'];
                                        $ligne2 = $dates_cards['ligne_2']; ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo get_permalink(); ?>" class="flex flex-col gap-4 bg-cover bg-no-repeat p-4 rounded-md bg-gray-200" <?php if(has_post_thumbnail()){ ?> style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>)" <?php } ?>>
                                        <h2 class="p-4 text-white bg-black/50 rounded-md"><?php echo get_the_title() ?></h2>  
                                        <div class="flex flex-col sm:flex-row md:flex-col lg:flex-row gap-2">
                                            <?php if($ligne1){ ?>
                                                <div class="p-4 bg-black/50 text-white rounded-md flex flex-col items-center justify-center text-center gap-1 text-lg font-bold min-w-[35%]" >
                                                    <?php if($ligne1) { ?>
                                                        <span style="white-space: nowrap; display: inline-block;"><?php echo $ligne1 ?></span>    
                                                    <?php } ?>
                                                    <?php if($ligne2) { ?>
                                                        <span style="white-space: nowrap; display: inline-block;"><?php echo $ligne2 ?></span>    
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                            <div class="p-4 bg-black/50 rounded-md">
                                                <p class ="text-white rounded-md line-clamp-4"><?php echo get_the_excerpt() ?></p>                               
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </div>
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                            </svg>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <?php 
                        // Réinitialisez les données de publication après une requête secondaire
                        wp_reset_postdata();
                        } else {
                            // Aucun événement trouvé
                            echo '<p>Aucun événement trouvé.</p>';
                        } ?>
            </div>
        </div>
    <?php } ?>

</div>

<?php
get_footer();