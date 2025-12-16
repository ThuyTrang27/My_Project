<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form user</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css" class="">
</head>
<body>

<div class="container">
  <h2>Form User</h2>
  <form action="form_user_back.php" method="post">
    <div class="form-group">
      <label for="fullname">Full Name:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Enter full name" name="fullname" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="phone" required>
    </div>
     <div class="form-group">
        <label for="gender">Gender:</label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
