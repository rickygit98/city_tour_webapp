<?php

function nofilter($img,$imgExtension){
	//  You can use $img instead of $_FILES
    $tmpName =  $img['gambar']['tmp_name'];

	// Make New Image Instance to Filtered 
	$image = imagecreatefromjpeg($tmpName);

	// Generate Random Name for Img
    $newImgName = uniqid();
    $newImgName .= '.';
    $newImgName .= $imgExtension;

    $path = 'img/'.$newImgName;

	//Move Image Instance to Specified Folder with Specified Name 
	imagejpeg($image,$path);
	imagedestroy($image);

	return $newImgName;
}

function filter1($img,$imgExtension){
	//  You can use $img instead of $_FILES
    $tmpName =  $img['gambar']['tmp_name'];

	// Make New Image Instance to Filtered 
	$image = imagecreatefromjpeg($tmpName);

	// Filter Name
	imagefilter($image,IMG_FILTER_GRAYSCALE);

	// Generate Random Name for Img
    $newImgName = uniqid();
    $newImgName .= '.';
    $newImgName .= $imgExtension;

    $path = 'img/'.$newImgName;

	//Move Image Instance to Specified Folder with Specified Name 
	imagejpeg($image,$path);
	imagedestroy($image);

	return $newImgName;
}

function filter2($img,$imgExtension){
	//  You can use $img instead of $_FILES
    $tmpName =  $img['gambar']['tmp_name'];

	// Make New Image Instance to Filtered 
	$image = imagecreatefromjpeg($tmpName);

	// Filter Name
	imagefilter($image,IMG_FILTER_COLORIZE,50,50,100);

	// Generate Random Name for Img
    $newImgName = uniqid();
    $newImgName .= '.';
    $newImgName .= $imgExtension;

    $path = 'img/'.$newImgName;

	//Move Image Instance to Specified Folder with Specified Name 
	imagejpeg($image,$path);
	imagedestroy($image);

	return $newImgName;
}

function filter3($img,$imgExtension){
	//  You can use $img instead of $_FILES
    $tmpName =  $img['gambar']['tmp_name'];

	// Make New Image Instance to Filtered 
	$image = imagecreatefromjpeg($tmpName);

	// Filter Name
	imagefilter($image,IMG_FILTER_COLORIZE,100,50,50);

	// Generate Random Name for Img
    $newImgName = uniqid();
    $newImgName .= '.';
    $newImgName .= $imgExtension;

    $path = 'img/'.$newImgName;

	//Move Image Instance to Specified Folder with Specified Name 
	imagejpeg($image,$path);
	imagedestroy($image);

	return $newImgName;
}

function filter4($img,$imgExtension){
	//  You can use $img instead of $_FILES
    $tmpName =  $img['gambar']['tmp_name'];

	// Make New Image Instance to Filtered 
	$image = imagecreatefromjpeg($tmpName);

	// Filter Name
	imagefilter($image,IMG_FILTER_COLORIZE,50,100,50);

	// Generate Random Name for Img
    $newImgName = uniqid();
    $newImgName .= '.';
    $newImgName .= $imgExtension;

    $path = 'img/'.$newImgName;

	//Move Image Instance to Specified Folder with Specified Name 
	imagejpeg($image,$path);
	imagedestroy($image);

	return $newImgName;
}

?>