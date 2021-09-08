<!doctype html>
<html>
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
  <h2>Form</h2>
  <form method="post" action="index.php" target="_blank"  enctype ="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
	  
	<div class="form-group">
    <label for="exampleInputAddress">Address</label>
    <input type="text" name="address"  class="form-control" id="exampleInputAddress" aria-describedby="" placeholder="Enter Name">
 	</div>
	<div class="form-group">
    <label for="exampleInputUrl">linked in url</label>
    <input type="url" name="url"  class="form-control" id="exampleInputUrl" aria-describedby="" placeholder="Enter Name">
 	</div>
	  
<div class="form-group">
    <label>Gender</label><br>
  <input type="radio" name="gender" value="male">	
<label for="gender">male</label><br>
<input type="radio" name="gender" value="female">
<label for="gender">female</label>	
 	</div>

  
  <div class="form-group">
    <label>Upload File</label>
    <input type="file" name="image" >
  </div>
 
	  
  <button type="submit" class="btn btn-primary">submit</button>
</form>
</div>
</body>
</html>
