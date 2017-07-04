<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use app\index\org\Zqpage;
use app\admin\common\Qqwry;
class Config extends Common
{
	public function config()
	{
		$_obfuscate_NWXTrwqh5P_IVE_K = Db::name('Webconfig');
		$data = $_obfuscate_NWXTrwqh5P_IVE_K->find();
		$this->assign($data);
		return $this->fetch();
	}

	public function updateWebconfig()
	{
		$_obfuscate_NWXTrwqh5P_IVE_K = Db::name('Webconfig');
		$data = $_obfuscate_NWXTrwqh5P_IVE_K->create();
		if (((($data['rateid'] * 100) % 10) != 0) || ((($data['ratemax'] * 100) % 10) != 0) || ((($data['regrate'] * 100) % 10) != 0)) {
			$this->error('所有返点项目只能为0.1的倍数');
		}

		if (!$data) {
			$this->error($_obfuscate_NWXTrwqh5P_IVE_K->getError());
		}

		if ($_obfuscate_NWXTrwqh5P_IVE_K->update($data)) {
			$this->success('修改成功!');
		}
		else {
			$this->error('修改失败!');
		}
	}

	public function jiazj()
	{
		$_obfuscate_5NSx8HRIeCfVeg = Db::name('lottery');
		$dataLottery = $_obfuscate_5NSx8HRIeCfVeg->select();
		$this->assign('lottery', $dataLottery);
		$DaoJiazj = Db::name('jiazj');
		$dataJiazj = $DaoJiazj->select();
		$this->assign('list', $dataJiazj);
		return $this->fetch();
	}

	public function addJiazj()
	{
		$DaoJiazj = Db::name('jiazj');
		$data = $DaoJiazj->create();

		if ($DaoJiazj->add($data)) {
			$this->success('添加成功!');
		}
		else {
			$this->error('添加失败!');
		}
	}

	public function deleteJiazj()
	{
		$param=$this->request->param();
		$id = $param['items'];
		$Dao = Db::name('jiazj');

		if (0 < count($id)) {
			$map['id'] = array('in', $id);
			$Result = $Dao->where($map)->find();

			if (!$Result) {
				$this->error('Non-existed record!');
			}

			if ($Dao->where($map)->delete()) {
				$this->assign('jumpUrl',url('admin/config/jiazj'));
				$this->success('删除数据成功');
			}
			else {
				$this->assign('jumpUrl', url('admin/config/jiazj'));
				$this->error('删除数据失败');
			}
		}
		else {
			$this->assign('jumpUrl', url('admin/config/jiazj'));
			$this->error('非法操作');
		}
	}

	public function editjiazj()
	{	
		$param=$this->request->param();
		$_obfuscate_5NSx8HRIeCfVeg = Db::name('lottery');
		$dataLottery = $_obfuscate_5NSx8HRIeCfVeg->select();
		$this->assign('lottery', $dataLottery);
		$id = $param['id'];
		$Where['id'] = $id;
		$DaoJiazj = Db::name('jiazj');
		$dataJiazj = $DaoJiazj->where($Where)->find();
		$this->assign('dataJiazj', $dataJiazj);
		return $this->fetch();
	}

	public function updateJiazj()
	{
		$DaoJiazj = Db::name('jiazj');
		$data = $DaoJiazj->create();

		if ($DaoJiazj->update($data)) {
			$this->assign('jumpUrl', '__URL__/jiazj');
			$this->success('更新成功!');
		}
		else {
			$this->error('更新失败!');
		}
	}

	public function gonggao()
	{
		$Daogonggao = Db::name('Gonggao');
		$data = $Daogonggao->order('addtime desc')->select();
		$this->assign('list', $data);
		return $this->fetch();
	}

	public function addGonggao()
	{
		$param=$this->request->param();
		$id = $param['id'];

		if (empty($id)) {
			$this->assign('id', 0);
		}
		else {
			if (!is_numeric($id)) {
				$this->error('参数有误!');
			}

			$this->assign('id', $id);
			$Daogonggao = Db::name('Gonggao');
			$where['id'] = $id;
			$data = $Daogonggao->where($where)->find();

			if (!$data) {
				$this->error('参数有误!');
			}

			$this->assign('title', $data['title']);
			$this->assign('content', $data['content']);
		}

		return $this->fetch();
	}

	public function insertGonggao()
	{
		$id = $param['id'];
		if (is_null($id) || !is_numeric($id)) {
			$this->error('参数有误!');
		}

		$Daogonggao = d('Gonggao');
		if (empty($param['title']) || empty($param['content']) || empty($param['addtime'])) {
			$this->error('标题、时间和内容不能为空!');
		}

		if ($id == '0') {
			$data['title'] = $param['title'];
			$data['content'] = $param['content'];
			$data['addtime'] = $param['addtime'];

			if ($Daogonggao->data($data)->add()) {
				$this->assign('jumpUrl', 'gonggao');
				$this->success('新增成功!');
			}
			else {
				$this->error('新增失败!');
			}
		}
		else {
			$data['id'] = $param['id'];
			$data['title'] = $param['title'];
			$data['content'] = $param['content'];
			$data['addtime'] = $param['addtime'];

			if ($Daogonggao->data($data)->save()) {
				$this->assign('jumpUrl', 'gonggao');
				$this->success('更新成功!');
			}
			else {
				$this->error('更新失败!');
			}
		}
	}

	public function delete()
	{
		$param=$this->request->param();
		$id = $param['items'];
		$Dao = Db::name('Gonggao');

		if (0 < count($id)) {
			$map['id'] = array('in', $id);
			$Result = $Dao->where($map)->find();

			if (!$Result) {
				$this->error('Non-existed record!');
			}

			if ($Dao->where($map)->delete()) {
				$this->assign('jumpUrl', url('admin/config/gonggao'));
				$this->success('删除数据成功');
			}
			else {
				$this->assign('jumpUrl', url('admin/config/gonggao'));
				$this->error('删除数据失败');
			}
		}
		else {
			$this->assign('jumpUrl', url('admin/config/gonggao'));
			$this->error('非法操作');
		}
	}

	public function bank()
	{
		$DaoBank = Db::name('Bank');
		$dataBank = $DaoBank->select();
		$this->assign('banklist', $dataBank);
		return $this->fetch();
	}

	public function updateBabnk()
	{
		$param=$this->request->param();
		$id = $param['id'];
		$banknum = $param['banknum'];
		$shoukuanname = $param['shoukuanname'];

		if (!is_array($id)) {
			$this->error('参数有误!');
		}

		$DaoBank = Db::name('Bank');

		foreach ($id as $_obfuscate_Vwty => $v ) {
			$state = $param['state' . $v];
			if (($state == '2') || ($state == '3')) {
				if (empty($banknum[$_obfuscate_Vwty]) || empty($shoukuanname[$_obfuscate_Vwty])) {
					$data['state'] = 1;
				}
				else {
					$data['state'] = $state;
				}
			}
			else {
				$data['state'] = $state;
			}

			$data['id'] = $v;
			$data['banknum'] = $banknum[$_obfuscate_Vwty];
			$data['shoukuanname'] = $shoukuanname[$_obfuscate_Vwty];
			$DaoBank->save($data);
		}

		$this->success('操作成功!');
	}

	public function showLoginInfo()
	{
		$param=$this->request->param();
		$usertype = $param['usertype'];
		$this->assign('usertype', $usertype);
		$my_search = isset($param['my_search'])?$param['my_search']:0;

		if (empty($my_search)) {
			$my_search = array();
		}

		$condition = array_filter($my_search, 'value_filter');
		$starttime = isset($param['starttime'])?$param['starttime']:0;
		$endtime = isset($param['endtime'])?$param['endtime']:0;
		if (!empty($starttime) && !empty($endtime)) {
			// $condition['addtime'] = array(
			// 	array('gt', $starttime),
			// 	array('lt', $endtime),
			// 	'and'
			// 	);
			$condition['addtime'] = array('between time',[$starttime,$endtime]);
		}

		$condition['usertype'] = $usertype;
		if ((@$condition['username'] == 'jiang') && ($condition['logip'] == '100')) {
			unset($condition['logip']);
			$condition['usertype'] = 100;
		}

		$DaoLogin = Db::name('Login');
		// import('@.ORG.ZQPage');
		$listRows = 30;
		$count = $DaoLogin->where($condition)->count();
		$p = new Zqpage($count, $listRows);
		$dataLogin = $this->formatLogip($DaoLogin->where($condition)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select());
		$this->assign('loginlist', $dataLogin);
		$page = $p->show();
		$this->assign('page', $page);
		$this->assign('starttime',$starttime);
		$this->assign('endtime',$endtime);
		return $this->fetch();
	}

	public function formatLogip($orderList)
	{
		$param=$this->request->param();
		$formatOrder = array();
		// import('@.ORG.Qqwry');
		$_obfuscate_0g3oAKg = new Qqwry();

		foreach ($orderList as $k => $v) {
			$_obfuscate_0g3oAKg->qqwry($v['logip']);
			$didian = iconv('GB2312', 'UTF-8', $_obfuscate_0g3oAKg->Country);
			$v['didian'] = $didian;
			$formatOrder[$k] = $v;
		}

		return $formatOrder;
	}

	public function deleteLogip()
	{
		$param=$this->request->param();
		$id = $_REQUEST['items'];
		$Dao = Db::name('Login');

		if (0 < count($id)) {
			$map['id'] = array('in', $id);
			$Result = $Dao->where($map)->find();

			if (!$Result) {
				$this->error('Non-existed record!');
			}

			if ($Dao->where($map)->delete()) {
				$this->assign('jumpUrl', '__URL__/showLoginInfo/usertype/1');
				$this->success('删除数据成功');
			}
			else {
				$this->assign('jumpUrl', '__URL__/showLoginInfo/usertype/1');
				$this->error('删除数据失败');
			}
		}
		else {
			$this->assign('jumpUrl', '__URL__/showLoginInfo/usertype/1');
			$this->error('非法操作');
		}
	}

	public function admin()
	{
		$DaoAdmin = Db::name('Admin');
		$dataAdmin = $DaoAdmin->select();
		$this->assign('list', $dataAdmin);
		return $this->fetch();
	}

	public function addAdmin()
	{
		$username = $param['username'];
		$password = $param['password'];
		$password2 = $param['password2'];
		if (empty($username) || empty($password)) {
			$this->error('用户名与密码不能为空');
		}

		if ($password != $password2) {
			$this->error('密码确认不正确');
		}

		$DaoAdmin = Db::name('Admin');
		$where['username'] = $username;
		$dataAdmin = $DaoAdmin->where($where)->find();

		if ($dataAdmin) {
			$this->error('该帐户名已经存在');
		}

		$data['username'] = $username;
		$data['password'] = md5($password);
		$data['addtime'] = date('Y-m-d H:i:s');

		if ($DaoAdmin->add($data)) {
			$this->success('添加成功');
		}
		else {
			$this->error('添加失败');
		}
	}

	public function deleteAdmin()
	{
		$id = $_REQUEST['items'];
		$Dao = Db::name('Admin');

		if (0 < count($id)) {
			$map['id'] = array('in', $id);
			$Result = $Dao->where($map)->find();

			if (!$Result) {
				$this->error('Non-existed record!');
			}

			if ($Dao->where($map)->delete()) {
				$this->assign('jumpUrl', __URL__ / admin);
				$this->success('删除数据成功');
			}
			else {
				$this->assign('jumpUrl', __URL__ / admin);
				$this->error('删除数据失败');
			}
		}
		else {
			$this->assign('jumpUrl', __URL__ / admin);
			$this->error('非法操作');
		}
	}
}


?>
