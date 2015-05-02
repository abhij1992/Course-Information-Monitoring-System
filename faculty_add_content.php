
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

$(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="form_input" id="field' + next + '" name="field' + next + '" type="text">';
        var newInput = $(newIn);
        var removeBtn = ' <button id="remove' + (next - 1) + '" class="remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
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
    <h2>Add Subject</h2> 
                    
                    

    <?php
	if(!isset($_GET["subject_content"])){
	?>
	 <div id="tab1" class="tabcontent">
    
        <div class="form">
            <form action="">
			
				<div class="form_row">
				<label>Subject:</label>
				<select type="text" class="form_input" name="subject_content" >
					<?php
						for($i=0;$i<$no_of_subjects;$i++)
						{
							echo '<option value="'.$subject_id[$i].'" >'.$subject_name[$i].' - '.$subject_section[$i].'</option>';
						}
					?>
				</select>	
				</div> 
				<br><br>
				<div class="form_row">
				<label>No of Units :</label>
				<select type="text" class="form_input" name="unit_nos" >
					<?php
						for($i=0;$i<15;$i++)
						{
							echo '<option value="'.$i.'" >'.$i.'</option>';
						}
					?>
				</select>	
				</div> 
				<br><br>
				<div class="form_row">
				<input type="submit" class="form_submit" value="Submit" />
				
				</div>
			</form>
            <br><br><br><br>
			
		</div>
	</div>
	
	<?php
	}
	else{
	?>
    
    <div id="tab1" class="tabcontent">
    
        <div class="form">
            
            <div class="form_row">
            <label>Chapter Title:</label>
            <input type="text" class="form_input" name="" />
            </div>
            
			<div class="form_row">
            <label>Unit Title:</label>
            </div>
            <div class="form_row">
            <div class="container">
				<div class="row">
					<input type="hidden" name="count" value="1" />
					<div class="control-group" id="fields">
						<div class="controls" id="profs"> 
							<form class="input-append">
								<div id="field"><input autocomplete="off" class="form_input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/> <button id="b1" class="add-more" type="button">+</button></div>
							</form>
						<br>
						<small>Press + to add another form field :)</small>
						</div>
					</div>
				</div>
</div>
            </div>
            <div class="form_row">
            <input type="submit" class="form_submit" value="Submit" />
            </div> 
            <div class="clear"></div>
        </div>
    </div>
    <?php
	}
	?>
	
     
    

    
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

