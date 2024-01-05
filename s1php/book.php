<!DOCTYPE html>
<html>
<head>
<style >
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

#container {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

form {
    text-align: left;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    box-sizing: border-box;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

h1 {
    color: #333;
}

center {
    margin-bottom: 20px;
}
</style>
</head>
<body>
<center><h1>Library Managment</h1></center>
<div id="container">
<form method="post" action="">
<label for="t1">Enter the Book ID:</label>
   <input type="text" id="t1" name="t1" ><br><br>
<label for="t2">Enter the Title:</label>
   <input type="text" id="t2" name="t2" ><br><br>
<label for="t3">Enter the Name of Author:</label>
   <input type="text" id="t3"  name="t3"><br><br>
<label for="t4">Enter the Book Edition:</label>
   <input type="text" id="t4" name="t4"><br><br>
<label for="t5">Enter the Publisher:</label>
   <input type="text" id="t5" name="t5"><br><br>
 <button value="submit" name="submit">Submit</button><br>
<label for="t6">Enter the Author to Search :</label>
   <input type="text" id="t6" name="t6" ><br><br>
 <button value="submit" name="search">Submit</button>
</form>
</div>
</body>
</html>
<?php

if(isset($_POST['submit']))
{
$id=$_POST['t1'];
$title=$_POST['t2'];
$author=$_POST['t3'];
$edition=$_POST['t4'];
$publisher=$_POST['t5'];
$con=mysqli_connect("localhost","root","","college");
 $sql_insert="insert into book values($id,'$title','$author','$edition','$publisher')";
 if(mysqli_query($con,$sql_insert))
 {
 	echo "New row is inserted";
 }

 mysqli_close($con);
}
if(isset($_POST['search'])){
    $aut=$_POST['t6'];
    $con=mysqli_connect("localhost","root","","college");
    $sqll = "select * from book where author='$aut'";

$result = mysqli_query($con, $sqll);

if (mysqli_num_rows($result) > 0) {

// output data of each row
echo "<center><table border=\"1\"><tr><th>ID</th><th>Title</th><th>Author</th><th>Edition</th><th>Publisher</th></tr>";

while($row = mysqli_fetch_assoc($result)) {

echo "<tr><td> " . $row["id"]."</td>";
echo "<td>" . $row["title"]."</td>";
echo "<td>".$row["author"]."</td>";
echo "<td>" . $row["edition"]."</td>";
echo "<td>" . $row["publisher"]."</td></tr>";
echo "<br>";
}
echo "</table></center>";
} else {

echo "No records found";

}

 mysqli_close($con);
}
?>