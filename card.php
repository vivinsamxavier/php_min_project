<?php
include ('conn.php');
$query ="SELECT * FROM  book_view";
$result = mysqli_query($conn,$query);
?>
<!Doctype html>
<html>
    <head>
  <title>card view</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  

</head>
<body>
<?php include ('header.php'); ?>
<h1>CARD VIEW</h1>



    <?php while ($row = mysqli_fetch_assoc($result)){?>
      <div class="card" style="width: 18rem;">
     <div class="card-body">
       <br><br>
    <h5 class="card-title">card view</h5>
  
    <p   id="admin" class="card-text">category:<?php echo $row['bookcategory']; ?>
                         <br>
                         Name:<?php echo $row['bookname']; ?>
                         <br>
                         Author:<?php echo $row['authorname']; ?>
                         <br>
                         Rating:<?php echo $row['radio']; ?>
                         <br>
                         Price:<?php echo $row['price']; ?>
                         <br>
                         Image:
                         <img src=" <?php echo $row['photo']; ?>" height="200px"; width="200px">
                         <br>
                         Purchase date:<?php echo $row['purchasedate']; ?>
                         <br>
                         Descrption:<?php echo $row['descrption']; ?>
                         <br>
                         </p>
                         <a class="btn btn-primary" href="updatebook.php?updateid=<?php echo $row['id']?>">edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="deletebook.php?delid=<?php echo $row['id']?>" onclick="return confirm('are you want  delete')">delete</a>
          </div>
          </div>
         <br>
        <?php }?> 
</body>
</html>
<script>
         $(document).ready(function() {
             $('#admin').DataTable( {
                 "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
             });
         } );
    </script>