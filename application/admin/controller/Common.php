<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
class Common extends Controller
{
	public function _initialize()
	{
		$ht = Session::get('ht');
		if (empty($ht) || !Session::is_set('ht')) {
			$this->redirect('login/login');
			exit();
		}

		$clientIP = get_client_ip();

		if ($clientIP == 'unknown') {
			$this->redirect('login/login');
			exit();
		}
	}
}


?>
