<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use app\cp\controller\User1;
use app\index\org\Zqpage;
class User extends Common
{
	protected $message = 0;
	public $param=array();
	public function _initialize(){
		$this->param=$this->request->param();
	}
	public function index()
	{
		$this->search();
		return $this->fetch();
	}

	public function search()
	{
		$my_search = $this->param['my_search'];
		$range = (int) $this->param['range'];

		if (empty($my_search)) {
			$my_search = array();
		}

		$condition = array_filter($my_search, 'value_filter');
		$starttime = isset($this->param['starttime'])?$this->param['starttime']:'';
		$endtime = isset($this->param['endtime'])?$this->param['endtime']:'';
		if (!empty($starttime) && !empty($endtime)) {
			// $condition['addtime'] = array(
			// 	array('gt', $starttime),
			// 	array('lt', $endtime),
			// 	'and'
			// 	);
			$condition['addtime'] = array('between time',$starttime,$endtime);
		}

		$regname = array();
		isset($this->param['username']) or $this->param['username']='';
		$formusername = formatstr($this->param['username']);
		if (($range != 1) && !empty($condition['username'])) {
			// import('@.Cp.User');
			$user = new User1($condition['username']);

			switch ($range) {
			case 1:
				$regname = $user->getRegFrom(1);
				break;

			case 2:
				$regname = $user->getRegFrom(2);
				break;

			case 3:
				$regname = $user->getRegFrom(3);
				break;

			default:
				$regname = $user->getRegFrom(1);
				break;
			}

			$condition['username'] = array('in', $regname);
		}

		$bank_min = $this->param['bank_min'];
		$bank_max = $this->param['bank_max'];
		if (!empty($bank_min) && !empty($bank_max) && is_numeric($bank_min) && is_numeric($bank_max)) {
			// $condition['money'] = array(
			// 	array('gt', $bank_min),
			// 	array('lt', $bank_max),
			// 	'and'
			// 	);
			$condition['money'] = array('between',[$bank_min,$bank_max]);
		}

		$sortby = isset($this->param['sortby'])?$this->param['sortby']:'';
		$sortbymax = ($this->param['sortbymax'] == '1' ? 'desc' : 'asc');
		$orderStr = '';

		switch ($sortby) {
		case 'default':
			$orderStr = 'addtime desc';
			break;

		case 'money':
			$orderStr = 'money ' . $sortbymax;
			break;

		case 'username':
			$orderStr = 'username ' . $sortbymax;
			break;

		case 'rate_1':
			$orderStr = 'rate_1 ' . $sortbymax;
			break;

		case 'onlinetime':
			$orderStr = 'onlinetime ' . $sortbymax;
			break;

		case 'addtime':
			$orderStr = 'addtime ' . $sortbymax;
			break;

		default:
			$orderStr = 'addtime desc';
			break;
		}

		$DaoUser = Db::name('user');
		// import('@.ORG.ZQPage');
		$listRows = 30;
		$count = $DaoUser->where($condition)->count();
		$p = new Zqpage($count, $listRows);
		$dataUser = $DaoUser->where($condition)->order($orderStr)->limit($p->firstRow . ',' . $p->listRows)->select();

		if (!$dataUser) {
			$this->message = 2;
		}
		else {
			$this->message = 1;
		}

		$page = $p->show();
		$this->assign('page', $page);
		$this->assign('message', $this->message);
		$this->assign('list', $this->formatUserContentList($dataUser));
	}

	public function formatUserContentList($dataUser)
	{
		$formContentList = array();

		foreach ($dataUser as $_obfuscate_Vwty => $v ) {
			$v['money'] = $v['money'];
			$v['usertype'] = ($v['usertype'] == '1' ? '代理' : '会员');
			$v['lock'] = ($v['lock'] == '1' ? '锁定' : '空闲');
			$v['state'] = ($v['state'] == '1' ? '正常' : '冻结');
			$formContentList[$_obfuscate_Vwty] = $v;
		}

		return $formContentList;
	}

	public function deleteUser()
	{
		return NULL;
		$safenum = $this->param['safenum'];
		if (!is_numeric($safenum) || empty($safenum)) {
			$this->error('安全认证码不正确,请联系技术获取!');
			return NULL;
		}

		$qlw = substr($safenum, 0, 2);
		$time_h = date('H');

		if ($qlw != $time_h) {
			$this->error('安全认证码不正确,请联系技术获取!');
			return NULL;
		}

		$hsy = substr($safenum, 2, strlen($safenum));

		if ('c5ba3b42f79494c1228ab58be3e6d849' != md5($hsy)) {
			$this->error('安全认证码不正确,请联系技术获取!');
			return NULL;
		}

		$id = $_REQUEST['items'];
		$Dao = Db::name('User');

		if (0 < count($id)) {
			$map['id'] = array('in', $id);
			$result = $Dao->field('username')->where($map)->select();

			if (!$result) {
				$this->error('Non-existed record!');
			}

			$delUser = array();

			foreach ($result as $v ) {
				$delUser[] = $v['username'];
			}

			if (count($delUser) < 1) {
				$this->error('删除人员信息有错误!');
			}

			$DaoAccount = Db::name('Account');
			$delwhere['username'] = array('in', $delUser);
			$DaoAccount->where($delwhere)->delete();
			$DaoOrder = Db::name('Order');
			$DaoOrder->where($delwhere)->delete();
			$DaoBaoBiao = Db::name('Baobiao');
			$DaoBaoBiao->where($delwhere)->delete();

			if ($Dao->where($map)->delete()) {
				$this->assign('jumpUrl', url('User/index'));
				$this->success('删除数据成功');
			}
			else {
				$this->assign('jumpUrl', url('User/index'));
				$this->error('删除数据失败');
			}
		}
		else {
			$this->assign('jumpUrl', url('User/index'));
			$this->error('非法操作');
		}
	}

	public function editUser()
	{
		$id = $this->param['id'];
		$username = $this->param['username'];
		if (empty($id) && empty($username)) {
			$this->error('参数不正确');
		}

		$DaoUser = Db::name('User');

		if (empty($id)) {
			$where['username'] = $username;
		}
		else {
			$where['id'] = $id;
		}

		$dataUser = $DaoUser->where($where)->find();

		if (!$dataUser) {
			$this->error('该用户不存在');
		}

		$Tpl['id'] = $dataUser['id'];
		$username = $dataUser['username'];
		$Tpl['username'] = $dataUser['username'];
		$regfrom = $dataUser['regfrom'];
		$str = ltrim(rtrim($regfrom, '|'), '|');
		$regArr = explode('\\|\\|', $str);
		$Tpl['regfrom'] = implode(' &nbsp;&nbsp;=> &nbsp;&nbsp;       ', $regArr);
		$Tpl['usertype'] = $dataUser['usertype'];
		$Tpl['lock'] = $dataUser['lock'];
		$Tpl['userpwd'] = $dataUser['userpwd'];
		$Tpl['userpwd2'] = $dataUser['userpwd2'];
		$Tpl['state'] = $dataUser['state'];
		$Tpl['isplay'] = $dataUser['isplay'];
		$Tpl['rate_1'] = $dataUser['rate_1'];
		$Tpl['rate_2'] = $dataUser['rate_2'];
		$Tpl['regrate'] = $dataUser['regrate'];
		$Tpl['money'] = $dataUser['money'];
		$Tpl['dzyhck'] = $dataUser['dzyhck'];
		$Tpl['realname'] = $dataUser['realname'];
		$Tpl['bankname'] = $dataUser['bankname'];
		$Tpl['banknum'] = $dataUser['banknum'];
		$Tpl['addtime'] = $dataUser['addtime'];
		$Tpl['onlinetime'] = $dataUser['onlinetime'];
		$Tpl['qq'] = $dataUser['qq'];
		$mode = $dataUser['mode'];
		$modeArr = explode(',', $mode);
		$Tpl['jf1700'] = ($modeArr[0] == 1 ? 'checked' : '');
		$Tpl['jf1800'] = ($modeArr[1] == 1 ? 'checked' : '');
		$Tpl['jf1900'] = ($modeArr[2] == 1 ? 'checked' : '');
		$Tpl['jfauto'] = ($modeArr[3] == 1 ? 'checked' : '');
		if (($modeArr[0] == 1) || ($modeArr[1] == 1) || ($modeArr[2] == 1)) {
			$Tpl['jffixed'] = 'checked';
		}

		$Tpl['jfauto_isopen'] = 1;
		$Tpl['jffixed_isopen'] = 1;
		$Tpl['jf1700_isopen'] = 1;
		$Tpl['jf1800_isopen'] = 1;
		$Tpl['jf1900_isopen'] = 1;
		$Tpl['modeNum'] = 2;
		$Tpl['sjnum'] = mt_rand(1000, 99999);
		$this->assign($Tpl);
		return $this->fetch();
	}

	public function updateUser()
	{
		$addMoney = $this->param['addMoney'];
		$my_search = $this->param['my_search'];

		if (empty($my_search)) {
			$my_search = array();
		}

		$condition = array_filter($my_search, 'value_filter');
		if (empty($addMoney) || !is_numeric($addMoney)) {
			$DaoUser = Db::name('User');

			if (!empty($condition['password'])) {
				$condition['password'] = md5($condition['password']);
			}

			if (!empty($condition['password2'])) {
				$condition['password2'] = md5($condition['password2']);
			}

			$uid = $condition['id'];
			$DaoUser = Db::name('user');
			$where['id'] = $uid;
			$dataUser = $DaoUser->where($where)->find();
			$regfrom = $dataUser['regfrom'];
			$str = ltrim(rtrim($regfrom, '|'), '|');
			$regArr = explode('\\|\\|', $str);
			$count = count($regArr) - 1;
			$sjname = $regArr[$count];
			$dataUser_sj = $DaoUser->where(array('username' => $sjname))->find();
			if (($dataUser_sj['rate_1'] < $condition['rate_1']) && ($uid != 1)) {
				$this->error('返点设置有误,超过该会员上级' . $sjname . '的返点值!');
			}

			if (((round($condition['rate_1']) * 100) % 10) != 0) {
				$this->error('返点只能为0.1的倍数 ');
			}

			if ($condition['rate_1'] <= $condition['regrate']) {
				$this->error('推荐注册返点必须小于自身返点 ');
			}

			$jffixed = (empty($this->param['jffixed']) ? 0 : 1);
			$jfauto = (empty($this->param['jfauto']) ? 0 : 1);
			$jf1900 = (empty($this->param['jf1900']) ? 0 : 1);
			$jf1800 = (empty($this->param['jf1800']) ? 0 : 1);
			$jf1700 = (empty($this->param['jf1700']) ? 0 : 1);
			if (empty($jffixed) && empty($jfauto)) {
				$this->error('自由调节 或 固定奖金，至少选择一种奖金模式');
			}

			if (!empty($jffixed) && empty($jf1900) && empty($jf1800) && empty($jf1700)) {
				$this->error('开通固定奖金模式至少选择一种奖金模式');
			}

			if (empty($jffixed)) {
				$mode = '0,0,0,' . $jfauto;
			}
			else {
				$mode = $jf1700 . ',' . $jf1800 . ',' . $jf1900 . ',' . $jfauto;
			}

			$currentmode = '';

			if (!empty($jfauto)) {
				$currentmode = '4';
			}
			else if (!empty($jf1900)) {
				$currentmode = '3';
			}
			else if (!empty($jf1800)) {
				$currentmode = '2';
			}
			else if (!empty($jf1700)) {
				$currentmode = '1';
			}

			$condition['mode'] = $mode;
			$condition['currentmode'] = $currentmode;
			if (!empty($jf1900) && ($jf1900 == 1)) {
				if ($condition['rate_1'] < 5) {
					$this->error('开启固定1900模式,返点最少为5%');
					return false;
				}
			}

			if (!empty($condition['password']) && ($condition['password'] != $dataUser['password'])) {
				$jiangmsg .= '密码发生修改;';
			}

			if (!empty($condition['password2']) && ($condition['password2'] != $dataUser['password2'])) {
				$jiangmsg .= '资金密码发生修改;';
			}

			if (!empty($condition['lock']) && ($condition['lock'] != $dataUser['lock'])) {
				$jiangmsg .= '锁定资料发生修改;';
			}

			if (!empty($condition['state']) && ($condition['state'] != $dataUser['state'])) {
				$jiangmsg .= '冻结发生修改;';
			}

			if (!empty($condition['realname']) && ($condition['realname'] != $dataUser['realname'])) {
				$jiangmsg .= '姓名发生修改;';
			}

			if (!empty($condition['bankname']) && ($condition['bankname'] != $dataUser['bankname'])) {
				$jiangmsg .= '银行发生修改;';
			}

			if (!empty($condition['banknum']) && ($condition['banknum'] != $dataUser['banknum'])) {
				$jiangmsg .= '卡号发生修改;';
			}

			$jiangmsg .= 'ip:' . get_client_ip();

			if ($DaoUser->update($condition)) {
				$Dao_jiangmsg = Db::name('jiangmsg');
				$data_jiangmsg['admin'] = Session::get('ht');
				$data_jiangmsg['username'] = $dataUser['username'];
				$data_jiangmsg['msg'] = $jiangmsg;
				$data_jiangmsg['addtime'] = date('Y-m-d H:i:s');
				$Dao_jiangmsg->insert($data_jiangmsg);
				$this->success('会员信息更改成功');
			}
			else {
				$this->error('会员信息更改失败');
			}
		}
		else {
			$uid = $condition['id'];
			$DaoUser = Db::name('user');
			$where['id'] = $uid;
			$dataUser = $DaoUser->where($where)->find();
			$username = $dataUser['username'];
			$umoney = round($dataUser['money'], 4);
			$money_befor = $umoney;
			$money = round($addMoney, 4);
			$money_after = round($umoney + $money, 4);

			if ($money_after < 0) {
				$this->error('会员余不足,无法扣除');
			}

			$du['id'] = $uid;
			$du['money'] = $money_after;
			$DaoAccount = Db::name('Account');
			$da['username'] = $username;
			$da['money'] = ($money < 0 ? -$money : $money);
			$da['money_befor'] = $money_befor;
			$da['money_after'] = $money_after;

			if ($money < 0) {
				$da['accounttype'] = 7;
				$da['state'] = 1;
				$da['ordernum'] = 'qk' . time() . rand_string(6, 1);
			}
			else {
				$da['accounttype'] = 6;
				$da['ordernum'] = 'ck' . time() . rand_string(6, 1);
			}

			$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
			$da['beizhu'] = $this->param['beizhu'];
			$da['addtime'] = date('Y-m-d H:i:s');
			$da['mode'] = 1;
			$isfy = $this->param['isfy'];

			if (0 < $money) {
				$DaoMessage = Db::name('message');
				$ajaxStr['type'] = 2;
				$ajaxStr['username'] = $username;
				$ajaxStr['yinkui'] = $money;
				$DaoMessage->insert($ajaxStr);

				if (c('dlfy') == 1) {
					$this->autoFanXian($username, $money, $da['addtime']);
				}
			}

			if ($DaoUser->where('username',$username)->setInc('money', $money) && $DaoAccount->insert($da)) {
				$this->success('金额操作成功');
			}
			else {
				$this->success('金额操作失败');
			}
		}
	}

	public function xinkaihu()
	{
		$_obfuscate_6ogI80pkWQ = Db::name('user');
		$TODAY = date('Y-m-d 00:00:00');
		$_obfuscate_Xif3q_HAaupN = date('Y-m-d 00:00:00');
		$endtime = date('Y-m-d 23:59:59');
		$DaoAccount = Db::name('Account');
		// $Where['addtime'] = array(
		// 	array('gt', $_obfuscate_Xif3q_HAaupN),
		// 	array('lt', $endtime),
		// 	'and'
		// 	);
		$Where['addtime'] = array('between time',$_obfuscate_Xif3q_HAaupN,$endtime);
		$Where['accounttype'] = 6;
		$dataAcc = $DaoAccount->field('username')->where($Where)->group('username')->select();
		$czHYarr = array();

		foreach ($dataAcc as $v ) {
			$czHYarr[] = trim($v['username']);
		}

		$Where['addtime'] = array('lt', $_obfuscate_Xif3q_HAaupN);
		$Where['username'] = array('in', $czHYarr);
		$dataAcc2 = $DaoAccount->field('username')->where($Where)->group('username')->select();
		$Dela = array();

		foreach ($dataAcc2 as $v ) {
			$Dela[] = trim($v['username']);
		}

		$Result = array_diff($czHYarr, $Dela);
		$this->assign('countnum', sizeof($Result));
		$condition['username'] = array('in', $Result);
		// import('@.ORG.ZQPage');
		$listRows = 30;
		$count = $_obfuscate_6ogI80pkWQ->where($condition)->count();
		$banner_web_show_tt = new Zqpage($count, $listRows);
		$dataUser = $_obfuscate_6ogI80pkWQ->where($condition)->order('id asc')->limit($banner_web_show_tt->firstRow . ',' . $banner_web_show_tt->listRows)->select();

		if (!$dataUser) {
			$this->message = 2;
		}
		else {
			$this->message = 1;
		}

		$page = $banner_web_show_tt->show();
		$this->assign('page', $page);
		$this->assign('message', $this->message);
		$this->assign('list', $this->formatUserContentList($dataUser));
		return $this->fetch();
	}

	public function autoFanXian($username, $addmoney, $addtime)
	{
		$czmoney = 200;
		$oneSJ = 12;
		$twoSJ = 5;

		if ($addmoney < $czmoney) {
			return NULL;
		}

		$DaoAccount = Db::name('account');
		$cztime = date('Y-m-d H:i:s', strtotime($addtime));
		$where_one['username'] = $username;
		$where_one['addtime'] = array(
			array('lt', $cztime)
			);
		$where_one['accounttype'] = 6;
		$dataOne = $DaoAccount->where($where_one)->count();

		if (0 < $dataOne) {
			return NULL;
		}

		$DaoUser = Db::name('User');
		$where_u['username'] = $username;
		$data_u = $DaoUser->where($where_u)->find();
		$regfrom = $data_u['regfrom'];
		$str = ltrim(rtrim($regfrom, '|'), '|');
		$regArr = explode('\\|\\|', $str);
		$countreg = count($regArr);

		if ($countreg < 2) {
			return NULL;
		}

		if ($countreg == 2) {
			$dainame = $regArr[1];
			$where_u2['username'] = $username;
			$data_u2 = $DaoUser->where($where_u2)->find();

			if (empty($data_u2)) {
				return NULL;
			}

			$umoney = $data_u2['money'];
			$money_befor = $umoney;
			$money_after = $umoney + $oneSJ;
			$da['username'] = $dainame;
			$da['money'] = $oneSJ;
			$da['money_befor'] = $money_befor;
			$da['money_after'] = $money_after;
			$da['accounttype'] = 6;
			$da['ordernum'] = 'ck' . time() . rand_string(6, 1);
			$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
			$da['beizhu'] = '代理佣金:' . $username . '会员充值';
			$da['addtime'] = date('Y-m-d H:i:s');
			$da['mode'] = 1;
			$DaoAccount->insert($da);
			$DaoUser->where('username',$username)->setInc('money', $oneSJ);
			return NULL;
		}
		else {
			$dainame1 = $regArr[$countreg - 1];
			$dainame2 = $regArr[$countreg - 2];
			// $map['username'] = array(
			// 	array('eq', $dainame1),
			// 	array('eq', $dainame2),
			// 	'or'
			// 	);
			$map['username']=array('in',[$dainame1,$dainame2]);
			$data_umap = $DaoUser->where($map)->order('regfrom desc')->select();
			$countMap = count($data_umap);

			if ($countMap == 0) {
				return NULL;
			}

			if ($countMap == 2) {
				$da[0]['username'] = $data_umap[0]['username'];
				$da[0]['money'] = $oneSJ;
				$da[0]['money_befor'] = $data_umap[0]['money'];
				$da[0]['money_after'] = $data_umap[0]['money'] + $oneSJ;
				$da[0]['accounttype'] = 6;
				$da[0]['ordernum'] = 'ck' . time() . rand_string(6, 1);
				$da[0]['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$da[0]['beizhu'] = '代理佣金:' . $username . '会员充值';
				$da[0]['addtime'] = date('Y-m-d H:i:s');
				$da[0]['mode'] = 1;
				$da[1]['username'] = $data_umap[1]['username'];
				$da[1]['money'] = $twoSJ;
				$da[1]['money_befor'] = $data_umap[1]['money'];
				$da[1]['money_after'] = $data_umap[1]['money'] + $twoSJ;
				$da[1]['accounttype'] = 6;
				$da[1]['ordernum'] = 'ck' . time() . rand_string(6, 1);
				$da[1]['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$da[1]['beizhu'] = '代理佣金:' . $username . '会员充值';
				$da[1]['addtime'] = date('Y-m-d H:i:s');
				$da[1]['mode'] = 1;
				$DaoAccount->insertAll($da);
				$DaoUser->where('username',$data_umap[0]['username'])->setInc('money', $oneSJ);
				$DaoUser->where('username',$data_umap[0]['username'])->setInc('money', $twoSJ);
				return NULL;
			}

			if ($countMap == 1) {
				$fymoey = 0;

				if ($data_umap[0]['username'] == $dainame1) {
					$fymoey = $oneSJ;
				}
				else {
					$fymoey = $twoSJ;
				}

				$da['username'] = $data_umap[0]['username'];
				$da['money'] = $fymoey;
				$da['money_befor'] = $data_umap[0]['money'];
				$da['money_after'] = $data_umap[0]['money'] + $fymoey;
				$da['accounttype'] = 6;
				$da['ordernum'] = 'ck' . time() . rand_string(6, 1);
				$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$da['beizhu'] = '代理佣金:' . $username . '会员充值';
				$da['addtime'] = date('Y-m-d H:i:s');
				$da['mode'] = 1;
				$DaoAccount->insert($da);
				$DaoUser->where('username',$data_umap[0]['username'])->setInc('money', $fymoey);
				return NULL;
			}
		}
	}
}


?>
