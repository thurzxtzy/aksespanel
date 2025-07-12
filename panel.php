<?php
// Enable error reporting for troubleshooting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $web = $_POST['WEB'];

    // Sanitize input to remove any unwanted characters
    $web = preg_replace('/[^a-zA-Z0-9_\-]/', '', $web);

    // Set the target directory
    $targetDir = __DIR__ . "/$web";

    // Check if the directory already exists
    if (is_dir($targetDir)) {
        echo "Directory already exists!";
    } else {
        // Create the new directory
        if (mkdir($targetDir, 0755, true)) {
            // Path to the zip file
            $zipFile = __DIR__ . '/peka.zip'; // Replace 'template.zip' with the actual zip file name

            // Open the zip file
            $zip = new ZipArchive;
            if ($zip->open($zipFile) === TRUE) {
                // Extract contents to the newly created directory
                $zip->extractTo($targetDir);
                $zip->close();

                // Redirect to panelmu.php (use absolute path if necessary)
                header("Location: /panelmu.php?web=" . urlencode($web));
                exit();
            } else {
                echo "Failed to open the zip file.";
            }
        } else {
            echo "Failed to create directory.";
        }
    }
}
?>