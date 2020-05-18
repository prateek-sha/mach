<?php
session_start();
require('header.php'); 
include("../admin/configure_user.php");
include("../admin/configure_manu.php");
include("configure_orders.php");
$kraya_manu = new Manufacture();
$kraya_user = new User();
$kraya_order = new Orders();

?>


 
    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center py-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <div class="row d-flex justify-content-center mt-2">
                            <div class="col-md-8">
                            <p><a href="search.php" class="btn btn-dark px-5 py-3 mt-3">Search Now</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="home-section" class="hero">
        <div class="home-slider js-fullheight owl-carousel">
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                        <div class="one-third order-md-last img js-fullheight" style="background-image:url(images/indexhome/pic2.jpg);">
                        </div>
                        <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">eCommerce Shop</span>
                                <div class="horizontal">
                                    <h3 class="vr" style="background-image: url(images/divider.jpg);">Stablished Since 2000</h3>
                                    <h1 class="mb-4 mt-3">Catch Your Own <br><span>Stylish &amp; Looking cover</span></h1>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when</p>

                                    <p><a href="#" class="btn btn-primary px-5 py-3 mt-3">Shop Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                        <div class="one-third order-md-last img js-fullheight" style="background-image:url(images/indexhome/pic1.jpg);">
                        </div>
                        <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading"> eCommerce Shop</span>
                                <div class="horizontal">
                                    <h3 class="vr" style="background-image: url(images/divider.jpg);">Best eCommerce Online Shop</h3>
                                    <h1 class="mb-4 mt-3">A Thouroughly <span>Tradtional</span> Style</h1>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when</p>

                                    <p><a href="#" class="btn btn-primary px-5 py-3 mt-3">Shop Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/pic3.jpg);">
                    <a href="https://www.youtube.com/watch?v=hQAHSlTtcmY" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a>
                </div> -->
                <div class="col-md-11 py-5 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section-bold mb-4 mt-md-5">
                        <div class="ml-md-0">
                            <h2 class="mb-4" style="text-align: center;">Better Way to Ship Your Products</h2>
                        </div>
                    </div>
                    <div class="pb-md-5">
                        <p>But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                        <div class="row ftco-services">
                            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services">
                                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                                        <span class="flaticon-002-recommended"></span>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="heading">Refund Policy</h3>
                                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services">
                                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                                        <span class="flaticon-001-box"></span>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="heading">Premium Packaging</h3>
                                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services">
                                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                                        <span class="flaticon-003-medal"></span>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="heading">Superior Quality</h3>
                                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Best in market</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/indexhome/pic1.jpg" alt="Colorlib Template">
                            <span class="status">30%</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="product-single.html" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/indexhome/pic2.jpg" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>$120.00</span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/indexhome/pic1.jpg" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>$120.00</span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/indexhome/pic1.jpg" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>$120.00</span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8 d-flex align-items-stretch">
                    <div class="img" style="background-image: url(images/indexhome/pic.jpg);"></div>
                </div>
                <div class="col-md-4 py-md-5 ftco-animate">
                    <div class="text py-3 py-md-5">
                        <h2 class="mb-4">New Collection 2019</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                        <p><a href="#" class="btn btn-white px-4 py-3">Shop now</a></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 order-md-last d-flex align-items-stretch">
                    <div class="img img-2" style="background-image: url(images/indexhome/wlc.jpg);"></div>
                </div>
                <div class="col-md-7 py-3 py-md-5 ftco-animate">
                    <div class="text text-2 py-md-5">
                        <h2 class="mb-4">New Collection 2019</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                        <p><a href="#" class="btn btn-white px-4 py-3">Shop now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/indexhome/pic1.jpg" alt="Colorlib Template">
                            <span class="status">30%</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/indexhome/pic2.jpg" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>$120.00</span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/indexhome/pic3.jpg" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>$120.00</span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/indexhome/pic1.jpg" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>$120.00</span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_6.jpg);">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="<?php echo $kraya_user->countData1() ?>">0</strong>
                                    <span>Total User</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="<?php echo $kraya_manu->countData1(); ?>">0</strong>
                                    <span>Total Manufactures</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="<?php echo $kraya_order->countData(); ?>">0</strong>
                                    <span>Total Orders</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate">
                    <h2 class="mb-4">Our satisfied customer says</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>

                          


<?php
  require('footer.php');
?>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn2");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>