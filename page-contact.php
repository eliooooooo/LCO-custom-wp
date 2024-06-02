<?php
/*
Template Name: Page contact
*/

$page_id = get_the_ID();
$title = get_the_title();

//Infos pratiques
$documents = get_field('informations', $page_id);

$email = get_field('email', $page_id);
$adresse = get_field('adresses', $page_id);
$carte = get_field('carte', $page_id);

get_header(); ?>
<div class="bg-gray-200 pt-8 flex items-center justify-center">
	<?php echo generate_title($title, 'h1') ?>
</div>

	<div class="container my-8 mx-auto">
	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<div class="flex flex-col md:flex-row gap-8 lg:gap-10 xl:gap-14">
                <div class="content w-full md:w-5/12 lg:w-4/12">
                    <?php echo generate_title('Nous contacter', 'h2') ?>
                    <?php the_content(); ?>
                    <?php if($email){ ?>
                        <p><span class="font-bold">Par mail : </span> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                    <?php } ?>
                </div>
                <div class="maps w-full md:w-7/12 lg:w-8/12 h-fit bg-gray-200">
                    <?php if($carte){ ?>
                        <img src="<?php echo $carte['url']; ?>">
                    <?php } ?>
                    <div class="py-2 sm:py-6 px-4 sm:px-8 content">
                        <?php if($adresse){ ?>
                            <?php echo $adresse; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>

		<?php endwhile; ?>

	<?php endif; ?>
	</div>

<?php
get_footer();
