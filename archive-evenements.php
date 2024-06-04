<?php

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package scratch
 */

get_header();
?>

<div class="bg-gray-200 pt-8 flex items-center justify-center">
  <?php echo generate_title('Nos activités', 'h1') ?>
</div>

<?php
rewind_posts();

// Loop through posts
if (have_posts()) :
?>
  <div class="container mx-auto">
    <div class="flex flex-col lg:flex-row gap-10 items-center justify-between">
      <div class="w-full lg:w-4/12 xl:w-3/12 h-52 bg-gray-200">

      </div>
      <div class="mt-10 mb-10 w-full lg:w-8/12 xl:w-9/12 flex flex-row flex-wrap gap-4 sm:gap-6 md:gap-8 justify-around items-center px-2 sm:px-0">
        <?php while (have_posts()) { 
          the_post();
          $categories = get_the_category();
          $infos_pratiques = get_field('infos_pratiques', $activite_id);
          $dates_cards = $infos_pratiques['date_cards'];
          $ligne1 = $dates_cards['ligne_1'];
          $ligne2 = $dates_cards['ligne_2'] ?>
          <div class="relative w-full sm:w-[45%] h-[250px]">
            <?php if($dates_cards){ ?>
              <div class="absolute -top-4 -left-4 bg-white text-lco_blue-500 p-3 shadow-md z-10 flex flex-col items-center justify-center gap-2">
                <?php if($ligne1){ ?>
                  <span class="font-bold text-center"><?php echo $ligne1; ?></span>
                <?php } ?>
                <?php if($ligne2){ ?>
                  <span class="font-bold text-center"><?php echo $ligne2; ?></span>
                <?php } ?>
              </div>
            <?php } ?>
            <a href="<?php echo get_the_permalink(); ?>" class="block zoomable-container bg-gray-200 w-full h-full relative overflow-hidden transform scale-100" >
              <div class="w-full h-full bg-no-repeat bg-cover bg-center zoomable" <?php if(has_post_thumbnail()) {?> style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)" <?php } ?> ></div>
              <div class="absolute bottom-0 w-full">
                <?php if($categories){ ?>
                  <span class="absolute left-4 bottom-[calc(100%-20px)] flex flex-row gap-4 bg-white text-lco_blue-500 font-bold text-lg px-4 py-1.5">
                    <?php foreach($categories as $category){ ?>
                      <span><?php echo $category->name; ?></span>
                    <?php } ?>
                  </span>
                <?php } ?>
                <h3 class="bg-lco_blue-500 text-white px-4 py-6 "><?php echo get_the_title(); ?></h3>
              </div>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php
get_footer();
