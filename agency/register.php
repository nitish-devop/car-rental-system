<?php
include('../include/Header.php');
?>
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
    <h1>Agency Signup Form</h1>
    <?php if (isset($_GET['error'])) { ?>

      <p id="error">
        <?php echo $_GET['error']; ?>
      </p>

    <?php } ?>
    <form method="POST" action="Controller.php">
      <div class="mb-3">
        <label for="AgencyName" class="form-label">Your name</label>
        <input type="text" class="form-control" id="AgencyName" name="AgencyName" required />
      </div>
      <div class="mb-3">
        <label for="AgencyEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="AgencyEmail" name="AgencyEmail"
          onFocus="document.getElementById('message').innerHTML = '' ;" required />
        <div id="emailHelp" class="form-text">
          We'll never share your email with anyone else.
        </div>
      </div>
      <div class="mb-3">
        <label for="AgencyPhone" class="form-label">Contact No.</label>
        <input type="text" class="form-control" id="AgencyPhone" name="AgencyPhone" required />
        <div id="emailHelp" class="form-text">
          We'll never share your modbile no. with anyone else.
        </div>
      </div>
      <div class="mb-3">
        <label for="AgencyPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="AgencyPassword" name="AgencyPassword" pattern="[A-Za-z]{4)"
          required />
      </div>
      <button type="submit" name="register" class="form-control btn btn-primary" value="register">
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




</div>
<?php include('../include/Footer.php'); ?>