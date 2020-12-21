<!DOCTYPE html>
<html>
<head>
	<!DOCTYPE html>
<html>
	<head>
		<title>Library Management System</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	
</html>
	<title></title>
</head>
<body>
	<?php
	error_reporting(E_ERROR);
	session_start();
	$user = $_SESSION['user_id'];

     ?>
	<nav class="navbar navbar-inverse">
	<div class = "conatiner-fluid">
		<div class ="navbar-header">
			<a class="navbar-brand"
			 href="/">Library Management System</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php">Login</a></li>
				<li><a href="signup.php">Signup</a></li>
				<li><a href="login.php">Logout</a></li>
				
			</ul>
			
		</div>
	</div>
</nav>
<div style="margin-left:45%;margin-right:35%;color:grey">
<?php

echo "WELCOME ".$user ;

?>
</div>
<br>
<br>

<div class="container">
	<div class="row">
<h3 style="text-underline-position:2px; color: green; text-align: center;">
	Search For Book
</h3>
	
 <div style="width:30%;margin:0 auto;">
 	<form role="form" id="templatemo-preferences-form" name="Search" action="" method="post">
 	<div class = "form-group">
	<p>Book Title: </p>
		<input class="form-control" type="text" name="bname" placehoder="HarryPotter">
	</div>
	<button class="btn btn-lg btn-primary btn-block" type="submit"  name="search_book" value="search_book">
	 	Search
	</button>



 	</form>

	</div>	
	</div>
	
</div>



<?php

// Create connection
$conn = mysqli_connect("localhost:8080","", "","lbrary_management");

if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                       
        



if($_SERVER["REQUEST_METHOD"]=="POST"){

$Booktitle = $_POST['bname'];
$sql = "select * from `book` where book_name LIKE '%$Booktitle%' AND status = 0" ;

$result = mysqli_query($conn, $sql);
?>
<table border="1" class="table" style="margin-top: 3em">
<tr class="danger">

<th>Name of the book</th>
<th>Book_ID</th>
<th>Author Name</th>

</tr>


<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr class="info">

<td><?php echo $row['book_name']; ?></td>

<td><?php echo $row['book_id']; ?></td>

<td><?php echo $row['author_name']; ?></td>

</tr>

<?php

}?>
	



</table><?php } ?>

<div class="container">
	<div class="row">
<h3 style="text-underline-position:2px; color: green; text-align: center;">
	Reserve The Book
</h3>
<div style="width:30%;margin:0 auto;">
 	<form role="form" id="templatemo-preferences-form" name="Reserve" action="" method="post">
 	<div class = "form-group">
	<p>Book Title: </p>
		<input class="form-control" type="text" name="rBook" placehoder="HarryPotter">
	</div>
	<button class="btn btn-lg btn-primary btn-block" type="submit"  name="reserve_book" value="reserve_book">
	 	Reserve
	</button>


</div>
</div>

<?php

// Create connection
$conn = mysqli_connect("localhost","root", "apple@123","lbrary_management");

if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                       
        



if(isset($_POST['rBook'])){

$Booktitle = $_POST['rBook'];
$sql = "Update `book` SET status ='1' where book_name='$Booktitle'";

$result = mysqli_query($conn, $sql);

}
?>







</body>
</html>