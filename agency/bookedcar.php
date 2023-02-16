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


    <div class="row">
        

        <h2>Booked Cars</h2>
        <hr>
        <?php

        $agencyID = $_SESSION['id'];
        $sql = "SELECT booking.id,vehicle.model_name,vehicle.number,customer.name,booking.noOfDays,vehicle.rentperday
FROM ((booking
INNER JOIN vehicle ON booking.carID = vehicle.id)
INNER JOIN customer ON booking.custID = customer.id) where booking.agencyID = '$agencyID' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            //mysqli_fetch_all gives us the data in 2D array format.
            // It's second parameter decide whether its assoc array or indexed. Or maybe both
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="card col-md-4 mx-3 px-3">
                    <h5 class="card-header">
                        <?php echo $row['model_name'] ?>
                    </h5>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row['number'] ?>
                        </h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">
                            <?php echo $row['name'] ?>
                        </a>
                    </div>
                </div>
                <?php
            }

        } else
            echo "<h3>No Booking</h3>";
        ?>

    </div>
</div>
<?php include('../include/Footer.php'); ?>