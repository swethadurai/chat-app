<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="container">
      <div class="card" style="height:350px;">
        <div class="card_title">
          <h1>Log In to CHAT'S</h1>
          <span>Don't have an account? <a href="signup.php">Sign In</a></span>
        </div>
        <div class="form"  >
        <form  method="post" id="form" >
        <div class="error_text"></div>
          <input type="email" name="email" id="email" placeholder="email id" />
          <input type="password" name="password" placeholder="Password" id="password" />
          <button class="continue">log in</button>
          </form>
        </div>
      
      </div>
    </div>
<script src="js/login.js"> </script>
</body>
</html>