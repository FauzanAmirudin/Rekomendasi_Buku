<?php
include 'databse.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $body = $_POST['body'];

    $targetDir = "../img/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'jpeg', 'png');
    if (!in_array($fileType, $allowTypes)) {
        echo "Only JPG, JPEG, and PNG files are allowed.";
        exit();
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO books (title, author, category, body, image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $title, $author, $category, $body, $fileName);

        if ($stmt->execute()) {
            echo "Book added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading file.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="css/homepage.css">
</head>
<body>
    <header>
        <div class="header-left">
            <h1>REKOMENDASI BUKU</h1>
        </div>
    </header>
    <main>
        <section class="add-book-section">
            <h2>Add New Book</h2>
            <form action="create.php" method="post" enctype="multipart/form-data">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" required><br><br>

                <label for="author">Author:</label><br>
                <input type="text" id="author" name="author" required><br><br>

                <label for="category">Category:</label><br>
                <select id="category" name="category" required>
                    <option value="recommended">Recommended</option>
                    <option value="popular">Popular</option>
                </select><br><br>

                <label for="body">Body:</label><br>
                <textarea id="body" name="body" rows="4" cols="50" required></textarea><br><br>

                <label for="image">Cover Image:</label><br>
                <input type="file" id="image" name="image" accept="image/jpeg, image/png" required><br><br>

                <input type="submit" value="Add Book">
            </form>
        </section>
    </main>
</body>
</html>
