<?php

class AccountAction extends CommonAction
{
	protected $condition = array();
	protected $search = array();
	protected $condpara = '';
	protected $accountList = array();
	protected $message = 0;
	protected $accountType = array();

	public function __construct()
	{
		parent::__construct();
		$dataAccountType = $this->getAccountType();

		foreach ($dataAccountType as $v ) {
			$this->accountType[$v['accountnum']] = $v['accounttype'];
		}
	}

	public function cfpaijiang()
	{
		$message = 0;
		$cfissue = $_GET['cfissue'];
		$cftype = $_GET['cftype'];
		$lotteryid = $_GET['lotteryid'];

		if (empty($cfissue)) {
			$this->assign('message', $message);
			$this->display();
			return NULL;
		}

		$DaoAccount = m('Account');
		$condition['lotteryid'] = $lotteryid;
		$condition['issue'] = $cfissue;
		$condition['beizhu'] = array('exp', ' is null ');
		$condition['accounttype'] = $cftype;
		$listRows = 30;
		$dataAcc = $DaoAccount->where($condition)->group('ordernum')->having(' count(ordernum) > 1 ')->select();
		$DaoUser = m('User');

		foreach ($dataAcc as $v ) {
			$username = $v['username'];
			$dataUser = $DaoUser->field('money')->where('username=\'' . $username . '\'')->find();
			$money = $v['money'];
			$umoney = round($dataUser['money'], 4);
			$money_befor = $umoney;
			$money_after = round($umoney - $money, 4);
			$da['username'] = $username;
			$da['money'] = $money;
			$da['money_befor'] = $money_befor;
			$da['money_after'] = $money_after;
			$da['accounttype'] = 12;

			if ($cftype == 4) {
				$da['accounttype'] = 13;
			}

			$da['state'] = 1;
			$da['ordernum'] = 'qk' . time() . rand_string(6, 1);
			$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
			$da['beizhu'] = $v['issue'] . '期';
			$da['addtime'] = date('Y-m-d H:i:s');
			$da['mode'] = 1;
			$DaoUser->setDec('money', array('username' => $username), $money);
			$DaoAccount->add($da);
			$upAcc['beizhu'] = '已扣除';
			$upAcc['id'] = $v['id'];
			$DaoAccount->save($upAcc);
		}

		$condition['beizhu'] = '已扣除';
		import('@.ORG.ZQPage');
		$count = $DaoAccount->where($condition)->count();

		if ($count <= 0) {
			$message = 2;
		}
		else {
			$message = 1;
		}

		$p = new ZQPage($count, $listRows);
		$accountList = $this->formatAccountList($DaoAccount->where($condition)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select());
		$page = $p->show();
		$Tpl['accountList'] = $accountList;
		$this->assign('message', $message);
		$this->assign('page', $page);
		$this->assign($Tpl);
		$this->display();
	}

	public function deleteAccount()
	{
		$id = $_REQUEST['items'];
		$Dao = m('Account');

		if (0 < count($id)) {
			$map['id'] = array('in', $id);
			$result = $Dao->where($map)->find();

			if (!$result) {
				$this->error('Non-existed record!');
			}

			if ($Dao->where($map)->delete()) {
				$this->success('删除数据成功');
			}
			else {
				$this->error('删除数据失败');
			}
		}
		else {
			$this->error('非法操作');
		}
	}

	public function getQkMessage()
	{
		$starttime = date('Y-m-d 00:00:00');
		$endtime = date('Y-m-d 03:00:00', strtotime('+1 days'));
		$where['addtime'] = array(
			array('gt', $starttime),
			array('lt', $endtime),
			'and'
			);
		$DaoAccount = m('Account');
		$where['accounttype'] = 7;
		$where['state'] = 0;
		$count = $DaoAccount->where($where)->count();
		echo $count;
	}

	public function autoFanXian()
	{
		$czmoney = 200;
		$oneSJ = 12;
		$twoSJ = 5;
		$DaoMy18 = m('my18');
		$where['state'] = 0;
		$data = $DaoMy18->where($where)->find();

		if (empty($data)) {
			return NULL;
		}

		if ($czmoney <= $data['money']) {
			$cztime = date('Y-m-d H:i:s', strtotime($data['addtime']) - 600);
			$DaoAccount = m('account');
			$where_one['username'] = $data['username'];
			$where_one['addtime'] = array(
				array('lt', $cztime)
				);
			$where_one['accounttype'] = 6;
			$dataOne = $DaoAccount->where($where_one)->find();

			if (!empty($dataOne)) {
				$id = $data['id'];
				$data_u['id'] = $id;
				$data_u['state'] = 1;
				$DaoMy18->data($data_u)->save();
				return NULL;
			}
		}

		$id = $data['id'];
		$data_u['id'] = $id;
		$data_u['state'] = 1;
		$DaoMy18->data($data_u)->save();

		if ($data['money'] < $czmoney) {
			return NULL;
		}

		$username = $data['username'];
		$DaoUser = m('User');
		$where_u['username'] = $username;
		$data_u = $DaoUser->where($where_u)->find();
		$regfrom = $data_u['regfrom'];
		$str = ltrim(rtrim($regfrom, '|'), '|');
		$regArr = split('\\|\\|', $str);
		$countreg = count($regArr);

		if ($countreg < 2) {
			return NULL;
		}

		$DaoAccount = m('Account');

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
			$DaoAccount->add($da);
			$DaoUser->setInc('money', array('username' => $dainame), $oneSJ);
			return NULL;
		}
		else {
			$dainame1 = $regArr[$countreg - 1];
			$dainame2 = $regArr[$countreg - 2];
			$map['username'] = array(
				array('eq', $dainame1),
				array('eq', $dainame2),
				'or'
				);
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
				$da[1]['money_after'] = $data_umap[1]['money'] + $oneSJ;
				$da[1]['accounttype'] = 6;
				$da[1]['ordernum'] = 'ck' . time() . rand_string(6, 1);
				$da[1]['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$da[1]['beizhu'] = '代理佣金:' . $username . '会员充值';
				$da[1]['addtime'] = date('Y-m-d H:i:s');
				$da[1]['mode'] = 1;
				$DaoAccount->addAll($da);
				$DaoUser->setInc('money', array('username' => $data_umap[0]['username']), $oneSJ);
				$DaoUser->setInc('money', array('username' => $data_umap[1]['username']), $twoSJ);
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
				$DaoAccount->add($da);
				$DaoUser->setInc('money', array('username' => $data_umap[0]['username']), $fymoey);
				return NULL;
			}
		}
	}

	public function qukuan()
	{
		if (empty($_GET['endtime'])) {
			$Tpl['starttime'] = date('Y-m-d 00:00:00');
			$Tpl['endtime'] = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}
		else {
			$starttime = $_GET['starttime'];
			$endtime = $_GET['endtime'];
			$Tpl['starttime'] = $starttime;
			$Tpl['endtime'] = $endtime;
		}

		if (empty($starttime) && empty($endtime)) {
			$starttime = date('Y-m-d 00:00:00');
			$endtime = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}

		$where['addtime'] = array(
			array('gt', $starttime),
			array('lt', $endtime),
			'and'
			);
		$username = $_GET['username'];
		$DaoAccount = m('Account');
		$where['accounttype'] = 7;

		if (!empty($username)) {
			$where['username'] = $username;
		}

		import('@.ORG.ZQPage');
		$listRows = 30;
		$count = $DaoAccount->where($where)->count();
		$p = new ZQPage($count, $listRows);
		$dataAccount = $DaoAccount->where($where)->order('addtime desc')->limit($p->firstRow . ',' . $p->listRows)->select();
		$page = $p->show();
		$this->assign('page', $page);
		$Tpl['list'] = $dataAccount;
		$this->assign($Tpl);
		$this->display();
	}

	public function doQukuan()
	{
		$id = $_REQUEST['id'];
		$flag = $_REQUEST['flag'];
		if (!is_numeric($id) && !is_numeric($flag)) {
			$this->error('参数不正确');
		}

		if (empty($id)) {
			$this->error('你的操作有误!');
		}

		$DaoAccount = d('Account');
		$where['accounttype'] = 7;
		$where['id'] = $id;
		$dataAccount = $DaoAccount->where($where)->find();

		if ($dataAccount['state'] == '1') {
			$this->error('该提款已经处理过了!');
		}

		$username = $dataAccount['username'];
		$money = round($dataAccount['money'], 4);
		$ordernum = $dataAccount['ordernum'];

		if ('1' == $flag) {
			$data['state'] = '1';
			$data['beizhu'] = '已处理';

			if ($DaoAccount->where($where)->data($data)->save()) {
				$this->success('处理成功!');
				exit();
			}
		}

		if ('0' == $flag) {
			$data['state'] = 1;
			$data['beizhu'] = '提现失败';

			if ($DaoAccount->where($where)->data($data)->save()) {
				import('@.Cp.User');
				$user = new User($username);
				$usermoney = $user->getMoney();
				$adddata['username'] = $username;
				$adddata['money'] = $money;
				$adddata['money_befor'] = $usermoney;
				$adddata['money_after'] = round($usermoney + $money, 4);
				$adddata['accounttype'] = 8;
				$adddata['ordernum'] = $ordernum;
				$adddata['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$adddata['addtime'] = date('Y-m-d H:i:s');
				$adddata['mode'] = 1;
				$adddata['beizhu'] = $_POST['textfield'];
				$DaoAccount->data($adddata)->add();

				if ($user->setIncMoney($money)) {
					$this->success('拒绝成功!');
					exit();
				}
			}
		}

		$this->error('出问题了!');
	}

	public function editBeiZhu()
	{
		$ordernum = $_GET['ordernum'];
		$DaoAccount = m('Account');
		$where['ordernum'] = $ordernum;
		$where['state'] = 0;
		$data = $DaoAccount->where($where)->find();
		$this->assign('data', $data);
		$this->display();
	}

	public function updateBeiZhu()
	{
		$beizhu = $_POST['beizhu'];
		$data['id'] = $_POST['id'];
		$data['beizhu'] = $beizhu;
		$DaoAccount = m('Account');
		$DaoAccount->save($data);
		$this->success('操作成功!');
		exit();
	}

	public function cunkuan()
	{
		if (empty($_GET['endtime'])) {
			$Tpl['starttime'] = date('Y-m-d 00:00:00');
			$Tpl['endtime'] = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}
		else {
			$starttime = $_GET['starttime'];
			$endtime = $_GET['endtime'];
			$Tpl['starttime'] = $_GET['starttime'];
			$Tpl['endtime'] = $_GET['endtime'];
		}

		if (empty($starttime) && empty($endtime)) {
			$starttime = date('Y-m-d 00:00:00');
			$endtime = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}

		$where['addtime'] = array(
			array('gt', $starttime),
			array('lt', $endtime),
			'and'
			);
		$username = $_GET['username'];
		$DaoAccount = d('Account');
		$where['accounttype'] = 6;

		if (!empty($username)) {
			$where['username'] = $username;
		}

		import('@.ORG.ZQPage');
		$listRows = 30;
		$count = $DaoAccount->where($where)->count();
		$p = new ZQPage($count, $listRows);
		$dataAccount = $DaoAccount->where($where)->order('addtime desc')->limit($p->firstRow . ',' . $p->listRows)->select();
		$page = $p->show();
		$this->assign('page', $page);
		$Tpl['list'] = $dataAccount;
		$this->assign($Tpl);
		$this->display();
	}

	public function hdcunkuan()
	{
		if (empty($_GET['endtime'])) {
			$Tpl['starttime'] = date('Y-m-d 00:00:00');
			$Tpl['endtime'] = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}
		else {
			$starttime = $_GET['starttime'];
			$endtime = $_GET['endtime'];
			$Tpl['starttime'] = $_GET['starttime'];
			$Tpl['endtime'] = $_GET['endtime'];
		}

		if (empty($starttime) && empty($endtime)) {
			$starttime = date('Y-m-d 00:00:00');
			$endtime = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}

		$where['addtime'] = array(
			array('gt', $starttime),
			array('lt', $endtime),
			'and'
			);
		$username = $_GET['username'];
		$DaoAccount = d('Account');
		$where['accounttype'] = 11;

		if (!empty($username)) {
			$where['username'] = $username;
		}

		import('@.ORG.ZQPage');
		$listRows = 30;
		$count = $DaoAccount->where($where)->order('id desc')->count();
		$p = new ZQPage($count, $listRows);
		$dataAccount = $DaoAccount->where($where)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select();
		$page = $p->show();
		$this->assign('page', $page);
		$Tpl['list'] = $dataAccount;
		$this->assign($Tpl);
		$this->display();
	}

	public function showBank()
	{
		$id = $_GET['id'];

		if (!is_numeric($id)) {
			$this->error('参数不正确');
		}

		if (empty($id)) {
			$this->error('你的操作有误!');
		}

		$DaoAccount = d('Account');
		$where['accounttype'] = 7;
		$where['id'] = $id;
		$dataAccount = $DaoAccount->where($where)->find();
		$username = $dataAccount['username'];
		$money = $dataAccount['money'];
		$DaoUser = d('User');
		$dataUser = $DaoUser->where('username=\'' . $username . '\'')->find();
		$realname = $dataUser['realname'];
		$bankname = $dataUser['bankname'];
		$banknum = $dataUser['banknum'];
		$province = $dataUser['province'] . ' ' . $dataUser['city'];
		$qq = $dataUser['qq'];
		$regtime = $dataUser['addtime'];
		$regfrom = $dataUser['regfrom'];
		$str = ltrim(rtrim($regfrom, '|'), '|');
		$regArr = split('\\|\\|', $str);
		$loginarr = array();
		$DaoLogin = d('Login');
		$dataLogin = $DaoLogin->where('username=\'' . $username . '\'')->order('id desc')->limit(10)->select();
		import('@.ORG.Qqwry');
		$QQWry = new QQWry();

		foreach ($dataLogin as $key => $v ) {
			$QQWry->QQWry($v['logip']);
			$country = iconv('GB2312', 'UTF-8', $QQWry->Country);
			$loginarr[$key] = $country . '|' . $v['logip'] . '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;' . $v['logtime'];
		}

		$Tpl['regfrom'] = implode(' &nbsp;&nbsp;=> &nbsp;&nbsp;       ', $regArr);
		$Tpl['id'] = $id;
		$Tpl['accountnum'] = $dataAccount['accountnum'];
		$Tpl['ordernum'] = $dataAccount['ordernum'];
		$Tpl['realname'] = $realname;
		$Tpl['bankname'] = $bankname;
		$Tpl['banknum'] = $banknum;
		$Tpl['province'] = $province;
		$Tpl['qq'] = $qq;
		$Tpl['username'] = $username;
		$Tpl['money'] = $money;
		$Tpl['regtime'] = $regtime;
		$this->assign($Tpl);
		$this->assign('logiplist', $loginarr);
		$this->display();
	}

	public function index()
	{
		$this->show();
	}

	public function search()
	{
		$my_search = $_GET['my_search'];

		if (empty($my_search)) {
			$my_search = array();
		}

		$this->condition = array_filter($my_search, 'value_filter');
		$starttime = $_GET['starttime'];
		$endtime = $_GET['endtime'];
		if (empty($starttime) && empty($endtime)) {
			$starttime = date('Y-m-d 00:00:00');
			$endtime = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}

		$this->condition['addtime'] = array(
			array('gt', $starttime),
			array('lt', $endtime),
			'and'
			);

		if (isset($this->condition['ztype'])) {
			$ztype = $this->condition['ztype'];
			$ztypefield = formatstr($_GET['ztypefield']);

			switch ($ztype) {
			case '1':
				$this->condition['ordernum'] = $ztypefield;
				break;

			case '2':
				$this->condition['tracenum'] = $ztypefield;
				break;

			case '3':
				$this->condition['accountnum'] = $ztypefield;
				break;

			default:
				$this->condition['accountnum'] = $ztypefield;
			}

			unset($this->condition['ztype']);
		}

		$lntype = formatstr($_GET['lntype']);
		if (!empty($lntype) && is_numeric($lntype)) {
			$this->condition['accounttype'] = $lntype;
		}

		$regname = array();
		$formusername = formatstr($_GET['username']);
		if (empty($formusername) || is_null($formusername)) {
		}
		else {
			$this->condition['username'] = $formusername;
		}

		import('@.ORG.ZQPage');
		$DaoAccount = m('Account');
		$listRows = 30;
		$count = $DaoAccount->where($this->condition)->count();
		$p = new ZQPage($count, $listRows);
		$this->accountList = $this->formatAccountList($DaoAccount->where($this->condition)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select());
		$page = $p->show();
		$this->assign('page', $page);

		if (0 < $count) {
			$this->message = 1;
		}
		else {
			$this->message = 2;
		}
	}

	public function show()
	{
		$this->search();

		if (empty($_GET['endtime'])) {
			$Tpl['starttime'] = date('Y-m-d 00:00:00');
			$Tpl['endtime'] = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}
		else {
			$Tpl['starttime'] = $_GET['starttime'];
			$Tpl['endtime'] = $_GET['endtime'];
		}

		import('Home.Cp.Lottery');
		$lottery = new Lottery();
		$Tpl['data_method'] = json_encode($lottery->getMethodData());
		$Tpl['data_issue'] = json_encode($lottery->getIssue());
		$Tpl['lotterylist'] = $lottery->getLotteryData();
		$Tpl['ordertype'] = $this->getAccountType();
		$Tpl['accountList'] = $this->accountList;
		$Tpl['message'] = $this->message;
		$this->assign($Tpl);
		$this->display();
	}

	public function getAccountType()
	{
		$Dao = m('Accountzhidi');
		return $Dao->order('id asc')->select();
	}

	public function formatAccountList(&$orderList)
	{
		if (is_null($orderList)) {
			return NULL;
		}

		$formatOrder = array();
		$newLmData = s('newLmData');

		if (empty($newLmData)) {
			$newLmData = array();
			$Dao = m();
			$lmdata = $Dao->query('SELECT l.lotteryid,l.lotteryname,m.methodid,m.methodname FROM `jiang_lottery` as l,`jiang_method` as m  WHERE l.lotteryid=m.lotteryid ;');

			foreach ($lmdata as $v ) {
				$newLmData[$v['methodid']] = $v;
			}

			s('newLmData', $newLmData, 3600 * 24);
		}

		foreach ($orderList as $k => $v ) {
			$lottery = $newLmData[$v['methodid']];
			$v['lotteryname'] = $lottery['lotteryname'];

			if (empty($v['lotteryname'])) {
				$v['lotteryname'] = '---';
			}

			$v['methodname'] = (empty($lottery['methodname']) ? '---' : $lottery['methodname']);
			$v['issue'] = (empty($v['issue']) ? '---' : $v['issue']);

			if ($v['mode'] == 1) {
				$v['mode'] = '元';
			}
			else if ($v['mode'] == 2) {
				$v['mode'] = '角';
			}
			else if ($v['mode'] == 3) {
				$v['mode'] = '分';
			}

			$v['accounttypename'] = $this->accountType[$v['accounttype']];
			$v['money_after'] = sprintf('%.3f', $v['money_after']);
			$v['shuolu'] = '---';
			$v['zhichu'] = '---';
			$moneyCaiE = $v['money_after'] - $v['money_befor'];

			if (0 < $moneyCaiE) {
				$moneyCaiE = sprintf('%.3f', $moneyCaiE);
				$v['shuolu'] = '<font color="#FF3300">+' . $moneyCaiE . '</font>';
			}
			else {
				$moneyCaiE = sprintf('%.3f', $moneyCaiE);
				$v['zhichu'] = '<font color="#669900">' . $moneyCaiE . '</font>';
			}

			$v['beizhu'] = (is_null($v['beizhu']) ? '<font color=\'#D0D0D0\'>-----</font>' : $v['beizhu']);
			$formatOrder[$k] = $v;
		}

		return $formatOrder;
	}

	public function getState($v)
	{
		$str = '';

		switch ($v) {
		case 0:
			$str = '未开奖';
			break;

		case 1:
			$str = '已中奖';
			break;

		case 2:
			$str = '未中奖';
			break;

		case 3:
			$str = '已撤单';
			break;

		case 4:
			$str = '本人撤单';
			break;

		case 5:
			$str = '管理员撤单';
			break;

		case 6:
			$str = '开错奖撤单';
			break;

		default:
			$str = '未开奖';
			break;
		}

		return $str;
	}

	public function baobiao()
	{
		$DaoBaobiao = m('baobiao');
		$username = $_GET['username'];
		$where['addtime'] = date('Y-m-d');
		$starttime = $_GET['starttime'];
		$endtime = $_GET['endtime'];
		if (!empty($starttime) && !empty($endtime)) {
			$where['addtime'] = array(
				array('gt', $starttime),
				array('lt', $endtime),
				'and'
				);

			if ($starttime == $endtime) {
				$where['addtime'] = $starttime;
			}
		}

		if (!empty($username)) {
			$where['username'] = $username;
		}

		import('@.ORG.ZQPage');
		$listRows = 900;
		$count = $DaoBaobiao->where($where)->count();
		$p = new ZQPage($count, $listRows);
		$data = $DaoBaobiao->where($where)->order('yingkui desc')->limit($p->firstRow . ',' . $p->listRows)->select();
		$page = $p->show();
		$this->assign('page', $page);

		if (0 < $count) {
			$message = 1;
		}
		else {
			$message = 2;
		}

		$this->assign('message', $message);
		$this->assign('baobiao', $data);
		$this->display();
	}

	public function meiTianbaobiao()
	{
		$starttime = $_GET['starttime'];

		if (empty($starttime)) {
			$starttime = date('Y-m-d 00:00:00');
		}

		$Tpl['starttime'] = $starttime;
		$today = date('Y-m-d 00:00:00');
		$endtime = date('Y-m-d 23:59:59', strtotime($starttime));
		$DaoAccount = m('Account');
		$where['addtime'] = array(
			array('gt', $starttime),
			array('lt', $endtime),
			'and'
			);
		$dataAcc = $DaoAccount->field('ordernum,username,money,accounttype,beizhu')->where($where)->select();
		$sumCZ = 0;
		$sumTX = 0;
		$sumJJTX = 0;
		$sumZJ = 0;
		$sumFD = 0;
		$sumTZ = 0;
		$sumCD = 0;
		$sumCZNum = 0;
		$sumXCZ = 0;
		$czHYarr = array();

		foreach ($dataAcc as $v ) {
			switch ($v['accounttype']) {
			case 6:
				$sumCZ += $v['money'];

				if (strpos($v['ordernum'], 'hd_') === false) {
					$sumCZNum++;
					$czHYarr[] = $v['username'];
				}

				break;

			case 7:
				if ('已处理' == $v['beizhu']) {
					$sumTX += $v['money'];
				}

				break;

			case 8:
				$sumJJTX += $v['money'];
				break;

			case 9:
				$sumZJ += $v['money'];
				break;

			case 4:
			case 10:
				$sumFD += $v['money'];
				break;

			case 1:
			case 2:
				$sumTZ += $v['money'];
				break;

			case 3:
			case 5:
				$sumCD += $v['money'];
				break;
			}
		}

		$sumYK = $sumTZ - $sumCD - ($sumZJ + $sumFD);
		$Tpl['sumCZ'] = sprintf('%.02f', $sumCZ);
		$Tpl['sumTX'] = sprintf('%.02f', $sumTX);
		$Tpl['sumJJTX'] = sprintf('%.02f', $sumJJTX);
		$Tpl['sumZJ'] = sprintf('%.02f', $sumZJ);
		$Tpl['sumFD'] = sprintf('%.02f', $sumFD);
		$Tpl['sumTZ'] = sprintf('%.02f', $sumTZ - $sumCD);
		$Tpl['sumCD'] = sprintf('%.02f', $sumCD);
		$Tpl['sumCZNum'] = $sumCZNum;
		$Tpl['sumYK'] = sprintf('%.02f', $sumYK);
		$this->assign($Tpl);
		$this->display();
	}
}


?>