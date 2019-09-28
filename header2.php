<!DOCTYPE html>


<html lang="en">
    <head>
        <title>Lion Mini Mart</title>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">-->
        <meta name="viewport" content="width=600">

        <!-- bootstrap css -->
        <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->

        <!-- font awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet"> 

        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="css/lion-style.css">

        <style type="text/css">
            .bottom_head_cus {
                background-image: url("images/site_img/green_bac5.jpg") !important;
                -webkit-background-size: cover !important;
                -moz-background-size: cover !important;
                -o-background-size: cover !important;
                background-size: cover !important;

            }

            .top_head_cus2 {
                background-image: url("images/site_img/gold_bac.jpg") !important;
                border-bottom: 1px solid #fff !important;
                /*padding: 1.9em 0;*/
            }
            .top_head_cus {
                background-image: url("images/site_img/slide6.jpg") !important;
                /*background-image: url("images/site_img/green_bac5.jpg") !important;*/
                -webkit-background-size: cover !important;
                -moz-background-size: cover !important;
                -o-background-size: cover !important;
                background-size: cover !important;
                /*padding: 1.9em 0;*/
            }

            .lion_text{
                /*text-shadow: 0 4px 0 #000,  0 3px 0 #0e0c0c, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px #9bbaeca1, 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);*/

                font-weight: 600;
                text-shadow: 0 -2px 0 black, 
                    /*0 2px 0 #c9c9c9,*/
                    5px 4px 6px black,
                    0 4px 0 black,
                    0 4px 0 blue,
                    0 5px 0 blue,
                    0 6px 1px rgba(300,100,300),
                    0 0 5px rgba(105,100,300),
                    0 1px 3px rgba(105,100,300),
                    0 3px 5px rgba(105,500,300),
                    0 5px 10px rgba(105,105,300),
                    0 10px 10px rgba(105,105,300),
                    0 20px 20px rgba(105,300,200);
                font-size: 40px;
                color: #ffff59; 

            }
            .logon_pnl:hover {
                color: white;
            }
        </style>

    </head>
    <body>
        <header>
            <div class="header-main-menu-sec-wrapper top_head_cus2" >
                <div class="menu-top-sec-wrapper" >
                    <div class="container"  >
                        <div class="row" >
                            <div class="col-md-12" style="">
                                <div class="welcome-left-sec-wrapper">
                                    <span style="color: #00811c; font-size: 20px;">Welcome to <span class="txt-highlt">Lion Mini Mart</span> ..</span>
                                </div>
                                <div class="log-sign-right-sec-wrapper">
                                    <?php
                                    if (!isset($_SESSION['cus_id'])) {
                                        echo '<a href="login.php"><label class="logon_pnl" style="color:#3E1818; font-size: 23px;">log in  &nbsp;&nbsp;/</label></a>';
                                        echo '<a href="register.php"><label style="color:#3E1818; font-size: 23px;">Create account</label></a>';
                                    } else {
                                        $cus_name = $_SESSION['uname'];
//                                        echo '<button type="button" style="margin:2px;" class="btn btn-success btn-md" value = ' . $cus_name . ' id = "profil">Welcome ' . $cus_name . ' !</buttn>';
                                        echo '<button type="button" style="margin:2px;  background-color: #5d5df3e3;" class="btn btn-primary btn-md" value = ' . $cus_name . ' id = "profil">My Profile</buttn>';
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
                                        <input type="text" name="search" style="width: 500px;" maxlength="20">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="topmenu-righticons-sec-wrapper">
                                    <span class="topmenu-cart-icon-sec-wrapper">
                                        <?php
                                        if (!isset($_SESSION['cus_id'])) {
                                            echo '<a href="cart_item.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="items-num-wrapper item_tot" ></span></a>';
                                        } else {
                                            echo '<a href="cart_item.php" ><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="items-num-wrapper item_tot" ></span></a>';
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="menu-items-sec-wrapper bottom_head_cus">
                    <?php require_once('navbar_new.php'); ?>
                </div>
            </div>

            <!-- Mobile view -->
            <div class="mob-main-menu-wrapper top_head_cus2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mob-main-menu-top-sec-wrapper">
                                <div class="hamburger-menu-con-wrapper  " style="width: 74px; height: 94px; background-color: red; text-align: center;">
                                    <div id="mob-menu-hamburgerbtn-wrapper" class="hamburger-menu-wrapper" style="padding-bottom: 38px;">
                                        <span style="height: 10px; width: 62px;"></span>
                                        <span style="height: 10px; width: 62px;"></span>
                                        <span style="height: 10px; width: 62px;"></span>
                                    </div>
                                    <span class="menu-txt" style="padding-top: 16px; font-size: 26px;">menu</span>
                                </div>
                                <div class="mob-view-logo-sec-wrapper">
                                    <!--<a href="index.php"><img src="img/lion-mini-mart-logo.png" alt="Lion Mini Mart Logo"></a>-->
                                    <a href="#" style="text-decoration: none;"><p id="index_id" class="lion_text" style="">LION MINI MART</p>
                                        <div class="mob-menu-search-field-sec-wrapper" style="width: 100% !important ;">
                                            <input type="text" style="color: black; font-size: 20px; font-weight: bold;" name="search" placeholder="s e a r c h .." maxlength="20">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>

                                <div class="topmenu-righticons-sec-wrapper">
                                    <span class="topmenu-cart-icon-sec-wrapper">
                                        <?php
                                        if (!isset($_SESSION['cus_id'])) {
                                            echo '<a href="cart_item.php"> <i class="fa fa-shopping-cart" style="font-size: 50px; color:blue;" aria-hidden="true"></i>  <span class="items-num-wrapper item_tot">0</span></a>';
                                        } else {
                                            echo '<a href="cart_item.php"> <i style="font-size: 50px;" class="fa fa-shopping-cart" aria-hidden="true"></i>  <span class="items-num-wrapper item_tot">0</span></a>';
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>

                            <!--SECOND HEADER--> 
                            <div class="container" hi>
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

                    <div class="mob-menu-items-wrapper">
                        <?php require_once('navbar_mobil_view.php'); ?>
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
                        if (item_tot == null) {
                            $('.item_tot').html("0");
                        } else {
                            $('.item_tot').html(item_tot);
                        }

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

            //GO TO PROFIL BTN =================================================================
            $(document).on('click', '#index_id', function () {
                window.location.replace("index.php");
            });




        </script>

        <!-- jQuery  -->
        <!--<script src="js/jquery.min.js"></script>-->

        <!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>

        <!-- custom js -->
        <script src="js/lion-custom.js"></script>




    </body>
</html>