<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['uniqueid'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>schat home</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
	<link rel="stylesheet" href="css/index.css">
    <style>
        .chat_box{
            position: relative;
  min-height: 500px;
  max-height: 500px;
  overflow-y: auto;
  padding: 10px 30px 20px 30px;
  background: #f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);

 
}
.chat_box .outgoing{
  display: flex;
}
.chat_box .outgoing .details{
  margin-left: auto;
  max-width: calc(100% - 130px);
}
.outgoing .details p{
  background: #333;
  color: #fff;
  border-radius: 18px 18px 0 18px;
  padding:20px;
}
.chat_box .incoming{
  display: flex;
  align-items: flex-end;
}
.chat_box .incoming img{
  height: 35px;
  width: 35px;
}
.chat_box .incoming .details{
  margin-right: auto;
  margin-left: 10px;
  max-width: calc(100% - 130px);
}
.incoming .details p{
  background: #fff;
  color: #333;
  border-radius: 18px 18px 18px 0;
}
        #wrapper{
    min-height: 600px;
    max-width: 100%;
    display: flex;
    margin:auto;
    color:white;

        }
        #left_side{
            min-height: 700px;
            background-color: #06444C;
            flex:1;
            text-align: center;
        }
        #left_side img{
            width: 80%;
            border:solid thin white;
            border-radius: 50%;
            margin: 10px;
        }
        #left_side label{
        width: 25%;
        height: 40px;
        display: block;
        font-size: 13px;
        background-color: #6D6D6D;
        border:solid thin #ffffff55;
            border-radius: 10%;
            align-content: center;
            margin: auto;
        
            cursor: pointer;
            transition: all 0.5s ease;
        }
        #left_side label:hover{
            border:solid thin white;
            background-color: #C5C6C6;
            font-size: 14px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
        }
        #right_side{
            flex:4;
        }
        #header_logo{
            background-color: #508A83;
            height: 70px;
            font-size: 40px;
            text-align: center;
            font-family: "Sofia", sans-serif;
        }
        .neonText {
        color: #fff;
        text-shadow:
        0 0 7px #fff,
        0 0 10px #fff,
        0 0 21px #fff,
        0 0 42px #0fa,
        0 0 82px #0fa,
        0 0 92px #0fa,
        0 0 102px #0fa,
        0 0 151px #0fa;
        }
        #container{
            display: flex;
        }
        #left_container{
            background-color: #6D6D6D;
            flex:1;
            min-height: 530px;
            transition: all 1s ease;
        }
        #right_container{
          
            flex:2;
           
            transition: all 1s ease;

        }
        #radio_contact:checked ~ #right_container{
            flex: 0;
        }
        #radio_chat:checked ~ #left_container{
            flex: 0!important;
        }
        #contacts{
        width: 200px;
        height: 240px;
        margin: 10px;
        display:inline-block;
        vertical-align: top;
        overflow: hidden;
        }
        #contacts img{
            width:90% ;

        }
       
            </style>
        </head>
     
<body>
	<div id="wrapper" >
        <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['userid']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE uniqueid = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: user.php");
          }
        ?>
        <div id="left_side" style="width:300px">
			<img src="php/images/<?php echo $row['img']?>">
			<i><h3><?php echo $row['fname']." " .$row['lname']?></h3><p><?php echo $row['status']?></p></i>
			<br>
            <div>
	           
	            <a href="user.php" style=" text-decoration:none;color:white">
                <label  id="label_contacts">contact <br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
</svg></label>
                </a><br>
	           

           </div>
			

		</div>
        </header>
		
		<div id="right_side" >
			<div id="header_logo"  class="neonText"> S Chat Box</div>
            <div class="chat_box" style="color:black;">
               
            </div>
            <form action="#" class="typing">
              <input type="text" name="outgoing_id" value="<?php echo$_SESSION['uniqueid'];?>" hidden>
              <input type="text" name="incoming_id" value="<?php echo$_SESSION['uniqueid'];?>" hidden>

                <input type="text" placeholder="msg" name="message" class="input-field">
                <button class="msgsend">send</button>
            </form>
			
		</div>

	</div>
 <script src="js/chat.js"></script>
</body>
</html>