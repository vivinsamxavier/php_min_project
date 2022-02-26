<?php
include ('conn.php');
if(isset ($_POST['submit'])){
    $Username= $_POST['username'];
    $Password= $_POST['password'];
 
 $select = mysqli_query($conn,"SELECT * FROM login WHERE username='$Username' AND password='$Password'" );
 $row = mysqli_fetch_array($select, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($select);  
          
        if($count == 1){  
            header('Location:addbook.php');
        }  
        else{  
            echo "Login failed. Invalid username or password";  
        }     
}

?>

<!DOCTYPE html>
<html>

    <head>
    <title>LIBRARY MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <style>
fieldset {
  font-size: 12px;
  padding: 15px;
  width: 470px;
  text-align: right;
}

.center {
  margin: auto;
  width: 60%;
  border: 3px solid lightblue;
  padding: 20px;
  margin-top:200px;
}
.button{
    text-align: right;
}
   </style>
   </head>

<body>


<div class="container">
<form  class="center" action="" method="POST">
<fieldset>

<h5 >LIBRARY MANAGEMENT SYSTEM<h5><br><br>

    <label for="Username"><b>Username:</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
   <br><br>
    <label for="Password"><b>Password:</b></label>

    <input type="password" placeholder="Enter Password" name="password" required>
    <br></br>
<div class="button">
    <button name="submit"  class="btn btn-primary" >Login</button>
<div>
</fieldset>
</form>
</div>
</body>
</html>