<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpStudy\WWW\test_tp5\public/../application/index\view\user\shuohsuolist.html";i:1519200207;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<a href="<?php echo url('user/zhuye'); ?>">主页</a>
<ul>

    <?php echo \think\Request::instance()->get('id'); ?>
    <?php echo \think\Cookie::get('username'); ?>
    <?php echo \think\Request::instance()->env('HOSTNAME'); ?>
    <?php echo date('Y-m-d g:i a',time()); ?>
    <li>id:     内容:     时间:</li>
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
        <li><?php echo $vo1['id']; ?>   <?php echo $vo1['shuoshuo']; ?>    <?php echo $vo1['created_at']; ?> <input type="hidden" name="id" value="<?php echo $vo1['id']; ?>" ><a href="<?php echo url('user/shuoshuo_edit',array('id'=>$vo1['id'])); ?>">编辑</a><a href="<?php echo url('user/shuoshuo_del',array('id'=>$vo1['id'])); ?>">删除</a>
        </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <p><?php echo $page; ?></p>
</ul>
</body>
</html>