<?php
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;
use think\Session;
use think\Config;
use app\cp\controller\Buy;

class Fucai extends Base
{
	private $time_table = 'FucaiTime';
	private $code_table = 'FucaiCode';

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
		$ajaxStr = $buy->buy();

		if (is_array($ajaxStr)) {
			$ajaxStr = json_encode($ajaxStr);
		}

		echo $ajaxStr;
	}

	public function ltRead()
	{
		$ajaxStr = $this->getCurIssue();

		if (is_array($ajaxStr)) {
			$ajaxStr = json_encode($ajaxStr);
		}

		echo $ajaxStr;
	}

	public function ltGethistory()
	{
		$param=$this->request->param();
		isset($param['issue']) or $param['issue']='';
		$issue = formatstr($param['issue']);
		$ajaxStr = array();
		$ajaxStr = $this->getHistoryCode($issue);

		if (count($ajaxStr['code']) < 2) {
			$ajaxStr = 'empty';
		}

		echo $ajaxStr = json_encode($ajaxStr);
		exit();
	}

	public function getCurIssue($must = false)
	{
		// $Dao = m($this->time_table);
		$servertime = date('H:i:s');
		$today = date('Y-m-d');
		$nowtime = date('H:i:s');
		$curIssueData = Db::name($this->time_table)->where('begintime<=\'' . $servertime . '\' and endtime>\'' . $servertime . '\'')->find();
		$date2 = strtotime($today);
		$date1 = strtotime('01/01/2016');
		$diff = (int) ($date2 - $date1) / (24 * 3600);
		$qishu = sprintf('%03d', 1 + $diff);
		$currIssue['issue'] = date('Y', strtotime($today)) . sprintf('%03d', $qishu);
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

		if (strtotime('23:59:00') < strtotime($nowtime)) {
			$servertime = date('H:i:s', strtotime('00:01:00'));
		}

		$sql = 'select begintime,endtime,opentime,lottery_num from jiang_fucai_time where endtime>\'' . $servertime . '\'';

		if ($isAll) {
			$sql = 'select begintime,endtime,opentime,lottery_num from jiang_fucai_time';
		}
		$data = Db::query($sql);
		return $data;
	}

	public function show()
	{
		$servertime = date('Y-m-d H:i:s');
		$nowtime = date('H:i:s');
		$taoday = date('Y-m-d') . ' ';
		$tomorrow = date('Y-m-d', strtotime('+1 day')) . ' ';

		if (strtotime('23:59:00') < strtotime($nowtime)) {
			$taoday = $tomorrow;
		}

		$issueData = $this->getIssue();
		//增加数量判断
		$issueCount=count($issueData);
		$date2 = strtotime($taoday);
		$date1 = strtotime('01/01/2016');
		$diff = (int) ($date2 - $date1) / (24 * 3600);
		$qishu = sprintf('%03d', 1 + $diff);
		if($issueCount){
			$lottery_num = sprintf('%03d', $issueData[0]['lottery_num']);
		}else{
			$lottery_num = sprintf('%03d', 0);
		}
		
		$cur_issue['issue'] = date('Y') . $qishu;
		if($issueCount){
			$cur_issue['endtime'] = $taoday . $issueData[0]['endtime'];
			$cur_issue['opentime'] = $taoday . $issueData[0]['opentime'];
		}else{
			$cur_issue['endtime'] = $taoday ;
			$cur_issue['opentime'] = $taoday ;
		}
		
		$cur_issue = json_encode($cur_issue);
		$issues = array();
		$tomorrowissues = array();
		if($issueCount){
			foreach ($issueData as $key => $vale ) {
				$lottery_num = sprintf('%03d', $vale['lottery_num']);
				$issues[$key]['issue'] = date('Y') . $qishu;
				$issues[$key]['endtime'] = $taoday . $vale['endtime'];
			}
		}

		if (strtotime('23:00:00') < strtotime($nowtime)) {
		}

		$issues = json_encode($issues);
		$tomorrowissues = json_encode($tomorrowissues);
		$histryCode = $this->getHistoryCode();
		// $Daomethod = m('method');
		$datamethod = Db::name('method')->where('lotteryid=9')->select();
		$jiangprize = array();

		foreach ($datamethod as $v ) {
			$jiangprize['method' . $v['methodid']] = $v['prize'];
		}

		$Tpl = $this->getCurIssue(true);
		$Tpl['servertime'] = $servertime;
		$Tpl['title'] = '王鹏开发';
		$Tpl['cur_issue'] = $cur_issue;
		$Tpl['issues'] = $issues;
		$Tpl['tomorrowissues'] = $tomorrowissues;
		$Tpl['historyissue'] = $histryCode['issue'];
		$Tpl['c0'] = 'n' . $histryCode['code'][0];
		$Tpl['c1'] = 'n' . $histryCode['code'][1];
		$Tpl['c2'] = 'n' . $histryCode['code'][2];
		$Tpl['c3'] = 'n' . $histryCode['code'][3];
		$Tpl['c4'] = 'n' . $histryCode['code'][4];
		$Tpl = array_merge($Tpl, $this->getSliderVal(2));
		$Tpl['jiangprize'] = json_encode($jiangprize);
		$currentmode = (int) Session::get('currentmode');
		$Tpl['currentmode'] = $currentmode;

		switch ($currentmode) {
		case 1:
			$Tpl['mode'] = 1700;
			break;

		case 2:
			$Tpl['mode'] = 1800;
			break;

		case 3:
			$Tpl['mode'] = 1900;
			break;

		case 4:
			$Tpl['mode'] = 1800;
			break;
		}

		$this->assign($Tpl);
		$this->assign($Tpl);
	}

	public function getCountLottery()
	{
		// $Dao = m($this->time_table);
		return Db::name($this->time_table)->count();
	}
}


?>
