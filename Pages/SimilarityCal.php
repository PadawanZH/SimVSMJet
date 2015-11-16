<?php
namespace SimVSMJet;
include '../Class/Func/WordSplit.php';
include '../Class/Func/SimCalculator.php';

// 定义变量并设置为空值
$Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Query1"])) {
        $Err = "必填";
    }
    if (empty($_POST["Query2"])) {
        $Err = "必填";
    }
}
?>

<!DOCTYPE html>
<html>
<head lang="zh-CN">
    <meta charset="UTF-8">
    <title>计算查询相似度</title>

</head>
<body>
<div class="header"></div>
<div class="container col-md-10 col-md-offset-1">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label>查询一</label>
            <input type="text" name="Query1" id="query1" class="form-control" placeholder="请输入第一个查询语句" maxlength="255">
            <span class="error">* <?php echo $Err; ?></span>
        </div>
        <div class="form-group">
            <label>查询二</label>
            <input type="text" name="Query2" id="query2" class="form-control" placeholder="请输入第二个查询语句" maxlength="255">
            <span class="error">* <?php echo $Err; ?></span>
        </div>

        <input type="hidden" name="SUB" value="true">

        <p class="btn-control">
            <input type="submit" class="btn btn-success btn-lg col-md-2 col-md-offset-2" value="开始计算">
            <a class="btn btn-success btn-lg col-md-2 col-md-offset-2" href="">返回主页</a>
        </p>
    </form>
</div>

<div class="resultArea col-md-10 col-md-offset-1">
    <!--填写结果区域 -->
    <div class="resultArea col-md-12" style="font-size: 30px;color: #ff0025">
        <?php
        if ($_POST["SUB"] == true && $Err == "") {
            computeTheSimValue();
        } else {
            echo '<b>' . "result to show" . '</b>';
        }
        ?>
    </div>
</div>
<?php
//计算相似度
function computeTheSimValue()
{
    //分词，得到词项
    $sentence = $_POST["Query1"];
    $wordSplit = new WordSplit($sentence);
    $result1 = $wordSplit->send_post();

    $sentence = $_POST["Query2"];
    $wordSplit = new WordSplit($sentence);
    $result2 = $wordSplit->send_post();

    $simcal = new SimCalculator($result1, $result2);
    $innerProduct = "";
    $cosine = "";
    $jaccard = "";
    $simcal->getSimWithTwoTermArrays($result1,$result2,$innerProduct,$cosine,$jaccard);

    //打印结果
    echo '<br /> InnerProduct : ' . $innerProduct . '<br />';
    echo '<br /> Cosine : ' . $cosine . '<br />';
    echo '<br /> Jaccard : ' . $jaccard . '<br />';

}

?>
</body>
<link rel="stylesheet" href="../BootStrap/dist/css/bootstrap.min.css">
<link href="../css/SimilarityCal.css" rel="stylesheet">
</html>

