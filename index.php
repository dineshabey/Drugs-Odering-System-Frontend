

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
        </style>


    </head>
    <!--MAIN HEAD END -->
    <body>

        <script src='../../../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script src="../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>

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
            <?php //require_once('include/coustomer_header_1.php'); ?>


            
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->

        <!---728x90--->

        <div class="container">
            
                             <!--NAVIGATION MENU BAR start ----------------------------------------->
            <div style="background-color:#fafbf9;" class="nav_bar" >   

            </div>
            
            
            <div class="row" style="padding-bottom: 50px; padding-top: 20px;">
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
            <!-- End of body section HTML codes -->

<!--            NAVIGATION MENU BAR start ---------------------------------------
            <div style="background-color:#fafbf9;" class="nav_bar" >   

            </div>-->

            <!--NAVIGATION MENU BAR END ------------------------------------------->



            <!--ALL ITEM SLIDER START /////////////////////////////////////////3333333333333-->

            <div style="background-color:#fafbf9;" class="img_view_panel" >     </div>
            <!--ALL ITEM SLIDER END /////////////////////////////////////////3333333333333-->




            <!--<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>-->

            <!--NEW COUSTOMER ITEM SLIDER END /////////////////////////////////////////3333333333333-->



            <!---728x90--->



        </div>
    </div>   

    <div class="clearfix"> </div>        	         
</div>

<!---->
<!---728x90--->
<!--<SLIDER SCRIPT START />////////////////////////////////////////////////////////-->
<script src="./slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
            $(document).on('ready', function () {
                setTimeout(function () {
                    $(".regular").slick({
                        dots: true,
                        arrows: true,
                        infinite: true,
                        slidesToShow: 5,
                        slidesToScroll: 5,
                        lazyLoad: 'ondemand'
                    });

                }, 1000);

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
              
        
        //ONLOAD FUNCTION NAVIGATION BAR LOAD ------------------------------------------
               

        $(function () {
                    var menu_data = '';
                    $.post("./loaddata.php", {action: 'load_nav_bar_menu'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                           menu_data += '-- No Data Found --';
                        } else {
                            
                               menu_data += e.toString();
                           //                  $(div).find('.nav_bar').html(e).end().appendTo($('.body'));
                         //                             $(div).appendTo('body');
                         //                             $("body div").find('.nav_bar').html(e);
                        }
                        
                    $('.nav_bar').append(menu_data);
                        
                        //    chosenRefresh();
                    });
                });




            }); //ON LOAD FUCTION END




</script>

<!--<SLIDER SCRIPT END />////////////////////////////////////////////////////////-->

<!--FOTER DIV START ///////////////////////////////////////////////////////////-->
<div class="footer">
    <?php require_once('include/footer.php'); ?>
</div>

<!--FOTER DIV END ///////////////////////////////////////////////////////////-->

</body>

</html>