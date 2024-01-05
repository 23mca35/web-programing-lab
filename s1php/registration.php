<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = clean_input($_POST["username"]);
    $email = clean_input($_POST["email"]);
    $pno= clean_input($_POST["pno"]);
    $password = clean_input($_POST["password"]);
    $confirm_password = clean_input($_POST["confirm_password"]);

    if (empty($username) || empty($email) || empty($password) || empty($pno) || empty($confirm_password)) {
        echo '<script>alert("All fields are required.")</script>';
    }
 elseif ($password !== $confirm_password) {
        echo '<script>alert("Passwords do not match.password must be at least 8 characters")</script>';
       
    } else {
        echo '<script>alert("Registration successful!")</script>';
    }
}

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>