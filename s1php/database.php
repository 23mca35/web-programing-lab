<?php
 $con=mysqli_connect("localhost","root","","college");
 $sql_insert="insert into student values('989','anu','BCA')";
 if(mysqli_query($con,$sql_insert))
 {
 	echo "New row is inserted";
 }
 $sqll = "select * from student";

$result = mysqli_query($con, $sqll);

if (mysqli_num_rows($result) > 0) {

// output data of each row
echo "<table border=\"1\"><tr><th>Roll no</th><th>Name</th><th>Course</th></tr>";

while($row = mysqli_fetch_assoc($result)) {

echo "<tr><td> " . $row["rollno"]."</td>";
echo "<td>" . $row["name"]."</td>";
echo "<td>".$row["course"]."</td></tr>";
echo "<br>";
}

} else {

echo "No records found";

}

 mysqli_close($con);

?>