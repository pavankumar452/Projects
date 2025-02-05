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
            <legend><h2>Order Details</h2></legend>
            <div>
                <label>Order ID:</label>
                <input type="number" name="order_id">
            </div>
            <div>
                <label>Customer ID:</label>
                <input type="text" name="customer_id">
            </div>
            <div>
                <label>Product ID:</label>
                <input type="text" name="product_id">
            </div>
            <div>
                <label>Quantity:</label>
                <input type="number" name="order_quantity">
            </div>
            <div>
                <label>Order Status:</label>
                <select name="order_status">
                    <option value="">select</option>
                    <option value="">Shipped</option>
                    <option value="">Pending</option>
                    <option value="">Delevered</option>
                    <option value="">In Transit</option>
                </select>
            </div>
            <div>
                <input type="submit" name="save" value="SAVE">
                <input type="reset" name="reset" value="RESET">
                <input type="submit" name="update" value="UPDATE">
                <a href="employee.php"><input type="button" value="NEXT"></a>
            </div>
        </fieldset>
        <fieldset>
            <i><b>Note:Enter Order ID and press on delete button to delete</b></i>
            <div>
                <label>Order ID:</label>
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
       $order_id=$_POST['order_id'];
       $customer_id=$_POST['customer_id'];
       $product_id=$_POST['product_id'];
       $order_quantity=$_POST['order_quantity'];
       $order_status=$_POST['order_status'];

        $insert="INSERT INTO `Order`(OrderID,CustomerID,ProductID,Quantity,OrderStatus)
        VALUES('$order_id','$customer_id','$product_id','$order_quantity','$order_status')";
        
        if(mysqli_query($conn, $insert))
        echo "<script>alert('Saved Successfully');</script>";
       else
       echo "".mysqli_error($conn);

       }

       else if(isset($_POST["update"])){
        $order_id=$_POST["order_id"];
        $customer_id=$_POST['customer_id'];
        $product_id=$_POST['product_id'];
        $order_quantity=$_POST['order_quantity'];
        $order_status=$_POST['order_status'];

        $update= "UPDATE `Order`
        SET CustomerID='$customer_id',
            ProductID='$product_id',
            Quantity='$order_quantity',
            OrderStatus='$order_status'
        WHERE OrderID='$order_id'";

        if(mysqli_query($conn, $update))
        echo "<script>alert('updated Successfully');</script>";
       else
       echo "".mysqli_error($conn);
       }

       else if(isset($_POST["delete"])){
        $delete_id=$_POST["delete_id"];
        $delete= "DELETE FROM `Order`
        Where OrderID='$delete_id'";

        if(mysqli_query( $conn, $delete))
        echo "<script>alert('Delete Successfully');</script>";

        else
        echo "".mysqli_error($conn);
       }

       mysqli_close($conn);

    ?>
