<?php
namespace app\cp\controller;
use app\cp\controller\Encode;
use app\cp\controller\Lottery;
use think\Db;
use think\Controller;
use think\Session;
use think\Config;
use think\Cookie;

class Buy extends Controller
{
	private $lotteryid;
	private $codeModel;
	private $timeModel;
	private $lt_total_nums = 0;
	private $prize;
	private $point;
	private $lt_project;
	private $lt_issue_start;
	private $lt_trace_issues;
	private $isTrace = false;
	private $traceStop = 1;
	private $lt_total_money;
	private $lt_trace_money;
	private $lt_trace_count_input;

	public function __construct()
	{
		parent::__construct();
		$param=$this->request->param();
		isset($param['lotteryid']) or $param['lotteryid']=0;
		$lotteryid = formatstr($param['lotteryid']);

		if (!is_numeric($lotteryid)) {
			$this->error('游戏类参数错误');
		}

		$this->lotteryid = $lotteryid;

		switch ($lotteryid) {
		case 1:
			$this->codeModel = 'SscCode';
			$this->timeModel = 'SscTime';
			break;

		case 2:
			$this->codeModel = 'HscCode';
			$this->timeModel = 'HscTime';
			break;

		case 3:
			$this->codeModel = 'XjcCode';
			$this->timeModel = 'XjcTime';
			break;

		case 4:
			$this->codeModel = 'XscCode';
			$this->timeModel = 'XscTime';
			break;

		case 5:
			$this->codeModel = 'SslCode';
			$this->timeModel = 'SslTime';
			break;

		case 6:
			$this->codeModel = 'Sd115Code';
			$this->timeModel = 'Sd115Time';
			break;

		case 7:
			$this->codeModel = 'Dl115Code';
			$this->timeModel = 'Dl115Time';
			break;

		case 8:
			$this->codeModel = 'Gd115Code';
			$this->timeModel = 'Gd115Time';
			break;

		case 9:
			$this->codeModel = 'FucaiCode';
			$this->timeModel = 'FucaiTime';
			break;

		case 10:
			$this->codeModel = 'PlsCode';
			$this->timeModel = 'PlsTime';
			break;

		case 11:
			$this->codeModel = 'Cq115Code';
			$this->timeModel = 'Cq115Time';
			break;

		case 13:
			$this->codeModel = 'LhcCode';
			$this->timeModel = 'LhcTime';
			break;
		}
		$this->lt_issue_start = $param['lt_issue_start'];

		if (empty($this->lt_issue_start)) {
			$this->error('期号不能为空!');
		}

		$this->lt_project = $param['lt_project'];
		isset($param['lt_trace_issues']) or $param['lt_trace_issues']=0;
		$lt_trace_issues = formatstr($param['lt_trace_issues']);
		$traceissues = array();
		$ii = 0;
		if($lt_trace_issues){
			foreach ($lt_trace_issues as $value ) {
				if (is_numeric($param['lt_trace_times_' . $value])) {
					$traceissues[$ii] = array('issue' => $value, 'times' => $param['lt_trace_times_' . $value]);
					$ii++;
				}
			}
		}

		if (!empty($traceissues) && (1 <= count($traceissues))) {
			$this->isTrace = true;
			$this->traceStop = ('yes' == $param['lt_trace_stop'] ? 1 : 0);
		}

		$this->lt_trace_issues = $traceissues;
		$this->lt_total_money = (double) $param['lt_total_money'];
		$this->lt_trace_money = (double) $param['lt_trace_money'];
		$this->lt_trace_count_input = (int) $param['lt_trace_count_input'];
	}

	public function buy()
	{
		$ajaxStr = array();
		$username = Session::get('un');
		// $DaoUser = m('User');
		$where['username'] = $username;
		$dataU = Db::name('user')->where($where)->find();
		$usermoney = $dataU['money'];
		$userFd = $dataU['rate_1'];
		$userFd2 = $dataU['rate_2'];

		switch ($this->lotteryid) {
		case 5:
		case 6:
		case 7:
		case 8:
		case 9:
		case 10:
		case 11:
			$userFd = $userFd2;
			break;
		}

		$nowtime = date('Y-m-d H:i:s');

		if ($dataU['state'] == '0') {
			$ajaxStr['stats'] = 'error';
			$ajaxStr['data'] = array('你的帐户已被冻结');
			return $ajaxStr;
		}

		if ($dataU['isplay'] == '0') {
			$ajaxStr['stats'] = 'error';
			$ajaxStr['data'] = array('该帐号存在异常,无法投注');
			return $ajaxStr;
		}

		$checkIssuesTimeOut = NULL;

		if ($this->isTrace) {
			$checkIssuesTimeOut = $this->checkIssuesTimeOut($this->lt_trace_issues);
		}
		else {
			$checkIssuesTimeOut = $this->checkIssuesTimeOut($this->lt_issue_start);
		}

		if (!empty($checkIssuesTimeOut)) {
			$ajaxStr['stats'] = 'error';
			$ajaxStr['data'] = array('期号:' . $checkIssuesTimeOut . '该期已经截止!');
			return $ajaxStr;
		}

		// import('@.Cp.Encode');
		$encode = new Encode();
		$successNum = 0;
		$failNum = 0;
		$data = array();
		$content = array();
		$accountData = array();
		// $DaoOrder = d('Order');
		// $DaoAccount = d('account');

		foreach ($this->lt_project as $key => $p ) {
			$p = str_replace('\'', '"', $p);
			$project = json_decode($p, true);
			$sliderStep = $encode->getSliderPrizeMode($project['prizeMode']);
			if ((1900 <= $sliderStep) && ($userFd < 5)) {
				$ajaxStr['stats'] = 'error';
				$ajaxStr['data'] = array('你的返点开启不了1900模式');

				return $ajaxStr;
				exit();
			}

			if ($this->lotteryid == 13) {
				$sliderStep = Config::get('baseBouns');
			}

			if ($encode->checkCodeNum($project['methodid'], $project['nums'], $project['type'])) {
				$ajaxStr['stats'] = 'error';
				$ajaxStr['data'] = array('直选单式不可超过800注');

				return $ajaxStr;
				exit();
			}
			$jg=$encode->checkCode($project['methodid'], $project['codes'], $project['nums'], $project['money'], $project['mode'], $project['times'], $project['type']);
			if (!$encode->checkCode($project['methodid'], $project['codes'], $project['nums'], $project['money'], $project['mode'], $project['times'], $project['type'])) {
				$failNum++;
				$content[$key]['desc'] = $project['desc'];
				$content[$key]['errmsg'] = '数据错误';
			}
			else {
				$usemoney = 0;

				if ($this->isTrace) {
					$usemoney = $this->getTraceMoney($project['money'] / $project['times'], $this->lt_trace_issues);
				}
				else {
					$usemoney = round($project['money'], 4);
				}

				if (($usemoney <= 0) || ($project['times'] <= 0)) {
					$failNum++;
					$content[$key]['desc'] = $project['desc'];
					$content[$key]['errmsg'] = '余额不足或者倍数不正确';

					return NULL;
				}

				if (0 <= $usermoney - $usemoney) {
					$projectno = rand_string(5, 3, '0123456789') . date('His');
					$tracenum = rand_string(5, 3, '0123456789') . date('His');
					$pp = $this->getPrizePoint($this->lotteryid, $project['methodid'], $username, $userFd, $sliderStep, $project['mode']);
					if (!empty($project['rxmsg']) && ($project['type'] == 'input')) {
						if (($project['rxmsg'] == '') || empty($project['rxmsg'])) {
							$ajaxStr['stats'] = 'error';
							$ajaxStr['data'] = array('任选单式位数选择错误!');

							return $ajaxStr;
							exit();
						}

						$info = $project['rxmsg'];

						if (is_numeric($info)) {
							return NULL;
						}

						if (strlen($info) == 3) {
							$rsmsg_str = substr($info, -3, 1) . ',' . substr($info, -2, 1) . ',' . substr($info, -1, 1);
						}
						else if (strlen($info) == 2) {
							$rsmsg_str = substr($info, -2, 1) . ',' . substr($info, -1, 1);
						}
						else {
							$ajaxStr['stats'] = 'error';
							$ajaxStr['data'] = array('任选单式位数选择错误!');

							return $ajaxStr;
							exit();
						}

						$rsmsg = explode(',', $rsmsg_str);

						if (count($rsmsg) != count(array_unique($rsmsg))) {
							$ajaxStr['stats'] = 'error';
							$ajaxStr['data'] = array('任选单式位数选择错误!');

							return $ajaxStr;
							exit();
						}
					}

					if ($this->isTrace) {
						$i = 0;
						$ordernumFlag = time() . rand_string(5, 1);
						$startIssueMoney = 0;

						foreach ($this->lt_trace_issues as $k => $v ) {
							$ordernum = $ordernumFlag . $k;
							$oneorderMoney = ($project['money'] / $project['times']) * $v['times'];

							if ($key == 0) {
								$startIssueMoney = $oneorderMoney;
							}

							$data[$k]['issue'] = $v['issue'];
							$data[$k]['lotteryid'] = $this->lotteryid;
							$data[$k]['methodid'] = $project['methodid'];
							$data[$k]['projectno'] = ($i == 0 ? $projectno : NULL);
							$data[$k]['tracenum'] = $tracenum;
							$data[$k]['ordernum'] = $ordernum;
							$data[$k]['money'] = $oneorderMoney;
							$data[$k]['username'] = $username;
							$data[$k]['type'] = $project['type'];
							$data[$k]['codes'] = $project['codes'];
							$data[$k]['info'] = $project['rxmsg'];
							$data[$k]['beishu'] = $v['times'];

							if ($v['times'] <= 0) {
								return NULL;
							}

							$data[$k]['mode'] = $project['mode'];
							$data[$k]['step'] = $sliderStep;
							$data[$k]['traceif'] = '1';
							$data[$k]['tracestop'] = $this->traceStop;
							$data[$k]['state'] = 0;
							$data[$k]['prize'] = $pp[0];
							$data[$k]['point'] = $pp[1];
							$data[$k]['addtime'] = $nowtime;
							$i++;
						}

						$sql_m = 'update jiang_user set money=money-' . $usemoney . ' where username=\'' . $username . '\'';
						if (Db::query($sql_m) && Db::name('order')->insertAll($data)) {
							$accountnum = date('ymdhis');
							$accountData['username'] = $username;
							$accountData['issue'] = $this->lt_trace_issues[0]['issue'];
							$accountData['lotteryid'] = $this->lotteryid;
							$accountData['methodid'] = $project['methodid'];
							$accountData['money'] = $usemoney;
							$accountData['money_befor'] = $usermoney;
							$usermoney -= $usemoney;
							$accountData['money_after'] = $usermoney;
							$accountData['accounttype'] = '2';
							$accountData['projectno'] = $projectno;
							$accountData['ordernum'] = $ordernumFlag . '0';
							$accountData['tracenum'] = $tracenum;
							$accountData['accountnum'] = $accountnum . rand_string(5, 2);
							$accountData['mode'] = $project['mode'];
							$accountData['addtime'] = $nowtime;
							// $DaoAccount->add($accountData);
							Db::name('account')->insert($accountData);
							$accountData = array();
							$data = array();
						}
					}
					else {
						$ordernum = time() . rand_string(6, 1);
						$data['issue'] = $this->lt_issue_start;
						$data['lotteryid'] = $this->lotteryid;
						$data['methodid'] = $project['methodid'];
						$data['projectno'] = $projectno;
						$data['tracenum'] = $tracenum;
						$data['ordernum'] = $ordernum;
						$data['money'] = $project['money'];
						$data['username'] = $username;
						$data['type'] = $project['type'];
						$data['codes'] = $project['codes'];
						$data['info'] = $project['rxmsg'];
						$data['beishu'] = $project['times'];

						if ($project['times'] <= 0) {
							return NULL;
						}

						$data['mode'] = $project['mode'];
						$data['step'] = $sliderStep;
						$data['traceif'] = '0';
						$data['tracestop'] = $this->traceStop;
						$data['state'] = 0;
						$data['prize'] = $pp[0];
						$data['point'] = $pp[1];
						$data['addtime'] = $nowtime;
						$usermoney_befor = $usermoney;
						$usermoney = $usermoney - $project['money'];
						$usermoney_after = $usermoney;
						$accountnum = date('ymdhis');
						$accountData['username'] = $username;
						$accountData['issue'] = $this->lt_issue_start;
						$accountData['lotteryid'] = $this->lotteryid;
						$accountData['methodid'] = $project['methodid'];
						$accountData['money'] = $project['money'];
						$accountData['money_befor'] = $usermoney_befor;
						$accountData['money_after'] = $usermoney_after;
						$accountData['accounttype'] = ($this->isTrace ? 2 : 1);
						$accountData['projectno'] = $projectno;
						$accountData['ordernum'] = $ordernum;
						$accountData['tracenum'] = $tracenum;
						$accountData['accountnum'] = $accountnum . rand_string(5, 2);
						$accountData['mode'] = $project['mode'];
						$accountData['addtime'] = $nowtime;
						$sql_m = 'update jiang_user set money=money-' . $usemoney . ' where username=\'' . $username . '\'';

						if (Db::query($sql_m)) {
							// $DaoOrder->data($data)->add();
							Db::name('order')->insert($data);
							// $DaoAccount->data($accountData)->add();
							Db::name('account')->insert($accountData);
							$accountData = array();
							$data = array();
						}
					}
				}
				else {
					$failNum++;
					$content[$key]['desc'] = $project['desc'];
					$content[$key]['errmsg'] = '余额不足';
				}
			}
		}

		if (0 < $failNum) {
			$ajaxStr['stats'] = 'fail';
			$data['success'] = $successNum;
			$data['fail'] = $failNum;
			$data['content'] = $content;
			$ajaxStr['data'] = $data;
			return $ajaxStr;
		}
		else {
			$ajaxStr = 'success';
			return $ajaxStr;
		}
	}

	public function checkIssuesTimeOut($arr)
	{
		// $Dao = m($this->timeModel);
		$timeData = Db::name($this->timeModel)->order('id')->select();
		$time = date('H:i:s');
		$qday = date('Y-m-d');

		if (is_array($arr)) {
			switch ($this->lotteryid) {
			case 1:
				foreach ($arr as $iss ) {
					$issues = (int) substr($iss['issue'], 6, 3);
					$endtime = $timeData[$issues - 1]['endtime'];
					$yue = substr($iss['issue'], 2, 2);
					$re = substr($iss['issue'], 4, 2);
					$issuesda = date('Y-' . $yue . '-' . $re);

					if (strtotime($issuesda) < strtotime($qday)) {
						return $iss['issue'];
					}

					if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
						return $iss['issue'];
					}
				}

				break;

			case 2:
				$tomorrowEndIssue = $this->getHscTomorrowEndIssue();

				foreach ($arr as $iss ) {
					$issues = (int) $iss['issue'] - $tomorrowEndIssue;
					$endtime = $timeData[$issues - 1]['endtime'];
					if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
						return $iss['issue'];
					}
				}

				break;

			case 3:
				foreach ($arr as $iss ) {
					$issues = (int) substr($iss['issue'], 9, 3);
					$endtime = $timeData[$issues - 1]['endtime'];

					if (strtotime('02:01:00') < strtotime($time)) {
						if ((strtotime($endtime) < strtotime($time)) && (strtotime('02:01:00') < strtotime($endtime))) {
							return $iss['issue'];
						}
					}
					else if (strtotime($endtime) < strtotime($time)) {
						return $iss['issue'];
					}
				}

				break;

			case 4:
				// $Daocode = m('XscCode');

				foreach ($arr as $iss ) {
					$issues = (int) substr($iss['issue'], 9, 3);
					$endtime = $timeData[$issues - 1]['endtime'];
					if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
						return $iss['issue'];
					}

					$where['issue'] = $iss['issue'];
					$dataCode = Db::name('xsc_code')->where($where)->find();

					if (!empty($dataCode)) {
						return $iss['issue'];
					}
				}

				break;

			case 5:
				foreach ($arr as $iss ) {
					$issues = (int) substr($iss['issue'], 9, 2);
					$endtime = $timeData[$issues - 1]['endtime'];
					if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
						return $iss['issue'];
					}
				}

				break;

			case 6:
			case 7:
			case 8:
			case 11:
				$today = date('Ymd');

				foreach ($arr as $iss ) {
					$issarr = explode('-', $iss['issue']);

					if ($today != $issarr[0]) {
						return false;
					}

					$issues = (int) $issarr[1];
					$endtime = $timeData[$issues - 1]['endtime'];
					if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
						return $iss['issue'];
					}
				}

				break;

			case 9:
				$nowIssue = $this->getFCNowIssue();

				foreach ($arr as $iss ) {
					$issues = 1;

					if ($iss != $nowIssue) {
						return $iss['issue'];
					}

					$endtime = $timeData[$issues - 1]['endtime'];

					if (strtotime($endtime) < strtotime($time)) {
						return $iss['issue'];
					}
				}

				break;

			case 10:
				$nowIssue = $this->getPLNowIssue();

				foreach ($arr as $iss ) {
					if (!is_numeric($iss)) {
						return $iss['issue'];
					}

					if ($iss != $nowIssue) {
						return $iss['issue'];
					}

					$issues = 1;
					$endtime = $timeData[$issues - 1]['endtime'];

					if (strtotime($endtime) < strtotime($time)) {
						return $iss['issue'];
					}
				}

				break;

			case 13:
				$endtime = $timeData[0]['endtime'];
				$lottery_num = $timeData[0]['lottery_num'];

				foreach ($arr as $iss ) {
					if ($iss['issue'] != $lottery_num) {
						return $iss['issue'];
					}
				}

				break;
			}
		}
		else {
			switch ($this->lotteryid) {
			case 1:
				$issues = substr($arr, 6, 3);
				$endtime = $timeData[$issues - 1]['endtime'];
				$yue = substr($arr, 2, 2);
				$re = substr($arr, 4, 2);
				$issuesda = date('Y-' . $yue . '-' . $re);

				if (strtotime($issuesda) < strtotime($qday)) {
					return $arr;
				}

				if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
					return $arr;
				}

				break;

			case 2:
				$tomorrowEndIssue = $this->getHscTomorrowEndIssue();
				$issues = (int) $arr - $tomorrowEndIssue;
				$endtime = $timeData[$issues - 1]['endtime'];
				if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
					return $arr;
				}

				break;

			case 3:
				$issues = substr($arr, 9, 3);
				$endtime = $timeData[$issues - 1]['endtime'];

				if (strtotime('02:01:00') < strtotime($time)) {
					if ((strtotime($endtime) < strtotime($time)) && (strtotime('02:01:00') < strtotime($endtime))) {
						return $arr;
					}
				}
				else if (strtotime($endtime) < strtotime($time)) {
					return $arr;
				}

				break;

			case 4:
				$issues = substr($arr, 9, 3);
				$endtime = $timeData[$issues - 1]['endtime'];
				if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
					return $arr;
				}

				// $Daocode = m('XscCode');
				$where['issue'] = $arr;
				$dataCode = Db::name(xsc_code)->where($where)->find();

				if (!empty($dataCode)) {
					return $iss['issue'];
				}

				break;

			case 5:
				$issues = substr($arr, 9, 2);
				$endtime = $timeData[$issues - 1]['endtime'];
				if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
					return $arr;
				}

				break;

			case 6:
			case 7:
			case 8:
			case 11:
				$today = date('Ymd');
				$issarr = explode('-', $arr);

				if ($today != $issarr[0]) {
					return false;
				}

				$issues = (int) $issarr[1];
				$endtime = $timeData[$issues - 1]['endtime'];
				if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
					return $arr;
				}

				break;

			case 9:
				$nowIssue = $this->getFCNowIssue();

				if ($arr != $nowIssue) {
					return $arr;
				}

				$issues = 1;
				$endtime = $timeData[$issues - 1]['endtime'];

				if (strtotime($endtime) < strtotime($time)) {
					return $arr;
				}

				break;

			case 10:
				$nowIssue = $this->getPLNowIssue();

				if (!is_numeric($arr)) {
					return $arr;
				}

				if ($arr != $nowIssue) {
					return $arr;
				}

				$issues = 1;
				$endtime = $timeData[$issues - 1]['endtime'];

				if (strtotime($endtime) < strtotime($time)) {
					return $arr;
				}

				break;

			case 13:
				$endtime = $timeData[0]['endtime'];
				$lottery_num = $timeData[0]['lottery_num'];

				if ($arr != $lottery_num) {
					return $arr;
				}

				if ((strtotime($endtime) < strtotime($time)) || empty($endtime)) {
					return $arr;
				}

				break;
			}
		}

		return NULL;
	}

	public function getTraceMoney($money, $arr)
	{
		$allmoney = 0;

		foreach ($arr as $v ) {
			$allmoney += $money * $v['times'];
		}

		return round($allmoney, 4);
	}

	public function getPrizePoint($lotteryid, $methodid, $username, $fd, $sliderStep, $mode)
	{
		$banner_web_show_tt = array();
		// $_obfuscate_ehDu7EJ4I57R = m('Method');
		$Where['methodid'] = $methodid;
		$data = Db::name('method')->where($Where)->find();
		$bouns = $data['prize'];

		if ($mode == 1) {
			$_obfuscate_JnEE2xMbLNa8uY = 1;
		}
		else if ($mode == 2) {
			$_obfuscate_JnEE2xMbLNa8uY = 0.1;
		}
		else if ($mode == 3) {
			$_obfuscate_JnEE2xMbLNa8uY = 0.01;
		}

		$baseBouns = Config::get('baseBouns');
		$_obfuscate_8chrx9sMs6_5Jqw = $baseBouns / $bouns;
		$_obfuscate_A2xlY0XR4316xw44P6rG = round($bouns / $baseBouns / 10, 4);
		$_obfuscate_EHEAIfHK0h0O = $sliderStep;
		$step = 0;
		$_obfuscate_C_4uNQ = floatval(($fd * 100) % (0.5 * 100)) / 100;
		$fd = $fd - $_obfuscate_C_4uNQ;

		if ($_obfuscate_EHEAIfHK0h0O < $baseBouns) {
			$step = ($baseBouns - $_obfuscate_EHEAIfHK0h0O) / 10;
			$fd2 = ($step * 0.5) + $fd + $_obfuscate_C_4uNQ;
			$jiangjin = ($bouns - ($step * $_obfuscate_A2xlY0XR4316xw44P6rG)) * $_obfuscate_JnEE2xMbLNa8uY;
		}

		if ($baseBouns <= $_obfuscate_EHEAIfHK0h0O) {
			$step = ($_obfuscate_EHEAIfHK0h0O - $baseBouns) / 10;
			$_obfuscate_TBR8Ku9F6Q = $fd / 0.5;
			$step = ($_obfuscate_TBR8Ku9F6Q < $step ? $_obfuscate_TBR8Ku9F6Q : $step);
			$fd2 = ($fd - ($step * 0.5)) + $_obfuscate_C_4uNQ;
			$jiangjin = ($bouns + ($step * $_obfuscate_A2xlY0XR4316xw44P6rG)) * $_obfuscate_JnEE2xMbLNa8uY;
		}

		$banner_web_show_tt[0] = round($jiangjin, 4);
		$banner_web_show_tt[1] = round($fd2, 4);
		return $banner_web_show_tt;
	}

	public function getHscTomorrowEndIssue()
	{
		// import('@.Cp.Lottery');
		$lott = new Lottery();
		return $lott->getSpecialIssue(2);
	}

	public function getFCNowIssue()
	{
		$TODAY = date('Y-m-d');
		$date2 = strtotime($TODAY);
		$date1 = strtotime('01/01/2014');
		$diff = (int) ($date2 - $date1) / (24 * 3600) - 8;
		$qishu = 1 + $diff;
		return date('Y', strtotime($TODAY)) . sprintf('%03d', $qishu);
	}

	public function getPLNowIssue()
	{
		$TODAY = date('Y-m-d');
		$date2 = strtotime($TODAY);
		$date1 = strtotime('01/01/2014');
		$diff = (int) ($date2 - $date1) / (24 * 3600) - 8;
		$qishu = 1 + $diff;
		return date('y', strtotime($TODAY)) . sprintf('%03d', $qishu);
	}

	public function test()
	{
		$m = $this->lt_trace_issues;
		echo 'success';
		return NULL;
	}
}


?>
