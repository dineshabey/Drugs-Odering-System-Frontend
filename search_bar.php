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


        <title>Live Search using AJAX</title>

        <!-- Including jQuery is required. -->

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    </head>
    <!--MAIN HEAD END -->
    <body>
        <input type="text" class="live-search-box" placeholder="search here" />

        <div class="search_div">
            
        </div>
        
<!--        <ul class="live-search-list">
                                <li>Lorem</li>
                                <li>ipsum</li>
                                <li>dolor</li>
                                <li>sit</li>
                                <li>amet</li>
        </ul>-->




        <!--sub header--////////////////////////////////////////////////////////>-->


        <!--sub header-- end////////////////////////////////////////////////////>-->

        <!---728x90--->

        <div class="">

            <!--NAVIGATION MENU BAR start ----------------------------------------->
            <div style="" class=" "  >   
                <?php
//NAVIGATION BAR ============= =================================================
//                $qry = $system->prepareSelectQuery("SELECT
//item_deatails.item_name,
//item_deatails.sub_cat_id,
//item_deatails.item_id
//FROM
//item_deatails
//WHERE
//item_deatails.item_view_status = '0' AND
//(lower(item_deatails.item_name) LIKE 'A%') or (UPPER(item_deatails.item_name) LIKE 'A%')
//ORDER BY
//item_deatails.item_id DESC");
//                echo '<ul class="live-search-list">';
//                if (!empty($qry)) {
//                    foreach ($qry as $val) {
//                        echo '<li>' . $val['item_name'] . '</li>';
//                    }
//                }
//
//                echo '</ul>';
                ?>

            </div>            


            <!-- End of body section HTML codes -->

        </div>



        <div class="clearfix"> </div>        	         
    </div>

    <script type="text/javascript">

//        jQuery(document).ready(function ($) {

            $('.live-search-list li').each(function () {
                $(this).attr('data-search-term', $(this).text().toLowerCase());
            });

            $('.live-search-box').on('keyup', function () {
                var searchTerm = $(this).val().toLowerCase();
                $.post("./loaddata.php", {action: 'search_item',searchTerm:searchTerm}, function (e) {
                    if (e === undefined || e.length === 0 || e === null) {
                        $('.search_div').html("NO data Found ! ");
                    } else {
                        $('.search_div').html(e);

                    }
                        chosenRefresh();
                });





//
//                $('.live-search-list li').each(function () {
//
//                    if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
//                        $(this).show();
//                    } else {
//                        $(this).hide();
//                    }
//
//                });

            });

//        });


    </script>

    <!--<SLIDER SCRIPT END />////////////////////////////////////////////////////////-->

    <!--FOTER DIV START ///////////////////////////////////////////////////////////
    <!--<div class="footer">
    <?php //require_once('include/footer.php');  ?>
    </div>-->

    <!--FOTER DIV END ///////////////////////////////////////////////////////////-->

</body>

</html>