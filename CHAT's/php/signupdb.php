<?php
session_start();
include_once "config.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email='{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email already exists";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ['png', 'jpeg', 'jpg'];
                if (in_array($img_ext, $extensions) === true) {
                    $time = time();
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                        $status = "Active now";
                        $random_id = rand(time(), 10000000);
                        // Hash the password before storing it
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        // Fix SQL syntax error and use prepared statements
                        $stmt = $conn->prepare("INSERT INTO users(uniqueid, fname, lname, email, password, img, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("issssss", $random_id, $fname, $lname, $email, $hashed_password, $new_img_name, $status);
                        if ($stmt->execute()) {
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['uniqueid'] = $row['uniqueid'];
                                echo "success";
                            }
                        } else {
                            echo "something went wrong";
                        }
                    }
                } else {
                    echo "select image file with jpg,jpeg,png images";
                }
            } else {
                echo "please select an img file";
            }
        }
    } else {
        echo "$email - this is not a valid email";
    }
} else {
    echo "all fields are required";
}
?>
