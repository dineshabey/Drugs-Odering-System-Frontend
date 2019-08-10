
<!--<TOP HEADER START -->
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
                <a href="index.php"><img src="images/logo.png" alt=" " /></a>
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
                    <div class="account"><a href="register.php"><span> </span>CREATE ACCOUNT</a></div>
                    <ul class="login" >
                        <li><a href="login.php"><span> </span>LOGIN </a></li> 
                    </ul>

                    <div class="cart"><a href="cart_item.php"><span class=""> </span></a><span style="font-weight: bold; background:#0000e6; font-size: large; color: #ffd700; border-radius: 32px 32px;" class="item_tot"> </span></div>
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







<!--//NEW NAV MENU BAR ------------------------------------------------------>

<div class="menu-container">
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
</div>



<script type="text/javascript">

    $(document).on('ready', function () {
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



</script>