<?php
$conn = mysqli_connect("localhost","root","","tangermarket");
$id =$_GET['id'];

mysqli_query($conn,"DELETE FROM produit  WHERE réference =$id");

?>
<script type="text/javascript">
window.location="index.php";
</script>