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
        <?php
        while (have_posts()) {
          the_post();
          the_content();
        //   get_template_part('template-parts/content', 'post');
        }
        ?>
      </div>
    </div>
    <?php the_posts_navigation(); ?>
  <?php endif; ?>

</div>

<?php
get_footer();
