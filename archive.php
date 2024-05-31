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
  global $post;
  ?>

  <?php
  rewind_posts();

  // Loop through posts
  if (have_posts()) :
  ?>
    <div class="container big">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-5  my-10 ">
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
