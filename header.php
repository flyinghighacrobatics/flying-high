<!DOCTYPE html>
<html lang="en">



    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
          <?php
            if(isset($pageTitle)){
              print $pageTitle;
            } else {
              print 'Flying High Acrobatics';
            }
           ?>

        </title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/flexslider/flexslider.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon code -->
        <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="/images/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!-- End Favicon code -->

<!-- Facebook tags-->
        <?php
        //SETTING PAGE TITLE
        $scriptName = basename($_SERVER['REQUEST_URI']);

        //set Facebook variables (if not already defined inside the Pages)
        $fbTitle = (isset($pageTitle))?$pageTitle:'Flying High Acrobatics';
        $fbImg =(isset($pageImg))?$pageImg: "/assets/img/portfolio/work1.jpg";
        $fbDesc = (isset($pageDesc))?$pageDesc:'Building trust ,and turning sparks of possibility into flames of achievement, all over the world.';

        ?>
        <meta property="og:image" content="http://flyinghighacrobatics.com/assets/img/portfolio/work1.jpg">
        <link rel="image_src" href="http://flyinghighacrobatics.com/assets/img/portfolio/work1.jpg">
        <meta property="og:title" content="<?=$fbTitle ?>" />
        <meta property="og:description" content="<?=$fbDesc ?>" />
        <meta property="og:type" content="website" />


    </head>

    <body>
      <!-- Facebook Pixel Code -->
      <script>
      !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
      n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
      document,'script','//connect.facebook.net/en_US/fbevents.js');

      fbq('init', '722215021212718');
      fbq('track', "PageView");</script>
      <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=722215021212718&ev=PageView&noscript=1"
      /></noscript>
      <!-- End Facebook Pixel Code -->

      <!-- Analytics -->
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-69262911-1', 'auto');
        ga('send', 'pageview');

      </script>

      <!-- Fb app id -->
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

        <!-- Top menu -->
		<nav class="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
          <a class="navbar-brand" href="/">
            <span class="glyphicon glyphicon-fire"></span>
                          Flying High Acrobatics
          </a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">

              <li>
								<a href="index.php"><i class="fa fa-home"></i><br>Home</a>
                </li>

						<!-- <li>
							<a href="events.php"><i class="fa fa-camera"></i><br>Events</a>
						</li> -->
				<!--	<li>
							<a href="services.php"><i class="fa fa-tasks"></i><br>Services</a>
						</li> -->
						<li>
							<a href="about.php"><i class="fa fa-user"></i><br>About</a>
						</li>
						<li>
							<a href="affiliates.php"><i class="fa fa-globe"></i><br>Affiliates</a>
						</li>
           <li>
							<a href="events.php"><i class="fa fa-camera"></i><br>Events</a>
						</li>
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
								<i class="fa fa-camera"></i><br>Events<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="events.php">All Events</a></li>
                <li><a href="event-advmay.php">Advanced Acrobatics Intensive Andalusia,Spain May 20-29th</a></li>

							</ul>
						</li> -->
            		<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                    <i class="fa fa-paperclip"></i><br>Resources<span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="manuscript.php">Manuscripts</a></li>
                    <li><a href="manual-pa.php">Acro Manual</a></li>
                    <li><a href="acrocal.php">Acro Calendar</a></li>

                  </ul>
                </li>
		<li>
		    <a href="coaching.php"><i class="fa fa-globe"></i><br>Online Coaching</a>
		</li>
					</ul>
				</div>
			</div>
		</nav>
