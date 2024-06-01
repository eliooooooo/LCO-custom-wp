<?php

$activite_id = get_the_ID();
$title = get_the_title();

//Infos pratiques
$infos_pratiques = get_field('infos_pratiques', $activite_id);
$lieu = $infos_pratiques['lieu'];
$horaires = $infos_pratiques['horaires'];
$tarif = $infos_pratiques['tarif'];

$intervenant = $infos_pratiques['intervenant'];
$nom_intervenant = $intervenant['prenom_nom'];
$email_intervenant = $intervenant['email'];
$tel_intervenant = $intervenant['telephone'];

$coordinateur_lco = $infos_pratiques['coordinateur_lco'];
$nom_coordo = $coordinateur_lco['prenom_nom'];
$email_coordo = $coordinateur_lco['email'];
$tel_coordo = $coordinateur_lco['telephone'];

$pres_intervenant = get_field('presentation_intervenant', $activite_id);
$nom_pres = $pres_intervenant['prenom_nom'];
$texte_pres = $pres_intervenant['texte'];

$gallerie = get_field('gallerie_photo', $activite_id);

// Set the variable to be used in another file
set_query_var( 'gallerie', $gallerie );

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
                <div class="content w-full md:w-7/12 lg:w-8/12">
                    <?php the_content(); ?>
					<?php if($nom_pres && $texte_pres){ ?>
						<div class="intervenant bg-gray-200 rounded-md py-2 sm:py-6 px-4 sm:px-8 mt-8">
							<h3 class="font-black">Cours encadrés par <?php echo $nom_pres; ?></h3>
							<?php echo $texte_pres; ?>
						</div>
					<?php } ?>
                </div>
                <div class="infos-pratiques w-full md:w-5/12 lg:w-4/12">
					<div class="w-full border border-solid border-gray-400 rounded-md py-8 px-4">
						<?php if($lieu){ ?>
							<h3 class="text-xl font-bold mb-2">Infos pratiques</h3>
							<hr class="mb-4 border-gray-400">
						<?php } ?>
						<?php if($lieu){ ?>
							<div class="flex flex-row gap-4 items-center mb-4">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
									<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
								</svg>
								<p><?php echo $lieu; ?></p>
							</div>
						<?php } ?>
						<?php if($horaires || $nom_intervenant || $tel_intervenant || $email_intervenant){ ?>
							<h3 class="text-xl font-bold mb-2">Cours</h3>
							<hr class="mb-4 border-gray-400">
						<?php } ?>
						<?php if($horaires){ ?>
							<div class="flex flex-row gap-4 items-center mb-4">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
									<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
								</svg>
								<p><?php echo $horaires; ?></p>
							</div>
						<?php } ?>
						<?php if($nom_intervenant || $tel_intervenant || $email_intervenant){ ?>
							<div class="flex flex-row gap-4 items-start mb-4">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
									<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
								</svg>
								<div class="flex flex-col gap-2" >
									<?php if($nom_intervenant){ ?>
										<span><?php echo $nom_intervenant; ?></span>
									<?php } ?>
									<?php if($tel_intervenant){ ?>
										<span><?php echo $tel_intervenant; ?></span>
									<?php } ?>
									<?php if($email_intervenant){ ?>
										<span><?php echo $email_intervenant; ?></span>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
						<?php if($tarif){ ?>
							<div class="flex flex-row gap-4 items-center">
								<h4 class="font-bold">Tarif</h4>
								<p><?php echo $tarif; ?></p>
							</div>
						<?php } ?>
						<?php if($nom_coordo || $tel_coordo || $email_coordo){ ?>
							<div class="flex flex-col items-center justify-center text-center mt-8 text-gray-400">
								<span><u>Coordinateur LCO :</u></span>
								<?php if($nom_coordo){ ?>
									<span><?php echo $nom_coordo; ?></span>
								<?php } ?>
								<?php if($email_coordo){ ?>
									<span><?php echo $email_coordo; ?></span>
								<?php } ?>
								<?php if($tel_coordo){ ?>
									<span><?php echo $tel_coordo; ?></span>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
                </div>
            </div>

			<?php if($gallerie) { ?>
				<div class="gallerie relative h-auto overflow-hidden mt-8">
					<?php get_template_part( 'template-parts/slider', 'gallerie' ); ?>
				</div>
			<?php } ?>

		<?php endwhile; ?>

	<?php endif; ?>

	</div>

<?php
get_footer();
