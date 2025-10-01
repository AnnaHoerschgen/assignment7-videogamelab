<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Game Store</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Video Game Store</h1>
    <br>

    <h2>Upload Form</h2>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <p><strong>Upload a database containing video game stock <em>[AS A .CSV]</em></strong></p>
        <input type="file" name="csv-upload" accept=".csv,text/csv">
        <p></p>

        <button name="submit">Upload</button>
    </form>
</body>
</html>