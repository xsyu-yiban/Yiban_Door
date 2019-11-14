<?php
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

//api
$resource = $api->request('news/yb_push',array('page'=>1,'count'=>3));
$topic = $api->request('group/organ_topic',array('organ_uid'=>5000084,'page'=>1,'count'=>8,'order'=>3));
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
<div class="xiong" onclick="window.location.href='tencent://message/?uin=2640639410&Site=http://vps.shuidazhe.com&Menu=yes'">
    <img class="xiong-img" src="images/xiong.gif">
</div>
<img class="left-left img-rounded" src="images/left-left.png">
<div class="right-box">
    <div class="func-box-1 func-box"><img class="right-img img-rounded" src="images/sign.png">签到</div>
    <div class="func-box-2 func-box"><img class="right-img img-rounded" src="images/publish.png">动态</div>
    <div class="func-box-3 func-box"><img class="right-img img-rounded" src="images/services.png">客服</div>
</div>
<div class="container">
<div class="row" style="margin-bottom: 25px;">
<div class="col-md-1"><img class="logo" src="images/logo.png"></div>
<div class="col-md-2" style="border-right: 1px solid #efefef; border-radius: 2px;"><h2>石大易门户</h2></div>
<div class="col-md-9" style="padding-left: 15px; padding-right: 0px;">
<nav><ul>
    <li class="active"><a href="#">首页</a></li>
    <li><a href="about-yiban.php">关于易班</a></li>
    <li><a href="http://www.yiban.cn/Org/orglistShow/type/forum/puid/5000084" target="_blank" >微社区</a></li>
    <li><a href="https://xueyuan.yooc.me/" target="_blank" >易班学院</a></li>
    <li><a href="https://daxue.yooc.me/" target="_blank" >易班大学</a></li>
    <li><a href="https://www.yooc.me/groups" target="_blank" >YOOC课群</a></li>
    <li><a href="work-file.php">工作文件</a></li>
    <li><a href="join-us.php">加入我们</a></li>
</ul></nav>
</div>
</div>
<div class="row">
<div class="switch-images col-md-10">
	<div class="sections img-rounded">
		<div class="section img-rounded" id="section0"><h3>this is the page1</h3></div>
		<div class="section img-rounded" id="section1"><h3>this is the page2</h3></div>
		<div class="section img-rounded" id="section2"><h3>this is the page3</h3></div>
		<div class="section img-rounded" id="section3"><h3>this is the page4</h3></div>
	</div>
</div>
<div class="col-md-2">
	<div class="ques-section-item">
		<IFRAME  class="frame-set" src="http://132.232.110.129/sell/rank.php" height="500px" width="115%"
				frameBorder=0 marginwidth=0 marginheight=0  ALLOWTRANSPARENCY="true" scrolling="yes"></IFRAME>
	</div>
</div>
</div>
<div class="function-list row" style=" margin-top: 30px; height:200px; padding-top:20px; padding-right: 25px;">
    <p class="list-name">我校易班特色应用</p>
    <div id="wrapper1" style="margin:0 35px 0 35px;"></div>
</div>
<div class="row" style=" margin-top: 30px; padding-left:2%;">
	<div class="inform-list-left col-md-6">
		<p class="list_label"><b>易班推荐资讯</b><?php for($i=1; $i<40;$i++) echo "&nbsp;";?><small id="more" style="cursor: pointer;" onclick="window.location.href='yiban-resource.php?page=1';">更多...</small></p>
				<div class="resource-list row img-rounded"  onclick="window.open('<?php echo $resource['info']['list'][0]['push_href'];?>');">
                    <img src="<?php echo $resource['info']['list'][0]['push_pic'];?>" class="img-rounded col-md-6">
                    <div class="resource-content col-md-6">
                    <b class="text-left text-info"><?php echo $resource['info']['list'][0]['push_title'];?></b>
                    <p class="resource-detail text-left"><?php echo $resource['info']['list'][0]['push_summary'];?></p>
                    <small class="resource-create-time text-muted text-left"><?php echo date('Y-m-d H:i:s', $resource['info']['list'][0]['create_time']);?></small>
                    </div>
				</div>
        <div class="resource-list row img-rounded"  onclick="window.open('<?php echo $resource['info']['list'][1]['push_href'];?>');">
            <img src="<?php echo $resource['info']['list'][1]['push_pic'];?>" class="img-rounded col-md-6">
            <div class="resource-content col-md-6">
                <b class="text-left text-info"><?php echo $resource['info']['list'][1]['push_title'];?></b>
                <p class="resource-detail text-left"><?php echo $resource['info']['list'][1]['push_summary'];?></p>
                <small class="resource-create-time text-muted text-left"><?php echo date('Y-m-d H:i:s', $resource['info']['list'][1]['create_time']);?></small>
            </div>
        </div>
        <div class="resource-list row img-rounded"  onclick="window.open('<?php echo $resource['info']['list'][2]['push_href'];?>');">
            <img src="<?php echo $resource['info']['list'][2]['push_pic'];?>" class="img-rounded col-md-6">
            <div class="resource-content col-md-6">
                <b class="text-left text-info"><?php echo $resource['info']['list'][2]['push_title'];?></b>
                <p class="resource-detail text-left"><?php echo $resource['info']['list'][2]['push_summary'];?></p>
                <small class="resource-create-time text-muted text-left"><?php echo date('Y-m-d H:i:s', $resource['info']['list'][2]['create_time']);?></small>
            </div>
        </div>
	</div>

	<div class="inform-list-right col-md-4">
        <p class="list_label"><b>校内热门话题</b><?php for($i=1; $i<88;$i++) echo "&nbsp;";?><small id="more" style="cursor: pointer;" onclick="window.location.href='article.php?page=1';">更多...</small></p>
        <?php
        for($t=0; $t<8; $t++) {
            echo "<script>";
            echo "
                function open_link$t(){
                    window.open('http://www.yiban.cn/forum/article/show/channel_id/73/puid/5000084/group_id/0/article_id/";
            echo $topic['info']['list'][$t]['topic_id'];
            echo "');}";
            echo "</script>";
            echo "<div class='topic-list-table row' onclick='open_link$t()'>
                <div class='topic-info col-md-7'>
                <span style='color:#00A5ED;'>";
            echo $t+1;
            echo "</span>
                <b class='topic-name text-left text-info'>";
            echo $topic['info']['list'][$t]['topic_title'];
            echo "</b>";
            echo "<p class='topic-time text-muted text-left small'>";
            echo $topic['info']['list'][$t]['create_time'];
            echo "</p></div><div class='topic-source col-md-5'>
                <span><img class='user-head img-circle text-center' src='";
            echo $topic['info']['list'][$t]['pub_head'];
            echo "'></span>
                <span class='user-nick text-muted text-center'>";
            echo $topic['info']['list'][$t]['pub_nick'];
            echo "</span>
                <div class='comment'>
                <span><img class='comment-ico' src='images/comment.png' width='20px' height='20px'></span>
                <span class='topic-comment-num text-muted text-center small'>";
            echo $topic['info']['list'][$t]['reply_count'];
            echo "</span></div></div></div>";
        }
        ?>

    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<p class="copyright text-center muted" >Copyright © 2018-2019 XSYU_YIBAN. All Rights Reserved<br>西安石油大学易班发展中心 版权所有</p>
	</div>
</div>
</div>
</div>
<script type="text/javascript" src="js/star.js"></script>
<script type="text/javascript" src="js/pageSwitch.min.js"></script>
<script>
	var pw = $(".switch-images").PageSwitch({
		direction:'horizontal',
		easing:'ease-in',
		duration:500,
		autoPlay:true,
		loop:'false',
        mouse: true,
        mousewheel:false,
        transition: 'fade'
	});
</script>
<script src="js/nav.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#wrapper1').dockmenu({
            buttons: [{
                'title': 'Settings',
                'href': '#settings',
                'imgURL': 'icons/Settings.png',
                'onClick': function(){
                    alert('You clicked on the Settings icon');
                }
            },{
                'title': 'App Store',
                'href': '#AppStore',
                'imgURL': 'icons/AppStore.png',

            },{
                'title': 'Camera',
                'href': '#camera',
                'imgURL': 'icons/Camera.png',

            },{
                'title': 'Games',
                'href': '#Games',
                'imgURL': 'icons/Games.png',

            },{
                'title': 'Mail',
                'href': '#Mail',
                'imgURL': 'icons/Mail.png',

            },{
                'title': 'Music',
                'href': '#Music',
                'imgURL': 'icons/Music.png',
                'onClick': function(){
                    alert('You clicked on the Music icon');
                }
            },{
                'title': 'Safari',
                'href': '#Safari',
                'imgURL': 'icons/Safari.png',

            },{
                'title': 'Photos',
                'href': '#Photos',
                'imgURL': 'icons/Photos.png',

            }]

        });

        $('.close').on('click', function()
        {
            if( $('.menu').position().left === 0 )
            {
                $('.menu').animate({'left':'-335px'}, 1000);
                $(this).html('>');
            }
            else
            {
                $('.menu').animate({'left':'0'}, 1000);
                $(this).html('x');
            }
        });
    });
</script>

</body>
</html>
