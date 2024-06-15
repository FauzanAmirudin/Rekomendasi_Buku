<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Navbar</title>
    <link rel="stylesheet" href="../css/style.css">

    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.navbar {
    background-color: #333;
    color: white;
    padding: 10px 0;
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.navbar-brand {
    font-size: 24px;
    text-decoration: none;
    color: white;
}

.navbar-menu {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.navbar-menu li {
    margin-left: 20px;
}

.navbar-menu a {
    text-decoration: none;
    color: white;
    padding: 8px 16px;
    transition: background-color 0.3s;
}

.navbar-menu a:hover {
    background-color: #575757;
    border-radius: 4px;
}

#home, #kategori, #buku {
    padding: 20px;
    max-width: 1200px;
    margin: 20px auto;
}

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-brand">Rekomendasi Buku</a>
            <ul class="navbar-menu">
                <li><a href="../adminpanel">Home</a></li>
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="buku.php">Buku</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

</body>
</html>
