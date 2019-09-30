<?php

session_start();
require_once('./config/dbc.php');
require_once('./class/systemSetting.php');
$system = new setting();

$date = date("Y-m-d");
$time = date("h:i:sa");
if (array_key_exists("action", $_POST)) {
    
}
//LOAD ITEMS WITH PAGINATION================================================
if ($_POST['action'] == 'load_all') {
 ob_start(); 
    
    $main_cat = $_POST['main_cat'];
    $sub_cat = $_POST['sub_cat'];
    $page_cat = 1;
    $page = $_POST['page'];

    $item_query = "SELECT
item_deatails.item_id,
item_deatails.item_name,
item_deatails.item_price,
item_deatails.item_image,
item_deatails.item_discount,
sub_cat.sub_cat_name,
main_cat.main_cat_name,
main_cat.main_cat_id,
sub_cat.sub_cat_id,
item_deatails.out_of_stock,
item_deatails.item_description
FROM
item_deatails
INNER JOIN sub_cat ON item_deatails.sub_cat_id = sub_cat.sub_cat_id
INNER JOIN main_cat ON sub_cat.main_cat_id = main_cat.main_cat_id
WHERE
item_deatails.img_status = '1' AND
item_deatails.item_view_status = '0' AND
sub_cat.main_cat_id = '{$main_cat}' AND
item_deatails.img_status = '1'
ORDER BY
item_deatails.sub_cat_id DESC
";

   
    $item_info_data = $system->prepareSelectQuery($item_query);
    $item_count = $system->getCountByQuery($item_query);


// Return the number of rows in result set
    $total = $item_count;

// How many items to list per page
    $limit = 4;

// How many pages will there be
    $pages = ceil($total / $limit);


//// What page are we currently on?
//    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
//        'options' => array(
//            'default' => 1,
//            'min_range' => 1,
//        ),
//    )));

// Calculate the offset for the query
    $offset = ($page - 1) * $limit;

// Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

// The "back" link
    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

// The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

// Display the paging information
//  echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';




    if (!empty($item_info_data)) {

        $pg = count($item_info_data) / 4;

        $cols = array_chunk($item_info_data, ceil(count($item_info_data) / $pg));


        $item_out_put = '<div style="background:white"><section class=" " id="regular2" style=" padding-top:10px ;">';

        foreach ($cols[$page - 1] as $val3) {

            $main_cat_names = $val3['main_cat_name'];
            $main_cat_id = $val3['main_cat_name'];
            $sub_cat_name = $val3['sub_cat_name'];
            $sub_cat_id = $val3['sub_cat_id'];
            $item_name = $val3['item_name'];
            $item_img = $val3['item_image'];
            $item_price = $val3['item_price'];
            $item_id = $val3['item_id'];
            $out_of_stock = $val3['out_of_stock'];

            $item_out_put .= '<div data-sort="' . $item_id . '"    class="column cus_font item_div">
                        <div class="content" align="middle">
                        <a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . ' ">
                        <img class="secial_item responsive card" align="middle" style="text-aling:center;  width:213px; height:213px;" src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"/>
                        <h3 style="text-align: center;">' . $item_name . '</h3>
                        <h3 style="text-align: center;">' . $main_cat_names . '</h3>
                        <h3 style="text-align: center; color:red;">LKR ' . $item_price . '</h3></a>';

            if ($out_of_stock == '1') {
//STOCK OUT ================================
                $item_out_put .= '<p style="color:red;">Stock Out</p>';
            } else {
                $item_out_put .= '<p> <button type = "button" class = "btn btn-success" id = "add_to_cart_btn" data-item_price = "' . $item_price . '" value = ' . $item_id . '>Add to cart</button></p>';
            }

            $item_out_put .= '</div></div>';
        }//END foreach

        $item_out_put .= '</div></section>';
//                    echo $item_out_put;
    }


//Pagination

    $item_out_put .= '<div class="row"> <div class=" center-block" > <ul class="pagination pagination-lg">
                            <li class="page-item">';
    $item_out_put .= '<a class="page-link" href="'. $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . ($page - 1) . '">Previous</a></li>';


    for ($v = 1; $v <= $pages; $v++) {

        if ($v == $page) {
            $item_out_put .= '<li class="active"><a href="pagination.php?main_cat_id=' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . $v . '">' . $v . '</a></li>';
        } else {
            $item_out_put .= '<li><a href="pagination.php?main_cat_id=' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . $v . '">' . $v . '</a></li>';
        }
    }

    $item_out_put .= '<li class="page-item"><a class="page-link" href="' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page='. ($page - 1) . '">Next</a></li>
                        </ul>

                    </div>
                </div> ';
//Pagination END
    $item_out_put .= '</div>';
    
      ob_end_clean(); //BUFFER clean
    echo json_encode($item_out_put);
    
//Item End
} elseif ($_POST['action'] == 'load_recent_items') {
  $main_cat = $_POST['main_cat'];
    $sub_cat = $_POST['sub_cat'];
    $page_cat = 1;
       $page = $_POST['page'];

       
    $item_query = "SELECT
item_deatails.item_id,
item_deatails.item_name,
item_deatails.item_price,
item_deatails.item_image,
item_deatails.item_discount,
sub_cat.sub_cat_name,
main_cat.main_cat_name,
main_cat.main_cat_id,
sub_cat.sub_cat_id,
item_deatails.out_of_stock,
item_deatails.item_description
FROM
item_deatails
INNER JOIN sub_cat ON item_deatails.sub_cat_id = sub_cat.sub_cat_id
INNER JOIN main_cat ON sub_cat.main_cat_id = main_cat.main_cat_id
WHERE
item_deatails.img_status = '1' AND
item_deatails.item_view_status = '0' AND
sub_cat.main_cat_id = '{$main_cat}' AND
item_deatails.img_status = '1'
ORDER BY
item_deatails.item_id DESC
";

   
    $item_info_data = $system->prepareSelectQuery($item_query);
    $item_count = $system->getCountByQuery($item_query);


// Return the number of rows in result set
    $total = $item_count;

// How many items to list per page
    $limit = 4;

// How many pages will there be
    $pages = ceil($total / $limit);


// Calculate the offset for the query
    $offset = ($page - 1) * $limit;

// Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

// The "back" link
    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page='. $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

// The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page='. $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

// Display the paging information
//  echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';




    if (!empty($item_info_data)) {

        $pg = count($item_info_data) / 4;

        $cols = array_chunk($item_info_data, ceil(count($item_info_data) / $pg));


// print_r($cols[0]);exit;

        $item_out_put = '<div style="background:white"><section class=" " id="regular2" style=" padding-top:10px ;">';

        foreach ($cols[$page - 1] as $val3) {

            $main_cat_names = $val3['main_cat_name'];
            $main_cat_id = $val3['main_cat_name'];
            $sub_cat_name = $val3['sub_cat_name'];
            $sub_cat_id = $val3['sub_cat_id'];
            $item_name = $val3['item_name'];
            $item_img = $val3['item_image'];
            $item_price = $val3['item_price'];
            $item_id = $val3['item_id'];
            $out_of_stock = $val3['out_of_stock'];

            $item_out_put .= '<div data-sort="' . $item_id . '"    class="column cus_font item_div">
                        <div class="content" align="middle">
                        <a href="single.php?item_id=' . $item_id . '&sub_cat_id=' . $sub_cat_id . ' ">
                        <img class="secial_item responsive card" align="middle" style="text-aling:center;  width:213px; height:213px;" src="../drugs_ordering_system_backend/uploads/' . $val3['item_image'] . '"/>
                        <h3 style="text-align: center;">' . $item_name . '</h3>
                        <h3 style="text-align: center;">' . $main_cat_names . '</h3>
                        <h3 style="text-align: center; color:red;">LKR ' . $item_price . '</h3></a>';

            if ($out_of_stock == '1') {
//STOCK OUT ================================
                $item_out_put .= '<p style="color:red;">Stock Out</p>';
            } else {
                $item_out_put .= '<p> <button type = "button" class = "btn btn-success" id = "add_to_cart_btn" data-item_price = "' . $item_price . '" value = ' . $item_id . '>Add to cart</button></p>';
            }

            $item_out_put .= '</div></div>';
        }//END foreach

        $item_out_put .= '</div></section>';
//                    echo $item_out_put;
    }


//Pagination

    $item_out_put .= '<div class="row"> <div class=" center-block" > <ul class="pagination pagination-lg">
                            <li class="page-item">';
    $item_out_put .= '<a class="page-link" href="pagination.php?main_cat_id=' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . ($page - 1) . '">Previous</a></li>';


    for ($v = 1; $v <= $pages; $v++) {

        if ($v == $page) {
            $item_out_put .= '<li class="active"><a href="pagination.php?main_cat_id=' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . $v . '">' . $v . '</a></li>';
        } else {
            $item_out_put .= '<li><a href="pagination.php?main_cat_id=' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . $v . '">' . $v . '</a></li>';
        }
    }

    $item_out_put .= '<li class="page-item"><a class="page-link" href="pagination.php?main_cat_id=' . $main_cat . '&sub_cat_id=' . $sub_cat . '&page=' . ($page +1) . '">Next</a></li>
                        </ul>

                    </div>
                </div> ';
//Pagination END
    $item_out_put .= '</div>';
    
    
    json_encode($item_out_put);
}elseif ($_POST['action'] == 'load_cat_name') {
  $main_cat = $_POST['main_cat'];
    $sub_cat = $_POST['sub_cat'];
 
     $cat_query = "SELEC
main_cat.main_cat_name,
main_cat.main_cat_id
FROM
main_cat
WHERE
main_cat.main_cat_id = '{$main_cat}' 
";

   
  //  $item_info_data = $system->prepareSelectQuery($cat_query);
    
   // echo $item_info_data['cat_name'];
    
   // json_encode($item_info_data['cat_name']); 
}

