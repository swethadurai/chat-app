<?php 
 while ($row = mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['uniqueid']}
    OR outgoing_msg_id = {$row['uniqueid']}) AND (outgoing_msg_id = {$outgoing_id} 
    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
$query2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($query2);
(mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
(strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
if(isset($row2['outgoing_msg_id'])){
($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
}else{
$you = "";
}
($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
    $output.='<a href="chat.php?userid='.$row['uniqueid'].'" style="text-decoration: none;
    color: #000;"> <div class="row mt-4">
    <div class="col-md-3">
        <img src="php/images/'. $row['img'] . '?>" alt="" width="80px" height="80px">
    </div>
    <div class="col-md-6">
        <h5>'.$row['fname']." " .$row['lname'].'</h5>
       <p>active now</p>
    </div>
    <div class="col-md-3">
        
    </div>
</div><hr>';
}
?>