<?php

/**
 * Template Name: O klubie
 * Template Post Type:page
 */
get_header(); ?>

<div class="single-post-temp about-temp">


    <div class="post-baner" style="background-image: url('<?php $baner = get_field('baner'); ?><?php if ($baner) : ?><?php echo esc_url($baner['url']); ?><?php endif; ?>')">
        <div class="container">
            <div class="post-header">
                <h1 class="subhead"><?php echo get_the_title(); ?></h1>
                <h2 class="mid-head"><?php the_field('naglowek_duzy'); ?></h2>

            </div>
        </div>
    </div>

    <div class="container">

        <div class="post-container">
            <?php if (have_rows('blok_dwie_kolumny')) : ?>
                <?php while (have_rows('blok_dwie_kolumny')) : the_row(); ?>
                    <div class="two-cols-block">
                        <div class="left-block text-block anchor-inside">
                            <div id="dane-klubu" class="anchor"></div>
                            <?php the_sub_field('lewy_block'); ?>
                        </div>
                        <div class="right-block text-block anchor-inside">
                            <div id="władze-klubu" class="anchor"></div>
                            <?php the_sub_field('prawy_block'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php if (have_rows('ciemny_block')) : ?>
        <?php while (have_rows('ciemny_block')) : the_row(); ?>
            <div class="blue-block anchor-inside">
                <div id="przekaz-1-podatku" class="anchor"></div>
                <div class="container">
                    <div class="post-container">
                        <div class="two-cols-block">
                            <div class="left-block text-block">
                                <?php the_sub_field('lewy_blok'); ?>
                            </div>
                            <div class="right-block text-block">
                                <?php the_sub_field('prawy_blok'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>



    <div class="container anchor-inside">
        <div id="historia-klubu" class="anchor"></div>
        <div class="post-container">
            <div class="text-block">
                <?php the_field('bottom_block'); ?>
            </div>
        </div>
    </div>
    <?php
    if (have_rows('sponsory')) : ?>
        <div class="container anchor-inside">
            <div id="sponsory" class="anchor"></div>
            <div class="post-container">
                <div class="sponsors-row">

                    <?php while (have_rows('sponsory')) : the_row();
                    ?>
                        <a href="<?php the_sub_field('link'); ?>" class="single-sponsor">
                            <?php $obrazek = get_sub_field('obrazek'); ?>
                            <?php if ($obrazek) : ?>
                                <img src="<?php echo esc_url($obrazek['url']); ?>" alt="<?php echo esc_attr($obrazek['alt']); ?>" />
                            <?php endif; ?>
                        </a>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
</div>




<?php get_footer();
