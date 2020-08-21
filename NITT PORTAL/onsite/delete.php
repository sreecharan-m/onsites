<?php

$status = '';
$id = $_GET['id'];
$conn=mysqli_connect('localhost','shaun','test1234','onsite');

$sql = "DELETE FROM users WHERE id='$id'";

 if($conn->query($sql) === TRUE) {
  
   $status = "Record deleted successfully";

} else {
  
   $status = "Deletion Failed";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete NITT</title>
</head>

<body>

         <h1><?php echo $status ?></h1>

</body>

</html>