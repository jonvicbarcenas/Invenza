<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="supplierStyle.css">
    <title>Add Supplier Form</title>
</head>
<body>
    <div class="container">
        <h1>Add Supplier</h1>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="supplierName" placeholder="Supplier Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="contactPerson" placeholder="Contact Person">
            </div>
            <div class="form-group">
                <input type="text" name="phoneNumber" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email">
            </div>
            <button type="submit" name="btnSubmit">Add Supplier</button>
        </form>
    </div>

    <?php
    $con = mysqli_connect("localhost", "root", "", "dbg2_invenza");

    if (isset($_POST['btnSubmit'])) {
        $supplierName = trim($_POST['supplierName']);
        $contactPerson = trim($_POST['contactPerson']);
        $phoneNumber = trim($_POST['phoneNumber']);
        $email = trim($_POST['email']);
    
        $checkQuery = "SELECT * FROM Supplier WHERE SupplierName = '$supplierName'";
        $result = mysqli_query($con, $checkQuery);
    
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Supplier already exists.');</script>";
        } else {
            $supplierName = mysqli_real_escape_string($con, $supplierName);
            $contactPerson = mysqli_real_escape_string($con, $contactPerson);
            $phoneNumber = mysqli_real_escape_string($con, $phoneNumber);
            $email = mysqli_real_escape_string($con, $email);
    
            $sql = "INSERT INTO Supplier (SupplierName, ContactPerson, PhoneNumber, Email) 
                    VALUES ('$supplierName', '$contactPerson', '$phoneNumber', '$email')";
    
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Supplier added successfully.');</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
            }
        }
    }
    ?>
</body>
</html>