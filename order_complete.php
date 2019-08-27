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
            <div class="row" style="padding-top: 50px; background: yellowgreen;">
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
                                <label style="color:red ;" class="col-md-4 control-label tot_order_val" for="textinput"></label>  
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6" style="background-color: antiquewhite;">
                    <form class="form-horizontal">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Delivery Details</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Recipient's Name</label>  
                                <div class="col-md-7">
                                    <input id="textinput" name="textinput" id="recipient_name" type="text" placeholder="Recipient's Name" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Recipient's Phone</label>  
                                <div class="col-md-7">
                                    <input id="textinput" name="textinput"  id="recipient_phone" type="text" placeholder="077123****" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textarea">Message (Optional)</label>
                                <div class="col-md-7">                     
                                    <textarea class="form-control"  id="msg" name="textarea"></textarea>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textarea">Delivery Address</label>
                                <div class="col-md-7">                     
                                    <textarea class="form-control"  id="address" name="textarea"></textarea>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for=""></label>
                                <div class="col-md-4">
                                    <button id="" name="" class="btn btn-primary">NEXT</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

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
                });
                //LOAD USER ADDED ITEM TABLE====================================
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
                            });
                            tableData += '<tr><td colspan="9" ><a href="user_profil.php"><button type="button" class="btn btn-success">&nbsp; BACK</button></a>&nbsp;&nbsp;&nbsp;<button  class="btn btn-warning"> CANCEL</button></td></tr>';
                        }
                        $('.added_item_summary tbody').html(tableData);
                    }, "json");
                }
                //USER ADDED ITEM TOTAL ========================================
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
                            //                            load_cart_item_list();
                        }
                        //                            chosenRefresh();
                    }, "json");
                }


            </script>
        </div>

        <!--FOOTER-- end////////////////////////////////////////////////////>-->

    </body>

