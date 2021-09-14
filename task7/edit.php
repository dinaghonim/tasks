<?php 
require  './helpers/dbConnection.php';
require './helpers/helpers.php';




$id = sanitize($_GET['id'],1);    // $_REQUEST

$errors = [];

if(!validate($id,6)){
 $errors['id'] = "InValid Id";      
}



if(count($errors) == 1){
    // 
    $_SESSION['Message'] = $errors['id'];
    
    header("Location: index.php");

}else{

   $sql = "select * from todolist where id = $id";
   $op  = mysqli_query($con,$sql);
   $data = mysqli_fetch_assoc($op);

}





if($_SERVER['REQUEST_METHOD'] == "POST"){

    # Logic ... 
    $title     = CleanInputs($_POST['title']);
    $description    = CleanInputs($_POST['description']);
    $startdate    = CleanInputs($_POST['startdate']);
    $enddate    = CleanInputs($_POST['enddate']);
    // $password = CleanInputs($_POST['password']);
   
    # Validate Inputs ... 
    $errors = [];

    if(!validate($title,1)){
     $errors['title'] = "Field Required.";
    }elseif(!validate($title,2)){
        $errors['title'] = "Invalid String.";  
    }

      if(!validate($description,1)){
        $errors['description'] = "Field Required.";
       }elseif(!validate($description,2)){
        $errors['description'] = "Invalid String.";  
    }

 if(!validate($startdate,1)){
        $errors['start date'] = "Field Required.";
       } 
	if(!validate($enddate,1)){
        $errors['end date'] = "Field Required.";
       }
	



    //    if(!validate($password,1)){
    //     $errors['password'] = "Field Required.";
    //    }elseif(!validate($password,5)){
    //        $errors['password'] = "Invalid Length.";  
    //    }




    if(count($errors) > 0){

        foreach($errors as $key => $value)
        {
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
     
    //  $password = md5($password);

     $sql = "update todolist set title='$title' , description = '$description' , startdate = '$startdate' , enddate = '$enddate'  where id = $id ";

     $op = mysqli_query($con,$sql);

     if($op){
         $message =  'Update done';
     }else{
         $message =  'Error in Update';
       }
 
      header("Location: index.php");
    }

    

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit</h2>
  <form method="post" action="edit.php?id=<?php echo $data['id'];?>"  enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1">title</label>
    <input type="text" name="title" value="<?php echo $data['title'];?>"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter title">
  </div>

<div class="form-group">
    <label for="exampledescription">description</label>
    <input type="text" name="description" value="<?php echo $data['description'];?>"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter description">
  </div>


  <div class="form-group">
    <label for="exampleInputstartdate">startdate</label>
    <input type="date" name="startdate"  value="<?php echo $data['startdate'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter startdate">
  </div>
	  
	  
	  <div class="form-group">
    <label for="exampleInputenddate">end date</label>
    <input type="date" name="enddate"  value="<?php echo $data['enddate'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter enddate">
  </div>

  <!-- <div class="form-group">
    <label for="exampleInputPassword1">New  Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div> -->
 
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>



</body>
</html>

