<?php

/**
 * Template Name: Simple text
 * Template Post Type:page
 */
get_header(); ?>
<!-- szkolenie-single  -->

<div class="single-post-temp">

    <div class="container">

        <div class="post-container">
            <div class="post-header">
                <p class="subhead"><?php the_field('maly_naglowek'); ?></p>
                <h1 class="mid-head"><?php the_field('nglowek'); ?></h1>

                <div class="share-links">
                    <div class="line"></div>
                </div>

            </div>

            <div class="text-block">
                <?php the_field('tekst'); ?>
            </div>


        </div>




    </div>

</div>



<?php get_footer();
