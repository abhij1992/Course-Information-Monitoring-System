
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
		$subject_code_name_hash[$row["subject_code"]]=$row["subject_name"];
		$no_of_subjects++;
		
	}	
		
	//foreach($subject_code_name_hash as $k=>$v) echo " key=".$k." => ".$v; //Displays the Subject_code_name_hash
	
    //Code to store only unique subject code from the array subject_code which contains all the subjects taken by this faculty
    $unique_subject_code=array_unique($subject_code);	
	
	
	//Code to insert the notification if it was submitted by user
	if(isset($_POST['submit']) && $_POST['submit']=="Post Notification")
	  { 
	     if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['subject_code'])){
	     //got notification request, process it
		  $sql="INSERT INTO notification(heading,content,date,subject_code) VALUES('".$_POST['title']."','".$_POST['description']."',CURDATE(),'".$_POST['subject_code']."');";
		  $result=$conn->query($sql);
		  if(!$result) {echo "<h2>Error...Unable to post Notification...</h2>";}
		  }
	  }
	
	//Code to delete the notification requested by user
	if(isset($_POST['delete']) && $_POST['delete']=="Delete") 
	  { 
	    if(!empty($_POST['id'])){
	    //delete the notification,process it
		$sql="DELETE FROM notification WHERE id=".$_POST['id'].";";
		if(!($conn->query($sql))) {echo "<h2>Error...Unable to delete Notification...</h2>";}
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
    
    <div class="header_right">Welcome <?php echo $faculty_name."(".$faculty_code.")"; ?><a href="logout.php" class="logout">Logout</a> </div>
    
    <div class="menu">
    <ul>
    <li><a href="faculty.php" class="selected">Main page</a></li>
    <li><a href="#">Add Subject Content</a></li>
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
    <h2>Create new notification</h2> 
    <div class="form">
            
            <div class="form_row">
            <form action="" method="post" onsubmit=" return submitdata() ">
			<label>Title:</label>
            <input type="text" class="form_input" name="title" />
            </div>
            
            <div class="form_row">
            <label>Subject:</label>
            <select class="form_select" name="subject_code">
			<?php
			  foreach($unique_subject_code as $s)
			  { echo "<option>$s</option>"; }
			?>
            </select>
            </div>
            
             <div class="form_row">
            <label>Description:</label>
            <textarea class="form_textarea" name="description"></textarea>
            </div>
            <div class="form_row">
            <input type="submit" class="form_submit" name="submit" value="Post Notification" />
            </div> 
            <div class="clear"></div>
			</form>
        </div>                
                    


	
    <ul id="tabsmenu" class="tabsmenu">
	     <?php 
		    $i=1;
		    foreach($unique_subject_code as $s)
			{
			   if($i==1) echo "<li class=\"active\"><a href=\"#tab".$i."\">".$s."</a></li>";
			   else echo "<li><a href=\"#tab".$i."\">".$s."</a></li>";
			   echo "\n";
			   $i++;
			}
		 ?>
		<!--Static Example of tabs
        <li class="active"><a href="#tab1">Form Design Structure</a></li>
        <li><a href="#tab2">Tab two</a></li>
		-->
    </ul>
	
	<?php
	  $i=1;
	  foreach($unique_subject_code as $s)
	  {
	        echo "<div id=\"tab".$i."\" class=\"tabcontent\"> ";
			echo "<h2>".$subject_code_name_hash["$s"]."</h2>";
              $sql="SELECT * FROM notification WHERE subject_code='".$s."';";
			  $res=$conn->query($sql);
			  if($res->num_rows > 0)
			     {
				    echo "<ul class=\"lists\">";
				    while($row=$res->fetch_assoc())
					{
					  echo "<h3>".$row['heading']."</h3>";
					  echo "<li>".$row['date']."</li>";
					  echo "<li>".$row['content']."</li>";
					  echo "<form method=\"post\" action=\"\"  onsubmit=\" return submitdata()\" >\n<input type=\"hidden\" value=\"".$row['id']."\" name=\"id\"> \n<input class=\"form_submit\" name=\"delete\" type=\"submit\" value=\"Delete\" > \n</form>";
					  echo "\n";
					}
					echo "</ul>";
				 }
				 else {echo "<h3>No Notifications for this subject</h3>"; }
            echo "</div>";			
		$i++;	
	  }
	?>
    
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
    This Section allows you to Post notifications for each subject...</br></br></br>
	The notifications are grouped by Subject Code..</br></br></br>
	Click the Subject Code tab to access or delete the notifications posted so far.
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

