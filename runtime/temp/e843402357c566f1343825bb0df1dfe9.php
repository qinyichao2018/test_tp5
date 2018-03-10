<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\phpStudy\WWW\test_tp5\public/../application/index\view\index\zhuye.html";i:1519205764;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主页</title>
</head>
<body>
    <h1>主页</h1>
    <hr>
    <p>当前邮箱:<?php echo $email; ?></p>
    <a href="<?php echo url('user/edit'); ?>">编辑邮箱</a>
<a href="<?php echo url('user/shuoshuo'); ?>">发说说</a>
    <a href="<?php echo url('user/shuoshuolist'); ?>">说说列表</a>
    <a href="<?php echo url('user/fileup'); ?>">上传文件</a>
    <a href="<?php echo url('user/file_xiazai'); ?>">下载文件</a>
    <img src="/uploads/20180221/177052537843b348a2e2b8f6af448232.png" alt="">
</body>
</html>
