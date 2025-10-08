<?php
    $includesPath = __DIR__ . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "functions.php";
    // $viewPath = __DIR__ . DIRECTORY_SEPARATOR . "view.php";

    require $includesPath;

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $destDir = __DIR__ . DIRECTORY_SEPARATOR . "data";
        if (!is_dir($destDir)) {
            mkdir($destDir, 0775, true);
        }

        $destFile = $destDir . DIRECTORY_SEPARATOR . $_FILES['csv-upload']['name'];

        $success = move_uploaded_file($_FILES['csv-upload']['tmp_name'], $destFile);
        // echo("<p>$success</p>");
        if ($success) {
            $checkWrite = write_csv_rows($destFile, $rows);
            if ($checkWrite) {
            } else {
                echo ("<p>Failed to write.</p>");
            }
        } else {
            echo ("<p>Failed to move file.</p>");
        }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your File is Uploading...</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>Your File is Uploading...</h1>
    <p><strong>Please wait patiently.</strong></p>
    <?php
    if ($success && $checkWrite) {
        echo ("<a href=\"$viewPath?&file_path=$destFile\">Your file has been successfully uploaded, view it here.</a>");
    } else {
        if (!$success) {
            echo ("<p class=\"warning\"><em>There was issues moving your file.</em></p>");
        } else {
            echo ("<p class=\"warning\"><em>There was issues writing your file.</em></p>");
        }
        echo ("<a href=\"index.php\">Something went wrong. Please try again.</a>");
    }
    ?>
</body>

</html>