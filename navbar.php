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
        <style type="text/css">

            .nav_bar_cuss{
                background-color: #3498db;
                background-image: url("images/site_img/green_bac5.jpg");
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

            .menu-container {
                width: 100%;
                margin: 0 auto;
                background: #3498DB;

            }
            
            .ui-autocomplete-custom {
    background: #87ceeb;
    z-index: 2;
}

.search input { 
  text-indent: 30px;
   font-family:  FontAwesome, sans-serif;
}
       
            .menu-mobile {
                display: none;
                padding: 10px;
            }

            .menu-mobile:after {
                content: "f0c9" ;
                font-family: "font awesome";
                font-size: 2.5rem;
                padding: 0;
                float: right;
                /*position: relative;*/
                top: 50%;
                -webkit-transform: translateY(-25%);
                -ms-transform: translateY(-25%);
                transform: translateY(-25%);
                /*display: none;*/
                /*content: 'menu name';*/
            }

            .menu-dropdown-icon:before {
                content: "\f489";
                font-family: "Ionicons";
                display: none;
                cursor: pointer;
                float: right;
                padding: 1.5em 2em;
                background: gold;
                color: black;
            }

            .menu > ul {

                background-color: #59a86b;
                margin: 0 auto;
                width: 100%;
                list-style: none;
                padding: 0;
                position: relative;
                /* IF .menu position=relative -> ul = container width, ELSE ul = 100% width */
                box-sizing: border-box;
            }

            .menu > ul:before, .menu > ul:after {
                content: "";
                display: table;
            }

            .menu > ul:after { clear: both; }

            .menu > ul > li {
                float: left;
                background: #red;
                padding: 0;
                margin: 0;
            }

            .menu > ul > li a {
                text-decoration: none;
                /*padding: 1.5em 3em;*/
                padding: -0.4em 3em;
                padding-right: 10px;
                display: block;
                color:black;
            }

            .menu > ul > li:hover { background: #f0f0f0; }

            .menu > ul > li:hover > a { color: #333; }

            .menu > ul > li > ul {
                display: none;
                width: 100%;
                /*background-color: hsl(50, 33%, 25%);*/
                background-image: url("images/site_img/gold_bac.jpg");
                padding: 20px;
                position: absolute;
                z-index: 99;
                left: 0;
                margin: 0;
                list-style: none;
                box-sizing: border-box 2px red;
            }

            .menu > ul > li > ul:before, .menu > ul > li > ul:after {
                content: "";
                display: table;
            }

            .menu > ul > li > ul:after { clear: both; }

            .menu > ul > li > ul > li {
                margin: 0;
                padding-bottom: 0;
                list-style: none;
                width: 25%;
                background: none;
                float: left;
            }

            .menu > ul > li > ul > li a {
                color: #777;
                padding: .2em 0;
                width: 95%;
                display: block;
                border-bottom: 1px solid #ccc;
            }

            .menu > ul > li > ul > li > ul {
                display: block;
                padding: 0;
                margin: 10px 0 0;
                list-style: none;
                box-sizing: border-box;
            }

            .menu > ul > li > ul > li > ul:before, .menu > ul > li > ul > li > ul:after {
                content: "";
                display: table;
            }

            .menu > ul > li > ul > li > ul:after { clear: both; }

            .menu > ul > li > ul > li > ul > li {
                float: left;
                width: 100%;
                padding: 10px 0;
                margin: 0;
                font-size: .8em;
            }

            .menu > ul > li > ul > li > ul > li a { border: 0; }

            .menu > ul > li > ul.normal-sub {
                width: 300px;
                left: auto;
                padding: 10px 20px;
            }

            .menu > ul > li > ul.normal-sub > li { width: 100%; }

            .menu > ul > li > ul.normal-sub > li a {
                border: 0;
                padding: 1em 0;
            }

            @media only screen and (max-width: 959px) {

                .menu-container { width: 100%; }

                .menu-mobile { display: block; }

                .menu-dropdown-icon:before { display: block; }

                .menu > ul { display: none; }

                .menu > ul > li {
                    width: 100%;
                    float: none;
                    display: block;
                }

                .menu > ul > li a {
                    padding: 1.5em;
                    width: 100%;
                    display: block;
                }

                .menu > ul > li > ul { position: relative; }

                .menu > ul > li > ul.normal-sub { width: 100%; }

                .menu > ul > li > ul > li {
                    float: none;
                    width: 100%;
                    margin-top: 20px;
                }

                .menu > ul > li > ul > li:first-child { margin: 0; }

                .menu > ul > li > ul > li > ul { position: relative; }

                .menu > ul > li > ul > li > ul > li { float: none; }

                .menu .show-on-mobile { display: block; }
            }

            /*<!--ITEM SLIDER CSS   END////////////////////-->*/
        </style>

    </head>
    <!--MAIN HEAD END -->
    <body>

        <script type="text/javascript">
            $(function () {
                $('#main-menu').smartmenus({
                    subMenusSubOffsetX: 1,
                    subMenusSubOffsetY: -8

                });
            });
        </script>
        <!--sub header--////////////////////////////////////////////////////////>-->


        <!--sub header-- end////////////////////////////////////////////////////>-->

        <!---728x90--->

        <div class="">

            <!--NAVIGATION MENU BAR start ----------------------------------------->
            <div style="" class=" "  >   
                <?php
//NAVIGATION BAR ============= =================================================
                $main_cat_data = $system->prepareSelectQuery("SELECT
                            main_cat.main_cat_name,
                            main_cat.main_cat_id
                            FROM
                            main_cat
                            WHERE
                            main_cat.view_status = '0'
                            ORDER BY
                            main_cat.main_cat_id DESC");

                $out_put1 = '';
                if (!empty($main_cat_data)) {


                    $out_put = '<div class="menu-container ">
                         <div class="menu"> ';
                    $main_cat_name = '';

                    $out_put .= '<ul  class="nav navbar-nav navbar-dark bg-dark navbar-toggler">';
                    $out_put .= '<li><a href="index.php">HOME </a>';
                    foreach ($main_cat_data as $val) {
                        $main_cat_id = $val['main_cat_id'];
                        $out_put .= '<li><a>' . $val['main_cat_name'] . '</a>';

                        $sub_cat_data = $system->prepareSelectQuery("SELECT
                                    sub_cat.sub_cat_id,
                                    sub_cat.sub_cat_name
                                    FROM
                                    sub_cat
                                    WHERE
                                    sub_cat.view_status = '0' AND
                                    sub_cat.main_cat_id = '$main_cat_id'
                                    ORDER BY
                                    sub_cat.sub_cat_id DESC");
                        if (!empty($sub_cat_data)) {
                            $out_put .= '<ul>';
                            foreach ($sub_cat_data as $val2) {
                                $sub_cat_id = $val2['sub_cat_id'];
                                $out_put .= '<li><a style="color: black;">' . $val2['sub_cat_name'] . '</a>';
                                $item_info_data = $system->prepareSelectQuery("SELECT
item_deatails.item_id,
item_deatails.item_name,
item_deatails.item_price,
item_deatails.item_image,
item_deatails.item_discount,
sub_cat.sub_cat_name,
main_cat.main_cat_name,
main_cat.main_cat_id,
sub_cat.sub_cat_id
FROM
item_deatails
INNER JOIN sub_cat ON item_deatails.sub_cat_id = sub_cat.sub_cat_id
INNER JOIN main_cat ON sub_cat.main_cat_id = main_cat.main_cat_id
WHERE
item_deatails.sub_cat_id = '$sub_cat_id' AND
item_deatails.img_status = '1' AND
item_deatails.item_view_status = '0'
ORDER BY
item_deatails.item_id DESC");

                                if (!empty($item_info_data)) {
                                    $output_data = array();
                                    $out_put .= '<ul>';
                                    foreach ($item_info_data as $val3) {

                                        $main_cat_names = $val3['main_cat_name'];
                                        $main_cat_id = $val3['main_cat_name'];
                                        $sub_cat_name = $val3['sub_cat_name'];
                                        $sub_cat_id = $val3['sub_cat_id'];
                                        $item_name = $val3['item_name'];
                                        $item_img = $val3['item_image'];
                                        $item_price = $val3['item_price'];
                                        $item_id = $val3['item_id'];

//                                        $out_put .= '<li><a style="color: black;">' . $item_name . '</a>';
//                                        $out_put .= '<li><a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . ' style="color: black;" >' . $item_name . '</a>';
                                        $out_put .= '<li><a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . '  style="color: black; text-aling="right;" >' . $item_name . '&nbsp;-<img class="" align="right" style="text-aling:center;"  width="60px" src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"/></a>';
                                    }
                                    $out_put .= '</ul>';
                                }

                                $out_put .= '</li>';
                            }
                            $out_put .= '</ul>';
                        }
                    }
                    $out_put .= '</li>';
                    $out_put .= '</li>';
                    $out_put .= '</ul>';
                    $out_put .= '</li>';
                }
                $out_put .= '</ul></div></div>';
                echo $out_put;
                ?>

            </div>            


            <!-- End of body section HTML codes -->

        </div>



        <div class="clearfix"> </div>        	         
    </div>

    <script type="text/javascript">

        $(document).on('ready', function () {
        }); //ON LOAD FUCTION END


    </script>





    <!--<SLIDER SCRIPT END />////////////////////////////////////////////////////////-->

    <!--FOTER DIV START ///////////////////////////////////////////////////////////
    <!--<div class="footer">
    <?php //require_once('include/footer.php');   ?>
    </div>-->

    <!--FOTER DIV END ///////////////////////////////////////////////////////////-->

</body>

</html>