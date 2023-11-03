<footer id="colophon" class="site-footer">


  <div class="container">
    <div class="top-foor">
      <div class="logo-foot">
        <?php $logo_footer = get_field('logo_footer', 'option'); ?>
        <?php if ($logo_footer) : ?>
          <img src="<?php echo esc_url($logo_footer['url']); ?>" alt="<?php echo esc_attr($logo_footer['alt']); ?>" />
        <?php endif; ?>
      </div>
      <div class="mob-foot-menu">
        <?php wp_nav_menu(array('theme_location' => 'menu-5')); ?>
      </div>
    </div>

    <div class="bottom-foot">
      <div class="col-one">

        <?php the_field('tekst_z_lewej_strony', 'option'); ?>

        <div class="social-row">
          <?php if (have_rows('social', 'option')) : while (have_rows('social', 'option')) : the_row();  ?>

              <a href="<?php the_sub_field('link'); ?>" class="single-social">
                <?php $image = get_sub_field('image'); ?>
                <?php if ($image) : ?>
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>

              </a>

          <?php endwhile;
          endif; ?>
        </div>
      </div>
      <div class="col-two">
        <?php wp_nav_menu(array('theme_location' => 'menu-2')); ?>
      </div>
      <div class="col-three">
        <?php wp_nav_menu(array('theme_location' => 'menu-3')); ?>
      </div>
      <div class="col-four">
        <p>ZAPISZ SIĘ DO NESLETTERA</p>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" id="email-form">

          <input type="email" id="email" name="email" placeholder="Twój email" required>
          <label>
            <input type="checkbox" name="policy" required> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
            totam rem aperiam.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
            doloremque laudantium, totam rem aperiam.Sed ut perspiciatis unde omnis iste natus error sit
            voluptatem accusantium doloremque laudantium, totam rem aperiam.
          </label>
          <div class="btn-block"><input type="submit" value="Wyślij" id="submit" disabled></div>
          <input type="hidden" name="action" value="process_news_form"> <!-- Action for the form -->
        </form>
        <div id="result-message"></div>
        <p class="leo"><a href="https://www.leonardo.pl/" target="_blank">nice things by <span><svg version="1.1" id="Warstwa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 106.1 16.1" style="enable-background:new 0 0 106.1 16.1;" xml:space="preserve">
                <style type="text/css">
                  .st0 {
                    fill: #FFFFFF;
                  }
                </style>
                <g>
                  <g>
                    <path class="st0" d="M98.5,2.5C98.5,2.8,98.3,3,98,3c-0.3,0-0.5-0.2-0.5-0.5C97.6,2.2,97.8,2,98,2C98.3,2,98.5,2.2,98.5,2.5"></path>
                    <path class="st0" d="M98.5,8c0,0.3-0.2,0.5-0.5,0.5c-0.3,0-0.5-0.2-0.5-0.5c0-0.3,0.2-0.5,0.5-0.5C98.3,7.6,98.5,7.8,98.5,8"></path>
                    <path class="st0" d="M98.5,5.3c0,0.3-0.2,0.5-0.5,0.5c-0.3,0-0.5-0.2-0.5-0.5c0-0.3,0.2-0.5,0.5-0.5C98.3,4.8,98.5,5,98.5,5.3"></path>
                    <path class="st0" d="M95.8,4.7c0,0.6-0.5,1.1-1.1,1.1c-0.6,0-1.1-0.5-1.1-1.1c0-0.6,0.5-1.1,1.1-1.1C95.3,3.6,95.8,4.1,95.8,4.7"></path>
                    <path class="st0" d="M93.8,1.9c0,1.1-0.9,1.9-1.9,1.9C90.8,3.8,90,3,90,1.9C90,0.9,90.8,0,91.9,0C93,0,93.8,0.9,93.8,1.9"></path>
                    <path class="st0" d="M97.6,8c0,0.3,0.2,0.5,0.5,0.5s0.5-0.2,0.5-0.5c0-0.3-0.2-0.5-0.5-0.5S97.6,7.8,97.6,8"></path>
                    <path class="st0" d="M97.6,8c0,0.3,0.2,0.5,0.5,0.5s0.5-0.2,0.5-0.5c0-0.3-0.2-0.5-0.5-0.5S97.6,7.8,97.6,8"></path>
                    <path class="st0" d="M100.2,4.7c0,0.6,0.5,1.1,1.1,1.1c0.6,0,1.1-0.5,1.1-1.1c0-0.6-0.5-1.1-1.1-1.1
			C100.7,3.6,100.2,4.1,100.2,4.7"></path>
                    <path class="st0" d="M102.2,1.9c0,1.1,0.9,1.9,1.9,1.9c1.1,0,1.9-0.9,1.9-1.9c0-1.1-0.9-1.9-1.9-1.9C103.1,0,102.2,0.9,102.2,1.9"></path>
                    <path class="st0" d="M97.6,13.6c0-0.3,0.2-0.5,0.5-0.5s0.5,0.2,0.5,0.5c0,0.3-0.2,0.5-0.5,0.5S97.6,13.8,97.6,13.6"></path>
                    <path class="st0" d="M97.6,8c0-0.3,0.2-0.5,0.5-0.5s0.5,0.2,0.5,0.5c0,0.3-0.2,0.5-0.5,0.5S97.6,8.3,97.6,8"></path>
                    <path class="st0" d="M97.6,10.8c0-0.3,0.2-0.5,0.5-0.5s0.5,0.2,0.5,0.5c0,0.3-0.2,0.5-0.5,0.5S97.6,11.1,97.6,10.8"></path>
                    <path class="st0" d="M100.2,11.4c0-0.6,0.5-1.1,1.1-1.1c0.6,0,1.1,0.5,1.1,1.1c0,0.6-0.5,1.1-1.1,1.1
			C100.7,12.5,100.2,12,100.2,11.4"></path>
                    <path class="st0" d="M102.2,14.2c0-1.1,0.9-1.9,1.9-1.9c1.1,0,1.9,0.9,1.9,1.9c0,1.1-0.9,1.9-1.9,1.9
			C103.1,16.1,102.2,15.2,102.2,14.2"></path>
                    <path class="st0" d="M98.5,8c0-0.3-0.2-0.5-0.5-0.5c-0.3,0-0.5,0.2-0.5,0.5c0,0.3,0.2,0.5,0.5,0.5C98.3,8.5,98.5,8.3,98.5,8"></path>
                    <path class="st0" d="M95.8,11.4c0-0.6-0.5-1.1-1.1-1.1c-0.6,0-1.1,0.5-1.1,1.1c0,0.6,0.5,1.1,1.1,1.1C95.3,12.5,95.8,12,95.8,11.4
			"></path>
                    <path class="st0" d="M93.8,14.2c0-1.1-0.9-1.9-1.9-1.9c-1.1,0-1.9,0.9-1.9,1.9c0,1.1,0.9,1.9,1.9,1.9C93,16.1,93.8,15.2,93.8,14.2
			"></path>
                  </g>
                  <g>
                    <path class="st0" d="M4.3,11.6c-0.1,0.1-0.3,0.1-0.6,0.3c-0.3,0.1-0.6,0.2-1,0.2c-0.4,0-0.7-0.1-1.1-0.2c-0.3-0.1-0.6-0.3-0.9-0.6
			c-0.3-0.3-0.5-0.6-0.6-1C0.1,9.9,0,9.4,0,8.9C0,8.4,0.1,8,0.2,7.6c0.1-0.4,0.3-0.7,0.6-1c0.3-0.3,0.6-0.5,1-0.7s0.8-0.2,1.3-0.2
			c0.5,0,1,0,1.4,0.1c0.4,0.1,0.7,0.1,1,0.2v5.7c0,1-0.3,1.7-0.8,2.1c-0.5,0.4-1.3,0.7-2.3,0.7c-0.4,0-0.8,0-1.1-0.1
			c-0.4-0.1-0.7-0.1-0.9-0.2l0.2-1c0.2,0.1,0.5,0.2,0.8,0.2c0.3,0.1,0.7,0.1,1,0.1c0.7,0,1.2-0.1,1.5-0.4c0.3-0.3,0.4-0.7,0.4-1.3
			V11.6z M4.3,6.9c-0.1,0-0.3-0.1-0.5-0.1c-0.2,0-0.4,0-0.8,0C2.5,6.7,2,6.9,1.7,7.3C1.3,7.7,1.2,8.3,1.2,8.9c0,0.4,0,0.7,0.1,0.9
			c0.1,0.3,0.2,0.5,0.4,0.6c0.2,0.2,0.3,0.3,0.5,0.4C2.5,11,2.7,11,2.9,11c0.3,0,0.6,0,0.8-0.1c0.3-0.1,0.5-0.2,0.6-0.3V6.9z"></path>
                    <path class="st0" d="M9.8,5.7c0.1,0,0.2,0,0.3,0c0.1,0,0.3,0,0.4,0c0.1,0,0.2,0,0.3,0.1c0.1,0,0.2,0,0.2,0.1l-0.2,1
			c-0.1,0-0.2-0.1-0.4-0.1c-0.2,0-0.5-0.1-0.8-0.1c-0.2,0-0.4,0-0.6,0.1c-0.2,0-0.3,0.1-0.4,0.1v5.3H7.4V6.1C7.7,6,8,5.9,8.4,5.9
			C8.8,5.8,9.3,5.7,9.8,5.7z"></path>
                    <path class="st0" d="M17.2,12c-0.3,0.1-0.6,0.1-1,0.2c-0.4,0.1-0.9,0.1-1.5,0.1c-0.5,0-0.9-0.1-1.2-0.2c-0.3-0.1-0.6-0.3-0.8-0.6
			c-0.2-0.3-0.4-0.6-0.4-0.9c-0.1-0.4-0.1-0.7-0.1-1.2V5.9h1.1v3.3c0,0.8,0.1,1.3,0.4,1.7c0.2,0.3,0.7,0.5,1.2,0.5
			c0.1,0,0.2,0,0.4,0c0.1,0,0.3,0,0.4,0c0.1,0,0.2,0,0.3,0c0.1,0,0.2,0,0.2,0V5.9h1.1V12z"></path>
                    <path class="st0" d="M24.7,9c0,0.5-0.1,0.9-0.2,1.3c-0.1,0.4-0.3,0.8-0.6,1.1c-0.2,0.3-0.5,0.5-0.9,0.7s-0.8,0.2-1.2,0.2
			c-0.4,0-0.7,0-1-0.1c-0.3-0.1-0.5-0.2-0.6-0.3v2.5h-1.1V6.1c0.3-0.1,0.6-0.1,1-0.2c0.4-0.1,0.9-0.1,1.4-0.1c0.5,0,0.9,0.1,1.3,0.2
			c0.4,0.2,0.7,0.4,1,0.7c0.3,0.3,0.5,0.6,0.6,1C24.7,8.1,24.7,8.5,24.7,9z M23.5,9c0-0.7-0.2-1.3-0.5-1.7c-0.4-0.4-0.9-0.6-1.5-0.6
			c-0.3,0-0.6,0-0.8,0c-0.2,0-0.3,0.1-0.5,0.1v4c0.1,0.1,0.3,0.2,0.6,0.3c0.3,0.1,0.5,0.2,0.9,0.2c0.3,0,0.6-0.1,0.8-0.2
			c0.2-0.1,0.4-0.3,0.6-0.5c0.1-0.2,0.3-0.5,0.3-0.7C23.5,9.7,23.5,9.4,23.5,9z"></path>
                    <path class="st0" d="M28.4,5.7c0.5,0,0.8,0.1,1.2,0.2c0.3,0.1,0.6,0.3,0.8,0.5c0.2,0.2,0.3,0.5,0.4,0.8s0.1,0.6,0.1,1v4
			c-0.1,0-0.2,0-0.4,0.1c-0.2,0-0.4,0.1-0.6,0.1c-0.2,0-0.5,0-0.7,0.1c-0.3,0-0.5,0-0.8,0c-0.4,0-0.7,0-1-0.1
			c-0.3-0.1-0.6-0.2-0.8-0.3c-0.2-0.2-0.4-0.4-0.5-0.6c-0.1-0.3-0.2-0.6-0.2-0.9c0-0.3,0.1-0.7,0.2-0.9c0.1-0.3,0.3-0.5,0.6-0.6
			c0.2-0.2,0.5-0.3,0.9-0.3c0.3-0.1,0.7-0.1,1-0.1c0.1,0,0.2,0,0.4,0c0.1,0,0.2,0,0.3,0c0.1,0,0.2,0,0.3,0.1c0.1,0,0.1,0,0.2,0V8.2
			c0-0.2,0-0.4-0.1-0.6c0-0.2-0.1-0.3-0.2-0.5C29.3,7,29.2,6.9,29,6.8c-0.2-0.1-0.4-0.1-0.7-0.1c-0.4,0-0.7,0-1,0.1
			c-0.3,0.1-0.5,0.1-0.6,0.2L26.5,6c0.1-0.1,0.4-0.1,0.7-0.2S28,5.7,28.4,5.7z M28.5,11.4c0.3,0,0.5,0,0.7,0c0.2,0,0.4,0,0.5-0.1
			V9.4c-0.1,0-0.2-0.1-0.4-0.1c-0.2,0-0.4,0-0.7,0c-0.2,0-0.4,0-0.5,0c-0.2,0-0.4,0.1-0.5,0.2c-0.2,0.1-0.3,0.2-0.4,0.3
			c-0.1,0.1-0.2,0.3-0.2,0.5c0,0.4,0.1,0.7,0.4,0.8S28,11.4,28.5,11.4z"></path>
                    <path class="st0" d="M37.4,12.3c-0.7,0-1.2-0.2-1.5-0.5c-0.3-0.3-0.4-0.7-0.4-1.3V2.9l1.1-0.2v7.6c0,0.2,0,0.3,0,0.5
			c0,0.1,0.1,0.2,0.2,0.3c0.1,0.1,0.2,0.1,0.3,0.2c0.1,0,0.3,0.1,0.5,0.1L37.4,12.3z"></path>
                    <path class="st0" d="M38.5,9c0-0.6,0.1-1.1,0.2-1.5c0.2-0.4,0.4-0.8,0.6-1C39.7,6.3,40,6,40.3,5.9c0.3-0.1,0.7-0.2,1.1-0.2
			c0.9,0,1.5,0.3,2,0.8C43.8,7,44,7.8,44,8.9c0,0,0,0.1,0,0.2c0,0.1,0,0.1,0,0.2h-4.3c0,0.7,0.2,1.2,0.6,1.5
			c0.3,0.3,0.9,0.5,1.6,0.5c0.4,0,0.7,0,1-0.1c0.3-0.1,0.5-0.1,0.6-0.2l0.2,1c-0.1,0.1-0.4,0.2-0.7,0.2c-0.3,0.1-0.7,0.1-1.2,0.1
			c-0.6,0-1-0.1-1.4-0.3c-0.4-0.2-0.7-0.4-1-0.7c-0.3-0.3-0.5-0.6-0.6-1C38.6,10,38.5,9.5,38.5,9z M42.9,8.4c0-0.5-0.1-0.9-0.4-1.3
			c-0.3-0.3-0.6-0.5-1.1-0.5c-0.3,0-0.5,0.1-0.7,0.2c-0.2,0.1-0.4,0.2-0.5,0.4c-0.1,0.2-0.2,0.3-0.3,0.6c-0.1,0.2-0.1,0.4-0.2,0.6
			H42.9z"></path>
                    <path class="st0" d="M51.3,9c0,0.5-0.1,1-0.2,1.4c-0.1,0.4-0.4,0.8-0.6,1.1c-0.3,0.3-0.6,0.5-0.9,0.7c-0.4,0.2-0.8,0.2-1.2,0.2
			c-0.4,0-0.8-0.1-1.2-0.2c-0.4-0.2-0.7-0.4-0.9-0.7c-0.3-0.3-0.5-0.6-0.6-1.1C45.4,10,45.3,9.5,45.3,9c0-0.5,0.1-1,0.2-1.4
			c0.1-0.4,0.4-0.8,0.6-1.1c0.3-0.3,0.6-0.5,0.9-0.7c0.4-0.2,0.8-0.2,1.2-0.2c0.4,0,0.8,0.1,1.2,0.2c0.4,0.2,0.7,0.4,0.9,0.7
			c0.3,0.3,0.5,0.6,0.6,1.1C51.2,8.1,51.3,8.5,51.3,9z M50.1,9c0-0.7-0.2-1.3-0.5-1.7c-0.3-0.4-0.8-0.6-1.3-0.6s-1,0.2-1.3,0.6
			c-0.3,0.4-0.5,1-0.5,1.7c0,0.7,0.2,1.3,0.5,1.7c0.3,0.4,0.8,0.6,1.3,0.6s1-0.2,1.3-0.6C49.9,10.3,50.1,9.8,50.1,9z"></path>
                    <path class="st0" d="M52.9,6c0.3-0.1,0.6-0.1,1-0.2c0.4-0.1,0.9-0.1,1.5-0.1c0.5,0,0.9,0.1,1.3,0.2c0.3,0.1,0.6,0.3,0.8,0.6
			c0.2,0.3,0.3,0.6,0.4,0.9C58,7.8,58,8.2,58,8.6v3.6h-1.1V8.9c0-0.4,0-0.7-0.1-1c-0.1-0.3-0.1-0.5-0.3-0.7C56.4,7,56.2,6.9,56,6.8
			c-0.2-0.1-0.5-0.1-0.8-0.1c-0.1,0-0.2,0-0.4,0c-0.1,0-0.3,0-0.4,0c-0.1,0-0.2,0-0.3,0c-0.1,0-0.2,0-0.2,0v5.4h-1.1V6z"></path>
                    <path class="st0" d="M61.9,5.7c0.5,0,0.8,0.1,1.2,0.2c0.3,0.1,0.6,0.3,0.8,0.5c0.2,0.2,0.3,0.5,0.4,0.8c0.1,0.3,0.1,0.6,0.1,1v4
			c-0.1,0-0.2,0-0.4,0.1c-0.2,0-0.4,0.1-0.6,0.1c-0.2,0-0.5,0-0.7,0.1c-0.3,0-0.5,0-0.8,0c-0.4,0-0.7,0-1-0.1s-0.6-0.2-0.8-0.3
			c-0.2-0.2-0.4-0.4-0.5-0.6c-0.1-0.3-0.2-0.6-0.2-0.9c0-0.3,0.1-0.7,0.2-0.9C59.8,9.2,60,9,60.2,8.8c0.2-0.2,0.5-0.3,0.9-0.3
			c0.3-0.1,0.7-0.1,1-0.1c0.1,0,0.2,0,0.4,0c0.1,0,0.2,0,0.3,0c0.1,0,0.2,0,0.3,0.1c0.1,0,0.1,0,0.2,0V8.2c0-0.2,0-0.4-0.1-0.6
			c0-0.2-0.1-0.3-0.2-0.5c-0.1-0.1-0.3-0.3-0.4-0.3c-0.2-0.1-0.4-0.1-0.7-0.1c-0.4,0-0.7,0-1,0.1c-0.3,0.1-0.5,0.1-0.6,0.2L60.1,6
			c0.1-0.1,0.4-0.1,0.7-0.2S61.5,5.7,61.9,5.7z M62,11.4c0.3,0,0.5,0,0.7,0c0.2,0,0.4,0,0.5-0.1V9.4c-0.1,0-0.2-0.1-0.4-0.1
			c-0.2,0-0.4,0-0.7,0c-0.2,0-0.4,0-0.5,0c-0.2,0-0.4,0.1-0.5,0.2c-0.2,0.1-0.3,0.2-0.4,0.3c-0.1,0.1-0.2,0.3-0.2,0.5
			c0,0.4,0.1,0.7,0.4,0.8C61.2,11.3,61.6,11.4,62,11.4z"></path>
                    <path class="st0" d="M68.6,5.7c0.1,0,0.2,0,0.3,0c0.1,0,0.3,0,0.4,0c0.1,0,0.2,0,0.3,0.1c0.1,0,0.2,0,0.2,0.1l-0.2,1
			c-0.1,0-0.2-0.1-0.4-0.1c-0.2,0-0.5-0.1-0.8-0.1c-0.2,0-0.4,0-0.6,0.1c-0.2,0-0.3,0.1-0.4,0.1v5.3h-1.1V6.1c0.3-0.1,0.6-0.2,1-0.3
			C67.7,5.8,68.1,5.7,68.6,5.7z"></path>
                    <path class="st0" d="M75.1,2.9l1.1-0.2V12c-0.3,0.1-0.6,0.1-1,0.2c-0.4,0.1-0.9,0.1-1.4,0.1c-0.5,0-0.9-0.1-1.3-0.2
			c-0.4-0.2-0.7-0.4-1-0.7c-0.3-0.3-0.5-0.6-0.6-1C70.7,10,70.6,9.5,70.6,9c0-0.5,0.1-0.9,0.2-1.3c0.1-0.4,0.3-0.8,0.6-1.1
			c0.2-0.3,0.5-0.5,0.9-0.7c0.4-0.2,0.8-0.2,1.2-0.2c0.4,0,0.7,0,1,0.1c0.3,0.1,0.5,0.2,0.6,0.3V2.9z M75.1,7.2
			c-0.1-0.1-0.3-0.2-0.6-0.3c-0.3-0.1-0.5-0.2-0.9-0.2c-0.3,0-0.6,0.1-0.8,0.2c-0.2,0.1-0.4,0.3-0.6,0.5c-0.1,0.2-0.3,0.5-0.3,0.7
			c-0.1,0.3-0.1,0.6-0.1,0.9c0,0.7,0.2,1.3,0.5,1.7c0.4,0.4,0.9,0.6,1.5,0.6c0.3,0,0.6,0,0.8,0c0.2,0,0.4-0.1,0.5-0.1V7.2z"></path>
                    <path class="st0" d="M83.8,9c0,0.5-0.1,1-0.2,1.4c-0.1,0.4-0.4,0.8-0.6,1.1c-0.3,0.3-0.6,0.5-0.9,0.7c-0.4,0.2-0.8,0.2-1.2,0.2
			c-0.4,0-0.8-0.1-1.2-0.2c-0.4-0.2-0.7-0.4-0.9-0.7c-0.3-0.3-0.5-0.6-0.6-1.1C77.9,10,77.8,9.5,77.8,9c0-0.5,0.1-1,0.2-1.4
			c0.1-0.4,0.4-0.8,0.6-1.1c0.3-0.3,0.6-0.5,0.9-0.7c0.4-0.2,0.8-0.2,1.2-0.2c0.4,0,0.8,0.1,1.2,0.2c0.4,0.2,0.7,0.4,0.9,0.7
			c0.3,0.3,0.5,0.6,0.6,1.1C83.7,8.1,83.8,8.5,83.8,9z M82.6,9c0-0.7-0.2-1.3-0.5-1.7c-0.3-0.4-0.8-0.6-1.3-0.6
			c-0.6,0-1,0.2-1.3,0.6C79.2,7.7,79,8.3,79,9c0,0.7,0.2,1.3,0.5,1.7c0.3,0.4,0.8,0.6,1.3,0.6c0.6,0,1-0.2,1.3-0.6
			C82.4,10.3,82.6,9.8,82.6,9z"></path>
                  </g>
                </g>
              </svg>

            </span></a></p>

      </div>
    </div>



  </div>

  <div class="orange-foot">
    <div class="container">

    </div>
  </div>

  <style>
    .post-fade {
        opacity: 0;
        transition: all 5s ease-in-out;       
    }
</style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const checkbox = document.querySelector('input[name="policy"]');
      const submitButton = document.querySelector('#submit');

      checkbox.addEventListener('change', function() {
        submitButton.disabled = !this.checked;
      });
    });
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('email-form');
      const submitButton = document.getElementById('submit');
      const resultMessage = document.getElementById('result-message');

      form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);
        fetch('/wp-admin/admin-ajax.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.text())
          .then(data => {
            resultMessage.innerHTML = data;
            form.reset();
          });
      });
      
    });

 
  </script>


</footer>