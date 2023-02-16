<?php
// Function for Update Car Availability status
function checkAndUpdateBookingStatus($conn, $carID)
{
    $sql = "SELECT * from booking";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $bookingDate = substr($row["startTime"], 0, 10);
        $noOfDays = $row["noOfDays"] . " days";

        $date = date_create($bookingDate);
        date_add($date, date_interval_create_from_date_string($noOfDays));

        if ($bookingDate == date("Y-m-d")) {
            mysqli_query($conn, "UPDATE `vehicle` SET `isBooked`='No' WHERE id = '$carID'");

        }
    }


}
?>