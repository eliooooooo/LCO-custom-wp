<?php
/*
Template Name: Page activité
*/

$activite_id = get_the_ID();
$title = get_the_title();

//Infos pratiques
$infos_pratiques = get_field('infos_pratiques', $activite_id);
$lieu = $infos_pratiques['lieu'];
$dates = $infos_pratiques['dates'];
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
$galerie_id = url_to_postid($gallerie);
if(has_post_thumbnail($galerie_id)){
	$gallerie_image = get_the_post_thumbnail_url($galerie_id);
}

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
							<h3 class="font-black">Évènement encadré par <?php echo $nom_pres; ?></h3>
							<?php echo $texte_pres; ?>
						</div>
					<?php } ?>
					<?php if($gallerie) { ?>
						<a href="<?php echo $gallerie; ?>" class="<?php if($gallerie_image) { ?> gallerie group block relative h-auto overflow-hidden mt-8 <?php } else { ?> btn blue mt-8 <?php } ?>">
							<?php if($gallerie_image) { ?>
								<img src="<?php echo $gallerie_image; ?>" class="w-full h-auto">
								<!-- <div class="bg-black/50 absolute transition-all opacity-0 hover:opacity-100 flex rounded-md items-center justify-center w-full h-full top-0 left-0 z-10">
									<h3 class="text-white text-center py-4">Voir la galerie</h3>
								</div> -->
								<div class="flex flex-row gap-4 items-center justify-center bottom-2 right-2 absolute z-10 bg-black/50 rounded-md group-hover:bg-black/75 text-white font-bold text-lg p-4 transition-all">
									<span>Accéder à la galerie</span>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
									</svg>
								</div>
							<?php } else {?>
								Accéder à la galerie
							<?php } ?>
						</a>
					<?php } ?>
                </div>
                <div class="infos-pratiques w-full md:w-5/12 lg:w-4/12">
					<div class="relative w-full border border-solid border-gray-400 rounded-md overflow-hidden">
						<?php if(has_post_thumbnail()){ ?>
							<div class="w-full h-auto mx-auto">
								<?php the_post_thumbnail('thumbnail', array('class' => 'w-full')); ?>
							</div>
						<?php } ?>
						<div class="py-8 px-4">
							<?php if($lieu){ ?>
								<div class="flex flex-row gap-4 items-center mb-4">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
										<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
									</svg>
									<p><?php echo $lieu; ?></p>
								</div>
							<?php } ?>
							<?php if($dates){ ?>
								<div class="flex flex-row gap-4 items-center mb-4">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
										<path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
										<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
									</svg>
									<p><?php echo $dates; ?></p>
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
            </div>

		<?php endwhile; ?>

	<?php endif; ?>

	</div>

<?php
get_footer();
