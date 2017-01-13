<?php
$init = parse_ini_file('configUrl.ini');
?>
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Eventagious</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Dont actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      //<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     // <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    //<![endif]-->
    
  </head>

  <body>
  
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '227253474362999',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
     <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?action=index">Eventagious</a>
            <a class="navbar-brand" href="index.php?action=map">Maps</a>
            <a class="navbar-brand" href="index.php?action=event">Events</a>
            <a class="navbar-brand" href="index.php?action=register">Register</a>
            <a class="navbar-brand" href="index.php?action=login">Login</a>
            <!--<a class="navbar-brand" href="https://eventagious3.appspot.com/login">Login</a>-->
          </div>
        </div>
      </nav>
    <div id="content">