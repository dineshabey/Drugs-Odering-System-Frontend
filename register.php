
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

            <h3>CREATE YOUR ACCOUNT</h3>
            <div class="register">

                <div class="form-horizontal">
                    <div class="  register-top-grid">

                        <h3>PERSONAL INFORMATION</h3>

                        <div class="mation">

                            <span>First Name<label>*</label></span>
                            <input type="text" id="f_name" name="f_name"> 

                            <span>Last Name<label>*</label></span>
                            <input type="text" id="l_name" name="l_name"> 

                            <span>Email <label>*</label></span>
                            <input type="text" id="email" name="email"> 

                            <span> City<label>*</label></span>
                            <input type="text" id="city" name="city"> 

                            <span> Address<label>*</label></span>
                            <input type="text" id="address" name="address"> 

                            <span> Phone Number<label>*</label></span>
                            <input type="text" id="phone" name="phone"> 
                        </div>
                        <div class="clearfix"> </div>
                        <a class="news-letter" href="#">
                            <label class="checkbox"><input type="checkbox" id="signup"  name="checkbox" checked=""><i> </i>Sign Up</label>
                        </a>
                    </div>
                    <!---728x90--->

                    <div class="  register-bottom-grid">
                        <h3>LOGIN INFORMATION</h3>
                        <div class="mation">
                            <span>Password<label>*</label></span>
                            <input type="text" id="password" name="password">
                            <span>Confirm Password<label>*</label></span>
                            <input type="text" id="confirm_password" name="confirm_password">
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="register-but">
                    <button class="btn btn-warning"  id="submit_btn">CREATE ACCOUNT</button>
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

                <script type="text/javascript">
                    $(document).on('click', '#submit_btn', function () {
                        reg_cus();
                    });

                    //COUSTOMER REF FUNCTION====================================
                    function reg_cus() {
                        var f_name = $('#f_name').val();
                        var l_name = $('#l_name').val();
                        var email = $('#email').val();
                        var city = $('#city').val();
                        var address = $('#address').val();
                        var phone = $('#phone').val();
                        var password = $('#password').val();
                        var confirm_password = $('#confirm_password').val();


                        var send_obj = {f_name: f_name, l_name: l_name, email: email, city: city, address: address, phone: phone, password: password, confirm_password: confirm_password};

                        $.post("./loaddata.php", {action: 'reg_cus', send_obj: send_obj}, function (e) {
                            if (e === undefined || e.length === 0 || e === null) {
                                alert('Error in create account !');
                            } else {
                                window.location.replace("login.php");
                            }
                        }, "json");
                    }

                </script>


            </div>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>

