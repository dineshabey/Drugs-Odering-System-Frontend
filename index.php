<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <!--MAIN HEAD START -->
    <head>
        <?php require_once('include/header.php'); ?>

        <!--AMAZING SLIDER SCRIPT START-->
        <!-- Insert to your webpage before the </head> -->
        <script src="sliderengine/jquery.js"></script>
        <script src="sliderengine/amazingslider.js"></script>
        <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
        <script src="sliderengine/initslider-1.js"></script>
        <!--AMAZING SLIDER SCRIPT END-->

        <!--ITEM SLIDER CSS START////////////////////-->
        <!--<link rel="stylesheet" type="text/css" href="./slick/slick.css">-->
        <!--<link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">-->
        <style type="text/css">
            html, body {
                margin: 0;
                padding: 0;
            }

            * {
                box-sizing: border-box;
            }

            .slider {
                width: 95%;
                margin: 10px auto;

            }
            .slick-slide {
                margin: 0px 20px;
            }

            .slick-slide img {
                width: 110%;
            }

            .slick-prev:before, .slick-next:before {
                color: #09529b !important;
            }
            .slick-current {
                opacity: 1!important;
            }
            /*<!--ITEM SLIDER CSS   END////////////////////-->*/

            /*FEATURES ITEMS LIST CSS START*/
            * {
                box-sizing: border-box;
            }

            /*            body {
                            background-color: #f1f1f1;
                            padding: 20px;
                            font-family: Arial;
                        }*/

            /* Center website */
            .main {
                max-width: 1000px;
                margin: auto;
            }

            h1 {
                font-size: 50px;
                word-break: break-all;
            }

            .row {
                margin: 8px -16px;
            }

            /* Add padding BETWEEN each column (if you want) */
            .row,
            .row > .column {
                padding: 8px;
            }

            /* Create four equal columns that floats next to each other */
            .column {
                float: left;
                width: 25%;
            }

            /* Clear floats after rows */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* Content */
            .content {
                background-color: white;
                padding: 10px;
            }

            /* Responsive layout - makes a two column-layout instead of four columns */
            @media screen and (max-width: 900px) {
                .column {
                    width: 50%;
                }
            }

            /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
                .column {
                    width: 50%;
                }
            }

            /*FEATURES ITEMS LIST CSS   END*/

            /*CART CSS*/
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 2, 0.2);
                /*box-shadow: 0 4px 8px 0 rgb(134,136,173);*/
                max-width: 300px;
                margin: auto;
                text-align: center;
                font-family: arial;
            }

            .price {
                color: grey;
                font-size: 22px;
            }

            .card button {
                border: none;
                outline: 0;
                padding: 12px;
                color: white;
                background-color: #2cce22;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            .card button:hover {
                opacity: 0.7;
            }
            /*CART CSS*/


            /*special item width height css*/
            .secial_item{
                width:100%;
                heigh:210px;
            }
            /*special item width height css*/





        </style>
    </head>
    <!--MAIN HEAD END -->
    <body>

        <!--<script src='../../../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script src="../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>-->

        <!--MENU SCRIPT-->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
        <script type="text/javascript" src="jquery_menu/jquery.smartmenus.js"></script>
        <!--MENU SCRIPT-->

        <!--SLICK SLIDER-->
        <script src="./slick/slick.min.js" type="text/javascript" charset="utf-8"></script>

        <script type="text/javascript">
            $(function () {
                $('#main-menu').smartmenus({
                    subMenusSubOffsetX: 1,
                    subMenusSubOffsetY: -8
                });
            });
        </script>
        <!--sub header--////////////////////////////////////////////////////////>-->
        <div class="header">
            <?php require_once('include/coustomer_header.php'); ?>
            <!--<a href="navbar.php"></a>-->

        </div>


        <!---728x90--->

        <div class="container">
            <div class="row" style="padding-bottom: 1px; padding-top: 5px;">
                <!-- Insert to your webpage where you want to display the slider -->
                <!--<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;padding-left:0px; padding-right:10px;margin:0px auto 0px;">-->
                <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:95%;margin:0px auto 0px;">
                    <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                        <ul class="amazingslider-slides" style="display:none;">
                            <li><img src="amazing_slider_images/1.jpg" />
                            </li>
                            <li><img src="amazing_slider_images/2.png" />
                            </li>
                            <li><img src="amazing_slider_images/3.jpg" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



            <!-- Portfolio Gallery Grid -->
            <div class="row" style="background-color: #eaffd2;">

                <div class="column ">
                    <div class="content ">
                        <!--<img src="lights.jpg" alt="Lights" style="width:100%">-->
                        <img class="secial_item" src="images/special_item/10.jpg" alt=""/>
                        <h3 style="text-align: center;">Product Name</h3>
                        <p style="text-align: center;">Description ..</p>
                    </div>
                </div>
                <div class="column ">
                    <div class="content ">
                        <!--<img src="nature.jpg" alt="Nature" style="width:100%">-->
                        <img class="secial_item" src="images/special_item/2.jpg" alt=""/>
                        <h3 style="text-align: center;">Product Name</h3>
                        <p style="text-align: center;">Description ..</p>
                    </div>
                </div>
                <div class="column ">
                    <div class="content">
                        <!--<img src="mountains.jpg" alt="Mountains" style="width:100%">-->
                        <img class="secial_item" src="images/special_item/3.jpg" alt=""/>
                        <h3 style="text-align: center;">Product Name</h3>
                        <p style="text-align: center;">Description ..</p>

                    </div>
                </div>
                <div class="column ">
                    <div class="content">
                        <img class="secial_item" src="images/special_item/4.jpg" alt=""/>
                        <h3 style="text-align: center;">Product Name</h3>
                        <p style="text-align: center;">Description ..</p>
                    </div>
                </div>
                <div class="column ">
                    <div class="content ">
                        <!--<img src="mountains.jpg" alt="Mountains" style="width:100%">-->
                        <img class="secial_item" src="images/special_item/5.jpg" alt=""/>
                        <h3 style="text-align: center;">Product Name</h3>
                        <p style="text-align: center;">Description ..</p>
                    </div>
                </div>

                <div class="column ">
                    <div class="content ">
                        <!--<img src="mountains.jpg" alt="Mountains" style="width:100%">-->
                        <img class="secial_item" src="images/special_item/10.jpg" alt=""/>
                        <h3 style="text-align: center;">Product Name</h3>
                        <p style="text-align: center;">Description ..</p>
                    </div>
                </div>
                <div class="column ">
                    <div class="content ">
                        <!--<img src="mountains.jpg" alt="Mountains" style="width:100%">-->
                        <img class="secial_item" src="images/special_item/8.jpg" alt=""/>
                        <h3 style="text-align: center;">Product Name</h3>
                        <p style="text-align: center;">Description ..</p>
                    </div>
                </div>
                <div class="column ">
                    <div class="content ">
                        <!--<img src="mountains.jpg" alt="Mountains" style="width:100%">-->
                        <img class="secial_item" src="images/special_item/9.jpg" alt=""/>
                        <h3 style="text-align: center;">Product Name</h3>
                        <p style="text-align: center;">Description ..</p>
                    </div>
                </div>
                <div class="column ">
                    <div class="content ">
                        <!--<img src="mountains.jpg" alt="Mountains" style="width:100%">-->
                        <img class="secial_item" src="images/special_item/10.jpg" alt=""/>
                        <h3 style="text-align: center;">Product Name</h3>
                        <p style="text-align: center;">Description ..</p>
                    </div>
                </div>
            </div>



            <!-- End of body section HTML codes -->
            <!--ALL ITEM SLIDER START /////////////////////////////////////////3333333333333-->

            <div  class="img_view_panels" >     </div>
            <!--ALL ITEM SLIDER END /////////////////////////////////////////3333333333333-->


            <!-- wrapper -->
            <div class="wrapper" style="background-color: white;">
                <!--<h1>Our Stock</h1>-->
                <span hidden="">
                    <!--<i class="shopping-cart"></i>-->
                    <?php
                    if (!isset($_SESSION['cus_id'])) {
                        echo '<div class="cart"><a href="cart_item.php"><span class="shopping-cart"> </span></a><span style="font-weight: bold; background:#0000e6; font-size: large; color: #ffd700; border-radius: 32px 32px;" class="item_tot"> </span></div>';
                    } else {
                        echo '<div class="cart hidden" ><a href="cart_item.php"><span class=""> </span></a><span style="font-weight: bold; background:#0000e6; font-size: large; color: #ffd700; border-radius: 32px 32px;" class="item_tot"> </span></div>';
                    }
                    ?>
                </span>

                <div class="clear"></div>
                <!-- items -->
                <div class=" img_view_panel" >   </div>
                <!--/ items -->
            </div>

            <!--/ wrapper -->

            <!--<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>-->

            <!--NEW COUSTOMER ITEM SLIDER END /////////////////////////////////////////3333333333333-->

            <!---728x90--->
        </div>
    </div>

    <div class="clearfix"> </div>
</div>

<!---->
<script src="./js/functions.js" type="text/javascript" charset="utf-8"></script>

<!---728x90--->
<!--<SLIDER SCRIPT START />////////////////////////////////////////////////////////-->
<script src="./slick/slick.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
            $(document).on('ready', function () {
                setTimeout(function () {
//                    $(".regular").slick({
//                        dots: true,
//                        arrows: true,
//                        infinite: true,
//                        slidesToShow: 4,
//                        slidesToScroll: 3,
//                        lazyLoad: 'ondemand'
//                    });


//                    new script------------ -
                    $(".regular").slick({
                        // normal options...
                        dots: true,
                        infinite: true,
                        slidesToShow: 4,
                        slidesToScroll: 2,
                        mobileFirst: true,
                        responsive: [{
                                breakpoint: 1000,
                                settings: {
                                    slidesToShow: 4,
                                    infinite: true
                                }
                            }, {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                    infinite: true
                                }}, {
                                breakpoint: 550,
                                settings: {
                                    slidesToShow: 3,
                                    infinite: true
                                }}]
                    });
//                 new script-------------

                }, 2000);

//






                //ONLOAD FUNCTION IMAGE MAIN CAT LOAD ------------------------------------------
                $(function () {
                    var sliderData = '';
                    $.post("./loaddata.php", {action: 'load_slider_data_index_page'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            $('.img_view_panel').html("NO data Found ! ");
                        } else {
                            $('.img_view_panel').html(e);

                        }
                        //    chosenRefresh();
                    });
                });
                //ONLOAD FUNCTION IMAGE MAIN CAT LOAD ------------------------------------------
                $(function () {
                    var sliderData = '';
                    $.post("./loaddata.php", {action: 'load_special_items'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            $('.load_special_items').html("NO data Found ! ");
                        } else {
                            $('.load_special_items').html(e);

                        }
                        //    chosenRefresh();
                    });
                });





            }); //ON LOAD FUCTION END




</script>

<!--<SLIDER SCRIPT END />////////////////////////////////////////////////////////-->

<!--FOTER DIV START ///////////////////////////////////////////////////////////-->
<div class="footer">
    <?php require_once('include/footer.php'); ?>
    <script type="text/javascript">
        $(document).on('ready', function () {
            item_tot();
        });
//CART ADDED ITEM TOTAL ===========================================================
        function item_tot() {
            $.post("./loaddata.php", {action: 'item_total'}, function (e) {
                if (e === undefined || e.length === 0 || e === null) {
                    $('#').html("NO data Found ! ");
                } else {
                    var item_tot = (e['item_tot']);
                    var item_tot_price = (e['item_tot_price']);
                    $('.item_tot').html(item_tot);
                    $('.item_tot_price').html(item_tot_price);
//                    load_cart_item_list();
                }
                //    chosenRefresh();
            }, "json");
        }

        //ADD TO CART ANIMATION
        $(document).on('click', '.add-to', function () {
            var cart = $('.shopping-cart');
            var imgtodrag = $(this).parent('.item').find("img").eq(0);
            if (imgtodrag) {
                var imgclone = imgtodrag.clone()
                        .offset({
                            top: imgtodrag.offset().top,
                            left: imgtodrag.offset().left
                        })
                        .css({
                            'opacity': '0.5',
                            'position': 'absolute',
                            'height': '150px',
                            'width': '150px',
                            'z-index': '100'
                        })
                        .appendTo($('body'))
                        .animate({
                            'top': cart.offset().top + 10,
                            'left': cart.offset().left + 10,
                            'width': 75,
                            'height': 75
                        }, 1000, 'easeInOutExpo');

//                setTimeout(function () {
//                    cart.effect("shake", {
//                        times: 2
//                    }, 200);
//                }, 1500);

                imgclone.animate({
                    'width': 0,
                    'height': 0
                }, function () {
                    $(this).detach()
                });
            }
        });
//    <!--//ADD TO CART ANIMATION END-->

    </script>

</div>

<!--FOTER DIV END ///////////////////////////////////////////////////////////-->

</body>

</html>
