<?php
session_start();

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
    <!--MAIN HEAD START -->
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <?php require_once('include/header.php'); ?>
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
                .btn_size {
                    font-size: 22px;
                    text-align: center;
                }

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


        <!--          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

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
            <h3 style="text-align: center;"><a href="index.php"><span style="border: 1px solid blue; "> HOME </span></a> >><span>Item Category </span></h3><hr>
            <div class="sort_conditions" style="border: 1px solid #ddd; margin: 1.5em 0; padding: 0.5em 1em; background:white; text-align: center;">

                <div class="btn-group" style="margin-top:10px;margin-bottom:15px;"> 
                    <a type="button" class="btn btn-outline-info cat_name" href=""></a>
                </div>
                <!--<div class="btn-group" style="margin-top:10ps;margin-bottom:5px;">-->
                <div class="btn-group" style="margin-top:10ps;margin-bottom:5px;">
                    <button type="button" class="btn btn-primary btn_size">Recently Added</button>
                    <button type="button" class="btn btn-primary btn_size">Lowest Price</button>
                    <button type="button" class="btn btn-primary btn_size">Highest Price</button>
                    <div class="btn-group mr-2" role="group" aria-label="Second group btn_size" >
                        <button type="button" class="btn btn-primary dropdown-toggle btn_size" data-toggle="dropdown">
                            Sort By Category <span class="caret"></span></button>
                        <ul class="dropdown-menu btn_size" role="menu" >
                            <li><a href="all">All</a></li>
                            <li><a href="#">Multi Vitamin</a></li>
                            <li><a href="#">Later Vitamin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- items -->
            <div class=" img_view_panel" >
                <?php
                if (!isset($_GET["main_cat_id"]) && !isset($_GET["sub_cat_id"])) {
                    echo "Not Found POST data !";
                }
                $item_query = "SELECT
item_deatails.item_id,
item_deatails.item_name,
item_deatails.item_price,
item_deatails.item_image,
item_deatails.item_discount,
item_deatails.item_old_price,
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
item_deatails.img_status = '1'
ORDER BY
item_deatails.sub_cat_id DESC
";

                $main_cat = $_GET["main_cat_id"];
                $sub_cat = $_GET["sub_cat_id"];

                $item_info_data = $system->prepareSelectQuery($item_query);
                $item_count = $system->getCountByQuery($item_query);


// Return the number of rows in result set
                $total = $item_count;

                // How many items to list per page
                $limit = 8;

                // How many pages will there be
                $pages = ceil($total / $limit);


                // What page are we currently on?
                $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                    'options' => array(
                        'default' => 1,
                        'min_range' => 1,
                    ),
                )));

                // Calculate the offset for the query
                $offset = ($page - 1) * $limit;

                // Some information to display to the user
                $start = $offset + 1;
                $end = min(($offset + $limit), $total);

                // The "back" link
                $prevlink = ($page > 1) ? '<a href="?page=1" title="First page" >&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

                // The "forward" link
                $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

                // Display the paging information
                echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

                if (!empty($item_info_data)) {

                    $pg = count($item_info_data) / 8;

                    $cols = array_chunk($item_info_data, ceil(count($item_info_data) / $pg));


                    // print_r($cols[0]);exit;

                    $item_out_put = '<div style="background:white"><section class=" " id="regular2" style=" padding-top:10px ;">';

                    foreach ($cols[$page - 1] as $val3) {

                        $main_cat_names = $val3['main_cat_name'];
                        $main_cat_id = $val3['main_cat_name'];
                        $sub_cat_name = $val3['sub_cat_name'];
                        $sub_cat_id = $val3['sub_cat_id'];
                        $item_name = $val3['item_name'];
                        $item_img = $val3['item_image'];
                        $item_price = $val3['item_price'];
                        $item_old_price = $val3['item_old_price'];
                        $item_id = $val3['item_id'];
                        $out_of_stock = $val3['out_of_stock'];

//                        $item_out_put .= '<div class="column cus_font">
//                        <div class="content" align="middle">
//                         <a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . '&item_price=' . $item_price . '&out_of_stock=' . $out_of_stock . ' ">
//                        <img class="secial_item img-responsive card" align="middle" style="text-aling:center;" src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"/></a>
//                            
//                        <div class="cus_boder_for_item_deatails">
//                        <a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . '&item_price=' . $item_price . '&out_of_stock=' . $out_of_stock . ' ">
//                        <h3 class="table_font_size">' . $item_name . '</h3>
//                        <h3 style="color:blue;"  class="table_font_size">' . $main_cat_names . '</h3>
//                        <h3 style="text-align: center; color:red; "  class="table_font_size">LKR ' . $item_price . '</h3></a>';

                        $item_out_put .= '<div class="column cus_font product-all-sec-wrapper">
                    <div class="content" align="middle">
                    <a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . '&item_price=' . $item_price . '&out_of_stock=' . $out_of_stock . ' ">
                    <img class="secial_item img-responsive  " align="middle" style="text-aling:center;  " src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"/></a>
                   
                     <div class="cus_boder_for_item_deatails">
                     <a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . '&item_price=' . $item_price . '&out_of_stock=' . $out_of_stock . ' ">

                    <h3 class="product-det-content-wrapper" style="text-align: center; font-weight: 600;">' . $item_name . '</h3>
                    <h3 class="product-det-content-wrapper" style="text-align: center; color:red; font-weight: 600;  text-decoration: line-through;">LKR ' . $item_old_price . '</h3>
                    <h3 class="product-det-content-wrapper" style="text-align: center; color:blue; font-weight: 600;">LKR ' . $item_price . '</h3>
                        </a>';

                        if ($out_of_stock == '1') {
                            //STOCK OUT ================================
                            $item_out_put .= '<p style="color:red; font-weight: 600;">Stock Out</p>';
                        } else {
                            $item_out_put .= '<p class="card"> <button  type="button" class="btn btn-secondary" id = "add_to_cart_btn" data-item_price = "' . $item_price . '" value = ' . $item_id . '>Add to cart</button></p>';
//                            $item_out_put .= '<p> <button type = "button" class = "btn btn-success" id = "add_to_cart_btn" data-item_price = "' . $item_price . '" value = ' . $item_id . '>Add to cart</button></p>';
                        }

                        $item_out_put .= '</div>';
                        $item_out_put .= '</div></div>';
                    }//END foreach



                    $item_out_put .= '</div></section></div>';
                    echo $item_out_put;
                }
                ?>

                <!-- Pagination -->
                <hr>

                <div class="row" style="text-align: center;">
                    <div class=" center-block" >

                        <ul class="pagination pagination-lg">

                            <?php
                            $previous = $page > 1 ? $page - 1 : 1;
                            $next = $page < $page ? $page : $page + 1;

                            echo '<li class="page-item"><a class="page-link" href="pagination.php?main_cat_id=' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . $previous . '">Previous</a></li>';

                            for ($v = 1; $v <= $pages; $v++) {

                                if ($v == $page) {
                                    echo '<li class="active"><a href="pagination.php?main_cat_id=' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . $v . '">' . $v . '</a></li>';
                                } else {
                                    echo '<li><a href="pagination.php?main_cat_id=' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . $v . '">' . $v . '</a></li>';
                                }
                            }
                            echo '<li class="page-item"><a class="page-link" href="pagination.php?main_cat_id=' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . $next . '">Next</a></li>';
                            ?>
                        </ul>

                    </div>
                </div>
                <!-- Pagination End -->


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



<!--<SLIDER SCRIPT END />////////////////////////////////////////////////////////-->

<!--FOTER DIV START ///////////////////////////////////////////////////////////-->
<div class="footer">
    <?php require_once('include/footer.php'); ?>


    <script type="text/javascript">
            $(document).on('ready', function () {
                load_cart_item_list();
                item_tot();
                //ONLOAD FUNCTION IMAGE MAIN CAT LOAD ------------------------------------------
                $(function () {
                    var sub_cat_id = "<?php echo $sub_cat_id = $_GET["sub_cat_id"]; ?>";
                    var main_cat_id = "<?php echo $sub_cat_id = $_GET["main_cat_id"]; ?>";

                    var sub_cats_id = parseInt(sub_cat_id);
                    var main_cats_id = parseInt(main_cat_id);

                    load_cat(main_cat_id, sub_cat_id);


                });



            }); //ON LOAD FUCTION END
    </script>


    <script type="text/javascript">



        $(document).on('ready', function () {
            //  item_tot();

        });


        $('filter_res').change(function () {
            // load_filtered_categories();
        });





    </script>

</div>

<!--FOTER DIV END ///////////////////////////////////////////////////////////-->

</body>

</html>
