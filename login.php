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

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label table_font_size" for="textinput">User name</label>  
                        <div class="col-md-4">
                            <input name="textinput" type="text" id="email_login_page" placeholder="" class="form-control input-md  ">
                            <span class="help-block table_font_size">** User name should be email or phone number. </span>  
                        </div>
                    </div>
                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label table_font_size" for="passwordinput">Password </label>
                        <div class="col-md-4">
                            <input  name="passwordinput" type="password" id="password_login_page" placeholder="" class="form-control input-md textarea_input">
                            <h5 id="msg" class="table_font_size help-block" style="color: red;"></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label table_font_size" for="passwordinput"> Show Password</label>
                        <div class="col-md-4">
                            <label>
                                <input type="checkbox" onclick="myFunction()">
                            </label>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button  id="login_btn"  name="singlebutton" class="btn btn-success btn-md btn_font_size">LOGIN </button>
                            <!--<label style="padding-left: 20px;"> <a class="forgot" href="#">Forgot Your Password ?</a></label>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<label class="col-md-4 control-label" for="singlebutton"></label>-->
                        <label class="col-md-4 control-label" for="textinput"> </label>
                        <div class="col-md-4">
                            <a href="recover_pw.php"> <button type="submit"  class="btn btn-danger btn-block" id="recover_id_btn"> Recover My Account</button></a>
                        </div>
                    </div>

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

//                    //CART ADDED ITEM TOTAL ===========================================================
//                    function item_tot() {
//                        $.post("./loaddata.php", {action: 'item_total'}, function (e) {
//                            if (e === undefined || e.length === 0 || e === null) {
//                                $('#').html("NO data Found !");
//                            } else {
//                                var item_tot = (e['item_tot']);
//                                var item_tot_price = (e['item_tot_price']);
//                                $('.item_tot').html(item_tot);
//                                $('.item_tot_price').html(item_tot_price);
//                                //                    load_cart_item_list();
//                            }
//                            //    chosenRefresh();
//                        }
//                        , "json");
//                    }

                    //              LOGIN BTN FUNCTION ===============================================
                    $(document).on('click', '#login_btn', function () {
                        var mail = $('#email_login_page').val();
                        var pw = $('#password_login_page').val();
                        if (mail.trim() == "") {
                            alert('Feild can not be empty !');
                            //                            alertify.error("Feild can't be empty !");
                            $("#email_login_page").focus();
                            return;
                        }
                        if (pw.trim() == "") {
                            alert("Password feild can not be empty !");
                            $("#password_login_page").focus();
                            return;
                        }

                        if (mail == "admin" && pw == "go") {
                            window.open('../drugs_ordering_system_backend/index.php', '_blank');
                            return;
                        }
                        $.post(" ./loaddata.php", {action: 'user_login', email: mail, pw: pw}, function (e) {
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
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }

                </script>


            </div>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>
</html>

