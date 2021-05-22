<?php
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "dumb_library");
    
    //ambil data dari tabel book_tb
    $result = mysqli_query($conn, "SELECT * FROM book_tb");

    $writer = mysqli_query($conn, "SELECT * FROM writter_tb WHERE writter_tb.id = book_tb.writer_id");


    //fungsi tambah
    function tambah ($data) {
        global $conn;
        $nama = htmlspecialchars($_POST["name"]);
        $categori = htmlspecialchars($_POST["category_id"]);
        $writer = htmlspecialchars($_POST["writer_id"]);
        $tahun = htmlspecialchars($_POST["publication_year"]);

        //upload gambar
        $img = upload();
        if(!$img) {
            return false;
        }

        $query = "INSERT INTO book_tb
                    VALUES
                    ('', '$nama', '$categori', '$writer', '$tahun', '$img')
                    ";
        mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    }

    //fungsi upload
    function upload () {
        $namaFile = $_FILES['img']['name'];
        $ukuranFile = $_FILES['img']['size'];
        $error = $_FILES['img']['error'];
        $tmpName = $_FILES['img']['tmp_name'];

        //cek apakah tidak ada gambar yg diupload
        if($error ===4) {
            echo "<script>
                    alert('Upload gambar terlebih dahulu');
                </script>";
            return false;
        }

        //cek apakah yg di upload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('Yang Anda Upload bukan Gambar');
                </script>";
            return false;
        }

        //cek ukuran file
        if($ukuranFile > 1000000) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar');
                </script>";
            return false;
        }

        //lolos pengecekan gambar siap diupload
        //generate nama gambar
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

        return $namaFileBaru;

    }


    //fungsi hapus
    function hapus($idh) {
        global $conn;
        mysqli_query($conn, "DELETE FROM book_tb WHERE id = $idh");

        return mysqli_affected_rows($conn);  
    }


    //fungsi ubah
    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nm_barang = htmlspecialchars($_POST["nm_barang"]);
        $quantity = htmlspecialchars($_POST["quantity"]);
        $kriteria = htmlspecialchars($_POST["kriteria"]);
        $gambarLama = htmlspecialchars($_POST["gambarLama"]);

        //cek apakah user pilih gambar baru atau tidak 
        if($_FILES['gambar']['error'] ===4) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }

        $query = "UPDATE barang SET
                    nm_barang = '$nm_barang',
                    quantity = '$quantity',
                    kriteria = '$kriteria',
                    gambar = '$gambar'
                WHERE id = $id
                    ";

        mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    }


    //fungsi tambah Category
    function tambahCat ($data) {
        global $conn;
        $nama = htmlspecialchars($_POST["name"]);

        $query = "INSERT INTO category_tb
                    VALUES
                    ('', '$nama')
                    ";
        mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    }


    //fungsi tambah Writer
    function tambahWrit ($data) {
        global $conn;
        $nama = htmlspecialchars($_POST["name"]);

        $query = "INSERT INTO writter_tb
                    VALUES
                    ('', '$nama')
                    ";
        mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    }
    

?>