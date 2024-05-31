<?php
/*
Template Name: Page contact
*/

$page_id = get_the_ID();
$title = get_the_title();

//Infos pratiques
$documents = get_field('informations', $page_id);

$email = $documents['email'];
$telephone = $documents['telephone'];
$adresse = $documents['adresses'];

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
                        <p><span class="font-bold">Par mail : </span> <?php echo $email; ?></p>
                    <?php } ?>
                    <?php if($telephone){ ?>
                        <p><span class="font-bold">Par téléphone : </span><?php echo $telephone; ?></p>
                    <?php } ?>
                </div>
                <div class="maps w-full md:w-7/12 lg:w-8/12 bg-gray-200 content">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2639.369173473855!2d7.647045876776489!3d48.5836298200026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4796b6fd18a0ead5%3A0x80259f22686d3184!2s7%20Imp.%20du%20Moulin%2C%2067203%20Oberschaeffolsheim!5e0!3m2!1sfr!2sfr!4v1717156193801!5m2!1sfr!2sfr" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="py-2 sm:py-6 px-4 sm:px-8">
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
