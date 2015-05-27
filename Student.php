
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	
	if((!isset($_GET["sem"]))||(!isset($_GET["sec"])))
		header("location:index.php");
	$sem=$_GET["sem"];
	$sec=$_GET["sec"];
	include_once("./studentChart.php"); // includes file which takes sem and sec as input and displays overall completed chart
	include 'connection.php'; 
	//fetching main information
	if ($conn->connect_error) { //Check connection
		die("Connection failed: " . $conn->connect_error);
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
<script src="./Chart/Chart.js"></script>
<?php printPie("completed");?>
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
    <div class="title"><a href="index.php">Course Information Monitoring System</a></div>
    
    <div class="header_right">Welcome Student  </div>
    
    <div class="menu">
    <ul>
    <li><a href="Student.php?sem=<?php echo $sem."&sec=".$sec; ?>" class="selected">Main page</a></li>
    <li><a href="Student_subject.php?sem=<?php echo $sem."&sec=".$sec; ?>">Subject Information</a></li>
	<li><a href="Student_notification.php?sem=<?php echo $sem."&sec=".$sec; ?>" >Notifications</a></li>

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

      <!--  <?php echo "select sum(c.est_hrs) as est_hrs,sum(p.completed_hrs) as comp_hrs
from course_info c left join subject s on c.sub_code = s.subject_code
left join progress p on p.course_id=c.id and p.section=s.section
where c.is_heading = 0
and s.semester =".$sem."
and s.section = '".$sec."'";

?> -->
    <h2 align="center">OVER ALL PROGRESS: Progress chart for total number of classes taken for the whole semester</h2> 
    <div align="center">
	<h2 id="PieTitle"></h2>
	<canvas id="completed" width="400" height="400"></canvas>
	</div>
	
     </div>
     </div><!-- end of right content-->
                     
                    
    <div class="sidebar" id="sidebar">
    <h2>Subjects Taking</h2>
    <?php
	$sql = "SELECT * FROM subject where section='".$sec."' and semester = ".$sem;
	$result = $conn->query($sql);
	$no_of_subjects=0;
	echo "<ul>";
	while($row = $result->fetch_assoc())
	{
		echo "<li>".$row["subject_name"]."</li>";
		
	}
	echo "</ul>";
	?>
        
        
   
   
    <h2>Information</h2> 
    <div class="sidebar_section_text">

	This is your overall progress of all the classes conducted and how many classes are left. </br>

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

