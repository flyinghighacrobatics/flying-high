<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license.
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->




    <title>
      <?php
        if(isset($pageTitle)){
          print $pageTitle;
        } else {
          print 'Flying High Acrobatics';
        }
       ?>

    </title>


    <!-- Facebook tags-->

<?php
//SETTING PAGE TITLE
$scriptName = basename($_SERVER['REQUEST_URI']);
//echo "<hr>$scriptName<hr>";
if(strstr($scriptName, 'manual.php')){
//echo "<hr>1<hr>";
$fbTitle = ($pageTitle)?$pageTitle:$label[$curLang]['facebook_title'];
$fbImg = "http://partner-acrobatics.com/img/logo-500.png";
//pa2013-sized.jpg
$fbDesc = ($pageSubTitle)?$pageSubTitle:$label[$curLang]['facebook_desc_man'];

}
elseif($scriptName == 'program-15.php' || $scriptName =='fees-15.php'){
//echo "<hr>2<hr>";
$fbTitle = ($pageTitle)?$pageTitle:'Partner Acrobatics';
$fbImg = "http://partner-acrobatics.com/img/pa2013-sized.jpg";
$fbDesc = $label[$curLang]['facebook_desc_15'];
}
else{
//echo "<hr>3<hr>";
$fbTitle = ($pageTitle)?$pageTitle:'Flying High Acrobatics';
$fbImg =($pageImg)?$pageImg: "http://flyinghighacrobatics.com/images/fh.png";
//pa2013-sized.jpg
$fbDesc = ($pageDesc)?$pageDesc:'Flying High Acrobatics is bla bla bla bla';
}
?>
<meta property="og:image" content="<?=$fbImg ?>" />
<meta property="og:title" content="<?=$fbTitle ?>" />
<meta property="og:description" content="<?=$fbDesc ?>" />
<meta property="og:type" content="website" />

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>



<body>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '166515250357975',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Navigation -->
<nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Logo and responsive toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="contact.php">
              <span class="glyphicon glyphicon-fire"></span>
              Flying High Acrobatics
            </a>
        </div>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="/">Home</a>
                </li>
                <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
        <ul class="dropdown-menu" aria-labelledby="about-us">
          <li><a href="about.php">About me</a></li>
        <li><a href="#">Articles etc..</a></li>
        </ul>
                </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events <span class="caret"></span></a>
        <ul class="dropdown-menu" aria-labelledby="about-us">
          <li><a href="flyinghighcph.php">Flying High Cph</a></li>
            <li><a href="http://partneracrobatics.com/">Partner-acrobatics</a></li>
          <li><a href="http://one-minute-practice.com/en/">One Minute Practice</a></li>
          <li><a href="#">Handstands</a></li>
            <li><a href="#">Yoga</a></li>
          <li><a href="#">Movement</a></li>
        </ul>
      </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>



</ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>