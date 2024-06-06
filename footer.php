
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<footer class="site-footer py-8 bg-black text-white">	
	<div class="container mx-auto flex flex-col sm:flex-row items-center sm:items-start justify-around gap-4 sm:gap-8 md:gap-12 py-4 mb-4">
		<ul class="flex flex-col items-center sm:items-start text-center sm:text-left">
			<li class="font-bold"><?php echo get_bloginfo( 'name' ); ?></li>
			<li>Mail : secretariat.lco@gmail.com</li>
		</ul>
		<div class="menu">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'flex flex-col items-start gap-4',
						'li_class'       => 'text-center'
					)
				);
			?>
		</div>
	</div>
	<div class="socket flex flex-col sm:flex-row items-center justify-center gap-6 menu text-gray-400">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'socket',
					'container'      => false,
					'menu_class'     => 'flex flex-row items-center gap-4',
					'li_class'       => 'text-center'
				)
			);
		?>
		<div class="text-center">
			&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' );?>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>