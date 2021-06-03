<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'tangermarket';
    $db_host     = 'localhost';
    $conn = mysqli_connect($db_host, $db_username, $db_password,$db_name)

           or die('could not connect to database');
    
    
    $username = mysqli_real_escape_string($conn,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($conn,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM user where 
              Identifiant = '".$username."' and mot_passe = '".$password."' ";
        $exec_requete = mysqli_query($conn,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // Icorrecte input
        {
           $_SESSION['username'] = $username;
           echo "<script>
alert('Welcome $username ');
window.location.href='http://localhost/tangermarket/index.php';
</script>";
        }
        else
        {
            echo "<script>
            alert('INPUT IS INCORRECT');
            window.location.href='http://localhost/tangermarket/login.php';
            </script>";
        }
    }
    else
    {
        echo "<script>
alert('INPUT IS EMPTY');
window.location.href='http://localhost/tangermarket/login.php';
</script>";


        // empty input
    }
}

?>