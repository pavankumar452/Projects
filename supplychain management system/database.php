<?php
   $server = "localhost";
   $username = "root";
   $password = "";


   $conn = mysqli_connect($server, $username, $password);
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }

   
   $database = "CREATE DATABASE Logistics_Transportation";
   
   if (mysqli_query($conn, $database)) {

       $conn = mysqli_connect($server, $username, $password, 'Logistics_Transportation');
       if (!$conn) {
           die("Connection to database failed: " . mysqli_connect_error());
       }

    
       $Customer = "CREATE TABLE Customer(
           CustomerID VARCHAR(10) PRIMARY KEY,
           Name VARCHAR(30),
           Address VARCHAR(150),
           ContactNumber BIGINT,
           Email VARCHAR(25)
       )";

    
       $Product = "CREATE TABLE Product(
           ProductID VARCHAR(50) PRIMARY KEY,
           Name VARCHAR(50),
           Description TEXT,
           QuantityAvailable INT,
           UnitPrice VARCHAR(10)
       )";

    
       $Vehicle = "CREATE TABLE Vehicle(
           VehicleID VARCHAR(10) PRIMARY KEY,
           Type VARCHAR(100),
           Capacity DECIMAL(10,2),
           AvailabilityStatus BOOLEAN
       )";

    
       $Route = "CREATE TABLE Route(
           RouteID INT PRIMARY KEY,
           Origin VARCHAR(30),
           Destination VARCHAR(30),
           EstimatedTravelTime TIME
       )";

       
       $Order = "CREATE TABLE `Order` (
           OrderID INT PRIMARY KEY,
           CustomerID VARCHAR(10),
           ProductID VARCHAR(50),
           Quantity INT,
           OrderStatus VARCHAR(30),
           FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID),
           FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
       )";

       $Employee = "CREATE TABLE Employee(
           EmployeeID VARCHAR(10) PRIMARY KEY,
           Name VARCHAR(30),
           Role VARCHAR(20),
           ContactNumber BIGINT,
           Email VARCHAR(25)
       )";
   }

   if (mysqli_query($conn, $Customer)) {
       echo "Customer table created successfully!<br>";
   } else {
       echo "Error creating Customer table: " . mysqli_error($conn);
   }

   if (mysqli_query($conn, $Product)) {
       echo "Product table created successfully!<br>";
   } else {
       echo "Error creating Product table: " . mysqli_error($conn);
   }

   if (mysqli_query($conn, $Vehicle)) {
       echo "Vehicle table created successfully!<br>";
   } else {
       echo "Error creating Vehicle table: " . mysqli_error($conn);
   }

   if (mysqli_query($conn, $Route)) {
       echo "Route table created successfully!<br>";
   } else {
       echo "Error creating Route table: " . mysqli_error($conn);
   }

   if (mysqli_query($conn, $Order)) {
       echo "Order table created successfully!<br>";
   } else {
       echo "Error creating Order table: " . mysqli_error($conn);
   }

   if (mysqli_query($conn, $Employee)) {
       echo "Employee table created successfully!<br>";
   } else {
       echo "Error creating Employee table: " . mysqli_error($conn);
   }

   mysqli_close($conn);
?>
