<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing</title>
  <link rel="stylesheet" href="landingStyle.css">
</head>
<body>
  <div class="landing">
    <h1>Welcome, <?php echo $_SESSION['uname']."<br>"; ?></h1>
    <div class="buttons">
      <div><button class="saleButton">Sales</button></div>
      <div><button class="supplierButton" onclick="location.href='supplier.php'">Supplier</button></div>
      <div><button class="categoryButton">Category</button></div>
      <div><button class="inventoryButton">Inventory</button></div>
      <div><button class="purchaseOrderButton">Purchase Order</button></div>
      <div><button class="foodItem">Food Item</button></div>
    </div>
  </div>
</body>
</html>