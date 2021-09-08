<?php
session_start();
require 'helpers.php';
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$name = CleanInputs($_POST["name"]);
	$email = CleanInputs($_POST["email"]);
	$password = CleanInputs($_POST["password"]);
	$address = CleanInputs($_POST["address"]);
	$url = CleanInputs($_POST["url"]);
	
	$errors = [];
	
if(!validate($name,1)){
	$errors["Name"] = "name is required";
}elseif(!validate($name,2)){
	$errors["Name"] = "name must be a string";
}
if(!validate($address,1)){
$errors["Address"] = "address is required";
}elseif(!validate($address,2)){
	$errors["Address"] = "address must be a string";
}elseif((strlen($address)<10)&(strlen($address)>=1))
{
	$errors['Address']="address length must be = or > 10 characters";
}
if(!validate($email,1)){
    $errors['Email'] = "Email is Required";
}elseif(!validate($email,3)){
    $errors['Email'] = "Invalid Email";
   }
if(!validate($password,1)){
	$errors["password"] = "password is required";
}elseif((strlen($password)<6)&(strlen($password)>=1)){
	$errors['Password']="password length must be > or = 6 characters";
}
	if(!validate($url,1)){
    $errors['URL'] = "url is Required";
  
   }elseif(!validate($url,4)){
    $errors['URL'] = "Invalid url";
   }
if(empty($_POST["gender"])) {
	$errors['Gender'] = "gender is required";
	}
  if(count($errors) > 0){

    foreach($errors as $key => $value){
        echo '* '.$key.' : '.$value.'<br>';
    }
  }else{
	  echo 'valid data <br>';
	  echo $name."<br>".$email."<br>".$address."<br>".$password."<br>".$url."<br>".$_POST["gender"]."<br>";
  }
	
	
  if(!empty($_FILES['image']['name'])){

    $tmp_path = $_FILES['image']['tmp_name'];
    $imgname     = $_FILES['image']['name'];
    $size     = $_FILES['image']['size'];
    $type     = $_FILES['image']['type'];

    $allowedExt = ['png','jpg','jpeg'];

    $extArray = explode('/',$type);

    if(in_array($extArray[1],$allowedExt)){

       $finalName = rand().time().'.'.$extArray[1];


      $desPath = './uploads/'.$finalName;
       
       if(move_uploaded_file($tmp_path,$desPath)){
        echo 'File Uploaded <br>';
		echo "file name : ".$finalName ;
       }else{
           echo '* Error In Uploading Try Again';
       }   
    }

   }else{
       echo '* File Required';
   }	
	
	
	
	
	
	
}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
?>
	
