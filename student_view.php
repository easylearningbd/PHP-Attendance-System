
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
//  error_reporting(0);
 $stu = new Student();

$dt = $_GET['dt'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $attend = $_POST['attend'];
 
  $att_update = $stu->updateAttendance($dt, $attend);
} 
?>

<?php 
if(isset($att_update)){
	echo  $att_update;
}

?>


 
<div class='alert alert-danger' style="display:none"> <storng> Error! </storng> Sudent Roll Missing! </div>


<div class="panel panel-defaul">
	<div class="panel-heading">
		<h2> <a class="btn btn-success" href="add.php"> Add Student </a>
			<a class="btn btn-info pull-right" href="date_view.php"> Back </a>
		</h2>
	</div>

<div class="panel-body">

<div class="well text-center" style="font-size: 20px;">
<strong>Date: </strong> <?php  echo $dt;  ?> 
</div>


<form action="" method="Post">
<table class="table table-striped">
<tr>
<th>  Serial </th>
<th>  Student </th>
<th>  Student Roll </th>
<th>  Attendance  </th>
</tr>

 
<?php 
$get_student = $stu->getAlldata($dt);
if ($get_student){
  $i = 0;
  while ($value = $get_student->fetch_assoc()){
   $i++;



 ?>

 
 
<tr>
<td> <?php echo $i; ?> </td>
<td> <?php echo $value['name']; ?>  </td>
<td> <?php echo $value['roll']; ?> </td>

<td> <input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="present" <?php if 
($value['attend'] == "present") {echo "checked";} ?>>P
	 <input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="absent" <?php if 
($value['attend'] == "absent") {echo "checked";} ?>> A

</td>

</tr>

<?php   } 

}  ?> 


 

</table>

<input type="submit" class="btn btn-primary" name="submit" value="Update">


</form>
</div>




</div>



<?php include 'inc/footer.php' ?>




