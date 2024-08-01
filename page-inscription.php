<?php
/*
Template Name: Page inscription
*/

$page_id = get_the_ID();
$title = get_the_title();

//Infos pratiques
$documents = get_field('documents', $page_id);
$fiche_inscription = $documents['fiche_inscription'];
$reglement = $documents['reglement_interieur'];
$questionnaire = $documents['questionnaire_sante'];
$planning = $documents['planning'];

$encart = get_field('encart', $page_id);

$warning = get_field('warning', $page_id);

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
                    <?php if($planning){ ?>
                        <a href="<?php echo $planning['url']; ?>" target="_blank" class="btn blue">Découvrir le planning</a>
                    <?php } ?>
                    <?php if($encart){ ?>
                        <div class="bg-gray-200 rounded-md py-2 sm:py-6 px-4 sm:px-8 mt-8">
                            <p><?php echo $encart; ?></p>
                        </div>
                    <?php } ?>
                    <?php if($warning){ ?>
                        <div class="rounded-md mt-8">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-exclamation-triangle-fill float-left mr-4 mb-2 mt-2 text-lco_blue-500" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                            <p><?php echo $warning; ?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="infos-pratiques w-full md:w-5/12 lg:w-4/12">
					<div class="w-full border border-solid border-gray-400 rounded-md py-8 px-4">
						<?php if($fiche_inscription){ ?>
                            <div class="mb-4">
                                <div class="flex flex-row gap-4 items-center justify-between mb-4">
                                    <h3 class="text-xl font-bold mb-2">Fiche d'inscription générale et aïkido</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                                    </svg>
                                </div>
                                <a href="<?php echo $fiche_inscription["link"]; ?>" target="_blank" class="btn blue">Télécharger</a>
                            </div>
                            <?php if($reglement || $questionnaire){ ?>
                                <hr class="border-gray-400 mb-4">
                            <?php } ?>
						<?php } ?>
                        <?php if($reglement){ ?>
                            <div class="mb-4">
                                <div class="flex flex-row gap-4 items-center justify-between mb-4">
                                    <h3 class="text-xl font-bold mb-2">Règlement intérieur</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                                    </svg>
                                </div>
                                <a href="<?php echo $reglement["link"]; ?>" target="_blank" class="btn blue">Télécharger</a>
                            </div>
                            <?php if($questionnaire){ ?>
                                <hr class="border-gray-400 mb-4">
                            <?php } ?>
                        <?php } ?>
                        <?php if($questionnaire){ ?>
                            <div>
                                <div class="flex flex-row gap-4 items-center justify-between mb-4">
                                    <h3 class="text-xl font-bold mb-2">Questionnaire de santé</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                                    </svg>
                                </div>
                                <a href="<?php echo $questionnaire["link"]; ?>" target="_blank" class="btn blue">Télécharger</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

		<?php endwhile; ?>

	<?php endif; ?>
	</div>

<?php
get_footer();
