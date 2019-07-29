
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

            
            .slick-slide {
   height:600px;
}

.slick-slide img {
   height:600px;
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
            <?php require_once('include/coustomer_header.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->

        <div class="container" > 
            <div class="row col-lg-12">
                <div class="" style="padding-top: 100px;">
                    <div class="single_grid">
                        <div class="grid images_3_of_2">
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
                                <!-- //FlexSlider-->
                                <ul class="slides" >
                                    <li data-thumb="images/s4.jpg">
                                        <div class="thumb-image"> <img style=" height:350px; " src="vitamin_image/8.jpg" data-imagezoom="true" class="img-responsive"> </div>
                                    </li>

                                </ul>
                            </div>	
                        </div> 
                        <div class="desc1 span_3_of_2">


                            <h4>Vitamin - A</h4>
                            <div class="cart-b">
                                <div class="left-n ">$329.58</div>
                                <a class="now-get get-cart-in" href="#">ADD TO CART</a> 
                                <div class="clearfix"></div>
                            </div>
                            <div>
                                <span class="border">
                                    <ul style="font-weight: 100;font-size: 21px; color: #777fa5;"><li class="mb-3">
                                            Price :  1800.00
                                        </li><li class="mb-3">
                                            Accepted Currency : LKR 
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

                    <div class="row">
                        <div class="toogle">
                            <div class="col-lg-5">
                                <div class="video-responsive">
                                    <iframe width="420" height="315" src="https://www.youtube.com/embed/NIeFXPGS7-A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-7 desc1 span_3_of_2 inset" >
                                <h3 class="m_3">About Item</h3>
                                <p class="m_text ">
                                    Vitamin A is a group of unsaturated nutritional organic compounds that includes retinol, retinal, retinoic acid, and several provitamin A carotenoids (most notably beta-carotene). Vitamin A has multiple functions: it is important for growth and development, for the maintenance of the immune system and good vision.
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div style="padding-bottom:10px; text-align:center;" > 
                        <h2 style="color:#6969ab;">Related Items</h2>
                    </div>


                    <?php
//                    include("./inc/dbc.php");
//                    include("./inc/commen_functions.php");
//                    $settings = new settings();
//
//                    $category = $settings->prepareSelectQuery("SELECT
//                                            sub_cat.sub_cat_id,
//                                            sub_cat.main_cat_id,
//                                            sub_cat.sub_cat_name,
//                                            sub_cat.view_status,
//                                            main_cat.main_cat_name,
//                                            main_cat.view_status,
//                                            item_deatails.item_name,
//                                            item_deatails.item_description,
//                                            item_deatails.item_id,
//                                            item_deatails.item_price,
//                                            item_deatails.item_image
//                                            FROM
//                                            sub_cat
//                                            INNER JOIN main_cat ON sub_cat.main_cat_id = main_cat.main_cat_id
//                                            INNER JOIN item_deatails ON item_deatails.sub_cat_id = sub_cat.sub_cat_id
//                    ");
                    ?>
                    <section class="regular slider">
<!--                        <div>
                            <img src="vitamin_image/8.jpg">
                        </div>
                        <div>
                            <img src="vitamin_image/6.jpg">
                        </div>
                        <div>
                            <img src="vitamin_image/5.jpg">
                        </div>
                        <div>
                            <img src="vitamin_image/4.jpg">
                        </div>-->
                    </section>


                    <!--                    <ul id="flexiselDemo1">
                                            <li><img src="vitamin_image/8.jpg"  style=" height:200px; "/><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
                                            <li><img src="vitamin_image/6.jpg" style=" height:200px;" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
                                            <li><img src="vitamin_image/5.jpg"  style=" height:200px;" /><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li>
                                            <li><img src="vitamin_image/4.jpg"  style=" height:200px;" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
                                            <li><img src="images/pi4.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
                                        </ul>-->
                    <script type="text/javascript">

                $(function(){
                        $(document).on('ready', function () {
                        load_slider(3);
                               
                              setTimeout(function(){ $(".regular").slick({
                                       dots: true,
                                       infinite: true,
                                       slidesToShow: 3,
                                       slidesToScroll: 3
                                   });
 
                               }, 2000);
                               });
                        });


                        function load_slider(category) {
                            var sliderData = '';
                            
                            $.post("./loaddata.php", {action: 'load_slider_data',category:category}, function (e) {
//                            $.post("./loaddata.php", {action: 'load_slider_data'}, function (e) {

                                if (e === undefined || e.length === 0 || e === null) {
                                    sliderData += '<div><img src="" /></div>';
                                    $('.regular').html('').append(sliderData);
                                    //    chosenRefresh();
                                } else {

                                    $.each(e, function (index, qData) {
                                        if (e !== null || e.length !== 0) {
                                            sliderData += '<div><img src=' + qData.item_image + ' /></div>';
                                        }
                                    });
                                    $('.regular').html('').append(sliderData);
                                    //    chosenRefresh();
                                }
                            }, "json");
                        }

//                        $(window).load(function () {
//                            $("#flexiselDemo1").flexisel({
//                                visibleItems: 5,
//                                animationSpeed: 1000,
//                                autoPlay: true,
//                                autoPlaySpeed: 3000,
//                                pauseOnHover: true,
//                                enableResponsiveBreakpoints: true,
//                                responsiveBreakpoints: {
//                                    portrait: {
//                                        changePoint: 480,
//                                        visibleItems: 1
//                                    },
//                                    landscape: {
//                                        changePoint: 640,
//                                        visibleItems: 2
//                                    },
//                                    tablet: {
//                                        changePoint: 768,
//                                        visibleItems: 3
//                                    }
//                                }
//                            });
//
//                        });
                    </script>
                    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
                    <!---728x90--->

                </div>


                <div class="clearfix"> </div>			
            </div>
        </div>
        <!---->
        <!---728x90--->

        <div class="footer">
            <!--FOOTER--////////////////////////////////////////////////////////>-->
            <div class="header">
                <?php require_once('include/footer.php'); ?>
            </div>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>

