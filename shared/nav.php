<?php 
session_start();
if (isset($_GET['logout'])) {
 session_unset();
 session_destroy();
 header('location: /pharmacist/registration/login.php');
}
$host="localhost";
$user="root";
$password='';
$dbname="pharmacist";
$conn = mysqli_connect($host,$user,$password,$dbname);
  $select= "SELECT * from `role`";
  $cat= mysqli_query($conn , $select);
    $row = mysqli_fetch_assoc($cat);
    $_SESSION['roles'] = $row['id'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/pharmacist/index.php">Home</a>
      </li>
      <?php if($_SESSION['roles'] == 2) : ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Employees
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/pharmacist/employees/add.php">Employees Add</a>
      <?php endif ; ?>

      <?php if($_SESSION['roles'] == 1||$_SESSION['roles'] == 2) : ?>

          <a class="dropdown-item" href="/pharmacist/employees/list.php">Employees List</a>
        </div>
       </li> 
      <?php endif ; ?>
      <?php if($_SESSION['roles'] == 2) : ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Doctor
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/pharmacist/doctor/add.php">Doctors Add</a>
      <?php endif ; ?>

      <?php if($_SESSION['roles'] == 1||$_SESSION['roles'] == 2) : ?>

          <a class="dropdown-item" href="/pharmacist/doctor/list.php">Doctors List</a>
        </div>
       </li> 
      <?php endif ; ?>
      <?php if($_SESSION['roles'] == 3) : ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Medicines
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/pharmacist/medicines/add.php">Medicines Add</a>
      <?php endif ; ?>

      <?php if($_SESSION['roles'] == 1||$_SESSION['roles'] == 2||$_SESSION['roles'] == 3) : ?>

          <a class="dropdown-item" href="/pharmacist/medicines/list.php">Medicines List</a>
        </div>
       </li> 
      <?php endif ; ?>
      <?php if($_SESSION['roles'] == 3) : ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Order
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/pharmacist/order/add.php">Order Add</a>
      <?php endif ; ?>

      <?php if($_SESSION['roles'] == 1||$_SESSION['roles'] == 2||$_SESSION['roles'] == 3) : ?>

          <a class="dropdown-item" href="/pharmacist/order/list.php">Order List</a>
        </div>
       </li> 
      <?php endif ; ?>
      <?php if($_SESSION['roles'] == 1) : ?>

       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Roles
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/pharmacist/admin/role.php">Roles Add</a>
        </div>
       </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/pharmacist/admin/add.php">Sub Admin Add</a>
          <a class="dropdown-item" href="/pharmacist/admin/list.php">Sub Admin List</a>
        </div>
       </li> 
       <?php else : ?>
        <li class="nav-item active">
        <a class="nav-link" href="/pharmacist/index.php">About us</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/pharmacist/index.php">Contact</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/pharmacist/index.php">Profile</a>
      </li>
       <?php endif ; ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <?php if($_SESSION['roles'] == 1||$_SESSION['roles'] == 2||$_SESSION['roles'] == 3||$_SESSION['roles'] == 4) : ?>
      <form method="$_POST">
    <a href="/pharmacist/index.php" name="logout" class="btn btn-primary" type="submit">Logout</a>
    </form>
    <?php else :?>
    <a href="/pharmacist/registration/login.php" class="btn btn-primary" type="submit">Login</a>
    <a href="/pharmacist/registration/signup.php" class="btn btn-success" type="submit">Signup</a>
    <?php endif ; ?>

  </div>
</nav>