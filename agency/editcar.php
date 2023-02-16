<?php
include '../config/Database.php';
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
  <?php
    $sql = "SELECT * from vehicle where id = {$_GET['vehicleID']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
  <?php if (isset($_GET['error'])) { ?>

    <p id="error">
      <?php echo $_GET['error']; ?>
    </p>
  
    

  <?php } ?>
  <form method="POST" action="Controller.php">
  <input type="hidden" id="carId" name="vehicleID" value="<?php echo $row['id']; ?>">
    <div class="mb-3">
      <label for="ModelName" class="form-label">Vehicle Model</label>
      <input type="text" class="form-control" id="ModelName" name="ModelName" value="<?php echo $row['model_name']; ?>" required disabled/>
    </div>
    <div class="mb-3">
      <label for="VehicleNo" class="form-label">Vehicle No.</label>
      <input type="text" class="form-control" id="VehicleNo" name="VehicleNo" value="<?php echo $row['number']; ?>" required disabled/>
    </div>
    <div class="mb-3">
      <label for="SeatingCapacity" class="form-label">Seating Capacity</label>
      <input type="number" class="form-control" id="SeatingCapacity" name="SeatingCapacity" value=<?php echo $row['seating_capacity']; ?> required />
    </div>
    <div class="mb-3">
      <label for="RentPerDay" class="form-label">Rent Per Day</label>
      <input type="number" class="form-control" id="RentPerDay" name="RentPerDay" value="<?php echo $row['rentperday']; ?>" required />
    </div>
    <button type="submit" name="UpdateCar" class="form-control btn btn-primary" value="Update">
      List
    </button>


  </form>

</div>
<?php include('../include/Footer.php'); ?>