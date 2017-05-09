<?php
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;
use think\Session;
use app\index\org\Zqpage;
use app\cp\controller\User1;

class Users extends Base
{
	protected $ratemin = 0;
	protected $ratemax = 0;
	protected $rateid = 0;
	protected $keepdinwei = 0;
	protected $keepdinwei2 = 0;
	protected $keepbudinwei = 0;
	protected $rate_1 = 0;
	protected $rate_2 = 0;
	protected $condition = array();
	protected $search = array();
	protected $condpara = '';
	protected $userContentList = array();
	protected $usersDaoHang;
	protected $jfauto_isopen = 0;
	protected $jffixed_isopen = 0;
	protected $jf1700_isopen = 0;
	protected $jf1800_isopen = 0;
	protected $jf1900_isopen = 0;
	protected $modeNum = 1;

	public function _initialize()
	{
		$this->doFdFw();
		$this->param=$this->request->param();
	}

	public function index()
	{
		if ($this->ratemax < $this->keepdinwei) {
			$_obfuscate_8Iu1['keepdinwei'] = $this->ratemax;
		}
		else {
			$_obfuscate_8Iu1['keepdinwei'] = $this->keepdinwei;
		}

		if ($this->ratemax < $this->keepdinwei2) {
			$_obfuscate_8Iu1['keepdinwei2'] = $this->ratemax;
		}
		else {
			$_obfuscate_8Iu1['keepdinwei2'] = $this->keepdinwei2;
		}

		$_obfuscate_8Iu1['keepbudinwei'] = $this->keepbudinwei;
		$_obfuscate_xaufKH_ = Db::name('Webconfig');
		$dataWeb = $_obfuscate_xaufKH_->field('webname,isreg')->find();
		$this->assign('isreg', $dataWeb['isreg']);

		if ('1' == $dataWeb['isreg']) {
			$username = Session::get('un');
			$_obfuscate_6ogI80pkWQ = Db::name('User');
			$Where['username'] = $username;
			$data_u = $_obfuscate_6ogI80pkWQ->where($Where)->find();
			$uid = $data_u['id'];
			$domain = $_SERVER['HTTP_HOST'];
			$url = url('login/reg', array('id' => $uid));
			// $url = 'http://' . $domain . $url;
			$this->assign('url', $url);
		}

		$_obfuscate_8Iu1['jfauto_isopen'] = $this->jfauto_isopen;
		$_obfuscate_8Iu1['jffixed_isopen'] = $this->jffixed_isopen;
		$_obfuscate_8Iu1['jf1700_isopen'] = $this->jf1700_isopen;
		$_obfuscate_8Iu1['jf1800_isopen'] = $this->jf1800_isopen;
		$_obfuscate_8Iu1['jf1900_isopen'] = $this->jf1900_isopen;
		$_obfuscate_8Iu1['modeNum'] = $this->modeNum;
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function addUser()
	{
		$DaoUser = Db::name('User');
		$data = $this->param;
		isset($data['username']) or $data['username']='';
		$data['username'] = strtolower($data['username']);
		$jffixed = (empty($this->param['jffixed']) ? 0 : 1);
		$jfauto = (empty($this->param['jfauto']) ? 0 : 1);
		$jf1900 = (empty($this->param['jf1900']) ? 0 : 1);
		$jf1800 = (empty($this->param['jf1800']) ? 0 : 1);
		$jf1700 = (empty($this->param['jf1700']) ? 0 : 1);
		if (empty($jffixed) && empty($jfauto)) {
			$this->error('自由调节 或 固定奖金，至少选择一种奖金模式');
		}

		if (!empty($jffixed) && empty($jf1900) && empty($jf1800) && empty($jf1700)) {
			$this->error('开通固定奖金模式至少选择一种奖金模式');
		}

		if (empty($jffixed)) {
			$mode = '0,0,0,' . $jfauto;
		}
		else {
			$mode = $jf1700 . ',' . $jf1800 . ',' . $jf1900 . ',' . $jfauto;
		}

		$currentmode = '';

		if (!empty($jfauto)) {
			$currentmode = '4';
		}
		else if (!empty($jf1900)) {
			$currentmode = '3';
		}
		else if (!empty($jf1800)) {
			$currentmode = '2';
		}
		else if (!empty($jf1700)) {
			$currentmode = '1';
		}

		if (!$data) {
			$this->error($DaoUser->getError());
		}

		$dinwei = $this->param['dinwei'];
		$dinwei2 = $this->param['dinwei2'];

		if (empty($dinwei2)) {
			$dinwei2 = 0;
		}

		if (!is_numeric($dinwei) || !is_numeric($dinwei2)) {
			$this->error('返点设置错误，请检查');
		}

		if (($this->ratemax < $dinwei) || ($this->ratemax < $dinwei2)) {
			$this->error('返点超过系统最大返点值:' . $this->ratemax . '% 请检查!');
			return false;
		}

		if (($this->keepdinwei < $dinwei) || ($dinwei < 0)) {
			$this->error('时时彩返点设置错误，请检查');
			return false;
		}

		if (($this->keepdinwei2 < $dinwei2) || ($dinwei2 < 0)) {
			$this->error('福彩/排列/11选5返点设置错误，请检查');
			return false;
		}

		if ((round($dinwei * 100) % 10) != 0) {
			$this->error('返点只能为0.1的倍数');
			return false;
		}

		if ((round($dinwei2 * 100) % 10) != 0) {
		}

		if (!empty($jf1900) && ($jf1900 == 1)) {
			if ($dinwei < 5) {
				$this->error('开启固定1900模式,返点最少为5%');
				return false;
			}
		}

		$username = trim(Session::get('un'));
		$DaoUser = Db::name('User');
		$where['username'] = $username;
		$dataUser = $DaoUser->where($where)->find();
		$usertype = $dataUser['usertype'];

		if ('1' != $usertype) {
			$this->error('你不是代理用户');
		}

		if ('0' == $dataUser['state']) {
			$this->error('你已被冻结');
		}

		$regfrom = $dataUser['regfrom'];
		$data['usertype'] = ($this->param['usertype'] == '1' ? 1 : 0);
		$data['rate_1'] = $dinwei;
		$data['rate_2'] = $dinwei2;
		$data['regfrom'] = $regfrom . '|' . $username . '|';
		$data['addtime'] = date('Y-m-d H:i:s');
		$data['mode'] = $mode;
		$data['currentmode'] = $currentmode;
		$where_reg['username'] = $username;
		$DaoUser->setInc('regcount', $where_reg);

		if ($DaoUser->insert($data)) {
			$this->success('添加会员成功!');
		}
		else {
			$this->error('操作失败!');
		}
	}

	public function doFdFw()
	{
		$DaoWebConfig = Db::name('Webconfig');
		$dataWebConfig = $DaoWebConfig->find();
		$this->ratemin = $dataWebConfig['ratemin'];
		$this->ratemax = $dataWebConfig['ratemax'];
		$this->rateid = $dataWebConfig['rateid'];
		$username = Session::get('un');
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$Where['username'] = $username;
		$dataUser = $_obfuscate_6ogI80pkWQ->where($Where)->find();
		$rate_1 = $dataUser['rate_1'];
		$rate_2 = $dataUser['rate_2'];
		$this->rate_1 = $rate_1;
		$this->rate_2 = $rate_2;
		$this->keepdinwei = $rate_1 - $this->rateid;
		// $this->keepdinwei2 = $rate_2 - $this->rateid2;
		$_obfuscate_eNV52sLcOA = explode(',', $dataUser['mode']);

		if (empty($dataUser['mode'])) {
			$this->jfauto_isopen = 1;
		}
		else {
			$this->jf1700_isopen = $_obfuscate_eNV52sLcOA[0];
			$this->jf1800_isopen = $_obfuscate_eNV52sLcOA[1];
			$this->jf1900_isopen = $_obfuscate_eNV52sLcOA[2];
			$this->jfauto_isopen = $_obfuscate_eNV52sLcOA[3];
		}

		if (($this->jf1700_isopen == 1) || ($this->jf1800_isopen == 1) || ($this->jf1900_isopen == 1)) {
			$this->jffixed_isopen = 1;
		}

		if ((($this->jf1700_isopen == 1) || ($this->jf1800_isopen == 1) || ($this->jf1900_isopen == 1)) && ($this->jfauto_isopen == 1)) {
			$this->modeNum = 2;
		}
		else {
			$this->modeNum = 1;
		}
	}

	public function userlistFrame()
	{
		$Frame = isset($this->param['frame'])?$this->param['frame']:'';
		return $this->fetch();
	}

	public function userlistMenu()
	{
		$uid = isset($this->param['uid'])?$this->param['uid']:'';
		$DaoUser = Db::name('user');
		if (!empty($uid) && is_numeric($uid)) {
			$where['id'] = $uid;
			$data_u = $DaoUser->where($where)->find();
			$username = $data_u['username'];
			$where_zhijiexiaji['regfrom'] = array('like', '%|' . $username . '|');
			$regnamedata = $DaoUser->field('id,username,regcount')->where($where_zhijiexiaji)->order('regcount desc')->select();
			$ajaxStr = array();
			$regnamelist = array();

			foreach ($regnamedata as $k => $v ) {
				$regnamelist[$k]['username'] = $v['username'];
				$regnamelist[$k]['userid'] = $v['id'];
				$regnamelist[$k]['childcount'] = $v['regcount'];
			}

			$ajaxStr['error'] = '0';
			$ajaxStr['result'] = $regnamelist;
			echo json_encode($ajaxStr);
			return false;
		}

		$username = Session::get('un');
		$where_zhijiexiaji['regfrom'] = array('like', '%|' . $username . '|');
		$regnamedata = $DaoUser->field('id,username,regcount')->order('regcount desc')->where($where_zhijiexiaji)->select();
		$regnamelist = array();

		foreach ($regnamedata as $k => $v ) {
			$regnamelist[$k]['id'] = $v['id'];
			$regnamelist[$k]['username'] = $v['username'];
			$regnamelist[$k]['count'] = $v['regcount'];
		}

		$this->assign('regnamelist', $regnamelist);
		return $this->fetch();
	}

	public function userlistContent()
	{
		$this->search();
		$this->assign('userContentList', $this->userContentList);
		$this->assign('usersDaoHang', $this->usersDaoHang);
		return $this->fetch();
	}

	public function editUser()
	{
		$username = formatstr($this->param['username']);
		$a8s = Session::get('un');
		$Dao = Db::name('User');
		$_obfuscate_8Iu1['username'] = $username;
		$_obfuscate_8Iu1['keepdinwei'] = $this->keepdinwei;
		$_obfuscate_8Iu1['keepdinwei2'] = $this->keepdinwei2;
		$_obfuscate_8Iu1['keepbudinwei'] = $this->keepbudinwei;
		$Where['username'] = $username;
		$dataUser = $Dao->where($Where)->find();
		$_obfuscate_G05WkR3GAA = $dataUser['regfrom'];

		if (!preg_match('/\\|' . $a8s . '\\|/i', $_obfuscate_G05WkR3GAA)) {
			$this->error('该会员不是您的下级!');
		}

		$_obfuscate_8Iu1['dinwei'] = $dataUser['rate_1'];
		$_obfuscate_8Iu1['dinwei2'] = $dataUser['rate_2'];
		$_obfuscate_8Iu1['budinwei'] = $dataUser['rate_2'];
		$_obfuscate_8Iu1['nickname'] = $dataUser['nickname'];
		$_obfuscate_8Iu1['usertype'] = $dataUser['usertype'];
		$mode = $dataUser['mode'];
		$_obfuscate_eNV52sLcOA = explode(',', $mode);
		$_obfuscate_8Iu1['jf1700'] = ($_obfuscate_eNV52sLcOA[0] == 1 ? 'checked' : '');
		$_obfuscate_8Iu1['jf1800'] = ($_obfuscate_eNV52sLcOA[1] == 1 ? 'checked' : '');
		$_obfuscate_8Iu1['jf1900'] = ($_obfuscate_eNV52sLcOA[2] == 1 ? 'checked' : '');
		$_obfuscate_8Iu1['jfauto'] = ($_obfuscate_eNV52sLcOA[3] == 1 ? 'checked' : '');
		if (($_obfuscate_eNV52sLcOA[0] == 1) || ($_obfuscate_eNV52sLcOA[1] == 1) || ($_obfuscate_eNV52sLcOA[2] == 1)) {
			$_obfuscate_8Iu1['jffixed'] = 'checked';
		}else{
			$_obfuscate_8Iu1['jffixed'] = '';
		}

		$_obfuscate_8Iu1['jfauto_isopen'] = $this->jfauto_isopen;
		$_obfuscate_8Iu1['jffixed_isopen'] = $this->jffixed_isopen;
		$_obfuscate_8Iu1['jf1700_isopen'] = $this->jf1700_isopen;
		$_obfuscate_8Iu1['jf1800_isopen'] = $this->jf1800_isopen;
		$_obfuscate_8Iu1['jf1900_isopen'] = $this->jf1900_isopen;
		$_obfuscate_8Iu1['modeNum'] = $this->modeNum;
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function updateUser()
	{
		$username = formatstr($this->param['username']);
		$usertype = $this->param['usertype'];
		$Dao = Db::name('User');
		$un = Session::get('un');
		$where_u['username'] = $username;
		$dataUser = $Dao->where($where_u)->find();
		$regfrom = $dataUser['regfrom'];

		if (!preg_match('/\\|' . $un . '\\|/i', $regfrom)) {
			$this->error('你无权修改该用户!');
		}

		$jffixed = (empty($this->param['jffixed']) ? 0 : 1);
		$jfauto = (empty($this->param['jfauto']) ? 0 : 1);
		$jf1900 = (empty($this->param['jf1900']) ? 0 : 1);
		$jf1800 = (empty($this->param['jf1800']) ? 0 : 1);
		$jf1700 = (empty($this->param['jf1700']) ? 0 : 1);
		if (empty($jffixed) && empty($jfauto)) {
			$this->error('自由调节 或 固定奖金，至少选择一种奖金模式');
		}

		if (!empty($jffixed) && empty($jf1900) && empty($jf1800) && empty($jf1700)) {
			$this->error('开通固定奖金模式至少选择一种奖金模式');
		}

		if (empty($jffixed)) {
			$mode = '0,0,0,' . $jfauto;
		}
		else {
			$mode = $jf1700 . ',' . $jf1800 . ',' . $jf1900 . ',' . $jfauto;
		}

		$currentmode = '';

		if (!empty($jfauto)) {
			$currentmode = '4';
		}
		else if (!empty($jf1900)) {
			$currentmode = '3';
		}
		else if (!empty($jf1800)) {
			$currentmode = '2';
		}
		else if (!empty($jf1700)) {
			$currentmode = '1';
		}

		$dinwei = $this->param['dinwei'];
		$dinwei2 = $this->param['dinwei2'];

		if (!is_numeric($dinwei)) {
			$this->error('返点设置错误，请检查');
		}

		if (($this->ratemax < $dinwei) || ($this->ratemax < $dinwei2)) {
			$this->error('返点超过系统最大返点值:' . $this->ratemax . '% 请检查!');
			return false;
		}

		if (($this->keepdinwei < $dinwei) || ($dinwei < 0)) {
			$this->error('时时彩返点设置错误，请检查');
			return false;
		}

		if (($this->keepdinwei2 < $dinwei2) || ($dinwei2 < 0)) {
			$this->error('福彩/排列/11选5返点设置错误，请检查');
			return false;
		}

		if ((round($dinwei * 100) % 10) != 0) {
			$this->error('返点只能为0.1的倍数');
			return false;
		}

		if (!empty($jf1900) && ($jf1900 == 1)) {
			if ($dinwei < 5) {
				$this->error('开启固定1900模式,返点最少为5%');
				return false;
			}
		}

		if (($dinwei < $dataUser['rate_1']) || ($dinwei2 < $dataUser['rate_2'])) {
			$this->error('返点只能升不能降!');
			return false;
		}

		$where['id'] = $dataUser['id'];
		$where['rate_1'] = $dinwei;
		$where['rate_2'] = $dinwei2;
		$where['mode'] = $mode;
		$where['usertype'] = $usertype;
		$where['currentmode'] = $currentmode;

		if ($Dao->update($where)) {
			$this->success('修改成功!');
		}
		else {
			$this->error('操作失败!');
		}
	}

	public function getTuanDuiMoney()
	{
		$uid = $this->param['uid'];

		if (!is_numeric($uid)) {
			return false;
		}

		$_obfuscate_nT44rgz3TQ = array();
		// import('@.Cp.User');
		$User = new User1(Session::get('un'));
		$dailiusername = $User->getUserNameById($uid);

		if (!$User->isRegFanWei($dailiusername)) {
			$_obfuscate_nT44rgz3TQ['error'] = 'error';
		}
		else {
			$User = new User1($dailiusername);
			$allReg = $User->getRegFrom(3);
			$allReg[] = $dailiusername;
			$_obfuscate_6ogI80pkWQ = Db::name('User');
			$Where['username'] = array('in', $allReg);
			$dataTuanDui = $_obfuscate_6ogI80pkWQ->where($Where)->sum('money');
			$_obfuscate_nT44rgz3TQ['error'] = '0';
			$_obfuscate_nT44rgz3TQ['result'] = $dataTuanDui;
		}

		echo json_encode($_obfuscate_nT44rgz3TQ);
	}

	public function search()
	{
		$uid = isset($this->param['uid'])?$this->param['uid']:'';
		$DaoUser = Db::name('User');
		$where_u['id'] = $uid;
		$my_search = isset($this->param['my_search'])?$this->param['my_search']:'';

		if (empty($my_search)) {
			$my_search = array();
		}

		$this->condition = array_filter($my_search, 'value_filter');
		$bank_min = isset($this->param['bank_min'])?$this->param['bank_min']:'';
		$bank_max = isset($this->param['bank_max'])?$this->param['bank_max']:'';
		if (!empty($bank_min) && !empty($bank_max) && is_numeric($bank_min) && is_numeric($bank_max)) {
			// $this->condition['money'] = array(
			// 	array('gt', $bank_min),
			// 	array('lt', $bank_max),
			// 	'and'
			// 	);
			$this->condition['money']=array('between',[$bank_min,$bank_max]);
		}

		$username = isset($this->param['username'])?$this->param['username']:'';
		if (empty($username) && empty($uid)) {
			$username = Session::get('un');
		}

		if (!empty($uid)) {
			$data_u = $DaoUser->where($where_u)->find();
			$username = $data_u['username'];
		}

		$where_ur['username'] = $username;
		$data_u = $DaoUser->where($where_ur)->find();
		$regfrom = $data_u['regfrom'];
		$un = Session::get('un');
		if (!preg_match('/\\|' . $un . '\\|/i', $regfrom) && ($un != $username)) {
			$this->error('该会员不是您的下级!');
		}
		$where['regfrom'] = array('like', '%|' . $username . '|');
		$where['username'] = $username;
		$where['_logic'] = 'or';
		// $this->condition['_complex'] = $where;
		$this->condition['regfrom']=array('like', '%|' . $username . '|');
		$this->condition['username']=$username;
		// $this->condition['_logic']
		$this->condition['username'] = array('neq', Session::get('un'));
		$sortby = isset($this->param['sortby'])?$this->param['sortby']:'';
		isset($this->param['sortbymax']) or $this->param['sortbymax']='';
		$sortbymax = ($this->param['sortbymax'] == '1' ? 'desc' : 'asc');
		$online = isset($this->param['online'])?$this->param['online']:'';

		if ($online == '1') {
			$onlinetime = date('Y-m-d H:i:s', strtotime('-10 minute'));
			$this->condition['onlinetime'] = array('gt', $onlinetime);
		}

		$orderStr = '';

		switch ($sortby) {
		case 'default':
			$orderStr = 'money desc';
			break;

		case 'bank':
			$orderStr = 'money ' . $sortbymax;
			break;

		case 'username':
			$orderStr = 'username ' . $sortbymax;
			break;

		default:
			break;
		}

		//import('@.ORG.ZQPage');
		$listRows = 30;
		$count = $DaoUser->where($this->condition)->count();
		$p = new Zqpage($count, $listRows);
		// print_r($this->condition);exit;
		$dataUser = $DaoUser->where($this->condition)->order($orderStr)->limit($p->firstRow . ',' . $p->listRows)->select();
		$page = $p->show();
		$this->assign('page', $page);
		$this->formatUserContentList($dataUser, $username);
	}

	public function formatUserContentList($dataUser, $selfname)
	{
		$username = Session::get('un');
		$_obfuscate_HRqqvqkOhA = 0;
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$_obfuscate_tBEK2GK4GUs = $_obfuscate_6ogI80pkWQ->where(array('username' => $username))->find();
		$_obfuscate_HRqqvqkOhA = $this->getRegFuHaoCount($_obfuscate_tBEK2GK4GUs['regfrom']);
		$formContentList = array();
		$onlinetime = date('Y-m-d H:i:s', strtotime('-10 minute'));

		foreach ($dataUser as $_obfuscate_Vwty => $v ) {
			if ($v['username'] == $selfname) {
				$v['self'] = '1';
				preg_match('/\\|' . $username . '\\|\\|(.*)\\|/', $v['regfrom'], $m);
				$this->usersDaoHang = str_replace('||', '  >  ', $m[1]) . '  >  ' . $selfname;
			}

			$v['jibie'] = $this->getRegFuHaoCount($v['regfrom']) - $_obfuscate_HRqqvqkOhA;
			$v['money'] = sprintf('%.3f', $v['money']);
			$v['usertype'] = ($v['usertype'] == '1' ? '代理' : '会员');

			if (strtotime($onlinetime) < strtotime($v['onlinetime'])) {
				$v['online'] = '在线';
			}
			else {
				$v['online'] = '<font color=red>离线</font>';
			}

			$formContentList[$_obfuscate_Vwty] = $v;
		}
		$this->userContentList = $formContentList;
	}

	public function getRegFuHaoCount($regfrom)
	{
		if (empty($regfrom)) {
			return 0;
		}

		$regfrom = preg_replace('/^[^|]$/', '', $regfrom);
		$count = count(explode('\\|\\|', $regfrom));
		return $count;
	}

	public function reportList()
	{
		return $this->fetch();
	}

	public function jrxkhy()
	{
		$username = Session::get('un');
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$where_u['username'] = $username;
		$data_u = $_obfuscate_6ogI80pkWQ->where($where_u)->find();

		if ($data_u['usertype'] != 1) {
			return NULL;
		}

		$condition['regfrom'] = array('like', '%|' . $username . '|%');
		$condition['addtime'] = array('gt', date('Y-m-d 00:00:01'));
		$online = isset($this->param['online'])?$this->param['online']:'';
		$chongzhi = isset($this->param['chongzhi'])?$this->param['chongzhi']:'';
		$_obfuscate_rgvoBz8 = isset($this->param['ymoney'])?$this->param['ymoney']:'';

		if ($online == '1') {
			$onlinetime = date('Y-m-d H:i:s', strtotime('-10 minute'));
			$condition['onlinetime'] = array('gt', $onlinetime);
		}

		if ($_obfuscate_rgvoBz8 == '1') {
			$condition['money'] = array('gt', 0);
		}
		$dataUser = $_obfuscate_6ogI80pkWQ->where($condition)->select();
		$this->formatUserContentList($dataUser, $username);
		$this->assign('userContentList', $this->userContentList);

		return $this->fetch();
	}
}


?>
