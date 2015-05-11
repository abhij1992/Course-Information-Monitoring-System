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
	
	include 'connection.php'; 
	//fetching main information
	if ($conn->connect_error) { //Check connection
		die("Connection failed: " . $conn->connect_error);
	}
	
	//code to put all faculty and their details in a hash
	$sql="SELECT  * from faculty WHERE `isAdmin`=0;";
	$res=$conn->query($sql);
	if($res->num_rows > 0)
	{
	   while($row=$res->fetch_assoc())
	   {
	      $faculty[$row["uname"]]=$row["name"];
	   }
	}
	
	//check if request to display faculty info is requested and process it
	if(isset($_POST["faculty"])){
	  $sql="select name,email,address,phone_no from faculty where `name`='".$_POST["faculty"]."';";
	  if($res=$conn->query($sql)){
	  $row=$res->fetch_assoc();
	  $faculty_name=$row["name"];
	  $faculty_phone=$row["phone_no"];
	  $faculty_email=$row["email"];
	  $faculty_address=$row["address"];
	  }else{
	   echo "Failed to load faculty data";
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
	<li><a href="faculty_report.php" >Faculty Report</a></li>
    </ul>
    </div>
    
    </div>
              
    <div class="center_content">  
 
    <div id="right_wrap">
    <div id="right_content">             
	    <h2>Faculty Report</h2>
		 <div class="form">
            
            <div class="form_row">
            <form action="" method="post" name="faculty" >
			<label>Faculty:</label>
            <select class="form_select" name="faculty">
			<?php
			  foreach($faculty as $k=>$v)
			  { echo "<option>".$v."</option>"; }
			?>
            </select>
            </div>
          
            <div class="form_row">
            <input type="submit" class="form_submit" name="submitFaculty" value="Generate Report" />
            </div> 
            <div class="clear"></div>
			</form>
            </div>
		<?php if(!empty($faculty_name)){
		      echo "<h2 align=center>".$faculty_name."</h2>";		  
		?>
		   <table id="rounded-corner">
		   <thead>
    	   <tr><th>Name</th><th>Phone No</th><th>E-mail</th><th>Address</th></tr>
		   </thead>
		   <tfoot>
    	  <tr>
        	<td colspan="4">Faculty info</td>
          </tr>
          </tfoot>
		  <tbody><tr>
		  <?php 
		     echo "<td>".$faculty_name."</td><td>".$faculty_phone."</td><td>".$faculty_email."</td><td>".$faculty_address."</td>";
		  ?>
		  </tr></tbody>
		   </table>
		<?php }?>
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
    Faculty information and progress report.
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

