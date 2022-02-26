<?php
include ('conn.php');
if(isset($_GET['updateid'])){
    $id=$_GET['updateid'];
 
    $select =mysqli_query($conn,"SELECT * FROM book_view WHERE id='$id'");
   
   
    $data = mysqli_fetch_assoc($select);  


    $bookcategory  =  $data['bookcategory'];
    $bookname      =  $data['bookname'];
    $authorname    =  $data['authorname'];
    $radio         =  $data['radio'];
    $photo         =  $data['photo'];
    $price         =  $data ['price'];
    $purchasedate  =  $data['purchasedate'];
    $descrption    =  $data['descrption'];

}
if(isset($_POST['submit'])){
    // print_r($_FILES["uploadfile"]);
    // exit;
    if($_FILES["uploadfile"]){
   
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
            $folder = "image/".$filename;
    
             move_uploaded_file($tempname, $folder);
    }

    $bookcategory    =   $_POST['bookcategory'];
    $bookname        =   $_POST['bookname'];
    $authorname      =   $_POST['authorname'];
    $radio           =   $_POST['radio'];
    $price           =   $_POST['price'];
    $purchasedate    =   $_POST['purchasedate'];
    $descrption      =   $_POST['descrption'];

    if($filename){

        $query ="UPDATE `book_view` SET bookcategory='$bookcategory' ,bookname='$bookname' ,authorname='$authorname' ,radio='$radio' ,photo='$folder' ,price='$price',purchasedate='$purchasedate', descrption='$descrption' WHERE id=$id";
    

    }else{
        $query ="UPDATE `book_view` SET bookcategory='$bookcategory' ,bookname='$bookname' ,authorname='$authorname' ,radio='$radio' ,price='$price',purchasedate='$purchasedate', descrption='$descrption' WHERE id=$id";


    }
    
    $result =mysqli_query($conn,$query);

    if($result){
        header('Location:viewbook.php');
    }else{
    	echo"error";
    }

   }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>add book</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

	<?php include ('header.php'); ?>
    <h1>UPDATE</h1>

    <form  action="" method="post" enctype="multipart/form-data">
    <div class="container">
	<div class ="row col-sm-5">
    

    	<lable>Book category:</lable>

    	<select name="bookcategory" id="books" >
        <option value="" disabled selected>select category</option>
        <option value="comedy book" <?php if($bookcategory == 'comedy book') { echo "selected";} ?> }>comedy book</option>

        <option  value="thriller books" <?php if($bookcategory == 'thriller books') { echo "selected";} ?> }>thriller books</option> 

        <option value="journalism"   <?php if($bookcategory == 'journalism') { echo "selected";} ?> }>journalism</option>

        <option value="Classics"   <?php if($bookcategory == 'Classics') { echo "selected";} ?> }>Classics</option>

        <option value="Fantasy"   <?php if($bookcategory == 'Fantasy') { echo "selected";} ?> }>Fantasy</option>
        

        <option value="Historical Fiction"   <?php if($bookcategory == 'Historical Fiction') { echo "selected";} ?> }>Historical Fiction</option>
        
        <option value="Detective and Mystery"   <?php if($bookcategory == 'Detective and Mystery') { echo "selected";} ?> }>Detective and Mystery</option>

        <option value="Literary Fiction."   <?php if($bookcategory == 'Literary Fiction.') { echo "selected";} ?> }>Literary Fiction.</option>

        
        
        </select>
       

    	<lable>Book Name:</lable>
    	<input type="text" name ="bookname" placeholder="Enter the book name" value="<?php echo $bookname;?>" >
    

    	<lable>Author Name:</lable>
    	<input type="name" name ="authorname" placeholder="Enter author name" value="<?php echo $authorname;?>" >
       

    	<lable>Price:</lable>
    	<input type="number" name ="price" placeholder="Enter the price"  value="<?php echo $price;?>">
       
        <div>
    	<lable>Rating:</lable>
    	<span class="fa fa-star"> <input type="radio" name="radio" value="1" <?php if($radio == '1') { echo "checked";} 
        ?> } >1</span>
        
        <span class="fa fa-star"> <input type="radio" name="radio" value="2"  <?php if($radio == '2') { echo "checked";} ?> } >2</span>
        <span class="fa fa-star " > <input type="radio" name="radio" value="3"<?php if($radio == '3') { echo "checked";} ?> } >3</span>
        <span class="fa fa-star" ><input type="radio" name="radio" value="4"  <?php if($radio == '4') { echo "checked";} ?> } >4</span>
        <span class="fa fa-star" ><input type="radio" name="radio" value="5"  <?php if($radio == '5') { echo "checked";} ?> } >5</span>
        </div>

    	
    	<lable>Image:</lable>
        <p> <img src="<?php echo $photo; ?>" width="75" height="75" /></p>
        <input type="file" name="uploadfile" id="fileToUpload" >
        



        <lable>Purchase date:</lable>
    	<input type="date" name ="purchasedate"  placeholder="Enter the purchse date"  value="<?php echo $purchasedate;?>">


        <lable>Descrption:</lable>
        <textarea type="textareaname" name="descrption"  placeholder="Enter the descrption"> <?php echo $descrption; ?></textarea>
        <div>
		<button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
       </div>
       </div>
    </form>
</body>
</html>