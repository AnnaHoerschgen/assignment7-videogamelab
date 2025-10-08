<?php
$includesPath = __DIR__ . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "functions.php";
require $includesPath;

// SAFELY get the file path from query string
$filename = $_GET['file-path'] ?? null;

if (!$filename) {
    echo "<p class='error'>No file specified in URL. Please upload a file first.</p>";
    exit;
}

// echo("<p>Loading file: $filename</p>");

$data = read_csv_rows($filename);
print_r($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Game Store</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <table border="1" cellpadding="6">
        <tr>
            <th>Game ID</th>
            <th>Title</th>
            <th>Console</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
        <?php
            foreach ($data as $row) {
            // foreach ($game as $row) {
                echo ("
                    <tr>
                        <td>" . esc_html($row[0]) . "</td>
                        <td>" . esc_html($row[1]) . "</td>
                        <td>" . esc_html($row[2]) . "</td>
                        <td>" . esc_html($row[3]) . "</td>
                        <td><img src=\"img/" . esc_html($row[4]) . "\" width=\"250px\"></td>
                    </tr>
                ");
            }
        ?>
    </table>
    <a href="index.php">Return to home</a>
</body>

</html>