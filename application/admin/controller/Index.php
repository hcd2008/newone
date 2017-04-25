<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;

class Index extends Common
{
	/**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
	protected $codeModel;
	protected $lotteryid;
	protected $kjcode = array();
	protected $DaoOrder;
	protected $DaoUser;
	protected $DaoAccount;
	protected $DaoMethod;
	private $lt_method;
	private $issue;
	private $isAuto = false;
	private $fool = array();
	private $data = array(5, 4, 3, 2, 1);
	private $result = array();
	private $dlName = array();
	private $dlNameMoney = array();
	private $dataAcc = array();

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

	public function search($keyWord, $stack)
	{
		foreach ($stack as $_obfuscate_Vwty => $val ) {
			if ($_obfuscate_Vwty === $keyWord) {
				return true;
			}
		}

		return false;
	}

	public function index()
	{
		return $this->fetch();
		return NULL;
		$this->kjcode = explode(',', '03,04,06,11,08');
		$codes = '01&03&04&05&06&07&08&09&11';
		$CC = explode('&', $codes);
		$zs = count($CC);
		$this->data = $CC;
		$mem = array();
		$this->result = array();
		$this->com($zs, 8, $mem, 0, 0, 0);
		$_obfuscate_BD8AN9mRKUt1 = 0;
		dump($this->result);

		foreach ($this->result as $v ) {
			$_obfuscate_cw_Z6iv8YQ = 0;

			foreach ($this->kjcode as $_obfuscate_4ppB ) {
				if (in_array($_obfuscate_4ppB, $v)) {
					$_obfuscate_cw_Z6iv8YQ++;
				}
			}

			if ($_obfuscate_cw_Z6iv8YQ == 5) {
				$_obfuscate_BD8AN9mRKUt1++;
			}
		}

		dump($_obfuscate_BD8AN9mRKUt1);

		if (0 < $_obfuscate_BD8AN9mRKUt1) {
			return 1 * $_obfuscate_BD8AN9mRKUt1;
		}
	}

	public function checkEnv()
	{
	}
}


?>
