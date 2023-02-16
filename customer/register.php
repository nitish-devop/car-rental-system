<?php
session_start();
if (isset($_SESSION['isCustLoggedIn'])) {
  echo "<script>
  alert('You are already login');
  window.location.href='../index.php';
  </script>";
}
?>

<?php include('../include/Header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Car Rental System</a>
  </div>
</nav>

<div class="container mt-5 ">
  <h1>Customer Signup Form</h1>
  <?php if (isset($_GET['error'])) { ?>

    <p id="error">
      <?php echo $_GET['error']; ?>
    </p>

  <?php } ?>
  <form method="POST" action="Controller.php">
    <div class="mb-3">
      <label for="CustomerName" class="form-label">Your name</label>
      <input type="text" class="form-control" id="CustomerName" name="CustomerName" required />
    </div>
    <div class="mb-3">
      <label for="CustomerEmail" class="form-label">Email address</label>
      <input type="email" class="form-control" id="CustomerEmail" name="CustomerEmail" required />
      <div id="emailHelp" class="form-text">
        We'll never share your email with anyone else.
      </div>
    </div>
    <div class="mb-3">
      <label for="CustomerPhone" class="form-label">Contact No.</label>
      <input type="text" class="form-control" id="CustomerPhone" name="CustomerPhone" required />
      <div id="emailHelp" class="form-text">
        We'll never share your modbile no. with anyone else.
      </div>
    </div>
    <div class="mb-3">
      <label for="CustomerPassword" class="form-label">Password</label>
      <input type="password" class="form-control" id="CustomerPassword" name="CustomerPassword" pattern="[A-Za-z]{4)"
        required />
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" />
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" name="register" class="form-control btn btn-primary">
      Register
    </button>


  </form>
  <div class="row mt-2">
      <div class="col-sm">
        <span>Already Registered ?</span>
        <a href="login.php" class="btn btn-sm btn-primary">Login</a>
      </div>
    </div>
</div>
<?php include('../include/Footer.php'); ?>