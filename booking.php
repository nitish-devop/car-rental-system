<?php
session_start();
include('./config/Database.php');
include('./include/Header.php');
include('./include/Navbar.php');
?>
<?php

$sql = "select * from vehicle where id = {$_GET['id']}";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  //mysqli_fetch_all gives us the data in 2D array format.
  // It's second parameter decide whether its assoc array or indexed. Or maybe both
  $row = mysqli_fetch_assoc($result);

} else {
  echo '<h1>No Booking Order</h1>';
}
?>
<div class="container mt-5">
  <form method="post" action="customer/Controller.php">
    <div class="mb-3">
      <input type="hidden" name="carID" value="<?php echo $row["id"] ?>">
      <input type="hidden" name="agencyID" value="<?php echo $row["agencyID"] ?>">

      <label for="ModelName" class="form-label">Vehicle Model</label>
      <input type="text" class="form-control" id="ModelName" name="ModelName" value="<?php echo $row["model_name"] ?>"
        disabled />
    </div>
    <div class="mb-3">
      <label for="VehicleNo" class="form-label">Vehicle No.</label>
      <input type="text" class="form-control" id="VehicleNo" name="VehicleNo" value="<?php echo $row["number"] ?>"
        disabled />
    </div>
    <div class="mb-3">
      <label for="SeatingCapacity" class="form-label">Seating Capacity</label>
      <input type="number" class="form-control" id="SeatingCapacity" name="SeatingCapacity" value=<?php echo $row["seating_capacity"] ?> disabled />
    </div>
    <div class="mb-3">
      <label for="RentPerDay" class="form-label">Rent Per Day</label>
      <input type="number" class="form-control" id="RentPerDay" name="RentPerDay" value=<?php echo $row["rentperday"] ?>
        disabled />
      <div class="mb-3">
        <label for="RentDays" class="form-label">No of Days</label>
        <input type="number" class="form-control" id="RentDays" name="RentDays" required/>
      </div>
      <button type="submit" name="book" class="form-control btn btn-primary" value="book">Book Now</button>
  </form>
</div>