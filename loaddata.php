<?php

//require 'inc/dbc.php';
//require 'class/systemSetting.php';
session_start();
require_once('./config/dbc.php');
require_once('./class/systemSetting.php');
$system = new setting();

$date = date("Y-m-d");
$time = date("h:i:sa");

// GET USER IP ADDRESS ---------------------------------------------------------
function getUserIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$user_key = getUserIpAddr();
// GET USER IP ADDRESS END------------------------------------------------------
if (array_key_exists("action", $_POST)) {
//SINGAL PAGE LOAD SLIDER DATA =================================================
    if ($_POST['action'] == 'single_page_lode_slider') {
        $query = "SELECT
item_deatails.sub_cat_id,
item_deatails.item_id,
item_deatails.item_image,
item_deatails.item_name,
item_deatails.item_price
FROM
item_deatails
WHERE
item_deatails.img_status = '1' AND
item_deatails.item_view_status = '0' AND
item_deatails.sub_cat_id = '{$_POST['sub_cat_id']}'
ORDER BY
item_deatails.item_id DESC";
        $system->prepareSelectQueryForJSON($query);
//SINGAL PAGE LOAD SELECTED ITEM DATA ==========================================
    } else if ($_POST['action'] == 'single_page_selected_item') {
        $query = "SELECT
item_deatails.item_id,
item_deatails.item_name,
item_deatails.item_description,
item_deatails.item_price,
item_deatails.item_discount,
item_deatails.item_image,
item_deatails.item_video,
item_deatails.vdo_status
FROM
item_deatails
WHERE
item_deatails.item_id = '{$_POST['item_id']}'";
        $system->prepareSelectQueryForJSON($query);
        //DELETE(CANCEL) ORDER -================================================
    } else if ($_POST['action'] == 'cancel_order') {
        $query1 = "DELETE FROM `customer_added_item` WHERE (`cus_id`='{$_SESSION['cus_id']}' AND `pay_status` = '0' AND `item_save_status`= '1')";
        $query2 = "DELETE FROM `shipping_details` WHERE (`cus_id`='{$_SESSION['cus_id']}' AND `pay_status` = '0')";
        MainConfig::connectDB();
        $link = MainConfig::conDB();
//START TRANSACTION ------------------------------------------------------------
        $error = TRUE;
        mysqli_query($link, "START TRANSACTION");
        $result1 = mysqli_query($link, $query1);
        $result2 = mysqli_query($link, $query2);
        if (!$result1) {
            $error = FALSE;
            echo json_encode("300");
            return;
        }
        if (!$result2) {
            $error = FALSE;
            echo json_encode("400");
            return;
        }
        if ($error) {
            $error = TRUE;
            mysqli_query($link, "COMMIT");
            MainConfig::closeDB();
            echo json_encode("1");
            return;
        } else {
            mysqli_query($link, "ROLLBACK");
            MainConfig::closeDB();
            return;
        }

//COUSTOMER REGISTRATION (INSERT)============ ==================================
    } else if ($_POST['action'] == 'reg_cus') {
        $send_obj = $_POST['send_obj'];
        $query = "INSERT INTO `customer_details` ( `f_name`, `l_name`, `email`, `city`, `address`, `phone`, "
                . "`password`,  `account_status`, `reg_date`,`reg_time`) "
                . "VALUES ( '{$send_obj['f_name']}', '{$send_obj['l_name']}', '{$send_obj['email']}', '{$send_obj['city']}', '{$send_obj['address']}', '{$send_obj['phone']}', '{$send_obj['password']}' , '0', '$date','$time');";
        $system->prepareCommandQueryForAlertify($query, "Value insert successfully .!", "Error !");
//ADDED ITEM FOR LOG USER(INSERT)============ ==================================
    } else if ($_POST['action'] == 'data_insert_loging_user') {
        //        check insert data availabel-----------------------------------
        $qry = "SELECT
customer_added_item.id,
customer_added_item.cus_id,
customer_added_item.item_qty,
customer_added_item.item_save_status
FROM
customer_added_item
WHERE
customer_added_item.pay_status = '0' AND
customer_added_item.cus_id = '{$_POST['cus_id']}' AND
customer_added_item.item_id = '{$_POST['item_id']}'
";
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $qry) or die(mysqli_error());
        MainConfig::closeDB();
        $row = mysqli_fetch_assoc($result);
        if (!empty($row)) {
            $new_qty = ($row['item_qty']) + 1;
//data update ------------------------------------------------------------------
            $update_qry = "UPDATE `customer_added_item` SET  `item_qty`='$new_qty', `pay_status`='0',`item_save_status`='0' WHERE (`id`='{$row['id']}');";
            $system->prepareCommandQueryForAlertify($update_qry, "Update Successfully", "Erro while updating");
        } else {
//data insert in first time ----------------------------------------------------
            $qry_insert = "INSERT INTO `customer_added_item` (`cus_id`, `item_id`, `item_qty`, `pay_status`, `item_add_date`, `item_add_time`, `item_save_status`) VALUES ( '{$_POST['cus_id']}', '{$_POST['item_id']}', '1', '0', '$date', '$time', '0');";
            $system->prepareCommandQueryForAlertify($qry_insert, "Insert Successfully", "Erro while Inserting ");
        }
    }
//DELETE CART ITEM ==== ========================================================
    else if ($_POST['action'] == 'cart_item_remove') {
        $query = "DELETE FROM `web_cart` WHERE (`id`='{$_POST['id']}')";
        $system->deleteQuery($query, "Value delete successfully .!", "Error !");
//UPDATE ADD/REMOVE BUY ITEM STATUS CHANGE =====================================
    } else if ($_POST['action'] == 'add_buy') {
        $qry = "SELECT
item_deatails.item_id,
item_deatails.item_view_status,
item_deatails.item_name
FROM
item_deatails
WHERE
item_deatails.item_id = '{$_POST['item_id']}' AND
item_deatails.item_view_status = '0'";
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $qry) or die(mysqli_error());
        MainConfig::closeDB();
        $row = mysqli_fetch_assoc($result);
        if (!empty($row)) {
            $query = "UPDATE `customer_added_item` SET  `item_save_status`='{$_POST['status']}',`bill_no`='{$_POST['bill_no']}' WHERE (`id`='{$_POST['added_id']}');";
            $system->prepareCommandQueryForAlertify($query, "Value Update successfully .!", "Erro while updating !");
        } else {
            $qry = "DELETE FROM `customer_added_item` WHERE (`id`='{$_POST['added_id']}')";
            $system->deleteQuery($qry, "Remove Successfully", "Erro while removing ..!");
        }
//UPDATE CART ITEM IN TABALE ====================================================
    } else if ($_POST['action'] == 'update_cart_in_tbl') {
//data update ------------------------------------------------------
        $query = "UPDATE `web_cart` SET  `item_qty`='{$_POST['qty']}', `item_price`='{$_POST['tot_price']}' WHERE (`id`='{$_POST['id']}');";
        $system->prepareCommandQueryForAlertify($query, "Update Successfully", "Erro while updating");
//ADD TO CART DATA INSERT =======================================================
    } else if ($_POST['action'] == 'add_to_cart') {
//        check insert data availabel-------------------------------------------
        $qry = "SELECT
web_cart.id,
web_cart.user_key,
web_cart.item_id,
web_cart.item_qty,
web_cart.item_price
FROM
web_cart
WHERE
web_cart.user_key = '$user_key' AND
web_cart.item_id = '{$_POST['item_id']}'";
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $qry) or die(mysqli_error());
        MainConfig::closeDB();
        $row = mysqli_fetch_assoc($result);
        if (!empty($row)) {
            $new_qty = ($row['item_qty']) + 1;
            $new_price = (($row['item_price']) + $_POST['price']);
//data update ------------------------------------------------------------------
            $update_qry = "UPDATE `web_cart` SET  `item_qty`='$new_qty', `item_price`='$new_price' WHERE (`id`='{$row['id']}');";
            $system->prepareCommandQuerySpecial($update_qry);
        } else {
//data insert in first time ----------------------------------------------------
            $insert_query = "INSERT INTO `web_cart` (`user_key`, `item_id`, `item_qty`, `item_price`) VALUES ( '$user_key', '{$_POST['item_id']}', '1', '{$_POST['price']}');";
            $system->prepareCommandQuerySpecial($insert_query);
        }
    } else if ($_POST['action'] == 'card_payment_complete') {
        $send_obj = $_POST['send_obj'];
// CARD PAYMENT COMPLETE QRY///////////////////////////////////////////////////////

        //GET CUSTOMER ADDED ITEM DEATAILS START----------------------------------
        
        //GET CUSTOMER ADDED ITEM DEATAILS END------------------------------------
        
        
//            ALL UPDATE QRY START----------------------------------------------
        //%%%%%%%%%% UPDATE shipping_deatails TABLE %%%%%%%%%%%%%%%%%
        $qry1_up = "UPDATE `shipping_details` SET  `bill_no`='{$send_obj['bill_no']}',  `pay_status`='1', `order_value`='{$send_obj['oder_val']}', `order_discount`='{$send_obj['tot_discount_val']}' WHERE (`shipping_id`='{$send_obj['shipping_id']}');";
        //%%%%%%%%%% UPDATE coustomer_added_item TABLE %%%%%%%%%%%%%%%
        $qry2_up = "UPDATE `customer_added_item` SET   `pay_status`='1', `item_save_status`='3' WHERE (`cus_id`='{$_SESSION['cus_id']}' AND `bill_no`='{$send_obj['bill_no']}');";
        //%%%%%%%%%% UPDATE bill_no TABLE %%%%%%%%%%%%%%%%%%%%%%%%%%%%
        $new_bill_no = ($send_obj['bill_no']) + 1;
        $qry3_up = "UPDATE `bill_no` SET  `bill_no`='{$new_bill_no}', `bill_status`='1' WHERE (`cus_id`='{$_SESSION['cus_id']}' AND `bill_no`='{$send_obj['bill_no']}');";
//            ALL UPDATE QRY END------------------------------------------------
//            ALL INSERT  QRY START---------------------------------------------
        //%%%%%%%%%% INSERT pay_completed_invoice_summary TABLE %%%%%%%%%%%%%%%%
        $qry1_in = "INSERT INTO `pay_completed_invoice_summary` (`shipping_id`, `order_value`, `pay_date`, `pay_time`, `pay_status`) VALUES ( '{$send_obj['shipping_id']}', '{$send_obj['oder_val']}', '$date', '$time', '2');";
        //%%%%%%%%%% INSERT pay_completed_item_summary TABLE %%%%%%%%%%%%%%%%
        $qry3_in = "INSERT INTO `pay_completed_item_summary` ( `cus_added_item_id`, `item_tot_discount`, `item_unit_discount`, `item_unit_price`, `item_qty`, `item_tot_bill_price`, `item_pay_date`, `item_pay_time`) VALUES ( NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";

        //-----------------------------------------------------------------------
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $error = TRUE;
        mysqli_query($link, "START TRANSACTION");

        $result_qry1_up = mysqli_query($link, $qry1_up) or die(mysqli_error());
        $result_qry2_up = mysqli_query($link, $qry2_up) or die(mysqli_error());
        $result_qry3_up = mysqli_query($link, $qry3_up) or die(mysqli_error());

        $result_qry1_in = mysqli_query($link, $qry1_in) or die(mysqli_error());
        $invoice_id = mysqli_insert_id($link);
        //%%%%%%%%%% INSERT shipping order list TABLE %%%%%%%%%%%%%%%%%%%%%%%%%%
        $qry2_in = "INSERT INTO `shipping_order_list` (`invoice_id`,  `order_complete_status`) VALUES ( '{$invoice_id}', '0');";
        $result_qry2_in = mysqli_query($link, $qry2_in) or die(mysqli_error());
        //----------------------------------------------------------------------
        if (!$result_qry1_up) {
            $error = FALSE;
            echo json_encode("100");
        }
        if (!$result_qry2_up) {
            $error = FALSE;
            echo json_encode("200");
        }
        if (!$result_qry3_up) {
            $error = FALSE;
            echo json_encode("300");
        }
        if (!$result_qry1_in) {
            $error = FALSE;
            echo json_encode("400");
        }
        if (!$result_qry2_in) {
            $error = FALSE;
            echo json_encode("500");
        }
        if ($error) {
            mysqli_query($link, "COMMIT");
            echo json_encode("1");
            return;
        } else {
            mysqli_query($link, "ROLLBACK");
            echo json_encode("2");
        }
    } else if ($_POST['action'] == 'item_total') {
// GET ITEM TOTAL - ------------------------------------------------------------
        $qry = "SELECT
SUM(web_cart.item_qty) as item_tot,
SUM(web_cart.item_price) AS item_tot_price
FROM
web_cart
WHERE
web_cart.user_key = '$user_key'";
        $system->prepareSelectQueryForJSONSingleData($qry);
    } else if ($_POST['action'] == 'added_item_tot') {
// ADDED ITEM TOTAL - ----------------------------------------------------------
        $qry = "SELECT
customer_added_item.id,
customer_added_item.cus_id,
customer_added_item.item_save_status,
customer_added_item.pay_status,
customer_added_item.item_qty,
item_deatails.item_price,
item_deatails.item_view_status,
item_deatails.item_discount,
SUM(item_deatails.item_price * customer_added_item.item_qty) AS oder_full_tot,
SUM(item_deatails.item_discount * customer_added_item.item_qty) AS oder_full_discount,
SUM(item_deatails.item_price * customer_added_item.item_qty)- SUM(item_deatails.item_discount * customer_added_item.item_qty) AS oder_full_pay_val,
customer_added_item.item_id
FROM
customer_added_item
INNER JOIN item_deatails ON customer_added_item.item_id = item_deatails.item_id
WHERE
item_deatails.item_view_status = '0' AND
customer_added_item.pay_status = '0' AND
customer_added_item.item_save_status = '1' AND
customer_added_item.cus_id = '{$_SESSION['cus_id']}'
";
        $system->prepareSelectQueryForJSONSingleData($qry);
    } else if ($_POST['action'] == 'get_shipping_deatails') {
// HET SHIPPING DEATAILS - ----------------------------------------------------------
        $qry = "SELECT
shipping_details.shipping_id,
shipping_details.cus_id,
shipping_details.recipients_name,
shipping_details.recipients_phone,
shipping_details.shipping_address,
shipping_details.user_note
FROM
shipping_details
WHERE
shipping_details.cus_id = '{$_SESSION['cus_id']}' AND
shipping_details.pay_status = '0'
";
        $system->prepareSelectQueryForJSONSingleData($qry);
    } else if ($_POST['action'] == 'load_transaction_tbl') {
// LOAD TRASACTION DEATAILS - ----------------------------------------------------------
        $qry = "SELECT
shipping_details.bill_no,
pay_completed_invoice_summary.order_value,
pay_completed_invoice_summary.invoice_id,
pay_completed_invoice_summary.pay_status,
pay_completed_invoice_summary.pay_date,
pay_completed_invoice_summary.pay_time
FROM
shipping_details
INNER JOIN pay_completed_invoice_summary ON pay_completed_invoice_summary.shipping_id = shipping_details.shipping_id
WHERE
shipping_details.cus_id = '{$_SESSION['cus_id']}' 
ORDER BY
pay_completed_invoice_summary.invoice_id DESC
";
        $system->prepareSelectQueryForJSON($qry);
    } else if ($_POST['action'] == 'load_shipping_tbl') {
// LOAD SHIPPING DEATAILS - ----------------------------------------------------------
        $qry = "SELECT
shipping_details.bill_no,
pay_completed_invoice_summary.order_value,
shipping_details.shipping_address,
shipping_order_list.poste_time,
shipping_order_list.dilivery_method,
shipping_order_list.order_complete_status,
shipping_order_list.invoice_id,
shipping_details.shipping_city,
shipping_details.recipients_name,
shipping_order_list.poste_date,
pay_completed_invoice_summary.pay_status
FROM
shipping_details
INNER JOIN pay_completed_invoice_summary ON pay_completed_invoice_summary.shipping_id = shipping_details.shipping_id
INNER JOIN shipping_order_list ON shipping_order_list.invoice_id = pay_completed_invoice_summary.invoice_id
WHERE
shipping_details.cus_id = '{$_SESSION['cus_id']}'
ORDER BY
pay_completed_invoice_summary.invoice_id DESC
";
        $system->prepareSelectQueryForJSON($qry);
    } else if ($_POST['action'] == 'add_shipping_deatail') {
        $send_obj = $_POST['send_obj'];
// INSERT SHIPPING DEATAILS - ----------------------------------------------------------
        $qry = ("INSERT INTO `shipping_details`
            (`cus_id`, `recipients_name`, `recipients_phone`, `shipping_city`, 
            `shipping_address`, `user_note`, `shipping_status`, `pay_status`, `order_value`,
            `order_discount`, `order_status`) 
            VALUES ( '{$_SESSION['cus_id']}', '{$send_obj['recipient_name']}', '{$send_obj['recipient_phone']}', '-',
            '{$send_obj['address']}', '{$send_obj['note']}', '0', '0', '0', 
            '0', '0');");
        $system->prepareCommandQueryForAlertify($qry, "Insert Successfully", "Erro while inserting");
    } else if ($_POST['action'] == 'update_shipping_deatail') {
        $send_obj = $_POST['send_obj'];
// UPDATE SHIPPING DEATAILS - ----------------------------------------------------------
        $qry = ("UPDATE `shipping_details` SET  `recipients_name`='{$send_obj['recipient_name']}', `recipients_phone`='{$send_obj['recipient_phone']}',"
                . " `shipping_city`='-', `shipping_address`='{$send_obj['address']}', `user_note`='{$send_obj['note']}' WHERE (`shipping_id`='{$send_obj['id']}');");
        $system->prepareCommandQueryForAlertify($qry, "Insert Successfully", "Erro while inserting");
    } else if ($_POST['action'] == 'added_item_summary') {
// ADDED ITEM TOTAL SUMMARY- ----------------------------------------------------------
        $qry = "SELECT
customer_added_item.id,
customer_added_item.cus_id,
customer_added_item.item_save_status,
customer_added_item.pay_status,
customer_added_item.item_qty,
item_deatails.item_price,
item_deatails.item_view_status,
item_deatails.item_discount,
(item_deatails.item_price * customer_added_item.item_qty) AS oder_full_tot,
(item_deatails.item_discount * customer_added_item.item_qty) AS oder_full_discount,
(item_deatails.item_price * customer_added_item.item_qty)-(item_deatails.item_discount * customer_added_item.item_qty) AS oder_full_pay_val,
customer_added_item.item_id,
item_deatails.item_name,
customer_added_item.bill_no
FROM
customer_added_item
INNER JOIN item_deatails ON customer_added_item.item_id = item_deatails.item_id
WHERE
item_deatails.item_view_status = '0' AND
customer_added_item.pay_status = '0' AND
customer_added_item.item_save_status = '1' AND
customer_added_item.cus_id = '{$_SESSION['cus_id']}'";
        $system->prepareSelectQueryForJSON($qry);
    } else if ($_POST['action'] == 'log_out') {
// SESSION UNSET ---- - --------------------------------------------------------
        unset($_SESSION['uname']);
        unset($_SESSION['cus_id']);
// SESSION DISTROY ---- - ------------------------------------------------------
        session_destroy();
//CHECK SESSION DESTROY OR NOT -------------------------------------------------
        if (isset($_SESSION['cus_id'])) {
//SESSION DISTROY NOT COMPLETED------------------------
//            echo $_SESSION['uname'];
            echo json_encode("0");
        } else {
//SESSION DISTROY COMPLETED------------------------
//            echo $_SESSION['uname'];
            echo json_encode("1");
        }
    } else if ($_POST['action'] == 'user_login') {
// USER LOGIN (COUSTPMER)- -----------------------------------------------------
        $qry = "SELECT
customer_details.account_status,
customer_details.`password`,
customer_details.email,
customer_details.f_name,
customer_details.cus_id
FROM
customer_details
WHERE
customer_details.account_status = '0' AND
customer_details.`password` = '{$_POST['pw']}' AND
customer_details.email = '{$_POST['email']}'
";
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $qry) or die(mysqli_error());
        MainConfig::closeDB();
        $row = mysqli_fetch_assoc($result);

        if (!empty($row)) {
//SELECT WEB CART DATA ---------------------------------------------
            $select_web_cart = $system->prepareSelectQuery("SELECT
web_cart.id,
web_cart.user_key,
web_cart.item_id,
web_cart.item_qty,
item_deatails.item_view_status
FROM
web_cart
INNER JOIN item_deatails ON web_cart.item_id = item_deatails.item_id
WHERE
web_cart.user_key = '$user_key' AND
item_deatails.item_view_status = '0'");

            MainConfig::connectDB();
            $link = MainConfig::conDB();
//START TRANSACTION ------------------------------------------------------------
            $error = TRUE;
            mysqli_query($link, "START TRANSACTION");

            if (!empty($select_web_cart)) {
                foreach ($select_web_cart as $val) {
                    //CHECK ADDED ITEM AVAILABEL OR NOT ------------------------
                    $select_qry = "SELECT
customer_added_item.id,
customer_added_item.cus_id,
customer_added_item.item_id,
customer_added_item.pay_status,
customer_added_item.item_qty,
customer_added_item.item_save_status
FROM
customer_added_item
WHERE
customer_added_item.item_id = '{$val['item_id']}' AND
customer_added_item.cus_id = '{$row['cus_id']}' AND
customer_added_item.pay_status = '0' AND
customer_added_item.item_save_status = '0'
";
                    $result1 = mysqli_query($link, $select_qry) or die(mysqli_error());
                    $row1 = mysqli_fetch_assoc($result1);
                    if (!empty($row1)) {
                        $new_qty = ($row1['item_qty']) + 1;
                        //WEB CART DATA UPDATE TO ITEM ADDED TABLE ---------------------------------------
                        $qry_update = "UPDATE `customer_added_item` SET    `item_qty`='$new_qty', `pay_status`='0', `item_add_date`='$date', `item_add_time`='$time', `item_save_status`='0' WHERE (`id`='{$row1['id']}');";
                        $save = mysqli_query($link, $qry_update);
                        if (!$save) {
                            $error = FALSE;
                            echo json_encode("720");
                            return;
                        }
                    } else {
                        //WEB CART DATA CPPY TO ITEM ADDED TABLE ---------------------------------------
                        $qry_insert = "INSERT INTO `customer_added_item` (`cus_id`, `item_id`,`item_qty`, `pay_status`,`item_add_date`,`item_add_time`) "
                                . "VALUES"
                                . " ('{$row['cus_id']}', '{$val['item_id']}','{$val['item_qty']}', '0','$date','$time');";

                        $save = mysqli_query($link, $qry_insert);
                        if (!$save) {
                            $error = FALSE;
                            echo json_encode("730");
                            return;
                        }
                    }
                }
                //CHECK BILL NO GET OR NOT -----------------------------------------
                $qry_bill = ("SELECT
bill_no.bill_id,
bill_no.bill_no,
bill_no.bill_status
FROM
bill_no
WHERE
bill_no.cus_id = {$row['cus_id']}");
//                MainConfig::connectDB();
//                $link = MainConfig::conDB();
                $result = mysqli_query($link, $qry_bill);
                $row_bill = mysqli_fetch_assoc($result);

                if (!empty($row_bill)) {
                    //bill status 0 is not complete bill
                    //bill status 1 is  complete bill
                    if ($row_bill['bill_status'] == 1) {
                        $nw_bill_no = ($row_bill['bill_no']) + 1;
                        //UPDATE QRY -----------------------------------------------
                        $qry = "UPDATE `bill_no` SET `bill_no`='{$nw_bill_no}', `bill_status`='0' WHERE (`bill_id`='{$row_bill['bill_id']}'));";
                        $update = mysqli_query($link, $qry);
                        if (!$update) {
                            $error = FALSE;
                            echo json_encode("760");
//                            echo 'Data update error in to bill no tbl';
                            return;
                        }
                    }
                } else {
                    //INSERT QRY --------------------------------------------------
                    $qry = "INSERT INTO `bill_no` ( `cus_id`, `bill_no`) VALUES ('{$row['cus_id']}', '1');";
                    $insert = mysqli_query($link, $qry);
                    if (!$insert) {
                        $error = FALSE;
                        echo json_encode("750");
//                        echo 'Data insert error in to bill no tbl';
                        return;
                    }
                }
                if ($error) {
//DELETE DATA IN WEB CART ----------------------------------
                    $qry_delete = "DELETE FROM `web_cart` WHERE (`user_key`='$user_key')";
                    $qry = mysqli_query($link, $qry_delete);
                    if (!$qry) {
                        $error = FALSE;
                        echo 'Data delete error in web cart';
                        return;
                    } else {
                        //SET LOGIN USER INTO SESSEON ------ -------------------------------
                        $_SESSION['uname'] = $row['f_name'];
                        $_SESSION['cus_id'] = $row['cus_id'];
                        //------------------------------------------------------------------
                        $error = TRUE;
                        mysqli_query($link, "COMMIT");
                        MainConfig::closeDB();
                        echo json_encode("1");
                        return;
                    }
                } else {
                    mysqli_query($link, "ROLLBACK");
                    MainConfig::closeDB();
//                    echo "data insert error";
                    echo json_encode("0");
                    return;
                }
            } else {
                //CHECK BILL NO GET OR NOT -----------------------------------------
                $qry_bill = ("SELECT
bill_no.bill_id,
bill_no.bill_no,
bill_no.bill_status
FROM
bill_no
WHERE
bill_no.cus_id = {$row['cus_id']}");
                MainConfig::connectDB();
                $link = MainConfig::conDB();
                $result = mysqli_query($link, $qry_bill);
                $row_bill = mysqli_fetch_assoc($result);

                if (!empty($row_bill)) {
                    //bill status 0 is not complete bill
                    //bill status 1 is  complete bill
                    if ($row_bill['bill_status'] == 1) {
                        $nw_bill_no = ($row_bill['bill_no']) + 1;
                        //UPDATE QRY -----------------------------------------------
                        $qry = "UPDATE `bill_no` SET `bill_no`='{$nw_bill_no}', `bill_status`='0' WHERE (`bill_id`='{$row_bill['bill_id']}'));";
                        $update = mysqli_query($link, $qry);
                        if (!$update) {
                            $error = FALSE;
                            echo json_encode("760");
                            return;
                        }
                    }
                } else {
                    //INSERT QRY --------------------------------------------------
                    $qry = "INSERT INTO `bill_no` ( `cus_id`, `bill_no`) VALUES ('{$row['cus_id']}', '1');";
                    $insert = mysqli_query($link, $qry);
                    if (!$insert) {
                        $error = FALSE;
                        echo json_encode("750");
                        return;
                    }
                }
                //SET LOGIN USER INTO SESSEON ------ -------------------------------
                $_SESSION['uname'] = $row['f_name'];
                $_SESSION['cus_id'] = $row['cus_id'];
                //------------------------------------------------------------------
                //NOT WEB CART ADDED ITEM --------------------------------------
                echo json_encode("5");
            }
//EMAIL & PW MATCH     -------------------------------------------
        } else {
//EMAIL & PW NOT MATCH -------------------------------------------
            echo json_encode("0");
        }
    } else if ($_POST['action'] == 'load_cart_item_list') {
// GET ITEM INFO. TO CART TBL - ------------------------------------------------
        $qry = "SELECT
web_cart.user_key,
web_cart.item_id,
web_cart.item_qty,
web_cart.item_price as tot_price,
web_cart.id,
item_deatails.item_name,
item_deatails.item_description,
item_deatails.item_image,
item_deatails.item_price
FROM
web_cart
INNER JOIN item_deatails ON web_cart.item_id = item_deatails.item_id
WHERE
web_cart.user_key = '$user_key'
ORDER BY
web_cart.id DESC";
        $system->prepareSelectQueryForJSON($qry);
    } else if ($_POST['action'] == 'added_item_remove') {
// REMOVE ADDED ITEM ------------ ------------------------------------------------
        $qry = "DELETE FROM `customer_added_item` WHERE (`id`='{$_POST['id']}')";
        $system->deleteQuery($qry, "Remove Successfully", "Erro while removing ..!");
    } else if ($_POST['action'] == 'add_minus_item_in_added_tbl') {
// ADDED ITEM TBL ADD/MINUS QTY UPDATE- ----------------------------------------
        $query = "UPDATE `customer_added_item` SET  `item_qty`='{$_POST['qty']}'  WHERE (`id`='{$_POST['added_id']}');";
        $system->prepareCommandQueryForAlertify($query, "Update Successfully", "Erro while updating");
    } else if ($_POST['action'] == 'load_user_added_item') {
// GET ITEM INFO. USER ADDED ITEM - --------------------------------------------
        $qry = "SELECT
customer_added_item.id,
customer_added_item.cus_id,
customer_added_item.item_id,
customer_added_item.item_qty,
customer_added_item.pay_status,
customer_added_item.item_save_status,
item_deatails.item_name,
item_deatails.item_price,
item_deatails.item_view_status,
item_deatails.item_discount,
item_deatails.item_image,
((item_deatails.item_price)*(customer_added_item.item_qty)) AS item_tot_price,
((item_deatails.item_discount)*(customer_added_item.item_qty)) AS item_tot_discount,
((item_deatails.item_price)*(customer_added_item.item_qty))-((item_deatails.item_discount)*(customer_added_item.item_qty)) AS item_tot_value,
bill_no.bill_no
FROM
customer_added_item
INNER JOIN item_deatails ON customer_added_item.item_id = item_deatails.item_id
INNER JOIN customer_details ON customer_added_item.cus_id = customer_details.cus_id
INNER JOIN bill_no ON bill_no.cus_id = customer_details.cus_id
WHERE
item_deatails.item_view_status = '0' AND
customer_added_item.pay_status = '0' AND
customer_added_item.cus_id = '{$_SESSION['cus_id']}'
ORDER BY
customer_added_item.id DESC";
        $system->prepareSelectQueryForJSON($qry);
    } else if ($_POST['action'] == 'load_slider_data_index_page') {
//SINGAL PAGE LOAD SLIDER DATA =================================================
        $main_cat_data = $system->prepareSelectQuery("SELECT
main_cat.main_cat_name,
main_cat.main_cat_id
FROM
main_cat
WHERE
main_cat.view_status = '0'
ORDER BY
main_cat.main_cat_id DESC");
        if (!empty($main_cat_data)) {
            $out_put = '';
            $main_cat_name = '';
            foreach ($main_cat_data as $val) {
                $main_cat_id = $val['main_cat_id'];
                $out_put .= '<div style="color: black; border: 1px solid #ddd; background:#39d239; margin: 1.5em 0; padding: 0.7em 1em">'
                        . '<h4>' . $val['main_cat_name'] . '</h4></div>';
                $sub_cat_data = $system->prepareSelectQuery("SELECT
sub_cat.sub_cat_id,
sub_cat.sub_cat_name
FROM
sub_cat
WHERE
sub_cat.view_status = '0' AND
sub_cat.main_cat_id = '$main_cat_id'
ORDER BY
sub_cat.sub_cat_id DESC");
                if (!empty($sub_cat_data)) {
                    foreach ($sub_cat_data as $val2) {
                        $sub_cat_id = $val2['sub_cat_id'];
                        $out_put .= '<div style="color: black;">'
                                . '<h4>' . $val2['sub_cat_name'] . '</h4></div>';

                        $item_info_data = $system->prepareSelectQuery("SELECT
item_deatails.item_id,
item_deatails.item_name,
item_deatails.item_price,
item_deatails.item_image,
item_deatails.item_discount,
sub_cat.sub_cat_name,
main_cat.main_cat_name,
main_cat.main_cat_id,
sub_cat.sub_cat_id
FROM
item_deatails
INNER JOIN sub_cat ON item_deatails.sub_cat_id = sub_cat.sub_cat_id
INNER JOIN main_cat ON sub_cat.main_cat_id = main_cat.main_cat_id
WHERE
item_deatails.sub_cat_id = '$sub_cat_id' AND
item_deatails.img_status = '1' AND
item_deatails.item_view_status = '0'
ORDER BY
item_deatails.item_id DESC");

                        if (!empty($item_info_data)) {
//                            $output_data = array();
//                            $sliderData = '<div>';

                            $out_put .= '<section class="slider regular"   style=" padding-top:10px ;">';

                            foreach ($item_info_data as $val3) {

                                $main_cat_names = $val3['main_cat_name'];
                                $main_cat_id = $val3['main_cat_name'];
                                $sub_cat_name = $val3['sub_cat_name'];
                                $sub_cat_id = $val3['sub_cat_id'];
                                $item_name = $val3['item_name'];
                                $item_img = $val3['item_image'];
                                $item_price = $val3['item_price'];
                                $item_id = $val3['item_id'];

//                                $out_put .= '<div align="center" class="product-inner" ><a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . ' "><img class="img-responsive" style="" width="60px" src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"></a>'
//                                        . '<label ><h5 style="text-align: center;"><span style="color:blue;">' . $item_name . '</span></h5>'
//                                        . '<h6 ><span style="color:red;">LKR : ' . $item_price . '</span></h6>'
//                                        . '<button type="button" class="btn btn-success" id="add_to_cart_btn"  data-item_price = "' . $item_price . '"    value=' . $item_id . '>Add to cart</button>'
//                                        . '</label>'
//                                        . '</div>';

                                $out_put .= '<div align="center" class="container  item" ><a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . ' "><img class="" style="" width="60px" src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"/></a>'
                                        . '<p aling="center"><h5>' . $item_name . '</h5>'
                                        . '<p style="color:red;">RS. : <em>' . $item_price . '</em></p>'
                                        . '<button type="button" class="btn btn-success add-to-cart" id="add_to_cart_btn"  data-item_price = "' . $item_price . '"    value=' . $item_id . '>Add to cart</button></p>'
                                        . '</div>';
//
//                                $out_put = '<div class="item">   <img width="60px" alt="item" src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"/>
//                        <h2>Item 1</h2>
//
//                        <p>Price: <em>$449</em>
//                        </p>
//                        <button class="add-to-cart" type="button">Add to cart</button>
//                    </div>';

                                $out_put .= '<div>    </div>';
//                           
                            }

                            $out_put .= '</div></section>';
                        }
                    }
                }
            }
            echo $out_put;
        }
    } else if ($_POST['action'] == 'load_nav_bar') {
//NAVIGATION BAR ============= =================================================
        $main_cat_data = $system->prepareSelectQuery("SELECT
main_cat.main_cat_name,
main_cat.main_cat_id
FROM
main_cat
WHERE
main_cat.view_status = '0'
ORDER BY
main_cat.main_cat_id DESC");

        if (!empty($main_cat_data)) {
            $out_put = '';
            $main_cat_name = '';
            foreach ($main_cat_data as $val) {
                $main_cat_id = $val['main_cat_id'];
//                echo '//////////////MAin Cat>>' . $val['main_cat_id'] . '<br>';
//                echo '/////////////main cat name>>' . $val['main_cat_name'] . '<br>';
//                        $out_put .='<div style="background-color: coral;">'. $val['main_cat_name'] . '</br></div>';
                $out_put .= '<div style="color: black; border: 1px solid #ddd; background:#39d239; margin: 1.5em 0; padding: 0.7em 1em">'
                        . '<h4>' . $val['main_cat_name'] . '</h4></div>';
                $sub_cat_data = $system->prepareSelectQuery("SELECT
sub_cat.sub_cat_id,
sub_cat.sub_cat_name
FROM
sub_cat
WHERE
sub_cat.view_status = '0' AND
sub_cat.main_cat_id = '$main_cat_id'
ORDER BY
sub_cat.sub_cat_id DESC");
                if (!empty($sub_cat_data)) {
                    foreach ($sub_cat_data as $val2) {
                        $sub_cat_id = $val2['sub_cat_id'];
//                        echo '=============SUB CAT ==' . $val2['sub_cat_id'] . '<br>';
//                        echo '============= SUB CAT name==' . $val2['sub_cat_name'] . '<br>';
                        $out_put .= '<div style="color: black;">'
                                . '<h4>' . $val2['sub_cat_name'] . '</h4></div>';

                        $item_info_data = $system->prepareSelectQuery("SELECT
item_deatails.item_id,
item_deatails.item_name,
item_deatails.item_price,
item_deatails.item_image,
item_deatails.item_discount,
sub_cat.sub_cat_name,
main_cat.main_cat_name,
main_cat.main_cat_id,
sub_cat.sub_cat_id
FROM
item_deatails
INNER JOIN sub_cat ON item_deatails.sub_cat_id = sub_cat.sub_cat_id
INNER JOIN main_cat ON sub_cat.main_cat_id = main_cat.main_cat_id
WHERE
item_deatails.sub_cat_id = '$sub_cat_id' AND
item_deatails.img_status = '1' AND
item_deatails.item_view_status = '0'
ORDER BY
item_deatails.item_id DESC");

                        if (!empty($item_info_data)) {
//                            $output_data = array();
//                            $sliderData = '<div>';
//                            $out_put .= '<section class="slider regular"   style=" padding-top:10px ;">';

                            foreach ($item_info_data as $val3) {

                                $main_cat_names = $val3['main_cat_name'];
                                $main_cat_id = $val3['main_cat_name'];
                                $sub_cat_name = $val3['sub_cat_name'];
                                $sub_cat_id = $val3['sub_cat_id'];
                                $item_name = $val3['item_name'];
                                $item_img = $val3['item_image'];
                                $item_price = $val3['item_price'];
                                $item_id = $val3['item_id'];

                                $out_put .= '<label style="text-align: center;"><h5 style="text-align: center;"><span style="color:blue;">' . $item_name . '</span></h5>'
                                        . '</label>'
                                        . '</div>';
                                $out_put .= '<div>    </div>';
//                           
                            }

//                            $out_put .= '</div></section>';
                        }
                    }
                }
            }
            echo $out_put;
        }
    } else if ($_POST['action'] == 'load_nav_bar_menu') {
//ASHAN RAJAPAKSHA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
//NAVIGATION BAR ============= =================================================
        $main_cat_data = $system->prepareSelectQuery("SELECT
main_cat.main_cat_name,
main_cat.main_cat_id
FROM
main_cat
WHERE
main_cat.view_status = '0'
ORDER BY
main_cat.main_cat_id DESC");


        if (!empty($main_cat_data)) {
            $out_put = '';
            $main_cat_name = '';
            foreach ($main_cat_data as $val) {
                $main_cat_id = $val['main_cat_id'];
//                echo '//////////////MAin Cat>>' . $val['main_cat_id'] . '<br>';
//                echo '/////////////main cat name>>' . $val['main_cat_name'] . '<br>';
//                        $out_put .='<div style="background-color: coral;">'. $val['main_cat_name'] . '</br></div>';
//                $out_put .= '<ul>';
                $out_put .= '<li>';
                $out_put .= '<a href="index.php">' . $val['main_cat_name'] . '</a>';
//                $out_put .= '</ul>';
//                $out_put .= '</li>';
//                $out_put .= ' <li>popopopopo</li>';
                $sub_cat_data = $system->prepareSelectQuery("SELECT
sub_cat.sub_cat_id,
sub_cat.sub_cat_name
FROM
sub_cat
WHERE
sub_cat.view_status = '0' AND
sub_cat.main_cat_id = '$main_cat_id'
ORDER BY
sub_cat.sub_cat_id DESC");
                if (!empty($sub_cat_data)) {
                    foreach ($sub_cat_data as $val2) {
                        $sub_cat_id = $val2['sub_cat_id'];
//                        echo '=============SUB CAT ==' . $val2['sub_cat_id'] . '<br>';
//                        echo '============= SUB CAT name==' . $val2['sub_cat_name'] . '<br>';
                        $out_put .= '<ul>';
                        $out_put .= '<li>';
                        $out_put .= '<a style="color: black;">' . $val2['sub_cat_name'] . '</a>';
//                        $out_put .= '<div</div>';
//                       

                        $item_info_data = $system->prepareSelectQuery("SELECT
item_deatails.item_id,
item_deatails.item_name,
item_deatails.item_price,
item_deatails.item_image,
item_deatails.item_discount,
sub_cat.sub_cat_name,
main_cat.main_cat_name,
main_cat.main_cat_id,
sub_cat.sub_cat_id
FROM
item_deatails
INNER JOIN sub_cat ON item_deatails.sub_cat_id = sub_cat.sub_cat_id
INNER JOIN main_cat ON sub_cat.main_cat_id = main_cat.main_cat_id
WHERE
item_deatails.sub_cat_id = '$sub_cat_id' AND
item_deatails.img_status = '1' AND
item_deatails.item_view_status = '0'
ORDER BY
item_deatails.item_id DESC");

                        if (!empty($item_info_data)) {
//                            $output_data = array();
//                            $sliderData = '<div>';
//                            $out_put .= '<section class="slider regular"   style=" padding-top:10px ;">';

                            foreach ($item_info_data as $val3) {

                                $main_cat_names = $val3['main_cat_name'];
                                $main_cat_id = $val3['main_cat_name'];
                                $sub_cat_name = $val3['sub_cat_name'];
                                $sub_cat_id = $val3['sub_cat_id'];
                                $item_name = $val3['item_name'];
                                $item_img = $val3['item_image'];
                                $item_price = $val3['item_price'];
                                $item_id = $val3['item_id'];




//                                $out_put .= '<label style="text-align: center;"><h5 style="text-align: center;"><span style="color:blue;">' . $item_name . '</span></h5>'
//                                        . '</label>'
//                                        . '</div>';
//                           
                            }
//                                $out_put .= '</ul>';
//                                $out_put .= '</li>';
//                            $out_put .= '</div></section>';
                        }
                        $out_put .= '</ul>';
                        $out_put .= '</li>';
                    }

//                        $out_put .= '<ul>';
//                        $out_put .= '<li>';
//                        $out_put .= '<ul>';
                }
            }
            $out_put .= '</li>';

//            $out_put .= '</li>';
//                 $out_put .= '</ul>';
//                $out_put .= '</li>';
//                            $out_put .= '</ul>';
        }
        echo $out_put;
    }
}   //END ARRAY +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

