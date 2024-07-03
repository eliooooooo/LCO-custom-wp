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

<body <?php body_class( 'bg-white text-gray-900' ); ?> x-data="{ openMenu: false }">

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header class="main-menu bg-white block drop-shadow-lg z-50">

		<div class="mx-auto container h-28">
			<div class="menu lg:flex lg:justify-between lg:items-center h-full py-4 px-2">
				<div class="flex justify-between items-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo get_template_directory_uri() . '/src/media/logo_full.png'; ?>"
							alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
							class="block h-20 w-auto">
					</a>

					<div class="lg:hidden" @click="openMenu = !openMenu">
						<div aria-label="Toggle navigation" id="primary-menu-toggle">
							<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x-show="!openMenu"><g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd"><g id="icon-shape">
								<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path></g></g>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-x-lg hidden" viewBox="0 0 16 16" :class="openMenu ? '!flex' : ''" x-show="openMenu">
								<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
							</svg>
						</div>
					</div>
				</div>

				<?php
				wp_nav_menu(
					array(
						'container_id'    => 'primary-menu',
						'container_class' => 'hidden bg-gray-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block transition',
						'menu_class'      => 'lg:flex lg:-mx-4',
						'theme_location'  => 'primary',
						'li_class'        => 'lg:mx-2 xl:mx-4',
						'fallback_cb'     => false,
					)
				);
				?>
			</div>
		</div>
	</header>
	
	<div class="hidden lg:!hidden absolute top-28 flex-col bg-white right-0 transition z-40 shadow-md overflow-hidden" 
		 x-show="openMenu"
		 :class="{ '!flex': openMenu, '!h-0': !openMenu, '!h-auto': openMenu }"
		 x-transition:enter="transition ease-out duration-300"
		 x-transition:enter-start="transform opacity-0 -translate-y-full"
		 x-transition:enter-end="transform opacity-100 translate-y-0"
		 x-transition:leave="transition ease-in duration-300"
		 x-transition:leave-start="transform opacity-100 translate-y-0"
		 x-transition:leave-end="transform opacity-0 -translate-y-full">
		<?php
			wp_nav_menu(
				array(
					'container_id'    => 'primary-menu',
					'container_class' => 'flex lg:hidden py-4 px-6 transition',
					'menu_class'      => 'flex flex-col gap-4',
					'theme_location'  => 'primary',
					'li_class'        => 'lg:mx-4',
					'fallback_cb'     => false,
				)
			);
		?>
	</div>
	<div id="content" class="site-content flex-grow">

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
