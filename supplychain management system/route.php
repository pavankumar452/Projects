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
            <legend><h2>Route Details</h2></legend>
            <div>
                <label>Route ID:</label>
                <input type="number" name="route_id">
            </div>
            <div>
                <label>Origin:</label>
                <input type="text" name="route_origin">
            </div>
            <div>
                <label>Destination:</label>
                <input type="text" name="route_destination">
            </div>
            <div>
                <label>Distance:</label>
                <input type="text" name="route_distance">
            </div>
            <div>
                <label>Estimated Travel Time:</label>
                <input type="time" name="route_ETT">
            </div>
            <div>
                <input type="submit" name="save" value="SAVE">
                <input type="reset" name="reset" value="RESET">
                <input type="submit" name="update" value="UPDATE">
                <a href="order.php"><input type="button" value="NEXT"></a>
                <input type="submit" name="start" onclick="start()" value="START">
            </div>
        </fieldset>
        <fieldset>
            <i><b>Note:Enter Route ID and press on delete button to delete</b></i>
            <div>
                <label>Route ID:</label>
                <input type="text" name="delete_id">
            </div>
            <div>
            <input type="submit" name="delete" value="DELETE">
            </div>
        </fieldset>

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
       $route_id=$_POST['route_id'];
       $route_origin=$_POST['route_origin'];
       $route_destination=$_POST['route_destination'];
       $route_distance=$_POST['route_distance'];
       $route_ETT=$_POST['route_ETT'];

        $insert="INSERT INTO Route(RouteID,Origin,Destination,Distance,EstimatedTravelTime)
        VALUES('$route_id','$route_origin','$route_destination','$route_distance','$route_ETT')";
        
        if(mysqli_query($conn, $insert))
        echo "<script>alert('Saved Successfully');</script>";
       else
       echo "".mysqli_error($conn);

       }

       else if(isset($_POST["update"])){
        $route_id=$_POST["route_id"];
        $route_origin=$_POST['route_origin'];
        $route_destination=$_POST['route_destination'];
        $route_distance=$_POST['route_distance'];
        $route_ETT=$_POST['route_ETT'];

        $update= "UPDATE Route 
        SET Origin='$route_origin',
            Destination='$route_destination',
            Distance='$route_distance',
            EstimatedTravelTime='$route_ETT'
        WHERE RouteID='$route_id'";

        if(mysqli_query($conn, $update))
        echo "<script>alert('updated Successfully');</script>";
       else
       echo "".mysqli_error($conn);
       }

       else if(isset($_POST["delete"])){
        $delete_id=$_POST["delete_id"];
        $delete= "DELETE FROM Route
        Where RouteID='$delete_id'";

        if(mysqli_query( $conn, $delete))
        echo "<script>alert('Delete Successfully');</script>";

        else
        echo "".mysqli_error($conn);
       }

       mysqli_close($conn);

    ?>
