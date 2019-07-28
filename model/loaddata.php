<?php

require_once './inc/dbc.php';
require_once '../class/systemSetting.php';
$system = new setting();


if (array_key_exists("action", $_POST)) {

    if ($_POST['action'] == 'load_slider_data') {
        $system->prepareSelectQueryForJSON("SELECT
                                            sub_cat.sub_cat_id,
                                            sub_cat.main_cat_id,
                                            sub_cat.sub_cat_name,
                                            sub_cat.view_status,
                                            main_cat.main_cat_name,
                                            main_cat.view_status,
                                            item_deatails.item_name,
                                            item_deatails.item_description,
                                            item_deatails.item_id,
                                            item_deatails.item_price,
                                            item_deatails.item_image
                                            FROM
                                            sub_cat
                                            INNER JOIN main_cat ON sub_cat.main_cat_id = main_cat.main_cat_id
                                            INNER JOIN item_deatails ON item_deatails.sub_cat_id = sub_cat.sub_cat_id
                                                ");
    }




}

