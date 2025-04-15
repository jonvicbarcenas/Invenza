<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="login-page">
    <div class="form">
      <div class="form-wrapper login-form">
        <form method="POST">
          <input type="text" placeholder="name" name="txtName" required />
          <input type="text" placeholder="username" name="txtUsername" required />
          <input type="password" placeholder="password" name="txtPassword" required />
          <input type="email" placeholder="email address" name="txtEmail" required />
          <button type="submit" name="btnSubmit">create</button>
          <p class="message">Already registered? <a href="login.php">Sign In</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<?php

$con = mysqli_connect("localhost", "root", "", "dbg2_invenza");

if (isset($_POST['btnSubmit'])) {
  $name = $_POST['txtName'];
  $uname = $_POST['txtUsername'];
  $pwd = $_POST['txtPassword'];
  $email = $_POST['txtEmail'];
  $role = 'Customer';
  $dateCreated = date('Y-m-d H:i:s'); 

  $sqlSelect = "SELECT * FROM User WHERE Username='$uname' OR Email='$email'";
  $results = mysqli_query($con, $sqlSelect);

  if (mysqli_num_rows($results) == 0) {
    $sql = "INSERT INTO User (Name, Username, Password, Role, Email, DateCreated) 
            VALUES ('$name', '$uname', '$pwd', '$role', '$email', '$dateCreated')";
    if (mysqli_query($con, $sql)) {
      echo "<script>alert('New record saved.');</script>";
      header("Location: login.php");
      exit();
    } else {
      echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
  } else {
    echo "<script>alert('Username or email already exists.');</script>";
  }
}

?>