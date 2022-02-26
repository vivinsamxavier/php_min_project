<?php
include ('conn.php');
if(isset ($_POST['submit'])){
    
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "image/".$filename;

     move_uploaded_file($tempname, $folder); 
            
    $bookcategory= $_POST['bookcategory'];
    $bookname= $_POST['bookname'];
	$authorname= $_POST['authorname'];
	$price= $_POST['price'];
	$radio= $_POST['radio'];
	$photo= $_POST['photo'];
	$purchasedate= $_POST['purchasedate'];
	$descrption= $_POST['descrption'];

 
 $query ="INSERT INTO book_view(bookcategory,bookname,authorname,price,radio,photo,purchasedate,descrption) VALUES ('$bookcategory','$bookname','$authorname','$price','$radio','$folder','$purchasedate','$descrption')";
 
 $result = mysqli_query($conn,$query);
 
 if($result){
    header('Location:viewbook.php');
    }else{
    	echo"error ";
    }    
  
}

?>




<!DOCTYPE html>
<html>
    <head>
        <title>add book</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
        .fa fa-star{
        color: orange;
                 }
        </style>


    </head>
    <body>

	<?php include ('header.php'); ?>
    <h1>ADD BOOK</h1>

    <form  action="" method="post" enctype="multipart/form-data" >
	<div class="container">
	<div class ="row col-sm-7">

    	<lable>Book category:</lable>
    	<select name="bookcategory" id="books">
        <option value="" disabled selected>select category</option>
        <option value="comedy book">comedy book</option>
        <option value="thriller books">thriller books</option>
        <option value="journalism">journalism</option>
        <option value="Classics">Classics</option>
        <option value="Fantasy.">Fantasy.</option>
        <option value="Historical Fiction">Historical Fiction</option>
        <option value="Detective and Mystery">Detective and Mystery</option>
        <option value="Literary Fiction.">Literary Fiction.</option>
    
        </select>
       

    	<lable>Book Name:</lable>
    	<input type="text" name ="bookname" placeholder="Enter the book name" >
    

    	<lable>Author Name:</lable>
    	<input type="name" name ="authorname" placeholder="Enter author name" >
       

    	<lable>Price:</lable>
    	<input type="number" name ="price" placeholder="Enter the price" >
       
        <div>
    	<lable>Rating:</lable>
    	<span class="fa fa-star"> <input type="radio" name="radio" value="1">1</span>
        
        <span class="fa fa-star"> <input type="radio" name="radio" value="2">2</span>
        <span class="fa fa-star"> <input type="radio" name="radio" value="3">3</span>
        <span class="fa fa-star"> <input type="radio" name="radio" value="4">4</span>
        <span class="fa fa-star"> <input type="radio" name="radio" value="5">5</span>
        </div>

    	
    	<lable>Image:</lable>
    	<input input type="file" name="uploadfile" id="fileToUpload" >


        <lable>Purchase date:</lable>
    	<input type="date" name ="purchasedate"  placeholder="Enter the purchse date" >


        <lable>Descrption:</lable>
        <textarea type="textareaname" name="descrption" placeholder="Enter the descrption"></textarea>
        <div>
		<button type="submit" name="submit" value="submit" class="btn btn-primary">ADD</button>
        </div>
       </div>
       </div>
    </form>
</body>
</html>