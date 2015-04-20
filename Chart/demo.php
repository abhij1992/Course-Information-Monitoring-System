<?php
$value=array("Java"=>20,"ADA"=>20,"CNS"=>50,"WEB"=>10);// Hash of key value pairs
?>
<html>
<head>
<script src="./Chart.js"></script>
<script>
var pieData = [
<?php

#the below code generates dynamic dataset from given HASH
foreach($value as $k=>$v)
 {
    $color = substr(md5(rand()), 0, 6);
    echo "{value: $v,label: '$k',color: '#$color'},";
 }
?>
];
/*// Example Static Dataset
var pieData = [
   {
      value: 25,
      label: 'Java',
      color: '#811BD6'
   },
   {
      value: 10,
      label: 'Scala',
      color: '#9CBABA'
   },
   {
      value: 30,
      label: 'PHP',
      color: '#D18177'
   },
   {
      value : 35,
      label: 'HTML',
      color: '#6AE128'
   }
];*/

window.onload = function(){
var context = document.getElementById('skills').getContext('2d');
var skillsChart = new Chart(context).Pie(pieData);
}
</script>
</head>
<body>
<canvas id="skills" width="300" height="300"></canvas>
</body>
</html>