<?php
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;
use think\Session;
use app\cp\controller\User1;
use think\Cache;
use think\Config;
class User extends Base
{
	public function getUserMoney()
	{
		$_obfuscate_nT44rgz3TQ = array();
		$username = Session::get('un');
		// $_obfuscate_6ogI80pkWQ = Db::name('User');
		$dataUser = Db::name('user')->field('money')->where(array('username' => $username))->find();
		$usermoney = round($dataUser['money'], 4);
		$_obfuscate_nT44rgz3TQ['money'] = $usermoney;

		if (!$this->onlinetime($username, 'user')) {
			$_obfuscate_nT44rgz3TQ = 'logout';
		}

		echo json_encode($_obfuscate_nT44rgz3TQ);
		return NULL;
	}

	public function onlinetime($username, $tb='user')
	{
		$data['onlinetime'] = date('Y-m-d H:i:s');
		Db::name($tb)->where(array('username' => $username))->update($data);
		$ip = get_client_ip();
		// $DaoLogin = Db::name('login');
		$where['username'] = $username;
		$where['usertype'] = 0;
		$dataLogin = Db::name('login')->where($where)->order('id desc')->find();
		$logip = $dataLogin['logip'];
		$logkey = Session::get('logkey');
		if ($dataLogin && !empty($logkey)) {
			if (($ip != $logip) && ($logkey != $dataLogin['logkey'])) {
				Session::set('un', NULL);
				return false;
			}
		}

		return true;
	}

	public function setCurrentMode()
	{
		$param=$this->request->param();
		isset($param['mode']) or $param['mode']=0;
		$currentmode = $param['mode'];

		if (!is_numeric($currentmode)) {
			echo 'error';
			return NULL;
		}

		$username = Session::get('un');
		// $_obfuscate_6ogI80pkWQ = Db::name('User');
		$Where['username'] = $username;
		$dataUser = Db::name('user')->field('mode')->where($Where)->find();

		if (!$dataUser) {
			echo 'error';
			return NULL;
		}

		$checkMod = array();
		$_obfuscate_eNV52sLcOA = explode(',', $dataUser['mode']);

		if ($_obfuscate_eNV52sLcOA[0] == 1) {
			$checkMod[] = '1';
		}

		if ($_obfuscate_eNV52sLcOA[1] == 1) {
			$checkMod[] = '2';
		}

		if ($_obfuscate_eNV52sLcOA[2] == 1) {
			$checkMod[] = '3';
		}

		if ($_obfuscate_eNV52sLcOA[3] == 1) {
			$checkMod[] = '4';
		}

		if (!in_array($currentmode, $checkMod)) {
			echo 'error';
			return NULL;
		}

		$data['currentmode'] = $currentmode;
		Session::set('currentmode', $currentmode);

		if (Db::name('user')->where($Where)->update($data)) {
			echo 'success';
			return NULL;
		}
		else {
			echo 'success';
			return NULL;
		}
	}

	public function editNickName()
	{
		// import('@.Cp.User');
		$User = new User1(Session::get('un'));
		$_obfuscate_8Iu1['nickname'] = $User->getNickname();
		$this->assign($_obfuscate_8Iu1);
		return  $this->fetch();
	}

	public function updateNickName()
	{
		// $_obfuscate_6ogI80pkWQ = Db::name('User');
		$_obfuscate_ss1HGbeXxl0 = $param['nickname'];

		if (!preg_match('/^(.){4,16}$/', $_obfuscate_ss1HGbeXxl0)) {
			$this->error('用户呢称格式不正确');
		}

		$data['nickname'] = $_obfuscate_ss1HGbeXxl0;
		$myusername = Session::get('un');

		if ($_obfuscate_6ogI80pkWQ->where(array('username' => $myusername))->update($data)) {
			$this->success('操作成功');
		}
		else {
			$this->error('操作失败');
		}
	}

	public function editPwd()
	{
		// $_obfuscate_6ogI80pkWQ = d('User');
		$Where['username'] = Session::get('un');
		$dataUser = Db::name('user')->where($Where)->find();
		$_obfuscate_8Iu1['logmsg'] = $dataUser['logmsg'];
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function updateLogMsg()
	{
		$param=$this->request->param();
		// $DaoUser = Db::name('User');
		$logme = $param['logmsg'];

		if (empty($logme)) {
			$this->error('登陆问候语不能为空');
		}

		$data['logmsg'] = $logme;
		$myusername = Session::get('un');

		if (Db::name('user')->where(array('username' => $myusername))->update($data)) {
			$this->success('操作成功');
		}
		else {
			$this->error('操作失败');
		}
	}

	public function updateLogPwd()
	{
		$param=$this->request->param();
		$oldpass = $param['oldpass'];
		$newpass = $param['newpass'];
		$confirm_newpass = $param['confirm_newpass'];

		if (!$this->validateUserPss($newpass)) {
			$this->error('密码不符合规则，请重新输入');
		}

		if ($confirm_newpass != $newpass) {
			$this->error('两次输入密码不相同');
		}

		// $_obfuscate_6ogI80pkWQ = d('User');
		$myusername = Session::get('un');
		$Where['username'] = $myusername;
		$dataUser = Db::name('user')->where($Where)->find();

		if (md5($oldpass) != $dataUser['password']) {
			$this->error('旧登陆密码不正确');
		}

		$data['password'] = md5($newpass);
		$data['userpwd'] = $newpass;

		if (Db::name('user')->where(array('username' => $myusername))->update($data)) {
			$this->success('登陆密码修改成功');
		}
		else {
			$this->error('登陆密码修改失败');
		}
	}

	public function updateZiJinPwd()
	{
		$oldpass = $param['oldpass'];
		$newpass = $param['newpass'];
		$confirm_newpass = $param['confirm_newpass'];

		if (!$this->validateUserPss($newpass)) {
			$this->error('密码不符合规则，请重新输入');
		}

		if ($confirm_newpass != $newpass) {
			$this->error('两次输入密码不相同');
		}

		// $_obfuscate_6ogI80pkWQ = d('User');
		$myusername = Session::get('un');
		$Where['username'] = $myusername;
		$dataUser = Db::name('user')->where($Where)->find();

		if (!empty($dataUser['password2'])) {
			if (md5($oldpass) != $dataUser['password2']) {
				$this->error('旧资金密码不正确');
			}
		}

		if (md5($newpass) == $dataUser['password']) {
			$this->error('资金密码不能和登陆密码相同');
		}

		$data['password2'] = md5($newpass);
		$data['userpwd2'] = $newpass;

		if (Db::name('user')->where(array('username' => $myusername))->update($data)) {
			$this->success('资金密码修改成功');
		}
		else {
			$this->error('资金密码修改失败');
		}
	}

	public function validateUserPss($b)
	{
		$m = '/^[0-9a-zA-Z]{6,16}$/';

		if (!preg_match($m, $b)) {
			return false;
		}

		$m = '/^\\d+$/';

		if (preg_match($m, $b)) {
			return false;
		}

		$m = '/^[a-zA-Z]+$/';

		if (preg_match($m, $b)) {
			return false;
		}

		$m = '/(.)\\1{2,}/';

		if (preg_match($m, $b)) {
			return false;
		}

		return true;
	}

	public function showZhiJinPwd()
	{
		$username = Session::get('un');
		$Where['username'] = $username;
		// $_obfuscate_6ogI80pkWQ = Db::name('User');
		$dataUser = Db::name('user')->where($Where)->find();

		if (empty($dataUser['password2'])) {
			$this->assign('jumpUrl', '__URL__/editPwd');
			$this->error('您尚未设置资金密码,请到财户管理->修改密码,进行更改!');
		}

		$flag = formatstr($this->request->param['flag']);
		$_obfuscate_8Iu1['action'] = '';
		$url=$this->request->domain();
		$url=$url.'/index/user/';
		switch ($flag) {
		case 'cz':
			$_obfuscate_8Iu1['action'] = $url.'showChonZhi';
			break;

		case 'tx':
			$_obfuscate_8Iu1['action'] = $url.'showTiXian';
			break;

		case 'yhk':
			$_obfuscate_8Iu1['action'] = $url.'showBangDingBank';
			break;
		}
		Session::delete('zhiJinPwd');
		// unset($_SESSION['zhiJinPwd']);
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function checkZhiJinPwd()
	{
		$param=$this->request->param();
		if (Session::has('zhiJinPwd')) {
			return true;
		}
		isset($param['secpass']) or $param['secpass']='';
		$secpass = formatstr($param['secpass']);

		if (empty($secpass)) {
			return false;
		}

		// import('@.Cp.User');
		$user = new User(Session::get('un'));
		$password2 = $user->getZhiJinPwd();

		if (md5($secpass) == $password2) {
			Session::set('zhiJinPwd', 'true');
			return true;
		}

		return false;
	}

	public function showChonZhi()
	{
		// $DaoBank = Db::name('Bank');
		$Where['state'] = 1;
		$Where['bankname'] = array(
			array('neq', '招商银行'),
			array('neq', '交通银行'),
			array('neq', '其它银行')
			);
		$dataBank = Db::name('bank')->where($Where)->select();
		// $_obfuscate_xaufKH_ = Db::name('Webconfig');
		$dataWeb = Db::name('webconfig')->find();
		$czminmoney = $dataWeb['czminmoney'];
		$czmaxmoney = $dataWeb['czmaxmoney'];
		$czstarttime = $dataWeb['czstarttime'];
		$czendtime = $dataWeb['czendtime'];
		$this->assign('czminmoney', $czminmoney);
		$this->assign('czmaxmoney', $czmaxmoney);
		$this->assign('czstarttime', $czstarttime);
		$this->assign('czendtime', $czendtime);
		$this->assign('banklist', $dataBank);
		return  $this->fetch();
	}

	public function showBankInfo()
	{
		$param=$this->request->param();
		$bankid = $param['bankinfo'];

		if (!is_numeric($bankid)) {
			$this->error('请正确选择银行');
		}

		$real_money = $param['real_money'];

		if (!is_numeric($real_money)) {
			$this->error('请正确填写冲值金额');
		}

		$username = Session::get('un');
		// $DaoUser = Db::name('user');
		// import('@.Cp.User');
		$user = new User();
		$chongzhinum = $user->getIdByUserName($username);
		// $DaoBank = Db::name('Bank');
		$where['state'] = 1;
		$where['id'] = $bankid;
		$dataBank = Db::name('bank')->where($where)->find();

		if (empty($dataBank)) {
			$this->error('不存在');
		}

		switch ($dataBank['id']) {
		case 1:
			$Tpl['bankurl'] = 'https://mybank.icbc.com.cn/icbc/perbank/index.jsp';
			break;

		case 2:
			$Tpl['bankurl'] = 'https://www.tenpay.com/';
			break;

		case 3:
			$Tpl['bankurl'] = 'https://www.alipay.com/';
			break;

		case 4:
			$Tpl['bankurl'] = 'http://www.abchina.com/';
			break;

		case 5:
			$Tpl['bankurl'] = 'http://www.ccb.com/';
			break;

		case 6:
			$Tpl['bankurl'] = 'http://www.bankcomm.com/';
			break;
		}

		$Tpl['bankimgname'] = $dataBank['id'] . '.jpg';
		$Tpl['shoukuanname'] = $dataBank['shoukuanname'];
		$Tpl['banknum'] = $dataBank['banknum'];
		$Tpl['real_money'] = $real_money;
		$Tpl['chongzhinum'] = $chongzhinum;
		$Tpl['helpimgname'] = $dataBank['id'] . '.png';
		$Tpl['bankid'] = $bankid;

		if ($dataBank['id'] == 1) {
			$Tpl['helpimgname'] = 'email.png';
		}

		$this->assign($Tpl);
		return $this->fetch();
	}

	public function showTiXian()
	{
		if (!$this->checkZhiJinPwd()) {
			$this->error('资金密码不正确');
			return false;
		}

		if ('true' != Session::get('zhiJinPwd')) {
			$this->redirect('User/showZhiJinPwd', array('flag' => 'tx'));
			return NULL;
		}

		$nowtime = date('Y-m-d H:i:s');
		$username = Session::get('un');
		// import('@.Cp.User');
		$User = new User($username);
		$usermoney = sprintf('%.2f', $User->getMoney());
		$_obfuscate_8Iu1['usermoney'] = $usermoney;
		// $DaoAccount = d('Account');
		$Where['accounttype'] = 7;
		$Where['username'] = $username;
		// $Where['addtime'] = array(
		// 	array('gt', date('Y-m-d 00:00:00')),
		// 	array('lt', date('Y-m-d 23:59:59'))
		// 	);
		$Where['addtime']=array('between time',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')]);
		$_obfuscate_8Iu1['wanchengcishu'] = Db::name('account')>where($Where)->count();
		// $_obfuscate_NWXTrwqh5P_IVE_K = Db::name('Webconfig');
		$_obfuscate_iRSbjFQdYDgkX2BESQ = Db::name('webconfig')->find();
		$_obfuscate_8Iu1['tkcishu'] = $_obfuscate_iRSbjFQdYDgkX2BESQ['tkcishu'];
		$_obfuscate_8Iu1['tkendtime'] = $_obfuscate_iRSbjFQdYDgkX2BESQ['tkendtime'];
		$_obfuscate_8Iu1['tkstarttime'] = $_obfuscate_iRSbjFQdYDgkX2BESQ['tkstarttime'];
		$_obfuscate_8Iu1['tkminmoney'] = $_obfuscate_iRSbjFQdYDgkX2BESQ['tkminmoney'];
		$_obfuscate_8Iu1['tkmaxmoney'] = $_obfuscate_iRSbjFQdYDgkX2BESQ['tkmaxmoney'];
		$_obfuscate_8Iu1['tkinfo'] = $_obfuscate_iRSbjFQdYDgkX2BESQ['tkinfo'];
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function doTiXian()
	{
		$param=$this->request->param();
		if ('true' != Session::get('zhiJinPwd')) {
			$this->redirect('User/showZhiJinPwd', array('flag' => 'tx'));
			return NULL;
		}

		$real_money = $param['real_money'];

		if (!is_numeric($real_money)) {
			$this->error('金额格式不正确');
		}

		$username = Session::get('un');
		// import('@.Cp.User');
		$User = new User($username);
		$usermoney = $User->getMoney();
		$real_money = round($real_money, 4);

		if ($real_money == 0) {
			$this->error('提款金额不能为  0元');
		}

		if (($usermoney - $real_money) < 0) {
			$this->error('你的余额不足');
		}

		if (!$User->isLock()) {
			$this->error('不锁定资料无法提现');
		}

		if ($User->isDongJie()) {
			$this->error('你已被冻结无法提现');
		}

		// $DaoAccount = d('Account');
		$Where['accounttype'] = 7;
		$Where['username'] = $username;
		// $Where['addtime'] = array(
		// 	array('gt', date('Y-m-d 00:00:00')),
		// 	array('lt', date('Y-m-d 23:59:59'))
		// 	);
		$Where['addtime']=array('between time',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')]);
		$_obfuscate_fyS5LuVReS3Mr6eAA = Db::name('account')->where($Where)->count();
		// $_obfuscate_NWXTrwqh5P_IVE_K = Db::name('Webconfig');
		$_obfuscate_iRSbjFQdYDgkX2BESQ = Db::name('webconfig')->find();
		$tkcishu = $_obfuscate_iRSbjFQdYDgkX2BESQ['tkcishu'];
		$tkminmoney = $_obfuscate_iRSbjFQdYDgkX2BESQ['tkminmoney'];

		if ($tkcishu <= $_obfuscate_fyS5LuVReS3Mr6eAA) {
			$this->error('每天最多提次' . $tkcishu . '次');
		}

		if (($real_money - $tkminmoney) < 0) {
			$this->error('单笔提现限额：最低为' . $tkminmoney . ' 元');
		}

		$tkstarttime = strtotime($_obfuscate_iRSbjFQdYDgkX2BESQ['tkstarttime']);
		$tkendtime = strtotime($_obfuscate_iRSbjFQdYDgkX2BESQ['tkendtime']);
		$nowtime = strtotime(date('H:i:s'));

		if (strtotime('03:00:00') < $tkendtime) {
			if (($nowtime < $tkstarttime) || ($tkendtime < $nowtime)) {
				$this->error('提现时间未到');
			}
		}
		else {
			$_obfuscate_rwiv5iwmnU = false;
			if (($tkstarttime < $nowtime) && ($nowtime < strtotime('23:59:59'))) {
				$_obfuscate_rwiv5iwmnU = true;
			}

			if ($nowtime < $tkendtime) {
				$_obfuscate_rwiv5iwmnU = true;
			}

			if ($_obfuscate_rwiv5iwmnU == false) {
				$this->error('提现时间未到');
			}
		}

		if ($User->setDecMoney($real_money)) {
			$data['username'] = $username;
			$data['money'] = $real_money;
			$data['money_befor'] = $usermoney;
			$data['money_after'] = round($usermoney - $real_money, 4);
			$data['accounttype'] = 7;
			$data['mode'] = 1;
			$data['accountnum'] = date('ymdhis') . rand_string(5, 2);
			$data['ordernum'] = 'qk' . time() . rand_string(6, 1);
			$data['addtime'] = date('Y-m-d H:i:s');
			$data['accountnum'] = date('ymdhis') . rand_string(5, 2);

			if (Db::name('account')->insert($data)) {
				$this->success('提现申请成功,请耐心等待财务处理');
			}
			else {
				$this->error('提现有问题!');
			}
		}
		else {
			$this->error('提现失败!');
		}
	}

	public function showBangDingBank()
	{
		if (!$this->checkZhiJinPwd()) {
			$this->error('资金密码不正确');
			return false;
		}

		if ('true' != Session::get('zhiJinPwd')) {
			$this->redirect('User/showZhiJinPwd', array('flag' => 'yhk'));
			return NULL;
		}

		// $DaoBank = Db::name('Bank');
		$Where['state'] = array(
			array('eq', 1),
			array('eq', 3),
			'or'
			);
		$dataBank = Db::name('bank')->where($Where)->select();
		$this->assign('bankname', $dataBank);
		// $_obfuscate_6ogI80pkWQ = Db::name('User');
		$username = Session::get('un');
		$dataUser = Db::name('user')->where('username=\'' . $username . '\'')->find();
		$_obfuscate_8Iu1['issubmit'] = '1';
		$_obfuscate_8Iu1['bankname2'] = $dataUser['bankname'];
		$_obfuscate_8Iu1['province'] = $dataUser['province'];
		$_obfuscate_8Iu1['city'] = $dataUser['city'];
		$_obfuscate_8Iu1['realname'] = $dataUser['realname'];
		$_obfuscate_8Iu1['qq'] = $dataUser['qq'];
		$_obfuscate_8Iu1['banknum'] = $dataUser['banknum'];

		if ($dataUser['lock'] == 1) {
			$_obfuscate_8Iu1['islock'] = 'disabled checked';
			$_obfuscate_8Iu1['issubmit'] = '0';
		}

		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function doBangDingBank()
	{
		if ('true' != Session::get('zhiJinPwd')) {
			$this->redirect('User/showZhiJinPwd', array('flag' => 'yhk'));
			return NULL;
		}

		// $DaoUser = Db::name('User');
		$username = Session::get('un');
		$dataUser = Db::name('user')->where(array('username' => $username))->find();

		if (!$dataUser) {
			$this->error('该用户不存在');
			return NULL;
		}

		if ('1' == $dataUser['lock']) {
			$this->error('资料已经锁定,不可更改');
			return NULL;
		}

		$bank = $param['bank'];
		$province = formatstr($param['province']);
		$city = formatstr($param['city']);
		$realname = formatstr($param['realname']);
		$cardno = $param['cardno'];
		$cardno_again = $param['cardno_again'];
		$islock = $param['islock'];
		$qq = $param['qq'];
		if (!is_numeric($bank) || empty($bank)) {
			$this->error('请选择开户银行');
		}

		if (($bank != '2') && ($bank != '3')) {
			if (empty($province) || empty($city)) {
				$this->error('请选择开户银行省份与城市');
			}
		}

		if (empty($realname) || empty($cardno)) {
			$this->error('开户人姓名,银行账号必须填写');
		}

		if (!empty($qq)) {
			if (!is_numeric($qq)) {
				$this->error('QQ号格式不正确');
			}
		}

		switch ($bank) {
		case '2':
			$rg = '/^\\d{5,14}$/';

			if (!preg_match($rg, $cardno)) {
				$this->error('帐号格式不正确');
			}

			break;

		case '3':
			$rg = '/^(.+)@(.+)$/';
			$rg2 = '/^\\d{11}$/';
			if (!preg_match($rg, $cardno) && !preg_match($rg2, $cardno)) {
				$this->error('帐号格式不正确');
			}

			break;

		default:
			$rg = '/^\\d{16}$|^\\d{19}$/';

			if (!preg_match($rg, $cardno)) {
				$this->error('帐号格式不正确');
			}

			break;
		}

		if ($cardno != $cardno_again) {
			$this->error('两次帐号输入不一致');
		}

		// $DaoBank = Db::name('Bank');
		$where['state'] = array(
			array('eq', 1),
			array('eq', 3),
			'or'
			);
		$where['id'] = $bank;
		$dataBank = Db::name('bank')->where($where)->find();

		if (empty($dataBank['bankname'])) {
			$this->error('请选择开户银行');
		}

		$bankname = $dataBank['bankname'];
		$where_u['bankname'] = $bankname;
		$where_u['banknum'] = $cardno;

		if (Db::name('user')->where($where_u)->find()) {
			$this->error('该银行帐号信息已存在,请使用其它帐号');
			return NULL;
		}

		$data['bankname'] = $bankname;
		$data['banknum'] = $cardno;
		$data['realname'] = $realname;
		$data['qq'] = $qq;
		$data['province'] = $province;
		$data['city'] = $city;
		$data['lock'] = ($islock == 1 ? '1' : '0');

		if ($DaoUser->data($data)->where(array('username' => $username))->update()) {
			$this->success('资料绑定成功');
		}
		else {
			$this->error('出错了');
		}
	}

	public function mySet()
	{
		$param=$this->request->param();
		$username = isset($param['username'])?$param['username']:'';

		if (empty($username)) {
			$username = Session::get('un');
		}

		$jfauto_isopen = 0;
		$jffixed_isopen = 0;
		$jf1700_isopen = 0;
		$jf1800_isopen = 0;
		$jf1900_isopen = 0;
		$modeNum = 1;
		// $DaoUser = Db::name('User');
		$uwhere['username'] = $username;
		$dataUser = Db::name('user')->where($uwhere)->find();
		$modeArr = explode(',', $dataUser['mode']);

		if (empty($dataUser['mode'])) {
			$jfauto_isopen = 1;
		}
		else {
			$jf1700_isopen = $modeArr[0];
			$jf1800_isopen = $modeArr[1];
			$jf1900_isopen = $modeArr[2];
			$jfauto_isopen = $modeArr[3];
		}

		if (($jf1700_isopen == 1) || ($jf1800_isopen == 1) || ($jf1900_isopen == 1)) {
			$jffixed_isopen = 1;
		}

		if ((($jf1700_isopen == 1) || ($jf1800_isopen == 1) || ($jf1900_isopen == 1)) && ($jfauto_isopen == 1)) {
			$modeNum = 2;
		}
		else {
			$modeNum = 1;
		}

		$Tpl['jfauto_isopen'] = $jfauto_isopen;
		$Tpl['jffixed_isopen'] = $jffixed_isopen;
		$Tpl['jf1700_isopen'] = $jf1700_isopen;
		$Tpl['jf1800_isopen'] = $jf1800_isopen;
		$Tpl['jf1900_isopen'] = $jf1900_isopen;
		$Tpl['modeNum'] = $modeNum;
		$this->assign($Tpl);
		$nickname = $dataUser['nickname'];
		$fd1 = $dataUser['rate_1'];
		$fd2 = $dataUser['rate_2'];

		if ($fd2 < 0) {
			$fd2 = 0;
		}

		$Tpl['username'] = $username;
		$Tpl['nickname'] = $nickname;
		$this->assign($Tpl);
		// $DaoMethod = Db::name('Method');

		for ($i = 1; $i < 14; $i++) {
			$where['lotteryid'] = $i;
			$dataMethod = Db::name('method')->where($where)->select();
			$dataMethod = $this->formatMySet($i, $dataMethod, $fd1, $fd2);
			$this->assign('vo' . $i, $dataMethod);
		}

		return $this->fetch();
	}

	public function getPrizePoint($prize, $fd, $sliderStep)
	{
		$banner_web_show_tt = array();
		$bouns = $prize;
		$_obfuscate_JnEE2xMbLNa8uY = 1;
		$baseBouns = Config::get('baseBouns');
		$_obfuscate_8chrx9sMs6_5Jqw = $baseBouns / $bouns;
		$_obfuscate_A2xlY0XR4316xw44P6rG = round($bouns / $baseBouns / 10, 2);
		$_obfuscate_EHEAIfHK0h0O = $sliderStep;
		$step = 0;

		if ($_obfuscate_EHEAIfHK0h0O < $baseBouns) {
			$step = ($baseBouns - $_obfuscate_EHEAIfHK0h0O) / 10;
			$fd2 = ($step * 0.5) + $fd;
			$jiangjin = ($bouns - ($step * $_obfuscate_A2xlY0XR4316xw44P6rG)) * $_obfuscate_JnEE2xMbLNa8uY;
		}

		if ($baseBouns <= $_obfuscate_EHEAIfHK0h0O) {
			$step = ($_obfuscate_EHEAIfHK0h0O - $baseBouns) / 10;
			$_obfuscate_TBR8Ku9F6Q = $fd / 0.5;
			$step = ($_obfuscate_TBR8Ku9F6Q < $step ? $_obfuscate_TBR8Ku9F6Q : $step);
			$fd2 = $fd - ($step * 0.5);
			$jiangjin = ($bouns + ($step * $_obfuscate_A2xlY0XR4316xw44P6rG)) * $_obfuscate_JnEE2xMbLNa8uY;
		}

		$banner_web_show_tt[0] = round($jiangjin, 2);
		$banner_web_show_tt[1] = round($fd2, 2);
		return $banner_web_show_tt;
	}

	public function formatMySet($lotteryid, $data, $fd1, $fd2)
	{
		$arr = array();

		switch ($lotteryid) {
		case 1:
		case 2:
		case 3:
		case 4:
		case 13:
			foreach ($data as $k => $v ) {
				if (strpos($v['methodname'], '混合') !== false) {
					continue;
				}

				$banner_web_show_tt = $this->getPrizePoint(round($v['prize'], 4), $fd1, 1700);
				$v['prize1'] = $banner_web_show_tt[0];
				$v['fd1'] = $banner_web_show_tt[1];
				$banner_web_show_tt = $this->getPrizePoint(round($v['prize'], 4), $fd1, 1800);
				$v['prize2'] = $banner_web_show_tt[0];
				$v['fd2'] = $banner_web_show_tt[1];
				$banner_web_show_tt = $this->getPrizePoint(round($v['prize'], 4), $fd1, 1900);
				$v['prize3'] = $banner_web_show_tt[0];
				$v['fd3'] = $banner_web_show_tt[1];
				$arr[$k] = $v;
			}

			break;

		case 5:
		case 9:
		case 10:
			foreach ($data as $k => $v ) {
				if (strpos($v['methodname'], '混合') !== false) {
					continue;
				}

				$banner_web_show_tt = $this->getPrizePoint(round($v['prize'], 4), $fd2, 1700);
				$v['prize1'] = $banner_web_show_tt[0];
				$v['fd1'] = $banner_web_show_tt[1];
				$banner_web_show_tt = $this->getPrizePoint(round($v['prize'], 4), $fd2, 1800);
				$v['prize2'] = $banner_web_show_tt[0];
				$v['fd2'] = $banner_web_show_tt[1];
				$banner_web_show_tt = $this->getPrizePoint(round($v['prize'], 4), $fd2, 1900);
				$v['prize3'] = $banner_web_show_tt[0];
				$v['fd3'] = $banner_web_show_tt[1];
				$arr[$k] = $v;
			}

			break;

		case 6:
		case 7:
		case 8:
		case 11:
			foreach ($data as $k => $v ) {
				if (strpos($v['methodname'], '定单双') !== false) {
					continue;
				}

				$banner_web_show_tt = $this->getPrizePoint(round($v['prize'], 4), $fd2, 1700);
				$v['prize1'] = $banner_web_show_tt[0];
				$v['fd1'] = $banner_web_show_tt[1];
				$banner_web_show_tt = $this->getPrizePoint(round($v['prize'], 4), $fd2, 1800);
				$v['prize2'] = $banner_web_show_tt[0];
				$v['fd2'] = $banner_web_show_tt[1];
				$banner_web_show_tt = $this->getPrizePoint(round($v['prize'], 4), $fd2, 1900);
				$v['prize3'] = $banner_web_show_tt[0];
				$v['fd3'] = $banner_web_show_tt[1];
				$arr[$k] = $v;
			}

			break;
		}

		return $arr;
	}

	public function showSongQian()
	{
		$Money = 6;
		$_obfuscate_8Iu1['money'] = $Money;
		// $DaoWebConfig = Db::name('Webconfig');
		$dataWeb = Db::name('webconfig')->find();
		$_obfuscate_8Iu1['webname'] = $dataWeb['webname'];
		// $DaoAccount = Db::name('Account');
		$username = Session::get('un');
		$where_a['username'] = $username;
		$where_a['beizhu'] = '开户有礼活动';
		$dataAccount = Db::name('account')->where($where_a)->find();

		if ($dataAccount) {
			$_obfuscate_8Iu1['isdo'] = 1;
		}
		else {
			$_obfuscate_8Iu1['isdo'] = 0;
		}

		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function doSongQian()
	{
		$money = 6;
		$ip = get_client_ip();

		if (empty($ip)) {
			$this->error('领取失败,你的ip地址有问题!');
		}

		$username = Session::get('un');
		// $DaoUser = Db::name('User');
		$where_u['username'] = $username;
		$dataUser = Db::name('user')->where($where_u)->find();
		$todayTime = strtotime(date('Y-m-d 00:00:01'));

		if (strtotime($dataUser['addtime']) < $todayTime) {
			$this->error('领取失败,本次活动仅针对新开用户!');
		}

		// $DaoLogin = Db::name('Login');
		// $DaoAccount = Db::name('Account');
		$where_a['username'] = $username;
		$where_a['beizhu'] = '开户有礼活动';
		$dataAccount = Db::name('account')->where($where_a)->find();

		if ($dataAccount) {
			$this->error('领取失败,你已经领取过了!');
			return NULL;
		}

		if (empty($dataUser['banknum']) || empty($dataUser['realname']) || (0 == $dataUser['lock'])) {
			$this->error('领取失败,请先绑定银行卡并且锁定资料,方可领取彩金!');
			return NULL;
		}

		$where_l['usertype'] = 2;
		$where_l['logip'] = $ip;
		$dataLogin = Db::name('login')>where($where_l)->find();

		if ($dataLogin) {
			$this->error('领取失败,你当前使用的IP地址,已经领取过了!');
			return NULL;
		}

		$umoney = round($dataUser['money'], 4);
		$money_befor = $umoney;
		$money_after = round($umoney + $money, 4);
		$da['username'] = $username;
		$da['money'] = $money;
		$da['money_befor'] = $money_befor;
		$da['money_after'] = $money_after;
		$da['accounttype'] = 11;
		$da['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
		$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
		$da['beizhu'] = '开户有礼活动';
		$da['addtime'] = date('Y-m-d H:i:s');
		$da['mode'] = 1;
		$da_l['logtime'] = date('Y-m-d H:i:s');
		$da_l['username'] = $username;
		$da_l['logip'] = $ip;
		$da_l['usertype'] = 2;
		if (Db::name('user')->where('username',$username)->setInc('money', $money) && Db::name('account')->insert($da) && Db::name('login')->insert($da_l)) {
			$this->success('恭喜您获得' . $money . '元活动礼金！');
		}
		else {
			$this->error('获取礼金失败');
		}
	}

	public function getTodayXiaoFei()
	{
		$param=$this->request->param();
		$timemin = date('Y-m-d 00:00:01');
		$timemax = date('Y-m-d 23:59:59');
		$condition['addtime'] = array(
			array('gt', $timemin),
			array('lt', $timemax),
			'and'
			);
		$username = Session::get('un');
		$condition['username'] = $username;
		$condition['state'] = array(
			array('eq', 1),
			array('eq', 2),
			'or'
			);
		// $DaoOrder = Db::name('Order');
		$dataOrder = Db::name('order')->where($condition)->sum('money');

		if (empty($dataOrder)) {
			$dataOrder = 0;
		}
		isset($param['ajax']) or $param['ajax']='';
		$ajax = $param['ajax'];

		if ($ajax == 'jiang') {
			echo $dataOrder;
			return NULL;
		}

		return $dataOrder;
	}

	public function dbqb()
	{
		$qbNum = 30;
		$s_start_time = date('14:04:00');
		$s_end_time = date('14:14:00');
		$x_start_time = date('23:24:00');
		$x_end_time = date('23:34:00');
		$Tpl['qbNum'] = $qbNum;
		$Tpl['s_start_time'] = $s_start_time;
		$Tpl['s_end_time'] = $s_end_time;
		$Tpl['x_start_time'] = $x_start_time;
		$Tpl['x_end_time'] = $x_end_time;
		$getXiaoFei = $this->getTodayXiaoFei();
		$this->assign('jrxf', $getXiaoFei);
		$nowTime = date('Y-m-d H:i:s');
		$nowTime_int = strtotime($nowTime);
		$s_start_time = date('Y-m-d 14:04:00');
		$s_start_time_int = strtotime($s_start_time);
		$s_end_time = date('Y-m-d 14:14:00');
		$s_end_time_int = strtotime($s_end_time);
		$x_start_time = date('Y-m-d 23:24:00');
		$x_start_time_int = strtotime($x_start_time);
		$x_end_time = date('Y-m-d 23:34:00');
		$x_end_time_int = strtotime($x_end_time);
		$show = 0;
		$cang = '上半场';
		if (($s_end_time_int < $nowTime_int) && ($nowTime_int < $x_start_time_int)) {
			$show = 1;
			$cang = '上半场';
		}

		if ($x_end_time_int < $nowTime_int) {
			$show = 2;
			$cang = '下半场';
		}
		if (0 < $show) {
			$dbarr = Cache::get('dbarr');

			if (empty($dbarr)) {
				// $DaoJiazj = Db::name('jiazj');
				$dataJiazj = Db::name('jiazj')->select();
				$countJiazj = count($dataJiazj);
				$dbarr = array();
				$nickarr = array();
				$cn = 10;

				for ($i = 0; $i < $cn; $i++) {
					$j = mt_rand(0, $countJiazj - 1);
					$data = $dataJiazj[$j];

					if (in_array($data['nickname'], $nickarr)) {
						$cn++;
						continue;
					}
					else {
						$nickarr[] = $data['nickname'];
					}
				}

				for ($i = 0; $i < 10; $i++) {
					$dbarr[$i]['nickname'] = $nickarr[$i];
					$dbarr[$i]['cang'] = $cang;

					if ($i == 0) {
						$dbarr[$i]['money'] = 1920;
					}
					else {
						$dbarr[$i]['money'] = mt_rand(50, 300);
					}
				}

				foreach ($dbarr as $row ) {
					$volume[] = $row['money'];
				}

				array_multisort($volume, SORT_NUMERIC, SORT_DESC, $dbarr);

				if ($show == 1) {
					Cache::set('dbarr', $dbarr, $x_start_time_int - $nowTime_int);
				}
				else if ($show == 2) {
					$s_start_time_int += 80000;
					Cache::set('dbarr', $dbarr, $s_start_time_int - $nowTime_int);
				}
			}

			$this->assign('dbarr', $dbarr);
		}else{
			$dbarr = Cache::get('dbarr');
			$this->assign('dbarr', $dbarr);
		}
		// print_r($dbarr);exit;
		$this->assign($Tpl);
		return $this->fetch();
	}

	public function dodbqb()
	{
		$nowTime = date('Y-m-d H:i:s');
		$nowTime_int = strtotime($nowTime);
		$s_start_time = date('Y-m-d 14:04:00');
		$s_start_time_int = strtotime($s_start_time);
		$s_end_time = date('Y-m-d 14:14:00');
		$s_end_time_int = strtotime($s_end_time);
		$x_start_time = date('Y-m-d 23:24:00');
		$x_start_time_int = strtotime($x_start_time);
		$x_end_time = date('Y-m-d 23:34:00');
		$x_end_time_int = strtotime($x_end_time);
		$jiangjing = Cache::get('dbjj');

		if (empty($jiangjing)) {
			$jiangjing = array();

			for ($i = 0; $i < 30; $i++) {
				if ($i < 5) {
					$jiangjing[$i] = mt_rand(20, 30);
				}

				if ((5 <= $i) && ($i < 15)) {
					$jiangjing[$i] = mt_rand(10, 20);
				}

				if (15 <= $i) {
					$jiangjing[$i] = mt_rand(1, 10);
				}
			}

			Cache::set('dbjj', $jiangjing, 15 * 60);
		}

		shuffle($jiangjing);
		$money = array_shift($jiangjing);
		Cache::set('dbjj', $jiangjing, 15 * 60);

		if ($nowTime_int < $x_start_time_int) {
			if (($nowTime_int < $s_start_time_int) || ($s_end_time_int < $nowTime_int)) {
				$this->error('抢宝失败! 原因:本日上半场的抢宝活动未开始或者已经结束！请参加下半场的抢宝！');
			}
		}
		else {
			if (($nowTime_int < $x_start_time_int) || ($x_end_time_int < $nowTime_int)) {
				$this->error('抢宝失败! 原因:本日下半场的抢宝活动未开始或者已经结束！请明天参加！');
			}
		}

		$username = Session::get('un');
		$where_u['username'] = $username;
		$DaoUser = Db::name('user');
		$dataUser = $DaoUser->where($where_u)->find();
		$getXiaoFei = $this->getTodayXiaoFei();
		$zuismoney = 3000;
		if ((round($dataUser['money'], 4) < $zuismoney) && ($getXiaoFei < 2000)) {
			$this->error('抢宝失败! 原因:你的余额不足' . $zuismoney . '元或者今日消费量不足2000元，无法参加抢宝活动，请冲值后再来！');
		}

		$qbNum = 30;
		$DaoAccount = Db::name('account');

		if ($nowTime_int < $x_start_time_int) {
			$where_a['addtime'] = array(
				array('gt', $s_start_time),
				array('lt', $s_end_time),
				'and'
				);
			$where_a['beizhu'] = '夺宝奇兵';
			$count = $DaoAccount->where($where_a)->count();

			if (($qbNum - $count) <= 0) {
				$this->error('抢宝失败! 原因:上半场已经被抢走了' . $qbNum . '个宝箱，你来晚了兄弟，请参加下半场的抢宝！');
				return NULL;
			}

			$where_a['username'] = $username;

			if (0 < $DaoAccount->where($where_a)->count()) {
				$this->error('抢宝失败! 原因:今天的上半场抢宝活动你已经参加过了，请参加下半场抢宝！');
				return NULL;
			}
		}
		else {
			$where_a['addtime'] = array(
				array('gt', $x_start_time),
				array('lt', $x_end_time),
				'and'
				);
			$where_a['beizhu'] = '夺宝奇兵';
			$count = $DaoAccount->where($where_a)->count();

			if (($qbNum - $count) <= 0) {
				$this->error('抢宝失败! 原因:下半场已经被抢走了' . $qbNum . '个宝箱，你来晚了兄弟，请明天参加抢宝！');
				return NULL;
			}

			$where_a['username'] = $username;

			if (0 < $DaoAccount->where($where_a)->count()) {
				$this->error('抢宝失败! 原因:今天的下半场抢宝活动你已经参加过了，请明天参加！');
				return NULL;
			}
		}

		$umoney = round($dataUser['money'], 4);
		$money_befor = $umoney;
		$money_after = round($umoney + $money, 4);
		$da['username'] = $username;
		$da['money'] = $money;
		$da['money_befor'] = $money_befor;
		$da['money_after'] = $money_after;
		$da['accounttype'] = 11;
		$da['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
		$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
		$da['beizhu'] = '夺宝奇兵';
		$da['addtime'] = date('Y-m-d H:i:s');
		$da['mode'] = 1;
		$dodbqb = Session::get('dodbqb');
		if (empty($dodbqb) || !Session::is_set('dodbqb')) {
			Session::set('dodbqb', 'qq');
		}
		else {
			$this->error('您今日已经参加过该活动了!');
			return NULL;
		}

		if ($DaoUser->where('username',$username)->setInc('money', $money) && $DaoAccount->insert($da)) {
			$this->assign('waitSecond', 5);
			$this->success('恭喜您！你成功抢到了1个宝箱，打开一看，我擦，里面有' . $money . '元 ！！');
		}
		else {
			$this->error('获取宝箱失败,请重试!');
		}
	}

	public function getLingJiangInfo()
	{
		$data['startTime'] = '23:03:00';
		$data['endTime'] = '23:13:00';
		$data['ljMoney1'] = 50;
		$data['ljMoney2'] = 300;
		$data['ljMoney3'] = 1000;
		$data['ljxiaofei1'] = 3000;
		$data['ljxiaofei2'] = 8000;
		$data['ljxiaofei3'] = 20000;
		$data['liYG1'] = 800;
		$data['liYG2'] = 3000;
		$data['liYG3'] = 10000;
		$timemin = date('Y-m-d 00:00:01');
		$timemax = date('Y-m-d 23:59:59');
		$condition['addtime'] = array(
			array('gt', $timemin),
			array('lt', $timemax),
			'and'
			);
		$username = Session::get('un');
		$condition['username'] = $username;
		$condition['state'] = array(
			array('eq', 1),
			array('eq', 2),
			'or'
			);
		$DaoOrder = Db::name('order');
		$dataOrder = $DaoOrder->where($condition)->sum('money');

		if (empty($dataOrder)) {
			$dataOrder = 0;
		}

		$data['yhXF'] = $dataOrder;
		$DaoUser = Db::name('user');
		$where_u['username'] = $username;
		$data_u = $DaoUser->where($where_u)->find();
		$data['yhYG'] = $data_u['money'];
		$data['username'] = $username;
		return $data;
	}

	public function linJiang()
	{
		$INFO = $this->getLingJiangInfo();
		$this->assign($INFO);
		return $this->fetch();
	}

	public function doLinJiang()
	{
		$this->assign('waitSecond', 5);
		$INFO = $this->getLingJiangInfo();
		$_obfuscate_PpZPqh6HEA = date('Y-m-d H:i:s');
		$_obfuscate_IYyNt76nI30Cw4o = strtotime($_obfuscate_PpZPqh6HEA);

		if ($_obfuscate_IYyNt76nI30Cw4o < strtotime(date('Y-m-d ' . $INFO['startTime'] . ''))) {
			$this->error('领奖失败! 原因:本日领奖活动还没有开始！');
		}

		if (strtotime(date('Y-m-d ' . $INFO['endTime'] . '')) < $_obfuscate_IYyNt76nI30Cw4o) {
			$this->error('领奖失败! 原因:本日领奖活动已结束！');
		}

		if ($INFO['yhYG'] < $INFO['liYG1']) {
			$this->error('领奖失败! 原因:用户余额少于初级领奖最低账户余额要求！');
		}

		if ($INFO['yhXF'] < $INFO['ljxiaofei1']) {
			$this->error('领奖失败! 原因:用户最低消费少于初级领奖最少消费要求！');
		}

		$_obfuscate_LLb2zuyw2Q = $INFO['yhXF'];
		$usm = $INFO['yhYG'];
		$username = $INFO['username'];

		if ($INFO['ljxiaofei3'] <= $_obfuscate_LLb2zuyw2Q) {
			if ($INFO['liYG3'] <= $usm) {
				$this->updateLj('高级领奖', $INFO['ljMoney3'], $username, $usm);
			}
			else if ($INFO['liYG2'] <= $usm) {
				$this->updateLj('中级领奖', $INFO['ljMoney2'], $username, $usm);
			}
			else if ($INFO['liYG1'] <= $usm) {
				$this->updateLj('初级领奖', $INFO['ljMoney1'], $username, $usm);
			}
		}

		if ($INFO['ljxiaofei2'] <= $_obfuscate_LLb2zuyw2Q) {
			if ($INFO['liYG2'] <= $usm) {
				$this->updateLj('中级领奖', $INFO['ljMoney2'], $username, $usm);
			}
			else if ($INFO['liYG1'] <= $usm) {
				$this->updateLj('初级领奖', $INFO['ljMoney1'], $username, $usm);
			}
		}

		if ($INFO['ljxiaofei1'] <= $_obfuscate_LLb2zuyw2Q) {
			if ($INFO['liYG1'] <= $usm) {
				$this->updateLj('初级领奖', $INFO['ljMoney1'], $username, $usm);
			}
			else {
				$this->error('领奖失败! 可能原因:你的余额不足！');
			}
		}
	}

	public function saveLj($lijibie, $getmoney, $username, $usm)
	{
		$umoney = round($getmoney, 4);
		$money_befor = $usm;
		$money_after = round($umoney + $money_befor, 4);
		$da['username'] = $username;
		$da['money'] = $getmoney;
		$da['money_befor'] = $money_befor;
		$da['money_after'] = $money_after;
		$da['accounttype'] = 11;
		$da['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
		$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
		$da['beizhu'] = $lijibie;
		$da['addtime'] = date('Y-m-d H:i:s');
		$da['mode'] = 1;
		$DaoAccount = Db::name('Account');
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$_obfuscate_ndwqGjIXA['username'] = $username;
		$_obfuscate_ahiXcXq_Pg = date('Y-m-d 00:00:01');
		$_obfuscate_tYDlY3UVOg = date('Y-m-d 23:59:59');
		$_obfuscate_ndwqGjIXA['addtime'] = array(
			array('gt', $_obfuscate_ahiXcXq_Pg),
			array('lt', $_obfuscate_tYDlY3UVOg),
			'and'
			);
		$_obfuscate_ndwqGjIXA['beizhu'] = array(
			array('eq', '初级领奖'),
			array('eq', '中级领奖'),
			array('eq', '高级领奖'),
			'or'
			);

		if (0 < $DaoAccount->where($_obfuscate_ndwqGjIXA)->count()) {
			$this->error('领奖失败! 原因:今天的领奖活动你已经参加过了，请明天参加！');
			return NULL;
		}

		if ($_obfuscate_6ogI80pkWQ->where('username',$username)->setInc('money', $getmoney) && $DaoAccount->insert($da)) {
			$this->assign('waitSecond', 5);
			$this->success('恭喜您！领取' . $getmoney . '元 ！！');
		}
		else {
			$this->error('领奖失败,请重试!');
		}
	}

	public function getDzyhInfo()
	{
		$username = Session::get('un');
		$data['lr1'] = 0.002;
		$data['lr10'] = 0.0025;
		$data['lr30'] = 0.0035;
		$data['lr180'] = 0.0045;
		$data['lr360'] = 0.0055;
		$data['lr'] = 0;
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$where_u['username'] = $username;
		$data_u = $_obfuscate_6ogI80pkWQ->where($where_u)->find();
		$data['yhYG'] = $data_u['money'];
		$data['yhck'] = $data_u['dzyhck'];
		if (empty($data['yhck']) || ($data['yhck'] < 0.001)) {
			$data['yhck'] = 0;
		}

		if (empty($data_u['dzyhcktime'])) {
			$data['yhcktime'] = 0;
			$data['dayyu'] = 0;
		}
		else {
			$_obfuscate_PpZPqh6HEA = strtotime(date('Y-m-d H:i:s'));
			$cktime = strtotime($data_u['dzyhcktime']);
			$timecha = floor(($_obfuscate_PpZPqh6HEA - $cktime) / 3600);
			$_obfuscate_ZkRJas0 = floor($timecha / 24);

			if (360 <= $_obfuscate_ZkRJas0) {
				$data['lr'] = $data['lr360'];
			}
			else if (180 <= $_obfuscate_ZkRJas0) {
				$data['lr'] = $data['lr180'];
			}
			else if (30 <= $_obfuscate_ZkRJas0) {
				$data['lr'] = $data['lr30'];
			}
			else if (10 <= $_obfuscate_ZkRJas0) {
				$data['lr'] = $data['lr10'];
			}
			else if (1 <= $_obfuscate_ZkRJas0) {
				$data['lr'] = $data['lr1'];
			}

			$data['dayyu'] = $_obfuscate_ZkRJas0;

			if ($data['yhck'] == 0) {
				$data['yhcktime'] = 0;
			}
		}

		$data['yhcklx'] = round($data['lr'] * $data['yhck'] * $_obfuscate_ZkRJas0, 4);
		$data['username'] = $username;
		return $data;
	}

	public function dzyh()
	{
		$INFO = $this->getDzyhInfo();
		$this->assign($INFO);
		return $this->fetch();
	}

	public function dzyhck()
	{
		$_obfuscate_WBU5kjnD3w = round($param['c_money'], 4);

		if ($_obfuscate_WBU5kjnD3w <= 0) {
			$this->error('存款金额不能小于或等于 0');
		}

		if (300000 <= $_obfuscate_WBU5kjnD3w) {
			$this->error('存款金额不能大于300000');
		}

		if (!is_numeric($_obfuscate_WBU5kjnD3w)) {
			$this->error('金额格式不正确');
		}

		$username = Session::get('un');
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$where_u['username'] = $username;
		$data_u = $_obfuscate_6ogI80pkWQ->where($where_u)->find();

		if (($data_u['money'] - $_obfuscate_WBU5kjnD3w) < 0) {
			$this->error('你的余额不足');
		}

		if (0 < $data_u['dzyhck']) {
			$this->error('你目前尚有存款，请先进行提取本金与利息！');
		}

		$umoney = $data_u['money'];
		$money_befor = $umoney;
		$money_after = round($umoney - $_obfuscate_WBU5kjnD3w, 4);
		$da['username'] = $username;
		$da['money'] = $_obfuscate_WBU5kjnD3w;
		$da['money_befor'] = $money_befor;
		$da['money_after'] = $money_after;
		$da['accounttype'] = 11;
		$da['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
		$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
		$da['beizhu'] = '电子存款';
		$da['addtime'] = date('Y-m-d H:i:s');
		$da['mode'] = 1;
		$DaoAccount = Db::name('Account');
		$DaoAccount->insert($da);
		$_obfuscate_6ogI80pkWQ->where('username',$username)->setDec('money',$_obfuscate_WBU5kjnD3w);
		$_obfuscate_6ogI80pkWQ->where('username',$username)->setInc('dzyhck', $_obfuscate_WBU5kjnD3w);
		$dd['dzyhcktime'] = date('Y-m-d H:i:s');
		$_obfuscate_6ogI80pkWQ->where(array('username' => $username))->update($dd);
		$this->success('存款成功，本奖存进' . $_obfuscate_WBU5kjnD3w . ',多存多得哦！~~~');
	}

	public function dzyhtk()
	{
		$INFO = $this->getDzyhInfo();
		$username = Session::get('un');
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$dd['dzyhck'] = 0;
		$dd['dzyhcktime'] = '';
		$_obfuscate_6ogI80pkWQ->where(array('username' => $username))->update($dd);
		$addmoney = round($INFO['yhcklx'] + $INFO['yhck'], 4);

		if ($addmoney <= 0) {
			$this->error('取款失败，你目前没有存款！');
		}

		$umoney = $INFO['yhYG'];
		$money_befor = $umoney;
		$money_after = round($umoney + $addmoney, 4);
		$da['username'] = $username;
		$da['money'] = $addmoney;
		$da['money_befor'] = $money_befor;
		$da['money_after'] = $money_after;
		$da['accounttype'] = 11;
		$da['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
		$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
		$da['beizhu'] = '电子提款';
		$da['addtime'] = date('Y-m-d H:i:s');
		$da['mode'] = 1;
		$DaoAccount = Db::name('Account');
		$DaoAccount->insert($da);
		$_obfuscate_6ogI80pkWQ->where('username',$username)->setInc('money',$addmoney);
		$this->success('取款成功，连本金带利息共取出' . $addmoney . ',多存多得哦！~~~');
	}

	public function hlSong()
	{
		$username = Session::get('un');
		$DaoAccount = Db::name('account');
		$_obfuscate_ndwqGjIXA['username'] = $username;
		$_obfuscate_ahiXcXq_Pg = date('Y-m-d 00:00:01');
		$_obfuscate_tYDlY3UVOg = date('Y-m-d 23:59:59');
		// $_obfuscate_ndwqGjIXA['addtime'] = array(
		// 	array('gt', $_obfuscate_ahiXcXq_Pg),
		// 	array('lt', $_obfuscate_tYDlY3UVOg),
		// 	'and'
		// 	);
		// $_obfuscate_ndwqGjIXA['beizhu'] = array(
		// 	array('eq', '欢乐送')
		// 	);
		$_obfuscate_2lyvQQ = 0;

		if (0 < $DaoAccount->where('addtime','gt',$_obfuscate_ahiXcXq_Pg)->where('addtime','lt',$_obfuscate_tYDlY3UVOg)->where('beizhu','eq','欢乐送')->count()) {
			$_obfuscate_2lyvQQ = 0;
		}
		else {
			$_obfuscate_2lyvQQ = 1;
		}
		$_obfuscate_HFFFcUox7QrVZw = $this->getTodayXiaoFei();
		$this->assign('hlmoney', 400);
		$this->assign('xjjrxf', 1000);
		$this->assign('songMoney', 5);
		$this->assign('jrxf', $_obfuscate_HFFFcUox7QrVZw);
		$this->assign('isCJ', $_obfuscate_2lyvQQ);
		return $this->fetch();
	}

	public function doknhb()
	{
		$this->assign('jumpUrl', '__APP__/index');
		$now = date('Y-m-d H:i:s');

		if (strtotime($now) < strtotime('2014-01-28 00:00:01')) {
			$this->error('领取失败，活动尚未开放！');
		}

		$username = Session::get('un');
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$where_u['username'] = $username;
		$data_u = $_obfuscate_6ogI80pkWQ->where($where_u)->find();
		$usm = $data_u['money'];
		if (empty($data_u['bankname']) || empty($data_u['banknum']) || empty($data_u['realname'])) {
			$this->error('领取失败，请先绑定银行卡号！');
		}

		$DaoAccount = Db::name('account');
		$_obfuscate_ndwqGjIXA['username'] = $username;
		$_obfuscate_ahiXcXq_Pg = date('Y-m-d 00:00:01');
		$_obfuscate_tYDlY3UVOg = date('Y-m-d 23:59:59');
		$_obfuscate_ndwqGjIXA['addtime'] = array(
			array('gt', $_obfuscate_ahiXcXq_Pg),
			array('lt', $_obfuscate_tYDlY3UVOg),
			'and'
			);
		$_obfuscate_ndwqGjIXA['beizhu'] = array(
			array('eq', '跨年大礼包')
			);
		$_obfuscate_2lyvQQ = 0;

		if (0 < $DaoAccount->where($_obfuscate_ndwqGjIXA)->count()) {
			$this->error('领取失败，你今天已经领取过了！');
		}

		$ip = get_client_ip();
		$DaoLogin = Db::name('Login');
		$_obfuscate_ndwqGjIXA['usertype'] = 3;
		$_obfuscate_ndwqGjIXA['logip'] = $ip;
		$dataLogin = $DaoLogin->where($_obfuscate_ndwqGjIXA)->find();

		if ($dataLogin) {
			$this->error('领取失败! 原因:当前IP地址今日已经使领取过了！');
		}

		$da_l['logtime'] = date('Y-m-d H:i:s');
		$da_l['username'] = $username;
		$da_l['logip'] = $ip;
		$da_l['usertype'] = 3;
		$DaoLogin->insert($da_l);
		$songMoney = mt_rand(8, 12);
		$umoney = round($songMoney, 4);
		$money_befor = $usm;
		$money_after = round($umoney + $money_befor, 4);
		$da['username'] = $username;
		$da['money'] = $songMoney;
		$da['money_befor'] = $money_befor;
		$da['money_after'] = $money_after;
		$da['accounttype'] = 11;
		$da['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
		$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
		$da['beizhu'] = '跨年大礼包';
		$da['addtime'] = date('Y-m-d H:i:s');
		$da['mode'] = 1;
		if ($_obfuscate_6ogI80pkWQ->where('username',$username)->setInc('money',$songMoney) && $DaoAccount->insert($da)) {
			$this->assign('waitSecond', 5);
			$this->assign('jumpUrl', '__APP__/index');
			$this->success('恭喜您！领取' . $songMoney . '元 ！！');
		}
		else {
			$this->error('领取失败,请重试!');
		}
	}

	public function doHlSong()
	{
		$username = Session::get('un');
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$where_u['username'] = $username;
		$data_u = $_obfuscate_6ogI80pkWQ->where($where_u)->find();
		$usm = $data_u['money'];
		$_obfuscate_UOAgJc0glg = 400;
		$songMoney = 5;
		$_obfuscate_HFFFcUox7QrVZw = $this->getTodayXiaoFei();

		if ($_obfuscate_HFFFcUox7QrVZw < 1000) {
			$this->error('领取失败，你的今日消费总和不足1000元，无法领取！');
		}

		$DaoAccount = Db::name('account');
		$_obfuscate_ndwqGjIXA['username'] = $username;
		$_obfuscate_ahiXcXq_Pg = date('Y-m-d 00:00:01');
		$_obfuscate_tYDlY3UVOg = date('Y-m-d 23:59:59');
		$_obfuscate_ndwqGjIXA['addtime'] = array(
			array('gt', $_obfuscate_ahiXcXq_Pg),
			array('lt', $_obfuscate_tYDlY3UVOg),
			'and'
			);
		$_obfuscate_ndwqGjIXA['beizhu'] = array(
			array('eq', '欢乐送')
			);
		$_obfuscate_2lyvQQ = 0;

		if (0 < $DaoAccount->where($_obfuscate_ndwqGjIXA)->count()) {
			$this->error('领取失败，你今天已经领取过了！');
		}

		$umoney = round($songMoney, 4);
		$money_befor = $usm;
		$money_after = round($umoney + $money_befor, 4);
		$da['username'] = $username;
		$da['money'] = $songMoney;
		$da['money_befor'] = $money_befor;
		$da['money_after'] = $money_after;
		$da['accounttype'] = 11;
		$da['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
		$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
		$da['beizhu'] = '欢乐送';
		$da['addtime'] = date('Y-m-d H:i:s');
		$da['mode'] = 1;
		if ($_obfuscate_6ogI80pkWQ->where('username',$username)->setInc('money', $songMoney) && $DaoAccount->insert($da)) {
			$this->assign('waitSecond', 5);
			$this->success('恭喜您！领取' . $songMoney . '元 ！！');
		}
		else {
			$this->error('领奖失败,请重试!');
		}
	}

	public function yeepayreg()
	{
		$param=$this->request->param();
		// vendor('yeepay.yeepayCommon');
		$p2_Order = 'yeePay_ck' . time() . rand_string(6, 1);
		$p3_Amt = $param['real_money'];
		$p4_Cur = 'CNY';
		$p5_Pid = 'YouXiBi';
		$p6_Pcat = 'YouXiBi';
		$p7_Pdesc = 'YouXiBi';
		$p8_Url = 'http://' . $_SERVER['HTTP_HOST'] . url('Yeepay/yeepaycall');
		$pa_MP = Session::get('un');
		$pd_FrpId = '';
		$_obfuscate_W4QApBSBB2qKHUPqb_FN = '1';
		$p1_MerId = '10012402759';
		$merchantKey = '64npid2kngci0xs71qpbfzqjzgj4gwahkhpcl68s71vy75e4zfuxcaqurkjn';
		$hmac = getreqhmacstring($p2_Order, $p3_Amt, $p4_Cur, $p5_Pid, $p6_Pcat, $p7_Pdesc, $p8_Url, $pa_MP, $pd_FrpId, $_obfuscate_W4QApBSBB2qKHUPqb_FN, $p1_MerId, $merchantKey);
		$_obfuscate__e6i50hF['p0_Cmd'] = 'Buy';
		$_obfuscate__e6i50hF['p1_MerId'] = $p1_MerId;
		$_obfuscate__e6i50hF['p2_Order'] = $p2_Order;
		$_obfuscate__e6i50hF['p3_Amt'] = $p3_Amt;
		$_obfuscate__e6i50hF['p4_Cur'] = $p4_Cur;
		$_obfuscate__e6i50hF['p5_Pid'] = $p5_Pid;
		$_obfuscate__e6i50hF['p6_Pcat'] = $p6_Pcat;
		$_obfuscate__e6i50hF['p7_Pdesc'] = $p7_Pdesc;
		$_obfuscate__e6i50hF['p8_Url'] = $p8_Url;
		$_obfuscate__e6i50hF['p9_SAF'] = '0';
		$_obfuscate__e6i50hF['pa_MP'] = $pa_MP;
		$_obfuscate__e6i50hF['pd_FrpId'] = $pd_FrpId;
		$_obfuscate__e6i50hF['pr_NeedResponse'] = $_obfuscate_W4QApBSBB2qKHUPqb_FN;
		$_obfuscate__e6i50hF['hmac'] = $hmac;
		$data['username'] = $pa_MP;
		$data['money'] = $p3_Amt;
		$data['ordernum'] = $p2_Order;
		$data['addtime'] = date('Y-m-d H:i:s');
		$Dao_yeepay = Db::name('yeepay');
		$Dao_yeepay->where(array('username' => $pa_MP))->delete();
		$nowAdd2 = date('Y-m-d H:i:s', strtotime('-6 hour'));
		$Dao_yeepay->where(array(
	'addtime' => array('lt', $nowAdd2)
	))->delete();
		$Dao_yeepay->insert($data);
		$this->assign($_obfuscate__e6i50hF);
		return $this->fetch();
	}
}


?>
