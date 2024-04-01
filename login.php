<?php
    include 'php_handlers/login_handler.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
    
        <?php
        if(!empty($errors)){
            foreach ($errors as $error){
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }
        ?>
        
        <label>Email</label>
        <input type="text" name="email" placeholder="Enter your email:"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password:"><br>

        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
