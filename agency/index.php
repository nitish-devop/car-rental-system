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
<a href="addcar.php" class="btn btn-secondary btn-lg m-2">+ List Car</a>
<a href="bookedcar.php" class="btn btn-secondary btn-lg m-2">Booking</a>
<div class="container-fluid m-5">

    <div class="row">


        <h2>Booked Cars</h2>
        <hr>
        <?php

        $agencyID = $_SESSION['id'];
        $sql = "SELECT * from vehicle where agencyID = $agencyID";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            //mysqli_fetch_all gives us the data in 2D array format.
            // It's second parameter decide whether its assoc array or indexed. Or maybe both
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="card col-md-4 m-3 p-3">
                    <h5 class="card-header">
                        <?php echo $row['model_name'] ?>
                    </h5>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row['number'] ?>
                        </h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Seating Capacity :
                                <?php echo $row['seating_capacity'] ?>
                            </li>
                            <li class="list-group-item">Rent Per Day :
                                <?php echo $row['rentperday'] ?> Rs.
                            </li>
                            <li class="list-group-item">Vehicle No :
                                <?php echo $row['number'] ?>
                            </li>
                        </ul>
                    </div>
                    <a href="editcar.php?vehicleID=<?php echo $row['id'] ?>" class="btn btn-primary m-2">Edit</a>
                </div>
        <?php
            }
        } else
            echo "<h3>No Booking</h3>";
        ?>

    </div>
</div>
<?php include('../include/Footer.php'); ?>