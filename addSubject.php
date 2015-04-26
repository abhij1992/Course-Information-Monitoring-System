<<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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
    
    //Code to fetch all the faculty name and id from DB and put into hash	
	$sql="SELECT id,name from faculty WHERE `isAdmin`=0;";
	$res=$conn->query($sql);
	if($res->num_rows > 0)
	{
	   while($row=$res->fetch_assoc())
	   {
	      $faculty[$row["name"]]=$row["id"];
		  $faculty_id[$row["id"]]=$row["name"];
	   }
	}
	
	//Code to process add subject request
	  //Code to process addfaculty request
	if(isset($_POST['addSubject']))
	{
	   if(!empty($_POST['subject_code']) && !empty($_POST['subject_name']) && !empty($_POST['section']) && !empty($_POST['faculty_name']) && !empty($_POST['semester'])){
	     $sql="INSERT into subject(subject_code,section,subject_name,faculty_id,semester) VALUES('".$_POST['subject_code']."','".$_POST['section']."','".$_POST['subject_name']."','".$faculty[$_POST['faculty_name']]."','".$_POST['semester']."');";
		 if(!$conn->query($sql)){
		     echo "<h2>Error...Unable to add Subject to Database..</h2>";
		 }else { echo "<script>alert(\"Added Subject to Database succefully\");</script>";}
	   }else {echo "<h2>Error...Enter all fields to add Subject</h2>";}
	}
	
	//Code to display all the subjects grouped by subject code
	//code to put all faculty and their details in a hash
	$sql="SELECT  * from subject";
	$res=$conn->query($sql);
	if($res->num_rows > 0)
	{ 
	   $i=0;
	   while($row=$res->fetch_assoc())
	   {
	      $arr=array($row["subject_code"],$row["section"],$row["subject_name"],$faculty_id[$row["faculty_id"]],$row["semester"],$row["id"]);
	      $subject[$i++]=$arr;
	   }
	}
	
	//Code to delete the subject requested by user
	if(isset($_POST['deleteSubject'])) 
	  { 
	    if(!empty($_POST['deleteSubject'])){
	    //delete the subject,process it
		$sql="DELETE FROM subject WHERE id=".$_POST['deleteSubject'].";";
		if(!($conn->query($sql))) {echo "<h2>Error...Unable to delete Subject...</h2>";}
		}
	  }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course Information Monitoring System </title>
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
	
        <h2>Current faculty list associated with subject</h2>	
		<table id="rounded-corner">
		 <thead>
    	  <tr>
            <th>Subject Code</th><th>Section</th><th>Subject Name</th><th>Faculty</th><th>Semester</th><th>Delete</th>
          </tr>
		  </thead>
		  <tfoot>
    	  <tr>
        	<td colspan="6">All Subjects with associated faculty</td>
          </tr>
          </tfoot>
		 <tbody>
		   <?php
    	      foreach($subject as $k=>$v)
			  {
			   echo "<tr class=\"even\"><td>".$v[0]."</td><td>".$v[1]."</td><td>".$v[2]."</td><td>".$v[3]."</td><td>".$v[4]."</td>";
			   echo "<td><form action=\"\" method=\"post\" onsubmit=\"return submitdata()\"><input type=\"hidden\" name=\"deleteSubject\" value=\"".$v[5]."\"/><input type=\"image\" src=\"./images/trash.gif\" ></form></td>";
			   echo "</tr>";
			  }
		   ?>
         </tbody>		
		 </table></br></br></br>
		 
	    <h2>Add Subject and allocate Faculty</h2>
		<div class="form">
            
            <div class="form_row">
            <form action="" method="post" onsubmit=" return submitdata() ">
			<label>Subject Code:</label>
            <input type="text" class="form_input" name="subject_code" />
            </div>
			
			<div class="form_row">
			<label>Subject Name:</label>
            <input type="text" class="form_input" name="subject_name" />
            </div>
			
			<div class="form_row">
			<label>Section:</label>
            <input type="text" class="form_input" name="section" />
            </div>	
			
			<div class="form_row">
			<label>Faculty:</label>
            <select class="form_select" name="faculty_name">
			<?php
			  foreach($faculty as $k=>$v)
			  { echo "<option>$k</option>"; }
			?>
			</select>
            </div>	
			
			<div class="form_row">
			<label>Semester:</label>
            <input type="text" class="form_input" name="semester" />
            </div>	
			
			<div class="form_row">
            <input type="submit" class="form_submit" name="addSubject" value="Add Subject" />
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
    Allocate subjects to a Faculty.
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

