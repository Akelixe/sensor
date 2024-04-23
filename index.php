<?php
   $con = mysqli_connect( "localhost","root","","sensor_db" );
   $res = mysqli_query( $con, "SELECT * FROM sensor" );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title> Projet </title>
</head>
<style> .color-white{ color: white !important; } </style>
<body>
   <div class="container">
       <div class="col-md-12 bg-primary p-4 d-flex justify-content-center my-5">
           <span class="h1 text-center color-white"> TABLEAU DE DONNEES </span>
       </div>
       <div class="col-md-12">
           <table class="table">
               <thead>
                   <tr>
                       <th scope="col"> Id-card </th>
                       <th scope="col"> Value </th>
                       <th scope="col"> Created-at </th>
                   </tr>
               </thead>
               <tbody>
               <?php while( $data = mysqli_fetch_array( $res ) ) {  ?>
                   <tr>
                       <td> <?= $data['card'] ?> </td>
                       <td> <?= $data['value'] ?> </td>
                       <td> <?= $data['created_at'] ?> </td>
                   </tr>
               <?php } ?>
               </tbody>
           </table>
       </div>
   </div>
</body>
</html>