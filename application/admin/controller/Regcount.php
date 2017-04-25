<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;

class RegCount extends Action
{
	public function getRegCount()
	{
		$_obfuscate_6ogI80pkWQ = Db::name('User');
		$Where['regcount'] = 10000;
		$data_user = $_obfuscate_6ogI80pkWQ->where($Where)->limit(100)->order('id asc')->select();

		foreach ($data_user as $v ) {
			$username = $v['username'];
			$_obfuscate_LoY33KQqUPw['regfrom'] = array('like', '%|' . $username . '|');
			$count = $_obfuscate_6ogI80pkWQ->where($_obfuscate_LoY33KQqUPw)->count();
			$where_u['username'] = $username;
			$data_u['regcount'] = $count;
			$_obfuscate_6ogI80pkWQ->where($where_u)->update($data_u);
		}
	}
}


?>
