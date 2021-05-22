<?php
    require 'functions.php';

    if(isset($_POST["submit"])) {


      //cek apakah data berhasil ditambahkan atau tidak
      if (tambah($_POST) > 0) {
          echo "
              <script>
                  alert('data berhasil ditambahkan');
                  document.location.href = '4.php';
              </script>
          ";
      } else {
          echo "
              <script>
                  alert('data gagal ditambahkan');
                  document.location.href = '4.php';
              </script>
          ";
          
      }
      
  }

  if(isset($_POST["submitCat"])) {


    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahCat($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = '4.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = '4.php';
            </script>
        ";
        
    }
    
}


if(isset($_POST["submitWrit"])) {


  //cek apakah data berhasil ditambahkan atau tidak
  if (tambahWrit($_POST) > 0) {
      echo "
          <script>
              alert('data berhasil ditambahkan');
              document.location.href = '4.php';
          </script>
      ";
  } else {
      echo "
          <script>
              alert('data gagal ditambahkan');
              document.location.href = '4.php';
          </script>
      ";
      
  }
  
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Dumb Library</title>
  </head>
  <body class="bg-secondary">
    <nav class="navbar fixed-top navbar-dark bg-dark">
      <div class="container">
        <h1 class="navbar-brand fw-bold">Dumb Library</h1>
        <a href="#" class="nav-item" ></a><a href="#" class="nav-item" ></a>
        <a href="#" class="nav-item" ></a><a href="#" class="nav-item" ></a>
        <a href="#" class="nav-item" ></a><a href="#" class="nav-item" ></a>
        <a href="#" class="nav-item" ></a><a href="#" class="nav-item" ></a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbook">
          Add Book
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategory">
          Add Category
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWriter">
          Add Writer
        </button>
      </div>
    </nav>

    
    <?php $i = 1; ?>
    <?php while ( $book = mysqli_fetch_assoc($result)) : ?>
      

    <div class="container mt-5"> 
    <div class="card m-2 me-5 mt-5" style="width: 22rem; float:left; height:500px;">
      <img src="img/<?= $book["img"]; ?>" class="card-img-top" height=350px>
      <div class="card-body">
        <h5 class="card-title text-danger"><?= $book["name"]; ?></h5>
        <p class="card-text fw-bold">Tahun <?= $book["publication_year"]; ?></p>
        <a href="detail.php?page=detail&id=<?php echo $book['id']; ?>" class="btn btn-primary text-end">Lihat Detail</a>
      </div>
     </div>
    </div>
                        
     <?php $i++ ?>
     
     <?php endwhile; ?>




    <!-- Modal book-->
    <div class="modal fade" id="addbook" tabindex="-1" aria-labelledby="addbookLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addbookLabel">Tambah Data Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Buku</label>
                <input type="text" class="form-control" name="name" id="name" required>
              </div>
              <div class="mb-3">
                <label for="category_id" class="form-label">Category ID</label>
                <input type="number" class="form-control" name="category_id" id = "category_id" required>
              </div>
              <div class="mb-3">
                <label for="writer_id" class="form-label">Writer ID</label>
                <input type="text" class="form-control" name="writer_id" id = "writer_id" required>
              </div>
              <div class="mb-3">
                <label for="publication_year" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" name="publication_year" id = "publication_year" required>
              </div>
              <div class="mb-3">
                <label for="img" class="form-label">Gambar</label>
                <input type="file" class="form-control" name="img" id = "img">
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name ="submit">Tambah data</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal category-->
    <div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="addcategoryLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addcategoryLabel">Tambah Data Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="name" id="name" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name ="submitCat">Tambah data</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Writer-->
    <div class="modal fade" id="addWriter" tabindex="-1" aria-labelledby="addWriterLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addWriterLabel">Tambah Data Penulis</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Penulis</label>
                <input type="text" class="form-control" name="name" id="name" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name ="submitWrit">Tambah data</button>
          </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>