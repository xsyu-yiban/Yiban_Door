<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2019/1/21
 * Time: 22:42
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
//api
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0, maximum-scale=1.0, user-scalable=0" />
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
    <link rel="stylesheet" href="css/join-style.css">
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
                        <li><a href="index.php">首页</a></li>
                        <li><a href="about-yiban.php">关于易班</a></li>
                        <li><a href="http://www.yiban.cn/Org/orglistShow/type/forum/puid/5000084" target="_blank">微社区</a></li>
                        <li><a href="https://xueyuan.yooc.me/" target="_blank">易班学院</a></li>
                        <li><a href="https://daxue.yooc.me/" target="_blank">易班大学</a></li>
                        <li><a href="https://www.yooc.me/groups" target="_blank">YOOC课群</a></li>
                        <li><a href="work-file.php">工作文件</a></li>
                        <li class="active"><a href="#">加入我们</a></li>
                    </ul></nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="w960 mt20">
                    <div id="processor" >
                        <ol class="processorBox oh">
                            <li class="current">
                                <div class="step_inner fl">
                                    <span class="icon_step">1</span>
                                    <h4>填写岗位信息</h4>
                                </div>
                            </li>
                            <li>
                                <div class="step_inner fr">
                                    <span class="icon_step">2</span>
                                    <h4>提交审核</h4>
                                </div>
                            </li>
                        </ol>
                        <div class="step_line"></div>
                    </div>
                    <div class="content">
                        <div id="step1" class="step">
                            <form action="" method="post" id="step1_frm">

                                <div class="toolBar">
                                    <a id="nextBtn" class="btn btn_primary" href="javascript:;">下一步</a>
                                </div>
                            </form>
                        </div><!-- // step1 end -->
                        <div id="step2" class="step" style="display: none;">
                            <form action="" method="post" id="step3_frm">

                                <div class="toolBar">
                                    <a id="finishedBtn" class="btn btn_primary" href="javascript:;">完成</a>
                                </div>
                            </form>
                        </div><!-- // step3 end -->
                    </div>
                </div><!-- // container end -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="copyright text-center muted">Copyright © 2018-2019 XSYU_YIBAN. All Rights Reserved<br>西安石油大学易班发展中心 版权所有</p>
            </div>
        </div>
    </div>
</div>
<script>
    //显示提示框，目前三个参数(txt：要显示的文本；time：自动关闭的时间（不设置的话默认1500毫秒）；status：默认0为错误提示，1为正确提示；)
    function showTips(txt,time,status)
    {
        var htmlCon = '';
        if(txt != ''){
            if(status != 0 && status != undefined){
                htmlCon = '<div class="tipsBox" style="width:220px;padding:10px;background-color:#4AAF33;border-radius:4px;-webkit-border-radius: 4px;-moz-border-radius: 4px;color:#fff;box-shadow:0 0 3px #ddd inset;-webkit-box-shadow: 0 0 3px #ddd inset;text-align:center;position:fixed;top:25%;left:50%;z-index:999999;margin-left:-120px;"><img src="images/ok.png" style="vertical-align: middle;margin-right:5px;" alt="OK，"/>'+txt+'</div>';
            }else{
                htmlCon = '<div class="tipsBox" style="width:220px;padding:10px;background-color:#D84C31;border-radius:4px;-webkit-border-radius: 4px;-moz-border-radius: 4px;color:#fff;box-shadow:0 0 3px #ddd inset;-webkit-box-shadow: 0 0 3px #ddd inset;text-align:center;position:fixed;top:25%;left:50%;z-index:999999;margin-left:-120px;"><img src="images/err.png" style="vertical-align: middle;margin-right:5px;" alt="Error，"/>'+txt+'</div>';
            }
            $('body').prepend(htmlCon);
            if(time == '' || time == undefined){
                time = 1500;
            }
            setTimeout(function(){ $('.tipsBox').remove(); },time);
        }
    }

    $(function(){
        //AJAX提交以及验证表单
        $('#nextBtn').click(function(){
            //此处省略各种表单判断
            showTips('提交成功~ 即将进入下一步',2500,1);
                //此处省略 ajax 提交表单 代码...
            $('.processorBox li').removeClass('current').eq(1).addClass('current');
            $('.step').fadeOut(200).eq(1).fadeIn(500);
        });
        $('#finishedBtn').click(function(){
            //此处省略各种表单判断
            showTips('提交成功~ 请耐心等待短信信息',2500,1);
            //此处省略 ajax 提交表单 代码...
        });
    });
</script>
<script type="text/javascript" src="js/star.js"></script>
<script src="js/nav.js"></script>
</body>
