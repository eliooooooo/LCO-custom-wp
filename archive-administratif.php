<?php

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package scratch
 */

$nb_permanent = 0;
$nb_temporary = 0;

get_header();
?>

<div class="bg-gray-200 pt-8 flex items-center justify-center">
	<?php echo generate_title('Documents administratifs', 'h1') ?>
</div>

	<div class="container my-8 mx-auto flex flex-col gap-14">
    <div class="permanent border border-gray-400 rounded-md overflow-hidden">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) :
          the_post();
          $post_id = get_the_ID();
          $permanent = get_field('permanent', $post_id);

          if($permanent){
            $nb_permanent++;
            $date = get_field('date', $post_id);
            $document = get_field('document', $post_id);
            $image = get_field('image', $post_id);
            $title = get_the_title();
            ?>
            <div class="relative flex flex-col <?php echo ($nb_permanent % 2 == 0) ? 'bg-gray-200' : 'bg-white'; ?>" x-data="{ isOpen: false }">
              <div class="group flex flex-row gap-2 justify-between items-center cursor-pointer py-2 sm:py-6 px-4 sm:px-8" @click="isOpen =! isOpen">
                <div class="flex flex-row items-center gap-4">
                  <h3><?php echo $title; ?></h3>
                  <?php if($date) { ?>
                    <span class="text-text-gray-400"><?php echo $date; ?></span>
                  <?php } ?>
                </div>
                <div class="<?php echo ($nb_permanent % 2 == 0) ? 'bg-white' : 'bg-gray-200'; ?> group-hover:bg-gray-400 p-2 rounded-full transition">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16" x-show="!isOpen">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16" x-show="isOpen">
                    <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/>
                  </svg>
                </div>
              </div>
              <div class="flex flex-col gap-4 py-2 sm:py-6 px-4 sm:px-8" x-cloak x-show="isOpen" x-transition>
                <div class="content">
                  <?php the_content(); ?>
                </div>
                <?php if($document){ ?>
                  <a href="<?php echo $document['url']; ?>" target="_blank" class="btn blue">Télécharger le document</a>
                <?php } ?>
                <?php if($image){ ?>
                  <img class="mx-auto lg:max-w-[50%] rounded-md" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <?php if ( have_posts() ) : ?>
    <div class="rounded-md overflow-hidden border border-gray-400">
        <?php while ( have_posts() ) :
          the_post();
          $post_id = get_the_ID();
          $permanent = get_field('permanent', $post_id);

          if(!$permanent){
            $nb_temporary++;
            $date = get_field('date', $post_id);
            $document = get_field('document', $post_id);
            $image = get_field('image', $post_id);
            $title = get_the_title();
            ?>
            <div class="relative flex flex-col <?php echo ($nb_temporary % 2 == 0) ? 'bg-gray-200' : 'bg-white'; ?>" x-data="{ isOpen: false }">
              <div class="group flex flex-row gap-2 justify-between items-center cursor-pointer py-2 sm:py-6 px-4 sm:px-8" @click="isOpen =! isOpen">
                <div class="flex flex-row items-center gap-4">
                  <h3><?php echo $title; ?></h3>
                  <?php if($date) { ?>
                    <span class="text-text-gray-400"><?php echo $date; ?></span>
                  <?php } ?>
                </div>
                <div class="<?php echo ($nb_temporary % 2 == 0) ? 'bg-white' : 'bg-gray-200'; ?> group-hover:bg-gray-400 p-2 rounded-full transition">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16" x-show="!isOpen">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16" x-show="isOpen">
                    <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/>
                  </svg>
                </div>
              </div>
              <div class="flex flex-col gap-4 py-2 sm:py-6 px-4 sm:px-8" x-cloak x-show="isOpen" x-transition>
                <div class="content">
                  <?php the_content(); ?>
                </div>
                <?php if($document){ ?>
                  <a href="<?php echo $document['url']; ?>" class="btn blue">Télécharger le document</a>
                <?php } ?>
                <?php if($image){ ?>
                  <img class="mx-auto lg:max-w-[50%] rounded-md" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>

<?php
get_footer();
