
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
            <div class="row" style="padding-top: 50px;">
                <div class="col-lg-9">
                    <div class="" >
                        <div class="scrollable" style="height: auto; overflow-y: auto">
                            <table class="table table-bordered table-striped table-hover datable load_cart_tbl" id="load_cart_tbl">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Description</th>
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

                <div class="col-lg-3">
                    <span style="text-align: center;">
                        <div class="card" style="border-style: outset; border-radius: 5px; background-color: #e2a5a5;  border-color:gold;">
                            <h2 style="background-color: #f7f7f7; color: red; text-align: center;">Order Summary</h2>
                            <div class="card-body">
                                <h4  class="card-title">Order Value:&nbsp;<label class="item_tot_price"></label></h4>
                                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                               
                                
                                <a href="login.php"><button type="button" class="btn btn-info">CHECKOUT</button></a>
                            </div>
                        </div>
                    </span>
                </div>

            </div>
        </div>
        <!---->
        <!---728x90--->

        <div class="footer">

            <script type="text/javascript">
                $(document).on('ready', function () {
                    load_cart_item_list();



                });

                function load_cart_item_list() {
                    var tableData = '';
                    $.post("./loaddata.php", {action: 'load_cart_item_list'}, function (e) {
                        if (e === undefined || e.length === 0 || e === null) {
                            tableData += '<tr><th colspan="4" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        } else {
                            $.each(e, function (index, qData) {
                                index++;
                                tableData += '<tr>';
                                tableData += '<td width="">' + index + '</td>';
                                tableData += '<td width=""><img style=" height:40px;" src="../drugs_ordering_system_backend/uploads/' + qData.item_image + '" data-imagezoom="true" class="img-responsive"> ' + qData.item_name + '</td>';
                                //                            tableData += '<td width="">' + qData.item_description + '</td>';
                                tableData += '<td width=""> Item Link </td>';
                                tableData += '<td width="10%"><input class="size-36" step="1"  type="number" min="1" max="50" id="add_item_in_cart" class="form-control text-center"  data-price = "' + qData.item_price + '"  data-cart_id = "' + qData.id + '"  value="' + qData.item_qty + '"></td>';
                                tableData += '<td width="">' + qData.item_price + '</td>';
                                tableData += '<td width="">' + qData.tot_price + '</td>';
                                tableData += '<td width=""><button  id="delete" class="btn btn-danger delStrData   btn-sm fa fa-trash-o fa-sm" type="button" value="' + qData.id + '">Remove</button></td>';

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
                $(document).on('click', '#add_item_in_cart', function () {
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







            </script>


            <!--FOOTER--////////////////////////////////////////////////////////>-->
            <div class="header">
                <?php require_once('include/footer.php'); ?>
            </div>

            <script>
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
            </script>

            <!--FOOTER-- end////////////////////////////////////////////////////>-->
        </div>
    </body>

