<?php
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;
use think\Session;
use think\Cache;
use app\cp\controller\Lottery;
use app\cp\controller\User1;
use app\index\org\Zqpage;
class Trace extends Base
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
	public $param;
	public function _initialize(){
		$this->param=$this->request->param();
	}
	public function index()
	{
		$this->show();
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

		// import('@.Cp.Lottery');
		$lottery = new Lottery();
		$_obfuscate_8Iu1['data_method'] = json_encode($lottery->getMethodData());
		$_obfuscate_8Iu1['data_issue'] = json_encode($lottery->getIssue());
		$_obfuscate_8Iu1['lotterylist'] = $lottery->getLotteryData();
		$_obfuscate_8Iu1['orderList'] = $this->orderList;
		$_obfuscate_8Iu1['message'] = $this->message;
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function search()
	{
		$my_search = isset($this->param['my_search'])?$this->param['my_search']:'';

		if (empty($my_search)) {
			$my_search = array();
		}

		$this->condition = array_filter($my_search, 'value_filter');
		$starttime = isset($this->param['starttime'])?$this->param['starttime']:'';
		$endtime = isset($this->param['endtime'])?$this->param['endtime']:'';
		if (empty($starttime) && empty($endtime)) {
			$starttime = date('Y-m-d 00:00:00');
			$endtime = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}

		$this->condition['addtime'] = array(
			'between time',[$starttime,$endtime]
			);
		isset($this->condition['state']) or $this->condition['state']='';
		if ('3' == $this->condition['state']) {
			$this->condition['state'] = array('gt', $this->condition['state']);
		}

		// import('@.Cp.User');
		$username = Session::get('un');
		$user = new User1($username);
		isset($this->param['range']) or $this->param['range']='';
		$range = (int) $this->param['range'];
		$regname = array();
		isset($this->param['username']) or $this->param['username']='';
		$formusername = formatstr($this->param['username']);

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

		case 4:
			$regname = $user->getRegFrom(4);
			break;

		default:
			$regname = $user->getRegFrom(1);
			break;
		}

		if (empty($formusername) || is_null($formusername)) {
			$this->condition['username'] = array('in', $regname);
		}
		else {
			if (!in_array($formusername, $regname)) {
				$this->message = 2;
				return NULL;
			}

			$this->condition['username'] = $formusername;
		}

		$this->condition['traceif'] = '1';

		if (!isset($this->condition['projectno'])) {
			$this->condition['projectno'] = array('exp', 'is not NULL');
		}
		// import('@.ORG.ZQPage');
		$DaoOrder = Db::name('Order');
		$listRows = 30;
		$count = $DaoOrder->where($this->condition)->count();
		$p = new Zqpage($count, $listRows);
		$ol = $DaoOrder->where($this->condition)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select();
		$this->orderList = $this->formatTraceNumList($ol);
		$page = $p->show();
		$this->assign('page', $page);

		if (0 < $count) {
			$this->message = 1;
		}
	}

	public function formatTraceNumList($orderList)
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

		$traceList = array();

		foreach ($orderList as $k => $v ) {
			$lottery = $newLmData[$v['methodid']];
			$v['lotteryname'] = $lottery['lotteryname'];
			$v['methodname'] = $lottery['methodname'];
			$v['mode'] = ($v['mode'] == 1 ? '元' : '角');
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
			$v['status'] = $this->getState($v['state'], $v['money']);
			$traceNumInfo = $this->getTraceNumInfo($v['tracenum']);
			$v['tracecount'] = $traceNumInfo['tracecount'];
			$v['traceWanCheng'] = $traceNumInfo['traceWanCheng'];
			$v['traceCountMoney'] = sprintf('%.3f', $traceNumInfo['traceCountMoney']);
			$v['traceWanChengMoney'] = sprintf('%.3f', $traceNumInfo['traceWanChengMoney']);
			$formatOrder[$k] = $v;
		}

		return $formatOrder;
	}

	public function getTraceNumInfo($tracenum)
	{
		$_obfuscate_81DX3HYoYGd5ShZ6 = array();
		$DaoOrder = Db::name('Order');
		$Where['tracenum'] = $tracenum;
		$dataOrder = $DaoOrder->where($Where)->select();
		$_obfuscate_81DX3HYoYGd5ShZ6['tracecount'] = count($dataOrder);
		$_obfuscate_81DX3HYoYGd5ShZ6['traceWanCheng'] = 0;
		$_obfuscate_81DX3HYoYGd5ShZ6['traceCountMoney'] = 0;
		$_obfuscate_81DX3HYoYGd5ShZ6['traceWanChengMoney'] = 0;

		foreach ($dataOrder as $v ) {
			if (($v['state'] == '1') || ($v['state'] == '2')) {
				$_obfuscate_81DX3HYoYGd5ShZ6['traceWanCheng']++;
				$_obfuscate_81DX3HYoYGd5ShZ6['traceWanChengMoney'] += $v['money'];
			}

			$_obfuscate_81DX3HYoYGd5ShZ6['traceCountMoney'] += $v['money'];
		}

		return $_obfuscate_81DX3HYoYGd5ShZ6;
	}

	public function traceInfo()
	{
		$tracenum = formatstr($this->param['id']);

		if (empty($tracenum)) {
			return NULL;
		}

		$username = Session::get('un');
		$DaoOrder = Db::name('Order');
		$where['username'] = $username;
		$where['tracenum'] = $tracenum;
		$dataOrder = $DaoOrder->where($where)->order('id asc')->select();

		if (empty($dataOrder)) {
			return NULL;
		}

		$traceOneInfo = $this->formatOrderList($dataOrder);
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

	public function formatOrderList($orderList)
	{
		$formatOrder = array();
		$newLmData = Cache::get('newLmData');

		if (empty($newLmData)) {
			$newLmData = array();
			$lmdata = Db::query('SELECT l.lotteryid,l.lotteryname,m.methodid,m.methodname FROM `jiang_lottery` as l,`jiang_method` as m  WHERE l.lotteryid=m.lotteryid ;');

			foreach ($lmdata as $v ) {
				$newLmData[$v['methodid']] = $v;
			}

			Cache::set('newLmData', $newLmData, 3600 * 24);
		}

		$traceList = array();

		foreach ($orderList as $k => $v ) {
			$lottery = $newLmData[$v['methodid']];
			$v['lotteryname'] = $lottery['lotteryname'];
			$v['methodname'] = $lottery['methodname'];

			if ($v['mode'] == 1) {
				$v['mode'] = '元';
			}
			else if ($v['mode'] == 2) {
				$v['mode'] = '角';
			}
			else if ($v['mode'] == 3) {
				$v['mode'] = '分';
			}

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
			$v['money'] = sprintf('%.3f', $v['money']);
			$v['zjprize'] = sprintf('%.3f', $v['zjprize']);
			$v['status'] = $this->getState($v['state'], $v['money']);
			$this->traceCount++;
			$this->traceCountMoney += $v['money'];
			$this->tracePaiMoney += $v['zjprize'];

			if (0 < $v['zjprize']) {
				$this->traceZhonJiang++;
			}

			$v['tracestop'] = ($v['tracestop'] == 1 ? '是' : '否');
			$traceList[$k]['id'] = $v['id'];
			$traceList[$k]['issue'] = $v['issue'];
			$traceList[$k]['beishu'] = $v['beishu'];
			$traceList[$k]['status'] = $v['status'];
			$traceList[$k]['state'] = $v['state'];
			$traceList[$k]['ordernum'] = $v['ordernum'];
			$formatOrder[$k] = $v;
		}

		$this->traceList = $traceList;
		return $formatOrder;
	}

	public function getState($v, $m = 0)
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
