<?php
header("Content-type: image/png");
class Captcha{
	public function renderCaptcha($code){
		$im = imagecreatetruecolor(565, 800);
		//RGB
		$backColor = imagecolorallocate($im, 255, 224, 221);
		$textColor = imagecolorallocate($im, 129, 15, 90);
		$fontFile = 'font/OpenSans-Regular.ttf';
		$imBox = imagecreatefrompng('font/sert13.png');
		imagefill($im, 0, 0, $backColor);
		imagecopy($im, $imBox, 0, 0, 0, 0, 565, 800);
		imagettftext($im, 25, 0, 130, 300, $textColor, $fontFile, $code);
		imagettftext($im, 25, 0, 130, 350, $textColor, $fontFile, 'Оценка - отлично');
		imagepng($im);
		imagedestroy($im);
	}
}

$captcha = new Captcha();
$captcha->renderCaptcha($name);
