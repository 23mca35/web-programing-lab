<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<style>
		body{
			background-color: steelblue;
		}
		#container{
			background: ghostwhite;
			margin-top: 20px;
			margin:auto;
			border:solid black 4px;
			border-radius: 10px;
			height:auto;
			width:500px;

		}
		label{
			margin-left: 20px;
			font-weight:bold ;
			font-size: 15px;
			display: block;
		}
     input{
     	margin-left: 20px;
     	margin-top: 10px;
     	width:90%;
     	height:10%;
     	border-radius: 5px;
     }
	</style>
</head>
<body>
<div id="container">
	<center><h2>Mark Entry Form</center></h2>
	<div id="sub">
<form method="post" name="form1" onsubmit="return validate()">
	<label>Enter the Admission No:</label>
		<input type="text" name="t1" id="t1" required><br><br>
	<label>Enter the Name of Student:</label>
		<input type="text" name="t2" id="t2" required><br><br>
	<label>Enter the Class:</label>
	    <input type="text" name="t3" id="t3" required><br><br>
	<label>Enter the Mark1:</label>
		<input type="text" name="t4" id="t4" required><br><br>
	<label>Enter the Mark2:</label>
		<input type="text" name="t5" id="t5" required><br><br>
	<label>Enter the Mark3:</label>
		<input type="text" name="t6" id="t6" required><br><br>
	<label>Enter the mark4</label>
		<input type="text" name="t7" id="t7" required><br><br>
	<center><button type="submit" name="submit" value="submit">Submit</button></center><br><br>
</form>
<script>
	function validate(){
		var name=document.forms['form1']['t2'].value;
		var cl=document.forms['form1']['t3'].value;
		let regex=/^[a-zA-z]+$/
		if(regex.test(name)==false){
			alert("Name should only contain letters");
			return false;
		}
		if(regex.test(cl)==false){
			alert("Class should only contain letters");
			return false;
		}
	}
</script>
<?php
if(isset($_POST['submit'])){
	$admno=$_POST['t1'];
	$name=$_POST['t2'];
	$class=$_POST['t3'];
	$mark1=$_POST['t4'];
	$mark2=$_POST['t5'];
	$mark3=$_POST['t6'];
	$mark4=$_POST['t7'];
	$conn=mysqli_connect("localhost","root","","exam");
	if($conn){
		//echo" connected Successfully<br>";
	}else{
		echo"Connection is unsuccesfull<br>";}
   $sql="insert into mark values($admno,'$name','$class',$mark1,$mark2,$mark3,$mark4)";
   if(mysqli_query($conn,$sql)){
   	//echo "Inserted Successfully";
   }else{
   	echo"Insertion Failed<br>";
   }
   echo"<center>";
   echo"<b><h3>Inserted Data</b></h3>";
   echo"<br>Admission No:".$admno.'<br>';
   echo"<br>Name:".$name.'<br>';
   echo"<br>Class:".$class.'<br>';
   echo"<br>Mark1:".$mark1.'<br>';
   echo"<br>Mark2:".$mark2.'<br>';
   echo"<br>Mark3:".$mark3.'<br>';
   echo"<br>Mark4:".$mark4.'<br>';
   echo"</center><br><br>";
   mysqli_close($conn);
}

?>
</div>
</body>
</html>