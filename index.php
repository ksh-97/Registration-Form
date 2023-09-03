<?php
$insert = false;
if(isset($_POST['name'])) {

    // connecting to mysql -> mysqli (sql improved)

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con) {
        die(" Connection failed due to ". mysqli_connect_error());
    }
    //echo "Successfully connected to DB";

    // Collecting post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    // Query to insert into db.tablename

    $sql = "INSERT INTO `trip`.`data` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
   // echo $sql;

    // 
    if($con->query($sql) == true) {
      $insert = true;
    }
    else {
        echo "ERROR:  $sql <br> $con->error"; 
    }

    // Close the connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class = "bg" src="bgimg.jpg" alt="Venice">
    <div class="container">
        <h1> Welcome to KK Tour and Travels</h1>
        <p> Please provide your details to confirm your travel.</p>
         <?php 
            if($insert == true) {
                echo "Thanks for submitting. We will get back to you soon.";
            }
        
         ?>
        

        <form action="index.php" method="post">

            <input type="text" name = "name" id="name" placeholder="Enter your name">
            <input type="text" name = "age" id="age" placeholder="Enter your age">
            <input type="text" name = "gender" id="gender" placeholder="Enter your gender">
            <input type="email" name = "email" id="email" placeholder="Enter your email">
            <input type="phone" name = "phone" id="phone" placeholder="Enter your phone">
            <textarea name = "desc" id="desc" cols="30" rows="10" placeholder="Enter any extra requirements"></textarea>
            <button class="btn"> Submit</button>
            <button class="btn"> Reset</button>
        </form>

    </div>
    <script src = "index.js"></script>
    <!-- INSERT INTO `data` (`srno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'Test', '99', 'male', 'ksh@ksh.com', '9999999999', '-', current_timestamp()); -->
</body>
</html>