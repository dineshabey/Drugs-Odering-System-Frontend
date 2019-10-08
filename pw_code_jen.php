<?php session_start(); ?>
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
            <?php // require_once('include/coustomer_header.php'); ?>
            <?php require_once('header2.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->


        <div class="container" style="padding-top: 50px;">


            <div class="form-horizontal" style="text-align: center;">
                <fieldset>
                    <!-- Form Name -->
                    <legend class=""><h4 class="table_font_size" style="color:black; font-weight: 500;">REGISTERED CUSTOMERS</h4></legend>

                    <div class="form-group">
                        <span class="help-block table_font_size">** Log into your email and enter 8 digit code here. </span>  
                        <label class="col-md-4 control-label table_font_size" for="textinput">Enter Code</label>  
                        <div class="col-md-4">
                            <input name="textinput" type="text" id="pw_code" placeholder="" class="form-control input-md  ">
                            <span class="help-block table_font_size"></span>  
                            <h4 id="msg" style="color: red;" class="table_font_size"></h4>
                        </div>
                    </div>
                  

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button  id="login_btn"  name="singlebutton" class="btn btn-success btn-md btn_font_size">CHANGE PASSWORD </button>
                            <!--<label style="padding-left: 20px;"> <a class="forgot" href="#">Forgot Your Password ?</a></label>-->
                        </div>
                    </div>

                    <form role="form" method="post" action="recover_pw.php" target="">
                        <div class="form-group">
                            <!--<label class="col-md-4 control-label" for="singlebutton"></label>-->
                            <label class="col-md-4 control-label" for="textinput"> </label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-danger btn-block" id="recover_id_btn"> Recover My Account</button>
                            </div>
                        </div>
                    </form>
                </fieldset>
                <fieldset>
                    <!-- Form Name -->
                    <!--<legend></legend>-->
                    <legend><h4 style="color: black; font-weight: 500;" class="table_font_size">NEW CUSTOMERS</h4></legend>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <!--<label class="col-md-4 control-label" for="textinput"> <p style="text-align: left;">By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p></label>-->  
                        <label class="col-md-4 control-label" for="singlebutton"></label>

                    </div>

                    <div class="form-group">
                        <!--<label class="col-md-4 control-label" for="singlebutton"></label>-->
                        <label class="col-md-4 control-label" for="textinput"> </label>
                        <div class="col-md-4">
                            <a class="acount-btn btn_font_size" href="register.php">Create an Account</a>
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
                        load_cart_item_list();
                        item_tot();
                    });

                    // LOGIN BTN FUNCTION ===============================================
                    $(document).on('click', '#login_btn', function () {
                        var pw = $('#password_login_page').val();
                        var confirm_password = $('#confirm_password').val();

                        if (pw.trim() == "") {
                            $("#msg").html("Password feild can not be empty !");
                            $("#password_login_page").focus();
                            return;
                        }
                        if (confirm_password.trim() == "") {
                            $("#passMasseg").html("Password feild can not be empty !");
                            $("#password_login_page").focus();
                            return;
                        }

                        if (confirm_password !== pw) {
                            $("#passMasseg").html("Password does not match !");
                            $("#password_login_page").focus();
                            return;
                        }

                        $.post(" ./loaddata.php", {action: 'pw_change', pw: confirm_password, cus_id_pw_chg: 'cus_id_pw_chg'}, function (e) {
                            if (e === undefined || e.length === 0 || e === null) {
                                alert('NO data Found ..Error !');
                            } else {
                                if (e == 1) {
                                    window.location.replace("user_profil.php");
                                }
                                if (e == 5) {
                                    window.location.replace("user_profil.php");
                                }
                                if (e == 0) {
                                    alert("Erro in login ! Erro code 0");
                                }
                                if (e == 750) {
                                    alert("Erro in login ! Erro code 750");
                                    //BILL NO INSERT ERROR
                                }
                                if (e == 760) {
                                    alert("Erro in login ! Erro code 760");
                                    //BILL NO UPDATE ERROR
                                }
                                if (e == 720) {
                                    alert("Erro in login ! Erro code 720");
                                    //ERRO IN UPDATE ADDED ITEM
                                }
                                if (e == 730) {
                                    alert("Erro in login ! Erro code 730");
                                    //ERRO IN INSERT CART ITEM TO USER
                                }
                                if (e == 9) {
//                                    alertify.error('Email or password incorrect, Try again !.');
                                    $('#msg').html("Email or password incorrect, Try again !.");
//                                    $("#phone").focus();
//                                    return;
                                }
                            }
                        }, "json");
                    });


                    $(document).on('keyup', '#email_login_page', function () {
                        setTimeout(function () {
                            $('#msg').html("");
                        }, 250);
                    });
                    $(document).on('keyup', '#password_login_page', function () {
                        setTimeout(function () {
                            $('#msg').html("");
                        }, 250);
                    });

                    //password show function ------------------------------
                    function myFunction() {
                        var x = document.getElementById("password_login_page");
                        var y = document.getElementById("confirm_password");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                        if (y.type === "password") {
                            y.type = "text";
                        } else {
                            y.type = "password";
                        }
                    }


                    //PASSWORD CONFIRM CHK -------------------------------------
                    $(document).on('keyup', '#confirm_password', function () {
                        setTimeout(function () {
                            var password = $('#password_login_page').val();
                            var conpassword = $('#confirm_password').val();
                            if (password === conpassword) {
                                $('#passMasseg').html('');
                            } else {
                                $('#passMasseg').html('Password Does Not Match');
                            }
                        }, 250);
                    });


                </script>


            </div>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>
</html>

