<?php

class DuoAutoAction extends Action
{
	private $isAutoDuo = false;
	private $context;
	private $sscsrc = 1;
	private $xscsrc = 1;
	private $xjcsrc = 1;
	private $Dao_Baobiao;
	private $Dao_User;

	public function _initialize()
	{
		header('Content-Type:text/html;charset=UTF-8');
		$isAutoDuo = $_GET['isAutoDuo'];

		if ($isAutoDuo == 1) {
			$this->isAutoDuo = true;
		}
	}

	public function my18()
	{
		$DaoMy18 = d('My18Auto');
		$where['Memo'] = '';
		$data = $DaoMy18->where($where)->find();

		if (empty($data)) {
			return NULL;
		}

		$u_id = $data['u_id'];
		$o_id = $data['O_id'];
		$o_time = $data['o_time'];
		$addmoney = $data['addmoney'];
		$M_name = $data['M_name'];
		$p_type = $data['p_type'];
		$H_fee = $data['H_fee'];
		$shijiChongZhi = $addmoney;

		if (!empty($H_fee)) {
			$addmoney += $H_fee;
		}

		$beizhu = '系统提示:' . $M_name . $p_type . '充值' . $addmoney . '元  订单号:' . $o_id . ' 交易时间:' . $o_time;
		$data_u18['Memo'] = '1';
		$where['o_id'] = $o_id;
		$where['M_name'] = $M_name;
		$DaoMy18->where($where)->data($data_u18)->save();
		$DaoAccount = m('Account');
		$where_a['accountnum'] = $o_id;
		$where_a['username'] = $username;
		$count = $DaoAccount->where($where_a)->count();

		if (0 < $count) {
			return NULL;
		}

		$DaoUser = m('user');
		$where_u['id'] = $u_id;
		$data_u = $DaoUser->where($where_u)->find();

		if (empty($data_u)) {
			return NULL;
		}

		$money_befor = $data_u['money'];
		$money_after = $money_befor + $addmoney;
		$username = $data_u['username'];
		$data_a['accountnum'] = $o_id;
		$data_a['addtime'] = $o_time;
		$data_a['ordernum'] = $o_id;
		$data_a['username'] = $username;
		$data_a['money'] = $addmoney;
		$data_a['money_befor'] = $money_befor;
		$data_a['money_after'] = $money_after;
		$data_a['accounttype'] = 6;
		$data_a['beizhu'] = $beizhu;
		$data_a['state'] = 0;
		$DaoAccount->add($data_a);
		$sql = 'update jiang_user set money=money+' . $addmoney . ' where id=' . $u_id;
		$DaoUser->execute($sql);
		$DaoMessage = m('message');
		$ajaxStr['type'] = 2;
		$ajaxStr['username'] = $username;
		$ajaxStr['yinkui'] = $addmoney;
		$ajaxStr['addtime'] = date('Y-m-d H:i:s');
		$DaoMessage->add($ajaxStr);

		if (c('dlfy') == 1) {
			$this->autoFanXian($username, $shijiChongZhi, $o_time);
		}

		if (c('dlfh') == 1) {
			if (c('DB_NAME') != 'jiang_msgj') {
				$this->autoFengHong($username, $shijiChongZhi, $o_time, 0);
			}
		}
	}

	public function autoFanXian($username, $addmoney, $addtime)
	{
		$czmoney = 200;
		$oneSJ = 12;
		$twoSJ = 5;

		if ($addmoney < $czmoney) {
			return NULL;
		}

		$DaoAccount = m('account');
		$cztime = date('Y-m-d H:i:s', strtotime($addtime) - 600);
		$where_one['username'] = $username;
		$where_one['addtime'] = array(
			array('lt', $cztime)
			);
		$where_one['accounttype'] = 6;
		$dataOne = $DaoAccount->where($where_one)->count();

		if (0 < $dataOne) {
			return NULL;
		}

		$DaoUser = m('User');
		$where_u['username'] = $username;
		$data_u = $DaoUser->where($where_u)->find();
		$regfrom = $data_u['regfrom'];
		$str = ltrim(rtrim($regfrom, '|'), '|');
		$regArr = split('\\|\\|', $str);
		$countreg = count($regArr);

		if ($countreg < 2) {
			return NULL;
		}

		if ($countreg == 2) {
			$dainame = $regArr[1];
			$where_u2['username'] = $username;
			$data_u2 = $DaoUser->where($where_u2)->find();

			if (empty($data_u2)) {
				return NULL;
			}

			$umoney = $data_u2['money'];
			$money_befor = $umoney;
			$money_after = $umoney + $oneSJ;
			$da['username'] = $dainame;
			$da['money'] = $oneSJ;
			$da['money_befor'] = $money_befor;
			$da['money_after'] = $money_after;
			$da['accounttype'] = 6;
			$da['ordernum'] = 'ck' . time() . rand_string(6, 1);
			$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
			$da['beizhu'] = '代理佣金:' . $username . '会员充值';
			$da['addtime'] = date('Y-m-d H:i:s');
			$da['mode'] = 1;
			$DaoAccount->add($da);
			$DaoUser->setInc('money', array('username' => $dainame), $oneSJ);
			return NULL;
		}
		else {
			$dainame1 = $regArr[$countreg - 1];
			$dainame2 = $regArr[$countreg - 2];
			$map['username'] = array(
				array('eq', $dainame1),
				array('eq', $dainame2),
				'or'
				);
			$data_umap = $DaoUser->where($map)->order('regfrom desc')->select();
			$countMap = count($data_umap);

			if ($countMap == 0) {
				return NULL;
			}

			if ($countMap == 2) {
				$da[0]['username'] = $data_umap[0]['username'];
				$da[0]['money'] = $oneSJ;
				$da[0]['money_befor'] = $data_umap[0]['money'];
				$da[0]['money_after'] = $data_umap[0]['money'] + $oneSJ;
				$da[0]['accounttype'] = 6;
				$da[0]['ordernum'] = 'ck' . time() . rand_string(6, 1);
				$da[0]['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$da[0]['beizhu'] = '代理佣金:' . $username . '会员充值';
				$da[0]['addtime'] = date('Y-m-d H:i:s');
				$da[0]['mode'] = 1;
				$da[1]['username'] = $data_umap[1]['username'];
				$da[1]['money'] = $twoSJ;
				$da[1]['money_befor'] = $data_umap[1]['money'];
				$da[1]['money_after'] = $data_umap[1]['money'] + $twoSJ;
				$da[1]['accounttype'] = 6;
				$da[1]['ordernum'] = 'ck' . time() . rand_string(6, 1);
				$da[1]['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$da[1]['beizhu'] = '代理佣金:' . $username . '会员充值';
				$da[1]['addtime'] = date('Y-m-d H:i:s');
				$da[1]['mode'] = 1;
				$DaoAccount->addAll($da);
				$DaoUser->setInc('money', array('username' => $data_umap[0]['username']), $oneSJ);
				$DaoUser->setInc('money', array('username' => $data_umap[1]['username']), $twoSJ);
				return NULL;
			}

			if ($countMap == 1) {
				$fymoey = 0;

				if ($data_umap[0]['username'] == $dainame1) {
					$fymoey = $oneSJ;
				}
				else {
					$fymoey = $twoSJ;
				}

				$da['username'] = $data_umap[0]['username'];
				$da['money'] = $fymoey;
				$da['money_befor'] = $data_umap[0]['money'];
				$da['money_after'] = $data_umap[0]['money'] + $fymoey;
				$da['accounttype'] = 6;
				$da['ordernum'] = 'ck' . time() . rand_string(6, 1);
				$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$da['beizhu'] = '代理佣金:' . $username . '会员充值';
				$da['addtime'] = date('Y-m-d H:i:s');
				$da['mode'] = 1;
				$DaoAccount->add($da);
				$DaoUser->setInc('money', array('username' => $data_umap[0]['username']), $fymoey);
				return NULL;
			}
		}
	}

	public function autoFengHong($username, $addmoney, $addtime, $type)
	{
		$czmoney = 500;
		$oneSJ = 9;
		$twoSJ = 6;
		$threeSJ = 3;
		$beizhuinfo = '代理分红:';
		$Dao_fenghong = m('fenghong');
		$where_fenghong['username'] = $username;
		$where_fenghong['type'] = $type;
		$where_fenghong['addtime'] = date('Y-m-d');

		if (c('DB_NAME') == 'jiang_dfw') {
			$czmoney = 200;
			$oneSJ = 12;
			$twoSJ = 8;
			$threeSJ = 3;
			$beizhuinfo = '代理返佣:';
			unset($where_fenghong['addtime']);
		}

		$query_fenghong = $Dao_fenghong->where($where_fenghong)->find();

		if (!empty($query_fenghong)) {
			return NULL;
		}

		if ((c('DB_NAME') == 'jiang_dfw') && ($type == 0)) {
			if ($addmoney < $czmoney) {
				return NULL;
			}

			$cztime = date('Y-m-d H:i:s', strtotime($addtime) - 600);
			$where_one['username'] = $username;
			$where_one['addtime'] = array(
				array('lt', $cztime)
				);
			$where_one['accounttype'] = 6;
			$dataOne = $DaoAccount->where($where_one)->count();

			if (0 < $dataOne) {
				return NULL;
			}
		}

		if (($type == 0) && (c('DB_NAME') == 'jiang_dfw')) {
			$DaoAccount = m('account');
			$cztime = date('Y-m-d 00:00:01');
			$where_one['username'] = $username;
			$where_one['addtime'] = array(
				array('gt', $cztime)
				);
			$where_one['accounttype'] = 6;
			$dataOne = $DaoAccount->where($where_one)->select();

			foreach ($dataOne as $v ) {
				$addmoney += $v['money'];
			}

			if ($addmoney < $czmoney) {
				return NULL;
			}
		}

		$data_fenghong['username'] = $username;
		$data_fenghong['type'] = $type;
		$data_fenghong['addtime'] = date('Y-m-d');
		$Dao_fenghong->add($data_fenghong);
		$DaoUser = m('User');
		$where_u['username'] = $username;
		$data_u = $DaoUser->where($where_u)->find();
		$regfrom = $data_u['regfrom'];
		$str = ltrim(rtrim($regfrom, '|'), '|');
		$regArr = split('\\|\\|', $str);
		$countreg = count($regArr);

		if ($countreg < 2) {
			return NULL;
		}

		if ($type == 0) {
			$info = '会员充值达到';
		}
		else if ($type == 1) {
			$info = '会员消费达到';
		}
		else if ($type == 2) {
			$info = '会员亏损达到';
		}

		$dainame1 = $regArr[$countreg - 1];
		$dainame2 = $regArr[$countreg - 2];
		$dainame3 = $regArr[$countreg - 3];
		$map['username'] = array(
			array('eq', $dainame1),
			array('eq', $dainame2),
			array('eq', $dainame3),
			'or'
			);
		$data_umap = $DaoUser->where($map)->order('regfrom desc')->select();
		$countMap = count($data_umap);

		if ($countMap == 0) {
			return NULL;
		}

		foreach ($data_umap as $v ) {
			if ($v['username'] == $dainame1) {
				$daOne['username'] = $dainame1;
				$daOne['money'] = $oneSJ;
				$daOne['money_befor'] = $v['money'];
				$daOne['money_after'] = $v['money'] + $oneSJ;
				$daOne['accounttype'] = 11;
				$daOne['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
				$daOne['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$daOne['beizhu'] = $beizhuinfo . $username . $info;
				$daOne['addtime'] = date('Y-m-d H:i:s');
				$daOne['mode'] = 1;
				$DaoAccount->add($daOne);
				$DaoUser->setInc('money', array('username' => $dainame1), $oneSJ);
			}

			if ($v['username'] == $dainame2) {
				$daOne['username'] = $dainame2;
				$daOne['money'] = $twoSJ;
				$daOne['money_befor'] = $v['money'];
				$daOne['money_after'] = $v['money'] + $twoSJ;
				$daOne['accounttype'] = 11;
				$daOne['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
				$daOne['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$daOne['beizhu'] = $beizhuinfo . $username . $info;
				$daOne['addtime'] = date('Y-m-d H:i:s');
				$daOne['mode'] = 1;
				$DaoAccount->add($daOne);
				$DaoUser->setInc('money', array('username' => $dainame2), $twoSJ);
			}

			if ($v['username'] == $dainame3) {
				$daOne['username'] = $dainame3;
				$daOne['money'] = $threeSJ;
				$daOne['money_befor'] = $v['money'];
				$daOne['money_after'] = $v['money'] + $threeSJ;
				$daOne['accounttype'] = 11;
				$daOne['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
				$daOne['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$daOne['beizhu'] = $beizhuinfo . $username . $info;
				$daOne['addtime'] = date('Y-m-d H:i:s');
				$daOne['mode'] = 1;
				$DaoAccount->add($daOne);
				$DaoUser->setInc('money', array('username' => $dainame3), $threeSJ);
			}
		}
	}

	public function czyl($username)
	{
		$DaoAccount = m('account');
		$Where['username'] = $username;
		$Where['accounttype'] = 11;
		$Where['beizhu'] = array(
			array('eq', '充值有礼')
			);

		if (0 < $DaoAccount->where($Where)->count()) {
			return NULL;
		}
		else {
			$_obfuscate_6ogI80pkWQ = m('User');
			$where_u['username'] = $username;
			$data_u = $_obfuscate_6ogI80pkWQ->where($where_u)->find();
			$usm = $data_u['money'];
			$songMoney = 100;
			$umoney = round($songMoney, 4);
			$money_befor = $usm;
			$money_after = round($umoney + $money_befor, 4);
			$da['username'] = $username;
			$da['money'] = $songMoney;
			$da['money_befor'] = $money_befor;
			$da['money_after'] = $money_after;
			$da['accounttype'] = 11;
			$da['ordernum'] = 'hd_ck' . time() . rand_string(6, 1);
			$da['accountnum'] = date('ymdhis') . rand_string(5, 2);
			$da['beizhu'] = '充值有礼';
			$da['addtime'] = date('Y-m-d H:i:s');
			$da['mode'] = 1;
			$_obfuscate_6ogI80pkWQ->setInc('money', array('username' => $username), $songMoney);
			$DaoAccount->add($da);
		}
	}

	public function getBaoBiao($username, $time)
	{
		$where['username'] = $username;
		$where['addtime'] = $time;
		$data_b = $this->Dao_Baobiao->where($where)->find();

		if (empty($data_b)) {
			$data_u = $this->Dao_User->where(array('username' => $username))->find();
			$data['username'] = $username;
			$data['regfrom'] = $data_u['regfrom'];
			$data['addtime'] = $time;
			$data['usertype'] = $data_u['usertype'];
			$this->Dao_Baobiao->data($data)->add();
			$data_b['xiaofei'] = 0;
			$data_b['fandian'] = 0;
			$data_b['zhonjiang'] = 0;
			$data_b['yingkui'] = 0;
			$data_b['qukuan'] = 0;
			$data_b['cunkuan'] = 0;
			return $data_b;
		}
		else {
			return $data_b;
		}
	}

	public function autoBaobiao()
	{
		$this->Dao_Baobiao = m('Baobiao');
		$this->Dao_User = m('User');
		$DaoAccount = m('Account');
		$Where['isbb'] = 0;
		$_obfuscate_IeXYIlxKqA = 75;
		$data_account = $DaoAccount->where($Where)->limit($_obfuscate_IeXYIlxKqA)->select();

		foreach ($data_account as $v ) {
			$data = array();
			$username = $v['username'];
			$Time = date('Y-m-d', strtotime($v['addtime']));
			$_obfuscate_AHTnNJVyWdk1Jo = $v['accounttype'];
			$Money = $v['money'];
			$id = $v['id'];
			$_obfuscate__a0M02dzyg = $this->getBaoBiao($username, $Time);

			switch ($_obfuscate_AHTnNJVyWdk1Jo) {
			case 1:
			case 2:
				$data['xiaofei'] = $_obfuscate__a0M02dzyg['xiaofei'] + 0 + $Money + 0;
				break;

			case 3:
			case 5:
				$data['xiaofei'] = ($_obfuscate__a0M02dzyg['xiaofei'] + 0) - ($Money + 0);
				break;

			case 4:
			case 10:
				$data['fandian'] = $_obfuscate__a0M02dzyg['fandian'] + 0 + $Money + 0;
				break;

			case 6:
				$data['cunkuan'] = $_obfuscate__a0M02dzyg['cunkuan'] + 0 + $Money + 0;
				break;

			case 7:
				$data['qukuan'] = $_obfuscate__a0M02dzyg['qukuan'] + 0 + $Money + 0;
				break;

			case 8:
				$data['qukuan'] = ($_obfuscate__a0M02dzyg['qukuan'] + 0) - ($Money + 0);
				break;

			case 9:
				$data['zhonjiang'] = $_obfuscate__a0M02dzyg['zhonjiang'] + 0 + $Money + 0;
				break;
			}

			if (!isset($data['fandian'])) {
				$data['fandian'] = $_obfuscate__a0M02dzyg['fandian'];
			}

			if (!isset($data['zhonjiang'])) {
				$data['zhonjiang'] = $_obfuscate__a0M02dzyg['zhonjiang'];
			}

			if (!isset($data['xiaofei'])) {
				$data['xiaofei'] = $_obfuscate__a0M02dzyg['xiaofei'];
			}

			$data['yingkui'] = ($data['fandian'] + 0 + $data['zhonjiang'] + 0) - ($data['xiaofei'] + 0);
			$_obfuscate_noJW2HiVs0['username'] = $username;
			$_obfuscate_noJW2HiVs0['addtime'] = $Time;
			$this->Dao_Baobiao->where($_obfuscate_noJW2HiVs0)->save($data);
			$_obfuscate_XdJfyHUaNUovpk['isbb'] = 1;
			$_obfuscate_XdJfyHUaNUovpk['id'] = $id;
			$DaoAccount->save($_obfuscate_XdJfyHUaNUovpk);
		}
	}

	public function index()
	{
		$this->display();
	}

	public function isopenwinauto()
	{
		$_obfuscate_NWXTrwqh5P_IVE_K = m('Webconfig');
		$data = $_obfuscate_NWXTrwqh5P_IVE_K->find();
		$isopenwinauto = $data['isopenwinauto'];
		$this->sscsrc = $data['sscsrc'];
		$this->xscsrc = $data['xscsrc'];
		$this->xjcsrc = $data['xjcsrc'];

		if ($isopenwinauto == 1) {
			return true;
		}
		else {
			return false;
		}
	}

	public function ssc()
	{
		if (!$this->isDuo(1)) {
			echo '重庆彩没有到读取时间';
			return NULL;
		}

		$sscsrc = $this->sscsrc;

		switch ($sscsrc) {
		case 1:
			$this->ssc168kai();
			break;

		case 2:
			$this->ssc500wan();
			break;

		case 3:
			$this->sscLeHe();
			break;

		case 4:
			$this->sscShiPin();
			break;

		default:
			$this->ssc500wan();
			break;
		}
	}

	public function ssc168kai()
	{
		$url = 'http://result.168kai.com/List.aspx?codes=10011';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			return NULL;
		}

		$content = ltrim(rtrim($content, '])'), '([');
		$b = json_decode($content, true);
		$issue = substr($b['cTerm'], 2, 9);
		$code = $b['cTermResult'];
		$iss120 = substr($issue, -3);

		if ($iss120 == '120') {
			$nowtime = date('H:i:s');

			if (strtotime($nowtime) < strtotime('00:10:10')) {
				$issue = date('ymd', strtotime('-1 day')) . '120';
			}

			if (strtotime('23:58:30') < strtotime($nowtime)) {
				$issue = date('ymd') . '120';
			}
		}

		$flag = $this->save($issue, $code, 'SscCode', 1);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 1;
			$data['issue'] = $issue;
			$data['str'] = '重庆彩:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 1;
			$data['issue'] = $issue;
			$data['str'] = '重庆彩:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function sscLeHe()
	{
		$url = 'http://baidu.lecai.com/lottery/draw/view/200';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			return NULL;
		}

		$ptn = '/latest_draw_result = (.*?)latest_draw_time/is';
		preg_match($ptn, $content, $abc);
		$matchstr = trim($abc[1]);
		$issue = substr($matchstr, -19, 9);
		$code = str_replace('"', '', substr($matchstr, 8, 19));
		$iss120 = substr($issue, -3);

		if ($iss120 == '120') {
			$nowtime = date('H:i:s');

			if (strtotime($nowtime) < strtotime('00:10:10')) {
				$issue = date('ymd', strtotime('-1 day')) . '120';
			}

			if (strtotime('23:58:30') < strtotime($nowtime)) {
				$issue = date('ymd') . '120';
			}
		}

		$flag = $this->save($issue, $code, 'SscCode', 1);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 1;
			$data['issue'] = $issue;
			$data['str'] = '重庆彩:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 1;
			$data['issue'] = $issue;
			$data['str'] = '重庆彩:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function _strip_tags($tags_a, $str)
	{
		foreach ($tags_a as $tag) {
			$banner_web_show_tt[] = '/(<(?:\\/' . $tag . '|' . $tag . ')[^>]*>)/i';
		}

		$return_str = preg_replace($banner_web_show_tt, '', $str);
		return $return_str;
	}

	public function ssc500wan()
	{
		$url = 'http://caipiao.163.com/award/';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			echo '读取失败1';
			return NULL;
		}

		$ptn = '/kjdt\\">重庆时时彩(.*?)详情/is';
		preg_match($ptn, $content, $abc);
		$ptn = '/#from(.*?)期/is';
		preg_match($ptn, $abc[0], $abc_issue);
		$issue = substr($abc_issue[1], 7, 9);
		$iss120 = substr($issue, -3);

		if ($iss120 == '120') {
			$nowtime = date('H:i:s');

			if (strtotime($nowtime) < strtotime('00:10:10')) {
				$issue = date('ymd', strtotime('-1 day')) . '120';
			}

			if (strtotime('23:58:30') < strtotime($nowtime)) {
				$issue = date('ymd') . '120';
			}
		}

		$ptn = '/em(.*)<\\/em>/is';
		preg_match($ptn, $abc[1], $abc_code);
		$code_arr = split('</em>', $abc_code[1]);
		$code = substr($code_arr[0], -1, 1) . ',' . substr($code_arr[1], -1, 1) . ',' . substr($code_arr[2], -1, 1) . ',' . substr($code_arr[3], -1, 1) . ',' . substr($code_arr[4], -1, 1);
		$ptn = '/^\\d{9}$/';

		if (!preg_match($ptn, $issue)) {
			echo '读取失败';
			return NULL;
		}

		$ptn = '/^\\d,\\d,\\d,\\d,\\d$/';

		if (!preg_match($ptn, $code)) {
			echo '读取失败';
			return NULL;
		}

		$flag = $this->save($issue, $code, 'SscCode', 1);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 1;
			$data['issue'] = $issue;
			$data['str'] = '重庆彩:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 1;
			$data['issue'] = $issue;
			$data['str'] = '重庆彩:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function sscCailele()
	{
		$url = 'http://kjh.cailele.com/history_cqssc.aspx';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			echo '读取失败';
			return NULL;
		}

		$ptn = '/#FFFAF3\\">(.*?)<\\/tr>/is';
		preg_match($ptn, $content, $abc);
		$ptn = '/>(\\d{9})</is';
		preg_match($ptn, $abc[1], $abc_iss);
		$issue = date('Y') . substr($abc_iss[1], 2, 4) . '-' . substr($abc_iss[1], 6, 3);
		$ptn = '/<div(.*)?<\\/div>/is';
		preg_match($ptn, $abc[1], $abc_code);
		$abc_code_split = split('</div>', $abc_code[1]);
		$code = substr($abc_code_split[0], -1) . ',' . substr($abc_code_split[1], -1) . ',' . substr($abc_code_split[2], -1) . ',' . substr($abc_code_split[3], -1) . ',' . substr($abc_code_split[4], -1);
		$flag = $this->save($issue, $code, 'SscCode', 1);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 1;
			$data['issue'] = $issue;
			$data['str'] = '重庆彩:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 1;
			$data['issue'] = $issue;
			$data['str'] = '重庆彩:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function sscShiPin()
	{
		$url = 'http://data.shishicai.cn/cqssc/haoma/';
		$CONTENT = curl_file_get_contents($url);
		$ptn = '/时时彩第(.*)?\\,开/is';
		preg_match($ptn, $CONTENT, $abc);
		$issue = substr($abc[1], 0, 12);
		$CODE = substr($abc[1], -5, 1) . ',' . substr($abc[1], -4, 1) . ',' . substr($abc[1], -3, 1) . ',' . substr($abc[1], -2, 1) . ',' . substr($abc[1], -1, 1);
		$flag = $this->save($issue, $CODE, 'SscCode', 1);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 1;
			$data['issue'] = $issue;
			$data['str'] = '重庆彩:' . $issue . ':' . $CODE;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 1;
			$data['issue'] = $issue;
			$data['str'] = '重庆彩:' . $issue . ':' . $CODE;
		}

		$_obfuscate_nT44rgz3TQ = json_encode($data);
		echo $_obfuscate_nT44rgz3TQ;
	}

	public function xjc()
	{
		if (!$this->isDuo(3)) {
			echo '新彊彩没有到读取时间';
			return NULL;
		}

		$xjcsrc = $this->xjcsrc;

		switch ($xjcsrc) {
		case 1:
			$this->xjc168kai();
			break;

		case 2:
			$this->xjcgf();
			break;

		default:
			$this->xjc168kai();
			break;
		}
	}

	public function xjcgf()
	{
		$url = 'http://www.xjflcp.com/ssc/';
		$CONTENT = curl_file_get_contents($url);
		$ptn = '/javascript:detatilssc\\(\'(.*?)<\\/tr>(.*)<\\/p>/is';
		preg_match($ptn, $CONTENT, $abc);
		$CODE = substr(trim($abc[1]), -18, 9);
		$CODE = str_ireplace(' ', ',', $CODE);
		$_obfuscate_UQ1bqvnQDg = substr(trim($abc[1]), 0, 8);
		$issue = substr(trim($abc[1]), 8, 2);
		$issue = $_obfuscate_UQ1bqvnQDg . '-' . sprintf('%03d', $issue);
		$flag = $this->save($issue, $CODE, 'XjcCode', 3);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 3;
			$data['issue'] = $issue;
			$data['str'] = '新彊彩:' . $issue . ':' . $CODE;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 3;
			$data['issue'] = $issue;
			$data['str'] = '新彊彩:' . $issue . ':' . $CODE;
		}

		$_obfuscate_nT44rgz3TQ = json_encode($data);
		echo $_obfuscate_nT44rgz3TQ;
	}

	public function xjc168kai()
	{
		$url = 'http://result.168kai.com/List.aspx?codes=10022';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			return NULL;
		}

		$content = ltrim(rtrim($content, '])'), '([');
		$b = json_decode($content, true);
		$issue = substr($b['cTerm'], 0, 8) . '-' . sprintf('%03d', substr($b['cTerm'], -2));
		$code = $b['cTermResult'];
		$flag = $this->save($issue, $code, 'XjcCode', 3);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 3;
			$data['issue'] = $issue;
			$data['str'] = '新彊彩:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 3;
			$data['issue'] = $issue;
			$data['str'] = '新彊彩:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function xsc()
	{
		if (!$this->isDuo(4)) {
			echo '江西彩没有到读取时间';
			return NULL;
		}

		$xscsrc = $this->xscsrc;

		switch ($xscsrc) {
		case 1:
			$this->xsc168kai();
			break;

		case 2:
			$this->xscLeHe();
			break;

		default:
			$this->xsc168kai();
			break;
		}
	}

	public function xscLeHe()
	{
		$url = 'http://baidu.lecai.com/lottery/draw/view/202';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			return NULL;
		}

		$ptn = '/itle>新时时彩 (.*?)新时时彩/is';
		preg_match($ptn, $content, $abc);
		$issue = substr($abc[1], 0, 8) . '-' . substr($abc[1], 8, 3);
		$code_1 = substr(trim($abc[1]), -8, 5);
		$code = substr($code_1, -5, 1) . ',' . substr($code_1, -4, 1) . ',' . substr($code_1, -3, 1) . ',' . substr($code_1, -2, 1) . ',' . substr($code_1, -1, 1);
		$flag = $this->save($issue, $code, 'XscCode', 4);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 4;
			$data['issue'] = $issue;
			$data['str'] = '江西彩:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 4;
			$data['issue'] = $issue;
			$data['str'] = '江西彩:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
		$ptn = '/currentPhaseCache = (.*?)\\;/is';
		preg_match($ptn, $content, $abc);
		$a = json_decode($abc[1], true);
		$issue1 = $a['phase'];
		$issue1 = sprintf('%d', substr($issue1, -2));
		$time_startsale_fixed = date('H:i:s', strtotime($a['time_startsale_fixed']));
		$time_endsale_fixed = date('H:i:s', strtotime($a['time_endsale_fixed']));
		$time_draw_fixed = date('H:i:s', strtotime($a['time_draw_fixed']));
		$DaoXsc = m('XscTime');
		$currIss = sprintf('%d', substr($issue, -2));
		$where_c['lottery_num'] = $currIss;
		$data_c['endtime'] = $time_startsale_fixed;
		$DaoXsc->where($where_c)->data($data_c)->save();
		$where_x['lottery_num'] = $issue1;
		$data_x['begintime'] = $time_startsale_fixed;
		$data_x['endtime'] = $time_endsale_fixed;
		$data_x['opentime'] = $time_draw_fixed;
		$where_xw['lottery_num'] = $issue1;
		$where_xw['endtime'] = $time_endsale_fixed;
		$DaoXsc->where($where_xw)->count();

		if ($DaoXsc->where($where_xw)->count() == 0) {
			$DaoXsc->where($where_x)->data($data_x)->save();
		}
	}

	public function xsc168kai()
	{
		$url = 'http://result.168kai.com/List.aspx?codes=1002';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			return NULL;
		}

		$content = ltrim(rtrim($content, '])'), '([');
		$b = json_decode($content, true);
		$issue = substr($b['cTerm'], 0, 8) . '-' . substr($b['cTerm'], -3);
		$code = $b['cTermResult'];
		$flag = $this->save($issue, $code, 'XscCode', 4);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 4;
			$data['issue'] = $issue;
			$data['str'] = '江西彩:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 4;
			$data['issue'] = $issue;
			$data['str'] = '江西彩:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
		$issue1 = $b['nTerm'];
		$issue1 = sprintf('%d', substr($issue1, -2));
		$cTermDT = $b['cTermDT'];
		$nTermDT = $b['nTermDT'];
		$time_startsale_fixed = date('H:i:s', strtotime($cTermDT . ' - 1 minute'));
		$time_endsale_fixed = date('H:i:s', strtotime($nTermDT . ' - 1 minute'));
		$time_draw_fixed = date('H:i:s', strtotime($nTermDT));
		$DaoXsc = m('XscTime');
		$currIss = sprintf('%d', substr($issue, -2));
		$where_c['lottery_num'] = $currIss;
		$data_c['endtime'] = $time_startsale_fixed;
		$DaoXsc->where($where_c)->data($data_c)->save();
		$where_x['lottery_num'] = $issue1;
		$data_x['begintime'] = $time_startsale_fixed;
		$data_x['endtime'] = $time_endsale_fixed;
		$data_x['opentime'] = $time_draw_fixed;
		$where_xw['lottery_num'] = $issue1;
		$where_xw['endtime'] = $time_endsale_fixed;
		$cdbd = $DaoXsc->where($where_xw)->count();

		if ($cdbd == 0) {
			$DaoXsc->where($where_x)->data($data_x)->save();
		}
	}

	public function sslLeHe()
	{
		if (!$this->isDuo(5)) {
			echo '时时乐没有到读取时间';
			return NULL;
		}

		$url = 'http://kj.cjcp.com.cn/ssl/';
		$content = curl_file_get_contents($url);
		$ptn = '/qihao\\">(.*?)tr/is';
		preg_match($ptn, $content, $abc);
		$issue = substr($abc[1], 0, 10);

		if (empty($issue)) {
			return NULL;
		}

		$issue = substr($issue, 0, 8) . '-' . substr($issue, -2);
		$ptn = '/value=(.*)td/is';
		preg_match($ptn, $abc[1], $abd);
		$codestr = str_ireplace('class="q_orange" />', '', $abd[1]);
		$codestr = str_ireplace('<input type="button" value=', '', $codestr);
		$codestr = str_ireplace(' ', '', $codestr);
		$codestr = str_ireplace('"', '', $codestr);
		$codestr = str_ireplace(chr(10), '', $codestr);
		$codestr = str_ireplace(chr(13), '', $codestr);

		if (empty($codestr)) {
			return NULL;
		}

		$code = '*,*,' . substr($codestr, 0, 1) . ',' . substr($codestr, 1, 1) . ',' . substr($codestr, 2, 1);
		$flag = $this->save($issue, $code, 'SslCode', 5);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 5;
			$data['issue'] = $issue;
			$data['str'] = '时时乐:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 5;
			$data['issue'] = $issue;
			$data['str'] = '时时乐:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function ssl500wan()
	{
		if (!$this->isDuo(5)) {
			echo '时时乐没有到读取时间';
			return NULL;
		}

		$url = 'http://trade.500wan.com/static/public/ssl/xml/opencode.xml';
		$CONTENT = curl_file_get_contents($url);
		$DOC = new DOMDocument();
		$DOC->loadXML($CONTENT);
		$Row = $DOC->getElementsByTagName('row');
		$issue = $Row->item(0)->attributes->item(2)->nodeValue;
		$CODE = $Row->item(0)->attributes->item(1)->nodeValue;
		$CODE = '*,*,' . substr($CODE, 0, 1) . ',' . substr($CODE, 1, 1) . ',' . substr($CODE, 2, 1);
		$flag = $this->save($issue, $CODE, 'SslCode', 5);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 5;
			$data['issue'] = $issue;
			$data['str'] = '时时乐:' . $issue . ':' . $CODE;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 5;
			$data['issue'] = $issue;
			$data['str'] = '时时乐:' . $issue . ':' . $CODE;
		}

		$_obfuscate_nT44rgz3TQ = json_encode($data);
		echo $_obfuscate_nT44rgz3TQ;
	}

	public function sd115LeHe()
	{
		if (!$this->isDuo(6)) {
			echo '山东十一选五没有到读取时间';
			return NULL;
		}

		$url = 'http://baidu.lecai.com/lottery/draw/view/20';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			return NULL;
		}

		$ptn = '/latest_draw_result = (.*?)latest_draw_time/is';
		preg_match($ptn, $content, $abc);
		$matchstr = trim($abc[1]);
		$issue = date('Y') . substr($matchstr, -16, 4) . '-' . substr($matchstr, -12, 2);
		$code = str_replace('"', '', substr($matchstr, 8, 23));
		$flag = $this->save($issue, $code, 'Sd115Code', 6);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 6;
			$data['issue'] = $issue;
			$data['str'] = '山东十一选五:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 6;
			$data['issue'] = $issue;
			$data['str'] = '山东十一选五:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function dl115LeHe()
	{
		if (!$this->isDuo(7)) {
			echo '多乐彩没有到读取时间';
			return NULL;
		}

		$url = 'http://baidu.lecai.com/lottery/draw/view/22';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			return NULL;
		}

		$ptn = '/latest_draw_result = (.*?)latest_draw_time/is';
		preg_match($ptn, $content, $abc);
		$matchstr = trim($abc[1]);
		$issue = date('Y') . substr($matchstr, -16, 4) . '-' . substr($matchstr, -12, 2);
		$code = str_replace('"', '', substr($matchstr, 8, 23));
		$flag = $this->save($issue, $code, 'Dl115Code', 7);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 7;
			$data['issue'] = $issue;
			$data['str'] = '多乐彩:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 7;
			$data['issue'] = $issue;
			$data['str'] = '多乐彩:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function gd115LeHe()
	{
		if (!$this->isDuo(8)) {
			echo '广东十一选五没有到读取时间';
			return NULL;
		}

		$url = 'http://baidu.lecai.com/lottery/draw/view/23';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			return NULL;
		}

		$ptn = '/latest_draw_result = (.*?)latest_draw_time/is';
		preg_match($ptn, $content, $abc);
		$matchstr = trim($abc[1]);
		$issue = date('Y') . substr($matchstr, -16, 4) . '-' . substr($matchstr, -12, 2);
		$code = str_replace('"', '', substr($matchstr, 8, 23));
		$flag = $this->save($issue, $code, 'Gd115Code', 8);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 8;
			$data['issue'] = $issue;
			$data['str'] = '广东十一选五:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 8;
			$data['issue'] = $issue;
			$data['str'] = '广东十一选五:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function cq115ShiPin()
	{
		if (!$this->isDuo(11)) {
			echo '重庆十一选五没有到读取时间';
			return NULL;
		}

		$url = 'http://baidu.lecai.com/lottery/draw/view/558';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			return NULL;
		}

		$ptn = '/latest_draw_result = (.*?)latest_draw_time/is';
		preg_match($ptn, $content, $abc);
		$matchstr = trim($abc[1]);
		$issue = date('Y') . substr($matchstr, -16, 4) . '-' . substr($matchstr, -12, 2);
		$code = str_replace('"', '', substr($matchstr, 8, 23));
		$flag = $this->save($issue, $code, 'Cq115Code', 11);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 11;
			$data['issue'] = $issue;
			$data['str'] = '重庆十一选五:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 11;
			$data['issue'] = $issue;
			$data['str'] = '重庆十一选五:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function plsLeHe()
	{
		if (!$this->isDuo(10)) {
			echo '排列没有到读取时间';
			return NULL;
		}

		$url = 'http://www.lecai.com/lottery/ajax_latestdrawn.php?lottery_type=4';
		$CONTENT = curl_file_get_contents($url);
		$m = json_decode($CONTENT, true);
		$issue = $m['data'][0]['phase'];
		$codeArr = $m['data'][0]['result']['result'][0]['data'];
		$CODE = implode(',', $codeArr);
		$flag = $this->save($issue, $CODE, 'plsCode', 10);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 10;
			$data['issue'] = $issue;
			$data['str'] = '排列三、五:' . $issue . ':' . $CODE;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 10;
			$data['issue'] = $issue;
			$data['str'] = '排列三、五:' . $issue . ':' . $CODE;
		}

		$_obfuscate_nT44rgz3TQ = json_encode($data);
		echo $_obfuscate_nT44rgz3TQ;
	}

	public function pls500wan()
	{
		if (!$this->isDuo(10)) {
			echo '排列没有到读取时间';
			return NULL;
		}

		$url = 'http://www.500wan.com/static/info/kaijiang/xml/plw/list10.xml';
		$CONTENT = curl_file_get_contents($url);
		$DOC = new DOMDocument();
		$DOC->loadXML($CONTENT);
		$Row = $DOC->getElementsByTagName('row');
		$issue = $Row->item(0)->attributes->item(0)->nodeValue;
		$CODE = $Row->item(0)->attributes->item(1)->nodeValue;
		$flag = $this->save($issue, $CODE, 'plsCode', 10);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 10;
			$data['issue'] = $issue;
			$data['str'] = '排列三、五:' . $issue . ':' . $CODE;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 10;
			$data['issue'] = $issue;
			$data['str'] = '排列三、五:' . $issue . ':' . $CODE;
		}

		$_obfuscate_nT44rgz3TQ = json_encode($data);
		echo $_obfuscate_nT44rgz3TQ;
	}

	public function fucaiLeHe()
	{
		if (!$this->isDuo(9)) {
			echo '福彩没有到读取时间';
			return NULL;
		}

		$url = 'http://www.lecai.com/lottery/ajax_latestdrawn.php?lottery_type=52';
		$CONTENT = curl_file_get_contents($url);
		$m = json_decode($CONTENT, true);
		$issue = $m['data'][0]['phase'];
		$codeArr = $m['data'][0]['result']['result'][0]['data'];
		$CODE = '*,*,' . implode(',', $codeArr);
		$flag = $this->save($issue, $CODE, 'fucaiCode', 9);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 9;
			$data['issue'] = $issue;
			$data['str'] = '福彩3D:' . $issue . ':' . $CODE;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 9;
			$data['issue'] = $issue;
			$data['str'] = '福彩3D:' . $issue . ':' . $CODE;
		}

		$_obfuscate_nT44rgz3TQ = json_encode($data);
		echo $_obfuscate_nT44rgz3TQ;
	}

	public function fucai500wan()
	{
		if (!$this->isDuo(9)) {
			echo '福彩没有到读取时间';
			return NULL;
		}

		$url = 'http://www.500wan.com/static/info/kaijiang/xml/sd/list10.xml';
		$CONTENT = curl_file_get_contents($url);
		$DOC = new DOMDocument();
		$DOC->loadXML($CONTENT);
		$Row = $DOC->getElementsByTagName('row');
		$issue = $Row->item(0)->attributes->item(0)->nodeValue;
		$CODE = $Row->item(0)->attributes->item(1)->nodeValue;
		$CODE = '*,*,' . $CODE;
		$flag = $this->save($issue, $CODE, 'fucaiCode', 9);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 9;
			$data['issue'] = $issue;
			$data['str'] = '福彩3D:' . $issue . ':' . $CODE;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 9;
			$data['issue'] = $issue;
			$data['str'] = '福彩3D:' . $issue . ':' . $CODE;
		}

		$_obfuscate_nT44rgz3TQ = json_encode($data);
		echo $_obfuscate_nT44rgz3TQ;
	}

	public function getSB($str)
	{
		$Uv = '';

		switch ($str) {
		case 'green':
			$Uv = '绿波';
			break;

		case 'blue':
			$Uv = '蓝波';
			break;

		case 'red':
			$Uv = '红波';
			break;
		}

		return $Uv;
	}

	public function liuhe()
	{
		if (!$this->isDuo(13)) {
			echo '六合彩没有到读取时间';
			return NULL;
		}

		$url = 'http://result.168kai.com/?code=4001';
		$content = curl_file_get_contents($url);

		if (empty($content)) {
			return NULL;
		}

		$content = ltrim(rtrim($content, '})'), '{(');
		$ptn = '/id(.*?)分/is';
		preg_match($ptn, $content, $abc);
		$lhdata = split(',', str_ireplace('\'', '', $abc[0]));
		$year_arr = split(':', $lhdata[2]);
		$year = $year_arr[1];
		$day_arr = split(':', $lhdata[3]);
		$month = substr($day_arr[1], 0, 2);
		$day = substr($day_arr[1], 5, 2);
		$time_arr = split(':', $lhdata[4]);
		$hour = substr($time_arr[1], 0, 2);
		$minute = substr($time_arr[1], 5, 2);
		$opentime = $year . '-' . $month . '-' . $day . ' ' . $hour . ':' . $minute . ':00';
		$endtime = $opentime;
		$num_arr = split(':', $lhdata[1]);
		$lottery_num = $year . $num_arr[1];
		$issue_arr = split(':', $lhdata[0]);
		$issue = $year . $issue_arr[1];
		$data_lhctime['id'] = 1;
		$data_lhctime['endtime'] = $endtime;
		$data_lhctime['opentime'] = $opentime;
		$data_lhctime['lottery_num'] = $lottery_num;
		$Dao_lhctime = m('lhcTime');
		$nowtime = date('H:i:s');

		if (strtotime('21:30:00') < strtotime($nowtime)) {
			$Dao_lhctime->save($data_lhctime);
		}

		$ptn = '/\\[(.*?)\\]/is';
		preg_match($ptn, $content, $ddc);
		$lhdataCode = split(',', str_ireplace('\'', '', $ddc[1]));
		$code = $lhdataCode[0] . ',' . $lhdataCode[3] . ',' . $lhdataCode[6] . ',' . $lhdataCode[9] . ',' . $lhdataCode[12] . ',' . $lhdataCode[15] . ',' . $lhdataCode[18];
		if (empty($lhdataCode[18]) || empty($lhdataCode[19]) || empty($lhdataCode[20])) {
			return false;
		}

		if (($lhdataCode[20] != 'red') && ($lhdataCode[20] != 'blue') && ($lhdataCode[20] != 'green')) {
			return false;
		}

		$sx = $lhdataCode[1] . ',' . $lhdataCode[4] . ',' . $lhdataCode[7] . ',' . $lhdataCode[10] . ',' . $lhdataCode[13] . ',' . $lhdataCode[16] . ',' . $lhdataCode[19];
		$sx = str_ireplace('龍', '龙', $sx);
		$sx = str_ireplace('馬', '马', $sx);
		$sx = str_ireplace('雞', '鸡', $sx);
		$sx = str_ireplace('豬', '猪', $sx);
		$sb = $this->getSB($lhdataCode[2]) . ',' . $this->getSB($lhdataCode[5]) . ',' . $this->getSB($lhdataCode[8]) . ',' . $this->getSB($lhdataCode[11]) . ',' . $this->getSB($lhdataCode[14]) . ',' . $this->getSB($lhdataCode[17]) . ',' . $this->getSB($lhdataCode[20]);
		$flag = $this->save($issue, $code, 'lhcCode', 1, $sx, $sb);

		if ($flag) {
			$data['flag'] = true;
			$data['lotteryid'] = 13;
			$data['issue'] = $issue;
			$data['str'] = '六合彩:' . $issue . ':' . $code;
		}
		else {
			$data['flag'] = false;
			$data['lotteryid'] = 13;
			$data['issue'] = $issue;
			$data['str'] = '六合彩:' . $issue . ':' . $code;
		}

		$ajaxStr = json_encode($data);
		echo $ajaxStr;
	}

	public function save($issue, $code, $codeModelName, $lotteryid, $sx, $sb)
	{
		if (empty($issue) || empty($code)) {
			echo '由于网络原因读取失败,请重新读取!';
			exit();
		}

		$DaoCode = m($codeModelName);
		$DaoLast = m('lastissue');
		$where['issue'] = $issue;

		if (!$DaoCode->where($where)->find()) {
			$data['issue'] = $issue;
			$data['code'] = $code;
			$data['addtime'] = date('Y-m-d H:i:s');

			if ($codeModelName == 'lhcCode') {
				$data['sx'] = $sx;
				$data['sb'] = $sb;
			}

			if ($DaoCode->data($data)->add()) {
				unset($data['code']);
				$DaoLast->where(array('lotteryid' => $lotteryid))->data($data)->save();
				return true;
			}
		}
		else {
			$DaoOrder = m('Order');
			$where['state'] = 0;
			$where['lotteryid'] = $lotteryid;

			if ($DaoOrder->where($where)->limit(1)->find()) {
				return true;
			}
		}

		return false;
	}

	public function isDuo($lotteryid)
	{
		if (!$this->isAutoDuo) {
			return true;
		}

		$isopenwinauto = $this->isopenwinauto();
		if ($this->isAutoDuo && !$isopenwinauto) {
			echo '自动开奖已关闭';
			exit();
		}

		$nowtime = date('H:i:s');
		$_obfuscate_02Uej09wSU_6 = (int) date('i');

		switch ($lotteryid) {
		case 1:
			if ((strtotime('02:10:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('09:57:00'))) {
				return false;
			}

			break;

		case 2:
			if ((strtotime('00:05:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('08:00:00'))) {
				return false;
			}
			else {
				$_obfuscate_I7VxFySPloY = $_obfuscate_02Uej09wSU_6 % 10;
				if ((3 <= $_obfuscate_I7VxFySPloY) && ($_obfuscate_I7VxFySPloY != 9)) {
					return false;
				}
			}

			break;

		case 3:
			if ((strtotime('02:10:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('09:57:00'))) {
				return false;
			}
			else {
				$_obfuscate_I7VxFySPloY = $_obfuscate_02Uej09wSU_6 % 10;

				if (6 <= $_obfuscate_I7VxFySPloY) {
					return false;
				}
			}

			break;

		case 4:
			if ((strtotime('09:09:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('23:40:00'))) {
			}
			else {
				return false;
			}

			break;

		case 5:
			if ((strtotime('10:30:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('23:40:00'))) {
				$_obfuscate_I7VxFySPloY = $_obfuscate_02Uej09wSU_6 % 30;

				if (5 <= $_obfuscate_I7VxFySPloY) {
					return false;
				}
			}
			else {
				return false;
			}

			break;

		case 6:
			if ((strtotime('09:00:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('23:00:00'))) {
			}
			else {
				return false;
			}

			break;

		case 7:
			if ((strtotime('09:00:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('23:00:00'))) {
			}
			else {
				return false;
			}

			break;

		case 8:
			if ((strtotime('09:00:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('23:30:00'))) {
				return true;
			}
			else {
				return false;
			}

			break;

		case 9:
			if ((strtotime('20:30:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('22:20:00'))) {
				return true;
			}
			else {
				return false;
			}

			break;

		case 10:
			if ((strtotime('20:30:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('23:20:00'))) {
				return true;
			}
			else {
				return false;
			}

			break;

		case 11:
			if ((strtotime('08:59:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('23:35:00'))) {
				return true;
			}
			else {
				return false;
			}

			break;

		case 13:
			if ((strtotime('08:30:00') < strtotime($nowtime)) && (strtotime($nowtime) < strtotime('23:35:00'))) {
				return true;
			}
			else {
				return false;
			}

			break;
		}

		return true;
	}
}

define('JiangThinkDB', true);

?>
