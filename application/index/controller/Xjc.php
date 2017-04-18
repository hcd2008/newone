<?php
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;
use app\cp\controller\Buy;
use think\Session;

class Xjc extends Base
{
	private $time_table = 'XjcTime';
	private $code_table = 'XjcCode';

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

		echo $_obfuscate_nT44rgz3TQ;
	}

	public function ltRead()
	{
		$_obfuscate_nT44rgz3TQ = $this->getCurIssue();

		if (is_array($_obfuscate_nT44rgz3TQ)) {
			$_obfuscate_nT44rgz3TQ = json_encode($_obfuscate_nT44rgz3TQ);
		}

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

		if (strtotime('23:58:00') < strtotime($nowtime)) {
			$servertime = date('H:i:s', strtotime('00:01:00'));
		}

		$curIssueData = Db::name($this->time_table)->where('endtime>=\'' . $servertime . '\'')->find();
		$currIssue['issue'] = date('Ymd', strtotime($today)) . '-' . sprintf('%03d', $curIssueData['lottery_num']);

		if (strtotime($nowtime) < strtotime('02:00:01')) {
			$currIssue['issue'] = date('Ymd', strtotime('-1 day')) . '-' . sprintf('%03d', $curIssueData['lottery_num']);
		}

		$currIssue['saleend'] = $curIssueData['endtime'];
		$currIssue['sale'] = $curIssueData['lottery_num'] - 1;
		$currIssue['left'] = $this->getCountLottery() - $currIssue['sale'];
		$currIssue['nowtime'] = date('Y-m-d H:i:s');
		$currIssue['saleend'] = date('Y-m-d', strtotime($today)) . ' ' . $curIssueData['endtime'];
		$currIssue['opentime'] = date('Y-m-d', strtotime($today)) . ' ' . $curIssueData['opentime'];

		if (strtotime('23:58:00') < strtotime($nowtime)) {
			$today = date('Y-m-d', strtotime('+1 day'));
			$currIssue['saleend'] = date('Y-m-d', strtotime($today)) . ' ' . $curIssueData['endtime'];
		}

		if (empty($curIssueData) && !$must) {
			$currIssue = 'empty';
		}

		return $currIssue;
	}

	public function getHistoryCode($issue='')
	{
		$code = array();
		// $Dao = m($this->code_table);

		if (empty($issue)) {
			$data = Db::name($this->code_table)->order('id desc')->find();
			$code['issue'] = $data['issue'];
			$cnum = $data['code'];
			$code['code'] = explode(',', $cnum);
		}
		else {
			$data = Db::name($this->code_table)->getByIssue($issue);
			$code['issue'] = $issue;
			$cnum = $data['code'];
			$code['code'] = explode(',', $cnum);
		}

		return $code;
	}

	public function getIssue($isAll='')
	{
		// $Dao = m($this->time_table);
		$servertime = date('H:i:s');
		$nowtime = date('H:i:s');

		if (strtotime('02:01:00') < strtotime($nowtime)) {
			$sql = 'select begintime,endtime,opentime,lottery_num from jiang_xjc_time where endtime>\'' . $servertime . '\' ';
			$sql .= 'or (endtime>\'00:00:00\' and endtime<\'02:00:00\')';
		}
		else {
			$sql = 'select begintime,endtime,opentime,lottery_num from jiang_xjc_time where endtime>\'' . $servertime . '\' ';
			$sql .= 'and (endtime>\'00:00:00\' and endtime<\'02:00:00\')';
		}

		if ($isAll) {
			$sql = 'select begintime,endtime,opentime,lottery_num from jiang_xjc_time';		
		}

		$data = Db::name($this->time_table)->query($sql);
		return $data;
	}

	public function show()
	{
		$servertime = date('Y-m-d H:i:s');
		$nowtime = date('H:i:s');
		$taoday = date('Y-m-d') . ' ';
		$tomorrow = date('Y-m-d', strtotime('+1 day')) . ' ';

		if (strtotime('23:58:00') < strtotime($nowtime)) {
			$taoday = date('Y-m-d', strtotime('+1 day')) . ' ';
		}

		$issueData = $this->getIssue();
		$_obfuscate_GspxAJXBGtEn6io = sprintf('%03d', $issueData[0]['lottery_num']);
		$cur_issue['issue'] = date('Ymd') . '-' . $_obfuscate_GspxAJXBGtEn6io;

		if (strtotime($nowtime) < strtotime('02:00:01')) {
			$cur_issue['issue'] = date('Ymd', strtotime('-1 day')) . '-' . $_obfuscate_GspxAJXBGtEn6io;
		}

		$cur_issue['endtime'] = $taoday . $issueData[0]['endtime'];
		$cur_issue['opentime'] = $taoday . $issueData[0]['opentime'];
		$cur_issue = json_encode($cur_issue);
		$issues = array();
		$tomorrowissues = array();

		foreach ($issueData as $_obfuscate_Vwty => $vale ) {
			$_obfuscate_GspxAJXBGtEn6io = sprintf('%03d', $vale['lottery_num']);
			$issues[$_obfuscate_Vwty]['issue'] = date('Ymd', strtotime($taoday)) . '-' . $_obfuscate_GspxAJXBGtEn6io;

			if (strtotime($nowtime) < strtotime('02:00:01')) {
				$issues[$_obfuscate_Vwty]['issue'] = date('Ymd', strtotime('-1 day')) . '-' . $_obfuscate_GspxAJXBGtEn6io;
			}

			$issues[$_obfuscate_Vwty]['endtime'] = $taoday . $vale['endtime'];
		}

		if (strtotime('23:00:00') < strtotime($nowtime)) {
		}

		$issues = json_encode($issues);
		$tomorrowissues = json_encode($tomorrowissues);
		$histryCode = $this->getHistoryCode();
		// $Daomethod = m('method');
		$_obfuscate_QK9pvIGeCDbMgA = Db::name('method')->where('lotteryid=3')->select();
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
		$_obfuscate_8Iu1 = array_merge($_obfuscate_8Iu1, $this->getSliderVal());
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
		}

		$this->assign($_obfuscate_8Iu1);
		$this->assign($_obfuscate_8Iu1);
	}

	public function getCountLottery()
	{
		// $Dao = m($this->time_table);
		return Db::name($this->time_table)->count();
	}
}


?>
