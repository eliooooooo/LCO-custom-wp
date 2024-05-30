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
$nb_photos = 0;
if($gallerie && is_array($gallerie) && count($gallerie) > 0){
    foreach($gallerie as $photo){
        if(is_array($photo) && isset($photo['url'])){
            $nb_photos++;
        }
    }
}

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
							<h3 class="font-black">Évènement encadré par <?php echo $nom_pres; ?></h3>
							<?php echo $texte_pres; ?>
						</div>
					<?php } ?>
                </div>
                <div class="infos-pratiques w-full md:w-5/12 lg:w-4/12">
					<div class="w-full border border-solid border-gray-400 rounded-md py-8 px-4">
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

			<?php if($nb_photos > 0) { ?>
				<div class="gallerie relative h-auto overflow-hidden mt-8">
					<?php if(($nb_photos <= 2) && ($nb_photos > 0) ){ ?>	
						<div class="flex flex-row justify-center gap-4">
							<?php foreach($gallerie as $photo){ ?>
								<?php if($photo['url']){ ?>
									<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" class="max-w-full rounded-md mx-auto">
								<?php } ?>
							<?php } ?>
						</div>
					<?php } else { ?>
						<?php get_template_part( 'template-parts/slider', 'gallerie' ); ?>
					<?php } ?>
				</div>
			<?php } ?>

		<?php endwhile; ?>

	<?php endif; ?>

	</div>

<?php
get_footer();
