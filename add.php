
<?php include 'inc/header.php';
      include 'lib/Student.php'; 
?>


<?php 
$stu = new Student();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $name = $_POST['name'];
  $roll = $_POST['roll'];

  $insertdata = $stu->insertStudent($name, $roll);
}  ?>


<?php 
if(isset($insertdata)){
	echo $insertdata;
}

?>



<div class="panel panel-defaul">
	<div class="panel-heading">
		<h2> <a class="btn btn-success" href="add.php"> Add Student </a>
			<a class="btn btn-info pull-right" href="index.php"> Back </a>
		</h2>
	</div>

<div class="panel-body">

 <form action="" method="Post">

<div class="from-grop">
	<label for="name"> Student Name </label>
	<input type="text" class="form-control" name="name" id="name" placeholder="Student Name">
	</div>

<div class="from-grop">
	<label for="roll"> Student Roll </label>
	<input type="text" class="form-control" name="roll" id="roll" placeholder="Student roll">
	</div>


<br> 

<div class="from-grop">
 <input type="submit" class="btn btn-primary" name="submit" value="Submit">

	</div>

 
 
</form>
</div>




</div>



<?php include 'inc/footer.php' ?>




