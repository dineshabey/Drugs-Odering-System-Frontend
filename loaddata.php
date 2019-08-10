<?php

//require 'inc/dbc.php';
//require 'class/systemSetting.php';
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
// GET USER IP ADDRESS END---------------------------------------------------------
//echo"fdfd";
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
//COUSTOMER REGISTRATION (INSERT)============ ==================================
    } else if ($_POST['action'] == 'reg_cus') {
        $send_obj = $_POST['send_obj'];

        $query = "INSERT INTO `customer_deatails` ( `f_name`, `l_name`, `email`, `city`, `address`, `phone`, "
                . "`password`,  `account_status`, `reg_date`,`reg_time`) "
                . "VALUES ( '{$send_obj['f_name']}', '{$send_obj['l_name']}', '{$send_obj['email']}', '{$send_obj['city']}', '{$send_obj['address']}', '{$send_obj['phone']}', '{$send_obj['password']}' , '0', '$date','$time');";
        $system->prepareCommandQueryForAlertify($query, "Value insert successfully .!", "Error !");
    }
//DELETE CART ITEM ==== =========================================================
    else if ($_POST['action'] == 'cart_item_remove') {
        $query = "DELETE FROM `web_cart` WHERE (`id`='{$_POST['id']}')";
        $system->deleteQuery($query, "Value delete successfully .!", "Error !");
//UPDATE CART ITEM IN TABALE ====================================================
    } else if ($_POST['action'] == 'update_cart_in_tbl') {
        //data update ------------------------------------------------------
        $query = "UPDATE `web_cart` SET  `item_qty`='{$_POST['qty']}', `item_price`='{$_POST['tot_price']}' WHERE (`id`='{$_POST['id']}');";
        $system->prepareCommandQueryForAlertify($query, "Update Successfully", "Erro while updating");
//ADD TO CART DATA INSERT =========================================================
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
//data update ------------------------------------------------------
            $update_qry = "UPDATE `web_cart` SET  `item_qty`='$new_qty', `item_price`='$new_price' WHERE (`id`='{$row['id']}');";
            $system->prepareCommandQuerySpecial($update_qry);
        } else {
//data insert in first time --------------------------------------------
            $insert_query = "INSERT INTO `web_cart` (`user_key`, `item_id`, `item_qty`, `item_price`) VALUES ( '$user_key', '{$_POST['item_id']}', '1', '{$_POST['price']}');";
            $system->prepareCommandQuerySpecial($insert_query);
        }
    } else if ($_POST['action'] == 'item_total') {
// GET ITEM TOTAL - ---------------------------------------------------------------
        $qry = "SELECT
SUM(web_cart.item_qty) as item_tot,
SUM(web_cart.item_price) AS item_tot_price
FROM
web_cart
WHERE
web_cart.user_key = '$user_key'";
        $system->prepareSelectQueryForJSONSingleData($qry);
    } else if ($_POST['action'] == 'user_login') {
// USER LOGIN - ---------------------------------------------------------------
        $qry = "SELECT
customer_deatails.email,
customer_deatails.f_name,
customer_deatails.`password`
FROM
customer_deatails
WHERE
customer_deatails.email = '{$_POST['email']}' AND
customer_deatails.`password` = '{$_POST['pw']}'";

        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $qry) or die(mysqli_error());
        MainConfig::closeDB();
        $row = mysqli_fetch_assoc($result);
        if (!empty($row)) {
            //EMAIL & PW MATCH     -------------------------------------------
            echo json_encode("1");
        } else {
            //EMAIL & PW NOT MATCH -------------------------------------------
            echo json_encode("0");
        }
    } else if ($_POST['action'] == 'load_cart_item_list') {
// GET ITEM INFO. TO CART TBL - -----------------------------------------------------
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

                                $out_put .= '<div style="align: center;" class="product-inner" ><a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . ' "><img class="img-responsive" style="" width="60px" src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"></a>'
                                        . '<label style="align: center;"><h5 style="text-align: center;"><span style="color:blue;">' . $item_name . '</span></h5>'
                                        . '<h6 style="text-align: center;"><span style="color:red;">LKR : ' . $item_price . '</span></h6>'
                                        . '<button type="button" class="btn btn-success" id="add_to_cart_btn"  data-item_price = "' . $item_price . '"    value=' . $item_id . '>Add to cart</button>'
                                        . '</label>'
                                        . '</div>';
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

$out_put1 = '';
        if (!empty($main_cat_data)) {
            
            /*
            $out_put = '<div class="menu-container">
    <div class="menu" >
        <ul>';
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
                     
                        $out_put .= '</li>';
                           $out_put .= '</ul>';
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
           $out_put .= '</ul></div></div>'   ;
        
             * 
             * 
             * 
             */
            
            $out_put1 = '<div class="menu-container">
    <div class="menu" >
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Nature Cream</a>
                <ul>
                    <li><a href="#">Web Developement</a>
                        <ul>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">CSS3</a></li>
                            <li><a href="#">PHP</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">Bio Cream</a>
                <ul>
                    <li><a href="#">Web Developement</a>
                        <ul>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">CSS3</a></li>
                            <li><a href="#">PHP</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">Suppliment</a>
                <ul>
                    <li><a href="#">Web Developement</a>
                        <ul>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">CSS3</a></li>
                            <li><a href="#">PHP</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Graphic Design</a>
                        <ul>
                            <li><a href="#">Sketch</a></li>
                            <li><a href="#">Photoshop</a></li>
                            <li><a href="#">Illustrator</a></li>
                            <li><a href="#">Corel Draw</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="#">About</a> </li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</div>
';
            
        }
        echo $out_put1;
    }//END LOAD NAV BAR MENU
    
    
    
}   //END ARRAY +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

