<?php 
require 'functions.php';

$ID = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM book_tb WHERE id = $ID");
$data = mysqli_fetch_array($query);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container mt-5">
  <div class="row justify-content-md-center">
    <div class="col col-4">
    <div class="card" style="width: 22rem;">
    <img src="img/<?= $data["img"]; ?>" class="card-img-top" height=350px>
    <div class="card-body">
        <h5 class="card-title"><?= $data["name"]; ?></h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Nama Buku : <?= $data["name"]; ?></li>
        <li class="list-group-item">Id Kategori : <?= $data["category_id"]; ?></li>
        <li class="list-group-item">Id Penulis : <?= $data["writer_id"]; ?></li>
        <li class="list-group-item">Tahun Terbit : <?= $data["publication_year"]; ?></li>
    </ul>
    <div class="card-body">
        <a href="4.php" class="card-link">Kembali</a>
        <a href="hapus.php?id=<?= $data["id"]; ?>" onclick="return confirm('yakin ?');">hapus</a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubah">
          Ubah
        </button>
    </div>
    </div>
    </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ubah" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ubahLabel">Tambah Data Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id = "nama" value="<?= $book ["id"]?>">
            <input type="hidden" name="gambarLama" id = "gambarLama" value="<?= $book ["gambar"]?>">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Buku</label>
                <input type="text" class="form-control" name="name" id="name" required value="<?= $book ["name"]?>">
              </div>
              <div class="mb-3">
                <label for="category_id" class="form-label">Category ID</label>
                <input type="number" class="form-control" name="category_id" id = "category_id" required value="<?= $book ["category_id"]?>">
              </div>
              <div class="mb-3">
                <label for="writer_id" class="form-label">Writer ID</label>
                <input type="text" class="form-control" name="writer_id" id = "writer_id" required value="<?= $book ["writer_id"]?>">
              </div>
              <div class="mb-3">
                <label for="publication_year" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" name="publication_year" id = "publication_year" required  value="<?= $book ["publication_year"]?>">
              </div>
              <div class="mb-3">
                <<label for="gambar" class="form-label">Gambar</label><br>
                <img src="img/<?= $brg["gambar"]; ?>" width="50"><br>
                <input type="file" name="gambar" id = "gambar" class="form-control">
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name ="submit">Ubah</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>




