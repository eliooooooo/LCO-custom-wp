
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<footer class="site-footer py-8 bg-black text-white">	
	<div class="container flex flex-col md:flex-row gap-4 flex-wrap mx-auto text-center justify-around">
		<div class="flex flex-col sm:flex-row items-center sm:items-start justify-center gap-4 sm:gap-8 md:gap-12 py-4">
			<ul class="flex flex-col items-center sm:items-start text-center sm:text-left">
				<li class="font-bold"><?php echo get_bloginfo( 'name' ); ?></li>
				<li>Tel. : 00 00 00 00 00</li>
				<li>Mail : secretariat.lco@gmail.com</li>
			</ul>
			<div>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'menu_class'     => 'flex flex-col items-start gap-4',
							'li_class'       => ''
						)
					);
				?>
			</div>
		</div>
		<div class="flex flex-col items-center gap-6 border-l-0 border-t md:border-t-0 md:border-l md:pl-6 md:pt-0 py-4">
			<span>Retrouvez-nous sur :</span>
			<ul class="flex flex-row items-center gap-2">
				<li>
					<a href="https://www.facebook.com/LCOberschaeffolsheim/">
						<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
							<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
						</svg>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- <div class="text-center mt-4 text-gray-400">
		&copy; <?php // echo date_i18n( 'Y' );?> - <?php // echo get_bloginfo( 'name' );?>
	</div> -->
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>