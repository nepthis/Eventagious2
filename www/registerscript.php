<?php
include_once "database.php";
include_once "PHPscript.php";
include_once "register.php";
echo "test2";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$error_msg = "";
	 echo "test3";
	if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['surname'], $_POST['adress'], $_POST['section'])) {
		$username=$_POST["username"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$firstname=$_POST["firstname"];
		$surname=$_POST["surname"];
		$adress=$_POST["adress"];
		$section=$_POST["section"];

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
	    // Sanitize and validate the data passed in
	   /* $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	        // Not a valid email
	        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
	    }*/
	 
	    //$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	    //if (strlen($password) != 128) {
	        // The hashed pwd should be 128 characters long.
	        // If it's not, something really odd has happened
	    //    $error_msg .= '<p class="error">Invalid password configuration.</p>';
	    //}
	 
	    // Username validity and password validity have been checked client side.
	    // This should should be adequate as nobody gains any advantage from
	    // breaking these rules.
		//


	 
	    //$prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
	   /* $stmt = $db->prepare('SELECT id 
	    	FROM members 
	    	WHERE email = :mail 
	    	LIMIT 1');
	 	*/
	   // check existing email  
	    	/*
	    if ($stmt) {
	        $stmt->bindParam(':mail',$email);
	        $stmt->execute();
	        $r = $stmt->fetch()
	 
	        if ($stmt->rowCount() == 1) {
	            // A user with this email address already exists
	            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
	                        $stmt->close();
	        }
	    } else {
	        $error_msg .= '<p class="error">Database error Line 39</p>';
	                $stmt->close();
	    }
	 
	    // check existing username
	    $stmt = $db->prepare('SELECT id 
	    	FROM members 
	    	WHERE username = :user 
	    	LIMIT 1');
	 
	    if ($stmt) {
	        $stmt->bindParam(':user',$username);
	        $stmt->execute();
	        $stmt->store_result();
	 
	                if ($stmt->rowCount() == 1) {
	                        // A user with this username already exists
	                        $error_msg .= '<p class="error">A user with this username already exists</p>';
	                        $stmt->close();
	                }
	        } else {
	                $error_msg .= '<p class="error">Database error line 55</p>';
	                $stmt->close();
	        }
	 	
	    // TODO: 
	    // We'll also have to account for the situation where the user doesn't have
	    // rights to do registration, by checking what type of user is attempting to
	    // perform the operation.
	 
	    if (empty($error_msg)) {
	 
	        // Create hashed password using the password_hash function.
	        // This function salts it with a random salt and can be verified with
	        // the password_verify function.
	        $password = password_hash($password, PASSWORD_BCRYPT);
	 
	        // Insert the new user into the database 
	        if ($insert_stmt = $db->prepare("INSERT INTO members (username, email, password) VALUES (?, ?, ?)")) {
	            $insert_stmt->bindParam('sss', $username, $email, $password);
	            // Execute the prepared query.
	            if (! $insert_stmt->execute()) {
	                header('Location: ../error.php?err=Registration failure: INSERT');
	            }
	        }
	        */
	        header('Location: https://eventagious3.appspot.com/index');
	        $url = 'https://eventagious3.appspot.com/api/?user=1';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
	    }
	}
}