<?php 
require  './helpers/dbConnection.php';
require './helpers/helpers.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    # Logic ... 
    $title     = CleanInputs($_POST['title']);
    $description    = CleanInputs($_POST['description']);
    $startdate    = CleanInputs($_POST['startdate']);
    $enddate    = CleanInputs($_POST['enddate']);
   
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


    if(count($errors) > 0){

        foreach($errors as $key => $value)
        {
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
     
     //$password = md5($password);

     $sql = "insert into todolist (title,description,startdate,enddate) values ('$title','$description','$startdate','$enddate')";

     $op = mysqli_query($con,$sql);

     if($op){
         echo 'adding done';
     }else{
         echo 'Error in adding';
       }
    }

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>adding</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Adding</h2>
  <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputtitle1">title</label>
    <input type="text" name="title"  class="form-control" id="exampleInputtitle" aria-describedby="" placeholder="Enter title">
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">description</label>
    <input type="text" name="description"  class="form-control" id="exampleInputdescription" aria-describedby="" placeholder="Enter description">
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">start date</label>
    <input type="date" name="startdate"  class="form-control" id="exampleInputstartdate" aria-describedby="" placeholder="Enter startdate">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">end date</label>
    <input type="date" name="enddate" class="form-control" id="exampleInputenddate1" aria-describedby="emailHelp" placeholder="Enter enddate">
  </div>
 
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>



</body>
</html>

