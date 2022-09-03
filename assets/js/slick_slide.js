//slide brand list
$('.brand-layout').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
});

//slide list promo
$(".main-list").slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    arrows : true,
});
$(".slick-prev").html('<i class="fa-solid fa-caret-left"></i>');
$(".slick-next").html('<i class="fa-solid fa-caret-right"></i>');

//slide products
$('.list-new-item').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    arrows : true
});
  
$('.slick-prev').html('<i class="fa-solid fa-angle-left"></i>');
$('.slick-next').html('<i class="fa-solid fa-angle-right"></i>');