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
            <div class="text-box">
                <h1>Admin Panel</h1>
            </div>

            <div class="navigation">
                <ul>
                        <?php if (isset($user)): ?>
                        <li><a href="logout.php">Log out</a></li>

                        <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <div class="text">

                        </div>
                    </ul>
                </div>
                <?php endif; ?>
        </nav>
    </div>
    <div>
        <?php if (isset($user)): ?>
            <?php if (htmlspecialchars($user["id"])==1): ?>
                form


            hello
            <?php endif; ?>
        <?php else: ?>
                <div class="text">
                    <h1>FORBIDDEN</h1>
                </div>
                <?php endif; ?>
    </div>
    
</body>
</html>