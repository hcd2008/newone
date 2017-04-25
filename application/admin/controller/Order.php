<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
class Order extends Common
{
	protected $traceCount = 0;
	protected $traceWanCheng = 0;
	protected $traceCheDan = 0;
	protected $traceZhonJiang = 0;
	protected $traceCountMoney = 0;
	protected $traceWanChengMoney = 0;
	protected $tracePaiMoney = 0;
	protected $traceCheDanMoney = 0;
	protected $traceList = array();
	protected $condition = array();
	protected $search = array();
	protected $condpara = '';
	protected $orderList = array();
	protected $message = 0;
	protected $param=array();
	public function _initialize(){
		$this->param=$this->request->param();
	}
	public function index()
	{
		$isgetdata = $this->param['isgetdata'];
		$ordernum = $this->param['id'];
		$projectid = $this->param['projectid'];

		if (!empty($ordernum)) {
			$this->getOrderNumInfo($ordernum);
			return NULL;
		}

		if (!empty($projectid)) {
			$this->cheDan($projectid);
			return NULL;
		}

		$this->show();
	}

	public function cheDan($id)
	{
		$ajaxStr = array();
		$id = $this->param['id'];
		$username = $this->param['username'];

		if (1 == 1) {
			$DaoOrder = Db::name('Order');
			$where['id'] = $id;
			$where['state'] = 0;
			$dataOrder = $DaoOrder->where($where)->find();
			unset($where);

			if (!empty($dataOrder)) {
				$where['id'] = $dataOrder['id'];
				$where['state'] = 5;
				$DaoOrder->update($where);
				$money = $dataOrder['money'];
				$DaoUser = Db::name('User');
				$where_u['username'] = $username;
				$data_u = $DaoUser->where($where_u)->find();
				$ymoney = $data_u['money'];
				$DaoUser->where($where_u)->setInc('money', $money);
				$DaoAccount = Db::name('Account');
				$data['username'] = $username;
				$data['lotteryid'] = $dataOrder['lotteryid'];
				$data['methodid'] = $dataOrder['methodid'];
				$data['money'] = $money;
				$data['money_befor'] = $ymoney;
				$data['money_after'] = $ymoney + $money;
				$data['accounttype'] = 3;
				$data['ordernum'] = $dataOrder['ordernum'];
				$data['tracenum'] = $dataOrder['tracenum'];
				$data['issue'] = $dataOrder['issue'];
				$data['mode'] = $dataOrder['mode'];
				$data['addtime'] = date('Y-m-d H:i:s');
				$data['accountnum'] = date('ymdhis') . rand_string(5, 2);

				if ($DaoAccount->data($data)->add()) {
					$this->success('撤单成功!');
				}
			}
			else {
				$this->error('撤单失改!');
			}
		}
	}

	public function cheDanMany()
	{
		$taskid = formatstr($this->param['taskid']);

		if (empty($taskid)) {
			$this->error('请选择期数!');
		}

		$DaoOrder = Db::name('Order');
		$username = $this->param['username'];
		$DaoAccount = Db::name('Account');
		$DaoUser = Db::name('User');
		$where_u['username'] = $username;
		$data_u = $DaoUser->where($where_u)->find();
		$ymoney = $data_u['money'];

		foreach ($taskid as $v ) {
			$where['id'] = $v;
			$where['username'] = $username;
			$dataOrder = $DaoOrder->where($where)->find();
			unset($where);

			if (!empty($dataOrder)) {
				$where['id'] = $v;
				$where['state'] = 5;
				$DaoOrder->update($where);
				unset($where);
				$money = $dataOrder['money'];
				$DaoUser->wehre($where_u)->setInc('money',$money);
				$data['username'] = $username;
				$data['lotteryid'] = $dataOrder['lotteryid'];
				$data['methodid'] = $dataOrder['methodid'];
				$data['money'] = $money;
				$data['money_befor'] = $ymoney;
				$data['money_after'] = $ymoney + $money;
				$data['accounttype'] = 3;
				$data['ordernum'] = $dataOrder['ordernum'];
				$data['tracenum'] = $dataOrder['tracenum'];
				$data['issue'] = $dataOrder['issue'];
				$data['mode'] = $dataOrder['mode'];
				$data['addtime'] = date('Y-m-d H:i:s');
				$data['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$DaoAccount->insert($data);
			}

			$ymoney += $dataOrder['money'];
		}

		$this->success('操作成功');
	}

	public function getOrderNumInfo($ordernum)
	{
		$ajaxStr = array();
		$DaoOrder = Db::name('Order');
		$where['ordernum'] = $ordernum;
		$data = $DaoOrder->where($where)->find();

		if (empty($data)) {
			$ajaxStr['stats'] = 'error';
			$ajaxStr['data'] = '该订单号不存在';
		}
		else {
			$ajaxStr['stats'] = 'success';
			$ajaxStr['project'] = array();
			$DaoMethod = Db::name('method');
			$ajaxStr['can'] = ($this->isCanCheDan($data['id']) ? '1' : '0');
			$lottery = $DaoMethod->getByMethodId($data['methodid']);
			$ajaxStr['project']['state'] = $data['state'];
			$ajaxStr['project']['username'] = $data['username'];
			$ajaxStr['project']['cnname'] = $lottery['lotteryname'];
			$ajaxStr['project']['methodname'] = $lottery['methodname'];
			$code = $data['codes'];

			if (strpos($code, '|')) {
				$code = str_replace('|', ',', $code);
				$code = str_replace('&', '', $code);
			}
			else {
				$code = str_replace('&', ',', $code);
			}

			$ajaxStr['project']['nocode'] = ($data['kjcode'] == NULL ? '' : $data['kjcode']);
			$ajaxStr['project']['totalprice'] = $data['money'];
			$ajaxStr['project']['projectid'] = $ordernum;
			$ajaxStr['project']['taskid'] = $data['traceif'];
			$ajaxStr['project']['tracenum'] = $data['tracenum'];
			$ajaxStr['project']['multiple'] = $data['beishu'];
			$ajaxStr['project']['modes'] = $data['mode'];
			$ajaxStr['project']['writetime'] = $data['addtime'];
			$ajaxStr['project']['issue'] = $data['issue'];
			$ajaxStr['project']['bonus'] = $data['prize'];
			$ajaxStr['project']['dypointdec'] = sprintf('%.2f', $data['prize']) . '-' . $data['point'] . '%';
			$ajaxStr['project']['code'] = $code;
			$ajaxStr['prizelevel']['expandcode'] = $code;
			$ajaxStr['prizelevel']['codetimes'] = $data['beishu'];
			$ajaxStr['prizelevel']['level'] = $data['mode'];
			$ajaxStr['prizelevel']['prize'] = $data['prize'] * $data['beishu'];
			$ajaxStr['project']['id'] = $data['id'];
		}

		if (is_array($ajaxStr)) {
			$ajaxStr = json_encode($ajaxStr);
			echo $ajaxStr;
		}
	}

	public function search()
	{
		$my_search = $this->param['my_search'];

		if (empty($my_search)) {
			$my_search = array();
		}

		$this->condition = array_filter($my_search, 'value_filter');
		$starttime = $this->param['starttime'];
		$endtime = $this->param['endtime'];
		if (empty($starttime) && empty($endtime)) {
			$starttime = date('Y-m-d 00:00:00');
			$endtime = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}

		// $this->condition['addtime'] = array(
		// 	array('gt', $starttime),
		// 	array('lt', $endtime),
		// 	'and'
		// 	);
		$this->condition['addtime'] = array('between time',$starttime,$endtime);
		if ('3' == $this->condition['state']) {
			$this->condition['state'] = array('gt', $this->condition['state']);
		}

		$formusername = formatstr($this->param['username']);
		if (empty($formusername) || is_null($formusername)) {
		}
		else {
			$this->condition['username'] = $formusername;
		}

		if (!isset($this->condition['ordernum'])) {
			$this->condition['projectno'] = array('exp', 'is not NULL');
		}

		// import('@.ORG.ZQPage');
		$DaoOrder = Db::name('Order');
		$listRows = 30;
		$count = $DaoOrder->where($this->condition)->count();
		$p = new Zqpage($count, $listRows);
		$this->orderList = $this->formatOrderList($DaoOrder->where($this->condition)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select());
		$page = $p->show();
		$this->assign('page', $page);

		if (0 < $count) {
			$this->message = 1;
		}
	}

	public function show()
	{
		$this->search();

		if (empty($this->param['endtime'])) {
			$_obfuscate_8Iu1['starttime'] = date('Y-m-d 00:00:00');
			$_obfuscate_8Iu1['endtime'] = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}
		else {
			$_obfuscate_8Iu1['starttime'] = $this->param['starttime'];
			$_obfuscate_8Iu1['endtime'] = $this->param['endtime'];
		}

		// import('Home.Cp.Lottery');
		$lottery = new Lottery();
		$_obfuscate_8Iu1['data_method'] = json_encode($lottery->getMethodData());
		$_obfuscate_8Iu1['data_issue'] = json_encode($lottery->getIssue());
		$_obfuscate_8Iu1['lotterylist'] = $lottery->getLotteryData();
		$_obfuscate_8Iu1['orderList'] = $this->orderList;
		$_obfuscate_8Iu1['message'] = $this->message;
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function formatOrderList(&$orderList)
	{
		$formatOrder = array();
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

		foreach ($orderList as $k => $v ) {
			$lottery = $newLmData[$v['methodid']];
			$v['lotteryname'] = $lottery['lotteryname'];
			$v['methodname'] = $lottery['methodname'];
			$modezhongwen = '';

			if ($v['mode'] == 1) {
				$mode = '元';
			}
			else if ($v['mode'] == 2) {
				$mode = '角';
			}
			else if ($v['mode'] == 3) {
				$mode = '分';
			}

			$v['mode'] = $modezhongwen . $v['step'] . '模式,' . $mode;
			$code = $v['codes'];

			if (strpos($code, '|') !== false) {
				$code = str_replace('|', ',', $code);
				$code = str_replace('&', '', $code);
			}
			else {
				$code = str_replace('&', ',', $code);
			}

			if (22 < strlen($code)) {
				$code = substr($code, 0, 22) . '......';
			}

			$v['codes'] = $code;
			$v['traceif'] = ($v['traceif'] == '1' ? '<font color=\'blue\'>是</font>' : '否');
			$v['money'] = sprintf('%.3f', $v['money']);
			$v['zjprize'] = sprintf('%.3f', $v['zjprize']);
			$v['status'] = $this->getState($v['state']);
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
			$str = '<font color=\'red\'>已中奖</font>';
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

		case 7:
			$str = '系统撤单';
			break;

		default:
			$str = '未开奖';
			break;
		}

		return $str;
	}

	public function orderinfo()
	{
		$id = $this->param['id'];
		$ordernum = $this->param['ordernum'];
		if (empty($id) && empty($ordernum)) {
			$this->error('参数有误');
		}

		$DaoOrder = Db::name('Order');

		if (empty($id)) {
			$where['ordernum'] = $ordernum;
		}
		else {
			$where['id'] = $id;
		}

		$data = $DaoOrder->where($where)->find();

		if (empty($data)) {
			$this->error('该订单不存在');
		}

		$newLmData = s('newLmData');

		if (empty($newLmData)) {
			$newLmData = array();
			// $Dao = m();
			$lmdata = Db::query('SELECT l.lotteryid,l.lotteryname,m.methodid,m.methodname FROM `jiang_lottery` as l,`jiang_method` as m  WHERE l.lotteryid=m.lotteryid ;');

			foreach ($lmdata as $v ) {
				$newLmData[$v['methodid']] = $v;
			}

			Cache::set('newLmData', $newLmData, 3600 * 24);
		}

		$DaoMethod = Db::name('Method');
		$lotteryid = $data['lotteryid'];
		$where_m['lotteryid'] = $lotteryid;
		$dataMethod = $DaoMethod->where($where_m)->select();
		$this->assign('methodnameall', $dataMethod);
		$lottery = $newLmData[$data['methodid']];
		$Tpl['state'] = $this->getState($data['state']);
		$Tpl['username'] = $data['username'];
		$Tpl['id'] = $id;
		$Tpl['cnname'] = $lottery['lotteryname'];
		$Tpl['methodid'] = $lottery['methodid'];
		$Tpl['methodname'] = $lottery['methodname'];
		$code = $data['codes'];
		if (!empty($data['info']) && ($data['info'] != 'undefined')) {
			$rsweisu = strlen($data['info']);
			$info = $data['info'];

			if ($rsweisu == 3) {
				$rsmsg_str = substr($info, -3, 1) . ',' . substr($info, -2, 1) . ',' . substr($info, -1, 1);
			}
			else {
				$rsmsg_str = substr($info, -2, 1) . ',' . substr($info, -1, 1);
			}

			$rsmsg = explode(',', $rsmsg_str);
			$Tpl['rsmsg'] = '';

			foreach ($rsmsg as $v ) {
				switch ($v) {
				case 'w':
					$Tpl['rsmsg'] .= '万';
					break;

				case 'q':
					$Tpl['rsmsg'] .= '千';
					break;

				case 'b':
					$Tpl['rsmsg'] .= '百';
					break;

				case 's':
					$Tpl['rsmsg'] .= '十';
					break;

				case 'g':
					$Tpl['rsmsg'] .= '个';
					break;
				}
			}
		}

		$Tpl['nocode'] = ($data['kjcode'] == NULL ? '' : $data['kjcode']);
		$Tpl['totalprice'] = sprintf('%.3f', $data['money']);
		$Tpl['ordernum'] = $data['ordernum'];
		$Tpl['taskid'] = $data['traceif'];
		$Tpl['tracenum'] = $data['tracenum'];
		$Tpl['multiple'] = $data['beishu'];
		$Tpl['modes'] = $data['mode'];
		$Tpl['writetime'] = $data['addtime'];
		$Tpl['issue'] = $data['issue'];
		$Tpl['bonus'] = $data['prize'];
		$Tpl['dypointdec'] = sprintf('%.2f', $data['prize']) . '-' . $data['point'] . '%';
		$Tpl['code'] = $code;

		if ($data['mode'] == 1) {
			$mode = '元';
		}
		else if ($data['mode'] == 2) {
			$mode = '角';
		}
		else if ($data['mode'] == 3) {
			$mode = '分';
		}

		$Tpl['beishuMode'] = $data['beishu'] . '倍,' . $data['step'] . '模式;' . $mode;
		$Tpl['id'] = $data['id'];
		$Tpl['zjprize'] = sprintf('%.3f', $data['zjprize']);

		if ($data['traceif'] == '1') {
			$Tpl['showtrace'] = '';
		}
		else {
			$Tpl['showtrace'] = 'none';
		}

		$this->assign($Tpl);
		return $this->fetch();
	}

	public function updateOrder()
	{
		$id = $this->param['id'];
		$methodid = $this->param['methodid'];
		$issue = $this->param['issue'];

		if (empty($issue)) {
			$this->error('期数不能为空');
		}

		if (empty($id) || !is_numeric($id)) {
			$this->error('参数有误');
		}

		$DaoOrder = Db::name('Order');
		$where['id'] = $id;
		$data = $DaoOrder->where($where)->find();
		$dataUpinfo = $data;

		if (empty($data)) {
			$this->error('该订单不存在');
		}

		$code = $this->param['code'];
		$data['id'] = $id;
		$data['codes'] = $code;
		$data['methodid'] = $methodid;
		$data['issue'] = $issue;
		$DaoAccount = Db::name('Account');
		$data_a['methodid'] = $methodid;
		$data_a['issue'] = $issue;
		$where_a['username'] = $data['usernmae'];
		$where_a['addtime'] = $data['addtime'];
		$where_a['ordernum'] = $data['ordernum'];
		$DaoAccount->where($where_a)->update($data_a);

		if ($DaoOrder->update($data)) {
			$this->updateorderinfo($dataUpinfo);
			$this->success('订单更改成功');
		}
		else {
			$this->error('操作失败');
		}
	}

	public function updateorderinfo($dataUpinfo)
	{
		$username = Session::get('ht');
		$_obfuscate_VQsFyciM15l1WFeI = Db::name('orderinfo');
		$data_a['username'] = $username;
		$data_a['ip'] = get_client_ip();
		$data_a['addtime'] = date('Y-m-d H:i:s');
		$data_a['ordernum'] = $dataUpinfo['ordernum'];
		$data_a['lotteryid'] = $dataUpinfo['lotteryid'];
		$data_a['methodid'] = $dataUpinfo['methodid'];
		$data_a['issue'] = $dataUpinfo['issue'];
		$data_a['code'] = $dataUpinfo['codes'];
		$data_a['bgname'] = $dataUpinfo['username'];
		$data_a['money'] = $dataUpinfo['money'];
		$_obfuscate_VQsFyciM15l1WFeI->add($data_a);
	}

	public function isCanCheDan($id)
	{
		$DaoOrder = Db::name('Order');
		$where['id'] = $id;
		$where['username'] = Session::get('un');
		$where['state'] = array('eq', '0');
		$dataOrder = $DaoOrder->where($where)->find();
		unset($where);
		$lotteryid = $dataOrder['lotteryid'];

		switch ($lotteryid) {
		case 1:
			$lottery_num = (int) substr($dataOrder['issue'], -3);
			$DaoTime = d('SscTime');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+2 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return true;
			}

			break;

		default:
			return false;
			break;
		}
	}

	public function traceInfo()
	{
		$tracenum = formatstr($this->param['id']);

		if (empty($tracenum)) {
			return NULL;
		}

		$DaoOrder = Db::name('order');
		$where['tracenum'] = $tracenum;
		$dataOrder = $DaoOrder->where($where)->order('id asc')->select();

		if (empty($dataOrder)) {
			return NULL;
		}

		$traceOneInfo = $this->formatTraceList($dataOrder);
		$Tpl = $traceOneInfo[0];
		$Tpl['traceCount'] = $this->traceCount;
		$Tpl['traceWanCheng'] = $this->traceWanCheng;
		$Tpl['traceCheDan'] = $this->traceCheDan;
		$Tpl['traceCountMoney'] = $this->traceCountMoney;
		$Tpl['traceWanChengMoney'] = $this->traceWanChengMoney;
		$Tpl['tracePaiMoney'] = $this->tracePaiMoney;
		$Tpl['traceCheDanMoney'] = $this->traceCheDanMoney;
		$Tpl['traceZhonJiang'] = $this->traceZhonJiang;
		$this->assign($Tpl);
		$this->assign('traceList', $this->traceList);
		return $this->fetch();
	}

	public function formatTraceList(&$orderList)
	{
		$formatOrder = array();
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$_obfuscate_NhIAuPhWfFR = array();

		foreach ($orderList as $k => $v) {
			$lottery = $_obfuscate_ehDu7EJ4I57R->getByMethodId($v['methodid']);
			$v['lotteryname'] = $lottery['lotteryname'];
			$v['methodname'] = $lottery['methodname'];
			$v['mode'] = ($v['mode'] == 1 ? '元' : '角');
			$CODE = $v['codes'];

			if (strpos($CODE, '|')) {
				$CODE = str_replace('|', ',', $CODE);
				$CODE = str_replace('&', '', $CODE);
			}
			else {
				$CODE = str_replace('&', ',', $CODE);
			}

			if (22 < strlen($CODE)) {
				$CODE = substr($CODE, 0, 22) . '......';
			}

			$v['codes'] = $CODE;
			$v['money'] = sprintf('%.3f', $v['money']);
			$v['zjprize'] = $v['zjprize'];
			$v['status'] = $this->getTraceState($v['state'], $v['money']);
			$this->traceCount++;
			$this->traceCountMoney += $v['money'];
			$this->tracePaiMoney += $v['zjprize'];

			if (0 < $v['zjprize']) {
				$this->traceZhonJiang++;
			}

			$v['tracestop'] = ($v['tracestop'] == 1 ? '是' : '否');
			$_obfuscate_NhIAuPhWfFR[$k]['id'] = $v['id'];
			$_obfuscate_NhIAuPhWfFR[$k]['issue'] = $v['issue'];
			$_obfuscate_NhIAuPhWfFR[$k]['beishu'] = $v['beishu'];
			$_obfuscate_NhIAuPhWfFR[$k]['status'] = $v['status'];
			$_obfuscate_NhIAuPhWfFR[$k]['state'] = $v['state'];
			$_obfuscate_NhIAuPhWfFR[$k]['ordernum'] = $v['ordernum'];
			$formatOrder[$k] = $v;
		}

		$this->traceList = $_obfuscate_NhIAuPhWfFR;
		return $formatOrder;
	}

	public function getTraceState($v, $m = 0)
	{
		$str = '';

		switch ($v) {
		case 0:
			$str = '进行中';
			break;

		case 1:
			$str = '已完成';
			$this->traceWanCheng++;
			$this->traceWanChengMoney += $m;
			break;

		case 2:
			$str = '已完成';
			$this->traceWanCheng++;
			$this->traceWanChengMoney += $m;
			break;

		case 3:
			$str = '已撤单';
			$this->traceCheDan++;
			$this->traceCheDanMoney += $m;
			break;

		case 4:
			$str = '本人撤单';
			$this->traceCheDan++;
			$this->traceCheDanMoney += $m;
			break;

		case 5:
			$str = '管理员撤单';
			$this->traceCheDan++;
			$this->traceCheDanMoney += $m;
			break;

		case 6:
			$str = '开错奖撤单';
			$this->traceCheDan++;
			$this->traceCheDanMoney += $m;
			break;

		case 7:
			$str = '系统撤单';
			$this->traceCheDan++;
			$this->traceCheDanMoney += $m;
			break;

		default:
			$str = '进行中';
			break;
		}

		return $str;
	}
}


?>
