<?php require_once "process/login-process.php"  ?>
<!DOCTYPE html>
<html lang ="en">
 <head>
        <title>Login Page</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="container">
      <div class="title">Welcome to BruCitizen Portal</div>
        <div class="content">
          <form method="POST" action="index.php">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Email</span>
                <input type="email" name="email" placeholder="Enter your email">
              </div>
              <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="password" placeholder="Enter your password">
              </div>
              </div>
            <div class="button-submit">
                <a href=""><input type="submit" name="submit" value="Log In"></a>
            </div>
            <div class="button-back">
                <a href="registeration.php"><input type="button" value="Register Now!"></a>
            </div>
          </form>
        </div>
      </div>

      
    </body>
</html>