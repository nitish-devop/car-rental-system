<?php
session_start();
include '../config/Database.php';

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Handle Customer Signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $name = validate($_POST["CustomerName"]);
    $email = validate($_POST["CustomerEmail"]);
    $phone = validate($_POST["CustomerPhone"]);
    $password = password_hash(validate($_POST["CustomerPassword"]), PASSWORD_DEFAULT);

    // Check wheter email is already registred or not
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'"))) {
        echo "<script>
                    alert('Email is already registred.');
                    window.location.href='./register.php';
                    </script>";
    } else {
        $sql = "INSERT INTO `customer`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";

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

// Handle Customer SignIn
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Login"])) {
    $email = $_POST["CustomerEmail"];

    $sql = "SELECT * from customer where email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >= 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($_POST["CustomerPassword"], $row["password"])) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['isCustLoggedIn'] = true;
            echo "<script>
           window.location.href='../index.php';
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

// Handle ListCar or Add Car
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["book"])) {
    $agencyID = $_POST["agencyID"];
    $carId = $_POST["carID"];
    $carId = $_POST["carID"];
    $custID = $_SESSION["id"];
    $noOfDays = $_POST["RentDays"];
    $sql = "INSERT INTO `booking`(`agencyID`,`carID`, `custID`, `noOfDays`) VALUES ('$agencyID','$carId','$custID','$noOfDays')";
    if (mysqli_query($conn, $sql)) {
        mysqli_query($conn, "UPDATE `vehicle` SET `isBooked`= 'YES'  WHERE id = '$carId'");
        echo "<script>
           alert('Car Booked Successfully');
           window.location.href='../index.php';
           </script>";
    } else {
        echo json_encode(['msg' => mysqli_error($conn), 'status' => false]);
    }
}





?>