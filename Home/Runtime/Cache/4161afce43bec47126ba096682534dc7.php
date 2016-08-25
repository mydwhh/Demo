<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Insert title here</title>

		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/basic.css" />
	</head>
	<body>

		<div class="top">
			<h2>PHP示例程序</h2>
			<h3>>>添加</h3>
		</div>

		<form  class="basicForm"  action="__URL__/add" method="post">
			<label for="username">姓名：</label>
			<input type="text"  name="username" />
			<br/>
			<label for="sex">性别：</label>
			<input type="radio"  name="sex" value="1"  />
			男
			<input type="radio"  name="sex" value="0" />
			女
			<br/>
			<input type="submit" name="submit"  value='添加'/>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="reset" name="reset" />
		</form>
	</body>
</html>