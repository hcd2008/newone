<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use think\Cache;
use app\index\org\Zqpage;

class UpdateOrder extends Common
{
	public $param=array();
	public function _initialize(){
		$this->param=$this->request->param();
	}
	public function deleteAccount()
	{
		return NULL;
		$id =$this->param['items'];
		$Dao = Db::name('Orderinfo');

		if (0 < count($id)) {
			$map['id'] = array('in', $id);
			$Result = $Dao->where($map)->find();

			if (!$Result) {
				$this->error('Non-existed record!');
			}

			if ($Dao->where($map)->delete()) {
				$this->success('删除数据成功');
			}
			else {
				$this->error('删除数据失败');
			}
		}
		else {
			$this->error('非法操作');
		}
	}

	public function index()
	{
		$DaoUpOrder = Db::name('Orderinfo');
		// import('@.ORG.ZQPage');
		$listRows = 30;
		$count = $DaoUpOrder->count();
		$p = new Zqpage($count, $listRows);
		$data = $DaoUpOrder->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select();
		$formatOrder = array();
		$newLmData = Cache::get('newLmData');

		if (empty($newLmData)) {
			$newLmData = array();
			$lmdata = Db::query('SELECT l.lotteryid,l.lotteryname,m.methodid,m.methodname FROM `jiang_lottery` as l,`jiang_method` as m  WHERE l.lotteryid=m.lotteryid ;');

			foreach ($lmdata as $v ) {
				$newLmData[$v['methodid']] = $v;
			}

			Cache::set('newLmData', $newLmData, 3600 * 24);
		}

		foreach ($data as $k => $v ) {
			$lottery = $newLmData[$v['methodid']];
			$v['lotteryname'] = $lottery['lotteryname'];
			$v['methodname'] = $lottery['methodname'];
			$code = $v['code'];

			if (strpos($code, '|') !== false) {
				$code = str_replace('|', ',', $code);
				$code = str_replace('&', '', $code);
			}
			else {
				$code = str_replace('&', ',', $code);
			}

			if (22 < strlen($code)) {
				$code = substr($code, 0, 22) . '......';
			}

			$v['codes'] = $code;
			$formatOrder[$k] = $v;
		}

		$page = $p->show();
		$this->assign('page', $page);

		if (0 < $count) {
			$this->message = 1;
		}
		$this->assign('orderList', $formatOrder);
		return $this->fetch();
	}

	public function orderinfo()
	{
		$id = $this->param['id'];
		$ordernum = $this->param['ordernum'];
		if (empty($id) && empty($ordernum)) {
			$this->error('参数有误');
		}

		$DaoOrder = Db::name('Order');
		$where['ordernum'] = $ordernum;
		$data = $DaoOrder->where($where)->find();

		if (empty($data)) {
			$this->error('该订单不存在');
		}

		$newLmData = Cache::get('newLmData');

		if (empty($newLmData)) {
			$newLmData = array();
			$Dao = m();
			$lmdata = $Dao->query('SELECT l.lotteryid,l.lotteryname,m.methodid,m.methodname FROM `jiang_lottery` as l,`jiang_method` as m  WHERE l.lotteryid=m.lotteryid ;');

			foreach ($lmdata as $v ) {
				$newLmData[$v['methodid']] = $v;
			}

			Cache::set('newLmData', $newLmData, 3600 * 24);
		}

		$DaoMethod = Db::name('Method');
		$lotteryid = $data['lotteryid'];
		$where_m['lotteryid'] = $lotteryid;
		$dataMethod = $DaoMethod->where($where_m)->select();
		$this->assign('methodnameall', $dataMethod);
		$lottery = $newLmData[$data['methodid']];
		$Tpl['state'] = $this->getState($data['state']);
		$Tpl['username'] = $data['username'];
		$Tpl['cnname'] = $lottery['lotteryname'];
		$Tpl['methodid'] = $lottery['methodid'];
		$Tpl['methodname'] = $lottery['methodname'];
		$code = $data['codes'];
		$Tpl['nocode'] = ($data['kjcode'] == NULL ? '' : $data['kjcode']);
		$Tpl['totalprice'] = sprintf('%.3f', $data['money']);
		$Tpl['ordernum'] = $data['ordernum'];
		$Tpl['taskid'] = $data['traceif'];
		$Tpl['tracenum'] = $data['tracenum'];
		$Tpl['multiple'] = $data['beishu'];
		$Tpl['modes'] = $data['mode'];
		$Tpl['writetime'] = $data['addtime'];
		$Tpl['issue'] = $data['issue'];
		$Tpl['bonus'] = $data['prize'];
		$Tpl['dypointdec'] = sprintf('%.2f', $data['prize']) . '-' . $data['point'] . '%';
		$Tpl['code'] = $code;

		if ($data['mode'] == 1) {
			$mode = '元';
		}
		else if ($data['mode'] == 2) {
			$mode = '角';
		}
		else if ($data['mode'] == 3) {
			$mode = '分';
		}

		$Tpl['beishuMode'] = $data['beishu'] . '倍,' . $data['step'] . '模式;' . $mode;
		$Tpl['id'] = $data['id'];
		$Tpl['zjprize'] = sprintf('%.3f', $data['zjprize']);

		if ($data['traceif'] == '1') {
			$Tpl['showtrace'] = '';
		}
		else {
			$Tpl['showtrace'] = 'none';
		}

		$DaoUpOrder = Db::name('Orderinfo');
		$dupWhere['id'] = $id;
		$datadup = $DaoUpOrder->where($dupWhere)->find();
		$Tpl['ylcode'] = $datadup['code'];
		$this->assign($Tpl);
		return $this->fetch();
	}

	public function getState($v)
	{
		$str = '';

		switch ($v) {
		case 0:
			$str = '未开奖';
			break;

		case 1:
			$str = '<font color=\'red\'>已中奖</font>';
			break;

		case 2:
			$str = '未中奖';
			break;

		case 3:
			$str = '已撤单';
			break;

		case 4:
			$str = '本人撤单';
			break;

		case 5:
			$str = '管理员撤单';
			break;

		case 6:
			$str = '开错奖撤单';
			break;

		case 7:
			$str = '系统撤单';
			break;

		default:
			$str = '未开奖';
			break;
		}

		return $str;
	}
}


?>
