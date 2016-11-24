<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <?php include "database.php";
    include "PHPscript.php";
    include "registerscript.php"; ?>

  </head>

           

  <body>
    <?php
    echo "Test i body";
      $db = new Db();  
    ?>


  <form>
	  <center>

      <form action="register" 
                method="post" 
                name="registration_form">
            Username: <input type='text' 
                name='username' 
                id='username' /><br>
            Email: <input type="text" name="email" id="email" /><br>
            Password: <input type="password"
                             name="password" 
                             id="password"/><br>
            Confirm password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
            <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>






		  <div class="input-group" style="content: ">
		      <div class="input-group input-group-lg">
		        <span class="input-group-addon" id="sizing-addon1">@</span>
		        <input type="text" class="form-control" placeholder="First name" aria-describedby="sizing-addon1">
		      </div>
		      <div class="input-group input-group-lg" style="padding-top: 5px">
		        <span class="input-group-addon" id="sizing-addon2">@</span>
		        <input type="text" class="form-control" placeholder="Surname" aria-describedby="sizing-addon1">
		      </div>
		      <div class="input-group input-group-lg" style="padding-top: 5px">
		        <span class="input-group-addon" id="sizing-addon1">@</span>
		        <input type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
		      </div>
		      <div class="input-group input-group-lg" style="padding-top: 5px">
		        <span class="input-group-addon" id="sizing-addon1">@</span>
		        <input type="text" class="form-control" placeholder="adress" aria-describedby="sizing-addon1">
		      </div>

			<div class="dropdown">
			  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			    Section
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			    <li><a href="#">Data</a></li>
			    <li><a href="#">Maskin</a></li>
			    <li><a href="#">nått annat</a></li>
			  </ul>
			</div>

  
		      <button class="btn btn-primary" type="button">Go!</button>


		  </div>
	  </center>
  </form>


      
   
      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
     <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    
    




  </body>
</html>
