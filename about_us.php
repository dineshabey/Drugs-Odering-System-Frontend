
<?php
session_start();
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
                font-size: 20px;
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
            <?php // require_once('include/coustomer_header_for_client.php'); ?>
            <?php require_once('header2.php'); ?>
        </div>

        <!--sub header-- end////////////////////////////////////////////////////>-->
        <!-- Nav tabs -->

        <!--<div class="container"><h5 style="color:#4245bb;">Client Area / Welcome <?php echo $_SESSION['uname'] ?> </h5></div>-->
        <!--<hr style="border: 1px solid #d1cbea;">-->
        <div id="exTab1" class="container" >	
            <!--<hr style="border: 1px solid #d1cbea;">-->
            <h3 style="text-align: center;"><a href="index.php"><span style="border: 1px solid blue;"> HOME </span></a> >><span>Our policies</span></h3><hr>
            <ul  class="nav nav-pills" style="background-color: #fcfe6d85; font-weight: 400;">
                <li class="active">
                    <a  href="#our_policies_tab" data-toggle="tab" class="size-36"><span class="">Our policies </span></a>
                </li>
                <li>
                    <a href="#our_vision" data-toggle="tab" class="size-36">Our Vision</a>
                </li>
                <!--                <li>
                                    <a href="#order_deatails_tab" data-toggle="tab" class="size-36">Order Shipping Deatails</a>
                                </li>
                                <li>
                                    <a href="#profile_setting_tab" data-toggle="tab" class="size-36">Profile Setting</a>
                                </li>-->
            </ul>

            <div class="tab-content clearfix" style="background-color: #ffffffb5; color: black; ">
                <div class="tab-pane active" id="our_policies_tab">
                    <h3  style="">Our policies</h3>
                    <hr style="  border-top: 1px solid red;">
                    <div class="container">
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-lg-9">
                                <p><h2>
                                    Generate custom-made legal agreements in minutes and keep yourself and your business safe. Do not wait
                                    until it's too late and get compliant with the latest government and service requirements today to avoid lawsuits, 
                                    claims and hefty fines and win your customers' trust by being transparent.
                                </h2> </p>
                            </div>
                        </div>
                    </div>
                    <hr style="  border-top: 1px solid red;">
                </div>
                <div class="tab-pane" id="our_vision">
                    <h4>Our Vision</h4>
                    <hr style="  border-top: 1px solid red;">
                    <div class="row">
                        <div class="container">
                            <div class="row" style="padding-top: 10px;">
                                <div class="col-lg-9">
                                    <p><h2>
                                        Generate custom-made legal agreements in minutes and keep yourself and your business safe. Do not wait
                                        until it's too late and get compliant with the latest government and service requirements today to avoid lawsuits, 
                                        claims and hefty fines and win your customers' trust by being transparent.
                                    </h2> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="  border-top: 1px solid red;">
                </div>
                <div class="tab-pane" id="order_deatails_tab">
                    <h4>Order Shipping Deatails </h4>
                    <hr style="  border-top: 1px solid red;">
                    <div class="row">
                        <div class="container">
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
                <div class="tab-pane" id="profile_setting_tab">
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
                                                        <h5 id="f_name_msg" style="color: red;"></h5>
                                                    </div>
                                                </div>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="textinput">Last Name</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput" disabled="" id="l_name" type="text" placeholder="" class="form-control input-md">
                                                        <h5 id="l_name_msg" style="color: red;"></h5>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="textinput">Phone</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput" disabled="" id="phone" type="text" placeholder="" class="form-control input-md">
                                                        <h5 id="phone_msg" style="color: red;"></h5>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="textinput">E mail</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput" disabled="" id="email" type="text" placeholder="" class="form-control input-md">
                                                        <h5 id="email_msg" style="color: red;"></h5>
                                                        <h5 id="email_msg_suc" style="color: red;"></h5>
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
                                                        <textarea class="form-control" disabled=""  id="address" name="textarea"></textarea>
                                                        <h5 id="address_msg" style="color: red;"></h5>
                                                    </div>
                                                </div>
                                                <hr style="  border-top: 1px solid red;" class="col-md-12">
                                                <div class="form-group password hidden" >
                                                    <label class="col-md-4 control-label" for="textinput">New Password</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput"  id="password" type="password" placeholder="New Password" class="form-control input-md">
                                                        <h5 id="address_msg" style="color: red;"></h5>
                                                    </div>
                                                </div>
                                                <div class="form-group password hidden">
                                                    <label class="col-md-4 control-label" for="textinput">Re-enter password</label>  
                                                    <div class="col-md-7">
                                                        <input  name="textinput"  id="confirm_password" type="password" placeholder="Re-enter password" class="form-control input-md">
                                                        <h5 id="passMasseg" style="color: red;"></h5>
                                                    </div>
                                                </div>

                                                <!-- Button -->
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for=""></label>
                                                    <div class=" btn-group" role="group">
                                                        <button type="button" id="next_step" name=""  class="next_step btn btn-primary hidden">NEXT STEP</button>
                                                        <button  type="button" id="next_step_edit" name="" class="next_step_edit btn btn-primary ">EDIT DEATAILS</button>
                                                        <button  type="button" id="next_step_reset" name="" class="next_step_reset btn btn-danger hidden">RESET</button>
                                                        <button id="next_step_update" name=""  class="next_step_update btn btn-info ">UPDATE DEATAILS</button>
                                                        <button  type="button" id="order_confirm" name="" class="order_confirm btn btn-success hidden">ODER CONFIRM</button>
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
                    <div class="modal-dialog" style="z-index: 1 !important ; top:140px !important;">

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
                    load_cart_item_list();
                    item_tot();
                });

            </script>
        </div>




        <!--FOOTER-- end////////////////////////////////////////////////////>-->

    </body>
</html>

