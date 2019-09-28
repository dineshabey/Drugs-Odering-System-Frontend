

$(function () {

//    $("#search_text").on("keypress", function (e) {
//
//        if (e.which == 13) {
//            //perform your operations
//
//          //  window.location.href = "http://google.com";
//        }
//    });

    $(function () {
        $('#search_text').keyup(function () {
            loadItems();
        });
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

              $('#img_view_panel').empty(); 
             // $('#img_view_panel').append(e);                  

    }, "json");
}//Load Recent items with Pagination


function load_category_wise_items_with_pagination(main_cat,sub_cat,page){
 
    $.post("./loadTables.php", {action: 'load_recent_items',main_cat:main_cat,sub_cat:sub_cat,page:page}, function (e) {

        $('#img_view_panel').append(e);                  

    }, "json");
}//Load Category wise items with Pagination


function load_cat(main_cat,sub_cat){
     
      $.post("./loadTables.php", {action: 'load_cat_name',main_cat:main_cat,sub_cat:sub_cat}, function (e) {
 
        //$('.cat_name').text(e);                  

    }, "json");
}


 function loadItems() {
        var serachArray = new Array();
        var searchTerm = $('#search_text').val();
        $.post("loaddata.php", {action: 'search_text', searchTerm: searchTerm}, function (e) {

            $.each(e, function (index, qData) {
                index++;
                console.log(qData.item_name);

                serachArray.push(qData.item_name);
            });

            $('#search_text').autocomplete({
                source: serachArray
            });

        }, "json");
    }