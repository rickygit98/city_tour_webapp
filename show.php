<?php
	require_once "layouts/header.php";

	if(isset($_POST['submit'])){
        // Feedback Check
       if(addPosting($_POST)>0){
           echo ("
                <script>
                    alert('review anda berhasil diposting');
                </script>
           ");
       }
       else{
        echo ("
                <script>
                    alert('review anda gagal diposting');
                </script>
        ");
       }
    }

	$id_lokasi = $_GET['id'];

	$id_user = $_SESSION['id'];

	$koordinat = "-7.2651099,112.7797906";
	$nama = "";

	if ($id_lokasi){

		$data = show($id_lokasi);

		$nama = $data["nama"];
		$koordinat = $data["lokasi"];

	}


	// Get Current User Data
	$user = query("SELECT * FROM users WHERE id=$id_user")[0];

	// Get All Review for currect location
	$reviews = query("SELECT * FROM reviews WHERE id_lokasi=$id_lokasi");

?>

<a href="index.php" class="btn btn-primary my-3">Back to Index</a>

<div class="card mb-3 text-center">
	<div class="card-header"><h2><?= $data["nama"]; ?></h2></div>
	<div id="googleMap" class="card-img-top" style="width:100%;height:500px;"></div>
	<div class="card-body">
		<h5 class="card-title"><?= $data["caption"]; ?></h5>
		<p class="card-text"><?= $data["deskripsi"]; ?></p>
	</div>
</div>

<br>

<div>
	<form action="" method="post">
		<input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id']; ?>">
		<input type="hidden" name="id_lokasi" id="id_lokasi" value="<?= $id_lokasi; ?>">
		
		<label for="review" id="review"><h3>Tinggalkan review anda</h3></label>
		<textarea cols='20' rows='5' name="review" id="review" class="form-control mb-2 w-50" placeholder="Enter your comment. Be nice, or else">
		</textarea>

		<button type="submit" name="submit" class="btn btn-primary"> Comment </button>
		
	</form>
</div>

<hr>

<div>
	<h3>Daftar Review Lokasi</h3>
	<?php foreach($reviews as $rv): ?>
	<div class="card text-dark bg-light mb-3" style="max-width: 36rem;">
		<div class="card-header">
			<h5>
			<?php 
			$userId = $rv['id_user'];
			$query = "SELECT nama FROM users WHERE id = $userId"; 
				
			$userNames = query($query);

			echo($userNames[0]['nama']);
			?>
			</h5>
		</div>
		<div class="card-body">
			<p class="card-text"><?= $rv['review']; ?></p>
		</div>
	</div>
	<?php endforeach; ?>
</div>

<!-- Script Gmaps -->
<script>
	function myMap() {

	var mapProp= {

	center:new google.maps.LatLng(<?php
			echo($koordinat);
		?>),
	zoom:16,
	mapTypeId: 'hybrid',

	};


	var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

	var marker = new google.maps.Marker({
	position: new google.maps.LatLng(<?php
			echo($koordinat);
		?>),
	animation:google.maps.Animation.BOUNCE}
	);
	marker.setMap(map); 

	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUmDpwsLu-FCp6cPwAjIPLaf3QCPbKlnQ&callback=myMap"></script> 
<!-- End Script Gmaps -->

<?php 
	require_once 'layouts/header.php';
?>