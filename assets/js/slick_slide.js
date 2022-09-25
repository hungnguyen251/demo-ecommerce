//slide brand list
$('.bg-img').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 6000,
});

$(function() {
    function slickOnResize() {
        $(".main-list").slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            autoplay: true,
            autoplaySpeed:6000,
            arrows: true,
            dots: false,
                infinite: true,
                cssEase: 'linear',
            mobileFirst: true,
                swipeToSlide: true,
            responsive: [
                {
                    breakpoint: 0,
                    settings : {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                },
                {
                breakpoint: 768,
                settings : {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        }
                },
                {
                    breakpoint: 2880,
                    settings : {
                                slidesToShow: 4,
                                slidesToScroll: 4,
                            }
                }
            ]
        });

        $(".list-new-item").slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            autoplay: true,
            autoplaySpeed:6000,
            arrows: true,
            dots: false,
                infinite: true,
                cssEase: 'linear',
            mobileFirst: true,
                swipeToSlide: true,
            responsive: [
                {
                    breakpoint: 0,
                    settings : {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                },
                {
                breakpoint: 768,
                settings : {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        }
                },
                {
                    breakpoint: 2880,
                    settings : {
                                slidesToShow: 4,
                                slidesToScroll: 4,
                            }
                }
            ]
        });

        $(".brand-layout").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed:6000,
            arrows: true,
            dots: false,
                infinite: true,
                cssEase: 'linear',
            mobileFirst: true,
                swipeToSlide: true,
            responsive: [
                {
                    breakpoint: 0,
                    settings : {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                },
                {
                breakpoint: 768,
                settings : {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                },
                {
                    breakpoint: 2880,
                    settings : {
                                slidesToShow: 4,
                                slidesToScroll: 1,
                            }
                }
            ]
        });

        $(".slick-prev").html('<i class="fa-solid fa-caret-left"></i>');
        $(".slick-next").html('<i class="fa-solid fa-caret-right"></i>');
    }

    slickOnResize();

    $(window).resize(function(){
        var $window_width = $(window).width();
        if ($window_width < 768) {
            $(".main-list").slick("resize");
            $(".list-new-item").slick("resize");
            $(".brand-layout").slick("resize");
            $(".slick-prev").html('<i class="fa-solid fa-caret-left"></i>');
            $(".slick-next").html('<i class="fa-solid fa-caret-right"></i>');
        } else {
            $(".slick-prev").html('<i class="fa-solid fa-caret-left"></i>');
            $(".slick-next").html('<i class="fa-solid fa-caret-right"></i>');
        }
    });
});