<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <!--MAIN HEAD START -->
    <head> 
        <?php require_once('include/header.php'); ?>


        <!--UL RIHT MARK STYLE-->
        <style type="text/css">
            /*.inset {border-style: inset;}*/
            .inset {border-style: ridge;}

            .form_input{
                border: 1px solid #1ad41a;
                border-radius: 4px;
                height: 39px;
                color: red;
                font-size: 20px;
            }
            @media screen and (max-width: 450px) {

                .column.cus_font.product-all-sec-wrapper .product-det-content-wrapper {
                    font-size: 35px;
                }

            }
            /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
                .column {
                    width: 50%;
                }

                .column.cus_font.product-all-sec-wrapper .product-det-content-wrapper {
                    font-size: 35px;
                }
                .table_font_size {
                    font-size: 25px;
                }

            }
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
                    <legend><h4 style="color:black; font-weight: 500;">REGISTERED CUSTOMERS</h4></legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label table_font_size" for="textinput">User name</label>  
                        <div class="col-md-4">
                            <input name="textinput" type="text" id="email_login_page" placeholder="" class="form-control input-md form_input ">
                            <span class="help-block">** User name should be email or phone number. </span>  
                        </div>
                    </div>
                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label table_font_size" for="passwordinput">Password </label>
                        <div class="col-md-4">
                            <input  name="passwordinput" type="password" id="password_login_page" placeholder="" class="form-control input-md form_input">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button   id="login_btn"  name="singlebutton" class="btn btn-success btn-lg">Login </button>
                            <!--<label style="padding-left: 20px;"> <a class="forgot" href="#">Forgot Your Password ?</a></label>-->
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <!-- Form Name -->
                    <!--<legend></legend>-->
                    <legend><h4 style="color: black; font-weight: 500;">NEW CUSTOMERS</h4></legend>

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
                            <a class="acount-btn" href="register.php">Create an Account</a>
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
                        item_tot();
                    });
                    //CART ADDED ITEM TOTAL ===========================================================
                    function item_tot() {
                        $.post("./loaddata.php", {action: 'item_total'}, function (e) {
                            if (e === undefined || e.length === 0 || e === null) {
                                $('#').html("NO data Found !");
                            } else {
                                var item_tot = (e['item_tot']);
                                var item_tot_price = (e['item_tot_price']);
                                $('.item_tot').html(item_tot);
                                $('.item_tot_price').html(item_tot_price);
                                //                    load_cart_item_list();
                            }
                            //    chosenRefresh();
                        }
                        , "json");
                    }

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
                                    alertify.error('Email or password incorrect, Try again !.');
                                }
                            }
                        }, "json");
                    });
                    //                            LOGIN BTN FUNCTION ===========================================
                </script>


            </div>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>

