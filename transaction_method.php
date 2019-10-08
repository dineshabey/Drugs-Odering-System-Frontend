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
            <h3 style="text-align: center;"><a href="index.php"><span style="border: 1px solid blue;"> HOME </span></a> >><a href="user_profil.php"><span style="border: 1px solid blue;">Client Area</span></a>>><span>Transaction</span></h3>


            <!--ORDER SUMMARY DIV START======================================================================-->


            <div class="row" style="padding-bottom: 10px; padding-top: 10px; ">
                <!--<div class="col-lg-12 next_stp_delivery_deatils" style="text-align: center; background: #b3b3f7; margin: 15px;"><button class="btn btn-primary table_font_size" id="next_stp_delivery_deatils">NEXT STEP >></button></div>-->
                <!--<div class="col-lg-12 next_stp_delivery_deatils_back" style="text-align: center; background: green; margin: 15px;"><button class="btn btn-primary table_font_size" id="next_stp_delivery_deatils_back"><< BACK TO ORDER SUMMARY</button></div>-->
            </div>


            <!--PAYMENT OPTION  DIV START  =================================================================================-->

            <!--<hr style="  border-top: 1px solid red;">-->

            <div class="payment_tab" id="payment_tab" style=" padding-top:20px;">
                <div class="row"  style="background-color: #7ac4ff; text-align: center;">
                    <!--<button class="btn btn-primary table_font_size"  id="show_delevery_deatails">Back</button>-->
                    <h3 class="btn_font_size"> Select Payment Option</h3>
                </div>

                <!--<hr style="  border-top: 1px solid red;">-->
                <div class="" style="background-color: #f5fdff;">
                    <!-- Text input-->

                    <!--NEW PAYMENT OPTION RADIO BTN -------------------------------->
                    <!--<h1 class=""></h1>-->
                    <!--<label class="col-md-4 control-label" for="textarea">Payment option</label>-->
                    <div>
                        <div class="row">
                            <div class="form-group" style="text-align: center;">
                                <label class="col-md-4 control-label"><h3 class="btn_font_size">Card Payment</h3></label> 
                                <div class="col-md-4"> 
                                    <label class="" for="radios-0">
                                        <input class="pay_method_select" type="radio" name="radios" id="card" value="1" checked="checked">
                                    </label> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group" style="text-align: center;">
                                <label class="col-md-4 control-label table_font_size"><h3 class="btn_font_size">Normal Bank Payment</h3></label> 
                                <div class="col-md-4"> 
                                    <label class="" for="radios-1">
                                        <input class="pay_method_select" type="radio" name="radios" id="bank" value="2">
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

                        <!--                        <div class="form-group" >
                                                    <button id="start_card_payment_btn"  name="" class="start_card_payment_btn btn btn-info btn-md table_font_size ">COMPLETE TRANSACTION</button>
                                                </div>-->

                    </div>

                    <div class="row col-md-12  normal_payment table_font_size" id="normal_payment" style="border-style:dotted solid; border-width: 2px 2px 2px 10px; border-color:red; background-color: white; color: #0b33ce;">
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
                                    <button id="start_card_payment_btn"  name="" class="btn btn-info btn-lg btn_font_size">COMPLETE TRANSACTION</button>
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
                                    <button id="start_normal_payment_btn"  name="" class="btn btn-info btn-lg btn_font_size">COMPLETE TRANSACTION</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" hidden="">
                    <img src="images/visa_master.png" width="200" height="100" title="White flower" alt="Flower">
                    <input type="checkbox" checked="checked" >
                </div>
            </div>
            <div class="row hidden">
                <!--PAY HEARE FORM START ////////////////////////////////////////////////////////////-->
                <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
                    <input type="hidden" name="merchant_id" value="121XXXX">    <!-- Replace your Merchant ID -->
                    <input type="hidden" name="return_url" value="http://sample.com/return">
                    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
                    <input type="hidden" name="notify_url" value="http://sample.com/notify">  
                    <h1> <br><br>Item Details<br></h1>
                    <input type="text" name="order_id" value="ItemNo12345">
                    <input type="text" name="items" value="Door bell wireless"><br>
                    <input type="text" name="currency" value="LKR">
                    <input type="text" name="amount" value="1000">  
                    <h1>   <br><br>Customer Details<br></h1>
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
                    
                    if (!$(".next_stp_delivery_deatils_back").hasClass("hidden")) {
                        $(".next_stp_delivery_deatils_back").addClass("hidden");
                    }
                });
              
                //PAYMENT METHOD BTN ===========================================
                $(document).on('change', '.pay_method_select', function () {
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
                
            </script>
        </div>



        <!--FOOTER-- end////////////////////////////////////////////////////>-->

    </body>
</html>
