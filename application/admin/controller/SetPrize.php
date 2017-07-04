<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use think\Config;
class SetPrize extends Common
{
	private $param;
	public function _initialize()
	{
		
		$this->param=$this->request->param();
		// $isAutoDuo = isset($this->request->param(['isAutoDuo']))?$this->request->param['isAutoDuo']:false;
	}
	public function index()
	{
		$lotteryid = $this->param['lotteryid'];
		$_obfuscate_obqvewA = '';
		$action = '';
		$data = NULL;

		switch ($lotteryid) {
		case 1:
			$_obfuscate_obqvewA = '时时彩奖金';
			$action = 'updateSsc';
			$data = $this->setSsc();
			break;

		case 5:
			$_obfuscate_obqvewA = '时时乐奖金';
			$action = 'updateSsl';
			$data = $this->setSsl();
			break;

		case 6:
			$_obfuscate_obqvewA = '11选5奖金';
			$action = 'update115';
			$data = $this->set115();
			break;

		case 9:
			$_obfuscate_obqvewA = '3D奖金';
			$action = 'update3D';
			$data = $this->set3D();
			break;

		case 10:
			$_obfuscate_obqvewA = '排3、5奖金';
			$action = 'updatePls';
			$data = $this->setPls();
			break;

		case 13:
			$_obfuscate_obqvewA = '六合彩奖金';
			$action = 'updateLhc';
			$data = $this->setLhc();
			break;
		}
		$this->assign('lotteryid',$lotteryid);
		$this->assign('title', $_obfuscate_obqvewA);
		$this->assign('action', $action);
		$this->assign('prize', $data);
		return $this->fetch();
	}

	public function setSsc()
	{
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = 1;
		$dataMethod = $_obfuscate_ehDu7EJ4I57R->where($Where)->select();

		if ($dataMethod) {
			return $dataMethod;
		}
	}

	public function setLhc()
	{
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = 13;
		$dataMethod = $_obfuscate_ehDu7EJ4I57R->where($Where)->select();

		if ($dataMethod) {
			return $dataMethod;
		}
	}

	public function updateSsc()
	{
		$methodname = $this->param['methodname'];
		$prize = $this->param['prize'];
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = array(
			'in',
			array(1, 2, 3, 4)
			);

		foreach ($prize as $k => $v ) {
			if (!is_numeric($v)) {
				continue;
			}

			$data['prize'] = $v;
			$Where['methodname'] = $methodname[$k];
			$_obfuscate_ehDu7EJ4I57R->where($Where)->update($data);
		}

		$this->success('更新成功');
	}

	public function updateLhc()
	{
		$methodname = $this->param['methodname'];
		$prize = $this->param['prize'];
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = 13;

		foreach ($prize as $k => $v ) {
			if (!is_numeric($v)) {
				continue;
			}

			$data['prize'] = $v;
			$Where['methodname'] = $methodname[$k];
			$_obfuscate_ehDu7EJ4I57R->where($Where)->update($data);
		}

		$this->success('更新成功');
	}

	public function setSsl()
	{
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = 5;
		$dataMethod = $_obfuscate_ehDu7EJ4I57R->where($Where)->select();

		if ($dataMethod) {
			return $dataMethod;
		}
	}

	public function updateSsl()
	{
		$methodname = $this->param['methodname'];
		$prize = $this->param['prize'];
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = array(
			'in',
			array(5)
			);

		foreach ($prize as $k => $v ) {
			if (!is_numeric($v)) {
				continue;
			}

			$data['prize'] = $v;
			$Where['methodname'] = $methodname[$k];
			$_obfuscate_ehDu7EJ4I57R->where($Where)->update($data);
		}

		$this->success('更新成功');
	}

	public function set115()
	{
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = 6;
		return $dataMethod = $_obfuscate_ehDu7EJ4I57R->where($Where)->select();
	}

	public function update115()
	{
		$methodname = $this->param['methodname'];
		$prize = $this->param['prize'];
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = array(
			'in',
			array(6, 7, 8, 11)
			);

		foreach ($prize as $k => $v ) {
			if (!is_numeric($v)) {
				continue;
			}

			$data['prize'] = $v;
			$Where['methodname'] = $methodname[$k];
			$_obfuscate_ehDu7EJ4I57R->where($Where)->update($data);
		}

		$this->success('更新成功');
	}

	public function set3D()
	{
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = 9;
		return $dataMethod = $_obfuscate_ehDu7EJ4I57R->where($Where)->select();
	}

	public function update3D()
	{
		$methodname = $this->param['methodname'];
		$prize = $this->param['prize'];
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = array(
			'in',
			array(9)
			);

		foreach ($prize as $k => $v ) {
			if (!is_numeric($v)) {
				continue;
			}

			$data['prize'] = $v;
			$Where['methodname'] = $methodname[$k];
			$_obfuscate_ehDu7EJ4I57R->where($Where)->update($data);
		}

		$this->success('更新成功');
	}

	public function setPls()
	{
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = 10;
		return $dataMethod = $_obfuscate_ehDu7EJ4I57R->where($Where)->select();
	}

	public function updatePls()
	{
		$methodname = $this->param['methodname'];
		$prize = $this->param['prize'];
		$_obfuscate_ehDu7EJ4I57R = Db::name('method');
		$Where['lotteryid'] = array(
			'in',
			array(10)
			);

		foreach ($prize as $k => $v ) {
			if (!is_numeric($v)) {
				continue;
			}

			$data['prize'] = $v;
			$Where['methodname'] = $methodname[$k];
			$_obfuscate_ehDu7EJ4I57R->where($Where)->update($data);
		}

		$this->success('更新成功');
	}
}


?>
