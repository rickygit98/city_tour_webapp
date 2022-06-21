<?php 

function addPosting($data){
    global $conn;

    $id_user = $data['id_user'];
    $id_lokasi = $data['id_lokasi'];
    $review = $data['review'];
    
    $query = "INSERT INTO reviews (id_user,id_lokasi,review,created_at) VALUES
                ('$id_user','$id_lokasi','$review',now())";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

?>