<?php
require_once('settings.php');

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Delete EOI
    if (isset($_POST['delete_eoi'])) {
        $eoi_number = intval($_POST['eoi_number']);
        $deleteSQL = "DELETE FROM eoi WHERE EOInumber = $eoi_number";
        if (mysqli_query($conn, $deleteSQL)) {
            echo "<p>EOI #$eoi_number has been deleted successfully.</p>";
        } else {
            echo "<p>Error deleting EOI: " . mysqli_error($conn) . "</p>";
        }
    }

if (isset($_POST['update_status'])) {
    $eoi_number = intval($_POST['eoi_number']);
    $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);
    $updateSQL = "UPDATE eoi SET status = '$new_status' WHERE EOInumber = $eoi_number";
    if (mysqli_query($conn, $updateSQL)) {
        echo "<p>Status of EOI #$eoi_number has been updated to $new_status.</p>";
    } else {
        echo "<p>Error updating status: " . mysqli_error($conn) . "</p>";
    }
}
}

$sortField = isset($_POST['sort_field']) ? $_POST['sort_field'] : 'eoi_number';
$searchTerm = isset($_POST['search_term']) ? $_POST['search_term'] : '';
$validFields = ['EOInumber', 'firstname', 'lastname', 'job_reference', 'status'];

if (!in_array($sortField, $validFields)) {
    $sortField = 'EOInumber';
}

$query = "SELECT * FROM eoi";

if (!empty($searchTerm)) {
    $query .= " WHERE job_reference LIKE '%$searchTerm%' 
                OR firstname LIKE '%$searchTerm%' 
                OR lastname LIKE '%$searchTerm%'";
}


$query .= " ORDER BY $sortField";


$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error fetching records: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage EOIs</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/manage.css"> 
</head>
<body>
    <header>
        <div class="logo-container">
            <img id="logo" src="images/logo.png" alt="MassiveHard Logo" style="max-width: 50px;">
            <h1>MassiveHard Recruitment Platform</h1>
        </div>
    </header>
    <?php include 'menu.inc'; ?>
    <h1>Manage EOIs</h1>
    <!-- Search Form -->
    <form method="POST">
        <label for="search_term">Search:</label>
        <input type="text" name="search_term" id="search_term" placeholder="Search by name or job ref" value="<?php echo htmlspecialchars($searchTerm); ?>">
        <label for="sort_field">Sort By:</label>
        <select name="sort_field" id="sort_field">
            <option value="EOInumber" <?php echo $sortField === 'EOInumber' ? 'selected' : ''; ?>>EOI Number</option>
            <option value="firstname" <?php echo $sortField === 'firstname' ? 'selected' : ''; ?>>First Name</option>
            <option value="lastname" <?php echo $sortField === 'lastname' ? 'selected' : ''; ?>>Last Name</option>
            <option value="job_reference" <?php echo $sortField === 'job_reference' ? 'selected' : ''; ?>>Job Reference</option>
            <option value="status" <?php echo $sortField === 'status' ? 'selected' : ''; ?>>Status</option>
        </select>
        <button type="submit">Search & Sort</button>
    </form>

    
    <table>
        <thead>
            <tr>
                <th>EOI Number</th>
                <th>Job Reference</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['EOInumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['job_reference']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>
                        <form method='POST' style='display:inline;'>
                            <input type='hidden' name='eoi_number' value='{$row['EOInumber']}'>
                            <select name='new_status'>
                                <option value='New'" . ($row['status'] === 'New' ? ' selected' : '') . ">New</option>
                                <option value='Current'" . ($row['status'] === 'Current' ? ' selected' : '') . ">Current</option>
                                <option value='Final'" . ($row['status'] === 'Final' ? ' selected' : '') . ">Final</option>
                            </select>
                            <button type='submit' name='update_status'>Update</button>
                        </form>
                    </td>";
                    echo "<td>
                        <form method='POST' style='display:inline;'>
                            <input type='hidden' name='eoi_number' value='{$row['EOInumber']}'>
                            <button type='submit' name='delete_eoi'>Delete</button>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

<?php
mysqli_close($conn);
?>
<?php include 'footer.inc'; ?>