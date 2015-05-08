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

	include_once("./semHODReport.php"); //Include the file which prints progress of each sem
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
<?php printPie();?>
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
	    <h2>Semester-wise Course Completion Statistics</h2></br></br>
		<div>
		<table cellspacing="50">
		  <tr><td><p id="chart0Title"></p></td><td><canvas id="chart0"  width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart1Title"></p></td><td><canvas id="chart1" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart2Title"></p></td><td><canvas id="chart2" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart3Title"></p></td><td><canvas id="chart3" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart4Title"></p></td><td><canvas id="chart4" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart5Title"></p></td><td><canvas id="chart5" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart6Title"></p></td><td><canvas id="chart6" width="300" height="300""></canvas></td></tr>
		   <tr><td><p id="chart7Title"></p></td><td><canvas id="chart7" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart8Title"></p></td><td><canvas id="chart8" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart9Title"></p></td><td><canvas id="chart9" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart10Title"></p></td><td><canvas id="chart10" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart11Title"></p></td><td><canvas id="chart11" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart12Title"></p></td><td><canvas id="chart12" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart13Title"></p></td><td><canvas id="chart13" width="300" height="300"></canvas></td></tr>
		   <tr><td><p id="chart14Title"></p></td><td><canvas id="chart14" width="300" height="300"></canvas></td></tr>
		</table>
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
    TO-DO
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

