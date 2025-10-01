<?php
    require "functions.php";

    $filename = $_GET['file_path'];

    $data = array();
    $data[] = read_csv_rows($filename);
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
                echo("<tr>");
                foreach($row as $column) {
                    echo("<td>" . esc_html($column) . "</td>");
                }
                echo("</tr>");
            }
        ?>
    </table>
</body>
</html>