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
            <legend><h2>Employee Details</h2></legend>
            <div>
                <label>Employee ID:</label>
                <input type="text" name="employee_id">
            </div>
            <div>
                <label>Name:</label>
                <input type="text" name="employee_name">
            </div>
            <div>
                <label>Role:</label>
                <input type="text" name="employee_role">
            </div>
            <div>
                <label>Contact Number:</label>
                <input type="number" name="employee_number">
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="employee_email">
            </div>
            <div>
                <input type="submit" name="save" value="SAVE">
                <input type="reset" name="reset" value="RESET">
                <input type="submit" name="update" value="UPDATE">
                <a href="trip.html"><input type="button" value="NEXT"></a>
            </div>
        </fieldset>
        <fieldset>
            <i><b>Note:Enter Employee ID and press on delete button to delete</b></i>
            <div>
                <label>Employee ID:</label>
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
       $employee_id=$_POST['employee_id'];
       $employee_name=$_POST['employee_name'];
       $employee_role=$_POST['employee_role'];
       $employee_number=$_POST['employee_number'];
       $employee_email=$_POST['employee_email'];

        $insert="INSERT INTO Employee(EmployeeID,Name,Role,ContactNumber,Email)
        VALUES('$employee_id','$employee_name','$employee_role','$employee_number','$employee_email')";
        
        if(mysqli_query($conn, $insert))
        echo "<script>alert('Saved Successfully');</script>";
       else
       echo "".mysqli_error($conn);

       }

       else if(isset($_POST["update"])){
        $employee_id=$_POST["employee_id"];
        $employee_name=$_POST['employee_name'];
        $employee_role=$_POST['employee_role'];
        $employee_number=$_POST['employee_number'];
        $employee_email=$_POST['employee_email'];

        $update= "UPDATE Employee 
        SET Name='$employee_name',
            Role='$employee_role',
            ContactNumber='$employee_number',
            Email='$employee_email'
        WHERE EmployeeID='$employee_id'";

        if(mysqli_query($conn, $update))
        echo "<script>alert('updated Successfully');</script>";
       else
       echo "".mysqli_error($conn);
       }

       else if(isset($_POST["delete"])){
        $delete_id=$_POST["delete_id"];
        $delete= "DELETE FROM EMPLOYEE
        Where EmployeeID='$delete_id'";

        if(mysqli_query( $conn, $delete))
        echo "<script>alert('Delete Successfully');</script>";

        else
        echo "".mysqli_error($conn);
       }

       mysqli_close($conn);

    ?>
