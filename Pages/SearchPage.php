<?php
/**
 * Created by PhpStorm.
 * User: zhangan
 * Date: 15-12-3
 * Time: 上午10:32
 */

?>

<!DOCTYPE html>
<html>
<head lang="zh-CN">
    <meta charset="UTF-8">
    <title>计算查询相似度</title>

</head>
<body>
    <div class="header"></div>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">
                    <li><a href="#">MainSearch</a></li>
                    <li class="active"><a href="./SimilarityCal.php">Similarity Calculator</a></li>
                    <li><a href="#">About us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="SearchFormArea">
        <form id="form" name="search" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="iconDiv row">
            <span class="col-lg-2 col-lg-offset-5 col-md-2 col-md-offset-5 col-sm-2 col-sm-offset-4 col-xs-2 col-xs-offset-3">
                <img hidefocus="true" src="//www.baidu.com/img/bd_logo1.png" width="270" height="128">
            </span>
        </div>

        <div class="searchFormDiv row input-group-lg">
            <span class="col-lg-5 col-lg-offset-3 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2 col-xs-5 col-xs-offset-2">
                <input id="Query" name="wd" class="form-control input-lg" value="" maxlength="255" autocomplete="off" placeholder="input query expression">
            </span>
            <span class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <input type="submit" id="su" value="开始搜索" class="btn btn-lg btn-primary">
            </span>
            <input type="hidden" name="SUB" value="true">
        </div>

        <div class="row selectDiv">
            <div class="col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label">相似度计算方式</label>
                <select class="input-xlarge">
                    <option>Inner product</option>
                    <option>Cosine</option>
                    <option>Jaccard</option>
                </select>
            </div>


            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label class="control-label">排序方式</label>
                <select class="input-xlarge">
                    <option>相似度从高到底</option>
                    <option>时间从近到远</option>
                </select>
            </div>

        </form>
    </div>
    <div id="resultArea" class="resultArea col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

    <?php
    if ($_POST["SUB"] == true) {
        ?>
        <div class="resultObject row" id="3" srcid="1599">
            <h3 class="t"><a href="http://www.baidu.com" target="_blank">Answer's Name</a></h3>

            <div class="c-abstract">
                <p>
                    <span
                        class="time">2014年12月23日&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                    <span class="time">相似度&nbsp;-&nbsp;</span>
                </p>

                <p>如题,
                    <term>bootstrap</term>
                    3如何创建一个
                    <term>footer</term>
                    ,或者一个总是在页面底部的div?查看了文档好像并没有这方面的class,求指教。
                </p>
            </div>
        </div>
        <?php
    } else {
        echo '<b>' . "result to show" . '</b>';
    }
    ?>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="text-muted"> <a href="./SearchPage.php">About us</a></p>
        </div>
    </footer>
</body>
<link rel="stylesheet" href="../BootStrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/SearchPage.css">
<link rel="stylesheet" href="../css/stick-footer.css">
<link rel="stylesheet" href="../css/NavigateBar.css">
</html>