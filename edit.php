<?php
   include ("function.php");
   $objCrudAdmin = new crudApp();

  
   $students = $objCrudAdmin->display_data();

   if(isset($_GET['status'])){
       if($_GET['status']= 'edit'){
           $id = $_GET['id'];
          $returnData =  $objCrudAdmin->display_data_by_id($id);
       }
   }
   if(isset($_POST['edit_btn'])){
   $msg = $objCrudAdmin->update_data($_POST);

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
          <?php if(isset($msg)){echo $msg;} ?>

        <input class="form-control mb-4" type="text" name="u_sdt_name" value="<?php echo $returnData['std_name']; ?>">
        <input class="form-control mb-4" type="number" name="u_sdt_roll" value="<?php echo $returnData['std_roll']; ?>">
        <input class="form-control mb-4" type="file" name="u_std_img" >
        <input type="hidden"  name="std_id" value="<?php echo $returnData['id']; ?>" >
        <input type="submit"  value="Update" name="edit_btn" class="form-control bg-warning">

      </form>
   
      </div>
  

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>