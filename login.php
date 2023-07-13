<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link rel="stylesheet" href="unn4.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <nav>
            <!-- <a href="index.html"><img src="imaghes/burgir-logo.png" alt="  "></a> -->
            <div>
                <a href="index.php" class="text-box">
                        <h1>PizzaBurgir</h1>
                    </a>
                </div>
            <div class="navigation">
                <ul>
                    <li><a href="signup.html">sign up</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div>
        <div class="text-box" style="margin-left: 400px">
        </div>
        
            <form class="text-box" style="margin-top: 100px" method="post" >
            <h1>Login</h1>
            <div>
                
                <label for="email">email</label>
                <input type="email" name="email" id="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            
            <button>Log in</button>
            <?php if ($is_invalid): ?>
                <h5>Invalid<br>Please try again</h5>
            <?php endif; ?>
        </form>
    </div>
    
</body>
</html>








