function showCart() {
    var x = document.getElementById("cart-list");
    if (x.style.display == "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
    pageCartPayment();
}

//Show payment cart
pageCartPayment();

$(".cart-description").hide();
$(".payment").hide();

//-----------------------------------------PHP-----------------------------------//
$.ajax({
    type: "POST",
    url: 'ajax_show_list_products.php',
    data: '',
    success: function (data) {
        if(data != null) {
            getProductsPromoList(data.products_promo);
            getProductsList(data.products);
        } else {
            console.log('Failed to load products list');
        }
    }
});

function getProductsPromoList(param) {
    sessionStorage.setItem("productsPromo", JSON.stringify(param));
};

function getProductsList(param) {
    sessionStorage.setItem("products", JSON.stringify(param));
};

//List sản phẩm khuyến mãi
var promo = sessionStorage.getItem("productsPromo");
var productsPromo = JSON.parse(promo) || [];
productsPromo.forEach((item,index) => {
    let html = `<div class="col-sm-3 d-flex flex-column list-item">
                    <img src="${item.url}" alt="">
                    <div class="item-promo-icon">
                        <div class="promo-icon-text">PROMO</div>
                    </div>
                    <span class="list-item-brand text-center">${item.brand}</span>
                    <b>${item.name}</b>
                    <i>${item.description}</i>
                    <b class="item-price">${item.promo}</b>
                    <p class="item-old-price ms-3 text-decoration-line-through">${item.price}</p>

                    <div class="flex-grow-1 text-end d-flex align-items-end justify-content-end">
                        <button class="btn-add mb-5" data-index="${index}">
                            <i class="fa-solid fa-cart-arrow-down"></i>
                        </button>
                    </div>
                </div>`;
    $(".main-list").append(html);
});

// List sản phẩm mới
var products = sessionStorage.getItem("products");
var newProducts = JSON.parse(products) || [];
newProducts.forEach((item,index) => {
    let html = `<div class="col-sm-3 d-flex flex-column list-item">
                    <img src="${item.url}" alt="">
                    <div class="item-promo-icon" style="background-color:black;">
                        <div class="promo-icon-text">NEW</div>
                    </div>
                    <span class="list-item-brand text-center">${item.brand}</span>
                    <b>${item.name}</b>
                    <i>${item.description}</i>
                    <b class="item-price">${item.price}</b>

                    <div class="flex-grow-1 text-end d-flex align-items-end justify-content-end">
                        <button class="btn-add mb-5" data-index="${index}">
                            <i class="fa-solid fa-cart-arrow-down"></i>
                        </button>
                    </div>
                </div>`;
    $(".list-new-item").append(html);
});

//thêm sản phẩm vào cart
var cart = [];
var cart2 = [];

$(".btn-add").click(function () {
    var i = $(this).data("index");
    // productsPromo.forEach(e => {
    //     if (e.name == productsPromo[i].name) {   //lỗi e
    //         e.amount = e.amount + 1;
    //         return 1;
    //     }
    // });
    // let checkPromo = cart.filter((e) => {
    //     if (e.name == productsPromo[i].name) {   //lỗi e
    //         e.amount = e.amount + 1;
    //         return 1;
    //     }
    // });
    console.log(cart);

    let check = cart.filter((e) => {
        if (e.name == newProducts[i].name) {   //lỗi e
            e.amount = e.amount + 1;
            return 1;
        }
    });
    // checkPromo.length < 1 && cart.push({ ...productsPromo[i], amount: 1 });
    check.length < 1 && cart.push({ ...newProducts[i], amount: 1 });

    handleHtmlCard();
    pageCartPayment();

    $(".cart-no-cart-img").hide();
    $(".cart-no-cart-msg").hide();
    $(".cart-description").show();
    $(".payment").show();

    sessionStorage.setItem("cart", JSON.stringify(cart));
});

//Xóa sản phẩm trong cart
$(".show-cart").on('click', '.btn-remove', function () {
    var i = $(this).data("index");
    cart = cart.filter((e) => e.name != cart[i].name)
    // $(".total-price").html(cart[i].amount);
    handleHtmlCard();
    if (cart.length == 0) {
        $(".cart-no-cart-img").show();
        $(".cart-no-cart-msg").show();
        $(".cart-description").hide();
        $(".payment").hide();
    }
});

//Cộng trừ số lượng sản phẩm trong cart
$(".show-cart").on('click', '.btn-minus', function () {
    var i = $(this).data("index");
    cart[i].amount > 1 && (cart[i].amount = cart[i].amount - 1);
     
    handleHtmlCard();
});

$(".show-cart").on('click', '.btn-plus', function () {
    var i = $(this).data("index");
    cart[i].amount < 99 && (cart[i].amount = cart[i].amount +1);

    handleHtmlCard();
});

$(".show-cart").on("change", "input", function () {
    var i = $(this).data("index");
    var valInput = $(this).val();

    if(valInput < 1) {
        cart[i].amount = 1
    }

    if(valInput > 99) {
        cart[i].amount = 99
    }

    if(valInput >= 1 && valInput <= 99) {
        cart[i].amount = valInput;
    }

    handleHtmlCard();
});


//Display list item in cart
function handleHtmlCard() {
    $(".show-cart").empty();
    cart.forEach((item, index) => {
        var html = `<div class="d-flex mb-3 list-item">
                        <div class="thum me-3">
                            <img src="${item.url}" alt="" class="" width="50" height="50">
                        </div>

                        <div class="text-box pr-5">
                            <h4 class="" style="font-size:20px">${item.name}</h4>
                            <span class="d-flex">
                                <p class="">${item.promo}</p>
                                <p class="old-price ms-3 text-decoration-line-through">
                                ${item.price}</p>
                            </span>

                            <div class="d-flex">
                                <p class="amount me-3">x${item.amount}</p>
                                <p class="">
                                    total :
                                    <b class="">${item.amount * item.price} VND</b>
                                </p>
                            </div>
                        </div>

                        <div class="quantity flex-grow-1 flex justify-content-end align-items-end">
                            <button class="btn-minus" data-index="${index}">-</button>
                            <input 
                                data-index="${index}"
                                type="number"
                                class="text-center input-amount"
                                maxlength="1"
                                minlength="1"
                                min="1"
                                max="99"
                                value="${item.amount}"
                            />
                            <button class="btn-plus" data-index="${index}">+</button>
                        </div>

                        <div>
                            <button class="btn-remove" data-index="${index}">
                                <i class="fa-solid fa-xmark"></i>
                            </button>  
                        </div>    
                    </div>`;
        $(".show-cart").append(html);
    });
    handlePayment();
}

var cartPage = [];

function pageCartPayment() {
    $(".show_cart_page").empty();
    var a = sessionStorage.getItem("cart");
    var cartPage = JSON.parse(a);
    var paymentCart = "";
    var subTotal = 0;

    if (cartPage != null) {

        cartPage.forEach((item,index) => {
            var html = `<div class="d-flex mb-3 show_cart_items">
                            <div class="show_cart_thum me-3 col-2 position-relative">
                                <img src="${item.url}" alt="" class="thum" width="100" height="100">
                            </div>
                        
                            <div class="show_cart_description pr-5 col-3 position-relative">
                                <span class="position-absolute top-50 start-50 translate-middle">
                                    <h4 class="mb-0" style="font-size:20px">${item.name}</h4>
                                    <p class="mb-0">${item.description}</p>
                                </span>
                            </div>
                            <div class="show_cart_price pr-5 col-2 position-relative">
                                <span class="position-absolute top-50 start-50 translate-middle">
                                    <p class="mb-0">${item.promo}đ</p>
                                    <p class="mb-0 old-price ms-3 text-decoration-line-through">${item.price}đ</p>
                                </span>
                            </div>
                            <div class="show_cart_quantity pr-5 col-2 position-relative">
                                <div class="quantity d-flex position-absolute top-50 start-50 translate-middle">
                                    <button class="btn-minus" data-index="${index}">-</button>
                                    <input 
                                        data-index="${index}"
                                        type="number"
                                        class="text-center input-amount"
                                        maxlength="1"
                                        minlength="1"
                                        min="1"
                                        max="99"
                                        value="${item.amount}"
                                    />
                                    <button class="btn-plus" data-index="${index}">+</button>
                                </div>
                            </div>
                            <div class="show_cart_total pr-5 col-2 position-relative">
                                <p class="d-flex number-item position-absolute top-50 start-50 translate-middle">
                                    <b class="amount me-3">x${item.amount}</b>
                                    <b class="">${item.amount * item.promo} đ</b>
                                </p>
                            </div>
                            <div class="show_cart_remove pr-5 col-1 position-relative">
                                <button class="btn-remove position-absolute top-50 start-50 translate-middle" data-index="${index}">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>  
                            </div>
                        </div>`;
            $(".show_cart_page").append(html);
        });

        $(".show_cart_page").on('click', '.btn-minus', function () {
            var i = $(this).data("index");
            cartPage[i].amount > 1 && (cartPage[i].amount = Number(cartPage[i].amount) - 1);
        });

        $(".show_cart_page").on('click', '.btn-plus', function () {
            var i = $(this).data("index");
            cartPage[i].amount < 99 && (cartPage[i].amount = Number(cartPage[i].amount) +1);
        });
        

        $(".show_cart_page").on("change", "input", function () {
            var i = $(this).data("index");
            var valInput = $(this).val();
            if(valInput < 1) {
                cartPage[i].amount = 1
            }

            if(valInput > 99) {
                cartPage[i].amount = 99
            }

            if(valInput >= 1 && valInput <= 99) {
                cartPage[i].amount = valInput;
            }
        }); 
    }
}
$(".show_cart_page").on('click', '.btn-remove', function () {
    var i = $(this).data("index");
    cartPage = cartPage.filter((e) => e.name != cartPage[i].name)

    // pageCartPayment();
});




//Calcul sub Total 
function handlePayment() {
    var subTotal = 0;
    var shipFee = 50000;
    var totalTax = 0;

    for (i = 0; i < cart.length; i++) {
        var total = cart[i].price * cart[i].amount;

        subTotal += total;
    }

    totalTax = subTotal * 0.1;
    totalPayment = subTotal + shipFee + subTotal * 0.1;
    $(".total-price").html(subTotal + ' đ');
    $(".tax").html(subTotal * 0.1 + ' đ');
    $(".ship-fee").html(shipFee + ' đ');
    $(".total-payment").html(totalPayment + ' đ');
    $(".payment_page_price").html(totalPayment + ' đ');
}

// Slide background image
var bgImg = $('.bg-img-slide');
var totalBgImg = bgImg.length;
var screenBgImg = $(window).innerWidth();
var totalWidth = screenBgImg * totalBgImg;
var indexBgImg = 0;

$('.main-slide').css({width: `${totalWidth}px`});

$('.carousel-control-prev').click(function () {
    if (indexBgImg > 0) {
        indexBgImg -= 1;
        $('.main-slide').css({ transform: `translateX(-${screenBgImg * indexBgImg}px)`});
    }
})

$('.carousel-control-next').click(function () {
    if (indexBgImg < totalBgImg - 1) {
        indexBgImg += 1;
        $('.main-slide').css({ transform: `translateX(-${screenBgImg * indexBgImg}px)`});
    }
})

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

//slide brand

