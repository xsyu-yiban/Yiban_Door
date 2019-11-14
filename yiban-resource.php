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
$page = $_GET['page'];
$resource = $api->request('news/yb_push',array('page'=>$page,'count'=>30));
//var_dump($resource['info']['list'][0]);
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
    <link rel="stylesheet" href="css/dockmenu.css">
    <link rel="stylesheet" href="css/pageSwitch.min.css">
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
    <script type="text/javascript" src="js/dockmenu.min.js"></script>
    <link rel="stylesheet" href="css/myPagination.css">
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
                        <li><a href="about-yiban.php">关于易班</a></li>
                        <li><a href="http://www.yiban.cn/Org/orglistShow/type/forum/puid/5000084" target="_blank">微社区</a></li>
                        <li><a href="https://xueyuan.yooc.me/" target="_blank">易班学院</a></li>
                        <li><a href="https://daxue.yooc.me/" target="_blank">易班大学</a></li>
                        <li><a href="https://www.yooc.me/groups" target="_blank">YOOC课群</a></li>
                        <li><a href="">工作文件</a></li>
                        <li><a href="join-us.php">加入我们</a></li>
                    </ul></nav>
            </div>
        </div>
        <div class="title-list row">
            <b class="resource-title text-center">易班推荐资讯</b>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                <?php
                    for($i=0;$i<30;$i+=2)
                    {
                        echo "<script>";
                        echo "
                            function open_link$i()
                            {
                                window.open('";
                                echo $resource['info']['list'][$i]['push_href'];
                        echo "');
                        }";
                        echo "</script>";
                        echo "<div class='resource-list row img-rounded' onclick='open_link$i();'>";
                        echo "<img src='";
                        echo $resource['info']['list'][$i]['push_pic'];
                        echo "' class='img-rounded col-md-4'>";
                        echo "<div class='resource-content col-md-8'>";
                        echo "<b class='text-left text-info'>";
                        echo $resource['info']['list'][$i]['push_title'];
                        echo "</b>";
                        echo "<p class='resource-detail text-left'>";
                        echo $resource['info']['list'][$i]['push_summary'];
                        echo "</p>";
                        echo "<small class='resource-create-time text-muted text-left'>";
                        echo date('Y-m-d H:i:s', $resource['info']['list'][$i]['create_time']);
                        echo "</small>";
                        echo "</div></div>";
                    }
                ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        for($j=1;$j<30;$j+=2)
                        {
                            echo "<script>";
                            echo "
                            function open_link$j()
                            {
                                window.open('";
                            echo $resource['info']['list'][$j]['push_href'];
                            echo "');
                        }";
                            echo "</script>";
                            echo "<div class='resource-list row img-rounded' onclick='open_link$j();'>";
                            echo "<img src='";
                            echo $resource['info']['list'][$j]['push_pic'];
                            echo "' class='img-rounded col-md-4'>";
                            echo "<div class='resource-content col-md-8'>";
                            echo "<b class='text-left text-info'>";
                            echo $resource['info']['list'][$j]['push_title'];
                            echo "</b>";
                            echo "<p class='resource-detail text-left'>";
                            echo $resource['info']['list'][$j]['push_summary'];
                            echo "</p>";
                            echo "<small class='resource-create-time text-muted text-left'>";
                            echo date('Y-m-d H:i:s', $resource['info']['list'][$j]['create_time']);
                            echo "</small>";
                            echo "</div></div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="pagination" class="pagination" style=""></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="copyright text-center muted">Copyright © 2018-2019 XSYU_YIBAN. All Rights Reserved<br>西安石油大学易班发展中心 版权所有</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/myPagination.php" charset="utf-8"></script>
<script>
    window.onload = function () {
        new Page({
            id: 'pagination',
            curPage: <?php echo $page;?>, //初始页码
            pageTotal: 10, //总页数
            pageAmount: 30, //每页多少条
            dataTotal: 300, //总共多少条数据
            pageSize: 5, //可选,分页个数
            showPageTotalFlag: true, //是否显示数据统计
            showSkipInputFlag: true, //是否支持跳转
            getPage: function (page) {
                //获取当前页数
                window.location.href= 'http://132.232.110.129/Yiban_Door/yiban-resource.php?page='+page;
            }
        })
    }
</script>
<script type="text/javascript" src="js/star.js"></script>
<script src="js/nav.js"></script>
</body>
