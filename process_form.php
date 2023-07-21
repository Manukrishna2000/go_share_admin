<?php
require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobileNumber = $_POST["mobile_number"];
    $price = $_POST["price"];
    $vehicleNumber = $_POST["vehicle_number"];
    $vehicleModel = $_POST["vehicle_model"];
    
    // Handle file upload
    $targetDir = "uploads/";
    $vehicleImage = $_FILES["vehicle_image"]["name"];
    $targetFilePath = $targetDir . basename($vehicleImage);
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($vehicleImage)) {
        if ($_FILES["vehicle_image"]["error"] !== UPLOAD_ERR_OK) {
            echo "Error uploading file: " . $_FILES["vehicle_image"]["error"];
        } elseif (move_uploaded_file($_FILES["vehicle_image"]["tmp_name"], $targetFilePath)) {
            echo '<script>alert("File uploaded successfully"); window.location.href = "car rental.php";</script>';
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Please select a file.";
    }
    
    // Perform data validation and any other required processing here

    // Insert the data into the database
    $sql = "INSERT INTO rent (name, mobile_no, price, vehicle_no, vehicle_model, vehicle_image) VALUES ('$name', '$mobileNumber', '$price', '$vehicleNumber', '$vehicleModel', '$vehicleImage')";

    // Execute the SQL query here (you have missed this step in your code)

    // Assuming you have a connection object named $con
    if ($con->query($sql) === TRUE) {
        // Redirect to car_rental.php after successfully executing the query
        header("Location: car rental.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}


?>
