<header>
    <div class="header-main-menu-sec-wrapper top_head_cus2">
        <div class="menu-top-sec-wrapper" >
            <div class="container"  >
                <div class="row" >
                    <div class="col-md-12" style="">


                        <a href="index.php">

                            <div class="welcome-left-sec-wrapper">
                                <span style="color: #00811c; font-size: 20px; "> <i class="fa fa-home" aria-hidden="true" style="text-align: center;"></i> <span class="txt-highlt">HOME</span></span>
                            </div>
                        </a>



                        <div class="log-sign-right-sec-wrapper">
                            <?php
                            if (!isset($_SESSION['cus_id'])) {
                                echo '<a href="login.php">log in</a>';
                                echo '<a href="register.php">sign up</a>';
                            } else {
                                $cus_name = $_SESSION['uname'];
                                echo '<button type="button" style="margin:2px;" class="btn btn-success btn-md" value = ' . $cus_name . ' id = "profil">Welcome ' . $cus_name . ' !</buttn>';
                                echo' <button  type="button" id="log_out" style="background-color:red;" class="btn btn-primary btn-md" ><span></span>LOGOUT</button>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-mid-sec-wrapper top_head_cus2"  >
            <div class="container">
                <div class="row">
                    <div class="col-md-12 menu-mid-sec-inner-wrapper">
                        <div class="top-menu-logo-sec-wrapper">
                            <!--<a href="index.php"><img src="img/lion-mini-mart-logo.png" alt="Lion Mini Mart Logo"></a>-->
                            <a href="index.php" style="text-decoration: none;"><p  class="lion_text">LION MINI MART</p></a>
                        </div>
                        <div class="top-menu-search-sec-wrapper">
                            <div class="top-menu-search-field-sec-wrapper">
                                <h2 style="color:#4245bb;">Client Area / Welcome <?php echo $_SESSION['uname'] ?> ! </h2>

                            </div>
                        </div>
                        <div class="topmenu-righticons-sec-wrapper">
                            <span class="topmenu-cart-icon-sec-wrapper">
                                <?php
                                if (!isset($_SESSION['cus_id'])) {
                                    echo '<a href="cart_item.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="items-num-wrapper item_tot" ></span></a>';
                                } else {
//                                    echo '<a href="cart_item.php" ><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="items-num-wrapper item_tot" ></span></a>';
                                    echo '<a href="user_profil.php" ><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="items-num-wrapper itm_qty_user_log" ></span></a>';
                                    
                                }
                                ?>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-items-sec-wrapper bottom_head_cus" hidden="" >
            <?php require_once('navbar_new.php'); ?>
        </div>

    </div>

    <!-- Mobile view -->
    <div class="mob-main-menu-wrapper top_head_cus2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mob-main-menu-top-sec-wrapper">
                        <a href="index.php">
                            <div class="hamburger-menu-con-wrapper" id="mob-menu-hamburgerbtn-wrapper" style="width: 74px; height: 92px; background-color: red; text-align: center;">
                                <div  class="hamburger-menu-wrapper fa home" style="padding-bottom: 38px; font-size: 40px; text-align: center; color: blue;">
                                    <i class="fa fa-home" aria-hidden="true" style="text-align: center;"></i>
                                </div>
                                <span class="menu-txt" style="padding-top: 16px; font-size: 24px;">Home</span>
                            </div>
                        </a>

                        <div class="mob-view-logo-sec-wrapper">
                            <!--<a href="index.php"><img src="img/lion-mini-mart-logo.png" alt="Lion Mini Mart Logo"></a>-->
                            <a href="#" style="text-decoration: none;"><p id="index_id" class="lion_text" style="">LION MINI MART</p>
                                <h3 style="color:#4245bb;">Client Area / Welcome <?php echo $_SESSION['uname'] ?> ! </h3>
                            </a>
                        </div>

                        <div class="topmenu-righticons-sec-wrapper">
                            <span class="topmenu-cart-icon-sec-wrapper">
                                <?php
                                if (!isset($_SESSION['cus_id'])) {
                                    echo '<a href="cart_item.php"> <i class="fa fa-shopping-cart" style="font-size: 50px; color:blue;" aria-hidden="true"></i>  <span class="items-num-wrapper item_tot">0</span></a>';
                                } else {
//                                    echo '<a href="cart_item.php"> <i style="font-size: 50px;" class="fa fa-shopping-cart" aria-hidden="true"></i>  <span class="items-num-wrapper item_tot">0</span></a>';
                                    echo '<a href="user_profil.php"> <i style="font-size: 50px;" class="fa fa-shopping-cart" aria-hidden="true"></i>  <span class="items-num-wrapper itm_qty_user_log">0</span></a>';
                                }
                                ?>
                            </span>
                        </div>
                    </div>

                    <!--SECOND HEADER--> 
                    <div class="container">
                        <div class="row">
                            <div class=" col-lg-12 " style="">
                                <span class="col-lg-4"> 
                                    <?php
                                    if (!isset($_SESSION['cus_id'])) {
                                        echo '<a href = "login.php">
                                            <span style = "color:blue; font-size: 25px; font-weight:bold; text-align: left; color: #000000; border: 1px solid red;" >Login</span>
                                            </a>
                                            &nbsp;
                                            <span style = "border-left: 1px solid blue;height: 1px; "> &nbsp;
                                            </span>
                                            <a href = "register.php">
                                            <span style = "color:red; font-size: 25px; font-weight:bold; text-align: left; color: #000000; border: 1px solid red;" >Create Account</span>
                                            </a>';
                                    } else {
                                        $cus_name = $_SESSION['uname'];
                                        echo '<button type="button" style="margin:2px;  background-color: #5d5df3e3;" class="btn btn-primary btn-md" value = ' . $cus_name . ' id = "profil">My Profile</buttn>';
                                        echo' <button  type="button" id="log_out" style="background-color:red;" class="btn btn-primary btn-md" ><span></span>LOGOUT</button>';
                                    }
                                    ?>

                                </span>
                                <!--<span class="col-lg-8" style="color:blue; font-size: 30px; font-weight:bold; text-align: center;" ><a href="login.php">Sampale text</a></span>-->
                            </div>
                        </div>
                    </div>
                    <!--SECOND HEADER--> 
                </div>
            </div>


        </div>
    </div>
    <!-- Mobile view -->



</header>

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
</script>

<!-- jQuery  -->
<!--<script src="js/jquery.min.js"></script>-->

<!-- bootstrap js -->
<!--<script src="js/bootstrap.min.js"></script>-->

<!-- custom js -->
<!--<script src="js/lion-custom.js"></script>-->
