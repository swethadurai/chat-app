<?php
session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    // Hash the password before querying the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT uniqueid, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['uniqueid'] = $row['uniqueid'];
            echo "success";
        } else {
            echo "Email or password is incorrect";
        }
    } else {
        echo "Email or password is incorrect";
    }
} else {
    echo "All fields are required";
}
?>
