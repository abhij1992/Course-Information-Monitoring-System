<?php
session_start();
if(isset($_SESSION['unames']))
{
  if($_SESSION['isAdmin']!=1)
   {
     header('Location: index.php');
   }   
}
else header('Location: index.php');

?>
ADMIN  <a href="logout.php" >Logout</a>

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>