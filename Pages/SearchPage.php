<?php
/**
 * Created by PhpStorm.
 * User: zhangan
 * Date: 15-12-3
 * Time: 上午10:32
 */
$dir = dirname(__file__);
require_once $dir . '/../Class/Action/MainSearch.php';
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="iconDiv row" align="center">
            <img hidefocus="true" src="//img1.gtimg.com/edu/pics/hv1/122/126/1929/125465477.jpg" width="400"
                 height="128">
        </div>

        <div class="searchFormDiv row input-group-lg">
            <span
                class="col-lg-5 col-lg-offset-3 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2 col-xs-5 col-xs-offset-2">
                <input id="Query" name="Query" class="form-control input-lg" value="<?php if($_POST["SUB"] == true){echo $_POST["Query"];} ?>" maxlength="255" autocomplete="off"
                       placeholder="input query expression">
            </span>
            <span class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <input type="submit" id="su" value="开始搜索" class="btn btn-lg btn-primary">
            </span>
            <input type="hidden" name="SUB" value="true">
        </div>

        <div class="row selectDiv">
            <div
                class="col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label">相似度计算方式</label>
                <select class="input-xlarge" name="simType" value="<?php if($_POST["SUB"] == true){echo $_POST["simType"];} ?>">
                    <option value="innerProduct">Inner product</option>
                    <option value="cosine">Cosine</option>
                    <option value="jaccard">Jaccard</option>
                </select>
            </div>


            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label class="control-label">结果最大限制</label>
                <select class="input-xlarge" name="topN" value="<?php if($_POST["SUB"] == true){echo $_POST["topN"];} ?>">
                    <option value="100">100</option>
                    <option value="1000">1000</option>
                    <option value="100000">不限制</option>
                </select>
            </div>

    </form>
</div>
<div id="resultArea"
     class="resultArea col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

    <?php
    if ($_POST["SUB"] == true) {
        $queryString = $_POST["Query"];
        $simType = $_POST["simType"];
        $sortBy = "simVal";
        $topN = $_POST["topN"];
        $actualResultCount = 0;
        $mainSearch = new MainSearch();
        $resList = array();
        $resList = $mainSearch->search($queryString, $simType, $sortBy, $topN, $actualResultCount);

        $maxSimilarity = current($resList)['simVal'];
        ?>
        <p align="center" style="font-size: 20px;color: #00a224">共搜到<?php echo $actualResultCount ?>
            篇结果，显示前<?php echo ($topN > count($resList)) ? count($resList) : $topN ?>个结果</p>
        <?php
        foreach ($resList as $docID => $item) {
            ?>
            <div class="resultObject row" id="<?php echo $docID ?>">
                <h3 class="t"><a href="<?php echo 'http://' . $item['url'] ?>"
                                 target="_blank"><?php echo $item['title'] ?></a></h3>
                <h5 class="u"><a href="<?php echo 'http://' . $item['url'] ?>"
                                 target="_blank"><?php echo 'http://' . $item['url'] ?></a></h5>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"> 相似度(<?php echo $simType ?>)&nbsp;——&nbsp; </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar"
                             style="width: <?php echo round(($item['simVal'] / $maxSimilarity) * 100, 0) ?>%;">
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
    }
    ?>
</div>
</body>
<link rel="stylesheet" href="../BootStrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/SearchPage.css">
<link rel="stylesheet" href="../css/stick-footer.css">
<link rel="stylesheet" href="../css/NavigateBar.css">

</html>
