<?php 
while ($row = mysqli_fetch_assoc($query)) {

$output .= '<a href="chat.php?userid='.$row['uniqueid'].'" style="text-decoration: none; color: #000;"> 
        <div class="row mt-4">
            <div class="col-md-3">
                <img src="php/images/'. $row['img'] . '" alt="" width="80px" height="80px">
            </div>
            <div class="col-md-6">
                <h5>'.$row['fname']." " .$row['lname'].'</h5>
                <p>'. $msg .'</p>
            </div>
            <div class="col-md-3"></div>
        </div>
        <hr>';
}
?>
