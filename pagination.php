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

        <!--AMAZING SLIDER SCRIPT START-->
        <!-- Insert to your webpage before the </head> -->
        <script src="sliderengine/jquery.js"></script>
        <script src="sliderengine/amazingslider.js"></script>
        <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

        <link rel="stylesheet"  href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php require_once('include/header.php'); ?>


        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


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

            <div class="sort_conditions">

                <div class="btn-group" style="margin-top:10px;margin-bottom:5px;">
                    <button type="button" id="recently_added"  class="btn btn-primary">Recently Added</button>
                    <button type="button" class="btn btn-primary">Lowest Price</button>
                    <button type="button" class="btn btn-primary">Highest Price</button>

                    <input type="hidden" id="main_cat"  value="<?php echo $_GET["main_cat_id"]; ?>">
                    <input type="hidden" id="sub_cat"  value="<?php echo $_GET["sub_cat_id"]; ?>">
                    <input type="hidden" id="page_id"  value="<?php echo $_GET["page"]; ?>">


                    <div class="btn-group"  >
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Sort By Category</button>
                               <ul class="dropdown-menu" role="menu">
                            <li><a href="all">All</a></li>
                            <li><a href="1">Multi Vitamin</a></li>
                            <li><a href="2">Later Vitamin</a></li>
                        </ul>
                    </div>

                </div>

            </div>


            <?php
            if (!isset($_GET["main_cat_id"]) && !isset($_GET["sub_cat_id"])) {
                echo "Not Found POST data !";
            }
            ?>


            <!-- items -->
            <div class=" img_view_panel"  id="img_view_panel">

            </div>
            <!--/ items -->

        </div>

    </div>
</div>

<div class="clearfix"> </div>
</div>

<!---->
<script src="./js/functions.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
            $(document).on('ready', function () {


                //ONLOAD FUNCTION IMAGE MAIN CAT LOAD ------------------------------------------
                $(function () {
                    var sub_cat_id = "<?php echo $sub_cat_id = $_GET["sub_cat_id"]; ?>";
                    var main_cat_id = "<?php echo $sub_cat_id = $_GET["main_cat_id"]; ?>";
                    var pages_id = "<?php echo $sub_cat_id = $_GET["page"]; ?>";
                    var sub_cats_id = parseInt(sub_cat_id);
                    var main_cats_id = parseInt(main_cat_id);
                    var page_id = parseInt(pages_id);
                });
            }); //ON LOAD FUCTION END
</script>

<!--<SLIDER SCRIPT END />////////////////////////////////////////////////////////-->

<!--FOTER DIV START ///////////////////////////////////////////////////////////-->
<div class="footer">
    <?php require_once('include/footer.php'); ?>
    <script type="text/javascript">



        $(document).on('ready', function () {

            var main_cats_id = $('#main_cat').val();
            var sub_cats_id = $('#sub_cat').val();
            var page_id = $('#page_id').val();

            load_items_with_pagination(main_cats_id, sub_cats_id, page_id);
            //  item_tot();
        });
        $('filter_res').change(function () {
            // load_filtered_categories();
        });
        $('#recently_added').click(function () {
            load_recent_items_with_pagination(main_cats_id, sub_cats_id, page_id);
        });

    </script>






</div>

<!--FOTER DIV END ///////////////////////////////////////////////////////////-->

</body>

</html>
