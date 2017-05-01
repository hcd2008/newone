<?php
// +----------------------------------------------------------------------
// |  
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://lipeng.org All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Lipeng <service@lipeng.org>
// +----------------------------------------------------------------------
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;

class Misc EXTENDS Base
{
	function __construct(){
		parent::__construct();
		
	}

	public function theme_bg($i){
		cookie('theme_bg',$i,['expire'=>86400*365]);
	}
    
}
