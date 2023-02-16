<?php
$conn = mysqli_connect('localhost', 'root', '', 'car-rental-agency');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}