<?php
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;
use think\Config;
use think\Cache;
use app\cp\controller\Lottery;
use think\Session;
use app\index\org\Zqpage;


class Order extends Base
{
	protected $condition = array();
	protected $search = array();
	protected $condpara = '';
	protected $orderList = array();
	protected $message = 0;
	public $param=array();
	public function _initialize(){
		$this->param=$this->request->param();
	}
	public function index()
	{
		isset($this->param['isgetdata']) or $this->param['isgetdata']='';
		isset($this->param['id']) or $this->param['id']='';
		$isgetdata = $this->param['isgetdata'];
		$oid = $this->param['id'];
		$projectid = isset($this->param['projectid'])?$this->param['projectid']:'';

		if ('1' == $isgetdata) {
		}

		if (!empty($oid)) {
			$this->getOrderNumInfo($oid);
			return NULL;
		}

		if (!empty($projectid)) {
			$this->cheDan($projectid);
			return NULL;
		}
		$this->show();
		return $this->fetch();
	}

	public function cheDan($id)
	{
		$ajaxStr = array();
		$notCheDanInfo = $this->isCanCheDan($id);

		if ('success' == $notCheDanInfo) {
			$DaoOrder = Db::name('Order');
			$where['id'] = $id;
			$dataOrder = $DaoOrder->where($where)->find();
			$ordernum = $dataOrder['ordernum'];
			$where = array();

			if (!empty($dataOrder)) {
				$where['id'] = $dataOrder['id'];
				$where['state'] = 4;
				$DaoOrder->update($where);
				$where = array();
				$money = round($dataOrder['money'], 4);
				$username = Session::get('un');
				$DaoUser = Db::name('User');
				$where_u['username'] = $username;
				$dataUser = $DaoUser->where($where_u)->find();
				$ymoney = $dataUser['money'];
				$DaoUser->setInc('money', $where_u, $money);
				$DaoAccount = Db::name('Account');
				$data['username'] = $username;
				$data['lotteryid'] = $dataOrder['lotteryid'];
				$data['methodid'] = $dataOrder['methodid'];
				$data['money'] = $money;
				$data['money_befor'] = $ymoney;
				$data['money_after'] = round($ymoney + $money, 4);
				$data['accounttype'] = 3;
				$data['ordernum'] = $dataOrder['ordernum'];
				$data['tracenum'] = $dataOrder['tracenum'];
				$data['issue'] = $dataOrder['issue'];
				$data['mode'] = $dataOrder['mode'];
				$data['addtime'] = date('Y-m-d H:i:s');
				$data['accountnum'] = date('ymdhis') . rand_string(5, 2);

				if ($DaoAccount->data($data)->insert()) {
					$ajaxStr['stats'] = 'success';
				}
			}
		}
		else {
			$ajaxStr['stats'] = 'error';
			$ajaxStr['data'] = $notCheDanInfo . '期撤单失败';
		}

		if (is_array($ajaxStr)) {
			$ajaxStr = json_encode($ajaxStr);
			echo $ajaxStr;
		}
	}

	public function cheDanMany()
	{
		$taskid = formatstr($this->param['taskid']);

		if (count($taskid) < 1) {
			$this->error('请选择期数!');
		}

		foreach ($taskid as $v ) {
			$notCheDanInfo = $this->isCanCheDan($v);

			if ('success' != $notCheDanInfo) {
				$this->error($notCheDanInfo . ' 撤单时间已过,或已经撤单,请取消该期,重新提交!');
			}
		}

		$DaoOrder = Db::name('Order');
		$Where[id] = array('in', $taskid);
		$dataOrder = $DaoOrder->where($Where)->select();
		$username = Session::get('un');
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$dataUser = $_obfuscate_6ogI80pkWQ->field('money')->where('username',$username)->find();
		$nowUserMoney = round($dataUser['money'], 4);
		$DaoAccount = Db::name('Account');
		$beforMoney = $nowUserMoney;
		$data = array();
		$chedanMoney = 0;
		$account_ordernum = array();

		foreach ($dataOrder as $_obfuscate_Vwty => $v ) {
			$chedanMoney += $v['money'];
		}

		$chedanMoney = round($chedanMoney, 4);
		$data['username'] = $username;
		$data['lotteryid'] = $dataOrder[0]['lotteryid'];
		$data['methodid'] = $dataOrder[0]['methodid'];
		$data['money'] = $chedanMoney;
		$data['money_befor'] = $beforMoney;
		$data['money_after'] = round($beforMoney + $chedanMoney, 4);
		$data['accounttype'] = 3;
		$data['ordernum'] = $dataOrder[0]['ordernum'];
		$data['tracenum'] = $dataOrder[0]['tracenum'];
		$data['issue'] = $dataOrder[0]['issue'];
		$data['mode'] = $dataOrder[0]['mode'];
		$data['addtime'] = date('Y-m-d H:i:s');
		$data['accountnum'] = date('ymdhis') . rand_string(5, 2);

		if ($DaoAccount->insert($data)) {
			$_obfuscate_r0gXLo8Na5Qkt1k['state'] = '4';
			$DaoOrder->where($Where)->update($_obfuscate_r0gXLo8Na5Qkt1k);
			$_obfuscate_6ogI80pkWQ->setInc('money', array('username' => $username), $chedanMoney);
			$this->success('撤单成功');
		}
		else {
			$this->success('撤单失败');
		}
	}

	public function getOrderNumInfo($oid)
	{
		$ajaxStr = array();
		$DaoOrder = Db::name('order');
		$where['id'] = $oid;
		$data = $DaoOrder->where($where)->find();

		if (empty($data)) {
			$ajaxStr['stats'] = 'error';
			$ajaxStr['data'] = '该订单号不存在';
		}
		else {
			$ajaxStr['stats'] = 'success';
			$ajaxStr['project'] = array();
			$DaoMethod = Db::name('method');
			$ajaxStr['can'] = ($this->isCanCheDan($data['id']) == 'success' ? '1' : '0');
			//hcd
			// $lottery = $DaoMethod->getByMethodId($data['methodid']);
			$lottery=Db::query("select * from jiang_method as a inner join jiang_lottery  as b on a.lotteryid=b.lotteryid where a.methodid=".$data['methodid']);
			$ajaxStr['project']['state'] = $data['state'];
			$ajaxStr['project']['username'] = $data['username'];
			$ajaxStr['project']['cnname'] = $lottery['lotteryname'];
			$ajaxStr['project']['methodname'] = $lottery['methodname'];
			$code = $data['codes'];

			if (strpos($code, '|') !== false) {
				$code = str_replace('|', ',', $code);
				$code = str_replace('&', '', $code);
			}
			else {
				$code = str_replace('&', ',', $code);
			}

			$ajaxStr['project']['nocode'] = ($data['kjcode'] == NULL ? '' : $data['kjcode']);
			$ajaxStr['project']['totalprice'] = sprintf('%.2f', $data['money']);
			$ajaxStr['project']['projectid'] = $data['ordernum'];
			$ajaxStr['project']['taskid'] = $data['traceif'];
			$ajaxStr['project']['tracenum'] = $data['tracenum'];
			$ajaxStr['project']['multiple'] = $data['beishu'];

			if ($data['mode'] == 1) {
				$ajaxStr['project']['modes'] = '元';
			}
			else if ($data['mode'] == 2) {
				$ajaxStr['project']['modes'] = '角';
			}
			else if ($data['mode'] == 3) {
				$ajaxStr['project']['modes'] = '分';
			}

			if (!empty($data['info']) && ($data['info'] != 'undefined')) {
				$rsweisu = strlen($data['info']);
				$info = $data['info'];

				if ($rsweisu == 3) {
					$rsmsg_str = substr($info, -3, 1) . ',' . substr($info, -2, 1) . ',' . substr($info, -1, 1);
				}
				else {
					$rsmsg_str = substr($info, -2, 1) . ',' . substr($info, -1, 1);
				}

				$rsmsg = split(',', $rsmsg_str);
				$rsmsg_n = '';

				foreach ($rsmsg as $v ) {
					switch ($v) {
					case 'w':
						$rsmsg_n .= '万';
						break;

					case 'q':
						$rsmsg_n .= '千';
						break;

					case 'b':
						$rsmsg_n .= '百';
						break;

					case 's':
						$rsmsg_n .= '十';
						break;

					case 'g':
						$rsmsg_n .= '个';
						break;
					}
				}

				$ajaxStr['project']['rsmsg'] = $rsmsg_n;
			}

			$ajaxStr['project']['writetime'] = $data['addtime'];
			$ajaxStr['project']['issue'] = $data['issue'];
			$ajaxStr['project']['bonus'] = sprintf('%.2f', $data['zjprize']);
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
		//hcd
		// $this->condition['addtime'] = array(
		// 	array('gt', $starttime),
		// 	array('lt', $endtime),
		// 	'and'
		// 	);
		$this->condition['addtime'] = array(
				'between time',[$starttime,$endtime]
			);
		$date1 = strtotime($starttime);
		$date2 = strtotime($endtime);
		$diff = (int) ($date2 - $date1) / (24 * 3600);

		if (2 < $diff) {
			$this->error('最多只能查询相隔2天的数据');
		}
		if ('3' == isset($this->condition['state'])?$this->condition['state']:'') {
			$this->condition['state'] = array('gt', $this->condition['state']);
		}

		$username = Session::get('un');
		isset($this->param['range']) or $this->param['range']='';
		$range = (int) $this->param['range'];
		$regname = array();
		isset($this->param['username']) or $this->param['username']='';
		$formusername = formatstr($this->param['username']);
		$DaoUser = Db::name('User');

		switch ($range) {
		case 1:
			$regname[] = $username;
			break;

		case 2:
			$DaoBaoBiao = Db::name('Baobiao');
			$where_reg['regfrom'] = array('like', '%|' . $username . '|');
			// $where_reg['addtime'] = array(
			// 	array('egt', $starttime),
			// 	array('elt', $endtime),
			// 	'and'
			// 	);
			$where_reg['addtime'] = array(
				'between time',[$starttime,$endtime]
				);
			$data_reg = $DaoBaoBiao->field('username')->where($where_reg)->select();

			foreach ($data_reg as $v ) {
				$regname[] = $v['username'];
			}

			if (empty($regname)) {
				$this->message = 2;
				return NULL;
			}

			break;

		case 3:
			break;

		default:
			$regname[] = $username;
			break;
		}

		if (empty($formusername) || is_null($formusername)) {
			if ($range == 2) {
				$this->condition['username'] = array('in', $regname);
			}
			else {
				$this->condition['username'] = $username;
			}
		}
		else {
			$where_d['username'] = $formusername;
			$data_d = $DaoUser->where($where_d)->find();

			if (!empty($data_d)) {
				$regfrom_d = $data_d['regfrom'];

				if (strpos($regfrom_d, $username)) {
					$this->condition['username'] = $formusername;
				}
				else {
					$this->message = 2;
					return NULL;
				}
			}
			else {
				$this->message = 2;
				return NULL;
			}
		}

		if (!isset($this->condition['projectno'])) {
			$this->condition['projectno'] = array('exp', 'is not NULL');
		}

		// import('@.ORG.ZQPage');
		$DaoOrder = Db::name('order');
		$listRows = 30;
		$count = $DaoOrder->where($this->condition)->count();
		//hcd
		$p = new Zqpage($count, $listRows);
		$this->orderList = $this->formatOrderList($DaoOrder->where($this->condition)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->paginate(10));
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

		// import('@.Cp.Lottery');
		$lottery = new Lottery();
		$_obfuscate_8Iu1['data_method'] = json_encode($lottery->getMethodData());
		$_obfuscate_8Iu1['data_issue'] = json_encode($lottery->getIssue());
		$_obfuscate_8Iu1['lotterylist'] = $lottery->getLotteryData();
		$_obfuscate_8Iu1['orderList'] = $this->orderList;
		$_obfuscate_8Iu1['message'] = $this->message;
		$this->assign($_obfuscate_8Iu1);
		
	}

	public function formatOrderList($orderList)
	{
		$formatOrder = array();
		$newLmData = Cache::get('newLmData');

		if (empty($newLmData)) {
			$newLmData = array();
			$Dao = m();
			$lmdata = $Dao->query('SELECT l.lotteryid,l.lotteryname,m.methodid,m.methodname FROM `jiang_lottery` as l,`jiang_method` as m  WHERE l.lotteryid=m.lotteryid ;');

			foreach ($lmdata as $v ) {
				$newLmData[$v['methodid']] = $v;
			}

			Cache::set('newLmData', $newLmData, 3600 * 24);
		}

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

			$v['kjcode'] = (empty($v['kjcode']) ? '--' : $v['kjcode']);
			$v['codes'] = $code;
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

	public function isCanCheDan($id)
	{
		$DaoOrder = Db::name('Order');
		$where['id'] = $id;
		$where['username'] = Session::get('un');
		$where['state'] = array('eq', '0');
		$dataOrder = $DaoOrder->where($where)->find();
		unset($where);
		$lotteryid = $dataOrder['lotteryid'];
		$Date_1 = date('Y-m-d');
		$Date_2 = date('Y-m-d', strtotime($dataOrder['addtime']));
		$d1 = strtotime($Date_1);
		$d2 = strtotime($Date_2);
		$Days = round(($d1 - $d2) / 3600 / 24);

		if (0 < $Days) {
			return $dataOrder['issue'];
		}

		switch ($lotteryid) {
		case 1:
			$lottery_num = (int) substr($dataOrder['issue'], -3);

			if ($lottery_num == 120) {
				if (strtotime(date('H:i:s')) < strtotime('08:30:01')) {
					return $dataOrder['issue'];
				}
			}

			$DaoTime = Db::name('SscTime');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 2:
			// import('@.Cp.Lottery');
			$lott = new Lottery();
			$startqishu = $lott->getSpecialIssue(2);
			$lottery_num = (int) $dataOrder['issue'] - $startqishu;
			$DaoTime = Db::name('HscTime');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 3:
			$lottery_num = (int) substr($dataOrder['issue'], -3);
			$DaoTime = Db::name('XjcTime');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));
			$nowtime = date('H:i:s');

			if ($lottery_num == 84) {
				if (strtotime(date('H:i:s')) < strtotime('00:30:00')) {
					return $dataOrder['issue'];
				}
			}

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 4:
			$lottery_num = (int) substr($dataOrder['issue'], -3);
			$DaoTime = Db::name('XscTime');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 5:
			$lottery_num = (int) substr($dataOrder['issue'], -2);
			$DaoTime = Db::name('SslTime');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 6:
			$lottery_num = (int) substr($dataOrder['issue'], -2);
			$DaoTime = Db::name('Sd115Time');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 7:
			$lottery_num = (int) substr($dataOrder['issue'], -2);
			$DaoTime = Db::name('Dl115Time');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 8:
			$lottery_num = (int) substr($dataOrder['issue'], -2);
			$DaoTime = Db::name('Gd115Time');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 9:
			$lottery_num = 1;
			$DaoTime = Db::name('FucaiTime');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 10:
			$lottery_num = 1;
			$DaoTime = Db::name('PlsTime');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 11:
			$lottery_num = (int) substr($dataOrder['issue'], -2);
			$DaoTime = Db::name('Cq115Time');
			$where['lottery_num'] = $lottery_num;
			$dataTime = $DaoTime->where($where)->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;

		case 13:
			$DaoTime = Db::name('LhcTime');
			$dataTime = $DaoTime->find();
			$endtime = $dataTime['endtime'];
			$nowAdd2 = date('H:i:s', strtotime('+1 minute'));

			if (strtotime($nowAdd2) < strtotime($endtime)) {
				return 'success';
			}

			break;
		}

		return $dataOrder['issue'];
	}
}


?>
