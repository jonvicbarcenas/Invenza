<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="login-page">
    <div class="form">
      <div class="form-wrapper login-form">
        <form method="POST">
          <input type="text" placeholder="username" name="txtUsername" required />
          <input type="password" placeholder="password" name="txtPassword" required />
          <button type="submit" name="btnLogin">login</button>
          <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        </form>
      </div>
    </div>
  </div>

</body>
</html>

<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "dbg2_invenza");

if (isset($_POST['btnLogin'])) {
  $uname = $_POST['txtUsername'];
  $pwd = $_POST['txtPassword'];

  $sql = "SELECT * FROM User WHERE Username='$uname' AND Password='$pwd'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Invalid username or password.');</script>";
  } else {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['uname'] = $row['Username'];

    header('Location: index.php');

    exit();
  }
}
?>
