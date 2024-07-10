<?php

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package scratch
 */

// Arguments pour WP_Query
$args = array(
  'post_type' => 'activites',
  'posts_per_page' => -1,
  'meta_key' => 'ordre_presentation',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
);

// La nouvelle requête WP_Query
$activites_query = new WP_Query($args);

get_header();
?>

<div class="bg-gray-200 pt-8 flex items-center justify-center">
  <?php echo generate_title('Nos activités', 'h1') ?>
</div>

<?php
// Loop through posts
if ($activites_query->have_posts()) :
?>
  <div class="container mx-auto">
    <div class="mt-10 mb-10 w-full flex flex-row flex-wrap gap-4 sm:gap-6 md:gap-8 justify-around items-center">
      <?php while ($activites_query->have_posts()) { 
        $activites_query->the_post(); ?>
        <a href="<?php echo get_the_permalink(); ?>" class="zoomable-container bg-gray-200 w-full sm:w-[45%] md:w-[30%] h-[250px] relative overflow-hidden" >
          <div class="w-full h-full bg-no-repeat bg-cover bg-center zoomable" <?php if(has_post_thumbnail()) {?> style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)" <?php } ?> ></div>
          <h2 class="absolute bg-black/50 text-white px-2 py-4 bottom-0 w-full"><?php echo get_the_title(); ?></h2>
        </a>
      <?php } ?>
    </div>
  </div>
<?php endif;
wp_reset_postdata(); ?>

<?php
get_footer();
