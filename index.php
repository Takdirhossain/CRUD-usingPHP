<?php
   include ("function.php");
   $objCrudAdmin = new crudApp();

   if(isset($_POST['add_info'])){
    $return_msg = $objCrudAdmin-> add_data($_POST);
   }
   $students = $objCrudAdmin->display_data();

   if(isset($_GET['status'])){
       if($_GET['status']='delete'){
           $delete_id = $_GET['id'];
           $objCrudAdmin->delete_data($delete_id);
       }
   }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Crud Application</title>
  </head>
  <body>
      <div class="container  my-4 p-4 shadow">
      <h1>Student Data Collection</h1>
      <form action="" method="post" enctype="multipart/form-data">
          <?php if(isset($return_msg)){echo $return_msg;} ?>

        <input class="form-control mb-4" type="text" name="sdt_name" placeholder="Enter Your Name">
        <input class="form-control mb-4" type="number" name="sdt_roll" placeholder="Enter Your Roll">
        <input class="form-control mb-4" type="file" name="std_img" >
        <input type="submit" value="Add Information" name="add_info" class="form-control bg-warning">

      </form>
      

      </div>
     <div class="container my-4 p-4 shadow">
         <table class="table table-responsive">
             <thead>
                 
                 <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Roll</th>
                     <th>Image</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
             <?php while($student = mysqli_fetch_assoc($students)){ ?>
                 <tr>
                     <td><?php echo $student['id']; ?></td>
                     <td><?php echo $student['std_name']; ?></td>
                     <td><?php echo $student['std_roll']; ?></td>
                     <td><img style="height:100px" src="upload/<?php echo $student['std_img']; ?>"></td>
                     <td>
                         <a  class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $student['id']; ?>">Edit</a>
                         <a  class="btn btn-warning" href="?status=delete&&id=<?php echo $student['id']; ?>">Delete</a>
                     </td>
                 </tr>
                 <?php } ?>
             </tbody>
         </table>
     </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>