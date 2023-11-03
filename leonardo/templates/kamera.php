<?php

/**
 * Template Name: Kamera
 * Template Post Type:page
 */
get_header(); ?>


<div class="szkolenie-single single-post-temp">

    <div class="container">

        <div class="post-container">
            <div class="post-header">
                <!-- <p class="subhead">SZKOLENIA</p> -->
                <h1 class="mid-head"><?php echo get_the_title(); ?></h1>
                <div class="small-descript">
                    <p><?php the_field('descript_post') ?></p>
                </div>
                <div class="share-links">
                    <div class="line"></div>
                </div>

            </div>

            <div class="text-block">
                <img src="<?php echo get_site_url(); ?>/kamera/KSWHutnik/NABRZEZE/brzeg.jpg?<?php echo time(); ?>" alt="">
            </div>


        </div>




    </div>

</div>



<?php get_footer();
