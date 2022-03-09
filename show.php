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
<div class="container py-5">
    <div class="row text-center">

      <!-- End-->
<?php
 $server = "localhost";
    $username = "root";
    $password = "";
    $database = "Categories";

    $connect= mysqli_connect($server, $username, $password, $database);
   $query = "SELECT * FROM history WHERE active=1";
    $result = mysqli_query($connect,$query);
if($result){
      while($row = mysqli_fetch_assoc($result)){?>

         <!-- Books-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow py-5 px-4">
          <h5 class="mb-0"><?php echo $row['name'] ?></h5>
          <span class="small text-uppercase text-muted"><?php echo $row['description']?></span>
 
        </div>
      </div>
       <?php
      }
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
