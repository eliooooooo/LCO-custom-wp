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

<div class="page">

  <?php
  rewind_posts();

  // Loop through posts
  if (have_posts()) :
  ?>
    <div class="container">
      <div class="">
        <?php while (have_posts()) { 
          the_post(); ?>
          <div class="bg-gray-200">
            
            <?php echo get_the_title(); ?>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php endif; ?>

</div>

<?php
get_footer();
