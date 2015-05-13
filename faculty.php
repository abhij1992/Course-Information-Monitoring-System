
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	//the below code block is required as it controls which user can access the pages,please don't remove it
	if(isset($_SESSION['unames'])) //every page checks if logged in and ,and if not then go to login page
    {   
     if($_SESSION['isAdmin']!=0) //if not faculty go to index page
     {
      header('Location: index.php'); 
     }  
    }else header('Location: index.php'); 
		

	include 'connection.php'; 
	//fetching main information
	if ($conn->connect_error) { //Check connection
		die("Connection failed: " . $conn->connect_error);
	}
	if(isset($_POST["Update"])){
		$sql="UPDATE `faculty` SET `email`='".$_POST["email"]."',`address`='".$_POST["address"]."',`phone_no`='".$_POST["phone"]."' 
		WHERE id='".$_POST["fac_id"]."'";
		if($conn->query($sql)){
			echo "<script>alert('Your information has been updated');</script>";
		}
		else{
			echo "<script>alert('Failed to update your information');</script>";
		}
		
	}
	$sql = "SELECT * FROM faculty where uname='".$_SESSION["unames"]."' ";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$faculty_id=$row["id"];
	$faculty_name=$row["name"];
	$faculty_phone=$row["phone_no"];
	$faculty_email=$row["email"];
	$faculty_address=$row["address"];
	
	
	$faculty_code=$_SESSION["unames"];
	$sql = "SELECT * FROM subject where faculty_id='".$faculty_id."' ";
	$result = $conn->query($sql);
	$no_of_subjects=0;
	while($row = $result->fetch_assoc())
	{
		$subject_code[$no_of_subjects]=$row["subject_code"];
		$subject_id[$no_of_subjects]=$row["id"];
		$subject_name[$no_of_subjects]=$row["subject_name"];
		$subject_section[$no_of_subjects]=$row["section"];
		$no_of_subjects++;
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
<script>
function submitdata1() { 
		var x = document.forms["facultyinfo"]["phone"].value;
		var phoneno = /^\d{10}$/;
		if (x == null || x == "") {
			alert("Phone number must be filled out");
			return false;
		}
		if(!(x.match(phoneno)))
        {
			alert("Phone number is invalid");
			return false;
        }
		var x = document.forms["facultyinfo"]["email"].value;
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if (x == null || x == "") {
			alert("Email must be filled out");
			return false;
		}
		if(!(x.match(re)))
        {
			alert("Email is invalid");
			return false;
        }
		var x = document.forms["facultyinfo"]["address"].value;
		if (x == null || x == "") {
			alert("Address must be filled out");
			return false;
		}
    return (confirm("Are You Sure You Want To Proceed?"));
}
</script>
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


</script>
</head>
<body>
<div id="panelwrap">
  	
	<div class="header">
    <div class="title"><a href="#">Course Information Monitoring System</a></div>
    
    <div class="header_right">Welcome <?php echo $faculty_name."(".$faculty_code.")"; ?><a href="logout.php" class="logout">Logout</a> </div>
    
    <div class="menu">
    <ul>
    <li><a href="faculty.php" class="selected">Main page</a></li>
    <li><a href="faculty_add_content.php">Add Subject Content</a></li>
    <li><a href="faculty_notification.php">Notification</a></li>

    </ul>
    </div>
    
    </div>
    <!--
    <div class="submenu">
    <ul>
    <li><a href="#" class="selected">settings</a></li>
    <li><a href="#">users</a></li>
    <li><a href="#">categories</a></li>
    <li><a href="#">edit section</a></li>
    <li><a href="#">templates</a></li>
    </ul>
    </div>          
     -->               
    <div class="center_content">  
 
    <div id="right_wrap">
    <div id="right_content">  
        <div class="toogle_wrap">
            <div class="trigger"><a href="#">Update your Info</a></div>
            <div class="toggle_container">
			<div class="form">
            <div class="form_row">
            <form action="" method="post" name="facultyinfo" onsubmit="return submitdata1()">
			<label>Phone Number:</label>
            <input type="text" class="form_input" name="phone" value="<?php echo $faculty_phone; ?>" />
            </div>
            
			<div class="form_row">
            <label>E-Mail:</label>
            <input type="text" class="form_input" name="email" value="<?php echo $faculty_email; ?>"/>
            </div>
			
            <div class="form_row">
            <label>Address</label>
            <textarea class="form_textarea" name="address"><?php echo $faculty_address; ?></textarea>
            </div>
			<input type="hidden" name="fac_id" value="<?php echo $faculty_id; ?>">
            <div class="form_row">
            <input type="submit" class="form_submit" name="Update" value="Update" />
            </div> 
            <div class="clear"></div>
			</form>
            </div>           
            </div>
        </div>
      
     </div>
     </div><!-- end of right content-->
                     
                    
    <div class="sidebar" id="sidebar">
    <h2>Subjects Taking</h2>
    
        <ul>
		<?php
			for($i=0;$i<$no_of_subjects;$i++)
			{
				echo "<li><a href='faculty_subject.php?subject_code=".$subject_code[$i]."&section_sel=".$subject_section[$i]."&subject_id=".$subject_id[$i]."' >".$subject_name[$i]." - ".$subject_section[$i]." -(".$subject_code[$i].") </a></li>";
			}
		?>
        </ul>
        
   
   
    <h2>Text Section</h2> 
    <div class="sidebar_section_text">

	Faculty Report page </br> TO-DO: Help Info

    </div>         
    
    </div>             
    
    
    <div class="clear"></div>
    </div> <!--end of center_content-->

    <div class="footer">
CIMS
</div>


</div>

    	
</body>
</html>

