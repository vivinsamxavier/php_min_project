<?php 
  include ('conn.php');
  if(isset($_GET['delid'])){
  $id=$_GET['delid'];

 $query="DELETE FROM book_view WHERE id = $id";
 $result = mysqli_query($conn,$query);

if($result){
	header('Location:viewbook.php');

}else{
	echo"Error while deleting record";
}


  }

?>