<div class="footer-top">
    <div class="container">
        <div class="latter">
            <h6>NEWS-LETTER</h6>
            <div class="sub-left-right">
                <form>
                    <input type="text" value="Enter email here"onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Enter email here';
                            }" />
                    <input type="submit" value="SUBSCRIBE" />
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="latter-right">
            <p>FOLLOW US</p>
            <ul class="face-in-to">
                <li><a href="#"><span> </span></a></li>
                <li><a href="#"><span class="facebook-in"> </span></a></li>
                <div class="clearfix"> </div>
            </ul>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
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
                <li>Aliquam metus  dui. </li>
                <li>orci, ornareidquet</li>
                <li> ut,DUI.</li>
                <li >nisi, dignissim</li>
                <li >gravida at.</li>
                <li class="phone">PH : 6985792466</li>
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
<script type="text/javascript">
                        $(document).on('ready', function () {
                            item_tot();
                        });

//ADD TO CART BTN CLICK ========================================================
                        $(document).on('click', '#add_to_cart_btn', function () {
                            var item_id = ($(this).val());
                            var price = ($(this).data('item_price'));
                            $.post("./loaddata.php", {action: 'add_to_cart', item_id: item_id, price: price}, function (e) {
                                if (e === undefined || e.length === 0 || e === null) {
                                    $('#').html("NO data Found ! ");
                                } else {
                                    item_tot();
                                    $('#').html(e);

                                }
                                //    chosenRefresh();
                            });
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
                                    load_cart_item_list();
                                }
                                //    chosenRefresh();
                            }, "json");
                        }
</script>