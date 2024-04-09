<?php
include_once "config.php";

if (isset($_POST['searchTerm'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";

    // Prepare the SQL statement using a prepared statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE fname LIKE ? OR lname LIKE ?");
    $searchTermParam = "%{$searchTerm}%";
    $stmt->bind_param("ss", $searchTermParam, $searchTermParam);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display the results
        while ($row = $result->fetch_assoc()) {
            $output.='<a href="chat.php?userid='.$row['uniqueid'].' " style="text-decoration: none;
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
        </div>
        <hr>';
            // You can add more user details here if needed
        }
    } else {
        $output = 'No user found related to your search term';
    }

    echo $output;
} else {
    echo "No search term provided";
}
?>
