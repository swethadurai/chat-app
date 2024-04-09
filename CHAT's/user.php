<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<?php
session_start();
if (isset($_SESSION['uniqid()'])){
    header("location:../login.php");
}
?>
<body>
    <div class="wrapper ">
        <header>
            <?php
            include_once "php/config.php";

            $sql=mysqli_query($conn,"SELECT * FROM users WHERE uniqueid='{$_SESSION['uniqueid']}'");
            if (mysqli_num_rows($sql) > 0) {
                $row=mysqli_fetch_assoc($sql);
            }
            ?>
        <div class="row myprofile ">
            <div class="col-md-3">
                <img src="php/images/<?php echo $row['img']?>" alt="" width="80px" height="80px">
            </div>
            <div class="col-md-6">
                <h5><?php echo $row['fname']." " .$row['lname']?></h5>
                <p><?php echo $row['status']?></p>
            </div>
            <div class="col-md-3">
                <button class="btn_logout" id="logout_id">logout</button>
            </div>
        </div>
        </header>
      
        <hr>
        <div class="search">
            <input type="text" id="searchInput" placeholder="Search..">
          <div id='submitsearch'>
            <span>Search</span>
            <button  >search</button>
          </div>
        </div>
        <div class="user_list">
           
        </div>
      <hr>
    </div>
    <script src="js/user.js"></script>
</body>
</html>