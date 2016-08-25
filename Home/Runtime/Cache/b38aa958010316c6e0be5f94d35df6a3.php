<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>更新</title>
</head>
<body>

	<form action="/Demo/index.php/User/update" method="post" onsubmit="return check()">
		<input type="hidden" value="<?php echo ($id); ?>" name="id">
		 <label for="username">姓名：</label>	<input type="text"   name="username" value="<?php echo ($username); ?>"/> <br/>
		 <label for="sex">性别：</label>	<input type="radio"  name="sex" value="1"  />男
		<input type="radio"  name="sex" value="0" />女<br/>
		<input type="submit" name="submit"  value='更新'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" />
	</form>
</body>
</html>