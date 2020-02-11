<?php
try{
	$width = intval($_GET['w']);
	$height = intval($_GET['h']);
	$fakeimg_w = 180;
	$fakeimg_h = 151;
	$skippx_w = intval(($width - $fakeimg_w) / 2);
	$skippx_h = intval(($height - $fakeimg_h) / 2);
	$fakeimg_im = @imagecreatefrompng('./img/fakeimg.png');
	$im = @imagecreate($width, $height)
		or die("Невозможно создать поток изображения");
	if(($skippx_w > 0) && ($skippx_h > 0))
		imagecopymerge ( $im , $fakeimg_im , $skippx_w , $skippx_h , 0 , 0 , $fakeimg_w , $fakeimg_h  , 100 );
	$background_color = imagecolorallocate($im, 196, 196, 196);
	header("Content-Type: image/png");
	imagepng($im);
	imagedestroy($im);
	exit;
} catch (Exception $e) {
	header('Content-Type: application/json; charset=utf-8');
	echo '{"status":"'.$e->getMessage().'"}';
	exit;
}
?>