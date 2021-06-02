
<?php
$conn = mysqli_connect("localhost","root","","souqstock");
if(isset($_POST['submit'])) {
    $libelle = $_POST['libelle'];
    $quantite_minimale = $_POST['quantite_minimale'];
    $quantite_en_stock = $_POST['quantite_en_stock'];
    $quantite_max = $_POST['quantite_max'];
    $prix_unitaire = $_POST['prix_unitaire'];
    $categorie = $_POST['categorie'];
    $sql ="INSERT INTO `produit`(`libelle`, `quantite_minimale`, `quantite_en_stock`,`quantite_max`,`prix_unitaire`, `categorie` ) VALUES ('$libelle','$quantite_minimale','$quantite_en_stock','$quantite_max','$prix_unitaire','$categorie')";
    $result =$conn->query($sql);
    if ($result == TRUE){
        echo "<script>alert(\"New product added successfuly\")</script>";
    }
    $conn->close();
}

if(isset($_POST['filter'])){
    header('location: filter.php');
}
?>
<?php include "head.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php";
?>
<body id="body" style="background-image:url('');background-repeat:no-repeat;background-size:cover;">
<nav class="navbar navbar-default navbar-info bg-info ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-light" href="index.php">TangerMarket</a>
    </div>
    <ul class="nav navbar-nav " style="display: flex; flex-direction:row; padding:10px;">
      <li class="active mr-3 btn btn-success  "><a class="text-light" href="#">Acceuill</a></li>

      <!-- <li class="active"><a href="/SouqStock/ajouter.php">Ajouter</a></li> -->
      <li class="btn btn-danger text-light"><a class="text-light" href="/SouqStock/login.php">Déconnecter</a></li>

    </ul>
  </div>
</nav>

            <form  style="width: 40%;background-color:white;border-radius: 10px;padding: 20PX;" class="container" action="" method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">libelle</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="libelle" name="libelle">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Quantite_minimale</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Qt_minimale" name="quantite_minimale">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Quantite max</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Qt_en_max" name="quantite_max">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">prix_unitaire</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="prix unitaire" name="prix_unitaire">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Quantite_en_stock</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Qt_en_stock" name="quantite_en_stock">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">	categorie</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="categorie" name="categorie">
  </div>
  <input type="submit" class="btn btn-success"name="submit" value="submit">
</form>
 
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

$conn = mysqli_connect("localhost","root","","souqstock");
              
              $sql = "SELECT * FROM produit";
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
            <td><a href="categorie.php?categorie=<?php echo $row["categorie"] ?>"> <?php echo $row["categorie"] ?></a></td>
            <td>
              <a href='update.php?id=<?php echo$row["réference"]?>' class="edit" ><i class="material-icons" title="Edit">&#xE254;</i></a>

              <a href='delete.php?id=<?php echo$row["réference"]?>' class="delete" name="réference"><i class="material-icons" title="Delete" id="delete">&#xE872;</i></a>
            </td>
              </tr>
              <?php
}
              }
              
              
              ?>


            </table>
            <div class="clearfix">
        </div>
    </div>
    </body>
</html>