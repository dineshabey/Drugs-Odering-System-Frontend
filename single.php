
<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <!--MAIN HEAD START -->
    <head> 
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
                width: 100%;
                margin: 10px auto;

            }

            .slick-slide {
                margin: 0px 20px;
            }

            .slick-slide img {
                width: 90%;
            }

            .slick-prev:before,
            .slick-next:before {
                color: green;
            }
            .slick-current {
                /*opacity: 1;*/

                opacity: 1!important;
            }

            /* If the screen size is 601px wide or more,set the font-size of <div> 25px  */
            @media screen and (min-width: 601px) {
                table {
                    font-size: 25px;
                }
            }
         
            /*--single--*/
            .images_1_of_2 {
                display: block;
                float: left;
                width: 42%;
            }

            /* If the screen size is 6991px wide or less, set the font-size of <div> to 30px */
            @media(max-width:991px){
                .images_1_of_2 {
                    width: 100% !important;
                }
            }
            
        </style>
        <!--/*IMAGE SLIDER CSS   END //////////////////////////////////////////*/--> 
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
                <div class="" style="padding-top: 100px;">
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
                                <div class="left-n ">$329.58</div>
                                <a class="now-get get-cart-in" href="#">ADD TO CART</a> 
                                <div class="clearfix"></div>
                            </div>
                            <div>
                                <span class="border">
                                    <ul style="font-weight: 100;font-size: 21px; color: #777fa5;"><li class="mb-3">
                                        </li><li class="mb-3">
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
                    <div class="col-lg-5">
                        <div class="video-responsive" id="img_vdo">
<!--                                    <iframe width="420" height="315" src="https://www.youtube.com/embed/NIeFXPGS7-A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            -->
                        </div>
                    </div>
                    <!--IMAGE VIDEO ///////////////////////////////////////////////////////////////////////////////////////-->
                    <div class="col-lg-7 desc1 span_3_of_2 inset" >
                        <h3 class="m_3">About Item</h3>
                        <p class="m_text " id="item_description">
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            <div style="padding-bottom:10px; " > 
                <h2 style="color:#6969ab;">Related Items</h2>
            </div>


            <!--SLIDER DIV START///////////////////////////////////////////////////////////////////////////////////////////////-->
            <section class="regular slider" style="background-color: #FFD700; padding-top:10px ;">
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
                        dots: true,
                        arrows: true,
                        infinite: true,
                        slidesToShow: 5,
                        slidesToScroll: 3,
                        lazyLoad: 'ondemand',
                        autoplay: true,
                        autoplaySpeed: 2000

                    });

                }, 1000);
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
                            sliderData += '<div ><img  onClick="sendimg(this); id="" class="img-responsive" width="60px" src="../drugs_ordering_system_backend/uploads/' + qData.item_image + '"></div>';
                            sliderData += '<div>' + qData.item_name + '<br>' + qData.item_price + '<br>  <input type="button"  class="btn btn-primary" style="background-color:#ad9936;" onclick="myFunction(' + qData.item_id + ')" value="Deatails"  id="img_select"></button></div>';
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
                    var item_discount = (e[0]['item_discount']);
                    var item_name = (e[0]['item_name']);
                    var item_description = (e[0]['item_description']);
//=====================================================================
                    var price = '<div>' + item_price + '</div>';
                    var img_data = '<div><img style=" height:400px;" src="../drugs_ordering_system_backend/uploads/' + image + '" data-imagezoom="true" class="img-responsive"></div>';
                    var vdo = '<div>' + vdo + '</div>';
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
                    var item_price = (e[0]['item_price']);
                    var vdo = (e[0]['item_video']);
                    var item_discount = (e[0]['item_discount']);
                    var item_name = (e[0]['item_name']);
                    var item_description = (e[0]['item_description']);
//=====================================================================
                    var price = '<div>' + item_price + '</div>';
                    var img_data = '<div><img style=" height:400px;" src="../drugs_ordering_system_backend/uploads/' + image + '" data-imagezoom="true" class="img-responsive"></div>';
                    var vdo = '<div>' + vdo + '</div>';
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

