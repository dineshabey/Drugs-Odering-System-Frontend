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
                                        echo '<a href="login.php"><label class="logon_pnl" style="color:#3E1818; font-size: 23px; border: 1px solid black; " >log in  &nbsp;&nbsp;</label></a><span style=" border-left: 1px solid red; "></span>';
                                        echo '<a href="register.php"><label style="color:#3E1818; font-size: 23px; border: 1px solid black;">Create account</label></a>';
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

                <div class="menu-mid-sec-wrapper top_head_cus2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 menu-mid-sec-inner-wrapper">
                                <div class="top-menu-logo-sec-wrapper">
                                    <!--<a href="index.php"><img src="img/lion-mini-mart-logo.png" alt="Lion Mini Mart Logo"></a>-->
                                    <a href="index.php" style="text-decoration: none;"><p  class="lion_text">LION MINI MART</p></a>
                                </div>
                                <div class="top-menu-search-sec-wrapper">
                                    <div class="top-menu-search-field-sec-wrapper">
                                        <input type="text" name="search" id="search_text" style="width: 500px;" maxlength="20">
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
                                <div class="hamburger-menu-con-wrapper" id="mob-menu-hamburgerbtn-wrapper" style="width: 74px; height: 94px; background-color: red; text-align: center;">
                                    <div  class="hamburger-menu-wrapper" style="padding-bottom: 38px;">
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
                                            <input type="text"  style="color: black; font-size: 20px; font-weight: bold;" name="search" placeholder="s e a r c h .." maxlength="20">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                              <!--<input type="text" name="search" id="search_text" style="width: 500px;" maxlength="20">-->
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

     

      





