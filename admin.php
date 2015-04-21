<?php
session_start();
    //the below code block is required as it controls which user can access the pages,please don't remove it
	if(isset($_SESSION['unames'])) //every page checks if logged in and ,and if not then go to login page
    {   
     if($_SESSION['isAdmin']!=1) //if not admin go to index page
     {
      header('Location: index.php'); 
     }  
    }else header('Location: index.php'); 

?>
ADMIN  <a href="logout.php" >Logout</a>

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>