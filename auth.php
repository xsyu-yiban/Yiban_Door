<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2019/1/20
 * Time: 16:21
 */

	/**
	 * 网站接入使用Auth认证接口进行授权
	 * 授权流程先通过浏览器重定向到授权服务器取得授权码（code）后
	 * 再从服务器使用接口调用获取到对应用户的访问令牌
	 *
	 */


	/**
	 * 包含SDK
	 */
	require("./classes/yb-globals.inc.php");

	//配置文件
	require_once 'config.php';

	//初始化
	$api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
	$au  = $api->getAuthorize();

	//网站接入获取access_token，未授权则跳转至授权页面
	$info = $au->getToken();
	if(!$info['status']) {//授权失败
	    echo $info['msg'];
	    die;
	}
	$token = $info['token'];//网站接入获取的token

?>

