<?php include('../include/Header.php'); ?>
<?php
session_start();
if (isset($_SESSION['isAgencyLoggedIn'])) {
  echo "<script>
          alert('You are already login');
          window.location.href='./index.php';
          </script>";
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Car Rental System</a>
  </div>
</nav>

<div class="container mt-5">
  <div class="row">
    <h1>Agency Login Form</h1>
    <?php if (isset($_GET['error'])) { ?>

      <p id="error">
        <?php echo $_GET['error']; ?>
      </p>

    <?php } ?>
    <form method="post" action="Controller.php">
      <div class="mb-3">
        <label for="AgencyEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="AgencyEmail" name="AgencyEmail" required />
        <div class="mb-3">
          <label for="AgencyPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="AgencyPassword" name="AgencyPassword" pattern="[A-Za-z]{4)"
            required />
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
</div>

<?php include('../include/Footer.php'); ?>