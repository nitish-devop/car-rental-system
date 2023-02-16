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
<div class="container mt-5  bg-secondary">
  <h1>Customer Login Form</h1>
  <?php if (isset($_GET['error'])) { ?>

    <p id="error">
      <?php echo $_GET['error']; ?>
    </p>

  <?php } ?>
  <form method="post" action="Controller.php">
    <div class="mb-3">
      <label for="CustomerEmail" class="form-label">Email address</label>
      <input type="email" class="form-control" id="CustomerEmail" name="CustomerEmail" required />
      <div class="mb-3">
        <label for="CustomerPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="CustomerPassword" name="CustomerPassword" required />
      </div>
      <button type="submit" class="form-control btn btn-primary" name="Login" value="login">Login</button>
      <div class="row mt-2">
          <div class="col-sm">
            <span>New User ?</span>
            <a href="register.php" class="btn btn-primary" href="register.php">Register</a>
          </div>
        </div>

  </form>
</div>

<?php include('../include/Footer.php'); ?>