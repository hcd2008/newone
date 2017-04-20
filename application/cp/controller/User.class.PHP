<?php
namespace app\cp\controller;
use think\Db;
use think\Session;
use think\Controller;
class User extends Controller
{
	private $username;
	private $DaoUser;

	public function __construct($username)
	{
		$this->setUsername($username);
		$this->DaoUser = 'user';
	}

	private function setUsername($username)
	{
		$this->username = $username;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getUserNameById($id)
	{
		// $Dao = d('User');
		$Where['id'] = $id;
		$data =Db::name('user')->where($Where)->find();
		return $data['username'];
	}

	public function isDaiLi($username)
	{
		if (empty($username)) {
			$username = $this->getUsername();
		}

		$where['username'] = $username;
		$data = Db::name($this->DaoUser)->where($where)->find();

		if ($data['usertype'] == 1) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getIdByUserName($username)
	{
		// $Dao = d('User');
		$Where['username'] = $username;
		$data =  Db::name($this->DaoUser)->where($Where)->find();
		return $data['id'];
	}

	public function getNickname()
	{
		$username = $this->getUsername();
		$Where['username'] = $username;
		$data =  Db::name($this->DaoUser)->where($Where)->find();
		return $data['nickname'];
	}

	public function getFd($username)
	{
		if (empty($username)) {
			$username = $this->getUsername();
		}

		$where['username'] = $username;
		$data = Db::name($this->DaoUser)->where($where)->find();
		return $data['rate_1'];
	}

	public function getMoney($username)
	{
		if (empty($username)) {
			$username = $this->getUsername();
		}

		$where['username'] = $username;
		$data =  Db::name($this->DaoUser)->field('money')->where($where)->find();
		return round($data['money'], 4);
	}

	public function setMoney($money)
	{
		if (is_numeric($money)) {
			$username = $this->getUsername();
			$data['money'] = $money;

			if ( Db::name($this->DaoUser)->where(array('username' => $username))->update($data)) {
				return true;
			}
		}

		return false;
	}

	public function setDecMoney($money)
	{
		if (is_numeric($money)) {
			$username = $this->getUsername();
			$usermoney = $this->getMoney();

			if (($usermoney - $money) < 0) {
				return false;
			}

			if ( Db::name($this->DaoUser)->where('username',$username)->setDec('money', $money)) {
				return true;
			}
		}

		return false;
	}

	public function setIncMoney($money)
	{
		if (is_numeric($money)) {
			// $Dao = d('User');
			$username = $this->getUsername();

			if (Db::name($this->DaoUser)->where('username',$username)->setInc('money',$money)) {
				return true;
			}
		}

		return false;
	}

	public function isLock()
	{
		$username = $this->getUsername();
		// $Dao = d('User');
		$Where['username'] = $username;
		$data = Db::name($this->DaoUser)->field('lock')->where($Where)->find();

		if ('1' == $data['lock']) {
			return true;
		}

		return false;
	}

	public function isDongJie()
	{
		$username = $this->getUsername();
		// $Dao = d('User');
		$Where['username'] = $username;
		$data = Db::name($this->DaoUser)->field('state')->where($Where)->find();

		if ('0' == $data['state']) {
			return true;
		}

		return false;
	}

	public function getRegFrom($val, $name)
	{
		if (empty($name)) {
			$username = $this->getUsername();
		}
		else {
			$username = $name;
		}

		// $Dao = d('User');

		switch ($val) {
		case 1:
			$where['username'] = array('eq', $username);
			break;

		case 2:
			$where['regfrom'] = array('like', '%|' . $username . '|');
			break;

		case 3:
			$where['regfrom'] = array('like', '%|' . $username . '|%');
			break;

		case 4:
			$where['regfrom'] = array('like', '%|' . $username . '|%');
			$where['username'] = array('eq', $username);
			$where['_logic'] = 'or';
			break;

		default:
			$where['username'] = array('eq', $username);
			break;
		}

		$regusername = array();
		$data = Db::name($this->DaoUser)->field('username')->where($where)->select();

		foreach ($data as $k => $v ) {
			$regusername[] = $v['username'];
		}

		return $regusername;
	}

	public function isRegFanWei($uname, $sessionname)
	{
		if (empty($sessionname)) {
			$sessionname = $this->getUsername();
		}

		if ($uname == $sessionname) {
			return true;
		}

		// $Dao = d('User');
		$where['username'] = $uname;
		$data = Db::name($this->DaoUser)->field('regfrom')->where($where)->find();
		$regfrom = $data['regfrom'];

		if (preg_match('/\\|' . $sessionname . '\\|/i', $regfrom)) {
			return true;
		}

		return false;
	}

	public function doCountReg($uname)
	{
		$Where['username'] = array('eq', $uname);
		// $Dao = d('User');
		$datauser = Db::name($this->DaoUser)->where($Where)->find();
		$id = $datauser['id'];
		$wh['regfrom'] = array('like', '%|' . $uname . '|%');
		$_obfuscate_vADHpHDZUAUx = Db::name($this->DaoUser)->field('username')->where($wh)->count();
		$returnData = array();
		$returnData['id'] = $id;
		$returnData['count'] = $_obfuscate_vADHpHDZUAUx;
		return $returnData;
	}

	public function getZhiJinPwd($uname)
	{
		if (empty($uname)) {
			$uname = $this->getUsername();
		}

		// $Dao = d('User');
		$where['username'] = $uname;
		$data = Db::name($this->DaoUser)->where($where)->find();

		if (!empty($data['password2'])) {
			return $data['password2'];
		}
		else {
			return NULL;
		}
	}
}


?>
