<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">


		<header id="main-head" class="site-header">



			<div class="container">

				<div class="small-block">
					<div class="head-top">

						<div class="contact-row">

							<?php if (have_rows('contact_info', 'option')) : while (have_rows('contact_info', 'option')) : the_row();  ?>

									<a href="" class="single-contact">
										<?php $image = get_sub_field('image'); ?>
										<?php if ($image) : ?>
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>
										<?php the_sub_field('link'); ?>

									</a>

							<?php endwhile;
							endif; ?>

						</div>
						<div class="social-row">
							<?php if (have_rows('social_header', 'option')) : while (have_rows('social_header', 'option')) : the_row();  ?>

									<a href="<?php the_sub_field('link'); ?>" class="single-social_header">
										<?php $image = get_sub_field('image'); ?>
										<?php if ($image) : ?>
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>

									</a>

							<?php endwhile;
							endif; ?>
						</div>

					</div>
				</div>

				<div class="head-bottom">
					<a href="<?php echo home_url(); ?>" class="logo">

						<?php $logo_footer = get_field('logo_footer', 'option'); ?>
						<?php if ($logo_footer) : ?>
							<img src="<?php echo esc_url($logo_footer['url']); ?>" alt="<?php echo esc_attr($logo_footer['alt']); ?>" />
						<?php endif; ?>
					</a>
					<div class="desktop-menu">
						<?php wp_nav_menu(array('theme_location' => 'menu-1')); ?>
					</div>
					<div class="hamburger">
						<div class="menu-icon menu-icon-1">
							<div class="bar bar-1"></div>
							<div class="bar bar-2"></div>
							<div class="bar bar-3"></div>
						</div>
					</div>

				</div>
			</div>

			<div class="mobile-menu">
				<div class="container">
					<?php wp_nav_menu(array('theme_location' => 'menu-1')); ?>
					<div class="social-row">
						<?php if (have_rows('social_header', 'option')) : while (have_rows('social_header', 'option')) : the_row();  ?>

								<a href="<?php the_sub_field('link'); ?>" class="single-social_header">
									<?php $image = get_sub_field('image'); ?>
									<?php if ($image) : ?>
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>

								</a>

						<?php endwhile;
						endif; ?>
					</div>
				</div>
			</div>

		</header>