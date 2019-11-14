<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2019/1/21
 * Time: 18:08
 */

/**
 * 包含SDK
 */
require("classes/yb-globals.inc.php");

// 配置文件
require_once 'config.php';

//初始化配置信息，并获取token
//初始化变量
//初始化配置信息，并获取token
$api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
$au  = $api->getAuthorize();

//网站接入获取access_token，未授权则跳转至授权页面
if($_COOKIE["yb_token"]){
    $token = $_COOKIE["yb_token"];
}
else {
    $info = $au->getToken();
    if (!$info['status']) {//授权失败
        echo $info['msg'];
        die;
    }
    $token = $info['token'];//网站接入获取的token
}

if($token == true){
    setcookie("yb_token",$token, time()+3600*24);
}
$api->bind($token);
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0, maximum-scale=1.0, user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title>石大易门户</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <?php
    $hour =  date('H');
    if($hour > 6 && $hour < 18)
        echo "<link rel='stylesheet' type='text/css' href='css/style-light.css'>";
    else
        echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
    ?>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stylepc.css">
</head>
<body>
<div class="page">
    <div class="star comet"></div>
    <div class="download-qrcode">
        <h4 >移动App下载</h4>
        <img class="qrcode-img" src="images/down-code.png">
    </div>
    <div class="qrcode">
        <h4 >易班官方微信</h4>
        <img class="qrcode-img" src="images/qrcode.jpg">
        <h5>扫一扫关注我们</h5>
    </div>
<div class="container">
    <div class="row" style="margin-bottom: 25px;">
        <div class="col-md-1"><img class="logo" src="images/logo.png"></div>
        <div class="col-md-2" style="border-right: 1px solid #efefef; border-radius: 2px;"><h2>石大易门户</h2></div>
        <div class="col-md-9" style="padding-left: 15px; padding-right: 0px;">
            <nav><ul>
                    <li class="active"><a href="index.php">首页</a></li>
                    <li><a href="#">关于易班</a></li>
                    <li><a href="http://www.yiban.cn/Org/orglistShow/type/forum/puid/5000084" target="_blank" >微社区</a></li>
                    <li><a href="https://xueyuan.yooc.me/" target="_blank" >易班学院</a></li>
                    <li><a href="https://daxue.yooc.me/" target="_blank" >易班大学</a></li>
                    <li><a href="https://www.yooc.me/groups" target="_blank" >YOOC课群</a></li>
                    <li><a href="work-file.php">工作文件</a></li>
                    <li><a href="join-us.php">加入我们</a></li>
                </ul></nav>
        </div>
    </div>
    <div class="containers">
    <div class="menu">
        <h3><i class="q-menu-img positionIicon"></i>易班是什么?</h3>
        <ul class="ulmenu1">
            <li><a class="selected" href="#tab1">基础问题</a></li>
            <li><a href="#">more</a></li>
        </ul>

        <h3><i class="q-menu-doit positionIicon"></i>我校易班发展中心</h3>
        <ul class="ulmenu2">
            <li><a href="#" class="selected">发展历程</a></li>
            <li><a href="#">组织架构</a></li>
            <li><a href="#">轻应用开发</a></li>
            <li><a href="#">重要活动</a></li>
        </ul>

        <h3><i class="q-menu-three positionIicon"></i>联系我们</h3>
        <ul class="ulmenu3">
            <li><a class="selected" href="#tab1">基础问题</a></li>
            <li><a href="#">操作环境</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="menu1 menu_tab">
            <div id="tab1" class="tab active">
                <p>的数据能否保存？</p>
            </div>
            <div  id="tab2" class="tab">
                <p>This is A为什么不能反应到仪表盘？</p>
            </div>

            <div  id="tab3" class="tab">
                <p>This is Answer！12.工资处理处社保公积金都能自动计算的吗？</p>
            </div>

            <div  id="tab4" class="tab">
                <p>税收管理报表计提生成凭证后若发现计提错误还能修改吗？</p>
            </div>
        </div>

        <div class="menu2 menu_tab">
            <div id="tab-1" class="tab">

                <p>This is Answer！</p>
            </div>

            <div  id="ta-2" class="tab">

                <p>This is Answer！</p>
            </div>

            <div  id="tab-3" class="tab">

                <p>This is Answer！</p>
            </div>

            <div  id="tab-4" class="tab">

                <p>This is Answer！</p>
            </div>
        </div>

        <div class="menu3 menu_tab">
            <div id="tab-3-1" class="tab">
                <p>。。。</p>
            </div>
            <div  id="tab-3-2" class="tab">table2</div>
            <div  id="tab-3-3" class="tab">table3</div>
            <div  id="tab-3-4" class="tab">在安全与私有制使用SSL程中可能出现的窃听、篡改、伪造等行为。</div>
        </div>
    </div>
</div>
    <script type="text/javascript" src="js/pc.js"></script>
    <div class="row">
        <div class="col-md-12">
            <p class="copyright text-center muted">Copyright © 2018-2019 XSYU_YIBAN. All Rights Reserved<br>西安石油大学易班发展中心 版权所有</p>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="js/star.js"></script>
<script src="js/nav.js"></script>
</body>
</html>
