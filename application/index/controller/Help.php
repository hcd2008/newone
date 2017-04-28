<?php
namespace app\index\controller;
use app\common\controller\Base;

class Help extends Base
{
	public function game()
	{
		return $this->fetch();
	}

	public function fun()
	{
		return $this->fetch();
	}

	public function general()
	{
		return $this->fetch();
	}
}


?>
