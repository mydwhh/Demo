<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>浏览与搜索</title>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/basic.css" />
	</head>
	<body>
		<div class="top">
			<h2>PHP示例程序</h2>
			<h3>>
			>浏览与搜索</h3>
		</div>
		<div align="center" style="margin:10px;">
			<form  action="__URL__/search" method='post'>
				用戶名：
				<input type="text" name="username" takeplace="請輸入查詢的姓名">
				&nbsp;&nbsp;&nbsp;&nbsp;性別：女
				<input type="radio" value="0" name="sex">
				&nbsp;男
				<input type ="radio" value='1' name="sex">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type ="submit" value='搜索'>
			</form>
		</div>
		<p></p>
		<table  border="1"  width='95%' align='center'>
			<tr>
				<th>id号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>操作</th>
			</tr>

			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["username"]); ?></td>
					<td><?php echo ($vo["sex"]); ?></td>
					<td><a href="__URL__/modify/id/<?php echo ($vo["id"]); ?>/" >更新</a> | <a href="__URL__/del/id/<?php echo ($vo["id"]); ?>">删除</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
				<td colspan=4>

<div style="float:left;">
						<第一页>　　<上一页>　　<下一页>　　<最后一页>
						</div>
<form action='__URL__/ins' method='post' style="float:right;">
						<input type="submit" value="添加" />
						<form>
				</td>
			</tr>
		</table>
	</body>
</html>