<?php
session_start();
if (!isset($_SESSION['cus_id_pw_recover'])) {
    echo "<input type='text' id='cus_id_pw' value='echo($_SESSION['cus_id_pw_recover']);'>";
}else{
    
}
?>
<!DOCTYPE html>
<html>

    <!--MAIN HEAD START -->
    <head> 
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <?php require_once('include/header.php'); ?>


        <!--UL RIHT MARK STYLE-->
        <style type="text/css">

        </style>
        <!--UL RIHT MARK STYLE-->

    </head>

    <body>
        <!--MENU SCRIPT-->
               <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
        <script type="text/javascript" src="jquery_menu/jquery.smartmenus.js"></script>
        <!--MENU SCRIPT-->

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
            <?php // require_once('include/coustomer_header.php');  ?>
            <?php require_once('header2.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->
        <div class="container" style="padding-top: 50px;">
            <div class="form-horizontal" style="text-align: center;">
                <fieldset>
                    <!-- Form Name -->
                    <legend class=""><h4 class="table_font_size" style="color:black; font-weight: 500;">Recover My Account</h4></legend>
                    <!-- Text input-->
                    <div class="form-group step1">
                        <label class="col-md-4 control-label table_font_size" for="textinput">Email</label>  
                        <div class="col-md-4">
                            <input name="textinput" type="text" id="email" placeholder="" class="form-control input-md  ">
                            <h4 id="msg" style="color: red;" class="table_font_size"></h4>
                            <span class="help-block table_font_size">** Enter your registered email with us.. </span>  
                        </div>
                    </div>
                    <div class="form-group step2">
                        <span class="help-block table_font_size">** Log into your email and enter 8 digit code here. </span>  
                        <label class="col-md-4 control-label table_font_size" for="textinput">Enter Code</label>  
                        <div class="col-md-4">
                            <input name="textinput" type="text" id="pw_code" placeholder="" class="form-control input-md  ">
                            <span class="help-block table_font_size"></span>  
                            <h4 id="msg" style="color: red;" class="table_font_size"></h4>
                        </div>
                    </div>
                    <!--<form role="form" method="post" action="Mail/vendor/test.php" target="">-->
                    <div class="form-group step1">
                        <!--<label class="col-md-4 control-label" for="singlebutton"></label>-->
                        <label class="col-md-4 control-label" for="textinput"> </label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-danger btn-block table_font_size" id="recover_id_btn"> Recover My Account</button>
                        </div>
                    </div>
                    <div class="form-group step2">
                        <!--<label class="col-md-4 control-label" for="singlebutton"></label>-->
                        <label class="col-md-4 control-label" for="textinput"> </label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-danger btn-block table_font_size" id="recover_id_btn"> Next</button>
                        </div>
                    </div>
                    <div class="form-group step2">
                        <!--<label class="col-md-4 control-label" for="singlebutton"></label>-->
                        <label class="col-md-4 control-label" for="textinput"> </label>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success btn-block table_font_size" id="resend_code"> Resend code</button>
                        </div>
                        <div class="col-md-2" style="">
                            <button type="submit" class="btn btn-success btn-block table_font_size" id="change_mail"> Change email</button>
                        </div>
                    </div>
                    <!--</form>-->
                </fieldset>
                <fieldset>

                    <div class="form-group">
                        <!--<label class="col-md-4 control-label" for="singlebutton"></label>-->
                        <label class="col-md-4 control-label" for="textinput"> </label>
                        <div class="col-md-4">
                            <a class="acount-btn btn_font_size" href="login.php">BACK</a>
                        </div>
                    </div>
                </fieldset>
            </div>


            <div></div>

        </div>
        <!---->
        <!---728x90--->

        <div class="footer">
            <!--FOOTER--////////////////////////////////////////////////////////>-->
            <div class="header">
                <?php require_once('include/footer.php'); ?>
                <script type="text/javascript">

                    $(document).on('ready', function () {

                        var u_id_pw = '<?php echo ($_SESSION['cus_id_pw_recover']); ?>;
                                if (u_id_pw) {
                            step2();
                        } else {
                            step1();
                        }

//                        load_cart_item_list();
//                        item_tot();
                    });
                    function step1() {
                        if (!$(".step2").hasClass("hidden")) {
                            $(".step2").addClass("hidden");
                        }
                    }
                    function step2() {
                        if ($(".step2").hasClass("hidden")) {
                            $(".step2").removeClass("hidden");
                        }
                        if (!$(".step1").hasClass("hidden")) {
                            $(".step1").addClass("hidden");
                        }
                    }
                    function step3() {
                        if ($(".step1").hasClass("hidden")) {
                            $(".step1").removeClass("hidden");
                        }
                        if (!$(".step2").hasClass("hidden")) {
                            $(".step2").addClass("hidden");
                        }
                    }

                    $(document).on('click', '#change_mail', function () {
                        $.post(" ./loaddata.php", {action: 'distroy_session'}, function (e) {
                            if (e === undefined || e.length === 0 || e === null) {
                                alert('NO data Found ..Error !');
                            } else {
                                if (e == "1") {
                                    alert('sesseon distroy');
                                    step3();
//                                    window.location.replace("user_profil.php");
                                } else {
                                    alert('Error in update');
                                }
                            }
                        }, "json");

                    });


                    $(document).on('click', '#resend_code', function () {

                    });


                    //       RECOVER ACCOUNT BTN ===============================================
                    $(document).on('click', '#recover_id_btn', function () {
                        var mail = $('#email').val();
                        if (mail.trim() == "") {
                            $('#msg').html("Email feild can not be empty !");
                            return;
                        }
                        $.post(" ./loaddata.php", {action: 'email_chk', email: mail}, function (e) {
                            if (e === undefined || e.length === 0 || e === null) {
                                alert('NO data Found ..Error !');
                            } else {
                                if (e == "1") {
                                    alert('go to next step');
                                    step2();
//                                    window.location.replace("user_profil.php");
                                }
                                if (e == "5") {
                                    alert('Error inserting pw ! error code 5');
//                                    window.location.replace("user_profil.php");
                                }
                                if (e == "6") {
                                    step2();
//                                    alert('pw update ok');
//                                    window.location.replace("user_profil.php");
                                }
                                if (e == "7") {
                                    alert('Error updating pw ! error code 7');
//                                    window.location.replace("user_profil.php");
                                }
                                if (e == "0") {
                                    $('#msg').html("Email not found. Try again !");
//                                    window.location.replace("user_profil.php");
                                }
                            }
                        }, "json");
                    });

                    $(document).on('keyup', '#email', function () {
                        setTimeout(function () {
                            var email = $('#email').val();
                            if (email.trim() == "") {
                                $('#msg').html("Email can't empty ");
                            } else {
                                $('#msg').html('');
                            }
                        }, 250);
                    });

                </script>


            </div>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>
</html>

