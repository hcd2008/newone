<?php

class WinautoAction extends Action
{
	protected $codeModel;
	protected $lotteryid;
	protected $kjcode = array();
	protected $TM;
	protected $SB;
	protected $SX;
	protected $DaoOrder;
	protected $DaoUser;
	protected $DaoAccount;
	protected $DaoBaobiao;
	protected $DaoFHXF;
	protected $Dao_fenghong;
	protected $DaoMethod;
	protected $DaoMessage;
	private $lt_method;
	private $issue;
	private $isAuto = false;
	private $fool = array();
	private $data = array(5, 4, 3, 2, 1);
	private $result = array();
	private $dlName = array();
	private $dlNameMoney = array();
	private $dataAcc = array();
	private $bbName = array();
	private $bbNameMoney = array();
	private $ssc_zus_prize;
	private $ssc_zul_prize;
	private $sy115_zus_prize;
	private $sy115_zul_prize;

	public function com($n, $k, $mem, $depth, $begin, $pos)
	{
		if ($k == $depth) {
			$this->result[] = $mem;
			return NULL;
		}

		for ($dos_skipping = $pos; $dos_skipping < $n; $dos_skipping++) {
			if (!$this->foot[i]) {
				$_obfuscate_vhwwAA[$dos_skipping] = true;
				$mem[$begin] = $this->data[$dos_skipping];
				$this->com($n, $k, $mem, $depth + 1, $begin + 1, $dos_skipping + 1);
				$this->foot[$dos_skipping] = false;
			}
		}
	}

	public function _initialize($l = 0, $i = 0, $auto = 0)
	{
		if ($l == 0) {
			$lotteryid = $_REQUEST['lotteryid'];
		}
		else {
			$lotteryid = $l;
		}

		if (!is_numeric($lotteryid)) {
			return NULL;
		}

		$this->lotteryid = $lotteryid;

		if ($i == 0) {
			$this->issue = $_GET['issue'];
		}
		else {
			$this->issue = $i;
		}

		if ($auto == 0) {
			$auto = $_REQUEST['auto'];

			if (empty($auto)) {
				$this->isAuto = false;
			}
			else {
				$this->isAuto = true;
			}
		}
		else {
			$this->isAuto = true;
		}

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

	public function index()
	{
		return NULL;
		$str = '||admin||abc||abc2||123456|||||||';
		echo $str = ltrim(rtrim($str, '|'), '|');
		$m = split('\\|\\|', $str);
		dump($m);
	}

	public function setLtMethod()
	{
		$this->lt_method = array(13 => 'lhd', 89 => 'lhd', 127 => 'lhd', 1213 => 'lhd', 14 => 'qZX3', 15 => 'qZXHZ', 16 => 'hZX3', 17 => 'hZXHZ', 18 => 'qZUS', 19 => 'qZUL', 20 => 'qHHZX', 21 => 'qZUHZ', 22 => 'hZUS', 23 => 'hZUL', 24 => 'hHHZX', 25 => 'hZUHZ', 26 => 'BDW1', 27 => 'BDW2', 28 => 'qZX2', 30 => 'qZU2', 29 => 'hZX2', 31 => 'hZU2', 32 => 'DWD', 33 => 'DWD', 34 => 'DWD', 35 => 'DWD', 36 => 'DWD', 37 => 'qDXDS', 38 => 'hDXDS', 39 => 'qBDW1', 40 => 'qBDW2', 52 => 'qZX3', 53 => 'qZXHZ', 54 => 'hZX3', 55 => 'hZXHZ', 56 => 'qZUS', 57 => 'qZUL', 58 => 'qHHZX', 59 => 'qZUHZ', 60 => 'hZUS', 61 => 'hZUL', 62 => 'hHHZX', 63 => 'hZUHZ', 64 => 'BDW1', 65 => 'BDW2', 66 => 'qZX2', 67 => 'hZX2', 68 => 'qZU2', 69 => 'hZU2', 70 => 'DWD', 71 => 'DWD', 72 => 'DWD', 73 => 'DWD', 74 => 'DWD', 75 => 'qDXDS', 76 => 'hDXDS', 90 => 'qZX3', 91 => 'qZXHZ', 92 => 'hZX3', 93 => 'hZXHZ', 94 => 'qZUS', 95 => 'qZUL', 96 => 'qHHZX', 97 => 'qZUHZ', 98 => 'hZUS', 99 => 'hZUL', 100 => 'hHHZX', 101 => 'hZUHZ', 102 => 'BDW1', 103 => 'BDW2', 104 => 'qZX2', 105 => 'hZX2', 106 => 'qZU2', 107 => 'hZU2', 108 => 'DWD', 109 => 'DWD', 110 => 'DWD', 111 => 'DWD', 112 => 'DWD', 113 => 'qDXDS', 114 => 'hDXDS', 115 => 'qBDW1', 116 => 'qBDW2', 128 => 'qZX3', 129 => 'qZXHZ', 130 => 'hZX3', 131 => 'hZXHZ', 132 => 'qZUS', 133 => 'qZUL', 134 => 'qHHZX', 135 => 'qZUHZ', 136 => 'hZUS', 137 => 'hZUL', 138 => 'hHHZX', 139 => 'hZUHZ', 140 => 'BDW1', 141 => 'BDW2', 142 => 'qZX2', 143 => 'hZX2', 144 => 'qZU2', 145 => 'hZU2', 146 => 'DWD', 147 => 'DWD', 148 => 'DWD', 149 => 'DWD', 150 => 'DWD', 151 => 'qDXDS', 152 => 'hDXDS', 153 => 'qBDW1', 154 => 'qBDW2', 164 => 'hZX3', 165 => 'hZXHZ', 166 => 'hZUS', 167 => 'hZUL', 168 => 'hHHZX', 169 => 'hZUHZ', 170 => 'BDW1', 171 => 'BDW2', 172 => 'qZX2', 173 => 'hZX2', 174 => 'qZU2', 175 => 'hZU2', 176 => '3DWD', 177 => 'DWD', 178 => 'DWD', 179 => 'qDXDS', 180 => 'hDXDS', 197 => 'SDZX3', 198 => 'SDZU3', 199 => 'SDZX2', 200 => 'SDZU2', 201 => 'SDBDW', 202 => 'SDDWD', 203 => 'SDDWD', 204 => 'SDDWD', 205 => 'SDDDS', 206 => 'SDCZW', 207 => 'SDRX1', 208 => 'SDRX2', 209 => 'SDRX3', 210 => 'SDRX4', 211 => 'SDRX5', 212 => 'SDRX6', 213 => 'SDRX7', 214 => 'SDRX8', 231 => 'SDZX3', 232 => 'SDZU3', 233 => 'SDZX2', 234 => 'SDZU2', 235 => 'SDBDW', 236 => 'SDDWD', 237 => 'SDDWD', 238 => 'SDDWD', 239 => 'SDDDS', 240 => 'SDCZW', 241 => 'SDRX1', 242 => 'SDRX2', 243 => 'SDRX3', 244 => 'SDRX4', 245 => 'SDRX5', 246 => 'SDRX6', 247 => 'SDRX7', 248 => 'SDRX8', 265 => 'SDZX3', 266 => 'SDZU3', 267 => 'SDZX2', 268 => 'SDZU2', 269 => 'SDBDW', 270 => 'SDDWD', 271 => 'SDDWD', 272 => 'SDDWD', 273 => 'SDDDS', 274 => 'SDCZW', 275 => 'SDRX1', 276 => 'SDRX2', 277 => 'SDRX3', 278 => 'SDRX4', 279 => 'SDRX5', 280 => 'SDRX6', 281 => 'SDRX7', 282 => 'SDRX8', 294 => 'hZX3', 295 => 'hZXHZ', 296 => 'hZUS', 297 => 'hZUL', 298 => 'hHHZX', 299 => 'hZUHZ', 300 => 'BDW1', 301 => 'BDW2', 302 => 'qZX2', 303 => 'hZX2', 304 => 'qZU2', 305 => 'hZU2', 306 => '3DWD', 307 => 'DWD', 308 => 'DWD', 309 => 'qDXDS', 310 => 'hDXDS', 322 => 'qZX3', 323 => 'qZXHZ', 324 => 'qZUS', 325 => 'qZUL', 326 => 'qHHZX', 327 => 'qZUHZ', 328 => 'qBDW1', 329 => 'qBDW2', 330 => 'qZX2', 331 => 'hZX2', 332 => 'qZU2', 333 => 'hZU2', 334 => 'DWD', 335 => 'DWD', 336 => 'DWD', 337 => 'DWD', 338 => 'DWD', 339 => 'qDXDS', 340 => 'hDXDS', 358 => 'SDZX3', 359 => 'SDZU3', 360 => 'SDZX2', 361 => 'SDZU2', 362 => 'SDBDW', 363 => 'SDDWD', 364 => 'SDDWD', 365 => 'SDDWD', 366 => 'SDDDS', 367 => 'SDCZW', 368 => 'SDRX1', 369 => 'SDRX2', 370 => 'SDRX3', 371 => 'SDRX4', 372 => 'SDRX5', 373 => 'SDRX6', 374 => 'SDRX7', 375 => 'SDRX8', 400 => 'ZX5', 401 => 'qZX4', 402 => 'hZX4', 403 => 'zZX3', 404 => 'zZXHZ', 405 => 'zZUS', 406 => 'zZUL', 407 => 'zHHZX', 408 => 'zZUHZ', 409 => 'BJL', 410 => 'RX3', 411 => 'RX2', 420 => 'ZX5', 421 => 'ZX4', 422 => 'ZX4', 423 => 'ZX3', 424 => 'ZXHZ', 425 => 'ZUS', 426 => 'ZUL', 427 => 'HHZX', 428 => 'ZUHZ', 429 => 'DWD', 430 => 'RX3', 431 => 'RX2', 440 => 'ZX5', 441 => 'qZX4', 442 => 'hZX4', 443 => 'zZX3', 444 => 'zZXHZ', 445 => 'zZUS', 446 => 'zZUL', 447 => 'zHHZX', 448 => 'zZUHZ', 449 => 'BJL', 450 => 'RX3', 451 => 'RX2', 460 => 'ZX5', 461 => 'qZX4', 462 => 'hZX4', 463 => 'zZX3', 464 => 'zZXHZ', 465 => 'zZUS', 466 => 'zZUL', 467 => 'zHHZX', 468 => 'zZUHZ', 469 => 'BJL', 470 => 'RX3', 471 => 'RX2', 500 => 'TM', 501 => 'SB', 502 => 'SX', 1240 => 'ZX5', 1241 => 'qZX4', 1242 => 'hZX4', 1214 => 'qZX3', 1215 => 'qZXHZ', 1218 => 'qZUS', 1219 => 'qZUL', 1220 => 'qHHZX', 1221 => 'qZUHZ', 1243 => 'zZX3', 1244 => 'zZXHZ', 1245 => 'zZUS', 1246 => 'zZUL', 1247 => 'zHHZX', 1248 => 'zZUHZ', 1216 => 'hZX3', 1217 => 'hZXHZ', 1222 => 'hZUS', 1223 => 'hZUL', 1224 => 'hHHZX', 1225 => 'hZUHZ', 1226 => 'BDW1', 1227 => 'BDW2', 1229 => 'hZX2', 1231 => 'hZU2', 1228 => 'qZX2', 1230 => 'qZU2', 1232 => 'DWD', 1237 => 'qDXDS', 1238 => 'hDXDS', 1250 => 'RX3', 1251 => 'RX2', 1249 => 'BJL');
	}

	public function paijiangFlag($flag)
	{
		return true;

		if (empty($flag)) {
			f('pf', 'kyp');
			return true;
		}

		if ($flag == 'start') {
			$pf = f('pf');

			if (empty($pf)) {
				f('pf', 'kyp');
				return true;
			}

			if ($pf == 'kyp') {
				f('pf', 'bkyp');
				return true;
			}

			if ($pf != 'kyp') {
				return false;
			}
		}

		if ($flag == 'end') {
			f('pf', 'kyp');
			return true;
		}
	}

	public function addFengHongXiaoFei($username, $money)
	{
		$time = date('Y-m-d');
		$where['username'] = $username;
		$where['addtime'] = $time;
		$data_b = $this->DaoFHXF->where($where)->find();

		if (empty($data_b)) {
			$data['username'] = $username;
			$data['addtime'] = $time;
			$data['xiaofei'] = $money[0];
			$data['fandian'] = $money[1];
			$data['zhonjiang'] = $money[2];
			$data['yingkui'] = ($money[2] + $money[1]) - $money[0];
			$this->DaoFHXF->data($data)->add();
		}
		else {
			$data['id'] = $data_b['id'];
			$data['xiaofei'] = $money[0] + $data_b['xiaofei'];
			$data['fandian'] = $money[1] + $data_b['fandian'];
			$data['zhonjiang'] = $money[2] + $data_b['zhonjiang'];
			$data['yingkui'] = ($data['zhonjiang'] + $data['fandian']) - $data['xiaofei'];
			$this->DaoFHXF->save($data);
		}

		$zuiDiXiaoFei = 888;
		$zuiDiYingKui = -888;

		if (c('DB_NAME') == 'jiang_dfw') {
			$zuiDiXiaoFei = 500;
		}

		if ($zuiDiXiaoFei <= $data['xiaofei']) {
			$this->autoFengHong($username, 0, 1);
		}

		if ($data['yingkui'] <= $zuiDiYingKui) {
			if ((c('DB_NAME') != 'jiang_msgj') && (c('DB_NAME') != 'jiang_dfw')) {
				$this->autoFengHong($username, 0, 2);
			}
		}
	}

	public function autoFengHong($username, $addmoney, $type)
	{
		$oneSJ = 9;
		$twoSJ = 6;
		$threeSJ = 3;
		$beizhuinfo = '代理分红:';

		if (c('DB_NAME') == 'jiang_dfw') {
			$oneSJ = 12;
			$twoSJ = 8;
			$threeSJ = 3;
			$beizhuinfo = '代理返佣:';
		}

		$where_fenghong['username'] = $username;
		$where_fenghong['type'] = $type;
		$where_fenghong['addtime'] = date('Y-m-d');
		$query_fenghong = $this->Dao_fenghong->where($where_fenghong)->find();

		if (!empty($query_fenghong)) {
			return NULL;
		}

		$data_fenghong['username'] = $username;
		$data_fenghong['type'] = $type;
		$data_fenghong['addtime'] = date('Y-m-d');
		$this->Dao_fenghong->add($data_fenghong);
		$where_u['username'] = $username;
		$data_u = $this->DaoUser->where($where_u)->find();
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
		$data_umap = $this->DaoUser->where($map)->order('regfrom desc')->select();
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
				$this->DaoAccount->add($daOne);
				$this->DaoUser->setInc('money', array('username' => $dainame1), $oneSJ);
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
				$this->DaoAccount->add($daOne);
				$this->DaoUser->setInc('money', array('username' => $dainame2), $twoSJ);
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
				$this->DaoAccount->add($daOne);
				$this->DaoUser->setInc('money', array('username' => $dainame3), $threeSJ);
			}
		}
	}

	public function addMessage($username, $lotteryid, $issue, $yinkui)
	{
		$data = array();
		$data['username'] = $username;
		$data['type'] = 0;
		$data['lotteryid'] = $lotteryid;
		$data['issue'] = $issue;
		$data['yinkui'] = $yinkui;
		$data['addtime'] = date('Y-m-d H:i:s');
		$this->DaoMessage->data($data)->add();
	}

	public function paijiang()
	{
		$issue = $this->issue;
		$_obfuscate_Ul2pBz4CAA = m($this->codeModel);
		$Where['issue'] = $issue;
		$_obfuscate_h88Wphkt7VA = $_obfuscate_Ul2pBz4CAA->where($Where)->find();

		if (!$_obfuscate_h88Wphkt7VA) {
			echo 'end';
			return false;
		}

		$this->kjcode = split(',', $_obfuscate_h88Wphkt7VA['code']);
		if (($this->kjcode[0] == '*') && ($this->kjcode[1] == '*')) {
			$this->kjcode[0] = $this->kjcode[2];
			$this->kjcode[1] = $this->kjcode[3];
		}

		if ($this->lotteryid == 13) {
			$kjsx = split(',', $_obfuscate_h88Wphkt7VA['sx']);
			$jguf = split(',', $_obfuscate_h88Wphkt7VA['sb']);
			$this->TM = $this->kjcode[6];
			$this->SX = $kjsx[6];
			$this->SB = $jguf[6];
		}

		$this->DaoOrder = m('Order');
		$Where['state'] = 0;
		$Where['lotteryid'] = $this->lotteryid;
		$this->DaoUser = m('User');
		$this->DaoAccount = m('Account');
		$this->DaoMethod = m('Method');
		$this->setLtMethod();
		$_obfuscate_c4PoGJzci9Y8_Q = false;
		$pageNum = 48;
		$dataOrder = $this->DaoOrder->where($Where)->limit($pageNum)->select();

		if (!$dataOrder) {
			if ($this->isAuto) {
				echo 'end';
				return false;
			}
			else {
				$this->error('该期没有未派奖的订单');
			}
		}

		$this->DaoMessage = m('Message');
		$this->DaoFHXF = m('fenghongxiaofei');
		$this->Dao_fenghong = m('fenghong');

		foreach ($dataOrder as $v ) {
			$username = $v['username'];
			$dataUser = $this->DaoUser->field('money,rate_1,rate_2,regfrom,usertype')->where('username=\'' . $username . '\'')->find();
			$nowUserMoney = round($dataUser['money'], 4);
			$addUserMoney = 0;
			$_obfuscate_mv08DpE2Pbi = $this->isZhongJiang($v['methodid'], $v['codes'], $v['type'], $v['prize'], $dataUser['rate_1'], $v['step'], $v['mode'], $v['info']);
			$_obfuscate_XKtkhyY0z2EZ = array();

			if (0 < $_obfuscate_mv08DpE2Pbi) {
				$fdQian = round(($v['point'] / 100) * $v['money'], 4);
				$prize = round($_obfuscate_mv08DpE2Pbi * $v['beishu'], 4);

				if (300000 < $prize) {
					$prize = 300000;
				}

				$dataAcc['username'] = $username;
				$dataAcc['lotteryid'] = $v['lotteryid'];
				$dataAcc['methodid'] = $v['methodid'];
				$dataAcc['money'] = $prize;
				$dataAcc['money_befor'] = $nowUserMoney;
				$dataAcc['money_after'] = round($nowUserMoney + $prize, 4);
				$dataAcc['accounttype'] = 9;
				$dataAcc['ordernum'] = $v['ordernum'];
				$dataAcc['mode'] = $v['mode'];
				$dataAcc['issue'] = $v['issue'];
				$dataAcc['addtime'] = date('Y-m-d H:i:s');
				$dataAcc['accountnum'] = date('ymdhis') . rand_string(5, 2);
				$nowUserMoney = $nowUserMoney + $prize;
				$addUserMoney += $prize;
				$_obfuscate_SdospxqcWSol3A = array();
				$_obfuscate_SdospxqcWSol3A[0] = $dataAcc;
				$dataAcc['money'] = $fdQian;
				$dataAcc['money_befor'] = $nowUserMoney;
				$dataAcc['money_after'] = round($nowUserMoney + $fdQian, 4);
				$dataAcc['accounttype'] = 4;

				if ($v['methodid'] == 13) {
					$fdQian = 0;
				}

				$nowUserMoney = $nowUserMoney + $fdQian;
				$addUserMoney += $fdQian;

				if (0 < $fdQian) {
					$_obfuscate_SdospxqcWSol3A[1] = $dataAcc;
				}

				$this->DaoAccount->addAll($_obfuscate_SdospxqcWSol3A);
				$this->addUserMoney($username, $addUserMoney);

				if (c('dlfh') == 1) {
					$_obfuscate_XKtkhyY0z2EZ[0] = $v['money'];
					$_obfuscate_XKtkhyY0z2EZ[1] = $fdQian;
					$_obfuscate_XKtkhyY0z2EZ[2] = $prize;
					$this->addFengHongXiaoFei($username, $_obfuscate_XKtkhyY0z2EZ);
				}

				$this->addMessage($username, $v['lotteryid'], $v['issue'], $addUserMoney - $v['money']);
				$addUserMoney = 0;
				if (($v['traceif'] == '1') && ('1' == $v['tracestop'])) {
					$chedanMoney = 0;
					$_obfuscate_15yb1Ek5jGzP_A['id'] = array('neq', $v['id']);
					$_obfuscate_15yb1Ek5jGzP_A['tracenum'] = $v['tracenum'];
					$_obfuscate_15yb1Ek5jGzP_A['state'] = '0';
					$_obfuscate_15yb1Ek5jGzP_A['username'] = $username;
					$_obfuscate_15yb1Ek5jGzP_A['lotteryid'] = $v['lotteryid'];
					$_obfuscate_15yb1Ek5jGzP_A['projectno'] = array('exp', 'is null');
					$data = $this->DaoOrder->where($_obfuscate_15yb1Ek5jGzP_A)->select();

					if ($data) {
						$chedanMoney = 0;
						$account_ordernum = array();

						foreach ($data as $_obfuscate_ClA => $v2 ) {
							$chedanMoney += $v2['money'];
						}

						$chedanMoney = round($chedanMoney, 4);
						$addUserMoney += $chedanMoney;
						$_obfuscate_7zYyCmg = $dataAcc;
						$_obfuscate_7zYyCmg['money'] = $chedanMoney;
						$_obfuscate_7zYyCmg['money_befor'] = $nowUserMoney;
						$_obfuscate_7zYyCmg['money_after'] = round($nowUserMoney + $chedanMoney, 4);
						$_obfuscate_7zYyCmg['accounttype'] = 3;
						$_obfuscate_7zYyCmg['issue'] = $v['issue'];
						$_obfuscate_7zYyCmg['ordernum'] = $v['ordernum'];
						$_obfuscate_7zYyCmg['accountnum'] = date('ymdhis') . rand_string(5, 2);
						$this->DaoAccount->add($_obfuscate_7zYyCmg);
						$this->DaoOrder->where($_obfuscate_15yb1Ek5jGzP_A)->save(array('state' => '7'));
						$sql_m = 'update jiang_user set money=money+' . $addUserMoney . ' where username=\'' . $username . '\'';
						$this->DaoUser->execute($sql_m);
					}
				}

				$_obfuscate_r0gXLo8Na5Qkt1k['id'] = $v['id'];
				$_obfuscate_r0gXLo8Na5Qkt1k['state'] = '1';
				$_obfuscate_r0gXLo8Na5Qkt1k['zjprize'] = $prize;
			}
			else {
				$fdQian = round(($v['point'] / 100) * $v['money'], 4);
				$dataAcc['username'] = $username;
				$dataAcc['lotteryid'] = $v['lotteryid'];
				$dataAcc['methodid'] = $v['methodid'];
				$dataAcc['money'] = $fdQian;
				$dataAcc['money_befor'] = $nowUserMoney;
				$dataAcc['money_after'] = round($nowUserMoney + $fdQian, 4);
				$dataAcc['accounttype'] = 4;
				$dataAcc['ordernum'] = $v['ordernum'];
				$dataAcc['issue'] = $v['issue'];
				$dataAcc['mode'] = $v['mode'];
				$dataAcc['addtime'] = date('Y-m-d H:i:s');
				$dataAcc['accountnum'] = date('ymdhis') . rand_string(5, 2);

				if ($v['methodid'] == 13) {
					$fdQian = 0;
				}

				$nowUserMoney = $nowUserMoney + $fdQian;

				if (0 < $fdQian) {
					$this->DaoAccount->add($dataAcc);
					$this->addUserMoney($username, $fdQian);
				}

				if (c('dlfh') == 1) {
					$_obfuscate_XKtkhyY0z2EZ[0] = $v['money'];
					$_obfuscate_XKtkhyY0z2EZ[1] = $fdQian;
					$_obfuscate_XKtkhyY0z2EZ[2] = 0;
					$this->addFengHongXiaoFei($username, $_obfuscate_XKtkhyY0z2EZ);
				}

				$this->addMessage($username, $v['lotteryid'], $v['issue'], $fdQian - $v['money']);
				$_obfuscate_r0gXLo8Na5Qkt1k['id'] = $v['id'];
				$_obfuscate_r0gXLo8Na5Qkt1k['state'] = '2';
				$_obfuscate_r0gXLo8Na5Qkt1k['zjprize'] = 0;
			}

			$_obfuscate_r0gXLo8Na5Qkt1k['kjcode'] = $_obfuscate_h88Wphkt7VA['code'];
			$this->DaoOrder->save($_obfuscate_r0gXLo8Na5Qkt1k);

			switch ($v['lotteryid']) {
			case 5:
			case 6:
			case 7:
			case 8:
			case 9:
			case 10:
			case 11:
				$this->doAllRegFd($username, $v['money'], $dataUser['rate_2'], $dataUser['regfrom'], $v['lotteryid'], $v['methodid'], $v['issue'], $v['ordernum']);
				break;

			default:
				$this->doAllRegFd($username, $v['money'], $dataUser['rate_1'], $dataUser['regfrom'], $v['lotteryid'], $v['methodid'], $v['issue'], $v['ordernum']);
			}
		}

		if ($this->isAuto) {
			return 0;
		}
		else {
			$this->success('手工派奖成功');
		}
	}

	public function addUserMoney($username, $money)
	{
		$sql_m = 'update jiang_user set money=money+' . $money . ' where username=\'' . $username . '\'';
		$this->DaoUser->execute($sql_m);
	}

	public function updateUserMoney($username, $money)
	{
		$data['money'] = $money;
		$this->DaoUser->where(array('username' => $username))->save($data);
	}

	public function doAllRegFd($username, $money, $ufd, $regfrom, $lotteryid, $methodid, $issue, $ordernum)
	{
		$newfd = $ufd;
		if (empty($newfd) || is_null($newfd) || ($newfd < 0)) {
			$newfd = 0;
		}

		$str = ltrim(rtrim($regfrom, '|'), '|');
		$regArr = split('\\|\\|', $str);
		$where['username'] = array('in', $regArr);
		$where['_string'] = ' `username` != \'admin\'';
		$dataUser = $this->DaoUser->where($where)->order('id desc')->select();

		if (!$dataUser) {
			return false;
		}

		$dataAcc = array();
		$key = 0;
		$nowtime = date('Y-m-d H:i:s');

		foreach ($dataUser as $v ) {
			switch ($lotteryid) {
			case 6:
			case 7:
			case 8:
			case 11:
			case 9:
			case 10:
				$fd = $v['rate_2'] - $newfd;
				$newfd = $v['rate_2'];
				break;

			default:
				$fd = $v['rate_1'] - $newfd;
				$newfd = $v['rate_1'];
				break;
			}

			if ($fd <= 0) {
				continue;
			}

			$fdQian = round(($fd / 100) * $money, 4);
			$dailiMoney = $v['money'];
			$sql_m = 'update jiang_user set money=money+' . $fdQian . ' where username=\'' . $v['username'] . '\'';
			$this->DaoUser->execute($sql_m);
			$afmoney = $dailiMoney + $fdQian;
			$dataAcc[$key]['username'] = $v['username'];
			$dataAcc[$key]['lotteryid'] = $lotteryid;
			$dataAcc[$key]['methodid'] = $methodid;
			$dataAcc[$key]['money'] = $fdQian;
			$dataAcc[$key]['money_befor'] = round($dailiMoney, 4);
			$dataAcc[$key]['money_after'] = round($afmoney, 4);
			$dataAcc[$key]['accounttype'] = 10;
			$dataAcc[$key]['accountnum'] = date('ymdhis') . rand_string(5, 2);
			$dataAcc[$key]['ordernum'] = $ordernum;
			$dataAcc[$key]['issue'] = $issue;
			$dataAcc[$key]['mode'] = 1;
			$dataAcc[$key]['addtime'] = $nowtime;
			$key++;
		}

		$this->DaoAccount->addAll($dataAcc);
		return true;
	}

	public function isZhongJiang($methodid, &$codes, $type, $prize, $userfd, $step, $mode, $info)
	{
		$mname = $this->lt_method[$methodid];
		$isZJ = false;

		if ($type == 'input') {
			switch ($mname) {
			case 'qZX4':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[0] . $this->kjcode[1] . $this->kjcode[2] . $this->kjcode[3];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZX4':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[1] . $this->kjcode[2] . $this->kjcode[3] . $this->kjcode[4];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'qZX3':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[0] . $this->kjcode[1] . $this->kjcode[2];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'zZX3':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[1] . $this->kjcode[2] . $this->kjcode[3];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZX3':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[2] . $this->kjcode[3] . $this->kjcode[4];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'RX3':
				$cc = split('&', $codes);
				$rsmsg_str = substr($info, -3, 1) . ',' . substr($info, -2, 1) . ',' . substr($info, -1, 1);
				$rsmsg = split(',', $rsmsg_str);
				$zjcode = '';

				foreach ($rsmsg as $v ) {
					switch ($v) {
					case 'w':
						$zjcode .= $this->kjcode[0];
						break;

					case 'q':
						$zjcode .= $this->kjcode[1];
						break;

					case 'b':
						$zjcode .= $this->kjcode[2];
						break;

					case 's':
						$zjcode .= $this->kjcode[3];
						break;

					case 'g':
						$zjcode .= $this->kjcode[4];
						break;
					}
				}

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'qHHZX':
				$kjcodeZH = array($this->kjcode[0] . $this->kjcode[1] . $this->kjcode[2], $this->kjcode[0] . $this->kjcode[2] . $this->kjcode[1], $this->kjcode[1] . $this->kjcode[0] . $this->kjcode[2], $this->kjcode[1] . $this->kjcode[2] . $this->kjcode[0], $this->kjcode[2] . $this->kjcode[0] . $this->kjcode[1], $this->kjcode[2] . $this->kjcode[1] . $this->kjcode[0]);
				$cc = split('&', $codes);

				foreach ($kjcodeZH as $v ) {
					if (in_array($v, $cc)) {
						return $this->getHHZXprize('q', $userfd, $step, $mode);
					}
				}

				break;

			case 'zHHZX':
				$kjcodeZH = array($this->kjcode[1] . $this->kjcode[2] . $this->kjcode[3], $this->kjcode[1] . $this->kjcode[3] . $this->kjcode[2], $this->kjcode[2] . $this->kjcode[1] . $this->kjcode[3], $this->kjcode[2] . $this->kjcode[3] . $this->kjcode[1], $this->kjcode[3] . $this->kjcode[1] . $this->kjcode[2], $this->kjcode[3] . $this->kjcode[2] . $this->kjcode[1]);
				$cc = split('&', $codes);

				foreach ($kjcodeZH as $v ) {
					if (in_array($v, $cc)) {
						return $this->getHHZXprize('z', $userfd, $step, $mode);
					}
				}

				break;

			case 'hHHZX':
				$kjcodeZH = array($this->kjcode[2] . $this->kjcode[3] . $this->kjcode[4], $this->kjcode[2] . $this->kjcode[4] . $this->kjcode[3], $this->kjcode[3] . $this->kjcode[2] . $this->kjcode[4], $this->kjcode[3] . $this->kjcode[4] . $this->kjcode[2], $this->kjcode[4] . $this->kjcode[2] . $this->kjcode[3], $this->kjcode[4] . $this->kjcode[3] . $this->kjcode[2]);
				$cc = split('&', $codes);

				foreach ($kjcodeZH as $v ) {
					if (in_array($v, $cc)) {
						return $this->getHHZXprize('h', $userfd, $step, $mode);
					}
				}

				break;

			case 'qZX2':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[0] . $this->kjcode[1];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZX2':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[3] . $this->kjcode[4];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'RX2':
				$cc = split('&', $codes);
				$rsmsg_str = substr($info, -2, 1) . ',' . substr($info, -1, 1);
				$rsmsg = split(',', $rsmsg_str);
				$zjcode = '';

				foreach ($rsmsg as $v ) {
					switch ($v) {
					case 'w':
						$zjcode .= $this->kjcode[0];
						break;

					case 'q':
						$zjcode .= $this->kjcode[1];
						break;

					case 'b':
						$zjcode .= $this->kjcode[2];
						break;

					case 's':
						$zjcode .= $this->kjcode[3];
						break;

					case 'g':
						$zjcode .= $this->kjcode[4];
						break;
					}
				}

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'SDZX2':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[0] . ' ' . $this->kjcode[1];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'qZU2':
				if ($this->kjcode[0] == $this->kjcode[1]) {
					return 0;
				}

				$cc = split('&', $codes);
				$zjcode1 = $this->kjcode[0] . $this->kjcode[1];
				$zjcode2 = $this->kjcode[1] . $this->kjcode[0];
				if (in_array($zjcode1, $cc) || in_array($zjcode2, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'SDZU2':
				$cc = split('&', $codes);
				$zjcode1 = $this->kjcode[0] . ' ' . $this->kjcode[1];
				$zjcode2 = $this->kjcode[1] . ' ' . $this->kjcode[0];
				if (in_array($zjcode1, $cc) || in_array($zjcode2, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZU2':
				if ($this->kjcode[3] == $this->kjcode[4]) {
					return 0;
				}

				$cc = split('&', $codes);
				$zjcode1 = $this->kjcode[3] . $this->kjcode[4];
				$zjcode2 = $this->kjcode[4] . $this->kjcode[3];
				if (in_array($zjcode1, $cc) || in_array($zjcode2, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'SDZX3':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[0] . ' ' . $this->kjcode[1] . ' ' . $this->kjcode[2];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'SDZU3':
				$cc = split('&', $codes);

				foreach ($cc as $v ) {
					$sourcewin = 0;

					if (strpos($v, $this->kjcode[0]) !== false) {
						$sourcewin++;
					}

					if (strpos($v, $this->kjcode[1]) !== false) {
						$sourcewin++;
					}

					if (strpos($v, $this->kjcode[2]) !== false) {
						$sourcewin++;
					}

					if ($sourcewin == 3) {
						return $prize;
					}
				}

				break;

			case 'SDRX1':
				$cc = split('&', $codes);
				$zjnum = 0;

				foreach ($cc as $v ) {
					$c = split(' ', $v);
					$sourcewin = 0;

					foreach ($c as $v2 ) {
						if (in_array($v2, $this->kjcode)) {
							$sourcewin++;
						}

						if (1 <= $sourcewin) {
							$zjnum++;
						}
					}
				}

				if (0 < $zjnum) {
					return $zjnum * $prize;
				}

				break;

			case 'SDRX2':
				$cc = split('&', $codes);
				$zjnum = 0;

				foreach ($cc as $v ) {
					$c = split(' ', $v);
					$sourcewin = 0;
					$cfcode = '';

					foreach ($c as $v2 ) {
						if (in_array($v2, $this->kjcode)) {
							$sourcewin++;
						}

						if ($v2 == $cfcode) {
							return 0;
						}
						else {
							$cfcode = $v2;
						}

						if (2 <= $sourcewin) {
							$zjnum++;
						}
					}
				}

				if (0 < $zjnum) {
					return $zjnum * $prize;
				}

				break;

			case 'SDRX3':
				$cc = split('&', $codes);
				$zjnum = 0;

				foreach ($cc as $v ) {
					$c = split(' ', $v);
					$sourcewin = 0;
					$cfcode = '';

					foreach ($c as $v2 ) {
						if (in_array($v2, $this->kjcode)) {
							$sourcewin++;
						}

						if ($v2 == $cfcode) {
							return 0;
						}
						else {
							$cfcode = $v2;
						}

						if (3 <= $sourcewin) {
							$zjnum++;
						}
					}
				}

				if (0 < $zjnum) {
					return $zjnum * $prize;
				}

				break;

			case 'SDRX4':
				$cc = split('&', $codes);
				$zjnum = 0;

				foreach ($cc as $v ) {
					$c = split(' ', $v);
					$sourcewin = 0;
					$cfcode = '';

					foreach ($c as $v2 ) {
						if (in_array($v2, $this->kjcode)) {
							$sourcewin++;
						}

						if ($v2 == $cfcode) {
							return 0;
						}
						else {
							$cfcode = $v2;
						}

						if (4 <= $sourcewin) {
							$zjnum++;
						}
					}
				}

				if (0 < $zjnum) {
					return $zjnum * $prize;
				}

				break;

			case 'SDRX5':
			case 'SDRX6':
			case 'SDRX7':
			case 'SDRX8':
				$cc = split('&', $codes);
				$zjnum = 0;
				$cfcode = '';

				foreach ($cc as $v ) {
					$c = split(' ', $v);
					$sourcewin = 0;

					foreach ($c as $v2 ) {
						if (in_array($v2, $this->kjcode)) {
							$sourcewin++;
						}

						if ($v2 == $cfcode) {
							return 0;
						}
						else {
							$cfcode = $v2;
						}

						if (5 <= $sourcewin) {
							$zjnum++;
							break;
						}
					}
				}

				if (0 < $zjnum) {
					return $zjnum * $prize;
				}

				break;
			}
		}
		else {
			switch ($mname) {
			case 'lhd':
				$sNum = 0;
				$dNum = 0;
				$cc = split('&', $codes);

				if ($this->kjcode[4] < $this->kjcode[0]) {
					$zjcode = '龙';
					$dataPrize = 3.8;
				}
				else if ($this->kjcode[0] < $this->kjcode[4]) {
					$zjcode = '虎';
					$dataPrize = 3.8;
				}
				else if ($this->kjcode[0] == $this->kjcode[4]) {
					$zjcode = '和';
					$dataPrize = 10;
				}

				foreach ($cc as $v ) {
					if ($zjcode == $v) {
						$prize = 0;

						if ($mode == 1) {
							$jiangjinMode = 1;
						}
						else if ($mode == 2) {
							$jiangjinMode = 0.1;
						}
						else if ($mode == 3) {
							$jiangjinMode = 0.01;
						}

						return $dataPrize * $jiangjinMode;
					}
				}

				break;

			case 'RX3':
				$cc = split('\\|', $codes);
				$sourcewin = 0;

				foreach ($this->kjcode as $k => $kjc ) {
					if (in_array($kjc, split('&', $cc[$k]))) {
						$sourcewin++;
					}
				}

				if ($sourcewin === 3) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'RX2':
				$cc = split('\\|', $codes);
				$sourcewin = 0;

				foreach ($this->kjcode as $k => $kjc ) {
					if (in_array($kjc, split('&', $cc[$k]))) {
						$sourcewin++;
					}
				}

				if ($sourcewin === 2) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'TM':
				$cc = split('&', $codes);

				if (in_array($this->TM, $cc)) {
					return $prize;
				}
				else {
					return 0;
				}

				break;

			case 'SX':
				$cc = split('&', $codes);

				if (in_array($this->SX, $cc)) {
					return $prize;
				}
				else {
					return 0;
				}

				break;

			case 'SB':
				$cc = split('&', $codes);

				if (in_array($this->SB, $cc)) {
					return $prize;
				}
				else {
					return 0;
				}

				break;

			case 'ZX5':
				$cc = split('\\|', $codes);
				$c0 = split('&', $cc[0]);
				$c1 = split('&', $cc[1]);
				$c2 = split('&', $cc[2]);
				$c3 = split('&', $cc[3]);
				$c4 = split('&', $cc[4]);
				if (in_array($this->kjcode[0], $c0) && in_array($this->kjcode[1], $c1) && in_array($this->kjcode[2], $c2) && in_array($this->kjcode[3], $c3) && in_array($this->kjcode[4], $c4)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'qZX4':
				$cc = split('\\|', $codes);
				$c0 = split('&', $cc[0]);
				$c1 = split('&', $cc[1]);
				$c2 = split('&', $cc[2]);
				$c3 = split('&', $cc[3]);
				if (in_array($this->kjcode[0], $c0) && in_array($this->kjcode[1], $c1) && in_array($this->kjcode[2], $c2) && in_array($this->kjcode[3], $c3)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZX4':
				$cc = split('\\|', $codes);
				$c1 = split('&', $cc[0]);
				$c2 = split('&', $cc[1]);
				$c3 = split('&', $cc[2]);
				$c4 = split('&', $cc[3]);
				if (in_array($this->kjcode[1], $c1) && in_array($this->kjcode[2], $c2) && in_array($this->kjcode[3], $c3) && in_array($this->kjcode[4], $c4)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'qZX3':
				$cc = split('\\|', $codes);
				$c0 = split('&', $cc[0]);
				$c1 = split('&', $cc[1]);
				$c2 = split('&', $cc[2]);
				if (in_array($this->kjcode[0], $c0) && in_array($this->kjcode[1], $c1) && in_array($this->kjcode[2], $c2)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'zZX3':
				$cc = split('\\|', $codes);
				$c0 = split('&', $cc[0]);
				$c1 = split('&', $cc[1]);
				$c2 = split('&', $cc[2]);
				if (in_array($this->kjcode[1], $c0) && in_array($this->kjcode[2], $c1) && in_array($this->kjcode[3], $c2)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZX3':
				$cc = split('\\|', $codes);
				$c2 = split('&', $cc[0]);
				$c3 = split('&', $cc[1]);
				$c4 = split('&', $cc[2]);
				if (in_array($this->kjcode[2], $c2) && in_array($this->kjcode[3], $c3) && in_array($this->kjcode[4], $c4)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'qZXHZ':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[0] + $this->kjcode[1] + $this->kjcode[2];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'zZXHZ':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[1] + $this->kjcode[2] + $this->kjcode[3];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZXHZ':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[2] + $this->kjcode[3] + $this->kjcode[4];

				if (in_array($zjcode, $cc)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'qZUS':
				$cc = split('&', $codes);

				if (!$this->isZuSan('q')) {
					return 0;
				}

				$sourcewin = 0;

				for ($i = 0; $i < 3; $i++) {
					if (in_array($this->kjcode[$i], $cc)) {
						$sourcewin++;
					}
				}

				if ($sourcewin == 3) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'zZUS':
				$cc = split('&', $codes);

				if (!$this->isZuSan('z')) {
					return 0;
				}

				$sourcewin = 0;

				for ($i = 1; $i < 4; $i++) {
					if (in_array($this->kjcode[$i], $cc)) {
						$sourcewin++;
					}
				}

				if ($sourcewin == 3) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZUS':
				$cc = split('&', $codes);

				if (!$this->isZuSan('h')) {
					return 0;
				}

				$sourcewin = 0;

				for ($i = 2; $i < 5; $i++) {
					if (in_array($this->kjcode[$i], $cc)) {
						$sourcewin++;
					}
				}

				if ($sourcewin == 3) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'qZUL':
				$cc = split('&', $codes);

				if (!$this->isZuLiu('q')) {
					return 0;
				}

				$sourcewin = 0;

				for ($i = 0; $i < 3; $i++) {
					if (in_array($this->kjcode[$i], $cc)) {
						$sourcewin++;
					}
				}

				if ($sourcewin == 3) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'zZUL':
				$cc = split('&', $codes);

				if (!$this->isZuLiu('z')) {
					return 0;
				}

				$sourcewin = 0;

				for ($i = 1; $i < 4; $i++) {
					if (in_array($this->kjcode[$i], $cc)) {
						$sourcewin++;
					}
				}

				if ($sourcewin == 3) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZUL':
				$cc = split('&', $codes);

				if (!$this->isZuLiu('h')) {
					return 0;
				}

				$sourcewin = 0;

				for ($i = 2; $i < 5; $i++) {
					if (in_array($this->kjcode[$i], $cc)) {
						$sourcewin++;
					}
				}

				if ($sourcewin == 3) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'qZUHZ':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[0] + $this->kjcode[1] + $this->kjcode[2];

				if (in_array($zjcode, $cc)) {
					return $this->getHHZXprize('q', $userfd, $step, $mode);
				}

				break;

			case 'zZUHZ':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[1] + $this->kjcode[2] + $this->kjcode[3];

				if (in_array($zjcode, $cc)) {
					return $this->getHHZXprize('z', $userfd, $step, $mode);
				}

				break;

			case 'hZUHZ':
				$cc = split('&', $codes);
				$zjcode = $this->kjcode[2] + $this->kjcode[3] + $this->kjcode[4];

				if (in_array($zjcode, $cc)) {
					return $this->getHHZXprize('h', $userfd, $step, $mode);
				}

				break;

			case 'qZX2':
			case 'SDZX2':
				$cc = split('\\|', $codes);
				$c0 = split('&', $cc[0]);
				$c1 = split('&', $cc[1]);
				if (in_array($this->kjcode[0], $c0) && in_array($this->kjcode[1], $c1)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZX2':
				$cc = split('\\|', $codes);
				$c0 = split('&', $cc[0]);
				$c1 = split('&', $cc[1]);
				if (in_array($this->kjcode[3], $c0) && in_array($this->kjcode[4], $c1)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'qZU2':
			case 'SDZU2':
				if ($this->kjcode[0] == $this->kjcode[1]) {
					return 0;
				}

				$cc = split('&', $codes);
				$sourcewin = 0;

				if (in_array($this->kjcode[0], $cc)) {
					$sourcewin++;
				}

				if (in_array($this->kjcode[1], $cc)) {
					$sourcewin++;
				}

				if ($sourcewin == 2) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'hZU2':
				if ($this->kjcode[3] == $this->kjcode[4]) {
					return 0;
				}

				$cc = split('&', $codes);
				$sourcewin = 0;

				if (in_array($this->kjcode[3], $cc)) {
					$sourcewin++;
				}

				if (in_array($this->kjcode[4], $cc)) {
					$sourcewin++;
				}

				if ($sourcewin == 2) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'DWD':
				$cc = split('\\|', $codes);
				$sourcewin = 0;

				foreach ($cc as $k => $v ) {
					if ($v == '') {
						continue;
					}

					$c1 = split('&', $v);

					if (in_array($this->kjcode[$k], $c1)) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case '3DWD':
				$cc = split('\\|', $codes);
				$sourcewin = 0;

				foreach ($cc as $k => $v ) {
					if ($v == '') {
						continue;
					}

					$c1 = split('&', $v);

					if (in_array($this->kjcode[$k + 2], $c1)) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'qDXDS':
				$cc = split('\\|', $codes);
				$c0 = split('&', $cc[0]);
				$c1 = split('&', $cc[1]);
				$sourcewin = 0;
				$zjcode1 = (5 <= $this->kjcode[0] ? '大' : '小');
				$zjcode2 = (5 <= $this->kjcode[1] ? '大' : '小');
				$zjcode3 = (($this->kjcode[0] % 2) == 0 ? '双' : '单');
				$zjcode4 = (($this->kjcode[1] % 2) == 0 ? '双' : '单');
				$zj1 = $zjcode1 . $zjcode2;
				$zj2 = $zjcode1 . $zjcode4;
				$zj3 = $zjcode3 . $zjcode2;
				$zj4 = $zjcode3 . $zjcode4;

				foreach ($c0 as $v0 ) {
					foreach ($c1 as $v1 ) {
						$zw = $v0 . $v1;
						if (($zw == $zj1) || ($zw == $zj2) || ($zw == $zj3) || ($zw == $zj4)) {
							$sourcewin++;
						}
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'hDXDS':
				$cc = split('\\|', $codes);
				$c0 = split('&', $cc[0]);
				$c1 = split('&', $cc[1]);
				$sourcewin = 0;
				$zjcode1 = (5 <= $this->kjcode[3] ? '大' : '小');
				$zjcode2 = (5 <= $this->kjcode[4] ? '大' : '小');
				$zjcode3 = (($this->kjcode[3] % 2) == 0 ? '双' : '单');
				$zjcode4 = (($this->kjcode[4] % 2) == 0 ? '双' : '单');
				$zj1 = $zjcode1 . $zjcode2;
				$zj2 = $zjcode1 . $zjcode4;
				$zj3 = $zjcode3 . $zjcode2;
				$zj4 = $zjcode3 . $zjcode4;

				foreach ($c0 as $v0 ) {
					foreach ($c1 as $v1 ) {
						$zw = $v0 . $v1;
						if (($zw == $zj1) || ($zw == $zj2) || ($zw == $zj3) || ($zw == $zj4)) {
							$sourcewin++;
						}
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'BDW1':
				$cc = split('&', $codes);
				$sourcewin = 0;

				foreach ($cc as $v ) {
					if (($v == $this->kjcode[2]) || ($v == $this->kjcode[3]) || ($v == $this->kjcode[4])) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'BDW2':
				$kjarr = array($this->kjcode[2], $this->kjcode[3], $this->kjcode[4]);
				$kjarr = array_unique($kjarr);
				$cc = split('&', $codes);
				$sourcewin = 0;

				foreach ($kjarr as $v ) {
					if (in_array($v, $cc)) {
						$sourcewin++;
					}
				}

				if ($sourcewin == 2) {
					return $prize;
				}

				if ($sourcewin == 3) {
					if (($this->kjcode[2] != $this->kjcode[3]) && ($this->kjcode[3] != $this->kjcode[4]) && ($this->kjcode[2] != $this->kjcode[4])) {
						return $prize * 3;
					}
					else {
						return $prize * 1;
					}
				}

				break;

			case 'qBDW1':
				$cc = split('&', $codes);
				$sourcewin = 0;

				foreach ($cc as $v ) {
					if (($v == $this->kjcode[0]) || ($v == $this->kjcode[1]) || ($v == $this->kjcode[2])) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'qBDW2':
				$kjarr = array($this->kjcode[0], $this->kjcode[1], $this->kjcode[2]);
				$kjarr = array_unique($kjarr);
				$cc = split('&', $codes);
				$sourcewin = 0;

				foreach ($kjarr as $v ) {
					if (in_array($v, $cc)) {
						$sourcewin++;
					}
				}

				if ($sourcewin == 2) {
					return $prize;
				}

				if ($sourcewin == 3) {
					if (($this->kjcode[0] != $this->kjcode[1]) && ($this->kjcode[1] != $this->kjcode[2]) && ($this->kjcode[2] != $this->kjcode[0])) {
						return $prize * 3;
					}
					else {
						return $prize * 1;
					}
				}

				break;

			case 'SDZX3':
				$cc = split('\\|', $codes);
				$c0 = split('&', $cc[0]);
				$c1 = split('&', $cc[1]);
				$c2 = split('&', $cc[2]);
				if (in_array($this->kjcode[0], $c0) && in_array($this->kjcode[1], $c1) && in_array($this->kjcode[2], $c2)) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'SDZU3':
				$cc = split('&', $codes);
				$sourcewin = 0;

				for ($i = 0; $i < 3; $i++) {
					if (in_array($this->kjcode[$i], $cc)) {
						$sourcewin++;
					}
				}

				if ($sourcewin == 3) {
					$isZJ = true;
				}
				else {
					$isZJ = false;
				}

				break;

			case 'SDBDW':
				$cc = split('&', $codes);
				$sourcewin = 0;

				foreach ($cc as $v ) {
					if (($v == $this->kjcode[0]) || ($v == $this->kjcode[1]) || ($v == $this->kjcode[2])) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'SDDWD':
				$cc = split('\\|', $codes);
				$sourcewin = 0;

				foreach ($cc as $k => $v ) {
					if (empty($v)) {
						continue;
					}

					$c1 = split('&', $v);

					if (in_array($this->kjcode[$k], $c1)) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'SDRX1':
				$cc = split('&', $codes);
				$zs = count($cc);
				$this->data = $cc;
				$mem = array();
				$this->result = array();
				$this->com($zs, 1, $mem, 0, 0, 0);
				$sourcewin = 0;

				foreach ($this->result as $v ) {
					$tempWin = 0;

					foreach ($this->kjcode as $kjc ) {
						if (in_array($kjc, $v)) {
							$tempWin++;
						}
					}

					if ($tempWin == 1) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'SDRX2':
				$cc = split('&', $codes);
				$zs = count($cc);
				$this->data = $cc;
				$mem = array();
				$this->result = array();
				$this->com($zs, 2, $mem, 0, 0, 0);
				$sourcewin = 0;

				foreach ($this->result as $v ) {
					$tempWin = 0;

					foreach ($this->kjcode as $kjc ) {
						if (in_array($kjc, $v)) {
							$tempWin++;
						}
					}

					if ($tempWin == 2) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'SDRX3':
				$cc = split('&', $codes);
				$zs = count($cc);
				$this->data = $cc;
				$mem = array();
				$this->result = array();
				$this->com($zs, 3, $mem, 0, 0, 0);
				$sourcewin = 0;

				foreach ($this->result as $v ) {
					$tempWin = 0;

					foreach ($this->kjcode as $kjc ) {
						if (in_array($kjc, $v)) {
							$tempWin++;
						}
					}

					if ($tempWin == 3) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'SDRX4':
				$cc = split('&', $codes);
				$zs = count($cc);
				$this->data = $cc;
				$mem = array();
				$this->result = array();
				$this->com($zs, 4, $mem, 0, 0, 0);
				$sourcewin = 0;

				foreach ($this->result as $v ) {
					$tempWin = 0;

					foreach ($this->kjcode as $kjc ) {
						if (in_array($kjc, $v)) {
							$tempWin++;
						}
					}

					if ($tempWin == 4) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'SDRX5':
				$cc = split('&', $codes);
				$zs = count($cc);
				$this->data = $cc;
				$mem = array();
				$this->result = array();
				$this->com($zs, 5, $mem, 0, 0, 0);
				$sourcewin = 0;

				foreach ($this->result as $v ) {
					$tempWin = 0;

					foreach ($this->kjcode as $kjc ) {
						if (in_array($kjc, $v)) {
							$tempWin++;
						}
					}

					if ($tempWin == 5) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'SDRX6':
				$cc = split('&', $codes);
				$zs = count($cc);
				$this->data = $cc;
				$mem = array();
				$this->result = array();
				$this->com($zs, 6, $mem, 0, 0, 0);
				$sourcewin = 0;

				foreach ($this->result as $v ) {
					$tempWin = 0;

					foreach ($this->kjcode as $kjc ) {
						if (in_array($kjc, $v)) {
							$tempWin++;
						}
					}

					if ($tempWin == 5) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'SDRX7':
				$cc = split('&', $codes);
				$zs = count($cc);
				$this->data = $cc;
				$mem = array();
				$this->result = array();
				$this->com($zs, 7, $mem, 0, 0, 0);
				$sourcewin = 0;

				foreach ($this->result as $v ) {
					$tempWin = 0;

					foreach ($this->kjcode as $kjc ) {
						if (in_array($kjc, $v)) {
							$tempWin++;
						}
					}

					if ($tempWin == 5) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'SDRX8':
				$cc = split('&', $codes);
				$zs = count($cc);
				$this->data = $cc;
				$mem = array();
				$this->result = array();
				$this->com($zs, 8, $mem, 0, 0, 0);
				$sourcewin = 0;

				foreach ($this->result as $v ) {
					$tempWin = 0;

					foreach ($this->kjcode as $kjc ) {
						if (in_array($kjc, $v)) {
							$tempWin++;
						}
					}

					if ($tempWin == 5) {
						$sourcewin++;
					}
				}

				if (0 < $sourcewin) {
					return $prize * $sourcewin;
				}

				break;

			case 'SDDDS':
				$sNum = 0;
				$dNum = 0;

				foreach ($this->kjcode as $v ) {
					if (($v % 2) == 0) {
						$sNum++;
					}
					else {
						$dNum++;
					}
				}

				$zjcode = $dNum . '单' . $sNum . '双';
				$cc = split('&', $codes);

				foreach ($cc as $v ) {
					if ($zjcode == $v) {
						$prize = 0;
						$methodid = '205' . sprintf('%02d', $sNum + 1);
						$dataPrize = $this->DaoMethod->where('methodid=' . $methodid)->find();

						if ($mode == 1) {
							$jiangjinMode = 1;
						}
						else if ($mode == 2) {
							$jiangjinMode = 0.1;
						}
						else if ($mode == 3) {
							$jiangjinMode = 0.01;
						}

						return $dataPrize['prize'] * $jiangjinMode;
					}
				}

				break;

			case 'SDCZW':
				$arr = $this->kjcode;
				sort($arr, SORT_NUMERIC);
				$zjcode = $arr[2];
				$cc = split('&', $codes);

				foreach ($cc as $v ) {
					if ($zjcode == $v) {
						switch ($v) {
						case '03':
						case '09':
							$methodid = '20601';
							break;

						case '04':
						case '08':
							$methodid = '20602';
							break;

						case '05':
						case '07':
							$methodid = '20603';
							break;

						case '06':
							$methodid = '20604';
							break;
						}

						$dataPrize = $this->DaoMethod->where('methodid=' . $methodid)->find();

						if ($mode == 1) {
							$jiangjinMode = 1;
						}
						else if ($mode == 2) {
							$jiangjinMode = 0.1;
						}
						else if ($mode == 3) {
							$jiangjinMode = 0.01;
						}

						return $dataPrize['prize'] * $jiangjinMode;
					}
				}

				break;

			case 'BJL':
				$zh = $this->kjcode[0] + $this->kjcode[1];
				$xh = $this->kjcode[3] + $this->kjcode[4];
				$zx = 0;
				$dz = 0;
				$bz = 0;
				$tw = 0;

				if ($xh < $zh) {
					$zx = 1;
				}

				if ($zh < $xh) {
					$zx = 2;
				}

				if ($zh == $xh) {
					$zx = 0;
				}

				if ($this->kjcode[0] == $this->kjcode[1]) {
					$dz = 1;
				}

				if ($this->kjcode[3] == $this->kjcode[4]) {
					$dz = 2;
				}

				if (($this->kjcode[0] == $this->kjcode[1]) && ($this->kjcode[0] == $this->kjcode[2])) {
					$bz = 1;
				}

				if (($this->kjcode[3] == $this->kjcode[4]) && ($this->kjcode[3] == $this->kjcode[2])) {
					$bz = 2;
				}

				if (($zh == 8) || ($zh == 9)) {
					$tw = 1;
				}

				if (($xh == 8) || ($xh == 9)) {
					$tw = 2;
				}

				$cc = split('\\|', $codes);
				$c0 = split('&', $cc[0]);
				$c1 = split('&', $cc[1]);
				$hprize = 0;
				$zxPrize = 0;
				$dzPrize = 0;
				$bzPrize = 0;
				$twPrize = 0;

				foreach ($c0 as $v ) {
					if (($v == '庄闲') && ($zx == 1)) {
						$dataPrize = $this->DaoMethod->where('methodid=40901')->find();
						$zxPrize = $dataPrize['prize'];
						$hprize += $dataPrize['prize'];
					}

					if (($v == '对子') && ($dz == 1)) {
						$dataPrize = $this->DaoMethod->where('methodid=40902')->find();
						$dzPrize = $dataPrize['prize'];
						$hprize += $dataPrize['prize'];
					}

					if (($v == '豹子') && ($bz == 1)) {
						$dataPrize = $this->DaoMethod->where('methodid=40903')->find();
						$bzPrize = $dataPrize['prize'];
						$hprize += $dataPrize['prize'];
					}

					if (($v == '天王') && ($tw == 1)) {
						$dataPrize = $this->DaoMethod->where('methodid=40904')->find();
						$twPrize = $dataPrize['prize'];
						$hprize += $dataPrize['prize'];
					}
				}

				foreach ($c1 as $v ) {
					if (($v == '庄闲') && ($zx == 2)) {
						if (0 < $zxPrize) {
							$hprize += $zxPrize;
						}
						else {
							$dataPrize = $this->DaoMethod->where('methodid=40901')->find();
							$hprize += $dataPrize['prize'];
						}
					}

					if (($v == '对子') && ($dz == 2)) {
						if (0 < $dzPrize) {
							$hprize += $dzPrize;
						}
						else {
							$dataPrize = $this->DaoMethod->where('methodid=40902')->find();
							$hprize += $dataPrize['prize'];
						}
					}

					if (($v == '豹子') && ($bz == 2)) {
						if (0 < $bzPrize) {
							$hprize += $bzPrize;
						}
						else {
							$dataPrize = $this->DaoMethod->where('methodid=40903')->find();
							$hprize += $dataPrize['prize'];
						}
					}

					if (($v == '天王') && ($tw == 2)) {
						if (0 < $twPrize) {
							$hprize += $twPrize;
						}
						else {
							$dataPrize = $this->DaoMethod->where('methodid=40904')->find();
							$hprize += $dataPrize['prize'];
						}
					}
				}

				if ($mode == 1) {
					$jiangjinMode = 1;
				}
				else if ($mode == 2) {
					$jiangjinMode = 0.1;
				}
				else if ($mode == 3) {
					$jiangjinMode = 0.01;
				}

				return $hprize * $jiangjinMode;
				break;
			}
		}

		if ($isZJ == true) {
			return $prize;
		}
		else {
			return 0;
		}
	}

	public function isBaoZi($qh)
	{
		if ($qh == 'q') {
			if (($this->kjcode[0] == $this->kjcode[1]) && ($this->kjcode[1] == $this->kjcode[2])) {
				return true;
			}
		}

		if ($qh == 'z') {
			if (($this->kjcode[1] == $this->kjcode[2]) && ($this->kjcode[2] == $this->kjcode[3])) {
				return true;
			}
		}

		if ($qh == 'h') {
			if (($this->kjcode[2] == $this->kjcode[3]) && ($this->kjcode[3] == $this->kjcode[4])) {
				return true;
			}
		}

		return false;
	}

	public function isZuSan($qh)
	{
		if ($this->isBaoZi($qh)) {
			return false;
		}

		if ($qh == 'q') {
			if (($this->kjcode[0] == $this->kjcode[1]) || ($this->kjcode[0] == $this->kjcode[2]) || ($this->kjcode[1] == $this->kjcode[2])) {
				return true;
			}
			else {
				return false;
			}
		}

		if ($qh == 'z') {
			if (($this->kjcode[1] == $this->kjcode[2]) || ($this->kjcode[1] == $this->kjcode[3]) || ($this->kjcode[2] == $this->kjcode[3])) {
				return true;
			}
			else {
				return false;
			}
		}

		if ($qh == 'h') {
			if (($this->kjcode[2] == $this->kjcode[3]) || ($this->kjcode[2] == $this->kjcode[4]) || ($this->kjcode[3] == $this->kjcode[4])) {
				return true;
			}
			else {
				return false;
			}
		}
	}

	public function isZuLiu($qh)
	{
		if ($this->isBaoZi($qh)) {
			return false;
		}

		if ($this->isZuSan($qh)) {
			return false;
		}
		else {
			return true;
		}
	}

	public function getHHZXprize($qh, $userfd, $step, $mode)
	{
		$prize = 0;

		if ($this->isBaoZi($qh)) {
			return 0;
		}

		if ($this->isZuSan($qh)) {
			switch ($this->lotteryid) {
			case 1:
			case 2:
			case 3:
			case 4:
				if (empty($this->ssc_zus_prize)) {
					$Where['methodid'] = '18';
					$data = $this->DaoMethod->where($Where)->find();
					$this->ssc_zus_prize = $data['prize'];
					$prize = $this->getPrizePoint($data['prize'], $userfd, $step);
				}
				else {
					$prize = $this->getPrizePoint($this->ssc_zus_prize, $userfd, $step);
				}

				break;

			case 5:
			case 6:
			case 7:
			case 8:
			case 11:
				if (empty($this->sy115_zus_prize)) {
					$Where['methodid'] = '166';
					$data = $this->DaoMethod->where($Where)->find();
					$this->sy115_zus_prize = $data['prize'];
					$prize = $this->getPrizePoint($data['prize'], $userfd, $step);
				}
				else {
					$prize = $this->getPrizePoint($this->sy115_zus_prize, $userfd, $step);
				}

				break;

			case 9:
				$Where['methodid'] = '296';
				$data = $this->DaoMethod->where($Where)->find();
				$prize = $this->getPrizePoint($data['prize'], $userfd, $step);
				break;

			case 10:
				$Where['methodid'] = '324';
				$data = $this->DaoMethod->where($Where)->find();
				$prize = $this->getPrizePoint($data['prize'], $userfd, $step);
				break;
			}
		}
		else {
			switch ($this->lotteryid) {
			case 1:
			case 2:
			case 3:
			case 4:
				if (empty($this->ssc_zul_prize)) {
					$Where['methodid'] = '19';
					$data = $this->DaoMethod->where($Where)->find();
					$this->ssc_zul_prize = $data['prize'];
					$prize = $this->getPrizePoint($data['prize'], $userfd, $step);
				}
				else {
					$prize = $this->getPrizePoint($this->ssc_zul_prize, $userfd, $step);
				}

				break;

			case 5:
			case 6:
			case 7:
			case 8:
			case 11:
				if (empty($this->sy115_zul_prize)) {
					$Where['methodid'] = '167';
					$data = $this->DaoMethod->where($Where)->find();
					$this->sy115_zul_prize = $data['prize'];
					$prize = $this->getPrizePoint($data['prize'], $userfd, $step);
				}
				else {
					$prize = $this->getPrizePoint($this->sy115_zul_prize, $userfd, $step);
				}

				break;

			case 9:
				$Where['methodid'] = '297';
				$data = $this->DaoMethod->where($Where)->find();
				$prize = $this->getPrizePoint($data['prize'], $userfd, $step);
				break;

			case 10:
				$Where['methodid'] = '325';
				$data = $this->DaoMethod->where($Where)->find();
				$prize = $this->getPrizePoint($data['prize'], $userfd, $step);
				break;
			}
		}

		if ($mode == 1) {
			$_obfuscate_JnEE2xMbLNa8uY = 1;
		}
		else if ($mode == 2) {
			$_obfuscate_JnEE2xMbLNa8uY = 0.1;
		}
		else if ($mode == 3) {
			$_obfuscate_JnEE2xMbLNa8uY = 0.01;
		}

		return $prize * $_obfuscate_JnEE2xMbLNa8uY;
	}

	public function getPrizePoint($bouns, $userfd, $sliderStep)
	{
		$jiangjin = 0;
		$baseBouns = 1800;
		$_obfuscate_A2xlY0XR4316xw44P6rG = round($bouns / $baseBouns / 10, 2);
		$_obfuscate_EHEAIfHK0h0O = $sliderStep;
		$step = 0;

		if ($_obfuscate_EHEAIfHK0h0O < $baseBouns) {
			$step = ($baseBouns - $_obfuscate_EHEAIfHK0h0O) / 10;
			$jiangjin = $bouns - ($step * $_obfuscate_A2xlY0XR4316xw44P6rG);
		}

		if ($baseBouns <= $_obfuscate_EHEAIfHK0h0O) {
			$step = ($_obfuscate_EHEAIfHK0h0O - $baseBouns) / 10;
			$_obfuscate_TBR8Ku9F6Q = $userfd / 0.5;
			$step = ($_obfuscate_TBR8Ku9F6Q < $step ? $_obfuscate_TBR8Ku9F6Q : $step);
			$jiangjin = $bouns + ($step * $_obfuscate_A2xlY0XR4316xw44P6rG);
		}

		return round($jiangjin, 2);
	}
}


?>
