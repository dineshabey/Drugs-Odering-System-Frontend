
<?php
session_start();
if (!isset($_SESSION['cus_id'])) {
    echo "<script>location.href='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <!--MAIN HEAD START -->
        <?php require_once('include/header.php'); ?>
        <!--UL RIHT MARK STYLE-->

        <!--UL RIHT MARK STYLE-->
        <!--<script src="js/bootstrap.min.js" type="text/javascript"></script>-->
        <!--<script src="js/jquery.min.js" type="text/javascript"></script>-->

        <style type="text/css">
            /*.inset {border-style: inset;}*/
            .inset {border-style: ridge;}

            .size-36 {
                font-size: 20px;
                font-weight: bold;
                border: 1px solid #0008ff;
            }
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                opacity: 1;
            }
            /*NAV BAR CSS START*/
            body {
                padding : 0px ;
            }

            #exTab1 .tab-content {
                color : white;
                background-color: #428bca;
                padding : 5px 15px;
            }
            /* remove border radius for the tab */

            #exTab1 .nav-pills > li > a {
                border-radius: 0;
            }
            .input_qty{
                text-align: center;
                border: blue 1px solid;
                width: 43px;
                height: 43px;
                font-weight: 800;
                font-size: x-large;
            }

            .qty_img{
                height:50px;
                width: 50px;
            }
            .qty_btn{
                border: blue 1px solid;
                width: 43px;
                height: 43px;
                font-weight: 800;
                font-size: x-large;
            }

            .description{
                position:relative;
                left: 70px;
                bottom: 50px;
            }
            /*<!--TABALE QTY ADD / REMOVE BTN -->*/
        </style>
    </head>

    <body>
        <!--MENU SCRIPT-->
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
            <?php require_once('include/header_client.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->
        <!-- Nav tabs -->

        <!--<div class="container"><h5 style="color:#4245bb;">Client Area / Welcome <?php echo $_SESSION['uname'] ?> </h5></div>-->
        <div id="exTab1" class="container" >
            <h3 style="text-align: center;"><a href="index.php"><span style="border: 1px solid blue;"> HOME </span></a> >><span>Client Area</span></h3>
            <hr style="border: 1px solid #d1cbea;">
            <div class="row">
                <!--<div class="col-lg-1"></div>-->
                <div class="col-lg-12">
                    <ul  class="nav nav-pills" style="background-color: #fcfe6d85;">
                        <li class="active" >
                            <a  href="#save_item_tab " data-toggle="tab" class=""><span class="btn_font_size2">Cart </span></a>
                        </li>
                        <li><a href="#transaction_tab" data-toggle="tab"><span class="btn_font_size2">Transaction</span></a>
                        </li>
                        <li><a href="#order_deatails_tab" data-toggle="tab" ><span class="btn_font_size2">Shipping</span> </a>
                        </li>
                        <li><a href="#profile_setting_tab" data-toggle="tab"><span class="btn_font_size2">Profile</span></a>
                        </li>
                    </ul>
                </div>
                <!--<div class="col-lg-1"></div>-->
            </div>



            <div class="tab-content clearfix" style="background-color: #ffffffb5; color: black; ">
                <div class="tab-pane active" id="save_item_tab">
                    <h3  style="">Save Items</h3>
                    <!--<h5 id="empty_order_msg" style="color: red;"></h5>-->
                    <hr style="  border-top: 1px solid red;">
                    <div class="container">
                        <div class="row table_font_size" style="padding-top: 10px;">
                            <div class="" >
                                <div class="col-lg-9">
                                    <div class="scrollable" style="height: auto; overflow-y: auto">
                                        <table class="table table-striped table-hover datable load_cart_tbl" id="load_cart_tbl" style="background-color: white;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Item</th>
                                                    <!--<th>Description</th>-->
                                                    <th>QTY</th>
                                                    <th>1 Item</th>
                                                    <th>Discount</th>
                                                    <th>Total</th>
                                                    <th colspan="2">Action</th>
                                                </tr>
                                            </thead>
                                            <input type="hidden" id="hideStrt">
                                            <tbody>                                                             
                                                <!--<tr><td>Btton</td></tr>-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <span style="text-align: center;">
                                    <div class="card" style="border-style: outset; border-radius: 5px; background-color: #ffffff;  border-color:gold;">
                                        <h2 style="background-color: #f7f7f7; color: red; text-align: center;">Order Summary</h2><hr>

                                        <div class="card-body" style="text-align: center;">
                                            <div class="form-group">
                                                <h4  class="card-title table_font_size">Total Item  (LKR): <label class="oder_full_tot" id="oder_full_tot" style="color: red;"></label></h4>
                                                <input type="text" class="item_tot_price_input_feild table_font_size" hidden="" id="oder_full_tot_input_feild">
                                                <h4  class="card-title table_font_size">Total Discount (LKR): <label class="oder_full_discount" style="color: red;"></label></h4>
                                                <input type="text" class="item_tot_price_input_feild table_font_size" hidden="" id="oder_full_discount_input_feild">
                                                <h4  class="card-title table_font_size">Order Value (LKR) <label class="item_tot_price" style="color: red;"></label></h4>
                                                <input type="text" class="item_tot_price_input_feild table_font_size" hidden="" id="item_tot_price_input_feild">
                                            </div>
                                            <hr>
                                            <!--<a href="order_summary.php" target=""><button type="button" class="btn btn-info">ODER PROCESS</button></a>-->
                                            <button type="button" class="btn btn-info btn_font_size" id="process_order"> PROCESS ORDER >></button>
                                            <hr>
                                        </div>
                                    </div>
                                </span>
                            </div>

                        </div>
                    </div>
                    <hr style="  border-top: 1px solid red;">
                </div>
                <div class="tab-pane table_font_size" id="transaction_tab">
                    <h4>Trasaction Deatails</h4>
                    <hr style="  border-top: 1px solid red;">
                    <div class="row">
                        <div class="container">
                            <div class="col-md-11">
                                <div>
                                    <div class="scrollable" style="height: auto; overflow-y: auto">
                                        <table class="table table-striped table-hover datable load_transaction_tbl" id="load_transaction_tbl" style="background-color: white;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Invoice Id</th>
                                                    <!--<th>Bill No</th>-->
                                                    <th>Order Value</th>
                                                    <th>Pay Date</th>
                                                    <th>Pay Time</th>
                                                    <th>Pay Status</th>
                                                </tr>
                                            </thead>
                                            <input type="hidden" id="hideStrt">
                                            <tbody>                                                             
                                                <!--<tr><td>Btton</td></tr>-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="  border-top: 1px solid red;">
                </div>
                <div class="tab-pane" id="order_deatails_tab">
                    <h4>Order Shipping Deatails </h4>
                    <hr style="border-top: 1px solid red;">
                    <div class="row">
                        <div class="container table_font_size">
                            <div class="col-md-11">
                                <div>
                                    <div class="scrollable" style="height: auto; overflow-y: auto">
                                        <table class="table  table-striped table-hover datable load_shipping_tbl" id="load_shipping_tbl" style="background-color: white;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Invoice Id</th>
                                                    <!--<th>Bill No</th>-->
                                                    <th>Order Value</th>
                                                    <th>Item List</th>
                                                    <th>Address</th>
                                                    <th>Shipping Date</th>
                                                    <th>Shipping Status</th>
                                                </tr>
                                            </thead>
                                            <input type="hidden" id="hideStrt">
                                            <tbody>                                                             
                                                <!--<tr><td>Btton</td></tr>-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="  border-top: 1px solid red;">
                </div>
                <div class="tab-pane table_font_size" id="profile_setting_tab" style="text-align: center;">
                    <h4>  My Profile Setting</h4>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-11">
                                <div>
                                    <!--USER FORM/////////////////////-->
                                    <div class="col-lg-10" style="background-color: f8f7f7;" >
                                        <div class="form-horizontal">
                                            <fieldset>
                                                <!-- Form Name -->
                                                <!--<legend><br></legend>-->
                                                <hr style="  border-top: 1px solid red;" class="col-md-12">

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="textinput">First Name</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput" disabled="" id="f_name" type="text" placeholder="" class="form-control input-md" required="">
                                                        <h5 id="f_name_msg" class="table_font_size" style="color: red;"></h5>
                                                    </div>
                                                </div>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="textinput">Last Name</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput" disabled="" id="l_name" type="text" placeholder="" class="form-control input-md">
                                                        <h5 id="l_name_msg" class="table_font_size" style="color: red;"></h5>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="textinput">Phone</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput" disabled="" id="phone" type="text" placeholder="" class="form-control input-md">
                                                        <h5 id="phone_msg" class="table_font_size" style="color: red;"></h5>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="textinput">E mail</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput" disabled="" id="email" type="text" placeholder="" class="form-control input-md">
                                                        <h5 id="email_msg" style="color: red;"></h5>
                                                        <h5 id="email_msg_suc" class="table_font_size" style="color: red;"></h5>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="textinput">City</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput" disabled="" id="city" type="text" placeholder="" class="form-control input-md">
                                                    </div>
                                                </div>
                                                <!-- Textarea -->
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="textarea">Address</label>
                                                    <div class="col-md-7">                     
                                                        <textarea class="form-control textarea_input" disabled=""  id="address" name="textarea"></textarea>
                                                        <h5 id="address_msg" class="table_font_size" style="color: red;"></h5>
                                                    </div>
                                                </div>
                                                <hr style="  border-top: 1px solid red;" class="col-md-12">
                                                <div class="form-group password hidden" >
                                                    <label class="col-md-4 control-label" for="textinput">New Password</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput"  id="password" type="password" placeholder="New Password" class="form-control input-md textarea_input">
                                                        <h5 id="address_msg" class="table_font_size" style="color: red;"></h5>
                                                    </div>
                                                </div>
                                                <div class="form-group password hidden">
                                                    <label class="col-md-4 control-label" for="textinput">Re-enter password</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput"  id="confirm_password" type="password" placeholder="Re-enter password" class="form-control input-md textarea_input">
                                                        <h5 id="passMasseg" class="table_font_size" style="color: red;"></h5>
                                                    </div>
                                                </div>

                                                <!-- Button -->
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for=""></label>
                                                    <div class=" btn-group" role="group">
                                                        <button type="button" id="next_step" name=""  class="next_step btn btn-primary hidden table_font_size">NEXT STEP >></button>
                                                        <button  type="button" id="next_step_edit" name="" class="next_step_edit btn btn-primary table_font_size">EDIT DEATAILS</button>
                                                        <button  type="button" id="next_step_reset" name="" class="next_step_reset btn btn-danger hidden table_font_size">RESET</button>
                                                        <button id="next_step_update" name=""  class="next_step_update btn btn-info table_font_size">UPDATE DEATAILS</button>
                                                        <button  type="button" id="order_confirm" name="" class="order_confirm btn btn-success hidden table_font_size">ODER CONFIRM >></button>
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                </div>

                                            </fieldset>
                                        </div>

                                    </div>
                                    <!--USER FORM/////////////////////-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="row">
            <!--<MODEL DIV />/////////////////////////////////////////////////////-->
            <div class="container">
                <!-- Modal -->
                <div class="modal " id="myModal" role="dialog" >
                    <div class="modal-dialog" style="z-index: 1 !important ; top:200px !important;">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Order Item List</h4>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="scrollable" style="height: auto; overflow-y: auto; ">
                                        <table class="table table-bordered table-striped table-hover datable load_item_list_tbl" id="load_item_list_tbl" style="background-color: aliceblue;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Item</th>
                                                    <th scope="col">QTY.</th>
                                                    <th scope="col">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Modal Error MSG-->
                <div class="modal " id="myModalError" role="dialog" >
                    <div class="modal-dialog" style="z-index: 1 !important ; top:250px !important;">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Error !</h4>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h3>Order is empty, Please select "Add Buy" button</h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Modal Error MSG End-->

                <!--<MODEL DIV />/////////////////////////////////////////////////////-->
            </div>
        </div>
        <!-- Nav tabs -->


        <!---->
        <!---728x90--->
        <!--FOOTER--////////////////////////////////////////////////////////>-->
        <div class="footer">
            <?php require_once('include/footer.php'); ?>

            <script type="text/javascript">
                $(document).on('ready', function () {
//                    item_tot();
//                    added_item_tot();
                    added_item_qty_user_log();
                    load_user_added_item();
                    added_item_summary();
                    load_transaction_tbl();
                    load_shipping_tbl();
                    load_profile_setting_tbl();
                    if (!$(".next_step_update").hasClass("hidden")) {
                        $(".next_step_update").addClass("hidden");
                    }
                });

                //DATA TABALE LOAD START ///////////////////////////////////////////////////////////////
                //LOAD TRASACTION  DEATAILS ====================================
                function load_transaction_tbl() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'load_transaction_tbl'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr style="font-weight: bold;  font-size: 18px;">';
                                tableData += '<td width="">' + index + '</td>';
                                tableData += '<td width=""> ' + qData.invoice_id + ' </td>';
                                //                                tableData += '<td width="">' + qData.bill_no + '</td>';
                                tableData += '<td width="" style="color:red;">LKR ' + qData.order_value + '</td>';
                                tableData += '<td width="">' + qData.pay_date + '</td>';
                                tableData += '<td width="">' + qData.pay_time + '</td>';
                                if (qData.pay_status == '0') {
                                    tableData += '<td width="" style="color:red;"><label>pending</label></td>';
                                }
                                if (qData.pay_status == '2') {
                                    tableData += '<td width="" style="color:green;"><label>success</label></td>';
                                }
                                if (qData.pay_status == '-1') {
                                    tableData += '<td width="" style="color:red;"><label> canceled</label></td>';
                                }
                                if (qData.pay_status == '-2') {
                                    tableData += '<td width="" style="color:red;"><label> failed</label></td>';
                                }
                                if (qData.pay_status == '-3') {
                                    tableData += '<td width="" style="color:red;"><label> chargedback</label></td>';
                                }
                                tableData += '</tr>';
                            });
                            //                            tableData += '<tr><td colspan="9" ><a href="index.php"><button type="button" class="btn btn-success">< KEEP SHOPPING</button></a></td></tr>';
                        }
                        $('.load_transaction_tbl tbody').html(tableData);
                    }, "json");
                }
                //LOAD USER PROFILE SETTING DEATAILS=============================
                function load_profile_setting_tbl() {
                    $.post("./loaddata.php", {action: 'load_profile_setting_tbl'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            $('#f_name').val("No data found .. !");
                        } else {
                            $('#f_name').val(e['f_name']);
                            $('#l_name').val(e['l_name']);
                            $('#phone').val(e['phone']);
                            $('#email').val(e['email']);
                            $('#city').val(e['city']);
                            $('#address').val(e['address']);
                        }
                    }, "json");
                }

                //LOAD ORDER SHIPPING  DEATAILS=================================
                function load_shipping_tbl() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'load_shipping_tbl'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr style="font-weight: bold;  font-size: 18px;">';
                                tableData += '<td width="">' + index + '</td>';
                                tableData += '<td width=""> ' + qData.invoice_id + ' </td>';
                                //                                tableData += '<td width="">' + qData.bill_no + '</td>';
                                tableData += '<td width="" style="color:red;">LKR ' + qData.order_value + '</td>';
                                tableData += '<td width=""> <button type="button" value=' + qData.bill_no + ' id="item_list_btn" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Item List</button></td>';
                                tableData += '<td width=""> ' + qData.shipping_address + ' </td>';
                                tableData += '<td width=""> ' + qData.poste_date + ' </td>';
                                if (qData.order_complete_status == '0') {
                                    tableData += '<td width="" style="color:red;"><label>pending</label></td>';
                                }
                                if (qData.order_complete_status == '1') {
                                    tableData += '<td width="" style="color:green;"><label>success</label></td>';
                                }
                                if (qData.order_complete_status == '3') {
                                    tableData += '<td width="" style="color:red;"><label> canceled</label></td>';
                                }
                                tableData += '</tr>';
                            });
                            //                            tableData += '<tr><td colspan="9" ><a href="index.php"><button type="button" class="btn btn-success">< KEEP SHOPPING</button></a></td></tr>';
                        }
                        $('.load_shipping_tbl tbody').html(tableData);
                    }, "json");
                }
                //LOAD BUY ITEM LIST  DEATAILS====================================
                function load_buy_item_list(bill_no) {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'load_buy_item_list', bill_no: bill_no}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr style="font-weight: bold;  font-size: 18px;">';
                                tableData += '<td width="">' + index + '</td>';
                                tableData += '<td width=""> ' + qData.item_name + ' </td>';
                                tableData += '<td width="">' + qData.item_qty + '</td>';
                                tableData += '<td width=""> ' + qData.item_tot_bill_price + ' </td>';
                                tableData += '</tr>';
                            });
                        }
                        $('.load_item_list_tbl tbody').html(tableData);
                    }, "json");
                }


                //LOAD USER ADDED ITEM TABLE====================================
                function load_user_added_item() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'load_user_added_item'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr style="font-weight: bold;  font-size: 18px;">';
                                tableData += '<td width="">' + index + '</td>';
                                tableData += '<td width=""><img style=" height:75px;" src="../drugs_ordering_system_backend/uploads/' + qData.item_image + '" data-imagezoom="true" class="img-responsive"> ' + qData.item_name + '</td>';
//                                    tableData += '<td width=""> ' + qData.item_name + ' </td>';
                                if (qData.item_save_status == '5') {
//                                    tableData += '<td width="10%"><input class="size-36" step="1"  type="number" min="1" max="50" id="add_item_in_cart" class="form-control text-center"  data-price = "' + qData.item_tot_price + '"  data-added_id = "' + qData.id + '"  value="' + qData.item_qty + '"></td>';
                                    //ITEM QUTY CHANGE START   ------
                                    tableData += '<td width="" align="center" >  <input  disabled value="' + qData.item_qty + '" class="input_qty qty " id="qty" /> </td>';
                                    //ITEM QUTY CHANGE END     ------

                                } else {
//                                    tableData += '<td width="10%"><input class="size-36" disabled step="1"  type="number" min="1" max="50" id="add_item_in_cart" class="form-control text-center"  data-price = "' + qData.item_tot_price + '"  data-added_id = "' + qData.id + '"  value="' + qData.item_qty + '"></td>';
                                    //ITEM QUTY CHANGE START   ------
                                    tableData += '<td width="" align="center" >  <input disabled class="input_qty qty" id="qty"  data-item_id = "' + qData.item_price + '"  data-price = "' + qData.item_price + '"  data-cart_id = "' + qData.id + '"  value="' + qData.item_qty + '"  />  <div><button data-price = "' + qData.item_price + '" data-added_id = "' + qData.id + '"  data-cart_id = "' + qData.id + '" data-item_id = "' + qData.item_price + '" class="dec qty_btn minus_item_btn" id="minus_item_btn">-</button></div><div><button  data-price = "' + qData.item_price + '" data-added_id = "' + qData.id + '"  data-cart_id = "' + qData.id + '" data-item_id = "' + qData.item_price + '"  class="inc qty_btn plus_item_btn" id="plus_item_btn">+</button></div></td>';
                                    //ITEM QUTY CHANGE END     ------

                                }
                                tableData += '<td width="">' + qData.item_price + '</td>';
                                tableData += '<td width="" style="color:red;">' + qData.item_tot_discount + '</td>';
                                tableData += '<td width="">' + qData.item_tot_value + '</td>';
                                if (qData.item_save_status == '5') {
                                    //SAVE STATUS --------------------------------------------
                                    tableData += '<td width=""><button  id="add_buy" data-item_id = "' + qData.item_id + '" data-bill_no = "' + qData.bill_no + '" class="btn btn-success delStrData btn-sm fa fa-plus fa-sm" type="button" value="' + qData.id + '">&nbsp;Add Buy</button></td>';
                                } else {
                                    //ADD to BUY --------------------------------------------
//                                    tableData += '<td width="" colspan=""> <img width="30px" height="30px" src="images/mark.png"> Added to buy</td>';
                                    tableData += '<td width="10%">  <button  id="delete" data-item_id = "' + qData.item_id + '"  class="btn btn-danger delStrData btn-sm fa  fa-close fa-sm" type="button" value="' + qData.id + '">&nbsp;Remove</button></td>';
//                                    tableData += '<td width="10%" colspan="">  <button  id="remove_buy" data-item_id = "' + qData.item_id + '" data-bill_no = "' + qData.bill_no + '" class="btn btn-danger delStrData   btn-sm fa  fa-window-close fa-sm" type="button" value="' + qData.id + '">&nbsp;Remove </button></td>';
                                }
                                tableData += '</tr>';
                            });
                            tableData += '<tr><td colspan="9" ><a href="index.php"><button type="button" class="btn btn-success btn_font_size"><< KEEP SHOPPING</button></a></td></tr>';
                        }
                        $('.load_cart_tbl tbody').html(tableData);
                    }, "json");
                }

                //DATA TABALE LOAD END   ///////////////////////////////////////////////////////////////

                //ONCLICK,CHANGE ,..FUCTION START   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                $(document).on('click', '#item_list_btn', function () {
                    var bill_no = parseInt($(this).val());
                    if (!isNaN(bill_no)) {
                        load_buy_item_list(bill_no);
                    } else {
                        alert("Error ! ,Not Found bill number ..");
                    }
                });


                //NEXT STEP BTN CLICK  ===========================================
                $(document).on('click', '#next_step_edit', function () {
                    //REMOVE DISABALE CLZ --------------------------------
                    $('#f_name').removeAttr("disabled");
                    $('#l_name').removeAttr("disabled");
                    $('#phone').removeAttr("disabled");
                    $('#city').removeAttr("disabled");
                    $('#email').removeAttr("disabled");
                    $('#address').removeAttr("disabled");
                    if ($("#next_step_reset").hasClass("hidden")) {
                        $("#next_step_reset").removeClass("hidden");
                    }
                    if ($("#next_step_update").hasClass("hidden")) {
                        $("#next_step_update").removeClass("hidden");
                    }
                    if (!$(".next_step_edit").hasClass("hidden")) {
                        $(".next_step_edit").addClass("hidden");
                    }
                    if ($(".password").hasClass("hidden")) {
                        $(".password").removeClass("hidden");
                    }
                });
                //NEXT STEP RESET CLICK  ===========================================
                $(document).on('click', '#next_step_reset', function () {
                    //ADD DISABALE CLZ --------------------------------
                    $('#f_name').prop('disabled', true);
                    $('#l_name').prop('disabled', true);
                    $('#phone').prop('disabled', true);
                    $('#email').prop('disabled', true);
                    $('#city').prop('disabled', true);
                    $('#address').prop('disabled', true);
                    if ($(".next_step_edit").hasClass("hidden")) {
                        $(".next_step_edit").removeClass("hidden");
                    }
                    if (!$(".next_step_update").hasClass("hidden")) {
                        $(".next_step_update").addClass("hidden");
                    }
                    if (!$(".password").hasClass("hidden")) {
                        $(".password").addClass("hidden");
                    }
                    if (!$(".next_step_reset").hasClass("hidden")) {
                        $(".next_step_reset").addClass("hidden");
                    }
                });

                //PHONE NUMBER FEILD ENTER NUMBERS ONLY VALIDATION ==================================
                $(function () {
                    $('.phone_no').on('input', function () {
                        this.value = this.value
                                .replace(/[^\d]/g, '');// numbers and decimals only

                    });
                });
                //DELETE ADDED ITEM  ===========================================
                $(document).on('click', '#delete', function () {
                    var id = $(this).val();
                    added_item_remove(id)
                });
                //PROCESS ORDER ===  ===========================================
                $(document).on('click', '#process_order', function () {
                    var item_tot_price = $('#item_tot_price_input_feild').val();
                    var item_tot_price_input = parseFloat(item_tot_price);
                    if (!isNaN(item_tot_price_input)) {
                        window.open('order_summary.php', '_top');
                    } else {
                        $("#myModalError").modal();
//                            alertify.alert('Error ..!', 'Order is empty, Please select "Add Buy" button');
                    }
                });

                //              ITEM PLUS (+) BTNBTN==================================
                $(document).on('click', '.plus_item_btn ', function () {
                    var qty = parseInt($(this).closest("tr")
                            .find(".input_qty")
                            .val());

                    var new_qty = qty + 1;
                    $(this).closest("tr")   // Finds the closest row <tr> 
                            .find(".input_qty")     // Gets a descendent with class="nr"
                            .val(new_qty);

//                 CAL ITEM TOTAL PRICE-----------------------------------------
                    var added_id = ($(this).data('added_id'));
                    var qty = new_qty;
                    add_minus_cal(added_id, qty);


                });
                //              ITEM MINUS(-) BTNBTN==========================================
                $(document).on('click', '.minus_item_btn', function () {
                    var qty = parseInt($(this).closest("tr")
                            .find(".input_qty")
                            .val());

                    var new_qty = qty - 1;
                    $(this).closest("tr")   // Finds the closest row <tr> 
                            .find(".input_qty")     // Gets a descendent with class="nr"
                            .val(new_qty);
                    if (new_qty < 1) {
                        new_qty = 1;
                    }

//                 CAL ITEM TOTAL PRICE-----------------------------------------
                    var added_id = ($(this).data('added_id'));
                    var qty = new_qty;
                    add_minus_cal(added_id, qty);
                });

                //(+) ADD (-) MINUS CALCULATION FUCTION ------------------------
                function add_minus_cal(added_id, qty) {
                    $.post("./loaddata.php", {action: 'add_minus_item_in_added_tbl', added_id: added_id, qty: qty}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in add to item cart');
                        } else {
                            load_user_added_item();
                            added_item_qty_user_log();
//                            added_item_tot();
                            added_item_summary();
                        }
                    }, "json");
                }

                //PLUS (+) MINUS (-) BUTTON OPERATION END   //////////////////////////

                // ADD TO BUY STATUS CHANGE ====================================
                $(document).on('click', '#add_buy', function () {
                    var added_id = $(this).val();
                    var item_id = ($(this).data('item_id'));
                    var bill_no = ($(this).data('bill_no'));

                    var status = 7;
                    $.post("./loaddata.php", {action: 'add_buy', bill_no: bill_no, added_id: added_id, status: status, item_id: item_id}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in add to item cart');
                        } else {
//                            added_item_tot();
                            added_item_summary();
                            added_item_qty_user_log();
                            load_user_added_item();
                        }
                    }, "json");
                });
                // REMOVE TO BUY STATUS CHANGE =================================
                $(document).on('click', '#remove_buy', function () {
                    var item_id = ($(this).data('item_id'));
                    var added_id = $(this).val();
                    var bill_no = 0;
                    var status = 5;
                    $.post("./loaddata.php", {action: 'add_buy', bill_no: bill_no, added_id: added_id, status: status, item_id: item_id}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in add to item cart');
                        } else {
//                            added_item_tot();
                            added_item_summary();
                            added_item_qty_user_log();
                            load_user_added_item();
                        }
                    }, "json");
                });
                //REMOVE ADDED ITEM ============================================
                function added_item_remove(id) {
                    $.post("./loaddata.php", {action: 'added_item_remove', id: id}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in deleting');
                        } else {
                            added_item_qty_user_log();
                            load_user_added_item();
//                            added_item_tot();
                            added_item_summary();
                        }
                    }, "json");
                }


                //USER ADDED ITEM TOTAL SUMMARY=================================
                function added_item_summary() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'added_item_summary'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            $('.item_tot').html("NO data Found ! ");
                        } else {
                            $.each(e, function (index, qData) {

                            });
                            $('.tbody').html(tableData);
                        }
                        //                            chosenRefresh();
                    }, "json");
                }

                $(document).on('click', '#myTab', function (e) {
                    e.preventDefault();
                    $(this).tab('show');
                });
                //ONCLICK,CHANGE ,..FUCTION  END     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

////////////////////////////////FORM VALIDATION START/////////////////////////////////////////////////////////

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

                //NEXT STEP UPDATE CLICK  ======================================
                $(document).on('click', '#next_step_update', function () {
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
                    //Email validation Start-------------------------------------
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
                    //Email validation End--------------------------------------
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
                                update_cus_deatails();
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

                //UPDATE CUSTOMER DEATAILS =====================================
                function update_cus_deatails() {
                    var f_name = $('#f_name').val();
                    var l_name = $('#l_name').val();
                    var email = $('#email').val();
                    var city = $('#city').val();
                    var address = $('#address').val();
                    var phone = $('#phone').val();
                    var password = $('#password').val();
                    var confirm_password = $('#confirm_password').val();

                    var send_obj = {f_name: f_name, l_name: l_name, email: email, city: city, address: address, phone: phone, password: password, confirm_password: confirm_password};
                    $.post("./loaddata.php", {action: 'update_cus_deatails', send_obj: send_obj}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in create account !');
                        } else {
                            if (e == 1) {
                                //SUCCESSFULLY -------------------------
                                window.location.replace("login.php");
                            }
                            if (e == 2) {
                                //ERROR -------- ------------------------
                                alert("Error while updating data! code 1");
                            }

                        }
                    }, "json");
                }


////////////////////////////////FORM VALIDATION END////////////////////////////////////////////////



            </script>
        </div>
        <!--FOOTER-- end////////////////////////////////////////////////////>-->
    </body>
</html>
