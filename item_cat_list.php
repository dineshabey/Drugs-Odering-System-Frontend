<?php
//require 'inc/dbc.php';
//require 'class/systemSetting.php';
require_once('./config/dbc.php');
require_once('./class/systemSetting.php');
$system = new setting();

$date = date("Y-m-d");
$time = date("h:i:sa");
?>



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

            /*Center website*/ 
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
            <!-- items -->
            <div class=" img_view_panel" >  
                <?php
                if (!isset($_GET["main_cat_id"]) && !isset($_GET["sub_cat_id"])) {
                    echo "Not Found POST data !";
                }


                $item_info_data = $system->prepareSelectQuery("SELECT
item_deatails.item_id,
item_deatails.item_name,
item_deatails.item_price,
item_deatails.item_image,
item_deatails.item_discount,
sub_cat.sub_cat_name,
main_cat.main_cat_name,
main_cat.main_cat_id,
sub_cat.sub_cat_id,
item_deatails.out_of_stock,
item_deatails.item_description
FROM
item_deatails
INNER JOIN sub_cat ON item_deatails.sub_cat_id = sub_cat.sub_cat_id
INNER JOIN main_cat ON sub_cat.main_cat_id = main_cat.main_cat_id
WHERE
item_deatails.img_status = '1' AND
item_deatails.item_view_status = '0' AND
sub_cat.main_cat_id = '{$_GET["main_cat_id"]}' AND
item_deatails.img_status = '1' AND
item_deatails.item_view_status = '0'
ORDER BY
item_deatails.sub_cat_id DESC
");

                if (!empty($item_info_data)) {
                    $item_out_put = '<div style="background:white"><section class=" " id="regular2" style=" padding-top:10px ;">';

                    foreach ($item_info_data as $val3) {

                        $main_cat_names = $val3['main_cat_name'];
                        $main_cat_id = $val3['main_cat_name'];
                        $sub_cat_name = $val3['sub_cat_name'];
                        $sub_cat_id = $val3['sub_cat_id'];
                        $item_name = $val3['item_name'];
                        $item_img = $val3['item_image'];
                        $item_price = $val3['item_price'];
                        $item_id = $val3['item_id'];
                        $out_of_stock = $val3['out_of_stock'];

                        $item_out_put .= '<div class="column cus_font">
                    <div class="content" align="middle">
                    <a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . ' ">
                    <img class="secial_item responsive card" align="middle" style="text-aling:center;  width:213px; height:213px;" src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"/>
                    <h3 style="text-align: center;">' . $item_name . '</h3>
                    <h3 style="text-align: center;">' . $main_cat_names . '</h3>
                    <h3 style="text-align: center; color:red;">LKR ' . $item_price . '</h3>
                        </a>';
                        if ($out_of_stock == '1') {
                            //STOCK OUT ================================
                            $item_out_put .= '<p style="color:red;">Stoke Out</p>';
                        } else {
                            $item_out_put .= '<p> <button type = "button" class = "btn btn-success" id = "add_to_cart_btn" data-item_price = "' . $item_price . '" value = ' . $item_id . '>Add to cart</button></p>';
                        }


                        $item_out_put .= '</div></div>';
                    }

                    $item_out_put .= '</div></section>';
                    echo $item_out_put;
                }
                ?>
            </div>
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

                //ONLOAD FUNCTION IMAGE MAIN CAT LOAD ------------------------------------------
                $(function () {
                    var sub_cat_id = "<?php echo $sub_cat_id = $_GET["sub_cat_id"]; ?>";
                    var main_cat_id = "<?php echo $sub_cat_id = $_GET["main_cat_id"]; ?>";

                    var sub_cats_id = parseInt(sub_cat_id);
                    var main_cats_id = parseInt(main_cat_id);

//                    if (!isNaN(sub_cats_id) || (main_cats_id)) {
//                        alert('one')
//                    } else {
//                        window.location.replace("index.php");
//
//                    }

//                    var sliderData = '';
//                    $.post("./loaddata.php", {action: 'load_slider_data_index_page'}, function (e) {
//                        if (e === undefined || e.length === 0 || e === null) {
//                            $('.img_view_panel').html("NO data Found ! ");
//                        } else {
//                            $('.img_view_panel').html(e);
//
//                        }
//                        //    chosenRefresh();
//                    });
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
