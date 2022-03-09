<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "Categories";

    $connect= mysqli_connect($server, $username, $password, $database);

            $name = "";
	          $description = "";
           	$id = 0;
	          $update = false;
          if(isset($_POST["add"])){
            $name = $_POST["name"];
            $description = $_POST["description"];
            $active = $_POST["active"];
            $query = "INSERT INTO history( name, description, active) VALUES('$name','$description','$active')";
            $result = mysqli_query($connect,$query);
          	header('location: index.php');
            echo "<p style='color:#75d5ca; text-align:center; margin-top:50px'>"."The Prosses Successful"."</p>";
          }


          if(isset($_GET['delete'])){
            // $id = $_GET['delete'];
            // echo $id;
             $query ="UPDATE history SET active=0 WHERE id=$id";
            // $query ="DELETE FROM patients WHERE id=$id";
            $result = mysqli_query($connect,$query);
            header('location: index.php');
            echo "<p style='color:#red; text-align:center; margin-top:50px'>"."The Prosses Successful"."</p>";
          }


            if(isset($_GET["edite"])){
            // print_r($_GET["edite"]);
            $id = $_GET["edite"];
            $update = true;
            // $name = $_GET["name"];
            // $description = $_GET["description"];
            $query ="SELECT * From history WHERE id=$id ";
            $result = mysqli_query($connect,$query);

            if($result){
             $row = mysqli_fetch_assoc($result);
             $name = $row['name'];
             $description = $row['description'];

          }}

          if(isset($_POST["update"])){
            // print_r($_POST);
            $id = $_POST["id"];
            // echo $id;
            $name = $_POST["name"];
            $description = $_POST["description"];
            $active = $_POST["active"];
            $query = "UPDATE history SET name='$name', description='$description', active='$active' WHERE id=$id";
            $result = mysqli_query($connect,$query);
          	header('location: index.php');

          }

    $query = "SELECT * FROM history WHERE active=1";
    $result = mysqli_query($connect,$query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/css/all.min.css" />
    <!-- CSS Normalized -->
    <link rel="stylesheet" href="public/css/normalized.css" />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="education d-flex justify-content-center align-items-center " >
      <div class="container">
        <form action="index.php" method="POST" enctype="multipart/form-data" class=" col-5 my-5">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="mb-3">
            <label for="exampleInputName" class="form-label">Book Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" value="<?php echo $name; ?>" required >
          </div>
         <div class="mb-3">
            <label for="exampleInputDescription" class="form-label">Description</label>
            <input type="text" class="form-control" id="exampleInputDescription" name="description" value="<?php echo $description; ?>" required>
         </div>
          <input type="hidden" name="active" value="1">
          <?php if ($update == true): ?>
        	<button class="btn btn-primary" type="submit" name="update"  >update</button>
          <?php else: ?>
	        <button  class="btn btn-primary" type="submit" name="add" >Add</button>
          <?php endif ?>
          <!-- <input type="submit" value="Add" name="add"> -->
        </form>
        <table class="table shadow p-3 caption-top ">
          <h1>History</h1>

          <thead>
            <tr class="p-3">
              <th scope="col">#</th>
              <th scope="col">Book Name</th>
              <th scope="col">Description</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($result){
              $i=1;
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr class='p-5 my-3'>
        <td>".$i++."</td>
        <td>".$row['name']."</td>
        <td>".$row['description']."</td>
        <td><a href='index.php?edite=".$row['id']."'><i class='fas fa-pen'></i></a></td>
        <td><a class='text-danger' href='index.php?delete=".$row['id']."'>
            <i class='fas fa-trash'></i></a></td>
        </tr>";
      }
      // echo'</table>';
    ?>
          </tbody>
        </table>
        <?php
        }
    ?>
    </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
