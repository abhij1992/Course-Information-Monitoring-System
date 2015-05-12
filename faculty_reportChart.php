<?php
    include_once('./connection.php'); 
	//fetching main information
	if ($conn->connect_error) { //Check connection
		die("Connection failed: " . $conn->connect_error);
 	}
	
	function printPie($element,$faculty_id)
	{
	global $conn;
	$sql="select s.subject_name as subject,sum(p.completed_hrs) as completed
	from course_info c left join subject s on c.sub_code = s.subject_code
	left join progress p on p.course_id=c.id and p.section=s.section
	where c.is_heading = 0
	and s.faculty_id = ".$faculty_id."
	group by s.subject_name;";
	
	$result = $conn->query($sql);
	$index=0;
	while($row = $result->fetch_assoc())
	{
	  $subject=$row["subject"];
	  $completed=$row["completed"];
	  $color = substr(md5(rand()), 0, 6);
	  $highlight=substr(md5(rand()), 0, 6);
	  $c=array($subject,$completed,"#".$color,"#".$highlight);
	  $values[$index++]=array($c);
	}
	 echo "<script>";
	 echo "  var pieData = [ ";
	    for($i=0;$i<$index;$i++)
		{   
		   foreach($values[$i] as $k=>$v){
		   echo "{value: '".$v[1]."',label: '".$v[0]."',color: '".$v[2]."',highlight: '".$v[3]."'},";
		   }
		}
	 echo "];";
	 echo " window.onload = function(){
			   var context = document.getElementById('".$element."').getContext('2d');
			   var skillsChart = new Chart(context).Pie(pieData);
			   }";
	 echo "</script>";
	
	}
	 
	
?>