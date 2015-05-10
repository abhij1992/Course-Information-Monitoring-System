
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	
	if((!isset($_GET["sem"]))||(!isset($_GET["sec"])))
		header("location:index.php");
	$sem=$_GET["sem"];
	$sec=$_GET["sec"];
	
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

    <h2>Progress</h2> 
        <ul id="tabsmenu" class="tabsmenu">
	     <?php
			$i=1;
			$sql="SELECT * 
				  FROM subject s 
				  where s.section='".$sec."' and s.semester =".$sem;
			$res=$conn->query($sql);
			if($res->num_rows > 0)
			{
				while($row=$res->fetch_assoc())
				{
					$unique_subject_code[$i++]=$row['subject_code'];
					$subject_code_name_hash[$row['subject_code']]=$row['subject_name'];
				}
				$i=1;
				foreach($unique_subject_code as $s)
				{
				   if($i==1) echo "<li class=\"active\"><a href=\"#tab".$i."\">".$subject_code_name_hash[$s]."</a></li>";
				   else echo "<li><a href=\"#tab".$i."\">".$subject_code_name_hash[$s]."</a></li>";
				   echo "\n";
				   $i++;
				}
			
			
		echo "</ul>";
				
				  $i=1;
				  foreach($unique_subject_code as $s)
				  {
						echo "<div id=\"tab".$i."\" class=\"tabcontent\"> ";
						?>
							<table id="rounded-corner">
								<thead>
									<tr>
										<th>Chapter</th>
										<th>Unit</th>
										<th>Title</th>
										<th>Estimated Hours</th>
										<th>Completed Hours</th>
									
										
									</tr>
								</thead>
									<tfoot>
									<tr>
										<td colspan="12" align="center"></td>
									</tr>
								</tfoot>
								<tbody>
						<?php
						
						
													  $sql="select c.id,c.chap_no,c.unit_no,c.`text`,c.est_hrs,c.is_heading,p.completed_hrs,p.is_complete from course_info c left join subject s on c.sub_code = s.subject_code
							left join progress p on p.course_id=c.id and p.section=s.section
							where s.subject_code='".$s."' 
							and s.section='".$sec."' ORDER BY c.chap_no,c.unit_no";

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
									
									
									echo '</tr>';
									
								}
							
							echo "</table>";
						
						
						
						echo "</div>";			
					$i++;	
				  }
			}
				?>
                



	
    

    

      
      
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
        
        
   
   
    <h2>Text Section</h2> 
    <div class="sidebar_section_text">

	Faculty Report page </br>

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

