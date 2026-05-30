<?php
// seed_admin.php
// This script seeds a default admin user into the tbl_login table.
// Adjust the username and password as needed.

require_once "Dboperation.php";

$adminUsername = "admin"; // default admin username
$adminPassword = "admin123"; // default admin password (plain text, as used by LoginAction)

$db = new dboperation();

// Check if admin user already exists
$checkQuery = "SELECT * FROM tbl_login WHERE Username='$adminUsername'";
$checkResult = $db->executequery($checkQuery);
if (mysqli_num_rows($checkResult) > 0) {
    echo "Admin user already exists. No action taken.\n";
    exit;
}

// Insert admin user
$insertQuery = "INSERT INTO tbl_login (Username, Password) VALUES ('$adminUsername', '$adminPassword')";
if ($db->executequery($insertQuery)) {
    echo "Admin user seeded successfully.\n";
} else {
    echo "Failed to seed admin user. Error: " . mysqli_error($db->con) . "\n";
}
?>
