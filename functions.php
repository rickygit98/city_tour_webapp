<?php 
require_once 'database.php';
require_once 'filter.php';
require_once 'reviews.php';

$table = 'tour_sites';

function get(){
    global $table;

    $data = query("SELECT * FROM $table ORDER BY id DESC");

    return $data;
}

function insert($data){
    
    global $conn;
    global $table;
    // Get all $data

    $id_user = $data['id_user'];
    $nama = htmlspecialchars($data['nama']);
    $caption = htmlspecialchars($data['caption']);
    $lokasi = $data['lokasi'];
    $deskripsi = $data['deskripsi'];

    // Upload Img
    $gambar = upload();

    if(!$gambar){
        return false;
    }

    // query insert
    $query = "INSERT INTO $table (nama,caption,deskripsi,gambar,lokasi,created_at,updated_at) VALUES
            ('$nama','$caption','$deskripsi','$gambar','$lokasi',now(),now())";

    mysqli_query($conn,$query);

    // feedback check
    return mysqli_affected_rows($conn);
}

function delete($id){
    global $conn;
    global $table;

    // --------------------- To Delete Img File from Folder too ---------------------
    $result = mysqli_query($conn, "SELECT gambar FROM $table WHERE id = $id");
	$file = mysqli_fetch_assoc($result);

    $fileName = implode('.', $file);
	$location = "img/$fileName";
	if (file_exists($location)) {
		unlink('img/' . $fileName);
	}
    // --------------------- END of File Delete ------------------------------------

    // query delete
    $query = "DELETE FROM $table WHERE id = $id";

    mysqli_query($conn,$query);

    // feedback check
    return mysqli_affected_rows($conn);
}

function update($data){
    global $conn;
    global $table;

    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $caption = htmlspecialchars($data['caption']);
    $deskripsi = $data['deskripsi'];
    $lokasi = htmlspecialchars($data['lokasi']);

    $oldImg = $data['oldImg'];

    if($_FILES['gambar']['error']===4){
        $gambar = $oldImg;
    }else{
        // If Any new Data Uploaded , then delete old image , replace with new image
        $result = mysqli_query($conn, "SELECT gambar FROM $table WHERE id = $id");
        $file = mysqli_fetch_assoc($result);

        $fileName = implode('.', $file);
        unlink('img/' . $fileName);
        // --------------------- END of File Delete ------------------------------------

        $gambar = upload();
    }

    $res = show($id);
    $created_at = $res['created_at'];
    
    $query = "UPDATE $table SET
                nama = '$nama',
                caption = '$caption',
                deskripsi = '$deskripsi',
                gambar = '$gambar',
                lokasi = '$lokasi',
                created_at = '$created_at',
                updated_at = now()
                WHERE id = $id";

    mysqli_query($conn,$query);

    // feedback check
    return mysqli_affected_rows($conn);
}

function show($id){
    global $table;

    $data = query("SELECT * FROM ".$table." WHERE id=$id");

    return $data[0];
}

function search($keyword){
    global $table;
    
    $query = "SELECT * FROM $table WHERE
            nama LIKE '%$keyword%' OR
            caption LIKE '%$keyword%'
            ORDER BY id DESC";

    return query($query);
}

function upload(){
    $fil = $_POST["inputFilter"];
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile =  $_FILES['gambar']['size'];
    $error =  $_FILES['gambar']['error'];
    $tmpName =  $_FILES['gambar']['tmp_name'];
    
    // Cek Upload gambar
    if($error === 4){
        echo ("
        <script>
            alert('Wajib upload gambar!');
            document.location.href='index.php';
        </script>");
        return false;
    }

    // Cek tipe
    $validExtension = ['jpg','jpeg','png'];
    $imgExtension = explode('.',$namaFile);
    $imgExtension = strtolower(end($imgExtension));
    if(! in_array($imgExtension,$validExtension)){
        echo ("
        <script>
            alert('Hanya upload file gambar!');
            document.location.href='index.php';
        </script>");
        return false;
    }

    // Cek ukuran
    if($ukuranFile>5000000){
        echo ("
        <script>
            alert('Ukuran file maksimal 5 Mb!');
            document.location.href='index.php';
        </script>");
        return false;
    }

    // Filtering
    switch($fil){
        case "nofilter" : $output = nofilter($_FILES,$imgExtension);break;
        case "filter1" : $output = filter1($_FILES,$imgExtension);break;
        case "filter2" : $output = filter2($_FILES,$imgExtension);break;
        case "filter3" : $output = filter3($_FILES,$imgExtension);break;
        case "filter4" : $output = filter4($_FILES,$imgExtension);break;
    }

    // // Generate Random Name for Img
    // $newImgName = uniqid();
    // $newImgName .= '.';
    // $newImgName .= $imgExtension;

    // Upload file , move to specified folder
    // move_uploaded_file($tmpName,'img/'.$newImgName);
    // return $newImgName

    return $output;
}

?>