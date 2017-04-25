<?php
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;
use think\Session;
use think\Cache;
use app\index\org\Zqpage;
use app\cp\controller\Lottery;
class Account extends Base
{
	protected $condition = array();
	protected $search = array();
	protected $condpara = '';
	protected $accountList = array();
	protected $message = 0;
	protected $accountType = array();
	public $param=array();
	public function __construct()
	{
		parent::__construct();
		$dataAccountType = $this->getAccountType();

		foreach ($dataAccountType as $v ) {
			$this->accountType[$v['accountnum']] = $v['accounttype'];
		}
	}
	public function _initialize(){
		$this->param=$this->request->param();
	}

	public function index()
	{
		isset($this->param['id']) or $this->param['id']='';
		isset($this->param['projectid']) or $this->param['projectid']='';
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

	public function search()
	{
		isset($this->param['my_search']) or $this->param['my_search']='';
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
		$this->condition['addtime']=array('between time',[$starttime,$endtime]);
		$range = (int) $this->param['range'];
		$date1 = strtotime($starttime);
		$date2 = strtotime($endtime);
		$diff = (int) ($date2 - $date1) / (24 * 3600);

		if ($range == 2) {
			if (10 < $diff) {
				$this->error('最多只能查询相隔10天的数据');
			}
		}
		else if (2 < $diff) {
			$this->error('最多只能查询相隔2天的数据');
		}

		if (isset($this->condition['ztype'])) {
			$ztype = $this->condition['ztype'];
			$ztypefield = formatstr($this->param['ztypefield']);

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

		$lntype = formatstr($this->param['lntype']);
		if (!empty($lntype) && is_numeric($lntype)) {
			$this->condition['accounttype'] = $lntype;
		}

		$username = Session::get('un');
		$range = (int) $this->param['range'];
		$regname = array();
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
			$where_reg['addtime']=array('>=time',$starttime);
			$where_reg['addtime']=array('<=time',$endtime);
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

		// import('@.ORG.ZQPage');
		$DaoAccount = Db::name('Account');
		$listRows = 30;
		$count = $DaoAccount->where($this->condition)->count();
		$p = new Zqpage($count, $listRows);
		$data_account = $DaoAccount->where($this->condition)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select();
		$this->accountList = $this->formatAccountList($data_account);
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
		$_obfuscate_8Iu1['ordertype'] = $this->getAccountType();
		$_obfuscate_8Iu1['accountList'] = $this->accountList;
		$_obfuscate_8Iu1['message'] = $this->message;
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function getAccountType()
	{
		$Dao = Db::name('Accountzhidi');
		return $Dao->order('id asc')->select();
	}

	public function formatAccountList($orderList)
	{
		if (is_null($orderList)) {
			return NULL;
		}

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
}


?>
