<?php
session_start();
if (isset($_SESSION['uniqueid'])) {
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM message LEFT JOIN users ON users.uniqueid = message.outgoing_msg_id
    WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
    OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ";
    $query = mysqli_query($conn, $sql);
  
if (!$query) {
    // Output the error message and SQL query to identify the issue
    echo "Error: " . mysqli_error($conn);
    echo "Query: " . $sql;
    exit(); // Terminate script execution
}
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="php/images/' . $row['img'] . '" alt="">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text" style="height:10px">No messages are available. Once you send a message, it will appear here.</div>';
    }
    echo $output;
} else {
    header("location: ../login.php");
}
?>
