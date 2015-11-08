<!DOCTYPE html>
<html>
<head lang="zh-CN">
    <meta charset="UTF-8">
    <title>计算查询相似度</title>
    <link rel="stylesheet" href="../BootStrap/dist/css/bootstrap.min.css">
    <link href="../css/Login.css" rel="stylesheet">
</head>
<body>
<div class="header"></div>
<div class="container col-md-4 col-md-offset-4">
    <form method="post" action="login">
        <div class="form-group">
            <label>查询一</label>
            <input type="text" name="Query1" id="query1" class="form-control" placeholder="请输入第一个查询语句" maxlength="255">
        </div>
        <div class="form-group">
            <label>查询二</label>
            <input type="text" name="Query2" id="query2" class="form-control" placeholder="请输入第二个查询语句" maxlength="255">
        </div>

        <p class="btn-control">
            <input type="submit" class="btn btn-success btn-lg" value="开始计算">
            <a class="btn btn-success btn-lg" href="">返回主页</a>
        </p>
    </form>
</div>

<div class="container col-md-4 col-md-offset-4">
    <!--填写结果区域 -->
</div>

</body>
</html>