<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
      <div class="card signup1">
        <div class="card_title">
          <h1>Create Account in CHAT'S</h1>
          <span>Already have an account? <a href="login.php">log In</a></span>
        </div>
        <div class="form">
        <form method="POST" id="form" enctype="multipart/form-data" >
          <label for="" class="error_text"></label>
          <input type="text" name="fname" id="username" placeholder="First Name" required />
          <input type="text" placeholder="Last name" name="lname"  id="lname" >
          <input type="email" placeholder="email id" name="email" required >
          <input type="password" name="password" placeholder="Password" id="password" required />
          <input type="file" name="image" id="image" required>
          <button type="submit" id="signup_submit" class="continue">Sign Up</button>
          </form>
        </div>
       
      </div>
    </div>
  
    <script src="js/signup.js">

    </script>
</body>
</html>