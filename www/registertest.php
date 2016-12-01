<?php


echo "Detta ar i test filen!! for API insert user";
if(isset($_REQUEST['submit'])!=''){
$data=array(
		'username' => '".$_REQUEST['username']."',
		'email' => '".$_REQUEST['email']."',
		'password' => '".$_REQUEST['password']."',
		'firstname' => '".$_REQUEST['firstname']."',
		'surname' =>'".$_REQUEST['surname']."',
		'adress' => '".$_REQUEST['adress']."',
		'section' => '".$_REQUEST['section']."',
);
}

$url = 'https://eventagious3.appspot.com/api/?user=1';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);

echo "Slutet på Filen";

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Sign-Up</title>
</head>
<body id="body-color">
	<div id="Registration">
		<fieldset style="width:30%"><legend>Registration Form</legend>
		<table border="0">
			<tr>
			<form method="POST" action="registertest.php">
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
</body>
</html>