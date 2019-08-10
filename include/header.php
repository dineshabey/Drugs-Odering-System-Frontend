<title>Lionvitamin</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>
<!--script-->




<!--GOOGLE TRANSALATE JS //////////////////////////////////////////////-->
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--GOOGLE TRANSALATE JS //////////////////////////////////////////////-->

<!--GOOGLE TRANSLATE--////////////////////////////////////////////////////////>-->
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
</script>
<!--GOOGLE TRANSLATE--////////////////////////////////////////////////////////>-->



<!--MENU CSSS START******************************************-->
<link href="jquery_menu/css/sm-core-css.css" rel="stylesheet" type="text/css" />
<link href="jquery_menu/css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />
<!--MENU CSSS END   ******************************************-->


<!--NEW MENU NAV BAR CSS START ====================================================-->
<!--<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/booNavigation.css"/>-->

<!-- CSS -->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/ionicons.min.css">
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300' rel='stylesheet' type='text/css'>
 JS 
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script>
    window.Modernizr || document.write('<script src="js/vendor/modernizr-2.8.3.min.js"><\/script>')
</script>-->


<!--NEW MENU NAV BAR CSS END   ====================================================-->



<link rel="stylesheet" type="text/css" href="./slick/slick.css">
<link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">

<style>
    .menu-container {
  width: 80%;
  margin: 0 auto;
  background: #3498DB;
}

.menu-mobile {
  display: none;
  padding: 20px;
}

.menu-mobile:after {
  content: "\f394";
  font-family: "Ionicons";
  font-size: 2.5rem;
  padding: 0;
  float: right;
  position: relative;
  top: 50%;
  -webkit-transform: translateY(-25%);
  -ms-transform: translateY(-25%);
  transform: translateY(-25%);
}

.menu-dropdown-icon:before {
  content: "\f489";
  font-family: "Ionicons";
  display: none;
  cursor: pointer;
  float: right;
  padding: 1.5em 2em;
  background: #fff;
  color: #333;
}

.menu > ul {
  margin: 0 auto;
  width: 100%;
  list-style: none;
  padding: 0;
  position: relative;
  /* IF .menu position=relative -> ul = container width, ELSE ul = 100% width */
  box-sizing: border-box;
}

.menu > ul:before, .menu > ul:after {
  content: "";
  display: table;
}

.menu > ul:after { clear: both; }

.menu > ul > li {
  float: left;
  background: #3498DB;
  padding: 0;
  margin: 0;
}

.menu > ul > li a {
  text-decoration: none;
  padding: 1.5em 3em;
  display: block;
  color:#fff;
}

.menu > ul > li:hover { background: #f0f0f0; }

.menu > ul > li:hover > a { color: #333; }

.menu > ul > li > ul {
  display: none;
  width: 100%;
  background: #f0f0f0;
  padding: 20px;
  position: absolute;
  z-index: 99;
  left: 0;
  margin: 0;
  list-style: none;
  box-sizing: border-box;
}

.menu > ul > li > ul:before, .menu > ul > li > ul:after {
  content: "";
  display: table;
}

.menu > ul > li > ul:after { clear: both; }

.menu > ul > li > ul > li {
  margin: 0;
  padding-bottom: 0;
  list-style: none;
  width: 25%;
  background: none;
  float: left;
}

.menu > ul > li > ul > li a {
  color: #777;
  padding: .2em 0;
  width: 95%;
  display: block;
  border-bottom: 1px solid #ccc;
}

.menu > ul > li > ul > li > ul {
  display: block;
  padding: 0;
  margin: 10px 0 0;
  list-style: none;
  box-sizing: border-box;
}

.menu > ul > li > ul > li > ul:before, .menu > ul > li > ul > li > ul:after {
  content: "";
  display: table;
}

.menu > ul > li > ul > li > ul:after { clear: both; }

.menu > ul > li > ul > li > ul > li {
  float: left;
  width: 100%;
  padding: 10px 0;
  margin: 0;
  font-size: .8em;
}

.menu > ul > li > ul > li > ul > li a { border: 0; }

.menu > ul > li > ul.normal-sub {
  width: 300px;
  left: auto;
  padding: 10px 20px;
}

.menu > ul > li > ul.normal-sub > li { width: 100%; }

.menu > ul > li > ul.normal-sub > li a {
  border: 0;
  padding: 1em 0;
}

@media only screen and (max-width: 959px) {

.menu-container { width: 100%; }

.menu-mobile { display: block; }

.menu-dropdown-icon:before { display: block; }

.menu > ul { display: none; }

.menu > ul > li {
  width: 100%;
  float: none;
  display: block;
}

.menu > ul > li a {
  padding: 1.5em;
  width: 100%;
  display: block;
}

.menu > ul > li > ul { position: relative; }

.menu > ul > li > ul.normal-sub { width: 100%; }

.menu > ul > li > ul > li {
  float: none;
  width: 100%;
  margin-top: 20px;
}

.menu > ul > li > ul > li:first-child { margin: 0; }

.menu > ul > li > ul > li > ul { position: relative; }

.menu > ul > li > ul > li > ul > li { float: none; }

.menu .show-on-mobile { display: block; }
}

</style>


<!--  <style type="text/css">
  html, body {
    margin: 0;
    padding: 0;
  }

  * {
    box-sizing: border-box;
  }

  .slider {
      width: 50%;
      margin: 100px auto;
  }

  .slick-slide {
    margin: 0px 20px;
  }

  .slick-slide img {
    width: 100%;
  }

  .slick-prev:before,
  .slick-next:before {
    color: black;
  }


  .slick-slide {
    transition: all ease-in-out .3s;
    opacity: .2;
  }

  .slick-active {
    opacity: .5;
  }

  .slick-current {
    opacity: 1;
  }
</style>-->