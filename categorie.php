<?php

include 'head.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-default navbar-info bg-info ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-light" href="index.php">TangerMarket</a>
    </div>
    <ul class="nav navbar-nav " style="display: flex; flex-direction:row; padding:10px;">
      <li class="active mr-3 btn btn-success  "><a class="text-light" href="index.php">Acceuill</a></li>
      <li class="btn btn-danger text-light"><a class="text-light" href="/tangermarket/login.php">Déconnecter</a></li>
    </ul>
  </div>
</nav>
<div class="row">
                    <div class="col-sm-6">
                        <h2>Gestion de  <b>stock</b></h2><br>
                    </div>
                    <!-- <div align="center">  
                        <input type="text" name="search" id="search" class="form-control" />  
                   </div><br>  -->
                </div>
        
        <div class="table-wrapper" style="background-color:white;border-radius: 10px;padding:10px;">
            <div class="table-title">
                
            </div>
            <table class="table table-striped table-hover" id="myTable">
                <thead style="background-color:white;">
                    <tr>
                       
                        <th>Reference</th>
                        <th>Libelle</th>
                        <th>Quantite minimale</th>
                        <th>Quantite max</th>
                        <th>prix_unitaire</th>
                        <th>Quantite en stock</th>
                        <th>categorie</th>
                        <th>action<th>
                        </tr>
                </thead>
                <?php

$conn = mysqli_connect("localhost","root","","tangermarket");
              $categorie = $_GET['categorie'];
              $sql = "SELECT * FROM produit WHERE categorie='$categorie'";
              $result = $conn-> query($sql);

              if($result-> num_rows > 0){
                  while ($row = $result-> fetch_assoc()){
                      ?>
            <td ><?php echo $row["réference"] ?></td>
              <td ><?php echo $row["libelle"] ?></td>
              <td ><?php echo $row["quantite_minimale"] ?></td>
              <td ><?php echo $row["quantite_max"] ?></td>
              
            <td><?php echo $row["prix_unitaire"] ?></td>
            <td><?php echo $row["quantite_en_stock"] ?></td>
            <td><?php echo $row["categorie"] ?></td>
            <td>
              <a href='updatecat.php?id=<?php echo$row["réference"]?>' class="edit" ><i class="material-icons" title="Edit">&#xE254;</i></a>

              <a href='deletecat.php?id=<?php echo$row["réference"]?>' class="delete" name="réference"><i class="material-icons" title="Delete" id="delete">&#xE872;</i></a>
            </td>
              </tr>
              <?php
}
              }
              
              
              ?>


            </table>
</body>
</html>