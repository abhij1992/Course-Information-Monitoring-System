
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
<<<<<<< HEAD
    <h2>Tables section</h2> 
                    
                    
<table id="rounded-corner">
    <thead>
    	<tr>
        	<th></th>
            <th>Product</th>
            <th>Details</th>
            <th>Price</th>
            <th>Date</th>
            <th>Category</th>
            <th>User</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</td>
        </tr>
    </tfoot>
    <tbody>
    	<tr class="odd">
        	<td><input type="checkbox" name="" /></td>
            <td>Box Software</td>
            <td>Lorem ipsum dolor sit amet consectetur</td>
            <td>45$</td>
            <td>10/04/2011</td>
            <td>web design</td>
            <td>Alex</td>
            <td><a href="#"><img src="images/edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#"><img src="images/trash.gif" alt="" title="" border="0" /></a></td>
        </tr>
    	<tr class="even">
        	<td><input type="checkbox" name="" /></td>
            <td>Trial Software</td>
            <td>Lorem ipsum dolor sit amet consectetur</td>
            <td>155$</td>
            <td>12/04/2011</td>
            <td>web design</td>
            <td>Carrina</td>
            <td><a href="#"><img src="images/edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#"><img src="images/trash.gif" alt="" title="" border="0" /></a></td>
        </tr>
    	<tr class="odd">
        	<td><input type="checkbox" name="" /></td>
            <td>Hosting Pack</td>
            <td>Lorem ipsum dolor sit amet consectetur</td>
            <td>45$</td>
            <td>10/04/2011</td>
            <td>web design</td>
            <td>Alex</td>
            <td><a href="#"><img src="images/edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#"><img src="images/trash.gif" alt="" title="" border="0" /></a></td
        </tr>
    	<tr class="even">
        	<td><input type="checkbox" name="" /></td>
            <td>Duo Software</td>
            <td>Lorem ipsum dolor sit amet consectetur</td>
            <td>745$</td>
            <td>10/04/2011</td>
            <td>web design</td>
            <td>Alex</td>
            <td><a href="#"><img src="images/edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#"><img src="images/trash.gif" alt="" title="" border="0" /></a></td
        </tr>
    	<tr class="odd">
        	<td><input type="checkbox" name="" /></td>
            <td>Alavasti Software</td>
            <td>Lorem ipsum dolor sit amet consectetur</td>
            <td>45$</td>
            <td>10/04/2011</td>
            <td>web design</td>
            <td>John</td>
            <td><a href="#"><img src="images/edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#"><img src="images/trash.gif" alt="" title="" border="0" /></a></td
        </tr>
    	<tr class="even">
        	<td><input type="checkbox" name="" /></td>
            <td>Box Software</td>
            <td>Lorem ipsum dolor sit amet consectetur</td>
            <td>45$</td>
            <td>10/04/2011</td>
            <td>web design</td>
            <td>Doe</td>
            <td><a href="#"><img src="images/edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#"><img src="images/trash.gif" alt="" title="" border="0" /></a></td
        </tr>
  
        
    </tbody>
</table>

	<div class="form_sub_buttons">
	<a href="#" class="button green">Edit selected</a>
    <a href="#" class="button red">Delete selected</a>
    </div>
    
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
        <p>RANDOM TEXT WE GENERATED
		</p>
		
    </div>

    <div id="tab3" class="tabcontent">
        <h3>Tab three title</h3>
        <p>
    RANDOM TEXT WE GENERATED tab3333333333333333
	</p>
    </div> 
    
    <div id="tab4" class="tabcontent">
        <h3>Tab four title</h3>
        <p>
    RANDOM TEXT WE GENERATED
	</p>
    </div> 
	<div id="tab5" class="tabcontent">
        <h3>Tab 5 title</h3>
        <p>
    RANDOM TEXT WE GENERATED asdasd
        </p>
    </div> 
	<div id="tab6" class="tabcontent">
        <h3>Tab 6 title</h3>
        <p>
		 tab 6 RANDOM TEXT WE GENERATED
        </p>
    </div> 
	
     
    

    
=======
>>>>>>> origin/master
        <div class="toogle_wrap">
            <div class="trigger"><a href="#">Toggle with text</a></div>

            <div class="toggle_container">
			<p>
<<<<<<< HEAD
				RANDOM TEXT WE GENERATED
=======
			 Welcome Faculty...TO-DO
>>>>>>> origin/master
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
<<<<<<< HEAD
RANDOM TEXT WE GENERATED
=======
	Faculty Report page </br> TO-DO: Help Info
>>>>>>> origin/master
    </div>         
    
    </div>             
    
    
    <div class="clear"></div>
    </div> <!--end of center_content-->
    
<<<<<<< HEAD

=======
    <div class="footer">
CIMS
</div>
>>>>>>> origin/master

</div>

    	
</body>
</html>

