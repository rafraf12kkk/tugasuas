<?php
include 'session.php';
require 'conn.php';

require_once('layout/header.php');
require_once('layout/navbar.php');

$jumlahkategori = 0;

if (isset($_POST['simpan_kategori'])) {
    $nama = $_POST['kategori'];
    $insert = "INSERT INTO kategori (nama) VALUES (?)";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param("s", $nama);

    if ($stmt->execute()) {
        echo "BERHASIL MENAMBAHKAN DATA";
        echo '<meta http-equiv="refresh" content="1;url=kategori.php">';
    } else {
        echo "Ooppss, tidak dapat menambah data. Error: " . $stmt->error;
    }

    $stmt->close();
}

$queryKategory = mysqli_query($conn, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($queryKategory);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
      body {
    font-family: 'Arial', sans-serif;
    background-color: #3498db; /* Updated background color */
    margin: 0;
    padding: 0;
    color: #fff; /* Updated text color to white */
}

.container-fluid {
    margin-top: 20px;
}

h3 {
    color: #1abc9c; /* Updated heading color to a green shade */
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 10px; /* Increased margin-bottom for labels */
    color: #fff; /* Updated label text color to white */
}

input[type="text"] {
    width: 100%;
    padding: 10px; /* Increased padding for better input spacing */
    margin-bottom: 20px; /* Increased margin-bottom for better input spacing */
    border: 2px solid #3498db; /* Updated border color to match background */
    border-radius: 8px; /* Increased border-radius for rounded corners */
    box-sizing: border-box;
}

.btn-primary,
.btn-danger {
    border-radius: 8px;
    cursor: pointer;
    padding: 10px 20px; /* Adjusted padding for buttons */
    text-decoration: none; /* Removed default underline for links */
    color: #fff; /* Button text color */
}

.btn-primary:hover {
    background-color: #2980b9; /* Darker blue for button hover */
}

th {
    background-color: #ecf0f1; /* Lighter background color for table headers */
}

tr:hover {
    background-color: #bdc3c7; /* Lighter background color for table rows on hover */
}

.btn-danger:hover {
    background-color: #e74c3c; /* Darker red for button hover */
}

    </style>
    <?php require_once('layout/navbar.php'); ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="my-2">
                <h3>Tambah Kategori</h3>
                <form action="" method="post">
                    <div>
                        <label for="kategori">Kategori</label>
                        <input type="text" id="kategori" name="kategori" placeholder="Input Nama Kategori"
                            class="form-control">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit" name="simpan_kategori">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-2">
            <h2>List Kategori</h2>
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAMA</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlahkategori == 0) {
                            ?>
                            <tr>
                                <td colspan="3" class="text-center">Data Kategori tidak tersedia</td>
                            </tr>
                        <?php
                        } else {
                            $jumlah = 1;
                            while ($row = mysqli_fetch_assoc($queryKategory)) {
                                ?>
                                <tr class="hover">
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td align="center">
                                        <a href="hps_kategori.php?id=<?php echo md5($row['id']); ?>"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                $jumlah++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
