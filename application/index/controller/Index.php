<?php
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;
use think\Cache;
use think\Session;

class Index extends Base
{
	protected $jfauto_isopen = 0;
	protected $jffixed_isopen = 0;
	protected $jf1700_isopen = 0;
	protected $jf1800_isopen = 0;
	protected $jf1900_isopen = 0;
	protected $modeNum = 1;

	public function index()
	{
		// $DaoWebConfig = m('Webconfig');
		$data = Db::name('webconfig')->find();
		$webname = $data['webname'];
		$kf = $data['53kf'];
		$this->assign('webname', $webname);
		$this->assign('kf', $kf);
		$this->getZJMessage();
		// $this->assign('zjdata',$zjdata);
		// $Daogonggao = m('Gonggao');
		$datagonggao = Db::name('gonggao')->where('title','顶部公告')->find();
		$_obfuscate_xVg_INoiyNFl = $datagonggao['content'];
		$this->assign('ggContent', $_obfuscate_xVg_INoiyNFl);
		$username = Session::get('un');
		// $_obfuscate_6ogI80pkWQ = m('User');
		$Where['username'] = $username;
		$dataUser = Db::name('user')->where($Where)->find();
		$_obfuscate_eNV52sLcOA = explode(',', $dataUser['mode']);
		Session::set('currentmode', $dataUser['currentmode']);

		if (empty($dataUser['mode'])) {
			$this->jfauto_isopen = '1';
		}
		else {
			$this->jf1700_isopen = $_obfuscate_eNV52sLcOA[0];
			$this->jf1800_isopen = $_obfuscate_eNV52sLcOA[1];
			$this->jf1900_isopen = $_obfuscate_eNV52sLcOA[2];
			$this->jfauto_isopen = $_obfuscate_eNV52sLcOA[3];
		}

		if (($this->jf1700_isopen == 1) || ($this->jf1800_isopen == 1) || ($this->jf1900_isopen == 1)) {
			$this->jffixed_isopen = '1';
		}

		if ((($this->jf1700_isopen == 1) || ($this->jf1800_isopen == 1) || ($this->jf1900_isopen == 1)) && ($this->jfauto_isopen == 1)) {
			$this->modeNum = 2;
		}
		else {
			$this->modeNum = 1;
		}

		$_obfuscate_XONJEA['jfauto_isopen'] = $this->jfauto_isopen;
		$_obfuscate_XONJEA['jffixed_isopen'] = $this->jffixed_isopen;
		$_obfuscate_XONJEA['jf1700_isopen'] = $this->jf1700_isopen;
		$_obfuscate_XONJEA['jf1800_isopen'] = $this->jf1800_isopen;
		$_obfuscate_XONJEA['jf1900_isopen'] = $this->jf1900_isopen;
		$_obfuscate_XONJEA['modeNum'] = $this->modeNum;
		$_obfuscate_XONJEA['currentmode'] = $dataUser['currentmode'];

		if ($dataUser['currentmode'] == 4) {
			$_obfuscate_XONJEA['show'] = 'none';
		}
		else {
			$_obfuscate_XONJEA['show'] = '';
		}

		$this->assign($_obfuscate_XONJEA);
		return $this->fetch();
	}

	public function menu()
	{
		$username = Session::get('un');
		// $_obfuscate_6ogI80pkWQ = m('User');
		$Where['username'] = $username;
		$dataUser = Db::name('user')->where($Where)->find();
		$_obfuscate_8Iu1['money'] = round($dataUser['money'], 4);
		$_obfuscate_8Iu1['nickname'] = $dataUser['nickname'];
		$str = ltrim(rtrim($dataUser['regfrom'], '|'), '|');
		$regArr = @split('\\|\\|', $str);

		if (count($regArr) == 1) {
			$_obfuscate_8Iu1['vip'] = 'VIP';
		}

		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function main()
	{
		$this->safe();
		// $Daogonggao = m('Gonggao');
		$Where['title'] = array('neq', '顶部公告');
		$datagonggao = Db::name('gonggao')->order('addtime desc')->select();
		$this->assign('list', $datagonggao);
		return $this->fetch();
	}

	public function safe()
	{
		$zf = 100;
		$msg = '';
		$username = Session::get('un');
		// $_obfuscate_6ogI80pkWQ = m('user');
		$dataUser = Db::name('user')->where('username=\'' . $username . '\'')->find();

		if ($dataUser['password2'] == '') {
			$zf -= 20;
			$url = u('User/editPwd');
			$msg .= '-20 分 : 您的资金密码还没有设置,请使用〖 <a href=\'' . $url . '\'><font color=#ff3366>修改密码</font></a>〗功能进行设置<br/>';
		}

		if (empty($dataUser['logmsg'])) {
			$zf -= 15;
			$url = u('User/editPwd');
			$msg .= '-15 分 : 您尚未设置登录问候语! 请使用〖 <a href=\'' . $url . '\'><font color=#ff3366>修改密码</font></a>〗功能进行设置<br/>';
		}

		if (empty($dataUser['banknum'])) {
			$zf -= 25;
			$msg .= '-25 分 : 您尚未绑定银行卡号<br/>';
		}

		if ($dataUser['lock'] == '0') {
			$zf -= 25;
			$msg .= '-25 分 : 您尚未锁定资料<br/>';
		}

		// $DaoLogin = m('Login');
		$Where['username'] = $username;
		$Where['usertype'] = 0;
		$dataLogin = Db::name('login')->where($Where)->order('id desc')->limit('0,2')->select();

		if (count($dataLogin) == 2) {
			if ($dataLogin[0]['logip'] != $dataLogin[1]['logip']) {
			}
		}

		if ($zf == 100) {
			$msg .= '请继续保持!';
		}

		$this->assign('zf', $zf);
		$this->assign('msg', $msg);
	}

	public function getZJMessage()
	{
		$ajaxStr = array();
		// $DaoOrder = m('Order');
		$where['state'] = 1;
		// $DaoJiazj = m('jiazj');
		$dataJiazj = Db::name('jiazj')->select();
		$countJiazj = count($dataJiazj);
		$newLmData = Cache::get('newLmData');

		if (empty($newLmData)) {
			$newLmData = array();
			// $Dao = m();
			$lmdata = Db::query('SELECT l.lotteryid,l.lotteryname,m.methodid,m.methodname FROM `jiang_lottery` as l,`jiang_method` as m  WHERE l.lotteryid=m.lotteryid ;');

			foreach ($lmdata as $v ) {
				$newLmData[$v['methodid']] = $v;
			}
			Cache::set('newLmData', $newLmData, 3600 * 24);
		}

		for ($i = 0; $i < 30; $i++) {
			$j = mt_rand(0, $countJiazj - 1);
			$data = $dataJiazj[$j];
			$ajaxStr[] = array('name' => $data['nickname'], 'lottery' => $data['lotteryname'], 'issue' => $data['issue'], 'prize' => sprintf('%.02f', $data['money']));
		}
		// $flag = $_REQUEST['flag'];
		$flag='';

		if ('gettoprize' == $flag) {
			if (1 < count($ajaxStr)) {
				echo json_encode($ajaxStr);
			}
			else {
				echo json_encode('empty');
			}
		}
		else {
			$this->assign('zjdata', $ajaxStr);
		}

		return NULL;
		
	// 	$DaoUser = m('User');
	// 	$nicknameArr = array();

	// 	foreach ($dataOrder as $v ) {
	// 		$nicknameArr[] = $v['username'];
	// 	}

	// 	$dataNickName = $DaoUser->field('nickname')->where(array(
	// 'username' => array('in', $nicknameArr)
	// ))->select();

	// 	foreach ($dataOrder as $k => $v ) {
	// 		$cn = 3;
	// 		$lottery = $newLmData[$v['methodid']];

	// 		if ($v['zjprize'] < 0) {
	// 			$cn++;
	// 		}
	// 		else {
	// 			$ajaxStr[] = array('name' => $dataNickName[$k]['nickname'], 'lottery' => $lottery['lotteryname'], 'issue' => $v['issue'], 'prize' => sprintf('%.02f', $v['zjprize']));
	// 		}

	// 		for ($i = 0; $i < $cn; $i++) {
	// 			$j = mt_rand(0, $countJiazj - 1);
	// 			$data = $dataJiazj[$j];
	// 			$ajaxStr[] = array('name' => $data['nickname'], 'lottery' => $data['lotteryname'], 'issue' => $v['issue'], 'prize' => sprintf('%.02f', $data['money']));
	// 		}
	// 	}

	// 	$flag = $_REQUEST['flag'];

	// 	if ('gettoprize' == $flag) {
	// 		if (1 < count($ajaxStr)) {
	// 			echo json_encode($ajaxStr);
	// 		}
	// 		else {
	// 			echo json_encode('empty');
	// 		}
	// 	}
	// 	else {
	// 		$this->assign('zjdata', $ajaxStr);
	// 	}
	}

	public function checkEnv()
	{
		load('pointer', THINK_PATH . '/Tpl/Autoindex');
		$env_table = check_env();
		echo $env_table;
	}

	public function getKaiJiangMessage()
	{
		$ajaxStr = array();
		$username = Session::get('un');
		$nowtime = date('Y-m-d H:i:s');
		$DaoLastIssue = m('lastissue');
		$DaoMessage = m('message');
		$data_lastissue = $DaoLastIssue->select();
		$yinkui = 0;

		foreach ($data_lastissue as $v ) {
			if (11 < $v['id']) {
				continue;
			}

			if ($v['id'] == 2) {
				$where_mt['username'] = $username;
				$where_mt['type'] = 2;
				$data_m = $DaoMessage->field('id,type,yinkui')->where($where_mt)->find();

				if (empty($data_m)) {
					continue;
				}

				$ajaxStr['type'] = $data_m['type'];
				$ajaxStr['username'] = $username;
				$ajaxStr['issue'] = '';
				$ajaxStr['countissue'] = '';
				$ajaxStr['lotteryname'] = '';
				$ajaxStr['yinkui'] = floor($data_m['yinkui']);
				$DaoMessage->where(array('id' => $data_m['id']))->delete();
				break;
			}

			if ((strtotime($nowtime) - strtotime($v['addtime'])) < 50) {
				continue;
			}

			$where_m['username'] = $username;
			$where_m['lotteryid'] = $v['lotteryid'];
			$where_m['issue'] = $v['issue'];
			$data_m = $DaoMessage->field('id,yinkui')->where($where_m)->select();

			if (empty($data_m)) {
				continue;
			}

			$del_id = array();

			foreach ($data_m as $va ) {
				$yinkui += $va['yinkui'];
				$del_id[] = $va['id'];
			}

			$DaoMessage->where(array(
	'id' => array('in', $del_id)
	))->delete();

			if ($yinkui != 0) {
				switch ($v['lotteryid']) {
				case 1:
					$lotteryname = '重庆时时彩';
					break;

				case 2:
					$lotteryname = '黑龙江时时彩';
					break;

				case 3:
					$lotteryname = '新疆时时彩';
					break;

				case 4:
					$lotteryname = '江西时时彩';
					break;

				case 5:
					$lotteryname = '时时乐';
					break;

				case 6:
					$lotteryname = '十一运夺金';
					break;

				case 7:
					$lotteryname = '多乐彩';
					break;

				case 8:
					$lotteryname = '广东十一选五';
					break;

				case 9:
					$lotteryname = '福彩3D';
					break;

				case 10:
					$lotteryname = '排列三、五';
					break;

				case 11:
					$lotteryname = '重庆十一选五';
					break;

				default:
					$lotteryname = '重庆时时彩';
					break;
				}

				$ajaxStr['type'] = 0;
				$lottery = $newLmData[$v['methodid']];
				$ajaxStr['username'] = $username;
				$ajaxStr['issue'] = $v['issue'];
				$ajaxStr['countissue'] = count($data_m);
				$ajaxStr['lotteryname'] = $lotteryname;
				$ajaxStr['yinkui'] = $yinkui;
				break;
			}
		}

		if (1 < count($ajaxStr)) {
			echo json_encode($ajaxStr);
		}
		else {
			echo json_encode('empty');
		}
	}

	public function test()
	{
		$_obfuscate_zCIxcUAPbA1D = '10:06:00';
		$endtime = '10:16:00';
		$opentime = '10:20:00';
		$_obfuscate_GspxAJXBGtEn6io = 2;
		$Dao = m('XjcTime');
		$Dao->where('lottery_num>1')->delete();
		$n = 0;

		for ($dos_skipping = 2; $dos_skipping <= 96; $dos_skipping++) {
			if ($dos_skipping == 2) {
			}
			else {
				$_obfuscate_zCIxcUAPbA1D = date('H:i:s', strtotime('+600 seconds', strtotime($_obfuscate_zCIxcUAPbA1D)));
				$endtime = date('H:i:s', strtotime('+600 seconds', strtotime($endtime)));
				$opentime = date('H:i:s', strtotime('+600 seconds', strtotime($opentime)));
			}

			$data['begintime'] = $_obfuscate_zCIxcUAPbA1D;
			$data['endtime'] = $endtime;
			$data['opentime'] = $opentime;
			$data['lottery_num'] = $_obfuscate_GspxAJXBGtEn6io;
			$Dao->data($data)->add();
			$_obfuscate_GspxAJXBGtEn6io++;
		}

		$this->display();
	}

	public function duLiuHe()
	{
		return NULL;
		$DOC = new DOMDocument();
		$DOC->load('fixtures.xml');
		$Row = $DOC->getElementsByTagName('drawYear');
		$_obfuscate_s2b1PNq0 = $DOC->getElementsByTagName('drawYear')->item(1);
		var_dump($_obfuscate_s2b1PNq0);
		$_obfuscate_e1sI_qAN = $_obfuscate_s2b1PNq0->getElementsByTagName('drawMonth');
		$Dao = m('LhcTime');
		$dos_skipping = 1;

		foreach ($_obfuscate_e1sI_qAN as $POST ) {
			$_obfuscate_BX1RoZBG = $POST->attributes->item(0)->nodeValue;
			$_obfuscate_BX1RoZBG = sprintf('%02d', $_obfuscate_BX1RoZBG);
			$_obfuscate_imjR39qS0CE = $POST->getElementsByTagName('drawDate');

			foreach ($_obfuscate_imjR39qS0CE as $v ) {
				$kjr = $v->attributes->item(0)->nodeValue;
				$kjr = sprintf('%02d', $kjr);
				$data['begintime'] = '00:00:01';
				$data['endtime'] = '2013-' . $_obfuscate_BX1RoZBG . '-' . $kjr . ' 21:10:10';
				$data['opentime'] = '2013-' . $_obfuscate_BX1RoZBG . '-' . $kjr . ' 21:30:10';
				$data['lottery_num'] = '2013' . sprintf('%03d', $dos_skipping);
				$dos_skipping++;
				$Dao->data($data)->add();
				echo $Dao->getLastSql();
				dump($data);
			}
		}
	}
}


?>
