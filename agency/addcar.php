<?php
session_start();
if (!isset($_SESSION['isAgencyLoggedIn'])) {
  echo "<script>
          alert('Please Login First');
          window.location.href='./login.php';
          </script>";
}
?>
<?php include('../include/Header.php'); ?>
<?php include('../include/Navbar.php'); ?>
<div class="container mt-5">
  <h1>Car List Form</h1>
  <?php if (isset($_GET['error'])) { ?>

    <p id="error">
      <?php echo $_GET['error']; ?>
    </p>

  <?php } ?>
  <form method="POST" action="Controller.php">
    <div class="mb-3">
      <label for="ModelName" class="form-label">Vehicle Model</label>
      <input type="text" class="form-control" id="ModelName" name="ModelName" required />
    </div>
    <div class="mb-3">
      <label for="VehicleNo" class="form-label">Vehicle No.</label>
      <input type="text" class="form-control" id="VehicleNo" name="VehicleNo" required />
    </div>
    <div class="mb-3">
      <label for="SeatingCapacity" class="form-label">Seating Capacity</label>
      <input type="number" class="form-control" id="SeatingCapacity" name="SeatingCapacity" required />
    </div>
    <div class="mb-3">
      <label for="RentPerDay" class="form-label">Rent Per Day</label>
      <input type="number" class="form-control" id="RentPerDay" name="RentPerDay" required />
    </div>
    <button type="submit" name="ListCar" class="form-control btn btn-primary" value="listcar">
      List
    </button>


  </form>

</div>
<?php include('../include/Footer.php'); ?>