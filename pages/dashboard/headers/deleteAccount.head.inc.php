<?php
if(!isset($_SESSION['email'])){
    header('Location: index.php?p=login');
}

$email = $_SESSION['email'];
$DB = DB::getInstance();

if(isset($_GET['action'])){
    $sql="DELETE  FROM  users  WHERE  email='$email'";
    if($DB->query($sql)){
        echo "<div class='success'>{lang:delete-success}</div>";
    }
    else{
        echo "<strong> Unable to delete your account.</strong>";
    }
}

?>