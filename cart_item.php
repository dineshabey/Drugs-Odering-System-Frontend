<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <!--MAIN HEAD START -->
    <head> 
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <?php require_once('include/header.php'); ?>
        <!--TABALE QTY ADD / REMOVE BTN -->
        <style type="text/css">
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
            <div class="row" style="padding-top: 2px;">
                <h3 style="text-align: center;"><a href="index.php"><span style="border: 1px solid blue;"> HOME </span></a> >><span>Shopping cart</span></h3><hr>

                <div class="col-lg-9">
                    <div class="" >
                        <div class="scrollable" style="height: auto; overflow-y: auto">
                            <table class="table  table-striped table-hover datable load_cart_tbl"  id="load_cart_tbl">
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
                                <h2  class="card-title"><label class="item_tot_price item_tot_font"></label></h2>
                                <div></div>
                                <!--<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>-->


                                <a href="login.php"><button type="button" class="btn btn-info btn_font_size">CHECKOUT >></button></a>
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
                            tableData += '<tr class="tb_head" ><th colspan="6" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr style="font-weight: bold;  font-size: 18px; btn_font_size">';
                                tableData += '<td width="5%" height="150">' + index + '</td>';
                                tableData += '<td width=""><img style=" height:90px;" src="../drugs_ordering_system_backend/uploads/' + qData.item_image + '" data-imagezoom="true" class="img-responsive"> <p style="text"><span class="item_nm"> ' + qData.item_name + '</span></p></td>';
                                //ITEM QUTY CHANGE START   ------
                                tableData += '<td width="" align="center" >  <input disabled class="input_qty qty " id="qty"  data-price = "' + qData.item_price + '"  data-cart_id = "' + qData.id + '"  value="' + qData.item_qty + '" data-item_id = "' + qData.item_price + '" />  <div><button data-price = "' + qData.item_price + '"  data-cart_id = "' + qData.id + '" data-item_id = "' + qData.item_price + '" class="dec qty_btn minus_item_btn" id="minus_item_btn">-</button></div><div><button  data-price = "' + qData.item_price + '"  data-cart_id = "' + qData.id + '" data-item_id = "' + qData.item_price + '"  class="inc qty_btn plus_item_btn" id="plus_item_btn">+</button></div></td>';
                                //ITEM QUTY CHANGE END     ------
                                tableData += '<td width="" style="text-aling:left;">' + qData.item_price + '</td>';
                                tableData += '<td width="">' + qData.tot_price + '</td>';
                                tableData += '<td width=""><button style="text-aling:center;" id="delete" class="btn btn-danger delStrData btn_font_size  btn-sm fa fa-times fa-sm" type="button" value="' + qData.id + '">&nbsp;Remove</button></td>';
                                tableData += '</tr>';
                            });
                            tableData += '<tr><td colspan="7" ><a href="index.php"><button type="button" class="btn btn-success table_font_size"> << KEEP SHOPPING</button></a></td></tr>';
                        }
                        $('.load_cart_tbl tbody').html(tableData);
                    }, "json");
                }

                //DELETE CART ITEM  =============================================
                $(document).on('click', '#delete', function () {
                    var id = $(this).val();
                    cart_item_remove(id)
                    load_cart_item_list();
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
                }
                );
              

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


                //              ITEM PLUS (+) BTNBTN==========================================
                $(document).on('click', '.plus_item_btn ', function () {
                    var qty = parseInt($(this).closest("tr")
                            .find(".input_qty")
                            .val());

                    var new_qty = qty + 1;
                    $(this).closest("tr")   // Finds the closest row <tr> 
                            .find(".input_qty")     // Gets a descendent with class="nr"
                            .val(new_qty);


//                 CAL ITEM TOTAL PRICE-----------------------------------------
                    var cart_id = ($(this).data('cart_id'));
                    var price = ($(this).data('price'));
                    var qty = new_qty;
                    add_minus_cal(cart_id, price, qty);


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
                    var cart_id = ($(this).data('cart_id'));
                    var price = ($(this).data('price'));
                    var qty = new_qty;
                    add_minus_cal(cart_id, price, qty);
                });

//(+) ADD (-) MINUS CALCULATION FUCTION -------------------------------------------
                function add_minus_cal(cart_id, price, qty) {
                    var tot_price = (qty * price);
                    $.post("./loaddata.php", {action: 'update_cart_in_tbl', id: cart_id, tot_price: tot_price, qty: qty}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            alert('Error in deleting');
                        } else {
                            item_tot();
                        }
                    }, "json");
                }



            </script>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>
</html>
