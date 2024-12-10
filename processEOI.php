<?php
require_once('settings.php'); 


$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$createTableSQL = "
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    job_reference VARCHAR(5) NOT NULL,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    street_address VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    state ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT') NOT NULL,
    postcode CHAR(4) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone_number VARCHAR(12) NOT NULL,
    skills TEXT NOT NULL,
    other_skills TEXT,
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
);";

mysqli_query($conn, $createTableSQL);


function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_reference = sanitize_input($_POST['job_reference']);
    $firstname = sanitize_input($_POST['firstname']);
    $lastname = sanitize_input($_POST['lastname']);
    $street_address = sanitize_input($_POST['street_address']);
    $suburb = sanitize_input($_POST['suburb']);
    $state = sanitize_input($_POST['state']);
    $postcode = sanitize_input($_POST['postcode']);
    $email = sanitize_input($_POST['email']);
    $phone_number = sanitize_input($_POST['phone_number']);
    $skills = isset($_POST['skills']) ? implode(', ', $_POST['skills']) : '';
    $other_skills = sanitize_input($_POST['other_skills']);

   
    $errors = "";

    if (!preg_match("/^[A-Za-z0-9]{5}$/", $job_reference)) {
        $errors .= "<p>Job reference must be exactly 5 alphanumeric characters.</p>";
    }

    if (!preg_match("/^[A-Za-z]{1,20}$/", $firstname)) {
        $errors .= "<p>First name must be max 20 alphabetic characters.</p>";
    }

    if (!preg_match("/^[A-Za-z]{1,20}$/", $lastname)) {
        $errors .= "<p>Last name must be max 20 alphabetic characters.</p>";
    }

    if (!preg_match("/^[0-9]{4}$/", $postcode)) {
        $errors .= "<p>Postcode must be exactly 4 digits.</p>";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= "<p>Invalid email format.</p>";
    }

    if (!preg_match("/^[0-9 ]{8,12}$/", $phone_number)) {
        $errors .= "<p>Phone number must be between 8 and 12 digits.</p>";
    }

    if ($errors) {
        echo "<h3>Validation Errors:</h3>" . $errors;
        exit;
    }


    $insertSQL = "
    INSERT INTO eoi (job_reference, firstname, lastname, street_address, suburb, state, postcode, email, phone_number, skills, other_skills)
    VALUES ('$job_reference', '$firstname', '$lastname', '$street_address', '$suburb', '$state', '$postcode', '$email', '$phone_number', '$skills', '$other_skills');
    ";

    if (mysqli_query($conn, $insertSQL)) {
        $last_id = mysqli_insert_id($conn); 
        echo "<h3>Application Submitted Successfully!</h3>";
        echo "<p>Your EOI Number is: $last_id</p>";
    } else {
        echo "<h3>Error:</h3> " . mysqli_error($conn);
    }
} else {
    header("Location: apply.php");
    exit;
}

mysqli_close($conn);
?>
