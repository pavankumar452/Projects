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
            <legend><h2>Customer Details</h2></legend>
            <div>
                <label>Customer ID:</label>
                <input type="text" name="customer_id">
            </div>
            <div>
                <label>Name:</label>
                <input type="text" name="customer_name">
            </div>
            <div>
                <label>Address:</label>
                <textarea name="customer_address"> </textarea>
            </div>
            <div>
                <label>Contact Number:</label>
                <input type="number" name="customer_number">
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="customer_email">
            </div>
            <div>
                <input type="submit" name="save" value="SAVE">
                <input type="reset" name="reset" value="RESET">
                <input type="submit" name="update" value="UPDATE">
                <a href="product.php"><input type="button" value="NEXT"></a>
            </div>
        </fieldset>

        <fieldset>
            <i><b>Note:Enter Customer ID and press on delete button to delete</b></i>
            <div>
                <label>Customer ID:</label>
                <input type="text" name="delete_id">
            </div>
            <div>
            <input type="submit" name="delete" value="DELETE">
            </div>
        </fieldset>
    </form>

    <?php
       $hostname="localhost";
       $username= "root";
       $password= "";
       $dbname= "Logistics_Transportation";

       $conn = mysqli_connect($hostname, $username, $password, $dbname);

       if(!$conn)
       die("Connection is not secure, Re-try after sometime...!!!". mysqli_connect_error());

       $customer_id=$_POST['customer_id'];
       $customer_name=$_POST['customer_name'];
       $customer_address=$_POST['customer_address'];
       $customer_number=$_POST['customer_number'];
       $customer_email=$_POST['customer_email'];

       if(isset($_POST["save"])){
        $insert="INSERT INTO Customer(CustomerID,Name,Address,ContactNumber,Email)
        VALUES('$customer_id','$customer_name','$customer_address','$customer_number','$customer_email')";
        if(mysqli_query($conn, $insert))
        echo "<script>alert('Saved Successfully');</script>";
    else
    echo "".mysqli_error($conn);
       }

       else if(isset($_POST["update"])){
        $customer_id=$_POST["customer_id"];
        $customer_name=$_POST['customer_name'];
        $customer_address=$_POST['customer_address'];
        $customer_number=$_POST['customer_number'];
        $customer_email=$_POST['customer_email'];

        $update= "UPDATE Customer 
        SET Name='$customer_name',
            Address='$customer_address',
            ContactNumber='$customer_number',
            Email='$customer_email'
        WHERE CustomerID='$customer_id'";

        if(mysqli_query($conn, $update))
        echo "<script>alert('updated Successfully');</script>";
       else
       echo "".mysqli_error($conn);
       }

       else if(isset($_POST["delete"])){
        $delete_id=$_POST["delete_id"];
        $delete= "DELETE FROM Customer
        Where CustomerID='$delete_id'";

        if(mysqli_query( $conn, $delete))
        echo "<script>alert('Delete Successfully');</script>";

        else
        echo "".mysqli_error($conn);
       }

       mysqli_close($conn);

    ?>

    
</body>
</html>
