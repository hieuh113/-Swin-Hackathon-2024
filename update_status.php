<?php
include 'settings.php';

$id = $_GET['id'];
$status = $_GET['status'];

$query = "UPDATE eoi SET status='$status' WHERE EOInumber=$id";

if (mysqli_query($conn, $query)) {
    echo "<p>Status updated successfully!</p>";
} else {
    echo "<p>Error updating record: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
}
mysqli_close($conn);
?>

<a href="manage.php">Back to Manage Applications</a>
