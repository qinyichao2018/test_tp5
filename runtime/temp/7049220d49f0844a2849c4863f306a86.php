<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpStudy\WWW\test_tp5\public/../application/index\view\user\edit.html";i:1519046628;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>编辑页面</h1>
    <a href="<?php echo url('user/zhuye'); ?>">主页</a>
    <hr>
    <p>当前邮箱：<?php echo (isset($email) && ($email !== '')?$email:'暂无'); ?></p>
    <form action="<?php echo url('user/edit_do'); ?>" method="post">
        新邮箱 <input type="email" name="email" required>
        <input type="submit" value="提交">
    </form>
</body>
</html>