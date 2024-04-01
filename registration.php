<?php
  include 'php_handlers/registration_handler.php';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<form action="" method="post">
      
      <div class="form-group">
        <input type="email" class= "form-control" name ="email" placeholder="Email:">
      </div>
      <div class="form-group">
        <input type="password" class= "form-control" name ="password" placeholder="Password:">
      </div>
      <div class="form-group">
        <input type="password" class= "form-control" name ="verify_password" placeholder="Verify Password:">
      <div class="form-btn">
        <input type="submit" class="btn btn-primary" value="Register" name="register">
      </div>
    </form>
      <div>
          <div><p>Already Registered?<a href="login.php">Login Here</a></p></div>
      </div>
  </div>