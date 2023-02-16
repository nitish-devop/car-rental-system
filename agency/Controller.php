<?php

include '../config/Database.php';

session_start();



function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Handle Agency Register
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $name = validate($_POST["AgencyName"]);
    $email = validate($_POST["AgencyEmail"]);
    $phone = validate($_POST["AgencyPhone"]);
    $password = password_hash(validate($_POST["AgencyPassword"]), PASSWORD_DEFAULT);

    // Check wheter email is already registred or not
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM agency WHERE email = '$email'"))) {
        echo "<script>
                    alert('Email is already registred.');
                    window.location.href='./register.php';
                    </script>";
    } else {
        $sql = "INSERT INTO `agency`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";

        if (mysqli_query($conn, $sql)) {
            
            echo "<script>
                    alert('You are registred');
                    window.location.href='./login.php';
                    </script>";
        } else {
            echo json_encode(['msg' => mysqli_error($conn), 'status' => false]);
        }
    }
}

// Handle Agency Login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Login"])) {
    $email = $_POST["AgencyEmail"];

    $sql = "SELECT * from agency where email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >= 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($_POST["AgencyPassword"], $row["password"])) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['isAgencyLoggedIn'] = true;
            echo "<script>
           window.location.href='./index.php';
           </script>";
        } else {
            echo "<script>
           alert('Wrong Username or password');
           window.location.href='./login.php';
           </script>";
        }

    } else {
        echo "<script>
           alert('Wrong Username or password');
           window.location.href='./login.php';
           </script>";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ListCar"])) {

    $modelName = validate($_POST["ModelName"]);
    $vehicleNo = validate($_POST["VehicleNo"]);
    $seatingCapacity = validate($_POST["SeatingCapacity"]);
    $rentPerDay = validate($_POST["RentPerDay"]);
    $agencyID = $_SESSION['id'];


    $sql = "INSERT INTO `vehicle`(`agencyID`, `model_name`, `number`, `seating_capacity`, `rentperday`,`isBooked`) VALUES ('$agencyID','$modelName','$vehicleNo',$seatingCapacity,$rentPerDay,'No')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
           alert('Car Added');
           window.location.href='./index.php';
           </script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["UpdateCar"])) {

    $seatingCapacity = validate($_POST["SeatingCapacity"]);
    $rentPerDay = validate($_POST["RentPerDay"]);
    $vehicleID = $_POST['vehicleID'];


    $sql = "UPDATE `vehicle` SET `seating_capacity`='$seatingCapacity',`rentperday`='$rentPerDay' WHERE id=$vehicleID";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
           alert('Car Updated');
           window.location.href='./index.php';
           </script>";
    }
}
?>