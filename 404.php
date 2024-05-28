<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body class="antialiased">
	<?php get_header(); ?>
	
	<div class="mt-16 mb-16">
		<div class="w-full flex flex-col gap-6 items-center justify-center">
			<div class="m-8 flex flex-row gap-9">
				<div class="relative block w-6 h-44">
					<div class="absolute w-4 h-40 bg-lco_yellow-500 rounded-full"></div>
					<div class="absolute w-4 h-24 bg-lco_gray-500 rounded-full"></div>
					<div class="absolute w-4 h-10 bg-lco_blue-500 rounded-full"></div>
				</div>
				<div>
					<div class="text-5xl md:text-6xl">ERREUR <span class="font-bold">404</span></div>
					<div class="w-16 h-1 bg-purple-light my-3 md:my-6"></div>
					<p class="text-xl">Une erreur est survenue lors du chargement de la page.<br>La requête n’a pas pu être exécutée</p>
				</div>
			</div>
			<a href="<?php echo get_bloginfo( 'url' ); ?>" class="btn bg-lco_blue-500 px-4 py-2 rounded text-white rounded-full">
				Retour à l'accueil
			</a>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>
