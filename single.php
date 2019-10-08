<?php
session_start();
if (!isset($_GET["item_id"]) && !isset($_GET["sub_cat_id"])) {
    echo "<script>location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

    <!--MAIN HEAD START -->
    <head> 
        <meta http-equiv="content-type" cZontent="text/html;charset=UTF-8" />
        <?php require_once('include/header.php'); ?>

        <!--CSS PART ///////////////////////////////////////////////-->
        <style type="text/css">
            /*UL RIHT MARK STYLE*/
            /*.inset {border-style: inset;}*/
            .inset {border-style: ridge;}
            /*<!--UL RIHT MARK STYLE-->*/


            /*RESPONSIVE VEDIOO//////////////////////////////////////////*/
            .video-responsive{
                overflow:hidden;
                padding-bottom:56.25%;
                position:relative;
                height:0;
            }
            .video-responsive iframe{
                left:0;
                top:0;
                height:100%;
                width:100%;
                position:absolute;
            }
            /*RESPONSIVE VEDIOO//////////////////////////////////////////*/ 

            /*IMAGE SLIDER CSS START //////////////////////////////////////////*/ 

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
                width: 100%;
            }

            .slick-prev:before,
            .slick-next:before {
                color: green;
            }
            .slick-current {
                /*opacity: 1;*/

                opacity: 1!important;
            }

            /*--single--*/
            .images_1_of_2 {
                display: block;
                float: left;
                width: 42%;
            }
            /*<!--IMAGE SLIDER CSS   END //////////////////////////////////////////-->*/ 

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

                .img_div_center{
                    text-align: center;
                }

            }

        </style>
        <!--CSS PART ///////////////////////////////////////////////-->

    </head>

    <body>
        <!--MENU SCRIPT-->
               <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
        <script type="text/javascript" src="jquery_menu/jquery.smartmenus.js"></script>
        <script src="./slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
        <!--MENU SCRIPT-->

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
            <?php // require_once('include/coustomer_header.php'); ?>
            <?php require_once('header2.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->

        <div class="container" > 
            <div class="row col-lg-12">
                <div class="" style="padding-top: 10px;">
                    <h3 style="text-align: center;"><a href="index.php"><span style="border: 1px solid blue;"> HOME </span></a> >><span>Item Details</span></h3><hr>
                    <div class="single_grid">
                        <div class="grid images_1_of_2">
                            <!--<div class="grid images_3_of_2">-->
                            <div class="flexslider">
                                <!-- FlexSlider -->
                                <script src="js/imagezoom.js"></script>
                                <script defer src="js/jquery.flexslider.js"></script>
                                <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

                                <script>
            // Can also be used with $(document).ready()
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
                                </script>
                                <!-- //FlexSlider SELECTED ITEM START/////////////////////////////////////////////////////////////-->
                                <ul class="slides "  >
                                    <li data-thumb="images/si4.jpg">
                                        <div class="thumb-image selected_img" id="selected_img"> 
                                            <img style=" height:350px; " src="vitamin_image/8.jpg" data-imagezoom="true" class="img-responsive"> 
                                        </div>
                                    </li>

                                </ul>
                                <!-- //FlexSlider SELECTED ITEM IMG END/////////////////////////////////////////////////////////////-->
                            </div>	
                        </div> 
                        <div class=" span_3_of_2">
                            <!--<div class="desc1 span_3_of_2">-->

                            <!--<h4>Vitamin - A</h4>-->
                            <div class="cart-b">
                                <div class="left-n "></div>


                                <?php
                                $item_price = $_GET['item_price'];
                                $item_id = $_GET['item_id'];
                                if (($_GET['out_of_stock']) == '1') {
                                    //STOCK OUT ================================
                                    echo '<p class="table_font_size" style="color:red; font-weight: 600;">Stoke Out</p>';
                                } else {
                                    echo '<button type = "button" class="btn btn-success now-get get-cart-in table_font_size" id = "add_to_cart_btn" data-item_price = ' . $item_price . ' value = ' . $item_id . '> Add to cart</button>';
                                }
                                ?>


                                <!--<a class="now-get get-cart-in" href="#">ADD TO CART</a>--> 
                                <div class="clearfix"></div>
                            </div>
                            <div>
                                <span class="border">
                                    <ul class="" style="font-weight: 100;font-size: 21px; color: #777fa5; "><li class="mb-3">
                                        </li><li class="table_font_size">
                                            <div><h3> Item Name : <label id="item_name"></label></h3></div>
                                        </li>
                                        <div><h3> Item Price : <label id="price"></label></h3></div>
                                    </li><li class="mb-3">
                                    <div><h3> Item Discount : <label id="discount"></label></h3></div>
                                </li>
                                <li class="mb-3">
                                    Payment :  Cash on Delivery Eligible.
                                </li>
                                <li class="mb-3">
                                    Delivery : Island wild.
                                </li>
                                <li class="mb-3">
                                    Delivery Charge: Free.
                                </li>
                                <li class="mb-3">
                                    Quality : Best.
                                </li>

                            </ul>
                        </span>
                    </div>


                </div>
                <div class="clearfix"> </div>
            </div>
            <!--IMAGE VIDEO ///////////////////////////////////////////////////////////////////////////////////////-->
            <div class="row" id="">
                <div class="toogle">
                    <div class="col-lg-5" id="vdo_panel">
                        <div class="video-responsive" id="img_vdo">
<!--                                    <iframe width="420" height="315" src="https://www.youtube.com/embed/NIeFXPGS7-A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            -->
                        </div>
                    </div>
                    <!--IMAGE VIDEO ///////////////////////////////////////////////////////////////////////////////////////-->
                    <div class="col-lg-7  span_3_of_2 inset table_font_size" >
                        <h3 class="">About Item</h3>
                        <p class="table_font_size" id="item_description" style="color: black; font-weight: bold; background:#42ff6208; ">  </p>
                    </div>
                </div>
            </div>
            <hr>
            <div style="padding-bottom:10px; " > 
                <h2 style="color:#6969ab; text-align: center;">Related Items</h2>
            </div>


            <!--SLIDER DIV START///////////////////////////////////////////////////////////////////////////////////////////////-->
            <section class="regular slider" style="background-color: ; padding-top:10px ;">
                <?php
                if (!isset($_GET["item_id"]) && !isset($_GET["sub_cat_id"])) {
                    echo "Not Found POST data !";
                }
                ?>
            </section>
            <!--SLIDER DIV END///////////////////////////////////////////////////////////////////////////////////////////////-->


        </div>


        <div class="clearfix"> </div>			
    </div>
</div>
<!---->
<!---728x90--->

<div class="footer">

    <script type="text/javascript">

        $(function () {
            $(document).on('ready', function () {
//SLICK SLIDER FUCTION START/////////////////////////////////////////
                setTimeout(function () {
                    $(".regular").slick({
                        // normal options...
                        autoplay: true,
                        autoplaySpeed: 2000,
                        infinite: true,
                        slidesToShow: 4,
                        slidesToScroll: 3,
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
                                    slidesToShow: 3,
                                    infinite: true
                                }}, {
                                breakpoint: 550,
                                settings: {
                                    slidesToShow: 3,
                                    infinite: true
                                }}]
                    });
                    //                 new script-------------

                }, 1000);
//                setTimeout(function () {
//                    $(".regular").slick({
//                        dots: true,
//                        arrows: true,
//                        infinite: true,
//                        slidesToShow: 5,
//                        slidesToScroll: 3,
//                        lazyLoad: 'ondemand',
//                        autoplay: true,
//                        autoplaySpeed: 2000
//
//                    });
//
//                }, 1000);
            });
//SLICK SLIDER FUCTION END/////////////////////////////////////////
            //ONLOAD FUCTION =======================================
            load_slider(3);
            single_page_selected_item();
        });
        //LOAD SLIDER FUNCTION START=========================================================
        function load_slider(category) {
            var sub_cat_id = "<?php echo $sub_cat_id = $_GET["sub_cat_id"]; ?>";
            var sliderData = '';
            $.post("./loaddata.php", {action: 'single_page_lode_slider', category: category, sub_cat_id: sub_cat_id}, function (e) {
                if (e === undefined || e.length === 0 || e === null) {
                    sliderData += '<div><img src="" /></div>';
                    $('.regular').html('').append(sliderData);
                    //    chosenRefresh();
                } else {
                    $.each(e, function (index, qData) {
                        if (e !== null || e.length !== 0) {
//                            sliderData += '<div class="img_div_center" style="font-size:20px; text-aling:center;">\n\
//                            <a href="single.php?item_id=' + qData.item_id + '&sub_cat_id=' + qData.sub_cat_id + '&item_price=' + qData.item_price + '&out_of_stock=' + qData.out_of_stock + ' ">\n\
//                            <img  id="" class="img-responsive img_div_center" width="" src="../drugs_ordering_system_backend/uploads/' + qData.item_image + '"></a>\n\
//                            <div class="cus_boder_for_item_deatails" style="text-align: center;"><h3>' + qData.item_name + '</h3><h3>LKR :' + qData.item_price + '</h3></div></div>';
//                       
                            sliderData += '<div class="column cus_font product-all-sec-wrapper"> <div class="content" align="middle">\n\
                            <a href="single.php?item_id=' + qData.item_id + '&sub_cat_id=' + qData.sub_cat_id + '&item_price=' + qData.item_price + '&out_of_stock=' + qData.out_of_stock + ' ">\n\
                            <img  id="" class="img-responsive img_div_center" width="" src="../drugs_ordering_system_backend/uploads/' + qData.item_image + '"></a>\n\
                            <div class="cus_boder_for_item_deatails" style="text-align: center;">\n\
<a href="single.php?item_id=' + qData.item_id + '&sub_cat_id=' + qData.sub_cat_id + '&item_price=' + qData.item_price + '&out_of_stock=' + qData.out_of_stock + ' "><h3 class="product-det-content-wrapper" style="text-align: center; ">' + qData.item_name + '</h3><h3 class="product-det-content-wrapper" style="text-align: center; font-weight: 600;">LKR :' + qData.item_price + '</h3></a></div></div></div>';

                        }
                    });
                    $('.regular').html('').append(sliderData);
                    //    chosenRefresh();
                }
            }, "json");
        }
        //LOAD SLIDER FUNCTION END=========================================================

        //ON LOAD SELECTED ITEM FUNCTION START=========================================================
        function single_page_selected_item(item_id) {
            var item_id = "<?php echo $sub_cat_id = $_GET["item_id"]; ?>";
            var sliderData = '';
            $.post("./loaddata.php", {action: 'single_page_selected_item', item_id: item_id}, function (e) {
                if (e === undefined || e.length === 0 || e === null) {
                    sliderData += '<div><img src="" /></div>';
                    $('.selected_img').html('').append(sliderData);
                    //    chosenRefresh();
                } else {
//=====================================================================
                    var image = (e[0]['item_image']);
                    var item_price = (e[0]['item_price']);
                    var vdo = (e[0]['item_video']);
                    var vdo_status = (e[0]['vdo_status']);
                    var item_discount = (e[0]['item_discount']);
                    var item_name = (e[0]['item_name']);
                    var item_description = (e[0]['item_description']);
//=====================================================================
                    var price = '<div>' + item_price + '</div>';
                    var img_data = '<div style="text-aling:center;"><img align="middle" style="text-aling:center;  width:325px;" class="img-responsive center" src="../drugs_ordering_system_backend/uploads/' + image + '" data-imagezoom="true" ></div>';
                    var vdo = '<div>' + vdo + '</div>';
                    if (vdo_status == '0') {
                        $('#vdo_panel').hide();
                    } else {
                        var vdo = '<div>' + vdo + '</div>';
                    }
//=====================================================================
                    $('.selected_img').html('').append(img_data);
                    $('#price').html('').append(price);
                    $('#discount').html('').append(item_discount);
                    $('#img_vdo').html('').append(vdo);
                    $('#item_name').html('').append(item_name);
                    $('#item_description').html('').append(item_description);
                    $.each(e, function (index, qData) {
                        if (e !== null || e.length !== 0) {
//                                    sliderData += '<div><img style=" height:400px;" src="../drugs_ordering_system_backend/uploads/' + qData.item_image + '" data-imagezoom="true" class="img-responsive"></div>';

                        }
                    });
//                            $('.selected_img').html('').append(sliderData);
                    //    chosenRefresh();
                }
            }, "json");
        }
        //LOAD SELECTED ITEM FUNCTION END=========================================================
        //ON CLICK SELECTED ITEM FUNCTION START=========================================================
        function single_page_selected_onclick_item(item_id) {

            var sliderData = '';
            $.post("./loaddata.php", {action: 'single_page_selected_item', item_id: item_id}, function (e) {
                if (e === undefined || e.length === 0 || e === null) {
                    sliderData += '<div><img src="" /></div>';
                    $('.selected_img').html('').append(sliderData);
                    //    chosenRefresh();
                } else {
//=====================================================================
                    var image = (e[0]['item_image']);
                    var vdo_status = (e[0]['vdo_status']);
                    var item_price = (e[0]['item_price']);
                    var vdo = (e[0]['item_video']);
                    var item_discount = (e[0]['item_discount']);
                    var item_name = (e[0]['item_name']);
                    var item_description = (e[0]['item_description']);
//=====================================================================
                    var price = '<div>' + item_price + '</div>';
                    var img_data = '<div class="column cus_font product-all-sec-wrapper><img style=" height:400px;" src="../drugs_ordering_system_backend/uploads/' + image + '" data-imagezoom="true" class="img-responsive"></div>';
                    if (vdo_status == '0') {
                        $('#vdo_panel').hide();
                    } else {
                        var vdo = '<div>' + vdo + '</div>';
                    }

//=====================================================================
                    $('.selected_img').html('').append(img_data);
                    $('#price').html('').append(price);
                    $('#discount').html('').append(item_discount);
                    $('#img_vdo').html('').append(vdo);
                    $('#item_name').html('').append(item_name);
                    $('#item_description').html('').append(item_description);
                    $.each(e, function (index, qData) {
                        if (e !== null || e.length !== 0) {
//                                    sliderData += '<div><img style=" height:400px;" src="../drugs_ordering_system_backend/uploads/' + qData.item_image + '" data-imagezoom="true" class="img-responsive"></div>';

                        }
                    });
//                            $('.selected_img').html('').append(sliderData);
                    //    chosenRefresh();
                }
            }, "json");
        }
        //LOAD SELECTED ITEM FUNCTION END=========================================================

//START ONCLICK FUNCTION IMG SLIDESHOW============================================
        function  myFunction(id) {
            single_page_selected_onclick_item(id);
        }
//img_select
//END   ONCLICK FUNCTION IMG SLIDESHOW============================================


    </script>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    <!---728x90--->



    <!--FOOTER--////////////////////////////////////////////////////////>-->
    <div class="header">
        <?php require_once('include/footer.php'); ?>
    </div>

    <!--FOOTER-- end////////////////////////////////////////////////////>-->
</div>
</body>
</html>

