<?php
require_once('./config/dbc.php');
require_once('./class/systemSetting.php');
$system = new setting();

$date = date("Y-m-d");
$time = date("h:i:sa");

if (isset($_SESSION['cus_id'])) {
    echo '<input type="text" hidden="" id="cus_id" value="' . $_SESSION['cus_id'] . '">';
} else {
    echo '<input type="text" hidden="" id="cus_id" value="0">';
}
?>
<style type="text/css">
    .footer_bar{
        background-image: url("images/site_img/green_bac5.jpg");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .h_tag{
        color: #bdff77;
        font-size: 20px;
        font-family: Arial Rounded MT ,Helvetica Rounded,Arial,sans-serif;
    }

</style>




<div class="footer-bottom " style="background-color:#170303e6; padding-top: 15px; color: white;" >
    <div class="container" style="padding-top: 20px;">
        <div class="footer-bottom-cate cate-bottom">
            <h6 class="h_tag"><label class="h_tag">TOP CATEGORIES</label></h6>
            <ul>
                <?php
                $main_cat_data = $system->prepareSelectQuery("SELECT
main_cat.main_cat_id,
main_cat.main_cat_name,
sub_cat.sub_cat_id
FROM
main_cat
INNER JOIN sub_cat ON sub_cat.main_cat_id = main_cat.main_cat_id
GROUP BY
main_cat.main_cat_id
ORDER BY
main_cat.main_cat_id DESC
LIMIT 5");
                if (!empty($main_cat_data)) {
                    $out_put = '';
                    foreach ($main_cat_data as $val) {
                        $main_cat_names = $val['main_cat_name'];
                        $main_cat_id = $val['main_cat_id'];
                        $sub_cat_id = $val['sub_cat_id'];
                        $out_put = '<li><i style = "font-size:24px; color:#d4ff2a;" class = "fa">&#xf0da;</i> &nbsp;<a href="pagination.php?main_cat_id=' . $main_cat_id . '&sub_cat_id=' . $sub_cat_id . '&page=1 "><span class="li_clz">' . $main_cat_names . '</span></a></li>';
                        echo $out_put;
                    }
                }
                ?>
            </ul>


            <!--            <ul>
                            <li class="right"><i style="font-size:24px; color: whitesmoke;" class="fa">&#xf0da;</i> &nbsp;<a href="#"><span class="li_clz">Vitamin</span></a></li>
                            <li><i style="font-size:24px; color: whitesmoke;" class="fa">&#xf0da;</i> &nbsp;<a href="#"><span class="li_clz">Hearbz</span></a></li>
                            <li><i style="font-size:24px; color: whitesmoke;" class="fa">&#xf0da;</i> &nbsp;<a href="#"><span class="li_clz">Baby Items</span></a></li>
            
                        </ul>-->



        </div>
        <div class="footer-bottom-cate cate-bottom" style="padding: 0 0 6em;">
            <h6><label class="h_tag">FEATURE ITEMS</label></h6>
            <ul class="">

                <ul>
                    <?php
                    $featured_item_data = $system->prepareSelectQuery("SELECT
item_deatails.item_id,
item_deatails.item_name,
item_deatails.sub_cat_id,
item_deatails.item_price,
item_deatails.out_of_stock
FROM
item_deatails
WHERE
item_deatails.img_status = '1' AND
item_deatails.out_of_stock = '0' AND
item_deatails.item_view_status = '0' AND
item_deatails.featured_item = '1'
ORDER BY
item_deatails.item_id DESC
LIMIT 5
");
                    if (!empty($featured_item_data)) {
                        $out_put = '';
                        foreach ($featured_item_data as $val) {
                            $item_names = $val['item_name'];
                            $item_id = $val['item_id'];
                            $sub_cat_id = $val['sub_cat_id'];
                            $out_of_stock = $val['out_of_stock'];
                            $item_price = $val['item_price'];

                            $out_put = '<li><i style = "font-size:24px; color: #d4ff2a;" class = "fa">&#xf0da;</i> &nbsp;<a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . '&item_price=' . $item_price . '&out_of_stock=' . $out_of_stock . ' "><span class="li_clz">' . $item_names . '</span></a></li>';
                            echo $out_put;
                        }
                    }
                    ?>
                </ul>


<!--<li> <i style="font-size:24px; color: whitesmoke;" class="fa">&#xf0da;</i> &nbsp;<a href="#"><span class="li_clz">Vitamin B</span></a></li>-->
<!--<li> <i style="font-size:24px; color: whitesmoke;" class="fa">&#xf0da;</i> &nbsp;<a href="#"><span class="li_clz">Vitamin C</span></a></li>-->

            </ul>
        </div>

        <div class="footer-bottom-cate cate-bottom">
            <h6 ><label class="h_tag">CONTACT DEATAILS</label></h6>
            <div >

                <ul >
                    <li><span  class="li_clz2">Anamaduwa Road, </span></li>
                    <li><span  class="li_clz2">Nawagathegama</span></li>
                    <li class="phone" ><span  class="li_clz2">Tele : 061 405305848</span></li>
                    <li class="phone" ><span  class="li_clz2">Fax : 061 405305848</span></li>
                    <li class="phone" ><span  class="li_clz2">Email : lionminimart@gmail.com</span></li>
                    <li class="" ><span  class="li_clz2"><a href="about_us.php">OUR POLICIES</a></span></li>
                    <!--<li class="temp"><p>&copy 2019  All Rights Reserved | Design by  <a href="http://goldendit.com/" target="_blank">Golden-D IT Solution</a> </p></li>-->
                </ul>
            </div>
        </div>
        <div class="footer-bottom-cate">
            <div>
                <a href="index.php"><img class="img-responsive" src="images/site_img/edit_logo.jpg" style="width: 250px; height: 300px;" alt="logo"   /></a>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<div class=" footer_bar" style="">
    <div class="container " >
        <div class="latter-right" style="padding-top: 10px;padding-bottom:10px;">
            <p><span style="color: white;">FOLLOW US</span></p>
            <ul class="face-in-to">
                <!--<li><a href="#"><span> </span></a></li>-->
                <li><a href="#"><span class="facebook-in"> </span></a></li>
                <div class="clearfix"> </div>
            </ul>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>

    <!--<hr style="border: 1px solid cornsilk;">-->
    <div class="container" style="padding-bottom: 1px">

        <div class="row" style="">
            <div class="col-lg-2">   <h4><span style="color: white;">PAY ACCEPTED</span></h4> </div>
            <div class="col-lg-8">
                <img src="images/site_img/payhere_long_banner.png" alt="" class="img-responsive" style="max-width: 100%;" />
            </div>
            <!--<div class="col-lg-2"> </div>-->
        </div>
        <div class="row" style="padding-top: 40px;">
            <p style="text-align: center; color: blanchedalmond;">&copy 2019  All Rights Reserved | Design by  <a href="http://goldendit.com/" target="_blank"><span style="color: blanchedalmond;">Golden-D IT Solution</span></a> </p>

        </div>
    </div>

</div>
<!-- Scripts for jQuery and the plugin --> 
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--> 
<!--
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
-->
<script src="js/megamenu.js"></script>
<script type="text/javascript"></script>

<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>

<!-- custom js -->
<script src="js/lion-custom.js"></script>

<script type="text/javascript">

    //ON LOAD FUNCTION ===========================================================
    $(document).on('ready', function () {
        var cus_id = $('#cus_id').val();
        if (cus_id == '0') {
            item_tot();
        } else {
            added_item_qty_user_log();
        }

    }); //ONLOAD FUCTION END ----------------------------


//ADD TO CART BTN CLICK ========================================================
    $(document).on('click', '#add_to_cart_btn', function () {
        var cus_id = $("#cus_id").val();
        //NO LOGIN COUSTOMER ------------------------------
        if (cus_id == "0") {
            var item_id = ($(this).val());
            var price = ($(this).data('item_price'));
            $.post("./loaddata.php", {action: 'add_to_cart', item_id: item_id, price: price}, function (e) {
                if (e === undefined || e.length === 0 || e === null) {
//                                    $('#').html("NO data Found ! ");
                    alert('No data found');
                } else {
                    item_tot();
                }
            });
        } else {
            var item_id = ($(this).val());
            $.post("./loaddata.php", {action: 'data_insert_loging_user', item_id: item_id, cus_id: cus_id}, function (e) {
                if (e === undefined || e.length === 0 || e === null) {
//                                    $('#').html("NO data Found ! ");
                    alert('No data found');
                } else {
                    added_item_qty_user_log();
                    load_user_added_item();
                }
            }, "json");
        }

    });
    //header anuja js

    //USER ADDED ITEM QTY USRER LOG ========================================
    function added_item_qty_user_logff() {
        $.post("./loaddata.php", {action: 'itm_qty_user_log'}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                $('.itm_qty_user_log').html("NO data Found ! ");
            } else {
                var itm_qty_user_log = parseInt(e['itm_qty_user_log']);
                if (isNaN(itm_qty_user_log)) {
                    $('.itm_qty_user_log').html(0);
                } else {
                    if (itm_qty_user_log == null) {
                        $('.itm_qty_user_log').html(0);
                    } else {
                        $('.itm_qty_user_log').html(itm_qty_user_log);
                    }
                }
            }
            //                            chosenRefresh();
        }, "json");
    }

    //NEW FUCTION ///////////////////////////////////////////////////////////////////
    //USER ADDED ITEM TOTAL WHEN USER AFTER LOG========================================
    function added_item_qty_user_log() {
        $.post("./loaddata.php", {action: 'added_item_tot'}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                $('.item_tot').html("NO data Found ! ");
            } else {
                var oder_full_tot = parseFloat(e['oder_full_tot']);
                var oder_full_pay_val = parseFloat(e['oder_full_pay_val']);
                var oder_full_discount = parseFloat(e['oder_full_discount']);
                var itm_qty_user_log = parseFloat(e['itm_qty_user_log']);

                if (isNaN(itm_qty_user_log)) {
                    $('.itm_qty_user_log').html("0.00");
                } else {
                    $('.itm_qty_user_log').html(itm_qty_user_log);
                }
                if (isNaN(oder_full_pay_val)) {
                    $('.item_tot_price').html("0.00");
                } else {
                    $('.item_tot_price').html(oder_full_pay_val);
                }
                if (isNaN(oder_full_tot)) {
                    $('.oder_full_tot').html("0.00");
                } else {
                    $('.oder_full_tot').html(oder_full_tot);
                }
                if (isNaN(oder_full_discount)) {
                    $('.oder_full_discount').html("0.00");
                } else {
                    $('.oder_full_discount').html(oder_full_discount);
                }

                //                            $('.item_tot').html(oder_full_tot);
                $('#oder_full_tot_input_feild').val(oder_full_tot);
                $('#oder_full_discount_input_feild').val(oder_full_discount);
                $('#item_tot_price_input_feild').val(oder_full_pay_val);
//                            load_cart_item_list();
            }
//                            chosenRefresh();
        }, "json");
    }
//NEW FUCTION ///////////////////////////////////////////////////////////////////




//CART ITEM TOTAL BEFORE USER LOG Start//////////////////////////////////////////
//CART ADDED ITEM TOTAL ===========================================================
    function item_tot() {
        $.post("./loaddata.php", {action: 'item_total'}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                $('#').html("NO data Found ! ");
            } else {
                var item_tot = parseFloat(e['item_tot']);
                var item_tot_price = parseFloat(e['item_tot_price']);
                if (isNaN(item_tot)) {
                    $('.item_tot').html("0");
                } else {
                    $('.item_tot').html(item_tot);
                }
                if (isNaN(item_tot_price)) {
                    $('.item_tot_price').html("0.00");
                } else {
                    $('.item_tot_price').html(item_tot_price);
                }

//                $('.item_tot').html(item_tot);
//                $('.item_tot_price').html(item_tot_price);
                load_cart_item_list();
            }
            //    chosenRefresh();
        }, "json");
    }
    //CART ITEM TOTAL BEFORE USER LOG End/////////////////////////////////////////////



    //LOG OUT BTN ======================================================
    $(document).on('click', '#log_out', function () {
        $.post("./loaddata.php", {action: 'log_out'}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                $('.nav_menu_bar').html("NO data Found ! ");
            } else {
                if (e == "1") {
                    window.location.replace("login.php");
                } else {
                    alert("Error ! Session not distroy ..!")
                }
            }
        }, "json");
    });





    //GO TO PROFIL BTN =================================================================
    $(document).on('click', '#profil', function () {
        window.location.replace("user_profil.php");
    });

    //GO TO PROFIL BTN =================================================================
    $(document).on('click', '#index_id', function () {
        window.location.replace("index.php");
    });


    //SCROLL HIDDEN BAR ============================================
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50)
        {
            $('.hidden_bar').hide(1000);
        } else
        {
            $('.hidden_bar').show(1000);
        }
    });
//SCROLL HIDDEN BAR ============================================

</script>