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
            $out_put = '<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="menu-items-inner-wrapper"> ';
            $main_cat_name = '';

            $out_put .= '<ul  class="">';
            $out_put .= '<li><a href="index.php" style="border: 2px solid black;  background:#007d1d ; border-radius: 25px;">HOME </a></li>';
            foreach ($main_cat_data as $val) {
                $main_cat_id = $val['main_cat_id'];
                $out_put .= '<li><a href="" class="itm-sub-categ-consist-wrapper" style="border: 2px solid black;  background:#3981da ; border-radius: 25px;">' . $val['main_cat_name'] . '<i class="fa fa-chevron-down" aria-hidden="true"></i></a>';

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
                    $out_put .= '<ul class="sub-categ-wrapper">';
                    foreach ($sub_cat_data as $val2) {
                        $sub_cat_id = $val2['sub_cat_id'];
                        $out_put .= '<li class="sub-cat-inc-menu-itm-wrapper"><a href="#">' . $val2['sub_cat_name'] . '<i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
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
                            $out_put .= '<ul class="sub-in-sub-categ-wrapper">';
                            foreach ($item_info_data as $val3) {

                                $main_cat_names = $val3['main_cat_name'];
                                $main_cat_id = $val3['main_cat_name'];
                                $sub_cat_name = $val3['sub_cat_name'];
                                $sub_cat_id = $val3['sub_cat_id'];
                                $item_name = $val3['item_name'];
                                $item_img = $val3['item_image'];
                                $item_price = $val3['item_price'];
                                $item_id = $val3['item_id'];

//                                        $out_put .= '<li><a style="color: black;">' . $item_name . '</a>';
                                $out_put .= '<li><a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . ' " >' . $item_name . '</a></li>';
//                        $out_put .= '<li><a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . '  style="color: black; text-aling="right; " >' . $item_name . '&nbsp;-<img class="" align="right" style="text-aling:center;  width:100px; height:100px; "  src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"/></a>';
                            }
                            $out_put .= '</ul>';
                        }

                        $out_put .= '</li>';
                    }
                    $out_put .= '</ul>';
                }
            }
            $out_put .= '</li></ul></div></div></div></div>';
        }

        echo $out_put;
        ?>

    </body>

</html>
