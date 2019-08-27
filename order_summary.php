<?php
session_start();
if (!isset($_SESSION['cus_id'])) {
    echo "<script>location.href='login.php';</script>";
}
?>

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

            .size-36 {
                font-size: 30px;
            }
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                opacity: 1;
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
            <?php require_once('include/coustomer_header.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->


        <div class="container">
            <div class="row" style="padding-top: 50px;"></div>
            <div class="row order_summary" id="order_summary" style="padding-top: 50px; background: yellowgreen;">
                <div class="col-lg-6">
                    <div class="" >
                        <legend>Order Summary</legend>
                        <div class="scrollable" style="height: auto; overflow-y: auto">
                            <table class="table table-bordered table-striped table-hover datable added_item_summary" id="added_item_summary">
                                <thead>
                                    <tr style="background-color: #dcfdff;">
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>QTY</th>
                                        <th>Per Item</th>
                                        <th>Discount</th>
                                        <th>Net Total</th>
                                    </tr>
                                </thead>
                                <input type="hidden" id="hideStrt">
                                <tbody style="background-color: #dcfdff;">                                                             
                                    <!--<tr><td>Btton</td></tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="color: ;">
                        <div class="form-horizontal ">
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="textinput">Total Item Price (LKR):</label>  
                                <label class="col-md-4 control-label tot_price" for="textinput"></label>  
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="textinput">Total Discount Price (LKR):</label>  
                                <label class="col-md-4 control-label tot_discount"  for="textinput"></label>  
                            </div>
                            <div class="form-group" >
                                <label class="col-md-5 control-label" for="textinput">Total Order Value  (LKR):</label>  
                                <label style="color:red ;" class="col-md-4 control-label tot_order_val"  for="textinput"></label>  
                            </div>
                        </div>
                        <!--HIDDEN VALUE //////////////////////////////////////////////////////////////////////////////////////////////////-->
                        <!--ODER VALUES ==============================================================-->
                        <input type="text" hidden="" class="tot_order_val" id="tot_order_val_hidden">
                        <input type="text" hidden="" class="tot_discount" id="tot_discount_hidden">
                        <input type="text"  class="item_bill_no" id="item_bill_no">
                        <!--ODER VALUES ==============================================================-->
                        <input type="text" id="shipping_id"  hidden="">
                        <input type="text" hidden="" >
                        <!--HIDDEN VALUE //////////////////////////////////////////////////////////////////////////////////////////////////-->

                    </div>

                </div>

                <div class="col-lg-6" style="background-color: antiquewhite;" >
                    <div class="form-horizontal">
                        <fieldset>
                            <!-- Form Name -->
                            <legend>Delivery Details</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Recipient's Name</label>  
                                <div class="col-md-7">
                                    <input  name="textinput" disabled="" id="recipient_name" type="text" placeholder="Recipient's Name" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Recipient's Phone</label>  
                                <div class="col-md-7">
                                    <input  name="textinput" disabled="" id="recipient_phone" type="text" placeholder="077123****" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textarea">Message (Optional)</label>
                                <div class="col-md-7">                     
                                    <textarea class="form-control" disabled=""  id="msg" name="textarea"></textarea>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textarea">Delivery Address</label>
                                <div class="col-md-7">                     
                                    <textarea class="form-control "  disabled="" id="address" name="textarea"></textarea>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for=""></label>
                                <div class="col-md-3">
                                    <button id="next_step" name=""  class="next_step btn btn-primary hidden">NEXT STEP</button>
                                    <button id="next_step_edit" name="" class="next_step_edit btn btn-primary ">EDIT DEATAILS</button>
                                    <button id="next_step_reset" name="" class="next_step_reset btn btn-danger hidden">RESET</button>
                                    <button id="order_confirm" name="" class="next_step_reset btn btn-danger ">ODER CONFIRM</button>
                                </div>
                                <div class="col-md-3">
                                    <button id="next_step_update" name=""  class="next_step_update btn btn-info ">UPDATE DEATAILS</button>
                                </div>
                            </div>

                        </fieldset>
                    </div>

                </div>
            </div>

            <div class="row hidden payment_tab" id="payment_tab">
                <!--<hr style="  border-top: 1px solid red;">-->
                <div class="col-lg-12" style="background-color: #f5fdff;">
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <button class="btn btn-primary" style="background-color: #47bb39;" id="show_delevery_deatails">SHOW DELIVERY DEATAILS</button>
                        </div>
                    </div>
                    <hr style="  border-top: 1px solid red;">
                    <!--<hr style="  border-top: 1px solid #e1c0ff;">-->
                    <div class="form-horizontal">
                        <fieldset>

                            <legend>Payment Option</legend>

                            <!-- Form Name -->

                            <!-- Text input-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" id="payment_method">
                                            <option value="0">--SELECT PAYMENT METHOD--</option>
                                            <option value="1">Card Payment</option>
                                            <option value="2">Normal bank payment</option>
                                        </select>
                                        <!--<label class="col-md-6" for="sel1">Select list:</label>-->
                                    </div>
                                </div>

                                <div class="col-md-9 hidden normal_payment" id="normal_payment" style="border-style:dotted solid; border-width: 2px 2px 2px 10px; border-color:red; background-color: white; color: #0b33ce;">
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
                                <div class="col-md-9 hidden bank_payment" id="bank_payment" style="border-style:dotted solid; border-width: 2px 2px 2px 10px; border-color:red; background-color: white; color: #0b33ce;">
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


                        </fieldset>
                    </div>

                    <hr style="  border-top: 1px solid red;">
                </div>
            </div>

        </div>
        <!---->
        <!---728x90--->
        <!--FOOTER--////////////////////////////////////////////////////////>-->
        <div class="footer">
            <?php require_once('include/footer.php'); ?>

            <script type="text/javascript">
                $(document).on('ready', function () {
                    load_user_added_item();
                    added_item_tot();
                    get_shipping_deatails();
                });
                //DELETE ADDED ITEM  ===========================================
                $(document).on('click', '#cancel_order', function () {
                    cancel_order();
                });
                //ODER CONFIRM BTN ===========================================
                $(document).on('click', '#order_confirm', function () {
                    if ($("#payment_tab").hasClass("hidden")) {
                        $("#payment_tab").removeClass("hidden");
                    }
                    if (!$(".order_summary").hasClass("hidden")) {
                        $(".order_summary").addClass("hidden");
                    }
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
                    if (!$(".next_step_update").hasClass("hidden")) {
                        $(".next_step_update").addClass("hidden");
                    }
                    if (!$(".next_step_reset").hasClass("hidden")) {
                        $(".next_step_reset").addClass("hidden");
                    }
                });
                //NEXT STEP BTN EDIT  ===========================================
                $(document).on('click', '#next_step', function () {
                    add_shipping_deatail();
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
                //LOAD USER ADDED ITEM TABLE====================================================
                function load_user_added_item() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'added_item_summary'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr >';
                                tableData += '<td width="">' + index + '</td>';
                                tableData += '<td width=""> ' + qData.item_name + ' </td>';
                                tableData += '<td width=""> ' + qData.item_qty + ' </td>';
                                tableData += '<td width="">' + qData.item_price + '</td>';
                                tableData += '<td width="" style="color:red;">' + qData.oder_full_discount + '</td>';
                                tableData += '<td width="">' + qData.oder_full_pay_val + '</td>';
                                tableData += '</tr>';
                                $('#item_bill_no').val(qData.bill_no);
                            });
                            tableData += '<tr><td colspan="9" ><a href="user_profil.php"><button type="button" class="btn btn-success">&nbsp; BACK</button></a>&nbsp;&nbsp;&nbsp;<button id="cancel_order" class="btn btn-warning"> CANCEL</button></td></tr>';
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
                    alertify.confirm('Confirm ', 'Do you really want to delete this order ?', function () {
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
//                        alertify.error('Cancel')
                    });
                }
//NEXT STEP BTN  FUNCTION =========================================================
                function add_shipping_deatail() {
                    var recipient_name = $('#recipient_name').val();
                    var recipient_phone = $('#recipient_phone').val();
                    var msg = $('#msg').val();
                    var address = $('#address').val();
                    var tot_order_val = parseFloat($('#tot_order_val_hidden').val());
                    var order_discount = parseFloat($('#tot_discount_hidden').val());
                    var send_obj = {recipient_name: recipient_name, recipient_phone: recipient_phone, note: msg, address: address, order_val: tot_order_val, order_discount: order_discount};
                    $.post("./loaddata.php", {action: 'add_shipping_deatail', send_obj: send_obj}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in Data insert !');
                        } else {
                            get_shipping_deatails();
//                            window.location.replace("order_complete.php");
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
                    var send_obj = {id: shipping_id, recipient_name: recipient_name, recipient_phone: recipient_phone, note: msg, address: address, order_val: tot_order_val, order_discount: order_discount};
                    $.post("./loaddata.php", {action: 'update_shipping_deatail', send_obj: send_obj}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in Data insert !');
                        } else {
                            if (!$(".next_step_reset").hasClass("hidden")) {
                                $(".next_step_reset").addClass("hidden");
                            }
                            get_shipping_deatails();
//                            window.location.replace("order_complete.php");
                        }
                    }, "json");
                }


            </script>
        </div>



        <!--FOOTER-- end////////////////////////////////////////////////////>-->

    </body>

