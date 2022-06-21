<?php 
    require_once "layouts/header.php";
    
    // Default State
    $tour_sites = get();

    // Button Delete
    if(isset($_POST['btnDelete'])){
        // Feedback Check
       if(delete($_POST['id'])>0){
        echo ("
             <script>
                 alert('data berhasil dihapus');
                 document.location.href='index.php';
             </script>
        ");
        }
        else{
        echo ("
                <script>
                    alert('data gagal dihapus');
                    document.location.href='index.php';
                </script>
        ");
        }

    }

    // Button Search
    if(isset($_POST['btnSearch'])){
        $tour_sites = search($_POST['keyword']);
    }

    
?>

<div class="card text-center my-3">
  <div class="card-header">
    Hi! , Welcome Back
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $_SESSION['nama']; ?></h5>
    <p class="card-text">Happy browsing and have a nice day</p>
    <a href="upload.php" class="btn btn-primary">Tambahkan Tour Site Baru!</a>
  </div>
  <div class="card-footer text-muted">
    <?= $_SESSION['email']; ?> 
  </div>
</div>


<form action="" method="post">
<div class="input-group mb-3 w-50">
        <input type="text" name="keyword" id="keyword" placeholder="Masukkan keyword pencarian" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" autofocus autocomplete="off">
        <button class="btn btn-primary" type="submit" name="btnSearch" id="button-addon2">Search</button>
    </div>
</form>


<h1>Daftar Tempat Wisata</h1>

<div class="row row-cols-1 row-cols-md-3 g-4 my-3">
    <?php foreach($tour_sites as $ts): ?>
        <div class="col">
            <div class="card h-100">
                <img src="img/<?= $ts['gambar']; ?>" alt="sites.jpg" class="card-img-top h-50">
                <div class="card-body">
                    <h5 class="card-title"><?= $ts['nama']; ?></h5>
                    <p class="card-text"><?= $ts['caption']; ?></p>
                </div>
                <div class="card-footer">
                    <form action="" method="post">
                        <input type="hidden" name="id" value=<?= $ts['id']; ?>>
                        <a href="update.php?id=<?= $ts['id']; ?>" class="badge bg-warning text-decoration-none p-2">Update</a>
                        <a href="show.php?id=<?= $ts['id']; ?>" class="badge bg-primary text-decoration-none p-2">Cek Lokasi</a>
                        <button type="submit" name="btnDelete" onclick="return confirm('Yakin ingin menghapus data?')" class="d-inline badge bg-danger border-0 p-2"> Delete </button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach?>
</div>


<?php require_once 'layouts/footer.php';?>