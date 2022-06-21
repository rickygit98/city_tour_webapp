<?php 
    require_once "layouts/header.php";

    $sites = show($_GET['id']);

    if(isset($_POST['btnUpdate'])){
        // Feedback Check
       if(update($_POST)>0){
           echo ("
                <script>
                    alert('data berhasil diubah');
                    document.location.href='index.php';
                </script>
           ");
       }
       else{
        echo ("
                <script>
                    alert('data gagal diubah');
                    document.location.href='index.php';
                </script>
        ");
       }
    }

?>

<div class="form my-3">

    <h2>Tambah Lokasi Baru</h2>

    <form action="" method="post" enctype="multipart/form-data" class="w-50">
    <input type="hidden" name="id" id="id" value=<?= $_GET['id']; ?>>

    <input type="hidden" name="oldImg" id="oldImg" value=<?= $sites['gambar']; ?>>

        <!-- Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="<?= $sites['nama']; ?>">
        </div>
        <!-- Caption -->
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <input type="text" name="caption" class="form-control" id="caption" value="<?= $sites['caption']; ?>">
        </div>
        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" rows="3"><?= $sites['deskripsi'];?></textarea>
        </div>
        <!-- Lokasi -->
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi" value="<?= $sites['lokasi']; ?>">
        </div>
        <!-- Gambar -->
        <div class="mb-3">
            <label for="gambar" class="form-label">Foto Lokasi</label>
            <div class="mb-1">
                <img src="img/<?= $sites['gambar']; ?>" alt="<?= $sites['gambar']; ?>" srcset="" width="150px">
            </div>
            <input class="form-control" type="file" id="gambar" name="gambar">
        </div>
        
        <!-- Filter -->
        <select class="form-select" name="inputFilter" id="inputFilter" aria-label="Default select example">
            <option selected value="nofilter">No Filter</option>
            <option value="filter1">filter1</option>
            <option value="filter2">filter2</option>
            <option value="filter3">filter3</option>
            <option value="filter4">filter4</option>
        </select>

        <!-- Submit -->

    <div class="d-flex bd-highlight my-3">
        <a href="index.php" class="btn btn-primary me-auto p-2 bd-highlight">Back to home</a>
        <button type="reset" name="reset" id="reset" class="p-2 bd-highlight btn btn-danger me-1">Reset</button>
        <button  type="submit" name="btnUpdate" id="btnUpdate" class="p-2 bd-highlight btn btn-primary">Update Detail Lokasi</button>
    </div>
        
    </form>
</div>

<?php require_once 'layouts/footer.php'; ?>