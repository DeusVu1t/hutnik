$(document).ready(function () {


    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:4000,  
        autoplaySpeed: 700, 
        nav:false,  
        dots:false,  
        responsive:{
            0:{
                items:1
            },
           
        }
    })
    var morePostsElement = $('#more_posts');

    if (morePostsElement.length) {
        var ppp = 8; // Posts per page
        var pageNumber = 1;
        var currentCategory = getParameterByName('category');

        function load_posts(category) {
            var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax' + '&category=' + category;
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: ajax_posts.ajaxurl,
                data: str,
                success: function (data) {
                    var $data = $(data);
                    if ($data.length) {                        
                        $data.addClass("post-fade");
                        $('#ajax-posts').append($data);        
                        setTimeout(function () {
                            $data.removeClass("post-fade");
                        }, 10);
        
                        pageNumber++;
                        $("#more_posts").attr("disabled", false);
                    } else {
                        $("#more_posts").attr("disabled", true);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }
            });
        }
        

        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        $("#more_posts").on("click", function () {
            $(this).attr("disabled", true);
            load_posts(currentCategory);
            $(this).insertAfter('#ajax-posts');
        });

        var clickAllowed = true; 

        $(window).scroll(function () {
            var colophon = $('#colophon');

            if (colophon.length) {
                var colophonOffset = colophon.offset().top;
                var windowHeight = $(window).height();
                var scrollPosition = $(window).scrollTop();

                if (scrollPosition + windowHeight >= colophonOffset) {
                    if (clickAllowed && !$('#more_posts').is(":disabled")) {
                        clickAllowed = false; 
                        $('#more_posts').click(); 
                        console.log('click');
                    }
                } else {
                    clickAllowed = true; 
                }
            }
        });


        $('.category-button').on('click', function () {
            var category = $(this).data('category');
            $('#ajax-posts').empty();
            pageNumber = 1;
            currentCategory = category;
            load_posts(category);
            $('#more_posts').insertAfter('#ajax-posts');
            $('.category-button').removeClass('active'); 
            $(this).addClass('active'); 
        });


        var url = window.location.href;

        if (url.includes("=")) {
            $('.category-button').removeClass('active');
            $('.category-button[data-category="' + currentCategory + '"]').addClass('active'); 
            load_posts(currentCategory);
        } else {
            load_posts('');
        }
    }
    var morePostsRegaty = $('#more_posts-regaty');

    if (morePostsRegaty.length) {
        var ppp = 12; 
        var pageNumber = 1;
        var currentCategory = '';

        function load_posts(category, containerID, buttonID, postType) {
            var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax_' + postType + '&category=' + category;
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: ajax_posts.ajaxurl,
                data: str,
                success: function (data) {
                    var $data = $(data);
                    if ($data.length) {                     
                        $data.addClass("post-fade");
                        $(containerID).append($data);        
                        setTimeout(function () {
                            $data.removeClass("post-fade");
                        }, 100);
        
                        pageNumber++;
                        $(buttonID).attr("disabled", false);
                    } else {
                        $(buttonID).attr("disabled", true);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }
            });
        }
        

        $("#more_posts-regaty").on("click", function () { 
            $(this).attr("disabled", true); 
            load_posts(currentCategory, '#ajax-posts-regaty', '#more_posts-regaty', 'regaty');
            $(this).insertAfter('#ajax-posts-regaty'); 
        });

        var clickAllowed = true;

        $(window).scroll(function () {
            var colophon = $('#colophon');

            if (colophon.length) {
                var colophonOffset = colophon.offset().top;
                var windowHeight = $(window).height();
                var scrollPosition = $(window).scrollTop();

                if (scrollPosition + windowHeight >= colophonOffset) {
                    if (clickAllowed && !$('#more_posts-regaty').is(":disabled")) {
                        clickAllowed = false; 
                        $('#more_posts-regaty').click(); 
                        console.log('click');
                    }
                } else {
                    clickAllowed = true;
                }
            }
        });
        $('.category-button-regaty').on('click', function () { 
            var category = $(this).data('category');
            $('#ajax-posts-regaty').empty(); 
            pageNumber = 1; 
            currentCategory = category;
            load_posts(category, '#ajax-posts-regaty', '#more_posts-regaty', 'regaty');
            $('#more_posts-regaty').insertAfter('#ajax-posts-regaty'); 
        });


        load_posts('', '#ajax-posts-regaty', '#more_posts-regaty', 'regaty');

    }

    var morePostsRejsy = $('#more_posts-rejsy');
    if (morePostsRejsy.length) {
        var ppp = 4; 
        var pageNumber = 1;
        var currentCategory = '';

        function load_posts(category, containerID, buttonID, postType) {
            var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax_' + postType + '&category=' + category;
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: ajax_posts.ajaxurl,
                data: str,
                success: function (data) {
                    var $data = $(data);
                    if ($data.length) {                     
                        $data.addClass("post-fade");
                        $(containerID).append($data);        
                        setTimeout(function () {
                            $data.removeClass("post-fade");
                        }, 100);
        
                        pageNumber++;
                        $(buttonID).attr("disabled", false);
                    } else {
                        $(buttonID).attr("disabled", true);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }
            });
        }

        $("#more_posts-rejsy").on("click", function () { 
            $(this).attr("disabled", true); 
            load_posts(currentCategory, '#ajax-posts-rejsy', '#more_posts-rejsy', 'rejsy');
            $(this).insertAfter('#ajax-posts-rejsy'); 
        });

        var clickAllowed = true; 

        $(window).scroll(function () {
            var colophon = $('#colophon');

            if (colophon.length) {
                var colophonOffset = colophon.offset().top;
                var windowHeight = $(window).height();
                var scrollPosition = $(window).scrollTop();

                if (scrollPosition + windowHeight >= colophonOffset) {
                    if (clickAllowed && !$('#more_posts-rejsy').is(":disabled")) {
                        clickAllowed = false; 
                        $('#more_posts-rejsy').click(); 
                        console.log('click');
                    }
                } else {
                    clickAllowed = true; 
                }
            }
        });


        $('.category-button-rejsy').on('click', function () { 
            var category = $(this).data('category');
            $('#ajax-posts-rejsy').empty();
            pageNumber = 1; 
            currentCategory = category;
            load_posts(category, '#ajax-posts-rejsy', '#more_posts-rejsy', 'rejsy'); 
            $('#more_posts-rejsy').insertAfter('#ajax-posts-rejsy'); 
        });
  
        load_posts('', '#ajax-posts-rejsy', '#more_posts-rejsy', 'rejsy');

        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            albumLabel: "Obrazek %1 / %2"
        })

    }
});

$(window).scroll(function () {
    if ($(window).scrollTop() > 10) {
        $('.site-header').addClass('scrolled');

    } else {
        $('.site-header').removeClass('scrolled');
    }
});



$(function () {
    function toggleMenu() {
        if ($(window).width() >= 1080) {
            $(".menu-item-has-children").hover(function () {
                $(this).children(".sub-menu").stop().fadeToggle(200);
            });
        } else {
            $(".menu-item-has-children").click(function () {
                $(this).children(".sub-menu").stop().slideToggle(300);
                $(this).find("a:first").toggleClass("active-link");
            });

        }
    }

    toggleMenu();

});


$(document).ready(function () {
    $('.hamburger').click(function () {
        $(".mobile-menu").slideToggle()
    });

    $(".menu-icon").click(function () {
        $(this).toggleClass("opened");
        $('.site-header').toggleClass("mobile-open");
        if ($('.site-header').hasClass("mobile-open")) {
            $("body").addClass("overflow-hidden");
        } else {
            $("body").removeClass("overflow-hidden");
        }
    });
    $('a[href*="#"]').click(function (e) {
        let fullHash = this.href.split('#')[1];
        fullHash = decodeURIComponent(fullHash);
        let destination = document.getElementById(fullHash);
        if (destination) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $(destination).offset().top
            }, 'slow');
        }
    });
   
    if (window.location.hash) {
        let destination = document.getElementById(window.location.hash.substr(1));
        if (destination) {
            $('html, body').animate({
                scrollTop: $(destination).offset().top
            }, 'slow');
        }
    }
});
