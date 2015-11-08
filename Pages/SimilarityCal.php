<!DOCTYPE html>
<html>
<head lang="zh-CN">
    <meta charset="UTF-8">
    <title>计算查询相似度</title>
    <link rel="stylesheet" href="../BootStrap/dist/css/bootstrap.min.css">
    <link href="../css/SimilarityCal.css" rel="stylesheet">
</head>
<body>
<div class="header"></div>
<div class="container col-md-10 col-md-offset-1">
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
            <input type="submit" class="btn btn-success btn-lg col-md-2 col-md-offset-2" value="开始计算">
            <a class="btn btn-success btn-lg col-md-2 col-md-offset-2" href="">返回主页</a>
        </p>
    </form>
</div>

<div class="resultArea col-md-10 col-md-offset-1">
    <!--填写结果区域 -->
    <div id="GameDiscuss" class="col-md-12">
        <ul>
            <li class="col-md-12 ">
                <!--结果格式区域 -->
                <label class="label-warning text-center col-md-6">帖子标题</label>
                <label class="label-primary text-center col-md-1">作者</label>
                <label class="label-success text-center col-md-1">回复数</label>
                <label class="label-primary text-center col-md-2">最后发表</label>
                <label class="label-success text-center col-md-2">最后时间</label>
            </li>
            <li class="col-md-12">
                <a href="#" class="col-md-6">帖子标题帖子标题帖子标题帖子标题帖子标</a>
                <p class="col-md-1">Tsurara</p>
                <p class="col-md-1">2000</p>
                <p class="col-md-2">Missbear</p>
                <p class="col-md-2">2015-6-4</p>
            </li>
            <li class="col-md-12">
                <a href="#" class="col-md-6">帖子标题帖子标题帖子标题帖子标题帖子标</a>
                <p class="col-md-1">Tsurara</p>
                <p class="col-md-1">2000</p>
                <p class="col-md-2">Missbear</p>
                <p class="col-md-2">2015-6-4</p>
            </li>
            <li class="col-md-12">
                <a href="#" class="col-md-6">帖子标题帖子标题帖子标题帖子标题帖子标</a>
                <p class="col-md-1">Tsurara</p>
                <p class="col-md-1">2000</p>
                <p class="col-md-2">Missbear</p>
                <p class="col-md-2">2015-6-4</p>
            </li>
            <li class="col-md-12">
                <a href="#" class="col-md-6">帖子标题帖子标题帖子标题帖子标题帖子标</a>
                <p class="col-md-1">Tsurara</p>
                <p class="col-md-1">2000</p>
                <p class="col-md-2">Missbear</p>
                <p class="col-md-2">2015-6-4</p>
            </li>
            <li class="col-md-12">
                <a href="#" class="col-md-6">帖子标题帖子标题帖子标题帖子标题帖子标</a>
                <p class="col-md-1">Tsurara</p>
                <p class="col-md-1">2000</p>
                <p class="col-md-2">Missbear</p>
                <p class="col-md-2">2015-6-4</p>
            </li>
        </ul>
    </div>
</div>

</body>
</html>