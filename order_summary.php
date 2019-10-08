<?php
session_start();
if (!isset($_SESSION['cus_id'])) {
    echo "<script>location.href='login.php';</script>";
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
            .alertify .ajs-dialog {
                top: 30%;
                /*transform: translateY(-50%);*/
                margin: auto;
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
            <?php // require_once('include/coustomer_header_for_client.php'); ?>
            <?php require_once('include/header_client.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->


        <div class="container">
            <div class="row " style="padding-top: 2px;"></div>
            <!--<hr style="  border-top: 1px solid red;">-->
            <h3 style="text-align: center;"><a href="index.php"><span style="border: 1px solid blue;"> HOME </span></a> >><a href="user_profil.php"><span style="border: 1px solid blue;">Client Area</span></a>>><span>Order Summary</span></h3>


            <!--ORDER SUMMARY DIV START======================================================================-->
            <div class="" hidden="">
                <div class="order_summary" id="order_summary" style="padding-top: 50px;  background: white;">
                    <!--<legend>Order Summary</legend>-->
                    <div id="order_smry_tab" style="background: bisque;">
                        <div class="col-lg-6" id="order_smry_tab" style="border: 1px solid blue;">
                            <div class="scrollable" style="height: auto; overflow-y: auto">
                                <table class="table table-hover datable added_item_summary table_font_size" id="added_item_summary">
                                    <thead>
                                        <tr style="background-color: #dcfdff;">
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>QTY</th>
                                            <th>Per Item</th>
                                            <th>Discount</th>
                                            <th> Total</th>
                                        </tr>
                                    </thead>
                                    <input type="hidden" id="hideStrt">
                                    <tbody style="background-color: #f6f78061;">                                                             
                                        <!--<tr><td>Btton</td></tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6" style="border: 1px solid white; background: white;" hidden="">
                            <div class="row" style="text-align: center;" >
                                <div class="form-horizontal table_font_size" >
                                    <legend>Order Summary</legend>
                                    <div class="form-group">
                                        <label style="width: 50%; text-align: ;" class="col-md-6 control-label" for="textinput">Total Item Price (LKR):</label>  
                                        <label style="text-align: left;" class="col-md-6 control-label tot_price"   for="textinput"></label>  
                                    </div>
                                    <div class="form-group">
                                        <label style="width: 50%; text-align: ;" class="col-md-6 control-label" for="textinput">Total Discount Price (LKR):</label>  
                                        <label style="text-align: left;" class="col-md-6 control-label tot_discount"  for="textinput"></label>  
                                    </div>
                                    <div class="form-group" >
                                        <label style="width: 50%; text-align: ; color:red;" class="col-md-6 control-label" for="textinput">Total Order Value  (LKR):</label>  
                                        <label style="color:red; text-align: left;" class="col-md-6 control-label tot_order_val"  for="textinput"></label>  
                                    </div>
                                </div>
                            </div>
                            <!--HIDDEN VALUE //////////////////////////////////////////////////////////////////////////////////////////////////-->
                            <!--ODER VALUES ==============================================================-->
                            <input type="text" hidden="" class="tot_order_val" id="tot_order_val_hidden">
                            <input type="text" hidden="" class="tot_discount" id="tot_discount_hidden">
                            <input type="text"  hidden="" class="item_bill_no" id="item_bill_no">
                            <!--ODER VALUES ==============================================================-->
                            <input type="text" id="shipping_id"  hidden="">
                            <input type="text" hidden="" >
                            <!--HIDDEN VALUE //////////////////////////////////////////////////////////////////////////////////////////////////-->

                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="padding-bottom: 10px; padding-top: 10px; ">
                <!--<div class="col-lg-12 next_stp_delivery_deatils" style="text-align: center; background: #b3b3f7; margin: 15px;"><button class="btn btn-primary table_font_size" id="next_stp_delivery_deatils">NEXT STEP >></button></div>-->
                <div class="col-lg-12 next_stp_delivery_deatils_back" style="text-align: center; background: green; margin: 15px;"><button class="btn btn-primary table_font_size" id="next_stp_delivery_deatils_back"><< BACK TO ORDER SUMMARY</button></div>
            </div>
            <!--ORDER SUMMARY DIV END========================================================================-->



            <!--DELIVERY DEATAILS SUMMARY DIV START========================================================================-->
            <div class="row" id="delivery_deatails_tab">
                <div class="col-lg-12 table_font_size" style="background-color: antiquewhite; text-align: center;" >
                    <div class="form-horizontal" >
                        <fieldset>
                            <!-- Form Name -->
                            <!--<div><button class="btn btn-primary" id="next_stp_delivery_deatils">NEXT STEUP</button></div>-->
                            <!--                            <div><button class="btn btn-primary" id="next_stp_delivery_deatils_back">BACK</button></div>-->
                            <legend class="table_font_size">Delivery Details</legend>

                            <div class="table_font_size">
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Recipient's Name</label>  
                                    <div class="col-md-7">
                                        <input  name="textinput" disabled="" id="recipient_name" type="text" placeholder="Recipient's Name" class="form-control input-md" required="">
                                        <h5 id="recipient_name_error_msg" class="table_font_size help-block" style="color: red;"></h5>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Recipient's Phone</label>  
                                    <div class="col-md-7">
                                        <input  name="textinput" disabled="" id="recipient_phone" type="text" placeholder="077123****" class="form-control input-md">
                                        <h5 id="phone_error_msg" class="table_font_size help-block" style="color: red;"></h5>

                                    </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textarea">Message (Optional)</label>
                                    <div class="col-md-7">                     
                                        <textarea class="form-control textarea_input" disabled=""  id="msg" name="textarea"></textarea>
                                        <h5 id="user_error_msg" class="table_font_size help-block" style="color: red;"></h5>
                                    </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textarea">Delivery Address</label>
                                    <div class="col-md-7">                     
                                        <textarea class="form-control textarea_input"  disabled="" id="address" name="textarea"></textarea>
                                        <h5 id="address_error_msg" class="table_font_size help-block" style="color: red;"></h5>
                                    </div>
                                </div>

                                <!-- Multiple Radios -->
                                <div class="form-group" hidden="">
                                    <label class="col-md-4 control-label" for="radios">Payment option</label>
                                    <div class="col-md-4"> 
                                        <label class="radio-inline" for="radios-0">
                                            <input type="radio" name="radios" id="card" value="1" checked="checked">
                                            Card Payment
                                        </label> 
                                        <label class="radio-inline" for="radios-1">
                                            <input type="radio" name="radios" id="bank" value="2">
                                            Normal Bank Payment
                                        </label> 
                                    </div>
                                </div>


                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for=""></label>
                                    <div class="btn-group" role="group">
                                        <button type="button" id="next_step" name=""  class="next_step btn btn-primary hidden btn_font_size">NEXT STEP >></button>
                                        <button  type="button" id="next_step_edit" name="" class="next_step_edit btn btn-primary btn_font_size">EDIT DEATAILS</button>
                                        <button  type="button" id="next_step_reset" name="" class="next_step_reset btn btn-danger hidden table_font_size">RESET</button>
                                        <button id="next_step_update" name=""  class="next_step_update btn btn-info table_font_size">UPDATE DEATAILS</button>
                                        <button  type="button" id="order_confirm" name="" class="order_confirm btn btn-success hidden btn_font_size">ODER CONFIRM >></button>
                                        <!--<button id="start_card_payment_btn"  name="" class="start_card_payment_btn btn btn-info btn-md table_font_size hidden">COMPLETE TRANSACTION</button>-->
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <!--DELIVERY DEATAILS SUMMARY DIV END  ========================================================================-->

            <!--PAYMENT OPTION  DIV START  =================================================================================-->

            <!--<hr style="  border-top: 1px solid red;">-->

            <div class="hidden payment_tab" id="payment_tab" style=" padding-top:20px;">
                <div class="row"  style="background-color: green; text-align: center;">
                    <!--<button class="btn btn-primary table_font_size"  id="show_delevery_deatails"><< BACK TO DELIVERY DEATAILS</button>-->
                </div>

                <!--<hr style="  border-top: 1px solid red;">-->
                <div class="" style="background-color: #f5fdff;">
                    <!-- Text input-->

                    <!--NEW PAYMENT OPTION RADIO BTN -------------------------------->
                    <div>
                        <h3 class="">Payment option</h3>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label table_font_size">Card Payment</label> 
                                <div class="col-md-4"> 
                                    <label class="" for="radios-0">
                                        <input type="radio" name="radios" id="card" value="1" checked="checked">
                                    </label> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label table_font_size">Normal Bank Payment</label> 
                                <div class="col-md-4"> 
                                    <label class="" for="radios-1">
                                        <input type="radio" name="radios" id="bank" value="2">
                                    </label> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--NEW PAYMENT OPTION RADIO BTN -------------------------------->
                    <div>
                        <form class="form-horizontal table_font_size" hidden="">
                            <fieldset>
                                <!-- Form Name -->
                                <legend>Payment Option</legend>
                                <!-- Select Basic -->
                                <div class="form-group table_font_size">
                                    <label class="col-md-4 control-label" for="selectbasic">Select payment option </label>
                                    <div class="col-md-5">
                                        <select class="form-control" id="payment_method">
                                            <option value="0">--SELECT PAYMENT METHOD--</option>
                                            <option value="1">Card Payment</option>
                                            <option value="2">Normal bank payment</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                        <div class="form-group" >
                            <button id="start_card_payment_btn"  name="" class="start_card_payment_btn btn btn-info btn-md table_font_size ">COMPLETE TRANSACTION</button>
                        </div>

                    </div>

                    <div class="row col-md-12 hidden normal_payment table_font_size" id="normal_payment" style="border-style:dotted solid; border-width: 2px 2px 2px 10px; border-color:red; background-color: white; color: #0b33ce;">
                        <span class="border border-primary" > 
                            <h3>CARD PAYMENT</h3>
                            <p>You can pay now , 
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Cradit / Debit Card</th>
                                        <th>Mobile Wallet</th>
                                        <th>Internet Banking</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Visa Card</td>
                                        <td>Ezi Cash</td>
                                        <td>Sampath Vishwa</td>
                                    </tr>
                                    <tr>
                                        <td>Master Card</td>
                                        <td>M Cash</td>
                                        <td>HNB </td>
                                    </tr>
                                    <tr>
                                        <td>American Express</td>
                                        <td>E Wallet</td>
                                    </tr>
                                </tbody>
                            </table>

                            </p>
                        </span>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for=""></label>
                                <div class="col-md-4">
                                    <button id="start_card_payment_btn"  name="" class="btn btn-info btn-lg">COMPLETE TRANSACTION</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12 hidden bank_payment table_font_size" id="bank_payment" style="border-style:dotted solid; border-width: 2px 2px 2px 10px; border-color:red; background-color: white; color: #0b33ce;">
                        <h3>NORMAL PAYMENT</h3>
                        <p >When you gonna pay make sure to select the payment method as Send/Transfer/Deposit. Then you can pay using any of these methods. Just send us a photo or screenshot of receipt.</p>
                        <h4>Bank Deatails</h4>
                        <p style="">
                            <label>Bank  : Sampath Bank</label><br>
                            <label>Branch : Anamaduwa</label><br>
                            <label>Account No : 33102560</label>
                        </p>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for=""></label>
                                <div class="col-md-4">
                                    <button id="start_normal_payment_btn"  name="" class="btn btn-info btn-lg">COMPLETE TRANSACTION</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" hidden="">
                    <img src="images/visa_master.png" width="200" height="100" title="White flower" alt="Flower">
                    <input type="checkbox" checked="checked" >
                </div>


                <!--PAY HEARE FORM START ////////////////////////////////////////////////////////////-->
                <form method="post" action="https://sandbox.payhere.lk/pay/checkout" hidden="">   
                    <input type="hidden" name="merchant_id" value="121XXXX">    <!-- Replace your Merchant ID -->
                    <input type="hidden" name="return_url" value="http://sample.com/return">
                    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
                    <input type="hidden" name="notify_url" value="http://sample.com/notify">  
                    <br><br>Item Details<br>
                    <input type="text" name="order_id" value="ItemNo12345">
                    <input type="text" name="items" value="Door bell wireless"><br>
                    <input type="text" name="currency" value="LKR">
                    <input type="text" name="amount" value="1000">  
                    <br><br>Customer Details<br>
                    <input type="text" name="first_name" value="Saman">
                    <input type="text" name="last_name" value="Perera"><br>
                    <input type="text" name="email" value="samanp@gmail.com">
                    <input type="text" name="phone" value="0771234567"><br>
                    <input type="text" name="address" value="No.1, Galle Road">
                    <input type="text" name="city" value="Colombo">
                    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
                    <input type="submit" value="Buy Now">   
                </form> 
                <!--PAY HEARE FORM END   ////////////////////////////////////////////////////////////-->

            </div>

        </div>
        <hr style="  border-top: 1px solid red;">

        <!--PAYMENT OPTION  DIV START  ========================================================================-->

        <!---->
        <!---728x90--->
        <!--FOOTER--////////////////////////////////////////////////////////>-->
        <div class="footer">
            <?php require_once('include/footer.php'); ?>

            <script type="text/javascript">
                $(document).on('ready', function () {
                    added_item_tot();
                    added_item_qty_user_log();
                    load_user_added_item();
                    get_shipping_deatails();
//                    if (!$("#delivery_deatails_tab").hasClass("hidden")) {
//                        $("#delivery_deatails_tab").addClass("hidden");
//                    }
                    if (!$(".next_stp_delivery_deatils_back").hasClass("hidden")) {
                        $(".next_stp_delivery_deatils_back").addClass("hidden");
                    }

                });
                //DELETE ADDED ITEM  ===========================================
                $(document).on('click', '#cancel_order', function () {
                    cancel_order();
                });
                //ODER CONFIRM BTN ===========================================
                $(document).on('click', '#order_confirm', function () {


                    window.location.replace("transaction_method.php");

//                    if ($("#payment_tab").hasClass("hidden")) {
//                        $("#payment_tab").removeClass("hidden");
//                    }
//                    if (!$(".order_summary").hasClass("hidden")) {
//                        $(".order_summary").addClass("hidden");
//                    }
//                    if (!$("#delivery_deatails_tab").hasClass("hidden")) {
//                        $("#delivery_deatails_tab").addClass("hidden");
//                    }
//                    if (!$("#next_stp_delivery_deatils_back").hasClass("hidden")) {
//                        $("#next_stp_delivery_deatils_back").addClass("hidden");
//                    }
                });
                //PAUMENT METHOD BTN ===========================================
                $(document).on('change', '#payment_method', function () {
                    if ($("#payment_tab").hasClass("hidden")) {
                        $("#payment_tab").removeClass("hidden");
                    }
                    if (!$(".order_summary").hasClass("hidden")) {
                        $(".order_summary").addClass("hidden");
                    }

                    var pay_type = $(this).val();
                    if (pay_type == '0') {
                        //SELECT PAYMENT METHOD //////////////////////////////
                        if (!$(".bank_payment").hasClass("hidden")) {
                            $(".bank_payment").addClass("hidden");
                        }
                        if (!$(".normal_payment").hasClass("hidden")) {
                            $(".normal_payment").addClass("hidden");
                        }

                    } else if (pay_type == '1') {
                        //CARD PAYMENT///////////////////////////////////////
                        if ($(".normal_payment").hasClass("hidden")) {
                            $(".normal_payment").removeClass("hidden");
                            if (!$(".bank_payment").hasClass("hidden")) {
                                $(".bank_payment").addClass("hidden");
                            }
                        }
                    } else {
                        //NORMAL PAYMENT////////////////////////////////////
                        if ($(".bank_payment").hasClass("hidden")) {
                            $(".bank_payment").removeClass("hidden");
                        }
                        if (!$(".normal_payment").hasClass("hidden")) {
                            $(".normal_payment").addClass("hidden");
                        }

                    }

                });
                //NEXT STEP BTN CLICK  ===========================================
                $(document).on('click', '#next_step_edit', function () {
                    //REMOVE DISABALE CLZ --------------------------------
                    $('#recipient_name').removeAttr("disabled");
                    $('#recipient_phone').removeAttr("disabled");
                    $('#address').removeAttr("disabled");
                    $('#msg').removeAttr("disabled");
                    if ($("#next_step_reset").hasClass("hidden")) {
                        $("#next_step_reset").removeClass("hidden");
                    }
                    if ($("#next_step_update").hasClass("hidden")) {
                        $("#next_step_update").removeClass("hidden");
                    }
                    if (!$(".next_step_edit").hasClass("hidden")) {
                        $(".next_step_edit").addClass("hidden");
                    }
                    if (!$("#order_confirm").hasClass("hidden")) {
                        $("#order_confirm").addClass("hidden");
                    }
                });
                //NEXT STEP RESET CLICK  ===========================================
                $(document).on('click', '#next_step_reset', function () {
                    //ADD DISABALE CLZ --------------------------------
                    $('#recipient_name').prop('disabled', true);
                    $('#recipient_phone').prop('disabled', true);
                    $('#address').prop('disabled', true);
                    $('#msg').prop('disabled', true);
                    if ($(".next_step_edit").hasClass("hidden")) {
                        $(".next_step_edit").removeClass("hidden");
                    }
                    if ($("#order_confirm").hasClass("hidden")) {
                        $("#order_confirm").removeClass("hidden");
                    }
                    if (!$(".next_step_update").hasClass("hidden")) {
                        $(".next_step_update").addClass("hidden");
                    }
                    if (!$(".next_step_reset").hasClass("hidden")) {
                        $(".next_step_reset").addClass("hidden");
                    }
                });
                //NEXT STEP BTN EDIT  ===========================================
                $(document).on('click', '#next_step', function () {
                    if ($(".order_confirm").hasClass("hidden")) {
                        $(".order_confirm").removeClass("hidden");
                    }
                    add_shipping_deatail();
                });
                //NEXT STEP DELIVERY DEATAILS BTN  ===========================================
                $(document).on('click', '#next_stp_delivery_deatils', function () {
                    if ($("#delivery_deatails_tab").hasClass("hidden")) {
                        $("#delivery_deatails_tab").removeClass("hidden");
                    }
                    if ($(".next_stp_delivery_deatils_back").hasClass("hidden")) {
                        $(".next_stp_delivery_deatils_back").removeClass("hidden");
                    }
                    if (!$("#order_smry_tab").hasClass("hidden")) {
                        $("#order_smry_tab").addClass("hidden");
                    }
                    if (!$(".next_stp_delivery_deatils").hasClass("hidden")) {
                        $(".next_stp_delivery_deatils").addClass("hidden");
                    }
                });
                //NEXT STEP DELIVERY DEATAILS BACK BTN  ===========================================
                $(document).on('click', '#next_stp_delivery_deatils_back', function () {
                    if ($("#order_smry_tab").hasClass("hidden")) {
                        $("#order_smry_tab").removeClass("hidden");
                    }
                    if ($(".next_stp_delivery_deatils").hasClass("hidden")) {
                        $(".next_stp_delivery_deatils").removeClass("hidden");
                    }
                    if (!$(".next_stp_delivery_deatils_back").hasClass("hidden")) {
                        $(".next_stp_delivery_deatils_back").addClass("hidden");
                    }
                    if (!$("#delivery_deatails_tab").hasClass("hidden")) {
                        $("#delivery_deatails_tab").addClass("hidden");
                    }
                });
                //NEXT STEP BTN UPDATE  ===========================================
                $(document).on('click', '#next_step_update', function () {
                    update_shipping_deatail();
                });
                //SHOW DELIVERY DEATAILS  ======================================
                $(document).on('click', '#show_delevery_deatails', function () {
                    if ($(".order_summary").hasClass("hidden")) {
                        $(".order_summary").removeClass("hidden");
                    }
                    if (!$("#payment_tab").hasClass("hidden")) {
                        $("#payment_tab").addClass("hidden");
                    }
                    if ($("#delivery_deatails_tab").hasClass("hidden")) {
                        $("#delivery_deatails_tab").removeClass("hidden");
                    }
                    if ($("#next_stp_delivery_deatils_back").hasClass("hidden")) {
                        $("#next_stp_delivery_deatils_back").removeClass("hidden");
                    }
                });

                $(document).on('keyup', '#recipient_name', function () {
                    setTimeout(function () {
                        var recipient_name = $('#recipient_name').val();
                        if (recipient_name.trim() == "") {
                            $('#recipient_name_error_msg').html("Please enter recipient name !. ");
                        } else {
                            $('#recipient_name_error_msg').html('');
                        }
                    }, 250);
                });
                $(document).on('keyup', '#recipient_phone', function () {
                    setTimeout(function () {
                        var recipient_phone = $('#recipient_phone').val();
                        if (recipient_phone.trim() == "") {
                            $('#phone_error_msg').html("Please enter recipient phone !.");
                        } else {
                            $('#phone_error_msg').html('');
                        }
                    }, 250);
                });
                $(document).on('keyup', '#address', function () {
                    setTimeout(function () {
                        var address = $('#address').val();
                        if (address.trim() == "") {
                            $('#address_error_msg').html("Please enter recipient address !.");
                        } else {
                            $('#address_error_msg').html('');
                        }
                    }, 250);
                });


                //START CARD PAYMENT BTB  ======================================
                $(document).on('click', '#start_card_payment_btn', function () {
                    added_item_tot();
                    var oder_val = parseFloat($('#tot_order_val_hidden').val());
                    var tot_discount_val = parseFloat($('#tot_discount_hidden').val());
                    var shipping_id = parseInt($('#shipping_id').val());
                    var item_bill_no = parseInt($('#item_bill_no').val());
                    if (isNaN(oder_val)) {
                        alert('Not found item Order value');
                        return;
                    }
                    if (isNaN(tot_discount_val)) {
                        alert('Not found item discount');
                        return;
                    }
                    if (isNaN(shipping_id)) {
                        alert('Not found shipping id');
                        return;
                    }
                    if (isNaN(item_bill_no)) {
                        alert('Not found item bill_no ');
                        return;
                    }
                    var send_object = {oder_val: oder_val, tot_discount_val: tot_discount_val, shipping_id: shipping_id, bill_no: item_bill_no};
                    $.post("./loaddata.php", {action: 'card_payment_complete', send_obj: send_object}, function (e) {
                        if (e === null || e === undefined || e.length === 0) {
                            alert("Data not found");
                        } else {

                            if (e == 100) {
                                alert('Error ! Error code 100');
                                return;
                            }
                            if (e == 200) {
                                alert('Error ! Error code 200');
                                return;
                            }
                            if (e == 300) {
                                alert('Error ! Error code 300');
                                return;
                            }
                            if (e == 400) {
                                alert('Error ! Error code 400');
                                return;
                            }
                            if (e == 500) {
                                alert('Error ! Error code 500');
                                return;
                            }
                            if (e == 1) {
                                alertify.success("Thank you ! Payment successfully ..");
                                window.open('user_profil.php', '_top');
                                return;
                            }
                            if (e == 2) {
                                alert('Error Transaction');
                                return;
                            }
                        }
                    }, "json");
                });
                //NEW FUCTION ////////////////////////////////////////////////////////////////////////
//                PAY CARD PAYMENT FUNCTION  START##########################################################
                function card_payment() {
                    added_item_tot();
                    var oder_val = parseFloat($('#tot_order_val_hidden').val());
                    var tot_discount_val = parseFloat($('#tot_discount_hidden').val());
                    var shipping_id = parseInt($('#shipping_id').val());
                    var item_bill_no = parseInt($('#item_bill_no').val());
                    if (isNaN(oder_val)) {
                        alert('Not found item Order value');
                        return;
                    }
                    if (isNaN(tot_discount_val)) {
                        alert('Not found item discount');
                        return;
                    }
                    if (isNaN(shipping_id)) {
                        alert('Not found shipping id');
                        return;
                    }
                    if (isNaN(item_bill_no)) {
                        alert('Not found item bill_no ');
                        return;
                    }
                    var send_object = {oder_val: oder_val, tot_discount_val: tot_discount_val, shipping_id: shipping_id, bill_no: item_bill_no};
                    $.post("./loaddata.php", {action: 'card_payment_complete', send_obj: send_object}, function (e) {
                        if (e === null || e === undefined || e.length === 0) {
                            alert("Data not found");
                        } else {

                            if (e == 100) {
                                alert('Error ! Error code 100');
                                return;
                            }
                            if (e == 200) {
                                alert('Error ! Error code 200');
                                return;
                            }
                            if (e == 300) {
                                alert('Error ! Error code 300');
                                return;
                            }
                            if (e == 400) {
                                alert('Error ! Error code 400');
                                return;
                            }
                            if (e == 500) {
                                alert('Error ! Error code 500');
                                return;
                            }
                            if (e == 1) {
                                alertify.success("Thank you ! Payment successfully ..");
                                window.open('user_profil.php', '_top');
                                return;
                            }
                            if (e == 2) {
                                alert('Error Transaction');
                                return;
                            }
                        }
                    }, "json");
                }
//                PAY CARD PAYMENT FUNCTION   END##########################################################
                //NEW FUCTION ////////////////////////////////////////////////////////////////////////





                //LOAD USER ADDED ITEM TABLE====================================================
                function load_user_added_item() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'added_item_summary'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr style="font-weight: bold;  font-size: 18px;">';
                                tableData += '<td width="">' + index + '</td>';
                                tableData += '<td width=""> ' + qData.item_name + ' </td>';
                                tableData += '<td width=""> ' + qData.item_qty + ' </td>';
                                tableData += '<td width="">' + qData.item_price + '</td>';
                                tableData += '<td width="" style="color:red;">' + qData.oder_full_discount + '</td>';
                                tableData += '<td width="">' + qData.oder_full_pay_val + '</td>';
                                tableData += '</tr>';
                                $('#item_bill_no').val(qData.bill_no);
                            });
                            tableData += '<tr><td colspan="9" ><a href="user_profil.php"><button type="button" class="btn btn-success table_font_size"> << Back</button></a>&nbsp;&nbsp;&nbsp;<button id="cancel_order" class="btn btn-danger table_font_size fa fa-times btn-lg"> Remove order</button></td></tr>';
                        }
                        $('.added_item_summary tbody').html(tableData);
                    }, "json");
                }

                //USER ADDED ITEM TOTAL ===========================================================
                function added_item_tot() {
                    $.post("./loaddata.php", {action: 'added_item_tot'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            $('.item_tot').html("NO data Found ! ");
                        } else {
                            var oder_full_tot = (e['oder_full_tot']);
                            var oder_full_pay_val = (e['oder_full_pay_val']);
                            var oder_full_discount = (e['oder_full_discount']);
                            $('.tot_price').html(oder_full_tot);
                            $('.tot_discount').html(oder_full_discount);
                            $('.tot_order_val').html(oder_full_pay_val);
                            $('.item_tot_price').html(oder_full_pay_val);
                            //HIDEN VAL SET==========================
                            $('#tot_order_val_hidden').val(oder_full_pay_val);
                            $('#tot_discount_hidden').val(oder_full_discount);
                            //                            load_cart_item_list();
                        }
                        //                            chosenRefresh();
                    }, "json");
                }
                //GET SHIPPING DEATAILS  =======================================
                function get_shipping_deatails() {
                    $.post("./loaddata.php", {action: 'get_shipping_deatails'}, function (e) {
                        if (e === null || e === undefined || e.length === 0) {

                            if ($("#next_step").hasClass("hidden")) {
                                $("#next_step").removeClass("hidden");
                            }
                            if (!$(".next_step_edit").hasClass("hidden")) {
                                $(".next_step_edit").addClass("hidden");
                            }
                            if (!$(".next_step_update").hasClass("hidden")) {
                                $(".next_step_update").addClass("hidden");
                            }
                            //REMOVE DISABALE CLZ --------------------------------
                            $('#recipient_name').removeAttr("disabled");
                            $('#recipient_phone').removeAttr("disabled");
                            $('#address').removeAttr("disabled");
                            $('#msg').removeAttr("disabled");
                        } else {
                            if (!$("#next_step").hasClass("hidden")) {
                                $("#next_step").addClass("hidden");
                            }
                            if (!$(".next_step_update").hasClass("hidden")) {
                                $(".next_step_update").addClass("hidden");
                            }
                            if ($(".next_step_edit").hasClass("hidden")) {
                                $(".next_step_edit").removeClass("hidden");
                            }
                            if ($(".order_confirm").hasClass("hidden")) {
                                $(".order_confirm").removeClass("hidden");
                            }
                            $('#recipient_name').val(e['recipients_name']);
                            $('#recipient_phone').val(e['recipients_phone']);
                            $('#address').val(e['shipping_address']);
                            $('#msg').val(e['user_note']);
                            $('#shipping_id').val(e['shipping_id']);
                            //ADD DISABALE CLZ --------------------------------
                            $('#recipient_name').prop('disabled', true);
                            $('#recipient_phone').prop('disabled', true);
                            $('#address').prop('disabled', true);
                            $('#msg').prop('disabled', true);
                        }
                        //                            chosenRefresh();
                    }, "json");
                }

                //ORDER CANCEL FUNCTION =========================================================
                function cancel_order() {


                    //                    alertify.success('Current position : ' + alertify.get('notifier', 'position'));
                    alertify.confirm('labels changed!').set('labels', {ok: 'Yes', cancel: 'No'});
                    alertify.confirm('Confirm ', 'Do you really want to remove this order ?', function () {
                        $.post("./loaddata.php", {action: 'cancel_order'}, function (e) {
                            if (e === undefined || e.length === 0 || e === null) {
                                alert('Error in deleting');
                            } else {
                                if (e == 300) {
                                    alert('Error deleting ..! Code 300');
                                    return;
                                }
                                if (e == 400) {
                                    alert('Error deleting ..! Code 400');
                                    return;
                                }
                                if (e == 1) {
                                    window.location.replace("user_profil.php");
                                }
                            }
                        }, "json");
                    }
                    , function () {

                    });
//                    exit();
                    //                    alertify.confirm('Confirm ', 'Do you really want to delete this order ?', function () {
                    //                        $.post("./loaddata.php", {action: 'cancel_order'}, function (e) {
                    //                            if (e === undefined || e.length === 0 || e === null) {
                    //                                alert('Error in deleting');
                    //                            } else {
                    //                                if (e == 300) {
                    //                                    alert('Error deleting ..! Code 300');
                    //                                    return;
                    //                                }
                    //                                if (e == 400) {
                    //                                    alert('Error deleting ..! Code 400');
                    //                                    return;
                    //                                }
                    //                                if (e == 1) {
                    //                                    window.location.replace("user_profil.php");
                    //                                }
                    //                            }
                    //                        }, "json");
                    //                    }
                    //                    , function () {
                    ////                        alertify.error('Cancel')
                    //                    });
                }
                //NEXT STEP BTN  FUNCTION =========================================================
                function add_shipping_deatail() {
                    if (!$(".start_card_payment_btn").hasClass("hidden")) {
                        $(".start_card_payment_btn").addClass("hidden");
                    }
                    if (!$(".order_confirm").hasClass("hidden")) {
                        $(".order_confirm").addClass("hidden");
                    }
                    var recipient_name = $('#recipient_name').val();
                    var recipient_phone = $('#recipient_phone').val();
                    var msg = $('#msg').val();
                    var address = $('#address').val();
                    var tot_order_val = parseFloat($('#tot_order_val_hidden').val());
                    var order_discount = parseFloat($('#tot_discount_hidden').val());
                    if (recipient_name.trim() == "") {
//                        alertify.error('Please enter recipient name.');
                        $('#recipient_name_error_msg').html("Please enter recipient name !.");
                        $('#recipient_name').focus();
                        return;
                    }
                    if (recipient_phone.trim() == "") {
//                        alertify.error('Please enter recipient phone.');
                        $('#phone_error_msg').html("Please enter recipient phone !.");
                        $('#recipient_phone').focus();
                        return;
                    }
                    if (address.trim() == "") {
//                        alertify.error('Please enter recipient address.');
                        $('#address_error_msg').html("Please enter recipient address !.");
                        $('#address_error_msg').focus();
                        return;
                    }

                    if (isNaN(tot_order_val)) {
                        alert('Not found tot order value ');
                        return;
                    }
                    if (isNaN(order_discount)) {
                        alert('Not found tot order discount ');
                        return;
                    }
                    var send_obj = {recipient_name: recipient_name, recipient_phone: recipient_phone, note: msg, address: address, order_val: tot_order_val, order_discount: order_discount};
                    $.post("./loaddata.php", {action: 'add_shipping_deatail', send_obj: send_obj}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in Data insert !');
                        } else {
                            if (e == "1") {
                                get_shipping_deatails();
                                //CHECK CARD PAYMENT OR NOT //////////////////////
//                                if ($("#card:checked").val()) {
//                                    //card payment --
//                                    card_payment();
//                                } else {
//                                    //normal payment --
//                                    alert("normal payment");
//                                }

                            } else {
                                alert('Error ! data inserting ..!')
                            }
                        }
                    }, "json");
                }



                //NEXT STEP BTN UPDATE  FUNCTION =========================================================
                function update_shipping_deatail() {
                    var recipient_name = $('#recipient_name').val();
                    var recipient_phone = $('#recipient_phone').val();
                    var shipping_id = $('#shipping_id').val();
                    var msg = $('#msg').val();
                    var address = $('#address').val();
                    var tot_order_val = parseFloat($('#tot_order_val_hidden').val());
                    var order_discount = parseFloat($('#tot_discount_hidden').val());

                    if (recipient_name.trim() == "") {
//                        alertify.error('Please enter recipient name.');
                        $('#recipient_name_error_msg').html("Please enter recipient name !.");
                        $('#recipient_name').focus();
                        return;
                    }
                    if (recipient_phone.trim() == "") {
//                        alertify.error('Please enter recipient phone.');
                        $('#phone_error_msg').html("Please enter recipient phone !.");
                        $('#recipient_phone').focus();
                        return;
                    }
                    if (address.trim() == "") {
//                        alertify.error('Please enter recipient address.');
                        $('#address_error_msg').html("Please enter recipient address !.");
                        $('#address_error_msg').focus();
                        return;
                    }

                    if (isNaN(tot_order_val)) {
                        alert('Not found tot order value ');
                        return;
                    }
                    if (isNaN(order_discount)) {
                        alert('Not found tot order discount ');
                        return;
                    }
                    var send_obj = {id: shipping_id, recipient_name: recipient_name, recipient_phone: recipient_phone, note: msg, address: address, order_val: tot_order_val, order_discount: order_discount};
                    $.post("./loaddata.php", {action: 'update_shipping_deatail', send_obj: send_obj}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in Data insert !');
                        } else {
                            if (e == "1") {
                                get_shipping_deatails();
                            } else {
                                alert('Error ! data inserting ..!')
                            }
                            if (!$(".next_step_reset").hasClass("hidden")) {
                                $(".next_step_reset").addClass("hidden");
                            }
                        }
                    }, "json");
                }


            </script>
        </div>



        <!--FOOTER-- end////////////////////////////////////////////////////>-->

    </body>
</html>
