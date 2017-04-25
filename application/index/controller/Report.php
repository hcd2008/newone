<?php
namespace app\index\controller;
use app\comon\controller\Base;
use think\Db;
use think\Session;
use think\Cache;
use app\cp\controller\User1;

class Report extends Base
{
	private $j_xiaofei = 0;
	private $j_fandian = 0;
	private $j_zhongjiang = 0;
	private $j_yingli = 0;
	private $j_cunkua = 0;
	private $j_chedai = 0;
	private $j_daigou = 0;
	private $j_qukua = 0;
	protected $message = 0;
	private $starttime;
	private $endtime;
	private $DaoAccount;
	private $DaoBaoBiao;
	public $param=array();
	public function _initialize(){
		$this->param=$this->request->param();
	}
	public function countFd()
	{
		$username = Session::get('un');

		if (empty($this->param['endtime'])) {
			$_obfuscate_Xif3q_HAaupN = date('Y-m-d 03:00:00');
			$endtime = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}
		else {
			$_obfuscate_Xif3q_HAaupN = $this->param['starttime'];
			$endtime = $this->param['endtime'];
		}

		// $Where['accounttype'] = array(
		// 	array('eq', 4),
		// 	array('eq', 10),
		// 	'or'
		// 	);
		$Where['accounttype']=array('in',[4,10]);
		$Where['username'] = $username;
		// $Where['addtime'] = array(
		// 	array('gt', $_obfuscate_Xif3q_HAaupN),
		// 	array('lt', $endtime),
		// 	'and'
		// 	);
		$Where['addtime']=array('between time',[$_obfuscate_Xif3q_HAaupN,$endtime]);
		$DaoAccount = Db::name('Account');
		$count = $DaoAccount->where($Where)->suDb::name('money');
		$_obfuscate_8Iu1['starttime'] = $_obfuscate_Xif3q_HAaupN;
		$_obfuscate_8Iu1['endtime'] = $endtime;
		$_obfuscate_8Iu1['username'] = $username;
		$_obfuscate_8Iu1['countFd'] = sprintf('%.2f', $count);
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function todayReport()
	{
		$username = Session::get('un');
		// import('@.Cp.User');
		$User = new User1($username);
		$allReg = $User->getRegFrom(3);
		$allReg[] = $username;
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$Where['username'] = array('in', $allReg);
		$dataTuanDui = $_obfuscate_6ogI80pkWQ->where($Where)->suDb::name('money');
		$_obfuscate_8Iu1['tuanDuiMoney'] = sprintf('%.4f', $dataTuanDui);
		$_obfuscate_8Iu1['username'] = $username;
		$_obfuscate_8Iu1['nickname'] = $User->getNickname();
		$_obfuscate_Xif3q_HAaupN = date('Y-m-d 00:00:00');
		$endtime = date('Y-m-d 00:00:00', strtotime('+1 days'));
		$Where['accounttype'] = 1;
		$Where['username'] = $username;
		// $Where['addtime'] = array(
		// 	array('gt', $_obfuscate_Xif3q_HAaupN),
		// 	array('lt', $endtime),
		// 	'and'
		// 	);
		$Where['addtime']=array('between time',[$_obfuscate_Xif3q_HAaupN,$endtime]);
		$DaoAccount = Db::name('Account');
		$countTuoZhu = $DaoAccount->where($Where)->suDb::name('money');
		$Where['accounttype'] = 9;
		$countFj = $DaoAccount->where($Where)->suDb::name('money');
		$_obfuscate_8Iu1['countTuoZhu'] = sprintf('%.4f', $countTuoZhu);
		$_obfuscate_8Iu1['countFj'] = sprintf('%.4f', $countFj);
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function reportList()
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

		$_obfuscate_8Iu1['message'] = $this->message;
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}

	public function search()
	{
		$my_search = $this->param['my_search'];

		if (empty($my_search)) {
			$my_search = array();
		}

		$condition = array_filter($my_search, 'value_filter');
		$starttime = $this->param['starttime'];
		$endtime = $this->param['endtime'];
		if (empty($starttime) && empty($endtime)) {
			$starttime = date('Y-m-d 00:00:00');
			$endtime = date('Y-m-d 03:00:00', strtotime('+1 days'));
		}

		$this->starttime = $starttime;
		$this->endtime = $endtime;
		$date1 = strtotime($starttime);
		$date2 = strtotime($endtime);
		$diff = (int) ($date2 - $date1) / (24 * 3600);

		if (31 < $diff) {
			$this->error('最多只能查询31天的数据');
		}

		// $condition['addtime'] = array(
		// 	array('egt', $starttime),
		// 	array('elt', $endtime),
		// 	'and'
		// 	);
		$condition['addtime']=array('between time',$starttime,$endtime)
		$DaoWebConfig = Db::name('Webconfig');
		$dataWeb = $DaoWebConfig->find();

		if (0 == $dataWeb['isbaobiao']) {
			$this->assign('jumpUrl', url('index/index/main'));
			$this->error('报表查询尚未开放');
		}

		$username = Session::get('un');
		$condition['username'] = $username;
		$dailiname = formatstr($this->param['dailiname']);
		$DaoUser = Db::name('User');
		$regname = array();
		$zhiJieRegname = array();

		if (!empty($dailiname)) {
			$where_dl['username'] = $dailiname;
			$data_dl = $DaoUser->where($where_dl)->find();
			$dl_reg = $data_dl['regfrom'];

			if (strpos($dl_reg, $username)) {
				$condition['username'] = $dailiname;
			}
			else {
				$this->message = 2;
				return NULL;
			}
		}

		$this->DaoBaoBiao = Db::name('Baobiao');
		$uname = $condition['username'];
		$where['regfrom'] = array('like', '%|' . $uname . '|');
		$where['addtime'] = $condition['addtime'];
		$data = $this->DaoBaoBiao->field('username')->where($where)->select();

		foreach ($data as $k => $v ) {
			$zhiJieRegname[] = $v['username'];
		}

		$where_zhijie_str = '\'' . implode('\',\'', $zhiJieRegname) . '\'';
		$sql_str = 'SELECT group_concat(distinct username) as username,`usertype` FROM `jiang_baobiao` WHERE ( (`addtime` >= \'' . $starttime . '\') AND (`addtime` <= \'' . $endtime . '\') ) AND ( `username` IN (' . $where_zhijie_str . ') )  group by username';
		$dataUser = $this->DaoBaoBiao->query($sql_str);
		$this->getSelfBaoBiao($condition);

		if ($dataUser) {
			$this->getXiaJiBaoBiao($dataUser);
		}

		$zTpl['zjJ_xiaofei'] = sprintf('%.02f', $this->j_xiaofei);
		$zTpl['zjJ_fandian'] = sprintf('%.02f', $this->j_fandian);
		$zTpl['zjJ_cunkua'] = sprintf('%.02f', $this->j_cunkua);
		$zTpl['zjJ_zhongjiang'] = sprintf('%.02f', $this->j_zhongjiang);
		$zTpl['zjJ_yingli'] = sprintf('%.02f', $this->j_yingli);
		$this->assign($zTpl);
	}

	public function isSelf($a)
	{
		if ($a == Session::get('un')) {
			return '自已';
		}
		else {
			return $a;
		}
	}

	public function getSelfBaoBiao($condition)
	{
		$data = $this->DaoBaoBiao->where($condition)->select();
		$j_xiaofei = 0;
		$j_fandian = 0;
		$j_zhongjiang = 0;
		$j_yingli = 0;
		$j_cunkua = 0;
		$j_chedai = 0;
		$j_daigou = 0;
		$j_qukua = 0;

		foreach ($data as $v ) {
			$j_xiaofei += $v['xiaofei'];
			$j_fandian += $v['fandian'];
			$j_zhongjiang += $v['zhonjiang'];
			$j_cunkua += $v['cunkuan'];
			$j_qukua += $v['qukuan'];
		}

		$j_yingli += ($j_fandian + $j_zhongjiang) - $j_xiaofei;
		$this->j_xiaofei += $j_xiaofei;
		$this->j_fandian += $j_fandian;
		$this->j_cunkua += $j_cunkua;
		$this->j_zhongjiang += $j_zhongjiang;
		$this->j_yingli += $j_yingli;
		$_obfuscate_8Iu1['selfName'] = $condition['username'];
		$_obfuscate_8Iu1['zhu'] = $this->isSelf($condition['username']);
		$_obfuscate_8Iu1['selfJ_xiaofei'] = sprintf('%.02f', $j_xiaofei);
		$_obfuscate_8Iu1['selfJ_fandian'] = sprintf('%.02f', $j_fandian);
		$_obfuscate_8Iu1['selfJ_zhongjiang'] = sprintf('%.02f', $j_zhongjiang);
		$_obfuscate_8Iu1['selfJ_yingli'] = sprintf('%.02f', $j_yingli);
		$_obfuscate_8Iu1['selfJ_cunkua'] = sprintf('%.02f', $j_cunkua);
		$_obfuscate_8Iu1['selfJ_chedai'] = $j_chedai;
		$_obfuscate_8Iu1['selfJ_daigou'] = $j_daigou;
		$_obfuscate_8Iu1['selfJ_qukua'] = $j_qukua;
		$this->assign($_obfuscate_8Iu1);
	}

	public function getXiaJiBaoBiao($dataUser)
	{
		$banner_web_show_tt = array();
		$_obfuscate_Xif3q_HAaupN = $this->starttime;
		$endtime = $this->endtime;
		$vtZXQmi8ZMwvA = array();

		foreach ($dataUser as $k => $v ) {
			$_obfuscate_v6pg2N0Khgpbew = 0;
			$_obfuscate_mguFHdlTp6aUPw = 0;
			$_obfuscate_amZkREJcH26CAfXQ1w = 0;
			$_obfuscate_g4_CFjGqyECu = 0;
			$_obfuscate_FaQCYASZFE_N = 0;
			$_obfuscate_HYEbLNy9LHxS = 0;
			$_obfuscate_FHVhfh_6WVQD = 0;
			$_obfuscate_pLPyb3ocYk0 = 0;
			$_obfuscate_CYlvcl8GT048WrEq = $v['username'];
			$usertype = $v['usertype'];
			$sql = 'select distinct username from jiang_baobiao where username=\'' . $_obfuscate_CYlvcl8GT048WrEq . '\' or regfrom like \'%|' . $_obfuscate_CYlvcl8GT048WrEq . '|%\'  and addtime>=\'' . $_obfuscate_Xif3q_HAaupN . '\' and addtime<=\'' . $endtime . '\'';
			$_obfuscate_xadKyfobJ9x4 = $this->DaoBaoBiao->query($sql);
			$_obfuscate_aSQpJghwFr4_bhw = array();

			foreach ($_obfuscate_xadKyfobJ9x4 as $v2 ) {
				$_obfuscate_aSQpJghwFr4_bhw[] = $v2['username'];
			}

			$Where['username'] = array('in', $_obfuscate_aSQpJghwFr4_bhw);
			// $Where['addtime'] = array(
			// 	array('egt', $_obfuscate_Xif3q_HAaupN),
			// 	array('elt', $endtime),
			// 	'and'
			// 	);
			$Where['addtime']=array('>=time',$_obfuscate_Xif3q_HAaupN);
			$Where['addtime']=array('<=time',$endtime);
			$dataAcc = $this->DaoBaoBiao->where($Where)->select();

			if ($dataAcc) {
				foreach ($dataAcc as $v3 ) {
					$_obfuscate_v6pg2N0Khgpbew += $v3['xiaofei'];
					$_obfuscate_mguFHdlTp6aUPw += $v3['fandian'];
					$_obfuscate_amZkREJcH26CAfXQ1w += $v3['zhonjiang'];
					$_obfuscate_g4_CFjGqyECu = ($_obfuscate_mguFHdlTp6aUPw + $_obfuscate_amZkREJcH26CAfXQ1w) - $_obfuscate_v6pg2N0Khgpbew;
					$_obfuscate_FaQCYASZFE_N += $v3['cunkuan'];
					$_obfuscate_pLPyb3ocYk0 += $v3['qukuan'];
				}
			}

			if (($_obfuscate_v6pg2N0Khgpbew != 0) || ($_obfuscate_FaQCYASZFE_N != 0) || ($_obfuscate_mguFHdlTp6aUPw != 0) || ($_obfuscate_amZkREJcH26CAfXQ1w != 0) || ($_obfuscate_g4_CFjGqyECu != 0)) {
				$banner_web_show_tt[$k]['name'] = '<a href=\'?dailiname=' . $_obfuscate_CYlvcl8GT048WrEq . '&starttime=' . $_obfuscate_Xif3q_HAaupN . '&endtime=' . $endtime . '\' target=\'_self\'>' . $_obfuscate_CYlvcl8GT048WrEq . '</a>';
				$usertype = ($usertype == 0 ? '会员' : '代理');
				$banner_web_show_tt[$k]['zhu'] = $usertype;
				$banner_web_show_tt[$k]['xiajiJ_xiaofei'] = sprintf('%.02f', $_obfuscate_v6pg2N0Khgpbew);
				$banner_web_show_tt[$k]['xiajiJ_fandian'] = sprintf('%.02f', $_obfuscate_mguFHdlTp6aUPw);
				$banner_web_show_tt[$k]['xiajiJ_zhongjiang'] = sprintf('%.02f', $_obfuscate_amZkREJcH26CAfXQ1w);
				$banner_web_show_tt[$k]['xiajiJ_yingli'] = sprintf('%.02f', $_obfuscate_g4_CFjGqyECu);
				$banner_web_show_tt[$k]['xiajiJ_cunkua'] = sprintf('%.02f', $_obfuscate_FaQCYASZFE_N);
				$banner_web_show_tt[$k]['xiajiJ_chedai'] = sprintf('%.02f', $_obfuscate_HYEbLNy9LHxS);
				$banner_web_show_tt[$k]['xiajiJ_daigou'] = sprintf('%.02f', $_obfuscate_FHVhfh_6WVQD);
				$banner_web_show_tt[$k]['xiajiJ_qukua'] = sprintf('%.02f', $_obfuscate_pLPyb3ocYk0);
				$this->j_xiaofei += $_obfuscate_v6pg2N0Khgpbew;
				$this->j_fandian += $_obfuscate_mguFHdlTp6aUPw;
				$this->j_cunkua += $_obfuscate_FaQCYASZFE_N;
				$this->j_zhongjiang += $_obfuscate_amZkREJcH26CAfXQ1w;
				$this->j_yingli += $_obfuscate_g4_CFjGqyECu;
			}
		}

		$this->assign('xiaji', $banner_web_show_tt);
		return NULL;
	}
}

ini_set('max_execution_time', 90);
echo "\t\t";

?>
