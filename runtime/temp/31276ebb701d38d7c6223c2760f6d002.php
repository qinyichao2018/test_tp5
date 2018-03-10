<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\phpStudy\WWW\test_tp5\public/../application/index\view\index\index.html";i:1519198153;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>欢迎来到发说说网</h1>
    <hr>

<form method="post" action="<?php echo url('user/login_o'); ?>">

    邮箱<input type="email" name="email" <?php if(!(empty($post_data) || (($post_data instanceof \think\Collection || $post_data instanceof \think\Paginator ) && $post_data->isEmpty()))): if(!(empty($post_data['email']) || (($post_data['email'] instanceof \think\Collection || $post_data['email'] instanceof \think\Paginator ) && $post_data['email']->isEmpty()))): ?>value="<?php echo $post_data['email']; ?>"<?php endif; endif; ?>><br>
    密码<input type="password" name="password" <?php if(!(empty($post_data['password']) || (($post_data['password'] instanceof \think\Collection || $post_data['password'] instanceof \think\Paginator ) && $post_data['password']->isEmpty()))): ?>value="<?php echo $post_data['password']; ?>"<?php endif; ?>><br>
    <input type="submit" value="登录">
    <a href="<?php echo url('user/index'); ?>">注册</a>
</form>
</body>
</html>