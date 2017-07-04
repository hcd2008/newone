<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use app\index\org\Zqpage;
class Opencode extends Common
{
	protected $codeModel;
	protected $curIssue;
	protected $lotteryid;
	protected $kjcode = array();
	protected $DaoOrder;
	protected $DaoUser;
	protected $DaoAccount;
	private $lt_method;
	public $param;

	public function _initialize()
	{
		$this->param=$this->request->param();
		$lotteryid = $this->param['lotteryid'];

		if (!is_numeric($lotteryid)) {
			$this->error('游戏类参数错误');
		}

		$this->lotteryid = $lotteryid;

		switch ($lotteryid) {
		case 1:
			$this->codeModel = 'SscCode';
			break;

		case 2:
			$this->codeModel = 'HscCode';
			break;

		case 3:
			$this->codeModel = 'XjcCode';
			break;

		case 4:
			$this->codeModel = 'XscCode';
			break;

		case 5:
			$this->codeModel = 'SslCode';
			break;

		case 6:
			$this->codeModel = 'Sd115Code';
			break;

		case 7:
			$this->codeModel = 'Dl115Code';
			break;

		case 8:
			$this->codeModel = 'Gd115Code';
			break;

		case 9:
			$this->codeModel = 'FucaiCode';
			break;

		case 10:
			$this->codeModel = 'PlsCode';
			break;

		case 11:
			$this->codeModel = 'Cq115Code';
			break;

		case 13:
			$this->codeModel = 'LhcCode';
			break;
		}
	}

	public function setCurIssue($lotteryid)
	{
		switch ($lotteryid) {
		case 1:
			$Dao = Db::name('SscTime');
			$servertime = date('H:i:s');
			$TODAY = date('Y-m-d');
			$nowtime = date('H:i:s');

			if (strtotime('23:59:00') < strtotime($nowtime)) {
				$servertime = date('H:i:s', strtotime('00:01:00'));
				$TODAY = date('Y-m-d', strtotime('+1 day'));
			}

			$curIssueData = $Dao->where('begintime<=\'' . $servertime . '\' and endtime>=\'' . $servertime . '\'')->find();
			$this->curIssue = date('ymd', strtotime($TODAY)) . sprintf('%03d', $curIssueData['lottery_num']);
			break;

		case 2:
			$TODAY = date('Y-m-d');
			$date2 = strtotime($TODAY);
			$date1 = strtotime('2011-10-10');
			$diff = (int) ($date2 - $date1) / (24 * 3600);
			$startqishu = 10068013 + ($diff * 84);
			$servertime = date('H:i:s');
			$Dao = Db::name('HscTime');
			$curIssueData = $Dao->where('begintime<=\'' . $servertime . '\' and endtime>=\'' . $servertime . '\'')->find();
			$this->curIssue = $startqishu + $curIssueData['lottery_num'];
			break;

		case 3:
			$Dao = Db::name('XjcTime');
			$servertime = date('H:i:s');
			$TODAY = date('Y-m-d');
			$nowtime = date('H:i:s');
			$curIssueData = $Dao->where('begintime<=\'' . $servertime . '\' and endtime>=\'' . $servertime . '\'')->find();
			$this->curIssue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%03d', $curIssueData['lottery_num']);

			if (strtotime($nowtime) < strtotime('02:01:00')) {
				$this->curIssue = date('Ymd', strtotime('-1 day')) . '-' . sprintf('%03d', $curIssueData['lottery_num']);
			}

			break;

		case 4:
			$Dao = Db::name('XscTime');
			$servertime = date('H:i:s');
			$TODAY = date('Y-m-d');
			$nowtime = date('H:i:s');
			$curIssueData = $Dao->where('begintime<=\'' . $servertime . '\' and endtime>=\'' . $servertime . '\'')->find();
			$this->curIssue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%03d', $curIssueData['lottery_num']);
			break;

		case 5:
			$Dao = Db::name('SslTime');
			$servertime = date('H:i:s');
			$TODAY = date('Y-m-d');
			$nowtime = date('H:i:s');
			$curIssueData = $Dao->where('begintime<=\'' . $servertime . '\' and endtime>=\'' . $servertime . '\'')->find();
			$this->curIssue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%02d', $curIssueData['lottery_num']);
			break;

		case 6:
			$Dao = Db::name('Sd115Time');
			$servertime = date('H:i:s');
			$TODAY = date('Y-m-d');
			$nowtime = date('H:i:s');
			$curIssueData = $Dao->where('begintime<=\'' . $servertime . '\' and endtime>=\'' . $servertime . '\'')->find();
			$this->curIssue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%02d', $curIssueData['lottery_num']);
			break;

		case 7:
			$Dao = Db::name('Dl115Time');
			$servertime = date('H:i:s');
			$TODAY = date('Y-m-d');
			$nowtime = date('H:i:s');
			$curIssueData = $Dao->where('begintime<=\'' . $servertime . '\' and endtime>=\'' . $servertime . '\'')->find();
			$this->curIssue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%02d', $curIssueData['lottery_num']);
			break;

		case 8:
			$Dao = Db::name('Gd115Time');
			$servertime = date('H:i:s');
			$TODAY = date('Y-m-d');
			$nowtime = date('H:i:s');
			$curIssueData = $Dao->where('begintime<=\'' . $servertime . '\' and endtime>=\'' . $servertime . '\'')->find();
			$this->curIssue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%02d', $curIssueData['lottery_num']);
			break;

		case 9:
			$TODAY = date('Y-m-d');
			$date2 = strtotime($TODAY);
			$date1 = strtotime('01/01/2014');
			$diff = (int) ($date2 - $date1) / (24 * 3600) - 8;
			$qishu = sprintf('%03d', 1 + $diff);
			$this->curIssue = date('Y', strtotime($TODAY)) . $qishu;
			break;

		case 10:
			$TODAY = date('Y-m-d');
			$date2 = strtotime($TODAY);
			$date1 = strtotime('01/01/2014');
			$diff = (int) ($date2 - $date1) / (24 * 3600) - 8;
			$qishu = sprintf('%03d', 1 + $diff);
			$this->curIssue = date('y', strtotime($TODAY)) . $qishu;
			break;

		case 11:
			$Dao = Db::name('Cq115Time');
			$servertime = date('H:i:s');
			$TODAY = date('Y-m-d');
			$nowtime = date('H:i:s');
			$curIssueData = $Dao->where('begintime<=\'' . $servertime . '\' and endtime>=\'' . $servertime . '\'')->find();
			$this->curIssue = date('Ymd', strtotime($TODAY)) . '-' . sprintf('%02d', $curIssueData['lottery_num']);
			break;

		case 13:
			$Dao = Db::name('lhcTime');
			$servertime = date('H:i:s');
			$TODAY = date('Y-m-d');
			$nowtime = date('H:i:s');
			$curIssueData = $Dao->where('begintime<=\'' . $servertime . '\' and endtime>=\'' . $servertime . '\'')->find();
			$this->curIssue = $curIssueData['lottery_num'];
			break;
		}
	}

	public function index()
	{
		$this->assign('lotteryid', $this->lotteryid);
		$this->setCurIssue($this->param['lotteryid']);
		$this->assign('issue', $this->curIssue);
		$this->assign('addtime', date('Y-m-d H:i:s'));
		$_obfuscate_h88Wphkt7VA = $this->getOpenCode();
		$this->assign('list', $_obfuscate_h88Wphkt7VA);
		return $this->fetch();
	}

	public function liuhe()
	{
		$this->assign('lotteryid', $this->lotteryid);
		$this->setCurIssue($this->param['lotteryid']);
		$this->assign('issue', $this->curIssue);
		$this->assign('addtime', date('Y-m-d H:i:s'));
		$_obfuscate_h88Wphkt7VA = $this->getOpenCode();
		$this->assign('list', $_obfuscate_h88Wphkt7VA);
		return $this->fetch();
	}

	public function getOpenCode()
	{
		$_obfuscate_Ul2pBz4CAA = Db::name($this->codeModel);
		// import('@.ORG.ZQPage');
		$listRows = 30;
		$count = $_obfuscate_Ul2pBz4CAA->order('id desc')->count();
		$banner_web_show_tt = new Zqpage($count, $listRows);
		$page = $banner_web_show_tt->show();
		$this->assign('page', $page);
		$datacode = $_obfuscate_Ul2pBz4CAA->order('id desc')->limit($banner_web_show_tt->firstRow . ',' . $banner_web_show_tt->listRows)->select();
		$_obfuscate_7bB6Mi1CGA = array();

		foreach ($datacode as $k => $v ) {
			$v['lotteryid'] = $this->lotteryid;
			$_obfuscate_7bB6Mi1CGA[$k] = $v;
		}

		return $_obfuscate_7bB6Mi1CGA;
	}

	public function deleteCode()
	{
		$id = $this->param['items'];
		$Dao = Db::name($this->codeModel);

		if (0 < count($id)) {
			$map['id'] = array('in', $id);
			$Result = $Dao->where($map)->find();

			if (!$Result) {
				$this->error('Non-existed record!');
			}

			if ($Dao->where($map)->delete()) {
				$this->assign('jumpUrl', __URL__ / index);
				$this->success('删除数据成功');
			}
			else {
				$this->assign('jumpUrl', __URL__ / index);
				$this->error('删除数据失败');
			}
		}
		else {
			$this->assign('jumpUrl', __URL__ / index);
			$this->error('非法操作');
		}
	}

	public function addCode()
	{
		$Dao = Db::name($this->codeModel);
		$issue = trim($_POST['issue']);
		$code = trim($_POST['code']);
		$addtime = trim($_POST['addtime']);
		$sx = trim($_POST['sx']);
		$sb = trim($_POST['sb']);
		if (empty($issue) || empty($code) || empty($addtime)) {
			$this->error('期数,号码,录入时间不能为空');
		}

		if (!$this->checkCode($code)) {
			$this->error('开奖号码格式不正确');
		}

		$where['issue'] = $issue;

		if ($Dao->where($where)->find()) {
			$this->error($issue . '该期数已存在,请先删除!');
		}

		$data['issue'] = $issue;
		$data['code'] = $code;

		switch ($this->lotteryid) {
		case 9:
		case 5:
			$data['code'] = '*,*,' . $code;
			break;

		case 13:
			if (empty($sx) || empty($sb)) {
				$this->error('生肖,色波,不能为空');
			}

			$data['sb'] = $sb;
			$data['sx'] = $sx;
			break;
		}

		$data['addtime'] = $addtime;

		if ($Dao->add($data)) {
			$DaoLast = Db::name('lastissue');
			unset($data['code']);
			$DaoLast->where(array('lotteryid' => $this->lotteryid))->update($data);
			$this->assign('jumpUrl', url('admin/opencode/addCode'));
			$this->success('添加成功');
		}
		else {
			$this->error('添加失败');
		}
	}

	public function checkCode($code)
	{
		$lotteryid = $this->param['lotteryid'];

		if (!is_numeric($lotteryid)) {
			$this->error('游戏类参数错误');
		}

		$pstr = '/^\\d,\\d,\\d,\\d,\\d$/';

		switch ($lotteryid) {
		case 9:
		case 5:
			$pstr = '/^\\d,\\d,\\d$/';
			break;

		case 6:
		case 7:
		case 8:
		case 11:
			$pstr = '/^\\d{2},\\d{2},\\d{2},\\d{2},\\d{2}$/';
			break;

		case 13:
			$pstr = '/^\\d{1,2},\\d{1,2},\\d{1,2},\\d{1,2},\\d{1,2},\\d{1,2},\\d{1,2}$/';
			break;
		}

		if (preg_match($pstr, $code)) {
			return true;
		}
		else {
			return false;
		}
	}
}


?>
