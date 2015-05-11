<?php
    include_once('./connection.php'); 
	//fetching main information
	if ($conn->connect_error) { //Check connection
		die("Connection failed: " . $conn->connect_error);
 	}
	function printPie($element)
	{
	$sem=$_GET["sem"];
	$section=$_GET["sec"];
	global $conn;
	$query="select sum(c.est_hrs) as estimated,sum(p.completed_hrs) as completed from course_info c left join subject
 	s on c.sub_code = s.subject_code left join progress p on p.course_id=c.id and p.section=s.section where 
	c.is_heading = 0 and s.semester =".$sem." and s.section = '".$section."' ";

	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	
	$estimated=$row["estimated"];
	$completed=$row["completed"];
	$remaining=intval($estimated)-intval($completed);
	$r=array("Remaining",$remaining,"#b7b3a3","#6b6964");
	$c=array("Completed",$completed,"#20b31c","#11720d");
    $values=array($r,$c);
	
	    echo " <script> var pieData = [ ";
		foreach($values as $k=>$v)
		{
			echo "{value: '".$v[1]."',label: '".$v[0]."',color: '".$v[2]."',highlight: '".$v[3]."'},";
		}
		echo "];";
		echo " window.onload = function(){
			   var context = document.getElementById('".$element."').getContext('2d');
			   var skillsChart = new Chart(context).Pie(pieData);
			   var title = document.getElementById('PieTitle');
			   title.innerHTML=\"Estimated hours: ".$estimated."      Completed: ".$completed."     Remaining: ".$remaining."\";
			   }
			  </script>"; 
	 }
	
?>