<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900' ); ?>>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header class="main-menu bg-white block drop-shadow-lg">

		<div class="mx-auto container h-28">
			<div class="menu lg:flex lg:justify-between lg:items-center h-full py-4 px-2">
				<div class="flex justify-between items-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo get_template_directory_uri() . '/src/media/logo.png'; ?>"
							alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
							class="block h-20 w-auto">
					</a>

					<div class="lg:hidden">
						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
							<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
									<g id="icon-shape">
										<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
											  id="Combined-Shape"></path>
									</g>
								</g>
							</svg>
						</a>
					</div>
				</div>

				<?php
				wp_nav_menu(
					array(
						'container_id'    => 'primary-menu',
						'container_class' => 'hidden bg-gray-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
						'menu_class'      => 'lg:flex lg:-mx-4',
						'theme_location'  => 'primary',
						'li_class'        => 'lg:mx-4',
						'fallback_cb'     => false,
					)
				);
				?>
			</div>
		</div>
	</header>

	<div id="content" class="site-content flex-grow">

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
