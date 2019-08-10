
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
            <?php require_once('include/coustomer_header.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->


        <div class="container">
            <div class="row" style="padding-top: 50px; padding-left: 10px; ">
                <div class="col-lg-1"></div>
                <div class="col-lg-8">
                    <div class="form-horizontal">
                        <div class="account_grid " >
                            <div class=" login-right">
                                <h3 class="form-group">REGISTERED CUSTOMERS</h3>
                                <p class="form-group">If you have an account with us, please log in.</p>
                                <div class="form-group">
                                    <span>Email Address<label>*</label></span>
                                    <input type="text" id="email_login_page"> 
                                </div>
                                <div  class="form-group">
                                    <span>Password<label>*</label></span>
                                    <input type="text" id="password_login_page"> 
                                </div>
                                <button  class="btn btn-info form-group" id="login_btn">LOGIN</button>
                                <label style="padding-left: 20px;"> <a class="forgot" href="#">Forgot Your Password ?</a></label>
                            </div>
                            <!---728x90--->

                            <div class=" login-left form-group" >
                                <h3>NEW CUSTOMERS</h3>
                                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                                <a class="acount-btn" href="register.php">Create an Account</a>
                            </div>
                            <!--<div class="clearfix"> </div>-->
                        </div>

                        <!--<div class="clearfix"> </div>-->
                    </div>
                </div>
            </div>
        </div>
        <!---->
        <!---728x90--->

        <div class="footer">
            <!--FOOTER--////////////////////////////////////////////////////////>-->
            <div class="header">
                <?php require_once('include/footer.php'); ?>
                <script type="text/javascript">
//                <!--//LOGIN BTN FUNCTION ===========================================-->
                    $(document).on('click', '#login_btn', function () {
                        var mail = $('#email_login_page').val();
                        var pw = $('#password_login_page').val();
                        $.post("./loaddata.php", {action: 'user_login', email: mail, pw: pw}, function (e) {
                            if (e === undefined || e.length === 0 || e === null) {
                                alert('NO data Found ..Error !');
                            } else {

                                if (e == 1) {
                                    window.location.replace("user_profil.php");
                                } else {
                                    alert('Email or password incorrect, Try again !')
                                }
                            }
                        }, "json");
                    });
//                <!--//LOGIN BTN FUNCTION ===========================================-->
                </script>


            </div>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>

