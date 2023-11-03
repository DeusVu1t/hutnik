<?php

/**
 * Template Name: Kontakt
 * Template Post Type:page
 */
get_header(); ?>


<div class="contact-page">
    <div class="content-holder">
        <div class="container">

            <div class="row">
                <div class="left-block">
                    <h1 class="subhead">KONTAKT</h1>
                    <h2>Skontaktuj się z nami już dziś!</h2>
                    <div class="address">
                        <?php the_field('adres'); ?>
                    </div>
                    <a href="<?php the_field( 'link_how' ); ?>" class="road-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="112" height="112" viewBox="0 0 112 112">
                            <defs>
                                <filter id="elips_1" x="0" y="0" width="112" height="112" filterUnits="userSpaceOnUse">
                                    <feOffset dy="3" input="SourceAlpha" />
                                    <feGaussianBlur stdDeviation="6" result="blur" />
                                    <feFlood flood-opacity="0.161" />
                                    <feComposite operator="in" in2="blur" />
                                    <feComposite in="SourceGraphic" />
                                </filter>
                            </defs>
                            <g id="group_127" data-name="group 127" transform="translate(-177 -704.135)">
                                <g transform="matrix(1, 0, 0, 1, 177, 704.13)" filter="url(#elips_1)">
                                    <circle id="elips_1-2" data-name="elips 1" cx="38" cy="38" r="38" transform="translate(18 15)" fill="#5bc5ec" />
                                </g>
                                <g id="group_104" data-name="group 104" transform="translate(14 -77.865)">
                                    <g id="elips_4" data-name="elips 4" transform="translate(203 818)" fill="none" stroke="#fff" stroke-width="2">
                                        <circle cx="15" cy="15" r="15" stroke="none" />
                                        <circle cx="15" cy="15" r="14" fill="none" />
                                    </g>
                                    <line id="Линия_17" data-name="Линия 17" x1="7" y1="7" transform="translate(227.5 844.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" />
                                </g>
                            </g>
                        </svg>
                        JAK DOJECHAĆ
                    </a>
                </div>
                <div class="right-block">
                    <div class="description">
                        <?php the_field('duzy_podpis'); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<?php get_footer();
