

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
}//Load All items with Pagination

function load_recent_items_with_pagination(main_cat,sub_cat,page){
 
// 
 
    $.post("./loadTables.php", {action: 'load_recent_items',main_cat:main_cat,sub_cat:sub_cat,page:page}, function (e) {

             alert(e)

            //       $('#img_view_panel').empty(); 
     //   $('#img_view_panel').append(e);                  

    }, "json");
}//Load Recent items with Pagination


function load_category_wise_items_with_pagination(main_cat,sub_cat,page){
 
    $.post("./loadTables.php", {action: 'load_recent_items',main_cat:main_cat,sub_cat:sub_cat,page:page}, function (e) {

        $('#img_view_panel').append(e);                  

    }, "json");
}//Load Category wise items with Pagination