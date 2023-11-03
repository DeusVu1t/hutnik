<?php

/**
 * Template Name: Blog
 * Template Post Type:page
 */
get_header(); ?>


<div class="blog-page container paddings  aktualnosci-temp">
    <div class="row blog-top-row">

        <div class="page-header-blog">
            <h1 class="subhead">AKTUALNOŚCI</h1>
            <?php the_field('description'); ?>
        </div>



        <div class="category-buttons">

            <?php
            $categories = get_categories();
            echo '<button class="category-button active" data-category="all">Wszystkie</button>';
            foreach ($categories as $category) {
                echo '<button class="category-button" data-category="' . $category->slug . '">' . $category->name . '</button>';
            }
            ?>
        </div>
    </div>

    <div id="ajax-posts" class="grid-posts">

    </div>
    <button id="more_posts" class="load-more"><svg xmlns="http://www.w3.org/2000/svg" width="31.479" height="31.479" viewBox="0 0 31.479 31.479">
  <g id="group_2" data-name="group 2" transform="translate(-988 -3128.5)">
    <line id="line_1" data-name="line 1" y2="29.479" transform="translate(1003.74 3129.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"/>
    <line id="line_2" data-name="line 2" y2="29.479" transform="translate(1018.479 3144.24) rotate(90)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"/>
  </g>
</svg>
</button>

</div>



<script>





</script>
<?php get_footer();
