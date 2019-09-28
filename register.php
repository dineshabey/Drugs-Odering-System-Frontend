
<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <!--MAIN HEAD START -->
    <head> 
        <?php require_once('include/header.php'); ?>

        <style type="text/css">
            .form_input{
                border: 1px solid #1ad41a;
                border-radius: 4px;
                height: 39px;
                color: red;
                font-size: 20px;
            }
        </style>

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
        <div class="" style="padding-bottom: 30px;"></div>

        <div class="container" style="text-align: center;">
            <div class="form-horizontal">
                <fieldset>
                    <!-- Form Name -->
                    <legend><h4 style="color: black; font-weight: 500;">CREATE YOUR ACCOUNT</h4></legend>
                    <legend>  
                        <!--<span class="col-md-2"></span>-->
                        <h5 style="text-align: center;font-weight: 800;color: black;">PERSONAL INFORMATION</h5>
                    </legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">First Name</label>  
                        <div class="col-md-4">
                            <input name="textinput" type="text" id="f_name" placeholder="" class="form-control input-md form_input">
                            <h5 id="f_name_msg" style="color: red;"></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Last Name</label>  
                        <div class="col-md-4">
                            <input name="textinput" type="text" id="l_name" placeholder="" class="form-control input-md form_input">
                            <h5 id="l_name_msg" style="color: red;"></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Email</label>  
                        <div class="col-md-4">
                            <input name="textinput" type="text" id="email" placeholder=" " class="form-control input-md form_input">
                            <h5 id="email_msg" style="color: red;"></h5>
                            <h5 id="email_msg_suc" style="color: blue;"></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">City</label>  
                        <div class="col-md-4">
                            <input name="textinput" type="text" id="city" placeholder="" class="form-control input-md form_input" required="">
                            <h5 id="city_msg" style="color: red;"></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Address</label>  
                        <div class="col-md-4">
                            <textarea name="textinput" type="text" id="address" placeholder="  " class="form-control input-md form_input"></textarea>
                            <h5 id="address_msg" style="color: red;"></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Phone Number</label>  
                        <div class="col-md-4">
                            <input name="textinput" type="text" id="phone" placeholder="" class="form-control input-md form_input phone_no">
                            <h5 id="phone_msg" style="color: red;"></h5>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <!-- Form Name -->
                    <legend>  <h5 style="text-align: center;"></h5></legend>
                    <legend> 
                        <!--<span class="col-md-2"></span>-->
                        <h5 class="" style="text-align: center;font-weight: 800;color: black;">LOGIN INFORMATION</h5>
                    </legend>


                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="passwordinput">Password </label>
                        <div class="col-md-4">
                            <input  name="passwordinput" type="password" id="password" placeholder="" class="form-control input-md form_input">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="passwordinput">Confirm Password </label>
                        <div class="col-md-4">
                            <input  name="passwordinput" type="password" id="confirm_password" placeholder="" class="form-control input-md form_input">
                            <h5 id="passMasseg" style="color: red;"></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<label class="col-md-4 control-label" for="singlebutton"></label>-->
                        <label class="col-md-4 control-label " for="textinput"> </label>
                        <div class="col-md-4">
                            <button class="btn btn-warning"  id="submit_btn">CREATE ACCOUNT</button>
                        </div>
                    </div>
                    <hr>
                </fieldset>
            </div>
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
                                $('#').html("NO data Found ! ");
                            } else {
                                var item_tot = (e['item_tot']);
                                var item_tot_price = (e['item_tot_price']);
                                $('.item_tot').html(item_tot);
                                $('.item_tot_price').html(item_tot_price);
//                    load_cart_item_list();
                            }
                            //    chosenRefresh();
                        }, "json");
                    }
                    //PHONE NUMBER FEILD ENTER NUMBERS ONLY VALIDATION ==================================
                    $(function () {
                        $('.phone_no').on('input', function () {
                            this.value = this.value
                                    .replace(/[^\d]/g, '');// numbers and decimals only

                        });
                    });
//                    FORM VALIDATION  START/////////////////////////////////////////////////////////////////////////

                    //PASSWORD CONFIRM CHK -------------------------------------
                    $(document).on('keyup', '#confirm_password', function () {
                        setTimeout(function () {
                            var password = $('#password').val();
                            var conpassword = $('#confirm_password').val();
                            if (password === conpassword) {
                                $('#passMasseg').html('');
                            } else {
                                $('#passMasseg').html('Password Does Not Match');
                            }
                        }, 250);
                    });


                    $(document).on('keyup', '#f_name', function () {
                        setTimeout(function () {
                            var f_name = $('#f_name').val();
                            if (f_name.trim() == "") {
                                $('#f_name_msg').html("First Name can't empty ");
                            } else {
                                $('#f_name_msg').html('');
                            }
                        }, 250);
                    });
                    $(document).on('keyup', '#l_name', function () {
                        setTimeout(function () {
                            var f_name = $('#l_name').val();
                            if (f_name.trim() == "") {
                                $('#l_name_msg').html("Last Name can't empty ");
                            } else {
                                $('#l_name_msg').html('');
                            }
                        }, 250);
                    });
                    $(document).on('keyup', '#city', function () {
                        setTimeout(function () {
                            var city = $('#city').val();
                            if (city.trim() == "") {
                                $('#city_msg').html("City Name can't empty ");
                            } else {
                                $('#city_msg').html('');
                            }
                        }, 250);
                    });
                    $(document).on('keyup', '#address', function () {
                        setTimeout(function () {
                            var city = $('#address').val();
                            if (city.trim() == "") {
                                $('#address_msg').html("Address can't empty ");
                            } else {
                                $('#address_msg').html('');
                            }
                        }, 250);
                    });
                    $(document).on('keyup', '#phone', function () {
                        setTimeout(function () {
                            var phone = $('#phone').val();
                            if (phone.trim() == "") {
                                $('#phone_msg').html("Phone number  can't empty ");
                            } else {
                                $('#phone_msg').html('');
                            }
                        }, 250);
                    });

                    $(document).on('keyup', '#email', function () {
                        setTimeout(function () {
                            var email = $('#email').val();
                            if (email.trim() == "") {
                                $('#email_msg').html("Email can't empty ");
                                $('#email_msg_suc').html("");
                            } else {
                                var valid = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(email) && email.length;
                                if (valid) {
//                                    $('#email_msg_suc').html("E-Mail address is valid");
                                    $('#email_msg').html("");
                                } else {
                                    $('#email_msg').html("E-Mail address is not valid");
                                    $('#email_msg_suc').html("");
                                }

                            }
                        }, 250);
                    });

//                    FORM VALIDATION END/////////////////////////////////////////////////////////////////////////


                    $(document).on('click', '#submit_btn', function () {
                        var f_name = $('#f_name').val();
                        var l_name = $('#l_name').val();
                        var email = $('#email').val();
                        var city = $('#city').val();
                        var address = $('#address').val();
                        var phone = $('#phone').val();
                        var password = $('#password').val();
                        var confirm_password = $('#confirm_password').val();
                        if (f_name.trim() == "") {
                            $('#f_name_msg').html("First Name can't empty ");
                            $("#f_name").focus();
                            return;
                        }
                        if (l_name.trim() == "") {
                            $('#l_name_msg').html("Last Name can't empty ");
                            $("#l_name").focus();
                            return;
                        }

                        //Email validation Start---------------------------------------
                        if (email.trim() == "") {
                            $('#email_msg').html("Email can't empty ");
                            $("#email").focus();
                            return;
                        } else {
                            var valid = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(email) && email.length;
                            if (!valid) {
                                $('#email_msg').html("E-Mail address is not valid ");
                            }
                        }
                        //Email validation End---------------------------------------

                        if (city.trim() == "") {
                            $('#city_msg').html("City can't empty ");
                            $("#city").focus();
                            return;
                        }
                        if (address.trim() == "") {
                            $('#address_msg').html("Address can't empty ");
                            $("#address").focus();
                            return;
                        }
                        if (phone.trim() == "") {
                            $('#phone_msg').html("Phone number  can't empty ");
                            $("#phone").focus();
                            return;
                        }
                        if (password.trim() == "") {
                            $('#password_msg').html("Password can't empty ");
                            $("#password").focus();
                            return;
                        }
                        if (confirm_password.trim() == "") {
                            $('#password_msg').html("Please enter confirm password ");
                            $("#confirm_password").focus();
                            return;
                        }

                        $.post("./loaddata.php", {action: 'check_user_email_phone', email: email, phone: phone}, function (e) {
                            if (e === undefined || e.length === 0 || e === null) {
                                alert('Error in query');
                            } else {
                                if (e == "0") {
//                                    EMAIL & PHONE NUMBER IS OK -------------------------
                                    reg_cus();
                                }
                                if (e == 5) {
                                    $('#phone_msg').html("Error ! Phone number alrady registered");
                                    $('#email_msg').html("Error ! Email alrady registered");
                                    $("#email").focus();
                                    return;

                                }
                                if (e == 4) {
                                    $('#email_msg').html("Error ! Email alrady registered");
                                    $("#email").focus();
                                    return;
                                }
                                if (e == 3) {
                                    $('#phone_msg').html("Error ! Phone number alrady registered");
                                    $("#phone").focus();
                                    return;
                                }

                            }
                        }, "json");
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
                                if (e == 751) {
                                    alert("Error ! code 751");
                                }
                                if (e == 752) {
                                    alert("Error ! code 752");
                                }
                                if (e == 2) {
                                    alert("Error ! error data inserting");
                                }
                                if (e == 1) {
                                    window.location.replace("login.php");
                                }

                            }
                        }, "json");
                    }

                </script>


            </div>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>

