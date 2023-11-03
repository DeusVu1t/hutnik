<?php

/**
 * Template Name: Rejsy post
 * Template Post Type: post, rejsy
 */

 $page_title = get_the_title();
 $current_url = esc_url(get_permalink()); 

 $page_title = html_entity_decode($page_title, ENT_QUOTES, 'UTF-8'); 
 $twitter_url = 'https://twitter.com/intent/tweet?text=' . urlencode($page_title . ' ' . $current_url);
 $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($current_url);
 $email_subject = $page_title; 
 

 $email_body = str_replace(' ', '%20', $page_title . ' ' . $current_url); 
 $email_url = "mailto:?subject={$email_subject}&body={$email_body}";
get_header(); ?>

<div class="single-post-temp">


    <div class="post-baner" style="background-image: url('<?php $baner = get_field('baner'); ?><?php if ($baner) : ?><?php echo esc_url($baner['url']); ?><?php endif; ?>')">
        <div class="container">
            <div class="post-header">
                <p class="subhead">rejsy</p>
                <h1 class="mid-head"><?php echo get_the_title(); ?></h1>

            </div>
        </div>
    </div>

    <div class="container">

        <div class="post-container">

            <div class="post-header">


                <div class="small-descript"><?php the_field('descript_post') ?></div>
                <div class="share-links">
                    <div class="line"></div>
                 
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url); ?>" target="_blank" rel="noreferrer" class="ShareLayer_ShareLayerItem__ItGRu" data-gtm="wdg_shareSheet-Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14.731" height="27.503" viewBox="0 0 14.731 27.503">
                            <path id="kont_8315" data-name="kont 8315" d="M25.784,15.47l.763-4.977H21.771V7.263a2.489,2.489,0,0,1,2.806-2.689h2.172V.337A26.46,26.46,0,0,0,22.894,0c-3.933,0-6.5,2.384-6.5,6.7v3.794H12.018V15.47H16.39V27.5h5.381V15.47Z" transform="translate(-12.018)" fill="#5bc5ec" />
                        </svg>
                    </a>
                    <a href="<?php echo esc_url($twitter_url); ?>" target="_blank" rel="noreferrer" class="ShareLayer_ShareLayerItem__ItGRu" data-gtm="wdg_shareSheet-Twitter">

                        <svg version="1.1" id="Warstwa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1200 1227" style="enable-background:new 0 0 1200 1227;" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: #5BC5EC !important;
                                }
                            </style>
                            <path class="st0" d="M714.16,519.28L1160.89,0h-105.86L667.14,450.89L357.33,0H0l468.49,681.82L0,1226.37h105.87l409.63-476.15
	l327.18,476.15H1200L714.14,519.28H714.16z M569.16,687.83l-47.47-67.89L144.01,79.69h162.6l304.8,435.99l47.47,67.89l396.2,566.72
	h-162.6L569.16,687.85V687.83z" />
                        </svg>

                    </a>
                    <a href="<?php echo esc_url($email_url); ?>" target="_blank" rel="noreferrer" class="ShareLayer_ShareLayerItem__ItGRu" data-gtm="wdg_shareSheet-mailShare">
                        <svg version="1.1" id="Warstwa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 390 300" style="enable-background:new 0 0 390 300;" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: #5BC5EC;
                                }
                            </style>
                            <g>
                                <path class="st0" d="M28.88,4.18L164.44,158c7.7,8.74,18.81,13.76,30.47,13.76c11.65,0,22.76-5.02,30.47-13.76L358.59,6.85
		c1.1-1.25,2.4-2.21,3.78-2.98C356.71,1.39,350.49,0,343.93,0H45.87C39.6,0,33.63,1.27,28.18,3.53C28.41,3.76,28.66,3.94,28.88,4.18
		z" />
                                <path class="st0" d="M382.89,21.58c-0.6,1.56-1.44,3.06-2.6,4.39L247.07,177.12c-13.2,14.97-32.21,23.55-52.16,23.55
		c-19.95,0-38.97-8.58-52.16-23.55L7.18,23.3C6.9,23,6.71,22.64,6.47,22.32c-4.18,6.94-6.64,15.03-6.64,23.72v208.19
		c0,25.43,20.61,46.04,46.04,46.04h298.06c25.43,0,46.04-20.61,46.04-46.04V46.04C389.97,37.04,387.35,28.67,382.89,21.58z" />
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="text-block">
                <?php the_field('post_text') ?>
            </div>


        </div>



        <div class="more-posts-post">
            <h3>Zobacz inne</h3>
            <div class="grid-posts dgrid-2">
                <?php
                // Получаем ID текущего поста
                $current_post_id = get_the_ID();

                // Создаем запрос WP_Query
                $args = array(
                    'post_type' => 'rejsy',
                    'posts_per_page' => 2, // Количество постов для вывода
                    'post__not_in' => array($current_post_id), // Исключаем текущий пост
                    'ignore_sticky_posts' => 1, // Игнорируем закрепленные посты
                );

                $query = new WP_Query($args);

                // Цикл для вывода постов
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        // Получаем категорию
                        $categories = get_the_category();
                        $main_category = !empty($categories) ? esc_html($categories[0]->name) : '';

                        // Получаем дату
                        $post_date = get_the_date('m/d/Y');

                        // Получаем описание поста
                        $post_description = get_field('descript_post');
                ?>
                        <article class="single-post-box" data-aos="zoom-in">
                            <a href="<?php the_permalink(); ?>" class="blog-link">
                                <div class="image-block">
                                    <?php the_post_thumbnail('thumbnail', array('loading' => 'lazy')); ?>
                                </div>
                                <div class="text-block">
                                    <div class="top-post">

                                    </div>
                                    <div class="bottom-post">
                                        <h4 class="clamp-2"><?php the_title(); ?></h4>
                                        <div class="descript clamp-3"><?php echo $post_description; ?></div>
                                    </div>
                                </div>
                            </a>
                        </article>
                <?php
                    }
                    wp_reset_postdata(); // Восстанавливаем оригинальные данные поста
                }
                ?>
            </div>

        </div>


    </div>
</div>




<?php get_footer(); ?>