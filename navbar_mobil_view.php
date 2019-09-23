<?php
require_once('./config/dbc.php');
require_once('./class/systemSetting.php');
$system = new setting();

$date = date("Y-m-d");
$time = date("h:i:sa");
?>
<html>
    <body>

        <!--<!DOCTYPE html>-->
        <?php
//NAVIGATION BAR MOBILE VIEW==============================================================
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
            $out_put = '<div class="container">'
                    . '<div class="row">'
                    . '<div class="col-md-12">';
            $out_put .= '<ul  class="">';
            $out_put .= '<li class="mob-menu-list-search-wrapper"><input type="text" name="search" maxlength="20"><i class="fa fa-search" aria-hidden="true"></i></li>';
            $out_put .= '<li><a href="index.php">home</a></li>';
            foreach ($main_cat_data as $val) {
                $main_cat_id = $val['main_cat_id'];
                $out_put .= '<li class="mob-itm-sub-categ-consist-wrapper"><a href="#">' . $val['main_cat_name'] . '<i class="fa fa-chevron-down" aria-hidden="true"></i></span></a>';
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
                        $out_put .= '<ul class="mob-sub-categ-wrapper">';
                        $sub_cat_id = $val2['sub_cat_id'];
                        $out_put .= '<li class="mob-sub-cat-inc-menu-itm-wrapper"><span class="sub-cat-inner-secnd-wrapper" id="sub-cat-a">' . $val2['sub_cat_name'] . '<i class="fa fa-chevron-down" aria-hidden="true"></i></span>';
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
                            $output_data = array();
                            $out_put .= '<ul class="mob-sub-in-sub-categ-wrapper mob-sub-in-sub-categ-a">';
                            foreach ($item_info_data as $val3) {

                                $main_cat_names = $val3['main_cat_name'];
                                $main_cat_id = $val3['main_cat_name'];
                                $sub_cat_name = $val3['sub_cat_name'];
                                $sub_cat_id = $val3['sub_cat_id'];
                                $item_name = $val3['item_name'];
                                $item_img = $val3['item_image'];
                                $item_price = $val3['item_price'];
                                $item_id = $val3['item_id'];

                                $out_put .= '<li><a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . ' " >' . $item_name . '</a></li>';
//                        $out_put .= '<li><a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . '  style="color: black; text-aling="right; " >' . $item_name . '&nbsp;-<img class="" align="right" style="text-aling:center;  width:100px; height:100px; "  src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"/></a>';
                            }
                            $out_put .= '</ul>';
                        }

                        $out_put .= '</li>';
                        $out_put .= '</ul>';
                    }
                }
                $out_put .= '</li>';
            }
            $out_put .= '<li><a href="login.php">Log In</a></li>';
            $out_put .= '<li><a href="register.php">Create Account</a></li>';

            $out_put .= '</ul></div></div></div>';
        }

        echo $out_put;
        ?>

    </body>

</html>
