<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\phpStudy\WWW\test_tp5\public/../application/admin\view\index\index.html";i:1519199192;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<ul>


    <?php echo date('Y-m-d g:i a',time()); ?>
    <li>id:     内容:     时间:</li>
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
    <li><?php echo $vo1['id']; ?>   <?php echo $vo1['shuoshuo']; ?>    <?php echo $vo1['created_at']; ?> <input type="hidden" name="id" value="<?php echo $vo1['id']; ?>" >
    </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</body>
</html>