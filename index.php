
<?php include 'inc/header.php';
      include 'lib/Student.php'; 
   ?>


<script type="text/javascript">
	$(document).ready(function(){
  $("form").submit(function(){
  var roll = true;
  $(':radio').each(function(){
  name = $(this).attr('name');
  if(roll && !$(':radio[name="' + name + '"]:checked').length) {

  	$('.alert').show();
  	roll = false;
  }

  });
  return roll;

  });

	});

</script>




<?php 
 error_reporting(0);
 $stu = new Student();
 $cur_date = date("Y-m-d");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $attend = $_POST['attend'];
 
  $insertattend = $stu->insertAttendance($cur_date, $attend);
} 
?>

<?php 
if(isset($insertattend)){
	echo $insertattend;
}

?>


 
<div class='alert alert-danger' style="display:none"> <storng> Error! </storng> Sudent Roll Missing! </div>


<div class="panel panel-defaul">
	<div class="panel-heading">
		<h2> <a class="btn btn-success" href="add.php"> Add Student </a>
			<a class="btn btn-info pull-right" href="date_view.php"> View All </a>
		</h2>
	</div>

<div class="panel-body">

<div class="well text-center" style="font-size: 20px;">
<strong>Date: </strong> <?php  echo $cur_date;  ?> 
</div>


<form action="" method="Post">
<table class="table table-striped">
<tr>
<th>  Serial </th>
<th>  Student </th>
<th>  Student Roll </th>
<th>  Attendance  </th>
<th>  Action </th>
</tr>

 
<?php 
$get_student = $stu->getStudents();
if ($get_student){
  $i = 0;
  while ($value = $get_student->fetch_assoc()){
   $i++;



 ?>

 
 
<tr>
<td> <?php echo $i; ?> </td>
<td> <?php echo $value['name']; ?>  </td>
<td> <?php echo $value['roll']; ?> </td>

<td> <input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="present"> P
	 <input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="absent"> A

</td>

<td>  <input type="submit" class="btn btn-danger" name="delete" value="Delete">

</td>


</tr>

<?php   } 

}  ?> 


 

</table>

<input type="submit" class="btn btn-primary" name="submit" value="Submit">


</form>
</div>




</div>



<?php include 'inc/footer.php' ?>




