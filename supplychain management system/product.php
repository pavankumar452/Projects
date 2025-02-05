<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <fieldset>
            <legend><h2>Product Details</h2></legend>
            <div>
                <label>Product ID:</label>
                <input type="text" name="product_id">
            </div>
            <div>
                <label>Name:</label>
                <input type="text" name="product_name">
            </div>
            <div>
                <label>Description:</label>
                <textarea name="product_description"> </textarea>
            </div>
            <div>
                <label>Quantity Available:</label>
                <input type="number" name="product_available">
            </div>
            <div>
                <label>Unit Price:</label>
                <input type="number" name="product_price">
            </div>
            <div>
                <input type="submit" name="save" value="SAVE">
                <input type="reset" name="reset" value="RESET">
                <input type="submit" name="update" value="UPDATE">
                <a href="vehicle.php"><input type="button" value="NEXT"></a>
            </div>
        </fieldset>
        <fieldset>
            <i><b>Note:Enter Product ID and press on delete button to delete</b></i>
        <div>
                <label>Product ID:</label>
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
       $product_id=$_POST['product_id'];
       $product_name=$_POST['product_name'];
       $product_description=$_POST['product_description'];
       $product_available=$_POST['product_available'];
       $product_price=$_POST['product_price'];

        $insert="INSERT INTO Product(ProductID,Name,Description,QuantityAvailable,UnitPrice)
        VALUES('$product_id','$product_name','$product_description','$product_available','$product_price')";
        
        if(mysqli_query($conn, $insert))
        echo "<script>alert('Saved Successfully');</script>";
       else
       echo "".mysqli_error($conn);

       }

       else if(isset($_POST["update"])){
        $product_id=$_POST["product_id"];
        $product_name=$_POST['product_name'];
        $product_description=$_POST['product_description'];
        $product_available=$_POST['product_available'];
        $product_price=$_POST['product_price'];

        $update= "UPDATE Product 
        SET Name='$product_name',
            Description='$product_description',
            Description='$product_available',
            UnitPrice='$product_price'
        WHERE ProductID='$product_id'";

        if(mysqli_query($conn, $update))
        echo "<script>alert('updated Successfully');</script>";
       else
       echo "".mysqli_error($conn);
       }

       else if(isset($_POST["delete"])){
        $delete_id=$_POST["delete_id"];
        $delete= "DELETE FROM Product
        Where ProductID='$delete_id'";

        if(mysqli_query( $conn, $delete))
        echo "<script>alert('Delete Successfully');</script>";

        else
        echo "".mysqli_error($conn);
       }
       mysqli_close($conn);

    ?>
