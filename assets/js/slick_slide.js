//Custom slick slide item
// $('.main-list').slick({
//     slidesToShow: 4,
//     slidesToScroll: 4,
//     arrows : true
// });
  
// var filtered = false;
  
//   $('.js-filter').on('click', function(){
//     if (filtered === false) {
//         $('.main-list').slick('slickFilter',':even');
//         $(this).text('Unfilter Slides');
//         filtered = true;
//     } else {
//         $('.main-list').slick('slickUnfilter');
//         $(this).text('Filter Slides');
//         filtered = false;
//     }
// });



//Show list brand
// var list_brand = [
//     {
//         thump: "assets/img/ysl.jpg",
//     },
//     {
//         thump: "assets/img/caudalie.jpg",
//     },
//     {
//         thump: "assets/img/chanel.jpg",
//     },    
//     {
//         thump: "assets/img/dior.jpg",
//     },    
//     {
//         thump: "assets/img/mac.jpg",
//     },    
//     {
//         thump: "assets/img/nars.jpg",
//     },
//     {
//         thump: "assets/img/kiels.jpg",
//     },
//     {
//         thump: "assets/img/loreal.jpg",
//     }
// ];   

// list_brand.forEach((item) => {
//     let html = `<img src="${item.thump}" alt="" class="brand-thump">`;
//     $(".brand-layout").append(html);
// });

// $('.brand-layout').slick({
//     slidesToShow: 4,
//     slidesToScroll: 1,
//     autoplay: true,
//     autoplaySpeed: 2000,
// });

var list_brand = [
    {
        thump: "assets/img/ysl.jpg",
    },
    {
        thump: "assets/img/caudalie.jpg",
    },
    {
        thump: "assets/img/chanel.jpg",
    },    
    {
        thump: "assets/img/dior.jpg",
    },    
    {
        thump: "assets/img/mac.jpg",
    },    
    {
        thump: "assets/img/nars.jpg",
    },
    {
        thump: "assets/img/kiels.jpg",
    },
    {
        thump: "assets/img/loreal.jpg",
    }
];   

list_brand.forEach((item) => {
    let html = `<img src="${item.thump}" alt="" class="brand-thump">`;
    $(".brand-layout").append(html);
});

$('.brand-layout').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
});

// $('.slick-arrow').hide();