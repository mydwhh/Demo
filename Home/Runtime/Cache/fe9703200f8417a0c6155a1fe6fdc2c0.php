<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>用户登录</title>
<!-- <link href="__PUBLIC__/css/basic.css" type="text/css"/> -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/login.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/basic.css" />
<!-- 		<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script> -->
</head>
<body>
	<div class="top">
		<h2>PHP示例程序</h2>
		<h3>>>登录</h3>
	</div>

	<form class="basicForm" action="__URL__/do_login" method="post">
		<h3>登录页面</h3>
		用户名：<input class="inputlogin" type="text" name='username' /><br />
		密　码：<input class="inputlogin" type="password" name='pwd' /><br />
		<!-- 重复密码：<input  class="inputlogin" type='password' name='pwd2' /><br/> -->
		验证码：<input class="inputlogin" type='text' name='code' /> <img
			src="__APP__/Public/code/"
			onclick='this.src=this.src+"?"+Math.random()' /> <br /> <input
			type="submit" value="提交" />
	</form>
</body>
</html>