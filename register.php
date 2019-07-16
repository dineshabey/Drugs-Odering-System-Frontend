
<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <!--MAIN HEAD START -->
    <head> 
        <?php require_once('include/header.php'); ?>
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

            <div class="register">

                <div class="form-horizontal">
                    <form> 
                        <div class="  register-top-grid">
                            
                            <h3>PERSONAL INFORMATION</h3>
                              
                            <div class="mation">
                                
                                <span>First Name<label>*</label></span>
                                <input type="text"> 

                                <span>Last Name<label>*</label></span>
                                <input type="text"> 

                                <span>Email <label>*</label></span>
                                <input type="text"> 

                                <span> City<label>*</label></span>
                                <input type="text"> 

                                <span> Address<label>*</label></span>
                                <input type="text"> 

                                <span> Phone Number<label>*</label></span>
                                <input type="text"> 
                            </div>
                            <div class="clearfix"> </div>
                            <a class="news-letter" href="#">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up</label>
                            </a>
                        </div>
                        <!---728x90--->

                        <div class="  register-bottom-grid">
                            <h3>LOGIN INFORMATION</h3>
                            <div class="mation">
                                <span>Password<label>*</label></span>
                                <input type="text">
                                <span>Confirm Password<label>*</label></span>
                                <input type="text">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
                <div class="register-but">
                    <form>
                        <input type="submit" value="submit">
                        <div class="clearfix"> </div>
                    </form>
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

