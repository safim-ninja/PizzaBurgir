<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Pizza Burgir</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="unn4.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;600;700&display=swap" rel="stylesheet">
    
</head>
<body>
        
        <div class="header">
            <nav>
                <!-- <a href="index.html"><img src="imaghes/burgir-logo.png" alt="  "></a> -->
                <div class="text-box">
                    <h1>PizzaBurgir</h1>
                </div>
                <div class="navigation">
                    <ul>

                        <li><a href="">Menu</a></li>
                        <?php if (isset($user)): ?>
                            <li><a href="">Burger</a></li>
                            <li><a href="">Pizza</a></li>
                            <li><a href="">Drinks</a></li>
                            <li><a href="">Set-Meal</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            
                        <?php else: ?>    
                            <li><a href="login.php">Log in</a></li>
                            <li><a href="signup.html">sign up</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
        
    
</body>
</html>