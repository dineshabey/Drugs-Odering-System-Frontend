<!--<TOP HEADER START -->
<link href="js/AlertifyJS-master/build/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="js/AlertifyJS-master/build/css/alertify.min.css" rel="stylesheet" type="text/css"/>
<script src="js/AlertifyJS-master/build/alertify.min.js" type="text/javascript"></script>
<a href="fonts/user-solid.svg"></a>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<link rel="stylesheet"  href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--FONTAWESOME ICONS-->
<style>
    .input-icons i {
        position: absolute;
    }

    .input-icons {
        width: 100%;
        margin-bottom: 10px;
    }

    .icon {
        padding: 10px;
        color: green;
        min-width: 50px;
        text-align: center;
    }

    .input-field {
        width: 100%;
        padding: 10px;
        text-align: center;
    }

    h2 {
        color: green;
    }

    .ui-autocomplete-custom {
        background: #ccc;
        z-index: 2;
    }


    .input-group .fa-search{
        display: table-cell;
    }

    /*<!--UI AUTOCOMPLETE-->*/


    .btnLogin{
        background-color: #36dc12;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }



    /*BORDER COLOR IMAGE SLIDER*/
    .boder_img{
        border-style: solid;
        border-color: #fff;
        border-width: 1px;
    }
    /*BORDER COLOR IMAGE SLIDER*/



    /*=======*/

    .ui-autocomplete-custom {
        background: #ccc !important;
        z-index: 2;
    }


    /*ADD TO CART CSS START =============================================*/

    .body {
        overflow: hidden;
    }
    .wrapper {
        max-width: 1520px;
        /*height: 880px;*/
        margin: 20px auto ;
        padding: 20px;
        background-color: #f5f5f5;
        width: 100%;
    }
    h1 {
        display: inline-block;
        background-color: #333;
        color: #fff;
        font-size: 20px;
        font-weight: normal;
        text-transform: uppercase;
        padding: 4px 20px;
        float: left;
    }
    @media all and (max-width: 1200px) and (min-width: 800px) {
        /* Change Resolutions Here */
        h5 {
            font-size: 12px;
        }
    }


    img
    {
        max-width: 100%;
        min-width: 40px;;
        height: auto;
    }

    .clear {
        clear: both;
    }
    .items {
        display: block;
        margin: 20px 0;
    }
    h2 {
        font-size: 16px;
        display: block;
        border-bottom: 1px solid #ccc;
        margin: 0 0 10px 0;
        padding: 0 0 5px 0;
    }

    .btn-responsive {
        white-space: normal !important;
        word-wrap: break-word;
    }

    span {
        float: right;
    }
    .shopping-cart {
        display: inline-block;
        background: url('http://cdn1.iconfinder.com/data/icons/jigsoar-icons/24/_cart.png') no-repeat 0 0;
        width: 24px;
        height: 24px;
        margin: 0 10px 0 0;
    }
    /*ADD TO CART CSS END  =============================================*/

    .top_head_cus {
        background-image: url("images/site_img/gold_bac.jpg");
        border-bottom: 1px solid #fff;
        /*padding: 1.9em 0;*/
    }
    .bottom_head_cus {
        background-image: url("images/site_img/green_bac5.jpg");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

    }
    .bottom_head_cus2 {
        background-image: url("images/site_img/green_bac5.jpg");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

    }
    .topcorner{
        position:absolute;
        top:10px;
        right: 10px;
    }

    .mini_mart{
        text-shadow: 0 0 3px #FF0000;

    }

    /*HEADING TABALE CSS ///////////////////////////////////*/
    .head_tbl{
        table-layout: fixed;
        max-width:100%;
        border = "0";
        border: none;

    }
    .blocks{
        border: none;
        border: 0;
    }
    /*HEADING TABALE CSS ///////////////////////////////////*/



</style>
</head>

<meta name="viewport" content="width=600">
<div class="top-header bottom_head_cus" >
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr >
                    <td> <label style=" color: #ffff00;">  <a href="index.php"><h1 style="color:#ffff59;">LION MINI MART</h1></a> </label></td>
                    <td align="right"   ><div class="login" style="">
                            <?php
                            if (!isset($_SESSION['cus_id'])) {
                                echo '<a href = "login.php" style="text-decoration: ; color:black;" span class="login btnLogin"><span class="login">  USER LOGIN </span> </a>';
//                         echo '<button type="button" style="margin:2px;" class="btn btn-success btn-md" value = ' . $cus_name . ' id = "profil">' . $cus_name . '</buttn>';
                            } else {
                                $cus_name = $_SESSION['uname'];
                                echo '<button type="button" style="margin:2px;" class="btn btn-success btn-md" value = ' . $cus_name . ' id = "profil">' . $cus_name . '</buttn>';
                                echo' <button  type="button" id="log_out" style="background-color:red;" class="btn btn-primary btn-md" ><span></span>LOGOUT</button>';
                            }
                            ?>
                        </div>
                    </td>
                    <td align="right"> <label style="">  <a href="index.php"><img src="images/site_img/edit_logo_1.jpg" alt=" "  style=" height:90px; width:120px;"/></a> </label></td>

                </tr>
            </tbody>
        </table>
    </div>
</div>



<div class="top_head_cus" >

    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="">
                <div class="col-sm-9">
                    <div class=" form-group">
                        <input  style="border-radius:2px; background-color:#ffff59; width: 100%;position: relative" id="search_text" class="form-control" type="text" aria-label="Search">
                        <span style="position:absolute; right:20px;top:8px;" class="fa fa-search  "></span>
                    </div>
                    <br>

                </div>
                <div class="col-sm-3">
                    <label>
                        <span>
 <!--<i class="shopping-cart"></i>-->
                            <?php
                            if (!isset($_SESSION['cus_id'])) {
                                echo '<a href="cart_item.php"><button type="button" class="btn btn-success" style="background-color:#ffffff;" ><img src="images/site_img/cart_add.png" height="190px" width="60px;" height="2%"  alt=" " />&nbsp;<span class=" item_tot" style="color:blue;  font-size: 40px;"></span> </button></a>';
                            } else {
                                echo '<div class="cart hidden" ><a href="cart_item.php"><span class=""> </span></a><span style="font-weight: bold; background:#0000e6; font-size: large; color: #ffd700; border-radius: 32px 32px;" class="item_tot"> </span></div>';
                            }
                            ?>
                        </span>
                    </label>



                </div>

                <div class="col-lg-12">
                            <!--<td class="blocks"  rowspan="3" style="text-align: center; width: 20%; height: 8%; border:none ;"><a href="index.php"><img src="images/site_img/edit_logo.jpg" height="180px" width="100px" alt=" " /></a></td>-->
                    <?php require_once('navbar.php'); ?></td>

                </div>
            </div>
        </div>


    </div>
</div>

<!--<div class="row">
    <a href="index.php"><img src="images/logo_png.png" height="190px" width="150px" alt=" " /></a>
</div>
<div class="container " >
    <div class="col-md-2"></div>
    <div class="col-md-2" style="float: right;">    <a href="index.php"><img src="images/logo_png.png" height="190px" width="150px" alt=" " /></a></div>

    <div class="col-md-7" style="padding-top: 60px; float: right;">
        <input  class="form-control" type="text" placeholder="Search" aria-label="Search">
        <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Search</button>
    </div>
</div>-->



<!--<BOTTOM HEADER START-->
<div class="top-header bottom_head_cus2" hidden="">

    <?php // require_once('navbar.php'); ?>

</div>
<!--<BOTTOM HEADER END-->




<script type="text/javascript">


    $(function () {
        $('#search_text').keyup(function () {
            loadItems();
        });
    });

    $(document).on('ready', function () {

        loadItems(); //LOAD Items Array
        //        viewportElement.setAttribute( 'content', 'initial-scale=' + ratio );
        //        alert()
        //ONLOAD FUNCTION NAVIGATION BAR LOAD ------------------------------------------
        $(function () {
            var sliderData = '';
            $.post("./loaddata.php", {action: 'load_nav_bar_menu'}, function (e) {
                if (e === undefined || e.length === 0 || e === null) {
                    $('.nav_menu_bar').html("NO data Found ! ");
                } else {
                    $('.nav_menu_bar').html(e);


                }
            });
        });



    }); //ON LOAD FUCTION END


    //LOG OUT BTN =================================================================
    $(document).on('click', '#log_out', function () {
        $.post("./loaddata.php", {action: 'log_out'}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                $('.nav_menu_bar').html("NO data Found ! ");
            } else {
                if (e == "1") {
                    window.location.replace("login.php");
                } else {
                    alert("Error ! Session not distroy ..!")
                }
            }
        }, "json");
    });

    //SEARCH FUNCTION
    //    $('#search_text').keyup(function(){
    //       var txt = $(this).val();
    //       console.log(txt);
    //       });


    //GO TO PROFIL BTN =================================================================
    $(document).on('click', '#profil', function () {
        window.location.replace("user_profil.php");
    });


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

</script>
