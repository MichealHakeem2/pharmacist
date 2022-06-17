<?php include '../shared/head.php';
include '../shared/nav.php';
include '../genral/env.php';
$select= "SELECT * from `theem`";
$s= mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
$noc = $row['color'];
if(isset($_GET['cha'])){
    $num = $_GET['cha'];
    $update= "UPDATE `theem` SET color = $num";
    $u= mysqli_query($conn , $update);
    header('location: /pharmacist/patients/list.php');
}
$select= "SELECT patients.id as EmpID, patients.name as EmpName, patients.email as EmpEmail, patients.password as Emppassword FROM `patients`";
$s= mysqli_query($conn , $select);
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete= "DELETE from `patients` where `id` = $id";
  $d= mysqli_query($conn , $delete);

}
if (isset($_GET['edit'])) {
  $update = true;
  $id = $_GET['edit'];
  $select = "SELECT * from `patients` where id = $id";
  $ss = mysqli_query($conn,$select);
  $row = mysqli_fetch_assoc($ss);
  $name = $row['name'];
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $update= "UPDATE `patients` SET `name` = $name where `id` = $id";
  $u= mysqli_query($conn , $update);

}
}
?>
<?php if($noc == '1') : ?>
<a href="/pharmacist/patients/list.php?cha=2" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/pharmacist/patients/list.php?cha=1" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <div class="home">
        <h1 class="display-1 text-center text-info">Patients List</h1>
    </div>
    <div class="container">
   <div class="card">
     <div class="card-body">
     <table class="table table-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>email</th>
        <th>Password</th>
        <th columespan="2">action</th>
      </tr>
      <?php foreach($s as $data){?>
      <tr>
        <td> <?php echo $data['EmpID'] ?> </td>
        <td> <?php echo $data['EmpName'] ?> </td>
        <td> <?php echo $data['EmpEmail'] ?> </td>
        <td> <?php echo $data['Emppassword'] ?> </td>
        <td><a onclick="return confirm('Are You Sure ? ')" name="delete" href="/list.php?delete=<?php echo $data['EmpID']?>" class="btn btn-danger">Delete</a></td><br>
        <td><a  name="edit" href="/pharmacist/patients/add.php?edit=<?php echo $data['EmpID']?>" class="btn btn-info">Edit</a></td>
      </tr>
      <?php };?>
    </table>
     </div>
   </div>
  </div>
    
    <?php include '../shared/script.php'; ?>
