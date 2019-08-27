
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
            /* change border radius for the tab , apply corners on top*/
            /*NAV BAR CSS  END*/

        </style>
        <!--UL RIHT MARK STYLE-->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
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
            <?php require_once('include/coustomer_header.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->
        <!-- Nav tabs -->

        <div class="container"><h2 style="color:#4245bb;">Client Area / Welcome <?php echo $_SESSION['uname'] ?> </h2></div>
        <hr style="border: 1px solid #d1cbea;">
        <div id="exTab1" class="container" >	
            <ul  class="nav nav-pills">
                <li class="active">
                    <a  href="#save_item_tab" data-toggle="tab">Save Item </a>
                </li>
                <li><a href="#transaction_tab" data-toggle="tab">Transaction Deatails</a>
                </li>
                <li><a href="#order_deatails_tab" data-toggle="tab">Order Shipping Deatails</a>
                </li>
                <li><a href="#profile_setting_tab" data-toggle="tab">Profile Setting</a>
                </li>
            </ul>

            <div class="tab-content clearfix" style="background-color: #170e0e08; color: black; border:1px solid #dcb2ec; ">
                <div class="tab-pane active" id="save_item_tab">
                    <h3  style="background-color: #ddddef;"></h3>
                    <div class="container">
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-lg-9">
                                <div class="" >
                                    <div class="scrollable" style="height: auto; overflow-y: auto">
                                        <table class="table table-bordered table-striped table-hover datable load_cart_tbl" id="load_cart_tbl" style="background-color: white;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th>QTY</th>
                                                    <th>Per Item</th>
                                                    <th>Discount</th>
                                                    <th>Net Total</th>
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
                                        <div class="card-body">
                                            <h4  class="card-title">Order Value:&nbsp;<label class="item_tot_price"></label></h4>
                                            <input type="text" class="item_tot_price_input_feild" hidden="" id="item_tot_price_input_feild">
                                            <hr>
                                            <!--<a href="order_summary.php" target=""><button type="button" class="btn btn-info">ODER PROCESS</button></a>-->
                                            <button type="button" class="btn btn-info" id="process_order"> PROCESS ODER</button>
                                            <hr>
                                        </div>
                                    </div>
                                </span>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="transaction_tab">
                    <h4>Trasaction Deatails</h4>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-11">
                                <div>
                                    <div class="scrollable" style="height: auto; overflow-y: auto">
                                        <table class="table table-bordered table-striped table-hover datable load_transaction_tbl" id="load_transaction_tbl" style="background-color: white;">
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
                </div>
                <div class="tab-pane" id="order_deatails_tab">
                    <h4>Order Shipping Deatails </h4>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-11">
                                <div>
                                    <div class="scrollable" style="height: auto; overflow-y: auto">
                                        <table class="table table-bordered table-striped table-hover datable load_shipping_tbl" id="load_shipping_tbl" style="background-color: white;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Invoice Id</th>
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
                </div>
                <div class="tab-pane" id="profile_setting_tab">
                    <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
                </div>

            </div>
        </div>


        <div class="row">
            <!--<MODEL DIV />/////////////////////////////////////////////////////-->
            <div class="container">
                <!-- Modal -->
                <div class="modal " id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Order Item List</h4>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Item</th>
                                                <th scope="col">QTY.</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

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
                    load_user_added_item();
                    added_item_tot();
                    added_item_summary();
                    load_transaction_tbl();
                    load_shipping_tbl();
                });
                //LOAD TRASACTION  TABLE====================================
                function load_transaction_tbl() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'load_transaction_tbl'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr>';
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
                //LOAD SHIPPING  TABLE====================================
                function load_shipping_tbl() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'load_shipping_tbl'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr>';
                                tableData += '<td width="">' + index + '</td>';
                                tableData += '<td width=""> ' + qData.invoice_id + ' </td>';
//                                tableData += '<td width="">' + qData.bill_no + '</td>';
                                tableData += '<td width="" style="color:red;">LKR ' + qData.order_value + '</td>';
                                tableData += '<td width=""> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Item List</button></td>';
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


                //LOAD USER ADDED ITEM TABLE====================================
                function load_user_added_item() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'load_user_added_item'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr>';
                                tableData += '<td width="">' + index + '</td>';
                                tableData += '<td width=""><img style=" height:40px;" src="../drugs_ordering_system_backend/uploads/' + qData.item_image + '" data-imagezoom="true" class="img-responsive"> </td>';
                                tableData += '<td width=""> ' + qData.item_name + ' </td>';
                                if (qData.item_save_status == '0') {
                                    tableData += '<td width="10%"><input class="size-36" step="1"  type="number" min="1" max="50" id="add_item_in_cart" class="form-control text-center"  data-price = "' + qData.item_tot_price + '"  data-added_id = "' + qData.id + '"  value="' + qData.item_qty + '"></td>';
                                } else {
                                    tableData += '<td width="10%"><input class="size-36 " disabled step="1"  type="number" min="1" max="50" id="add_item_in_cart" class="form-control text-center"  data-price = "' + qData.item_tot_price + '"  data-added_id = "' + qData.id + '"  value="' + qData.item_qty + '"></td>';
                                }
                                tableData += '<td width="">' + qData.item_price + '</td>';
                                tableData += '<td width="" style="color:red;">' + qData.item_tot_discount + '</td>';
                                tableData += '<td width="">' + qData.item_tot_value + '</td>';
                                if (qData.item_save_status == '0') {
                                    //SAVE STATUS --------------------------------------------
                                    tableData += '<td width=""><button  id="add_buy" data-item_id = "' + qData.item_id + '" data-bill_no = "' + qData.bill_no + '" class="btn btn-success delStrData btn-sm fa fa-trash-o fa-sm" type="button" value="' + qData.id + '">Add Buy</button></td>';
                                    tableData += '<td width="10%">  <button  id="delete" data-item_id = "' + qData.item_id + '"  class="btn btn-danger delStrData btn-sm fa fa-trash-o fa-sm" type="button" value="' + qData.id + '">Delete</button></td>';
                                } else {
                                    //ADD to BUY --------------------------------------------
                                    tableData += '<td width="" colspan=""> <img width="30px" height="30px" src="images/mark.png"> Added to buy</td>';
                                    tableData += '<td width="10%" colspan="">  <button  id="remove_buy" data-item_id = "' + qData.item_id + '" data-bill_no = "' + qData.bill_no + '" class="btn btn-danger delStrData   btn-sm fa fa-trash-o fa-sm" type="button" value="' + qData.id + '">Remove Buy</button></td>';
                                }
                                tableData += '</tr>';
                            });
                            tableData += '<tr><td colspan="9" ><a href="index.php"><button type="button" class="btn btn-success">< KEEP SHOPPING</button></a></td></tr>';
                        }
                        $('.load_cart_tbl tbody').html(tableData);
                    }, "json");
                }

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
                        alertify.alert('Error ..!', 'Order is empty, Please select "Add Buy" button');
                    }
                });
                // ADD ITEM INTO USER TBL =======================================
                $(document).on('click', '#add_item_in_cart', function () {
                    var added_id = ($(this).data('added_id'));
                    var qty = $(this).val();
                    $.post("./loaddata.php", {action: 'add_minus_item_in_added_tbl', added_id: added_id, qty: qty}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in add to item cart');
                        } else {
                            load_user_added_item();
                            //                            item_tot();
                        }
                    }, "json");
                });
                // ADD TO BUY STATUS CHANGE ====================================
                $(document).on('click', '#add_buy', function () {
                    var added_id = $(this).val();
                    var item_id = ($(this).data('item_id'));
                    var bill_no = ($(this).data('bill_no'));

                    var status = 1;
                    $.post("./loaddata.php", {action: 'add_buy', bill_no: bill_no, added_id: added_id, status: status, item_id: item_id}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in add to item cart');
                        } else {
                            added_item_tot();
                            added_item_summary();
                            load_user_added_item();
                        }
                    }, "json");
                });
                // REMOVE TO BUY STATUS CHANGE =================================
                $(document).on('click', '#remove_buy', function () {
                    var item_id = ($(this).data('item_id'));
                    var added_id = $(this).val();
                    var bill_no = 0;

                    var status = 0;
                    $.post("./loaddata.php", {action: 'add_buy', bill_no: bill_no, added_id: added_id, status: status, item_id: item_id}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in add to item cart');
                        } else {
                            added_item_tot();
                            added_item_summary();
                            load_user_added_item();
                        }
                    }, "json");
                });
                //REMOVE ADDED ITEM ============================================
                function added_item_remove(id) {
                    alertify.confirm('Confirm ', 'Do you really want to delete this ?', function () {
//                        alertify.success('Ok');
                        $.post("./loaddata.php", {action: 'added_item_remove', id: id}, function (e) {
                            if (e === undefined || e.length === 0 || e === null) {
                                alert('Error in deleting');
                            } else {
                                load_user_added_item();
                            }
                        }, "json");
                    }
                    , function () {
//                        alertify.error('Cancel')
                    });
                }
                //USER ADDED ITEM TOTAL ========================================
                function added_item_tot() {
                    $.post("./loaddata.php", {action: 'added_item_tot'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            $('.item_tot').html("NO data Found ! ");
                        } else {
                            var oder_full_tot = (e['oder_full_tot']);
                            var oder_full_pay_val = (e['oder_full_pay_val']);
                            $('.item_tot').html(oder_full_tot);
                            $('.item_tot_price').html(oder_full_pay_val);
                            $('#item_tot_price_input_feild').val(oder_full_pay_val);
                            //                            load_cart_item_list();
                        }
                        //                            chosenRefresh();
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


            </script>
        </div>




        <!--FOOTER-- end////////////////////////////////////////////////////>-->

    </body>

