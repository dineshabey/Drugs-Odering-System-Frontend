

$(function () {

    $("#search_text").on("keypress", function (e) {

        if (e.which == 13) {
            //perform your operations

            window.location.href = "http://google.com";
        }
    });




});


function load_items_with_pagination(main_cat,sub_cat,page){
 
    $.post("./loadTables.php", {action: 'load_all',main_cat:main_cat,sub_cat:sub_cat,page:page}, function (e) {

        $('#img_view_panel').append(e);                  

    }, "json");
}//Load Recent items with Pagination


function load_recent() {
    $.post("./loadTables.php", {action: 'load_recent'}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            $('#').html("NO data Found ! ");
        } else {
            var item_tot = (e['item_tot']);
            var item_tot_price = (e['item_tot_price']);
            $('.item_tot').html(item_tot);
            $('.item_tot_price').html(item_tot_price);
//                    load_cart_item_list();
        }
        //    chosenRefresh();
    }, "json");
}//Load Recent items with Pagination