
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	if(!isset($_SESSION["unames"]))
		header("location:index.php");
	include 'connection.php'; 
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
    <li><a href="#">Add Subject Content</a></li>
    <li><a href="faculty_notification.php">Notification</a></li>

    </ul>
    </div>
    
    </div>              
    <div class="center_content">  
 
    <div id="right_wrap">
    <div id="right_content">        
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


    <ul id="tabsmenu" class="tabsmenu">
        <li class="active"><a href="#tab1">Form Design Structure</a></li>
        <li><a href="#tab2">Tab two</a></li>
        <li><a href="#tab3">Tab three</a></li>
        <li><a href="#tab4">Tab four</a></li>
		<li><a href="#tab5">subject 5</a></li>
		<li><a href="#tab6">subject 6</a></li>
    </ul>
    <div id="tab1" class="tabcontent">
        <h3>Tab one title</h3>
        <div class="form">
            
            <div class="form_row">
            <label>Name:</label>
            <input type="text" class="form_input" name="" />
            </div>
             
            <div class="form_row">
            <label>Email:</label>
            <input type="text" class="form_input" name="" />
            </div>
            
            <div class="form_row">
            <label>Subject:</label>
            <select class="form_select" name="">
            <option>Select one</option>
            </select>
            </div>
            
             <div class="form_row">
            <label>Message:</label>
            <textarea class="form_textarea" name=""></textarea>
            </div>
            <div class="form_row">
            <input type="submit" class="form_submit" value="Submit" />
            </div> 
            <div class="clear"></div>
        </div>
    </div>
    <div id="tab2" class="tabcontent">
        <h3>Tab two title</h3>
        <ul class="lists">
        <li>Consectetur adipisicing elit  error sit voluptatem accusantium doloremqu sed</li>
        <li>Sed do eiusmod tempor incididunt</li>
        <li>Ut enim ad minim veniam is iste natus error sit</li>
        <li>Consectetur adipisicing elit sed</li>
        <li>Sed do eiusmod tempor  error sit voluptatem accus antium dolor emqu incididunt</li>
        <li>Ut enim ad minim veniam</li>
        <li>Consectetur adipisi  error sit voluptatem accusantium doloremqu cing elit sed</li>
        <li>Sed do eiusmod tempor in is iste natus error sit cididunt</li>
        <li>Ut enim ad minim ve is iste natus error sitniam</li>
        </ul>
    </div>

    <div id="tab3" class="tabcontent">
        <h3>Tab three title</h3>
        <p>
    Lorem ipsum <a href="#">dolor sit amet</a>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. <br /><br />Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
        </p>
    </div> 
    
    <div id="tab4" class="tabcontent">
        <h3>Tab four title</h3>
        <p>
    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, ad <br /><br />Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
        </p>
    </div> 
	<div id="tab5" class="tabcontent">
        <h3>Tab four title</h3>
        <p>
    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, ad <br /><br />Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
        </p>
    </div> 
	<div id="tab6" class="tabcontent">
        <h3>Tab four title</h3>
        <p>
    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, ad <br /><br />Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
        </p>
    </div> 
	
     
    

    
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

