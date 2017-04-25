<?php

class Captcha
{
	private $width;
	private $height;
	private $code;
	private $strlen;
	private $font;
	private $image;

	public function __construct($Captcha)
	{
		$this->width = $Captcha['width'];
		$this->height = $Captcha['height'];
		$this->strlen = $Captcha['strlen'];
		$this->font = $Captcha['font'];
		$this->code = $this->Captcha_code($this->strlen);

		if (!isset($_SESSION[$Captcha['sid']])) {
			session_register($Captcha['sid']);
		}

		$_SESSION[$Captcha['sid']] = md5($this->code);
		$this->image_create();
		$this->image_gradient();
		$this->image_line();
		$this->image_word();
		$this->image_out();
	}

	private function image_create()
	{
		if (!function_exists('imagegd2')) {
			exit();
		}

		$this->image = imagecreatetruecolor($this->width, $this->height);
	}

	private function image_gradient($direction = NULL)
	{
		$_obfuscate_vrOMWEu3 = imagecolorallocate($this->image, mt_rand(200, 255), mt_rand(200, 255), mt_rand(150, 255));
		$color2 = imagecolorallocate($this->image, mt_rand(200, 255), mt_rand(200, 255), mt_rand(150, 255));
		$directions = array('horizontal', 'vertical');

		if (!in_array($direction, $directions)) {
			$direction = $directions[array_rand($directions)];

			if (mt_rand(0, 1) === 1) {
				$temp = $_obfuscate_vrOMWEu3;
				$_obfuscate_vrOMWEu3 = $color2;
				$color2 = $temp;
			}
		}

		$_obfuscate_vrOMWEu3 = imagecolorsforindex($this->image, $_obfuscate_vrOMWEu3);
		$color2 = imagecolorsforindex($this->image, $color2);
		$steps = ($direction === 'horizontal' ? $this->width : $this->height);
		$r1 = ($_obfuscate_vrOMWEu3['red'] - $color2['red']) / $steps;
		$bm1g = ($_obfuscate_vrOMWEu3['green'] - $color2['green']) / $steps;
		$b1 = ($_obfuscate_vrOMWEu3['blue'] - $color2['blue']) / $steps;

		if ($direction === 'horizontal') {
			$skill_action = &$dos_skipping;
			$y1 = 0;
			$x2 = &$dos_skipping;
			$y2 = $this->height;
		}
		else {
			$skill_action = 0;
			$y1 = &$dos_skipping;
			$x2 = $this->width;
			$y2 = &$dos_skipping;
		}

		for ($dos_skipping = 0; $dos_skipping <= $steps; $dos_skipping++) {
			$T4 = $_obfuscate_vrOMWEu3['red'] - floor($dos_skipping * $r1);
			$G2 = $_obfuscate_vrOMWEu3['green'] - floor($dos_skipping * $bm1g);
			$_obfuscate_mck = $_obfuscate_vrOMWEu3['blue'] - floor($dos_skipping * $b1);
			$color = imagecolorallocate($this->image, $T4, $G2, $_obfuscate_mck);
			imageline($this->image, $skill_action, $y1, $x2, $y2, $color);
		}
	}

	private function image_line()
	{
		$dos_skipping = 0;

		for ($count = mt_rand(5, $this->strlen * 4); $dos_skipping < $count; $dos_skipping++) {
			$color = imagecolorallocatealpha($this->image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(100, 255), mt_rand(50, 120));
			imageline($this->image, mt_rand(0, $this->height), 0, mt_rand(0, $this->width), $this->height, $color);
		}
	}

	private function image_word()
	{
		$_obfuscate_D8gB1J31fwAz3De4 = min($this->width, $this->height * 2) / (strlen($this->code) + 1);
		$spacing = (int) ($this->width * 0.9) / strlen($this->code);
		$dos_skipping = 0;

		for ($_obfuscate_AKfVbr4p = strlen($this->code); $dos_skipping < $_obfuscate_AKfVbr4p; $dos_skipping++) {
			$FONT = $this->font;
			$color = imagecolorallocate($this->image, mt_rand(0, 150), mt_rand(0, 150), mt_rand(0, 150));
			$angle = mt_rand(-40, 20);
			$SIZE = ($_obfuscate_D8gB1J31fwAz3De4 / 10) * mt_rand(8, 12);
			$box = imageftbbox($SIZE, $angle, $FONT, $this->code[$dos_skipping]);
			$EUR = ($spacing / 4) + ($dos_skipping * $spacing);
			$allowdt = ($this->height / 2) + (($box[2] - $box[5]) / 4);
			imagefttext($this->image, $SIZE, $angle, $EUR, $allowdt, $color, $FONT, $this->code[$dos_skipping]);
		}
	}

	private function Captcha_code($length = 4)
	{
		$str = '0123456789';
		$Result = '';
		$A = strlen($str) - 1;
		$NUM = 0;

		for ($dos_skipping = 0; $dos_skipping < $length; $dos_skipping++) {
			$NUM = rand(0, $A);
			$Result .= $str[$NUM];
		}

		return $Result;
	}

	private function image_out()
	{
		header('Content-type: image/PNG');
		imagepng($this->image);
		imagedestroy($this->image);
	}
}


?>
