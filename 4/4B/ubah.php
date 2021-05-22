<?php 
    require 'functions.php';

    //ambil data di URL
    $id = $_GET["id"];
    

    //cek apakah tombol submit apakah sudah ditekan atau belum
    if(isset($_POST["submit"])) {

        //cek apakah data berhasil diubah atau tidak
        if (ubah($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href = '4.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal diubah');
                    document.location.href = '4.php';
                </script>
            ";
            
        }
        
    }
?>