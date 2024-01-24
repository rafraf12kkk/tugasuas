<?php require_once('layout/header.php'); ?>
<?php require_once('layout/navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataProduk</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        color: #333; /* Default text color */
    }

    header {
        background-image: linear-gradient(45deg, #1c7ed6 0%, #60e7fd 100%);
        color: #fff;
        text-align: center;
        padding: 20px 0;
    }

    nav {
        background-color: #333;
        padding: 10px;
        text-align: center;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        margin: 0 8px;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    nav a:hover {
        background-color: #555;
    }

    section {
        margin: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #444;
        color: #fff;
    }

    th:first-child,
    td:first-child {
        border-left: none;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    /* Set the color for PHP text */
    .php-text {
        color: #FF0000; /* Change to your desired color */
    }
</style>

</head>

<body>
    <header>
        <h1>Data Produk</h1>
    </header>

    <?php require_once('layout/navbar.php'); ?>

    <section id="kategori">
        <h2>Kategori</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conn.php'; // Update this with your database connection file

                $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
                $no = 1;
                while ($rowKategori = mysqli_fetch_assoc($queryKategori)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td class='php-text'>" . $rowKategori['nama'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section id="produk">
        <h2>Produk</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $queryProduk = mysqli_query($conn, "SELECT * FROM produk");
                $no = 1;
                while ($rowProduk = mysqli_fetch_assoc($queryProduk)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td class='php-text'>" . $rowProduk['nama'] . "</td>";
                    echo "<td class='php-text'>" . $rowProduk['harga'] . "</td>";
                    echo "</tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>
