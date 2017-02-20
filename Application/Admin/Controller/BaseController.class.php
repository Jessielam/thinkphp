<?php
namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller {
	public function __construct(){
		//必须先调用父类的构造函数
		parent::__construct();

		//判断登录
		if(!session('id')){
			$this->error('必须先登录！',U('Login/login'));
		}

		//所有的管理员都恶意进入到后台的首页
		if(CONTROLLER_NAME=='Index'){
			return TRUE;
		}

		$priModel = D('Privilege');
		if(!$priModel->chkPri()){
			$this->error('抱歉，你无权访问!');
		}
	}
}