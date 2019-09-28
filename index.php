<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <!--MAIN HEAD START -->
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
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
                height: 200px;
            }

            * {
                box-sizing: border-box;
            }

            .slider {
                width: 100%;
                margin: 10px auto;

            }
            .slick-slide {
                margin: 1px 10px;
            }

            .slick-slide img {
                width: 100%;
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
            @media screen and (max-width: 450px) {

                .column.cus_font.product-all-sec-wrapper .product-det-content-wrapper {
                    font-size: 35px;
                }

            }
            /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
                .column {
                    width: 50%;
                }

                .column.cus_font.product-all-sec-wrapper .product-det-content-wrapper {
                    font-size: 35px;
                }
                .table_font_size {
                    font-size: 35px;
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
                padding: 6px;
                /*color: #7dff1e;*/
                color: white;
                background-color: #141c54d9;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 24px;
                font-weight: 700;

            }

            .card button:hover {
                opacity: 0.7;
            }

            .view_all_itm{

                padding: 1px;
                background: white;
                text-align: right;
                color: #0f0f10;
                font-size: 23px;
                font-weight: 700;
            }

            /*CART CSS*/
            /*special item width height css*/
            .secial_item{
                width:100%;
                heigh:210px;
            }
            /*special item width height css*/
            .cus_font{
                font-size: 24px;
                color: #1e2c9c;
                font-style: normal;
                font-family:Trebuchet MS, sans-serif ;
                font-weight: 900;
                /*text-decoration:underline !important;*/
            }
            a{
                text-decoration:none !important;
            }

            /*//CUS HEADER CSS ///////////////////////////////////*/
            /*BORDER COLOR IMAGE SLIDER*/ 
            .boder_img{
                border-style: solid;
                border-color: #fff;
                border-width: 1px;
            }
            /*BORDER COLOR IMAGE SLIDER*/

            .ui-autocomplete-custom {
                background: #ccc !important;
                z-index: 2;
            }


            /*ADD TO CART CSS START =============================================*/

            .body {
                overflow: hidden;
            }
            .wrapper {
                max-width: 1520px;
                /*height: 880px;*/
                margin: 20px auto ;
                padding: 20px;
                background-color: #f5f5f5;
                width: 100%;
            }
            h1 {
                display: inline-block;
                background-color: #333;
                color: #fff;
                font-size: 20px;
                font-weight: normal;
                text-transform: uppercase;
                padding: 4px 20px;
                float: left;
            }
            @media all and (max-width: 1200px) and (min-width: 800px) {
                /* Change Resolutions Here */
                h5 {
                    font-size: 12px;
                }
            }

            /*img*/
            img
            {
                max-width: 100%;
                min-width: 40px;;
                height: auto;
            }

            .clear {
                clear: both;
            }
            .items {
                display: block;
                margin: 20px 0;
            }
            /*//CUS HEADER CSS ///////////////////////////////////*/


        </style>
    </head>
    <!--MAIN HEAD END -->
    <body>
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
            <?php require_once('header2.php'); ?>
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

            <!-- LOAD FEATURED ITEMS START-->
            <div class="row load_featured_items " style="background-color: white;" > </div>
            <!-- LOAD FEATURED ITEMS END -->


            <!-- LOAD FEATURED ITEMS START-->
            <div class="row load_item_cat " style="background-color: white;" hidden=""> </div>
            <!-- LOAD FEATURED ITEMS END -->

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
        </div>


        <div class="clearfix"> </div>


        <!---->
        <!--<script src="./js/functions.js" type="text/javascript" charset="utf-8"></script>-->

        <div class="footer">
            <?php require_once('include/footer.php'); ?>
        </div>

        <script type="text/javascript">
            $(document).on('ready', function () {
                setTimeout(function () {
                    $(".regular").slick({
                        // normal options...
                        //                        dots: true,
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
                                    slidesToShow: 2,
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
                //LOAD FEATURED ITEMS  ------------------------------------------
                $(function () {
                    var sliderData = '';
                    $.post("./loaddata.php", {action: 'load_featured_items'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            $('.load_featured_items').html("NO data Found ! ");
                        } else {
                            $('.load_featured_items').html(e);

                        }
                        //    chosenRefresh();
                    });
                });
                //LOAD ITEM CATEGORY ------------------------------------------
                $(function () {
                    var sliderData = '';
                    $.post("./loaddata.php", {action: 'load_item_cat'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            $('.load_item_cat').html("NO data Found ! ");
                        } else {
                            $('.load_item_cat').html(e);

                        }
                        //    chosenRefresh();
                    });
                });

            });


            //ADD TO CART ANIMATION --------------------------------------------
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


        <!--FOTER DIV END ///////////////////////////////////////////////////////////-->
    </head>
</body>

</html>
