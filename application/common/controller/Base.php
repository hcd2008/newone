<?php
namespace app\common\controller;
use think\Controller;
use think\Session;
use think\Cookie;
use think\Db;
use think\Config;

class Base extends Controller
{
	public function _initialize()
	{
		$un = Session::get('un');
		if (empty($un) || !Session::has('un')) {
			$this->redirect('index/login/login');
			exit();
		}
	}

	public function getSliderVal($rate)
	{
		// $Dao = m();
		$_obfuscate_Qi1hT2lPSlOT = array();
		$username = Session::get('un');
		$data = Db::query('SELECT jiang_user.rate_1,rate_2,jiang_webconfig.maxbonus,jiang_webconfig.minbonus FROM jiang_user,jiang_webconfig WHERE username=\'' . $username . '\'');
		$fd = $data[0]['rate_1'];
		$_obfuscate_Qi1hT2lPSlOT['fd'] = $data[0]['rate_1'];

		if ($rate == 2) {
			$fd = $data[0]['rate_2'];
			$_obfuscate_Qi1hT2lPSlOT['fd'] = $data[0]['rate_2'];
		}

		if (0 < ($fd - 0)) {
			$_obfuscate_C_4uNQ = floatval(($fd * 100) % (0.5 * 100)) / 100;
			$fd = $fd - $_obfuscate_C_4uNQ;
			$maxBonus = 1800 + ($fd * 20);
		}
		else {
			$maxBonus = 1800;
		}

		if (0 < ($maxBonus - $data[0]['maxbonus'])) {
			$maxBonus = $data[0]['maxbonus'];
		}

		$_obfuscate_Qi1hT2lPSlOT['maxBonus'] = $maxBonus;
		$_obfuscate_Qi1hT2lPSlOT['minBonus'] = $data[0]['minbonus'];
		$_obfuscate_Qi1hT2lPSlOT['baseBouns'] = Config::get('baseBouns');

		if (!Cookie::has('currentBonus')) {
			Cookie::set('currentBonus', 1800);
			$_obfuscate_Qi1hT2lPSlOT['currentBonus'] = 1800;
		}
		else {
			$_obfuscate_Qi1hT2lPSlOT['currentBonus'] = Cookie::get('currentBonus');
		}

		return $_obfuscate_Qi1hT2lPSlOT;
	}
}


?>
