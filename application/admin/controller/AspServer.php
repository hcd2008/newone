<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
class AspServer extends Common
{
	public function _initialize()
	{
		header('Content-Type:text/html;charset=UTF-8');
	}

	public function index()
	{
	}

	public function ssc()
	{
		$Dao = Db::name('sscCode');
		$data = $Dao->order('id desc')->find();
		return '重庆时时彩:' . $data['issue'] . ':' . $data['code'];
	}

	public function hsc()
	{
		$Dao = Db::name('hscCode');
		$data = $Dao->order('id desc')->find();
		return '黑龙江时时彩:' . $data['issue'] . ':' . $data['code'];
	}
}


?>
