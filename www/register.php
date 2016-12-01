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

  </head>

           

  <body>
  <form>
	  <center>

      <form action="register" method="post" name="registration_form">
            Username: <input type='text' name='username' id='username' /><br>
            Email: <input type="text" name="email" id="email" /><br>
            Password: <input type="password" name="password" id="password"/><br>
            First name: <input type="text" name="firstname" id="firstname"/><br>
            Surname: <input type="text" name="surname" id="surname"/><br>
            Adress: <input type="text" name="adress" id="adress"/><br>
            Section: <input type="text" name="section" id="section" /><br>
            <input type="button" 
                   value="Register"
                   onclick="form.submit();"/>
        </form>

      <div id="Registration">
      <fieldset style="width:30%"><legend>Registration Form</legend>
      <table border="0">
        <tr>
        <form method="POST" action="register.php">
        <td>Username</td><td> <input type="text" name="username"></td>
        </tr>
        <tr>
        <td>Email</td><td> <input type="text" name="email"></td>
        </tr>
        <tr>
        <td>Password</td><td> <input type="password" name="password"></td>
        </tr>
        <tr>
        <td>First name</td><td> <input type="text" name="firstname"></td>
        </tr>
        <tr>
        <td>Surname</td><td><input type="text" name="surname"></td>
        </tr>
        <tr>
        <td>Adress</td><td><input type="text" name="adress"></td>
        </tr>
        <tr>
        <td>Section</td><td><input type="text" name="section"></td>
        </tr>
        <tr>
        <td><input id="button" type="submit" name="submit" value="submit"></td>
        </tr>
      </form>
      </table>
      </fieldset>
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
<?php
echo "test2";
//if($_SERVER['REQUEST_METHOD'] === 'POST'){
  //$error_msg = "";
  //if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['surname'], $_POST['adress'], $_POST['section'])) {
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $firstname=$_POST["firstname"];
    $surname=$_POST["surname"];
    $adress=$_POST["adress"];
    $section=$_POST["section"];
    echo "test7";
    $data=array(
    'username' => $username,
    'email' => $email,
    'password' => $password,
    'firstname' => $firstname,
    'surname' => $surname,
    'adress' => $adress,
    'section' => $adress,
    );
    echo "test4";
    $url = 'https://eventagious3.appspot.com/api/?user=1';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response=json_decode($response_json, true);
      //}
echo "test5";
?>