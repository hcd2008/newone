<?php
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;
use think\Session;
use think\Config;
use app\cp\controller\Buy;

class Ssc extends Base
{
	private $time_table = 'SscTime';
	private $code_table = 'SscCode';

	public function index()
	{
		$param=$this->request->param();
		isset($param['flag']) or $param['flag']='';
		$flag = formatstr($param['flag']);

		if (empty($flag)) {
			$this->show();
		}

		if ($flag == 'save') {
			$this->ltSave();
			return NULL;
		}

		if ($flag == 'read') {
			$this->ltRead();
			return NULL;
		}

		if ($flag == 'gethistory') {
			$this->ltGethistory();
			return NULL;
		}

		return $this->fetch();
	}

	public function ltSave()
	{
		// import('@.Cp.Buy');
		$buy = new Buy();
		$_obfuscate_nT44rgz3TQ = $buy->buy();

		if (is_array($_obfuscate_nT44rgz3TQ)) {
			$_obfuscate_nT44rgz3TQ = json_encode($_obfuscate_nT44rgz3TQ);
		}
		$buy = NULL;
		echo $_obfuscate_nT44rgz3TQ;
	}

	public function ltRead()
	{
		$_obfuscate_nT44rgz3TQ = array();
		$_obfuscate_nT44rgz3TQ = $this->getCurIssue();
		$_obfuscate_nT44rgz3TQ = json_encode($_obfuscate_nT44rgz3TQ);
		echo $_obfuscate_nT44rgz3TQ;
	}

	public function ltGethistory()
	{
		$param=$this->request->param();
		isset($param['issue']) or $param['issue']=0;
		$issue = formatstr($param['issue']);
		$_obfuscate_nT44rgz3TQ = array();
		$_obfuscate_nT44rgz3TQ = $this->getHistoryCode($issue);

		if (count($_obfuscate_nT44rgz3TQ['code']) < 2) {
			$_obfuscate_nT44rgz3TQ = 'empty';
		}

		echo $_obfuscate_nT44rgz3TQ = json_encode($_obfuscate_nT44rgz3TQ);
		exit();
	}

	public function getCurIssue($must = false)
	{
		// $Dao = m($this->time_table);
		$servertime = date('H:i:s');
		$today = date('Y-m-d');
		$nowtime = date('H:i:s');
		$curIssueData = Db::name($this->time_table)->where('endtime>=\'' . $servertime . '\'')->find();
		$currIssue['issue'] = date('ymd', strtotime($today)) . sprintf('%03d', $curIssueData['lottery_num']);
		$currIssue['saleend'] = $curIssueData['endtime'];
		$currIssue['sale'] = $curIssueData['lottery_num'] - 1;
		$currIssue['left'] = $this->getCountLottery() - $currIssue['sale'];
		$currIssue['nowtime'] = date('Y-m-d H:i:s');
		$currIssue['saleend'] = date('Y-m-d', strtotime($today)) . ' ' . $curIssueData['endtime'];
		$currIssue['opentime'] = date('Y-m-d', strtotime($today)) . ' ' . $curIssueData['opentime'];
		if (empty($curIssueData) && !$must) {
			$currIssue = 'empty';
		}

		return $currIssue;
	}

	public function getHistoryCode($issue=null)
	{
		$code = array();
		// $Dao = d($this->code_table);

		if (empty($issue)) {
			$data = Db::name($this->code_table)->order('id desc')->limit(1)->find();
			$code['issue'] = $data['issue'];
			$cnum = $data['code'];
			$code['code'] = explode(',', $cnum);
		}
		else {
			// $data = $Dao->getByIssue($issue);
			$data=Db::name($this->code_table)->where('issue',$issue)->find();
			$code['issue'] = $issue;
			$cnum = $data['code'];
			$code['code'] = explode(',', $cnum);
		}

		return $code;
	}

	public function getIssue($isAll=0)
	{
		// $Dao = m($this->time_table);
		$servertime = date('H:i:s');
		$nowtime = date('H:i:s');

		if (strtotime('23:59:00') < strtotime($nowtime)) {
			$servertime = date('H:i:s', strtotime('00:01:00'));
		}

		// $sql = 'select begintime,endtime,opentime,lottery_num from __TABLE__ where endtime>\'' . $servertime . '\'';

		// if ($isAll) {
		// 	$sql = 'select begintime,endtime,opentime,lottery_num from __TABLE__';
		// }

		// $data = Db::name($this->time_table)->query($sql);
		$data=Db::name($this->time_table)->field('begintime,endtime,opentime,lottery_num')->where('endtime','>',$servertime)->select();
		if($isAll){
			$data=Db::name($this->time_table)->field('begintime,endtime,opentime,lottery_num')->select();
		}
		return $data;
	}

	public function show()
	{
		$servertime = date('Y-m-d H:i:s');
		$nowtime = date('H:i:s');
		$taoday = date('Y-m-d') . ' ';
		$tomorrow = date('Y-m-d', strtotime('+1 day')) . ' ';
		$issueData = $this->getIssue();
		$_obfuscate_GspxAJXBGtEn6io = sprintf('%03d', $issueData[0]['lottery_num']);
		$cur_issue['issue'] = date('ymd') . $_obfuscate_GspxAJXBGtEn6io;
		$cur_issue['endtime'] = $taoday . $issueData[0]['endtime'];
		$cur_issue['opentime'] = $taoday . $issueData[0]['opentime'];
		$cur_issue = json_encode($cur_issue);
		$issues = array();
		$tomorrowissues = array();

		foreach ($issueData as $_obfuscate_Vwty => $vale ) {
			$_obfuscate_GspxAJXBGtEn6io = sprintf('%03d', $vale['lottery_num']);
			$issues[$_obfuscate_Vwty]['issue'] = date('ymd', strtotime($taoday)) . $_obfuscate_GspxAJXBGtEn6io;
			$issues[$_obfuscate_Vwty]['endtime'] = $taoday . $vale['endtime'];
		}

		if (strtotime('23:00:00') < strtotime($nowtime)) {
		}

		$issues = json_encode($issues);
		$tomorrowissues = json_encode($tomorrowissues);
		$histryCode = $this->getHistoryCode();
		// $Daomethod = m('method');
		$_obfuscate_QK9pvIGeCDbMgA = Db::name('method')->where('lotteryid=1')->select();
		$jiangprize = array();

		foreach ($_obfuscate_QK9pvIGeCDbMgA as $v ) {
			$jiangprize['method' . $v['methodid']] = $v['prize'];
		}
		$_obfuscate_8Iu1 = $this->getCurIssue(true);
		$_obfuscate_8Iu1['servertime'] = $servertime;
		$_obfuscate_8Iu1['title'] = 'hcd开发';
		$_obfuscate_8Iu1['cur_issue'] = $cur_issue;
		$_obfuscate_8Iu1['issues'] = $issues;
		$_obfuscate_8Iu1['tomorrowissues'] = $tomorrowissues;
		$_obfuscate_8Iu1['historyissue'] = $histryCode['issue'];
		$_obfuscate_8Iu1['c0'] = 'n' . $histryCode['code'][0];
		$_obfuscate_8Iu1['c1'] = 'n' . $histryCode['code'][1];
		$_obfuscate_8Iu1['c2'] = 'n' . $histryCode['code'][2];
		$_obfuscate_8Iu1['c3'] = 'n' . $histryCode['code'][3];
		$_obfuscate_8Iu1['c4'] = 'n' . $histryCode['code'][4];
		$_obfuscate_8Iu1 = array_merge($_obfuscate_8Iu1, $this->getSliderVal(0));
		$_obfuscate_8Iu1['jiangprize'] = json_encode($jiangprize);
		$currentmode = (int) Session::get('currentmode');
		$_obfuscate_8Iu1['currentmode'] = $currentmode;

		switch ($currentmode) {
		case 1:
			$_obfuscate_8Iu1['mode'] = 1700;
			break;

		case 2:
			$_obfuscate_8Iu1['mode'] = 1800;
			break;

		case 3:
			$_obfuscate_8Iu1['mode'] = 1900;
			break;

		case 4:
			$_obfuscate_8Iu1['mode'] = 1800;
			break;

		default:
			$_obfuscate_8Iu1['mode'] = 1700;
			break;
		}
		$this->assign($_obfuscate_8Iu1);
	}

	public function getCountLottery()
	{
		// $Dao = m($this->time_table);
		return Db::name($this->time_table)->count();
	}
}


?>
