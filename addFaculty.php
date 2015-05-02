<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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

	
	include 'connection.php'; 
	//fetching main information
	if ($conn->connect_error) { //Check connection
		die("Connection failed: " . $conn->connect_error);
	}
	
	//code to put all faculty and their details in a hash
	$sql="SELECT  * from faculty WHERE `isAdmin`=0;";
	$res=$conn->query($sql);
	if($res->num_rows > 0)
	{
	   while($row=$res->fetch_assoc())
	   {
	      $faculty[$row["uname"]]=$row["name"];
	   }
	}
	
	//Code to process addfaculty request
	if(isset($_POST['addFaculty']))
	{
	   if(!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['repeatpassword'])){
	     $sql="INSERT into faculty(uname,pword,name) VALUES('".$_POST['username']."','".$_POST['password']."','".$_POST['name']."');";
		 if(!$conn->query($sql)){
		     echo "<h2>Error...Unable to add Faculty to Database..</h2>";
		 }else { echo "<script>alert(\"Added Faculty to Database\");</script>";}
	   }else {echo "<h2>Error...Enter all fields to add faculty</h2>";}
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Faculty - Course Information Monitoring System </title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet' type='text/css'>
<!-- jQuery file -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.tabify.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var $ = jQuery.noConflict();
$(function() {
$('#tabsmenu').tabify();
$(".toggle_container").hide(); 
$(".trigger").click(function(){
	$(this).toggleClass("active").next().slideToggle("slow");
	return false;
});
});

function submitdata() { 
    return (confirm("Are You Sure You Want To Proceed?"));
}

</script>
</head>
<body>
<div id="panelwrap">
  	
	<div class="header">
    <div class="title"><a href="#">Course Information Monitoring System</a></div>
    
    <div class="header_right">Welcome <?php echo $_SESSION['name']; ?><a href="logout.php" class="logout">Logout</a> </div>
    
    <div class="menu">
    <ul>
    <li><a href="admin.php" class="selected">Main page</a></li>
    </ul>
    </div>
    
    </div>
              
    <div class="center_content">  
 
    <div id="right_wrap">
    <div id="right_content">   
         <h2>Current Faculty-Users</h2>		
		 <table id="rounded-corner">
		 <thead>
    	  <tr>
            <th>Username</th><th>Name</th>
          </tr>
		  </thead>
		  <tfoot>
    	  <tr>
        	<td colspan="2">All the current faculty in Database</td>
          </tr>
          </tfoot>
		 <tbody>
		   <?php
    	      foreach($faculty as $k=>$v)
			  {
			   echo "<tr class=\"even\"><td>".$k."</td><td>".$v."</td></tr>";
			  }
		   ?>
         </tbody>		
		 </table></br></br></br>
         <h2>Add Faculty</h2>	
	     <div class="form">
            
            <div class="form_row">
            <form action="" method="post" onsubmit=" return submitdata() ">
			<label>Name:</label>
            <input type="text" class="form_input" name="name" />
            </div>
			
			<div class="form_row">
			<label>Username:</label>
            <input type="text" class="form_input" name="username" />
            </div>
			
			<div class="form_row">
			<label>Password:</label>
            <input type="password" class="form_input" name="password" />
            </div>	
			
			<div class="form_row">
			<label>Repeat Password:</label>
            <input type="password" class="form_input" name="repeatpassword" />
            </div>	
			
			 <div class="form_row">
            <input type="submit" class="form_submit" name="addFaculty" value="Add Faculty" />
            </div> 
            <div class="clear"></div>
			</form>
			
		</div>	
		
        <div class="toogle_wrap">
            <div class="trigger"><a href="#">Toggle with text</a></div>

            <div class="toggle_container">
			<p>
       This Section allows you to Post notifications for each subject...</br></br></br>
	The notifications are grouped by Subject Code..</br></br></br>
	Click the Subject Code tab to access or delete the notifications posted so far.
			</p>
            </div>
        </div>
      
     </div>
     </div><!-- end of right content-->
                     
                    
    <div class="sidebar" id="sidebar">
    <h2>Admin Operations</h2>
     <ul>
	  <li><a href="addFaculty.php">Add Faculty</a></li>
	  <li><a href="addSubject.php">Add Subject</a></li>
	 </ul>
    
    <h2>Text Section</h2> 
    <div class="sidebar_section_text">
    Displays the current faculty list stored in Database.</br>
	Allows you to add Faculty to the database.
    </div>         
    
    </div>             
    
    
    <div class="clear"></div>
    </div> <!--end of center_content-->
    
    <div class="footer">
Panelo - Free Admin Template by <a href="htpp://csstemplatesmarket.com" target="_blank">CSSTemplatesMarket</a>
</div>

</div>

    	
</body>
</html>

