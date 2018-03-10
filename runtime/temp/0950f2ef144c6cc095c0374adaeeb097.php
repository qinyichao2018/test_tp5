<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\phpStudy\WWW\test_tp5\public/../application/index\view\user\redit.html";i:1519144246;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="<?php echo url('user/zhuye'); ?>">主页</a>

<form method="post" action="<?php echo url('user/shuoshuo_edit_do'); ?>">

    <input type="text" name="text" value=<?php echo $yuanwen; ?> >
    <input type="hidden" name="id" value=<?php echo $bianji; ?>>
    <input type="submit" name="submit" value='更新' >

</form>
</body>
</html>