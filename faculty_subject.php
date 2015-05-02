
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	if(!isset($_SESSION["unames"]))
		header("location:index.php");
	include 'connection.php'; 
	include_once("./completedChart.php"); // includes file which takes subject code and sec as input and displays completed chart
	//fetching main information
	if ($conn->connect_error) { //Check connection
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT id,name FROM faculty where uname='".$_SESSION["unames"]."' ";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$faculty_id=$row["id"];
	$faculty_name=$row["name"];
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
	$subjectid=$_GET["subject_id"];	
	$subjectcode1=$_GET["subject_code"];
	$subjectsec1=$_GET["section_sel"];
	
	
	
	//TO ADD Hour
	if(isset($_GET["to_add_id"]))
	{
		$course_id_edit=$_GET["to_add_id"];	
		$sql="select * from progress where progress.course_id=".$course_id_edit." and progress.section='".$subjectsec1."' and progress.subject_code='".$subjectcode1."'";
		$result = $conn->query($sql);
		if ($result->num_rows == 0)
		{	//insert new value
			$sql="insert into progress values (null,1,0,'".$subjectcode1."','".$subjectsec1."',".$course_id_edit.")";
			$conn->query($sql);
		}
		else{
			//update with new value
			$row = $result->fetch_assoc();
			$new_comp_hrs=$row["completed_hrs"]+1;
			$sql="update progress set completed_hrs=".$new_comp_hrs." 
where progress.course_id=".$course_id_edit." 
and progress.section='".$subjectsec1."' 
and progress.subject_code='".$subjectcode1."'";
			$conn->query($sql);
		}
	}
	//END OF TO ADD HOUR
	
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
    <div class="center_content">  
 
    <div id="right_wrap">
    <div id="right_content">      
    <div align="center">
	<h2 id="PieTitle"></h2>
	<canvas id="completed" width="200" height="200"></canvas>
	</div>	
<?php
	for($i=0;$i<$no_of_subjects;$i++)
	{
		if($subject_id[$i]==$subjectid)
		{
			$arrid=$i;
		}
	}
?>	
    <h2><?php echo $subject_name[$arrid]." (".$subject_code[$arrid].") - Section : ".$subject_section[$arrid];?></h2> 
                    
                    
<table id="rounded-corner">
    <thead>
    	<tr>
            <th>Chapter</th>
            <th>Unit</th>
            <th>Title</th>
            <th>Estimated Hours</th>
            <th>Completed Hours</th>
            <th>Add Hour</th>
            <th>Completed</th>
            
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="12" align="center"><?php 
								//fetching total hours
								/*$sql = "select sum(estimated_hrs) as total_hrs, sum(completed_hrs) as completed_hr from progress where subject_id ='".$subjectid."' ;";
								$result = $conn->query($sql);
								$row = $result->fetch_assoc();
								echo "Total Estimated Hours = ".$row["total_hrs"]."  Total Completed Hours = ".$row["completed_hr"];*/
			?></td>
        </tr>
    </tfoot>
    <tbody>
	<?php
	
	echo '<form action="" method="GET">';											
	echo '<input type=hidden name="subject_id" value="'.$subjectid.'">';				//setting hidden data of subject id and section and code
	echo '<input type=hidden name="subject_code" value="'.$subjectcode1.'">';
	echo '<input type=hidden name="section_sel" value="'.$subjectsec1.'">';
																						//fetching course information data
	$sql="select c.id,c.chap_no,c.unit_no,c.`text`,c.est_hrs,c.is_heading,p.completed_hrs,p.is_complete from course_info c left join subject s on c.sub_code = s.subject_code
left join progress p on p.course_id=c.id and p.section=s.section
where s.subject_code='".$subjectcode1."' 
and s.section='".$subjectsec1."' ORDER BY c.chap_no,c.unit_no";

	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc())
	{
		if($row["is_heading"]==1)
			echo '<tr class="odd">';
		else
			echo '<tr class="even">';
		echo '<td>'.$row["chap_no"].'</td>';
		echo '<td>'.$row["unit_no"].'</td>';
		echo '<td>'.$row["text"].'</td>';
		echo '<td>'.$row["est_hrs"].'</td>';
		echo '<td>'.$row["completed_hrs"].'</td>';
		if($row["is_heading"]==1)
			echo '<td></td>';
		else
			echo '<td><button name="to_add_id" value="'.$row["id"].'" type="submit">Add hour</button></td>';
		//echo '<td><input type=submit value="Add Hour" name="add'.$row["id"].'" </td>';
		echo '<td><input type="checkbox" name="completed'.$row["id"].'" ';
		if($row["is_complete"]==1)
			echo "checked";
		echo '/></td>';
		
		
		echo '</tr>';
		
	}
	echo '</form>';
	?>
	
    	       
    </tbody>
</table>



    
        <div class="toogle_wrap">
            <div class="trigger"><a href="#">Toggle with text</a></div>

            <div class="toggle_container">
			<p>
        Lorem ipsum <a href="#">dolor sit amet</a>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum <a href="#">dolor sit amet</a>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			</p>
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
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
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

