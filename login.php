
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
            <div class="row" style="padding-top: 50px;">
                <div class="col-lg-12">
                    <div class="account_grid" >
                        <div class=" login-right">
                            <h3>REGISTERED CUSTOMERS</h3>
                            <p>If you have an account with us, please log in.</p>
                            <form>
                                <div>
                                    <span>Email Address<label>*</label></span>
                                    <input type="text"> 
                                </div>
                                <div>
                                    <span>Password<label>*</label></span>
                                    <input type="text"> 
                                </div>
                                <a class="forgot" href="#">Forgot Your Password?</a>
                                <input type="submit" value="Login">
                            </form>
                        </div>
                        <!---728x90--->

                        <div class=" login-left">
                            <h3>NEW CUSTOMERS</h3>
                            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                            <a class="acount-btn" href="register.php">Create an Account</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!---->
        <!---728x90--->

        <div class="footer">
            <!--FOOTER--////////////////////////////////////////////////////////>-->
            <div class="header">
                <?php require_once('include/footer.php'); ?>
            </div>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>

