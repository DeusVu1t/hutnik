<?php

/**
 * Template Name: Home template
 * Template Post Type:page
 */
get_header(); ?>


<?php if (have_rows('banner')) : ?>
    <?php while (have_rows('banner')) : the_row(); ?>
        <!-- 
        <div class="banner" style="background-image: url('<?php $obrazek = get_sub_field('obrazek'); ?><?php if ($obrazek) : ?><?php echo esc_url($obrazek['url']); ?><?php endif; ?>')">
            <div class="content-holder">
                <div class="container">
                    <div class="text-block">
                        <?php the_sub_field('tekst'); ?>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="owl-carousel owl-theme">
            <?php if (have_rows('single_slide')) : while (have_rows('single_slide')) : the_row();  ?>

                    <div class="banner item" style="background-image: url('<?php $obrazek = get_sub_field('obrazek'); ?><?php if ($obrazek) : ?><?php echo esc_url($obrazek['url']); ?><?php endif; ?>')">
                        <div class="content-holder">
                            <div class="container">
                                <div class="text-block">
                                    <?php the_sub_field('tekst'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php if (have_rows('o_nas')) : ?>
    <?php while (have_rows('o_nas')) : the_row(); ?>
        <div class="content-holder about-us">
            <div class="container">
                <p class="subhead">O klubie</p>
                <div class="text-block">
                    <?php the_sub_field('tekst'); ?>
                    <div class="counter-row">
                        <?php if (have_rows('single_counter')) : while (have_rows('single_counter')) : the_row();  ?>
                                <div class="single-counter">
                                    <span class="counter-main">
                                        <span class="counter-value" data-count="<?php the_sub_field('liczba'); ?>">
                                        </span>
                                    </span>
                                    <p><?php the_sub_field('podpis'); ?></p>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>



<?php if (have_rows('regaty')) : ?>
    <?php while (have_rows('regaty')) : the_row(); ?>
        <div class="content-holder rejsy-home">
            <div class="container">
                <p class="subhead">regaty</p>
                <div class="text-block">
                    <?php the_sub_field('podpis__rejsy'); ?>
                </div>
                <div class="grid-posts">
                    <?php if (have_rows('osobny_wpis')) : while (have_rows('osobny_wpis')) : the_row();  ?>
                            <?php $wpis = get_sub_field('wpis'); ?>
                            <?php if ($wpis) : ?>
                                <?php $post = $wpis; ?>
                                <?php setup_postdata($post); ?>
                                <?php $post_description = get_field('descript_post'); // Получение описания поста 
                                ?>
                                <article class="single-post-box" data-aos="zoom-in">
                                    <a href="<?php the_permalink(); ?>" class="blog-link">
                                        <div class="image-block">
                                            <?php the_post_thumbnail('thumbnail', array('loading' => 'lazy')); ?>
                                        </div>
                                        <div class="text-block">
                                            <div class="bottom-post">
                                                <h4 class="clamp-2"><?php the_title(); ?></h4>
                                                <div class="descript clamp-3"><?php echo $post_description; ?></div>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>



<?php if (have_rows('obrazek_tekst')) : ?>
    <?php while (have_rows('obrazek_tekst')) : the_row(); ?>
        <div class="full-image-text" style="background-image: url('<?php $obrazek = get_sub_field('obrazek'); ?><?php if ($obrazek) : ?><?php echo esc_url($obrazek['url']); ?><?php endif; ?>')">
            <div class="content-holder">
                <div class="container">
                    <div class="text-block half-block">
                        <p class="subhead">rejsy</p>
                        <?php the_sub_field('tekst'); ?>
                        <a href="<?php the_sub_field('link_do_regat'); ?>" class="single-button">Przejdż do rejsów</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>



<div class="szkolenia-front">
    <div class="content-holder">
        <div class="container">
            <div class="text-block left-block">
                <p class="subhead">SZKOLENIA</p>
                <?php the_field('szkolenia_tekst'); ?>
            </div>
            <div class="right-block">
                <?php
                // Query the last 3 subpages of page with ID 243
                $args = array(
                    'post_type' => 'page',
                    'post_parent' => 243,
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                $subpages = new WP_Query($args);

                if ($subpages->have_posts()) :
                    while ($subpages->have_posts()) :
                        $subpages->the_post();
                ?>
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?></p>
                        </a>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

        </div>
    </div>
</div>



<div class="front-blog">

    <?php if (have_rows('tiles_block')) : while (have_rows('tiles_block')) : the_row();  ?>
            <?php $osobny_wpis = get_sub_field('osobny_wpis'); ?>

            <?php if ($osobny_wpis) : ?>
                <?php $post = $osobny_wpis; ?>
                <?php setup_postdata($post); ?>
                <a href="<?php the_permalink(); ?>" class="single-tile">
                    <div class="top-block">
                        <p class="subhead">AKTUALNOŚCI</p>
                        <h3 class="clamp-3"><?php the_title(); ?></h3>
                        <div class="descript clamp-3" style=""><?php the_field('descript_post') ?></div>

                    </div>
                    <div class="bottom-block">
                        <?php the_post_thumbnail('thumbnail', array('loading' => 'lazy')); ?>
                    </div>

                </a>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

    <?php endwhile;
    endif; ?>

</div>

<script>
    var a = 0;
    var $counter = $('.counter-main');
    var counterVisible = false;
    $(window).scroll(function() {
        if ($counter.length < 1) return;
        var oTop = $counter.offset().top - window.innerHeight;
        var scrollTop = $(window).scrollTop();
        if (a == 0 && scrollTop > oTop) {
            $('.counter-value').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count').replace(/\s+/g, '');
                $({
                    countNum: $this.text().replace(/\s+/g, '')
                }).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(formatNumber(Math.floor(this.countNum)));
                    },
                    complete: function() {
                        $this.text(formatNumber(this.countNum));
                        counterVisible = true;
                    }
                });
            });
            a = 1;
        } else if (counterVisible && scrollTop < oTop) {
            $('.counter-value').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count').replace(/\s+/g, '');
                $({
                    countNum: $this.text().replace(/\s+/g, '')
                }).animate({
                    countNum: 0
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function() {
                        $this.text(formatNumber(Math.floor(this.countNum)));
                    },
                    complete: function() {
                        $this.text('0');
                        counterVisible = false;
                        a = 0;
                    }
                });
            });
        }
    });


    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }
</script>






<?php get_footer();
