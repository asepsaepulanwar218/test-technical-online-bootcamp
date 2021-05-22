<?php
require 'functions.php';

    //cek apakah tombol submit apakah sudah ditekan atau belum
    if(isset($_POST["submit"])) {


        //cek apakah data berhasil ditambahkan atau tidak
        if (tambah($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
            
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data Buku</title>
</head>
<body>
    <h1>Tambah Data Buku</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="name">Nama Buku :</label>
                <input type="text" name="name" id = "name" required>
            </li>
            <li>
                <label for="category_id">Category ID :</label>
                <input type="number" name="category_id" id = "category_id" required>
            </li>
            <li>
                <label for="writer_id">Writer ID :</label>
                <input type="text" name="writer_id" id = "writer_id" required>
            </li>
            <li>
                <label for="publication_year">Tahun Terbit :</label>
                <input type="text" name="publication_year" id = "publication_year" required>
            </li>
            <li>
                <label for="img">Gambar :</label>
                <input type="file" name="img" id = "img">
            </li>
            <li>
                <button type="submit" name ="submit">Tambah data</button>
            </li>
        </ul>
    
    </form>
</body>
</html>