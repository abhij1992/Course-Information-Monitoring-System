<?php
session_start();

if(isset($_SESSION['unames'])) //every page checks if logged in ,and if not then go to login page , we are already in login page so no else condition
{
  if($_SESSION['isAdmin']==1) // if admin, then go to admin page
   {
     header('Location: admin.php');
   }   
   if($_SESSION['isAdmin']==0) //if faculty go to faculty page
   {
     header('Location: faculty.php'); 
   } 
}

$pluname="Enter faculty ID";
$plpassword="Enter Password";
if(isset($_POST['logs'])){
	include 'connection.php'; 
	//conn object is initialized in connection.php
	if ($conn->connect_error) { //Check connection
		die("Connection failed: " . $conn->connect_error);
	}
	$pluname=$_POST['uname'];
	$plpassword="";
	$sql = "SELECT name,pword,isAdmin FROM faculty where uname='".$_POST['uname']."' ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		
		$row = $result->fetch_assoc(); 
		//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		if($_POST['pword'] == $row["pword"])
		{
		    $_SESSION["unames"] = $_POST['uname'];
			$_SESSION["name"]=$row["name"];
			if($row["isAdmin"]==1)
			{
				$_SESSION["isAdmin"] = 1;
				header('Location: admin.php');
				//http_redirect("admin.php", array("uname" => $_POST['uname']), false, HTTP_REDIRECT_PERM);				
			}
			else{
				$_SESSION["isAdmin"] = 0;
				header('Location: faculty.php');
			}
		}
		else{
			$pluname='/" value="'.$_POST['uname'].'"';
			$plpassword="Invalid Password";
		}
	} else {
		$pluname="Invalid Username";
	}
$conn->close();
}
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Course Information Monitoring System</title>

    <link rel="stylesheet" href="css/style2.css">

</head>

<body>

  <div id="wrap">
  <div id="regbar">
    <div id="navthing">
      <h2><a href="#" id="loginform">Login</a><span style="float:right;">Course Information Monitoring System </span></h2>
    <div class="login">
      <div class="arrow-up"></div>
      <div class="formholder">
        <div class="randompad">
           <fieldset>
		   <form name="Login" action="" method="Post">
             <label name="email">User ID</label>
             <input type="text" name="uname" placeholder="<?php echo $pluname;  ?>" />
             <label name="password">Password</label>
             <input type="password" name="pword" placeholder="<?php echo $plpassword;  ?>" />
			 <input type="checkbox" name="remb" style="height:16px"> <label>Remember me<br></label>
			 
             <input type="submit" value="Login" name="logs" />
			</form>
           </fieldset>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

  <script src='js/js2.js'></script>

  <script src="js/index2.js"></script>
  
  <div id="panelwrap">
  <h3>
  Course Information Monitoring System 
  </h3>
  <br><br>
  <p >
  The Course Management System(CMS) will provide the head of Department, teachers and students an online application that will allow them to track the workflow of the syllabus. It will provide teachers and students with information on how much of the course has been completed and how much is left. It will be driven by three interfaces; one for the head of the department, who will be able to keep of track of every subject and teacher and how much progression has been made. A second interface for teachers to update and keep track of how much of the syllabus is complete, and a third interface for students to check how much is completed based on which semester they are in.
  </p>
  <br><h3>Select Semester </h3>
  <form name="Student" action="Student.php">
  <br><select name="Semester" style="width: 100px">
  <option value="1" >1</option>
  <option value="2" >2</option>
  <option value="3" >3</option>
  <option value="4" >4</option>
  <option value="5" >5</option>
  <option value="6" >6</option>
  </select>
  <input type="submit" style="width: 150px" value="See Progress" name="SemForm"/>
  </form>
</div>
</body>

</html>