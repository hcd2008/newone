<?php
namespace app\cp\controller;
use think\Config;
use think\Db;
use think\Cache;

class Lottery
{
	protected $dataLottery;

	public function __construct($a = 'newObject')
	{
		if ('newObject' == $a) {
			// $Daolottery = d('Lottery');
			$this->dataLottery = Db::name('lottery')->select();
		}
	}

	public function getMethodData()
	{
		$methodData = Cache::get('methodData');

		if (empty($methodData)) {
			$methodData = array();
			// $DaoMethod = d('Method');

			foreach ($this->dataLottery as $v ) {
				$dataMethod = Db::name('method')->where(array('lotteryid' => $v['lotteryid']))->select();

				foreach ($dataMethod as $k => $val ) {
					$methodData[$val['lotteryid']][$val['methodid']] = array('lotteryid' => $val['lotteryid'], 'methodid' => $val['methodid'], 'methodname' => $val['methodname']);
				}
			}

			Cache::set('methodData', $methodData, 3600 * 24);
		}

		return $methodData;
	}

	public function getIssue()
	{
		$issueData = array();
		$servertime = date('H:i:s');

		foreach ($this->dataLottery as $v ) {
			$tb=$v['timetable'];
			$table=str_replace('Time', '_time', $tb);
			// $Daotime = m($v['timetable']);
			$_obfuscate_xLyse3zLkYU = Db::name($table)->where('begintime<\'' . $servertime . '\'')->order('cast(lottery_num as unsigned) desc')->find();
			$maxLottery_num = Db::name($table)->count();
			$TODAY = date('Y-m-d');

			switch ($v['lotteryid']) {
			case 1:
				for ($dos_skipping = 0; $dos_skipping < 30; $dos_skipping++) {
					$curLottery_num = $_obfuscate_xLyse3zLkYU['lottery_num'];

					if ($curLottery_num <= 0) {
						$_obfuscate_xLyse3zLkYU['lottery_num'] = $maxLottery_num;
						$curLottery_num = $maxLottery_num;
						$TODAY = date('Y-m-d', strtotime('-1 day'));
					}

					$issue = date('ymd', strtotime($TODAY)) . sprintf('%03d', $curLottery_num);
					$issueData[$v['lotteryid']][$dos_skipping] = array('issue' => $issue, 'lotteryid' => $v['lotteryid'], 'dateend' => $TODAY);
					$_obfuscate_xLyse3zLkYU['lottery_num']--;
				}

				break;

			case 2:
				$startqishu = $this->getSpecialIssue(2);
				$curLottery_num = $startqishu + $_obfuscate_xLyse3zLkYU['lottery_num'];

				for ($dos_skipping = 0; $dos_skipping < 30; $dos_skipping++) {
					$issue = $curLottery_num--;
					$issueData[$v['lotteryid']][$dos_skipping] = array('issue' => $issue, 'lotteryid' => $v['lotteryid'], 'dateend' => $TODAY);
				}

				break;

			case 3:
				for ($dos_skipping = 0; $dos_skipping < 30; $dos_skipping++) {
					$curLottery_num = $_obfuscate_xLyse3zLkYU['lottery_num'];

					if ($curLottery_num <= 0) {
						$_obfuscate_xLyse3zLkYU['lottery_num'] = $maxLottery_num;
						$curLottery_num = $maxLottery_num;
						$TODAY = date('Y-m-d', strtotime('-1 day'));
					}

					$issue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%03d', $curLottery_num);
					$issueData[$v['lotteryid']][$dos_skipping] = array('issue' => $issue, 'lotteryid' => $v['lotteryid'], 'dateend' => $TODAY);
					$_obfuscate_xLyse3zLkYU['lottery_num']--;
				}

				break;

			case 4:
				for ($dos_skipping = 0; $dos_skipping < 30; $dos_skipping++) {
					$curLottery_num = $_obfuscate_xLyse3zLkYU['lottery_num'];

					if ($curLottery_num <= 0) {
						$_obfuscate_xLyse3zLkYU['lottery_num'] = $maxLottery_num;
						$curLottery_num = $maxLottery_num;
						$TODAY = date('Y-m-d', strtotime('-1 day'));
					}

					$issue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%03d', $curLottery_num);
					$issueData[$v['lotteryid']][$dos_skipping] = array('issue' => $issue, 'lotteryid' => $v['lotteryid'], 'dateend' => $TODAY);
					$_obfuscate_xLyse3zLkYU['lottery_num']--;
				}

				break;

			case 5:
				for ($dos_skipping = 0; $dos_skipping < 30; $dos_skipping++) {
					$curLottery_num = $_obfuscate_xLyse3zLkYU['lottery_num'];

					if ($curLottery_num <= 0) {
						$_obfuscate_xLyse3zLkYU['lottery_num'] = $maxLottery_num;
						$curLottery_num = $maxLottery_num;
						$TODAY = date('Y-m-d', strtotime('-1 day'));
					}

					$issue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%02d', $curLottery_num);
					$issueData[$v['lotteryid']][$dos_skipping] = array('issue' => $issue, 'lotteryid' => $v['lotteryid'], 'dateend' => $TODAY);
					$_obfuscate_xLyse3zLkYU['lottery_num']--;
				}

				break;

			case 6:
			case 7:
			case 8:
			case 11:
				for ($dos_skipping = 0; $dos_skipping < 30; $dos_skipping++) {
					$curLottery_num = $_obfuscate_xLyse3zLkYU['lottery_num'];

					if ($curLottery_num <= 0) {
						$_obfuscate_xLyse3zLkYU['lottery_num'] = $maxLottery_num;
						$curLottery_num = $maxLottery_num;
						$TODAY = date('Y-m-d', strtotime('-1 day'));
					}

					$issue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%02d', $curLottery_num);
					$issueData[$v['lotteryid']][$dos_skipping] = array('issue' => $issue, 'lotteryid' => $v['lotteryid'], 'dateend' => $TODAY);
					$_obfuscate_xLyse3zLkYU['lottery_num']--;
				}

				break;

			case 9:
				$date2 = strtotime(date('Y-m-d'));
				$date1 = strtotime('01/01/2014');
				$diff = (int) ($date2 - $date1) / (24 * 3600) - 8;
				$curLottery_num = $diff + 1;

				for ($dos_skipping = 0; $dos_skipping < 30; $dos_skipping++) {
					$issue = date('Y', strtotime($TODAY)) . sprintf('%03d', $curLottery_num);
					$issueData[$v['lotteryid']][$dos_skipping] = array('issue' => $issue, 'lotteryid' => $v['lotteryid'], 'dateend' => $TODAY);
					$curLottery_num--;
				}

				break;

			case 10:
				$date2 = strtotime(date('Y-m-d'));
				$date1 = strtotime('01/01/2014');
				$diff = (int) ($date2 - $date1) / (24 * 3600) - 8;
				$curLottery_num = $diff + 1;

				for ($dos_skipping = 0; $dos_skipping < 30; $dos_skipping++) {
					$issue = date('y', strtotime($TODAY)) . sprintf('%03d', $curLottery_num);
					$issueData[$v['lotteryid']][$dos_skipping] = array('issue' => $issue, 'lotteryid' => $v['lotteryid'], 'dateend' => $TODAY);
					$curLottery_num--;
				}

				break;
			}
		}

		return $issueData;
	}

	public function getLotteryData()
	{
		$lotteryData = Cache::get('lotteryData');

		if (empty($lotteryData)) {
			$lotteryData = array();

			foreach ($this->dataLottery as $k => $v ) {
				$lotteryData[$k] = array('lotteryid' => $v['lotteryid'], 'lotteryname' => $v['lotteryname']);
			}

			Cache:set('lotteryData', $lotteryData, 3600 * 24);
		}

		return $lotteryData;
	}

	public function getSpecialIssue($lotteryid)
	{
		$TODAY = date('Y-m-d');

	if ($lotteryid == 2) {

			$date2 = strtotime($TODAY);
			$date1 = strtotime('2012-01-31');
			$diff = (int) ($date2 - $date1) / (24 * 3600);
			$startqishu = 10076910 + ($diff * 84);
			return $startqishu;
	
		}
	}
}


?>
