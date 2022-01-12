<?php

require("conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name =  $_POST["name"]; 
    $email = $_POST["email"]; 
    $classN =  $_POST["stuClass"]; 
    $feesS = $_POST["feesStatus"]; 

    $sql = "INSERT INTO examFees (stuName, email, class, fStatus)
VALUES ('$name', '$email', '$classN', '$feesS')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("location:http://127.0.0.1/task1/index.php?status=done");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
