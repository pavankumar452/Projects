<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Chain Form</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend><h2>Vehicle Details</h2></legend>
            <div>
                <label>Vehicle ID:</label>
                <input type="text" name="vehicle_id">
            </div>
            <div>
                <label>Type:</label>
                <input type="text" name="vehicle_type">
            </div>
            <div>
                <label>Capacity:</label>
                <input type="text" name="vehicle_capacity">
            </div>
            <div>
                <label>Availability Status:</label>
                <select name="vehicle_availability" >
                    <option value="1">Available</option>
                    <option value="0">Unavailable</option>
                </select>
            </div>
            <div>
                <input type="submit" name="save" value="SAVE">
                <input type="reset" name="reset" value="RESET">
                <input type="submit" name="update" value="UPDATE">
                <a href="route.php"><input type="button" value="NEXT"></a>
            </div>
        </fieldset>
        <fieldset>
            <i><b>Note:Enter Vehicle ID and press on delete button to delete</b></i>
            <div>
                <label>Vehicle ID:</label>
                <input type="text" name="delete_id">
            </div>
            <div>
            <input type="submit" name="delete" value="DELETE">
            </div>
        </fieldset>
            </script>
    </form>
    
</body>
</html>
<?php
       $hostname="localhost";
       $username= "root";
       $password= "";
       $dbname= "Logistics_Transportation";

       $conn = mysqli_connect($hostname, $username, $password, $dbname);

       if(!$conn)
       die("Connection is not secure, Re-try after sometime...!!!". mysqli_connect_error());
       if(isset($_POST["save"])){
       $vehicle_id=$_POST['vehicle_id'];
       $vehicle_type=$_POST['vehicle_type'];
       $vehicle_capacity=$_POST['vehicle_capacity'];
       $vehicle_availability=$_POST['vehicle_availability'];

        $insert="INSERT INTO Vehicle(VehicleID,Type,Capacity,AvailabilityStatus)
        VALUES('$vehicle_id','$vehicle_type','$vehicle_capacity','$vehicle_availability')";
        
        if(mysqli_query($conn, $insert))
        echo "<script>alert('Saved Successfully');</script>";
       else
       echo "".mysqli_error($conn);

       }

       else if(isset($_POST["update"])){
        $vehicle_id=$_POST["vehicle_id"];
        $vehicle_type=$_POST['vehicle_type'];
        $vehicle_capacity=$_POST['vehicle_capacity'];
        $vehicle_availability=$_POST['vehicle_availability'];

        $update= "UPDATE Vehicle 
        SET Type='$vehicle_type',
            Capacity='$vehicle_capacity',
            AvailabilityStatus='$vehicle_availability'
        WHERE VehicleID='$vehicle_id'";

        if(mysqli_query($conn, $update))
        echo "<script>alert('updated Successfully');</script>";
       else
       echo "".mysqli_error($conn);
       }

       else if(isset($_POST["delete"])){
        $delete_id=$_POST["delete_id"];
        $delete= "DELETE FROM Vehicle
        Where VehicleID='$delete_id'";

        if(mysqli_query( $conn, $delete))
        echo "<script>alert('Delete Successfully');</script>";

        else
        echo "".mysqli_error($conn);
       }

       mysqli_close($conn);

    ?>
