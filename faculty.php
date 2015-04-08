<?php
session_start();
if(isset($_SESSION['unames']))
{
  if($_SESSION['isAdmin']!=0)
   {
     header('Location: index.php');
   }   
}
else header('Location: index.php');
?>


FACULTY <a href="logout.php" >Logout</a>

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>