<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\phpStudy\WWW\test_tp5\public/../application/index\view\index\register.html";i:1519195549;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register</title>
</head>
<body>
<a href="<?php echo url('user/zhuye'); ?>">主页</a>
<form method="post" action="<?php echo url('user/user'); ?>">
    邮箱<input type="email" name="email" <?php if(!(empty($post_data) || (($post_data instanceof \think\Collection || $post_data instanceof \think\Paginator ) && $post_data->isEmpty()))): if(!(empty($post_data['email']) || (($post_data['email'] instanceof \think\Collection || $post_data['email'] instanceof \think\Paginator ) && $post_data['email']->isEmpty()))): ?>value="<?php echo $post_data['email']; ?>"<?php endif; endif; ?>><br>
    密码<input type="password" name="password"  <?php if(!(empty($post_data['password']) || (($post_data['password'] instanceof \think\Collection || $post_data['password'] instanceof \think\Paginator ) && $post_data['password']->isEmpty()))): ?>value="<?php echo $post_data['password']; ?>"<?php endif; ?>><br>
    <input type="submit" value="提交">
        <p style="color: red">
            <?php echo (isset($error) && ($error !== '')?$error:''); ?>
        </p>

</form>
</body>
</html>