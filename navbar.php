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
        <!--<script src="sliderengine/jquery.js"></script>-->
        <!--<script src="sliderengine/amazingslider.js"></script>-->
        <!--<link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">-->
        <!--<script src="sliderengine/initslider-1.js"></script>-->
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
        </style>

    </head>
    <!--MAIN HEAD END -->
    <body>

        <!--<script src='../../../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>-->
        <!--<script src="../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>-->

        <!--MENU SCRIPT-->
        <script src="jquery_menu/libs/jquery/jquery.js"></script>
        <script type="text/javascript" src="jquery_menu/jquery.smartmenus.js"></script>
        <script src="js/megamenu.js"></script>
        <!--MENU SCRIPT-->

        <!--SLICK SLIDER--> 
        <!--<script src="./slick/slick.min.js" type="text/javascript" charset="utf-8"></script>-->

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
            <?php //require_once('include/coustomer_header_1.php'); ?>
            
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->

        <!---728x90--->

        <div class="container">
            
            <!--NAVIGATION MENU BAR start ----------------------------------------->
            <div style="background-color:#fafbf9;" class="nav_bar" >   
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
          
          
            $out_put = '<div class="menu-container">
                         <div class="menu" > ';
            $main_cat_name = '';
            
             $out_put .= '<ul>';
            foreach ($main_cat_data as $val) {
                $main_cat_id = $val['main_cat_id'];
//              echo '//////////////MAin Cat>>' . $val['main_cat_id'] . '<br>';
//                echo '/////////////main cat name>>' . $val['main_cat_name'] . '<br>';
//                        $out_put .='<div >'. $val['main_cat_name'] . '</br></div>';
  
                $out_put .= '<li><a href="index.php">' . $val['main_cat_name'] . '</a>';
                
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
//                       echo '=============SUB CAT ==' . $val2['sub_cat_id'] . '<br>';
//                        echo '============= SUB CAT name==' . $val2['sub_cat_name'] . '<br>';
                      
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
//                            $sliderData = '<div>';
//                            $out_put .= '<section class="slider regular"   style=" padding-top:10px ;">';
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

                                $out_put .= '<li><a style="color: black;">' . $item_name . '</a>';

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
           $out_put .= '</ul></div></div>'   ;
           echo $out_put; 
        
           
                ?>
            
<!--                <div class="menu-container">
    <div class="menu" >
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Nature Cream</a>
                <ul>
                    <li><a href="#">Web Developement</a>
                        <ul>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">CSS3</a></li>
                            <li><a href="#">PHP</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">Bio Cream</a>
                <ul>
                    <li><a href="#">Web Developement</a>
                        <ul>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">CSS3</a></li>
                            <li><a href="#">PHP</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">Suppliment</a>
                <ul>
                    <li><a href="#">Web Developement</a>
                        <ul>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">CSS3</a></li>
                            <li><a href="#">PHP</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Graphic Design</a>
                        <ul>
                            <li><a href="#">Sketch</a></li>
                            <li><a href="#">Photoshop</a></li>
                            <li><a href="#">Illustrator</a></li>
                            <li><a href="#">Corel Draw</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="#">About</a> </li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</div> -->
    
            </div>            
            
           
            <!-- End of body section HTML codes -->

            <!--  NAVIGATION MENU BAR start ------------>
            <!--<div style="background-color:#fafbf9;" class="nav_bar" >-->   

            </div>


        </div>
    </div>   

    <div class="clearfix"> </div>        	         
</div>

<script type="text/javascript">
              
        $(document).on('ready', function () {
              
              }); //ON LOAD FUCTION END
   
            $(function(){
                           
            });
   
            $(window).on('load', function() {

            });



</script>

<!--<SLIDER SCRIPT END />////////////////////////////////////////////////////////-->

<!--FOTER DIV START ///////////////////////////////////////////////////////////
<!--<div class="footer">
    <?php //require_once('include/footer.php'); ?>
</div>-->

<!--FOTER DIV END ///////////////////////////////////////////////////////////-->

</body>

</html>