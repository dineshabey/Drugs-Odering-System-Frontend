<?php
if (isset($_SESSION['cus_id'])) {
    echo '<input type="text" hidden="" id="cus_id" value="' . $_SESSION['cus_id'] . '">';
} else {
    echo '<input type="text" hidden="" id="cus_id" value="0">';
//    echo "<script>location.href='login.php';</script>";
//    echo "Not Sesseon";
}
?>
<div class="footer-top bottom_head_cus2" style="background-color: #357ae833; ">

    <div class="container " >
        
        <div class="latter-right" style="padding-bottom: 10px">
            <p>FOLLOW US</p>
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
    <div class="container" style="padding-bottom: 50px">
     
        <div class="row" style="">
            <div class="col-lg-2">   <h2>PAY ACCEPTED</h2> </div>
            <div class="col-lg-8">
                <img src="images/site_img/payhere_long_banner.png" alt="" class="responsive" style="max-width: 100%;" />

            </div>
            <!--<div class="col-lg-2"> </div>-->
        </div>
    </div>

</div>
<div class="footer-bottom " style="background-color: #ffffffb3; padding-top: 20px">
    <div class="container" style="padding-top: 20px;">
        <div class="footer-bottom-cate">
            <h6>CATEGORIES</h6>
            <ul>
                <li><a href="#">Curabitur sapien</a></li>
                <li><a href="#">Dignissim purus</a></li>
                <li><a href="#">Tempus pretium</a></li>
                <li ><a href="#">Dignissim neque</a></li>
                <li ><a href="#">Ornared id aliquet</a></li>
                <li><a href="#">Ultrices id du</a></li>
                <li><a href="#">Commodo sit</a></li>
                <li ><a href="#">Urna ac tortor sc</a></li>
                <li><a href="#">Ornared id aliquet</a></li>
                <li><a href="#">Urna ac tortor sc</a></li>
                <li ><a href="#">Eget nisi laoreet</a></li>
                <li ><a href="#">Faciisis ornare</a></li>
            </ul>
        </div>
        <div class="footer-bottom-cate bottom-grid-cat">
            <h6>FEATURE PROJECTS</h6>
            <ul>
                <li><a href="#">Curabitur sapien</a></li>
                <li><a href="#">Dignissim purus</a></li>
                <li><a href="#">Tempus pretium</a></li>
                <li ><a href="#">Dignissim neque</a></li>
                <li ><a href="#">Ornared id aliquet</a></li>
                <li><a href="#">Ultrices id du</a></li>
                <li><a href="#">Commodo sit</a></li>
            </ul>
        </div>
        <div class="footer-bottom-cate">
            <h6>TOP BRANDS</h6>
            <ul>
                <li><a href="#">Curabitur sapien</a></li>
                <li><a href="#">Dignissim purus</a></li>
                <li><a href="#">Tempus pretium</a></li>
                <li ><a href="#">Dignissim neque</a></li>
                <li ><a href="#">Ornared id aliquet</a></li>
                <li><a href="#">Ultrices id du</a></li>
                <li><a href="#">Commodo sit</a></li>
                <li ><a href="#">Urna ac tortor sc</a></li>
                <li><a href="#">Ornared id aliquet</a></li>
                <li><a href="#">Urna ac tortor sc</a></li>
                <li ><a href="#">Eget nisi laoreet</a></li>
                <li ><a href="#">Faciisis ornare</a></li>
            </ul>
        </div>
        <div class="footer-bottom-cate cate-bottom">
            <h6>OUR ADDRESS</h6>
            <ul>
                <li>Anamaduwa Road, </li>
                <li>Nawagathegama</li>
                <li class="phone">061 405305848</li>
                <li class="temp"><p>&copy 2019  All Rights Reserved | Design by  <a href="http://goldendit.com/" target="_blank">Golden-D IT Solution</a> </p></li>
            </ul>
        </div>
        
        <div class="clearfix"> </div>
    </div>
</div>

<!-- Scripts for jQuery and the plugin --> 
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--> 
<!--
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
-->
<script src="js/megamenu.js"></script>
<script type="text/javascript"></script>

<script type="text/javascript">
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
                                        load_user_added_item();
                                    }
                                }, "json");
                            }

                        });


</script>