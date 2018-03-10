<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\phpStudy\WWW\test_tp5\public/../application/index\view\user\fileup.html";i:1519201682;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="<?php echo url('fileup_do'); ?>">
<input type="file" name="file"><br>
<input type="submit" value="上传"><br>
</form>
</body>
</html>