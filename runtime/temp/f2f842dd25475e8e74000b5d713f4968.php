<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\phpStudy\WWW\test_tp5\public/../application/index\view\user\shuoshuo.html";i:1519118959;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="<?php echo url('user/zhuye'); ?>">主页</a>
<form method="post" action="<?php echo url('user/shuoshuo_do'); ?>">
<input type="text" name="shuoshuo" >
<input type="submit" value="发表">
</form>
</body>
</html>