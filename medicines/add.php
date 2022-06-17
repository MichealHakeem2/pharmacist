<?php include '../shared/head.php';
include '../shared/nav.php';
include '../genral/env.php';
include '../genral/function.php';
$select= "SELECT * from `theem`";
$s = mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
$noc = $row['color'];
if(isset($_GET['cha'])){
    $num = $_GET['cha'];
    $update= "UPDATE `theem` SET color = $num";
    $u= mysqli_query($conn , $update);
    header('location: /pharmacist/medicines/add.php');
}
$name = '';
$update = false;

// if ($_SERVER ['REQUEST_METHOD']  == "POST") {

if(isset($_POST['send'])){
  $name = $_POST['name'];
$insert = "INSERT INTO `medicines` VALUES(null,'$name')";
$i = mysqli_query($conn , $insert);
testMessage($i, "Insert Medicines");
}
// }
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete= "DELETE from `medicines` where `id` = $id";
    $d= mysqli_query($conn , $delete);

}
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `medicines` where id = $id";
    $ss = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $update= "UPDATE `medicines` SET `name` = $name where `id` = $id";
    $u= mysqli_query($conn , $update);

}
}
?>
<?php if($noc == '1') : ?>
<a href="/pharmacist/medicines/add.php?cha=2" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/pharmacist/medicines/add.php?cha=1" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <div class="home">
        <?php if($update):?>
    <h1 class="display-1 text-center text-info">Update Medicines</h1>
    <?php else :?>
    <h1 class="display-1 text-center text-info">Add Medicines</h1>
    <?php endif; ?>
    </div>
    <section class="vh-100 bg-image w-800">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
	  <div class="container h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col-12 col-md-9 col-lg-7 col-xl-6">
			<div class="card" style="border-radius: 15px;">
			  <div class="card-body p-5">
				<h2 class="text-uppercase text-center mb-5">Create Medicines</h2>
				  <div class="form-outline mb-4">
            <form method="POST">
              <?php if ($update) : ?>
					<input type="text" id="form3Example1cg" name="name"  class="form-control form-control-lg" value="<?php echo $name ?>">
              <?php else :?>
					<input type="text" id="form3Example1cg" name="name"  class="form-control form-control-lg" placeholder="medicines">
          <?php endif ; ?>
				  <div class="d-flex justify-content-center">
                      <?php if($update):?>
					<button type="submit" name="update" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">Update Data</button>
					<?php else :?>
                    <button type="submit" name="send" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Send Data</button>
				 <?php endif; ?>
                </div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
  </section>
    <?php include '../shared/script.php'; ?>
