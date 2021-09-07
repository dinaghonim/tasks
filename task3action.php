<?php
function clean($input){
  
     $input = trim($input);
     $input = stripcslashes($input);
     $input = htmlspecialchars($input);
   
      return $input;
 }

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$name = clean($_POST['name']);
	$email = clean($_POST['email']);
	$password = clean($_POST['password']);
	$address = clean($_POST['address']);
	$url =$_POST['url'];
	
	$errormessages = [];

	if(empty($name))
	{
	$errormessages['Name']="name is required";	
	}
	if(is_numeric($name))
	{
		$errormessages['Name']="name must be a string";
	}
	if(empty($email))
	{
	$errormessages['Email']="email is required";	
	}
	if(empty($password))
	{
	$errormessages['Password']="password is required";	
	}
	if((strlen($password)<6)&(strlen($password)>=1))
	{
	$errormessages['Password']="password length must be > or = 6 characters";	
	}
	if(empty($address))
	{
	$errormessages['Address']="address is required";	
	}
	if((strlen($address)<10)&(strlen($address)>=1))
	{
	$errormessages['Address']="address length must = 10 characters";	
	}
	if((strlen($address)>10))
	{
	$errormessages['Address']="address length must = 10 characters";	
	}
	if(empty($_POST["gender"])) {
	$errormessages['Gender'] = "gender field is required";
	}

	if(empty($url))
	{
	$errormessages['URL']="url is required";	
	}
	if(count($errormessages)>0)
	{
		foreach($errormessages as $key => $value)
		{
			echo '* '.$key.' : '.$value.'<br>';
		}
	}else{
		echo 'valid Data';
	}
}

	

?>