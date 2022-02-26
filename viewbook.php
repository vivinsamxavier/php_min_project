<?php 
include ('conn.php');
    $query ="SELECT * FROM  book_view";
    $result = mysqli_query($conn,$query);
     


?>

<!DOCTYPE html>
<html>
    <head>
<title>Gird view</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" 
        src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
  
    <link rel="stylesheet" href=
"https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  
    
    <script src=
"https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
    </script>

    </head>
<body>
<?php include ('header.php'); ?>
    <h1>GRID VIEW</h1>
<table  id="tableID" class="table">
  <thead>
    <tr>
      <th scope="col">category</th>
      <th scope="col">Name</th>
      <th scope="col">Author</th>
      <th scope="col">Rating</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Descrption</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)){?>
    <tr>
      
      <td><?php echo $row['bookcategory']; ?></td>
      <td><?php echo $row['bookname']; ?></td>
      <td><?php echo $row['authorname']; ?></td>
      <td><?php echo $row['radio']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><img src="  <?php echo $row['photo'] ?>" height="100px"; width="100px"> </td>
      <td><?php echo $row['descrption']; ?></td>
      <td><a class="btn btn-primary" href="updatebook.php?updateid=<?php echo $row['id']?>">Edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="deletebook.php?delid=<?php echo $row['id']?>" onclick="return confirm('are you want  delete')">delete</a></td>
   
    </tr>
  
  <?php }?>
  </tbody>
</table>
</body>
</html>
<script>
        $(document).ready(function () {
            $('#tableID').DataTable({
                searching: true
            });
        });
    </script>


