<?php session_start(); ?>
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

            /* If the screen size is 601px wide or more, set the font-size of <div> to 80px */
            @media screen and (min-width: 601px) {
                table {
                    font-size: 20px;
                }
            }

            /* If the screen size is 600px wide or less, set the font-size of <div> to 30px */
            @media screen and (max-width: 600px) {
                table {
                    font-size: 24px;
                   
                }
                
                .item_nm {
                   
                    font-weight:bold;
                }
            }



        </style>
        <!--UL RIHT MARK STYLE-->


        <!--TABALE QTY ADD / REMOVE BTN -->

        <style type="text/css">

            /*            input[type=number] {
                            height: 30px;
                        }*/

            /*            input[type=number]:hover::-webkit-inner-spin-button {  
                            width: 14px;
                            height: 30px;
                        }*/


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

        </style>
        <!--TABALE QTY ADD / REMOVE BTN -->

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
            <?php require_once('header2.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->
        <div class="container">
            <div class="row" style="padding-top: 50px;">
                <div class="col-lg-9">
                    <div class="" >
                        <div class="scrollable" style="height: auto; overflow-y: auto">
                            <table class="table table-bordered table-striped table-hover datable load_cart_tbl"  id="load_cart_tbl">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <!--<th>Description</th>-->
                                        <th>QTY</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Action</th>
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

                <div class="col-lg-3" style="text-align: center; padding-bottom:  15px;">
                    <span style="text-align: center;">
                        <div class="card" style="border-style: outset; border-radius: 5px; background-color: #e2a5a5;  border-color:gold;">
                            <h2 style="background-color: #f7f7f7; color: red; text-align: center;">Order Summary</h2>
                            <div class="card-body">
                                <div></div>
                                <h4  class="card-title">Cart Value (LKR)</h4>
                                <h2  class="card-title"><label class="item_tot_price"></label></h2>
                                <div></div>
                                <!--<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>-->


                                <a href="login.php"><button type="button" class="btn btn-info">CHECKOUT</button></a>
                            </div>
                        </div>
                    </span>
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
                    load_cart_item_list();
                    item_tot();

                });

                function load_cart_item_list() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'load_cart_item_list'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr class="tb_head" ><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr>';
                                tableData += '<td width="5%" height="150">' + index + '</td>';
                                tableData += '<td width=""><img style=" height:90px;" src="../drugs_ordering_system_backend/uploads/' + qData.item_image + '" data-imagezoom="true" class="img-responsive"> <p style="text"><span class="item_nm"> ' + qData.item_name + '</span></p></td>';
//                                tableData += '<td width=""> Item Link </td>';
                              
//    tableData += '<td width="10%"><input class="size-36" step="1"  type="number" min="1" max="50" id="add_item_in_cart" class="form-control text-center"  data-price = "' + qData.item_price + '"  data-cart_id = "' + qData.id + '"  value="' + qData.item_qty + '"></td>';


//                                tableData += '<td width="10%"><span class="input-number-decrement">–</span><input class="size-36" step="1"  type="number" min="1" max="50" id="add_item_in_cart" class="form-control text-center"  data-price = "' + qData.item_price + '"  data-cart_id = "' + qData.id + '"  value="' + qData.item_qty + '"><span class="input-number-increment">+</span></td>';

//                                tableData += '<td width="10%"><input class="size-36" step="1"  type="number" min="1" max="50" id="add_item_in_cart" class="form-control text-center"  data-price = "' + qData.item_price + '"  data-cart_id = "' + qData.id + '"  value="' + qData.item_qty + '"> <div id="inc-button" class="spinner-button">+</div><div id="dec-button" class="spinner-button">-</div></td>';
                 //ITEM QUTY CHANGE      
    tableData += '<td width="" align="center" >  <input class="input_qty qty " id="qty"  data-price = "' + qData.item_price + '"  data-cart_id = "' + qData.id + '"  value="' + qData.item_qty + '" data-item_id = "' + qData.item_price + '" />  <div><button class="dec qty_btn minus_item_btn" id="minus_item_btn" onclick="modif_qty(-1)">-</button></div><div><button class="inc qty_btn plus_item_btn" id="plus_item_btn">+</button></div></td>';
    
    
    
    tableData += '<td width="" style="text-aling:left;">' + qData.item_price + '</td>';
                                tableData += '<td width="">' + qData.tot_price + '</td>';
                                tableData += '<td width=""><button  id="delete" class="btn btn-danger delStrData   btn-sm fa fa-trash-o fa-sm" type="button" value="' + qData.id + '"></button></td>';

                                tableData += '</tr>';
                            });
                            tableData += '<tr><td colspan="7" ><a href="index.php"><button type="button" class="btn btn-success">< KEEP SHOPPING</button></a></td></tr>';
                        }
                        $('.load_cart_tbl tbody').html(tableData);
                    }, "json");
                }

                //DELETE CART ITEM  =============================================
                $(document).on('click', '#delete', function () {
                    var id = $(this).val();
                    cart_item_remove(id)
                });
                //DELETE CART ITEM  =============================================
                $(document).on('click', '.add_item_in_cart', function () {
                    var cart_id = ($(this).data('cart_id'));
                    var price = ($(this).data('price'));
                    var qty = $(this).val();
                    var tot_price = (qty * price);

                    $.post("./loaddata.php", {action: 'update_cart_in_tbl', id: cart_id, tot_price: tot_price, qty: qty}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in deleting');
                        } else {
                            item_tot();
                        }
                    }, "json");
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
                            load_cart_item_list();
                        }
                        //    chosenRefresh();
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
                            $('.item_tot').html(oder_full_tot);
                            $('.item_tot_price').html(oder_full_pay_val);
//                            load_cart_item_list();
                        }
//                            chosenRefresh();
                    }, "json");
                }
                //DELETE CART ITEM  Function====================================
                function cart_item_remove(id) {
                    //                    confirm("Delete ", "Do you want to remove this item ?", "No", "Yes", function () {
                    $.post("./loaddata.php", {action: 'cart_item_remove', id: id}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in deleting');
                        } else {
                            item_tot();
                        }
                    }, "json");
                    //                    });
                }


//                TABALE QTY ADD REMOVE BTN==========================================
                function modify_qty(val) {
                    var qty = document.getElementById('qty').value;
                    var new_qty = parseInt(qty, 10) + val;


                    if (new_qty < 0) {
                        new_qty = 0;
                    }
                    document.getElementById('qty').value = new_qty;
                    return new_qty;
                }

//              ITEM PLUS (+) BTNBTN==========================================
                $(document).on('click', '.plus_item_btn ', function () {
                    
                    var qty = parseInt($('#qty').val());
                    var new_qty = qty + 1;
                                     
                   $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".input_qty")     // Gets a descendent with class="nr"
                       .val(new_qty);  

                });
//              ITEM MINUS(-) BTNBTN==========================================
                $(document).on('click', '.minus_item_btn', function () {
                    var qty = parseInt($('#qty').val());
                    var new_qty = qty - 1;
                  
                    if (new_qty < 0) {
                        new_qty = 0;
                    }

                       $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".input_qty")     // Gets a descendent with class="nr"
                       .val(new_qty); 

                  //  $(this).data('item_id').val(new_qty);
//                    $($(this).data('item_id')).val(new_qty);

                });


s            </script>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>

