<?php
    include_once('./connection.php'); 
	//fetching main information
	if ($conn->connect_error) { //Check connection
		die("Connection failed: " . $conn->connect_error);
 	}
	function printPie()
	{
	global $conn;
	$query="select s.semester as semester,sum(c.est_hrs) as estimated,sum(p.completed_hrs) as completed
	from course_info c left join subject s on c.sub_code = s.subject_code
	left join progress p on p.course_id=c.id and p.section=s.section
	where c.is_heading = 0
	group by s.semester;";

	$result = $conn->query($query);
	$index=0;
	while($row = $result->fetch_assoc())
	{
	    $sem=$row["semester"];
	    $estimated=$row["estimated"];
		$completed=$row["completed"];
		$remaining=intval($estimated)-intval($completed);
		$r=array("Remaining",$remaining,"#b7b3a3","#6b6964",$sem);
		$c=array("Completed",$completed,"#20b31c","#11720d",$sem);
		$values[$index++]=array($r,$c);
	}
	    echo "<script>";
	    for($i=0;$i<$index;$i++)
		{
	    echo "  var pieData".$i." = [ ";
		  foreach($values[$i] as $k=>$v)
		   {
			echo "{value: '".$v[1]."',label: '".$v[0]."',color: '".$v[2]."',highlight: '".$v[3]."'},";
		   }
	    echo "];";
	    }
		echo " window.onload = function(){";
		for($i=0;$i<$index;$i++)
		{ 
		       $sem=$values[$i];
			   $sem=$sem[0];
			   $sem=$sem[4];
			   echo "var context".$i." = document.getElementById('chart".$i."').getContext('2d');";
			   echo "var Chart".$i." = new Chart(context".$i.").Pie(pieData".$i.");";
			   echo "var title".$i." = document.getElementById('chart".$i."Title');";
			   echo "title".$i.".innerHTML=\"Semester ".$sem."\";";
	    }
		echo "}</script>";
	 }
	
?>