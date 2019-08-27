<!--<TOP HEADER START -->
<link href="js/AlertifyJS-master/build/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="js/AlertifyJS-master/build/css/alertify.min.css" rel="stylesheet" type="text/css"/>
<script src="js/AlertifyJS-master/build/alertify.min.js" type="text/javascript"></script>


<div class="top-header" style="background: #FFD700;   border-bottom: 2px solid #fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ul class="support">
                    <li><a href="#"><label> </label></a></li>
                    <li><a href="#">24x7 live<span class="live"> support</span></a></li>
                </ul>
                <ul class="support">
                    <li class="van"><a href="#"><label> </label></a></li>
                    <li><a href="#">Fast shipping <span class="live">on any order </span></a></li>
                </ul>
            </div>
            <div class="col-lg-2" ></div>
            <div class="col-md-4" style="float: right">
                <!--<div class="" id="google_translate_element">-->		
                <div class="" id="">		
                    <select class="in-drop" style="float: right" id="">
                        <option value="volvo" class="in-of">English</option>
                        <option value="saab" class="in-of">Sinhala</option>
                    </select>

                </div>
            </div>
        </div>
    </div>
</div>

<!--<TOP HEADER END-->
<!--<BOTTOM HEADER START-->
<div class="bottom-header" style="background:green;">
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            <div class="col-md-2">
                <a href="index.php"><img src="images/logo_png.png" width="200px" height="150px" alt=" " /></a>
                <!--<a href="index.php"><span>Lion Vitamin </span></a>-->
            </div>

            <div class="col-md-5">
                <div class="input-group">
                    <input type="hidden" name="search_param" value="all" id="search_param">         
                    <input type="text" class="form-control" name="x" placeholder="Search term...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Search</button>
                    </span>
                </div>
            </div>
            <div class="col-md-5 " style="padding-top: 28px; ">
                <div class="" style="background: white; text-align: center;">
                    <?php
                    if (!isset($_SESSION['cus_id'])) {
                        echo'<div class="account "><a href="register.php"><span> </span>CREATE ACCOUNT</a></div>';
                    } else {
                        echo'<div class="account hidden"><a href="register.php"><span> </span>CREATE ACCOUNT</a></div>';
                    }
                    ?>

                    <ul class="login" >
                        <?php
                        if (!isset($_SESSION['cus_id'])) {
                            echo '<li><a href = "login.php"><span> </span>LOGIN </a></li>';
                        } else {
                            $cus_name = $_SESSION['uname'];
                            echo '<li><input type = "button" class="btn btn-info" value = ' . $cus_name . ' id = "profil"><span> </span> </a></li>';
                            echo' <li><input type="button" class="btn btn-warning" value="LOGOUT" id="log_out"><span> </span> </a></li> ';
                        }
                        ?>
                    </ul>

                    <?php
                    if (!isset($_SESSION['cus_id'])) {
                        echo '<div class="cart"><a href="cart_item.php"><span class=""> </span></a><span style="font-weight: bold; background:#0000e6; font-size: large; color: #ffd700; border-radius: 32px 32px;" class="item_tot"> </span></div>';
                    } else {
                        echo '<div class="cart hidden" ><a href="cart_item.php"><span class=""> </span></a><span style="font-weight: bold; background:#0000e6; font-size: large; color: #ffd700; border-radius: 32px 32px;" class="item_tot"> </span></div>';
                    }
                    ?>
                </div>
            </div>


        </div>

    </div>
</div>
<!--<BOTTOM HEADER END-->


<!--<NEW DROP DOWN MENU-->
<!--<div class="top-header " style="background:green; " >-->
<!--<BOTTOM  NEW HEADER START ------------------------------------------------->


<!--<BOTTOM  NEW HEADER END-->




<!--<BOTTOM HEADER END-->






<!--    <div class="menu-container">

        //NEW NAV MENU BAR ----------------------------------------------------
        <div class="menu " id="nav_menu_bar">  
            <ul class="nav_menu_bar">
                                <li class="nav_menu_bar">
                                    <ul>
                                        <li>
                                            <ul>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </li>
                
                                    </ul>
                                </li> 
            </ul>

        </div>
        //NEW NAV MENU BAR ----------------------------------------------------


        <div class="menu" id="" hidden="">
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
                <li><a href="#">Categories</a>
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
                        <li><a href="#">Programming</a>
                            <ul>
                                <li><a href="#">C++</a></li>
                                <li><a href="#">Java</a></li>
                                <li><a href="#">Python</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Social</a>
                            <ul>
                                <li><a href="#"><a href="https://www.jqueryscript.net/tags.php?/Facebook/">Facebook</a></a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Google Plus</a></li>
                                <li><a href="#">Pinterest</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Herbz</a>
                            <ul>
                                <li><a href="#"><a href="https://www.jqueryscript.net/tags.php?/Facebook/">Facebook</a></a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Google Plus</a></li>
                                <li><a href="#">Pinterest</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Vitamin</a>
                            <ul>
                                <li><a href="#"><a href="https://www.jqueryscript.net/tags.php?/Facebook/">Facebook</a></a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Google Plus</a></li>
                                <li><a href="#">Pinterest</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">About</a> </li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>




    </div>

</div>-->

<!--<NEW DROP DOWN MENU-->
<div class="top-header " style="background:green;">
    <div class="container " >
        <ul id="main-menu" class="sm sm-blue" style="background:green;">
            <li><a href="index.php">Home</a></li>

            <li><a href="#">Vitamin & Supliment</a>
                <ul>
                    <!--                    <li><a href="#">Introduction to SmartMenus jQuery</a></li>
                                        <li><a href="#">Themes</a></li>
                                        <li><a href="#">The author</a></li>-->
                    <li><a href="#">Multivitamins</a>
                        <ul>
                            <li><a href="#">Men's Multivitamins</a></li>
                            <li><a href="#">Whole Food Multivitamins</a></li>
                            <li><a href="#">Prenatal Multivitamins</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Letter Vitamin</a>
                        <ul>
                            <li><a href="index.php">Vitamins - A</a></li>
                            <li><a href="#">Vitamins - B</a></li>
                            <li><a href="#">Vitamins - c</a></li>
                        </ul>
                    </li>

                    <!--<li><a href="#">Old SmartMenus versions</a></li>-->
                </ul>
            </li>

            <li><a href="#">Natural Beauty & Skin</a>
                <ul>
                    <!--                    <li><a href="#">Introduction to SmartMenus jQuery</a></li>
                                        <li><a href="#">Themes</a></li>
                                        <li><a href="#">The author</a></li>-->
                    <li><a href="#">Popular Herbs</a>
                        <ul>
                            <li><a href="#">Turmeric</a></li>
                            <li><a href="#">Ashwagandha</a></li>
                            <li><a href="#">Melatonin</a></li>
                            <li><a href="#">Mushrooms</a></li>
                        </ul>
                    </li>

                    <!--<li><a href="#">Old SmartMenus versions</a></li>-->


                </ul>
            </li>
        </ul>

    </div>
</div>
<!--<BOTTOM HEADER END-->




<script type="text/javascript">

    $(document).on('ready', function () {
//        alert()
        //ONLOAD FUNCTION NAVIGATION BAR LOAD ------------------------------------------
        $(function () {
            var sliderData = '';
            $.post("./loaddata.php", {action: 'load_nav_bar_menu'}, function (e) {
                if (e === undefined || e.length === 0 || e === null) {
                    $('.nav_menu_bar').html("NO data Found ! ");
                } else {
                    $('.nav_menu_bar').html(e);


                }
            });
        });

    }); //ON LOAD FUCTION END
//LOG OUT BTN =================================================================
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